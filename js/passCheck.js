const pass = document.querySelector("#lbPassword");
const ripetiPass = document.querySelector("#lbRipetiPass");
const msg = document.querySelector(".msgPassword");
const btnMandare = document.querySelector("#btnRegistrati");

function active() {
    //controllo che l'utente abbia scritto una password lunga minimo 6 caratteri
    if (pass.value.length >= 6) {
        ripetiPass.removeAttribute("disabled", "");
    } else {
        ripetiPass.setAttribute("disabled", "");
    }

    //controllo che le password siano uguali (la devo fare in un preciso momento?)
    btnMandare.onclick = function () {
        if (pass.value != ripetiPass.value) {
            msg.style.display = "block";
            msg.classList.remove("match");
            msg.textContent = "Errore! Password non uguali";
        } else {
            msg.style.display = "block";
            msg.classList.add("match");
            msg.textContent = "Password uguali";
        }
    }

    if (pass.value != ripetiPass.value) {
        msg.style.display = "block";
        msg.classList.remove("match");
        msg.textContent = "Errore! Password non uguali";
    } else {
        msg.style.display = "block";
        msg.classList.add("match");
        msg.textContent = "Password uguali";
    }
}