<x-app-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-bold text-white text-center">Feitjes</h1>
    </x-slot>

    <section class="flex justify-center items-center min-h-[70vh]">
        @if ($facts)
            <x-fact-area :facts="$facts"/>
        @else
            <p class="text-white text-center">Geen feitje gevonden.</p>
        @endif
    </section>

    <section class="flex flex-col items-center min-h-[20vh]">
        <p>
            Score: <span class="font-bold text-xl">{{ $score }}</span>
        </p>

        {{-- Alleen als er überhaupt score is --}}
        @if ($score > 0)

            {{-- 1) Als speler nog NIET heeft geüpload -> knop naar photo-upload --}}
            @if (!$hasUploaded)
                @if($photoWordId)
                    <a
                        href="{{ route('photos.create', ['assignment_id' => $assignment->id, 'word_id' => $photoWordId]) }}"
                        class="mt-4 px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700"
                    >
                        Ga naar foto-upload
                    </a>
                @else
                    <p class="mt-4 text-white">Geen woord gevonden voor de foto-ronde.</p>
                @endif

                {{-- 2) Wel geüpload maar nog NIET beoordeeld -> geen knop (wachten) --}}
            @elseif (!$photoJudged)
                <p class="mt-4 text-white">
                    Foto ingestuurd. Wacht op de spelleider.
                </p>

                {{-- 3) Beoordeeld -> eindig spel knop --}}
            @else
                <form action="{{ route('game.deactivate') }}" method="POST" class="mt-4">
                    @csrf
                    <button
                        type="submit"
                        class="px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700"
                    >
                        Eindig spel voor beide spelers
                    </button>
                </form>
            @endif
        @endif
    </section>
</x-app-layout>
