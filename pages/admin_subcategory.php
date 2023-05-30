<section class="user_profile">
    <div class="container">
        <div class="content_admin">
            <div class="admin_tabs_list">
                <a href="?page=admin-user" class="tab_item">
                    Пользователи
                </a>
                <a href="?page=admin-products" class="tab_item">
                    Товары
                </a>
                <a href="?page=admin-subcategory" class="tab_item active">
                    Подкатегории
                </a>
                <a href="?page=admin-orders" class="tab_item ">
                    Заказы
                </a>
                <!-- <a href="?page=add-category" class="tab_item active">
                    Добавить категорию
                </a> -->
            </div>
            <div class="admin_order_content">
                <div class="header_catalog_selected_category">
                    <h2 class="headtitle_style_search">
                        Список подкатегорий
                    </h2>

                    <a href="?page=add-subcategory" class="tab_item active">Добавить подкатегорию</a>
                </div>
                <div class="admin_order_list">

                    <div class="header_admin_user_item">
                        <p class="name_order_item">
                            ID
                        </p>
                        <p class="name_category_item">
                            Название
                        </p>
                        <p class="name_category_item">
                            Категория
                        </p>

                        <p class="name_category_item">
                            Редактировать/Удалить
                        </p>
                    </div>
                    <?php
                    $getAllSubcategoriesSQL = "SELECT * FROM subcategories";
                    $allSubcategoriesResponse = $link->query($getAllSubcategoriesSQL);

                    while ($subcategory = $allSubcategoriesResponse->fetch_assoc()) {

                        ?>
                        <div class="admin_user_item">
                            <div class="content_admin_user_item">
                                <p class="data_user_information">
                                    <?= $subcategory['id'] ?>

                                </p>
                                <p class="data_category_information">
                                    <?= $subcategory['title'] ?>

                                </p>
                                <?

                                $categoryId = $subcategory['categoryId'];
                                $getCategorySQL = "SELECT * FROM categories WHERE id = '$categoryId'";
                                $allCategoryResponse = $link->query($getCategorySQL);
                                $category = $allCategoryResponse->fetch_assoc();

                                ?>
                                <p class="data_category_information">
                                    <?= $category['title'] ?>
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