<?

if (!$user) {
    redirect("page=sign-in");
}
?>

<section class="recipe">
    <div class="container">
        <div class="header_some_pages">
            <h2 class="headtitle_style_search">
                Рецепты
            </h2>
            <div class="filter_open_search">
                <button class="tune_filter" name="filter">
                    <img src="./assets/img/icons/tune.svg" alt="">

                </button>
                <form name="search" method="POST" class="form_search">

                    <input type="text" class="input_style_recipe" name="search_name" value="<?= $search_name ?>"
                        placeholder="Поиск по названию...">
                    <button class="search_button" name="search">
                        <img src="./assets/img/icons/search.svg" alt="">
                    </button>
                </form>
            </div>
        </div>
        <div id="filtersContainer">
            <div class="filters">
                <div class="ingridients">
                    <h5 class="filter_title">Выберите ингредиенты</h5>
                    <div class="ingridients_wrapper">
                        <div id="grocery" class="ingridient">
                            <img src="assets/icons/recipes/grocery.svg" alt="Бакалея">
                        </div>
                        <div id="meat" class="ingridient">
                            <img src="assets/icons/recipes/meat.svg" alt="Мясо">
                        </div>
                        <div id="vegetable" class="ingridient">
                            <img src="assets/icons/recipes/vegetable.svg" alt="Овощи">
                        </div>
                        <div id="fish" class="ingridient">
                            <img src="assets/icons/recipes/fish.svg" alt="Рыба">
                        </div>
                        <div id="fruits" class="ingridient">
                            <img src="assets/icons/recipes/fruits.svg" alt="Фрукты">
                        </div>
                        <div id="milk" class="ingridient">
                            <img src="assets/icons/recipes/milk.svg" alt="Молочная продукция">
                        </div>
                    </div>
                </div>
                <div class="complexity">
                    <h5 class="filter_title">Выберите сложность приготовления</h5>
                    <div class="complexity_wrapper">
                        <a href="?page=recipe-catalog&complexity=1"
                            class="button_moderator_recipes_2 filter-complexity-item">
                            <img src="./assets/img/icons/stars_1.svg" alt="Легко">
                            <p>Легко</p>
                        </a>
                        <a href="?page=recipe-catalog&complexity=2"
                            class="button_moderator_recipes_2 filter-complexity-item">
                            <img src="./assets/img/icons/stars_2.svg" alt="Средне">
                            <p>Средне</p>
                        </a>
                        <a href="?page=recipe-catalog&complexity=3"
                            class="button_moderator_recipes_2 filter-complexity-item">
                            <img src="./assets/img/icons/stars_3.svg" alt="Сложно">
                            <p>Сложно</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
        <a href="?page=add-recipe" class="change_status_order_admin">Добавить рецепт</a>

        <div class="content_recipe_list">
            <a class="recipe_item" href="?page=recipe">
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
            <a class="recipe_item" href="?page=recipe">
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
            <a class="recipe_item" href="?page=recipe">
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
            <a class="recipe_item" href="?page=recipe">
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
            <a class="recipe_item" href="?page=recipe">
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
            <a class="recipe_item" href="?page=recipe">
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

<script src="js/accordions.js"></script>
<script>
    const filtersAcc = new Accordion("filtersContainer");
    const openFiltersBtn = document.querySelector(".tune_filter");

    openFiltersBtn.addEventListener("click", () => {
        filtersAcc.toggle();
    })
</script>

<script src="js/tooltip.js"></script>
<script>
    const grocery = document.getElementById('grocery');
    const groceryTooltip = new Tooltip(grocery, grocery.querySelector("img").alt);

    const meat = document.getElementById('meat');
    const meatTooltip = new Tooltip(meat, meat.querySelector("img").alt);

    const vegetable = document.getElementById('vegetable');
    const vegetableTooltip = new Tooltip(vegetable, vegetable.querySelector("img").alt);

    const fish = document.getElementById('fish');
    const fishTooltip = new Tooltip(fish, fish.querySelector("img").alt);

    const fruits = document.getElementById('fruits');
    const fruitsTooltip = new Tooltip(fruits, fruits.querySelector("img").alt);

    const milk = document.getElementById('milk');
    const milkTooltip = new Tooltip(milk, milk.querySelector("img").alt);
</script>