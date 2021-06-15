<?php
//Check to see if there is no session yet
if (session_status() == PHP_SESSION_NONE) {
    //Start the session since there is no session
    session_start();
}
//require_once('validate.php');


//Setting our default values to empty string if they don't exist
if(!isset($email)){ $email = ''; }
if(!isset($first_name)){ $first_name = ''; }
if(!isset($last_name)){ $last_name = ''; }
if(!isset($add_return_value)){ $add_return_value = ''; }

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
  <link rel=" stylesheet" href="form.css" type="text/css">
  <!-- Link to footer css stylesheet -->
  <!-- <link rel="stylesheet" href="../../CSS/footer.css" type="text/css" /> -->

  <!-- Link to Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Link to icons -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- <img src="images/logo.png"> -->
           <!--  <div class="greeting">
                <img src="images/logo.png">
            </div>
            <h6 class="mt-3">Now, plan your holidays with dream destination.</h6> -->

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
      <li class="nav-item active">
        <a class="nav-link" href="../../Transport/rideshare-backend/signup.php"><i class="fas fa-user"></i> Sign Up</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../Transport/rideshare-backend/dlogin.php"><i class="fas fa-sign-in-alt"></i> Login</a>
      </li>
    </ul>
  </div>
</nav>
<br>
<!-- Nav Bar ends here -->

  <div class="container d-flex justify-content-center">
    <div class="row my-5">
        <div class="col-md-6 text-left text-white lcol">
            <div class="greeting text-center">
                <h2>Welcome To Dream Destination</h2>
            </div>
            <h4 class="mt-3 text-center">Now, Plan Your Holidays With Dream Destination.</h4>
            <h6 class="mt-3 text-center">Sign Up To Join Our Community.</h6>

        </div>
        <div class="col-md-6 rcol">
          <h2 class="heading mb-4 text-center">Sign Up</h2>
          <?php if(isset($add_return_value) && $add_return_value != ''){ ?>
              <h5 class='text-primary'><?= $add_return_value; ?></h5>
          <?php } ?>

          <form action="add_user.php" method="post"
                id="signup">

                <div class="form-group fone mt-2"> <label for="code">Username/Email:</label>

                <?php if(isset($email_error) && $email_error != ''){ ?>
                    <h5 class='text-danger'><?= $email_error; ?></h5>
                <?php } ?>

                <input class="form-control" type="email" name="email" id="email"
                value="<?= htmlspecialchars($email); ?>"> </div>

                <!-- start of the first name section -->
                <div class="form-group fone mt-2">   <label for="name">First Name:</label>
                  <?php if(isset($firstname_error) && $firstname_error != ''){ ?>
                      <h5 class='text-danger'><?= $firstname_error; ?></h3>
                  <?php } ?>
                  <input class="form-control" type="text" name="first_name" id="first_name"
                  value="<?= htmlspecialchars($first_name); ?>"></div>


                <div class="form-group fone mt-2">   <label for="name">Last Name:</label>
                  <?php if(isset($lastname_error) && $lastname_error != ''){ ?>
                      <h5 class='text-danger'><?= $lastname_error; ?></h3>
                  <?php } ?>
                  <input class="form-control" type="text" name="last_name" id="last_name"
                  value="<?= htmlspecialchars($last_name); ?>">
                </div>


                <!-- start of the Password section -->
                <div class="form-group fone mt-2">

                    <label for="price">Password:</label>

                    <?php if(isset($password_error) && $password_error != ''){ ?>
                        <h5 class='text-danger'><?= $password_error; ?></h3>
                    <?php } ?>

                    <input class="form-control" type="password" name="password" id="password"
                    value="">
                </div>

                <!-- start of the Confirm Password section -->
                <div class="form-group fone mt-2">

                    <label for="price">Confirm Password:</label>

                    <?php if(isset($confirm_password_error) && $confirm_password_error != ''){ ?>
                        <h5 class='text-danger'><?= $confirm_password_error; ?></h3>
                    <?php } ?>

                    <input class="form-control" type="password" name="confirm_password" id="confirm_password" value="">
                </div>


                <!-- Submit button for the form -->
                <label>&nbsp;</label>
                <input class="btn btn-primary" type="submit" value="Sign Up">
                <a class="btn btn-link" href="dlogin.php" role="button">Already have an account? Login here.</a>


            </form>
            <br>
        </div>
    </div>
</div>

<!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-186188866-1"></script>
  <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-186188866-1');
  </script>

</body>
</html>
