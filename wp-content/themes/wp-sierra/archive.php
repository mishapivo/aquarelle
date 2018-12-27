<?php
/**
 * The default template for displaying archive page
 *
 * @package WordPress
 * @subpackage WP Sierra Theme
 */
?>
<?php get_header(); ?>
<?php do_action( 'wpsierra_before_container' ); ?>
<div class="<?php echo esc_attr( wpsierra_archive_blog_width() ); ?>">


	<div class="page-header">
		<?php if ( is_author() ) : ?>
			<h1><?php
			/* translators: %s: author term */
			printf( esc_html__( 'Author: %s', 'wp-sierra' ), get_the_author() );
			?>
			</h1>
		<?php elseif ( is_category() ) : ?>
			<h1><?php
			/* translators: %s: category term */
			printf( esc_html__( 'Category: %s', 'wp-sierra' ), '<span>' . single_tag_title( '', false ) . '</span>' );
			?>
			</h1>
		<?php elseif ( is_tag() ) : ?>
			<h1>
			<?php
			/* translators: %s: tag term */
			printf( esc_html__( 'Tag: %s', 'wp-sierra' ), '<span>' . single_tag_title( '', false ) . '</span>' );
			?>
			</h1>
		<?php else : ?>
			<h1><?php echo esc_html__( 'Archive', 'wp-sierra' ); ?></h1>
		<?php endif; ?>
	</div>
  <div class="row">
		<?php if ( have_posts() ) : ?>
			<div class="masonry-container <?php echo esc_attr( wpsierra_archive_blog_margin() ); ?>" data-columns=".<?php echo esc_attr( wpsierra_archive_blog_columns() ); ?>">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="item <?php echo esc_attr( wpsierra_archive_blog_columns() ); ?>">
							<?php wpsierra_archive_blog_style(); ?>
						</div><!--/.item-->
					</article>
					<?php wp_reset_postdata(); ?>
				<?php endwhile; ?>
			</div><!--/.masonry-container-->

			<?php the_posts_pagination(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
  </div><!--/.row -->
</div><!--/.container -->
<?php do_action( 'wpsierra_after_container' ); ?>

<?php get_footer(); ?>
