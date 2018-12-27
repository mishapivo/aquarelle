<?php
/**
 * Functions for users wanting to upgrade to premium
 *
 * @package Xcel
 */

/**
 * Display the upgrade to Premium page & load styles.
 */
function xcel_premium_admin_menu() {
    global $xcel_upgrade_page;
    $xcel_upgrade_page = add_theme_page( __( 'About Xcel', 'xcel' ), '<span class="premium-link">' . __( 'About Xcel', 'xcel' ) . '</span>', 'edit_theme_options', 'theme_info', 'xcel_render_upgrade_page' );
}
add_action( 'admin_menu', 'xcel_premium_admin_menu' );

/**
 * Enqueue admin stylesheet only on upgrade page.
 */
function xcel_load_upgrade_page_scripts( $hook ) {
    global $xcel_upgrade_page;
    if ( $hook != $xcel_upgrade_page )
        return;
    
    wp_enqueue_style( 'xcel-upgrade-css', get_template_directory_uri() . '/upgrade/css/upgrade-admin.css' );
    wp_enqueue_script( 'caroufredsel', get_template_directory_uri() . '/js/jquery.carouFredSel-6.2.1-packed.js', array( 'jquery' ), XCEL_THEME_VERSION, true );
    wp_enqueue_script( 'xcel-upgrade-js', get_template_directory_uri() . '/upgrade/js/upgrade-custom.js', array( 'jquery' ), XCEL_THEME_VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'xcel_load_upgrade_page_scripts' );

/**
 * Render the premium upgrade/order page
 */
function xcel_render_upgrade_page() {
	get_template_part( 'upgrade/tpl/upgrade-page' );
}
