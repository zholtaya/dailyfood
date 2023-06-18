class Drawer {
    constructor(drawerId) {
        this.drawer = document.getElementById(drawerId);
        this.isOpen = false;
        this.transitionDuration = "0.5s";
        this.init();
    }

    init() {
        this.drawer.classList.add("none");
        this.isOpen = true;
        this.close();
    }

    open() {
        this.drawer.classList.remove("none");
        if (!this.isOpen) {
            this.isOpen = true;
            this.drawer.style.transition = `all ${this.transitionDuration} ease-in-out`;
            this.drawer.style.overflow = "hidden";

            if (this.drawer.classList.contains("left-drawer")) {
              this.drawer.style.transform = `translateX(0px)`;
            }
        }
    }

    close() {
        this.drawer.classList.remove("none");
        if (this.isOpen) {
          this.isOpen = false;
          this.drawer.style.transition = `all ${this.transitionDuration} ease-in-out`;

            if (this.drawer.classList.contains("left-drawer")) {
              this.drawer.style.transform = `translateX(-500px)`;
            }
        }
    }

    getIsOpen() {
        return this.isOpen;
    }
}

document.addEventListener("DOMContentLoaded", () => {
    const mainDrawer = new Drawer("drawer");
    const openDrawerButton = document.getElementById("open-drawer-btn");
    console.log(openDrawerButton);
    const closeDrawerButton = document.getElementById("close-drawer-btn");

    openDrawerButton.addEventListener("click", () => {
      console.log("click");
        mainDrawer.open();
    });

    mainDrawer.drawer.addEventListener("click", (event) => {
        event.stopPropagation(); // Prevent click event from propagating
    });

    closeDrawerButton.addEventListener("click", () => {
        mainDrawer.close();
    });

    document.body.addEventListener("click", (event) => {
        if (
            mainDrawer.getIsOpen() &&
            event.target !== mainDrawer.drawer &&
            event.target !== openDrawerButton
        ) {
            mainDrawer.close();
        }
    });
});
