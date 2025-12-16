<x-app-layout>

    {{--    <x-bg-animation x-bind:class="animations ? 'animate-pan' : 'animate-none'"></x-bg-animation>--}}

    <x-slot name="header">
        <h1 class="text-3xl font-bold text-white text-center">Feitjes</h1>
    </x-slot>

    <section class="flex justify-center items-center min-h-[70vh]">
        @if ($facts)
            <x-fact-area :facts="$facts"/>
        @else
            <p class="text-white text-center">Geen feitje gevonden.</p>
        @endif
    </section>

</x-app-layout>
