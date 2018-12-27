<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package business-land
 */

get_header();

$business_land_post_slider_status = business_land_get_option( 'business_land_post_slider_status' );
$business_land_blog_sidebar_sticky = business_land_get_option( 'business_land_blog_sidebar_sticky' );

if( is_home() && is_front_page() ):

	if( $business_land_post_slider_status ){
	
		get_template_part( 'template-parts/post/slider' );
		
	} elseif( get_header_image() ){ ?>
	
		<div class="header-banner">
			<span class="bg-overlay"></span> 
			<img src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
		</div>
		
	<?php }
 
endif; ?>
<div id="content" class="site-content">
	<div class="container">
		<div class="row">
			<div class="col-lg-4<?php if( $business_land_blog_sidebar_sticky ): ?> sticky-sidebar<?php endif; ?>">
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
			
						endif; ?>
			
					</main><!-- #main -->
				</div><!-- #primary -->
			</div>
		</div>
	</div>
	
</div>
<?php get_footer(); ?>

