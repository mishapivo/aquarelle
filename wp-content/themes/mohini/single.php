<?php
/**
 * The Template for displaying all single WPKoi events.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

	<div id="primary" <?php mohini_content_class();?>>
		<main id="main" <?php mohini_main_class(); ?>>
			<?php
			/**
			 * mohini_before_main_content hook.
			 *
			 */
			do_action( 'mohini_before_main_content' );

			while ( have_posts() ) : the_post();

				get_template_part( 'content', 'single' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || '0' != get_comments_number() ) :
					/**
					 * mohini_before_comments_container hook.
					 *
					 */
					do_action( 'mohini_before_comments_container' );
					?>

					<div class="comments-area">
						<?php comments_template(); ?>
					</div>

					<?php
				endif;

			endwhile;

			/**
			 * mohini_after_main_content hook.
			 *
			 */
			do_action( 'mohini_after_main_content' );
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php
	/**
	 * mohini_after_primary_content_area hook.
	 *
	 */
	 do_action( 'mohini_after_primary_content_area' );

	 mohini_construct_sidebars();

get_footer();
