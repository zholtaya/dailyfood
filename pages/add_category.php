<section class="form_admin">
    <div class="container">
        <div class="content_form">
            <h3 class="title_form">
                Добавление категории
            </h3>
            <form method="POST" class="form_style" name="add_category">
                <div class="input_label">
                    <label for="name" class="label_style">Введите название</label>
                    <input type="text" class="input_style" name="name" value="<?= $name ?>" id="name">

                </div>

                <div class="input_label">
                    <label class="label_style">Выберите изображение</label>
                    <label for="image" class="visible_input">Файл не выбран</label>
                    <input type="file" class="input_style_image" name="image" value="<?= $image ?>" id="image">

                </div>

                <button class="form_button_style" type="submit" name="add_category">
                    Добавить
                </button>
            </form>
            
        </div>
    </div>
</section>