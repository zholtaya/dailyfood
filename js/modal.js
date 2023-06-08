class Modal {
  constructor(modalId, openBtnId, closeBtnId) {
    this.modal = document.getElementById(modalId);
    this.modalContent = document.querySelector(".modal-content");
    this.openBtn = document.getElementById(openBtnId);
    this.closeBtn = document.getElementById(closeBtnId);

    this.openBtn.addEventListener("click", () => this.openModal());
    this.closeBtn.addEventListener("click", () => this.closeModal());
    window.addEventListener("click", (event) => this.handleOutsideClick(event));
    window.addEventListener("keydown", (event) => this.handleEscapeKey(event));
  }

  openModal() {
    this.modal.classList.add("open");
    this.modalContent.classList.add("open");
  }

  closeModal() {
    this.modal.classList.remove("open");
    this.modalContent.classList.remove("open");
  }

  handleOutsideClick(event) {
    if (event.target === this.modal) {
      this.closeModal();
    }
  }

  handleEscapeKey(event) {
    if (event.key === "Escape") {
      this.closeModal();
    }
  }
}

const cartModal = new Modal("cartModal", "openCartModal", "closeCartModal");