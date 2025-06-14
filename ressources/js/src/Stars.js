import { Star } from './Star.js';
import { settings } from "./settings.js";

export class StarField {
    constructor() {
        this.stars = [];
        this.canvas = document.getElementById(settings.canvas.id);
        this.ctx = this.canvas.getContext('2d');

        // Correction HDPI
        const ratio = window.devicePixelRatio || 1;
        this.canvas.width = this.canvas.clientWidth * ratio;
        this.canvas.height = this.canvas.clientHeight * ratio;
        this.ctx.scale(ratio, ratio);

        this.createStars();

        // déplacement global du champ (vers la gauche et un peu vers le haut)
        this.globalDx = -0.15;
        this.globalDy = -0.05;

        this.animate();
    }

    createStars() {
        for (let i = 0; i < settings.generateStars.max; i++) {
            const x = Math.random() * this.canvas.clientWidth;
            const y = Math.random() * this.canvas.clientHeight;
            const radius = Math.random() * (settings.radius.max - settings.radius.min) + settings.radius.min;
            this.stars.push(new Star(x, y, radius));
        }
    }

    draw() {
        this.ctx.clearRect(0, 0, this.canvas.clientWidth, this.canvas.clientHeight);
        this.stars.forEach(star => star.draw(this.ctx));
    }

    animate() {
        this.stars.forEach(star => star.update(this.canvas, this.globalDx, this.globalDy));
        this.draw();
        requestAnimationFrame(() => this.animate());
    }
}
