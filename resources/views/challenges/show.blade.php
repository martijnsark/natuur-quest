{{--<x-app-layout>--}}
<header>
    <h1>{{$challenge->title}}</h1>
</header>
<main>
    <section aria-label="Uitleg opdracht">
        <p>De opdracht is om een waterbak in je natuurgebied te vullen. De waterbak
            die jij moet gaan vullen
            is <span class="font-semibold">{{$challenge->water_trough}}</span>.</p>
        <p>Ga naar deze waterbak opzoek en daar vind je de vraag die je moet beantwoorden. Vul je antwoord hieronder
            in.</p>
    </section>
    {{--antwoorden van de challenge--}}
    <section aria-label="Antwoorden voor de opdracht">
        <form method="POST" action="{{--route to new page--}}">
            @csrf
            <fieldset>
                <legend>Kies uit</legend>


                <input type="radio" name="option_{{$challenge->id}}" id="a" value="a">
                <label for="a">a</label>

                <input type="radio" name="option_{{$challenge->id}}" id="b" value="b">
                <label for="b">b</label>

                <input type="radio" name="option_{{$challenge->id}}" id="c" value="c">
                <label for="c">c</label>

            </fieldset>
            {{--submit button--}}
        </form>
    </section>
</main>
{{--</x-app-layout>--}}

