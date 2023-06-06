<?php
isAdmin($user["role"]);
?>

<section class="user_profile">
    <div class="container">
        <div class="content_admin">
            <div class="admin_tabs_list">
                <a href="?page=admin-user" class="tab_item active">
                    Пользователи
                </a>
                <a href="?page=admin-products" class="tab_item">
                    Товары
                </a>
                <a href="?page=admin-subcategory" class="tab_item">
                    Подкатегорию
                </a>
                <a href="?page=admin-orders" class="tab_item ">
                    Заказы
                </a>
            </div>
            <div class="admin_order_content">
                <div class="header_catalog_selected_category">
                    <h2 class="headtitle_style_search">
                        Список пользователей
                    </h2>

                    <form name="search" method="POST" class="form_search">
                        <input type="text" class="input_style_admin" name="search_name" value="<?= $search_name ?>"
                            placeholder="Поиск...">
                        <button class="search_button">
                            <img src="./assets/img/icons/search.svg" alt="">
                        </button>
                    </form>
                </div>
                <div class="admin_order_list">
                    <div class="header_admin_user_item">
                        <p class="name_order_item">
                            ID
                        </p>
                        <p class="name_order_item">
                            Имя
                        </p>
                        <p class="name_order_item">
                            Почта
                        </p>

                        <p class="name_order_item">
                            Роль
                        </p>
                        <p class="name_order_item">
                            Изменить роль
                        </p>
                    </div>
                    <?php
                    $getAllUsersSQL = "SELECT * FROM users";
                    $allUsersResponse = $link->query($getAllUsersSQL);

                    while ($user = $allUsersResponse->fetch_assoc()) { ?>
                        <div class="admin_user_item">
                            <div class="content_admin_user_item">
                                <p class="data_user_information">
                                    <?= $user['id'] ?>
                                </p>
                                <p class="data_user_information">
                                    <?= $user['name'] ?>

                                </p>
                                <p class="data_user_information">
                                    <?= $user['email'] ?>

                                </p>
                                <p class="data_user_information">
                                    <?
                                    if ($user['role'] == '1') {
                                        echo 'Пользователь';
                                    } else {
                                        if ($user['role'] == '2') {
                                            echo 'Модератор';
                                        }
                                    }
                                    if ($user['role'] == '3') {

                                        echo 'Администратор';
                                    }
                                    ?>

                                </p>
                                <?php
                                if ($user["role"] == 1) { ?>
                                    <a href="?page=admin-user&role=2" class="change_status_order_admin">
                                        Модератор
                                    </a>
                                <? } else { ?>
                                    <a href="?page=admin-user&role=1" class="change_status_order_admin">
                                        Пользователь
                                    </a>
                                <? }
                                ?>
                            </div>
                        </div>
                    <?
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>
</section>

<?php
    
?>