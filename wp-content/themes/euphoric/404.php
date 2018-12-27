<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package euphoric
 */

get_header();
?>
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'euphoric' ); ?></h1>
				</header><!-- .page-header -->
				<?php do_action('euphoric_frontpage_breadcrumbs'); ?>
				<div class="page-content">
					<div class="error-page-img"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/404.png" alt="<?php esc_html_e('404 Not Found','euphoric'); ?>"></div>
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'euphoric' ); ?></p>

					<?php
					get_search_form();
					?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->
<?php
get_footer();
