<?php
require "../db/database.php";
require "../db/bootstrap.php";

if(isset($_POST["btnRegistrati"])){
    //campi che ci servono 
    $username = $_POST["txtUsername"];
    $nome = $_POST["txtNome"];
    $cognome = $_POST["txtCognome"];
    $sesso = $_POST["cbSesso"];
    $email = $_POST["txtEmail"];
    $password = $_POST["txtPassword"];
    $dataNascita = $_POST["dtDataNascita"];
    $città = $_POST["txtCittà"];

    $result = $dbh->checkRegistration($username, $email);
    if ($result >0){
        echo "Username o email già presenti nel database";
        //la registrazione non ha avuto successo
    }
    else {
        $result= $dbh->registration($username,$nome, $cognome, $sesso, $email, $password, $dataNascita, $città);
        echo "Registrazione avvenuta con successo";
        //registrazione avvenuta con successo
    }
}

?>


<!DOCTYPE html>
<html lang="it">
<head>
    <link rel="shortcut icon" href="../images/logo.jpg">
    <title> See & Go - Registration </title>
    <meta charset= "utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/registration_style.css">
    <script src="../js/passCheck.js"></script>
</head>
<body>
    <div class="container-fluid p-0 overflow-hidden">
        <!--Titolo della pagina-->
        <div class="row">
            <div class="col-12">
                <header>
                    <!-- Vedere lo stile da mettere al titolo-->
                    <h1 class="display-1 font-monospace fw-bold text-center"> See & Go - Registration </h1>
                </header>
            </div>
            
        </div>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-12 col-md-6">
                <form action="#" method="get">
                    
                    <!-- Campo per Usename -->
                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <label class="col-md-3" for="lbUsername">Username:</label>
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">@</div>
                                </div>
                                <input id="lbUsername" name="txtUsername" class="form-control" placeholder="Username" type="text" required />
                            </div>
                        </div>
                    </div>

                    <!-- Campo per Foto Profilo-->
                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <label class="col-md-3" for="lbFotoProfilo">FotoProfilo:</label>
                        <div class="form-group col-md-6">
                            <input type="file" class="form-control-file" id="btnFile" name="btnFile" accept=".jpg,.png,.jpeg">
                        </div>
                    </div>

                    <!-- Campo per Nome-->
                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <label class="col-md-3" for="lbNome">Nome:</label>
                        <div class="form-group col-md-6">
                            <input id="lbNome" name="txtNome" class="form-control" placeholder="Nome" type="text" required />
                        </div>
                    </div>

                    <!-- Campo per Cognome-->
                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <label class="col-md-3" for="lbCognome">Cognome:</label>
                        <div class="form-group col-md-6">
                            <input id="lbCognome" name="txtCognome" class="form-control" placeholder="Cognome" type="text" required />
                        </div>
                    </div>

                    <!-- Campo per Sesso-->
                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <label class="col-md-3" for="lbSesso">Sesso:</label>
                        <div class="form-group col-md-6">
                            <select class="form-control" name="cbSesso" id="lbSesso" required>
                                <!-- Fare il cotrollo che questo input sia sempre selezionato -->
                                <option value="0" selected>Clicca per sceglierne uno</option>
                                <option value="femmina">F</option>
                                <option value="maschio">M</option>
                                <option value="nonSpefificato">Preferisco non specificarlo</option>
                            </select>
                        </div>
                    </div>


                    <!-- Campo per Email-->
                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <label class="col-md-3" for="lbEmail">Email:</label>
                        <div class="form-group col-md-6">
                            <input id="lbEmail" name="txtEmail" class="form-control" placeholder="name@example.com" type="email" required />
                        </div>
                    </div>

                    <!-- Campo per Password-->
                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <label class="col-md-3" for="lbPassword">Password:</label>
                        <div class="form-group col-md-6">
                            <input id="lbPassword" name="txtPassword" class="form-control" placeholder="Password minimo 7 caratteri" type="password" required />
                        </div>
                    </div>

                    <!-- Campo per Ripeti Password-->
                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <label class="col-md-3" for="lbRipetiPass">Ripeti Password:</label>
                        <div class="form-group col-md-6">
                            <!-- Disabilitata e poi da abilitare quando viene emmessa la password -->
                            <input id="lbRipetiPass" name="txtRipetiPass" class="form-control" placeholder="Ripeti Password" type="password" required />
                            <div id="msgPassword"></div>
                        </div>
                    </div>

                    <!-- Campo per Data Di Nascita-->
                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <label class="col-md-3" for="lbDataNascita">Data Di Nascita:</label>
                        <div class="form-group col-md-6">
                            <input class="form-control" type="date" id="lbDataNascita" name="dtDataNascita" required />
                        </div>
                    </div>
					
					<!-- Campo per Città-->
                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <label class="col-md-3" for="lbCittà">Luogo:</label>
                        <div class="form-group col-md-6">
                            <input id="lbCittà" name="txtCittà" class="form-control" placeholder="Milan" type="text" required />
                        </div>
                    </div>

                    <!-- Bottone che invia tutto -->
                    <div class="form-group">
                        <input onclick="checkPassword()" name="btnRegistrati" class="btn btn-dark col-6" type="button" value="Registrati" />
                    </div>

                    <p class="text-center">Utente registrato? <a href="Login.php">Log In</a> </p>
                </form>
        </div>
            <div class="col-md-3"></div>

        </div>

    </div>
</body>
</html>