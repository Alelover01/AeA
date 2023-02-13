<!doctype html>
<html lang="it">
  <head>
    <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/home_style.css" >
        <link rel="stylesheet" href="../css/menu_style.css">
        <script src="../js/menu.js"></script>

    <title>See&Go - Homepage</title>
   
    <link rel="shortcut icon" href="../images/logo.jpg">
  </head>
  <body class="bg-light">
    <header class="py-3 text-white bg-dark">
      <h1 class="font-monospace fw-bold text-center">See&Go - Homepage</h1>
      
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
                              <a href="../template/alert.php"><img src="../images/notifiche.png" alt="Icona Notifiche" /></a>
                          </li>
                          <li>
                              <a href='index_user_profile.php'><img src="../images/profilo.png" alt="Icona Profilo" /></a>
                          </li>
                      </ul>
                  </nav>
        
            </aside>

    <main>
    <button type="button" class="btn text-white bg-dark btn-block mt-2"><a class="text-white text-decoration-none" href="post_form.php">Create Post</a></button>

        <div class="col-md-8 offset-md-2 col-lg-8 offset-lg-2 div-wrapper d-flex justify-content-center align-items-center">
          <div class="container-fluid p-0 overflow-hidden">

            <!-- RIQUADRO SOTTO BIANCO -->
            <?php 
                  require_once '../db/bootstrap.php';
                  require_once '../db/database.php';
                  $userFollowed=$dbh->getFollowed($_SESSION["Username"]);
                  //var_dump($userFollowed);
                  foreach($userFollowed as $iduser):?>
              <div class="py-4 px-0"> 
                <div class="bg-white shadow rounded"> 
                  <div class="im2 px-4 pt-2 pb-4">
                        <?php //var_dump($iduser["followed_user_id"]);
                        $userParams=$dbh->getUserParams($iduser["followed_user_id"]); 
                        //var_dump($userParams);?>
                        <div class="media mb-3">
                          <!-- POST -->
                          <img src=<?php echo $userParams[0]["Foto"];?> class="d-block ui-w-20 rounded-circle" alt="">
                          <div class="media-body ml-3 fw-bold">
                          <?php echo $userParams[0]["Nome"];?> <?php echo $userParams[0]["Cognome"];?>
                            <?php 
                            $lastPostId=$dbh->getLastIdPostOfUser($userParams[0]["Username"]);

                            $lastPostParams=$dbh->getPostUser($userParams[0]["Username"],$lastPostId[0]["post_id"]);
                            ?>
                            <div class="text-muted small fw-normal"><?php echo $lastPostParams[0]["created_time"]?></div>
                          </div>
                        </div>
                  
                        <p>
                        <?php echo $lastPostParams[0]["caption"]?>
                        </p>

                        <div class="col align-self-start">
                            <a href='index_post_other.php?post_id=<?php echo $lastPostParams[0]["post_id"];?>&page=1&userId=<?php echo $lastPostParams[0]["created_by_user_id"];?>'>
                            <img src=<?php echo $lastPostParams[0]["media_file"]?> style="width: 90%; height: 100%;" alt="" class="img-fluid rounded mx-auto d-block">
                            </a>
                          </div>   
                  
                        <div class="card-footer">
                            <small class="align-middle">
                              <button  id="btn_like" name="btn_like" type="button" class="btn btn-trasparent mb-2  d-inline-block text-muted text-center" 
                                        data-post-id="<?php var_dump($lastPostParams[0]["post_id"]); echo $lastPostParams[0]["post_id"]; ?>">
                              <strong><?php //$_SESSION["post_id"]=$lastPostParams[0]["post_id"]; 
                                            $numlike=count($dbh->getLikesPost($lastPostParams[0]["post_id"])); 
                                            echo $numlike;?></strong> Likes</small>
                            </button>
                          <a href=# class="d-inline-block text-muted ml-3">
                            <small class="align-middle">
                              <strong><?php $numComments=count($dbh->getCommentsPost($lastPostParams[0]["post_id"])); echo $numComments;?></strong> Comments</small>
                          </a>
                        </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
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
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <!-- <script src="../js/like.js"></script> -->
  </body>
</html>