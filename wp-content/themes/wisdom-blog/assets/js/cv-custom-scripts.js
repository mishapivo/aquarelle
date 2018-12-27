jQuery(document).ready(function($) {

    "use strict";

    if($('body').hasClass("rtl")) {
        var rtlValue = true;
    } else {
        var rtlValue = false;
    }

    /**
     * Header Search script
     */
    $('.cv-menu-search .cv-search-icon').click(function() {
        $('.cv-menu-search .cv-form-wrap').toggleClass('search-activate');
    });

    $('.cv-menu-search .cv-form-close').click(function() {
        $('.cv-menu-search .cv-form-wrap').removeClass('search-activate');
    });

    /**
     * Settings about WOW animation
     */
    new WOW().init();
    
    /**
     * Responsive
     */
    $('.menu-toggle').click(function(event) {
        $('#site-navigation').slideToggle('slow');
    });
    
    /**
     * responsive sub menu toggle
     */
    $('#site-navigation .menu-item-has-children').append('<span class="sub-toggle"> <i class="fa fa-angle-right"></i> </span>');
    $('#site-navigation .page_item_has_children').append('<span class="sub-toggle"> <i class="fa fa-angle-right"></i> </span>');
    

    $('#site-navigation .menu-item-has-children .sub-toggle').click(function() {
        $(this).parent('.menu-item-has-children').children('ul.sub-menu').first().slideToggle('1000');
        $(this).children('.fa-angle-right').first().toggleClass('fa-angle-down');
    });

    /**
     * Sticky sidebar
     */
    $('#primary, #secondary').theiaStickySidebar({
        additionalMarginTop: 40
    });

    /**
     * Scroll To Top
     */
    $(window).scroll(function() {
        if ($(this).scrollTop() > 1000) {
            $('#cv-scrollup').fadeIn('slow');
        } else {
            $('#cv-scrollup').fadeOut('slow');
        }
    });
    $('#cv-scrollup').click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

});