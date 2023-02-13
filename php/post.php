<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/post_style.css" >
        <link rel="stylesheet" href="../css/menu_style.css">
        
        <title>See&GO - Post</title>
        <link rel="shortcut icon" href="../images/logo.jpg">
    </head>
    <body>
        <header>
            <div class="px-4 pt-3  font-monospace text-left">
            <?php if($_SESSION["page"]==1): ?>
                <button type="button" class="btn text-white bg-dark btn-block"><a class="text-white text-decoration-none" href="home.php">Back</a></button>
            <?php elseif($_SESSION["page"]==2):?>    
                <?php if($templateParams["profile"]["Username"]==$_SESSION["Username"]): ?>
                    <button type="button" class="btn text-white bg-dark btn-block"><a class="text-white text-decoration-none" href="index_user_profile.php">Back</a></button>
                <?php else:?>
                    <button type="button" class="btn bg-dark btn-block"><a class="text-white text-decoration-none" href="index_someone_profile.php">Back</a></button>
                <?php endif; ?>    
            <?php endif; ?>
            <button type="button" id="btn_delete" name="btn_delete" class="btn text-white bg-dark btn-block">Delete</button>
            </div>
        </header>
        <main>
            <div class="container-fluid p-0 overflow-hidden">
                
                <div class="row pt-3">
                    <div class="col-md-1"></div>
                    <div class="col-10">
                        <!-- Profile widget --> 
                        <div class="bg-white shadow rounded"> 
                            <div class="media pt-3 mx-2 row">
                                <div class="col-1 px-5"><img src=<?php echo $templateParams["profile"]["Foto"] ?> class=" d-block rounded-circle" alt="" /></div>
                                <div class="media-body ml-3 col-4">
                                  <strong><?php echo $templateParams["profile"]["Username"]?></strong>
                                  <div class="text-muted small"><?php echo $templateParams["post"]["created_time"]?></div>
                                </div>
                              </div>
                           
                            <div class="text-center pt-4">
                                <img src=<?php echo $templateParams["post"]["media_file"]?> style="width: 80%; height: 100%;" alt="" class="img-fluid rounded shadow-sm">
                            </div>
                            <div class="row mx-5 px-5 mb-3"> 
                                <div class="col-12 text-center"><button  id="btn_like" name="btn_like" type="button" data-post-id="<?php echo $_SESSION["post_id"];?>"class="btn btn-trasparent mb-2  d-inline-block text-muted text-center">
                                    <i class="align-middle ">
                                      <strong name="num" class="num"><?php echo $templateParams["post"]["numLikes"]?></strong>.Likes</i>
                                </button></div>
                            </div>
                            <div class="mx-5 text-capitalize">
                                <p>
                                <?php echo $templateParams["post"]["caption"]?>
                            </p>
                                
                            </div>
                                
                            <div class="py-4 px-4"> 
                                <div class="d-flex align-items-center mb-3"> 
                                    <h5 class="mb-0 ">Comments</h5> 
                                </div> 
                                <div class="row"> 
                                    <div class="bg-light shadow rounded">
                                        <div class=" px-4 pt-2 pb-4">
                                            <div class="px-3">
                                                <?php $arr_comments=$dbh->getCommentsPost($templateParams["post"]["post_id"]);
                                                        foreach($arr_comments as $comment): ?>
                                                <p><strong class="fw-bold"><?php echo $comment["user_profile_id"]; ?></strong> <?php echo $comment["comment_text"]; ?></p>
                                               <?php endforeach;?>
                                            </div>
                                        </div>
                                        <div class="row d-flex justify-content-center mb-4">
                                            <div class="col-8 ">
                                            <input type="comment" id="comment" name="comment" class="form-control" placeholder="Your Comment"/>
                                            <label class="form-label " for="comment"></label>
                                            </div>
                                            <div class="col-2"><button id="btn_comment" name="btn_comment" type="button" class="btn btn-primary btn-block mb-4">Invia</button></div>
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
                    </footer>   
            </div>   
        </div>  
        </main>
        <script src="../js/delete.js"></script>
        <script src="../js/like.js"></script>
        <script src="../js/comment.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    </body>
</html>