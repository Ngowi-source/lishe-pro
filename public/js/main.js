//scrollmagic animations
var controller = new ScrollMagic.Controller();

new ScrollMagic.Scene({
    triggerElement: "#header",
    triggerHook: "onLeave",
    offset: 1
})
    .setPin("#header")
    .addTo(controller);
