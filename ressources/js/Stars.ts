import {Star} from './Star.js';

export class StarField {
    private readonly canvas: HTMLCanvasElement;
    private readonly ctx: CanvasRenderingContext2D;
    private stars: Star[] = [];

    constructor(myCanvas: string) {
        this.canvas = document.getElementById('my-canvas') as HTMLCanvasElement
        this.ctx = this.canvas.getContext('2d') as CanvasRenderingContext2D


        this.createStars();
        this.draw();
    }

    private createStars() {
        for (let i = 0; i < 500; i++) {
            const x = Math.random() * this.canvas.width;
            const y = Math.random() * this.canvas.height;
            const radius = Math.random() * 2 + 1.5;
            this.stars.push(new Star(x, y, radius));
        }
    }

    private draw() {
        this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
        this.stars.forEach(star => star.draw(this.ctx));
    }
}
