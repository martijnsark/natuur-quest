<x-app-layout>
    <x-slot name="header">
        <x-header-h1>{{$challenge->title}}</x-header-h1>
    </x-slot>

    <x-styling-arrow-right></x-styling-arrow-right>

    <section aria-label="Uitleg opdracht"
             class="text-white pt-10 px-14 flex flex-col items-center gap-2 rotate-2 text-center">
        <p class="font-text text-xl">De opdracht is om een waterbak in je natuurgebied te vullen. De waterbak
            die jij moet gaan vullen
            is <span class="font-semibold">{{$challenge->water_trough}}</span>.</p>
        <p class="font-text text-xl">Ga naar deze waterbak opzoek en daar vind je de vraag die je moet beantwoorden.
            Vul je antwoord hieronder
            in.</p>
    </section>
    {{--antwoorden van de challenge--}}
    <section aria-label="Antwoorden voor de opdracht" class="text-center text-white pt-36">
        <form method="POST" action="{{ route('handed-in') }}">
            @csrf
            <fieldset>
                <legend class="font-text text-3xl">Kies uit:</legend>
                <div class="flex gap-6 justify-center">
                    <div>
                        <input type="radio" name="option_{{$challenge->id}}" id="a" value="a">
                        <label class="font-text text-2xl" for="a">a</label>
                    </div>

                    <div>
                        <input type="radio" name="option_{{$challenge->id}}" id="b" value="b">
                        <label class="font-text text-2xl" for="b">b</label>
                    </div>

                    <div>
                        <input type="radio" name="option_{{$challenge->id}}" id="c" value="c">
                        <label class="font-text text-2xl" for="c">c</label>
                    </div>
                </div>

            </fieldset>
            <input type="hidden" name="challenge_id" value="{{$challenge->id}}">

            {{--submit button--}}
            <div class="flex justify-center">
                <div class="w-mainButton pt-14">
                    <x-form-button>{{ __('Inleveren') }}</x-form-button>
                </div>
            </div>

        </form>
    </section>

</x-app-layout>

