<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package st-blog
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area s1">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->


<?php
if ( ! is_active_sidebar( 'sidebar-2' ) ) {
	return;
}
?>

<?php 
	global $st_blog_customizer_all_values;
	$st_blog_default_layout_sidebar = st_blog_default_layout();

if( ('no-sidebar' != $st_blog_default_layout_sidebar ) && 'both-sidebar' == $st_blog_default_layout_sidebar) { ?>
<aside id="secondary" class="widget-area sidebar-secondary s2">
    <?php dynamic_sidebar( 'sidebar-2' ); ?>
</aside><!-- #secondary -->
<?php } ?>
