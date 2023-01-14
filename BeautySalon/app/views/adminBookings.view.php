<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Bookings </title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="<?=ROOT?>/assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.2.1/js/all.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> 
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?=ROOT?>/css/styles.css" rel="stylesheet" />
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
                        <li class="nav-item"><a class="nav-link" href="#">Bookings</a></li>
                        <li class="nav-item"><a class="nav-link" href="#"><?=Auth::user()?></a></li>
                        <li class="nav-item"><a class="nav-link" href="<?=ROOT?>/logout">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
               
                <div class="col-md-8 col-xs-12 col-sm-12 history-form ">
                    <div class="container-fluid">
                        <div class="row">
                            <h2>Search Bookings </h2>
                        </div>
                        <div class="row">
                            <div class="portfolio-item">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content">
                                        <br>
                                        <form method="post" id="formSearch" action="adminBookings/searchBookings">
                                            <label for date>From date:</label>
                                            <input type="date" name="date1" id="date1" min="<?php echo date("Y-m-d"); ?>">
                                            <label for date>To date:</label>
                                            <input type="date" name="date2" id="date2" min="<?php echo date("Y-m-d"); ?>">
                                            <br><br>
                                            <button type="button" id="searchModal" class="btn btn-primary">Search</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Service</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Customer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach($bookings as $booking){
                                        echo '<tr>';
                                        echo '<td>'.$booking->ser_name.'</th>';
                                        echo '<td>'.$booking->boo_date.'</th>';
                                        echo '<td>'.$booking->boo_time.'</th>';
                                        echo '<td>'.$booking->cus_name.'</th>';
                                        echo '</tr>';
                                    }
                                    ?>   
                                </body>
                            </table>      
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

        <!-- Portfolio Modals-->
        <!-- Portfolio item 1 modal popup-->
        <div class="portfolio-modal modal fade" id="searchModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="<?=ROOT?>/assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body" id="content">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Bookings</h2>
                                    <p class="item-intro text-muted">From to </p>
                                    <p>
                                        <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Service</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Customer</th>
                                    </tr>
                                </thead>
                                <tbody><!-- show the bookings-->
                                    <?php
                                    foreach($bookings as $booking){
                                        echo '<tr>';
                                        echo '<td>'.$booking->ser_name.'</th>';
                                        echo '<td>'.$booking->boo_date.'</th>';
                                        echo '<td>'.$booking->boo_time.'</th>';
                                        echo '<td>'.$booking->cus_name.'</th>';
                                        echo '</tr>';
                                    }
                                    ?>   
                                </body>
                            </table>      
                                    </p>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close 
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?=ROOT?>/js/scripts.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#searchModal').click(function(){
                    $('#searchModal1').modal('show')
                });
            });
        </script>



    </body>
</html>
