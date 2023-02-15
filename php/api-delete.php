<?php
require_once '../db/bootstrap.php';
require_once '../db/database.php';

$result["success"] = false;

    $dbh->deletePost($_SESSION["post_id"]);
    $dbh->deleteCommentsPost($_SESSION["post_id"]);
    $dbh->deleteLikesPost($_SESSION["post_id"]);
    if(count($dbh->getPostByType($_SESSION["post_id"]))==0 && 
        $dbh->deleteCommentsPost($_SESSION["post_id"])==true &&
        $dbh->deleteLikesPost($_SESSION["post_id"])==true){
        $result["success"] = true;
    }

	header('Content-Type: application/json');
	echo json_encode($result);
?>
