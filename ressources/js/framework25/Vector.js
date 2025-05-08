"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.Vector = void 0;
var Vector = /** @class */ (function () {
    function Vector(position) {
        this.x = position.x;
        this.y = position.y;
    }
    Vector.prototype.add = function (position) {
        this.x += position.x;
        this.y += position.y;
        return this;
    };
    Vector.prototype.multiply = function (scalar) {
        this.x *= scalar;
        this.y *= scalar;
        return this;
    };
    Vector.fromAngle = function (angle, length) {
        if (length === void 0) { length = 1; }
        return new Vector({
            x: Math.cos(angle - Math.PI / 2) * length,
            y: Math.sin(angle - Math.PI / 2) * length
        });
    };
    return Vector;
}());
exports.Vector = Vector;
