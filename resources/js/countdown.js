/**
 * countdownTimer(startTime, redirectTo)
 * Alpine component voor countdown + "tijd is over" popup + redirect.
 */
export function countdownTimer(startTime, redirectTo) {
    return {
        time: startTime,
        isDone: false,
        redirectTo: redirectTo,
        _interval: null,

        start() {
            // voorkom dubbele timers bij hot reload / opnieuw laden
            if (this._interval) clearInterval(this._interval);

            this._interval = setInterval(() => {
                if (this.time > 0) {
                    this.time--;
                    return;
                }

                clearInterval(this._interval);
                this._interval = null;

                // Timer klaar -> UI in blade handelt overlay/dialog via x-show/x-effect af
                this.isDone = true;
            }, 1000);
        },

        redirectNow() {
            // Veilig doorsturen naar facts/wachtscherm
            window.location.href = this.redirectTo;
        },
    };
}
