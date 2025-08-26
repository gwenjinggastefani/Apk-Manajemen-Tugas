<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::create([
            'title' => 'Desain UI Website',
            'status' => 'done',
            'project_id' => 1, 
            'user_id' => 2, 
        ]);

        Task::create([
            'title' => 'Coding Halaman Login',
            'status' => 'in_progress',
            'project_id' => 1,
            'user_id' => 2,
        ]);

        Task::create([
            'title' => 'Fitur Booking Mobil',
            'status' => 'in_progress',
            'project_id' => 2, 
            'user_id' => 2, 
        ]);
    }
}
