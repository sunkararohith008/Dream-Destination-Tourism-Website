<?php
//Check to see if there is no session yet
if (session_status() == PHP_SESSION_NONE) {
    //Start the session since there is no session
    session_start();
}
  //Make sure user is  a valid administrator
  if(!isset($_SESSION['is_valid_admin'])){
      header("Location: ./dlogin.php");
  }
?>
