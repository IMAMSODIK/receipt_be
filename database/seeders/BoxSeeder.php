<?php

namespace Database\Seeders;

use App\Models\Box;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'status' => 1,
            'pin' => Hash::make('123456')
        ]);

        Box::create([
            'name' => 'Box Temu Cafe',
            'status' => 1,
            'pin' => Hash::make('123456')
        ]);

        Box::create([
            'name' => 'Box Monochorome',
            'status' => 0,
            'pin' => Hash::make('123456')
        ]);
    }
}
