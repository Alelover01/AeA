<?php
require_once 'db/bootstrap.php';

$result["logouteseguito"] = false;

if(isUserLoggedIn()){
    session_unset();
    session_destroy();
    $result["logouteseguito"] = true;
}

header('Content-Type: application/json'); //Oppure --> login.php ??
echo json_encode($result);
?>
<!--
    Da mettere nella home(o nel profilo):
     <a href="api-logout.php">Logout</a>
-->