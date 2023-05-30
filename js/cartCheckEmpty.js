const cartEmptyPlaceholderNode = `
    <div class="cart-empty-wrapper">
        <p class="cart-empty-title">
            <span>В вашей корзине пока ничего нет</span>
            <img src="./assets/icons/sad-icon.svg" />
        </p>
        <p class="cart-empty-description">Здесь появятся товары которые Вы добавите</p>
        <a href="?#catalog" class="button_style">Перейти в каталог</a>
    </div>
`;

document.addEventListener("DOMContentLoaded", () => {
    const cartProductElement = document.querySelectorAll(".cart-product-item");
    const contentCartElement = document.getElementById("cart-content");
    const deleteAllProductButtonElement = document.querySelector(
        ".delete_all_products"
    );

    if (!cartProductElement.length) {
        deleteAllProductButtonElement.remove();
        contentCartElement.style.justifyContent = "center";
        contentCartElement.innerHTML = cartEmptyPlaceholderNode;
    }
});
