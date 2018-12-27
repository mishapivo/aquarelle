<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blogger_Era
 */
global $post;
$sidebar_layout = 'sidebar-right';
if ( is_page() || is_single() ){
	$sidebar_layout = get_post_meta( $post->ID, 'blogger_era_meta', true );	
} else{
	$sidebar_layout = blogger_era_get_option( 'sidebar_layout' );
}	


if ( ! is_active_sidebar( 'sidebar-1' ) || 'no-sidebar'== $sidebar_layout ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
