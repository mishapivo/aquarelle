<?php
/**
 * Template part for displaying services section
 *
 * @since Corporate Gravity 1.0.0
 */

if( !business_gravity_get_option( 'disable_service' ) ):

	$srvc_ids = business_gravity_get_ids( 'service_page' );
	if( !empty( $srvc_ids ) && is_array( $srvc_ids ) && count( $srvc_ids ) > 0 ):

		$query = new WP_Query( apply_filters( 'business_gravity_services_args',  array( 
			'post_type'      => 'page',
			'post__in'       => $srvc_ids,
			'posts_per_page' => 4,
			'orderby'        => 'post__in'
		)));

		if( $query->have_posts() ):
?>
			<!-- Service Section -->
			<section class="wrapper block-service">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-md-12 col-lg-4">
							<?php 
								business_gravity_section_heading( array( 
									'id' => 'service_main_page'
								));
							?>
						</div>
						<?php
							$wrapClass = '';
							business_gravity_get_option( 'service_main_page' ) ? $wrapClass = 'col-lg-8' : $wrapClass = 'col-lg-12';
						?>
						<div class="col-md-12 <?php echo esc_attr( $wrapClass ); ?> service-item-wrap">
							<div class="row">
					    		<?php
					    			$count = $query->post_count;
						    		while( $query->have_posts() ):
						    			$query->the_post();
						    			$title = business_gravity_get_piped_title();
						    			if( 1 == $count ){
						    				$class = 'col-12';
						    				$excerpt_length = 35;
						    			}elseif( 2 == $count && !business_gravity_get_option( 'service_main_page' ) ){
						    				 $class = 'col-12 col-md-6';
						    				 $excerpt_length = 20;
						    			}elseif( !business_gravity_get_option( 'service_main_page' ) ){
						    				 $class = 'col-12 col-md-4';
						    				 $excerpt_length = 20;
						    			}else{
						    				$class = 'col-12 col-md-6';
						    				$excerpt_length = 20;
						    			}
						    			$image = business_gravity_get_thumbnail_url( array(
						    				'size' => 'business-gravity-1170-710'
						    			));
						    	?>
								    	<div class="<?php echo esc_attr( $class ); ?>">
								    		<div class="grid-service-outer">
								    			<a href="<?php the_permalink(); ?>">
								    				<div class="list-grid-inner">
							    						<figure class="service-img">
							    							<img src="<?php echo esc_url( $image ); ?>">
							    							<div class="hover-text">
							    								<div class="text">
								    							<?php 
								    								business_gravity_excerpt( $excerpt_length,true, '&hellip;' );
								    							?>
								    						</div>
							    							</div>
							    						</figure>
							    						<div class="service-content">
								    						<?php 
								    							$icon = $title[ 'sub_title' ] ;
								    							if( !empty( $icon ) ):
								    						?>
							    								<div class="icon-area">
							    									<span class="icon-outer">
							    										<span class="kfi <?php echo esc_attr( $icon ); ?>"></span>
							    									</span>
							    								</div>
								    						<?php endif; ?>
															<div class="icon-content-area">
									    						<h3>
									    							<?php echo esc_html( $title[ 'title' ] ); ?>
									    						</h3>
															</div>
														</div>
								    				</div>
							    				</a>
							    				<?php 
													if( get_edit_post_link()){
														business_gravity_edit_link();
													}
								    			?>
								    		</div>
								    	</div>
								<?php  
									endwhile;
									wp_reset_postdata();
								?>
							</div>
						</div>
					</div>
				</div>
			</section> <!-- End Service Section -->
<?php
		endif; 
	endif; 
endif;