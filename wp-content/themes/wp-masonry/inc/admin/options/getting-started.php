<?php
/**
* Getting started options
*
* @package WP Masonry WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function wp_masonry_getting_started($wp_customize) {

    $wp_customize->add_section( 'sc_wp_masonry_getting_started', array( 'title' => esc_html__( 'Getting Started', 'wp-masonry' ), 'description' => esc_html__( 'Thanks for your interest in WP Masonry! If you have any questions or run into any trouble, please visit us the following links. We will get you fixed up!', 'wp-masonry' ), 'panel' => 'wp_masonry_main_options_panel', 'priority' => 5, ) );

    $wp_customize->add_setting( 'wp_masonry_options[documentation]', array( 'default' => '', 'sanitize_callback' => '__return_false', ) );

    $wp_customize->add_control( new WP_Masonry_Customize_Button_Control( $wp_customize, 'wp_masonry_documentation_control', array( 'label' => esc_html__( 'Documentation', 'wp-masonry' ), 'section' => 'sc_wp_masonry_getting_started', 'settings' => 'wp_masonry_options[documentation]', 'type' => 'button', 'button_tag' => 'a', 'button_class' => 'button button-primary', 'button_href' => 'https://themesdna.com/wp-masonry-wordpress-theme/', 'button_target' => '_blank', ) ) );

    $wp_customize->add_setting( 'wp_masonry_options[contact]', array( 'default' => '', 'sanitize_callback' => '__return_false', ) );

    $wp_customize->add_control( new WP_Masonry_Customize_Button_Control( $wp_customize, 'wp_masonry_contact_control', array( 'label' => esc_html__( 'Contact Us', 'wp-masonry' ), 'section' => 'sc_wp_masonry_getting_started', 'settings' => 'wp_masonry_options[contact]', 'type' => 'button', 'button_tag' => 'a', 'button_class' => 'button button-primary', 'button_href' => 'https://themesdna.com/contact/', 'button_target' => '_blank', ) ) );

}