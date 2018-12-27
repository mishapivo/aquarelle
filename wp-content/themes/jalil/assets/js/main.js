(function ($) {
    "use strict";
    //Document ready function
    jQuery(document).ready(function($){

        // Mobile Menu
        $("#primary-menu").slicknav({
            'allowParentLinks': true,
            'prependTo': '.jalil-responsive-menu', 
        }); 

        /*======================================
        // Extra JS
        ======================================*/    
        $('.button').on("click", function (e) {
            var anchor = $(this);
                $('html, body').stop().animate({
                    scrollTop: $(anchor.attr('href')).offset().top - 70
            }, 1000);
            e.preventDefault();
        });
        
        /*======================================
        // Scrool Up
        ======================================*/  
        $.scrollUp({
            scrollName: 'scrollUp',      // Element ID
            scrollDistance: 300,         // Distance from top/bottom before showing element (px)
            scrollFrom: 'top',           // 'top' or 'bottom'
            scrollSpeed: 1000,            // Speed back to top (ms)
            easingType: 'linear',        // Scroll to top easing (see http://easings.net/)
            animation: 'fade',           // Fade, slide, none
            animationSpeed: 200,         // Animation speed (ms)
            scrollTrigger: false,        // Set a custom triggering element. Can be an HTML string or jQuery object
            scrollTarget: false,         // Set a custom target element for scrolling to. Can be element or number
            scrollText: ["<i class='fa fa-angle-up'></i>"], // Text for element, can contain HTML
            scrollTitle: false,          // Set a custom <a> title if required.
            scrollImg: false,            // Set true to use image
            activeOverlay: false,        // Set CSS color to display scrollUp active point, e.g '#00FFFF'
            zIndex: 2147483647           // Z-Index for the overlay
        }); 
    });//End document ready function 

    // Preloader
    function wl_cole() {
        $('.loader').fadeOut('slow', function(){
            $(this).remove();
        });
    }
    
    //Window Load Functon
    $(window).on('load', function() {
        wl_cole();
    });
}(jQuery)); 