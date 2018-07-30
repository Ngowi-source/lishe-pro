
/*bouncing infinitely at intervals*/
$(function() {
    setInterval(function() {
        var animationName = 'animated bounce';
        var animationend = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        $('#introButton').addClass(animationName).one(animationend, function() {
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
    .setTween(TweenMax.from("#whoAreWe h1", 1, {x: -600, autoAlpha: 0.0, ease: Power1.easeIn}))
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
    triggerElement: "#wlt",
    triggerHook: "onCenter",
    reverse: false
})
    .setTween(TweenMax.from("#wlt", 0.6, {y: 350, autoAlpha: 0.0, ease: Power3.easeIn}))
    .addTo(controller);

new ScrollMagic.Scene({
    triggerElement: "#dmp",
    triggerHook: "onCenter",
    reverse: false
})
    .setTween(TweenMax.from("#dmp", 0.6, {y: 350, autoAlpha: 0.0, ease: Power3.easeIn}))
    .addTo(controller);

new ScrollMagic.Scene({
    triggerElement: "#ofd",
    triggerHook: "onCenter",
    reverse: false
})
    .setTween(TweenMax.from("#ofd", 0.6, {y: 350, autoAlpha: 0.0, ease: Power3.easeOut}))
    .addTo(controller);

new ScrollMagic.Scene({
    triggerElement: "#bmi",
    triggerHook: "onCenter",
    reverse: false
})
    .setTween(TweenMax.from("#bmi", 0.6, {y: 350, autoAlpha: 0.0, ease: Power3.easeOut}))
    .addTo(controller);

new ScrollMagic.Scene({
    triggerElement: "#fcc",
    triggerHook: "onCenter",
    reverse: false
})
    .setTween(TweenMax.from("#fcc", 0.6, {y: 350, autoAlpha: 0.0, ease: Power3.easeOut}))
    .addTo(controller);

new ScrollMagic.Scene({
    triggerElement: "#blog .card",
    triggerHook: "onEnter",
    offset: 50,
    reverse: false
})
    .setTween(TweenMax.from("#blog .card", 0.7, {y: 350, scale: 0.6, autoAlpha: 0.0, ease: Power3.easeOut}))
    .addTo(controller);