<section class="form_sign_in">
    <div class="container">
        <div class="content_form">
            <h3 class="title_form">
                Для работы с сервисом необходимо зарегистрироваться
            </h3>
            <form method="POST" class="form_style" name="sign_up">
                <div class="input_label">
                    <label for="name" class="label_style">Введите имя</label>
                    <input type="text" class="input_style" name="name" value="<?= $name ?>" id="name">

                </div>
                 <div class="input_label">
                    <label for="email" class="label_style">Введите почту</label>
                    <input type="email" class="input_style" name="email" value="<?= $email ?>" id="email">

                </div>
                 <div class="input_label">
                    <label for="password" class="label_style">Введите пароль</label>
                    <input type="password" class="input_style" name="password" value="<?= $password ?>" id="password">
                
                </div>
                 <div class="input_label">
                    <label for="renewed_password" class="label_style">Подтвердите пароль</label>
                    <input type="renewed_password" class="input_style" name="renewed_password" value="<?= $renewed_password ?>" id="renewed_password">
                
                </div>
                <button class="form_button_style" type="submit" name="sign_up">
                    Регистрация
                </button>
            </form>
            <p class="question_form">
                Вы уже зарегистрированы? <a href="?page=sign-in"> Войдите</a>
            </p>
        </div>
    </div>
</section>