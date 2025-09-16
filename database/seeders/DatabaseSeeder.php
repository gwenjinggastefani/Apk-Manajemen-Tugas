<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Perbaikan: Pastikan urutan seeder sesuai dengan dependency
        // User harus dibuat dulu karena Project, Task, dan Team membutuhkan user_id
        $this->call([
            UserSeeder::class,      // 1. Buat user dulu
            ProjectSeeder::class,   // 2. Buat project (butuh user_id)
            TeamSeeder::class,      // 3. Buat team (butuh user_id dan project_id)
            TaskSeeder::class,      // 4. Buat task terakhir (butuh project_id dan user_id)
        ]);
        
        // Informasi untuk development
        $this->command->info('Database seeded successfully!');
        $this->command->info('Default credentials:');
        $this->command->info('Manager: manager@example.com / password');
        $this->command->info('User: user1@example.com / password');
        
        // Factory seeder (optional, bisa diaktifkan jika diperlukan)
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}