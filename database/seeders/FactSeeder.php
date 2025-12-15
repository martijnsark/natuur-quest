<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Fact;

class FactSeeder extends Seeder
{
    public function run(): void
    {
        // Categorieën toevoegen
        $wistjedat = Category::create(['name' => 'Wist je dat...']);
        $letop = Category::create(['name' => 'Let op!']);

        // Feitjes voor "Wist je dat..."
        Fact::create([
            'title' => 'Wist je dat...',
            'content' => 'de oehoe, de grootste uilensoort, bedreigd is door verlies van leefgebied en voedselbronnen?',
            'category_id' => $wistjedat->id
        ]);

        Fact::create([
            'title' => 'Wist je dat...',
            'content' => 'er 60 soorten lieveheersbeestjes zijn in Nederland die de populatie van bladluizen in balans houden?',
            'category_id' => $wistjedat->id
        ]);

        Fact::create([
            'title' => 'Wist je dat...',
            'content' => 'er 3 soorten slangen in Nederland leven die als roofdier een belangrijke rol spelen in de voedselketen?',
            'category_id' => $wistjedat->id
        ]);

        Fact::create([
            'title' => 'Wist je dat...',
            'content' => 'een mol zien in jouw tuin een goed teken is? Het betekent dat er veel wormen in jouw tuin zijn, wat planten erg helpt.',
            'category_id' => $wistjedat->id
        ]);

        Fact::create([
            'title' => 'Wist je dat...',
            'content' => 'wilde planten heel belangrijk zijn voor bijen, vlinders, maar ook voor ons, en dat 40% van de Nederlandse wilde planten onder bedreiging staat?',
            'category_id' => $wistjedat->id
        ]);

        Fact::create([
            'title' => 'Wist je dat...',
            'content' => 'Het trainen van één AI-model zoals ChatGPT gebruikt duizenden liters water. Genoeg om 10 mensen een jaar lang van drinkwater te voorzien.',
            'category_id' => $wistjedat->id
        ]);

        Fact::create([
            'title' => 'Wist je dat...',
            'content' => 'Als je lichten uitdoet wanneer je weggaat, energie bespaart en de natuur blij maakt?',
            'category_id' => $wistjedat->id
        ]);

        Fact::create([
            'title' => 'Wist je dat...',
            'content' => 'Het trainen van één AI-model zoals ChatGPT gebruikt duizenden liters water. Genoeg om 10 mensen een jaar lang van drinkwater te voorzien.',
            'category_id' => $wistjedat->id
        ]);

        Fact::create([
            'title' => 'Wist je dat...',
            'content' => 'Het trainen van één AI-model zoals ChatGPT gebruikt duizenden liters water. Genoeg om 10 mensen een jaar lang van drinkwater te voorzien.',
            'category_id' => $wistjedat->id
        ]);

        Fact::create([
            'title' => 'Wist je dat...',
            'content' => 'Het trainen van één AI-model zoals ChatGPT gebruikt duizenden liters water. Genoeg om 10 mensen een jaar lang van drinkwater te voorzien.',
            'category_id' => $wistjedat->id
        ]);

        Fact::create([
            'title' => 'Wist je dat...',
            'content' => 'Insecten eten veel beter is voor de planeet? Eén kilo krekels veroorzaakt veel minder CO₂-uitstoot dan één kilo rundvlees!',
            'category_id' => $wistjedat->id
        ]);

        // Feitjes voor "Let op!"
        Fact::create([
            'title' => 'Let op!',
            'content' => 'Er drijft een ‘plastic eiland’ in de Stille Oceaan dat twee keer zo groot is als Texas. Gooi je blikjes niet in de natuur!',
            'category_id' => $letop->id
        ]);

        Fact::create([
            'title' => 'Let op!',
            'content' => 'Apparaten op standby verbruiken wereldwijd genoeg stroom om miljoenen huizen van energie te voorzien. Kom in actie!',
            'category_id' => $letop->id
        ]);

        Fact::create([
            'title' => 'Let op!',
            'content' => '',
            'category_id' => $letop->id
        ]);

        Fact::create([
            'title' => 'Let op!',
            'content' => '',
            'category_id' => $letop->id
        ]);

        Fact::create([
            'title' => 'Let op!',
            'content' => '',
            'category_id' => $letop->id
        ]);

        Fact::create([
            'title' => 'Let op!',
            'content' => '',
            'category_id' => $letop->id
        ]);
    }
}
