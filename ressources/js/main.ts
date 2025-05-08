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





const canvas = document.getElementById('my-canvas') as HTMLCanvasElement;
const ctx = canvas.getContext('2d')!;
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

class Star {
    x: number;
    y: number;
    radius: number;

    constructor(x: number, y: number, radius: number) {
        this.x = x;
        this.y = y;
        this.radius = radius;
    }

    draw(ctx: CanvasRenderingContext2D) {
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
        ctx.fillStyle = 'white';
        ctx.fill();
    }

}

const stars: Star[] = [];


function createStars() {

    for (let i = 0; i <200; i++) {
        const x = Math.random() * canvas.width;
        const y = Math.random() * canvas.height;
        const radius = Math.random() * 1.5 + 0.5; // petite étoile
        stars.push(new Star(x, y, radius));
    }
}

createStars()
stars.forEach(star => star.draw(ctx));
