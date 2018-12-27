(function($) {
    'use strict';

    $(window).load(function() {
        $('.preloader-wrapper').fadeOut();
    });

    /*---------------------------------------
       PORTFOLIO IMAGE LODED WITH MASONRY
    -----------------------------------------*/
    var $PortfolioMasonry = $('.portfolio-masonry');

    if (typeof imagesLoaded === 'function') {
        imagesLoaded($PortfolioMasonry, function() {
            setTimeout(function() {
                $PortfolioMasonry.isotope({
                    itemSelector: '.portfolio-item',
                    resizesContainer: false,
                    layoutMode: 'masonry',
                    filter: '*'
                });
            }, 500);

        });
    };

    /*-------------------------------------------
     SCROLL TO TOP BUTTON ADDED
    ---------------------------------------------*/
    $('body').append('<a id="scroll-btn" class="scroll-btn" href="#"><i class="ti-arrow-up"></i></a>');
    if ($('#scroll-btn').length) {
        var scrollTrigger = 100, // px
            backToTop = function() {
                var scrollTop = $(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    $('#scroll-btn').addClass('btn-show');
                } else {
                    $('#scroll-btn').removeClass('btn-show');
                }
            };
        backToTop();
        $(window).on('scroll', function() {
            backToTop();
        });
        $('#scroll-btn').on('click', function(e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: 0
            }, 500);
        });
    };

    /*--------------------------------
       VENOBOX GALLARY IMAGE VIEW
    -----------------------------------*/
    $('.venobox').venobox();

    // Mainmenu JS
    jQuery('.mobile-menu-custom').meanmenu();

    /*--------------------------------
        WOW JS
    -----------------------------------*/
    new WOW().init();

     // ONEPAGENAV NAV

    // $('.main-menu').onePageNav();

    // Mainmenu JS
    jQuery('.mobile-menu').meanmenu();

    /* ---------------------------------------------
        3. Header sticky style.
    --------------------------------------------- */
    $(window).on('scroll', function() {
        var wSize = $(window).width();
        if (wSize > 1 && $(this).scrollTop() > 1) {
            $('#sticky-header').addClass('sticky-fixed');
        } else {
            $('#sticky-header').removeClass('sticky-fixed');
        }
    });

    /* ---------------------------------------------
     MENU HAMBURGER AND FULL SCREEN  OVERLAY.
    --------------------------------------------- */
    $('.hamburger').on('click', function() {
        $(this).toggleClass('is-active');
        $(this).next().toggleClass('nav-show')
    });
    $('.menu-button a').on('click', function() {
        $('.overlay').fadeToggle(300);
        $(this).toggleClass('btn-open').toggleClass('btn-close');
    });
    $('.overlay').on('click', function() {
        $('.menu-button').fadeToggle(300);
        $('.button a').toggleClass('btn-open').toggleClass('btn-close');
        open = false;
    });

    //Homepage Three Slider Main Section

    $(".slider-wrapper").owlCarousel({
        items: 1,
        nav: true,
        dots: false,
        autoplay: true,
        loop: true,
        navText: ["<i class='ti-angle-left'></i>", "<i class='ti-angle-right'></i>"],
        mouseDrag: false,
        touchDrag: false,
        smartSpeed: 700
    });

    $('.search-icon').on('click', function() {
        $('.search-box').fadeToggle('fade');
        $('.search-box').toggleClass('show-box');
    });


    /* ---------------------------------------------
       scrollSpeed Js
    --------------------------------------------- */
    jQuery.scrollSpeed(100, 600);


})(jQuery);