<?php

//funzione che mi dice se un utente è loggato
function isUserLoggedIn(){
    return !empty($_SESSION['Username']);
}

//funzione che mi registra l'utente loggato nella sessione 
function registerLoggedUser($user){
    $_SESSION["Username"] = $user["Username"];
    $_SESSION["nome"] = $user["nome"];
    $_SESSION["cognome"] = $user["cognome"];
}



?>