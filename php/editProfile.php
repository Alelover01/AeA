
<!DOCTYPE html>
<html lang="it">
<head>
    <link rel="shortcut icon" href="../images/logo.jpg">
    <title> See & Go - Create Post </title>
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
                    <h1 class="display-1 font-monospace fw-bold text-center"> See & Go - Create Post </h1>
                </header>
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-12 col-md-6">



                <form method="post" action="editProfile.php">
                <!-- Campo per Categoria-->
                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <label class="col-md-3" for="lbCategoria">Edit:</label>
                        <div class="form-group col-md-6">
                        <select class="form-control" name="cbCategoria" id="cbCategoria" required>
                                <!-- Fare il cotrollo che questo input sia sempre selezionato -->
                                <option value="0" selected>Click to select one</option>
                                <option value="1">Edit your photo profile</option>
                                <option value="2">Edit your city</option>
                                <option value="3">Change your password</option>
                            </select>
                        </div>
                    </div>
                    <!-- Button dell'edit-->

                    <?php 
                        $action = $_POST["cbCategoria"];
                        echo "Action choosen is:".$action;
                    ?>


                    <!-- Campo per Foto -->
                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <label class="col-md-3" for="lbFotoCaricare">Foto da caricare:</label>
                        <div class="form-group col-md-6">
                            <input type="file" class="form-control-file" id="btnFile" name="btnFile" accept=".jpg,.png,.jpeg">
                        </div>
                    </div>

                    <!-- Campo per Didascalia-->
                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <label class="col-md-3" for="lbDidascalia">Didascalia:</label>
                        <div class="form-group col-md-6">
                            <input id="txtDidascalia" name="txtDidascalia" class="form-control" placeholder="Didascalia" type="text" required />
                        </div>
                    </div>

                    
                    <!-- Bottone che invia tutto -->
                    <div class="form-group">
                    <button type="submit" id="btn_change" name="btn_pubblica" class="btn text-white bg-dark btn-block">Change!</button>
                    </div>
                    <button type="button" class="btn text-white bg-dark btn-block"><a class="text-white text-decoration-none" href="home.php">Back</a></button>
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