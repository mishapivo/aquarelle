<?php
/**
 * The main template file of frontpage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package business-land
 */

get_header(); 
$business_land_page_slider_status = business_land_get_option( 'business_land_page_slider_status' );

?>
<?php if( is_front_page() ):

	if( $business_land_page_slider_status ){
	
		get_template_part( 'template-parts/page/slider' );
		
	} elseif( get_header_image() ){ ?>
	
		<div class="header-banner"> 
			<span class="bg-overlay"></span>
			<img src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
		</div>
		
	<?php }
 
endif; ?>
<?php if ( is_active_sidebar( 'sidebar-2' ) ) { dynamic_sidebar( 'sidebar-2' ); } else { ?>
<div id="content" class="site-content">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div id="primary" class="content-area">
					<main id="main" class="site-main">
						<?php if ( have_posts() ) :
			
								/* Start the Loop */
								while ( have_posts() ) : the_post();
									
									get_template_part( 'template-parts/page/content' );
					
								endwhile;
								
							else :
			
								get_template_part( 'template-parts/content', 'none' );
			
						endif; ?>
					</main>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>					
<?php get_footer(); ?>