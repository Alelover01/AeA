
function checkPassword() {
    
    let pass = document.getElementById("lbPassword").value;
    let ripetiPass = document.getElementById("lbRipetiPass").value;
    console.log(" Password:", pass, '\n', "Confirm Password:", ripetiPass);
    let msg = document.getElementById("msgPassword");

    if (pass.length > 6) {
        if (pass == ripetiPass) {
            msg.textContent = "Password corrette";
            msg.style.backgroundColor = "#1dcd59";
            let username = document.getElementById("lbUsername").value;
            let foto = document.getElementById("btnFile").value;
            let nome = document.getElementById("lbNome").value;
            let cognome = document.getElementById("lbCognome").value;
            let sesso = document.getElementById("lbSesso").value;
            let email = document.getElementById("lbEmail").value;
            let dataNascita = document.getElementById("lbDataNascita").value;
            let luogo = document.getElementById("lbCitt�").value;


            window.open('../template/index.php?username=' + username + '&foto=' + foto + '&nome=' + nome + '&cognome=' + cognome + '&sesso=' + sesso + '&email=' + email +
                '&pass=' + pass + '&dataNascita=' + dataNascita + '&luogo=' + luogo);
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

