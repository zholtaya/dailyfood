<?php
if (!$user) {
  redirect("page=sign-in");
}

$userId = $user["id"];

$getFreeDeliveryPriceSQL = "SELECT * FROM delivery_price LIMIT 1";
$freeDeliveryPriceResponse = $link->query($getFreeDeliveryPriceSQL);
$freeDeliveryPriceObject = $freeDeliveryPriceResponse->fetch_assoc();
$freeDeliveryPrice = $freeDeliveryPriceObject["price"];


$getUserCartSQL = "SELECT * FROM cart WHERE userId = '$userId'";
$userCartResponse = $link->query($getUserCartSQL);
$userCart = $userCartResponse->fetch_assoc();

$getAllCartProductsSQL = "SELECT * FROM cart_list WHERE cartId = '{$userCart['id']}'";
$cartProductsResponse = $link->query($getAllCartProductsSQL);

$totalPrice = 0;
?>

<?php
if (isset($_GET["deleteAll"])) {
  $deleteAllCartItemsSQL = "DELETE FROM cart_list WHERE cartId = '{$userCart['id']}'";
  $link->query($deleteAllCartItemsSQL);
  $deleteCartSQL = "DELETE FROM cart WHERE userId = '$userId'";
  $link->query($deleteCartSQL);

  redirect("page=cart");
}
?>

<section class="cart">
  <div class="container">
    <div class="header_catalog_selected_category">
      <h2 class="headtitle_style_search">
        Корзина
      </h2>

      <a href="?page=cart&deleteAll" class="delete_all_products">
        <img src="./assets/img/icons/delete.svg" alt="">
        <p>
          Очистить корзину
        </p>
      </a>
    </div>
    <div id="cart-content" class="content_cart">
      <div class="cart_products_list">
        <?php
        $cartProducts = $cartProductsResponse->fetch_assoc();

        while ($cartProducts) {
          $productId = $cartProducts["productId"];
          $getProductByIdSQL = "SELECT * FROM products WHERE id = '$productId'";
          $productsResponse = $link->query($getProductByIdSQL);
          $product = $productsResponse->fetch_assoc();
          $totalPrice += $product["price"];
          ?>
          <div class="cart-product-item">
            <img src="<?= $product["firstImage"] ?>" alt="<?= $product["name"] ?>" class="image_cart_product">

            <div class="cart_product_quantity_name">
              <div class="cart_product_item">
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

          </div>
          <?php

          $cartProducts = $cartProductsResponse->fetch_assoc();
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
            <p>
              <?= $totalPrice ?> ₽
            </p>
          </div>
          <?php
          if ((int) $freeDeliveryPrice > (int) $totalPrice) { ?>
            <div class="cart_final_price_delivery">
              <p>Доставка</p>
              <p>200 ₽</p>
            </div>
            <div class="delivery_price_counter">
              <p>Еще
                <?= (int) $freeDeliveryPrice - (int) $totalPrice ?> ₽ до бесплатной доставки
              </p>
            </div>
          <?php } else { ?>
            <div class="cart_final_price_delivery">
              <p>Доставка</p>
              <p>0 ₽</p>
            </div>
          <?php }
          ?>
        </div>
        <div class="total_price_cart">
          <p>К оплате</p>
          <?php
          if ((int) $freeDeliveryPrice > (int) $totalPrice) { ?>
            <p>
              <?= (int) $totalPrice + 200 ?> ₽
            </p>
          <?php } else { ?>
            <p>
              <?= (int) $totalPrice ?> ₽
            </p>
          <?php }
          ?>

        </div>
        <a href="?page=order&totalPrice=<?= $totalPrice ?>" class="button_cart">Перейти к оплате</a>
      </div>
    </div>
  </div>
</section>