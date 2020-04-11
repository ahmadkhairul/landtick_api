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
        User::truncate();

        $users = [[
            "name" => "admin lantick",
            "username" => "admin_lantik",
            "email" => "admin@lantik.com",
            "password" => Hash::make('admin'),
            "gender" => "Other",
            "phone" => "081081234321",
            "address" => "Permata Bintaro Residence",
            "level" => "Admin",
        ],[
            "name" => "Ahmad Khairul",
            "username" => "ahmad",
            "email" => "ahmad@gmail.com",
            "password" => Hash::make('ahmad'),
            "gender" => "Male",
            "phone" => "083081234321",
            "address" => "Permata Bintaro Residence",
            "level" => "User",
        ]];

       

        foreach($users as $user){
            User::create($user);
        }
    }
}
