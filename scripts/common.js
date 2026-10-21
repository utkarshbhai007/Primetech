$.fn.handleResize = function ()
{
    var vWHeight = $(window).height();
    var vHHeight = $('header').outerHeight();
    var vBHeight = $('#banner-inner').outerHeight();
    var vFHeight = $('footer').outerHeight();

    var vMHeight = vWHeight - (vHHeight + vBHeight + vFHeight);

    $('#main-container').css('min-height', ((vMHeight) + 71 + 'px'));
};

$(function () {
    var header = $("header");
    var headerHeight = $('header').outerHeight();
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();

        if (scroll >= headerHeight) {
            header.addClass("fixed");
        } else {
            header.removeClass("fixed");
        }
    });
});

$(document).ready(function () {

    //Check to see if the window is top if not then display button
    $(window).scroll(function () {
        if ($(window).scrollTop() > 10) {
            $("#totop").stop(true, false).animate({"bottom": "40", "opacity": "1"}, 500);
        } else {
            $("#totop").stop(true, false).animate({"bottom": "-45", "opacity": "0"}, 500);
        }
    });

    // Click event to scroll to top
    $('#totop').click(function () {
        $('html, body').animate({scrollTop: 0}, 800);
        return false;
    });

    //mobile menu script
    //$("body").attr('id', 'page');
    $("#main-menu > ul, #pro-menu ul").clone().appendTo("#mobile-menu");
    $("#mobile-menu-icon").click(function () {
        if ($(this).hasClass("active"))
        {
            $(this).removeClass("active");
            $("#wrapper").animate({"left": "0"}, 500);
        } else
        {
            $(this).addClass("active");
            $("#wrapper").animate({"left": "-250px"}, 500);

        }

        if ($("#mobile-menu").hasClass("active")) {
            $("#mobile-menu").removeClass("active");
            $("#mobile-menu").animate({"right": "-250px"}, 500);
        } else
        {
            $("#mobile-menu").addClass("active");
            $("#mobile-menu").animate({"right": "0"}, 500);
        }
    });

    $('#mobile-menu ul li.submenu-one>a').prepend('<span class="submenu"></span>');
    $('#mobile-menu ul li.submenu-one>a').click(function (e) {
        var href = $(this).attr('href');
        if ($(e.target).hasClass('submenu') || !href || href === '#' || href === 'javascript:;') {
            $(this).parent().children().eq(1).slideToggle(500);
            $(this).parent().toggleClass('changebg');
            return false;
        }
    });

    $('#mobile-menu ul li ul li.submenu-two>a').prepend('<span class="submenu"></span>');
    $('#mobile-menu ul li ul li.submenu-two>a').click(function (e) {
        $(this).parent().children().eq(1).slideToggle(500);
        $(this).parent().toggleClass('changebg');
        return false;
    });

    $('#mobile-menu ul li ul li ul li.submenu-three>a').prepend('<span class="submenu"></span>');
    $('#mobile-menu ul li ul li ul li.submenu-three>a').click(function (e) {
        $(this).parent().children().eq(1).slideToggle(500);
        $(this).parent().toggleClass('changebg');
        return false;
    });

    var vHBottom = $('header #bottom').height();
    $('#banner-inner').css({'marginTop': -vHBottom + 'px', 'paddingTop': vHBottom + 'px'});

    $.fn.header = function () {
        var hHeight = $('header').outerHeight();
        $('#wrapper, #mobile-menu').css({'paddingTop': hHeight + 'px'});
    };

    $.fn.header();

    $.fn.handleResize();

    if ($('#our-partner .slider').length) {
        $('#our-partner .slider').owlCarousel({
            lazyLoad: true, loop: true, dots: false, margin: 20, nav: true, navText: "", autoplay: 500, autoplaySpeed: 1000,
            responsive: {
                0: {items: 2, slideBy: 2},
                600: {items: 3, slideBy: 3},
                1000: {items: 4, slideBy: 4}
            }
        });
    }

    if ($(window).width() < 768) {

        $('#tabs-outer').mCustomScrollbar({
            axis: 'x',
            theme: "minimal",
            advanced: {autoExpandHorizontalScroll: true}
        });
    }

});

// text selection disable script
$(document).ready(function () {
    (function ($) {
        var methods = {
            disable: function () {
                return $(this)
                        .attr('unselectable', 'on')
                        .css({
                            '-webkit-user-select': 'none',
                            '-khtml-user-select': 'none',
                            '-moz-user-select': 'none',
                            '-o-user-select': 'none',
                            '-user-select': 'none'
                        })
                        .each(function () {
                            this.onselectstart = function () {
                                return false;
                            };
                        });
            }
        };

        $.fn.textSelect = function (method) {
            // Method calling logic
            if (methods[method]) {
                return methods[ method ].apply(this, Array.prototype.slice.call(arguments, 1));
            } else {
                $.error('Method ' + method + ' does not exist on jQuery.textSelect');
            }
        };


    })(jQuery);
    $('body').textSelect('disable');

});


// Right click disable script
$(document).bind('contextmenu', function (e) {
    e.preventDefault();
    // alert('Right Click is not allowed');
});

$(window).resize(function () {
    $.fn.header();
    $.fn.handleResize();
});