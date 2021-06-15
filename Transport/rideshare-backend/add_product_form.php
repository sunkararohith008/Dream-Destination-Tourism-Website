<?php



if(!isset($name)){
    $name = '';
}
if(!isset($pickUp)){
    $pickUp = '';
}
if(!isset($dropOff)){
    $dropOff = '';
}
if(!isset($phone)){
    $phone = '';
}

require('database.php');
$query = 'SELECT *
          FROM categories
          ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<!-- the body section -->
<body>
    <div class="container">
    <header><h1>Rideshare</h1></header>

    <main>
        <h1>Add Your Ride</h1>

        <form action="insert_product.php" method="post"
              id="add_product_form">

            <div class="form-group">
                <label>Choose Your Pick Up City:</label>
                <?php if(isset($category_error) && $category_error != ''){ ?>
                    <h3 class='text-danger'><?php echo $category_error; ?></h3>
                <?php } ?>
                <select class="form-control" name="category_id">
                <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo $category['categoryID']; ?>">
                        <?php echo $category['categoryName']; ?>
                    </option>
                <?php endforeach; ?>
                </select><br>
            </div>

            <!-- Name -->
            <div class="form-group">
                <label for="name">Name:</label>
                <?php if(isset($name_error) && $name_error != ''){ ?>
                    <h3 class='text-danger'><?php echo $name_error; ?></h3>
                <?php } ?>
                <input class="form-control" type="text" name="name" id="name"
                value="<?php echo htmlspecialchars($name); ?>"><br>
            </div>

            <!-- Pick Up -->
            <div class="form-group">
                <label for="pl">Drop-Off Location:</label>
                <?php if(isset($pick_error) && $pick_error != ''){ ?>
                    <h3 class='text-danger'><?php echo $pick_error; ?></h3>
                <?php } ?>
                <input class="form-control" type="text" name="pl" id="pl"
                value="<?php echo htmlspecialchars($pickUp); ?>"><br>
            </div>

            <!-- Drop Off -->
            <div class="form-group">
                <label for="dl">Date And Time of the Ride:</label>
                <?php if(isset($drop_error) && $drop_error != ''){ ?>
                    <h3 class='text-danger'><?php echo $drop_error; ?></h3>
                <?php } ?>
                <input class="form-control" type="text" name="dl" id="dl"
                value="<?php echo htmlspecialchars($dropOff); ?>"><br>
            </div>

            <!-- Contact Number -->
            <div class="form-group">
                <label for="phone">Contact Number:</label>
                <?php if(isset($phone_error) && $phone_error != ''){ ?>
                    <h3 class='text-danger'><?php echo $phone_error; ?></h3>
                <?php } ?>
                <input class="form-control" type="text" name="phone" id="phone"
                value="<?php echo htmlspecialchars($phone); ?>"><br>
            </div>

            <label>&nbsp;</label>
            <input class="btn btn-primary" type="submit" value="Add Info"><br>
        </form>
        <p><br><a href="index.php">View Info</a></p><br>
    </main>
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
