<?php
/**
 * Alacrity Lite Theme Customizer.
 *
 * @package Alacrity Lite
 */
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
*/

function alacrity_lite_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
    /**
     * Load sanitize functions
     */ 
    get_template_part('inc/customizer/sanitize');

    /**
     * Load customize options.
     */     
    get_template_part('inc/customizer/option');
}
add_action( 'customize_register', 'alacrity_lite_customize_register' );


function alacrity_lite_customize_style() {
    $header_text_color = get_header_textcolor();
   ?>
     <style type = "text/css" > 
     .logo h1, .logo p{color: #<?php echo esc_attr( $header_text_color ); ?>;?>
</style>
<?php
}
add_action('wp_head', 'alacrity_lite_customize_style');

/**
 * Enqueue Javascript postMessage handlers for the Customizer.
 *
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since GBS Blog 1.0
 */
function alacrity_lite_customize_preview_js() {
	wp_enqueue_script( 'alacrity-lite-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20141120', true );
}
add_action( 'customize_preview_init', 'alacrity_lite_customize_preview_js' );