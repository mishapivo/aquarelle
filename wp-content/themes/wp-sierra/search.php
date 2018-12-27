<?php
/**
 * The default template for displaying search page
 *
 * @package WordPress
 * @subpackage WP Sierra Theme
 */
 ?>
<?php get_header(); ?>
<?php do_action( 'wpsierra_before_container' ); ?>
<div class="<?php echo esc_attr( wpsierra_archive_blog_width() ); ?>">
	<div class="page-header">
		<h1>
		<?php
		/* translators: %s: search term */
		printf( esc_html__( 'Search for: %s', 'wp-sierra' ), get_search_query() );
		?>
		</h1>
	</div>
	<div class="row">
		<?php if ( $wp_query->have_posts() ) : ?>
		<div class="masonry-container <?php echo esc_attr( wpsierra_archive_blog_margin() ); ?>" data-columns=".<?php echo esc_attr( wpsierra_archive_blog_columns() ); ?>">
			<?php
			while ( $wp_query->have_posts() ) :
				$wp_query->the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="item <?php echo esc_attr( wpsierra_archive_blog_columns() ); ?>">
					<?php wpsierra_archive_blog_style(); ?>
				</div><!--/.item-->
			</article>
			<?php wp_reset_postdata(); ?>
			<?php endwhile; ?>
		</div><!--/.masonry-container-->
    <?php do_action( 'wpsierra_after_container' ); ?>
		<?php the_posts_pagination(); ?>

		<?php
		else :
			get_template_part( 'content', 'none' );
		endif;
		?>
	</div><!--/.row -->
</div><!--/.container -->


<?php get_footer(); ?>
