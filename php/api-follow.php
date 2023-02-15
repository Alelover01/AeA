<?php
require_once '../db/bootstrap.php';
require_once '../db/database.php';

$result["success"]=false;

if(isset($_SESSION["Username"]) && isset($_SESSION["usrSearch"])) {
	if (isset($_POST["follow"]) && !($dbh->isFollowing($_SESSION["Username"], $_SESSION["usrSearch"]))){
		$dbh->follow($_SESSION["Username"], $_SESSION["usrSearch"]);
        $idAlert=$dbh->getLastIdAlert();
        $description="Started following you";

        $dbh->insertAlert($idAlert[0]["IdAlert"]+1,$_SESSION["Username"],$description,$_SESSION["usrSearch"],null);

	} elseif(isset($_POST["unfollow"])&& $dbh->isFollowing($_SESSION["Username"], $_SESSION["usrSearch"])){
		$dbh->unfollow($_SESSION["Username"], $_SESSION["usrSearch"]);

	}else{
	}
	$result["success"]=true;
}

header('Content-Type: application/json');
echo json_encode($result);
?>