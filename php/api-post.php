<?php
	require_once '../db/bootstrap.php';

	$result["success"]=false;
	 if(isset($_SESSION["Username"])) {
		if (empty($_FILES['btnFile']['name'])) {
			// Mostra un messaggio di errore se uno o entrambi i campi sono vuoti
			echo 'Campo obbligatorio.';
		  }

		  if ($_FILES['btnFile']['type'] != 'image/jpeg' && $_FILES['btnFile']['type'] != 'image/png' && $_FILES['btnFile']['type'] != 'image/jpg') { //image/jpeg
			// Mostra un messaggio di errore se il formato dell'immagine non è supportato
			echo 'Formato dell\'immagine non supportato. Solo JPEG e PNG e JPG sono supportati.';
		  }

		  if ($_FILES['btnFile']['size'] > 2000000) {
			// Mostra un messaggio di errore se la dimensione dell'immagine supera 2 MB
			echo 'La dimensione dell\'immagine non può superare 2 MB.';
		  }

		  if (empty($_POST['cbCategoria'])) {
			echo 'La categoria è obbligatoria';
		  }
		  $created_time = date("Y-m-d H:i:s");
		  $idCategoria=$dbh->getIdPostByPostName($_POST["cbCategoria"]);
		  $idPost=$dbh->getLastIdPost();
		  $dbh->createPost($idPost[0]["post_id"]+1, $_SESSION["Username"], $_FILES['btnFile']['name'], $created_time, $_POST["txtDidascalia"], $idCategoria[0]["post_type_id"]);
		  $result["success"]=true;
	 }

	header('Content-Type: application/json');
 	echo json_encode($result);
?>