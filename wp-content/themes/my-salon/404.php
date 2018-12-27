<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package my_salon
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<h1><?php _e( '404!', 'my-salon' ); ?></h1>
				<h2><?php _e( 'The requested page cannot be found', 'my-salon' ); ?></h2>
				<p><?php _e( 'Sorry but the page you are looking for cannot be found. Take a moment and do a search below or start from our', 'my-salon' ); ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'homepage.', 'my-salon' ); ?></a></p>
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
