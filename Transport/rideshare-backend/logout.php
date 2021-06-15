<?php
//Check to see if there is no session yet
if (session_status() == PHP_SESSION_NONE) {
    //Start the session since there is no session
    session_start();
}
    session_destroy();    //Clean up the session id
  header("Location: ./dlogin.php");
?>
