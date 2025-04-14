/*import {StarsBackground} from './StarsBackground'

class Stars {

    private readonly canvas: HTMLElement | null;
    private readonly ctx: CanvasRenderingContext2D
    private readonly starArray: any[];

    constructor() {
        this.starArray = [];
        this.canvas = document.getElementById('my-canvas');
        // @ts-ignore
        this.ctx = this.canvas.getContext('2d');
        this.circle = new StarsBackground(this.ctx, this.canvas.width, this.canvas.height, white, 0)
        this.addEventListenners();
        this.resizeCanvas();


    }

    addEventListenners() {

        window.addEventListener('load', () => {
        })
        window.addEventListener('resize', () => {
            this.resizeCanvas()
        })
    }

    resizeCanvas() {
        // @ts-ignore
        this.canvas.width = window.innerWidth
        // @ts-ignore
        this.canvas.height = window.innerHeight

    }
}*/

/*
new Stars()
*/


let angle = 0;
const carousel = document.getElementById('carousel');

function rotateCarousel(direction: number) {
    angle += direction * 120;
    // @ts-ignore
    carousel.style.transform = `rotateY(${angle}deg)`;
}

// On attend que le DOM soit chargé
document.addEventListener("DOMContentLoaded", () => {
    // @ts-ignore
    document.querySelector(".arrow.left").addEventListener("click", () => rotateCarousel(-1));
    // @ts-ignore
    document.querySelector(".arrow.right").addEventListener("click", () => rotateCarousel(1));
});

