<?php
require "../db/database.php";
require "../db/bootstrap.php";
?>
<!DOCTYPE html>

<html lang="it">
<head>
    <meta charset="utf-8" />
    <title> See & Go - Alerts</title>
    <link rel="shortcut icon" href="../images/logo.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/alert_style.css">
    <link rel="stylesheet" href="../css/menu_style.css">
    <script src="../js/menu.js"></script>
</head>
<body>
    <h1 class="display-1 font-monospace fw-bold text-center"> See & Go - Notifiche </h1>

    <aside>
        <button class="hamburger">
            <div class="bar"></div>
        </button>
        <!-- Menù a comparsa -->
        <nav class="aComparsa">
            <ul>
                <li>
                    <a href="home.html"><img src="../images/home.png" alt="Icona Home" /></a>
                </li>
                <li>
                    <a href="CercaProgetto.html"><img src="../images/cerca.png" alt="Icona Cerca" /></a>
                </li>
                <li>
                    <a href="alert.html"><img src="../images/notifiche.png" alt="Icona Notifiche" /></a>
                </li>
                <li>
                    <a href="profile.html"><img src="../images/profilo.png" alt="Icona Profilo" /></a>
                </li>
            </ul>
        </nav>

    </aside>
    <main>
         <?php 
         $res = $dbh->getAlert($_SESSION['Username']);
         foreach ($res as $alert):
            ?>
            <div id="alert" class="alert alert-dark">
                <div style="font-size:18px; font-weight:bold;background:none;">
                <?php echo $alert['UserPost']?>
                </div>
            <?php echo $alert['Descrizione'];
                if ($alert['IdPost'] != 0){

                
            ?>
            <div style="background:none;"><a href='index_post_user.php?post_id=<?php echo $alert['IdPost']; ?>'>Vai al post</a></div>
            <?php 
                }
            ?>
            </div>
            <?php endforeach; ?>
    </main>
</body>
</html>