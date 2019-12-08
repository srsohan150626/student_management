<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role_id'=>1,
            'active'=>1,
            'name' =>'Prity Binte Mustafiz',
            'username'=>'pritypustice07',
            'email'=>'jibonprity@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => str_random(10),
        ]);
    }
}
