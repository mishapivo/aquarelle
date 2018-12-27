<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Buzzo
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<?php
		do_action( 'buzzo_before_main_content' );
		?>

		<main id="main" class="site-main" role="main">

			<div class="single-post">
				<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', get_post_format() );
				endwhile;

				/**
				 * Hook buzzo_after_single_post
				 *
				 * @hooked buzzo_author_bio() - 15
				 * @hooked buzzo_adjacent_post() - 20
				 * @hooked buzzo_related_posts() - 25
				 * @hooked buzzo_comment() - 30
				 */
				do_action( 'buzzo_after_single_post' );
				?>
			</div>

		</main><!-- #main -->

		<?php
		/**
		 * Hook buzzo_after_main_content
		 *
		 * @hooked buzzo_content_bottom_sidebar() - 10
		 */
		do_action( 'buzzo_after_main_content' );
		?>
	</div><!-- #primary -->

<?php
get_footer();
