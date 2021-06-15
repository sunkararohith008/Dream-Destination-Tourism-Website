<?php

//Check to see if there is no session yet
if (session_status() == PHP_SESSION_NONE) {
    //Start the session since there is no session
    session_start();
}
require_once('validate.php');

// Get the product data
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

//Retrieve and sanitize the codeinput
$codeInput = filter_input(INPUT_POST, 'code');
$codeInput = filter_var($codeInput, FILTER_SANITIZE_STRING);

//Retrieve and sanitize the name
$name = filter_input(INPUT_POST, 'name');
$name = filter_var($name, FILTER_SANITIZE_STRING);

$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

//Geting the product id from the hidden field in update_product_form.php
$product_id = filter_input(INPUT_POST, 'product_id_hidden', FILTER_VALIDATE_INT);

//Setting our errors to empty strings
$category_error = '';
$code_error = '';
$name_error = '';
$price_error = '';

// Validate inputs
if ($category_id == null || $category_id == false){
    $category_error = "Please choose a category.";
}
if($category_id < 1 || $category_id > 3){
    $category_error = "Category must be between 1 and 3.";
}

if($codeInput == false){
    $code_error = "Please enter a code";
}

if($name == false){
    $name_error = "Please enter a name";
}

if($price == false){
    $price_error = "Please enter a price";
} else if($price < 0 || $price > 50000){
    $price_error = "Please enter a price between 0 and 50 000 dollars";
}

if($price_error!='' || $name_error!=''  || $code_error!=''  || $category_error!='' ) {
    include('update_product_form.php');
    exit();
} else {
    // If valid, update the product in the database
    require_once('database.php');
    $query = 'UPDATE products
              SET categoryID = :category_id,
                  productCode = :code,
                  productName = :name,
                  listPrice = :price
               WHERE productID = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':code', $codeInput);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':product_id', $product_id);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('index.php');
}
?>
