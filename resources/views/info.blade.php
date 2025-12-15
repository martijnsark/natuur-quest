<x-app-layout>
    <x-slot name="header">
        <x-header-h1>Natuurquest</x-header-h1>
    </x-slot>

    <x-styling-arrow-left></x-styling-arrow-left>

    <x-card>
        <div class="flex flex-col gap-12">
            <section aria-label="informatie over waar je op moet letten" class="text-center">
                <x-h2>Let op!</x-h2>
                <p class="font-text text-white text-xl">
                    Om NatuurQuest te kunnen spelen moet je in de natuur zijn! Als je dit al bent helemaal goed! Zo niet
                    zorg er dan voor dat je de
                    <a class="underline" href="https://www.natuurmonumenten.nl/routes?page=1">natuur</a>
                    in gaat. Let er ook op dat je met minimaal 3 personen moet zijn om dit spel te kunnen spelen.</p>
            </section>

            <div class="w-secondaryButton m-auto">
                <a href="https://www.natuurmonumenten.nl/natuurgebieden/gebiedsregels" target="_blank"
                   class="font-heading text-white text-lg text-shadow-outline
                    flex py-2 bg-secondary items-center font-medium rounded-xl justify-center">Richtlijnen</a>
            </div>

            <section aria-label="informatie over het spel" class="text-center">
                <p class="font-text text-white text-xl">
                    Op dit apparaat zal je de spelleider worden van het spel. Wil je nou niet de spelleider worden zorg
                    dan dat iemand anders naar deze pagina verder zal gaan. Als je dit allemaal gelezen hebt en je de
                    spelleider wilt zijn klik dan op de onderstaande knop!</p>
            </section>
        </div>
    </x-card>

    {{-- If the user is not logedin then it shows login button --}}
    @if(\Illuminate\Support\Facades\Auth::user())
        <div class="w-mainButton m-auto">
            <x-main-button :href="route('challenges.connection')">Start</x-main-button>
        </div>
    @else
        <div class="w-mainButton m-auto">
            <x-main-button :href="route('login')">Login</x-main-button>
        </div>
    @endif

</x-app-layout>
