<?php
/**
 * evision themes Theme Customizer
 *
 * @package eVision themes
 * @subpackage business-click
 * @since business-click 1.0.0
 */
/*Define Url for including css and js*/
if ( !defined( 'EVISION_CUSTOMIZER_URL' ) ) {
    define( 'EVISION_CUSTOMIZER_URL', trailingslashit( get_template_directory_uri() ) . 'inc/frameworks/evision-customizer/' );
}
/*Define path for including php files*/
if ( !defined( 'EVISION_CUSTOMIZER_PATH' ) ) {
    define( 'EVISION_CUSTOMIZER_PATH', trailingslashit( get_template_directory() ) . 'inc/frameworks/evision-customizer/' );
}

/*define constant for evision customizer name*/
if(!defined('EVISION_CUSTOMIZER_NAME')){
    define( 'EVISION_CUSTOMIZER_NAME', 'business_click_options' );
}

/**
 * reset options
 * @param  array $reset_options
 * @return void
 *
 * @since business-click 1.0.0
 */
if ( ! function_exists( 'business_click_reset_options' ) ) :
    function business_click_reset_options( $reset_options ) {
        set_theme_mod( EVISION_CUSTOMIZER_NAME, $reset_options );
    }
endif;

require get_template_directory().'/inc/customizer/default.php';

/**
 * Customizer framework added.
 */
require get_template_directory() . '/inc/frameworks/evision-customizer/evision-customizer.php';
global $business_click_panels;
global $business_click_sections;
global $business_click_settings_controls;
global $business_click_repeated_settings_controls;
global $business_click_customizer_defaults;
global $defaults;

$defaults =  business_click_defauts_value();


/*mainhomepage panel*/
require get_template_directory().'/inc/customizer/main-homepage/all-option-panel.php';

/******************************************
Modify Theme Option Section Options
 *******************************************/
require get_template_directory().'/inc/customizer/theme-option/option-panel.php';



/*Resetting all Values*/
/**
 * Reset color settings to default
 *
 * @since business-click 1.0.0
 */
global $business_click_customizer_defaults;
$business_click_customizer_defaults['business-click-customizer-reset-settings'] = '';
if ( ! function_exists( 'business_click_customizer_reset' ) ) :
    function business_click_customizer_reset( ) {
        global $business_click_customizer_saved_values;
        $business_click_customizer_saved_values = business_click_get_all_options();
        if ( $business_click_customizer_saved_values['business-click-customizer-reset-settings'] == 1 ) {
            global $business_click_customizer_defaults;
            /*getting fields*/
            $business_click_customizer_defaults['business-click-customizer-reset-settings'] = '';
            /*resetting fields*/
            business_click_reset_options( $business_click_customizer_defaults );
        }
        else {
            return '';
        }
    }
endif;
add_action( 'customize_save_after','business_click_customizer_reset' );

$business_click_sections['business-click-customizer-reset'] =
    array(
        'priority'       => 999,
        'title'          => esc_html__( 'Reset All Options', 'business-click' )
    );
$business_click_settings_controls['business-click-customizer-reset-settings'] =
    array(
        'setting' =>     array(
            'default'              => $business_click_customizer_defaults['business-click-customizer-reset-settings'],
            'transport'            => 'postmessage',
        ),
        'control' => array(
            'label'                 =>  esc_html__( 'Reset All Options', 'business-click' ),
            'description'           =>  esc_html__( 'Caution: This will reset all options to default. Publish the changes and Refresh the page to view the changes. ', 'business-click' ),
            'section'               => 'business-click-customizer-reset',
            'type'                  => 'checkbox',
            'priority'              => 10,
            'active_callback'       => ''
        )
    );

/******************************************
Aranging header image
 *******************************************/
$business_click_sections['custom_css'] =
    array(
        'title'          => esc_html__( 'Additional CSS', 'business-click' ),
        'priority'       => 400,
    );

$business_click_customizer_args = array(
    'panels'            => $business_click_panels, /*always use key panels */
    'sections'          => $business_click_sections,/*always use key sections*/
    'settings_controls' => $business_click_settings_controls,/*always use key settings_controls*/
    'repeated_settings_controls' => $business_click_repeated_settings_controls,/*always use key sections*/
);

/*registering panel section setting and control start*/
function business_click_add_panels_sections_settings() {
    global $business_click_customizer_args;
    return $business_click_customizer_args;
}
add_filter( 'evision_customizer_panels_sections_settings', 'business_click_add_panels_sections_settings' );
/*registering panel section setting and control end*/

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function business_click_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
}
add_action( 'customize_register', 'business_click_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function business_click_customize_preview_js() {
    wp_enqueue_script( 'business_click_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'business_click_customize_preview_js' );


/**
 * get all saved options
 * @param  null
 * @return array saved options
 *
 * @since business-click 1.0.0
 */
if ( ! function_exists( 'business_click_get_all_options' ) ) :
    function business_click_get_all_options( $merge_default = 0 ) {
        $business_click_customizer_saved_values = evision_customizer_get_all_values( EVISION_CUSTOMIZER_NAME );
        if( 1 == $merge_default ){
            global $defaults;
            if(is_array( $business_click_customizer_saved_values )){
                $business_click_customizer_saved_values = array_merge($defaults, $business_click_customizer_saved_values );
            }
            else{
                $business_click_customizer_saved_values = $defaults;
            }
        }
        return $business_click_customizer_saved_values;
    }
endif;
