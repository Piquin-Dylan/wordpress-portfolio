"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.Rgba = void 0;
const Rgb_1 = require("./Rgb");
class Rgba extends Rgb_1.Rgb {
    constructor(red, green, blue, alpha) {
        super(red, green, blue);
        this.alpha = alpha;
    }
    set alpha(value) {
        if (value >= 0 && value <= 1) {
            this._alpha = value;
        }
        else {
            this._alpha = 0;
        }
    }
    toString() {
        return `rgba(${this.red},${this.green},${this.blue},${this.alpha})`;
    }
}
exports.Rgba = Rgba;
