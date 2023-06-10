<?php
if (isset($_POST["add-recipe"])) {
  $title = $_POST["name"];
  $description = $_POST["description"];
  $time = $_POST["time"];
  $weight = $_POST["weight"];

  $selectedProductId = $_POST["selectedProductId"];
  $calories = $_POST["calories"];
  $proteins = $_POST["proteins"];
  $fats = $_POST["fats"];
  $carb = $_POST["carb"];
  $complexity = $_POST["complexity"];
  $step1 = $_POST["step1"];
  $step2 = $_POST["step2"];
  $step3 = $_POST["step3"];
  $step4 = $_POST["step4"];
  $step5 = $_POST["step5"];
  $step6 = $_POST["step6"];

  $banner = saveUploadedFile($_FILES["image"]);

  $errors = array();

  if (!checkEmptyLines(array($title, $description, $time, $weight, $selectedProductId, $calories, $proteins, $fats, $carb, $complexity, $step1))) {
    array_push($errors, "Заполните все поля");
  }

  if (empty($errors)) {
    $createNewRecipeSQL = "INSERT INTO recipes (title, description, weight, calories, proteins, fats, carb, banner, complexity, time, status, step1, step2, step3, step4, step5, step6) VALUES ('$title', '$description', '$weight', '$calories', '$proteins', '$fats', '$carb', '$banner', '$complexity', '$time', '1', '$step1', '$step2', '$step3', '$step4', '$step5', '$step6')";
    $link->query($createNewRecipeSQL);

    $newRecipeId = $link->insert_id;

    $recipeProducts = explode(";", $selectedProductId);

    if (is_array($recipeProducts)) {
      foreach ($recipeProducts as $number) {
        $number = trim($number);
        $addRecipeProductSQL = "INSERT INTO recipe_products (recipeId, productId) VALUES ('$newRecipeId', '$number')";
        $link->query($addRecipeProductSQL);
      }
    }

    showSuccessNotification("Рецепт успешно отправлен на рассмотрение");
  } else {
    showErrorNotifications($errors);
  }
}
?>


<section class="form_admin">
  <div class="container">
    <div class="content_form">
      <h3 class="title_form">
        Добавление рецепта
      </h3>
      <form method="POST" class="form_style" name="add-recipe" enctype="multipart/form-data">
        <div class="input_label">
          <label for="name" class="label_style">Введите название</label>
          <input type="text" class="input_style" name="name" value="<?= $title ?>" id="name">

        </div>
        <div class="input_label">
          <label for="description" class="label_style">Введите описание</label>
          <textarea name="description" class="input_style" id="description" cols="20" rows="6"></textarea>
        </div>
        <div class="input_label">
          <label for="time" class="label_style">Введите время приготовления (в минутах)</label>
          <input type="number" class="input_style" name="time" value="<?= $time ?>" id="time">
        </div>
        <div class="input_label">
          <label for="weight" class="label_style">Введите вес готового блюда</label>
          <input type="number" class="input_style" name="weight" value="<?= $weight ?>" id="weight">
        </div>
        <div class="input_label">
          <label for="searchProducts" class="label_style">Выберите ингридиенты</label>
          <input type="text" class="input_style" name="searchProducts" id="search">
          <input type="hidden" name="selectedProductId" id="selectedProductId">
          <div id="products-dropdown"></div>
        </div>
        <div class="input_group added_products"></div>
        <div>
          <p class="caloric_value_input">
            На 100 граммов
          </p>
          <div class="input_group">

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
          <label for="complexity" class="label_style">Выберите сложность</label>
          <select name="complexity" id="complexity" class="select_style">
            <option value="1" class="option_style">Легкая</option>
            <option value="2" class="option_style">Средняя</option>
            <option value="3" class="option_style">Сложная</option>

          </select>

        </div>
        <div id="stepsContainer">
          <div class="input_label">
            <label for="step1" class="label_style">Введите шаг</label>
            <textarea name="step1" class="input_style" id="step1" cols="20" rows="6"></textarea>
          </div>
        </div>
        <button class="add_step_link">
          Добавить шаг
          <img src="./assets/img/icons/plus.svg" alt="">
        </button>
        <div class="input_label">
          <label class="label_style">Выберите изображение</label>
          <label for="image" class="visible_input">Файл не выбран</label>
          <input type="file" class="input_style_image" name="image" value="<?= $image ?>" id="image">
        </div>
        <button class="form_button_style" type="submit" name="add-recipe">
          Добавить
        </button>
      </form>

    </div>
  </div>
</section>

<script>
  const stepsContainerElement = document.getElementById("stepsContainer");
  const addStepButton = document.querySelector(".add_step_link");
  let counter = 1;

  addStepButton.addEventListener("click", (event) => {
    event.preventDefault();
    if (counter < 6) {
      counter++;
      stepsContainerElement.insertAdjacentHTML("beforeend", `<div class="input_label">
            <label for="step${counter}" class="label_style">Введите шаг</label>
            <textarea name="step${counter}" class="input_style" id="step${counter}" cols="20" rows="6"></textarea>
          </div>`);
    } else {
      addStepButton.style.display = "none";
    }
  })
</script>

<script>
  const searchInput = document.getElementById("search");
  const addedProductsContainer = document.querySelector(".added_products");
  const dropdown = document.getElementById("products-dropdown");

  function searchProducts() {
    dropdown.style.display = "flex";
    dropdown.innerHTML = "";

    fetch(`actions/search_products.php?search=${searchInput.value}`)
      .then(function (response) {
        if (response.ok) {
          return response.json();
        } else {
          throw new Error("AJAX request failed. Status: " + response.status);
        }
      })
      .then(function (products) {
        products.forEach(function (product) {
          const option = document.createElement("div");
          option.innerHTML = product.name;
          option.classList.add("products-dropdown-item")
          option.addEventListener("click", function () {
            document.getElementById("selectedProductId").value += `${product.id};`;
            document.getElementById("search").value = product.name;
            createNewProductBlock(product.id, product.name, product.firstImage);
          });
          dropdown.appendChild(option);
        });
      })
      .catch(function (error) {
        console.log(error);
      });
  }

  function createNewProductBlock(id, name, image) {
    addedProductsContainer.innerHTML += `<a href="?page=product&id=${id}" class="added-product" target="_blank">
    <img src=${image} alt=${name} />
    <span>${name}</span>
  </a>`;
  }

  function hideDrowdownElement() {
    dropdown.style.display = "none";
  }

  hideDrowdownElement();

  searchInput.addEventListener("input", () => {
    if (searchInput.value == "") {
      hideDrowdownElement();
    } else {
      searchProducts();
    }
  })
</script>