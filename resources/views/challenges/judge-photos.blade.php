<x-app-layout>
    {{-- Pagina header (bovenin je layout) --}}
    <x-slot name="header">
        <div class="w-full flex items-center justify-center text-center">
            <div class="space-y-1">
                {{-- Kleine titel bovenaan --}}
                <x-h3>Spelleider</x-h3>

                {{-- Hoofdtitel van deze pagina --}}
                <h2 class="font-heading text-2xl md:text-3xl text-white">
                    Beoordeel foto’s
                </h2>
            </div>
        </div>
    </x-slot>

    {{-- Content container --}}
    <div class="max-w-5xl mx-auto mt-8 bg-white rounded-xl shadow-md p-6">

        {{-- Error melding (bijv. als er geen 2 spelers of geen foto's zijn) --}}
        @if ($error)
            <div class="mb-4 rounded-lg bg-red-100 text-red-800 px-4 py-2 text-sm">
                {{ $error }}
            </div>
        @endif

        {{-- Context: welk woord wordt beoordeeld?
             We ondersteunen twee mogelijke kolomnamen: nature_word (oud) en word (ERD) --}}
        <p class="text-lg font-semibold text-gray-900">
            Woord:
            <span class="font-bold">{{ $word?->nature_word ?? $word?->word ?? 'Onbekend' }}</span>
        </p>

        {{-- Alleen het beoordelingsformulier tonen als er geen error is --}}
        @if(!$error)

            {{-- Form om de winnaar te kiezen en op te slaan (POST) --}}
            <form method="POST" action="{{ route('test.judgePhotos.store', $game->id) }}" class="mt-6">
                @csrf

                {{-- Belangrijk: deze word_id geeft aan welke "foto-ronde" je beoordeelt.
                     ChallengeController gebruikt dit om de juiste foto's te selecteren. --}}
                <input type="hidden" name="word_id" value="{{ $wordId }}">

                {{-- We tonen twee kaarten (2 spelers), responsive: 1 kolom mobiel, 2 kolommen desktop --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- $entries komt uit ChallengeController@judgePhotos:
                         Elke entry bevat: user, assignment, photo (kan null zijn) --}}
                    @foreach($entries as $entry)

                        {{-- Kaart per speler --}}
                        <article class="rounded-xl border p-4">

                            {{-- Header: speler naam + radio button om winnaar te kiezen --}}
                            <header class="flex items-center justify-between">
                                <h3 class="font-bold text-xl">{{ $entry['user']->name }}</h3>

                                {{-- Radio: er kan maar één winnaar gekozen worden --}}
                                <label class="flex items-center gap-2 font-semibold">
                                    <input
                                        type="radio"
                                        name="winner_user_id"
                                        value="{{ $entry['user']->id }}"
                                        required
                                    >
                                    Winnaar
                                </label>
                            </header>

                            {{-- Foto preview / placeholder --}}
                            <div class="mt-4">
                                @if($entry['photo'])
                                    {{-- Foto bestaat: laat hem zien.
                                         Let op: foto path komt uit DB (photos.photo) en staat in storage/public. --}}
                                    <img
                                        src="{{ asset('storage/' . $entry['photo']->photo) }}"
                                        alt="Ingezonden foto van {{ $entry['user']->name }}"
                                        class="w-full aspect-video object-cover rounded-lg border"
                                    >
                                @else
                                    {{-- Geen foto gevonden voor deze speler en dit word_id --}}
                                    <div class="w-full aspect-video flex items-center justify-center bg-gray-100 text-gray-700 rounded-lg border">
                                        Geen foto ingezonden
                                    </div>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </div>

                {{-- Submit knop: spelleider bevestigt winnaar --}}
                <div class="mt-8 flex justify-end">
                    <button
                        class="inline-flex items-center justify-center rounded-md bg-secondary px-5 py-3 text-white font-bold
                               hover:bg-secondary/90 transition focus:outline-none focus:ring-4 focus:ring-secondary/40"
                        type="submit"
                    >
                        Geef punt aan winnaar
                    </button>
                </div>
            </form>
        @endif
    </div>
</x-app-layout>
