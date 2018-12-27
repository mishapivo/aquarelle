<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Moral
 */

get_header(); ?>

	<?php store_mall_header_image(); ?>

    <div id="inner-content-wrapper" class="page-section">
        <div class="wrapper">
			<div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                    <div id="store-mall-infinite-scroll" class="blog-posts-wrapper col-2">

						<?php
						if ( have_posts() ) :

							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', get_post_format() );

							endwhile;

							wp_reset_postdata();

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif; ?>
					</div><!-- .posts-wrapper -->
					<?php store_mall_posts_pagination(); ?>
				</main><!-- #main -->
			</div><!-- #primary -->
			
			<?php get_sidebar(); ?>

		</div>
	</div>

<?php
get_footer();
