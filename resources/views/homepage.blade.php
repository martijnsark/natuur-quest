<a href="#h1" class="skip-link">Ga naar hoofdinhoud</a>
<x-app-layout>
    {{--    <x-slot name="meta">--}}
    {{--        --}}{{-- Makes sure the page refreshes --}}
    {{--        <meta http-equiv="refresh" content="10">--}}
    {{--    </x-slot>--}}

    <x-styling-homepage-diagonal-background></x-styling-homepage-diagonal-background>
    {{--    <x-bg-animation x-bind:class="animations ? 'animate-pan' : 'animate-none'"></x-bg-animation>--}}
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
                <p class="font-text text-xl">🌸 1000</p>
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

    <x-fact-area class="flex-end" :title="'Hallo daar :)'">
        <p>Dit wordt ons feitje<br>
            Best cool he!</p>
    </x-fact-area>

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
            <x-main-button :href="route('challenges.connection')">
                {{ __('Begin met spelen!') }}
            </x-main-button>
        </div>
    </section>

</x-app-layout>
