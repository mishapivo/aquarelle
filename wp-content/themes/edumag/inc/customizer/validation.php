<?php
/**
* Customizer validation functions
*
* @package Theme Palace
* @subpackage EduMag
* @since EduMag 0.1
*/

function edumag_validate_long_excerpt( $validity, $value ){
    $value = intval( $value );

    if ( empty( $value ) || ! is_numeric( $value ) ) {
       $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'edumag' ) );
    } elseif ( $value < 5 ) {
       $validity->add( 'min_no_of_words', esc_html__( 'Minimum no of words is 5', 'edumag' ) );
    } elseif ( $value > 100 ) {
       $validity->add( 'max_no_of_words', esc_html__( 'Maximum no of words is 100', 'edumag' ) );
    }
    return $validity;
}

function edumag_validate_short_excerpt( $validity, $value ){
    $value = intval( $value );
    
    if ( empty( $value ) || ! is_numeric( $value ) ) {
       $validity->add( 'required', esc_html__( 'You must supply a valid number.', 'edumag' ) );
    } elseif ( $value < 5 ) {
       $validity->add( 'min_no_of_words', esc_html__( 'Minimum no of words is 5', 'edumag' ) );
    } elseif ( $value > 25 ) {
       $validity->add( 'max_no_of_words', esc_html__( 'Maximum no of words is 25', 'edumag' ) );
    }
    return $validity;
}
