<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Natuur Quest</title>
</head>

<body class="bg-gray-300 min-h-screen flex flex-col">

<main class="flex-1 flex flex-col">
    {{ $slot }}
</main>

{{-- FOOTER / NAV --}}
{{-- FOOTER / NAV --}}
<footer class=" text-white w-full mt-auto">
    <nav class="flex h-16 w-full items-stretch justify-between gap-px">

        {{-- 1: Audio --}}
        <a href="/audio"
           class="bg-[#006B56] flex-1 h-full border border-white/30 flex items-center justify-center">
            <span class="text-xl">🎧</span>
        </a>

        {{-- 2: Map --}}
        <a href="/map"
           class="bg-[#006B56] flex-1 h-full border border-white/30 flex items-center justify-center">
            <span class="text-xl">🗺️</span>
        </a>

        {{-- 3: Home (actief, hoger en afgerond) --}}
        <a href="/welcome"
           class="flex-1 h-24 bg-[#006B56] border border-white/30
          rounded-t-3xl flex items-center justify-center
          -translate-y-[25px] shadow-[0_-2px_0_rgba(255,255,255,0.6)]">
            <span class="text-2xl">🏠</span>
        </a>


        {{-- 4: Friends --}}
        <a href="/friends"
           class="bg-[#006B56] flex-1 h-full border border-white/30 flex items-center justify-center">
            <span class="text-xl">👥</span>
        </a>

        {{-- 5: Shop --}}
        <a href="/shop"
           class="bg-[#006B56] flex-1 h-full border border-white/30 flex items-center justify-center">
            <span class="text-xl">🏪</span>
        </a>

    </nav>
</footer>

</body>
</html>
