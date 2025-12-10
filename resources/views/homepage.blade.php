<x-app-layout>
    <x-slot name="meta">
        {{-- Makes sure the page refreshes --}}
        <meta http-equiv="refresh" content="10">
    </x-slot>

    <x-styling-homepage-diagonal-background></x-styling-homepage-diagonal-background>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <div class="w-20 text-center">
                <x-h3>Profiel</x-h3>

                <div x-data="{ open: false }" class="relative inline-block text-left">
                    <!-- profile button -->
                    <button @click="open = !open" @click.outside="open = false" class="focus:outline-none">
                        <img class="w-20 cursor-pointer" src="{{ Vite::asset('resources/images/user.png') }}" alt="Ga naar jouw profiel.">
                    </button>

                    <!-- Dropdown styling -->
                    <div x-show="open" x-transition class="absolute center-0 mt-2 w-48 bg-white border rounded-lg shadow-lg z-50">

                        <!-- link to profile page button-->
                        <a href="{{ route('profiel') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                            Profiel
                        </a>

                        <!-- if logged in -->
                        @auth
                        <!-- logout button -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
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

    @auth
        @if(!empty($assignment[0]))
            {{-- if there is a assignment it fills the popup --}}
            <section class="flex flex-col gap-4 bg-primary text-white w-popup
            m-auto rounded-2xl p-4 text-center">
                <x-h3>Je hebt een opdracht!</x-h3>
                <div class="flex gap-4 justify-center">
                    {{-- Makes sure that te person who is player 1 is on this side --}}
                    @if($assignment[0]->role->name === "speler 1")
                        <p>{{ $assignment[0]->user->name }}</p>
                    @else
                        <p>{{ App\Models\User::find($assignment[0]->game->roles[1]->pivot->user_id)->name }}</p>
                    @endif
                    <p>VS</p>
                    {{-- Makes sure that te person who is player 2 is on this side --}}
                    @if($assignment[0]->role->name === "speler 2")
                        <p>{{ $assignment[0]->user->name }}</p>
                    @else
                        <p>{{ App\Models\User::find($assignment[0]->game->roles[2]->pivot->user_id)->name }}</p>
                    @endif
                </div>
                {{-- Route to the challenge index that sends the assignment id --}}
                <div class="w-popupButton m-auto">
                    <x-main-button :href="route('challenges.index', $assignment[0]->id)">Voer uit</x-main-button>
                </div>
            </section>
        @endif
    @endauth

    <section aria-label="Knop om naar challenge uitleg te gaan.">
        <div class="flex justify-center items-center">
            <x-main-button :href="route('challenges.details')">
                {{ __('Begin met challenge') }}
            </x-main-button>
        </div>
    </section>


</x-app-layout>
