<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Moral
 */

if ( is_archive() || reblog_is_latest_posts() || is_404() || is_search() ) {
	return;
} elseif ( is_single() ) {
	$global_post_sidebar = get_theme_mod( 'reblog_global_post_layout', 'right' ); 
	if ( 'no' === $global_post_sidebar ) {
		return;
	}
} elseif ( reblog_is_frontpage_blog() || is_page() ) {
	$global_page_sidebar = get_theme_mod( 'reblog_global_page_layout', 'right' ); 
	if ( 'no' === $global_page_sidebar ) {
		return;
	}
}

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
