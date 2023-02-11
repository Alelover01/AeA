<?php
require_once '../db/bootstrap.php';
require_once '../db/database.php';

$result["success"] = true;
    foreach($dbh->getLikesPost( $_SESSION["post_id"]) as $like){
        if($like["user_profile_id"]==$_SESSION["Username"]){
            $result["success"] = false;
        }
    }
    if($result["success"]){
        $dbh->insertLike( $_SESSION["post_id"],$_SESSION["Username"]);
    }   

header('Content-Type: application/json');
echo json_encode($result);
?>