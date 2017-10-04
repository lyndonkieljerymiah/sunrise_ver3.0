<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = [
            "full_name"     =>  "Admin",
            "user_name"     =>  "admin",
            "email"         =>  "admin@gmail.com",
            "password"      =>  Hash::make("password"),
            
        ];

        \App\User::create($user1);

    }
}
