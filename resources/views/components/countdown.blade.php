@props(['seconds' => 30])

<div
    x-data="countdownTimer({{ $seconds }})"
    x-init="start()"
    class="fixed top-3 right-4 z-50
           text-white text-4xl font-extrabold
           bg-black/40 px-4 py-2 rounded-xl shadow-lg select-none">

    <span x-text="time"></span>s
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
                        this.time = 'Tijd op!';
                    }
                }, 1000);
            }
        }
    }
</script>

{{--Gebruik: <x-countdown seconds="30" />--}}
