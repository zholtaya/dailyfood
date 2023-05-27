<section class="catalog_selected_category">
  <div class="container">
    <div class="header_catalog_selected_category">
      <h2 class="headtitle_style_search">
        Готовая еда
      </h2>

      <form name="search" method="POST" class="form_search">
        <input type="text" class="input_style" name="search_name" value="<?= $search_name ?>" placeholder="Поиск...">
        <button class="search_button">
          <img src="../assets/img/icons/search.svg" alt="">
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
          <div class="product_item">
            <a href="?page=product&id=<?= $product["id"] ?>">
              <img src="<?= $product["firstImage"] ?>" alt="product_image" class="product_item_image">
            </a>
            <div class="information_product_item">
              <div class="wrapper_product_item">
                <p class="name_product">
                  Поке с лососем
                </p>
                <p class="weight_product">
                  320г
                </p>
              </div>
              <div class="wrapper_product_item">
                <p class="caloric_value_product_item">
                  На 100г
                </p>
                <a href="#" class="open_button">Подробнее</a>
              </div>
            </div>
            <a href="#" class="button_product_item">
              340 ₽
            </a>
          </div>
        <? }
        ?>
      </div>
    </div>
  </div>
</section>