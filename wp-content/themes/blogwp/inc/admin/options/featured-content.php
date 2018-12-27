<?php
/**
* Featured Content options
*
* @package BlogWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function blogwp_featured_content_options($wp_customize) {

    $wp_customize->add_section( 'sc_featured_content', array( 'title' => esc_html__( 'Featured Content', 'blogwp' ), 'panel' => 'blogwp_main_options_panel', 'priority' => 250 ) );

    $wp_customize->add_setting( 'blogwp_options[enable_featured_content]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'blogwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'blogwp_enable_featured_content_control', array( 'label' => esc_html__( 'Enable Featured Content', 'blogwp' ), 'section' => 'sc_featured_content', 'settings' => 'blogwp_options[enable_featured_content]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'blogwp_options[featured_content_length]', array( 'default' => 5, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'blogwp_sanitize_positive_integer' ) );

    $wp_customize->add_control( 'blogwp_featured_content_length_control', array( 'label' => esc_html__( 'Number of Featured Content Posts', 'blogwp' ), 'description' => esc_html__('Enter the number of posts you need to display in the featured content area. Default is 5 posts.', 'blogwp'), 'section' => 'sc_featured_content', 'settings' => 'blogwp_options[featured_content_length]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'blogwp_options[featured_content_post_type]', array( 'default' => 'recent-posts', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'blogwp_sanitize_featured_content_type' ) );

    $wp_customize->add_control( 'blogwp_featured_content_post_type_control', array( 'label' => esc_html__( 'Featured Content Posts Type', 'blogwp' ), 'description' => esc_html__('Select a post type to display in featured content area.', 'blogwp'), 'section' => 'sc_featured_content', 'settings' => 'blogwp_options[featured_content_post_type]', 'type' => 'select', 'choices' => array( 'recent-posts' => esc_html__('Recent Posts', 'blogwp'), 'category-posts' => esc_html__('Category Posts', 'blogwp') ) ) );

    $wp_customize->add_setting( 'blogwp_options[featured_content_cat]', array( 'default' => 0, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'absint' ) );

    $wp_customize->add_control( new BlogWP_Customize_Category_Control( $wp_customize, 'blogwp_featured_content_cat_control', array( 'label' => esc_html__( 'Featured Content Posts Category', 'blogwp' ), 'section' => 'sc_featured_content', 'settings' => 'blogwp_options[featured_content_cat]', 'description' => esc_html__( 'Select a category if Posts Type option is Category Posts', 'blogwp' ) ) ) );

}