<section class="form_sign_in">
    <div class="container">
        <div class="content_form">
            <h3 class="title_form">
                Войдите в аккаунт
            </h3>
            <form method="POST" class="form_style" name="sign_in">
                <div class="input_label">
                    <label for="name" class="label_style">Введите имя</label>
                    <input type="text" class="input_style" name="name" value="<?= $name ?>" id="name">

                </div>
                
                <div class="input_label">
                    <label for="password" class="label_style">Введите пароль</label>
                    <input type="password" class="input_style" name="password" value="<?= $password ?>" id="password">

                </div>
                
                <button class="form_button_style" type="submit" name="sign_in">
                    Вход
                </button>
            </form>
            <!-- <p class="question_form">
                Забыли пароль? <a href="?page=reset-password"> Восстановить</a>
            </p> -->
        </div>
    </div>
</section>