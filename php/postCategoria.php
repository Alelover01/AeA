<!DOCTYPE html>
<html lang="it">
    <head>
        <link rel="shortcut icon" href="../images/logo.jpg">
        <title>See&Go - Homepage</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/cerca_style.css" >
        <link rel="stylesheet" href="../css/menu_style.css" >
        <script src="../js/menu.js"></script>
        
        
  </head>
  <body class="bg-light">
    <header class="py-3 text-white bg-dark">
      <h1 class="font-monospace text-center">See&Go - Homepage</h1>
    </header> 
    <!-- MENU A COMPARSA -->
              <aside>
                <button class="hamburger">
                    <div class="bar"></div>
                </button>
                <!-- Menù a comparsa -->
                <nav class="aComparsa">
                    <ul>
                        <li>
                            <a href="home.php"><img src="../images/home.png" alt="Icona Home" /></a>
                        </li>
                        <li>
                            <a href="cerca.php"><img src="../images/cerca.png" alt="Icona Cerca" /></a>
                        </li>
                        <li>
                            <a href="alert.php"><img src="../images/notifiche.png" alt="Icona Notifiche" /></a>
                        </li>
                        <li>
                            <a href='index_user_profile.php'><img src="../images/profilo.png" alt="Icona Profilo" /></a>
                        </li>
                    </ul>
                </nav>
        
            </aside>

    <main>
    <input type="usrSearch" id="usrSearch" name="usrSearch" class="col form-control" placeholder="Search"/>
    <label class="form-label" for="search"></label>
    <button id="btn_search" name="btn_search" type="submit" class="btn btn-primary btn-block mt-2 mb-4">Cerca</button>
    <button type="button" class="btn text-white bg-dark btn-block"><a class="text-white text-decoration-none" href="cerca.php">Back</a></button>
        <div class="container-fluid p-0 overflow-hidden">
            

        <div class="py-4 px-4"> 
            <div class="d-flex align-items-center justify-content-between mb-3"> 
                <h5 class="mb-0">Photos recommended</h5>
                <a href="#" class="btn btn-link text-muted">Show all</a> 
            </div> 
            <div class="row"> 
                <?php require_once '../db/bootstrap.php';
                require_once '../db/database.php';
                      $typeId=$_GET['id'];
                      $postsType=$dbh->getPostCategories($typeId);
                      foreach($postsType as $post):
                ?>
                <div class="col-lg-4 mb-4 pr-lg-1">
                    <img src="<?php echo $post["media_file"];?>" style="width: 80%; height: 100%;" alt="" class="img-fluid rounded shadow-sm">
                </div> 
                <?php endforeach;?>
            </div>

            
            <!-- FOOTER -->
        <div class="row">
            <div class="col-12">
                    <footer class="py-3 text-white bg-dark">
                        <p class="font-monospace text-center">See&Go</p>
                    </footer>   
            </div>   
        </div>       
    </main>
    <script src="../js/cerca.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  </body>
</html>