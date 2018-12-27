<?php
/**
 * Menu and Logo Display Options
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return array $travel_way_header_image_display
 *
 */
if ( !function_exists('travel_way_header_image_display') ) :
	function travel_way_header_image_display() {
		$travel_way_header_image_display =  array(
			'hide'              => esc_html__( 'Hide', 'travel-way' ),
			'bg-image'          => esc_html__( 'Background Image', 'travel-way' ),
			'normal-image'      => esc_html__( 'Normal Image', 'travel-way' )
		);
		return apply_filters( 'travel_way_header_image_display', $travel_way_header_image_display );
	}
endif;

/**
 * Menu Right Button Link Options
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return array $travel_way_menu_right_button_link_options
 *
 */
if ( !function_exists('travel_way_menu_right_button_link_options') ) :
	function travel_way_menu_right_button_link_options() {
		$travel_way_menu_right_button_link_options =  array(
			'disable'       => esc_html__( 'Disable', 'travel-way' ),
			'booking'       => esc_html__( 'Popup Widgets ( Booking Form )', 'travel-way' ),
			'link'          => esc_html__( 'Open Link', 'travel-way' )
		);
		return apply_filters( 'travel_way_menu_right_button_link_options', $travel_way_menu_right_button_link_options );
	}
endif;

/**
 * Header top display options of elements
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return array $travel_way_header_top_display_selection
 *
 */
if ( !function_exists('travel_way_header_top_display_selection') ) :
	function travel_way_header_top_display_selection() {
		$travel_way_header_top_display_selection =  array(
			'hide'          => esc_html__( 'Hide', 'travel-way' ),
			'left'          => esc_html__( 'on Top Left', 'travel-way' ),
			'right'         => esc_html__( 'on Top Right', 'travel-way' )
		);
		return apply_filters( 'travel_way_header_top_display_selection', $travel_way_header_top_display_selection );
	}
endif;

/**
 * Feature slider text align
 *
 * @since Mercantile 1.0.0
 *
 * @param null
 * @return array $travel_way_slider_text_align
 *
 */
if ( !function_exists('travel_way_slider_text_align') ) :
	function travel_way_slider_text_align() {
		$travel_way_slider_text_align =  array(
			'alternate'     => esc_html__( 'Alternate', 'travel-way' ),
			'text-left'     => esc_html__( 'Left', 'travel-way' ),
			'text-right'    => esc_html__( 'Right', 'travel-way' ),
			'text-center'   => esc_html__( 'Center', 'travel-way' )
		);
		return apply_filters( 'travel_way_slider_text_align', $travel_way_slider_text_align );
	}
endif;

/**
 * Featured Slider Image Options
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return array $travel_way_fs_image_display_options
 *
 */
if ( !function_exists('travel_way_fs_image_display_options') ) :
	function travel_way_fs_image_display_options() {
		$travel_way_fs_image_display_options =  array(
			'full-screen-bg' => esc_html__( 'Full Screen Background', 'travel-way' ),
			'responsive-img' => esc_html__( 'Responsive Image', 'travel-way' )
		);
		return apply_filters( 'travel_way_fs_image_display_options', $travel_way_fs_image_display_options );
	}
endif;

/**
 * Feature Info number
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return array $travel_way_feature_info_number
 *
 */
if ( !function_exists('travel_way_feature_info_number') ) :
	function travel_way_feature_info_number() {
		$travel_way_feature_info_number =  array(
			1               => esc_html__( '1', 'travel-way' ),
			2               => esc_html__( '2', 'travel-way' ),
			3               => esc_html__( '3', 'travel-way' ),
			4               => esc_html__( '4', 'travel-way' ),
		);
		return apply_filters( 'travel_way_feature_info_number', $travel_way_feature_info_number );
	}
endif;

/**
 * Footer copyright beside options
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return array $travel_way_footer_copyright_beside_option
 *
 */
if ( !function_exists('travel_way_footer_copyright_beside_option') ) :
	function travel_way_footer_copyright_beside_option() {
		$travel_way_footer_copyright_beside_option =  array(
			'hide'          => esc_html__( 'Hide', 'travel-way' ),
			'social'        => esc_html__( 'Social Links', 'travel-way' ),
			'footer-menu'   => esc_html__( 'Footer Menu', 'travel-way' )
		);
		return apply_filters( 'travel_way_footer_copyright_beside_option', $travel_way_footer_copyright_beside_option );
	}
endif;

/**
 * Sidebar layout options
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return array $travel_way_sidebar_layout
 *
 */
if ( !function_exists('travel_way_sidebar_layout') ) :
    function travel_way_sidebar_layout() {
        $travel_way_sidebar_layout =  array(
	        'right-sidebar' => esc_html__( 'Right Sidebar', 'travel-way' ),
	        'left-sidebar'  => esc_html__( 'Left Sidebar' , 'travel-way' ),
	        'both-sidebar'  => esc_html__( 'Both Sidebar' , 'travel-way' ),
	        'middle-col'    => esc_html__( 'Middle Column' , 'travel-way' ),
	        'no-sidebar'    => esc_html__( 'No Sidebar', 'travel-way' )
        );
        return apply_filters( 'travel_way_sidebar_layout', $travel_way_sidebar_layout );
    }
endif;

/**
 * Blog content from
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return array $travel_way_blog_archive_content_from
 *
 */
if ( !function_exists('travel_way_blog_archive_content_from') ) :
	function travel_way_blog_archive_content_from() {
		$travel_way_blog_archive_content_from =  array(
			'excerpt'    => esc_html__( 'Excerpt', 'travel-way' ),
			'content'    => esc_html__( 'Content', 'travel-way' )
		);
		return apply_filters( 'travel_way_blog_archive_content_from', $travel_way_blog_archive_content_from );
	}
endif;

/**
 * Image Size
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return array $travel_way_get_image_sizes_options
 *
 */
if ( !function_exists('travel_way_get_image_sizes_options') ) :
	function travel_way_get_image_sizes_options( $add_disable = false ) {
		global $_wp_additional_image_sizes;
		$choices = array();
		if ( true == $add_disable ) {
			$choices['disable'] = esc_html__( 'No Image', 'travel-way' );
		}
		foreach ( array( 'thumbnail', 'medium', 'large' ) as $key => $_size ) {
			$choices[ $_size ] = $_size . ' ('. get_option( $_size . '_size_w' ) . 'x' . get_option( $_size . '_size_h' ) . ')';
		}
		$choices['full'] = esc_html__( 'full (original)', 'travel-way' );
		if ( ! empty( $_wp_additional_image_sizes ) && is_array( $_wp_additional_image_sizes ) ) {

			foreach ($_wp_additional_image_sizes as $key => $size ) {
				$choices[ $key ] = $key . ' ('. $size['width'] . 'x' . $size['height'] . ')';
			}
		}
		return apply_filters( 'travel_way_get_image_sizes_options', $choices );
	}
endif;


/**
 * Pagination Options
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return array travel_way_pagination_options
 *
 */
if ( !function_exists('travel_way_pagination_options') ) :
	function travel_way_pagination_options() {
		$travel_way_pagination_options =  array(
			'default'  => esc_html__( 'Default', 'travel-way' ),
			'numeric'  => esc_html__( 'Numeric', 'travel-way' )
		);
		return apply_filters( 'travel_way_pagination_options', $travel_way_pagination_options );
	}
endif;

/**
 * Default Theme layout options
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return array $travel_way_theme_layout
 *
 */
if ( !function_exists('travel_way_get_default_theme_options') ) :
    function travel_way_get_default_theme_options() {

        $default_theme_options = array(

	        /*logo and site title*/
	        'travel-way-display-site-logo'      => '',
	        'travel-way-display-site-title'     => 1,
	        'travel-way-display-site-tagline'   => 1,

	        /*header height*/
	        'travel-way-header-height'          => 300,
	        'travel-way-header-image-display'   => 'normal-image',

            /*header top*/
            'travel-way-enable-header-top'       => '',
	        'travel-way-header-top-menu-display-selection'      => 'right',
	        'travel-way-header-top-info-display-selection'      => 'left',
	        'travel-way-header-top-social-display-selection'    => 'right',

	        /*menu options*/
            'travel-way-enable-transparent'             => '',
            'travel-way-enable-sticky'                  => '',
	        'travel-way-menu-right-button-options'      => 'disable',
	        'travel-way-menu-right-button-title'        => esc_html__('Request a Quote','travel-way'),
	        'travel-way-menu-right-button-link'         => '',
            'travel-way-enable-cart-icon'               => '',

	        /*feature section options*/
	        'travel-way-enable-feature'                         => '',
	        'travel-way-slides-data'                            => '',
            'travel-way-feature-slider-enable-animation'        => 1,
            'travel-way-feature-slider-display-title'           => 1,
            'travel-way-feature-slider-display-excerpt'         => 1,
            'travel-way-fs-image-display-options'               => 'full-screen-bg',
            'travel-way-feature-slider-text-align'              => 'text-left',

	        /*basic info*/
	        'travel-way-feature-info-number'    => 4,
	        'travel-way-first-info-icon'        => 'fa-calendar',
	        'travel-way-first-info-title'       => esc_html__('Send Us a Mail', 'travel-way'),
	        'travel-way-first-info-desc'        => esc_html__('domain@example.com ', 'travel-way'),
	        'travel-way-second-info-icon'       => 'fa-map-marker',
	        'travel-way-second-info-title'      => esc_html__('Our Location', 'travel-way'),
	        'travel-way-second-info-desc'       => esc_html__('Elmonte California', 'travel-way'),
	        'travel-way-third-info-icon'        => 'fa-phone',
	        'travel-way-third-info-title'       => esc_html__('Call Us', 'travel-way'),
	        'travel-way-third-info-desc'        => esc_html__('01-23456789-10', 'travel-way'),
	        'travel-way-forth-info-icon'        => 'fa-envelope-o',
	        'travel-way-forth-info-title'       => esc_html__('Office Hours', 'travel-way'),
	        'travel-way-forth-info-desc'        => esc_html__('8 hours per day', 'travel-way'),

            /*footer options*/
            'travel-way-footer-copyright'                       => esc_html__( '&copy; All right reserved', 'travel-way' ),
	        'travel-way-footer-copyright-beside-option'         => 'footer-menu',
	        'travel-way-footer-bg-img'                          => '',

	        /*layout/design options*/
	        'travel-way-pagination-option'      => 'numeric',

	        'travel-way-enable-animation'       => '',

	        'travel-way-single-sidebar-layout'                  => 'right-sidebar',
            'travel-way-front-page-sidebar-layout'              => 'right-sidebar',
            'travel-way-archive-sidebar-layout'                 => 'right-sidebar',

            'travel-way-blog-archive-img-size'                  => 'full',
            'travel-way-blog-archive-content-from'              => 'excerpt',
            'travel-way-blog-archive-excerpt-length'            => 42,
	        'travel-way-blog-archive-more-text'                 => esc_html__( 'Read More', 'travel-way' ),

	        'travel-way-primary-color'          => '#77a6f7',
            'travel-way-header-top-bg-color'    => '#77a6f7',
            'travel-way-footer-bg-color'        => '#434a54',
            'travel-way-footer-bottom-bg-color' => '#414852',
            'travel-way-link-color'             => '#f4364f',
            'travel-way-link-hover-color'       => '#fc002a',

	        /*Front Page*/
            'travel-way-hide-front-page-content' => '',
            'travel-way-hide-front-page-header'  => '',


	        /*woocommerce*/
	        'travel-way-wc-shop-archive-sidebar-layout'     => 'no-sidebar',
	        'travel-way-wc-product-column-number'           => 4,
	        'travel-way-wc-shop-archive-total-product'      => 16,
	        'travel-way-wc-single-product-sidebar-layout'   => 'no-sidebar',

	        /*single post*/
	        'travel-way-single-header-title'            => esc_html__( 'Blog', 'travel-way' ),
	        'travel-way-single-img-size'                => 'full',

	        /*theme options*/
            'travel-way-popup-widget-title'     => esc_html__( 'Request a Quote', 'travel-way' ),
	        'travel-way-show-breadcrumb'        => 1,
            'travel-way-search-placeholder'     => esc_html__( 'Search', 'travel-way' ),
            'travel-way-social-data'            => ''
        );
        return apply_filters( 'travel_way_default_theme_options', $default_theme_options );
    }
endif;

/**
 * Get theme options
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return array travel_way_theme_options
 *
 */
if ( !function_exists('travel_way_get_theme_options') ) :
    function travel_way_get_theme_options() {

        $travel_way_default_theme_options = travel_way_get_default_theme_options();
        $travel_way_get_theme_options = get_theme_mod( 'travel_way_theme_options');
        if( is_array( $travel_way_get_theme_options )){
            return array_merge( $travel_way_default_theme_options ,$travel_way_get_theme_options );
        }
        else{
            return $travel_way_default_theme_options;
        }
    }
endif;