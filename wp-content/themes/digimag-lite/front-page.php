<?php
/**
 * The front page template file.
 *
 * If the user has selected a static page for their homepage, this is what will appear.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Digimag Lite
 */

$home_layout = get_theme_mod( 'home_layout', 'layout-1' );

// If users select to display blog posts on the front page, load the index file.
if ( 'posts' === get_option( 'show_on_front' ) ) {
	get_template_part( 'index' );
	return;
}

// Custom front page template.
get_header();

if ( is_active_sidebar( 'front-page-top' ) ) {
	dynamic_sidebar( 'front-page-top' );
}
?>

<div class="container main-content-3-cols">
	<?php
	get_template_part( 'template-parts/home/front-page', $home_layout );
	get_sidebar();
	?>
</div>

<?php
if ( is_active_sidebar( 'front-page-bottom' ) ) {
	dynamic_sidebar( 'front-page-bottom' );
}

get_footer();
