import {StarField} from './Stars.js';
import {Slider} from './Slider.js';
import {Star} from './Star.js';
import {settings} from "./settings.js";

console.log('bjr les amis');
const carouselElement = document.getElementById('carousel');
if (carouselElement) {
    new Slider(0, 'carousel');
}
window.onload = () => {
    new Star(0, 0, 0); // Juste pour test, sinon inutile si non utilisé
    new StarField('my-canvas'); // Donne bien l’ID du canvas
};
