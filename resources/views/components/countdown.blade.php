@props(['seconds' => 30])

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
        x-text="time > 0 ? time : 'Tijd is op!'">
    </time>


    <time x-show="time > 0"></time>
</div>

<script>
    function countdownTimer(startTime) {
        return {
            time: startTime,
            start() {
                const interval = setInterval(() => {
                    if (this.time > 0) {
                        this.time--;
                    } else {
                        clearInterval(interval);
                    }
                }, 1000);
            }
        }
    }
</script>

{{-- Gebruik: <x-countdown seconds="30" /> --}}
