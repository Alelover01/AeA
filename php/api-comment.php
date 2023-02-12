<?php
require_once '../db/bootstrap.php';
require_once '../db/database.php';

$result["success"] = false;

	if(isset($_POST["comment"])) {
        $idComm=$dbh->getLastIdComm();
        var_dump($idComm[0]["comment_id"]+1);
        $dbh->insertComment($idComm[0]["comment_id"]+1,$_POST["comment"], $_SESSION["Username"], $_SESSION["post_id"]);
		$result["success"] = true;

		}else{
            //commento fallito
            $result["error"] = "ERRORE!";
        }
    
header('Content-Type: application/json');
echo json_encode($result);
?>
