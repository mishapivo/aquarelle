<?php
/**
 * Feminine Munk Theme Customizer
 *
 * @package Feminine_Munk
 */

/* Option list of all post */
$feminine_munk_options_posts = array();
$feminine_munk_options_posts_obj = get_posts('posts_per_page=-1');
$feminine_munk_options_posts[''] = __('Choose Post', 'feminine-munk');

foreach ($feminine_munk_options_posts_obj as $posts) {
    $feminine_munk_options_posts[$posts->ID] = $posts->post_title;
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function feminine_munk_customize_register($wp_customize){

    /** Default Settings */
    $wp_customize->add_panel(
        'wp_default_panel',
        array(
            'priority'       => 10,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __('Default Settings', 'feminine-munk'),
            'description'    => __('Default section provided by wordpress customizer.', 'feminine-munk'),
        )
    );

    $wp_customize->get_section('title_tagline')->panel        = 'wp_default_panel';
    $wp_customize->get_section('colors')->panel               = 'wp_default_panel';
    $wp_customize->get_section('background_image')->panel     = 'wp_default_panel';
    $wp_customize->get_section('static_front_page')->panel    = 'wp_default_panel';

    $wp_customize->get_setting('blogname')->transport         = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
    $wp_customize->get_setting('background_color')->transport = 'refresh';
    $wp_customize->get_setting('background_image')->transport = 'refresh';
    /** Default Settings Ends */

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('blogname', array(
            'selector'        => '.site-title a',
            'render_callback' => 'feminine_munk_customize_partial_blogname',
        ));
        $wp_customize->selective_refresh->add_partial('blogdescription', array(
            'selector'        => '.site-description',
            'render_callback' => 'feminine_munk_customize_partial_blogdescription',
        ));
    }
}

add_action('customize_register', 'feminine_munk_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function feminine_munk_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function feminine_munk_customize_partial_blogdescription()
{
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function feminine_munk_customize_preview_js()
{
    wp_enqueue_script('feminine-munk-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20151215', true);
}

add_action('customize_preview_init', 'feminine_munk_customize_preview_js');

/**
 * Customizer for feature-post, general-setting, social, sanitization-function, breadcrumb
 */
$feminine_munk_customizer_sections = array( 'feature-post', 'general-setting', 'social', 'sanitization-function', 'breadcrumb', 'ads' );

foreach( $feminine_munk_customizer_sections as $customizer ){
    require get_template_directory() . '/inc/customizer/' . $customizer . '.php';
}