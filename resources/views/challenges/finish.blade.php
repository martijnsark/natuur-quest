<x-app-layout>
    <x-slot name="header">
        <x-header-h1>Natuur 30 seconds</x-header-h1>
    </x-slot>

    {{-- Background styling diagonal right component --}}
    <x-styling-arrow-left></x-styling-arrow-left>


    <x-card>
        <section aria-label="Checklist vijf natuur woorden"
                 class="text-white mt-7 flex flex-col items-center gap-10 text-center w-full">

            <form method="POST" action="{{ route('challenges.update-score') }}">
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
                    <section aria-label="Aangekruiste woorden inleveren" class="w-mainButton m-auto">
                        <x-form-button type="submit">Voeg score toe</x-form-button>
                    </section>
                </div>
                <p class="font-text text-2xl">score: {{ $challenge->score }}</p>
            </form>
        </section>
    </x-card>


    {{-- Score section --}}
    {{--    <section aria-labelledby="score" class="w-full overflow-hidden">--}}
    {{--        <div class="text-white pt-28 px-14 flex flex-col items-center gap-8 rotate-2 text-center">--}}
    {{--            <x-h2 id="score">Jouw score</x-h2>--}}
    {{--            <p class="font-text text-2xl">{{ $points }}</p> --}}{{-- Insert score --}}

    {{--            <x-h2>Gespeelde challenges:</x-h2>--}}
    {{--            <p class="font-text text-2xl">{{ $challenge }}/3</p> --}}{{-- Insert number of challenges played --}}
    {{--        </div>--}}
    {{--    </section>--}}

    {{--    <section aria-labelledby="fact"--}}
    {{--             class="-z-50 w-fact text-white mt-20 py-8 px-6 flex flex-col gap-2 -rotate-2--}}
    {{--             bg-[url(../images/backgroundFact.png)] bg-center bg-cover">--}}
    {{--        <p id="fact" class="font-heading text-white text-2xl text-shadow-outline">Wist je dat?</p>--}}
    {{--        <p class="font-heading text-white text-xl text-shadow-outline">Er zijn 3000 verschillende soorten tulpen--}}
    {{--            wereldWijd!</p> --}}{{-- Insert random fact from database --}}
    {{--    </section>--}}

    {{--    --}}{{-- Button for next game --}}
    {{--    <section class="flex w-full justify-center pt-10">--}}
    {{--        <div class="w-mainButton">--}}
    {{--            <x-main-button :href="route('game-end')"> --}}{{-- Insert route next challenge --}}
    {{--                {{ __('Volgende') }}--}}
    {{--            </x-main-button>--}}
    {{--        </div>--}}
    {{--    </section>--}}

</x-app-layout>
