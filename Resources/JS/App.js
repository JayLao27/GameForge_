
//Timer 
const targetDate = new Date("2025-03-01T00:00:00").getTime();

function updateCountdown() {
    const now = new Date().getTime();
    const timeLeft = targetDate - now;

    if (timeLeft <= 0) {
        document.getElementById("Countdown").innerHTML = "<h2>Countdown Finished!</h2>";
        return;
    }

    const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
    const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

    document.getElementById("days").innerHTML = `${days} <br> <span>Days</span>`;
    document.getElementById("hours").innerHTML = `${hours} <br> <span>Hours</span>`;
    document.getElementById("minutes").innerHTML = `${minutes} <br> <span>Minutes</span>`;
    document.getElementById("seconds").innerHTML = `${seconds} <br> <span>Seconds</span>`;
}

setInterval(updateCountdown, 1000);

updateCountdown();
