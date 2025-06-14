export class Vector {
    constructor(position) {
        this.x = position.x;
        this.y = position.y;
    }
    add(position) {
        this.x += position.x;
        this.y += position.y;
        return this;
    }
    multiply(scalar) {
        this.x *= scalar;
        this.y *= scalar;
        return this;
    }
    static fromAngle(angle, length = 1) {
        return new Vector({
            x: Math.cos(angle - Math.PI / 2) * length,
            y: Math.sin(angle - Math.PI / 2) * length
        });
    }
}
