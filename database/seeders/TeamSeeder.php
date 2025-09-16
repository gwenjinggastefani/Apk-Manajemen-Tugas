<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Team;

class TeamSeeder extends Seeder
{
    public function run()
    {
        // Perbaikan: Gunakan Model Team dan sesuaikan dengan constraint unique
        
        // Team untuk Manager 1
        Team::create([
            'manager_id' => 1, // Manager 1
            'user_id' => 2,    // User 1
            'project_id' => 1, // Website Sekolah
        ]);

        Team::create([
            'manager_id' => 1, // Manager 1  
            'user_id' => 3,    // User 2
            'project_id' => 1, // Website Sekolah
        ]);

        Team::create([
            'manager_id' => 1, // Manager 1
            'user_id' => 2,    // User 1
            'project_id' => 2, // Design UI/UX
        ]);

        // Team untuk Manager 2
        Team::create([
            'manager_id' => 4, // Manager 2
            'user_id' => 3,    // User 2
            'project_id' => 3, // Mobile App Development
        ]);

        Team::create([
            'manager_id' => 4, // Manager 2
            'user_id' => 2,    // User 1
            'project_id' => 4, // Database Optimization
        ]);

        // Perbaikan: Contoh team dengan multiple users per project
        Team::create([
            'manager_id' => 4, // Manager 2
            'user_id' => 3,    // User 2
            'project_id' => 4, // Database Optimization
        ]);
    }
}