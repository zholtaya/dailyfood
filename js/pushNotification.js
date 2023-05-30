class PushNotification {
  constructor(message, type) {
    this.message = message;
    this.type = type;
    this.notificationElement = null;
    this.notificationTimeout = null;
    this.notificationContainer = null;
  }

  show() {

    this.notificationElement = document.createElement('div');
    this.notificationElement.classList.add('push-notification');
    if (this.type === "error") {
      this.notificationElement.innerHTML = `<img src="./assets/icons/error-icon.svg" alt="Error" /> <span>${this.message}</span>`;
    } else if (this.type === "success") {
      this.notificationElement.innerHTML = `<img src="./assets/icons/success-icon.svg" alt="Success" /> <span>${this.message}</span>`;
    } else {
      this.notificationElement.innerHTML = `<span>${this.message}</span>`;
    }

    const notificationContainer = document.getElementById("notification-container")
    notificationContainer.appendChild(this.notificationElement);

    void this.notificationElement.offsetWidth;

    this.notificationElement.classList.add('show');

    this.notificationTimeout = setTimeout(() => {
      this.hide();
    }, 2000);
  }

  hide() {

    clearTimeout(this.notificationTimeout);


    this.notificationElement.addEventListener('transitionend', () => {
      this.notificationElement.remove();
    });

    this.notificationElement.classList.add('hide');
  }
};