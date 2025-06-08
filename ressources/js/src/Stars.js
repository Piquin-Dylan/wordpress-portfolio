import { Star } from './Star.js';
import { settings } from "./settings.js";
export class StarField {
    constructor(myCanvas) {
        this.stars = [];
        this.canvas = document.getElementById(settings.canvas.id);
        this.ctx = this.canvas.getContext('2d');
        this.createStars();
        this.draw();
    }
    createStars() {
        for (let i = 0; i < settings.generateStars.max; i++) {
            const x = Math.random() * this.canvas.width;
            const y = Math.random() * this.canvas.height;
            const radius = Math.random() * settings.radius.min + settings.radius.max;
            this.stars.push(new Star(x, y, radius));
        }
    }
    draw() {
        this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
        this.stars.forEach(star => star.draw(this.ctx));
    }
}
