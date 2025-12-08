@props(['seconds' => 30])

<div x-data="countdownTimer({{ $seconds }})" x-init="start()"
     class="text-center text-white text-2xl font-bold select-none">

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
                        this.time = 'Tijd is op!';
                    }
                }, 1000);
            }
        }
    }
</script>

{{--GEBRUIK DEZE CODE OM DE COUNTDOWN TOE TE VOEGEN: <x-countdown seconds="30"/>    --}}
