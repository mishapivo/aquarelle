<?php
/**
 * Theme Palace widgets inclusion
 *
 * This is the template that includes all custom widgets of Firm Graphy
 *
 * @package Theme Palace
 * @subpackage Firm Graphy
 * @since Firm Graphy 1.0.0
 */

/*
 * Add social link widget
 */
require get_template_directory() . '/inc/widgets/social-link-widget.php';
/*

 * Add Latest Posts widget
 */
require get_template_directory() . '/inc/widgets/latest-posts-widget.php';




/**
 * Register widgets
 */
function firm_graphy_register_widgets() {

	register_widget( 'Firm_Graphy_Latest_Post' );

	register_widget( 'Firm_Graphy_Social_Link' );

}
add_action( 'widgets_init', 'firm_graphy_register_widgets' );