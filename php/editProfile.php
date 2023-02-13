<?php
require "../db/database.php";
require "../db/bootstrap.php";
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

                    <?php 
                        $action = $_GET["action"];
                        echo "Action choosen is:".$action;
                        if ($action == 1){ ?>
                        <!-- Campo per Foto -->
                            <div class="form-group row">
                                <div class="col-md-2"></div>
                                <label class="col-md-3" for="lbFotoCaricare">Photo Profile:</label>
                                <div class="form-group col-md-6">
                                    <input type="file" class="form-control-file" id="btnFile" name="btnFile" accept=".jpg,.png,.jpeg">
                                </div>
                            </div>
                     <?php 
                        //da metetre update giusto
                        }
                        if($action == 2){ ?>
                        <!-- Campo per il nuovo Luogo-->
                            <div class="form-group row">
                                <div class="col-md-2"></div>
                                <label class="col-md-3" for="lbCity">New City:</label>
                                <div class="form-group col-md-6">
                                    <input id="lbCity" name="txtCity" class="form-control" placeholder="New York" type="text" required />
                                </div>
                            </div>
                     <?php
                        }
                        if($action == 3){ ?>
                        <!-- Campo per Didascalia-->
                            <div class="form-group row">
                                <div class="col-md-2"></div>
                                <label class="col-md-3" for="lbPass">New Password:</label>
                                <div class="form-group col-md-6">
                                    <input id="lbPass" name="txtPass" class="form-control" placeholder="Min. 7 char." type="password" required />
                                </div>
                            </div>
                     <?php
                        }
                      ?>
                    
                    <!-- Bottone che invia tutto -->
                    <div class="form-group">
                    <button type="submit" id="btn_change" name="btn_change" class="btn text-white bg-dark btn-block">Change!</button>
                    </div>
                    <button type="button" class="btn text-white bg-dark btn-block"><a class="text-white text-decoration-none" href="profile.php">Back</a></button>
                </form>
        </div>
            <div class="col-md-3"></div>

        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="../js/pubblica.js"></script>
</body>
</html>