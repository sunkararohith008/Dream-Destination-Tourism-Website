<?php
//Check to see if there is no session yet
if (session_status() == PHP_SESSION_NONE) {
    //Start the session since there is no session
    session_start();
}
//require_once('validate.php');

// Get the input fields
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

//Retrieve and sanitize the first and last names
$first_name = filter_input(INPUT_POST, 'first_name');
$first_name = filter_var($first_name, FILTER_SANITIZE_STRING);

//Retrieve and sanitize the first and last names
$last_name = filter_input(INPUT_POST, 'last_name');
$last_name = filter_var($last_name, FILTER_SANITIZE_STRING);

//Retrieve and sanitize the name
$password = filter_input(INPUT_POST, 'password');
$confirm_password = filter_input(INPUT_POST, 'confirm_password');

//Set all our error strings to the empty string
$email_error = '';
$firstname_error = '';
$lastname_error = '';
$password_error = '';
$confirm_password_error = '';

// Validate email
if ($email == null || $email == false){
    $email_error = "Please enter a valid email.";
}

// Validate first name
if($first_name == false){
    $firstname_error = "Please enter a first name";
}

// Validate last name
if($last_name == false){
    $lastname_error = "Please enter a last name";
}

// Validate password
if($password == false || !preg_match('/^(?=.*[0-9]+.*)(?=.*[a-zA-Z]+.*)[0-9a-zA-Z]{6,}$/', $password)){
    $password_error = "Please enter a valid password that contains at least:<ul><li> 6 characters long</li><li>one Capital letter</li><li>one lowercase letter</li><li>one number</li></ul>";
}

if($confirm_password == false || $confirm_password!=$password){
    $confirm_password_error = "Confirmation password must match the password entered.";
}


if($email_error!='' || $firstname_error!=''  || $lastname_error!=''  || $password_error!=''  || $confirm_password_error!='' ) {
    include('signup.php');
    exit();
} else {
    require_once('database.php');
    require_once('db_admin.php');



    // This is where we add the user to the new database table
    $add_return_value = add_admin($email, $password);

    // Display the Product List page
    include('signup.php');
}
?>
