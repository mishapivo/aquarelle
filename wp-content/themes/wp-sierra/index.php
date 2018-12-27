<?php
/**
 * The default template for displaying index page
 *
 * @package WordPress
 * @subpackage WP Sierra Theme
 */
?>

<?php get_header(); ?>
		<?php do_action( 'wpsierra_before_container' ); ?>
		<div class="container" role="main">

			<div class="page-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</div>

			<div class="row">

				<div class="col-md-12">

				<?php /* The loop */ ; ?>
				<?php
				while ( have_posts() ) :
					the_post();
				?>

					<?php get_template_part( 'content', get_post_format() ); ?>

					<?php endwhile; ?>

					<?php the_posts_pagination(); ?>

					<?php
					if ( comments_open() || get_comments_number() ) :
						 comments_template();
				endif;
				?>

			</div><!-- /.col-md-12 -->
			</div><!-- /.row -->

		</div><!-- /.container -->
		<?php do_action( 'wpsierra_after_container' ); ?>
<?php get_footer(); ?>
