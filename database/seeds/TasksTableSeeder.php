<?php
use App\Task;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: gsm
 * Date: 2017/3/15
 * Time: 17:12
 */
class TasksTableSeeder extends Seeder
{
    public function run()
    {
        Task::truncate();

        Task::create([
            'title' => 'go to the store',
            'body' => 'buy staff for the week',
            'user_id' => 1
        ]);

        Task::create([
            'title' => 'learn laravel',
            'body' => 'That is sooo much fun!',
            'user_id' => 2
        ]);

        Task::create([
            'title' => 'go swimming',
            'body' => 'Relax and have a nice evening',
            'user_id' => 1
        ]);
    }
}