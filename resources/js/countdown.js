export function countdownTimer(startTime) {
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
