<h2 id="timer">0:00</h2>

<script>
    function millisToMinutesAndSeconds(millis) {
        var minutes = Math.floor(millis / 60000);
        var seconds = ((millis % 60000) / 1000).toFixed(0);
        return (
            seconds == 60 ?
                (minutes + 1) + ":00" :
                minutes + ":" + (seconds < 10 ? "0" : "") + seconds
        );
    }

    // Waiting time in Miliseconds
    let totalWaitTime = 60000;
    let timerInterval = setInterval(() => {
        // console.log(totalWaitTime);
        if (totalWaitTime == 0) {
            clearInterval(timerInterval);
            return;
        }

        totalWaitTime -= 1000;
        const waitingTime = millisToMinutesAndSeconds(totalWaitTime);
        const timer = document.getElementById("timer");
        timer.innerText = `${waitingTime}`;
    }, 1000);
</script>