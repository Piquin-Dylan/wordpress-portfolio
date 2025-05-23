import {Shape} from "./Shape";
import {iPosition} from "../types/iPosition";
import {iColor} from "../types/iColor";
import {iDrawable} from "../types/iDrawable";
import {Vector} from "../Vector";
import {iRectangle} from "../types/iRectangle";

export class Rectangle extends Shape implements iDrawable, iRectangle{
    width: number;
    height: number;
    rotation: number;


    constructor(ctx: CanvasRenderingContext2D, position: Vector, color: iColor, width: number, height: number, rotation: number = 0) {
        super(ctx, position, color);
        this.width = width;
        this.height = height;
        this.rotation = rotation;
    }

    draw() {
        this.ctx.save();
        this.ctx.beginPath();
        this.ctx.fillStyle = this.color.toString();
        this.ctx.translate(this.position.x, this.position.y);
        this.ctx.rotate(this.rotation);
        this.ctx.fillRect(-this.width / 2, -this.height / 2, this.width, this.height);
        this.ctx.closePath();
        this.ctx.restore();
    }

}