<?php 
require_once "../db/bootstrap.php";

    $templateParams["profile"] = array("Username" => $_SESSION["Username"]);
    $templateParams["profile"] = array_merge($templateParams["profile"], array("Nome" => $dbh->getUserParams($_SESSION["Username"])[0]["Nome"]));
    $templateParams["profile"] = array_merge($templateParams["profile"], array("Cognome" => $dbh->getUserParams($_SESSION["Username"])[0]["Cognome"]));
    $templateParams["profile"] = array_merge($templateParams["profile"], array("Città" => $dbh->getUserParams($_SESSION["Username"])[0]["Città"]));
    $templateParams["profile"] = array_merge($templateParams["profile"], array("Paese" => $dbh->getUserParams($_SESSION["Username"])[0]["Paese"]));
    $templateParams["profile"] = array_merge($templateParams["profile"], array("numFollower" => count($dbh->getFollowing($_SESSION["Username"]))));
    $templateParams["profile"] = array_merge($templateParams["profile"], array("numFollowed" => count($dbh->getFollowed($_SESSION["Username"]))));
    $templateParams["profile"] = array_merge($templateParams["profile"], array("numFoto" => count($dbh->getFotoPost($_SESSION["Username"]))));
    $templateParams["profile"] = array_merge($templateParams["profile"], array("Foto" => $dbh->getUserParams($_SESSION["Username"])[0]["Foto"]));
     
    $user_profile = true;


require_once "../php/profile.php";

?>