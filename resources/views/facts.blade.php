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

    <section class="flex flex-col items-center min-h-[20vh]">
        <p>
            Score: <span class="font-bold text-xl">{{ $score }}</span>
        </p>

        @if ($score > 0)
            <x-main-button href="{{ route('home') }}"
               class="px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700">
                Naar home
            </x-main-button>
        @endif
    </section>
</x-app-layout>
