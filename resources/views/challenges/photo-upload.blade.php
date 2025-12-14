{{-- resources/views/challenges/photo-upload.blade.php --}}
<x-app-layout>

    <section
        class="max-w-md mx-auto py-6 px-4 space-y-6"
        aria-labelledby="page-title"
    >
        {{-- Paginatitel --}}
        <header>
            <h1
                id="page-title"
                class="text-2xl font-bold text-gray-900"
            >
                Upload je challenge-foto
            </h1>

            <p
                id="page-description"
                class="mt-1 text-sm text-gray-700"
            >
                Maak een foto voor de challenge en sla deze lokaal op dit apparaat op.
                De scheids of begeleider kan deze later bekijken.
            </p>
        </header>

        {{-- Foto upload formulier (volledig client-side) --}}
        <form
            id="photo-form"
            class="space-y-4"
            enctype="multipart/form-data"
            aria-describedby="page-description"
        >
            @csrf

            {{-- Label voor bestandskeuze --}}
            <label
                for="photo"
                class="block text-sm font-medium text-gray-800"
            >
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

            {{-- Opslaan-knop --}}
            <button
                type="submit"
                class="mt-2 w-full py-2.5 rounded-md bg-secondary text-white font-semibold
                       hover:bg-secondary/90 transition"
                aria-label="Sla de geselecteerde foto op dit apparaat op"
            >
                Foto opslaan op dit apparaat
            </button>

            {{-- Statusmelding (wordt voorgelezen door screenreaders) --}}
            <p
                id="status-message"
                class="text-sm text-gray-800"
                role="status"
                aria-live="polite"
            ></p>
        </form>

        {{-- Preview van opgeslagen foto --}}
        <section
            class="space-y-2"
            aria-labelledby="preview-title"
        >
            <h2
                id="preview-title"
                class="text-lg font-semibold text-gray-900"
            >
                Laatst opgeslagen foto
            </h2>

            {{-- Container waar JS de preview in zet --}}
            <div
                id="photo-preview"
                class="w-full aspect-video bg-gray-200 border border-dashed border-gray-400
                       flex items-center justify-center text-gray-600 text-sm"
                role="img"
                aria-label="Voorbeeld van de laatst opgeslagen challenge-foto"
                tabindex="0"
            >
                Er is nog geen foto opgeslagen.
            </div>
        </section>
    </section>

    {{-- JavaScript voor lokaal opslaan en laden van foto’s --}}
    @vite('resources/js/photo-upload.js')

</x-app-layout>
