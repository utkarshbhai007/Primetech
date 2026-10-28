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
    var lastScrollTop = 0;
    var delta = 6;
    var topThreshold = 40;

    $(window).scroll(function () {
        var currentScroll = $(window).scrollTop();

        // If drawer is open, don't auto-toggle header
        if ($("#stickySideDrawer").hasClass("open")) {
            lastScrollTop = currentScroll;
            return;
        }

        if (currentScroll < 0) {
            currentScroll = 0;
        }

        // Ignore micro scroll differences to avoid jitter
        if (Math.abs(lastScrollTop - currentScroll) <= delta) {
            return;
        }

        if (currentScroll <= topThreshold) {
            // At the top of the page: show natural full header
            header.removeClass("fixed");
        } else if (currentScroll > lastScrollTop && currentScroll > 90) {
            // Scrolling DOWN: collapse into slim sticky navbar (Logo + Menu ☰)
            header.addClass("fixed");
        } else if (currentScroll < lastScrollTop) {
            // Scrolling UP anywhere on the page: immediately restore full navbar with all options!
            header.removeClass("fixed");
        }

        lastScrollTop = currentScroll;
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
    // Mobile menu trigger using modern offcanvas drawer
    $("#mobile-menu-icon").click(function (e) {
        e.preventDefault();
        $("#stickySideDrawer").addClass("open");
        $("#stickyMenuBackdrop").addClass("open");
        $("body").addClass("drawer-opened");
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

    // Sticky navigation drawer open / close
    $("#stickyMenuBtn").on("click", function (e) {
        e.preventDefault();
        $("#stickySideDrawer").addClass("open");
        $("#stickyMenuBackdrop").addClass("open");
        $("body").addClass("drawer-opened");
    });

    $("#drawerCloseBtn, #stickyMenuBackdrop").on("click", function (e) {
        e.preventDefault();
        $("#stickySideDrawer").removeClass("open");
        $("#stickyMenuBackdrop").removeClass("open");
        $("body").removeClass("drawer-opened");
    });

    // Accordion toggle inside drawer
    $(".drawer-dropdown-toggle").on("click", function (e) {
        e.preventDefault();
        $(this).toggleClass("active");
        $(this).next(".drawer-submenu").slideToggle(250);
    });

    // Close on Escape key
    $(document).on("keydown", function (e) {
        if (e.key === "Escape" || e.keyCode === 27) {
            if ($("#stickySideDrawer").hasClass("open")) {
                $("#stickySideDrawer").removeClass("open");
                $("#stickyMenuBackdrop").removeClass("open");
                $("body").removeClass("drawer-opened");
            }
        }
    });

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