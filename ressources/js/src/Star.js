export class Star {
    constructor(x, y, radius) {
        this.x = x;
        this.y = y;
        this.radius = radius;

        this.dx = (Math.random() - 0.5) * 0.05;
        this.dy = (Math.random() - 0.5) * 0.05;

        this.depthFactor = radius / 0.15;
    }

    update(canvas, globalDx, globalDy) {
        this.x += this.dx + globalDx * this.depthFactor;
        this.y += this.dy + globalDy * this.depthFactor;

        if (this.x < 0) {
            this.x = canvas.width;
            this.y = Math.random() * canvas.height;
        }
        else if (this.x > canvas.width) {
            this.x = 0;
            this.y = Math.random() * canvas.height;
        }

        if (this.y < 0) {
            this.y = canvas.height;
            this.x = Math.random() * canvas.width;
        }
        else if (this.y > canvas.height) {
            this.y = 0;
            this.x = Math.random() * canvas.width;
        }
    }

    draw(ctx) {
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
        ctx.fillStyle = 'white';
        ctx.fill();
    }
}
