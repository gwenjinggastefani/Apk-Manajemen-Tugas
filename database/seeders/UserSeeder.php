<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; 

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Manajer Proyek (Admin)
        User::create([
            'name' => 'Project Manager',
            'email' => 'manager@example.com',
            'password' => 'manager',
            'role' => 'admin',
        ]);

        // Anggota Tim (User)
        User::create([
            'name' => 'Anggota Tim',
            'email' => 'user@example.com',
            'password' => 'anggota',
            'role' => 'user',
        ]);
    }
}
