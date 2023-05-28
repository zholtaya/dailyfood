<?php
$userId = $user["id"];

$getFreeDeliveryPriceSQL = "SELECT * FROM delivery_price LIMIT 1";
$freeDeliveryPriceResponse = $link->query($getFreeDeliveryPriceSQL);
$freeDeliveryPrice = $freeDeliveryPriceResponse->fetch_assoc();

$getCartItemsSQL = "SELECT * FROM cart WHERE userId = '$userId'";
$cartResponse = $link->query($getCartItemsSQL);
$cartItems = $cartResponse->fetch_assoc();

$totalPrice = 0;
?>

<?php
if (isset($_GET["deleteAll"])) {
  $deleteAllCartItemsSQL = "DELETE FROM cart WHERE userId = '$userId'";
  $link->query($deleteAllCartItemsSQL);
  showSuccessNotification("Товары успешно удалены из корзины");
}
?>

<section class="cart">
  <div class="container">
    <div class="header_catalog_selected_category">
      <h2 class="headtitle_style_search">
        Корзина
      </h2>

      <a href="?page=cart&deleteAll" class="delete_all_products">
        <img src="../assets/img/icons/delete.svg" alt="">
        <p>
          Очистить корзину
        </p>
      </a>
    </div>
    <div class="content_cart">
      <div class="cart_products_list">
        <?php
        while ($cartItem = $cartResponse->fetch_assoc()) {
          $productId = $cartItem["productId"];
          $getProductByIdSQL = "SELECT * FROM products WHERE id = '$productId'";
          $productsResponse = $link->query($getProductByIdSQL);

          while ($product = $productsResponse->fetch_assoc()) {
            $totalPrice += $product["price"];
        ?>
            <div class="cart-product-item">
              <div class="cart_product_item">
                <img src="<?= $product["firstImage"] ?>" alt="<?= $product["name"] ?>" class="image_cart_product">
                <div class="cart_product_item_text">
                  <p class="cart_product_item_name">
                    <?= $product["name"] ?>
                  </p>
                  <p class="cart_product_item_price">
                    <?= $product["price"] ?> ₽
                  </p>
                </div>
              </div>
              <div class="changing_quantity"></div>
            </div>
        <?  }
        }
        ?>
      </div>
      <div class="content_cart_final_price">
        <p class="final_price_title">
          Итого
        </p>
        <div class="cart_final_price_product_delivery">
          <div class="cart_final_price_product">
            <p>Товары</p>
            <p><?= $totalPrice ?> ₽</p>
          </div>
          <?php
          if ((int)$freeDeliveryPrice > (int)$totalPrice) { ?>
            <div class="cart_final_price_delivery">
              <p>Доставка</p>
              <p>200 ₽</p>
            </div>
            <div class="delivery_price_counter">
              <p>Еще <?= (int)$freeDeliveryPrice - (int)$totalPrice ?> ₽ до бесплатной доставки</p>
            </div>
          <? } else { ?>
            <div class="cart_final_price_delivery">
              <p>Доставка</p>
              <p>0 ₽</p>
            </div>
          <? }
          ?>
        </div>
        <div class="total_price_cart">
          <p>К оплате</p>
          <?php
          if ((int)$freeDeliveryPrice > (int)$totalPrice) { ?>
            <p><?= (int)$totalPrice + 200 ?> ₽</p>
          <? } else { ?>
            <p><?= (int)$totalPrice ?> ₽</p>
          <? }
          ?>

        </div>
        <a href="#" class="button_cart">Перейти к оплате</a>
      </div>
    </div>
  </div>
</section>