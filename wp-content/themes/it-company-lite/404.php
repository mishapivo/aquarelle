<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package IT Company Lite
 */

get_header(); ?>

<div id="content-vw">
	<div class="container">
    	<h1><?php printf( '<strong>%s</strong> %s', esc_html__( '404','it-company-lite' ), esc_html__( 'Not Found', 'it-company-lite' ) ) ?></h1>	
		<p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn&hellip', 'it-company-lite' ); ?></p>
		<p class="text-404"><?php esc_html_e( 'Dont worry&hellip it happens to the best of us.', 'it-company-lite' ); ?></p>
		<div class="error-btn">
    		<a href="<?php echo esc_url(home_url()); ?>"><?php esc_html_e( 'Return to the home page', 'it-company-lite' ); ?></a>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<?php get_footer(); ?>