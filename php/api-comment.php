<?php
require_once '../db/bootstrap.php';
require_once '../db/database.php';

$result["success"] = false;

	if(isset($_POST["comment"])) {
        $idComm=$dbh->getLastIdComm();
        var_dump($idComm[0]["comment_id"]+1);
        $created_time = date("Y-m-d H:i:s");
        $dbh->insertComment($idComm[0]["comment_id"]+1,$_POST["comment"], $_SESSION["Username"], $_SESSION["post_id"],$created_time);
        $idAlert=$dbh->getLastIdAlert();
        $description="Comment your post ";
        $user=$dbh->selectPostUser($_SESSION["post_id"]);
        var_dump($user[0]["created_by_user_id"]);
        $dbh->insertAlert($idAlert[0]["IdAlert"]+1,$_SESSION["Username"],$description,$user[0]["created_by_user_id"],$_SESSION["post_id"]);

		$result["success"] = true;

		}else{
            //commento fallito
            $result["error"] = "ERRORE!";
        }
    
header('Content-Type: application/json');
echo json_encode($result);
?>
