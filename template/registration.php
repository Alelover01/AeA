<?php
//messo adesso per adesso qui ma dopo da cambiare
require "bootstrap.php";
$name=$_POST["name"]; //esempio di quello che devo mettere per tutti i campi presenti
//controllare poi che l'utente non sia gi� presente'
//trovare un bel modo per dirle se l'operazione � andata a buon fine o meno'
//usare metodo nella fuction per  la insert dei dati nel db

//FARE POI LO SCRIPT DEL RIPETI password
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <link rel="shortcut icon" href="../images/logo.jpg">
    <title> See & Go - Registration </title>
    <meta charset= "UTF-8" />
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
                    <h1 class="display-1 font-monospace fw-bold text-center"> See & Go - Registration </h1>
                </header>
            </div>
            
        </div>

        <!-- Form da mettere per bene-->
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-12 col-md-6">
                <form method="post">
                    
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
                            <input id="lbPassword" name="txtPassword" class="form-control" placeholder="Password" type="password" required />
                        </div>
                    </div>

                    <!-- Campo per Ripeti Password-->
                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <label class="col-md-3" for="lbRipetiPass">Ripeti Password:</label>
                        <div class="form-group col-md-6">
                            <!-- Disabilitata e poi da abilitare quando viene emmessa la password -->
                            <input id="lbRipetiPass" name="txtRipetiPass" class="form-control" placeholder="Ripeti Password" type="password" disabled />
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
					
					<!-- Campo per Citt�-->
                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <label class="col-md-3" for="lbCitt�">Citt�:</label>
                        <div class="form-group col-md-6">
                            <input id="lbCitt�" name="txtCitt�" class="form-control" placeholder="Milan" type="text" required />
                        </div>
                    </div>

                    <!-- Bottone che invia tutto -->
                    <div class="form-group">
                        <input class="btn btn-dark col-6" type="button" value="Registrati" />
                    </div>

                    <p class="text-center">Hai gi� un account? <a href="Login.html">Log In</a> </p>
                </form>
        </div>
            <div class="col-md-3"></div>

        </div>

    </div>
</body>
</html>