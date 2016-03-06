<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Task;

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

    public function showDetail($id){
        $task = Task::findOrFail($id);
        return view('task.detail', [
            'task' => $task
        ]);
    }
}
