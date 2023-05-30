<?php
isAdmin($user["role"]);
?>

<?php

if (isset($_POST["add_category"])) {
  $name = $_POST["name"];
  $image_path = saveUploadedFile($_FILES["img"]);

  $errors = array();

  if (!checkEmptyLines(array($name))) {
    array_push($errors, "Заполните все поля");
  }

  if (empty($errors)) {
    $createCategorySQL = "INSERT INTO categories (title, img) VALUES ('$name', '$image_path')";
    $link->query($createCategorySQL);
  }
}
?>

<section class="form_admin">
  <div class="container">
    <div class="content_form">
      <h3 class="title_form">
        Добавление категории
      </h3>
      <form method="POST" class="form_style" name="add_category" enctype="multipart/form-data">
        <div class="input_label">
          <label for="name" class="label_style">Введите название</label>
          <input type="text" class="input_style" name="name" value="<?= $name ?>" id="name">

        </div>

        <div class="input_label">
          <label class="label_style">Выберите изображение</label>
          <label for="img" class="visible_input">
            <?php
            $labelText = ($image_name) ? $image_name : "Файл не выбран";
            echo $labelText;
            ?>
          </label>
          <input type="file" class="input_style_image" name="img" id="img">

        </div>

        <button class="form_button_style" type="submit" name="add_category">
          Добавить
        </button>
      </form>

    </div>
  </div>
</section>