<section class="user_profile">
    <div class="container">
        <div class="content_admin">
            <div class="admin_tabs_list">
                <button class="tab_item active">
                    Пользователи
                </button>
                <button class="tab_item">
                    Товары
                </button>
                <button class="tab_item">
                    Категории
                </button>
                <button class="tab_item">
                    Заказы
                </button>
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
                            <img src="../assets/img/icons/search.svg" alt="">
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

                    <div class="admin_user_item">
                        <div class="content_admin_user_item">
                            <p class="data_user_information">
                                1
                            </p>
                            <p class="data_user_information">
                                Лейсан
                            </p>
                            <p class="data_user_information">
                                leysanf2003@yandex.ru
                            </p>
                            <p class="data_user_information">
                                Пользователь
                            </p>
                            <select name="status" id="status" class="select_style_admin">
                                <option value="0" class="option_style">Собирается</option>
                                <option value="1" class="option_style">Передан курьеру</option>
                                <option value="2" class="option_style">Доставляется</option>
                                <option value="2" class="option_style">Доставлен</option>
                            </select>
                        </div>
                    </div>

                    <div class="admin_user_item">
                        <div class="content_admin_user_item">
                            <p class="data_user_information">
                                1
                            </p>
                            <p class="data_user_information">
                                Лейсан
                            </p>
                            <p class="data_user_information">
                                leysanf2003@yandex.ru
                            </p>
                            <p class="data_user_information">
                                Пользователь
                            </p>
                            <select name="status" id="status" class="select_style_admin">
                                <option value="0" class="option_style">Собирается</option>
                                <option value="1" class="option_style">Передан курьеру</option>
                                <option value="2" class="option_style">Доставляется</option>
                                <option value="2" class="option_style">Доставлен</option>
                            </select>
                        </div>
                    </div>
                    <div class="admin_user_item">
                        <div class="content_admin_user_item">
                            <p class="data_user_information">
                                1
                            </p>
                            <p class="data_user_information">
                                Лейсан
                            </p>
                            <p class="data_user_information">
                                leysanf2003@yandex.ru
                            </p>
                            <p class="data_user_information">
                                Пользователь
                            </p>
                            <select name="status" id="status" class="select_style_admin">
                                <option value="0" class="option_style">Собирается</option>
                                <option value="1" class="option_style">Передан курьеру</option>
                                <option value="2" class="option_style">Доставляется</option>
                                <option value="2" class="option_style">Доставлен</option>
                            </select>
                        </div>
                    </div>
                    <div class="admin_user_item">
                        <div class="content_admin_user_item">
                            <p class="data_user_information">
                                1
                            </p>
                            <p class="data_user_information">
                                Лейсан
                            </p>
                            <p class="data_user_information">
                                leysanf2003@yandex.ru
                            </p>
                            <p class="data_user_information">
                                Пользователь
                            </p>
                            <select name="status" id="status" class="select_style_admin">
                                <option value="0" class="option_style">Собирается</option>
                                <option value="1" class="option_style">Передан курьеру</option>
                                <option value="2" class="option_style">Доставляется</option>
                                <option value="2" class="option_style">Доставлен</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>