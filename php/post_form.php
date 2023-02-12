
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

    <script src="../js/create_post.js"></script>
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
        <!-- <form action="create_post.php" method="post" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Titolo del post">
        <textarea name="body" placeholder="Testo del post"></textarea>
        <input type="file" name="image">
        <input type="text" name="caption" placeholder="Didascalia dell'immagine">
        <input type="submit" value="Crea post">
        </form> -->

        <!-- Form da mettere per bene-->
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-12 col-md-6">
                <form>
                    
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
                            <input id="lbDidascalia" name="txtDidascalia" class="form-control" placeholder="Didascalia" type="text" required />
                        </div>
                    </div>

                    <!-- Campo per Categoria-->
                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <label class="col-md-3" for="lbCategoria">Categoria:</label>
                        <div class="form-group col-md-6">
                        <select class="form-control" name="cbCategoria" id="lbCategoria" required>
                                <!-- Fare il cotrollo che questo input sia sempre selezionato -->
                                <option value="0" selected>Clicca per sceglierne uno</option>
                                <option value="Itinerari">Itinerari</option>
                                <option value="Foto luoghi">Foto luoghi</option>
                                <option value="Cibo">Cibo</option>
                                <option value="Outfit">Outfit</option>
                                <option value="Tips mezzi">Tips mezzi</option>
                                <option value="Road Trip">Road Trip</option>
                            </select>
                        </div>
                    </div>
					
					<!-- Campo per Città
                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <label class="col-md-3" for="lbCittà">Città:</label>
                        <div class="form-group col-md-6">
                            <input id="lbCittà" name="txtCittà" class="form-control" placeholder="Milan" type="text" required />
                        </div>
                    </div> -->

                    <!-- Bottone che invia tutto -->
                    <div class="form-group">
                        <input onclick="" class="btn btn-dark col-6" id="btnPubblica" type="button" value="Pubblica!" />
                    </div>
                </form>
        </div>
            <div class="col-md-3"></div>

        </div>

    </div>
</body>
</html>