<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Buzzo
 */

get_header(); ?>

	<section id="primary" class="content-area">

		<?php
		do_action( 'buzzo_before_main_content' );
		?>

		<main id="main" class="site-main" role="main">

			<?php
			if ( have_posts() ) :
				?>
				<div class="blog-posts">
					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'search' );

					endwhile;
					?>
				</div>

				<?php buzzo_pagination(); ?>

			<?php else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

		</main><!-- #main -->

		<?php
		/**
		 * @hooked buzzo_content_bottom_sidebar() - 10
		 */
		do_action( 'buzzo_after_main_content' );
		?>
	</section><!-- #primary -->

<?php
get_footer();
