<?php

    //If we want to use the session we need to start it first
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    //Default to the empty string
    $password_message = '';

    //Check to see if there is a pasword_message set in the session
    if(isset($_SESSION['password_message'])){
      //retrieve the pasword_message in the session and put it in our local variable
      $password_message = $_SESSION['password_message'];
    }

    $email_message = '';
    if(isset($_SESSION['email_message'])){
      $email_message = $_SESSION['email_message'];
    }

    $email = '';
    if(isset($_SESSION['email'])){
      $email = $_SESSION['email'];
    }

    $login_mesaage = '';
    if(isset($_SESSION['login_mesaage'])){
      $login_mesaage = $_SESSION['login_mesaage'];
    }




?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dream Destination</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Tourism Website For Canada which will provide a single platform for everything needed for trip">
  <meta name="robots" content="index, follow">
  <meta name="author" content="Arshveer Uppal, Rohith Preetham Sunkara">


  <!-- Link to nav bar Css Stylesheet -->
  <link rel=" stylesheet" href="form.css" type="text/css" />
  <!-- Link to footer css stylesheet -->
  <link rel="stylesheet" href="../../CSS/footer.css" type="text/css" />

  <!-- Link to Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Link to icons -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</head>
<body>
<!-- Logo -->
<div class="navbar">
  <div class="navbar-inner">
      <img src="../../logo.png" class="img-fluid">
  </div>
  <div class="my-2 my-sm-0">
    <p>
          <a href="../../about.html">About Us</a> | <a href="../../sitemap.html">Site Map</a> | <a href="../../privacy.html">Privacy Policy</a>
    </p>
  </div>
</div>

<!-- Nav bar -->
<nav class="navbar sticky-top navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="../../home.html">Dream Destination</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <!-- Home -->
      <li class="nav-item">
        <a class="nav-link px-3" href="../../home.html"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
      </li>
      <!-- Places -->
    <li class="nav-item">
    <a class="nav-link px-3" href="../../places/places.html"><i class="fas fa-globe-americas"></i>
      Places
    </a>
    </li>
    <!-- Hotel -->
  <li class="nav-item">
   <a class="nav-link px-3" href="../../Hotel/stay.html" id="navbardrop"><i class="fas fa-bed"></i>
  Hotel
  </a>
 </li>
  <!-- Activites -->
  <li class="nav-item dropdown">
  <a class="nav-link px-3 dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"><i class="fas fa-skating"></i>
    Activites
  </a>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="../../activities/adventure.html">Adventure</a>
    <a class="dropdown-item" href="../../activities/festival.html">Festivals</a>
    <a class="dropdown-item" href="../../activities/shopping.html">Shopping</a>
  </div>
</li>
<!-- Transport -->
<li class="nav-item">
<a class="nav-link px-3" href="../../Transport/transport/main.html" id="navbardrop"><i class="fas fa-road"></i>
  Transport
</a>
</li>
<!-- Trip Packages -->
<li class="nav-item">
<a class="nav-link px-3" href="../../PlanTrip/Trip-packages/packages.html" id="navbardrop"><i class="fas fa-suitcase-rolling"></i>
  Trip Packages
</a>
</li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="../../Transport/rideshare-backend/signup.php"><i class="fas fa-user"></i> Sign Up</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../../Transport/rideshare-backend/dlogin.php"><i class="fas fa-sign-in-alt"></i> Login</a>
      </li>
    </ul>
  </div>
</nav>
<br>
<!-- Nav Bar ends here -->


  <div class="container-fluid">
      <div class="row no-gutter">
          <div class="col-md-6 d-none d-md-flex bg-image"></div>
          <div class="col-md-6 bg-light">
              <div class="login d-flex align-items-center py-5">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-7 col-xl-6 mx-auto">

                            <!-- Title for the form -->
                              <h3 class="display-4 text-center">LOGIN</h3> <br>

                              <!-- This message lets the user know if the username/password was incorrect -->
                              <?php if ($login_mesaage !='') { ?>
                                <h4 class="text-danger"><?php echo htmlspecialchars($login_mesaage); ?></h4>
                              <?php } ?>

                              <!-- The form where we have to set the php file that will display our results -->
                              <form action="login.php" method="post">
                                  <div class="form-group mb-3"> <label for="email">Email:</label>
                                  <?php if ($email_message !='') { ?>
                                    <h4 class="text-danger"><?php echo htmlspecialchars($email_message); ?></h4>
                                  <?php } ?>
                                  <input type="email" class="form-control" id="email" name="email"
                                  value="<?php echo htmlspecialchars($email); ?>"> </div>


                                  <div class="form-group mb-3"> <!-- The label for our password -->
                                  <label for="pwd">Password:</label>

                                  <!-- Checking to see if we have an error message in the session -->
                                  <!-- Display the error message if it is not empty -->
                                  <?php if ($password_message !='') { ?>
                                    <h4 class="text-danger"><?php echo htmlspecialchars($password_message); ?></h4>
                                  <?php } ?>

                                  <!-- The input for our password. type="password" so that the **** symbols are used instead of showing the text -->
                                  <input type="password" class="form-control" id="pwd" name="password"
                                  value=""><br> </div>


                      <div class="custom-control custom-checkbox mb-3"> <input id="customCheck1" type="checkbox" checked class="custom-control-input"> <label for="customCheck1" class="custom-control-label">Remember password</label> </div> <button type="submit" class="btn btn-danger btn-block text-uppercase mb-2 rounded-pill shadow-sm">Sign in</button>
                                  <div class="text-center d-flex justify-content-between mt-4">
                                    <a class="btn btn-success" href="signup.php" role="button">Create Account</a>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <!-- Footer -->
  <footer>
        <div class = "mt-5 pt-5 pb-5 footer">
          <div class="container">
            <div class="row">
              <div class="col-lg-5 col-xs-12">
                <h2> Dream Destination</h2>
                <p class = "pr-5 text-white-50">
                  Turn your dreams into reality.
                </p>
                <ul class ="social">
                  <li><a href ="https://www.facebook.com/dre.desti" target="_blank"><i class="fab fa-facebook"></i></a></li>
                  <li><a href ="https://www.instagram.com/dreamdestination2021/" target="_blank"><i class ="fab fa-instagram"></i></a></li>
                  <li><a href ="https://twitter.com/DreamDe92444755" target="_blank"><i class ="fab fa-twitter"></i></a></li>
                  <li><a href ="https://www.youtube.com/channel/UCvIBg7VmY6ZCZM4o9mfpKUg?view_as=subscriber" target="_blank"><i class ="fab fa-youtube"></i></a></li>
                </ul>
              </div>
              <div class="col-lg-3 col-xs-12 links">
                <h4 class="mt-lg-0 mt-sm-3">Quick Links</h4>
                <ul class="m-0 p-0">
                  <li><a href="../../places/places.html">Places</a></li>
                  <li><a href="../../Hotel/stay.html">Hotel</a></li>
                  <li><a href="../../activities/adventure.html">Activities</a></li>
                  <li><a href="../../Transport/transport/main.html">Transport</a></li>
                  <li><a href="../../PlanTrip/Trip-packages/packages.html">Trip Packages</a></li>
                  <li><a href="../../sitemap.html">Site Map</a></li>
                  <li><a href="../../privacy.html">Privacy Policy</a></li>
                </ul>
              </div>
              <div class="col-lg-4 col-xs-12 ContactUs">
                <h4 class="mt-lg-0 mt-sm-4">Contact Us</h4>
                <p><a href ="https://mail.google.com/mail/u/1/#inbox" target="_blank"><i class="fa fa-envelope"> dreamdestination2021@gmail.com</i></a></p>
              </div>
              <div class="row mt-5">
                <div class="col copyright text-center">
                  <p><small class="text-white-50">
                    All Rights Reserved &copy; Dream Destination Company 2020
                  </small></p>
                </div>
              </div>
            </div>
          </div>
        </div>

      </footer>

</body>
</html>
