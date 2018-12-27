<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Jalil
 */

get_header(); ?>
	<section id="breadcrumbs" class="padding-top">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2><?php esc_html_e('404 Error Page','jalil')?></h2>
				</div>
			</div>
		</div>
	</section>

	<section id="blog" class="section page">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1 text-center">
					<h2><?php esc_html_e('Page not found!','jalil')?></h2>
					<p><?php esc_html_e('It looks like nothing was found at this location.','jalil')?></p>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="button"><?php esc_html_e('Back To Home','jalil')?></a>
				</div>
			</div>
		</div>
	</section>
<?php
get_footer();
