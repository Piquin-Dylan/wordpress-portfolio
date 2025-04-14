"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.Rgb = void 0;
const settings_1 = require("../settings");
class Rgb {
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
            this._red = settings_1.settings.defaultColorValue;
        }
    }
    set green(value) {
        if (value >= 0 && value <= 255) {
            this._green = value;
        }
        else {
            this._green = settings_1.settings.defaultColorValue;
        }
    }
    set blue(value) {
        if (value >= 0 && value <= 255) {
            this._blue = value;
        }
        else {
            this._blue = settings_1.settings.defaultColorValue;
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
exports.Rgb = Rgb;
