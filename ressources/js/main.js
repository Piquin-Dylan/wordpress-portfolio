/*import {StarsBackground} from './StarsBackground'

class Stars {

    private readonly canvas: HTMLElement | null;
    private readonly ctx: CanvasRenderingContext2D
    private readonly starArray: any[];

    constructor() {
        this.starArray = [];
        this.canvas = document.getElementById('my-canvas');
        // @ts-ignore
        this.ctx = this.canvas.getContext('2d');
        this.circle = new StarsBackground(this.ctx, this.canvas.width, this.canvas.height, white, 0)
        this.addEventListenners();
        this.resizeCanvas();


    }

    addEventListenners() {

        window.addEventListener('load', () => {
        })
        window.addEventListener('resize', () => {
            this.resizeCanvas()
        })
    }

    resizeCanvas() {
        // @ts-ignore
        this.canvas.width = window.innerWidth
        // @ts-ignore
        this.canvas.height = window.innerHeight

    }
}*/
/*
new Stars()
*/
var angle = 0;
var carousel = document.getElementById('carousel');
function rotateCarousel(direction) {
    angle += direction * 120;
    // @ts-ignore
    carousel.style.transform = "rotateY(".concat(angle, "deg)");
}
// On attend que le DOM soit chargé
document.addEventListener("DOMContentLoaded", function () {
    // @ts-ignore
    document.querySelector(".arrow.left").addEventListener("click", function () { return rotateCarousel(-1); });
    // @ts-ignore
    document.querySelector(".arrow.right").addEventListener("click", function () { return rotateCarousel(1); });
});
var canvas = document.getElementById('my-canvas');
var ctx = canvas.getContext('2d');
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;
var Star = /** @class */ (function () {
    function Star(x, y, radius) {
        this.x = x;
        this.y = y;
        this.radius = radius;
    }
    Star.prototype.draw = function (ctx) {
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
        ctx.fillStyle = 'white';
        ctx.fill();
    };
    return Star;
}());
var stars = [];
function createStars() {
    for (var i = 0; i < 200; i++) {
        var x = Math.random() * canvas.width;
        var y = Math.random() * canvas.height;
        var radius = Math.random() * 1.5 + 0.5; // petite étoile
        stars.push(new Star(x, y, radius));
    }
}
createStars();
stars.forEach(function (star) { return star.draw(ctx); });
