@props(['seconds' => 30, 'redirectTo' => null])

{{-- Load the countdown JavaScript only when this component is used --}}
@vite('resources/js/countdown.js')

@php
    // Temporary redirect target:
    // 1) You can pass :redirect-to="route('homepage')" when using the component
    // 2) Otherwise it tries route('homepage')
    // 3) Fallback to /homepage
    $target = $redirectTo ?? (Route::has('homepage') ? route('homepage') : url('/homepage'));
@endphp

<div
    x-data="countdownTimer({{ $seconds }}, '{{ $target }}')"
    x-init="start()"
>
    {{-- Floating timer (top-right) --}}
    <div
        role="timer"
        aria-live="polite"
        aria-label="Afteller voor deze challenge. Je hebt {{ $seconds }} seconden om de opdracht uit te voeren."
        class="fixed top-3 right-4 z-50
               text-white text-4xl font-extrabold
               bg-black/40 px-4 py-2 rounded-xl shadow-lg select-none"
    >
        <time
            :datetime="time > 0 ? `PT${time}S` : null"
            x-text="time"
        ></time>
    </div>

    {{-- Popup when time is over --}}
    <div
        x-show="isDone"
        x-cloak
        class="fixed inset-0 z-[60] flex items-center justify-center"
        role="dialog"
        aria-modal="true"
        aria-labelledby="timer-popup-title"
        aria-describedby="timer-popup-desc"
    >
        {{-- Backdrop --}}
        <div class="absolute inset-0 bg-black/60"></div>

        {{-- Modal --}}
        <div class="relative w-[90%] max-w-sm rounded-xl bg-white p-5 shadow-xl">
            <h2 id="timer-popup-title" class="text-xl font-bold text-gray-900">
                Tijd is over!
            </h2>

            <p id="timer-popup-desc" class="mt-2 text-gray-700">
                De 30 seconden zijn voorbij. Klik op de knop om door te gaan.
            </p>

            <div class="mt-4 flex justify-end">
                <a
                    :href="redirectTo"
                    class="inline-flex items-center justify-center rounded-md bg-secondary px-4 py-2 text-white font-semibold
                           hover:bg-secondary/90 transition focus:outline-none focus:ring-4 focus:ring-secondary/40"
                    aria-label="Ga door naar de volgende pagina"
                >
                    Verder
                </a>
            </div>
        </div>
    </div>
</div>
