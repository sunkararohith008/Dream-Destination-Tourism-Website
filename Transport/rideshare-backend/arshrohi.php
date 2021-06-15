<?php
//Check to see if there is no session yet
if (session_status() == PHP_SESSION_NONE) {
    //Start the session since there is no session
    session_start();
}
require_once('validate.php');

require_once('database.php');

// Get category ID
if (!isset($category_id)) {
  $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
  if ($category_id == NULL || $category_id == FALSE) {
      $category_id = 1;
  }
}

// Get name for selected category
$queryCategory = 'SELECT * FROM categories
                      WHERE categoryID = :category_id';
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':category_id', $category_id);
$statement1->execute();
$category = $statement1->fetch();
$category_name = $category['categoryName'];
$statement1->closeCursor();

// Get all categories
$queryAllCategories = 'SELECT * FROM categories
                           ORDER BY categoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();

// Get products for selected category
$queryProducts = 'SELECT * FROM products
              WHERE categoryID = :category_id
              ORDER BY productID';
$statement3 = $db->prepare($queryProducts);
$statement3->bindValue(':category_id', $category_id);
$statement3->execute();
$products = $statement3->fetchAll();
$statement3->closeCursor();
?>
<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>Rideshare</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
<main>
    <h1>Rideshare List</h1>
    <h5>Welcome Rohith Sunkara</h5>
    <aside>
            <!-- display a list of categories -->
            <h2> Pick Up City</h2>
            <nav>
            <ul>
                <?php foreach ($categories as $category) : ?>
                <li><a class="btn btn-block
                  <?php if($category['categoryID']==$category_id) {
                           echo "btn-success";
                        } else {
                           echo "btn-outline-success";
                        } ?>"
                        href=".?category_id=<?php echo $category['categoryID']; ?>">
                        <?php echo $category['categoryName']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
            </nav>
        </aside>

    <section>
        <!-- display a table of products -->
        <h2><?php echo $category_name; ?></h2>
        <table class="table table-striped">
          <thead>
              <tr>
                  <th>Name</th>
                  <th>Pick Up</th>
                  <th class="right">Drop Off</th>
                  <th class="right">Contact Number</th>
              </tr>
          </thead>
          <tbody>
              <?php foreach ($products as $product) : ?>
              <tr>
                  <td><?php echo $product['name']; ?></td>
                  <td><?php echo $product['pickUp']; ?></td>
                  <td class="right"><?php echo $product['dropOff']; ?></td>
                  <td class="right"><?php echo $product['phone']; ?></td>

              </tr>
              <?php endforeach; ?>
          </tbody>
        </table>
        <a class="btn btn-primary" href="add_product_form.php" role="button">Add Info</a>
        <a class="btn btn-danger" href="logout.php" role="button">Log Out</a>

    </section>
</main>
<footer></footer>
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
