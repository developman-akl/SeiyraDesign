require('./bootstrap');

import Scrollbar from 'smooth-scrollbar';
import easing from 'easing-js';

var options = {
    'damping': 0.05,
    // 'syncCallbacks' : true,
    // 'alwaysShowTracks' : true,
    // 'wheelEventTarget' : initScrollbar,
}

const scrollbar = Scrollbar.init(document.querySelector('#main-scrollbar'), options);

$(document).ready(function () {
    scrollbar.addListener((s) => {
        if (!$('.devices').hasClass("fadeIn")) {
            showImages('.devices', s);
        }
    })

    /*
        Smooth scrollbar functionality for anchor links (animates the scrollbar
        rather than a sudden jump in the page)
    */
    $('.js-anchor-link').click(function (e) {
        e.preventDefault();
        var elem = $(this).attr('href');
        // var target = document.getElementById(elem);

        var ScrollIntoViewOptionsDefault = {
            alignToTop: false,
            offsetBottom: 0,
        };

        var ScrollIntoViewOptionsWelcome = {
            alignToTop: true,
            // offsetTop: -83,
        };
// debugger;
        if (elem) {
            scrollbar.scrollIntoView(document.querySelector(elem), elem == '#welcome' ? ScrollIntoViewOptionsWelcome : ScrollIntoViewOptionsDefault);
        }
    });

});

function showImages(el, s) {
    var windowHeight = jQuery(window).height();
    $(el).each(function () {
        if (!$(this).hasClass("fadeIn")) {
            var thisPos;
            if (s && s.offset !== 'undefine') {
                thisPos = s.offset.y;
            } else if (s && s > 0) {
                var thisPos = s;
            }

            var topOfWindow = $(window).scrollTop();
            var pos = windowHeight - topOfWindow - 115;

            if (pos < thisPos) {
                $(this).addClass("fadeIn");
            }
        }
    });
}
