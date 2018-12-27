<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package euphoric
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

$disable_widget_design = get_theme_mod('disable-widget-design',0);
$custom_design = get_theme_mod('custom-design','default');
?>

<aside id="secondary" class="widget-area <?php if ($disable_widget_design ==0) { echo ' widget-design '; }  if ($custom_design == 'custom') { echo ' sidebar-custom-design'; }?>">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
