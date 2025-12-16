<x-app-layout>
    <x-slot name="header">
        <x-header-h1>Natuur 30 seconds</x-header-h1>
    </x-slot>

    {{-- Background styling diagonal right component --}}
    <x-styling-arrow-left></x-styling-arrow-left>


    <x-card>
        <section aria-label="Checklist vijf natuur woorden"
                 class="text-white mt-7 flex flex-col  gap-10 text-center w-full">

            <form method="POST" action="{{ route('challenges.update-score') }}" class="w-full">
                @csrf
                <input type="hidden" name="assignment_id" value="{{ $challenge->id }}">
                <div class="flex flex-col gap-10 w-full">
                    <fieldset class="flex flex-col gap-2">
                        <legend class="font-text text-4xl font-bold mb-6 [-webkit-text-stroke:1px_black]">Kruis de
                            woorden aan
                            die
                            goed geraden zijn:
                        </legend>
                        @foreach($challenge->words as $word)
                            <div class="flex items-center gap-4 whitespace-nowrap">
                                {{--checkbox for each word, selected checkboxes go in correct array, value sets submitted if checked,
                                id gives each checkbox unique id  --}}
                                <input type="checkbox" name="correct[]" value="{{$word->id}}" id="word-{{$word->id}}"
                                       class="w-8 h-8">
                                <label for="word-{{$word->id}}"
                                       class=" font-text text-3xl [-webkit-text-stroke:1px_black] max-w-lg">{{$word->name}}</label>
                            </div>
                        @endforeach
                    </fieldset>
                </div>
                <div class="mt-10">
                    <!-- display user score-->
                    <section aria-label="Weergave van gebruiker score" class="flex justify-center">
                        <p class="font-text text-2xl">score: {{ $challenge->score }}</p>
                    </section>

                    <!-- has to be a div to avoid primary action errors-->
                    <div aria-label="Aangekruiste woorden inleveren" class="flex justify-center">
                        <x-form-button type="submit">Voeg score toe</x-form-button>
                    </div>


                </div>

            </form>
        </section>
    </x-card>

</x-app-layout>
