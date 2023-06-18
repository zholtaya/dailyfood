<?

if (!$user) {
  redirect("page=sign-in");
}
?>

<?php

if (isset($_GET["id"])) {
  $productId = $_GET["id"];

  $getProductByIdSQL = "SELECT * FROM products WHERE id = '$productId' LIMIT 1";
  $productResponse = $link->query($getProductByIdSQL);
  $product = $productResponse->fetch_assoc();
} else {
  redirect("");
} ?>

<section class="one_product">
  <div class="container">
    <h2 class="headtitle_style">
      <?= $product["name"] ?>
    </h2>
    <div class="content_one_product">
      <div class="slider_wrapper">
        <div class="product__images">
          <div class="product-image-wrapper">
            <img src="<?= $product["firstImage"] ?>" alt="<?= $product["name"] ?>" class="product-mini-img">
          </div>
          <div class="product-image-wrapper">
            <img src="<?= $product["secondImage"] ?>" alt="<?= $product["name"] ?>" class="product-mini-img">
          </div>
        </div>
        <div class="product-image-wrapper-big">
          <img src="<?= $product["firstImage"] ?>" class="product-big-image" alt="<?= $product["name"] ?>">
        </div>
      </div>
      <div class="description_one_product">
        <div class="caloric_value_one_product">
          <p class="caloric_value_name">На 100 граммов</p>
          <div class="caloric_value_data_list">
            <div class="caloric_value_data_item">
              <p class="caloric_value_number_data">
                <?= $product["calories"] ?>
              </p>
              <p class="caloric_value_name_data">Ккал</p>
            </div>
            <div class="caloric_value_data_item">
              <p class="caloric_value_number_data">
                <?= $product["proteins"] ?>
              </p>
              <p class="caloric_value_name_data">Белки</p>
            </div>
            <div class="caloric_value_data_item">
              <p class="caloric_value_number_data">
                <?= $product["fats"] ?>
              </p>
              <p class="caloric_value_name_data">Жиры</p>
            </div>
            <div class="caloric_value_data_item">
              <p class="caloric_value_number_data">
                <?= $product["carb"] ?>
              </p>
              <p class="caloric_value_name_data">Углеводы</p>
            </div>
          </div>
          <div class="specifications_item">
            <p class="specifications_item_name">Состав</p>
            <p class="specifications_item_description">
              <?= $product["structure"] ?>
            </p>
          </div>
        </div>

        <div class="specifications_one_product_list" id="productAccordion">
          <div class="specifications_item">
            <p class="specifications_item_name">Производитель, страна</p>
            <p class="specifications_item_description">
              <?= $product["maker"] ?>,
              <?= $product["country"] ?>
            </p>
          </div>
          <div class="specifications_item">
            <p class="specifications_item_name">Условия хранения, срок годности</p>
            <p class="specifications_item_description">
              <?= $product["conditions"] ?>,
              <?= $product["expDate"] ?>
            </p>
          </div>
          <div class="specifications_item">
            <p class="specifications_item_name">Вес</p>
            <p class="specifications_item_description">
              <?= $product["weight"] ?>
            </p>
          </div>
        </div>
        <button id="product-accordion-button" class="hide_show_button_one_product">
          Показать подробную информацию
        </button>
        <div class="one_product_item_price">
          <?= $product["price"] ?>
          ₽
        </div>
        <div class="catalog_product-btns">
          <button class="button_product_item">
            В корзину
          </button>
          <div id="counterContainer" class="counter-container counter-in-product none">
            <input class="cartProductId" type="hidden" value="<?= $product["id"] ?>" />
            <button class="counter-container-minus">-</button>
            <span>1</span>
            <button class="counter-container-plus">+</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="js/productImagesTabs.js"></script>
<script>
  const countersContainers = document.querySelectorAll(".counter-container");
  const btnWithPriceElements = document.querySelectorAll(".button_product_item");

  const increment = (currentContainer, productId) => {
    if (currentContainer.classList.contains("disable-counter")) {
      currentContainer.classList.remove("disable-counter");
    }
    const currentCounterSpan = currentContainer.querySelector("span");
    const prevValue = Number(currentCounterSpan.textContent);
    currentCounterSpan.textContent = `${prevValue + 1}`;
    updateProductQuantity(productId, "increment")
  }

  const decrement = (currentContainer, productId) => {
    const currentCounterSpan = currentContainer.querySelector("span");
    const prevValue = Number(currentCounterSpan.textContent);
    if (prevValue == 1) {
      currentContainer.classList.add("disable-counter");
    } else {
      currentCounterSpan.textContent = `${prevValue - 1}`;
      updateProductQuantity(productId, "decrement")
    }
  }

  btnWithPriceElements.forEach((element, index) => {
    element.addEventListener("click", () => {
      element.classList.add("none");
      countersContainers[index].classList.remove("none");

      const productId = countersContainers[index].querySelector(".cartProductId").value;

      updateProductQuantity(productId, "new");

      const minusBtnElement = countersContainers[index].querySelector(".counter-container-minus");
      const plusBtnElement = countersContainers[index].querySelector(".counter-container-plus");

      plusBtnElement.addEventListener("click", () => {
        increment(countersContainers[index], productId);
      });

      minusBtnElement.addEventListener("click", () => {
        decrement(countersContainers[index], productId);
      })
    });
  });

  const updateProductQuantity = (productId, type) => {
    // type === increment || decrement || new
    return fetch(`actions/update-quantity.php?product_id=${productId}&type=${type}`)
      .then((response) => {
        console.log(response);
        return response.json();
      })
      .then((data) => {
        console.log(data);
      })
      .catch((error) => {
        console.log(error);
      })
  };
</script>