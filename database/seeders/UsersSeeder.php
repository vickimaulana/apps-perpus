<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $user = new \App\Models\User();
        // Run the database seeds.
        // insert into user
        user::create([
            'name'          => 'Admin',
            'email'         => 'admin@gmail.com',
            'password'      => '12345678'
        ]);
    }
}
