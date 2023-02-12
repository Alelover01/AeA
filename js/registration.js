function checkPassword() {
    let pass = document.getElementById("lbPassword").value;
    let ripetiPass = document.getElementById("lbRipetiPass").value;
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
            let luogo = document.getElementById("lbCittà").value;

            //funzione che controlla che ogni elemento inserito nella pagina non sia vuoto
            checkInput(username, foto, nome, cognome, sesso, email, pass, dataNascita, luogo);
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

function checkInput(username, foto, nome, cognome, sesso, email, pass, dataNascita, luogo) {
    
    if ((username != 0) && (foto != 0) && (nome != 0) && (cognome != 0) && (sesso != 0) && (email != 0) && (pass != 0) && (dataNascita != 0) && (luogo != 0) ) {
        let url ='../template/registration-redirect.php?username=' + username + '&foto=' + foto + '&nome=' + nome + '&cognome=' + cognome + '&sesso=' + sesso + '&email=' + email +
            '&pass=' + pass + '&dataNascita=' + dataNascita + '&luogo=' + luogo;
        window.location.pathname = url;
    } 
    else {
        alert("Attenzione vanno inserti tutti i campi!");
    }
}
