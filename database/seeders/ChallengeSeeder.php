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
            'title' => 'Natuur 30 seconds',
            'nature_word' => 'Eikenboom',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
