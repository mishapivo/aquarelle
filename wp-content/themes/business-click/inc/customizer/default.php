<?php
/**
	* default page
	* @package business-click
*/
if(!function_exists('business_click_defauts_value') ) :

/**
 * Get default theme options.
 *
 * @since 1.0.0
 *
 * @return array Default theme options.
 */
	function business_click_defauts_value(){

		$defaults = array();

		//top bar
		$defaults['business-click-enbale-top-bar-header']  				= 1;
		$defaults['business-click-top-bar-phone']          				= esc_html__('+(123)-456789','business-click');
		$defaults['bussiness-click-top-bar-email']         				= esc_html__('evisionthemes@gmail.com','business-click');
		$defaults['bussiness-click-top-bar-location']      				= esc_html__('Kathmandu, Nepal','business-click');
		$defaults['bussiness-click-top-bar-social-menu']   				= '';

		// header Section
		$defaults['business-click-enable-extra-button']					= 1;
		$defaults['business-click-text-extra-button-text']				= esc_html__('More Demos','business-click');
		$defaults['business-click-link-extra-button']					= 'https://demo.evisionthemes.com/business-click/multipage/';
		$defaults['business-click-enable-transparent-header']		    = 1;


		// color Section
		$defaults['business-click-site-identity-color'] 				= '#313131';
		$defaults['business-click-top-header-background-bar-color'] 	= '#000000';
		$defaults['business-click-menu-header-background-color'] 		= '#FFFFFF';
		$defaults['business-click-business-clcik-h1-h6'] 				= '#000000';
		$defaults['business-click-footer-background-color'] 			= '#1F1F1F';
		$defaults['business-click-color-reset'] 						= '';

		//font Section
		$defaults['business-click-font-family-site-identity'] 			= 'Catamaran:400,600,700';
		$defaults['business-click-font-family-menu'] 					= 'Catamaran:400,600,700';
		$defaults['business-click-font-family-h1-h6'] 					= 'Catamaran:400,600,700';
		$defaults['business-click-font-family-title-size'] 				= 30;
		$defaults['business-click-font-family-content-size'] 			= 16;
		$defaults['business-click-font-family-body-p'] 					= 'Open+Sans:400,400italic,600,700';
		$defaults['business-click-font-family-button-text'] 			= 'Open+Sans:400,400italic,600,700';
		$defaults['business-click-footer-copy-right-text'] 				= 'Open+Sans:400,400italic,600,700';


		// slider Section
		$defaults['business-click-enbale-slider']						= 1;
		$defaults['business-click-excerpt-length']						= 30;
		$defaults['business-click-select-post-form']					='form-category';
		$defaults['business-click-select-from-cat']						= -1;
		$defaults['business-click-select-from-page']					= 0;
		$defaults['business-click-slider-enable-blog']					= 0;
		$defaults['business-click-slider-button-text']					= esc_html__('Learn more','business-click');

		//feature section
		$defaults['business-click-feature-enable']  					= 1;
		$defaults['business-click-feature-section-title']  				= esc_html__('Feature Section','business-click');
		$defaults['business-click-feature-excerpt-length']  			= 30;;
		$defaults['business-click-feature-select-form']  				= 'form-category';
		$defaults['business-click-feature-from-category']  				= -1;
		$defaults['business-click-feature-from-page']  					= 0;
		$defaults['business-click-feature-page-icon']  					= '';
		$defaults['business-click-feature-button-text']  				= '';
		$defaults['business-click-feature-background-image']  			= '';

		//CTA
		$defaults['business-click-enable-call-to-action'] 				= 1;
		$defaults['business-click-call-excerpt-length'] 				= 30;
		$defaults['business-click-call-to-action-select-from-page'] 	= 0;
		$defaults['business-click-button-text'] 						= esc_html__('Learn more','business-click');

		// about us section
		$defaults['business-click-enable-about-us'] 					= 1;
		$defaults['business-clcik-excerpt-length'] 						= 30;
		$defaults['business-click-about-us-select-page'] 				= 0;
		$defaults['business-click-about-us-button-text'] 				= esc_html__('Details','business-click');
		$defaults['business-click-about-us-background-image'] 			= '';

		//testimonial
		$defaults['business-click-testimonila-enable']					= 1;
		$defaults['business-click-testimonial-section-title']			= esc_html__('Testimonial','business-click');
		$defaults['business-click-testimonial-excerpt-length']			= 30;
		$defaults['business-click-testimonial-select-form']				= 'form-category';
		$defaults['business-click-testimonial-from-category']			= -1;
		$defaults['business-click-testimonial-select-for-page']			= 0;
		$defaults['business-click-testimonial-designation']				= esc_html__('CEO','business-click');
		$defaults['business-click-testimonial-background-image']		= '';

		//blog Section
		$defaults['business-click-blog-section-enable'] 				= 1;
		$defaults['business-click-blog-section-title-text'] 			= esc_html__('Blog','business-click');
		$defaults['business-click-blog-excerpt-length'] 				= 30;
		$defaults['business-click-blog-select-category'] 				= -1;
		$defaults['business-click-blog-button-text'] 					= esc_html__('Read More','business-click');
		$defaults['business-click-blog-background-image'] 				= '';

		//Contact us Section
		$defaults['business-click-contact-section-enable'] 				= 1;
		$defaults['business-click-contact-section-title'] 				= '';
		$defaults['business-click-contact-section-short-code'] 			= '';
		$defaults['business-click-contact-background-image'] 			= '';

		//layout options
		$defaults['business-click-enable-static-page'] 					= 0;
		$defaults['business-click-default-layout']     					= esc_html('no-sidebar','business-click');
		$defaults['business-click-single-post-image-align'] 			= 'full';
		$defaults['business-click-archive-image-align']     			= 'full';
		$defaults['business-click-archive-layout'] 						= 'thumbnail-and-excerpt';
		$defaults['business-click-number-of-words'] 					= 40;
		$defaults['business-click-conatiner-width-layout'] 				= 1140;

		// back to top options
		$defaults['business-click-enable-back-to-top'] 					= 1;

		//breadcrumb
		$defaults['business-click-enable-breadcrumb']					= 1;

		//footer section
		$defaults['business-click-copyright-text']						= esc_html__( 'Copyright &copy; All right reserved.', 'business-click' );
		$defaults['business-click-enable-scroll-to-top']				= 1;


		$defaults = apply_filters('business_click_get_all_options',$defaults);
		return $defaults;
	}
endif; 