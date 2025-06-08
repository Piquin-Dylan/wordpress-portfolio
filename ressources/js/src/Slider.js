export class Slider {
    constructor(angle, carouselId) {
        this.angle = 0;
        this.carousel = document.getElementById(carouselId);
        this.rotateCarousel(0);
        this.Arrow();
    }
    rotateCarousel(direction) {
        this.angle += direction * 120;
        // @ts-ignore
        this.carousel.style.transform = `rotateY(${this.angle}deg)`;
    }
    Arrow() {
        // @ts-ignore
        document.querySelector(".arrow.left").addEventListener("click", () => this.rotateCarousel(-1));
        // @ts-ignore
        document.querySelector(".arrow.right").addEventListener("click", () => this.rotateCarousel(1));
    }
}
