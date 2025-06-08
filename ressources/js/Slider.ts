import {settings} from "./settings.js";


export class Slider {
    private angle: number
    private carousel: HTMLElement | null

    constructor(angle: number, carouselId: string) {
        this.angle = 0
        this.carousel = document.getElementById(carouselId)
        this.rotateCarousel(0);
        this.Arrow()
    }

    private rotateCarousel(direction: number) {
        this.angle += direction * 120;
        // @ts-ignore
        this.carousel.style.transform = `rotateY(${this.angle}deg)`;
    }

    private Arrow() {
        // @ts-ignore
        document.querySelector(settings.arrow.left).addEventListener("click", () => this.rotateCarousel(-1));
        // @ts-ignore
        document.querySelector(settings.arrow.right).addEventListener("click", () => this.rotateCarousel(1));
    }
}