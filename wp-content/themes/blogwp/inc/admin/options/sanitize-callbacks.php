<?php
/**
* Sanitize callback functions
*
* @package BlogWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function blogwp_sanitize_checkbox( $input ) {
    return ( ( isset( $input ) && ( true == $input ) ) ? true : false );
}

function blogwp_sanitize_html( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function blogwp_sanitize_thumbnail_link( $input, $setting ) {
    $valid = array('yes','no');
    if ( in_array( $input, $valid ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function blogwp_sanitize_post_style( $input, $setting ) {
    $valid = array('style-5','style-9');
    if ( in_array( $input, $valid ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function blogwp_sanitize_email( $input, $setting ) {
    if ( '' != $input && is_email( $input ) ) {
        $input = sanitize_email( $input );
        return $input;
    } else {
        return $setting->default;
    }
}

function blogwp_sanitize_read_more_length( $input, $setting ) {
    $input = absint( $input ); // Force the value into non-negative integer.
    return ( 0 < $input ) ? $input : $setting->default;
}

function blogwp_sanitize_positive_integer( $input, $setting ) {
    $input = absint( $input ); // Force the value into non-negative integer.
    return ( 0 < $input ) ? $input : $setting->default;
}

function blogwp_sanitize_featured_content_type( $input, $setting ) {
    $valid = array('recent-posts','category-posts');
    if ( in_array( $input, $valid ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}