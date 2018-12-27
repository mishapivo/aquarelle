<?php
/**
 *
 * This contains sanitize functions for customizer options
 *
 * @package Alacrity Lite
*/

function alacrity_lite_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}
function alacrity_lite_sanitize_checkbox($input) {
    if ($input == 1) {
        return 1;
    } else {
        return '';
    }
}