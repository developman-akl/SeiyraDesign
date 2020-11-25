require('./bootstrap');

import PhotoSwipe from 'photoswipe'
import PhotoSwipeUI_Default from 'photoswipe/dist/photoswipe-ui-default'

// import Scrollbar from 'smooth-scrollbar';

var page = 1;
var pageCount = 4;

var isMobile = false; //initiate as false
// device detection
if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) ||
    /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0, 4))) {
    isMobile = true;
}

function jumpRef(anchor) {
    if (anchor) {
        
        let ScrollIntoViewOptions = {
            alignToTop: true,
            behavior: 'smooth',
        };

        let selector = document.querySelector(anchor);
        selector.scrollIntoView(ScrollIntoViewOptions);
    }
}

function showImages(el, thisPos) {
    var windowHeight = $(window).height();

    $(el).each(function () {
        if (!$(this).hasClass("fadeIn")) {
            var topOfWindow = $(window).scrollTop();
            var pos = windowHeight - topOfWindow - 115;

            if (pos < thisPos) {
                $(this).addClass("fadeIn");
            }
        }
    });
}


/* TO TOP */

function showJumpRefButtons(thisPos) {
    var windowHeight = $(window).height();
    var topOfWindow = $(window).scrollTop();
    var pos = windowHeight - topOfWindow - 115;

    if (pos < thisPos) {
        $('#btnPrev').fadeIn(500);
        $('#btnNext').fadeIn(500);
    } 
    else {
        $('#btnPrev').fadeOut(1500);
        $('#btnNext').fadeOut(1500);
    }
}


$(document).ready(function () {
    if (window.location.href != window.location.origin+'/')
    {
        window.history.pushState("", "Seiyra Design", window.location.origin);
    }

    // Load gallery
    $( "#portfolio-gallery" ).load( window.location+"gallery", function() {
        $( "#btn-show-all" ).trigger('click');
    });

    if (isMobile) {
        var visibleText = $('.excerpt').text().substring(0, 141);
        var textToHide = $('.excerpt').text().substring(141);

        $('.excerpt')
            .html(visibleText + ('<span>' + textToHide + '</span>'))
            .append('<a id="read-more" title="Read More" style="display: block; cursor: pointer;">...</a>')
            .click(function () {
                $(this).find('span').toggle();
                $(this).find('a:last').toggle();
            });

        $('.excerpt span').hide();
    }

    $('#section-container').scroll(function (event) {
        if (!$('.devices').hasClass("fadeIn")) {
            showImages('.devices', $('#section-container').scrollTop());
        }
        showJumpRefButtons($('#section-container').scrollTop());

        var cutoff = $(window).scrollTop() + 80;
        $('section').each(function(){
            if($(this).offset().top + $(this).height() > cutoff){
                page = $(this).attr('data-page');
                return false; // stops the iteration after the first one on screen
            }
        });
    })

    $('.js-anchor-link').click(function (e) {
        let anchor = $(this).attr('data-anchor');
        page = $(this).attr('data-page');

        jumpRef(anchor);
    });


    document.getElementById("btnPrev").onclick = function (e) {
        if (page <= 1) {
            e.preventDefault();
            return false;
        }

        page -= 1;

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

    document.getElementById("btnNext").onclick = function (e) {
        if (page == pageCount) {
            e.preventDefault();
            return false;
        }

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

$(document).ready(function () {
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
});

$(document).ready(function () {
    "use strict";

    filterSelection("all");

    var initPhotoSwipeFromDOM = function (gallerySelector) {

        // parse slide data (url, title, size ...) from DOM elements 
        // (children of gallerySelector)
        var parseThumbnailElements = function (el) {
            var thumbElements = el.childNodes,
                numNodes = thumbElements.length,
                items = [],
                figureEl,
                linkEl,
                size,
                item;

            for (var i = 0; i < numNodes; i++) {

                figureEl = thumbElements[i]; // <figure> element

                // include only element nodes 
                if (figureEl.nodeType !== 1) {
                    continue;
                }

                linkEl = figureEl.children[0]; // <a> element

                size = linkEl.getAttribute('data-size').split('x');

                // create slide object
                item = {
                    src: linkEl.getAttribute('href'),
                    w: parseInt(size[0], 10),
                    h: parseInt(size[1], 10)
                };

                if (figureEl.children.length > 1) {
                    // <figcaption> content
                    item.title = figureEl.children[1].innerHTML;
                }

                if (linkEl.children.length > 0) {
                    // <img> thumbnail element, retrieving thumbnail url
                    item.msrc = linkEl.children[0].getAttribute('src');
                }

                item.el = figureEl; // save link to element for getThumbBoundsFn
                items.push(item);
            }

            return items;
        };

        // find nearest parent element
        var closest = function closest(el, fn) {
            return el && (fn(el) ? el : closest(el.parentNode, fn));
        };

        // triggers when user clicks on thumbnail
        var onThumbnailsClick = function (e) {
            e = e || window.event;
            e.preventDefault ? e.preventDefault() : e.returnValue = false;

            var eTarget = e.target || e.srcElement;

            // find root element of slide
            var clickedListItem = closest(eTarget, function (el) {
                return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
            });

            if (!clickedListItem) {
                return;
            }

            // find index of clicked item by looping through all child nodes
            // alternatively, you may define index via data- attribute
            var clickedGallery = clickedListItem.parentNode,
                childNodes = clickedListItem.parentNode.childNodes,
                numChildNodes = childNodes.length,
                nodeIndex = 0,
                index;

            for (var i = 0; i < numChildNodes; i++) {
                if (childNodes[i].nodeType !== 1) {
                    continue;
                }

                if (childNodes[i] === clickedListItem) {
                    index = nodeIndex;
                    break;
                }
                nodeIndex++;
            }

            if (index >= 0) {
                // open PhotoSwipe if valid index found
                openPhotoSwipe(index, clickedGallery);
                
                $('#btnPrev').hide(500);
                $('#btnNext').hide(500);
            }
            return false;
        };

        var openPhotoSwipe = function (index, galleryElement, disableAnimation, fromURL) {
            var pswpElement = document.querySelectorAll('.pswp')[0],
                gallery,
                options,
                items;

            items = parseThumbnailElements(galleryElement);

            // define options (if needed)
            options = {

                // define gallery index (for URL)
                galleryUID: galleryElement.getAttribute('data-pswp-uid'),

                modal: true,

                getThumbBoundsFn: function (index) {
                    // See Options -> getThumbBoundsFn section of documentation for more info
                    var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
                        pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                        rect = thumbnail.getBoundingClientRect();

                    return {
                        x: rect.left,
                        y: rect.top + pageYScroll,
                        w: rect.width
                    };
                },

                getDoubleTapZoom: function (isMouseClick, item) {
                    if(isMouseClick) {

                        // is mouse click on image or zoom icon
                        let size = item.el.children[0].getAttribute('data-size').split('x');
                        let naturalWidth = parseInt(size[0], 10);
                        let naturalHeight = parseInt(size[1], 10);
                        let windowWidth = $(window).width();
                        let windowHeight = $(window).height();
                        let full_width_ratio = Math.max(windowWidth / naturalWidth, windowHeight / naturalHeight)

                        if (!item.zoomLevel) {
                            item.zoomLevel = item.initialZoomLevel
                        }

                        let res;
                        if (naturalWidth > naturalHeight * 2) 
                        {
                            res = full_width_ratio * 2;
                        }
                        else
                        {
                            if (item.zoomLevel < full_width_ratio * 0.55) 
                            {
                                res = full_width_ratio * 0.55;
                            } 
                            else
                            if (item.zoomLevel < full_width_ratio) 
                            {
                                res = full_width_ratio;
                            }
                            else
                            {
                                res = item.initialZoomLevel;
                            }
                        }

                        item.zoomLevel = res;
                        return res;

                    } else {

                        // is double-tap

                        // zoom to original if initial zoom is less than 0.45x,
                        // otherwise to 0.65x, to make sure that double-tap gesture always zooms image
                        return item.initialZoomLevel < 0.2 ? 0.45 : 0.65;
                    }
                },

                maxSpreadZoom: 0.65,

            };

            // PhotoSwipe opened from URL
            if (fromURL) {
                if (options.galleryPIDs) {
                    // parse real index when custom PIDs are used 
                    // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
                    for (var j = 0; j < items.length; j++) {
                        if (items[j].pid == index) {
                            options.index = j;
                            break;
                        }
                    }
                } else {
                    // in URL indexes start from 1
                    options.index = parseInt(index, 10) - 1;
                }
            } else {
                options.index = parseInt(index, 10);
            }

            // exit if index not found
            if (isNaN(options.index)) {
                return;
            }

            if (disableAnimation) {
                options.showAnimationDuration = 0;
            }

            options.loop = true;
            options.focus = true;
            options.bgOpacity = 0.9;
            options.closeOnScroll = false;

            options.preload = [2, 2]; // [1,3], it'll load 1 image before the current, and 3 images after current.

            // Pass data to PhotoSwipe and initialize it
            gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options);
            gallery.init();

            gallery.listen('close', function (item, index) {
                $('#btnPrev').show(500);
                $('#btnNext').show(500);
            });

        };

        // loop through all gallery elements and bind events
        var galleryElements = document.querySelectorAll(gallerySelector);

        for (var i = 0, l = galleryElements.length; i < l; i++) {
            galleryElements[i].setAttribute('data-pswp-uid', i + 1);
            galleryElements[i].onclick = onThumbnailsClick;
        }

    };

    // execute above function
    initPhotoSwipeFromDOM('.portfolio-gallery');

    $("#portfolioBtnContainer .btn").on('click', function (e) {
        filterSelection(e.target.dataset.selection);
    });


    function filterSelection(c) {
        let x, i;
        x = document.getElementsByClassName("grid");
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


document.addEventListener("DOMContentLoaded", function () {
    var lazyloadImages;

    if ("IntersectionObserver" in window) {
        lazyloadImages = document.querySelectorAll(".lazy");
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
        lazyloadImages = document.querySelectorAll(".lazy");

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
                    document.removeEventListener("scroll", lazyload);
                    window.removeEventListener("resize", lazyload);
                    window.removeEventListener("orientationChange", lazyload);
                }
            }, 20);
        }

        document.addEventListener("scroll", lazyload);
        window.addEventListener("resize", lazyload);
        window.addEventListener("orientationChange", lazyload);
    }
});
