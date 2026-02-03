<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Andika Tri',
            'email' => 'tri@gmail.com',
            'password' => bcrypt('12345'),
            'role' => 'box'
        ]);

        User::create([
            'name' => 'Rinaldi Lase',
            'email' => 'rinaldi@gmail.com',
            'password' => bcrypt('12345'),
            'role' => 'box'
        ]);
        
        $this->call([
            BoxSeeder::class
        ]);
    }
}
