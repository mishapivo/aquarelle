<?php
/**
* The template for displaying sidebar.
* @package Zovees
*/

if ( ! is_active_sidebar( 'blog_post_sidebar' ) ) {
	return;
}
?>

<?php dynamic_sidebar( 'blog_post_sidebar' ); ?>