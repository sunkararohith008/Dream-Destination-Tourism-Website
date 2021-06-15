<?php


// Get the product data
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

//Retrieve and sanitize the name
$name = filter_input(INPUT_POST, 'name');
$name = filter_var($name, FILTER_SANITIZE_STRING);

//Retrieve and sanitize the Pick Up
$pickUp = filter_input(INPUT_POST, 'pl');
$pickUp = filter_var($pickUp, FILTER_SANITIZE_STRING);

//Retrieve and sanitize the Drop Off
$dropOff = filter_input(INPUT_POST, 'dl');
$dropOff = filter_var($dropOff, FILTER_SANITIZE_STRING);



$phone = filter_input(INPUT_POST, 'phone', FILTER_VALIDATE_INT);


$category_error = '';
$name_error = '';
$pick_error = '';
$drop_error = '';
$phone_error = '';

// Validate inputs
if ($category_id == null || $category_id == false){
    $category_error = "Please choose a category.";
}

//name
if($name == false){
    $name_error = "Please enter a name";
}
//Pick Up
if($pickUp == false){
    $pick_error = "Please enter a Pick Up Location";
}
//Drop Off
if($dropOff == false){
    $drop_error = "Please enter a Drop Off Location";
}


//Phone
if($phone == false){
    $phone_error = "Please enter a Phone Number";
  }
// } else if($price < 0 || $price > 50000){
//     $price_error = "Please enter a price between 0 and 50 000 dollars";
// }

if($phone_error!='' || $name_error!=''  || $drop_error!='' || $pick_error!=''  || $category_error!='' ) {
    include('add_product_form.php');
    exit();
} else {
    require_once('database.php');

    // Add the product to the database
    $query = 'INSERT INTO products
                 (categoryID, name, pickUp, dropOff, phone)
              VALUES
                 (:category_id, :name, :pl, :dl, :phone)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':pl', $pickUp);
    $statement->bindValue(':dl', $dropOff);
    $statement->bindValue(':phone', $phone);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('index.php');
}
?>
