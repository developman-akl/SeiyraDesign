require('./bootstrap');

import Scrollbar from 'smooth-scrollbar';

var options = {
    'damping': 0.05,
}

const scrollbar = Scrollbar.init(document.querySelector('#main-scrollbar'), options);

var page = 1;
var pageCount = 4;


function jumpRef(elem) {
    var ScrollIntoViewOptionsDefault = {
        alignToTop: false,
        offsetBottom: 0,
    };
    var ScrollIntoViewOptionsWelcome = {
        alignToTop: true,
    };
    if (elem) {
        scrollbar.scrollIntoView(document.querySelector(elem), elem == '#welcome' ? ScrollIntoViewOptionsWelcome : ScrollIntoViewOptionsDefault);
    }
}

function showImages(el, s) {
    var windowHeight = jQuery(window).height();
    var thisPos;

    $(el).each(function () {
        if (!$(this).hasClass("fadeIn")) {
            if (s && s.offset !== 'undefine') {
                thisPos = s.offset.y;
            } else if (s && s > 0) {
                thisPos = s;
            }

            var topOfWindow = $(window).scrollTop();
            var pos = windowHeight - topOfWindow - 115;

            if (pos < thisPos) {
                $(this).addClass("fadeIn");
            }
        }
    });
}


function showJumpRefButtons(s) {
   
    var windowHeight = jQuery(window).height();
    var thisPos;

    if (s && s.offset !== 'undefine') {
        thisPos = s.offset.y;
    } else if (s && s > 0) {
        thisPos = s;
    }

    var topOfWindow = $(window).scrollTop();
    var pos = windowHeight - topOfWindow - 115;
    
    if (pos < thisPos) {
        $('#btnPrev').fadeIn();
        $('#btnNext').fadeIn();
    } else {
        $('#btnPrev').fadeOut();
        $('#btnNext').fadeOut();
    }
}


$(document).ready(function () {
    scrollbar.addListener((s) => {
        if (!$('.devices').hasClass("fadeIn")) {
            showImages('.devices', s);
        }
        showJumpRefButtons(s);
    })

    $('.js-anchor-link').click(function (e) {
        e.preventDefault();

        var elem = $(this).attr('href');

        jumpRef(elem);

        switch (elem) {
            case '#welcome':
                page = 1;
                break;
            case '#services':
                page = 2;
                break;
            case '#portfolio':
                page = 3;
                break;
            case '#contact':
                page = 4;
                break;
        }
    });

});


/* TO TOP */

$(document).ready(function () {
    "use strict";

    document.getElementById("btnPrev").onclick = function () {
        page = ((page + pageCount + 2) % pageCount) + 1;

        switch (page) {
            case 1:
                jumpRef('#welcome');
                break;
            case 2:
                jumpRef('#services');
                break;
            case 3:
                jumpRef('#portfolio');
                break;
            case 4:
                jumpRef('#contact');
                break;
        }
    };

    document.getElementById("btnNext").onclick = function () {
        page = (page % pageCount) + 1;

        switch (page) {
            case 1:
                jumpRef('#welcome');
                break;
            case 2:
                jumpRef('#services');
                break;
            case 3:
                jumpRef('#portfolio');
                break;
            case 4:
                jumpRef('#contact');
                break;
        }
    };

});

/* END TO TOP */
