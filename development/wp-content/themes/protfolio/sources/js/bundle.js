import {Line} from './line';

const app = {
    canvas: document.getElementById("canvas"),
    c: null,
    Line: Line,
    lines: [],
    // posY: 0,
    // speed: 10,
    // startPosY: 0,
    // posX: 0,

    init() {
        this.c = this.canvas.getContext('2d');
        this.canvas.height = window.innerHeight;
        this.canvas.width = window.innerWidth;
        this.lines.push(new Line(app));
        console.log(this.lines);

        this.lines.forEach((item) => {
            item.init(this);
        })

        // this.posX = this.canvas.width * Math.random();
        // this.speed = 10 * Math.random() + 10;
        this.animate();
    },
    // drawLine() {
    //     this.c.beginPath();
    //     this.c.strokeStyle = '#C935AB';
    //     this.c.moveTo(this.posX, this.startPosY);
    //     this.c.lineTo(this.posX, this.posY);
    //     this.c.stroke();
    // },
    // moveLine() {
    //     document.addEventListener('scroll', () => {
    //     })
    //     this.posY += this.speed;
    //
    //     if (this.posY > this.canvas.height) {
    //         this.posY += 0;
    //         this.startPosY += this.speed;
    //     }
    //     if (this.startPosY > this.canvas.height) {
    //         this.posY = 0;
    //         this.startPosY = 0;
    //         this.posX = this.canvas.width * Math.random();
    //
    //     }
    // },
    animate() {
        this.c.clearRect(0, 0, this.canvas.width, this.canvas.height);
        // this.moveLine();
        // this.drawLine();
        this.lines.forEach((item) => {
            item.moveLine();
            item.drawLine();
            // if (item.startPosY > this.canvas.height){
            //     this.lines.)
            // }
        })
        requestAnimationFrame(() => {
            this.animate();
        });
    }
}
app.init();
