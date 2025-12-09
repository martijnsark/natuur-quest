<x-app-layout>
    <x-slot name="meta">
        {{-- Makes sure the page refreshes --}}
        <meta http-equiv="refresh" content="30">
    </x-slot>

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
                        <p>{{ App\Models\User::find($assignment[0]->game->roles[0]->pivot->user_id)->name }}</p>
                    @endif
                    <p>VS</p>
                    {{-- Makes sure that te person who is player 2 is on this side --}}
                    @if($assignment[0]->role->name === "speler 2")
                        <p>{{ $assignment[0]->user->name }}</p>
                    @else
                        <p>{{ App\Models\User::find($assignment[0]->game->roles[1]->pivot->user_id)->name }}</p>
                    @endif
                </div>
                {{-- Route to the challenge index that sends the assignment id --}}
                <div class="w-popupButton m-auto">
                    <x-main-button :href="route('challenges.index', $assignment[0]->id)">Voer uit</x-main-button>
                </div>
            </section>
        @endif
    @endauth

    <section>
        <div class="flex justify-center items-center mt-5">
            <x-main-button :href="route('challenges.random')">
                {{ __('Start') }}
            </x-main-button>
        </div>
    </section>


</x-app-layout>
