function checkPassword() {
    let pass = document.getElementById("lbPassword").value;
    let ripetiPass = document.getElementById("lbRipetiPass").value;
    console.log(" Password:", pass, '\n', "Confirm Password:", ripetiPass);
    let msg = document.getElementById("msgPassword");

    if (pass.length > 6) {
        if (pass == ripetiPass) {
            msg.textContent = "Password corrette";
            msg.style.backgroundColor = "#1dcd59";
        }
        else {
            msg.textContent = "Le password non coincidono";
            msg.style.backgroundColor = "#ff4d4d";
        }
    }
    else {
        alert("La password deve avere minimo 7 caratteri");
        msg.textContent = "";
        msg.style.backgroundColor = "white";
    }
}