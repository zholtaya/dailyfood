<?php
session_start();
include("./connect/connect.php");
include("./utils/utils.php");
if (isset($_SESSION['uid'])) {
  $query = "SELECT * FROM users WHERE id='{$_SESSION['uid']}'";
  $result = $link->query($query);
  $user = $result->fetch_assoc();
  $id_user = $user['id'];
}

if ($_REQUEST['do'] == 'exit') {
  session_unset();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/burger_menu.js" defer></script>
  <script src="js/addProductCategory.js" defer></script>
  <title>Document</title>

</head>

<body>

  <?php
  include("components/header.php");
  if (isset($_GET['page'])) {
    if ($_GET['page'] == 'sign-up') {
      include("pages/sign_up.php");
    }
    if ($_GET['page'] == 'sign-in') {
      include("pages/sign_in.php");
    }
    if ($_GET['page'] == 'reset-password') {
      include("pages/reset_password.php");
    }
    if ($_GET['page'] == 'add-category') {
      include("pages/add_category.php");
    }
    if ($_GET['page'] == 'add-subcategory') {
      include("pages/add_subcategory.php");
    }
    if ($_GET['page'] == 'add-product') {
      include("pages/add_product.php");
    }
    if ($_GET['page'] == 'add-recipe') {
      include("pages/add_recipe.php");
    }
  }
  if (empty($_GET['page'])) {
    include("pages/main.php");
  }
  include("components/footer.php");

  ?>

</body>

</html>