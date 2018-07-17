var number = Math.floor(Math.random() * 100) + 1;

document.getElementById("guessBtn").onclick = function() {
    var guess = document.getElementById("guess").value;
    if (guess < number) {
        document.getElementById("feedback").innerHTML = "You guessed too low!"
    } else if (guess > number) {
        document.getElementById("feedback").innerHTML = "You guessed too high!"
    } else {
        document.getElementById("feedback").innerHTML = "You guessed right!"
        // hide the guess button and show a new game button
    }
}