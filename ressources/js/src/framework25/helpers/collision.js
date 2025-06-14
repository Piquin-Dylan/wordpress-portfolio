export class Collision {
    static checkCollision(aTopX, aTopY, aBottomX, aBottomY, bTopX, bTopY, bBottomX, bBottomY) {
        return !(aBottomX < bTopX ||
            aBottomY < bTopY ||
            aTopX > bBottomX ||
            aTopY > bBottomY);
    }
    static checkCollisionInterface(a, b) {
        return !(a.position.x + a.width < b.position.x ||
            a.position.y + a.height < b.position.y ||
            a.position.x > b.position.x + b.width ||
            a.position.y > b.position.y + b.height);
    }
    static replaceOutOfBounds(rectangle, canvas) {
        if (rectangle.position.y > canvas.height + rectangle.height) {
            rectangle.position.y = -rectangle.height;
        }
        if (rectangle.position.y < -rectangle.height) {
            rectangle.position.y = canvas.height + rectangle.height;
        }
        if (rectangle.position.x > canvas.width + rectangle.width) {
            rectangle.position.x = -rectangle.width;
        }
        if (rectangle.position.x < -rectangle.width) {
            rectangle.position.x = canvas.width + rectangle.width;
        }
    }
    static transformPoint(point, position, orientation) {
        const cosTheta = Math.cos(orientation);
        const sinTheta = Math.sin(orientation);
        const rotatedX = point.x * cosTheta - point.y * sinTheta;
        const rotatedY = point.x * sinTheta + point.y * cosTheta;
        return { x: position.x + rotatedX, y: position.y + rotatedY };
    }
    static isPointInCircle(positionA, positionB, radius) {
        return Math.sqrt(Math.pow(positionA.x - positionB.x, 2) + Math.pow(positionA.y - positionB.y, 2)) < radius;
    }
}
