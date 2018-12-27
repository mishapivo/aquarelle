<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Digimag Lite
 */

$ads_position = get_theme_mod( 'ad_position_archive', 2 );
get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<?php
		if ( have_posts() ) : ?>
			<div class="masonry-posts">
				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				endwhile;
				?>
			</div>
			<?php
			digimag_lite_pagination();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
	</main><!-- #main -->
	<?php
	if ( is_active_sidebar( 'popular-posts' ) ) {
		dynamic_sidebar( 'popular-posts' );
	}
	?>
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
