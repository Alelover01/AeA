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
        $result = $dbh-> checkRegistration($username);
        if ($result->num_rows > 0) {
            $msg= "OPS. Qualcun'altro ha questo username. Provane un altro";
        }       
        else {
            $msg= "L'id non esiste nella tabella, puoi inserirlo.";
             $reg= $dbh->registration($username, $foto, $nome, $cognome, $sesso, $email, $password, $dataNascita, $luogo);

        }

    }
    
    require "registration.php";

?>

<div class="alert alert-info"><?php echo $msg ?></div>