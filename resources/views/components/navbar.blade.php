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

        {{-- DASHBOARD --}}
        <a href="/dashboard"
           class="bg-[#006B56] flex-1 h-16 border border-white/30
                  flex items-center justify-center">
            <img src="{{ asset('images/Home-Icon.png') }}"
                 alt="Homepagina"
                 class="w-8 h-8 object-contain">
        </a>

        {{-- FRIENDS --}}
        <a href="/friends"
           class="bg-[#006B56] flex-1 h-16 border border-white/30
                  flex items-center justify-center">
            <img src="{{ asset('images/Friends-Icon.png') }}"
                 alt="Vriendenpagina"
                 class="w-8 h-8 object-contain">
        </a>

        {{-- PLAY / CHALLENGES (middelste, hoger en rond) --}}
        <a href="/challenges"
           class="flex-1 h-20 bg-[#006B56] border border-white/30
          rounded-t-3xl flex items-center justify-center
          -translate-y-[px] shadow-[0_-2px_0_rgba(255,255,255,0.6)]">
            <span class="text-2xl">
                <img src="{{ asset('images/Play-Icon.png') }}"
                     alt="Challenges"
                     class="w-8 h-8 object-contain">
            </span>
        </a>

        {{-- SHOP --}}
        <a href="/shop"
           class="bg-[#006B56] flex-1 h-16 border border-white/30
                  flex items-center justify-center">
            <img src="{{ asset('images/Shop-Icon.png') }}"
                 alt="Winkelpagina"
                 class="w-8 h-8 object-contain">
        </a>

        {{-- PROFILE --}}
        <a href="/profile"
           class="bg-[#006B56] flex-1 h-16 border border-white/30
                  flex items-center justify-center">
            <img src="{{ asset('images/Profile-Icon.jpg') }}"
                 alt="Profielpagina"
                 class="w-8 h-8 object-contain rounded-full">
        </a>

    </nav>
</footer>

</body>
</html>
