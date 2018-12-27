/**
 * Scripts within the customizer controls window.
 *
 * Contextually shows the color hue control and informs the preview
 * when users open or close the front page sections section.
 */

(function( $, api ) {
    var rangeSlider = function() {
        var slider = $('.range-slider'),
            range = $('.range-slider__range'),
            value = $('.range-slider__value');

        slider.each(function() {

            value.each(function() {
                var value = $(this).prev().attr('value');
                var suffix = ($(this).prev().attr('suffix')) ? $(this).prev().attr('suffix') : '';
                $(this).html(value + suffix);
            });

            range.on('input', function() {
                var suffix = ($(this).attr('suffix')) ? $(this).attr('suffix') : '';
                $(this).next(value).html(this.value + suffix );
            });
        });
    };

    wp.customize.bind('ready', function() {
        
        rangeSlider();

         // Deep linking for to widget area section.
        jQuery('.store-mall-widget-jump-to-widget').click(function(e) {
            e.preventDefault();
            wp.customize.section( 'sidebar-widgets-homepage-area' ).focus()
        });
    });
})( jQuery, wp.customize );
