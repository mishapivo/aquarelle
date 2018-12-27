<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AccessPress Themes
 * @subpackage vmagazine-lite
 * @since 1.0.0
 */

if ( ! is_active_sidebar( 'vmagazine-lite-sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area vmagazine-lite-sidebar" role="complementary">
	<div class="theiaStickySidebar">
		<?php do_action( 'vmagazine_lite_before_sidebar' ); ?>
		<?php dynamic_sidebar( 'vmagazine-lite-sidebar-1' ); ?>
		<?php do_action( 'vmagazine_lite_after_sidebar' ); ?>
	</div>
</aside><!-- #secondary -->
