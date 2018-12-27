<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AccessPress Themes
 * @subpackage vmagazine-lite
 * @since 1.0.0
 */

get_header(); ?>

	<div class="vmagazine-lite-container">
		<?php do_action( 'vmagazine_lite_before_body_content' ); ?>
		<div id="primary" class="content-area vmagazine-lite-content">
			<main id="main" class="site-main" role="main">
			<?php
			if ( have_posts() ) : 
			
				
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
						get_template_part( 'layouts/archive/content', 'layout1' );
					

				endwhile;

				

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>
			
			</main><!-- #main -->
			<div class="archive-bottom-wrapper">
				<?php the_posts_pagination(); ?>
				
				<?php vmagazine_lite_entry_footer(); ?>
			</div>

		</div><!-- #primary -->
		<?php vmagazine_lite_get_sidebar(); ?>
		<?php do_action( 'vmagazine_lite_after_body_content' ); ?>
	</div><!-- .vmagazine-lite-container -->

<?php
get_footer();
