<?php
/**
 * EDigital Theme Customizer.
 *
 * @package Mystery Themes
 * @subpackage EDigital
 * @since 1.0.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function edigital_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
        'selector' => '.site-title a',
        'render_callback' => 'edigital_customize_partial_blogname',
    ) );

    $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
        'selector' => '.site-description',
        'render_callback' => 'edigital_customize_partial_blogdescription',
    ) );

    /**
     * Register custom section types.
     *
     * @since 1.1.3
     */
    $wp_customize->register_section_type( 'Edigital_Customize_Section_Upsell' );

    /**
     * Register theme upsell sections.
     *
     * @since 1.1.3
     */
    $wp_customize->add_section( new Edigital_Customize_Section_Upsell(
        $wp_customize,
            'theme_upsell',
            array(
                'title'    => esc_html__( 'EDigital Pro', 'edigital' ),
                'pro_text' => esc_html__( 'Buy Pro', 'edigital' ),
                'pro_url'  => 'https://mysterythemes.com/wp-themes/edigital-pro/',
                'priority'  => 1,
            )
        )
    );

}
add_action( 'customize_register', 'edigital_customize_register' );

/*---------------------------------------------------------------------------------------------------------------*/
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function edigital_customize_preview_js() {
	wp_enqueue_script( 'edigital_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'edigital_customize_preview_js' );

/*---------------------------------------------------------------------------------------------------------------*/
/**
 * Enqueue required scripts/styles for customizer panel
 */
function edigital_customize_backend_scripts() {
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/library/font-awesome/css/font-awesome.min.css', array(), '4.6.3' );
    wp_enqueue_style( 'edigital_admin_customizer_style', get_template_directory_uri() . '/assets/css/customizer-style.css' );
    wp_enqueue_script( 'edigital_admin_customizer', get_template_directory_uri() . '/assets/js/customizer-control.js', array( 'jquery', 'customize-controls' ), '20160918', true );
}
add_action( 'customize_controls_enqueue_scripts', 'edigital_customize_backend_scripts', 10 );

/*---------------------------------------------------------------------------------------------------------------*/
/**
 * Load customizer panel files
 */
require get_template_directory() . '/inc/customizer/general-panel.php'; // General Settings Panel
require get_template_directory() . '/inc/customizer/frontpage-panel.php'; // FrontPage Settings Panel
require get_template_directory() . '/inc/customizer/innerpages-panel.php'; // InnerPages Settings Panel
require get_template_directory() . '/inc/customizer/additional-panel.php'; // Additional Settings Panel
require get_template_directory() . '/inc/customizer/footer-panel.php'; // Footer Settings Panel

/*---------------------------------------------------------------------------------------------------------------*/
/**
 * Render the site title for the selective refresh partial.
 *
 * @since EDigital 1.0.5
 * @see edigital_customize_register()
 *
 * @return void
 */
function edigital_customize_partial_blogname() {
    bloginfo( 'name' );
}

/*---------------------------------------------------------------------------------------------------------------*/
/**
 * Render the site title for the selective refresh partial.
 *
 * @since EDigital 1.0.5
 * @see edigital_customize_register()
 *
 * @return void
 */
function edigital_customize_partial_blogdescription() {
    bloginfo( 'description' );
}
