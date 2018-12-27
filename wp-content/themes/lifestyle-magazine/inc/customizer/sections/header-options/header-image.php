<?php
/**
 * Header Image Settings
 *
 * @package Lifestyle Magazine
 */


add_action( 'customize_register', 'lifestyle_magazine_change_header_image_panel' );

function lifestyle_magazine_change_header_image_panel( $wp_customize)  {
    $wp_customize->get_section( 'header_image' )->priority = 1;
    $wp_customize->get_section( 'header_image' )->panel = 'lifestyle_magazine_header_panel';
}