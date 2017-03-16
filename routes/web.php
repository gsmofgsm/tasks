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
Route::patch('/tasks/{task}', 'TasksController@update');

Route::post('/tasks', 'TasksController@store');

Route::get('{username}/tasks', 'UserTasksController@index');
Route::get('{username}/tasks/{task}', 'UserTasksController@show');
