<?php
isAdmin($user["role"]);
?>

<?php
if (isset($_POST["add_subcategory"])) {
  $title = $_POST["name"];
  $categoryId = $_POST["category"];

  $errors = array();

  if (!checkEmptyLines(array($title, $categoryId))) {
    array_push($errors, "Заполните все поля");
  }

  if (empty($errors)) {
    $createSubcategorySQL = "INSERT INTO subcategories (title, categoryId) VALUES ('$title', '$categoryId')";
    $link->query($createSubcategorySQL);
  }
}
?>

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
            <?php
            $getAllCategoriesSQL = "SELECT * FROM categories";
            $allCategoriesResponse = $link->query($getAllCategoriesSQL);

            while ($category = $allCategoriesResponse->fetch_assoc()) { ?>
              <option value="<?= $category["id"] ?>" class="option_style"><?= $category["title"] ?></option>
            <? }
            ?>
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