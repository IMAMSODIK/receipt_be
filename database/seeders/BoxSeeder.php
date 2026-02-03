<?php

namespace Database\Seeders;

use App\Models\Box;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BoxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Box::create([
            'user_id' => User::first()->id,
            'name' => 'Box Banteko',
            'status' => 1
        ]);

        Box::create([
            'user_id' => User::first()->id,
            'name' => 'Box Temu Cafe',
            'status' => 1
        ]);

        Box::create([
            'user_id' => User::first()->id,
            'name' => 'Box Monochorome',
            'status' => 0
        ]);
    }
}
