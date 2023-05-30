<?php
isAdmin($user["role"]);
?>

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
                <a href="?page=admin-subcategory" class="tab_item">
                    Подкатегорию
                </a>
                <a href="?page=admin-orders" class="tab_item active">
                    Заказы
                </a>
            </div>
            <div class="admin_order_content">
                <h2 class="headtitle_style_search">
                    Список заказов
                </h2>
                <div class="admin_order_list">
                    <?php
                    $getUserOrdersSQL = "SELECT * FROM orders";
                    $userOrdersResponse = $link->query($getUserOrdersSQL);
                    while ($order = $userOrdersResponse->fetch_assoc()) {

                        $orderUserId = $order["userId"];
                        $getUserByIdSQL = "SELECT * FROM users WHERE id = '$orderUserId'";
                        $userResponse = $link->query($getUserByIdSQL);
                        $orderUser = $userResponse->fetch_assoc();

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
                        <div class="admin_order_item">
                            <div class="header_admin_order_item">
                                <p class="user_name_oreder_item">
                                    Пользователь:
                                    <?= $orderUser["email"] ?>
                                </p>
                                <a href="?" class="change_status_order_admin">
                                   Изменить статус
                                </a>
                            </div>
                            <div class="content_admin_order_item">
                                <div class="order_information_user">
                                    <div class="inf">
                                        <p class="title_user_style js-format_date">
                                            <?= $order["date"] ?>
                                        </p>
                                        <div>
                                            <p class="order_text_style">
                                                <?= $order["price"] ?> ₽
                                            </p>
                                            <p class="order_text_style">улица Аделя Кутуя, 110Е</p>
                                        </div>
                                    </div>
                                    <div class="status_value_user">
                                        <?= $textStatus ?>
                                    </div>
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

<script>
    const elements = document.querySelectorAll(".js-format_date");
    [...elements].forEach((element) => {
        const dateString = element.textContent;
        const date = new Date(dateString);
        const formattedDate = date.toLocaleDateString("ru-RU", { day: "2-digit", month: "long" });
        element.textContent = formattedDate;
    })
</script>