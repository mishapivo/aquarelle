<?php
$business_land_slider_page_one = business_land_get_option('business_land_slider_page_one');
$business_land_slider_page_two = business_land_get_option('business_land_slider_page_two');
$business_land_slider_page_three = business_land_get_option('business_land_slider_page_three');
$business_land_page_slider_excerpt  = business_land_get_option('business_land_page_slider_excerpt');
$post_img = get_template_directory_uri() . '/assets/images/post-thumbnail.png';

?>
<div class="pageslider-section">
	<div id="businessland-page-slider" class="owl-carousel owl-theme">
    	<?php if( $business_land_slider_page_one || $business_land_slider_page_two || $business_land_slider_page_three ): 
			
			$query = new WP_Query( array( 'post_type' => 'page', 'post__in' => array( $business_land_slider_page_one, $business_land_slider_page_two, $business_land_slider_page_three ) ) );
				if( $query->have_posts() ):
					while( $query->have_posts() ):
						$query->the_post();
						$featured_img_url = get_the_post_thumbnail_url( get_the_ID(), 'full'); 
				?>
					<article class="slide-item" style="background-image:url('<?php if( !empty( $featured_img_url ) ){ echo esc_url( $featured_img_url ); } else echo esc_url( $post_img ); ?>');">
						<span class="bg-overlay"></span>
						<div class="container">
							<div class="row">
								<div class="col-lg-12">
									<div class="body-inner-wrap">
										<div class="post-inner-wrapper">
											<header class="entry-header">
												<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
											</header><!-- .entry-header -->
											<?php if( $business_land_page_slider_excerpt != 0 ): ?>
												<div class="entry-content">
													<p><?php printf( esc_html( wp_trim_words( get_the_content(), $business_land_page_slider_excerpt, '.' ) ) ); ?></p>
												</div>
											<?php endif; ?>
											<p class="read-more">
												<a href="<?php echo esc_url( get_permalink() ); ?>" class="btn">
													<?php esc_html_e( 'Read More','business-land' );?>
												</a>
											</p>
										</div>
									</div>
								</div>
							</div>	
						</div>
					</article><!-- #post-## -->
		
				<?php endwhile; wp_reset_query();
			endif;
		endif; ?>
	
    </div><!-- end post slider-->
</div>