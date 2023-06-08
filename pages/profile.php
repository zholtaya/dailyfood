<?php
if (!$user) {
  redirect("page=sign-in");
}
?>

<div id="deleteAccountModal" class="modal">
  <div class="modal-content default-modal">
    <h3 class="modal-title">
      Удаление всех товаров <br />
      из корзины
    </h3>
    <p class="modal-description">Вы действительно хотите удалить все товары из корзины?</p>
    <div class="modal-btns">
      <button id="closeDeleteAccountModal" class="modal-btn modal-btn-cancel">Отменить</button>
      <a id="closeDeleteAccountModal" href="?page=profile&deleteAccount" class="modal-btn modal-btn-success">Удалить</a>
    </div>
  </div>
</div>

<section class="user_profile">
  <div class="container">
    <div class="header_catalog_selected_category">
      <h2 class="headtitle_style_search">
        <span class="part-of-the-day">Добрый день</span>,
        <?= $user["name"] ?>
      </h2>

      <a href="?do=exit" class="button_log_out">Выход</a>
    </div>
    <div class="content_user-profile">
      <div class="user-profile_information">
        <p class="title_user_style">
          Ваши данные
        </p>
        <div class="user-profile_information_list">
          <div class="user_profile_item">
            <p class="field_name">
              Имя
            </p>
            <p class="user_data">
              <?= $user["name"] ?>
            </p>
          </div>
          <div class="user_profile_item">
            <p class="field_name">
              Электронная почта
            </p>
            <p class="user_data">
              <?= $user["email"] ?>
            </p>
          </div>
          <div class="user_profile_item">
            <p class="field_name">
              Адрес
            </p>
            <p class="user_data">
              <?= $user["address"] ?>
            </p>
          </div>
        </div>
        <button id="openDeleteAccountModal" class="delete_button">Удалить аккаунт</button>
      </div>
      <div class="user-profile_information">
        <p class="title_user_style">
          Ваши заказы
        </p>
        <div id="user-orders-list" class="user_profile_orders_list">
          <?php
          $userId = $user["id"];
          $getUserOrdersSQL = "SELECT * FROM orders WHERE userId = '$userId'";
          $userOrdersResponse = $link->query($getUserOrdersSQL);

          while ($order = $userOrdersResponse->fetch_assoc()) {
            $textStatus = "Собирается";
            if ($order["status"] == 2) {
              $textStatus = "Передан курьеру";
            }
            if ($order["status"] == 3) {
              $textStatus = "Доставляется";
            }
            if ($order["status"] == 4) {
              $textStatus = "Доставлен";
            }
          ?>
            <div id="user-order-item" class="user_profile_order_item">
              <div class="order_information_user">
                <div class="inf">
                  <p class="title_user_style js-format_date">
                    <?= $order["date"] ?>
                  </p>
                  <div>
                    <p class="order_text_style">
                      <?= $order["price"] ?> ₽
                    </p>
                    <p class="order_text_style">улица Аделя Кутуя, 100Е, кв.104</p>
                  </div>
                </div>
                <div class="status_value_user">
                  <?= $textStatus ?>
                </div>
              </div>
            </div>
          <? }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="/js/modal.js"></script>

<script>
  const elements = document.querySelectorAll(".js-format_date");
  [...elements].forEach((element) => {
    const dateString = element.textContent;
    const date = new Date(dateString);
    const formattedDate = date.toLocaleDateString("ru-RU", {
      day: "2-digit",
      month: "long"
    });
    element.textContent = formattedDate;
  })

  const deleteAccountModal = new Modal("deleteAccountModal", "openDeleteAccountModal", "closeDeleteAccountModal");
</script>