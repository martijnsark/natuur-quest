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
        $wistjedat = Category::firstOrCreate(['name' => 'Wist je dat...']);
        $letop = Category::firstOrCreate(['name' => 'Let op!']);

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

        Fact::create([
            'title' => 'Wist je dat...',
            'content' => 'Veel dieren in het donker leven en ‘s nachts wakker zijn? Fel licht zorgt ervoor dat ze in de war raken en heel moe worden. Zet ‘s nachts je tuinlicht uit en help de dieren in de nacht fijn te leven.',
            'category_id' => $wistjedat->id
        ]);

        Fact::create([
            'title' => 'Wist je dat...',
            'content' => 'Dieren afval snel verwarren met eten? Ze kunnen hier heel ziek van worden en zelfs aan dood gaan. Zie je afval ergens liggen? Ruim dit op om de dieren te laten leven.',
            'category_id' => $wistjedat->id
        ]);

        Fact::create([
            'title' => 'Wist je dat...',
            'content' => 'Dieren door hard geluid gestrest raken? Ze horen elkaar niet meer en kunnen elkaar kwijtraken. Wees rustig in de natuur en laat de dieren rustig leven. ',
            'category_id' => $wistjedat->id
        ]);

        Fact::create([
            'title' => 'Wist je dat...',
            'content' => 'Jonge kleine dieren en planten vaak verstopt zitten naast het pad? Door erop te lopen kunnen ze beschadigd of gewond raken. Blijf op het pad en bescherm de dieren die je niet ziet.',
            'category_id' => $wistjedat->id
        ]);

        Fact::create([
            'title' => 'Wist je dat...',
            'content' => 'Bijen en insecten super belangrijk zijn voor bloemen, planten en fruit maar ze steeds minder plekken hebben om te wonen? Bouw een insectenhotel en redt de bijen.',
            'category_id' => $wistjedat->id
        ]);

        Fact::create([
            'title' => 'Wist je dat...',
            'content' => 'Vlinders met hun poten proeven?! Vlinders zijn erg belangrijke dieren voor de bestuiving van planten!',
            'category_id' => $wistjedat->id
        ]);

        Fact::create([
            'title' => 'Wist je dat...',
            'content' => 'Niet alle lavendel het zelfde ruikt?! Lavendel is een plant die veel bijen en vlinders aantrekt en is dus heel belangrijk voor een bio diverse tuin!',
            'category_id' => $wistjedat->id
        ]);

        Fact::create([
            'title' => 'Wist je dat...',
            'content' => 'Je een margrietje kunt eten?! Margrietjes zijn heel belangrijk voor de biodiversiteit, omdat het een hele waardevolle bloem is voor insecten.',
            'category_id' => $wistjedat->id
        ]);

        Fact::create([
            'title' => 'Wist je dat...',
            'content' => 'Een eikenboom een levend ecosysteem is?! De boom bied onderdak en voedsel voor veel verschillende dieren waaronder vogelsoorten en insecten.',
            'category_id' => $wistjedat->id
        ]);

        Fact::create([
            'title' => 'Wist je dat...',
            'content' => 'Ratten niet kunnen overgeven?! Ratten zijn de belangrijkste opruimers van de natuur doordat ze organisch afval opruimen en de bodemstructuur verbeteren met hun gegraaf.',
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

    }
}
