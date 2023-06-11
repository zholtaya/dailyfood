<?php
isModeratorOrAdmin($user["role"]);
?>
<section class="user_profile">
  <div class="container">
    <div class="content_admin">
      <div class="admin_tabs_list">
        <a href="?page=moderator-recipes" class="tab_item active">
          Рецепты
        </a>
        <a href="?page=moderator-orders" class="tab_item ">
          Заказы
        </a>
      </div>
      <div class="admin_order_content">
        <h2 class="headtitle_style_search">
          Список рецептов
        </h2>
        <div class="admin_order_list">
          <?php
          $userId = $user["id"];
          $getUserRecipesSQL = "SELECT * FROM recipes WHERE status = '1'";
          $userRecipesResponse = $link->query($getUserRecipesSQL);

          while ($recipe = $userRecipesResponse->fetch_assoc()) { ?>
            <div class="admin_order_item">
              <div class="content_admin_order_item">
                <div class="order_information_user">
                  <div class="inf">
                    <p class="title_user_style">
                      <?= $recipe["title"] ?>
                    </p>
                    <div class="buttons_wrapper_moderator">
                      <div class="button_moderator_recipes time-recipe-flex">
                        <img src="./assets/img/icons/time.svg" alt="">
                        <p><?= $recipe["time"] ?> минут</p>
                      </div>
                    </div>
                  </div>
                  <div class="status_value_user">
                    Не опубликован
                  </div>
                </div>

                <a href="?page=recipe&id=<?= $recipe["id"] ?>" target="_blank" class="open_button_user">Подробнее</a>
              </div>
            </div>
          <? }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>