<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CodeVibrant
 * @subpackage Enrollment
 * @since 1.0.0
 */

if ( ! is_active_sidebar( 'enrollment_sidebar_left' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'enrollment_sidebar_left' ); ?>
</aside><!-- #secondary -->
