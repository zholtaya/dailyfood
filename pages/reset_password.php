<section class="form_sign_in">
    <div class="container">
        <div class="content_form">
            <h3 class="title_form">
                Восстановление пароля
            </h3>
            <p class="description_form">
                Введите почту, указанную при регистрации, на которую Вам будет отправлено письмо с кодом для смены пароля
            </p>
            <form method="POST" class="form_style" name="reset_password">
                <div class="input_label">
                    <label for="email" class="label_style">Введите почту</label>
                    <input type="email" class="input_style" name="email" value="<?= $email ?>" id="email">

                </div>

                <button class="form_button_style" type="submit" name="reset_password">
                    Отправить письмо
                </button>
            </form>
            
        </div>
    </div>
</section>