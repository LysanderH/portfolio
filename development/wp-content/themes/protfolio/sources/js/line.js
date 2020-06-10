export class Line {
    constructor(app, posY = 0, speed = 10, startPosY = 0, posX = 0, greenOrPurple = 0, color = '') {
        this.app = app;
        this.posY = 0;
        this.posX = this.app.canvas.width * Math.random();
        this.speed = 5 * Math.random() + 5;
        this.startPosY = 0;
        this.greenOrPurple = Math.random();
        this.color = "";
        if (this.greenOrPurple > 0.5){
            this.color = "#C935AB";
        } else {
            this.color = "#52D3B4";
        }
    }

    init(app) {
        this.app = app;
        this.posX = this.app.canvas.width * Math.random();
        this.speed = 10 * Math.random() + 10;
        if (this.greenOrPurple > 0.5){
            this.color = "#C935AB";
        } else {
            this.color = "#52D3B4";
        }

    }

    drawLine() {
        this.app.c.beginPath();
        this.app.c.strokeStyle = this.color;
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
            this.app.lines = this.app.lines.filter(item => item !== this);
            this.app.lines.push(new Line(this.app));
        }
    }
}