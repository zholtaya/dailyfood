class Tooltip {
    constructor(element, text) {
        this.element = element;
        this.text = text;
        this.tooltipElement = null;

        this.initialize();
    }

    initialize() {
        this.element.addEventListener(
            "mouseenter",
            this.showTooltip.bind(this)
        );
        this.element.addEventListener(
            "mouseleave",
            this.hideTooltip.bind(this)
        );
    }

    createTooltipElement() {
        this.tooltipElement = document.createElement("div");
        this.tooltipElement.className = "tooltip";
        this.tooltipElement.textContent = this.text;
        document.body.appendChild(this.tooltipElement);
    }

    positionTooltip() {
        const elementRect = this.element.getBoundingClientRect();
        const tooltipRect = this.tooltipElement.getBoundingClientRect();

        const top = elementRect.top - tooltipRect.height - 10;
        const left =
            elementRect.left + elementRect.width / 2 - tooltipRect.width / 2;

        this.tooltipElement.style.top = top + 0 + "px";
        this.tooltipElement.style.left = left + "px";
    }

    showTooltip() {
        if (!this.tooltipElement) {
            this.createTooltipElement();
        }

        this.positionTooltip();
        this.tooltipElement.classList.add("visible");
    }

    hideTooltip() {
        if (this.tooltipElement) {
            this.tooltipElement.classList.remove("visible");
        }
    }
}
