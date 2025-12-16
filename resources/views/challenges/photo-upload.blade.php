<x-app-layout>
    <x-styling-homepage-diagonal-background />
    <x-bg-animation x-bind:class="animations ? 'animate-pan' : 'animate-none'" />
    <x-styling-diagonal-right />

    <x-slot name="header">
        <div class="w-full flex items-center justify-center text-center">
            <div class="space-y-1">
                <x-h3>Challenge</x-h3>
                <h2 class="font-heading text-2xl md:text-3xl text-white">
                    Foto uploaden
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="max-w-md mx-auto mt-8 bg-white rounded-xl shadow-md p-6">
        @if (session('success'))
            <div class="mb-4 rounded-lg bg-green-100 text-green-800 px-4 py-2 text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 rounded-lg bg-red-100 text-red-800 px-4 py-2 text-sm">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <p id="status-message" role="status" aria-live="polite" class="text-sm text-gray-700 mb-3"></p>

        @php
            // Waarden uit controller (of old input na validatie error)
            $aid = old('assignment_id', $assignmentId ?? null);
            $wid = old('word_id', $wordId ?? null);

            // Upload blokkeren als ids missen OF controller zegt dat het niet kan
            $dbMissing = empty($aid) || empty($wid) || !empty($blockingError);
        @endphp

        {{-- ✅ Toon blockingError maar 1x --}}
        @if(!empty($blockingError))
            <div class="mb-4 rounded-lg bg-red-100 text-red-800 px-4 py-2 text-sm">
                {{ $blockingError }}
            </div>
        @endif

        {{-- ✅ Alleen de gele melding als er geen blockingError is (anders dubbel) --}}
        @if($dbMissing && empty($blockingError))
            <div class="mb-4 rounded-lg bg-yellow-100 text-yellow-900 px-4 py-2 text-sm">
                Ik kan nu niet uploaden, want er bestaat nog geen geldige <b>assignment</b> en/of <b>word</b> in de database.
                Maak er minimaal 1 aan (of seed je DB) en refresh de pagina.
            </div>
        @endif

        <form id="photo-form" method="POST" action="{{ route('photos.store') }}" enctype="multipart/form-data">
            @csrf

            {{-- ✅ Hidden ids: komen uit de echte flow --}}
            <input type="hidden" name="assignment_id" value="{{ $aid }}">
            <input type="hidden" name="word_id" value="{{ $wid }}">

            <p id="page-description" class="font-text text-2xl text-black">
                Maak een foto voor de challenge en lever ‘m in. De scheids of begeleider kan dit dan nakijken.
            </p>

            <div class="mt-4">
                <label for="photo" class="block text-sm font-medium text-gray-700">Upload je foto</label>
                <input
                    id="photo"
                    name="photo"
                    type="file"
                    accept="image/*"
                    required
                    class="mt-1 block w-full text-sm text-gray-900
                           file:mr-4 file:py-2 file:px-4
                           file:rounded-full file:border-0
                           file:text-sm file:font-semibold
                           file:bg-nav file:text-white
                           hover:file:bg-emerald-700"
                >
            </div>

            <section class="space-y-2 mt-4" aria-labelledby="preview-title">
                <h2 id="preview-title" class="text-lg font-semibold text-black">Preview</h2>

                <div
                    id="photo-preview"
                    class="w-full aspect-video bg-gray-200 border border-dashed border-gray-400
                           flex items-center justify-center text-gray-700 text-sm rounded-md"
                >
                    Er is nog geen foto gekozen.
                </div>
            </section>

            <button
                type="submit"
                @if($dbMissing) disabled @endif
                class="w-full py-2 px-4 rounded-lg bg-secondary text-white font-bold
                       hover:bg-pink-700 transition mt-4 disabled:opacity-50 disabled:cursor-not-allowed"
            >
                Foto uploaden
            </button>
        </form>
    </div>
</x-app-layout>
