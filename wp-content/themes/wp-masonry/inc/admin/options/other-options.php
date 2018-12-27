<?php
/**
* Other options
*
* @package WP Masonry WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function wp_masonry_other_options($wp_customize) {

    $wp_customize->add_section( 'sc_other_options', array( 'title' => esc_html__( 'Other Options', 'wp-masonry' ), 'panel' => 'wp_masonry_main_options_panel', 'priority' => 560 ) );

    $wp_customize->add_setting( 'wp_masonry_options[enable_sticky_mobile_menu]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'wp_masonry_sanitize_checkbox', ) );

    $wp_customize->add_control( 'wp_masonry_enable_sticky_mobile_menu_control', array( 'label' => esc_html__( 'Enable Sticky Menu on Small Screen', 'wp-masonry' ), 'section' => 'sc_other_options', 'settings' => 'wp_masonry_options[enable_sticky_mobile_menu]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'wp_masonry_options[disable_primary_menu]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'wp_masonry_sanitize_checkbox', ) );

    $wp_customize->add_control( 'wp_masonry_disable_primary_menu_control', array( 'label' => esc_html__( 'Disable Primary Menu', 'wp-masonry' ), 'section' => 'sc_other_options', 'settings' => 'wp_masonry_options[disable_primary_menu]', 'type' => 'checkbox', ) );

}