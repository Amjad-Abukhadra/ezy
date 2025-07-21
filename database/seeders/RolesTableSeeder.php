<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role; // adjust the namespace if your Role model is elsewhere

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            ['name' => 'admin', 'display_name' => 'Administrator', 'description' => 'Admin user with full access'],
            ['name' => 'student', 'display_name' => 'Student', 'description' => 'Student user with limited access'],
            ['name' => 'trainer', 'display_name' => 'Trainer', 'description' => 'Trainer user with permission to manage courses'],
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate(['name' => $role['name']], $role);
        }
    }
}
