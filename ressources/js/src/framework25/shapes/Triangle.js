import { Rectangle } from "./Rectangle";
export class Triangle extends Rectangle {
    constructor(ctx, position, color, width, height, rotation) {
        super(ctx, position, color, width, height, rotation);
        this.points = [];
        this.points.push({ x: 0, y: -this.height / 2 });
        this.points.push({ x: this.width / 2, y: this.height / 2 });
        this.points.push({ x: -this.width / 2, y: this.height / 2 });
    }
    draw() {
        this.ctx.save();
        this.ctx.translate(this.position.x, this.position.y);
        this.ctx.rotate(this.rotation);
        this.ctx.beginPath();
        this.ctx.fillStyle = this.color.toString();
        this.ctx.moveTo(this.points[0].x, this.points[0].y);
        this.ctx.lineTo(this.points[1].x, this.points[1].y);
        this.ctx.lineTo(this.points[2].x, this.points[2].y);
        this.ctx.fill();
        this.ctx.closePath();
        this.ctx.restore();
    }
}
