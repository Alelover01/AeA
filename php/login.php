<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login_style.css" >
    
    <title>See&GO - Login</title>
    <link rel="shortcut icon" href="../images/logo.jpg">
</head>
<body>
    
        <!-- Section: Background image -->
    <section  class=" bg-image" style=" background-image: url(../images/prova2.jpg); background-size: cover; background-repeat: no-repeat;">
        <header class="py-4">
            <h1 class="font-monospace fw-bold text-center">See&GO - Login</h1>
        </header>
        <form action="login.php" method="post">
            <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <h5 class="font-monospace text-center fw-bold mt-3 mb-0">Login</h5>
            <div class="col-md-8 offset-md-2 col-lg-8 offset-lg-2 div-wrapper d-flex justify-content-center align-items-center">
            <form class="center" >
                    <div class="card shadow " style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <!-- Username input -->
                            <div class="form-outline mb-4 row">
                                <p class="col">Username:</p>
                                <input type="username" id="username" class="col form-control" placeholder="Username"/>
                                <label class="form-label" for="username"></label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4 row">
                                <p class="col">Password:</p>
                                <input type="password" id="password" class="col form-control" placeholder="Password"/>
                                <label class="form-label" for="password"></label>
                            </div>

                            <!-- 2 column grid layout for inline styling -->
                            <div class="row mb-4">
                                <div class="col d-flex justify-content-center align-items-center">
                                <!-- Checkbox -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="remeberMe" checked />
                                        <label class="form-check-label" for="remeberMe"> Remember me </label>
                                    </div>
                                </div>
                                <div class="col">
                                    <!-- Simple link -->
                                    <a href="#!">Forgot password?</a>
                                </div>
                            </div>

                            <!-- Submit button -->
                            <div class=" text-center row">
                                <button type="submit" class="btn btn-primary btn-block mb-4">Login</button>
                            </div>
                            

                            <!-- Register buttons -->
                            <div class="text-center justify-content-center  mb-4 "></div>
                                <p>Don't have an account? <a href="#!">Register here</a></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>    
        </form>
    </section>
      
</body>
</html>