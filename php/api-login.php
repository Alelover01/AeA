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

            if(!empty($_POST["remember"])) {//NON ho capito se funziona o no
                //COOKIES for username
                setcookie ("user_login",$_POST["Username"],time()+ (10 * 365 * 24 * 60 * 60));
                //COOKIES for password
                setcookie ("userpassword",$_POST["Password"],time()+ (10 * 365 * 24 * 60 * 60));
                } else {
                    if(isset($_COOKIE["user_login"])) {
                        setcookie ("user_login","");
                        if(isset($_COOKIE["userpassword"])) {
                            setcookie ("userpassword","");
                        }
                    }
                }
		}else{
            //Login fallito
            $result["error"] = "Username e/o password errati";
        }
	}
    
	header('Content-Type: application/json');
	echo json_encode($result);
?>