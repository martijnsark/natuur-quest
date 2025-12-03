<x-app-layout>
    <x-slot name="header">
        <x-header-h1>Tussenstand:</x-header-h1>
    </x-slot>

    {{-- Background styling diagonal right component --}}
    <x-styling-diagonal-right></x-styling-diagonal-right>

    {{-- Score section --}}
    <section aria-labelledby="score" class="w-full overflow-hidden">
        <div class="text-white pt-28 px-14 flex flex-col items-center gap-8 rotate-2 text-center">
            <x-h2 id="score">Jouw score</x-h2>
            <p class="font-text text-2xl">{{ $points }}</p> {{-- Insert score --}}

            <x-h2>Gespeelde challenges:</x-h2>
            <p class="font-text text-2xl">{{ $challenge }}/3</p> {{-- Insert number of challenges played --}}
        </div>
    </section>

    <section aria-labelledby="fact"
             class="-z-50 w-fact text-white mt-20 py-8 px-6 flex flex-col gap-2 -rotate-2
             bg-[url(../images/backgroundFact.png)] bg-center bg-cover">
        <p id="fact" class="font-heading text-white text-2xl text-shadow-outline">Wist je dat?</p>
        <p class="font-heading text-white text-xl text-shadow-outline">Er zijn 3000 verschillende soorten tulpen
            wereldWijd!</p> {{-- Insert random fact from database --}}
    </section>

    {{-- Button for next game --}}
    <section class="flex w-full justify-center pt-10">
        <div class="w-mainButton">
            <x-main-button :href="route('game-end')"> {{-- Insert route next challenge --}}
                {{ __('Volgende') }}
            </x-main-button>
        </div>
    </section>

</x-app-layout>
