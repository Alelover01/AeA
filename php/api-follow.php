<?php
require_once '../db/bootstrap.php';
require_once '../db/database.php';

$result["success"]=false;

if(isset($_SESSION["Username"]) && isset($_SESSION["usrSearch"])) {
	if (isset($_POST["follow"]) && !($dbh->isFollowing($_SESSION["Username"], $_SESSION["usrSearch"]))){
		$dbh->follow($_SESSION["Username"], $_SESSION["usrSearch"]);

	} elseif(isset($_POST["unfollow"])&& $dbh->isFollowing($_SESSION["Username"], $_SESSION["usrSearch"])){
		$dbh->unfollow($_SESSION["Username"], $_SESSION["usrSearch"]);

	}else{
	}
	$result["success"]=true;
}

header('Content-Type: application/json');
echo json_encode($result);
?>