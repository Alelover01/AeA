function checkPassword() {
    let pass = document.getElementById("lbPassword").value;
    let ripetiPass = document.getElementById("lbRipetiPass").value;
    console.log(" Password:", pass, '\n', "Confirm Password:", ripetiPass);
    let msg = document.getElementById("msgPassword");

    if (pass.length != 0) {
        if (pass == ripetiPass) {
            msg.textContent = "Passwords match";
            msg.style.backgroundColor = "#1dcd59";
        }
        else {
            msg.textContent = "Password don't match";
            msg.style.backgroundColor = "#ff4d4d";
        }
    }
    else {
        alert("Password can't be empty!");
        msg.textContent = "";
    }
}