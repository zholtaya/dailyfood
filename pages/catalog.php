<?

if (!$user) {
  redirect("page=sign-in");
}
?>

<section class="catalog_selected_category">
  <div class="container">
    <div class="header_some_pages">

      <?
      if (isset($_GET["categoryId"])) {
        $categoryId = $_GET["categoryId"];

        $getCategoryIdSQL = "SELECT * FROM categories WHERE id = '$categoryId' LIMIT 1";
        $categoryResponse = $link->query($getCategoryIdSQL);

        $category = $categoryResponse->fetch_assoc();
      }

      ?>

      <h2 class="headtitle_style_search">
        <?= $category["title"] ?>
      </h2>

      <form name="search" method="POST" class="form_search">
        <input id="catalog_search" type="text" class="input_style" name="search_name" value="<?= $search_name ?>" placeholder="Поиск...">
        <button class="search_button">
          <img src="./assets/img/icons/search.svg" alt="">
        </button>
      </form>
    </div>
    <div class="content_catalog_selected">
      <div class="category_list">
        <?php
        $categoryId = $_GET["categoryId"];
        $getSubcategoriesSQL = "SELECT * FROM subcategories WHERE categoryId = '$categoryId'";
        $subcategoriesResponse = $link->query($getSubcategoriesSQL);

        while ($subcategory = $subcategoriesResponse->fetch_assoc()) { ?>
          <a href="?page=catalog&categoryId=<?= $categoryId ?>&subcategoryId=<?= $subcategory["id"] ?>" class="<?= $subcategory["id"] === $_GET["subcategoryId"] ? "category_list_item active" : "category_list_item" ?>">
            <?= $subcategory["title"] ?>
          </a>
        <? }
        ?>
      </div>

      <div class="catalog_products_list">
        <?php
        $subcategoryId = $_GET["subcategoryId"];

        $getProductsBySubcategorySQL = "SELECT * FROM products WHERE subcategoryId = '$subcategoryId'";
        $productsResponse = $link->query($getProductsBySubcategorySQL);

        while ($product = $productsResponse->fetch_assoc()) { ?>
          <div id="catalog_product" class="product_item">
            <a href="?page=product&id=<?= $product["id"] ?>">
              <img src="<?= $product["firstImage"] ?>" alt="product_image" class="product_item_image">
            </a>
            <div class="information_product_item">
              <div class="wrapper_product_item">
                <p class="name_product">
                  <?= $product["name"] ?>
                </p>
                <p class="weight_product">
                  <?= $product["weight"] ?>
                </p>
              </div>
              <div class="wrapper_product_item">
                <p class="caloric_value_product_item">
                  На 100г
                </p>
                <button class="open_button">Подробнее</button>
              </div>
              <div class="product-acc">
                <div class="product-acc-item">
                  <span>Ккал - </span>
                  <span><?= $product["calories"] ?></span>
                </div>
                <div class="product-acc-item">
                  <span>Белки - </span>
                  <span><?= $product["proteins"] ?></span>
                </div>
                <div class="product-acc-item">
                  <span>Жиры - </span>
                  <span><?= $product["fats"] ?></span>
                </div>
                <div class="product-acc-item">
                  <span>Углеводы - </span>
                  <span><?= $product["carb"] ?></span>
                </div>
              </div>
            </div>
            <div class="catalog_product-btns">
              <button class="button_product_item">
                <?= $product["price"] ?> ₽
              </button>
              <div id="counterContainer" class="counter-container none">
                <input class="cartProductId" type="hidden" value="<?= $product["id"] ?>" />
                <button class="counter-container-minus">-</button>
                <span>1</span>
                <button class="counter-container-plus">+</button>
              </div>
            </div>
          </div>
        <? }
        ?>
      </div>
    </div>
  </div>
</section>

<script>
  class Accordion {
    constructor(container) {
      this.container = container;
      this.container.classList.add("accordionContainer");
      this.isOpen = false;
      this.transitionDuration = "0.3s";
      this.transitionTimingFunction = "ease";
    }

    toggle() {
      if (this.isOpen) {
        this.container.style.transition = `max-height ${this.transitionDuration} ${this.transitionTimingFunction}`;
        this.container.style.maxHeight = "0";
        this.isOpen = false;
      } else {
        this.container.style.transition = `max-height ${this.transitionDuration} ${this.transitionTimingFunction}`;
        this.container.style.maxHeight = `${this.container.scrollHeight}px`;
        this.isOpen = true;
      }
    }

    getIsOpen() {
      return this.isOpen;
    }
  }

  const productsArray = document.querySelectorAll(".product_item");

  productsArray.forEach((element) => {
    const container = element.querySelector(".product-acc");
    const productAccordion = new Accordion(container);
    const productAccordionButton = element.querySelector(".open_button");
    console.log(productAccordionButton);

    productAccordionButton.addEventListener("click", () => {
      productAccordion.toggle();
      if (productAccordion.getIsOpen()) {
        productAccordionButton.textContent = "Скрыть";
      } else {
        productAccordionButton.textContent =
          "Подробнее";
      }
    });
  });
</script>

<script src="js/catalogSearch.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", () => {
    const search = new ElementSearch(
      "#catalog_search",
      ".catalog_products_list",
      "#catalog_product",
      ".information_product_item .wrapper_product_item .name_product"
    );
  });
</script>
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
        return response.json();
      })
      .finally(() => {
        if (type === "decrement") {
          new PushNotification("Товар удален из корзины", "error").show();
        } else {
          new PushNotification("Товар добавлен в корзину", "success").show();
        }
      })
      .catch((error) => {
        console.log(error);
      })
  };
</script>