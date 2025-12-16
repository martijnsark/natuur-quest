<x-app-layout>
    <x-slot name="header">
        <x-header-h1>Natuurquest</x-header-h1>
    </x-slot>

    <x-styling-arrow-left></x-styling-arrow-left>

    <x-card>
        <div class="flex flex-col gap-6">
            <section aria-label="informatie over spel" class="text-center">
                <p class="font-text text-white text-xl">
                    Welkom spelleider! Op de volgende pagina ga je spelers toevoegen aan het spel. Dit spel begint met
                    een ronde van 30 seconds waar de spelers om de beurt 5 woorden aan elkaar moeten uitleggen. Hierna
                    gaan ze van 1 van deze woorden een foto maken. Jouw taak in dit spel is het beoordelen en goed- of
                    afkeuren van de antwoorden.</p>
            </section>
        </div>


        <div class="w-mainButton m-auto lg:w-mainButtonDesktop mt-14">
            <x-main-button :href="route('home')">Toch geen spelleider zijn?</x-main-button>
        </div>

        {{-- If the user is not logedin then it shows login button --}}
        @if(\Illuminate\Support\Facades\Auth::user())
            <div class="w-mainButton m-auto lg:w-mainButtonDesktop mt-2">
                <x-main-button :href="route('challenges.connection')">Start</x-main-button>
            </div>
        @else
            <div class="w-mainButton m-auto lg:w-mainButtonDesktop mt-2">
                <x-main-button :href="route('login')">Login</x-main-button>
            </div>
        @endif
    </x-card>

</x-app-layout>
