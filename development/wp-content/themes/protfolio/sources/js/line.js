export class Line {
    constructor(app, posY = 0, speed = 10, startPosY = 0, posX = 0) {
        this.app = app;
        this.posY = 0;
        this.posX = this.app.canvas.width * Math.random();
        this.speed = 10 * Math.random() + 10;
        this.startPosY = 0;
    }

    init(app) {
        this.app = app;
        this.posX = this.app.canvas.width * Math.random();
        this.speed = 10 * Math.random() + 10;

    }

    drawLine() {
        this.app.c.beginPath();
        this.app.c.strokeStyle = '#C935AB';
        this.app.c.moveTo(this.posX, this.startPosY);
        this.app.c.lineTo(this.posX, this.posY);
        this.app.c.stroke();
    }

    moveLine() {
        this.posY += this.speed;

        if (this.posY > this.app.canvas.height) {
            this.posY += 0;
            this.startPosY += this.speed;
        }
        if (this.startPosY >= this.app.canvas.height) {
            this.posY = 0;
            this.startPosY = 0;
            this.app.lines.splice(0,1);
            this.app.lines.push(new Line(this.app));
            // this.app.lines = this.app.lines.filter(item => item !== this.posX);
            //
            console.log(this.app.lines)
        }
    }
}