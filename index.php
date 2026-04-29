<?php
include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Online Car Rental</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/ionicons.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">


  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/icomoon.css">
  <link rel="stylesheet" href="css/style.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html">Rental<span>Vehicles</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="#" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="#about" class="nav-link">About</a></li>
          <li class="nav-item"><a href="#service" class="nav-link">Services</a></li>
          <li class="nav-item"><a href="#car" class="nav-link">Cars</a></li>
          <li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>
          <li class="nav-item"><a data-toggle="modal" data-target="#register" class="nav-link">Registration</a></li>

          <li class="nav-item"><a class="nav-link btn btn-success" data-toggle="modal" data-target="#login">Login</a></li>
        </ul>
      </div>
    </div>
  </nav>


  <!--modal for registration-->
  <div class="modal" id="register" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Account Registration</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="process.php" method="POST">
            <div class="row">


              <div class="col-6 mb-3">
                <div class="input-group">
                  <div class="input-group-text"></div>
                  <input type="text" name="ln" placeholder="Enter Last Name" class="form-control" required>
                </div>
              </div>


              <div class="col-6">
                <div class="input-group">
                  <div class="input-group-text"></div>
                  <input type="text" name="fn" placeholder="Enter First Name" class="form-control" required>
                </div>
              </div>

              <div class="col-6">
                <div class="input-group">
                  <div class="input-group-text"></div>
                  <input type="text" name="pn" placeholder="Enter Phone Number" class="form-control" required>
                </div>
              </div>

              <div class="col-6 mb-3">
                <div class="input-group">
                  <div class="input-group-text"></div>
                  <input type="text" name="address" placeholder="Enter Address " class="form-control" required>
                </div>
              </div>

              <div class="col-12 mb-3">
                <div class="input-group">
                  <div class="input-group-text"></div>
                  <input type="email" name="email" placeholder="Enter Email" class="form-control" required>
                </div>
              </div>


              <div class="col-12">
                <div class="input-group">
                  <div class="input-group-text"></div>
                  <input type="password" name="password" placeholder="Enter Password " class="form-control" required>
                </div>
              </div>
              
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="Registration" class="btn btn-primary">Create Account</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!--end of regisrtration modal-->

  <!--modal for login-->
  <div class="modal" id="login" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="process.php" method="POST">
            <div class="row">


              <div class="col-12 mb-3">
                <div class="input-group">
                  <div class="input-group-text"><i class="bi bi-envelope"></i></div>
                  <input type="email" name="email" placeholder="Enter Email" class="form-control" required>
                </div>
              </div>
              <div class="col-12">
                <div class="input-group">
                  <div class="input-group-text"><i class="bi bi-key"></i></div>
                  <input type="password" name="password" id="pass" placeholder="Enter Password " class="form-control" required>
                </div>
                <input type="checkbox" onclick="showpass()"> Showpassword
              </div>



              <script>
                function showpass() {
                  var x = document.getElementById('pass');
                  if (x.type === "password") {
                    x.type = "text";
                  } else {
                    x.type = "password";
                  }
                }
              </script>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="login" class="btn btn-primary">Login</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!--end of login modal-->
  <!-- END nav -->

  <div class="hero-wrap ftco-degree-bg" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.52), rgba(65, 49, 61, 0.73)),
    url('images/rcmpp.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
        <div class="col-lg-8 ftco-animate">
          <div class="text w-100 text-center mb-md-5 pb-md-5">
            <h1 class="mb-4">Fast &amp; Easy Way To Rent A Car</h1>
            <p style="font-size: 18px;">Welcome to RCM car rental!
              We’re excited to help you get on the road with ease. Whether you're planning a short trip or an extended journey, we offer a wide selection of vehicles to suit your needs. Simply choose your car, select your dates, and we’ll take care of the rest.
              Enjoy your ride, and if you need assistance, our team is just a click away!</p>
            <a href="https://vimeo.com/45830194" class="icon-wrap popup-vimeo d-flex align-items-center mt-4 justify-content-center">


            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-md-12	featured-top">
          <div class="row no-gutters">
            <div class="col-md-4 d-flex align-items-center">
              <form action="#" class="request-form ftco-animate bg-primary">
                <h2>Make your trip</h2>
                <div class="form-group">
                  <label for="" class="label">Pick-up location</label>
                  <input type="text" class="form-control" placeholder="City, Airport, Station, etc">
                </div>
                <div class="form-group">
                  <label for="" class="label">Drop-off location</label>
                  <input type="text" class="form-control" placeholder="City, Airport, Station, etc">
                </div>
                <div class="d-flex">
                  <div class="form-group mr-2">
                    <label for="" class="label">Pick-up date</label>
                    <input type="text" class="form-control" id="book_pick_date" placeholder="Date">
                  </div>
                  <div class="form-group ml-2">
                    <label for="" class="label">Drop-off date</label>
                    <input type="text" class="form-control" id="book_off_date" placeholder="Date">
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="label">Pick-up time</label>
                  <input type="text" class="form-control" id="time_pick" placeholder="Time">
                </div>
                <div class="form-group">
                  <input type="submit" data-toggle="modal" data-target="#login" value="Rent A Car Now" class="btn btn-secondary py-3 px-4">
                </div>
              </form>
            </div>
            <div class="col-md-8 d-flex align-items-center">
              <div class="services-wrap rounded-right w-100">
                <h3 class="heading-section mb-4">Better Way to Rent Your Perfect Cars</h3>
                <div class="row d-flex mb-4">
                  <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                    <div class="services w-100 text-center">
                      <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
                      <div class="text w-100">
                        <h3 class="heading mb-2">Choose Your Pickup Location</h3>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                    <div class="services w-100 text-center">
                      <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-handshake"></span></div>
                      <div class="text w-100">
                        <h3 class="heading mb-2">Select the Best Deal</h3>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                    <div class="services w-100 text-center">
                      <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-rent"></span></div>
                      <div class="text w-100">
                        <h3 class="heading mb-2">Reserve Your Rental Car</h3>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>


  <section id="car" class="ftco-section ftco-no-pt bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          <span class="subheading">What we offer</span>
          <h2 class="mb-2">Featured Vehicles</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="carousel-car owl-carousel">


            <?php
            $get_cars = mysqli_query($conn, "SELECT * FROM cars LIMIT 5");
            while ($cars = mysqli_fetch_array($get_cars)) {


            ?>
              <div class="item">
                <div class="car-wrap rounded ftco-animate">
                  <div class="img rounded d-flex align-items-end" style="background-image: url(manager/assets/uploads/<?php echo $cars['car_img'] ?>);">
                  </div>
                  <div class="text">
                    <h2 class="mb-0"><a href="#"><?php echo $cars['car_name'] ?></a></h2>
                    <div class="d-flex mb-3">
                      <span class="cat"><?php echo $cars['car_model']; ?></span>
                      <p class="price ml-auto"><?php echo $cars['price_day'] ?> <span>/day</span></p>
                    </div>
                    <p class="d-flex mb-0 d-block"><a data-toggle="modal" data-target="#login"  class="btn btn-primary py-2 mr-1">Book now</a> <a href="#" class="btn btn-secondary py-2 ml-1">Details</a></p>
                  </div>
                </div>
              </div>
            <?php
            }
            ?>

          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="about" class="ftco-section ftco-about">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/about1.png);">
        </div>
        <div class="col-md-6 wrap-about ftco-animate">
          <div class="heading-section heading-section-white pl-md-5">
            <span class="subheading">About us</span>
            <h2 class="mb-4">Welcome to RCM Car Rental</h2>

            <p>Welcome to RCM car rental, your trusted partner for hassle-free and affordable car rentals. We are committed to providing top-quality vehicles, exceptional customer service, and smooth rental experiences to meet all your travel needs.</p>
            <p>Whether you need a car for a business trip, vacation, or daily commute, we offer a diverse fleet of well-maintained vehicles, from economy cars to luxury models. Our user-friendly booking system ensures a smooth and secure reservation process, allowing you to rent a car with ease.
              We are a company that aims to provide quality and safe, reliable car rental services to all our clients. Since 2017 our clients varies from companies , tourists and private individuals.
              Experience convenience and reliability with us. Rent your car today!</p>
            <p><a data-toggle="modal" data-target="#login" class="btn btn-primary py-3 px-4">Search Vehicle</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="service" class="ftco-section">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-7 text-center heading-section ftco-animate">

        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="services services-2 w-100 text-center">
            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-wedding-car"></span></div>
            <div class="text w-100">
              <h3 class="heading mb-2">Self drive</h3>
              <p>If you want to control your time and travel anywhere with in Panay Island you may rent our unit and drive it by yourself. </p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="services services-2 w-100 text-center">
            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
            <div class="text w-100">
              <h3 class="heading mb-2">With driver</h3>
              <p>If you want to relax and and enjoy the beauty of Panay Island let our professional driver take you. </p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="services services-2 w-100 text-center">
            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car"></span></div>
            <div class="text w-100">
              <h3 class="heading mb-2">Airport Pickup/Drop-off</h3>
              <p>Facilitating convenient pickup and drop-off at airports. </p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="services services-2 w-100 text-center">
            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
            <div class="text w-100">
              <h3 class="heading mb-2">Whole City Tour</h3>
              <p>A guided journey through a city, where allow visitors to explore its important places, history, and culture, with a knowledgeable guide leading the way.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section ftco-intro" style="background-image: url(images/bg_3.jpg);">
    <div class="overlay"></div>
    <div class="container">
      <div class="row justify-content-end">
        <div class="col-md-6 heading-section heading-section-white ftco-animate">
          <h2 class="mb-3">Do You Want To Earn With Us? So Don't Be Late.</h2>
          <a href="#" class="btn btn-primary btn-lg">Become A Driver</a>
        </div>
      </div>
    </div>
  </section>







  <footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2"><a href="#" class="logo">Rental<span>Vehicles</span></a></h2>
            <p>We’re here to make your journey easier, more enjoyable, and stress-free. Let RCM car rental provide you with the perfect vehicle for your next adventure. Thank you for choosing RCM car rental your reliable car rental service provider.</p>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
              <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4 ml-md-5">
            <h2 class="ftco-heading-2">Information</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">About</a></li>
              <li><a href="#" class="py-2 d-block">Services</a></li>
              <li><a href="#" class="py-2 d-block">Term and Conditions</a></li>
              <li><a href="#" class="py-2 d-block">Best Price Guarantee</a></li>
              <li><a href="#" class="py-2 d-block">Privacy &amp; Cookies Policy</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Customer Support</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">FAQ</a></li>
              <li><a href="#" class="py-2 d-block">Payment Option</a></li>
              <li><a href="#" class="py-2 d-block">Booking Tips</a></li>
              <li><a href="#" class="py-2 d-block">How it works</a></li>
              <li><a href="#" class="py-2 d-block">Contact Us</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Have a Questions? Please Contact Us!</h2>
            <div class="block-23 mb-3">
              <ul>
                <li><span class="icon icon-map-marker"></span><span class="text">Hibao-an Terminal Norte Manduriao, Iloilo City</span></li>
                <li><a href="#"><span class="icon icon-phone"></span><span class="text">09178410850 or 09284142687</span></a></li>
                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">rcmcarrental@outlook.com</span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">


        </div>
      </div>
  </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

</body>

</html>