<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package business-land
 */

get_header();
$business_land_single_blog_sidebar_sticky = business_land_get_option( 'business_land_single_blog_sidebar_sticky' );
?>

<div id="content" class="site-content">
	<div class="container">
		<div class="row">
			
			<div class="col-lg-4<?php if( $business_land_single_blog_sidebar_sticky ): ?> sticky-sidebar<?php endif; ?>">
				<?php get_sidebar(); ?>
			</div>
			
			<div class="col-lg-8">
				<div id="primary" class="content-area">
					<main id="main" class="site-main">
				
						<?php while ( have_posts() ) : the_post();
					
							get_template_part( 'template-parts/post/content-single' );
					
							the_post_navigation();
					
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
					
						endwhile; // End of the loop. ?>
				
					</main><!-- #main -->
				</div><!-- #primary -->
			</div>

		</div>
	</div>
</div>
<?php get_footer();
