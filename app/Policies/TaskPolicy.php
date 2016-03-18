<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\Task;
use Auth;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Check if user can upload to this task
     *  
     * @param  User $user
     * @param  Task $task
     * @return boolean If user can perform upload
     */
    public function upload($user, $task){
        return !$task->expired() && $task->canSubmit(Auth::user());
    }

}