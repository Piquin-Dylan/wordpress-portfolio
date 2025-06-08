export class Slider {

    private angle: number
    private carousel: HTMLElement | null


    constructor(angle: number, carouselId: string) {
        this.angle = 0
        this.carousel = document.getElementById(carouselId)
        this.rotateCarousel(0);


        // @ts-ignore
        document.querySelector(".arrow.left").addEventListener("click", () => this.rotateCarousel(-1));
        // @ts-ignore
        document.querySelector(".arrow.right").addEventListener("click", () => this.rotateCarousel(1));

    }

    rotateCarousel(direction: number) {
        this.angle += direction * 120;
        // @ts-ignore
        this.carousel.style.transform = `rotateY(${this.angle}deg)`;
    }
}