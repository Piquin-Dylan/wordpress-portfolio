"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.isPointInCircle = isPointInCircle;
function isPointInCircle(positionA, positionB, radius) {
    return Math.sqrt(Math.pow(positionA.x - positionB.x, 2) + Math.pow(positionA.y - positionB.y, 2)) < radius;
}
