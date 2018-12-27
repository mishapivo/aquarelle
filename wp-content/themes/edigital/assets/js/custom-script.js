jQuery(document).ready(function($) {

    "use strict";

    $('.homepage-slider').lightSlider({
        adaptiveHeight: true,
        item: 1,
        slideMargin: 0,
        loop: true,
        pager: true,
        auto: true,
        speed: 1000,
        pause: 4200,
        enableDrag: false,
        controls: false,
        onSliderLoad: function() {
            $('.homepage-slider').removeClass('cS-hidden');
        }
    });

    /**
     * Testimonilas slider
     */
    $('.testimonialsSlider').lightSlider({
        item: 1,
        slideMargin: 0,
        loop: true,
        controls: false,
        auto: false,
        speed: 700,
        pause: 4200,
        enableDrag: false,
        onSliderLoad: function() {
            $('.testimonialsSlider').removeClass('cS-hidden');
        }
    });

    // toggle-menu
    jQuery('.menu-toggle').click(function(event) {
        jQuery('#primary-menu').slideToggle('slow');
    });

    //responsive sub menu toggle
    jQuery('#site-navigation .menu-item-has-children').append('<span class="sub-toggle"> <i class="fa fa-angle-right"></i> </span>');

    jQuery('#site-navigation .sub-toggle').click(function() {
        jQuery(this).parent('.menu-item-has-children').children('ul.sub-menu').first().slideToggle('1000');
        jQuery(this).children('.fa-angle-right').first().toggleClass('fa-angle-down');
    });

    // search js
    jQuery('.header-search-wrapper .search-main').click(function() {
        jQuery('.header-search-wrapper .search-form-main').addClass('active');
        jQuery('.header-search-wrapper .search-form-main .search-field').focus();
    });

    jQuery('.header-search-wrapper .close').click(function() {
        jQuery('.header-search-wrapper .search-form-main').removeClass('active');
    });


    // Scroll To Top
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > 1000) {
            jQuery('#mt-scrollup').fadeIn('slow');
        } else {
            jQuery('#mt-scrollup').fadeOut('slow');
        }
    });

    jQuery('#mt-scrollup').click(function() {
        jQuery("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    //edd wrap

    jQuery(".edd_download_inner").each(function() {
        jQuery(this).find("div, h3").not('.edd_download_image').wrapAll('<div class="edd-extra-wrapper"></div>');
    });
});
