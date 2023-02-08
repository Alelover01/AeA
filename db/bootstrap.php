<?php
session_start();
require_once("../php/functions.php");
require_once("../db/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "see&go", 3306);
?>