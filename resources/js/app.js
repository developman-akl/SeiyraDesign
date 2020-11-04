require('./bootstrap');

import Scrollbar from 'smooth-scrollbar';

var options = {
    'damping': 0.04,
    'continuousScrolling': false,
    'alwaysShowTracks': false,
}

var scrollbar = Scrollbar.init(document.querySelector('#main-scrollbar'), options);
Scrollbar.init(document.querySelector('#modal-simple'), options);

var page = 1;
var pageCount = 4;


function jumpRef(elem) {
    var ScrollIntoViewOptions = {
        alignToTop: true,
    };
    if (elem) {
        scrollbar.scrollIntoView(document.querySelector(elem), ScrollIntoViewOptions);
    }
}

function showImages(el, s) {
    var windowHeight = $(window).height();
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


/* TO TOP */
var scrollPrevTimer;
var scrollNextTimer;
var scrollTimer;
var scrollTimeout = 1700;

function showJumpRefButtons(s) {

    var windowHeight = $(window).height();
    var thisPos;

    if (s && s.offset !== 'undefine') {
        thisPos = s.offset.y;
    } else if (s && s > 0) {
        thisPos = s;
    }

    var topOfWindow = $(window).scrollTop();
    var pos = windowHeight - topOfWindow - 115;

    clearTimeout(scrollTimer);
    clearTimeout(scrollPrevTimer);
    clearTimeout(scrollNextTimer);

    if (pos < thisPos) {
        $('#btnPrev').fadeIn(150);
        $('#btnNext').fadeIn(150);
        scrollTimer = setTimeout(function () {
            $('#btnPrev').fadeOut(150);
            $('#btnNext').fadeOut(150);
        }, scrollTimeout);
    } else {
        $('#btnPrev').fadeOut();
        $('#btnNext').fadeOut();
    }
}



/* END TO TOP */


$(document).ready(function () {

    $('#btnPrev').on('mouseenter', function (e) {
        e.preventDefault();
        clearTimeout(scrollTimer);
        clearTimeout(scrollPrevTimer);
        clearTimeout(scrollNextTimer);
    });
    
    $('#btnPrev').on('mouseleave focusout', function (e) {
        e.preventDefault();
        clearTimeout(scrollTimer);
        clearTimeout(scrollNextTimer);
        scrollPrevTimer = setTimeout(function () {
            $('#btnPrev').fadeOut(150);
            $('#btnNext').fadeOut(150);
        }, scrollTimeout);
    });
    
    $('#btnNext').on('mouseenter', function (e) {
        e.preventDefault();
        clearTimeout(scrollTimer);
        clearTimeout(scrollPrevTimer);
        clearTimeout(scrollNextTimer);
    });
    $('#btnNext').on('mouseleave focusout', function (e) {
        e.preventDefault();
        clearTimeout(scrollTimer);
        clearTimeout(scrollPrevTimer);
        scrollNextTimer = setTimeout(function () {
            $('#btnPrev').fadeOut(150);
            $('#btnNext').fadeOut(150);
        }, scrollTimeout);
    });

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

        $('.navbar-toggler').click();
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
$("#contact-message").click(function (e) {
    // e.preventDefault();
    $("#contact-message").blur();
    $("#contact-message").focus();
    $.event.trigger({
        type: 'keypress'
    }); // works cross-browser
});

$("#btn-contact-send").click(function (e) {
    e.preventDefault();
    var button = $(this);
    var htmlOrig = button.html();

    button.prop("disabled", true);

    // add spinner to button
    button.html(
        '<p class="spinner-border spinner-border-lg mb-1 mr-1" role="status" aria-hidden="true"></p> SENDING...'
    );

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "POST",
        url: "/contact-us",
        dataType: 'json',
        data: {
            name: $("#contact-name").val(),
            email: $("#contact-email").val(),
            subject: $("#contact-subject").val(),
            message: $("#contact-message").val(),
        },
        success: function (response) {
            jumpRef('#contact');

            var messages = response.messages;
            var resultClass = response.success ? "alert-success" : "alert-danger";

            var messagesHtml = '<div id="responseTextParent" class="row mb-1 mt-1">' +
                '<div class="col-lg-12"><div id="responseText" class="alert ' + resultClass + '" role="alert">' +
                '<ul style="list-style-type:none;margin:0;padding:0;>';

            $.each(messages, function (key, value) {
                messagesHtml += '<li class="mb-1">' + value[0] + '</li>';
            });

            messagesHtml += '</ul></div></div></div>';

            $('.response_message').html(messagesHtml).fadeIn();

            if (response.success) {
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
        error: function (response, x, y) {
            var messagesHtml = '<div id="responseTextParent" class="row mb-1 mt-1">' +
                '<div class="col-lg-12"><div id="responseText" class="alert alert-danger rounded" role="alert">' +
                '<ul style="list-style-type:none;margin:0;padding:0;"><li class="mb-1">' + y + '</li></ul></div></div></div>';

            $('.response_message').html(messagesHtml);

            // restore button
            button.html(htmlOrig).fadeIn();

            button.prop("disabled", false);
        }
    });
});

$(document).ready(function () {
    "use strict";

    const iframe = document.getElementById("gallery-iframe");

    // Get the modal
    var modal = document.getElementById("modal-simple");
    var modalImg = document.getElementById("modalImg");
    var captionText = document.getElementById("caption");

    // Append app.css link to the iframe header after it was initialized
    iframe.onload = function () {
        var frm = iframe.contentWindow.document;
        var otherhead = frm.getElementsByTagName("head")[0];
        var link = frm.createElement("link");
        link.setAttribute("rel", "stylesheet");
        link.setAttribute("type", "text/css");
        link.setAttribute("href", "css/app.css");
        otherhead.appendChild(link);

        options = {
            'damping': 0.04,
            'continuousScrolling': true,
            'alwaysShowTracks': true,
        }

        Scrollbar.init(frm.querySelector('body'), options);

        var lazyloadImages;

        if ("IntersectionObserver" in window) {
            lazyloadImages = frm.querySelectorAll(".lazy");
            var imageObserver = new IntersectionObserver(function (entries, observer) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        var image = entry.target;
                        image.classList.remove("lazy");
                        imageObserver.unobserve(image);
                    }
                });
            });

            lazyloadImages.forEach(function (image) {
                imageObserver.observe(image);
            });
        } else {
            var lazyloadThrottleTimeout;
            lazyloadImages = frm.querySelectorAll(".lazy");

            function lazyload() {
                if (lazyloadThrottleTimeout) {
                    clearTimeout(lazyloadThrottleTimeout);
                }

                lazyloadThrottleTimeout = setTimeout(function () {
                    var scrollTop = window.pageYOffset;
                    lazyloadImages.forEach(function (img) {
                        if (img.offsetTop < (window.innerHeight + scrollTop)) {
                            img.src = img.dataset.src;
                            img.classList.remove('lazy');
                        }
                    });
                    if (lazyloadImages.length == 0) {
                        frm.removeEventListener("scroll", lazyload);
                        window.removeEventListener("resize", lazyload);
                        window.removeEventListener("orientationChange", lazyload);
                    }
                }, 20);
            }

            frm.addEventListener("scroll", lazyload);
            window.addEventListener("resize", lazyload);
            window.addEventListener("orientationChange", lazyload);
        }


        filterSelection("all")

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var grid = frm.getElementsByClassName("grid");
        for (var i = 0; i < grid.length; i++) {
            grid[i].onclick = function () {
                $('#btnPrev').fadeOut();
                $('#btnNext').fadeOut();

                modal.style.display = "block";
                let images = $(this).find('.img-modal-simple');
                for (const image of images) {
                    modalImg.src = image.src;
                    captionText.innerHTML = image.alt;
                }
            }
        };
    };

    $("#portfolioBtnContainer .btn").on('click', function (e) {
        filterSelection(e.target.dataset.selection);
    });

    // Get the <span> element that closes the modal
    // When the user clicks on <span> (x), close the modal
    $(".close").on('click touchend', function (e) {
        $('#btnPrev').fadeIn(150);
        $('#btnNext').fadeIn(150);
        modal.style.display = "none";
    });
    

    function filterSelection(c) {
        let x, i;
        x = iframe.contentWindow.document.getElementsByClassName("grid");
        if (c == "all") c = "";
        for (i = 0; i < x.length; i++) {
            RemoveClass(x[i], "show");
            if (x[i].className.indexOf(c) > -1) AddClass(x[i], "show");
        }
    }

    function AddClass(element, name) {

        let i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) == -1) {
                element.className += " " + arr2[i];
            }
        }
    }

    function RemoveClass(element, name) {

        let i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            while (arr1.indexOf(arr2[i]) > -1) {
                arr1.splice(arr1.indexOf(arr2[i]), 1);
            }
        }
        element.className = arr1.join(" ");
    }


    // Add active class to the current button (highlight it)
    var btnContainer = document.getElementById("portfolioBtnContainer");
    var btns = btnContainer.getElementsByClassName("btn");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function () {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }

});
