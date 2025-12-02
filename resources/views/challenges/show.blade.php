<main>
    <h1>{{$challenge->title}}</h1>
    <p>De opdracht is om een waterbak in je natuurgebied te vullen. De waterbak
        die jij moet gaan vullen
        is <span class="font-semibold">{{$challenge->water_trough}}</span>.</p>
    <p>Ga naar deze waterbak opzoek en daar vind je de vraag die je moet beantwoorden. Vul je antwoord hieronder in.</p>

    {{--antwoorden van de challenge--}}
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
</main>

