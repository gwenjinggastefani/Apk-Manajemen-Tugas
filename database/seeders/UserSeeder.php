<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Perbaikan: Ganti role 'admin' menjadi 'manager' sesuai dengan aplikasi
        User::create([
            'name' => 'Project Manager',
            'email' => 'manager@example.com',
            'password' => Hash::make('password'),
            'role' => 'manager', // Perbaikan: Dari 'admin' ke 'manager'
        ]);

        // Anggota Tim (User)
        User::create([
            'name' => 'Anggota Tim 1',
            'email' => 'user1@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        // Perbaikan: Tambah user kedua untuk testing yang lebih komprehensif
        User::create([
            'name' => 'Anggota Tim 2',
            'email' => 'user2@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        // Perbaikan: Tambah manager kedua untuk testing multi-manager
        User::create([
            'name' => 'Project Manager 2',
            'email' => 'manager2@example.com',
            'password' => Hash::make('password'),
            'role' => 'manager',
        ]);
    }
}