<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/cerca_style.css" >
        <link rel="stylesheet" href="../css/menu_style.css" >
        <script src="../js/menu.js"></script>
    

    <title>See&GO - Login</title>
    <link rel="shortcut icon" href="../images/logo.jpg">
</head>
<body>
<main>
        <!-- Section: Background image -->
<section  class=" bg-image" style=" background-image: url(../images/Rockies_in_the_morning.jpg) ; width: 100%; height: 100%;; background-size: cover; background-repeat: no-repeat;">
        <header class="py-4">
            <h1 class="font-monospace fw-bold text-center">See&GO - EXPLORE</h1>
        </header>
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
    <h5 class="font-monospace text-center fw-bold mt-3 mb-0">Search what you like!</h5>
        <div class="col-md-4 offset-md-2 col-lg-8 mt-3 mb-3 offset-lg-2 div-wrapper d-flex justify-content-center align-items-center">
            <div class="row ">
                        <div class="col-lg-7">
                            <label class="form-label text-center" for="search"></label>
                            <input type="usrSearch" id="usrSearch" name="usrSearch" class="d-grid gap-2 col-6 mx-auto form-control" placeholder="Search"/>
                        </div>
                        <div class="col-sm">
                            <button id="btn_search" name="btn_search" type="submit" class="btn btn-primary btn-block mt-4 mb-4">Go</button>
                        </div>
            </div>
        </div>
       
          <div class="container-fluid p-0 overflow-hidden">
           
                <div class="py-4 px-0"> 
                      <div class="bg-white shadow rounded"> 
                            <div class="im2 px-4 pt-2 pb-4">
                                <div class="row align-items-start">
                                    <?php  require_once '../db/bootstrap.php';
                                            $categories=$dbh->getPost_Type();
                                            foreach($categories as $type_cat):?>
                                            <?php ?>
                                        <div class="col-md-4">
                                            <div class="box box-widget widget-user-2">
                                                <div class="bg-image card shadow-1-strong text-center" style="background-color: #20c997; width: 100%; height: 100%;">
                                                    <div class="d-grid gap-2 col-5 mx-auto">
                                                        <a href='postCategoria.php?id=<?php echo $type_cat["post_type_id"];?>'>
                                                            <button class="btn btn-outline-dark btn-lg btn-block mt-2 mb-2 fw-bold text-center" id="<?php echo $type_cat["post_type_id"];?>" name="btnCategory" type="button">
                                                            <?php echo $type_cat["post_type_name"];?></button>
                                                        </a> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                 </div>
            </div>
         </div>
   
</section> 
         <!-- FOOTER -->
         <div class="row">
            <div class="col-12">
                    <footer class="py-3 text-white bg-dark ">
                        <p class="font-monospace text-center">See&Go</p>
                    </footer>   
            </div>   
        </div>  
        
    
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="../js/login.js"></script>
</body>
</html>