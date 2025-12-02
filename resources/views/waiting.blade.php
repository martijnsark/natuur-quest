<h1>Waiting for another player...</h1>

{{-- auto refresh every 2 seconds --}}
<meta http-equiv="refresh" content="2">

<script>
    setInterval(function() {
        fetch('/check-game-status')
            .then(res => res.json())
            .then(data => {
                if (data.players === 2) {
                    window.location.href = '/coop-challenge';
                }
            });
    }, 2000);
</script>
