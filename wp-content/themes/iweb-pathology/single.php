<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package IWeb_Pathology
 */

get_header();
?>

	<div id="primary" class="content-area-l">
		<main id="main" class="site-main-l itopmrg">
			
		<?php if ( get_theme_mod( 'iwebunq_display_breadcrumb', '1' ) === '1' ) : ?> 
			<div class="breadcrumb"><?php iweb_pathology_breadcrumb(); ?></div>
		<?php endif; ?>
			
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
		<?php get_sidebar(); ?>
	</div><!-- #primary -->

<?php

get_footer();
