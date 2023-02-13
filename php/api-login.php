<?php
require_once '../db/bootstrap.php';
require_once '../db/database.php';


$result["logineseguito"] = false;

	if(isset($_POST["Username"]) && isset($_POST["Password"])) {
		$login_result = $dbh->checkLogin($_POST["Username"], $_POST["Password"]);
		if(count($login_result)!=0) {
            registerLoggedUser($login_result[0]);
			$result["logineseguito"] = true;
			$_SESSION["Username"] = $login_result[0]["Username"];
            $_SESSION["Password"] = $login_result[0]["Password"];
            
		}else{
            //Login fallito
            $result["error"] = "Username e/o password errati";
        }
	}
    
	header('Content-Type: application/json');
	echo json_encode($result);
?>