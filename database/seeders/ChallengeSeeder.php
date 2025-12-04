<?php

namespace Database\Seeders;

use App\Models\Challenge;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChallengeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Challenge::create([
            'title' => 'Waterbakken vullen',
            'water_trough' => 3,
            'water_description' => 'Je hebt drie waterbakken met verschillende groottes. Vul ze allemaal tot de aangegeven hoogte zonder water te verspillen.',
            'right_answer' => 'Vul eerst de kleinste bak, giet dan over in de middelste, en vul de grootste als laatste',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
