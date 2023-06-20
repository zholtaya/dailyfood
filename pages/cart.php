<?php
if (!$user) {
  redirect("page=sign-in");
}

$userId = $user["id"];

$getFreeDeliveryPriceSQL = "SELECT * FROM delivery_price LIMIT 1";
$freeDeliveryPriceResponse = $link->query($getFreeDeliveryPriceSQL);
$freeDeliveryPriceObject =
  $freeDeliveryPriceResponse->fetch_assoc();
$freeDeliveryPrice = $freeDeliveryPriceObject["price"];
$getUserCartSQL = "SELECT * FROM cart WHERE userId = '$userId'";
$userCartResponse =
  $link->query($getUserCartSQL);
$userCart = $userCartResponse->fetch_assoc();
$getAllCartProductsSQL
  = "SELECT * FROM cart_list WHERE cartId = '{$userCart['id']}'";
$cartProductsResponse =
  $link->query($getAllCartProductsSQL);
$totalPrice = 0; ?>

<?php
if (isset($_GET["deleteAll"])) {
  $deleteAllCartItemsSQL = "DELETE FROM cart_list WHERE cartId = '{$userCart['id']}'";
  $link->query($deleteAllCartItemsSQL);
  $deleteCartSQL = "DELETE FROM cart WHERE userId =
'$userId'";
  $link->query($deleteCartSQL);
  redirect("page=cart");
} ?>

<div id="cartModal" class="modal">
  <div class="modal-content default-modal">
    <h3 class="modal-title">
      Удаление всех товаров <br />
      из корзины
    </h3>
    <p class="modal-description">Вы действительно хотите удалить все товары из корзины?</p>
    <div class="modal-btns">
      <button id="closeCartModal" class="modal-btn modal-btn-cancel">Отменить</button>
      <a id="closeCartModal" href="?page=cart&deleteAll" class="modal-btn modal-btn-success">Удалить</a>
    </div>
  </div>
</div>

<section class="cart">
  <div class="container">
    <div class="header_catalog_selected_category">
      <h2 class="headtitle_style_search">Корзина</h2>
      <button id="openCartModal" class="delete_all_products">
        <img src="./assets/img/icons/delete.svg" alt="" />
        <p>Очистить корзину</p>
      </button>
    </div>
    <div id="cart-content" class="content_cart">
      <div class="cart_products_list">
        <?php
        $cartProducts = $cartProductsResponse->fetch_assoc();
        while ($cartProducts) {
          $productId =
            $cartProducts["productId"];
          $getProductByIdSQL = "SELECT * FROM products WHERE id =
                '$productId'";
          $productsResponse = $link->query($getProductByIdSQL);
          $product =
            $productsResponse->fetch_assoc();
          $totalPrice += (int) $product["price"] * (int) $cartProducts["count"]; ?>
          <div class="cart-product-item">
            <img src="<?= $product["firstImage"] ?>" alt="<?= $product["name"] ?>" class="image_cart_product">

            <div class="cart_product_quantity_name">
              <div class="cart_product_item">
                <div class="cart_product_item_text">
                  <p class="cart_product_item_name">
                    <?= $product["name"] ?>
                  </p>
                  <p class="cart_product_item_price">
                    <?= $product["price"] ?>
                    ₽
                  </p>
                </div>
              </div>
              <div class="catalog_product-btns">
                <div id="counterContainer" class="counter-container counter-container-cart">
                  <input class="cartProductId" type="hidden" value="<?= $product["id"] ?>" />
                  <input class="cartListId" type="hidden" value="<?= $cartProducts["id"] ?>" />
                  <button class="counter-container-minus">-</button>
                  <span><?= $cartProducts["count"] ?></span>
                  <button class="counter-container-plus">+</button>
                </div>
              </div>
            </div>
          </div>
        <?php
          $cartProducts = $cartProductsResponse->fetch_assoc();
        } ?>
      </div>
      <div class="content_cart_final_price">
        <p class="final_price_title">Итого</p>
        <div class="cart_final_price_product_delivery">
          <div class="cart_final_price_product">
            <p>Товары</p>
            <p>
              <?= $totalPrice ?>
              ₽
            </p>
          </div>
          <?php
          if (
            (int) $freeDeliveryPrice >
            (int) $totalPrice
          ) { ?>
            <div class="cart_final_price_delivery">
              <p>Доставка</p>
              <p>200 ₽</p>
            </div>
            <div class="delivery_price_counter">
              <p>
                Еще
                <?= (int) $freeDeliveryPrice - (int) $totalPrice ?>
                ₽ до бесплатной доставки
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
          if (
            (int) $freeDeliveryPrice >
            (int) $totalPrice
          ) { ?>
            <p>
              <?= (int) $totalPrice + 200 ?>
              ₽
            </p>
          <?php } else { ?>
            <p>
              <?= (int) $totalPrice ?>
              ₽
            </p>
          <?php }
          ?>
        </div>
        <a href="?page=order&totalPrice=<?= $totalPrice ?>" class="button_cart">Перейти к оплате</a>
      </div>
    </div>
  </div>
</section>

<script src="/js/modal.js"></script>

<script>
  const countersContainers = document.querySelectorAll(".counter-container");

  const increment = (currentContainer, productId) => {
    if (currentContainer.classList.contains("disable-counter")) {
      currentContainer.classList.remove("disable-counter");
    }
    const currentCounterSpan = currentContainer.querySelector("span");
    const prevValue = Number(currentCounterSpan.textContent);
    currentCounterSpan.textContent = `${prevValue + 1}`;
    updateProductQuantity(productId, "increment")
  }

  const decrement = (currentContainer, productId) => {
    const currentCounterSpan = currentContainer.querySelector("span");
    const prevValue = Number(currentCounterSpan.textContent);
    if (prevValue == 1) {
      currentContainer.parentElement.parentElement.parentElement.classList.add("none");
      updateProductQuantity(productId, "decrement");
      document.location.href = "?page=cart";
    } else {
      currentCounterSpan.textContent = `${prevValue - 1}`;
      updateProductQuantity(productId, "decrement");
    }
  }

  countersContainers.forEach((element, index) => {
    // const productId = element.querySelector(".cartProductId").value;
    const cartListId = element.querySelector(".cartListId").value;

    const minusBtnElement = element.querySelector(".counter-container-minus");
    const plusBtnElement = element.querySelector(".counter-container-plus");

    plusBtnElement.addEventListener("click", () => {
      increment(countersContainers[index], cartListId);
    });

    minusBtnElement.addEventListener("click", () => {
      decrement(countersContainers[index], cartListId);
    })
  })

  const updateProductQuantity = (cartListId, type) => {
    // type === increment || decrement || new
    return fetch(`actions/update-cart-quantity.php?cart_list_id=${cartListId}&type=${type}`)
      .then((response) => {
        console.log(response);
        return response.json();
      });
  };
</script>