<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Group;
use Illuminate\Support\Facades\Hash;


class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Group::create([
            'nama_tim' => 'Anggota Tim 3',
            'email'      => 'user3@example.com',
            'password'   => Hash::make('user3'),
        ]);

        Group::create([
            'nama_tim' => 'Anggota Tim 4',
            'email'      => 'user4@example.com',
            'password'   => Hash::make('user4'),
        ]);
    }
}
