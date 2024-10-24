<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Honorine Espéranza',
            'email' => 'abotchihonorine28@gmail.com',
            'password' => bcrypt('16Mai2006'),
            'role' => 'admin', 
        ]);
    }
}
