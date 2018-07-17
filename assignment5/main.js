// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the button that submits the info
var submitBtn = document.getElementById("submitBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// info variables
var hours = [];

// When the user clicks on the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on the submit button, add the new info to the table
submitBtn.onclick = function() {
    var hour = document.getElementById("hours").value;
    if (hour >= 0) {
        hours.push(hour);
    } else {
        var total = 0.0;
        var result = document.getElementById("result");
        for (var i = 0; i < hours.length; i ++) {
            if (hours[i] <= 40) {
                result.innerHTML += "<tr><td>" + (i + 1) + "</td><td>" + hours[i] + "</td><td>" + (hours[i] * 15) + "</td></tr>";
            } else {
                result.innerHTML += "<tr><td>" + (i + 1) + "</td><td>" + hours[i] + "</td><td>" + (600 + ((hours[i] - 40) * 15 * 1.5)) + "</td></tr>";
            }
            total += parseFloat(hours[i]);
        }
        document.getElementById("total").innerHTML = "Total Hours: " + total;
        modal.style.display = "none";
    }
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        // modal.style.display = "none";
    }
}