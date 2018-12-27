<?php
/**
 * EDigital Market functions.
 *
 * @package EDigital
 * @subpackage EDigital Market
 * 
 */

/*-------------------------------------------------------------------------------------------------------------------------------*/
if ( ! function_exists( 'edigital_market_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function edigital_market_setup() {

    $edigital_market_theme_info = wp_get_theme();
    $GLOBALS['edigital_market_version'] = $edigital_market_theme_info->get( 'Version' );
}
endif;

add_action( 'after_setup_theme', 'edigital_market_setup' );

/*-------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function edigital_market_body_classes( $classes ) {

	$header_search_icon_option = get_theme_mod( 'header_search_icon_option', 'show' );
	if( $header_search_icon_option === 'hide' ) {
		$classes[] = 'search-icon-hide';
	}

	return $classes;
}

add_filter( 'body_class', 'edigital_market_body_classes' );

/*-------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Register Google fonts for Edigital Market
 *
 * @return string Google fonts URL for the theme.
 * @since 1.0.0
 */
if ( ! function_exists( 'edigital_market_fonts_url' ) ) :
    function edigital_market_fonts_url() {

        $fonts_url = '';
        $font_families = array();

        /*
         * Translators: If there are characters in your language that are not supported
         * by Ruda, translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Ruda font: on or off', 'edigital-market' ) ) {
            $font_families[] = 'Ruda:400,700,900';
        }

        if( $font_families ) {
            $query_args = array(
                'family' => urlencode( implode( '|', $font_families ) ),
                'subset' => urlencode( 'latin,latin-ext' ),
            );

            $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
        }

        return $fonts_url;
    }
endif;

/*-------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Managed the theme default color
 */
function edigital_market_customize_register( $wp_customize ) {
		global $wp_customize;

		$wp_customize->remove_control( 'edigital_skin_color' );
		
		/**
	     * Primary theme color
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting(
	        'edigital_market_theme_color',
	        array(
	            'default'     => '#029FB2',
	            'sanitize_callback' => 'sanitize_hex_color',
	        )
	    ); 
	    $wp_customize->add_control( new WP_Customize_Color_Control(
	            $wp_customize,
	            'edigital_market_theme_color',
	            array(
	                'label'      => __( 'Theme Color', 'edigital-market' ),
	                'section'    => 'colors',
	                'priority'   => 5
	            )
	        )
	    );

	    /**
	     * Switch option for search icon
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting(
	        'header_search_icon_option',
	        array(
	            'default' => 'show',
	            'sanitize_callback' => 'edigital_sanitize_show_switch',
	            )
	    );
	    $wp_customize->add_control( new Edigital_Customize_Switch_Control(
	        $wp_customize, 
	            'header_search_icon_option', 
	            array(
	                'type' 		=> 'switch',
	                'label' 	=> esc_html__( 'Search Icon', 'edigital-market' ),
	                'description' 	=> esc_html__( 'Enable/Disable search icon at primary menu section.', 'edigital-market' ),
	                'section' 	=> 'additional_header_section',
	                'choices'   => array(
	                    'show' 	=> esc_html__( 'Enable', 'edigital-market' ),
	                    'hide' 	=> esc_html__( 'Disable', 'edigital-market' )
	                    ),
	                'priority'  => 10,
	            )
	        )
	    );

	}

add_action( 'customize_register', 'edigital_market_customize_register', 20 );


/*-------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Enqueue child theme styles and scripts
 */
add_action( 'wp_enqueue_scripts', 'edigital_market_scripts', 20 );

function edigital_market_scripts() {
    
    global $edigital_market_version;
    
    wp_enqueue_style( 'edigital-market-google-font', edigital_market_fonts_url(), array(), null );
    
    wp_dequeue_style( 'edigital-style' );
    
	wp_enqueue_style( 'edigital-parent-style', get_template_directory_uri() . '/style.css', array(), esc_attr( $edigital_market_version ) );
    
    wp_enqueue_style( 'edigital-market-style', get_stylesheet_uri(), array(), esc_attr( $edigital_market_version ) );
    
    $edigital_market_theme_color = get_theme_mod( 'edigital_market_theme_color', '#27b6d4' );
    
    $output_css = '';
    
    $output_css .= ".navigation .nav-links a:hover,.bttn:hover,button,input[type='button']:hover,input[type='reset']:hover,input[type='submit']:hover,.edit-link .post-edit-link,.reply .comment-reply-link,.widget_search .search-submit,#edigital-header-cart .header-cart.edd-cart-quantity,.slider-btn a:hover,.home-slider-wrapper .lSSlideOuter .lSPager.lSpg > li.active a,.home-slider-wrapper .lSSlideOuter .lSPager.lSpg > li:hover a,.edigital-widget-wrapper .section-title-wrapper .widget-title::after,.edigital_call_to_action .edigital-widget-wrapper,.latest-posts-wrapper .blog-date,.latest-products-wrapper .product-price,.latest-products-wrapper .product-vendor .product-author > span,.edd-submit.button.blue.active,.edd-submit.button.blue:focus,.edd-submit.button.blue:hover,.error404 .page-title,.edd-submit.button.blue,#edd-purchase-button,.edd-submit,input.edd-submit[type='submit'],#mt-scrollup,.sub-toggle,#site-navigation ul > li:hover > .sub-toggle,#site-navigation ul > li.current-menu-item .sub-toggle,#site-navigation ul > li.current-menu-ancestor .sub-toggle,.featured-items-wrapper .mt-more-btn:hover, .featured-items-wrapper .mt-edd-cart-btn:hover, .latest-products-wrapper .mt-more-btn:hover, .latest-products-wrapper .mt-edd-cart-btn:hover,.testimonialsSlider .img-holder::after,.edigital_testimonials .lSPager.lSpg li.active a,.edigital_testimonials .lSPager.lSpg li a:hover,.about-content a,.edigital_call_to_action .cta-btn-wrap a:hover,.blog-content-wrapper .news-more{ background: ". esc_attr( $edigital_market_theme_color ) ."}\n";

    $output_css .= "a,a:hover,a:focus,a:active,.entry-footer a:hover,.comment-author .fn .url:hover,#cancel-comment-reply-link,#cancel-comment-reply-link:before,.logged-in-as a,.widget a:hover,.widget a:hover::before,.widget li:hover::before,#site-navigation ul li.current-menu-item > a,#site-navigation ul li:hover > a,#site-navigation ul.sub-menu li:hover > a,#site-navigation ul.children li:hover > a,.slide-title span,.edigital_service_section .post-title a:hover,.featured-items-wrapper .prd-title a:hover,.latest-products-wrapper .product-title a:hover,.blog-content-wrapper .news-more,.entry-title a:hover,.entry-meta span a:hover,.post-readmore a:hover,.edd_downloads_list .edd_download_title a:hover,.social-link a:hover,.site-info a:hover,#colophon .site-info a,.blog-content-wrapper .news-title a:hover{ color: ". esc_attr( $edigital_market_theme_color ) ."}\n";

    $output_css .= ".navigation .nav-links a,.bttn,button,input[type='button'],input[type='reset'],input[type='submit'],.widget_search .search-submit,.slider-btn a:hover,.featured-items-wrapper .mt-more-btn:hover, .featured-items-wrapper .mt-edd-cart-btn:hover, .latest-products-wrapper .mt-more-btn:hover, .latest-products-wrapper .mt-edd-cart-btn:hover,.edigital_call_to_action .cta-btn-wrap a:hover{ border-color: ". esc_attr( $edigital_market_theme_color ) ."}\n";

    $output_css .= ".comment-list .comment-body { border-top-color: ". esc_attr( $edigital_market_theme_color ) ."}\n";
    
    $output_css .= ".latest-products-wrapper .product-thumb-wrap { border-bottom-color: ". esc_attr( $edigital_market_theme_color ) ."}\n";

    $output_css .=".header-search-wrapper .search-form-main{
                        background:". edigital_hex2rgba( $edigital_market_theme_color, '0.7' ) ."}\n";

    $output_css .=".edigital_call_to_action .edigital-widget-wrapper::before{
                        background:". edigital_hex2rgba( $edigital_market_theme_color, '0.85' ) ."}\n";
        
    $refine_output_css = edigital_css_strip_whitespace( $output_css );

    wp_add_inline_style( 'edigital-market-style', $refine_output_css );
    
}
