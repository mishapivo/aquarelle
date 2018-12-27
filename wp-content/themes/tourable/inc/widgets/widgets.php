<?php
/**
 * Theme Palace widgets inclusion
 *
 * This is the template that includes all custom widgets of Tourable
 *
 * @package Theme Palace
 * @subpackage Tourable
 * @since Tourable 1.0.0
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
function tourable_register_widgets() {

	register_widget( 'Tourable_Latest_Post' );

	register_widget( 'Tourable_Social_Link' );

}
add_action( 'widgets_init', 'tourable_register_widgets' );