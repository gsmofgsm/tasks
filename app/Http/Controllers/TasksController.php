<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;

class TasksController extends Controller
{

    public function index()
    {

        $tasks = Task::with('user')->get();
        $users = User::all();

        return view('tasks.index', compact('tasks', 'users'));
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function store()
    {
        $request = request();

        $this->validate($request, [
           'title' => 'required',
           'body' => 'required',
           'assign' => 'required|exists:users,id'
        ]);

        Task::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => request('assign')
        ]);

        return redirect()->back();
    }

    public function update(Task $task)
    {
        $task->completed = request('completed') ?: 0;
        $task->save();

        return 'The task is marked as ' . ( $task->completed ? 'completed' : 'uncompleted' );
    }
}
