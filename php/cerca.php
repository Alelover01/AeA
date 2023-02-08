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
        <div class="container-fluid p-0 overflow-hidden">
            <div class="py-4 px-4"> 
                <div class="row align-items-start ">
                    <div class="col-md-4">
                                            <div class="bg-image card shadow-1-strong" style="background-image: url('https://static.nationalgeographic.it/files/styles/image_3200/public/gettyimages-660629130_1.jpg?w=1600');">
                                                <div class="d-grid gap-2 col-6 mx-auto">
                                                    <button class="btn btn-outline-dark btn-lg btn-block mt-2 mb-2 fw-bold text-center" type="button">ITINERARI</button>
                                                </div>
                                            </div>
                                        <!-- <div class="col-6 ">
                                            <a href="#" class="btn btn-outline-dark btn-sm btn-block mt-3 mb-10 fw-bold text-center">ITINERARI</a> 
                                            </div> -->
                        <!-- <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                            <li><a href="#">Posts <span class="pull-right badge bg-blue">31</span></a></li>
                            
                        </ul>
                        </div> -->
                    </div>
                    
                    
                    <div class="col-md-4">
                    <div class="box box-widget widget-user-2">
                        <div class="bg-image card shadow-1-strong" style="background-image: url('https://www.labsus.org/wp-content/uploads/2018/05/architecture-3095716_1920-1140x760.jpg'); width: 100%; height: 100%;">
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button class="btn btn-outline-dark btn-lg btn-block mt-2 mb-2 fw-bold text-center" type="button">FOTO LUOGHI</button>
                            </div>
                        </div>
                    </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="box box-widget widget-user-2">
                        <div class="bg-image card shadow-1-strong" style="background-image: url('https://i.etsystatic.com/29590405/r/il/4fc2f5/3116691901/il_1588xN.3116691901_idhq.jpg');">
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button class="btn btn-outline-dark btn-lg btn-block mt-2 mb-2 fw-bold text-center" type="button">CIBO</button>
                                </div>
                        </div>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-md-4">
                        <div class="box box-widget widget-user-2">
                        <div class="bg-image card shadow-1-strong" style="background-image: url('https://www.impulsemag.it/wp-content/uploads/2017/01/look-formale-elegante.jpeg');">
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button class="btn btn-outline-dark btn-lg btn-block mt-2 mb-2 fw-bold text-center" type="button">OUTFIT</button>
                                </div>
                        </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="box box-widget widget-user-2">
                        <div class="bg-image card shadow-1-strong" style="background-image: url('https://londonita.com/wp-content/uploads/2020/02/Bus-n-9-First-London-Routemaster-min.jpg');">
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button class="btn btn-outline-dark btn-lg btn-block mt-2 mb-2 fw-bold text-center" type="button">TIPS MEZZI</button>
                                </div>
                        </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="box box-widget widget-user-2">
                        <div class="bg-image card shadow-1-strong" style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/thumb/1/14/Rockies_in_the_morning.jpg/1200px-Rockies_in_the_morning.jpg');">
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button class="btn btn-outline-dark btn-lg btn-block mt-2 mb-2 fw-bold text-center" type="button">ROAD TRIP</button>
                                </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-4 px-4"> 
            <div class="d-flex align-items-center justify-content-between mb-3"> 
                <h5 class="mb-0">Photos recommended</h5>
                <a href="#" class="btn btn-link text-muted">Show all</a> 
            </div> 
            <div class="row"> 
                <div class="col-lg-4 mb-4 pr-lg-1">
                    <img src="https://images.unsplash.com/photo-1469594292607-7bd90f8d3ba4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" style="width: 80%; height: 100%;" alt="" class="img-fluid rounded shadow-sm">
                </div> 
                <div class="col-lg-4 mb-4 pl-lg-1">
                    <img src="https://images.unsplash.com/photo-1493571716545-b559a19edd14?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" style="width: 80%; height: 100%;" alt="" class="img-fluid rounded shadow-sm">
                </div> 
                <div class="col-lg-4 mb-4 pr-lg-1">
                    <img src="https://images.unsplash.com/photo-1453791052107-5c843da62d97?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80" style="width: 80%; height: 100%;"  alt="" class="img-fluid rounded shadow-sm">
                </div> 
                <div class="col-lg-4 mb-4 pl-lg-1">
                    <img src="https://www.travel365.it/foto/come-muoversi-a-parigi-come-arrivare-e-mezzi-consigliati.png" style="width: 80%; height: 80%;"  alt="" class="img-fluid rounded shadow-sm">
                </div> 
                <div class="col-lg-4 mb-4 pl-lg-1">
                    <img src="https://c8.alamy.com/compit/kjwwda/una-illustrazione-vettoriale-di-cucina-spagnola-cucina-kjwwda.jpg" style="width: 80%; height: 100%;"  alt="" class="img-fluid rounded shadow-sm">
                </div> 
                <div class="col-lg-4 mb-4 pl-lg-1">
                    <img src="https://www.grazia.it/content/uploads/2019/12/04_mix_match_montagna.jpg" style="width: 80%; height: 100%;"  alt="" class="img-fluid rounded shadow-sm">
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
    <script src="../js/cerca.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  </body>
</html>

