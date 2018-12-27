<?php
/**
 * Sanizitation for all fields
 * 
 * @package AccessPress Themes
 * @subpackage vmagazine-lite
 * @since 1.0.0
 */

//Text
function vmagazine_lite_sanitize_text( $input ) {
    return wp_kses_post($input);
}

// Number
function vmagazine_lite_sanitize_number( $input ) {
    $output = intval($input);
     return $output;
}

//Checkbox
function vmagazine_lite_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

//switch option
function vmagazine_lite_sanitize_switch_option( $input ) {
    $valid_keys = array(
            'show'  => esc_html__( 'Show', 'vmagazine-lite' ),
            'hide'  => esc_html__( 'Hide', 'vmagazine-lite' )
        );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}

function vmagazine_lite_fallback_option_callback( $control ) {
    if ( $control->manager->get_setting('post_fallback_img_option')->value() == 'show' ) {
        return true;
    } else {
        return false;
    }
}

// page sidebar
function vmagazine_lite_sanitize_page_sidebar( $input ) {
    $valid_keys = array(
            'right_sidebar' => get_template_directory_uri() . '/inc/assets/images/right-sidebar.png',
            'left_sidebar' => get_template_directory_uri() . '/inc/assets/images/left-sidebar.png',
            'both_sidebar' => get_template_directory_uri() . '/assets/images/both-sidebar.png',
            'no_sidebar' => get_template_directory_uri() . '/inc/assets/images/no-sidebar.png',
            
        );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}

//Related Post type
function vmagazine_lite_sanitize_related_type( $input ) {
    $valid_keys = array(
            'related_cat'   => esc_html__( 'Related Posts by Category', 'vmagazine-lite' ),
            'related_tag'   => esc_html__( 'Related Posts by Tags', 'vmagazine-lite' )
        );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}



/**
 * Callback functions
 */

function vmagazine_lite_related_post_option_callback( $control ) {
    if ( $control->manager->get_setting('vmagazine_lite_related_posts_option')->value() == 'show' ) {
        return true;
    } else {
        return false;
    }
}

function vmagazine_lite_ticker_disp_typ(){
    $vmagazine_lite_ticker_disp_option = get_theme_mod('vmagazine_lite_ticker_disp_option','latest-post');
    if( $vmagazine_lite_ticker_disp_option == 'cat-post' ){
        return true;
    }
    return false;
}

function vmagazine_lite_footer_layout_switcher(){
    $vmagazine_lite_footer_layout = get_theme_mod('vmagazine_lite_footer_layout','footer_layout_1');
    if( $vmagazine_lite_footer_layout == 'footer_layout_1' ){
        return true;
    }
    return false;
}