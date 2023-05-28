class PushNotification {
  constructor(message, type) {
    this.message = message;
    this.type = type;
    this.notificationElement = null;
    this.notificationTimeout = null;
    this.notificationContainer = null;
  }

  show() {
    // Create the notification element
    this.notificationElement = document.createElement('div');
    this.notificationElement.classList.add('push-notification');
    if (this.type === "error") {
      this.notificationElement.innerHTML = `<img src="/assets/icons/error-icon.svg" alt="Error" /> <span>${this.message}</span>`;
    } else if (this.type === "success") {
      this.notificationElement.innerHTML = `<img src="/assets/icons/success-icon.svg" alt="Success" /> <span>${this.message}</span>`;
    } else {
      this.notificationElement.innerHTML = `<span>${this.message}</span>`;
    }

    // this.notificationElement.innerText = this.message;

    // Append the notification element to the container
    const notificationContainer = document.getElementById("notification-container")
    notificationContainer.appendChild(this.notificationElement);

    // Trigger a reflow to enable CSS transitions
    void this.notificationElement.offsetWidth;

    // Add the show class to start the animation
    this.notificationElement.classList.add('show');

    // Set a timeout to remove the notification after 5 seconds
    this.notificationTimeout = setTimeout(() => {
      this.hide();
    }, 2000);
  }

  hide() {
    // Clear the timeout to prevent it from hiding the notification
    clearTimeout(this.notificationTimeout);

    // Remove the notification element from the DOM after the animation ends
    this.notificationElement.addEventListener('transitionend', () => {
      this.notificationElement.remove();
    });

    // Add the hide class to trigger the hide animation
    this.notificationElement.classList.add('hide');
  }
};