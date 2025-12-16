<x-app-layout>
    <x-slot name="header">
        <x-header-h1>Natuur 30 seconds</x-header-h1>
    </x-slot>

    <x-styling-arrow-left></x-styling-arrow-left>

    <x-card>
        <section aria-label="Checklist vijf natuur woorden"
                 class="text-white mt-7 flex flex-col items-center gap-10 text-center w-full">

            <form method="POST" action="{{ route('challenges.update-score') }}">
                @csrf
                <input type="hidden" name="assignment_id" value="{{ $challenge->id }}">

                <div class="flex flex-col gap-10 w-full">
                    <fieldset class="flex flex-col gap-2">
                        <legend class="font-text text-4xl font-bold mb-6 [-webkit-text-stroke:1px_black]">
                            Kruis de woorden aan die goed geraden zijn:
                        </legend>

                        @foreach($challenge->words as $word)
                            <div class="flex items-center gap-4 whitespace-nowrap">
                                <input
                                    type="checkbox"
                                    name="correct[]"
                                    value="{{ $word->id }}"
                                    id="word-{{ $word->id }}"
                                    class="w-8 h-8"
                                >
                                <label
                                    for="word-{{ $word->id }}"
                                    class="font-text text-3xl [-webkit-text-stroke:1px_black] max-w-lg"
                                >
                                    {{ $word->name }}
                                </label>
                            </div>
                        @endforeach
                    </fieldset>
                </div>

                <div class="mt-10">
                    <section aria-label="Weergave van gebruiker score" class="w-mainButton m-auto">
                        <p class="font-text text-2xl">score: {{ $challenge->score }}</p>
                    </section>

                    <div aria-label="Aangekruiste woorden inleveren" class="w-mainButton m-auto">
                        <x-form-button type="submit">Voeg score toe</x-form-button>
                    </div>

                    @php
                        $authUser = auth()->user();
                        $isOwner = $authUser && ((int)$challenge->user_id === (int)$authUser->id);

                        // Kies het woord dat bij de foto-challenge hoort (nu: eerste woord op deze assignment)
                        $photoWordId = optional($challenge->words->first())->id;
                    @endphp

                    {{-- Foto uploaden alleen voor de speler die deze assignment heeft --}}
                    @if($isOwner)
                        @if($photoWordId)
                            <div class="mt-8 w-mainButton m-auto" aria-label="Foto challenge uploaden">
                                <x-main-button
                                    :href="route('photos.create', ['assignment_id' => $challenge->id, 'word_id' => $photoWordId])"
                                >
                                    Foto uploaden
                                </x-main-button>
                            </div>
                        @else
                            <div class="mt-8 rounded-lg bg-yellow-100 text-yellow-900 px-4 py-2 text-sm">
                                Er zijn nog geen woorden gekoppeld aan deze challenge, dus foto-upload kan nog niet.
                            </div>
                        @endif
                    @endif
                </div>
            </form>
        </section>
    </x-card>
</x-app-layout>
