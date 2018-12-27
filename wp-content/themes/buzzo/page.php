<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
					get_template_part( 'template-parts/content-page-no-title' );
					?>

					<?php if ( comments_open() || get_comments_number() ) : ?>
						<?php
						/**
						 * Display comment list and comment form.
						 *
						 * @hooked buzzo_comment() - 10
						 */
						do_action( 'buzzo_comment' );
						?>
					<?php endif; ?>

					<?php

				endwhile; // End of the loop.
				?>
			</div>

		</main><!-- #main -->

		<?php
		/**
		 * @hooked buzzo_content_bottom_sidebar() - 10
		 */
		do_action( 'buzzo_after_main_content' );
		?>
	</div><!-- #primary -->

<?php
get_footer();
