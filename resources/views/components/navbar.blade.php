<footer class="fixed bottom-0 left-0 w-full text-white">
    @php
        // Get the current URL segment (e.g. "friends", "shop", etc.)
        // For "/" this will be null, so we treat that as "home".
        $current = request()->segment(1);

        // Tailwind classes for active & inactive states
        $active  = 'h-24 rounded-t-3xl shadow-[0_-2px_0_rgba(255,255,255,0.6)]';
        $normal  = 'h-16';
    @endphp

    <nav class="h-24 flex items-end justify-between gap-px"
         aria-label="centrale navigatie"
    >

        {{-- HOME (must stay on "/") --}}
        <a href="{{ route('homepage') }}"
           class="bg-nav flex-1 border border-white/30 flex items-center justify-center
                  {{ empty($current) ? $active : $normal }}">
            <img src="{{ Vite::asset('resources/images/Home.png') }}"
                 alt="Knop naar de homepagina"
                 class="w-8 h-8 object-contain">
        </a>

        {{-- FRIENDS --}}
        <a href="{{ route('homepage') }}"
           class="bg-nav flex-1 border border-white/30 flex items-center justify-center
                  {{ $current === 'friends' ? $active : $normal }}">
            <img src="{{ Vite::asset('resources/images/Friends-Icon.png') }}"
                 alt="Knop naar de vriendenpagina"
                 class="w-8 h-8 object-contain">
        </a>

        {{-- CHALLENGES --}}
        <a href="{{ route('homepage') }}"
           class="bg-nav flex-1 border border-white/30 flex items-center justify-center
                  {{ $current === 'challenges' ? $active : $normal }}">
            <img src="{{ Vite::asset('resources/images/Play-Icon.png') }}"
                 alt="Knop naar de challenges"
                 class="w-10 h-10 object-contain">
        </a>

        {{-- SHOP --}}
        <a href="{{ route('homepage') }}"
           class="bg-nav flex-1 border border-white/30 flex items-center justify-center
                  {{ $current === 'shop' ? $active : $normal }}">
            <img src="{{ Vite::asset('resources/images/Shop-Icon.png') }}"
                 alt="Knop naar de winkelpagina"
                 class="w-8 h-8 object-contain">
        </a>

        {{-- PROFILE --}}
        <a href="{{ route('homepage') }}"
           class="bg-nav flex-1 border border-white/30 flex items-center justify-center
                  {{ $current === 'profile' ? $active : $normal }}">
            <img src="{{ Vite::asset('resources/images/Profile-Icon.jpg') }}"
                 alt="Knop naar de profielpagina"
                 class="w-8 h-8 object-contain rounded-full">
        </a>

    </nav>
</footer>
