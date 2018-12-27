<?php
/**
 * Search results template
 *
 * @package Kent
 */

	get_header();
?>
	<h1 class="pagetitle">
		<?php printf( __( 'Search results for &#8216;<em>%s</em>&#8217;', 'kent' ), get_search_query() ); ?>
	</h1>
<?php
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			get_template_part( 'content' );
		}
	} else {
		get_template_part( 'content-empty' );
	}

	the_posts_pagination();

	get_footer();
