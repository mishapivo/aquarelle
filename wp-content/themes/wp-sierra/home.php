<?php
/**
 * The default template for displaying blog page
 *
 * @package WordPress
 * @subpackage WP Sierra Theme
 */
?>
<?php get_header(); ?>
<?php wpsierra_archive_blog_header(); ?>
<?php do_action( 'wpsierra_before_container' ); ?>
<div class="<?php echo esc_attr( wpsierra_archive_blog_width() ); ?>" role="<?php esc_attr_e( 'main', 'wp-sierra' ); ?>">
	<?php wpsierra_archive_blog_title(); ?>
	<div class="row">
		<?php get_template_part( 'inc/blog-layout/blog', 'masonry' ); ?>
	</div><!--/.row-->
</div><!--/.container-->
<?php do_action( 'wpsierra_after_container' ); ?>
<?php get_footer(); ?>
