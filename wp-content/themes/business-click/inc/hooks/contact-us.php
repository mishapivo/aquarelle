<?php

if( !function_exists('business_click_contact_us_section') ) :
/**
     *contact us 
     *
     * @since Business Click 1.0.0
     *
     * @param  null
     * @return null
     */
	function business_click_contact_us_section()
	{
		global $business_click_customizer_all_values; 
		$business_contact_section_title 	= esc_html($business_click_customizer_all_values['business-click-contact-section-title']);
        $business_click_contact_form		= esc_attr($business_click_customizer_all_values['business-click-contact-section-short-code']  );
		$business_click_contact_background_image			= esc_url($business_click_customizer_all_values['business-click-contact-background-image'] );

        if(  ! $business_click_customizer_all_values['business-click-contact-section-enable'] ){
        	return null;
        }
		?>
		<?php if(!empty($business_contact_section_title) || !empty($business_click_contact_form)) {?>
			<section id="evt-contact" class="section img-cover <?php if($business_click_contact_background_image == '') echo esc_html('css-gradient');?>" style="background-image: url('<?php echo esc_url($business_click_contact_background_image);?>');">
				<div class="evt-img-overlay">
					<div class="container">
						<h2 class="widget-title text-left- evision-animate slideInDown"><?php echo esc_html($business_contact_section_title);?></h2>
						<?php if(!empty($business_click_contact_form) ) { ?>
							<div class="row justify-content-center">
								<div class="w-100 d-block d-md-none"></div>
								<div class="col col-md-8 evision-animate fadeInUp">
									<?php 
										if(function_exists( 'wpcf7' ) && isset( $business_click_customizer_all_values['business-click-contact-section-short-code'] )){
											
			                        ?>
										<div class="contact-form">
											<?php echo do_shortcode( str_replace( '\\', '',  $business_click_customizer_all_values['business-click-contact-section-short-code'] ) ); ?>										 
										</div>
									<?php
			    					}
			    					?> 
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</section>
		<?php } ?>

	<?php }
endif;
add_action('business_click_homepage','business_click_contact_us_section',100) ?>
