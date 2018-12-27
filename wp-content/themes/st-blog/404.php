<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package st-blog
 */

get_header();
?>

	<div id="primary" class="content-area text-center">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title">
						<i class="fas fa-frown"></i>
						<?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'st-blog' ); ?>
					</h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'st-blog' ); ?></p>

					<?php
					get_search_form();
					?>	

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
