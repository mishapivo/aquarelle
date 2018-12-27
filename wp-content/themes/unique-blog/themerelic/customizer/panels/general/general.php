<?php
/**
 * General Settings Hear
 *
 * @package unique blog
 */

function unique_blog_customize_general_settings( $wp_customize ) {
	
    /**
    * General Settings Panel
    */
    $wp_customize->get_section('colors')->panel = 'general_setting';
    $wp_customize->get_section('title_tagline' )->priority = 3;

    $wp_customize->get_section('background_image')->panel = 'general_setting';
    $wp_customize->get_section('header_image' )->priority = 4;

    $wp_customize->get_setting('header_textcolor' )->default = 'ffffff';

}
add_action( 'customize_register', 'unique_blog_customize_general_settings' );


/**
 * Header color options hear
 */
add_action('after_switch_theme', 'unique_blog_setup_options');
function unique_blog_setup_options () {
    set_theme_mod('header_textcolor', 'fff');
}
