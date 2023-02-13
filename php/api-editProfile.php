<?php
require "../db/database.php";
require "../db/bootstrap.php";

    $foto = $_GET["newFoto"];
    $pass = $_GET["newPass"];
    $luogo = $_GET["newCity"];
    $msg = '';
    
    if (isset($foto)){
        $res= $dbh->updateFoto($foto,$_SESSION['Username']);
        $msg = "Updated photo successfull";
    }
    if (isset($pass)){
        $res= $dbh->updatePass($pass,$_SESSION['Username']);
        $msg = "Updated pass successfull";
    }
    if (isset($luogo)){
        $res= $dbh->updateLuogo($luogo,$_SESSION['Username']);
        $msg = "Updated city successfull";
    }

    if ($msg == ''){
        $msg='Error on the update try again';
    }


 ?>
 <!DOCTYPE html>
<html lang="it">
<head>
    <link rel="shortcut icon" href="../images/logo.jpg">
    <title> See & Go - Edit Profile</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/registration_style.css">
    <script src="../js/edit.js"></script>

</head>
<body>
    <div class="container-fluid p-0 overflow-hidden">
        <!--Titolo della pagina-->
        <div class="row">
            <div class="col-12">
                <header>
                    <!-- Vedere lo stile da mettere al titolo-->
                    <h1 class="display-1 font-monospace fw-bold text-center"> See & Go - Edit Profile </h1>
                </header>
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-12 col-md-6">
                    
                    <!-- Bottone che invia tutto -->
                    <div class="alert alert-info text-center" style="width:100%;"><?php echo $msg?></div>
                    <button  style="width:100%;"type="button" class="btn text-white bg-dark btn-block"><a class="text-white text-decoration-none" href="index_user_profile.php">Back</a></button>
        </div>
            <div class="col-md-3"></div>

        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</body>
</html>