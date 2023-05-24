<section class="form_admin">
    <div class="container">
        <div class="content_form">
            <h3 class="title_form">
                Добавление товара
            </h3>
            <form method="POST" class="form_style" name="add_product">
                <div class="input_label">
                    <label for="name" class="label_style">Введите название</label>
                    <input type="text" class="input_style" name="name" value="<?= $name ?>" id="name">

                </div>
                <div class="input_label">
                    <label for="name" class="label_style">Введите состав</label>
                    <textarea name="structure" class="input_style" id="structure" cols="20" rows="6"></textarea>

                </div>
                <div class="input_label">
                    <label for="maker" class="label_style">Введите производителя</label>
                    <input type="text" class="input_style" name="maker" value="<?= $maker ?>" id="maker">

                </div>
                <div class="input_label">
                    <label for="country" class="label_style">Введите страна производства</label>
                    <input type="country" class="input_style" name="country" value="<?= $country ?>" id="country">

                </div>

                <div class="input_label">
                    <label for="password" class="label_style">Введите срок годности </label>
                    <input type="password" class="input_style" name="password" value="<?= $password ?>" id="password">

                </div>
                <div class="input_label">
                    <label for="password" class="label_style">Введите условия хранения</label>
                    <input type="password" class="input_style" name="password" value="<?= $password ?>" id="password">

                </div>
                <div>
                    <p class="caloric_value_input">
                        На 100 граммов
                    </p>
                    <div class="input_group">

                        <div class="input_label">
                            <label for="calories" class="label_style">Калории</label>
                            <input type="text" class="input_style_group" name="calories" value="<?= $calories ?>"
                                id="calories">

                        </div>
                        <div class="input_label">
                            <label for="proteins" class="label_style">Белки</label>
                            <input type="proteins" class="input_style_group" name="proteins" value="<?= $proteins ?>"
                                id="proteins">

                        </div>
                        <div class="input_label">
                            <label for="fats" class="label_style">Жиры</label>
                            <input type="fats" class="input_style_group" name="fats" value="<?= $fats ?>" id="fats">

                        </div>
                        <div class="input_label">
                            <label for="carb" class="label_style">Углеводы</label>
                            <input type="carb" class="input_style_group" name="carb" value="<?= $carb ?>" id="carb">

                        </div>
                    </div>
                </div>
                <div class="input_label">
                    <label class="label_style">Выберите изображение</label>
                    <label for="image" class="visible_input">Файл не выбран</label>
                    <input type="file" class="input_style_image" name="image" value="<?= $image ?>" id="image">

                </div>
                <div class="input_label">
                    <label for="category" class="label_style">Выберите категорию</label>
                    <select name="category" id="category" class="select_style">
                        <option value="0" class="option_style">Готовая еда</option>
                        <option value="1" class="option_style">Готовая еда</option>
                        <option value="2" class="option_style">Готовая еда</option>

                    </select>

                </div>
                <div class="input_label">
                    <label for="subcategory" class="label_style">Выберите подкатегорию</label>
                    <select name="subcategory" id="subcategory" class="select_style">
                        <option value="0" class="option_style">Супы</option>
                        <option value="1" class="option_style">Супы</option>
                        <option value="2" class="option_style">Готовая еда</option>

                    </select>

                </div>
                <button class="form_button_style" type="submit" name="add_product">
                    Добавить
                </button>
            </form>

        </div>
    </div>
</section>