var christmas_hestia_frontend = function ( $ ) {
    'use strict';

    $(
        function () {
            $('.page-header').snowfall({flakeCount: 10, minSize: 5, shadow: true, round: true});


            christmasHestiaFixLights();

            $( window ).resize(
                function () {
                    christmasHestiaFixLights();
                }
            );
        }
    );
};

christmas_hestia_frontend( jQuery );

function christmasHestiaFixLights() {
    var navHeight = jQuery('.navbar').outerHeight();
    if( jQuery('body').hasClass('admin-bar') ) {
        navHeight = navHeight + jQuery('#wpadminbar').outerHeight();
    }
    jQuery('#hestia-lights').css('margin-top', navHeight);
}

