<x-app-layout>

    <x-styling-homepage-diagonal-background></x-styling-homepage-diagonal-background>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <!-- Profiel button -->
            <div class="w-20 text-center">
                <x-h3>Profiel</x-h3>
                <img class="w-20" src="{{ Vite::asset('resources/images/user.png') }}" alt="Ga naar je Profiel">
            </div>

            <!-- Balans -->
            <div>
                <x-h3>Balans</x-h3>
                <p class="font-text text-xl">🌸 1000</p>
            </div>
        </div>
    </x-slot>

    <section aria-labelledby="NatuurQuestTitle" class="text-white text-center pt-24 p-4">
        <div class="py-4">
            <x-h1>Natuurquest</x-h1>
            <p class="font-text text-2xl text-black">Verken de natuur op een actieve, maar speelse manier! Speel alleen,
                met of tegen je vrienden!</p>
        </div>
        <div class="py-4">

        </div>
    </section>

    <section aria-labelledby="NatuurFeitje" class="flex flex-row text-center pt-24 p-4">
        <section class="w-full p-4">
            <div class="flex flex-row gap-4">
                <!-- Linker div: afbeelding + overlay tekst -->
                <div class="w-3/5 relative -rotate-12 -translate-x-8 -translate-y-4">
                    <img
                        src="{{ Vite::asset('resources/images/backgroundFact.png') }}"
                        alt="Highlight marker"
                        class="w-full h-[120px] rounded-lg"
                    >
                    <!-- Overlay tekst -->
                    <div class="absolute inset-0 flex flex-col items-center justify-center text-black  p-4 rounded-lg">
                        <h3 class="text-2xl font-bold">Wist je dat?</h3>
                        <p class="font-text leading-none">Spinnen geen insecten zijn?!</p>
                    </div>
                </div>

                <!-- Rechter div: leeg, enkel voor layout -->
                <div class="w-1/2 h-full"></div>
            </div>
        </section>
    </section>

    <section>
        <div class="flex justify-center items-center">
            <x-main-button :href="route('challenges.details')">
                {{ __('Begin met challenge') }}
            </x-main-button>
        </div>
    </section>


</x-app-layout>
