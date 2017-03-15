<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'TasksController@index')->name('home');
Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');

Route::get('{name}/tasks', function($name) {
    $user = App\User::whereName($name)->first();

    return $user->tasks;
});

Route::get('{name}/tasks/{task}', function($name, $task) {
    $user = App\User::whereName($name)->first();
    $task = $user->tasks()->findOrFail($task);

    return view('tasks.show', compact('task'));
});
