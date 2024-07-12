class NxdSlider3D {
    element;
    items;
    rotationX;
    rotationY = 0;
    perspective;

    constructor(selector) {
        this.element = document.querySelector(selector);
        this.items =  Array.from(this.element.querySelectorAll(".item"))
        this.addItemEventListeners();
    }

    pauseAnimation() {
        if (!this.element) return;
        this.element.style.animationPlayState = "paused";
    }

    startAnimation() {
        if (!this.element) return;
        this.element.style.animationPlayState = "";
    }

    showLightbox() {
        const dialog = this.querySelector("dialog");
        dialog.showModal();
    }

    addControllerEventListeners() {
        if(!this.items.length) return;
        const rotationDegPerStep = 360 / this.items.length;
        const $sliderElement = this.element.querySelector(".slider");
        console.log("addControllerEventListeners");
        const prevBtn = this.element.querySelector('[data-click="prev"]');
        const nextBtn = this.element.querySelector('[data-click="next"]');
        console.log(prevBtn)
        console.log(nextBtn)

        if(prevBtn && nextBtn) {
            $sliderElement.style.transition = "transform 1s";
            console.log("all ready for next and prev")
            prevBtn.addEventListener("click", () => {
                // Rotate the sliderElement one step back
                this.rotationY = this.rotationY + rotationDegPerStep;
                $sliderElement.style.transform = `perspective(${this.perspective}px) rotateX(${this.rotationX}deg) rotateY(${this.rotationY}deg)`;
            });

            nextBtn.addEventListener("click", () => {
                // Rotate the sliderElement one step further
                this.rotationY = this.rotationY - rotationDegPerStep;
                $sliderElement.style.transform = `perspective(${this.perspective}px) rotateX(${this.rotationX}deg) rotateY(${this.rotationY}deg)`;
            });
        }
    }

    addItemEventListeners() {
        if (!this.items) return;
        if(!this.items[0].querySelector("dialog")) return;

        this.items.forEach(item => {
            item.addEventListener("mouseover", this.pauseAnimation.bind(this));
            item.addEventListener("mouseout", this.startAnimation.bind(this));
            item.addEventListener("click", this.showLightbox.bind(item));

            // Dialog Close with btn
            const closeBtn = item.querySelector(".lightbox-close");
            closeBtn.addEventListener("click", (event) => {
                event.stopPropagation();
                const dialog = closeBtn.closest("dialog");
                if (typeof dialog.close === "function") {
                    dialog.close();
                }
            });
            // Dialog close via backdrop:
            const dialog = item.querySelector("dialog");
            dialog.addEventListener("click", (event) => {
                console.log("dialog clicked")
                event.stopPropagation();
                if (event.target === dialog && typeof dialog.close === "function") {
                    dialog.close();
                }
            });
        });
    }

    setRotationX(val) {
        this.rotationX = val;
    }

    setPerspective(val) {
        this.perspective = val;
    }
}

export { NxdSlider3D };