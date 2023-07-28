<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::create([
            'name' => 'Task 2',
            'description' => 'Task 2 description',
            'user_id' => 1
        ]);

        Task::create([
            'name' => 'Task 3',
            'description' => 'Task 3 description',
            'user_id' => 1
        ]);

        Task::create([
            'name' => 'Task 4',
            'description' => 'Task 4 description',
            'user_id' => 1
        ]);

        Task::create([
            'name' => 'Task 5',
            'description' => 'Task 5 description',
            'user_id' => 1
        ]);
    }
}
