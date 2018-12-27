<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package AccessPress Themes
 * @subpackage vmagazine-lite
 * @since 1.0.0
 */

get_header(); ?>

	<div class="vmagazine-lite-container">
		<?php do_action( 'vmagazine_lite_before_body_content' ); ?>
		
		<main id="main" class="site-main" role="main">

			<div class="error-404 not-found">
				<div class="vmagazine-lite-404">
					<span><?php esc_html_e( '4', 'vmagazine-lite' );?></span>
					<span class="zero"><?php echo esc_html( '0');?></span>
					<span><?php esc_html_e( '4', 'vmagazine-lite' );?></span>
				</div>
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'vmagazine-lite' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'vmagazine-lite' ); ?></p>
				</div><!-- .page-content -->
			</div><!-- .error-404 -->
			

		</main><!-- #main -->
		
		<?php do_action( 'vmagazine_lite_after_body_content' ); ?>
	</div><!-- .vmagazine-lite-container -->

<?php
get_footer();
