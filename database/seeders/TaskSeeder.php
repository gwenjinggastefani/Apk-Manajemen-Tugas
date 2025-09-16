<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
use Carbon\Carbon;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Perbaikan: Sesuaikan status dengan enum yang benar dan tambah field yang dibutuhkan
        Task::create([
            'title' => 'Desain UI Website',
            'description' => 'Membuat desain antarmuka pengguna yang menarik dan intuitif untuk website sekolah',
            'deadline' => Carbon::now()->addDays(7), // 7 hari dari sekarang
            'status' => 'selesai', // Perbaikan: Ganti 'done' dengan 'selesai'
            'project_id' => 1, 
            'user_id' => 2, 
        ]);

        Task::create([
            'title' => 'Coding Halaman Login',
            'description' => 'Implementasi fitur login dengan validasi keamanan yang baik',
            'deadline' => Carbon::now()->addDays(5),
            'status' => 'sedang_dikerjakan', // Perbaikan: Ganti 'in_progress' dengan 'sedang_dikerjakan'
            'project_id' => 1,
            'user_id' => 3, // User kedua
        ]);

        Task::create([
            'title' => 'Pembuatan Dashboard Admin',
            'description' => 'Mengembangkan dashboard untuk administrator dengan fitur monitoring',
            'deadline' => Carbon::now()->addDays(10),
            'status' => 'belum_dikerjakan',
            'project_id' => 2, 
            'user_id' => 2, // Perbaikan: Hapus duplikasi, satu user satu task
        ]);

        // Perbaikan: Tambah task untuk manager kedua
        Task::create([
            'title' => 'Analisis Requirement Mobile App',
            'description' => 'Melakukan analisis kebutuhan untuk pengembangan aplikasi mobile',
            'deadline' => Carbon::now()->addDays(3),
            'status' => 'sedang_dikerjakan',
            'project_id' => 3,
            'user_id' => 3, // User 2 dapat task dari manager 2
        ]);
    }
}