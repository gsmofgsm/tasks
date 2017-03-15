<?php
use App\User;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: gsm
 * Date: 2017/3/15
 * Time: 16:44
 */
class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::truncate();

        User::create([
            'name' => 'gsm',
            'email' => 'gsm@example.com',
            'password' => 'gsmgsm'
        ]);

        User::create([
            'name' => 'gsm2',
            'email' => 'gsm2@example.com',
            'password' => 'gsmgsm'
        ]);
    }
}