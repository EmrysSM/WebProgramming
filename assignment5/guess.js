var number = Math.floor(Math.random() * 100) + 1;
var guessBtn = document.getElementById("guessBtn");
var newBtn = document.getElementById("newBtn");
var limit = 10;
var turn = 0;

guessBtn.onclick = function() {
    if (turn < limit) {
        turn++;
        var guess = document.getElementById("guess").value;
        if (guess < number) {
            document.getElementById("feedback").innerHTML = "You guessed too low!";
            document.getElementById("turn").innerHTML = "" + (limit - turn);
            document.getElementById("audio").play();
        } else if (guess > number) {
            document.getElementById("feedback").innerHTML = "You guessed too high!";
            document.getElementById("turn").innerHTML = "" + (limit - turn);
            document.getElementById("audio").play();
        } else {
            document.getElementById("feedback").innerHTML = "You guessed right!";
            document.getElementById("turn").innerHTML = "" + (limit - turn);
            document.getElementById("winAudio").play();
            guessBtn.style.display = "none";
            newBtn.style.display = "inline";
        }
    } else {
        document.getElementById("feedback").innerHTML = "You ran out of turns!"
        document.getElementById("winAudio").play();
        guessBtn.style.display = "none";
        newBtn.style.display = "inline";
    }
}

newBtn.onclick = function () {
    location.reload();
}

var secondsLabel = document.getElementById("seconds");
var totalSeconds = 0;
setInterval(setTime, 1000);

function setTime() {
    ++totalSeconds;
    secondsLabel.innerHTML = pad(totalSeconds % 60);
}

function pad(val) {
    var valString = val + "";
    if (valString.length < 2) {
        return "0" + valString;
    } else {
        return valString;
    }
}