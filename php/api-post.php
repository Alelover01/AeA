<?php
	require_once '../db/bootstrap.php';

	$result["success"]=false;
	// if(isset($_SESSION["Username"])) {
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
		  $dbh->createPost($idPost[0]["post_id"]+1, "mmarioRoss ", $_FILES['btnFile']['name'], $created_time, $_POST["txtDidascalia"], $idCategoria[0]["post_type_id"]);
		  $result["success"]=true;
	// }

	header('Content-Type: application/json');
 	echo json_encode($result);

	
// if(isset($_POST["Photo"]) && isset($_POST["Images"]) && isset($_POST["Comments"])) {
// 	$i = 0;
// 	$imagesName = array();
// 	if ($_POST["Images"][0] != "") {
// 		foreach($_POST["Images"] as $img) {
// 			$extension = substr($img, 11, 3);
// 			if ($extension == "jpe") {
// 				$extension = "jpg";
// 			}
// 			$encodedTxt = substr($img, 22);
// 			array_push($imagesName, ($dbh->nextImageId() + $i).".".$extension);
// 			$myfile = fopen("./upload/".$imagesName[$i++], "w") or die("Unable to open file!");
// 			fwrite($myfile, base64_decode($encodedTxt));
// 			fclose($myfile);
// 		}
// 	}

// 	$dbh->createPost($_POST["Photo"], $imagesName, $_POST["Comments"]);
// 	$followers = $dbh->getFollowers($_SESSION["username"]);
// 	foreach ($followers as $f) {
// 		$dbh->notification($f["User2"], "post", $_SESSION["username"]);
// 	}
// 	$result["error"] = false;
// }
// 	header('Content-Type: application/json');
// 	echo json_encode($result);
	
	// function orderPosts($postToOrder){
	// 	$temp=$postToOrder[0]["Id"];
	// 	for ($p = 1; $p < count($postToOrder); $p++){
	// 		if($postToOrder[$p]["Id"] > temp){
				
	// 		}
	// 	}
		
	// 	return usort($postToOrder, "cmp");
	// }

	
?>