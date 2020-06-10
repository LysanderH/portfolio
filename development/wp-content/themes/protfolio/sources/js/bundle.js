import {Line} from './line';

const app = {
    canvas: document.getElementById("canvas"),
    c: null,
    Line: Line,
    lines: [],
    scroll: 0,

    init() {
        this.c = this.canvas.getContext('2d');
        this.canvas.height = window.innerHeight;
        this.canvas.width = window.innerWidth;
        window.addEventListener('resize', () => {
            this.canvas.height = window.innerHeight;
            this.canvas.width = window.innerWidth;
        })

        this.lines.push(new Line(app));
        this.lines.push(new Line(app));
        this.lines.push(new Line(app));
        this.lines.push(new Line(app));
        this.lines.push(new Line(app));
        this.lines.push(new Line(app));
        this.lines.push(new Line(app));


        this.lines.forEach((item) => {
            item.init(this);
        })

        this.animate();
    },

    animate() {
        this.c.clearRect(0, 0, this.canvas.width, this.canvas.height);
        this.lines.forEach((item) => {
            item.moveLine();
            item.drawLine();

        })
        requestAnimationFrame(() => {
            this.animate();
        });
    }
}
app.init();
