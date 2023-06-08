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

                    <input type="text" class="input_style_recipe" name="search_name" id="recipeSearch"
                        value="<?= $search_name ?>" placeholder="Поиск по названию...">
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
                        <a href="?page=recipe-catalog&categoryId=18&index=0" id="grocery" class="ingridient">
                            <img src="assets/icons/recipes/grocery.svg" alt="Бакалея">
                        </a>
                        <a href="?page=recipe-catalog&categoryId=17&index=1" id="meat" class="ingridient">
                            <img src="assets/icons/recipes/meat.svg" alt="Мясо">
                        </a>
                        <a href="?page=recipe-catalog&categoryId=11&index=2" id="vegetable" class="ingridient">
                            <img src="assets/icons/recipes/vegetable.svg" alt="Овощи">
                        </a>
                        <a href="?page=recipe-catalog&categoryId=17&index=3" id="fish" class="ingridient">
                            <img src="assets/icons/recipes/fish.svg" alt="Рыба">
                        </a>
                        <a href="?page=recipe-catalog&categoryId=12&index=4" id="fruits" class="ingridient">
                            <img src="assets/icons/recipes/fruits.svg" alt="Фрукты">
                        </a>
                        <a href="?page=recipe-catalog&categoryId=14&index=5" id="milk" class="ingridient">
                            <img src="assets/icons/recipes/milk.svg" alt="Молочная продукция">
                        </a>
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
            <?php
            $getAllRecipesSQL = "SELECT * FROM recipes";

            if (isset($_GET["categoryId"])) {
                $categoryId = $_GET["categoryId"];
                $getAllRecipesSQL = "SELECT DISTINCT r.* FROM recipes AS r JOIN recipe_products AS rp ON r.id = rp.recipeId JOIN products AS p ON rp.productId = p.id JOIN subcategories AS sc ON p.subcategoryId = sc.id JOIN categories AS c ON sc.categoryID = c.id WHERE c.id = '$categoryId'";
            }

            if (isset($_GET["complexity"])) {
                $complexity = $_GET["complexity"];
                $getAllRecipesSQL = "SELECT * FROM recipes WHERE complexity = '$complexity'";
            }

            $allRecipesResponse = $link->query($getAllRecipesSQL);

            while ($recipe = $allRecipesResponse->fetch_assoc()) { ?>
                <a class="recipe_item" href="?page=recipe&id=<?= $recipe["id"] ?>">
                    <img src="<?= $recipe["banner"] ?>" alt="<?= $recipe["title"] ?>" class="recipe_item_image">
                    <div class="content_recipe_item">
                        <h5 class="title_recipe">
                            <?= $recipe["title"] ?>
                        </h5>
                        <div class="button_moderator_recipes">
                            <img src="./assets/img/icons/time.svg" alt="">
                            <p>
                                <?= $recipe["time"] ?> минут
                            </p>
                        </div>
                    </div>
                </a>
            <? }
            ?>
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

<script>
    const urlParams = new URLSearchParams(window.location.search);
    const categoryIdParam = urlParams.get('categoryId');
    const complexityParam = urlParams.get('complexity');
    const index = urlParams.get('index');

    if (categoryIdParam || complexityParam) {
        filtersAcc.toggle();
    }

    const ingridients = document.querySelectorAll(".ingridient");
    ingridients[Number(index)].classList.add("active-ingridient");

    const complexityItems = document.querySelectorAll(".filter-complexity-item");
    complexityItems[Number(complexityParam - 1)].classList.add("filter-complexity-item-active");
</script>

<script src="js/catalogSearch.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const recipeSearch = new ElementSearch(
            "#recipeSearch",
            ".content_recipe_list",
            ".recipe_item",
            ".content_recipe_item .title_recipe"
        );
    });
</script>