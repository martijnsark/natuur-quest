@props(['seconds' => 30, 'redirectTo' => null])

@vite('resources/js/app.js')

@php
    $target = $redirectTo ?? (Route::has('facts/{?assignment') ? route('facts') : url('/'));
@endphp

<section
    x-data="countdownTimer({{ $seconds }}, '{{ $target }}')"
    x-init="start()"
    class="relative"
    aria-label="Challenge timer"
>
    {{-- Alles wat je hier in stopt (slot) verbergen we hard wanneer timer klaar is --}}
    <div x-ref="content">
        {{ $slot }}
    </div>

    {{-- Floating timer (verbergen als klaar) --}}
    <section
        role="timer"
        aria-live="polite"
        aria-label="Afteller voor deze challenge. Je hebt {{ $seconds }} seconden."
        class="fixed top-3 right-4 z-[80] text-white text-4xl font-extrabold
               bg-black/40 px-4 py-2 rounded-xl shadow-lg select-none"
        x-show="!isDone"
    >
        <time :datetime="time > 0 ? `PT${time}S` : null" x-text="time"></time>
    </section>

    {{-- HARD FULLSCREEN OVERLAY (bedekt letterlijk alles) --}}
    <div
        x-show="isDone"
        x-cloak
        class="fixed inset-0 z-[90] bg-green-900/100"
        aria-hidden="true"
    ></div>

    {{-- Dialog bovenop overlay --}}
    <dialog
        x-ref="dlg"
        x-cloak
        class="fixed z-[100] w-[90%] max-w-sm rounded-xl bg-white p-0 shadow-xl"
        aria-labelledby="timer-popup-title"
        aria-describedby="timer-popup-desc"
        x-effect="
            if (isDone) {
                if ($refs.content) $refs.content.style.display = 'none';

                $nextTick(() => {
                    if (!$refs.dlg.open) $refs.dlg.showModal();
                    $refs.continueBtn?.focus();
                });
            }
        "
        @keydown.escape.prevent="redirectNow()"
        @close="redirectNow()"
    >
        <header role="banner" class="p-5 pb-0">
            <x-h2 id="timer-popup-title" class="text-gray-900">
                Tijd is over!
            </x-h2>

            <p id="timer-popup-desc" class="mt-2 text-gray-700 font-text">
                De {{ $seconds }} seconden zijn voorbij. Klik op de knop om door te gaan.
            </p>
        </header>

        <footer class="p-5 pt-4 flex justify-end">
            <a
                x-ref="continueBtn"
                href="{{ $target }}"
                class="inline-flex items-center justify-center rounded-md bg-secondary px-4 py-2
                       text-white font-text hover:bg-secondary/90 transition
                       focus:outline-none focus:ring-4 focus:ring-secondary/40"
            >
                Verder
            </a>
        </footer>
    </dialog>

    <style>
        [x-cloak] { display: none !important; }
    </style>
</section>
