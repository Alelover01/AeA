<?php
require_once '../db/bootstrap.php';
require_once '../db/database.php';

$result["searchSuccess"] = false;

	if(isset($_POST["usrSearch"])) {

		if(($dbh->userInDb($_POST["usrSearch"]))!=0) {
            $usrSearch = $dbh->researchUser($_POST["usrSearch"]);
			$result["searchSuccess"] = true;
			$_SESSION["usrSearch"] = $usrSearch[0]["Username"];
            }
		}else{
            //ricerca fallita
            $result["error"] = "Utente inesistente \n o Username sbagliato!";
        }
    
	header('Content-Type: application/json');
	echo json_encode($result);
?>
