<?php
/**
 * Template Name: Landing Page for Page Builder
 *
 */
?>

<?php get_header( 'landing-page' ); ?>

<?php
while( have_posts() ) : the_post();

	get_template_part( 'template-parts/content', 'page-landing-page' );

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}

endwhile;
?>
	
<?php get_footer( 'landing-page' ); ?>
