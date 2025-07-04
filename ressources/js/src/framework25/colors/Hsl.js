import { settings } from "../settings";
export class Hsl {
    constructor(hue, saturation, lightness) {
        this.hue = hue;
        this.saturation = saturation;
        this.lightness = lightness;
    }
    set lightness(value) {
        if (value >= 0 && value <= 100) {
            this._lightness = value;
        }
        else {
            this._lightness = settings.defaultColorValue;
        }
    }
    get lightness() {
        return Math.trunc(this._lightness);
    }
    get hue() {
        return Math.trunc(this._hue);
    }
    set hue(value) {
        if (value >= 0 && value <= 360) {
            this._hue = value;
        }
        else {
            this._hue = settings.defaultColorValue;
        }
    }
    get saturation() {
        return Math.trunc(this._saturation);
    }
    set saturation(value) {
        if (value >= 0 && value <= 100) {
            this._saturation = value;
        }
        else {
            this._saturation = settings.defaultColorValue;
        }
    }
    toString() {
        return `hsl(${this.hue}deg,${this.saturation}%,${this.lightness}%)`;
    }
}
