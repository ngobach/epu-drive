<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Task;

class TaskController extends Controller
{
	public function __construct(){
		$this->middleware('auth:true');
		$this->middleware('admin');
	}
    public function getEdit(Request $req, $id = false)
    {
    	if ($id)
    		$task = Task::findOrFail($id);
    	else
    		$task = false;
    	return view('task.edit',[
    		'task' => $task
		]);
    }

    public function postEdit(Request $req)
    {
    	$this->validate($req, [
            'id' => 'required|numeric',
            'title' => 'required|min:10',
            'end_at' => 'required|date'
        ]);
        if ($req->id == 0){
            // Create new
            $task = new Task();
        }else{
            $task = Task::findOrFail($req->id);
        }
        $task->title = $req->title;
        $task->description = $req->content;
        $task->end_at = $req->end_at;
        $task->user_id = $req->user()->id;
        $task->save();
    	return back()->with('status','Thành công!');
    }

}
