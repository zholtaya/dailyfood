<?

if (!$user) {
    redirect("page=sign-in");
}
?>

<section class="recipe">
    <div class="container">
        <div class="header_catalog_selected_category">
            <h2 class="headtitle_style_search">
                Рецепты
            </h2>
            <div class="filter_open_search">
                <button class="tune_filter" name="filter">
                    <img src="./assets/img/icons/tune.svg" alt="">

                </button>
                <form name="search" method="POST" class="form_search">

                    <input type="text" class="input_style" name="search_name" value="<?= $search_name ?>"
                        placeholder="Поиск по названию...">
                    <button class="search_button" name="search">
                        <img src="./assets/img/icons/search.svg" alt="">
                    </button>
                </form>
            </div>
        </div>
        <br><br><br>
        <a href="?page=add-recipe" class="change_status_order_admin">Добавить рецепт</a>

        <div class="content_recipe_list">
            <a class="recipe_item"  href="?page=recipe" >
                <img src="./assets/img/recipes/recipe_1.jpg" alt="" class="recipe_item_image">
                <div class="content_recipe_item">
                    <h5 class="title_recipe">
                        Тосты с авокадо
                        и сливочным
                        сыром
                    </h5>
                    <div class="button_moderator_recipes">
                        <img src="./assets/img/icons/time.svg" alt="">
                        <p>45 минут</p>
                    </div>
                </div>
            </a>
             <a class="recipe_item"  href="?page=recipe" >
                <img src="./assets/img/recipes/recipe_2.jpg" alt="" class="recipe_item_image">
                <div class="content_recipe_item">
                    <h5 class="title_recipe">
                        Тосты с авокадо
                        и сливочным
                        сыром
                    </h5>
                    <div class="button_moderator_recipes">
                        <img src="./assets/img/icons/time.svg" alt="">
                        <p>45 минут</p>
                    </div>
                </div>
            </a>
             <a class="recipe_item"  href="?page=recipe" >
                <img src="./assets/img/recipes/recipe_3.jpg" alt="" class="recipe_item_image">
                <div class="content_recipe_item">
                    <h5 class="title_recipe">
                        Тосты с авокадо
                        и сливочным
                        сыром
                    </h5>
                    <div class="button_moderator_recipes">
                        <img src="./assets/img/icons/time.svg" alt="">
                        <p>45 минут</p>
                    </div>
                </div>
            </a>
             <a class="recipe_item"  href="?page=recipe" >
                <img src="./assets/img/recipes/recipe_4.jpg" alt="" class="recipe_item_image">
                <div class="content_recipe_item">
                    <h5 class="title_recipe">
                        Тосты с авокадо
                        и сливочным
                        сыром
                    </h5>
                    <div class="button_moderator_recipes">
                        <img src="./assets/img/icons/time.svg" alt="">
                        <p>45 минут</p>
                    </div>
                </div>
            </a>
             <a class="recipe_item"  href="?page=recipe" >
                <img src="./assets/img/recipes/recipe_5.jpg" alt="" class="recipe_item_image">
                <div class="content_recipe_item">
                    <h5 class="title_recipe">
                        Тосты с авокадо
                        и сливочным
                        сыром
                    </h5>
                    <div class="button_moderator_recipes">
                        <img src="./assets/img/icons/time.svg" alt="">
                        <p>45 минут</p>
                    </div>
                </div>
            </a>
             <a class="recipe_item"  href="?page=recipe" >
                <img src="./assets/img/recipes/recipe_4.jpg" alt="" class="recipe_item_image">
                <div class="content_recipe_item">
                    <h5 class="title_recipe">
                        Тосты с авокадо
                        и сливочным
                        сыром
                    </h5>
                    <div class="button_moderator_recipes">
                        <img src="./assets/img/icons/time.svg" alt="">
                        <p>45 минут</p>
                    </div>
                </div>
            </a>
             
        </div>
    </div>
</section>