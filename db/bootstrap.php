<?php
session_start();
require_once("php/functions.php");
require_once("database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "see_go", 3306);
?>
