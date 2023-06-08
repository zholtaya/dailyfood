<?php
if (isset($_POST["feedback"])) {
    $message = $_POST["message"];
    $currentDate = date("Y-m-d");
    $userId = $user["id"];

    $sendFeedbackSQL = "INSERT INTO feedback (userId, message, date) VALUES ('$userId', '$message', '$currentDate')";
    $link->query($sendFeedbackSQL);
    showSuccessNotification("Ваше сообщение успешно отправлено!");
}
?>

<div id="feedbackModal" class="modal">
    <div class="modal-content default-modal">
        <form class="feedback-form" name="feedback" method="post">
            <h3 class="modal-title">
                Задайте нам любой вопрос
            </h3>
            <div class="input_label modal-textarea">
                <label for="message" class="label_style">Ваш вопрос</label>
                <textarea name="message" class="input_style" id="message" cols="20" rows="6"></textarea>
            </div>
            <div class="modal-btns">
                <button id="closeFeedbackModal" class="modal-btn modal-btn-cancel">Закрыть</button>
                <button id="closeFeedbackModal" name="feedback" class="modal-btn modal-btn-success">Отправить</button>
            </div>
        </form>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <div class="content_footer">
            <div class="footer_logo_content">
                <div class="footer_logo">
                    <img src="./assets/icons/logo_white.svg" alt="">
                </div>
                <div class="ask_questions">
                    <p>Остались вопросы?</p>
                    <button id="openFeedbackModal" class="button_style">
                        Напишите нам
                    </button>
                </div>
            </div>
            <div class="nav-footer">
                <nav class="nav-list">
                    <a href="#" class="nav-link">Меню</a>
                    <a href="?" class="nav-link">Главная</a>
                    <a href="?page=profile" class="nav-link">Личный кабинет</a>
                    <a href="?page=recipe_catalog" class="nav-link">Рецепты</a>
                    <a href="?#catalog" class="nav-link">Каталог</a>
                </nav>
                <nav class="nav-list">
                    <a href="#" class="nav-link">Каталог</a>
                    <a href="?page=catalog&categoryId=10&subcategoryId=1" class="nav-link">Готовая еда</a>
                    <a href="?page=catalog&categoryId=9&subcategoryId=16" class="nav-link">Вода и напитки</a>
                    <a href="?page=catalog&categoryId=16&subcategoryId=66" class="nav-link">Перекус</a>
                    <a href="?#catalog" class="nav-link">Каталог</a>
                </nav>
                <nav class="nav-list">
                    <a href="#" class="nav-link">Каталог</a>
                    <a href="?page=catalog&categoryId=12&subcategoryId=34" class="nav-link">Фрукты и ягоды</a>
                    <a href="?page=catalog&categoryId=13&subcategoryId=41" class="nav-link">Хлеб и выпечка</a>
                    <a href="?page=catalog&categoryId=17&subcategoryId=72" class="nav-link">Мясо и рыба</a>
                    <a href="?page=catalog&categoryId=18&subcategoryId=83" class="nav-link">Бакалея</a>
                </nav>
                <nav class="nav-list">
                    <a href="#" class="nav-link">Каталог</a>
                    <a href="?page=catalog&categoryId=20&subcategoryId=99" class="nav-link">Детское питание</a>
                    <a href="?page=catalog&categoryId=15&subcategoryId=59" class="nav-link">Десерты</a>
                    <a href="?page=catalog&categoryId=14&subcategoryId=49" class="nav-link">Молочные продукты</a>
                    <a href="?page=catalog&categoryId=19&subcategoryId=94" class="nav-link">Заморозка</a>
                </nav>

            </div>
        </div>
    </div>
</footer>

<script src="/js/modal.js"></script>
<script>
    const feedbackModal = new Modal("feedbackModal", "openFeedbackModal", "closeFeedbackModal");
</script>