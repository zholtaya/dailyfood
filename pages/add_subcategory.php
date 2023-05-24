<section class="form_admin">
    <div class="container">
        <div class="content_form">
            <h3 class="title_form">
                Добавление подкатегории
            </h3>
            <form method="POST" class="form_style" name="add_subcategory">
                <div class="input_label">
                    <label for="category" class="label_style">Выберите категорию</label>
                    <select name="category" id="category" class="select_style">
                        <option value="0" class="option_style">Готовая еда</option>
                        <option value="1" class="option_style">Готовая еда</option>
                        <option value="2" class="option_style">Готовая еда</option>

                    </select>

                </div>

                <div class="input_label">
                    <label for="name" class="label_style">Введите название</label>
                    <input type="text" class="input_style" name="name" value="<?= $name ?>" id="name">

                </div>

                <button class="form_button_style" type="submit" name="add_subcategory">
                    Добавить
                </button>
            </form>

        </div>
    </div>
</section>