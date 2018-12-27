<?php
/**
* Post options
*
* @package Clean Grid WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function clean_grid_post_options($wp_customize) {

    $wp_customize->add_section( 'sc_clean_grid_posts', array( 'title' => esc_html__( 'Post Options', 'clean-grid' ), 'panel' => 'clean_grid_main_options_panel', 'priority' => 260 ) );

    $wp_customize->add_setting( 'clean_grid_options[hide_posts_heading]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'clean_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'clean_grid_hide_posts_heading_control', array( 'label' => esc_html__( 'Hide HomePage Posts Heading', 'clean-grid' ), 'section' => 'sc_clean_grid_posts', 'settings' => 'clean_grid_options[hide_posts_heading]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'clean_grid_options[posts_heading]', array( 'default' => esc_html__( 'Recent Posts', 'clean-grid' ), 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field', ) );

    $wp_customize->add_control( 'clean_grid_posts_heading_control', array( 'label' => esc_html__( 'HomePage Posts Heading', 'clean-grid' ), 'section' => 'sc_clean_grid_posts', 'settings' => 'clean_grid_options[posts_heading]', 'type' => 'text', ) );

    $wp_customize->add_setting( 'clean_grid_options[thumbnail_link]', array( 'default' => 'yes', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'clean_grid_sanitize_thumbnail_link' ) );

    $wp_customize->add_control( 'clean_grid_thumbnail_link_control', array( 'label' => esc_html__( 'Thumbnail Link', 'clean-grid' ), 'description' => esc_html__('Do you want single post thumbnail to be linked to their post?', 'clean-grid'), 'section' => 'sc_clean_grid_posts', 'settings' => 'clean_grid_options[thumbnail_link]', 'type' => 'select', 'choices' => array( 'yes' => esc_html__('Yes', 'clean-grid'), 'no' => esc_html__('No', 'clean-grid') ) ) );

    $wp_customize->add_setting( 'clean_grid_options[read_more_length]', array( 'default' => 20, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'clean_grid_sanitize_positive_integer' ) );

    $wp_customize->add_control( 'clean_grid_read_more_length_control', array( 'label' => esc_html__( 'Auto Post Summary Length', 'clean-grid' ), 'description' => esc_html__('Enter the number of words need to display in the post summary. Default is 20 words.', 'clean-grid'), 'section' => 'sc_clean_grid_posts', 'settings' => 'clean_grid_options[read_more_length]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'clean_grid_options[read_more_text]', array( 'default' => esc_html__( 'Continue Reading', 'clean-grid' ), 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field', ) );

    $wp_customize->add_control( 'clean_grid_read_more_text_control', array( 'label' => esc_html__( 'Read More Text', 'clean-grid' ), 'section' => 'sc_clean_grid_posts', 'settings' => 'clean_grid_options[read_more_text]', 'type' => 'text', ) );

    $wp_customize->add_setting( 'clean_grid_options[hide_posted_date]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'clean_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'clean_grid_hide_posted_date_control', array( 'label' => esc_html__( 'Hide Posted Date', 'clean-grid' ), 'section' => 'sc_clean_grid_posts', 'settings' => 'clean_grid_options[hide_posted_date]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'clean_grid_options[hide_post_author]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'clean_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'clean_grid_hide_post_author_control', array( 'label' => esc_html__( 'Hide Post Author', 'clean-grid' ), 'section' => 'sc_clean_grid_posts', 'settings' => 'clean_grid_options[hide_post_author]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'clean_grid_options[hide_post_categories]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'clean_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'clean_grid_hide_post_categories_control', array( 'label' => esc_html__( 'Hide Post Categories', 'clean-grid' ), 'section' => 'sc_clean_grid_posts', 'settings' => 'clean_grid_options[hide_post_categories]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'clean_grid_options[hide_post_tags]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'clean_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'clean_grid_hide_post_tags_control', array( 'label' => esc_html__( 'Hide Post Tags', 'clean-grid' ), 'section' => 'sc_clean_grid_posts', 'settings' => 'clean_grid_options[hide_post_tags]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'clean_grid_options[hide_comments_link]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'clean_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'clean_grid_hide_comments_link_control', array( 'label' => esc_html__( 'Hide Comment Link', 'clean-grid' ), 'section' => 'sc_clean_grid_posts', 'settings' => 'clean_grid_options[hide_comments_link]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'clean_grid_options[hide_post_edit]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'clean_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'clean_grid_hide_post_edit_control', array( 'label' => esc_html__( 'Hide Post Edit Link', 'clean-grid' ), 'section' => 'sc_clean_grid_posts', 'settings' => 'clean_grid_options[hide_post_edit]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'clean_grid_options[hide_thumbnail]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'clean_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'clean_grid_hide_thumbnail_control', array( 'label' => esc_html__( 'Hide Thumbnails from Every Page', 'clean-grid' ), 'section' => 'sc_clean_grid_posts', 'settings' => 'clean_grid_options[hide_thumbnail]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'clean_grid_options[hide_thumbnail_single]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'clean_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'clean_grid_hide_thumbnail_single_control', array( 'label' => esc_html__( 'Hide Thumbnails from Posts/Pages', 'clean-grid' ), 'section' => 'sc_clean_grid_posts', 'settings' => 'clean_grid_options[hide_thumbnail_single]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'clean_grid_options[show_post_snippet]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'clean_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'clean_grid_show_post_snippet_control', array( 'label' => esc_html__( 'Show Post Snippet', 'clean-grid' ), 'section' => 'sc_clean_grid_posts', 'settings' => 'clean_grid_options[show_post_snippet]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'clean_grid_options[hide_read_more_button]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'clean_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'clean_grid_hide_read_more_button_control', array( 'label' => esc_html__( 'Hide Read More Button', 'clean-grid' ), 'section' => 'sc_clean_grid_posts', 'settings' => 'clean_grid_options[hide_read_more_button]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'clean_grid_options[hide_author_bio_box]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'clean_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'clean_grid_hide_author_bio_box_control', array( 'label' => esc_html__( 'Hide Author Bio Box', 'clean-grid' ), 'section' => 'sc_clean_grid_posts', 'settings' => 'clean_grid_options[hide_author_bio_box]', 'type' => 'checkbox', ) );

}