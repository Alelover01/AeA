<?php 
require_once "../db/bootstrap.php";


$_SESSION['post_id']=$_GET['post_id'];
$_SESSION['page']=$_GET['page'];
$templateParams["post"] = array('post_id' => $_GET['post_id']); 
if($_SESSION['page']==1){
    $_SESSION["usrSearch"]=$_GET['userId'];
}
$templateParams["profile"] = array("Username" => $_SESSION["usrSearch"]);
$templateParams["profile"] = array_merge($templateParams["profile"], array("Foto" => $dbh->getUserParams($_SESSION["usrSearch"])[0]["Foto"]));
$templateParams["post"] = array_merge($templateParams["post"], array("created_time" => $dbh->getPostUser($_SESSION["usrSearch"], $_SESSION["post_id"])[0]["created_time"]));
$templateParams["post"] = array_merge($templateParams["post"], array("caption" => $dbh->getPostUser($_SESSION["usrSearch"], $_SESSION["post_id"])[0]["caption"]));
$templateParams["post"] = array_merge($templateParams["post"], array("media_file" => $dbh->getPostUser($_SESSION["usrSearch"], $_SESSION["post_id"])[0]["media_file"]));
$templateParams["post"] = array_merge($templateParams["post"], array("numLikes" => count($dbh->getLikesPost( $_SESSION["post_id"]))));

require_once "../php/post.php"; 