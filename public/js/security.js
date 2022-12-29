let container = $('.security');

function moveHorusEye(e) {
    let [xMin, xMax] = [-40, 35]
    let [yMin, yMax] = [-9, 18]

    let pos = container.position();

    let perX = (e.pageX - pos.left) / container.width();
    let perY = (e.pageY - pos.top) / container.height();

    //yMax = 2 * -yMin
    yMin = yMin * (1 - (Math.abs(perX - 0.5) * 2));
    yMax = yMax * (1 - (Math.abs(perX - 0.5) * 1));

    let vX = xMin + (xMax - xMin) * perX;
    let vY = yMin + (yMax - yMin) * perY;

    $('.iris').css({
        'transform': 'translate(' + vX + 'px, ' + vY + 'px)'
    });
}

container.on('mousemove', function (e) {
    moveHorusEye(e)
})

container.on('mouseleave', function() {
    $(this).find('.iris').css({'transform': 'translate(0,0)'});
});

var tl = gsap.timeline();
tl.to(".form-container", { transform: 'translate(0%, -50%)', duration: 0.4 }, "+=0.4");
tl.to(".eyelid", { height: 0, duration: 0.2 });
tl.to(".iris", { transform: 'translate(0,0)', duration: 0.2 });

container.on('click mousedown mouseup', '.swap', function (e) {
    e.preventDefault();
    let url = $(this).attr('href');
    tl.to(".eyelid", { height: 35, duration: 0.2 });
    tl.to(".form-container", {
        transform: 'translate(-100%, -50%)',
        duration: 0.3,
        onComplete: function() {
            window.location = url; 
        }
    });
});


let closed = false;
function closeEye() {
    tl.clear();
    tl.to(".eyelid", { height: 35, duration: 0.2 });
    tl.to(".eyelid", { height: 0, duration: 0.2 }, "+=0.2");
}

(function loop() {
    let rand = Math.round(Math.random() * (12000 - 2000)) + 2000;
    setTimeout(function () {
        if (!closed) closeEye();
        loop();
    }, rand);
}());

container.on('mousedown', function () {
    if (!closed) {
        closed = true;
        tl.to(
            ".eyelid", {
                height: 35,
                duration: 0.2
            });
    }
});

container.on('mouseup', function () {
    tl.to(
        ".eyelid", {
            height: 0,
            duration: 0.2,
            onComplete: function() {
                closed = false; tl.clear();
            }
        });
    
})
