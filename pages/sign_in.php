<?php
if (isset($_POST["sign_in"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $errors = array();

  if (!checkEmptyLines(array($email, $password))) {
    array_push($errors, "Заполните все поля");
  }
  if (!validateEmail($email)) {
    array_push($errors, "Неккоректный адрес электронной почты");
  }
  if (!validatePassword($password)) {
    array_push($errors, "Пароль должен содержать более 8 символов");
  }
  $hashPassword = md5($password);
  $candidate = checkUserByEmailAndPassword($email, $hashPassword);
  if (!$candidate) {
    array_push($errors, "Пользователя с такой почтой или паролем не существует");
  }
  if (empty($errors)) {
    $uid = $candidate["id"];
    $_SESSION["uid"] = $uid;
    redirect("");
  } else {
    foreach ($errors as $key => $error) {
      echo $error;
    }
  }
}
?>

<section class="form_sign_in">
  <div class="container">
    <div class="content_form">
      <h3 class="title_form">
        Войдите в аккаунт
      </h3>
      <form method="POST" class="form_style" name="sign_in">
        <div class="input_label">
          <label for="email" class="label_style">Введите почту</label>
          <input type="text" class="input_style" name="email" value="<?= $email ?>" id="email">

        </div>

        <div class="input_label">
          <label for="password" class="label_style">Введите пароль</label>
          <input type="password" class="input_style" name="password" value="<?= $password ?>" id="password">

        </div>

        <button class="form_button_style" type="submit" name="sign_in">
          Вход
        </button>
      </form>
      <p class="question_form">
        У вас еще нет аккаунта? <a href="?page=sign-up">Регистрация</a>
      </p>
    </div>
  </div>
</section>