<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Test',
            'last_name'  => 'User',
            'email'      => 'test@example.com',
            'password'   => Hash::make('Test@123'),
        ]);

        Project::create([
            'name' => 'Testing',
        ]);

        Task::create([
            'name' => 'Implement task management system',
            'priority' => 'High',
            'project_id' => 1,
        ]);
    }
}
