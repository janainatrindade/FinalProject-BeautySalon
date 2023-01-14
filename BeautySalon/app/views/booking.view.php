
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Booking</title>
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
                        <li class="nav-item"><a class="nav-link" href="<?=ROOT?>/history">My Bookings</a></li>
                        <li class="nav-item dropdown">
                        <div class="dropdown">                       
                        <li class="nav-item"><a class="nav-link" href="#"><?=Auth::user()?></a></li>
                        <li class="nav-item"><a class="nav-link" href="<?=ROOT?>/logout">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="row register bg-success text-center">
                    <div class="col-md-8 col-xs-12 col-sm-12 history-form ">
                        <div class="container-fluid">
                            <div class="row">
                                <h2>Booking a Service</h2>
                            </div>
                            <div class="row">
                                <form method="post" id="cadBooking">
                                    <div class="row">
                                        <label for="service">Service:</label>
                                        <select name="service" placeholder="Service" class="form_input">
                                            <?php
                                            foreach($services as $service){
                                                echo '<option value="'.$service->ID.'">'.$service->ser_name.'</option>';
                                            }
                                            ?>
                                            
                                        </select>
                                        <label for date>Date:</label>
                                        <input type="date" name="date" id="date" min="<?php echo date("Y-m-d"); ?>">
                                        <label for time>Time:</label>
                                        <select name="time" placeholder="Time">
                                            <option>09:00 to 10:00</option>
                                            <option>10:00 to 11:00</option>
                                            <option>11:00 to 12:00</option>
                                            <option>12:00 to 13:00</option>
                                            <option>13:00 to 14:00</option>
                                            <option>14:00 to 15:00</option>
                                            <option>15:00 to 16:00</option>
                                            <option>16:00 to 17:00</option>
                                            <option>17:00 to 18:00</option>
                                        </select>
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
                                    <div>
                                        <input type="submit" value="Submit" class="submit" id="submitCustomer" >
                                    </div>
                                </form>
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
        <script type="text/javascript">
            $( document ).ready(function() {
                console.log( "ready!" );
                const picker = document.getElementById('date');
                picker.addEventListener('input', function(e){
                  var day = new Date(this.value).getUTCDay();
                  if([0].includes(day)){
                    e.preventDefault();
                    this.value = '';
                    alert('Weekends not allowed');
                  }
                });
            });

        </script>



    </body>
</html>
