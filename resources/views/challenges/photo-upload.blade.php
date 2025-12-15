{{-- resources/views/challenges/photo-upload.blade.php --}}
<x-app-layout>

    {{-- Same background styling as the homepage --}}
    <x-styling-homepage-diagonal-background></x-styling-homepage-diagonal-background>

    {{-- Same header layout as the homepage --}}
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            {{-- Profile button --}}
            <div class="w-20 text-center">
                <x-h3>Profiel</x-h3>
                <img class="w-20"
                     src="{{ Vite::asset('resources/images/user.png') }}"
                     alt="Ga naar je profiel">
            </div>

            {{-- Balance --}}
            <div>
                <x-h3>Balans</x-h3>
                <p class="font-text text-xl" aria-label="Je huidige balans is 1000 bloemen">🌸 1000</p>
            </div>
        </div>
    </x-slot>

    {{-- Page title section (same spacing as homepage) --}}
    <section aria-labelledby="page-title" class="text-white text-center pt-24 p-4">
        <div class="py-4">
            <x-h1>Challenge foto</x-h1>

            <p id="page-description" class="font-text text-2xl text-black">
                Maak een foto voor de challenge en lever ‘m in.
                De scheids of begeleider kan deze later bekijken.
            </p>
        </div>
    </section>

    {{-- Upload block --}}
    <section aria-label="Foto uploaden" class="p-4">
        <section class="max-w-md mx-auto space-y-4">

            <form
                id="photo-form"
                class="space-y-4"
                enctype="multipart/form-data"
                aria-describedby="page-description"
            >
                @csrf

                {{-- File input --}}
                <div class="text-left">
                    <label for="photo" class="block text-sm font-medium text-black">
                        Kies of maak een foto
                    </label>

                    <input
                        id="photo"
                        name="photo"
                        type="file"
                        accept="image/*"
                        capture="environment"
                        aria-label="Kies of maak een foto voor deze challenge"
                        class="block w-full text-sm text-gray-900
                               file:mr-4 file:py-2 file:px-4
                               file:rounded-md file:border-0
                               file:text-sm file:font-semibold
                               file:bg-primary file:text-white
                               hover:file:bg-primary/90"
                    >
                </div>

                {{-- Submit button (same component style usage as homepage) --}}
                <div class="flex justify-center items-center">
                    <button
                        type="submit"
                        class="w-mainButton py-3 rounded-full bg-secondary text-white font-heading text-2xl
                               shadow-lg hover:bg-secondary/90 transition
                               focus:outline-none focus:ring-4 focus:ring-secondary/40"
                        aria-label="Lever deze foto in voor beoordeling en ga terug naar de startpagina"
                    >
                        Foto inleveren
                    </button>
                </div>

                {{-- Status message for screenreaders --}}
                <p
                    id="status-message"
                    class="text-sm text-black font-text text-center"
                    role="status"
                    aria-live="polite"
                ></p>
            </form>

            {{-- Preview area --}}
            <section class="space-y-2" aria-labelledby="preview-title">
                <h2 id="preview-title" class="text-lg font-semibold text-black">
                    Laatst opgeslagen foto
                </h2>

                <div
                    id="photo-preview"
                    class="w-full aspect-video bg-gray-200 border border-dashed border-gray-400
                           flex items-center justify-center text-gray-700 text-sm rounded-md
                           focus:outline-none focus:ring-4 focus:ring-primary/30"
                    tabindex="0"
                    aria-label="Voorbeeld van de laatst opgeslagen challenge-foto. Gebruik Tab om hier naartoe te navigeren."
                >
                    Er is nog geen foto opgeslagen.
                </div>
            </section>

        </section>
    </section>

    {{-- JavaScript for local save + redirect --}}
    @vite('resources/js/photo-upload.js')

</x-app-layout>
