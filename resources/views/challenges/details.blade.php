<x-app-layout>
    <x-slot name="header">
        <x-header-h1>Natuur 30 seconds</x-header-h1>
    </x-slot>

    <x-styling-arrow-right></x-styling-arrow-right>

    <section aria-label="Uitleg van opdracht 30 seconds"
             class="text-white pt-10 px-14 flex flex-col items-center mt-2 rotate-2 text-center ">
        <p class="font-text text-xl"> Jullie gaan omstebeurt het spel 30 seconds spelen. Je krijgt 5 woorden die met de
            Nederlands natuur te maken hebben en deze ga je proberen uit te leggen, zonder het woord of een deel van het
            woord te zeggen, zodat de andere persoon de woorden kan raden. Je hebt hier 30 seconden voor. Wie de meeste
            woorden heeft kunnen uitleggen
            wint.
    </section>
    <section aria-label="Uitleg van bonus punten verkrijgen"
             class="text-white pt-10 px-14 flex flex-col items-center mt-12 -rotate-2 text-center">
        <p class="font-text text-xl">Nadat jullie beide zijn geweest volgt er nog een bonus ronde. Maak van de goed
            geraden natuur woorden bijpassende
            foto's om bonus punten te verdienen. Deze worden nagekeken door de scheidsrechter.</p>
    </section>
    {{--antwoorden van de challenge--}}
    {{--    <section aria-label="Antwoorden voor de opdracht" class="text-center text-white pt-36">--}}
    {{--        <h2>Rol kiezen</h2>--}}
    {{--        <form method="POST" action="{{ route('challenges.random') }}">--}}
    {{--            @csrf--}}
    {{--            <fieldset>--}}
    {{--                <legend class="font-text text-3xl">Kies uit:</legend>--}}
    {{--                <div class="flex gap-6 justify-center">--}}
    {{--                    <div>--}}
    {{--                        <input type="radio" name="" id="a" value="">--}}
    {{--                        <label class="font-text text-2xl" for="a">speler</label>--}}
    {{--                    </div>--}}

    {{--                    <div>--}}
    {{--                        <input type="radio" name="" id="b" value="b">--}}
    {{--                        <label class="font-text text-2xl" for="b">scheidsrechter</label>--}}
    {{--                    </div>--}}

    {{--                </div>--}}

    {{--            </fieldset>--}}
    {{--            <input type="hidden" name="challenge_id" value="">--}}

    {{--            --}}{{--submit button--}}
    {{--            <div class="flex justify-center">--}}
    {{--                <div class="w-mainButton pt-14">--}}
    {{--                    <x-form-button>{{ __('Start challenge') }}</x-form-button>--}}
    {{--                </div>--}}
    {{--            </div>--}}

    {{--        </form>--}}
    {{--    </section>--}}
    <div class="mt-5">
        <x-main-button :href="route('challenges.play')">
            {{ __('Start') }}
        </x-main-button>
    </div>

</x-app-layout>

