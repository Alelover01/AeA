<?php
require_once 'db/bootstrap.php';

$result["logineseguito"] = false;

if(isset($_POST["username"]) && isset($_POST["password"])){
    $login_result = $dbh->checkLogin($_POST["username"], $_POST["password"]);
    if(count($login_result)==0){
        //Login fallito
        $result["error"] = "Username e/o password errati";
    }
    else{
        registerLoggedUser($login_result[0]);
    }
}

if(isUserLoggedIn()){
    $result["logineseguito"] = true;
    //se il login è eseguito con successo si dovrebbe visualizzare la sua homepage??
    
}

header('Content-Type: application/json');
echo json_encode($result);

?>