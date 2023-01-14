<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="<?=ROOT?>/assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.2.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <!--Importaing javascript file-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="<?=ROOT?>/home">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?=ROOT?>/booking">Booking</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?=ROOT?>/login">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="container-fluid">
                    <div class="row main-content bg-success text-center">
                        <div class="col-md-4 text-center info">
                            <span class="company__logo"><h2><span class="fa fa-user"></span></h2></span>
                            <h4 class="beautyS">Beauty Salon</h4>
                        </div>
                        <div class="col-md-8 col-xs-12 col-sm-12 login_form ">
                            <div class="container-fluid">
                                <div class="row">
                                    <h2>Login</h2>
                                </div>
                                <div class="row">
                                    <form control="" class="form-group" method="post" id="loginform">
                                        <div class="row">
                                            <input type="text" name="input_user" class="form__input" placeholder="Email">
                                            <!-- <span class="fa fa-lock"></span> -->
                                            <input type="password" name="input_pass" class="form__input" placeholder="Password">
                                        </div>
                                        <?php if(isset($success)){ ?>

                                        <div class="alert alert-success mt-3">
                                            <?php echo $success;  ?>
                                        </div>
                                        <?php } ?>

                                        <?php if(isset($error)){ ?>

                                        <div class="alert alert-danger mt-3">
                                            <?php echo $error;  ?>
                                        </div>
                                        <?php } ?>
                                        <div class="row">
                                            <input type="submit" value="Submit" class="submit" name="submitLogin" id="submitLogin">
                                        </div>
                                    </form>
                                </div>
                                <div class="row">
                                    <p>Don't have an account? <a href="<?=ROOT?>/register">Register Here</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Beauty Salon 2022</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?=ROOT?>/js/scripts.js"></script>

    </body>
</html>