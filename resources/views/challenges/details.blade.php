<x-app-layout>
    <x-slot name="header">
        <x-header-h1>Natuur 30 seconds</x-header-h1>
    </x-slot>

    <x-styling-arrow-right></x-styling-arrow-right>

    <div class="hidden lg:flex lg:flex-col lg:items-center lg:justify-center">
        <x-card>
            <section aria-label="Uitleg van opdracht 30 seconds"
                     class="text-white flex flex-col items-center text-center ">
                <p class="font-text text-xl max-w-xl"> Jullie spelen om de beurt. Je krijgt 5 woorden over de
                    Nederlandse
                    natuur. Leg
                    deze
                    uit zonder het woord of een deel ervan te zeggen, zodat de andere kan raden. Je hebt 30 seconden per
                    beurt.
                    Wie de meeste woorden raadt, wint!
            </section>
            <section aria-label="Uitleg van bonus punten verkrijgen"
                     class="text-white flex flex-col items-center text-center">
                <p class="font-text text-xl max-w-lg"> Na jullie beurten is er een bonus ronde. Maak van de goed geraden
                    natuurwoorden
                    een bijpassende foto. De scheidsrechter kijkt jullie creaties na en geeft bonuspunten!</p>
            </section>
        </x-card>
    </div>

    {{--phone--}}
    <div class="lg:hidden space-y-18 px-6">
        <section aria-label="Uitleg van opdracht 30 seconds"
                 class="text-white pt-10 px-14 lg:px-40 flex flex-col items-center mt-19 rotate-2 lg:rotate-0 text-center ">
            <p class="font-text text-xl max-w-lg"> Jullie spelen om de beurt. Je krijgt 5 woorden over de Nederlandse
                natuur. Leg
                deze
                uit zonder het woord of een deel ervan te zeggen, zodat de andere kan raden. Je hebt 30 seconden per
                beurt.
                Wie de meeste woorden raadt, wint!
        </section>
        <section aria-label="Uitleg van bonus punten verkrijgen"
                 class="text-white pt-10 px-14 flex flex-col items-center mt-20 -rotate-2 lg:rotate-0 text-center">
            <p class="font-text text-xl max-w-lg"> Na jullie beurten is er een bonus ronde. Maak van de goed geraden
                natuurwoorden
                een bijpassende foto.De scheidsrechter kijkt jullie creaties na en geeft bonuspunten!</p>
        </section>
    </div>


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
    <div class="mt-5 flex justify-center items-center">
        <x-main-button :href="route('challenges.connection')">
            {{ __('Start') }}
        </x-main-button>
    </div>

</x-app-layout>

