<?php
/**
 * The template for displaying 404 pages (Not Found).
 * @package Mega Construction
 */

get_header(); ?>

<div class="container">
    <div class="page-content">
		<div class="notfound">
			<h1><?php esc_html_e('404 Not Found', 'mega-construction' ); ?></h1>
			<p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn &hellip;','mega-construction' );  ?></p>
			<p class="text-404"><?php esc_html_e( 'Dont worry &hellip; it happens to the best of us.', 'mega-construction' ); ?></p>
			<div class="read-moresec">
        		<a href="<?php echo esc_url( home_url() ); ?>" class="button hvr-sweep-to-right"><?php esc_html_e( 'Return to the home page', 'mega-construction' ); ?></a>
			</div>
		</div>
		<div class="clearfix"></div>
    </div>
</div>
	
<?php get_footer(); ?>