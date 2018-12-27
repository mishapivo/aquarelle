<?php
/**
 * The template for displaying Search Results pages.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

	<div id="primary" <?php mohini_content_class(); ?>>
		<main id="main" <?php mohini_main_class(); ?>>
			<?php
			/**
			 * mohini_before_main_content hook.
			 *
			 */
			do_action( 'mohini_before_main_content' );

			if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title">
						<?php
						printf( // WPCS: XSS ok.
							/* translators: 1: Search query name */
							__( 'Search Results for: %s', 'mohini' ),
							'<span>' . get_search_query() . '</span>'
						);
						?>
					</h1>
				</header><!-- .page-header -->

				<?php while ( have_posts() ) : the_post();

					get_template_part( 'content', 'search' );

				endwhile;

				mohini_content_nav( 'nav-below' );

			else :

				get_template_part( 'no-results', 'search' );

			endif;

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
