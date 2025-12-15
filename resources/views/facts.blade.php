<x-app-layout>

    <x-slot name="header"></x-slot>

    <div class="flex justify-center items-center">
        <x-fact-area :facts="$facts"/>
    </div>

</x-app-layout>
