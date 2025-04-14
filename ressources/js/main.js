/*"use strict";
Object.defineProperty(exports, "__esModule", {value: true});
const StarsBackground_1 = require("./StarsBackground");

class Stars {
    constructor() {
        this.starArray = [];
        this.canvas = document.getElementById('my-canvas');
        // @ts-ignore
        this.ctx = this.canvas.getContext('2d');
        this.circle = new StarsBackground_1.StarsBackground(this.ctx, this.canvas.width, this.canvas.height, white, 0);
        this.addEventListenners();
        this.resizeCanvas();
    }

    addEventListenners() {
        window.addEventListener('load', () => {
        });
        window.addEventListener('resize', () => {
            this.resizeCanvas();
        });
    }

    resizeCanvas() {
        // @ts-ignore
        this.canvas.width = window.innerWidth;
        // @ts-ignore
        this.canvas.height = window.innerHeight;
    }
}

new Stars();*/
document.documentElement.className = document.documentElement.className.replace('no-js', 'js');
let angle = 0;
const carousel = document.getElementById('carousel');

function rotateCarousel(direction) {
    angle += direction * 120;
    carousel.style.transform = `rotateY(${angle}deg)`;
}

document.addEventListener("DOMContentLoaded", () => {
    document.querySelector(".arrow.left")?.addEventListener("click", () => rotateCarousel(1));
    document.querySelector(".arrow.right")?.addEventListener("click", () => rotateCarousel(-1));

    const imageElements = document.querySelectorAll('.image_project_1');

    imageElements.forEach(imageElement => {
        imageElement.addEventListener('touchstart', (e) => rotateCarousel(-1))

        imageElement.addEventListener('touchmove', (e) => {
            console.log('Touch move');
        });

        imageElement.addEventListener('touchend', (e) => {
            console.log('Touch end');
        });
    });
});
