window.addEventListener('load', function (evt) {

    const hexNumbers = '0123456789ABCDEF'.split('');

    function randomColor() {
        let color = '#';

        for (let i = 0; i < 6; i++) {
            color += hexNumbers[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    function drawCircle(x, y) {
        canvasRenderingContext.beginPath();
        // arc(x, y, radius, startAngle, endAngle, counterclockwise)
        canvasRenderingContext.arc(x, y, 30, 0, 2 * Math.PI, false);
        canvasRenderingContext.fillStyle = randomColor();
        canvasRenderingContext.fill();

    }

    const canvas = this.document.querySelector('canvas');
    const canvasRenderingContext = canvas.getContext("2d");


    canvas.addEventListener('mousemove', function (evt) {
        let x = evt.clientX - evt.target.offsetLeft;
        let y = evt.clientY - evt.target.offsetTop;
        drawCircle(x, y);


    });
})