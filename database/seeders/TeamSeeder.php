<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    public function run()
    {
        DB::table('teams')->insert([
            [
                'manager_id' => 1,
                'member_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'manager_id' => 1,
                'member_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'manager_id' => 1,
                'member_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'manager_id' => 1,
                'member_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
