<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Mystery Themes
 * @subpackage EDigital
 * @since 1.0.0
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function edigital_body_classes( $classes ) {

	global $post;

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	/**
     * Sidebar option for post/page/archive
     *
     * @since 1.0.0
     */
    if( 'post' === get_post_type() ) {
        $sidebar_meta_option = get_post_meta( $post->ID, 'edigital_sidebar_location', true );
    }

    if( 'page' === get_post_type() ) {
        $sidebar_meta_option = get_post_meta( $post->ID, 'edigital_sidebar_location', true );
    }
     
    if( is_home() ) {
        $home_id = get_option( 'page_for_posts' );
        $sidebar_meta_option = get_post_meta( $home_id, 'edigital_sidebar_location', true );
    }
    
    if( empty( $sidebar_meta_option ) || is_archive() || is_search() ) {
        $sidebar_meta_option = 'default_sidebar';
    }
    $archive_sidebar 		= get_theme_mod( 'edigital_archive_sidebar', 'right_sidebar' );
    $post_default_sidebar 	= get_theme_mod( 'edigital_default_post_sidebar', 'right_sidebar' );        
    $page_default_sidebar 	= get_theme_mod( 'edigital_default_page_sidebar', 'right_sidebar' );
    
    if( $sidebar_meta_option == 'default_sidebar' ) {
        if( is_single() ) {
            if( $post_default_sidebar == 'right_sidebar' ) {
                $classes[] = 'right-sidebar';
            } elseif( $post_default_sidebar == 'left_sidebar' ) {
                $classes[] = 'left-sidebar';
            } elseif( $post_default_sidebar == 'no_sidebar' ) {
                $classes[] = 'no-sidebar';
            } elseif( $post_default_sidebar == 'no_sidebar_center' ) {
                $classes[] = 'no-sidebar-center';
            }
        } elseif( is_page() && !is_page_template( 'templates/home-template.php' ) ) {
            if( $page_default_sidebar == 'right_sidebar' ) {
                $classes[] = 'right-sidebar';
            } elseif( $page_default_sidebar == 'left_sidebar' ) {
                $classes[] = 'left-sidebar';
            } elseif( $page_default_sidebar == 'no_sidebar' ) {
                $classes[] = 'no-sidebar';
            } elseif( $page_default_sidebar == 'no_sidebar_center' ) {
                $classes[] = 'no-sidebar-center';
            }
        } elseif( $archive_sidebar == 'right_sidebar' ) {
            $classes[] = 'right-sidebar';
        } elseif( $archive_sidebar == 'left_sidebar' ) {
            $classes[] = 'left-sidebar';
        } elseif( $archive_sidebar == 'no_sidebar' ) {
            $classes[] = 'no-sidebar';
        } elseif( $archive_sidebar == 'no_sidebar_center' ) {
            $classes[] = 'no-sidebar-center';
        }
    } elseif( $sidebar_meta_option == 'right_sidebar' ) {
        $classes[] = 'right-sidebar';
    } elseif( $sidebar_meta_option == 'left_sidebar' ) {
        $classes[] = 'left-sidebar';
    } elseif( $sidebar_meta_option == 'no_sidebar' ) {
        $classes[] = 'no-sidebar';
    } elseif( $sidebar_meta_option == 'no_sidebar_center' ) {
        $classes[] = 'no-sidebar-center';
    }

    $header_sticky_option = get_theme_mod( 'header_sticky_option', 'show' );
    if( $header_sticky_option == 'hide' ) {
        $classes[] = 'no-header-sticky';
    }

	return $classes;
}
add_filter( 'body_class', 'edigital_body_classes' );

if( ! function_exists( 'edigital_dynamic_styles' ) ):
    function edigital_dynamic_styles() {

        $edigital_skin_color = get_theme_mod( 'edigital_skin_color', '#90c847' );

        $output_css = '';

        $output_css .=".navigation .nav-links a:hover,.bttn:hover,button,input[type='button']:hover,input[type='reset']:hover,input[type='submit']:hover,.edit-link .post-edit-link,.reply .comment-reply-link,.widget_search .search-submit,#edigital-header-cart .header-cart.edd-cart-quantity,.slider-btn a:hover,.home-slider-wrapper .lSSlideOuter .lSPager.lSpg > li.active a,.home-slider-wrapper .lSSlideOuter .lSPager.lSpg > li:hover a,.edigital-widget-wrapper .section-title-wrapper .widget-title::after,.edigital_call_to_action .edigital-widget-wrapper,.latest-posts-wrapper .blog-date,.latest-products-wrapper .product-price,.latest-products-wrapper .product-vendor .product-author > span,.edd-submit.button.blue.active,.edd-submit.button.blue:focus,.edd-submit.button.blue:hover,.error404 .page-title,.edd-submit.button.blue,#edd-purchase-button,.edd-submit,input.edd-submit[type='submit'],#mt-scrollup,.sub-toggle,#site-navigation ul > li:hover > .sub-toggle,#site-navigation ul > li.current-menu-item .sub-toggle,#site-navigation ul > li.current-menu-ancestor .sub-toggle,.featured-items-wrapper .mt-more-btn:hover, .featured-items-wrapper .mt-edd-cart-btn:hover, .latest-products-wrapper .mt-more-btn:hover, .latest-products-wrapper .mt-edd-cart-btn:hover,.testimonialsSlider .img-holder::after,.edigital_testimonials .lSPager.lSpg li.active a,.edigital_testimonials .lSPager.lSpg li a:hover,.about-content a{
                        background:". esc_attr( $edigital_skin_color ) ."}\n";

        $output_css .="a,a:hover,a:focus,a:active,.entry-footer a:hover,.comment-author .fn .url:hover,#cancel-comment-reply-link,#cancel-comment-reply-link:before,.logged-in-as a,.widget a:hover,.widget a:hover::before,.widget li:hover::before,#site-navigation ul li.current-menu-item > a,#site-navigation ul li:hover > a,#site-navigation ul.sub-menu li:hover > a,#site-navigation ul.children li:hover > a,.slide-title span,.edigital_service_section .post-title a:hover,.featured-items-wrapper .prd-title a:hover,.latest-products-wrapper .product-title a:hover,.blog-content-wrapper .news-more,.entry-title a:hover,.entry-meta span a:hover,.post-readmore a:hover,.edd_downloads_list .edd_download_title a:hover,.social-link a:hover,.site-info a:hover,#colophon .site-info a,.blog-content-wrapper .news-title a:hover{
                        color:". esc_attr( $edigital_skin_color ) ."}\n";

        $output_css .=".navigation .nav-links a,.bttn,button,input[type='button'],input[type='reset'],input[type='submit'],.widget_search .search-submit,.slider-btn a:hover,.featured-items-wrapper .mt-more-btn:hover, .featured-items-wrapper .mt-edd-cart-btn:hover, .latest-products-wrapper .mt-more-btn:hover, .latest-products-wrapper .mt-edd-cart-btn:hover{
                        border-color:". esc_attr( $edigital_skin_color ) ."}\n";

        $output_css .=".comment-list .comment-body{
                        border-top-color:". esc_attr( $edigital_skin_color ) ."}\n";

        $output_css .=".latest-products-wrapper .product-thumb-wrap{
                        border-bottom-color:". esc_attr( $edigital_skin_color ) ."}\n";

        $output_css .=".header-search-wrapper .search-form-main{
                        background:". edigital_hex2rgba( $edigital_skin_color, '0.7' ) ."}\n";

        $output_css .=".edigital_call_to_action .edigital-widget-wrapper::before{
                        background:". edigital_hex2rgba( $edigital_skin_color, '0.85' ) ."}\n";

        $refine_output_css = edigital_css_strip_whitespace( $output_css );

        wp_add_inline_style( 'edigital-style', $refine_output_css );
    }
endif;

add_action( 'wp_enqueue_scripts', 'edigital_dynamic_styles' );