<?php
/**
 * We have define some extra function related to the EDigital Store theme.
 * All functions are only compatible while you active this theme.
 *
 * @package Mystery Themes
 * @subpackage EDigital
 * @since 1.0.0
 */

/**
 * Enqueue scripts and styles for only admin
 */
add_action( 'admin_enqueue_scripts', 'edigital_admin_scripts' );

function edigital_admin_scripts( $hook ) {

    global $edigital_version;

    if( 'widgets.php' != $hook && 'customize.php' != $hook && 'edit.php' != $hook && 'post.php' != $hook && 'post-new.php' != $hook ) {
        return;
    }

    wp_enqueue_media();

    wp_enqueue_script( 'jquery-ui-button' );
	
    wp_enqueue_script( 'edigital-admin-script', get_template_directory_uri() .'/assets/js/admin-scripts.js', array( 'jquery' ), esc_attr( $edigital_version ), true );

    wp_enqueue_style( 'edigital-admin-style', get_template_directory_uri() . '/assets/css/admin-style.css', array(), esc_attr( $edigital_version ) );
}

/*---------------------------------------------------------------------------------------------------------------*/
/**
 * Enqueue scripts and styles.
 */
function edigital_scripts() {

    global $edigital_version;

    wp_enqueue_style( 'lighslider-style', get_template_directory_uri() . '/assets/library/lightslider/css/lightslider.min.css', '1.1.5' );
    
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/library/font-awesome/css/font-awesome.min.css', '4.6.3' );
    
    wp_enqueue_style( 'edigital-google-font', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,900' );
	
    wp_enqueue_style( 'edigital-style', get_stylesheet_uri(), array(), esc_attr( $edigital_version ) );

	wp_enqueue_script( 'lightslider', get_template_directory_uri() . '/assets/library/lightslider/js/lightslider.min.js', array( 'jquery' ), '1.1.5', true );

    $header_sticky_option = get_theme_mod( 'header_sticky_option', 'show' );
    if( $header_sticky_option != 'hide' ) {
        wp_enqueue_script( 'jquery-sticky', get_template_directory_uri() .'/assets/library/sticky/jquery.sticky.js', array( 'jquery' ), '1.0.2', true );
        wp_enqueue_script( 'edigital-sticky-setting', get_template_directory_uri() .'/assets/library/sticky/sticky-setting.js', array( 'jquery-sticky' ), esc_attr( $edigital_version ), true );
    }
    
    wp_enqueue_script( 'edigital-custom-script', get_template_directory_uri() . '/assets/js/custom-script.js', array( 'jquery' ), esc_attr( $edigital_version ), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'edigital_scripts' );

/*---------------------------------------------------------------------------------------------------------------*/
/**
 * Define categories for drop down
 *
 * @return array();
 */
if( !function_exists( 'edigital_category_dropdown' ) ):
    function edigital_category_dropdown() {
        $edigital_categories = get_categories( array( 'hide_empty' => 0 ) );
        $edigital_category_dropdown['0'] = __( 'Select Category', 'edigital' );
        foreach ( $edigital_categories as $edigital_category ) {
            $edigital_category_dropdown[$edigital_category->term_id] = $edigital_category->cat_name;
        }
        return $edigital_category_dropdown;
    }
endif;

/**
 * Define page
 *
 * @return array();
 */
if( !function_exists( 'edigital_pages_dropdown' ) ):
    function edigital_pages_dropdown() {
        $edigital_pages_args = array(
                                'post_type' => 'page',
                                'child_of' => 0,
                            );
        $edigital_pages = get_pages( $edigital_pages_args );
        $edigital_pages_dropdown['0'] = __( 'Select Pages', 'edigital' );
        foreach ( $edigital_pages as $edigital_page ) {
            $edigital_pages_dropdown[$edigital_page->ID] = $edigital_page->post_title;
        }
        return $edigital_pages_dropdown;
    }
endif;

/**
 * Category list
 *
 * @return array();
 */
if( !function_exists( 'edigital_categories_lists' ) ):
    function edigital_categories_lists() {
        $edigital_cat_args = array(
            'type'       => 'post',
            'child_of'   => 0,
            'orderby'    => 'name',
            'order'      => 'ASC',
            'hide_empty' => 1,
            'taxonomy'   => 'category',
        );
        $edigital_categories = get_categories( $edigital_cat_args );
        $edigital_categories_lists = array();
        foreach( $edigital_categories as $category ) {
            $edigital_categories_lists[$category->term_id] = $category->name;
        }
        return $edigital_categories_lists;
    }
endif;

/*---------------------------------------------------------------------------------------------------------------*/
/**
 * Function define about page/post/archive sidebar
 *
 * @since 1.0.0
 */
if( ! function_exists( 'edigital_get_sidebar' ) ):
function edigital_get_sidebar() {

    global $post;

    if( 'post' === get_post_type() ) {
        $sidebar_meta_option = get_post_meta( $post->ID, 'edigital_sidebar_location', true );
    }

    if( 'page' === get_post_type() ) {
        $sidebar_meta_option = get_post_meta( $post->ID, 'edigital_sidebar_location', true );
    }
     
    if( is_home() ) {
        $set_id = get_option( 'page_for_posts' );
        $sidebar_meta_option = get_post_meta( $set_id, 'edigital_sidebar_location', true );
    }
    
    if( empty( $sidebar_meta_option ) || is_archive() || is_search() ) {
        $sidebar_meta_option = 'default_sidebar';
    }
    
    $archive_sidebar = get_theme_mod( 'edigital_archive_sidebar', 'right_sidebar' );
    $post_default_sidebar = get_theme_mod( 'edigital_default_post_sidebar', 'right_sidebar' );
    $page_default_sidebar = get_theme_mod( 'edigital_default_page_sidebar', 'right_sidebar' );
    
    if( $sidebar_meta_option == 'default_sidebar' ) {
        if( is_single() ) {
            if( $post_default_sidebar == 'right_sidebar' ) {
                get_sidebar();
            } elseif( $post_default_sidebar == 'left_sidebar' ) {
                get_sidebar( 'left' );
            }
        } elseif( is_page() ) {
            if( $page_default_sidebar == 'right_sidebar' ) {
                get_sidebar();
            } elseif( $page_default_sidebar == 'left_sidebar' ) {
                get_sidebar( 'left' );
            }
        } elseif( $archive_sidebar == 'right_sidebar' ) {
            get_sidebar();
        } elseif( $archive_sidebar == 'left_sidebar' ) {
            get_sidebar( 'left' );
        }
    } elseif( $sidebar_meta_option == 'right_sidebar' ) {
        get_sidebar();
    } elseif( $sidebar_meta_option == 'left_sidebar' ) {
        get_sidebar( 'left' );
    }
}
endif;

/*---------------------------------------------------------------------------------------------------------------*/
/**
 * Function about social icons
 *
 * @since 1.0.0
 */
if( ! function_exists( 'edigital_social_icons' ) ):
	function edigital_social_icons() {
		$social_fb_link = get_theme_mod( 'fb_link', '' );
        $social_tw_link = get_theme_mod( 'tw_link', '' );        
        $social_lnk_link = get_theme_mod( 'lnk_link', '' );
        $social_pin_link = get_theme_mod( 'pin_link', '' );
        $social_gp_link = get_theme_mod( 'gp_link', '' );
        $social_yt_link = get_theme_mod( 'yt_link', '' );

        $social_fb_icon	= 'fa-facebook';
        $social_fb_icon	= apply_filters( 'social_fb_icon', $social_fb_icon );
        
        $social_tw_icon	= 'fa-twitter';
        $social_tw_icon	= apply_filters( 'social_tw_icon', $social_tw_icon );

        $social_gp_icon	= 'fa-google-plus';
        $social_gp_icon	= apply_filters( 'social_gp_icon', $social_gp_icon );

        $social_lnk_icon	= 'fa-linkedin';
        $social_lnk_icon	= apply_filters( 'social_lnk_icon', $social_lnk_icon );

        $social_yt_icon	= 'fa-youtube';
        $social_yt_icon	= apply_filters( 'social_yt_icon', $social_yt_icon );

        $social_pin_icon	= 'fa-pinterest';
        $social_pin_icon	= apply_filters( 'social_pin_icon', $social_pin_icon );

        if( !empty( $social_fb_link ) ) {
        	echo '<span class="social-link"><a href="'. esc_url( $social_fb_link ) .'" target="_blank"><i class="fa '. esc_attr( $social_fb_icon ) .'"></i></a></span>';
        }
        if( !empty( $social_tw_link ) ) {
        	echo '<span class="social-link"><a href="'. esc_url( $social_tw_link ) .'" target="_blank"><i class="fa '. esc_attr( $social_tw_icon ) .'"></i></a></span>';
        }
        if( !empty( $social_gp_link ) ) {
        	echo '<span class="social-link"><a href="'. esc_url( $social_gp_link ) .'" target="_blank"><i class="fa '. esc_attr( $social_gp_icon ) .'"></i></a></span>';
        }
        if( !empty( $social_lnk_link ) ) {
        	echo '<span class="social-link"><a href="'. esc_url( $social_lnk_link ) .'" target="_blank"><i class="fa '. esc_attr( $social_lnk_icon ) .'"></i></a></span>';
        }
        if( !empty( $social_yt_link ) ) {
        	echo '<span class="social-link"><a href="'. esc_url( $social_yt_link ) .'" target="_blank"><i class="fa '. esc_attr( $social_yt_icon ) .'"></i></a></span>';
        }
        if( !empty( $social_pin_link ) ) {
        	echo '<span class="social-link"><a href="'. esc_url( $social_pin_link ) .'" target="_blank"><i class="fa '. esc_attr( $social_pin_icon ) .'"></i></a></span>';
        }
	}
endif;

/*------------------------------------------------------------------------------------------------*/
/**
 * Generate darker color
 * Source: http://stackoverflow.com/questions/3512311/how-to-generate-lighter-darker-color-with-php
 *
 * @since 1.0.0
 */
if( ! function_exists( 'edigital_hover_color' ) ) :
function edigital_hover_color( $hex, $steps ) {
    // Steps should be between -255 and 255. Negative = darker, positive = lighter
    $steps = max( -255, min( 255, $steps ) );

    // Normalize into a six character long hex string
    $hex = str_replace( '#', '', $hex );
    if ( strlen( $hex ) == 3) {
        $hex = str_repeat( substr( $hex,0,1 ), 2 ).str_repeat( substr( $hex, 1, 1 ), 2 ).str_repeat( substr( $hex,2,1 ), 2 );
    }

    // Split into three parts: R, G and B
    $color_parts = str_split( $hex, 2 );
    $return = '#';

    foreach ( $color_parts as $color ) {
        $color   = hexdec( $color ); // Convert to decimal
        $color   = max( 0, min( 255, $color + $steps ) ); // Adjust color
        $return .= str_pad( dechex( $color ), 2, '0', STR_PAD_LEFT ); // Make two char hex code
    }

    return $return;
}
endif;

/*------------------------------------------------------------------------------------------------*/
/**
 * Get rgba color from hex
 */
function edigital_hex2rgba( $color, $opacity = false ) {
    if ($color[0] == '#' ) {
        $color = substr( $color, 1 );
    }
    $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    $rgb =  array_map('hexdec', $hex);
    $output = 'rgba( '.implode( ",",$rgb ).','.$opacity.' )';
    return $output;
}

/*------------------------------------------------------------------------------------------------*/
/**
 * Get minified css
 *
 * @since 1.0.8
 */
function edigital_css_strip_whitespace( $css ){
    $replace = array(
        "#/\*.*?\*/#s" => "",  // Strip C style comments.
        "#\s\s+#"      => " ", // Strip excess whitespace.
    );
    $search = array_keys( $replace );
    $css = preg_replace( $search, $replace, $css );

    $replace = array(
        ": "  => ":",
        "; "  => ";",
        " {"  => "{",
        " }"  => "}",
        ", "  => ",",
        "{ "  => "{",
        ";}"  => "}", // Strip optional semicolons.
        ",\n" => ",", // Don't wrap multiple selectors.
        "\n}" => "}", // Don't wrap closing braces.
        "} "  => "}\n", // Put each rule on it's own line.
    );
    $search = array_keys( $replace );
    $css = str_replace( $search, $replace, $css );

    return trim( $css );
}