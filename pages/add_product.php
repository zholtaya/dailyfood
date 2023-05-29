<section class="form_admin">
  <div class="container">
    <div class="content_form">
      <h3 class="title_form">
        Добавление товара
      </h3>
      <?php

      if (isset($_POST["add_product"])) {
        $name = $_POST["name"];
        $structure = $_POST["structure"];
        $maker = $_POST["maker"];
        $country = $_POST["country"];
        $expDate = $_POST["expDate"];
        $conditions = $_POST["conditions"];
        $calories = $_POST["calories"];
        $proteins = $_POST["proteins"];
        $fats = $_POST["fats"];
        $carb = $_POST["carb"];
        $price = $_POST["price"];
        $weight = $_POST["weight"];
        $category = $_POST["category"];
        $subcategory = $_POST["subcategory"];

        $firstImage = saveUploadedFile($_FILES["firstImage"]);
        $secondImage = saveUploadedFile($_FILES["secondImage"]);
        $thirdImage = saveUploadedFile($_FILES["thirdImage"]);

        $errors = array();

        if (!checkEmptyLines(array($name, $structure, $maker, $country, $expDate, $conditions, $calories, $proteins, $fats, $carb, $price, $weight, $category, $subcategory, $firstImage, $secondImage, $thirdImage))) {
          array_push($errors, "Заполните все поля");
        }

        //todo: add validation

        if (empty($errors)) {
          $createProductSQL = "INSERT INTO products (name, structure, maker, country, expDate, conditions, price, weight, calories, proteins, fats, carb, subcategoryId, firstImage, secondImage, thirdImage) VALUES ('$name', '$structure', '$maker', '$country', '$expDate', '$conditions', '$price', '$weight', '$calories', '$proteins', '$fats', '$carb', '$subcategory', '$firstImage', '$secondImage', '$thirdImage')";
          $link->query($createProductSQL);
        } else {
          echo count($errors);
        }
      }

      ?>
      <form method="POST" class="form_style" name="add_product" enctype="multipart/form-data">
        <div class="input_label">
          <label for="name" class="label_style">Введите название</label>
          <input type="text" class="input_style" name="name" value="<?= $name ?>" id="name">

        </div>
        <div class="input_label">
          <label for="name" class="label_style">Введите состав</label>
          <textarea name="structure" class="input_style" id="structure" cols="20" rows="6"><?= $structure ?></textarea>

        </div>
        <div class="input_label">
          <label for="maker" class="label_style">Введите производителя</label>
          <input type="text" class="input_style" name="maker" value="<?= $maker ?>" id="maker">
        </div>
        <div class="input_label">
          <label for="country" class="label_style">Введите страна производства</label>
          <input type="text" class="input_style" name="country" value="<?= $country ?>" id="country">
        </div>
        <div class="input_label">
          <label for="expDate" class="label_style">Введите срок годности </label>
          <input type="text" class="input_style" name="expDate" value="<?= $expDate ?>" id="expDate">
        </div>
        <div class="input_label">
          <label for="conditions" class="label_style">Введите условия хранения</label>
          <input type="text" class="input_style" name="conditions" value="<?= $conditions ?>" id="conditions">
        </div>
        <div>
          <p class="caloric_value_input">
            На 100 граммов
          </p>
          <div class="input_group">
            <!-- не добавляется 0 -->
            <div class="input_label">
              <label for="calories" class="label_style">Калории</label>
              <input type="text" class="input_style_group" name="calories" value="<?= $calories ?>" id="calories">

            </div>
            <div class="input_label">
              <label for="proteins" class="label_style">Белки</label>
              <input type="proteins" class="input_style_group" name="proteins" value="<?= $proteins ?>" id="proteins">

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
          <label for="weight" class="label_style">Введите вес</label>
          <input type="text" class="input_style" name="weight" value="<?= $weight ?>" id="weight">
        </div>
        <div class="input_label">
          <label for="price" class="label_style">Введите цену</label>
          <input type="number" class="input_style" name="price" value="<?= $price ?>" id="price">
        </div>
        <div class="input_label">
          <label class="label_style">Выберите изображение №1</label>
          <label for="firstImage" class="visible_input">Файл не выбран</label>
          <input type="file" class="input_style_image" name="firstImage" value="<?= $firstImage ?>" id="firstImage">
        </div>
        <div class="input_label">
          <label class="label_style">Выберите изображение №2</label>
          <label for="secondImage" class="visible_input">Файл не выбран</label>
          <input type="file" class="input_style_image" name="secondImage" value="<?= $secondImage ?>" id="secondImage">
        </div>
        <div class="input_label">
          <label class="label_style">Выберите изображение №3</label>
          <label for="thirdImage" class="visible_input">Файл не выбран</label>
          <input type="file" class="input_style_image" name="thirdImage" value="<?= $thirdImage ?>" id="thirdImage">
        </div>
        <div class="input_label">
          <label for="category" class="label_style">Выберите категорию</label>
          <select name="category" id="category" class="select_style addProductCategory">
            <?php
            $getAllCategoriesSQL = "SELECT * FROM categories";
            $allCategoriesResponse = $link->query($getAllCategoriesSQL);

            while ($category = $allCategoriesResponse->fetch_assoc()) { ?>
            <option value="<?= $category["id"] ?>" class="option_style"><?= $category["title"] ?></option>
            <? }
            ?>
          </select>

        </div>
        <!-- не выводятся подкатегории по дефолту -->
        <div class="input_label">
          <label for="subcategory" class="label_style">Выберите подкатегорию</label>
          <select name="subcategory" id="subcategory" class="select_style">
            <?php
            $getAllCategoriesSQL = "SELECT * FROM subcategories WHERE categoryId = '$categoryId'";
            $allCategoriesResponse = $link->query($getAllCategoriesSQL);

            while ($category = $allCategoriesResponse->fetch_assoc()) { ?>
            <option value="<?= $category["id"] ?>" class="option_style"><?= $category["title"] ?></option>
            <? }
            ?>
          </select>

        </div>
        <button class="form_button_style" type="submit" name="add_product">
          Добавить
        </button>
      </form>

    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('category').addEventListener('change', function() {
    const categoryId = this.value;

    const subcategorySelect = document.getElementById('subcategory');
    subcategorySelect.innerHTML = '';

    fetch('actions/get_subcategories.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'category_id=' + encodeURIComponent(categoryId)
      })
      .then(function(response) {
        if (response.ok) {
          return response.text();
        } else {
          throw new Error('Request failed. Error: ' + response.status);
        }
      })
      .then(function(responseText) {
        if (!responseText) {
          subcategorySelect.innerHTML = `<option value="0">В данной категории нет подкатегорий</option>`;
        } else {
          subcategorySelect.innerHTML = responseText;
        }
      })
      .catch(function(error) {
        console.error(error);
      });
  });
});
</script>
