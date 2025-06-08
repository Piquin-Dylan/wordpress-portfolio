import { Star } from './Star.js';
export class StarField {
    constructor(myCanvas) {
        this.stars = [];
        this.canvas = document.getElementById('my-canvas');
        if (!this.canvas)
            throw new Error('Canvas introuvable');
        const ctx = this.canvas.getContext('2d');
        if (!ctx)
            throw new Error('Impossible d\'obtenir le contexte 2D');
        this.ctx = ctx;
        // ⛔️ PAS de retina scaling
        this.canvas.width = window.innerWidth;
        this.canvas.height = window.innerHeight;
        this.createStars();
        this.draw();
    }
    createStars() {
        for (let i = 0; i < 500; i++) {
            const x = Math.random() * this.canvas.width;
            const y = Math.random() * this.canvas.height;
            const radius = Math.random() * 1.5 + 1;
            this.stars.push(new Star(x, y, radius));
        }
    }
    draw() {
        this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
        this.stars.forEach(star => star.draw(this.ctx));
    }
}
