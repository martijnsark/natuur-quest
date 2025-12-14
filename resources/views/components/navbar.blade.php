<footer class="fixed bottom-0 left-0 w-full text-white">
    @php
            // Determine which segment of the URL is active
            $current = request()->segment(1);

            // Tailwind classes for active & inactive states
            $active  = 'h-24 rounded-t-3xl shadow-[0_-2px_0_rgba(255,255,255,0.6)]';
            $normal  = 'h-16';
    @endphp

    <nav class="h-24 flex items-end justify-between gap-px">

        {{-- Homepage --}}
        <a href="{{ route('homepage') }}"
           class="bg-nav flex-1 border border-white/30 flex items-center justify-center
                  {{ $current === 'homepage' ? $active : $normal }}">
            <img src="{{ Vite::asset('resources/images/Home.png') }}"
                 alt="knop naar de Home-pagina"
                 class="w-8 h-8 object-contain">
        </a>

        {{-- FRIENDS --}}
        <a href="/{{ route('friends') }}"
           class="bg-nav flex-1 border border-white/30 flex items-center justify-center
                  {{ $current === 'friends' ? $active : $normal }}">
            <img src="{{ Vite::asset('resources/images/Friends-Icon.png') }}"
                 alt="Knop naar de vrienden-pagina"
                 class="w-8 h-8 object-contain">
        </a>

        {{-- PLAY / CHALLENGES --}}
        <a href="/{{ route('challenges') }}"
           class="bg-nav flex-1 border border-white/30 flex items-center justify-center
                  {{ $current === 'challenges' ? $active : $normal }}">
            <img src="{{ Vite::asset('resources/images/Play-Icon.png') }}"
                 alt="knop naar de Challenges"
                 class="w-10 h-10 object-contain">
        </a>

        {{-- SHOP --}}
        <a href="/{{ route('shop') }}"
           class="bg-nav flex-1 border border-white/30 flex items-center justify-center
                  {{ $current === 'shop' ? $active : $normal }}">
            <img src="{{ Vite::asset('resources/images/Shop-Icon.png') }}"
                 alt="knop naar de Winkel-pagina"
                 class="w-8 h-8 object-contain">
        </a>

        {{-- PROFILE --}}
        <a href="/{{ route('profile') }}"
           class="bg-nav flex-1 border border-white/30 flex items-center justify-center
                  {{ $current === 'profile' ? $active : $normal }}">
            <img src="{{ Vite::asset('resources/images/Profile-Icon.jpg') }}"
                 alt="knop naar de Profiel-pagina"
                 class="w-8 h-8 object-contain rounded-full">
        </a>

    </nav>
</footer>
