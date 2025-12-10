@props(['seconds' => 30])

{{-- Laad alleen dit script als deze component wordt gebruikt --}}
@vite('resources/js/countdown.js')

<div
    x-data="countdownTimer({{ $seconds }})"
    x-init="start()"
    role="timer"
    aria-live="polite"
    class="fixed top-3 right-4 z-50
           text-white text-4xl font-extrabold
           bg-black/40 px-4 py-2 rounded-xl shadow-lg select-none">

    <time
        :datetime="time > 0 ? `PT${time}S` : null"
        x-text="time > 0 ? time : ''">
    </time>

    <span x-show="time <= 0">Tijd is op!</span>

</div>
