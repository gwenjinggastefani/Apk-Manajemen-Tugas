<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
            'name' => 'Website Sekolah',
            'description' => 'Pembuatkan Aplikasi Website Sekolah',
            'user_id' => 1,
        ]);
         Project::create([
            'name' => 'Design UI/UX',
            'description' => 'Pembuatkan Design UI/UX Website Sekolah',
            'user_id' => 1,
        ]);
    }
}
