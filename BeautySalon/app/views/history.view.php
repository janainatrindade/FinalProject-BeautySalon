<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Bookings History</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="<?=ROOT?>/assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.2.1/js/all.js" crossorigin="anonymous"></script>
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
                        <li class="nav-item"><a class="nav-link" href="<?=ROOT?>/booking">Booking</a></li>
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
                            <h2>Bookings History</h2>
                        </div>
                        <div class="row">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Service</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Invoice</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php
                                    foreach($bookings as $booking){
                                        echo '<tr>';
                                        echo '<td>'.$booking->ser_ID.'</th>';
                                        echo '<td>'.$booking->boo_date.'</th>';
                                        echo '<td>'.$booking->boo_time.'</th>';
                                        echo '<td><a href="/invoicePDF?ID='.$booking->ID.'" target="_blank" download="Invoice.txt">Invoice</a></td>';
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
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?=ROOT?>/js/scripts.js"></script>



    </body>
</html>
