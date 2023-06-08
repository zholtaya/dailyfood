<?

if (!$user) {
  redirect("page=sign-in");
}
?>

<?php
if (isset($_GET["totalPrice"])) {
  $totalPrice = $_GET["totalPrice"];

  $getFreeDeliveryPriceSQL = "SELECT * FROM delivery_price LIMIT 1";
  $freeDeliveryPriceResponse = $link->query($getFreeDeliveryPriceSQL);
  $freeDeliveryPriceObject = $freeDeliveryPriceResponse->fetch_assoc();
  $freeDeliveryPrice = $freeDeliveryPriceObject["price"];

  $orderPrice = $totalPrice;
  if ((int) $totalPrice < (int) $freeDeliveryPrice) {
    $orderPrice = (int) ($totalPrice) + 200;
  }
} else {
  redirect("?page=cart");
}

if (isset($_POST["order"])) {
  $userId = $user["id"];

  $payment = $_POST["payment"];
  $mainAddress = $_POST["mainAddress"];
  $office = $_POST["office"];
  $entrance = $_POST["entrance"];
  $floor = $_POST["floor"];
  $code = $_POST["code"];
  $comment = $_POST["comment"];

  $fullAdress = $mainAddress . $office . $entrance . $floor . $code;

  $errors = array();

  if (!checkEmptyLines(array($payment, $fullAdress))) {
    array_push($errors, "Заполните все поля");
  }

  if (empty($errors)) {
    $currentDate = date("Y-m-d");

    $createOrderSQL = "INSERT INTO orders (userId, price, status, payment_method, comment, date) VALUES ('$userId', '$orderPrice', 1, '$payment', '$comment', '$currentDate')";
    $link->query($createOrderSQL);

    $getCurrentOrderSQL = "SELECT * FROM orders WHERE userId = '$userId' AND price = '$orderPrice' AND date = '$currentDate'";
    $currentOrderResponse = $link->query($getCurrentOrderSQL);
    $currentOrder = $currentOrderResponse->fetch_assoc();

    $getUserCartSQL = "SELECT * FROM cart WHERE userId = '$userId'";
    $userCartResponse = $link->query($getUserCartSQL);
    $userCart = $userCartResponse->fetch_assoc();
    $getAllCartProductsSQL = "SELECT * FROM cart_list WHERE cartId = '{$userCart['id']}'";
    $cartProductsResponse = $link->query($getAllCartProductsSQL);

    while ($cartProducts = $cartProductsResponse->fetch_assoc()) {
      $addFromCartToOrderSQL = "INSERT INTO orders_list (orderId, productId, quantity) VALUES ('{$currentOrder['id']}', '{$cartProducts['productId']}', '{$cartProducts['count']}')";
      $link->query($addFromCartToOrderSQL);
    }

    showSuccessNotification("Заказ успешно сформирован");
  }
}
?>

<div id="orderModal" class="modal">
  <div class="modal-content cartModal">
    <div class="modal-header">
      <h3 class="modal-title">
        Укажите ваш адрес
      </h3>
      <button id="closeMapModal">
        <img src="assets/icons/closeIcon.svg" alt="Закрыть">
      </button>
    </div>
    <div id="map" style="width: 1252px"></div>
  </div>
</div>

<section class="cart">
  <div class="container">
    <h2 class="headtitle_style">
      Оформление заказа
    </h2>
    <form method="post" name="order" class="content_cart">


      <div class="form_style_order">
        <p class="title_order_payment">
          Способ оплаты
        </p>
        <select name="payment" id="payment" class="select_style_order">
          <option value="Картой">Картой</option>
          <option value="Наличными">Наличными при получении</option>
        </select>
        <p class="title_order_payment">
          Адрес доставки
        </p>
        <input id="openMap" name="mainAddress" type="text" class="input_style_order" placeholder="Улица, номер дома">

        <div class="address_inputs_order">
          <input name="office" type="text" class="input_style_order_address" placeholder="Кв/офис">
          <input name="entrance" type="text" class="input_style_order_address" placeholder="Подъезд">
          <input name="floor" type="text" class="input_style_order_address" placeholder="Этаж">
          <input name="code" type="text" class="input_style_order_address" placeholder="Домофон">
        </div>
        <input name="comment" type="text" class="input_style_order" placeholder="Комментарий курьеру">
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
        <button name="order" class="button_cart">Заказать</button>
      </div>
    </form>
  </div>
</section>

<script src="https://api-maps.yandex.ru/2.1/?apikey=2aa5814d-439d-4477-bb6c-237f9bbf7357
&lang=ru_RU" type="text/javascript">
</script>

<script src="/js/modal.js"></script>
<script>
  const mapModal = new Modal("orderModal", "openMap", "closeMapModal");
</script>

<script>
  ymaps.ready(init);

  function init() {
    const map = new ymaps.Map("map", {
      center: [55.801320, 49.177342], // Set the initial center of the map
      zoom: 15 // Set the initial zoom level
    });

    // Add a click event listener to the map
    map.events.add("click", function (e) {
      const coords = e.get("coords");

      // Use the Yandex Geocoder to get the place name based on the coordinates
      ymaps.geocode(coords).then(function (res) {
        const firstGeoObject = res.geoObjects.get(0);
        const placeName = firstGeoObject.getAddressLine();

        // Update the input field with the place name
        document.getElementById("openMap").value = placeName;
        mapModal.closeModal();
      });
    });
  }
</script>