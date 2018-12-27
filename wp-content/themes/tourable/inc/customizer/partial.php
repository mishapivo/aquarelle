<?php
/**
* Partial functions
*
* @package Theme Palace
* @subpackage Tourable
* @since Tourable 1.0.0
*/

if ( ! function_exists( 'tourable_trip_search_title_partial' ) ) :
    // trip search title
    function tourable_trip_search_title_partial() {
        $options = tourable_get_theme_options();
        return esc_html( $options['trip_search_title'] );
    }
endif;

if ( ! function_exists( 'tourable_traveler_choice_title_partial' ) ) :
    // traveler choice title
    function tourable_traveler_choice_title_partial() {
        $options = tourable_get_theme_options();
        return esc_html( $options['traveler_choice_title'] );
    }
endif;

if ( ! function_exists( 'tourable_popular_destination_title_partial' ) ) :
    // popular destination title
    function tourable_popular_destination_title_partial() {
        $options = tourable_get_theme_options();
        return esc_html( $options['popular_destination_title'] );
    }
endif;

if ( ! function_exists( 'tourable_cta_btn_title_partial' ) ) :
    // cta btn title
    function tourable_cta_btn_title_partial() {
        $options = tourable_get_theme_options();
        return esc_html( $options['cta_btn_title'] );
    }
endif;

if ( ! function_exists( 'tourable_blog_title_partial' ) ) :
    // blog title
    function tourable_blog_title_partial() {
        $options = tourable_get_theme_options();
        return esc_html( $options['blog_title'] );
    }
endif;

if ( ! function_exists( 'tourable_copyright_text_partial' ) ) :
    // copyright text
    function tourable_copyright_text_partial() {
        $options = tourable_get_theme_options();
        return esc_html( $options['copyright_text'] );
    }
endif;
