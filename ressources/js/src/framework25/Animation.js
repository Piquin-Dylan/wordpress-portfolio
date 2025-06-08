import { settings } from "./settings";
export class Animation {
    constructor(canvas, ctx, animatables = []) {
        this.canvas = canvas;
        this.ctx = ctx;
        this.iAnimatables = animatables;
        this.idxOfiAnimatablesToBeRemoved = [];
    }
    start() {
        this.animate();
    }
    stop() {
        cancelAnimationFrame(this.requestAnimationFrameID);
    }
    registeriAnimatable(animatable) {
        this.iAnimatables.push(animatable);
    }
    animate() {
        this.requestAnimationFrameID = requestAnimationFrame(this.animate.bind(this));
        this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
        for (const animatable of this.iAnimatables) {
            if (animatable.shouldBeRemoved) {
                const idx = this.iAnimatables.indexOf(animatable);
                if (!this.idxOfiAnimatablesToBeRemoved.includes(idx)) {
                    this.idxOfiAnimatablesToBeRemoved.push(idx);
                }
            }
            animatable.animate();
        }
        if (this.iAnimatables.length > settings.maxUnnecessaryAnimatablesItemCount) {
            for (const idx of this.idxOfiAnimatablesToBeRemoved) {
                this.iAnimatables.splice(idx, 1);
            }
            this.idxOfiAnimatablesToBeRemoved = [];
        }
    }
}
