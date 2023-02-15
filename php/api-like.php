<?php
require_once '../db/bootstrap.php';
require_once '../db/database.php';

$result["success"] = true;
    foreach($dbh->getLikesPost($_SESSION["post_id"]) as $like){
        if($like["user_profile_id"]==$_SESSION["Username"]){
            $result["success"] = false;
        }
    }
    if($result["success"]){

        $dbh->insertLike( $_SESSION["post_id"],$_SESSION["Username"]);
        $idAlert=$dbh->getLastIdAlert();
        $description="Liked your post ";
        $user=$dbh->selectPostUser($_SESSION["post_id"]);
        var_dump($user[0]["created_by_user_id"]);
        $dbh->insertAlert($idAlert[0]["IdAlert"]+1,$_SESSION["Username"],$description,$user[0]["created_by_user_id"],$_SESSION["post_id"]);
        
    }   

header('Content-Type: application/json');
echo json_encode($result);
?>