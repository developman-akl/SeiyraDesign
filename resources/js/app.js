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
$("#contact-message").click(function(e) {
    // e.preventDefault();
    $("#contact-message").blur();
    $("#contact-message").focus();
    $.event.trigger({ type : 'keypress' }); // works cross-browser
});

$("#btn-contact-send").click(function(e) {
    e.preventDefault();
    var button = $(this);
    var htmlOrig = button.html();

    button.prop("disabled", true);

      // add spinner to button
    button.html(
        '<span class="spinner-border spinner-border-sm mb-2 mr-1" role="status" aria-hidden="true"></span> Sending...'
    );

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "POST",
        url:  "/contact-us",
        dataType: 'json',
        data: { 
            name: $("#contact-name").val(),
            email: $("#contact-email").val(),
            subject: $("#contact-subject").val(),
            message: $("#contact-message").val(),
        },
        success: function(response) {
            jumpRef('#contact');

            var messages = response.messages;
            var resultClass = response.success ? "alert-success" : "alert-danger";
            
            var messagesHtml = '<div id="responseTextParent" class="row mb-1 mt-1">' +
            '<div class="col-lg-12"><div id="responseText" class="alert ' + resultClass + '" role="alert">' +
            '<ul style="list-style-type:none;margin:0;padding:0;>';
    
            $.each( messages, function( key, value ) {
                messagesHtml += '<li class="mb-1">'+ value[0] + '</li>';
            });
            
            messagesHtml += '</ul></div></div></div>';

            $('.response_message').html(messagesHtml).fadeIn();
            
            if (response.success)
            {
                $("#contact-name").val(null);
                $("#contact-email").val(null);
                $("#contact-subject").val(null);
                $("#contact-message").val(null);
            }

            $('.response_message').delay(4000).hide(1500);

            // restore button
            button.html(htmlOrig).fadeIn();

            button.prop("disabled", false);
        },
        error: function(response ,x, y) {
            var messagesHtml = '<div id="responseTextParent" class="row mb-1 mt-1">' +
            '<div class="col-lg-12"><div id="responseText" class="alert alert-danger rounded" role="alert">' +
            '<ul style="list-style-type:none;margin:0;padding:0;"><li class="mb-1">'+ y + '</li></ul></div></div></div>';

            $('.response_message').html(messagesHtml);

            // restore button
            button.html(htmlOrig).fadeIn();

            button.prop("disabled", false);
        }
    });
});