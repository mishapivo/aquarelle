/**
 * Custom js for theme
 */

(function ($) {
    $(document).ready(function () {
        $(".twp-slider-5").owlCarousel({
            loop: ($('.twp-slider-5').children().length) == 1 ? false : true,
            margin: 3,
            autoplay: 5000,
            nav: true,
            navText: ["<i class='ion-ios-arrow-left'></i>", "<i class='ion-ios-arrow-right'></i>"],
            items: 1
        });
    });
})(jQuery);