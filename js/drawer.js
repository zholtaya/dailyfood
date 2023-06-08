class Drawer {
    constructor(drawerId) {
        this.drawer = document.getElementById(drawerId);
        this.isOpen = false;
        this.transitionDuration = "0.5s";
        this.transitionTimingFunction = "ease";
        this.viewportWidth = Math.max(
            document.documentElement.clientWidth || 0,
            window.innerWidth || 0
        );
        this.viewportHeight = Math.max(
            document.documentElement.clientHeight || 0,
            window.innerHeight || 0
        );
        this.init();
    }

    init() {
        this.drawer.classList.add("none");
    }

    open() {
        this.drawer.classList.remove("none");
        if (!this.isOpen) {
            this.drawer.style.transition = `width ${this.transitionDuration} ${this.transitionTimingFunction}, height ${this.transitionDuration} ${this.transitionTimingFunction}`;
            this.drawer.style.overflow = "hidden";

            if (this.drawer.classList.contains("left-drawer")) {
                if (window.innerWidth <= 600) {
                    this.drawer.style.width = `${300}px`;
                } else {
                    this.drawer.style.width = `${500}px`;
                }
            } else if (this.drawer.classList.contains("top-drawer")) {
                this.drawer.style.height = `${this.viewportHeight}px`;
            }

            // document.body.style.overflow = 'hidden';
            this.isOpen = true;
        }
    }

    close() {
        this.drawer.classList.remove("none");
        if (this.isOpen) {
            this.drawer.style.transition = `width ${this.transitionDuration} ${this.transitionTimingFunction}, height ${this.transitionDuration} ${this.transitionTimingFunction}`;

            if (this.drawer.classList.contains("left-drawer")) {
                this.drawer.style.width = "0px";
            } else if (this.drawer.classList.contains("top-drawer")) {
                this.drawer.style.height = "0px";
            }

            // document.body.style.overflow = 'auto';
            this.isOpen = false;
        }
    }

    getIsOpen() {
        return this.isOpen;
    }
}

document.addEventListener("DOMContentLoaded", () => {
    const mainDrawer = new Drawer("drawer");
    const openDrawerButton = document.getElementById("open-drawer-btn");
    const closeDrawerButton = document.getElementById("close-drawer-btn");

    // mainDrawer.open();

    openDrawerButton.addEventListener("click", () => {
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
