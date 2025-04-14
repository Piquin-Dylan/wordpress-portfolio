"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.Animation = void 0;
class Animation {
    constructor(ctx, canvas, iAnimatables = []) {
        this.ctx = ctx;
        this.canvas = canvas;
        this.iAnimatables = iAnimatables;
        console.log(this.iAnimatables);
    }
    start() {
        this.animate();
    }
    stop() {
        cancelAnimationFrame(this.requestAnimationFrameID);
    }
    registerAnimatable(animatable) {
        this.iAnimatables.push(animatable);
    }
    animate() {
        this.requestAnimationFrameID = requestAnimationFrame(this.animate.bind(this));
        this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
        this.iAnimatables.forEach((animatable) => {
            animatable.animate();
        });
    }
}
exports.Animation = Animation;
