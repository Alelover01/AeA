<!DOCTYPE html>
<html lang="it">
    <?php 
    require_once "../db/bootstrap.php";
    ?>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/profile_style.css" >
        <link rel="stylesheet" href="../css/menu_style.css">
        <script src="../js/menu.js"></script>
        
        <title>See&GO - Profile</title>
        <link rel="shortcut icon" href="../images/logo.jpg">
    </head>
    <body>
        <header >
            <h1 class="font-monospace fw-bold text-center pt-2 pb-2">See&Go</h1>
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
                        <a  href="alert.php"><img src="../images/notifiche.png" alt="Icona Notifiche" /></a>
                    </li>
                    <li><?php $profile = true;?>
                        <a  href='index_user_profile.php'><img  src="../images/profilo.png" alt="Icona Profilo" /></a>
                    </li>
                </ul>
            </nav>
        </aside>

        <main>
            <div class="container-fluid p-0 overflow-hidden">
                
                <div class="row">
                <div class="col-md-1"></div>
                    <div class="col-10">
                        <!-- Profile widget --> 
                        <div class="bg-white shadow rounded"> 
                            <div class="im2 px-4 pt-0 pb-4  ">
                                <ul class="list-inline mb-0" > 
                                    <li class="list-inline-item" >
                                        <img src=<?php echo $templateParams["profile"]["Foto"]?> style="width: 250px; height: 250px; min-width: auto; min-height: auto;" alt="..."  class="rounded-circle mt-2 mb-1 img-thumbnail">
                                    </li>
                                    <li class="list-inline-item text-center" >
                                        <h4 class="font-italic mt-2 mb-0" ><?php echo $templateParams["profile"]["Nome"]?> <?php echo $templateParams["profile"]["Cognome"]?></h4>
                                        <p class="font-italic mb-0">@<?php echo $templateParams["profile"]["Username"]?></p>
                                        <p class="font-italic mb-0"><?php echo $templateParams["profile"]["Città"]?>, <?php echo $templateParams["profile"]["Paese"]?></p>
                                    </li>
                                    
                                </ul>
                                
                            </div>
                            <div class="bg-light p-4 d-flex row2">
                                <div class="col-md-1"></div>
                                
                                <div class="col-6 ">
                                <form method="POST">
                                <?php if(isset($user_profile) && $user_profile == true): ?>
                                    <a id="" class="btn btn-outline-dark btn-sm btn-block mt-3 mb-1 fw-bold text-center">Edit</a>
                                <?php elseif(isset($user_profile) && $user_profile == false && !$templateParams["profile"]["followed"]): ?>
                                    <a id="btn_follow" name="follow" class="btn btn-outline-dark btn-sm btn-block mt-3 mb-1 fw-bold text-center">Follow Now</a>
                                <?php else: ?>
                                    <a id="btn_follow" name="unfollow" class="btn btn-outline-dark btn-sm btn-block mt-3 mb-1 fw-bold text-center">Unfollow Now</a>
                                <?php endif; ?>
                                </form>    
                            </div>
                                
                                <div class="col-4 text-center">
                                    <ul class="list-inline mb-0 "> 
                                        <li class="list-inline-item "> 
                                            <p class="font-italic fw-bold mb-0"><?php echo $templateParams["profile"]["numFoto"];?></p>
                                            <a  class="btn btn-sm btn-block">Photos</a>
                                        </li>
                                        <li class="list-inline-item "> 
                                            <p class="font-italic fw-bold mb-0"><?php echo $templateParams["profile"]["numFollower"];?></p>
                                            <a href="#" class="btn btn-sm btn-block">Followers</a>
                                        </li> 
                                        <li class="list-inline-item ">
                                            <p class="font-italic fw-bold mb-0"><?php echo $templateParams["profile"]["numFollowed"];?></p>
                                            <a href="#" class="btn btn-sm btn-block">Following</a>
                                        </li>
                                    </ul> 
                                </div> 
                            </div>
                            
                                <!--<div class="px-4 py-3"> 
                                    <h5 class="mb-0">About</h5> 
                                    <div class="p-4 rounded shadow-sm bg-light"> 
                                        <p class="font-italic mb-0">Web Developer</p> 
                                        <p class="font-italic mb-0">Lives in New York</p> 
                                        <p class="font-italic mb-0">Photographer</p> 
                                    </div> 
                                </div>--> 
                            <div class="py-4 px-4"> 
                                <div class="d-flex align-items-center justify-content-between mb-3"> 
                                    <h5 class="mb-0">Photos</h5>
                                    <a href="#" class="btn btn-link text-muted">Show all</a> 
                                </div> 
                                <div class="row"> 
                                <?php 
                                    $arr_media = $dbh->getFotoPost($templateParams["profile"]["Username"]);
                                    foreach($arr_media as $postUser):
                                        foreach($postUser as $media): ?>
                                        <div class="col-lg-6 mb-2 pr-lg-1">
                                            <img src=<?php echo $media; ?>
                                            style="width: 80%; height: 100%;" alt="" class="img-fluid rounded shadow-sm">
                                        </div> 
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                    </div>
                                </div> 
                            </div>
                        </div> 
                    </div>
                </div>    
            </div>

             <!-- FOOTER -->
        <div class="row">
            <div class="col-12 mt-3">
                    <footer class="py-3 text-white bg-dark">
                        <p class="font-monospace text-center">See&Go</p>
                        <button id="btn_logout">Logout</button>
                    </footer>   
            </div>   
        </div> 
        </main>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="../js/follow-unfollow.js"></script>
    </body>
</html>