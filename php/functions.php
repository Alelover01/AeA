<?php
//funzione che mi dice se un utente è loggato 
function isUserLoggedIn(){
    if ($_SESSION["Username"] != ""){
        return true;
    };
    return false;
}

//funzione che mi registra l'utente loggato nella sessione 
function registerLoggedUser($user){
    $_SESSION["Username"] = $user["Username"];
    $_SESSION["Nome"] = $user["Nome"];
    $_SESSION["Cognome"] = $user["Cognome"];
}

//funzione che mi registra l'utente cercato nella sessione
function registerSearchedUser($user){
    $_SESSION["usrSearch"] = $user["Username"];
   /* $_SESSION["Nome"] = $user["Nome"];
    $_SESSION["Cognome"] = $user["Cognome"];*/
}


?>