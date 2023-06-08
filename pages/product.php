<?

if (!$user) {
  redirect("page=sign-in");
}
?>

<?php

if (isset($_GET["id"])) {
  $productId = $_GET["id"];

  $getProductByIdSQL = "SELECT * FROM products WHERE id = '$productId' LIMIT 1";
  $productResponse = $link->query($getProductByIdSQL);
  $product = $productResponse->fetch_assoc();
} else {
  redirect("");
} ?>

<section class="one_product">
  <div class="container">
    <h2 class="headtitle_style">
      <?= $product["name"] ?>
    </h2>
    <div class="content_one_product">
      <div class="slider_wrapper">
        <div class="product__images">
          <div class="product-image-wrapper">
            <img src="<?= $product["firstImage"] ?>" alt="<?= $product["name"] ?>" class="product-mini-img">
          </div>
          <div class="product-image-wrapper">
            <img src="<?= $product["secondImage"] ?>" alt="<?= $product["name"] ?>" class="product-mini-img">
          </div>
        </div>
        <div class="product-image-wrapper-big">
          <img src="<?= $product["firstImage"] ?>" class="product-big-image" alt="<?= $product["name"] ?>">
        </div>
      </div>
      <div class="description_one_product">
        <div class="caloric_value_one_product">
          <p class="caloric_value_name">На 100 граммов</p>
          <div class="caloric_value_data_list">
            <div class="caloric_value_data_item">
              <p class="caloric_value_number_data">
                <?= $product["calories"] ?>
              </p>
              <p class="caloric_value_name_data">Ккал</p>
            </div>
            <div class="caloric_value_data_item">
              <p class="caloric_value_number_data">
                <?= $product["proteins"] ?>
              </p>
              <p class="caloric_value_name_data">Белки</p>
            </div>
            <div class="caloric_value_data_item">
              <p class="caloric_value_number_data">
                <?= $product["fats"] ?>
              </p>
              <p class="caloric_value_name_data">Жиры</p>
            </div>
            <div class="caloric_value_data_item">
              <p class="caloric_value_number_data">
                <?= $product["carb"] ?>
              </p>
              <p class="caloric_value_name_data">Углеводы</p>
            </div>
          </div>
          <div class="specifications_item">
            <p class="specifications_item_name">Состав</p>
            <p class="specifications_item_description">
              <?= $product["structure"] ?>
            </p>
          </div>
        </div>

        <div class="specifications_one_product_list" id="productAccordion">
          <div class="specifications_item">
            <p class="specifications_item_name">Производитель, страна</p>
            <p class="specifications_item_description">
              <?= $product["maker"] ?>,
              <?= $product["country"] ?>
            </p>
          </div>
          <div class="specifications_item">
            <p class="specifications_item_name">Условия хранения, срок годности</p>
            <p class="specifications_item_description">
              <?= $product["conditions"] ?>,
              <?= $product["expDate"] ?>
            </p>
          </div>
          <div class="specifications_item">
            <p class="specifications_item_name">Вес</p>
            <p class="specifications_item_description">
              <?= $product["weight"] ?>
            </p>
          </div>
        </div>
        <button id="product-accordion-button" class="hide_show_button_one_product">
          Показать подробную информацию
        </button>
        <div class="one_product_item_price">
          <?= $product["price"] ?>
          ₽
        </div>
        <form name="cart" method="post">
          <button name="cart" class="button_product_item">В корзину</button>
        </form>
      </div>
    </div>
  </div>
</section>

<?php
if (isset($_POST["cart"])) {
  $userId = $user["id"];
  $uniqueId = uniqid();

  $checkCartIsCreatedSQL = "SELECT * FROM cart WHERE userId = '$userId'";
  $checkCartResponse = $link->query($checkCartIsCreatedSQL);
  $maybeCart =
    $checkCartResponse->fetch_assoc();
  if (!$maybeCart) {
    $createNewCartRowSQL = "INSERT INTO cart
(userId, uniqueId) VALUES ('$userId', '$uniqueId')";
    $link->query($createNewCartRowSQL);
    $getThisCartRowSQL = "SELECT * FROM cart WHERE userId = '$userId' AND uniqueId = '$uniqueId'";
    $thisCartRowResponse = $link->query($getThisCartRowSQL);
    $maybeCart =
      $thisCartRowResponse->fetch_assoc();
  }
  $addProductIntoCartListSQL = "INSERT INTO cart_list (cartId,
productId, count) VALUES ('{$maybeCart['id']}', '$productId', 1)";
  $link->query($addProductIntoCartListSQL);
  showSuccessNotification("Товар успешно добавлен в
корзину");
} ?>
<script src="js/productImagesTabs.js"></script>