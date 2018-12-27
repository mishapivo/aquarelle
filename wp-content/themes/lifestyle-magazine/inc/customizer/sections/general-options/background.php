<?php
/**
 * Background Settings
 *
 * @package Lifestyle Magazine
 */


add_action( 'customize_register', 'lifestyle_magazine_change_background_panel' );

function lifestyle_magazine_change_background_panel( $wp_customize)  {
    $wp_customize->get_section( 'background_image' )->priority = 4;
    $wp_customize->get_section( 'background_image' )->panel = 'lifestyle_magazine_general_panel';
}