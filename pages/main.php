<?

if (!$user) {
  redirect("page=sign-in");
}
?>

<main class="main">
  <div class="container">
    <div class="content_main">
      <h1 class="title_main">
        Доставка на дом, когда вам это нужно.
      </h1>
      <div class="subtitle_button">
        <h3>Попробуйте новую возможность подбора рецептов </h3>
        <a href="?page=recipe-catalog" class="button_style">
          Попробовать
        </a>
      </div>
    </div>
  </div>
</main>
<section class="popular_products">
  <div class="container">
    <h2 class="headtitle_style">
      Популярное
    </h2>
    <div class="content_popular-products swiper">
      <div class="swiper-wrapper popular_products_wrapper">
        <?php
        $getPopularProductsSQL = "SELECT products.*, COUNT(ol.ProductID) AS order_count FROM products JOIN orders_list ol ON products.id = ol.ProductID GROUP BY products.id, products.name ORDER BY order_count DESC LIMIT 10";

        $getPopularProductsResponse = $link->query($getPopularProductsSQL);

        while ($product = $getPopularProductsResponse->fetch_assoc()) { ?>
          <div class="swiper-slide">
            <div class="popular_product_item">
              <img src="<?= $product["thirdImage"] ?>" alt="product_item" class="popular_product_item_image">
              <div class="popular_product_item_text">
                <div class="name_item">
                  <?= $product["name"] ?>
                </div>
                <div class="price_item">
                  <?= $product["price"] ?> ₽
                </div>
              </div>
            </div>
          </div>
        <? }
        ?>
      </div>
    </div>
  </div>
</section>
<section class="catalog_category" id="catalog">
  <div class="container">
    <h2 class="headtitle_style">
      Каталог
    </h2>
    <div class="content_catalog-category">
      <?php
      $getAllCategoriesSQL = "SELECT * FROM categories";
      $allCategoriesResponse = $link->query($getAllCategoriesSQL);

      while ($category = $allCategoriesResponse->fetch_assoc()) {
        $categoryId = $category["id"];
        $getSubcategoryByCategoryIdSQL = "SELECT * FROM subcategories WHERE categoryId = '$categoryId' LIMIT 1";
        $subcategoryResponse = $link->query($getSubcategoryByCategoryIdSQL);
        $subcategory = $subcategoryResponse->fetch_assoc();
        ?>

        <a href="?page=catalog&categoryId=<?= $category["id"] ?>&subcategoryId=<?= $subcategory["id"] ?>" class="item"
          style="background-image: url(<?= $category["img"] ?>);">
          <h5 class="title">
            <?= $category["title"] ?>
          </h5>
        </a>
      <?
      }
      ?>
    </div>
  </div>
</section>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="js/popularSlider.js"></script>