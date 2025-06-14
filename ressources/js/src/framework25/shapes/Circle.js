import { Shape } from "./Shape";
export class Circle extends Shape {
    constructor(ctx, position, color, radius) {
        super(ctx, position, color);
        this.radius = radius;
    }
    draw() {
        this.ctx.beginPath();
        this.ctx.save();
        this.ctx.fillStyle = this.color.toString();
        this.ctx.arc(this.position.x, this.position.y, this.radius, 0, Math.PI * 2);
        this.ctx.fill();
        this.ctx.restore();
    }
}
