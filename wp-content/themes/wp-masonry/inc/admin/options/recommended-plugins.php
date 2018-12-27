<?php
/**
* Recommended plugins options
*
* @package WP Masonry WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function wp_masonry_recomm_plugin_options($wp_customize) {

    // Customizer Section: Recommended Plugins
    $wp_customize->add_section( 'sc_recommended_plugins', array( 'title' => esc_html__( 'Recommended Plugins', 'wp-masonry' ), 'panel' => 'wp_masonry_main_options_panel', 'priority' => 880 ));

    $wp_customize->add_setting( 'wp_masonry_options[recommended_plugins]', array( 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'wp_masonry_sanitize_recommended_plugins' ) );

    $wp_customize->add_control( new WP_Masonry_Customize_Recommended_Plugins( $wp_customize, 'wp_masonry_recommended_plugins_control', array( 'label' => esc_html__( 'Recommended Plugins', 'wp-masonry' ), 'section' => 'sc_recommended_plugins', 'settings' => 'wp_masonry_options[recommended_plugins]', 'type' => 'tdna-recommended-wpplugins' ) ) );

}