<x-app-layout>
    <x-slot name="header">
        <div class="w-full flex items-center justify-center text-center">
            <div class="space-y-1">
                <x-h3>Spelleider</x-h3>
                <h2 class="font-heading text-2xl md:text-3xl text-white">
                    Beoordeel foto’s
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="max-w-5xl mx-auto mt-8">

        {{-- 🔙 Terug naar spelleider overzicht --}}
        <div class="mb-6">
            <a
                href="{{ route('test.show', ['id' => $game->id]) }}"
                class="inline-flex items-center justify-center
                       rounded-md bg-primary/90 p-4 px-5 py-3
                       text-white font-bold
                       hover:bg-primary/90 p-4 transition
                       focus:outline-none focus:ring-4 focus:ring-secondary/40"
            >
                Terug naar overzicht
            </a>
        </div>

        {{-- 🟣 Hoofdcontainer --}}
        <div class="rounded-xl bg-primary/90 p-4 shadow-lg p-6 text-white">

            {{-- Foutmelding --}}
            @if ($error)
                <div class="mb-4 rounded-lg bg-primary/90 p-4 text-white px-4 py-2 text-sm font-semibold">
                    {{ $error }}
                </div>
            @endif

            {{-- Succesmelding --}}
            @if (session('success'))
                <div class="mb-4 rounded-lg bg-green-600 text-white px-4 py-2 text-sm font-semibold">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Woord --}}
            <p class="text-lg font-semibold">
                Woord:
                <span class="font-extrabold underline">
                    {{ $word?->nature_word ?? $word?->word ?? 'Onbekend' }}
                </span>
            </p>

            @if(!$error)
                <form method="POST" action="{{ route('test.judgePhotos.store', $game->id) }}" class="mt-6">
                    @csrf
                    <input type="hidden" name="word_id" value="{{ $wordId }}">

                    {{-- 🟣 Spelers --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($entries as $entry)
                            <article class="rounded-xl bg-primary/90 p-4 border border-white/20">

                                <header class="flex items-center justify-between mb-3">
                                    <h3 class="font-bold text-xl">
                                        {{ $entry['user']->name }}
                                    </h3>

                                    {{-- Winnaar radio --}}
                                    <label class="flex items-center gap-2 font-semibold cursor-pointer">
                                        <input
                                            type="radio"
                                            name="winner_user_id"
                                            value="{{ $entry['user']->id }}"
                                            required
                                            class="w-5 h-5 accent-pink-500 focus:ring-4 focus:ring-pink-400"
                                        >
                                        Winnaar
                                    </label>
                                </header>

                                {{-- Foto --}}
                                <div>
                                    @if($entry['photo'])
                                        <img
                                            src="{{ asset('storage/' . $entry['photo']->photo) }}"
                                            alt="Ingezonden foto van {{ $entry['user']->name }}"
                                            class="w-full aspect-video object-cover rounded-lg border border-white/30"
                                        >
                                    @else
                                        <div class="w-full aspect-video flex items-center justify-center
                                                    bg-purple-800 text-white rounded-lg border border-white/30">
                                            Geen foto ingezonden
                                        </div>
                                    @endif
                                </div>

                            </article>
                        @endforeach
                    </div>

                    {{-- 🟣 Actieknop --}}
                    <div class="mt-8 flex justify-end">
                        <button
                            type="submit"
                            class="inline-flex items-center justify-center
                                   rounded-md bg-pink-600 px-6 py-3
                                   text-white font-extrabold text-lg
                                   hover:bg-pink-700 transition
                                   focus:outline-none focus:ring-4 focus:ring-pink-400"
                        >
                            Geef punt aan winnaar
                        </button>
                    </div>
                </form>
            @endif
        </div>
    </div>
</x-app-layout>
