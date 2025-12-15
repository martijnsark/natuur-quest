/**
 * countdownTimer(startTime, redirectTo)
 *
 * Alpine.js countdown with:
 * - Accessible timer updates
 * - Modal popup when time is over
 * - Optional redirect link destination
 */
export function countdownTimer(startTime, redirectTo = '/homepage') {
    return {
        // Remaining seconds
        time: startTime,

        // Popup state
        isDone: false,

        // Where the "Verder" button goes
        redirectTo,

        start() {
            const interval = setInterval(() => {
                if (this.time > 0) {
                    this.time--;
                } else {
                    clearInterval(interval);
                    this.isDone = true; // show popup
                }
            }, 1000);
        }
    };
}
