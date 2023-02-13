<?php
	require_once '../db/bootstrap.php';

	$result["success"]=false;
	 if(isset($_SESSION["Username"])) {
		if (empty($_FILES['btnFile']['name']) ||
		($_FILES['btnFile']['type'] != 'image/jpeg' && $_FILES['btnFile']['type'] != 'image/png' && $_FILES['btnFile']['type'] != 'image/jpg') ||
		($_FILES['btnFile']['size'] > 2000000) ||
		(empty($_POST['cbCategoria']))) {

			$result["success"]=false;
		  }else{
			
			$uploadDirectory = "../images/";
			$uploadFileName = $uploadDirectory . $_FILES['btnFile']['name'];
			move_uploaded_file($_FILES['btnFile']['tmp_name'], $uploadFileName);
			$created_time = date("Y-m-d H:i:s");
			$idCategoria=$dbh->getIdPostByPostName($_POST["cbCategoria"]);
			$idPost=$dbh->getLastIdPost();
			$dbh->createPost($idPost[0]["post_id"]+1, $_SESSION["Username"], $uploadFileName, $created_time, $_POST["txtDidascalia"], $idCategoria[0]["post_type_id"]);
			$result["success"]=true;
		}
	 }

	header('Content-Type: application/json');
 	echo json_encode($result);
?>