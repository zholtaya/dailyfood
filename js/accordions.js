class Accordion {
  constructor(containerId) {
    this.container = document.getElementById(containerId);
    this.container.classList.add("accordionContainer");
    this.isOpen = false;
    this.transitionDuration = '0.3s';
    this.transitionTimingFunction = 'ease';
  }

  toggle() {
    if (this.isOpen) {
      this.container.style.transition = `max-height ${this.transitionDuration} ${this.transitionTimingFunction}`;
      this.container.style.maxHeight = '0';
      this.isOpen = false;
    } else {
      this.container.style.transition = `max-height ${this.transitionDuration} ${this.transitionTimingFunction}`;
      this.container.style.maxHeight = `${this.container.scrollHeight}px`;
      this.isOpen = true;
    }
  }

  getIsOpen() {
    return this.isOpen;
  }
}

document.addEventListener("DOMContentLoaded", () => {
  const productAccordion = new Accordion("productAccordion");
  const productAccordionButton = document.getElementById("product-accordion-button");

  productAccordionButton.addEventListener("click", () => {
    productAccordion.toggle();
    if (productAccordion.getIsOpen()) {
      productAccordionButton.textContent = "Скрыть"
    } else {
      productAccordionButton.textContent = "Показать подробную информацию"
    }
  });
});

