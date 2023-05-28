class ElementSearch {
  constructor(searchInputSelector, productListSelector, productItemSelector) {
    this.searchInputElement = document.querySelector(searchInputSelector);
    this.productListElement = document.querySelector(productListSelector);
    this.productItemElements = Array.from(document.querySelectorAll(productItemSelector));
    this.filteredProducts = [];

    this.render = this.render.bind(this);
    this.filterProducts = this.filterProducts.bind(this);
    this.debouncedFilterProducts = this.debouncedFilterProducts.bind(this);

    this.init();
  }

  init() {
    this.searchInputElement.addEventListener("input", this.debouncedFilterProducts);
  }

  render() {
    const catalogListFragment = document.createDocumentFragment();
    this.filteredProducts.forEach((product) => {
      catalogListFragment.appendChild(product);
    });
    this.productListElement.innerHTML = "";
    this.productListElement.appendChild(catalogListFragment);
  }

  filterProducts(searchText) {
    if (searchText.trim() === "") {
      this.filteredProducts = [...this.productItemElements];
    } else {
      this.filteredProducts = this.productItemElements.filter((item) => {
        const itemText = item.querySelector(".name_product").textContent.toLowerCase();
        return itemText.includes(searchText);
      });
    }
    this.render();
  }

  debounce(func, delay) {
    let timerId;
    return (...args) => {
      clearTimeout(timerId);
      timerId = setTimeout(() => {
        func(...args);
      }, delay);
    };
  }

  debouncedFilterProducts(event) {
    const searchText = event.target.value.trim().toLowerCase();
    this.filterProducts(searchText);
  }
}

document.addEventListener("DOMContentLoaded", () => {
  new ElementSearch("#catalog_search", ".catalog_products_list", "#catalog_product");
});