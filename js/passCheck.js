function checkPassword() {
    let pass = document.getElementById("lbPassword").value;
    let ripetiPass = document.getElementById("lbRipetiPass").value;
    console.log(" Password:", pass, '\n', "Confirm Password:", ripetiPass);
    let msg = document.getElementById("msgPassword");

    if (pass.length > 6) {
        if (pass == ripetiPass) {
            msg.textContent = "Password corrette";
            msg.classList.add("txtSuccess");
            msg.classList.remove("txtError");
        }
        else {
            msg.textContent = "Le password non coincidono";
            msg.classList.add("txtError");
            msg.classList.remove("txtSuccess");
        }
    }
    else {
        alert("La password deve avere minimo 7 caratteri");
        msg.textContent = "";
        msg.classList.remove("txtError");
        msg.classList.remove("txtSuccess");
    }
}