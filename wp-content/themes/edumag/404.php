<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Theme Palace
 * @subpackage EduMag
 * @since EduMag 0.1
 */

get_header(); ?>

	<div class="container page-section">
		<section class="error-404 not-found">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/uploads/404-300.png' ); ?>">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'edumag' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'edumag' ); ?>
				</p>

				<?php
					get_search_form();
				?>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->
	</div><!-- .container -->
<?php
	get_footer();
