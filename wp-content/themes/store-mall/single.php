<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Moral
 */

get_header(); ?>

	<?php store_mall_header_image(); ?>
	
	<div id="inner-content-wrapper" class="wrapper page-section">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
				<?php while ( have_posts() ) : the_post(); ?>
            		<div class="single-post-wrapper">
						<?php get_template_part( 'template-parts/content', 'single' ); ?>
					</div>
					
					<?php
					the_post_navigation( array(
							'prev_text'          => '<span class="icon">' .  store_mall_get_svg( array( 'icon' => 'left-arrow' ) ) . '</span>' . '<span>%title</span>',
							'next_text'          => '<span class="icon">' . store_mall_get_svg( array( 'icon' => 'left-arrow' ) ) . '</span><span>%title</span>',
						) );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>

    </div><!-- #inner-content-wrapper-->
<?php
get_footer();
