<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserTasksController extends Controller
{
    public function index($username)
    {
        $user = User::whereName($username)->first();

        $tasks = $user->tasks;

        return view('tasks.index', compact('tasks'));
    }

    public function show($username, $task)
    {
        $user = User::whereName($username)->first();
        $task = $user->tasks()->findOrFail($task);

        return view('tasks.show', compact('task'));
    }
}
