@props(['seconds' => 30])

{{--
    Load the countdown JavaScript only when this Blade component is used.
    Vite handles bundling, caching, and versioning.
--}}
@vite('resources/js/countdown.js')

<div
    {{-- Initialize Alpine with the countdownTimer() function from countdown.js --}}
    x-data="countdownTimer({{ $seconds }})"

    {{-- Start the timer automatically when the component is mounted --}}
    x-init="start()"

    {{-- Accessibility: announce timer updates politely to screen readers --}}
    role="timer"
    aria-live="polite"

    {{-- Visual styling for the floating countdown box --}}
    class="fixed top-3 right-4 z-50
           text-white text-4xl font-extrabold
           bg-black/40 px-4 py-2 rounded-xl shadow-lg select-none">

    {{--
        <time> element displays remaining seconds.
        When time > 0 → show the number.
        When time = 0 → remain empty (the message appears below).
    --}}
    <time
        :datetime="time > 0 ? `PT${time}S` : null"
        x-text="time > 0 ? time : ''">
    </time>

    {{-- Shown only when timer runs out --}}
    <span x-show="time <= 0">Tijd is op!</span>

</div>
