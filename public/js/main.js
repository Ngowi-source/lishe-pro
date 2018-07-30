
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
    triggerHook: "onEnter",
    reverse: false
})
    .setTween(TweenMax.from("#whoAreWe h1", 0.6, {x: -600, autoAlpha: 0.0, ease: Power0.easeIn}))
    .addTo(controller);

new ScrollMagic.Scene({
    triggerElement: "#whoAreWe h1",
    triggerHook: "onEnter",
    reverse: false
})
    .setTween(TweenMax.from(".whoAreWe", 0.8, {y: -400, autoAlpha: 0.0, ease: Power1.easeIn}))
    .addTo(controller);

new ScrollMagic.Scene({
    triggerElement: "#wlt",
    triggerHook: "onEnter",
    reverse: false
})
    .setTween(TweenMax.from("#wlt", 0.6, {y: -350, autoAlpha: 0.0, ease: Power0.easeIn}))
    .addTo(controller);

new ScrollMagic.Scene({
    triggerElement: "#dmp",
    triggerHook: "onEnter",
    reverse: false
})
    .setTween(TweenMax.from("#dmp", 0.6, {y: -350, autoAlpha: 0.0, ease: Power0.easeIn}))
    .addTo(controller);

new ScrollMagic.Scene({
    triggerElement: "#ofd",
    triggerHook: "onEnter",
    reverse: false
})
    .setTween(TweenMax.from("#ofd", 0.6, {y: -350, autoAlpha: 0.0, ease: Power0.easeIn}))
    .addTo(controller);

new ScrollMagic.Scene({
    triggerElement: "#bmi",
    triggerHook: "onEnter",
    reverse: false
})
    .setTween(TweenMax.from("#bmi", 0.6, {y: -350, autoAlpha: 0.0, ease: Power0.easeIn}))
    .addTo(controller);

new ScrollMagic.Scene({
    triggerElement: "#fcc",
    triggerHook: "onEnter",
    reverse: false
})
    .setTween(TweenMax.from("#fcc", 0.6, {y: -350, autoAlpha: 0.0, ease: Power0.easeIn}))
    .addTo(controller);

new ScrollMagic.Scene({
    triggerElement: "#blog .card",
    triggerHook: "onEnter",
    offset: 200,
    reverse: false
})
    .setTween(TweenMax.from("#blog .card", 0.7, {y: -350, scale: 0.6, autoAlpha: 0.0, ease: Power0.easeIn}))
    .addTo(controller);