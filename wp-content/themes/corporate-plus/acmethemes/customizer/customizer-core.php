<?php
/**
 * Feature slider type
 *
 * @since corporate-plus 1.0.0
 *
 * @param null
 * @return array $corporate_plus_slider_selection_from
 *
 */
if ( !function_exists('corporate_plus_slider_type') ) :
	function corporate_plus_slider_type() {
		$corporate_plus_slider_type =  array(
			'text-slider'   => __( 'Text Slider', 'corporate-plus' ),
			'full-slider'   => __( 'Full Slider', 'corporate-plus' )
		);
		return apply_filters( 'corporate_plus_slider_type', $corporate_plus_slider_type );
	}
endif;

/**
 * Featured Slider Image Options
 *
 * @since corporate-plus 1.0.0
 *
 * @param null
 * @return array $corporate_plus_fs_image_display_options
 *
 */
if ( !function_exists('corporate_plus_fs_image_display_options') ) :
	function corporate_plus_fs_image_display_options() {
		$corporate_plus_fs_image_display_options =  array(
			'full-screen-bg' => __( 'Full Screen Background', 'corporate-plus' ),
			'responsive-img' => __( 'Responsive Image', 'corporate-plus' )
		);
		return apply_filters( 'corporate_plus_fs_image_display_options', $corporate_plus_fs_image_display_options );
	}
endif;

/**
 * Header logo/text display options alternative
 *
 * @since Corporate Plus 1.0.2
 *
 * @param null
 * @return array $corporate_plus_header_id_display_opt
 *
 */
if ( !function_exists('corporate_plus_header_id_display_opt') ) :
    function corporate_plus_header_id_display_opt() {
        $corporate_plus_header_id_display_opt =  array(
            'logo-only' => __( 'Logo Only ( First Select Logo Above )', 'corporate-plus' ),
            'title-only' => __( 'Site Title Only', 'corporate-plus' ),
            'title-and-tagline' =>  __( 'Site Title and Tagline', 'corporate-plus' ),
            'disable' => __( 'Disable', 'corporate-plus' )
        );
        return apply_filters( 'corporate_plus_header_id_display_opt', $corporate_plus_header_id_display_opt );
    }
endif;

/**
 * Sidebar layout options
 *
 * @since Corporate Plus 1.0.0
 *
 * @param null
 * @return array $corporate_plus_sidebar_layout
 *
 */
if ( !function_exists('corporate_plus_sidebar_layout') ) :
    function corporate_plus_sidebar_layout() {
        $corporate_plus_sidebar_layout =  array(
            'right-sidebar'=> __( 'Right Sidebar', 'corporate-plus' ),
            'left-sidebar'=> __( 'Left Sidebar' , 'corporate-plus' ),
            'no-sidebar'=> __( 'No Sidebar', 'corporate-plus' )
        );
        return apply_filters( 'corporate_plus_sidebar_layout', $corporate_plus_sidebar_layout );
    }
endif;

/**
 * Blog layout options
 *
 * @since Corporate Plus 1.0.0
 *
 * @param null
 * @return array $corporate_plus_blog_layout
 *
 */
if ( !function_exists('corporate_plus_blog_layout') ) :
    function corporate_plus_blog_layout() {
        $corporate_plus_blog_layout =  array(
            'left-image' => __( 'Left Image', 'corporate-plus' ),
            'no-image' => __( 'No Image', 'corporate-plus' )
        );
        return apply_filters( 'corporate_plus_blog_layout', $corporate_plus_blog_layout );
    }
endif;

/**
 * Blog layout options
 *
 * @since Corporate Plus 1.0.0
 *
 * @param null
 * @return array $corporate_plus_get_image_sizes_options
 *
 */
if ( !function_exists('corporate_plus_get_image_sizes_options') ) :
	function corporate_plus_get_image_sizes_options( $add_disable = false ) {
		global $_wp_additional_image_sizes;
		$choices = array();
		if ( true == $add_disable ) {
			$choices['disable'] = __( 'No Image', 'corporate-plus' );
		}
		foreach ( array( 'thumbnail', 'medium', 'large' ) as $key => $_size ) {
			$choices[ $_size ] = $_size . ' ('. get_option( $_size . '_size_w' ) . 'x' . get_option( $_size . '_size_h' ) . ')';
		}
		$choices['full'] = __( 'full (original)', 'corporate-plus' );
		if ( ! empty( $_wp_additional_image_sizes ) && is_array( $_wp_additional_image_sizes ) ) {

			foreach ($_wp_additional_image_sizes as $key => $size ) {
				$choices[ $key ] = $key . ' ('. $size['width'] . 'x' . $size['height'] . ')';
			}

		}
		return apply_filters( 'corporate_plus_get_image_sizes_options', $choices );
	}
endif;

/**
 *  Default Theme layout options
 *
 * @since Corporate Plus 1.0.0
 *
 * @param null
 * @return array $corporate_plus_theme_layout
 *
 */
if ( !function_exists('corporate_plus_get_default_theme_options') ) :
    function corporate_plus_get_default_theme_options() {

        $default_theme_options = array(
            /*feature section options*/
	        'corporate-plus-slider-type'  => 'text-slider',
	        'corporate-plus-feature-slider-image-only'  => '',
	        'corporate-plus-fs-image-display-options'  => 'full-screen-bg',
            'corporate-plus-feature-page'  => 0,
            'corporate-plus-featured-slider-number'  => 2,
            'corporate-plus-go-down'  => '',
            'corporate-plus-enable-feature'  => 1,
	        'corporate-plus-slider-know-more-text'  => __( "Know More", "corporate-plus" ),

            /*header options*/
            'corporate-plus-header-logo'  => '',
            'corporate-plus-header-id-display-opt' => 'title-and-tagline',
	        'corporate-plus-enable-sticky-menu' => 1,
	        'corporate-plus-enable-woo-menu' => 1,

            'corporate-plus-facebook-url'  => '',
            'corporate-plus-twitter-url'  => '',
            'corporate-plus-youtube-url'  => '',
            'corporate-plus-google-plus-url'  => '',
            'corporate-plus-enable-social'  => 0,

            /*footer options*/
            'corporate-plus-footer-copyright'  => __( '&copy; All right reserved 2016', 'corporate-plus' ),

            /*layout/design options*/
	        'corporate-plus-hide-front-page-content'  => '',

	        /*layout/design options*/
	        'corporate-plus-sidebar-layout'  => 'right-sidebar',
	        'corporate-plus-front-page-sidebar-layout'  => 'right-sidebar',
	        'corporate-plus-archive-sidebar-layout'  => 'right-sidebar',

            'corporate-plus-blog-archive-layout'  => 'left-image',
	        'corporate-plus-blog-archive-img-size'  => 'full',
	        'corporate-plus-primary-color'  => '#F88C00',
            'corporate-plus-custom-css'  => '',

	        'corporate-plus-enable-animation'  => '',

	        'corporate-plus-blog-archive-more-text'  => __( 'Read More', 'corporate-plus' ),

            /*theme options*/
            'corporate-plus-search-placholder'  => __( 'Search', 'corporate-plus' ),
            'corporate-plus-show-breadcrumb'  => 0,
        );

        return apply_filters( 'corporate_plus_default_theme_options', $default_theme_options );
    }
endif;

/**
 *  Get theme options
 *
 * @since Corporate Plus 1.0.0
 *
 * @param null
 * @return array corporate_plus_theme_options
 *
 */
if ( !function_exists('corporate_plus_get_theme_options') ) :
    function corporate_plus_get_theme_options() {

        $corporate_plus_default_theme_options = corporate_plus_get_default_theme_options();
        $corporate_plus_get_theme_options = get_theme_mod( 'corporate_plus_theme_options');
        if( is_array( $corporate_plus_get_theme_options )){
            return array_merge( $corporate_plus_default_theme_options ,$corporate_plus_get_theme_options );
        }
        else{
            return $corporate_plus_default_theme_options;
        }
    }
endif;