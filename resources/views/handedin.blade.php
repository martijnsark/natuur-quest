<x-app-layout>
    <x-slot name="header">
        <h1 class="font-heading text-white text-4xl text-shadow-outline">Je hebt gewonnen!</h1>
    </x-slot>
    {{-- Background styling divs --}}
    <div class="w-full min-h-screen fixed -z-50 overflow-hidden">
        <div class="bg-primary w-bg h-bg fixed top-28 -left-24 rotate-bg"></div>
        <div class="bg-primary w-bg h-1 fixed top-bg -left-24 rotate-bg"></div>
        <div class="bg-primary w-bg h-bg fixed bottom-16 -left-28 -rotate-bg"></div>
        <div class="bg-primary w-bg h-1 fixed bottom-6 -left-28 -rotate-bg"></div>
    </div>

    {{-- Score section --}}
    <section class="text-white pt-28 px-12 flex flex-col items-center gap-10">
        <div class="flex justify-between w-full items-center">
            <div class="w-20 text-center">
                <img class="w-20" src="{{ Vite::asset('resources/images/user.png') }}" alt="Profiel foto jij">
                <p>Naam</p>
            </div>

            <div>
                <p class="text-xl font-bold">3-2</p>
            </div>

            <div class="w-20 text-center">
                <img class="w-20" src="{{ Vite::asset('resources/images/user.png') }}" alt="Profiel foto je vriend">
                <p>Naam</p>
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
    <section class="text-white text-center pt-32 pb-4">
        <h2 class="text-xl font-bold">Beloning:</h2>
        <p class="text-l font-bold">+ 🌸 500</p>
    </section>

    {{-- balance section --}}
    <section class="text-white text-center p-4">
        <h2 class="text-xl font-bold">Niew balans:</h2>
        <p class="text-l font-bold">🌸 1500</p>
    </section>

    {{-- Button for next game --}}
    <section class="flex w-full justify-center">
        <div class="w-mainButton">
            <x-main-button :href="route('handedin')">
                {{ __('Nieuw spel') }}
            </x-main-button>
        </div>
    </section>

</x-app-layout>
