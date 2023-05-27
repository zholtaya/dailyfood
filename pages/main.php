<main class="main">
  <div class="container">
    <div class="content_main">
      <h1 class="title_main">
        Доставка на дом, когда вам это нужно.
      </h1>
      <div class="subtitle_button">
        <h3>Попробуйте новую возможность подбора рецептов </h3>
        <a href="#" class="button_style">
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
    <div class="content_popular-products">
      <div class="popular_product_item">
        <img src="../assets/img/popular/popular_1.jpg" alt="product_item" class="popular_product_item_image">
        <div class="popular_product_item_text">
          <div class="name_item">
            Хлопья «Fitness»
          </div>
          <div class="price_item">
            320 руб
          </div>
        </div>
      </div>
      <div class="popular_product_item">
        <img src="../assets/img/popular/popular_2.jpg" alt="product_item" class="popular_product_item_image">
        <div class="popular_product_item_text">
          <div class="name_item">
            Хлопья «Fitness»
          </div>
          <div class="price_item">
            320 руб
          </div>
        </div>
      </div>
      <div class="popular_product_item">
        <img src="../assets/img/popular/popular_3.jpg" alt="product_item" class="popular_product_item_image">
        <div class="popular_product_item_text">
          <div class="name_item">
            Хлопья «Fitness»
          </div>
          <div class="price_item">
            320 руб
          </div>
        </div>
      </div>
      <div class="popular_product_item">
        <img src="../assets/img/popular/popular_4.jpg" alt="product_item" class="popular_product_item_image">
        <div class="popular_product_item_text">
          <div class="name_item">
            Хлопья «Fitness»
          </div>
          <div class="price_item">
            320 руб
          </div>
        </div>
      </div>
      <div class="popular_product_item">
        <img src="../assets/img/popular/popular_4.jpg" alt="product_item" class="popular_product_item_image">
        <div class="popular_product_item_text">
          <div class="name_item">
            Хлопья «Fitness»
          </div>
          <div class="price_item">
            320 руб
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="catalog_category">
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
        <a href="?page=catalog&categoryId=<?= $category["id"] ?>&subcategoryId=<?= $subcategory["id"] ?>" class="item" style="background-image: url(<?= $category["img"] ?>);">
          <h5 class="title"><?= $category["title"] ?></h5>
        </a>
      <?
      }
      ?>
    </div>
  </div>
</section>