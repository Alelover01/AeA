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
        <form method="POST">
            <?php if (isset($_GET["error"])) { ?>
            <p class="error"><?php echo $_GET["error"]; ?></p>
            <?php } ?>
            <h5 class="font-monospace text-center fw-bold mt-3 mb-0">Login</h5>
            <div class="col-md-8 offset-md-2 col-lg-8 offset-lg-2 div-wrapper d-flex justify-content-center align-items-center">
            <form class="center" >
                    <div class="card shadow " style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <!-- Username input -->
                            <div class="form-outline mb-4 row">
                                <p class="col">Username:</p>
                                <input type="username" id="Username" 
                                value="<?php if(isset($_COOKIE["user_login"])) { echo $_COOKIE["user_login"]; } ?>" 
                                class="col form-control" placeholder="Username"/>
                                <label class="form-label" for="Username"></label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4 row">
                                <p class="col">Password:</p>
                                <input type="password" id="Password" 
                                value="<?php if(isset($_COOKIE["userpassword"])) { echo $_COOKIE["userpassword"]; } ?>"
                                class="col form-control" placeholder="Password"/>
                                <label class="form-label" for="Password"></label>
                            </div>

                            <!-- 2 column grid layout for inline styling -->
                            <div class="row mb-4">
                            <div class="col d-flex justify-content-center align-items-center">
                                <!-- Checkbox -->
                                <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="showPass"  />
                                        <label class="form-check-label" for="showPass"> Show Password </label>
                                    </div>
                                </div>
                                <div class="col form-check">
                                    <!-- Checkbox -->
                                        <div><input type="checkbox" name="remember" id="remember" 
                                        <?php if(isset($_COOKIE["user_login"])) { ?> checked <?php } ?> />
                                        <label for="remember-me">Remember me</label>
                                    
                                    <!-- Simple link -->
                                    <!--<a href="#!">Forgot password?</a>-->
                                </div>
                            </div>

                            <!-- Submit button -->
                            <div class=" text-center row">
                                <button id="btn_submit" type="submit" class="btn btn-primary btn-block mt-2 mb-4">Login</button>
                            </div>
                            

                            <!-- Register buttons -->
                            <div class="text-center justify-content-center  mb-4 "></div>
                                <p>Don't have an account? <a href="../template/registration.php">Register here</a></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>    
        </form>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="../js/login.js"></script>
</body>
</html>