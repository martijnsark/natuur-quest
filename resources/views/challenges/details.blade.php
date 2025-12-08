<x-app-layout>
    <x-slot name="header">
        <x-header-h1>Natuur 30 seconds</x-header-h1>
    </x-slot>

    <x-styling-arrow-right></x-styling-arrow-right>

    <section aria-label="Uitleg opdracht"
             class="text-white pt-10 px-14 flex flex-col items-center gap-2 rotate-2 text-center">
        <p class="font-text text-xl">uitleg opdracht en hoe 30 seconds werkt. Verdeel jezelf in rollen 1 scheidsrechter
            2 spelers.
        <p class="font-text text-xl">Uitleg over bonus punten ronde met foto's maken</p>
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

    <x-main-button :href="route('challenges.play')">
        {{ __('Start') }}
    </x-main-button>

</x-app-layout>

