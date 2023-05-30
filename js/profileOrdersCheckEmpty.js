document.addEventListener("DOMContentLoaded", () => {
    const allProductsElements = document.querySelectorAll("#user-order-item");
    const catalogProductsList = document.querySelector("#user-orders-list");

    if (!allProductsElements.length) {
        catalogProductsList.innerHTML = `
            <p class="catalog-empty-text">У вас пока нет заказов</p>
        `;
    }
});
