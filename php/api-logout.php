<?php
require_once '../db/bootstrap.php';
require_once '../db/database.php'

if(isUserLoggedIn()){
    session_unset();
    session_destroy();
    $result["logouteseguito"] = true;
}
    

header('Content-Type: application/json');
echo json_encode($result);
?>