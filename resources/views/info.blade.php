<x-app-layout>
    <x-slot name="header">
        <x-header-h1>Natuurquest</x-header-h1>
    </x-slot>

    <x-styling-arrow-left></x-styling-arrow-left>

    <x-card>
        <div class="flex flex-col gap-6">
            <section aria-label="informatie over waar je op moet letten" class="text-center">
                <x-h2>Let op!</x-h2>
                <p class="font-text text-white text-xl">
                    Om NatuurQuest te kunnen spelen moet je in de natuur zijn! Als je dit al bent helemaal goed! Zo niet
                    zorg er dan voor dat je de
                    <a class="underline" href="https://www.natuurmonumenten.nl/routes?page=1">natuur</a>
                    in gaat. Let er ook op dat je met minimaal 3 personen moet zijn om dit spel te kunnen spelen.</p>
            </section>

            <section class="text-center">
                <p class="font-text text-white text-xl">Richtlijnen voor in de natuur:</p>
                <div class="w-secondaryButton m-auto lg:w-secondaryButtonDesktop">
                    <a href="https://www.natuurmonumenten.nl/natuurgebieden/gebiedsregels" target="_blank"
                       class="font-heading text-white text-lg text-shadow-outline
                    flex py-2 bg-secondary items-center font-medium rounded-xl justify-center">Richtlijnen</a>
                </div>
            </section>

            <section aria-label="informatie over het spel" class="text-center mt-7">
                <p class="font-text text-white text-xl">
                    Op dit apparaat zul je de spelleider van het spel zijn. Wil je nou niet de spelleider zijn, zorg er
                    dan voor dat iemand anders naar deze pagina gaat. Als je dit allemaal gelezen hebt en je de
                    spelleider wil zijn, klik dan op de start knop om met NatuurQuest te beginnen!</p>
            </section>
        </div>
    </x-card>

    <div class="w-mainButton m-auto lg:w-mainButtonDesktop mt-2">
        <x-main-button :href="route('challenge-info')">Start</x-main-button>
    </div>

</x-app-layout>
