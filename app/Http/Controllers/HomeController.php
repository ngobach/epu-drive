<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Task;
use App\File;
use File as FS;

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
}
