document.addEventListener("DOMContentLoaded", () => {
    const allProductsElements = document.querySelectorAll("#catalog_product");
    const catalogProductsList = document.querySelector(
        ".catalog_products_list"
    );

    if (!allProductsElements.length) {
        catalogProductsList.classList.remove("catalog_products_list");
        catalogProductsList.classList.add("catalog-empty-wrapper");
        catalogProductsList.innerHTML = `
            <p class="catalog-empty-text">В данной подкатегории пока нет товаров</p>
        `;
    }
});
