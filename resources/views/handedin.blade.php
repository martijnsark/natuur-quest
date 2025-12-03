<x-app-layout>
    <x-slot name="header">
        <x-header-h1>Je hebt gewonnen!</x-header-h1>
    </x-slot>

    {{-- Background styling right arrow component --}}
    <x-styling-arrow-right></x-styling-arrow-right>

    {{-- Score section --}}
    <section class="text-white pt-16 px-14 flex flex-col items-center gap-8">
        <x-h2>Eindstand:</x-h2>

        <div class="flex justify-between w-full items-center">
            <div class="w-20 text-center">
                <img class="w-20" src="{{ Vite::asset('resources/images/user.png') }}" alt="Profiel foto jij">
                <p class="font-text text-xl">Jij</p>
            </div>

            <p class="font-heading text-white text-4xl text-shadow-outline">3-2</p>

            <div class="w-20 text-center">
                <img class="w-20" src="{{ Vite::asset('resources/images/user.png') }}" alt="Profiel foto je vriend">
                <p class="font-text text-xl">Je vriend</p>
            </div>
        </div>

        {{-- Answers button --}}
        <div class="w-secondaryButton">
            <x-secondary-button :href="route('handedin')">
                {{ __('Antwoorden') }}
            </x-secondary-button>
        </div>
    </section>

    {{-- Rewards section --}}
    <section class="text-white text-center pt-28 pb-4">
        <x-h2>Beloning:</x-h2>
        <p class="font-text text-2xl">+ 🌸 500</p>
    </section>

    {{-- balance section --}}
    <section class="text-white text-center p-4">
        <x-h3>Niewe balans:</x-h3>
        <p class="font-text text-xl">🌸 1500</p>
    </section>

    {{-- Button for next game --}}
    <section class="flex w-full justify-center pt-4">
        <div class="w-mainButton">
            <x-main-button :href="route('handedin')">
                {{ __('Nieuw spel') }}
            </x-main-button>
        </div>
    </section>

</x-app-layout>
