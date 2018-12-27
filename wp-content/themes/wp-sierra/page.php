<?php
/**
 * The default template for displaying page
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
		<div class="page-margin-top"></div>

			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
			?>
				<?php
					the_content();

					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'wp-sierra' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
					));
					the_tags();
				?>

				<?php
				endwhile;
				endif;
				?>
				<div class="page-margin-bottom"></div>
	</div><!-- /.container -->
	<?php do_action( 'wpsierra_after_container' ); ?>
		<?php
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
		?>

<?php get_footer(); ?>
