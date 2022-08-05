// Variables for button

const startStopBtn = document.querySelector('#startStopBtn');
const resetBtn = document.querySelector('#resetBtn');

//Variables for time

let seconds = 0;
let minutes = 0;
let hours = 0;

//variables for leading zero

let leadingSeconds = 0;
let leadingMinutes = 0;
let leadingHours = 0;

//Variables for set interVal & timerstatus

let timerInterval = null;
let timeStatus = "stopped";

//Stop watch function

function stopWatch() {
    seconds++;
    if (seconds / 60 === 1) {
        seconds = 0;
        minutes++;
        if (minutes / 60 === 1) {
            hours++;
        }
    }
    //leading zero part
    if (seconds < 10) {
        leadingSeconds = "0" + seconds.toString();
    } else {
        leadingSeconds = seconds;
    }
    if (minutes < 10) {
        leadingMinutes = "0" + minutes.toString();
    } else {
        leadingMinutes = minutes;
    }
    if (hours < 10) {
        leadingHours = "0" + hours.toString();
    } else {
        leadingHours = hours;
    }

    let displayTimer = document.getElementById('timer').innerText =
        leadingHours + ":" + leadingMinutes + ":" + leadingSeconds;
}
// window.setInterval(stopWatch, 1000);

startStopBtn.addEventListener('click', function () {

    if (timeStatus === "stopped") {
        timerInterval = window.setInterval(stopWatch, 1000);
        document.getElementById('startStopBtn').innerHTML = `<i class= "fa fa-pause" id = "pause"></i>`;
        timeStatus = "started";
    } else {
        window.clearInterval(timerInterval);
        document.getElementById('startStopBtn').innerHTML = `<i class= "fa fa-play" id = "play"></i>`;
        timeStatus = "stopped";
    }
});

resetBtn.addEventListener('click', function(){

    window.clearInterval(timerInterval);
    seconds = 0;
    minutes = 0;
    hours = 0;

    document.getElementById('timer').innerHTML="00:00:00";
})

