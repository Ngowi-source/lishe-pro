
/*bouncing infinitely at intervals*/
$(function() {
    setInterval(function() {
        var animationName = 'animated bounce';
        var animationend = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        $('').addClass(animationName).one(animationend, function() {
            $(this).removeClass(animationName);
        });
    }, 5000);
});

//scrollmagic animations
var controller = new ScrollMagic.Controller();

new ScrollMagic.Scene({
    triggerElement: "#whoAreWe h1",
    triggerHook: "onCenter",
    offset: -150,
    reverse: false
})
    .setTween(TweenMax.from("#whoAreWe h1", 1, {x: -450, autoAlpha: 0.0, ease: Power1.easeIn}))
    .addTo(controller);

new ScrollMagic.Scene({
    triggerElement: ".whoAreWe",
    triggerHook: "onCenter",
    offset: -150,
    reverse: false
})
    .setTween(TweenMax.from(".whoAreWe", 1.2, {y: -400, autoAlpha: 0.0, ease: Power1.easeIn}))
    .addTo(controller);

new ScrollMagic.Scene({
    triggerElement: "#fcc",
    triggerHook: "onCenter",
    offset: -400,
    reverse: false
})
    .setTween(TweenMax.from("#fcc", 0.6, {y: 350, autoAlpha: 0.0, ease: Power4.easeOut}))
    .addTo(controller);

new ScrollMagic.Scene({
    triggerElement: "#wlt",
    triggerHook: "onCenter",
    offset: -400,
    reverse: false
})
    .setTween(TweenMax.from("#wlt", 0.6, {y: 350, autoAlpha: 0.0, ease: Power4.easeIn}))
    .addTo(controller);

new ScrollMagic.Scene({
    triggerElement: "#dmp",
    triggerHook: "onCenter",
    offset: -400,
    reverse: false
})
    .setTween(TweenMax.from("#dmp", 0.6, {y: 350, autoAlpha: 0.0, ease: Power4.easeIn}))
    .addTo(controller);

new ScrollMagic.Scene({
    triggerElement: "#ofd",
    triggerHook: "onCenter",
    offset: -400,
    reverse: false
})
    .setTween(TweenMax.from("#ofd", 0.6, {y: 350, autoAlpha: 0.0, ease: Power4.easeOut}))
    .addTo(controller);

new ScrollMagic.Scene({
    triggerElement: "#bmi",
    triggerHook: "onCenter",
    offset: -400,
    reverse: false
})
    .setTween(TweenMax.from("#bmi", 0.6, {y: 350, autoAlpha: 0.0, ease: Power4.easeOut}))
    .addTo(controller);

new ScrollMagic.Scene({
    triggerElement: "#blog .card",
    triggerHook: "onEnter",
    reverse: false
})
    .setTween(TweenMax.from("#blog .card", 0.8, {x: 400, scale: 0.6, autoAlpha: 0.0, ease: Power2.easeOut}))
    .addTo(controller);