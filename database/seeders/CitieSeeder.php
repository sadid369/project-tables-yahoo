<?php

namespace Database\Seeders;

use App\Models\citie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        citie::create([
            'city_name'=>fake()->city()
        ]);
    }
}
