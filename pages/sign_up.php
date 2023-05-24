<?php
if (isset($_POST["sign_up"])) {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $renewed_password = $_POST["renewed_password"];

  $errors = array();

  if (!checkEmptyLines(array($name, $email, $password, $renewed_password))) {
    array_push($errors, "Заполните все поля");
  }
  if ($password != $renewed_password) {
    array_push($errors, "Пароли не совпадают");
  }
  if (!validateEmail($email)) {
    array_push($errors, "Неккоректный адрес электронной почты");
  }
  if (!validatePassword($password)) {
    array_push($errors, "Пароль должен содержать более 8 символов");
  }
  $candidate = checkUserByEmail($email);
  if ($candidate) {
    array_push($errors, "Пользователь с такой почтой уже существует");
  }

  if (empty($errors)) {
    $hashPassword = md5($password);
    $createUserSQL = "INSERT INTO users (name, email, password, address, role) VALUES ('$name', '$email', '$password', 'Не указан', 1)";
    $link->query($createUserSQL);

    $getCurrentUserSQL = "SELECT * FROM users WHERE email = '$email' AND password = '$hashPassword'";
    $currentUserResponse = $link->query($getCurrentUserSQL);
    $user = $currentUserResponse->fetch_assoc();
    $uid = $user["id"];
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
        <button class="form_button_style" name="sign_up">
          Регистрация
        </button>
      </form>
      <p class="question_form">
        Вы уже зарегистрированы? <a href="?page=sign-in"> Войдите</a>
      </p>
    </div>
  </div>
</section>