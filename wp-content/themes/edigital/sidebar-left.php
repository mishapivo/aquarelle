<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mystery Themes
 * @subpackage EDigital
 * @since 1.0.0
 */

if ( ! is_active_sidebar( 'edigital_left_sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'edigital_left_sidebar' ); ?>
</aside><!-- #secondary -->