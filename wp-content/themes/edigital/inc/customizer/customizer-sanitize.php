<?php
/**
 * Sanitation for all customizer fields
 * 
 * @package Mystery Themes
 * @subpackage EDigital
 * @since 1.0.0
 */

//Checkbox
function edigital_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

// site layout
function edigital_sanitize_site_layout( $input ) {
    $valid_keys = array(
            'fullwidth_layout' => __( 'FullWidth Layout', 'edigital' ),
            'boxed_layout'     => __( 'Boxed Layout', 'edigital' )
        );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}

//switch option
function edigital_sanitize_show_switch( $input ) {
    $valid_keys = array(
            'show'  => __( 'Show', 'edigital' ),
            'hide'  => __( 'Hide', 'edigital' )
        );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}