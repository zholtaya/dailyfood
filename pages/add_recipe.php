<?php
if (isset($_POST["add-recipe"])) {
  $title = $_POST["name"];
  $description = $_POST["description"];
}
?>


<section class="form_admin">
  <div class="container">
    <div class="content_form">
      <h3 class="title_form">
        Добавление рецепта
      </h3>
      <form method="POST" class="form_style" name="add-recipe">
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
          <label for="searchProducts" class="label_style">Выберите ингридиенты</label>
          <input type="text" class="input_style" name="searchProducts" id="search">
          <input type="hidden" id="selectedProductId">
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
            <option value="0" class="option_style">Легкая</option>
            <option value="1" class="option_style">Средняя</option>
            <option value="2" class="option_style">Сложная</option>

          </select>

        </div>
        <div class="input_label">
          <label for="name" class="label_style">Введите шаг</label>
          <textarea name="structure" class="input_style" id="structure" cols="20" rows="6"></textarea>
          <button class="add_step_link">
            Добавить шаг
            <img src="../assets/img/icons/plus.svg" alt="">
          </button>
        </div>
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
const searchInput = document.getElementById("search");
const addedProductsContainer = document.querySelector(".added_products");
const dropdown = document.getElementById("products-dropdown");

function searchProducts() {
  dropdown.style.display = "flex";
  dropdown.innerHTML = "";

  fetch(`actions/search_products.php?search=${searchInput.value}`)
    .then(function(response) {
      if (response.ok) {
        return response.json();
      } else {
        throw new Error("AJAX request failed. Status: " + response.status);
      }
    })
    .then(function(products) {
      products.forEach(function(product) {
        const option = document.createElement("div");
        option.innerHTML = product.name;
        option.classList.add("products-dropdown-item")
        option.addEventListener("click", function() {
          document.getElementById("selectedProductId").value += `${product.id};`;
          document.getElementById("search").value = product.name;
          createNewProductBlock(product.id, product.name, product.firstImage);
        });
        dropdown.appendChild(option);
      });
    })
    .catch(function(error) {
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
