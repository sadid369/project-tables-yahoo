<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\citie;
use App\Models\lecturer;
use App\Models\student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        // student::factory(10)->create();
        // citie::factory(5)->create();
        lecturer::factory(3)->create();
        
    }
}
