<section class="user_profile">
    <div class="container">
        <div class="content_admin">
            <div class="admin_tabs_list">
                <a href="?page=admin-user" class="tab_item ">
                    Пользователи
                </a>
                <a href="?page=admin-products" class="tab_item active">
                    Товары
                </a>
                <a href="?page=admin-category" class="tab_item">
                    Категории
                </a>
                <a href="?page=admin-orders" class="tab_item ">
                    Заказы
                </a>
            </div>
            <div class="admin_order_content">
                <div class="header_catalog_selected_category">
                    <h2 class="headtitle_style_search">
                        Список товаров
                    </h2>

                    <a href="?page=add-product" class="tab_item active">Добавить товар</a>
                </div>
                <div class="admin_order_list">

                    <div class="header_admin_user_item">
                        <p class="name_product_item">
                            ID
                        </p>
                        <p class="name_product_item">
                            Изображение
                        </p>
                        <p class="name_product_item">
                            Название
                        </p>
                        <p class="name_product_item">
                            Вес
                        </p>
                        <p class="name_product_item">
                            Цена
                        </p>
                        <p class="name_product_item">
                            Редактировать/Удалить
                        </p>
                    </div>
                    <?php
                    $getAllProductsSQL = "SELECT * FROM products";
                    $allProductsResponse = $link->query($getAllProductsSQL);

                    while ($product = $allProductsResponse->fetch_assoc()) { ?>
                        <div class="admin_user_item">
                            <div class="content_admin_user_item">
                                <p class="data_product_information">
                                    <?= $product['id'] ?>
                                </p>
                                <div class="image_product_admin">
                                    <img src="<?= $product['firstImage'] ?>" alt="">
                                </div>
                                <p class="data_product_information">
                                    <?= $product['name'] ?>

                                </p>

                                <p class="data_product_information">
                                    <?= $product['weight'] ?>

                                </p>

                                <p class="data_product_information">
                                    <?= $product['price'] ?> ₽
                                </p>


                                <div class="buttons_admin_delete_edit">
                                    <a href="#">
                                        <img class="edit_buttons" src="../assets/img/icons/edit.svg" alt="">
                                    </a>
                                    <a href="#">
                                        <img class="edit_buttons" src="../assets/img/icons/delete.svg" alt="">
                                    </a>
                                </div>
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