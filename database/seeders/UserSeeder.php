<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'role' => 'admin',
                'first_name' => 'Umut',
                'last_name' => 'Yerebakmaz',
                'email' => 'umutyerebakmaz@gmail.com',
                'password' => '123456789',
                'remember_token' => Str::random(10),
            ],
            [
                'role' => 'member',
                'first_name' => 'Firstname',
                'last_name' => 'Lastname',
                'email' => 'member@umutyerebakmaz.com',
                'password' => bcrypt('123456789'),
                'remember_token' => Str::random(10),
            ]
        ];

        // User::truncate();

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
