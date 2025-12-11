<x-app-layout>
    {{--    <x-slot name="meta">--}}
    {{--        --}}{{-- Makes sure the page refreshes --}}
    {{--        <meta http-equiv="refresh" content="10">--}}
    {{--    </x-slot>--}}

    <x-styling-homepage-diagonal-background></x-styling-homepage-diagonal-background>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <div class="w-20 text-center">
                <x-h3>Profiel</x-h3>

                <div x-data="{ open: false }" class="relative inline-block text-left">
                    <!-- profile button -->
                    <button @click="open = !open" @click.outside="open = false" class="focus:outline-none">
                        <img class="w-20 cursor-pointer" src="{{ Vite::asset('resources/images/user.png') }}"
                             alt="Ga naar jouw profiel.">
                    </button>

                    <!-- Dropdown styling -->
                    <div x-show="open" x-transition
                         class="absolute center-0 mt-2 w-48 bg-white border rounded-lg shadow-lg z-50">

                        <!-- link to profile page button-->
                        <a href="{{ route('profiel') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                            Profiel
                        </a>

                        <!-- if logged in -->
                        @auth
                            <!-- logout button -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                        class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    Log out
                                </button>
                            </form>
                            <!-- if logged out -->
                        @else
                            <!-- to login page button -->
                            <a href="{{ route('login') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                Log in
                            </a>
                        @endauth
                    </div>

                </div>
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

    <div id="challengePopup">
        @include('components.challenge-popup')
    </div>

    <section aria-label="Knop om naar challenge uitleg te gaan.">
        <div class="flex justify-center items-center">
            <x-main-button :href="route('challenges.connection')">
                {{ __('Begin de challenge') }}
            </x-main-button>
        </div>
    </section>

    {{-- Refreshed only the popup --}}
    <script>
        function refreshPopup() {
            fetch({{ route('refresh') }})
                .then(response => response.text())
                .then(html => {
                    document.getElementById('challengePopup').innerHTML = html;
                });
        }

        // update elke 3 seconden
        setInterval(refreshPopup, 1000);
    </script>

</x-app-layout>
