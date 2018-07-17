function validateForm() {
    var id = document.forms["myForm"]["id"].value;
    var fname = document.forms["myForm"]["fname"].value;
    var lname = document.forms["myForm"]["lname"].value;

    var spanID = document.getElementById('id-warning');
    var spanFname = document.getElementById('fname-warning');
    var spanLname = document.getElementById('lname-warning');

    spanID.innerHTML = "";
    spanFname.innerHTML = "";
    spanLname.innerHTML = "";

    if (id == "" || fname == "" || lname == "") {

        var string = "You forgot to fill in the following field(s): ";

        if (id == "") {
            spanID.innerHTML = "<p>Please enter an ID</p>";
            string += "ID, ";
        }

        if (fname == "") {
            spanFname.innerHTML = "<p>Please enter a First name</p>";
            string += "First name, ";
        }

        if (lname == "") {
            spanLname.innerHTML = "<p>Please enter a Last name</p>";
            string += " Last name";
        }
        alert(string);
    } else {
        document.getElementById('user-info').innerHTML = "<p>UserID: " + id + "</p>" + "<p>First Name: " + fname + "</p>" + "<p>Last Name: " + lname + "</p>";
    }
}