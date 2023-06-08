<?php
if (!$user) {
    redirect("page=sign-in");
}
?>

<?php
if (isset($_GET["id"])) {
    $recipeId = $_GET["id"];
    $getRecipeByIdSQL = "SELECT * FROM recipes WHERE id = '$recipeId'";
    $recipeResponse = $link->query($getRecipeByIdSQL);
    $recipe = $recipeResponse->fetch_assoc();
} else {
    redirect("?page=recipe-catalog");
}
?>

<?php
if (isset($_GET["buyAll"])) {
    $getRecipeProductsSQL = "SELECT * FROM recipe_products WHERE recipeId = '$recipeId'";
    $recipeProductsResponse = $link->query($getRecipeProductsSQL);

    $userId = $user["id"];
    $uniqueId = uniqid();

    $checkCartIsCreatedSQL = "SELECT * FROM cart WHERE userId = '$userId'";
    $checkCartResponse = $link->query($checkCartIsCreatedSQL);
    $maybeCart =
        $checkCartResponse->fetch_assoc();
    if (!$maybeCart) {
        $createNewCartRowSQL = "INSERT INTO cart
(userId, uniqueId) VALUES ('$userId', '$uniqueId')";
        $link->query($createNewCartRowSQL);
        $getThisCartRowSQL = "SELECT * FROM cart WHERE userId = '$userId' AND uniqueId = '$uniqueId'";
        $thisCartRowResponse = $link->query($getThisCartRowSQL);
        $maybeCart =
            $thisCartRowResponse->fetch_assoc();
    }

    while ($recipeProduct = $recipeProductsResponse->fetch_assoc()) {
        $productId = $recipeProduct["productId"];
        $addProductIntoCartListSQL = "INSERT INTO cart_list (cartId,
productId, count) VALUES ('{$maybeCart['id']}', '$productId', 1)";
        $link->query($addProductIntoCartListSQL);
    }

    showSuccessNotification("Товар успешно добавлен в
корзину");
}
?>

<section class="recipe">
    <div class="container">
        <img src="<?= $recipe["banner"] ?>" alt="<?= $recipe["title"] ?>" class="image_recipe">

        <div class="content_recipe">
            <div class="content_ingredients">
                <div class="buttons_wrapper_moderator">
                    <div class="button_moderator_recipes_2">
                        <img src="./assets/img/icons/time.svg" alt="">
                        <p>
                            <?= $recipe["time"] ?> минут
                        </p>
                    </div>
                    <?php
                    if ($recipe["complexity"] == "1") { ?>
                        <div class="button_moderator_recipes_2">
                            <img src="./assets/img/icons/stars_1.svg" alt="">
                            <p>Легко</p>
                        </div>
                    <? }

                    if ($recipe["complexity"] == "2") { ?>
                        <div class="button_moderator_recipes_2">
                            <img src="./assets/img/icons/stars_2.svg" alt="">
                            <p>Средне</p>
                        </div>
                    <? }

                    if ($recipe["complexity"] == "3") { ?>
                        <div class="button_moderator_recipes_2">
                            <img src="./assets/img/icons/stars_3.svg" alt="">
                            <p>Сложно</p>
                        </div>
                    <? }
                    ?>

                </div>
                <div class="ingredients_list_container">
                    <p class="final_price_title">
                        Ингредиенты
                    </p>
                    <div class="ingredients_list">
                        <?php
                        $getRecipeProductsSQL = "SELECT * FROM recipe_products WHERE recipeId = '$recipeId'";
                        $recipeProductsResponse = $link->query($getRecipeProductsSQL);

                        while ($recipeProduct = $recipeProductsResponse->fetch_assoc()) {
                            $productId = $recipeProduct["productId"];
                            $getProductById = "SELECT * FROM products WHERE id = '$productId'";
                            $productsResponse = $link->query($getProductById);
                            $product = $productsResponse->fetch_assoc();
                            ?>
                            <span class="recipe-product-span">
                                ●
                                <?= $product["name"] ?>
                            </span>
                        <?
                        }
                        ?>
                    </div>
                    <a href="?page=recipe&id=<?= $recipeId ?>&buyAll" class="button_cart">Добавить в корзину</a>

                </div>
            </div>
            <div class="content_description_recipe">
                <h2 class="headtitle_style_search">
                    <?= $recipe["title"] ?>
                </h2>
                <p class="description_recipe_item">
                    <?= $recipe["description"] ?>
                </p>
                <p class="final_price_title">
                    Пищевая и энергетическая ценность
                </p>
                <div class="caloric_value_one_product">
                    <p class="caloric_value_name">
                        Готовое блюдо
                    </p>
                    <div class="caloric_value_recipe_list">
                        <div class="caloric_value_data_item">
                            <p class="caloric_value_number_data">
                                <?= (int) $recipe["calories"] * ((int) $recipe["weight"] / 100) ?>
                            </p>
                            <p class="caloric_value_name_data">
                                Ккал
                            </p>
                        </div>
                        <div class="caloric_value_data_item">
                            <p class="caloric_value_number_data">
                                <?= (int) $recipe["proteins"] * ((int) $recipe["weight"] / 100) ?>
                            </p>
                            <p class="caloric_value_name_data">
                                Белки
                            </p>
                        </div>
                        <div class="caloric_value_data_item">
                            <p class="caloric_value_number_data">
                                <?= (int) $recipe["fats"] * ((int) $recipe["weight"] / 100) ?>
                            </p>
                            <p class="caloric_value_name_data">
                                Жиры
                            </p>
                        </div>
                        <div class="caloric_value_data_item">
                            <p class="caloric_value_number_data">
                                <?= (int) $recipe["carb"] * ((int) $recipe["weight"] / 100) ?>
                            </p>
                            <p class="caloric_value_name_data">
                                Углеводы
                            </p>
                        </div>
                    </div>
                </div>
                <div class="caloric_value_one_product">
                    <p class="caloric_value_name">
                        На 100 граммов
                    </p>
                    <div class="caloric_value_recipe_list">
                        <div class="caloric_value_data_item">
                            <p class="caloric_value_number_data">
                                <?= $recipe["calories"] ?>
                            </p>
                            <p class="caloric_value_name_data">
                                Ккал
                            </p>
                        </div>
                        <div class="caloric_value_data_item">
                            <p class="caloric_value_number_data">
                                <?= $recipe["proteins"] ?>
                            </p>
                            <p class="caloric_value_name_data">
                                Белки
                            </p>
                        </div>
                        <div class="caloric_value_data_item">
                            <p class="caloric_value_number_data">
                                <?= $recipe["fats"] ?>
                            </p>
                            <p class="caloric_value_name_data">
                                Жиры
                            </p>
                        </div>
                        <div class="caloric_value_data_item">
                            <p class="caloric_value_number_data">
                                <?= $recipe["carb"] ?>
                            </p>
                            <p class="caloric_value_name_data">
                                Углеводы
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="recipe_steps_content">
            <p class="final_price_title">
                Способ приготовления
            </p>
            <div class="recipe_steps_list">
                <div class="recipe_step_item">
                    <p class="steps_counter">
                        Шаг 1
                    </p>
                    <p class="description_recipe_step_item">
                        <?= $recipe["step1"] ?>
                    </p>
                </div>
                <?php
                if ($recipe["step2"]) { ?>
                    <div class="recipe_step_item">
                        <p class="steps_counter">
                            Шаг 2
                        </p>
                        <p class="description_recipe_step_item">
                            <?= $recipe["step2"] ?>
                        </p>
                    </div>
                <? }
                ?>

                <?php
                if ($recipe["step3"]) { ?>
                    <div class="recipe_step_item">
                        <p class="steps_counter">
                            Шаг 3
                        </p>
                        <p class="description_recipe_step_item">
                            <?= $recipe["step3"] ?>
                        </p>
                    </div>
                <? }
                ?>

                <?php
                if ($recipe["step4"]) { ?>
                    <div class="recipe_step_item">
                        <p class="steps_counter">
                            Шаг 4
                        </p>
                        <p class="description_recipe_step_item">
                            <?= $recipe["step4"] ?>
                        </p>
                    </div>
                <? }
                ?>

                <?php
                if ($recipe["step5"]) { ?>
                    <div class="recipe_step_item">
                        <p class="steps_counter">
                            Шаг 5
                        </p>
                        <p class="description_recipe_step_item">
                            <?= $recipe["step5"] ?>
                        </p>
                    </div>
                <? }
                ?>

                <?php
                if ($recipe["step6"]) { ?>
                    <div class="recipe_step_item">
                        <p class="steps_counter">
                            Шаг 6
                        </p>
                        <p class="description_recipe_step_item">
                            <?= $recipe["step6"] ?>
                        </p>
                    </div>
                <? }
                ?>
            </div>
        </div>
    </div>
</section>