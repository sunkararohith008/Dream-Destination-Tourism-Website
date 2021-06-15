<?php

    //Check to see if there is no session yet
    if (session_status() == PHP_SESSION_NONE) {
        //Start the session since there is no session
        session_start();
    }

    // get the data from the form
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $user_password = filter_input(INPUT_POST, 'password');

    //Clearing our the messages from the session if they already exist
    unset($_SESSION['email_message']);
    unset($_SESSION['password_message']);
    unset($_SESSION['login_mesaage']);



    //Validate email
    if ( $email === FALSE ) {
        $_SESSION['email_message'] = 'Please provide a valid email address.';
    }

    //validate password
    if ( $user_password === FALSE || strlen($user_password) < 6 ) {
        $_SESSION['password_message'] = 'Please provide a password at least 6 characters long.';
    }

    // if an error message exists, go to the index page
    if (isset($_SESSION['password_message']) ||
        isset($_SESSION['email_message']) ) {

        $_SESSION['email'] = $email;

        //We could use include('index.php'); or header('Location: ./index.php'); here
        header('Location: ./dlogin.php');
        exit();
    } else {
          require_once('database.php');
          require_once('db_admin.php');
        //Here is where we need to validate the user and set the session
        if(is_valid_admin_login($email, $user_password)){
          //Login is Successful

          $_SESSION[is_valid_admin] = true;

          header('Location: ./index.php');
        }else{
          //Login Not sucessful
          if(email_exists($email)){
              $_SESSION['login_mesaage'] = "password incorrect. Please try again.";
          }else{
              $_SESSION['login_mesaage'] = "Username does not exist. Please try again.";
          }

          header('Location: ./dlogin.php');
          exit();
        }
    }

?>
