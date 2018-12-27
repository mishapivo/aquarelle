<?php

if( !function_exists('business_click_about_us_sections') ) :
	/**
    * about us
    *
    * @since business-click 1.0.0
    *
    * @param null
    * @return null
    *
    */
    function business_click_about_us_sections()
    {
    	global $business_click_customizer_all_values;
    	$about_us_single_number_words 		= absint($business_click_customizer_all_values['business-clcik-excerpt-length']);
    	$about_us_button_text				= esc_html( $business_click_customizer_all_values['business-click-about-us-button-text'] );
    	$about_us_page						= absint($business_click_customizer_all_values['business-click-about-us-select-page'] );
		$about_us_background_image			= esc_url($business_click_customizer_all_values['business-click-about-us-background-image'] );

    	if(  ! $business_click_customizer_all_values['business-click-enable-about-us'] )
    	{
    		return null;
    	} ?>

    	<?php
    	if ( $about_us_page > 0 ){
    		$about_us_arg	= array(
	    		'post_type' 		=> 'page',
	            'p' 				=> absint($about_us_page),
	            'posts_per_page' 	=> 1
    		);
    		$about_us_query	= new WP_Query($about_us_arg);
    		if( $about_us_query->have_posts() ) :
    			while ( $about_us_query->have_posts() ) :
    				$about_us_query->the_post();
    				if(has_post_thumbnail())
		            {
		                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
		            }
		            else
		            {
		                $thumb[0] = '';
		            }?>
		            <section id="evt-why-us" class="section img-cover <?php if($about_us_background_image == '') echo esc_html('css-gradient');?>" style="background-image: url('<?php echo esc_url($about_us_background_image);?>');">	
		            	<div class="evt-img-overlay">
							<div class="container">
								<div class="row">
									<div class="col align-self-center evision-animate fadeIn evt-why-us-text">
										<h2 class="widget-title evision-animate slideInDown"><?php the_title();?></h2>
										<p><?php echo wp_kses_post(business_click_words_count( $about_us_single_number_words ,get_the_content()));?></p>
												
										<?php if( (!empty($about_us_button_text)  ) ){ ?>
											<a href="<?php  the_permalink();?>" class="btn"><?php echo esc_html($about_us_button_text);?><i class="fas fa-angle-right"></i></a>
										<?php } ?>	
									</div>
									<div class="w-100 d-block d-md-none"></div>
									<div class="col align-self-center evision-animate fadeIn">
										<figure>
											<img src="<?php echo esc_url($thumb[0]); ?>">
										</figure>	
									</div>
								</div>
							</div>
						</div>
					</section>
		            <?php
    			endwhile;
    		endif;
    	}

    }
endif;
add_action( 'business_click_homepage', 'business_click_about_us_sections', 50 );