require('./bootstrap');

import Scrollbar from 'smooth-scrollbar';

var options = {
    'damping': 0.05,
}

$(document).ready(function () {
    const Scroll = Scrollbar.init(document.querySelector('#main-scrollbar'), options);
    
    Scroll.addListener((s) => {
        console.log(s.offset.y) // returns “scrollTop” equivalent
        showImages('.devices', s);
    })
});

function showImages(el, s) {
    var windowHeight = jQuery( window ).height();
    $(el).each(function () {
        var thisPos = s && s.offset !== 'undefine' ? s.offset.y : 0;

        var topOfWindow = $(window).scrollTop();
        var pos = windowHeight - topOfWindow;
    
        if (pos < thisPos && !$(this).hasClass("fadeIn")) {
                debugger;
                $(this).addClass("fadeIn");

        }
    });
}