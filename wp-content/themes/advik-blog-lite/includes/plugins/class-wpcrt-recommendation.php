<?php
/**
 * advik_blog_lite_Recommendation Class
 * 
 * Handles the recommended plugin functionality.
 * 
 * @package Advik Blog Lite
 * @since 1.0
 */

// Plugin recomendation class
require_once( ADVIK_BLOG_LITE_DIR . '/includes/plugins/class-tgm-plugin-activation.php' );

class advik_blog_lite_Recommendation {

	function __construct() {
		
		// Action to add recomended plugins
		add_action( 'tgmpa_register', array($this, 'advik_blog_lite_recommend_plugin') );
	}

	/**
	 * Recommend Plugins
	 * 
	 * @package Advik Blog Lite
	 * @since 1.0
	 */
	function advik_blog_lite_recommend_plugin() {	   
		
		$plugins = array(	       
	        array(
	            'name'               => __('Instagram Slider and Carousel Plus Widget', 'advik-blog-lite'),
	            'slug'               => 'slider-and-carousel-plus-widget-for-instagram',
	            'required'           => false,
	        )
	    );
		
	    tgmpa( $plugins);
	}
}

$advik_blog_lite_recommendation = new advik_blog_lite_Recommendation();