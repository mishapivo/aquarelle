<?php
/**
 * The template for displaying 404 page
 *
 * @package WordPress
 * @subpackage WP Sierra Theme
 */
?>
<?php get_header(); ?>

<?php do_action( 'wpsierra_before_container' ); ?>
<div class="container" role="main">
	<div class="col-md-12">
		<div class="page-404-content">
			<div class="page-404">
				<h1 class="error-header"><?php esc_html_e( '404 ERROR' , 'wp-sierra' ); ?></h1>
				<h3 class="error-subheader"><?php esc_html_e( 'Ooops!', 'wp-sierra' ); ?></h3>
				<a href="<?php echo esc_url( home_url() ); ?>" class="b-btn"><?php esc_html_e( 'Back to Home', 'wp-sierra' ); ?></a>
			</div><!--/.page-404-->
		</div><!--/.page-404-content-->
	</div><!--/.col-md-12-->
</div><!--/.container-->
<?php do_action( 'wpsierra_after_container' ); ?>
<?php get_footer(); ?>
