<?php

namespace Database\Seeders;

use App\Models\Challenge;
use App\Models\Word;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChallengeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $words = [
            'Eikenboom',
            'Waddenzee',
            'Duinen',
            'Kwelders',
            'Strand',
            'Zeehond',
            'Grutto',
            'Schotse hooglander',
            'Ree',
            'Vos',
            'Eik',
            'Beuk',
            'Dennenbos',
            'Zandverstuiving',
            'Heide',
            'Hunebed',
            'Veengebied',
            'Polder',
            'Dijk',
            'Sloten',
            'Rietland',
            'Ooievaar',
            'Weidevogels',
            'Tulp',
            'Narcis',
            'Waterbuffel',
            'Bever',
            'IJsvogel',
            'Zonnebloemveld',
            'Reeënpad',
            'Vlinder',
        ];

        foreach ($words as $word) {
            Word::create([
                'name' => $word,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
