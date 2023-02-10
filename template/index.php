<?php
require "../db/database.php";
require "../db/bootstrap.php";

    $username = $_GET["username"];
    $foto = $_GET["foto"];
    $nome = $_GET["nome"];
    $cognome = $_GET["cognome"];
    $sesso = $_GET["sesso"];
    $email = $_GET["email"];
    $password = $_GET["pass"];
    $dataNascita = $_GET["dataNascita"];
    $luogo = $_GET["luogo"];

    if (isset($username) && isset($foto) && isset($nome) && isset($cognome) && isset($sesso) && isset($email) && isset($password) && isset($dataNascita) && isset($luogo)){
        echo "Input presi correttamente";
    }
    else {
         echo "Input non presi correttamente";
	}

    /*
   
    $result = $dbh->checkRegistration($username, $email);
    if ($result >0){
        echo "Username o email già presenti nel database";
        //la registrazione non ha avuto successo
    }
    else {
        $result= $dbh->registration($username,$nome, $cognome, $sesso, $email, $password, $dataNascita, $città);
        echo "Registrazione avvenuta con successo";
        //registrazione avvenuta con successo
    }
    */

    

?>