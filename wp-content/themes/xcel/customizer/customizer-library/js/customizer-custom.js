/**
 * Xcel Customizer Custom Functionality
 *
 */
( function( $ ) {
    
    $( window ).load( function() {
        
        var the_select_value = $( '#customize-control-xcel-setting-slider-type select' ).val();
        xcel_customizer_slider_check( the_select_value );
        
        $( '#customize-control-xcel-setting-slider-type select' ).on( 'change', function() {
            var select_value = $( this ).val();
            xcel_customizer_slider_check( select_value );
        } );
        
        function xcel_customizer_slider_check( select_value ) {
            if ( select_value == 'xcel-setting-slider-default' ) {
                $( '#customize-control-xcel-setting-meta-slider-shortcode' ).hide();
                $( '#customize-control-xcel-setting-slider-cats' ).show();
                $( '#customize-control-xcel-setting-upsell-four' ).show();
                $( '#customize-control-xcel-setting-upsell-slider' ).show();
            } else if ( select_value == 'xcel-setting-meta-slider' ) {
                $( '#customize-control-xcel-setting-slider-cats' ).hide();
                $( '#customize-control-xcel-setting-meta-slider-shortcode' ).show();
                $( '#customize-control-xcel-setting-upsell-four' ).hide();
                $( '#customize-control-xcel-setting-upsell-slider' ).hide();
            } else {
                $( '#customize-control-xcel-setting-slider-cats' ).hide();
                $( '#customize-control-xcel-setting-meta-slider-shortcode' ).hide();
                $( '#customize-control-xcel-setting-upsell-four' ).hide();
                $( '#customize-control-xcel-setting-upsell-slider' ).hide();
            }
        }
        
    } );
    
} )( jQuery );