<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Travel_Gem
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) : ?>

			<?php
			$archive_layout = travel_gem_get_option( 'archive_layout' );

			if ( 'grid' === $archive_layout ) {
				echo '<div class="masonry-wrapper"><div id="masonry-loop">';
			}

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content' );

			endwhile;

			if ( 'grid' === $archive_layout ) {
				echo '</div><!-- #masonry-loop --></div><!-- .masonry-wrapper -->';
			}

			the_posts_pagination();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
	/**
	 * Hook - travel_gem_action_sidebar.
	 *
	 * @hooked: travel_gem_add_sidebar - 10
	 */
	do_action( 'travel_gem_action_sidebar' );
?>

<?php get_footer();
