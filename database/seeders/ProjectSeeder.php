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
        // Project dari manager pertama (ID: 1)
        Project::create([
            'name' => 'Website Sekolah',
            'description' => 'Pembuatan Aplikasi Website Sekolah dengan fitur lengkap untuk manajemen siswa dan guru',
            'user_id' => 1, // Manager 1
        ]);

        Project::create([
            'name' => 'Design UI/UX',
            'description' => 'Pembuatan Design UI/UX Website Sekolah yang user-friendly dan modern',
            'user_id' => 1, // Manager 1
        ]);

        // Perbaikan: Tambah project dari manager kedua untuk testing
        Project::create([
            'name' => 'Mobile App Development',
            'description' => 'Pengembangan aplikasi mobile untuk sistem sekolah',
            'user_id' => 4, // Manager 2
        ]);

        Project::create([
            'name' => 'Database Optimization',
            'description' => 'Optimisasi database dan performa sistem',
            'user_id' => 4, // Manager 2
        ]);
    }
}