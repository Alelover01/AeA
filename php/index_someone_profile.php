<?php 
require_once "../db/bootstrap.php";


$templateParams["profile"] = array("Username" => $_SESSION["usrSearch"]);
$templateParams["profile"] = array_merge($templateParams["profile"], array("Nome" => $dbh->getUserParams($_SESSION["usrSearch"])[0]["Nome"]));
$templateParams["profile"] = array_merge($templateParams["profile"], array("Cognome" => $dbh->getUserParams($_SESSION["usrSearch"])[0]["Cognome"]));
$templateParams["profile"] = array_merge($templateParams["profile"], array("Città" => $dbh->getUserParams($_SESSION["usrSearch"])[0]["Città"]));
$templateParams["profile"] = array_merge($templateParams["profile"], array("Paese" => $dbh->getUserParams($_SESSION["usrSearch"])[0]["Paese"]));
$templateParams["profile"] = array_merge($templateParams["profile"], array("numFollower" => count($dbh->getFollowing($_SESSION["usrSearch"]))));
$templateParams["profile"] = array_merge($templateParams["profile"], array("numFollowed" => count($dbh->getFollowed($_SESSION["usrSearch"]))));
$templateParams["profile"] = array_merge($templateParams["profile"], array("numFoto" => count($dbh->getFotoPost($_SESSION["usrSearch"]))));
$templateParams["profile"] = array_merge($templateParams["profile"], array("Foto" => $dbh->getUserParams($_SESSION["usrSearch"])[0]["Foto"]));

$templateParams["profile"] = array_merge($templateParams["profile"], array("followed" => (count($dbh->isFollowing($_SESSION["Username"], $_SESSION["usrSearch"])) != 0)));

$user_profile = false;

require_once "../php/profile.php"; //?
?>