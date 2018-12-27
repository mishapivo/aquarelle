<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Buzzo
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<?php
		do_action( 'buzzo_before_main_content' );
		?>

		<main id="main" class="site-main" role="main">

			<?php
			if ( have_posts() ) :
				?>
				<div class="blog-posts <?php echo esc_attr( Buzzo_Blog::get_blog_layout_css_class() ); ?>">
					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						get_template_part( Buzzo_Blog::get_layout_template_loop_part(), get_post_format() );

					endwhile;
					?>
				</div>

				<?php buzzo_pagination(); ?>

			<?php else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

		</main><!-- #main -->

		<?php
		/**
		 * @hooked buzzo_content_bottom_sidebar() - 10
		 */
		do_action( 'buzzo_after_main_content' );
		?>
	</div><!-- #primary -->

<?php
get_footer();
