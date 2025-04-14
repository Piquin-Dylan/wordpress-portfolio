"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.randomInt = randomInt;
exports.randomFloat = randomFloat;
function randomInt(min, max) {
    return Math.ceil(Math.random() * (max - min) + min);
}
function randomFloat(min, max) {
    return Math.random() * (max - min) + min;
}
