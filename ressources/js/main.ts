import {Slider} from './Slider'; // note le .js même si c’est un .ts à la base
new Slider(0, 'carousel');

/*
const canvas = document.getElementById('my-canvas') as HTMLCanvasElement;
const ctx = canvas.getContext('2d')!;
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

class Star {
    x: number;
    y: number;
    radius: number;

    constructor(x: number, y: number, radius: number) {
        this.x = x;
        this.y = y;
        this.radius = radius;
    }

    draw(ctx: CanvasRenderingContext2D) {
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
        ctx.fillStyle = 'white';
        ctx.fill();
    }

}

const stars: Star[] = [];


function createStars() {

    for (let i = 0; i < 200; i++) {
        const x = Math.random() * canvas.width;
        const y = Math.random() * canvas.height;
        const radius = Math.random() * 1.5 + 0.5; // petite étoile
        stars.push(new Star(x, y, radius));
    }
}

createStars()
stars.forEach(star => star.draw(ctx));
*/
