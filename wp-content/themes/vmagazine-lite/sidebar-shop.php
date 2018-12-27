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

if ( ! is_active_sidebar( 'shop-right' ) ) {
	return;
}
?>

<aside id="secondary-right" class="widget-area vmagazine-lite-shop-sidebar vmagazine-lite-sidebar" role="complementary">
	<div class="theiaStickySidebar">
		<?php do_action( 'vmagazine_lite_before_sidebar' ); ?>
		<?php dynamic_sidebar( 'shop-right' ); ?>
		<?php do_action( 'vmagazine_lite_after_sidebar' ); ?>
	</div>
</aside><!-- #secondary -->
