<?php
if (!$user) {
  redirect("");
}
?>

<section class="user_profile">
  <div class="container">
    <div class="header_catalog_selected_category">
      <h2 class="headtitle_style_search">
        <span class="part-of-the-day">Доброе утро</span>,
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
        <a href="#" class="delete_button">Удалить аккаунт</a>
      </div>
      <div class="user-profile_information">
        <p class="title_user_style">
          Ваши заказы
        </p>
        <div class="user_profile_orders_list">
          <div class="user_profile_order_item">
            <div class="order_information_user">
              <div class="inf">
                <p class="title_user_style">
                  13 апреля в 11:04
                </p>
                <div>
                  <p class="order_text_style">786 ₽ </p>
                  <p class="order_text_style">улица Аделя Кутуя, 110Е</p>
                </div>
              </div>
              <div class="status_value_user">
                Собирается
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>