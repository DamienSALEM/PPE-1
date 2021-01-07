var txtProblems = "<ul>";
function checkNonEmpty() {
    var ok = true;

    var name = document.getElementsByName("Name")[0];
    if (name.value == "") {
        name.style = "border-color : red";
        ok = false;
        txtProblems += "<li>Please enter a name</li>";
    } else
        name.style = "border-color :";

    var lastname = document.getElementsByName("LastName")[0];
    if (lastname.value == "") {
        lastname.style = "border-color : red";
        ok = false;
        txtProblems += "<li>Please enter a last name</li>";
    } else
        lastname.style = "border-color :";

    var email = document.getElementsByName("iEmail")[0];
    if (email.value == "") {
        email.style = "border-color : red";
        ok = false;
        txtProblems += "<li>Please enter a valid email</li>";
    } else
        email.style = "border-color :";

    var pswd = document.getElementsByName("iPassword")[0];
    if (pswd.value == "") {
        pswd.style = "border-color : red";
        ok = false;
        txtProblems += "<li>Please enter a password</li>";
    } else
        pswd.style = "border-color :";

    var validpswd = document.getElementsByName("Password_verif")[0];
    if (validpswd.value == "") {
        validpswd.style = "border-color : red";
        ok = false;
        txtProblems += "<li>Please re-enter your password</li>";
    } else
        validpswd.style = "border-color :";

    return ok;
}

function checkVerifMDP() {
    var pswd = document.getElementsByName("iPassword")[0];
    var validpswd = document.getElementsByName("Password_verif")[0];
    if (pswd.value == validpswd.value)
        return true;
    else {
        validpswd.style = "border-color : red";
        txtProblems += "<li>Passwords are not the same</li>";
        return false;
    }
}

function checkComplexPdw() {
    var ok = true;
    var pswd = document.getElementsByName("iPassword")[0];
    var fname = document.getElementsByName("Name")[0];
    var lname = document.getElementsByName("LastName")[0];
    var fname = fname.value;
    var lname = lname.value;
    var mot = pswd.value;
    const regex = RegExp('[fname] | [lname]');
    var val = regex.test(iPassword);
    // longueur
    if (mot.length < 8) {
        pswd.style = "border-color : red";
        ok = false;
        txtProblems += "<li>Password is too short</li>";
    }
    if ((mot.toUpperCase() === mot) || (mot.toLowerCase() == mot)) {
        pswd.style = "border-color : red";
        ok = false;
        txtProblems += "<li>Password need to contain an uppercase and a lowercase</li>";
    }
    if (val == true) {
        emailcontrol.style = "border-color : red";
        txtProblems += "<li>Please use a password without your first name or last name </li>";
        ok = false;
    }


    return ok;
}

function checkMail() {
    var emailcontrol = document.getElementsByName("iEmail")[0];
    var email = emailcontrol.value;
    const regex = RegExp('[A-Za-z0-9._]+@[A-Za-z0-9.-]+\\.[A-Za-z]{2,5}');
    var ok = regex.test(email);
    if (ok == false) {
        emailcontrol.style = "border-color : red";
        txtProblems += "<li>Please enter a valid email </li>";
    }

    return ok;
}

function checkname() {
    var namecontrol = document.getElementsByName("Name")[0];
    var name = namecontrol.value;
    const regex = RegExp('[A-Za-z.- ]*');
    var ok = regex.test(name);
    if (ok == false) {
        namecontrol.style = "border-color : red";
        txtProblems += "<li>Please enter a valid first name </li>";
    }

    return ok;
}
function checklastname() {
    var lastnamecontrol = document.getElementsByName("LastName")[0];
    var lastname = lastnamecontrol.value;
    const regex = RegExp('[A-Za-z.- ]*');
    var ok = regex.test(lastname);
    if (ok == false) {
        lastnamecontrol.style = "border-color : red";
        txtProblems += "<li>Please enter a valid last name </li>";
    }

    return ok;
}

function validform() {
    var checkempty = checkNonEmpty();
    var verifpswd = checkVerifMDP();
    var verifpswd2 = checkComplexPdw();
    var verifemail = checkMail();
    var checkfname = checkname();
    var checklname = checklastname();

    document.getElementById("warning").innerHTML = txtProblems + "</ul>";
    txtProblems = "";

    if ((checkempty == true) && (verifpswd == true) && (verifpswd2 == true) && (verifemail == true) && (checkfname == true) && (checklname == true))
        document.getElementById("inscription").submit();
    else
        document.getElementById("inscription").addEventListener("click", function (event) {
            event.preventDefault()
        });
}

function checkNonEmpty2() {
    var ok = true;

    var email = document.getElementsByName("Email")[0];
    if (email.value == "") {
        email.style = "border-color : red";
        ok = false;
        txtProblems += "<li>Please enter a valid email</li>";
    } else
        email.style = "border-color :";

    var pswd = document.getElementsByName("Password")[0];
    if (pswd.value == "") {
        pswd.style = "border-color : red";
        ok = false;
        txtProblems += "<li>Please enter a password</li>";
    } else
        pswd.style = "border-color :";
    return ok;
}

function validconnexion() {
    var checkempty = checkNonEmpty2();
    var verifemail = checkMail();

    document.getElementById("warning").innerHTML = txtProblems + "</ul>";
    txtProblems = "";

    if ((checkempty == true) && (verifpswd == true) && (verifpswd2 == true) && (verifemail == true))
        document.getElementById("connexion").submit();
    else
        document.getElementById("connexion").addEventListener("click", function (event) {
            event.preventDefault()
        });
}