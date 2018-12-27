<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package business-land
 */

get_header();
$business_land_archive_blog_sidebar_sticky = business_land_get_option( 'business_land_archive_blog_sidebar_sticky' );
?>
<div id="content" class="site-content">
	<div class="container">
		<div class="row">
			
			<div class="col-lg-4<?php if( $business_land_archive_blog_sidebar_sticky ): ?> sticky-sidebar<?php endif; ?>">
				<?php get_sidebar(); ?>
			</div>
			
			<div class="col-lg-8">
				<div id="primary" class="content-area">
					<main id="main" class="site-main post-grid-layout">
			
					<?php if ( have_posts() ) : 
							/* Start the Loop */
							while ( have_posts() ) : the_post();
				
								get_template_part( 'template-parts/post/content' );
				
							endwhile;
			
							the_posts_pagination( array(
								'prev_text' => '<i class="icon-arrow-left"></i>',
								'next_text' => '<i class="icon-arrow-right"></i>',
								) 
							);
			
						else :
				
							get_template_part( 'template-parts/content', 'none' );
				
						endif;
					?>
			
					</main><!-- #main -->
				</div><!-- #primary -->
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>