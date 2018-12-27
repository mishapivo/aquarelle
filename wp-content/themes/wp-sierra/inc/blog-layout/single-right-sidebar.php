<?php
/**
 * The template for displaying single post with right sidebar
 *
 * @package WordPress
 * @subpackage WP Sierra Theme
 */
?>
<div class="sierra-post-bg">
	<div class="container" role="main">
		<div class="row">
		<div class="col-md-8 sidebar-right">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div id="post-area">

					<?php wpsierra_single_post_area(); ?>

					</div><!--/#post-area-->
			</article>

		</div><!--/.col-md-8-->
		<div class="col-md-4">

				<?php get_sidebar( 'blog' ); ?>

		</div><!-- /.col-md-4 -->
		</div><!-- /.row -->
	</div><!-- /.container -->

<?php	wpsierra_posts_tags(); ?>

</div><!-- /.sierra-post-bg -->

<!-- Post Author -->

<?php do_action( 'wpsierra_post_about_author' ); ?>

<!-- Related Posts -->

<?php do_action( 'wpsierra_related_posts' ); ?>


<!-- Post Comments -->
<?php if ( comments_open() || get_comments_number() ) : ?>

	<?php comments_template(); ?>

<?php endif; ?>

<?php wp_reset_postdata(); ?>
