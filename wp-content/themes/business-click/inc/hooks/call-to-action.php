<?php
if( !function_exists('business_click_call_to_action_array') ) :
	/**
     * call to action array creation
     *
     * @since Business Click 1.0.0
     *
     * @param  null
     * @return null
     */
	function business_click_call_to_action_array(){
		global $business_click_customizer_all_values;
		$call_to_action_number_of_word				= $business_click_customizer_all_values['business-click-call-excerpt-length'];
		$call_to_action_button_text					= $business_click_customizer_all_values['business-click-button-text'];
		$call_to_action_select_page					= $business_click_customizer_all_values['business-click-call-to-action-select-from-page'];

		if(  ! $business_click_customizer_all_values['business-click-enable-call-to-action']  )
		{
			return null;
		} ?>
		<?php

		if( $call_to_action_select_page > 0  ){
			$call_to_action_arg	 = array(
	    		'post_type' 		=> 'page',
	            'p' 				=> absint($call_to_action_select_page),
	            'posts_per_page' 	=> 1
    		);
    		$call_to_action_arg_querry	= new WP_Query($call_to_action_arg);
    		if($call_to_action_arg_querry->have_posts() ) :
    			while( $call_to_action_arg_querry->have_posts() ) :
    				$call_to_action_arg_querry->the_post();
    				if(has_post_thumbnail())
		            {
		                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
		            }
		            else
		            {
		                $thumb[0] = '';
		            }?>
		            <section id="evt-call-to-action" class="section text-center img-cover dark-background <?php if($thumb[0] == '') echo esc_html('css-gradient');?>" style="background-image: url('<?php  echo esc_url($thumb[0]); ?>');">
					    <div class="evt-img-overlay">
					        <div class="container">
					            <div class="row justify-content-center">
					                <div class="col-md-10 col-lg-8">
					                    <h2 class="widget-title evision-animate slideInDown"><?php the_title();?></h2>
					                    <p class="evision-animate fadeInUp"><?php echo wp_kses_post(business_click_words_count( $call_to_action_number_of_word ,get_the_content()));?></p>
					                    <?php if( !empty($call_to_action_button_text) ) { ?>
					                    	<a href="<?php  the_permalink();?>" class="btn evision-animate fadeInUp"><?php echo esc_html($call_to_action_button_text);?><i class="fas fa-angle-right"></i></a>
					                    <?php } ?>	
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
add_action('business_click_homepage','business_click_call_to_action_array',30);