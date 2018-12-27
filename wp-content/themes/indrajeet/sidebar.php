<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Indrajeet
 */

$indrajeet_sidebar_right_size = 4;

if ( is_active_sidebar( 'Sidebar-2' ) ) {
	$indrajeet_sidebar_right_size = 3;
}

if ( ! is_active_sidebar( 'Sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area col-md-<?php echo esc_attr( $indrajeet_sidebar_right_size ); ?>">
	<?php dynamic_sidebar( 'Sidebar-1' ); ?>
</aside><!-- #secondary -->
