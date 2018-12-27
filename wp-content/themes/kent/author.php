<?php
/**
 * Author post listing
 *
 * @package Kent
 */

	get_header();
?>
	<h1 class="pagetitle">
		<?php _e( 'Author Archives','kent' ); ?>
	</h1>
<?php
	get_template_part( 'author-details' );

	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			get_template_part( 'content' );
		}

		the_posts_pagination();
	} else {
		get_template_part( 'content-empty' );
	}

	get_footer();