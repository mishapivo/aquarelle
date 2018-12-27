<?php
/**
 * salient themes Theme Customizer
 *
 * @package salient themes
 * @subpackage st-blog
 * @since st-blog 1.0.0
 */
add_filter('salient_customizer_framework_url', 'st_blog_customizer_framework_url');

if( ! function_exists( 'st_blog_customizer_framework_url' ) ):

    function st_blog_customizer_framework_url(){
        return trailingslashit( get_template_directory_uri() ) . 'inc/frameworks/salient-customizer/';
    }

endif;

add_filter('salient_customizer_framework_path', 'st_blog_customizer_framework_path');

if( ! function_exists( 'st_blog_customizer_framework_path' ) ):
    function st_blog_customizer_framework_path(){
        return trailingslashit( get_template_directory() ) . 'inc/frameworks/salient-customizer/';
    }
endif;

/*define constant for coder-customizer-constant*/
if(!defined('salient_CUSTOMIZER_NAME')){
    define('salient_CUSTOMIZER_NAME','salient_customizer_options');
}


/**
 * reset options
 * @param  array $reset_options
 * @return void
 *
 * @since st-blog 1.0
 */
if ( ! function_exists( 'st_blog_reset_options' ) ) :
    function st_blog_reset_options( $reset_options ) {
        set_theme_mod( salient_CUSTOMIZER_NAME, $reset_options );
    }
endif;
/**
 * Customizer framework added.
 */
require trailingslashit(get_template_directory() ) .'/inc/frameworks/salient-customizer/salient-customizer.php';

require trailingslashit(get_template_directory() ) . '/inc/customizer/Feature-slider/slider-options.php'; 
require trailingslashit(get_template_directory() ) . '/inc/customizer/Feature-slider/slider-setting.php';

require trailingslashit(get_template_directory() ) . '/inc/customizer/Featured-Content-post/featured-options.php'; 

require trailingslashit(get_template_directory() ) . '/inc/customizer/panel.php'; 

require trailingslashit(get_template_directory() ) . '/inc/customizer/theme-option/theme-panel.php';


global $st_blog_panels;
global $st_blog_sections;
global $st_blog_settings_controls;
global $st_blog_repeated_settings_controls;
global $st_blog_customizer_defaults;


/*Resetting all Values*/
/**
 * Reset color settings to default
 * @param  $input
 *
 * @since st-blog 1.0
 */
global $st_blog_customizer_defaults;
$st_blog_customizer_defaults['st-blog-customizer-reset'] = '';
if ( ! function_exists( 'st_blog_customizer_reset' ) ) :
    function st_blog_customizer_reset( ) {
        global $st_blog_customizer_saved_values;
        $st_blog_customizer_saved_values = st_blog_get_all_options();
        if ( $st_blog_customizer_saved_values['st-blog-customizer-reset'] == 1 ) {
            global $st_blog_customizer_defaults;

            $st_blog_customizer_defaults['st-blog-customizer-reset'] = '';
            /*resetting fields*/
            st_blog_reset_options( $st_blog_customizer_defaults );
        }
        else {
            return '';
        }
    }
endif;
add_action( 'customize_save_after','st_blog_customizer_reset' );


/**
 * st-blog Theme Customizer
 *
 * @package st-blog
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function st_blog_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'blogname', array(
            'selector'        => '.site-title a',
            'render_callback' => 'st_blog_customize_partial_blogname',
        ) );
        $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
            'selector'        => '.site-description',
            'render_callback' => 'st_blog_customize_partial_blogdescription',
        ) );
    }
}
add_action( 'customize_register', 'st_blog_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function st_blog_customize_partial_blogname() {
    bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function st_blog_customize_partial_blogdescription() {
    bloginfo( 'description' );
}

/******************************************
Removing section setting control
 *******************************************/

$st_blog_customizer_args = array(
    'panels'            => $st_blog_panels, /*always use key panels */
    'sections'          => $st_blog_sections,/*always use key sections*/
    'settings_controls' => $st_blog_settings_controls,/*always use key settings_controls*/
    'repeated_settings_controls' => $st_blog_repeated_settings_controls,/*always use key sections*/
);

/*registering panel section setting and control start*/
function st_blog_add_panels_sections_settings() {
    global $st_blog_customizer_args;
    return $st_blog_customizer_args;
}
add_filter( 'salient_customizer_panels_sections_settings', 'st_blog_add_panels_sections_settings' );
/*registering panel section setting and control end*/

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function st_blog_customize_preview_js() {
    wp_enqueue_script( 'st-blog-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'st_blog_customize_preview_js' );


/**
 * get all saved options
 * @param  null
 * @return array saved options
 *
 * @since st-blog 1.0
 */
if ( ! function_exists( 'st_blog_get_all_options' ) ) :
    function st_blog_get_all_options( $merge_default = 0 ) {
        $st_blog_customizer_saved_values = salient_customizer_get_all_values( );
        if( 1 == $merge_default ){
            global $st_blog_customizer_defaults;
            if(is_array( $st_blog_customizer_saved_values )){
                $st_blog_customizer_saved_values = array_merge($st_blog_customizer_defaults, $st_blog_customizer_saved_values );
            }
            else{
                $st_blog_customizer_saved_values = $st_blog_customizer_defaults;
            }
        }
        return $st_blog_customizer_saved_values;
        
    }
endif;
