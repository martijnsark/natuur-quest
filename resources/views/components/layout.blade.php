<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Natuur Quest</title>
</head>
<body class="bg-gray-300 min-h-screen">

<main class="pb-20">
    {{ $slot }}
</main>

<footer class="fixed bottom-0 left-0 w-full text-white">
    <nav class="h-20 flex items-end justify-between gap-px ">

        <a href="/welcome"
           class="bg-[#006B56] flex-1 h-16 border border-white/30 flex items-center justify-center">
            <span class="text-xl">🏠</span>
        </a>

        <a href="/friends"
           class="bg-[#006B56] flex-1 h-16 border border-white/30 flex items-center justify-center">
            <span class="text-xl">👥</span>
        </a>

        <a href="/challenge"
           class="flex-1 h-20 bg-[#006B56] border border-white/30
          rounded-t-3xl flex items-center justify-center
          -translate-y-[px] shadow-[0_-2px_0_rgba(255,255,255,0.6)]">
            <span class="text-2xl">Play</span>
        </a>

        <a href="/shop"
           class="bg-[#006B56] flex-1 h-16 border border-white/30 flex items-center justify-center">
            <span class="text-xl">🏪</span>
        </a>

        <a href="/Profile"
           class="bg-[#006B56] flex-1 h-16 border border-white/30 flex items-center justify-center">
            <span class="text-xl">>.<</span>
        </a>

    </nav>
</footer>

</body>
</html>
