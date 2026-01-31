<?php

namespace Database\Seeders;

use App\Models\Box;
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
            'name' => 'Box Banteko',
            'status' => 1
        ]);

        Box::create([
            'name' => 'Box Temu Cafe',
            'status' => 1
        ]);

        Box::create([
            'name' => 'Box Monochorome',
            'status' => 0
        ]);
    }
}
