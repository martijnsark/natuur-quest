<a href="#h1" class="skip-link">Ga naar hoofdinhoud</a>
<x-app-layout>
    {{--    <x-slot name="meta">--}}
    {{--        --}}{{-- Makes sure the page refreshes --}}
    {{--        <meta http-equiv="refresh" content="10">--}}
    {{--    </x-slot>--}}

    <x-styling-homepage-diagonal-background></x-styling-homepage-diagonal-background>
    <x-bg-animation x-bind:class="animations ? 'animate-pan' : 'animate-none'"></x-bg-animation>
    <x-styling-diagonal-right></x-styling-diagonal-right>
    <x-slot name="header">
        <div class="flex items-center
                justify-between
                gap-44
                md:justify-start        <!-- desktop: alles links -->
                md:gap-4">

            <!-- Profiel -->
            <div class="flex flex-col items-center gap-2">
                <x-h3>Profiel</x-h3>

                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" @click.outside="open = false" class="focus:outline-none">
                        <img class="w-12 cursor-pointer"
                             src="{{ Vite::asset('resources/images/user.png') }}"
                             alt="Ga naar jouw profiel">
                    </button>

                    <div x-show="open" x-transition
                         class="absolute mt-2 w-48 bg-white border rounded-lg shadow-lg z-50">

                        <a href="{{ route('profiel') }}"
                           class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                            Profiel
                        </a>

                        @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                        class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    Log out
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}"
                               class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                Log in
                            </a>
                        @endauth
                    </div>
                </div>
            </div>

            <!-- Balans -->
            <div class="flex flex-col text-right md:text-left">
                <x-h3>Balans</x-h3>
                <p class="font-text text-xl"> 🌸{{ $balance ?? 0 }}</p>
            </div>

        </div>
    </x-slot>

    <section aria-labelledby="NatuurQuestTitel" class="text-white text-center pt-24 p-4">
        <div class="py-4">
            <x-h1
                aria-label="NatuurQuest. Verken de natuur op een actieve, maar speelse manier! Speel alleen,met of tegen je vrienden!">
                Natuurquest
            </x-h1>
            <p class="font-text text-2xl text-white">Verken de natuur op een actieve, maar speelse manier! Speel alleen,
                met of tegen je vrienden!</p>
        </div>
        <div class="py-4">

        </div>
    </section>

    <section aria-labelledby="NatuurFeitje" class="flex flex-row text-center pt-24 p-4">
        <section class="w-full p-4">
            <div class="flex flex-row gap-4 translate-y-8">
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
                        <p class="font-text leading-none">Ze behoren tot de spinachtigen en<br>
                            zijn cruciaal tegen insectenoverlast!</p>
                    </div>
                </div>

                <!-- Rechter div: leeg, enkel voor layout -->
                <div class="w-1/2 h-full"></div>
            </div>
        </section>
    </section>

    @auth()
        <div id="challengePopup">
            @include('components.challenge-popup')
        </div>

        {{-- Refreshed only the popup --}}
        <script>
            function refreshPopup() {
                fetch('{{ route('refresh') }}')
                    .then(response => response.text())
                    .then(html => {
                        document.getElementById('challengePopup').innerHTML = html;
                    });
            }

            // update elke 3 seconden
            setInterval(refreshPopup, 1000);
        </script>
    @endauth

    <section aria-label="Knop om naar challenge uitleg te gaan.">
        <div class="flex justify-center items-center translate-y-1">
            <x-main-button :href="route('challenges.details')">
                {{ __('Begin met spelen!') }}
            </x-main-button>
        </div>
    </section>


</x-app-layout>
