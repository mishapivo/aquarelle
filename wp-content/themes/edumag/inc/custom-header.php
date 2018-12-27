<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * You can add an optional custom header image to header.php like so ...
 *

 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Theme Palace
 * @subpackage EduMag
 * @since EduMag 0.1
 */

if ( ! function_exists( 'edumag_custom_header_setup' ) ) :
	/**
	 * Set up the WordPress core custom header feature.
	 *
	 * @uses edumag_header_style()
	 */
	function edumag_custom_header_setup() {
		add_theme_support( 'custom-header', apply_filters( 'edumag_custom_header_args', array(
			'default-image'          => get_template_directory_uri(). '/assets/uploads/banner-02.jpg',
			'default-text-color'     => '333333',
			'width'                  => 1200,
			'height'                 => 400,
			'flex-height'            => false,
		) ) );
	}
endif;
add_action( 'after_setup_theme', 'edumag_custom_header_setup' );

if ( ! function_exists( 'edumag_render_banner_section' ) ) :
	/**
	 * Hook to display banner section
	 *
	 * @since EduMag 0.1
	 */
	function edumag_render_banner_section() {
		global $wp_query, $post;
		
		$options = edumag_get_theme_options(); // get theme options 	

		// Get front page ID
		$page_on_front	  = get_option('page_on_front');
		
		// Get Page ID outside Loop
		$page_id          = $wp_query->get_queried_object_id( $post );

		if ( ( ! is_home() && absint( $page_on_front ) == absint( $page_id ) ) || is_404() ) {
			return;
		} else {
			/**
			 * Filter the default twentysixteen custom header sizes attribute.
			 *
			 * @since EduMag 0.1
			 *
			 */
			$header_image_meta = edumag_header_image_meta_option(); // get header image

			$header_class = ( '' == $header_image_meta ) ? 'header-image-disabled' : '';
		?>
		<section id="banner-image" class="page-section <?php echo esc_attr( $header_class ); ?>">
	        <div class="container">
	        	<?php 
	        		// Check if header image meta is not empty
	        		if ( '' != $header_image_meta ){
	        			echo wp_kses_post( $header_image_meta );
	        		}

	          		do_action( 'edumag_add_breadcrumb' ); // add breadcrumbs
	          	?>
	        </div><!--.container-->      
	    </section><!-- #banner-image -->	
		<?php
		}
	}
endif;
add_action( 'edumag_content_start_action', 'edumag_render_banner_section', 20 );


// Add Custom Css
function edumag_inline_css() {
	$header_text_color = get_header_textcolor(); // get header text color

	$custom_css = '';
	if ( get_theme_support( 'custom-header', 'default-text-color' ) !== $header_text_color ) {
		if ( ! display_header_text() ) :
			$header_color = ".site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}";
			// If the user has set a custom color for the text use that.
		else :
			$header_color = '
			.site-header .site-title a,
			.site-description {
				color: #'. esc_attr( $header_text_color ) .
			'}';
		endif; 
		$custom_css .= $header_color;
	}

	wp_add_inline_style( 'edumag-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'edumag_inline_css', 10 );