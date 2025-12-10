<a href="#h1" class="skip-link">Ga naar hoofdinhoud</a>
<x-app-layout>
    <x-bg-animation x-bind:class="animations ? 'animate-pan' : 'animate-none'"></x-bg-animation>
    <x-styling-diagonal-right></x-styling-diagonal-right>
    <x-slot name="header">

        <section class="flex w-full h-full min-h-[13vh] justify-between items-center
        md:justify-start
        md:gap-x-20">

            <!-- Profiel -->
            <div class="flex flex-col items-center text-center space-y-1 order-1 md:order-1">
                <div class="flex flex-col items-center text-center space-y-1">
                    <p class="mb-0 font-heading bg-[#02594c] rounded px-2">Profiel</p>
                </div>
                <div>
                    <img class="w-12" src="{{ Vite::asset('resources/images/user.png') }}" alt="Ga naar je Profiel">
                </div>
            </div>

            <!-- Logo -->
            <a href="https://www.natuurmonumenten.nl/"
               class="flex flex-col items-center text-center order-2 md:order-3">
                <img class="w-36 rounded" src="{{ Vite::asset('resources/images/NM_logo_header.jpg') }}"
                     alt="Ga naar natuurmonumenten">
            </a>

            <!-- Balans -->
            <div class="flex flex-col items-center justify-between text-center h-full gap-3 order-3 md:order-2">
                <div class="flex flex-col items-center text-center space-y-1">
                    <p class="mb-0 font-heading bg-[#02594c] rounded px-2">Balans</p>
                </div>
                <div class="flex">
                    <p class="font-text text-xl">🌸 1000</p>
                </div>
            </div>

            {{--            <!-- Toggle Button voor animations -->--}}
            {{--            <button x-on:click="animations = !animations" class="px-3 py-1 rounded bg-white text-black shadow-md">--}}
            {{--                <span x-text="animations ? 'Animaties uit' : 'Animaties aan'"></span>--}}
            {{--            </button>--}}

        </section>

    </x-slot>

    <section aria-labelledby="NatuurQuestTitle" class="text-white text-center pt-24 p-4">
        <div class="py-4">
            <x-h1>Natuurquest</x-h1>
            <p class="font-text text-2xl text-white">Verken de natuur op een actieve, maar speelse manier! Speel alleen,
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
                        alt="Feitjes markeerstift"
                        class="w-full h-auto max-h-28 rounded-lg mx-auto
                        max-w-[220px] sm:max-w-[280px] md:max-w-[320px]"


                    >
                    <!-- Overlay tekst -->
                    <div
                        class="absolute inset-0 flex flex-col items-center justify-center text-black  p-4 rounded-lg -translate-x-1 -translate-y-2">
                        <h3 class="text-2xl font-bold">Wist je dat?</h3>
                        <p class="font-text leading-none">Spinnen geen insecten zijn?!</p>
                        {{--                        <p class="font-text leading-none">Ze behoren tot de spinachtigen en<br>--}}
                        {{--                        zijn cruciaal tegen insectenoverlast!</p>--}}
                    </div>
                </div>

                <!-- Rechter div: leeg, enkel voor layout -->
                <div class="w-1/2 h-full"></div>
            </div>
        </section>
    </section>

    <section>
        <div class="flex justify-center items-center">
            <x-main-button :href="route('challenges.random')">
                {{ __('Start') }}
            </x-main-button>
        </div>
    </section>

    </div>

</x-app-layout>
