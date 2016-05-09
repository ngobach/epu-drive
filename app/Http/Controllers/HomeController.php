<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Task;
use App\File;
use App\User;
use File as FS;
use Excel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:true');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::with('user')->get();
        return view('home', [
            'tasks' => $tasks
        ]);
    }

    public function showDetail(Request $req, $id){
        $task = Task::findOrFail($id);
        $files = $task->files()->with('user')->get();
        return view('task.detail', [
            'task' => $task,
            'files' => $files
        ]);
    }

    public function postFile(Request $req, $id)
    {
        $task = Task::findOrFail($id);
        $this->authorize('upload', $task);
        $this->validate($req, [
            'file' => 'required'
        ]);
        $file = $req->file('file');
        if ($file->getClientOriginalExtension() != 'zip'){
            return back()->with('status','Chỉ được phép upload tệp tin .ZIP');
        }
        $dir = 'files' . '/' . md5($req->user()->id . time());
        if ($file->isValid()){
            $file->move(public_path($dir), $file->getClientOriginalName());
            $entry = new File();
            $entry->user_id = $req->user()->id;
            $entry->task_id = $id;
            $entry->file_path = $dir . '/' . $file->getClientOriginalName();
            $entry->save();
            return back()->with('status','Upload thành công!');
        } else {
            return back()->with('status','Upload thất bại :(');
        }
    }

    /**
     * Submit file  mark by teacher
     * @param  Request $req [description]
     * @param  [type]  $id  [description]
     * @return [type]       [description]
     */
    public function postFileMark(Request $req, $id) {
        if (!$req->user()->teacher)
            abort(403);
        $this->validate($req, [
            'mark' => 'required|numeric|min:0|max:10'
        ]);

        $file = File::findOrFail($id);
        $file->mark = $req->mark;
        $file->given_by = $req->user()->id;
        $file->save();
        return back()->with('status', 'Điểm bài làm cập nhật thành công');
    }

    /**
     * Return file detail view
     * @return Response
     */
    public function getFile(Request $req, $id){
        $file = File::findOrFail($id);
        $file_name = basename($file->file_path);
        return view('file_detail', [
            'file' => $file,
            'name' => $file_name
        ]);
    }

    public function deleteFile(Request $req, $id = 0){
        $file = File::findOrFail($id);
        $this->authorize('delete-file', $file);
        $file->remove();
        $file->delete();
        return 'Xóa thành công';
    }

    /**
     * Return list of  files download links as text format
     * @param  Request $req [description]
     * @param  [type]  $id  [description]
     * @return [type]       [description]
     */
    public function getListFile(Request $req, $id){
        $links = [];
        $files = Task::findOrFail($id)->files;
        foreach ($files as $file){
            if ($file->url()) $links[] = $file->url();
        }
        return response(implode('\n', $links))->withHeaders([
            'Content-type' => 'text/plain',
            // 'Content-disposition' => 'attachment; filename=epudrive_' . $id .'.txt' 
        ]);
    }

    /**
     * Export task into excel format with marks
     * @param  Request $req HTTPRequest
     * @param  int  $id  File ID
     * @return Response
     */
    public function exportExcel(Request $req, $id) {
        $task = Task::findOrFail($id);
        $files = $task->files()->with('user')->get();
        $rows = $files->map(function ($file) {
            return [$file->user->name, $file->user->email, basename($file->file_path), $file->mark];
        })->toArray();
        Excel::create(str_slug($task->title), function ($excel) use ($task, $rows)
        {
            $excel->setTitle('Danh sách nộp bài môn "' . $task->title . '"')
                ->setKeywords('epu drive')
                ->setCreator('EPU Drive')
                ->setCompany('Đại Học Điện Lực');
            $excel->sheet('Sheet', function($sheet) use ($rows) {
                $sheet->row(1, ['Họ tên', 'Email', 'Bài nộp', 'Điểm']);
                $sheet->row(1, function($row) {
                    $row->setFontWeight('bold');
                });
                $sheet->rows($rows);
                $sheet->setWidth([
                    'A' => 25,
                    'B' => 30,
                    'C' => 40,
                    'D' => 20,
                ]);
                $sheet->setBorder('A1:D'.(count($rows)+1), 'thin');
            });
        })->download('xlsx');
    }

    /**
     * List student havent submit file to a task
     * @param  Request $req
     * @param   $id  
     * @return Response
     */
    public function missing(Request $req, $id) {
        $task = Task::findOrFail($id);
        $missing = $task->missing();
        Excel::create("thieu-bai", function ($excel) use ($missing)
        {
            $excel->setTitle('Danh sách chưa nộp bài')
                ->setKeywords('epu drive')
                ->setCreator('EPU Drive')
                ->setCompany('Đại Học Điện Lực');
            $excel->sheet('Sheet', function($sheet) use ($missing) {
                $sheet->row(1, ['Họ tên', 'Email']);
                $sheet->row(1, function($row) {
                    $row->setFontWeight('bold');
                });
                $sheet->rows($missing->map(function($user){
                    return [$user->name, $user->email];
                })->toArray());
                $sheet->setWidth([
                    'A' => 25,
                    'B' => 30,
                    'C' => 40,
                    'D' => 20,
                ]);
                $sheet->setBorder('A1:B'.(count($missing)+1), 'thin');
            });
        })->download('xlsx');
    }
}
