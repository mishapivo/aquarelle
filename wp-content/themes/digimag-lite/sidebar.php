<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Digimag Lite
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area sidebar-area">
	<?php
	dynamic_sidebar( 'sidebar-1' );
	get_template_part( 'template-parts/copyright' );
	?>
</aside><!-- #secondary -->
