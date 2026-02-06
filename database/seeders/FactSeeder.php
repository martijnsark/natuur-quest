<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Fact;

class FactSeeder extends Seeder
{
    public function run(): void
    {

        $wistjedat = Category::firstOrCreate(['name' => 'Wist je dat...']);
        $letop = Category::firstOrCreate(['name' => 'Let op!']);

        $facts = [
            $wistjedat->id => [
                'de oehoe, de grootste uilensoort, bedreigd is door verlies van leefgebied en voedselbronnen?',
                'er 60 soorten lieveheersbeestjes zijn in Nederland die de populatie van bladluizen in balans houden?',
                'er 3 soorten slangen in Nederland leven die als roofdier een belangrijke rol spelen in de voedselketen?',
                'een mol zien in jouw tuin een goed teken is? Het betekent dat er veel wormen in jouw tuin zijn, wat planten erg helpt.',
                'wilde planten heel belangrijk zijn voor bijen, vlinders, maar ook voor ons, en dat 40% van de Nederlandse wilde planten onder bedreiging staat?',
                'Het trainen van één AI-model zoals ChatGPT gebruikt duizenden liters water. Genoeg om 10 mensen een jaar lang van drinkwater te voorzien.',
                'Als je lichten uitdoet wanneer je weggaat, energie bespaart en de natuur blij maakt?',
                'Insecten eten veel beter is voor de planeet? Eén kilo krekels veroorzaakt veel minder CO₂-uitstoot dan één kilo rundvlees!',
                'Veel dieren in het donker leven en ’s nachts wakker zijn? Fel licht zorgt ervoor dat ze in de war raken.',
                'Dieren afval snel verwarren met eten? Ze kunnen hier heel ziek van worden.',
                'Dieren door hard geluid gestrest raken? Ze horen elkaar niet meer.',
                'Jonge kleine dieren en planten vaak verstopt zitten naast het pad?',
                'Bijen en insecten super belangrijk zijn voor bloemen, planten en fruit?',
                'Vlinders met hun poten proeven?!',
                'Niet alle lavendel hetzelfde ruikt?!',
                'Je een margrietje kunt eten?!',
                'Een eikenboom een levend ecosysteem is?!',
                'Ratten niet kunnen overgeven?!',
            ],

            $letop->id => [
                'Er drijft een ‘plastic eiland’ in de Stille Oceaan dat twee keer zo groot is als Texas. Gooi je blikjes niet in de natuur!',
                'Apparaten op standby verbruiken wereldwijd genoeg stroom om miljoenen huizen van energie te voorzien. Kom in actie!',
            ],
        ];

        foreach ($facts as $categoryId => $contents) {
            foreach ($contents as $content) {
                Fact::create([
                    'title' => Category::find($categoryId)->name,
                    'content' => $content,
                    'category_id' => $categoryId,
                ]);
            }
        }
    }
}
