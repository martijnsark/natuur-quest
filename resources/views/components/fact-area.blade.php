@props (['title'])

@php

    /* Unieke id uit de database */
    $factId = 'fact'

@endphp

<div class="relative w-1/2 sm:w-1/3 h-32 sm:h-40 -rotate-12">

    <!-- Achtergrond feitje -->
    <div class="absolute inset-0 flex items-center justify-center z-0">
        <div class="w-full h-full bg-[#E20147] rounded-3xl blur-md -skew-x-12 opacity-95"></div>
    </div>

    <div class="absolute inset-0 flex flex-col justify-start z-10 p-4">
        <!-- Kopje bovenin, gecentreerd -->
        <div class="w-full text-center mb-2">
            {{ $title ?? '' }}
        </div>

        <!-- Tekst daaronder, links uitgelijnd -->
        <div class="w-full text-left px-2">
            {{ $slot }}
        </div>
    </div>

</div>
