<?php
	require_once 'bootstrap.php';

	// if(isset($_SESSION["Username"]) && isset($_SESSION["usrSearch"])) {
	// 	if($_SESSION["page"] == "personal"){
	// 		$result=$dbh->getPostByAuthor($_SESSION["username"]);
	// 		$image=$dbh->getUserInfo($_SESSION["username"])[0]["Photo"];
	// 		for($i = 0; $i < count($result); $i++){
	// 			$result[$i]["Photo"] = $image;
	// 			$result[$i]["Images"] = $dbh->getPostImages($result[$i]["Id"]);
	// 			$result[$i]["Comments"] = $dbh->getPostComments($result[$i]["Id"]);
	// 		}
	// 		$result = array_reverse($result);
	// 	} elseif ($_SESSION["page"] == "home"){
	// 		$result = $dbh->getHomePost();
	// 		for($i = 0; $i < count($result); $i++){
	// 			$result[$i]["Photo"] = $dbh->getUserInfo($result[$i]["User"])[0]["Photo"];
	// 			$result[$i]["Images"] = $dbh->getPostImages($result[$i]["Id"]);
	// 			$result[$i]["Comments"] = $dbh->getPostComments($result[$i]["Id"]);
	// 		}
	// 	} else {
	// 		$result=$dbh->getPostByAuthor($_SESSION["searchResult"]);
	// 		$image=$dbh->getUserInfo($_SESSION["searchResult"])[0]["Photo"];
	// 		for($i = 0; $i < count($result); $i++){
	// 			$result[$i]["Photo"] = $image;
	// 			$result[$i]["Images"] = $dbh->getPostImages($result[$i]["Id"]);
	// 			$result[$i]["Comments"] = $dbh->getPostComments($result[$i]["Id"]);
	// 		}
	// 		$result = array_reverse($result);
	// 	}
	// }
	// /* if(!isset($result)){
	// 	$result["error"]= true;
	// }
	//  */
	// $result["error"] = true;
	// if(in_array($_SESSION['user_id'],$post['likes_user_ids']))
	// {
	//    $like_or_unlike='Unlike';
	// }
	// else
	// {
	//  $like_or_unlike='Like';
	// }

	if(isset($_SESSION["Username"]) && isset($_SESSION["usrSearch"])) {
		if (empty($_POST['caption']) || empty($_FILES['image']['name'])) {
			// Mostra un messaggio di errore se uno o entrambi i campi sono vuoti
			echo 'Entrambi i campi sono obbligatori.';
		  }

		  if ($_FILES['image']['type'] != 'image/jpeg' && $_FILES['image']['type'] != 'image/png') {
			// Mostra un messaggio di errore se il formato dell'immagine non è supportato
			echo 'Formato dell\'immagine non supportato. Solo JPEG e PNG sono supportati.';
		  }

		  if ($_FILES['image']['size'] > 2000000) {
			// Mostra un messaggio di errore se la dimensione dell'immagine supera 2 MB
			echo 'La dimensione dell\'immagine non può superare 2 MB.';
		  }

		  if (empty($_POST['category'])) {
			echo 'La categoria è obbligatoria';
		  }
		  $result=$dbh->getPostByAuthor($_SESSION["username"]);
		  

	}
	
if(isset($_POST["Photo"]) && isset($_POST["Images"]) && isset($_POST["Comments"])) {
	$i = 0;
	$imagesName = array();
	if ($_POST["Images"][0] != "") {
		foreach($_POST["Images"] as $img) {
			$extension = substr($img, 11, 3);
			if ($extension == "jpe") {
				$extension = "jpg";
			}
			$encodedTxt = substr($img, 22);
			array_push($imagesName, ($dbh->nextImageId() + $i).".".$extension);
			$myfile = fopen("./upload/".$imagesName[$i++], "w") or die("Unable to open file!");
			fwrite($myfile, base64_decode($encodedTxt));
			fclose($myfile);
		}
	}

	$dbh->createPost($_POST["Photo"], $imagesName, $_POST["Comments"]);
	$followers = $dbh->getFollowers($_SESSION["username"]);
	foreach ($followers as $f) {
		$dbh->notification($f["User2"], "post", $_SESSION["username"]);
	}
	$result["error"] = false;
}
	header('Content-Type: application/json');
	echo json_encode($result);
	
	// function orderPosts($postToOrder){
	// 	$temp=$postToOrder[0]["Id"];
	// 	for ($p = 1; $p < count($postToOrder); $p++){
	// 		if($postToOrder[$p]["Id"] > temp){
				
	// 		}
	// 	}
		
	// 	return usort($postToOrder, "cmp");
	// }

	
?>