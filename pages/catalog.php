<section class="catalog_selected_category">
  <div class="container">
    <div class="header_catalog_selected_category">

      <?
      if (isset($_GET["categoryId"])) {
        $categoryId = $_GET["categoryId"];

        $getCategoryIdSQL = "SELECT * FROM categories WHERE id = '$categoryId' LIMIT 1";
        $categoryResponse = $link->query($getCategoryIdSQL);

        $category = $categoryResponse->fetch_assoc();
      }
      
      ?>

      <h2 class="headtitle_style_search">
        <?=$category["title"]?>
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
                <a href="#" class="open_button">Подробнее</a>
              </div>
            </div>
            <a href="#" class="button_product_item">
              <?= $product["price"] ?> ₽
            </a>
          </div>
        <? }
        ?>
      </div>
    </div>
  </div>
</section>