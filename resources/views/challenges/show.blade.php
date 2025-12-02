<h1>{{$challenge->title}}</h1>

<p>Ga naar waterbak {{$challenge->water_trough}}, vul deze met water en beantwoord de vraag</p>

{{--antwoorden van de challenge--}}
<form method="POST" action="">
    <label for="options">Options</label>
    <input type="radio" name="option_{{$challenge->id}}" id="a"> a
    <input type="radio" name="option_{{$challenge->id}}" id="b"> b
    <input type="radio" name="option_{{$challenge->id}}" id="c"> c
</form>

