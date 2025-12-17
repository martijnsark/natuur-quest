<x-app-layout>
    <x-slot name="header">
        <x-header-h1>Natuur 30 seconds</x-header-h1>
    </x-slot>

    <x-styling-arrow-right></x-styling-arrow-right>

    {{-- Countdown wrapper:
         - toont rechtsboven de timer
         - als timer 0 is -> popup "Tijd is over!" met Verder knop
         - Verder knop gaat naar facts/{assignment} --}}
    <x-countdown :seconds="30" :redirectTo="route('facts', ['assignment' => $challenge->id])">
        <x-card>
            <section aria-label="Vijf natuur woorden"
                     class="text-white px-14 flex flex-col items-center gap-10 text-center">
                <ul class="flex flex-col gap-5 whitespace-nowrap">
                    @foreach($challenge->words as $word)
                        <li class="text-3xl [-webkit-text-stroke:1px_black]">
                            <p class="font-text">{{ $word->name }}</p>
                        </li>
                    @endforeach
                </ul>

                {{-- Speler kan ook zelf eerder door --}}
                <section class="mt-10">
                    <a
                        href="{{ route('facts', ['assignment' => $challenge->id]) }}"
                        class="inline-flex items-center justify-center rounded-md bg-secondary px-6 py-3
                               text-white font-bold hover:bg-secondary/90 transition"
                    >
                        Verder
                    </a>
                </section>
            </section>
        </x-card>
    </x-countdown>
</x-app-layout>
