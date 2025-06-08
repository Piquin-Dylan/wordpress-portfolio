import { Rgb } from "./Rgb";
export class Rgba extends Rgb {
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
