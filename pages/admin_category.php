<section class="user_profile">
    <div class="container">
        <div class="content_admin">
            <div class="admin_tabs_list">
                <button class="tab_item">
                    Пользователи
                </button>
                <button class="tab_item ">
                    Товары
                </button>
                <button class="tab_item active ">
                    Категории
                </button>
                <button class="tab_item">
                    Заказы
                </button>

            </div>
            <div class="admin_order_content">
                <div class="header_catalog_selected_category">
                    <h2 class="headtitle_style_search">
                        Список категорий
                    </h2>

                    <a href="?page=add-category" class="tab_item active">Добавить категорию</a>
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
                            Подкатегория
                        </p>

                        <p class="name_category_item">
                            Редактировать/Удалить
                        </p>
                    </div>
                    <?php
                    $getAllCategoriesSQL = "SELECT * FROM categories";
                    $allCategoriesResponse = $link->query($getAllCategoriesSQL);

                    while ($category = $allCategoriesResponse->fetch_assoc()) {

                        ?>
                        <div class="admin_user_item">
                            <div class="content_admin_user_item">
                                <p class="data_user_information">
                                    <?= $category['id'] ?>

                                </p>
                                <p class="data_category_information">
                                    <?= $category['title'] ?>

                                </p>

                                <div class="category_list_admin">

                                    <div class="category_item_hidden" id="subcategoriesAccordion">
                                        <?
                                        $categoryId = $category['id'];
                                        $getAllSubcategoriesSQL = "SELECT * FROM subcategories WHERE categoryId = '$categoryId'";
                                        $allSubcategoriesResponse = $link->query($getAllSubcategoriesSQL);
                                        while ($subcategory = $allSubcategoriesResponse->fetch_assoc()) {

                                            ?>
                                            <p class="data_category_information">
                                                <?= $subcategory['title'] ?>
                                            </p>
                                        <? }

                                        ?>
                                    </div>
                                    <button class="data_category_information" id="subcategory-accordion-button">
                                        Показать все
                                    </button>
                                </div>

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