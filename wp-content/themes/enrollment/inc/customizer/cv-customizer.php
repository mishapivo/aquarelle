<?php
/**
 * Enrollment Theme Customizer.
 *
 * @package CodeVibrant
 * @subpackage Enrollment
 * @since 1.0.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function enrollment_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 
        'blogname', 
            array(
                'selector' => '.site-title a',
                'render_callback' => 'enrollment_customize_partial_blogname',
            )
    );

    $wp_customize->selective_refresh->add_partial( 
        'blogdescription', 
            array(
                'selector' => '.site-description',
                'render_callback' => 'enrollment_customize_partial_blogdescription',
            )
    );

    /**
     * Register custom section types.
     *
     * @since 1.0.6
     */
    $wp_customize->register_section_type( 'Enrollment_Customize_Section_Upsell' );

    /**
     * Register theme upsell sections.
     *
     * @since 1.0.6
     */
    $wp_customize->add_section( new Enrollment_Customize_Section_Upsell(
        $wp_customize,
            'theme_upsell',
            array(
                'title'    => __( 'Enrollment Pro', 'enrollment' ),
                'pro_text' => __( 'Buy Pro', 'enrollment' ),
                'pro_url'  => 'https://codevibrant.com/wpthemes/enrollment-pro/',
                'priority' => 1,
            )
        )
    );

}
add_action( 'customize_register', 'enrollment_customize_register' );

/*------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function enrollment_customize_preview_js() {
	wp_enqueue_script( 'enrollment_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'enrollment_customize_preview_js' );

/*------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Enqueue required scripts/styles for customizer panel
 */
function enrollment_customize_backend_scripts() {
    global $enrollment_version;

    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/library/font-awesome/css/font-awesome.min.css', array(), '4.6.3' );
    
    wp_enqueue_style( 'enrollment_admin_customizer_style', get_template_directory_uri() . '/assets/css/customizer-style.css', array(), esc_attr( $enrollment_version ) );

    wp_enqueue_script( 'enrollment_admin_bootstrap', get_template_directory_uri() . '/assets/js/cv-bootstrap-toggle.js', array( 'jquery' ), esc_attr( $enrollment_version ), true );
    
    wp_enqueue_script( 'enrollment_admin_customizer', get_template_directory_uri() . '/assets/js/customizer-control.js', array( 'jquery', 'customize-controls' ), '20160918', true );
}
add_action( 'customize_controls_enqueue_scripts', 'enrollment_customize_backend_scripts', 10 );

/*------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Load section files
 */
require get_template_directory() . '/inc/customizer/cv-general-panel.php';
require get_template_directory() . '/inc/customizer/cv-header-panel.php';
require get_template_directory() . '/inc/customizer/cv-slider-panel.php';
require get_template_directory() . '/inc/customizer/cv-design-panel.php';
require get_template_directory() . '/inc/customizer/cv-additional-panel.php';
require get_template_directory() . '/inc/customizer/cv-footer-panel.php';

require get_template_directory() . '/inc/customizer/cv-custom-classes.php';
require get_template_directory() . '/inc/customizer/cv-customizer-sanitize.php';