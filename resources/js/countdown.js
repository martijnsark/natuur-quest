/**
 * countdownTimer(startTime)
 *
 * Creates an Alpine.js reactive countdown object.
 * This function is imported inside app.js and used in countdown.blade.php.
 *
 * @param {number} startTime - The starting number of seconds for the countdown
 * @returns {object} - Alpine component with reactive time and start() method
 */
export function countdownTimer(startTime) {
    return {
        // The current countdown value
        time: startTime,

        /**
         * Start the countdown.
         * Decreases "time" every second.
         * Stops automatically when it reaches 0.
         */
        start() {
            const interval = setInterval(() => {
                if (this.time > 0) {
                    this.time--;
                } else {
                    // Stop the countdown when time reaches zero
                    clearInterval(interval);
                }
            }, 1000); // 1000ms = 1 second
        }
    }
}
