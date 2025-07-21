<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'), // change default password as needed
                'role' => 'admin',
            ],
            [
                'name' => 'Student User',
                'email' => 'student@example.com',
                'password' => Hash::make('password'),
                'role' => 'student',
            ],
            [
                'name' => 'Trainer User',
                'email' => 'trainer@example.com',
                'password' => Hash::make('password'),
                'role' => 'trainer',
            ],
        ];

        foreach ($users as $userData) {
            $user = User::updateOrCreate(
                ['email' => $userData['email']],
                [
                    'name' => $userData['name'],
                    'password' => $userData['password'],
                ]
            );

            // Attach role via laratrust or your roles setup
            $user->attachRole($userData['role']);
        }
    }
}
