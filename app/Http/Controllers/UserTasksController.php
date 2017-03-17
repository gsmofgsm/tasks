<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;

class UserTasksController extends Controller {
   public function index( $username ) {

      $tasks = Task::with( [
         'user' => function ($query) use ($username) {
            $query->where( 'name', $username );
         }
      ] )->get();

      return view( 'tasks.index', compact( 'tasks' ) );
   }

   public function show( $username, $task ) {
      $user = User::whereName( $username )->first();
      $task = $user->tasks()->findOrFail( $task );

      return view( 'tasks.show', compact( 'task' ) );
   }
}
