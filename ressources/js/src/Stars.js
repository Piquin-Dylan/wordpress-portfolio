import { Star } from "./Star";
export class StarField {
    constructor() {
        this.stars = [];
        this.canvas = document.getElementById('my-canvas');
        if (!this.canvas)
            throw new Error('Canvas introuvable');
        const context = this.canvas.getContext('2d');
        if (!context)
            throw new Error('Impossible d\'obtenir le contexte 2D');
        this.ctx = context;
        this.createStars();
    }
    createStars() {
        for (let i = 0; i < 200; i++) {
            const x = Math.random() * this.canvas.width;
            const y = Math.random() * this.canvas.height;
            const radius = Math.random() * 1.5 + 0.5;
            this.stars.push(new Star(x, y, radius));
        }
    }
    draw() {
        this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
        this.stars.forEach(star => star.draw(this.ctx));
    }
}
