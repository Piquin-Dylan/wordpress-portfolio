import { settings } from "../settings";
export class Rgb {
    constructor(red, green, blue) {
        this.red = red;
        this.green = green;
        this.blue = blue;
    }
    set red(value) {
        if (value >= 0 && value <= 255) {
            this._red = value;
        }
        else {
            this._red = settings.defaultColorValue;
        }
    }
    set green(value) {
        if (value >= 0 && value <= 255) {
            this._green = value;
        }
        else {
            this._green = settings.defaultColorValue;
        }
    }
    set blue(value) {
        if (value >= 0 && value <= 255) {
            this._blue = value;
        }
        else {
            this._blue = settings.defaultColorValue;
        }
    }
    get red() {
        return Math.trunc(this._red);
    }
    get green() {
        return Math.trunc(this._green);
    }
    get blue() {
        return Math.trunc(this._blue);
    }
    toString() {
        return `rgb(${this.red},${this.green},${this.blue})`;
    }
}
Rgb.white = new Rgb(250, 250, 250);
Rgb.red = new Rgb(250, 0, 0);
