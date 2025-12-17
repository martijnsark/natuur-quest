<a href="#h1" class="skip-link">Ga naar hoofdinhoud</a>
<x-app-layout>

    <x-styling-diagonal-right></x-styling-diagonal-right>
    <x-slot name="header">
        <div class="flex items-center w-full">


            <!-- Profiel -->
            <div class="flex-1 flex justify-start">
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
            </div>

            <div class="flex-1 flex justify-center">
                <div>
                    <a href="https://www.natuurmonumenten.nl/"
                       target="_blank"
                       rel="noopener noreferrer">
                        <img class="w-26 md:w-28 cursor-pointer transition-transform hover:scale-105"
                             src="{{ Vite::asset('resources/images/NM_logo_header.jpg') }}"
                             alt="Ga naar de website van NatuurMonumenten">
                    </a>
                </div>
            </div>

            <!-- Balans -->
            <div class="flex-1 flex justify-end">
                <div class="flex flex-col text-center">
                    <x-h3>Balans</x-h3>
                    <p class="font-text text-xl"> 🌸{{ auth()->user()->balance ?? 0 }}</p>
                </div>
            </div>

        </div>
    </x-slot>

    <x-card>
        <section aria-labelledby="NatuurQuestTitel" class="text-white text-center pt-10 p-4">
            <div class="py-4">
                <x-h1
                    aria-label="NatuurQuest. Verken de natuur op een actieve, maar speelse manier! Speel alleen,met of tegen je vrienden!">
                    Natuurquest
                </x-h1>
                <p class="font-text text-2xl text-white">Verken de natuur op een actieve, maar speelse manier! Speel
                    tegen je vrienden en verdien punten!</p>
            </div>
            <div class="py-4">

            </div>
        </section>
    </x-card>

    <!-- Hardcoded Feitje -->
    <div class="flex justify-start mt-8 px-4">
        <div class="relative w-6/12 md:w-1/3 max-w-sm md:max-w-md -translate-y-6 border-4 border-[#F6692C] border-transparent
                bg-primary rounded-3xl skew-x-2 shadow-lg overflow-hidden">

            <!-- Styling bolletjes -->
            <div class="absolute bottom-0 -right-4 w-8 h-8 md:w-16 md:h-16 bg-[#F6692C] rounded-full opacity-70"></div>
            <div
                class="absolute top-4 right-6 w-6 h-6 md:w-10 md:h-10 bg-[#F6692C] rounded-full rotate-12 opacity-70"></div>
            <div class="absolute bottom-1/4 -left-3 w-6 h-6 md:w-12 md:h-12 bg-[#F6692C] rounded-full opacity-70"></div>

            <!-- Title vak -->
            <div class="w-4/5 md:w-1/2 bg-[#F6692C] text-white text-center py-2 md:py-3 px-4 md:px-6 overflow-auto
                    rounded-br-3xl font-bold text-base md:text-xl font-sans">
                Let op!
            </div>

            <!-- Content vak -->
            <div class="p-6 text-white">
                <p class="text-sm md:text-base leading-relaxed">
                    In NatuurQuest krijg je feitjes te zien over de natuur! <br>
                    Wordt jij de nieuwe natuur-wetenschapper?
                </p>
            </div>
        </div>
    </div>

    @if(session('status'))
        <div class="flex justify-center mb-4">
            <div class="relative w-full max-w-xs bg-primary text-white rounded-2xl shadow-md px-4 py-2 text-center">
                <!-- Status message -->
                <p class="font-semibold text-sm md:text-base">
                    {{ session('status') }}
                </p>
            </div>
        </div>
    @endif

    <div class="flex justify-center items-center mb-2">
        <x-main-button :href="route('challenges.details')">
            {{ __('Kijk voor uitnodigingen') }}
        </x-main-button>
    </div>

    <section aria-label="Knop om naar challenge uitleg te gaan.">
        <div class="flex justify-center items-center mb-2">
            <x-main-button :href="route('info')">
                {{ __('Begin met spelen!') }}
            </x-main-button>
        </div>
    </section>


</x-app-layout>
