<?php
/**
 * Template name: Sections page
 *
 * @package Buzzo
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			/**
			 * Display featured section.
			 *
			 * @hooked buzzo_featured_section() - 10
			 */
			do_action( 'buzzo_featured_section' );
			?>

			<?php
			/**
			 * Display home sections.
			 *
			 * @hooked buzzo_home_sections() - 10
			 */
			do_action( 'buzzo_home_sections' );
			?>

			<?php
			/**
			 * Display home columns.
			 *
			 * @hooked buzzo_home_columns() - 10
			 */
			do_action( 'buzzo_home_columns' );
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
