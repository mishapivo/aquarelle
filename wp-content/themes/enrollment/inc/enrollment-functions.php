<?php
/**
 * Add or expand custom function related to the Enrollment Theme.
 *
 * @package CodeVibrant
 * @subpackage Enrollment
 * @since 1.0.0
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function enrollment_body_classes( $classes ) {

    wp_reset_postdata();
    
    global $post;

    // Adds a class of group-blog to blogs with more than 1 published author.
    if ( is_multi_author() ) {
        $classes[] = 'group-blog';
    }

    // Adds a class of hfeed to non-singular pages.
    if ( ! is_singular() ) {
        $classes[] = 'hfeed';
    }

    // Adds a class of boxed-layout for whole site
    $enrollment_site_layout = get_theme_mod( 'enrollment_site_layout', 'wide_layout' );
    if( $enrollment_site_layout == 'boxed_layout' ) {
        $classes[] = 'boxed-layout';
    }

    //Adds a archive layout class
    $enrollment_archive_layout = get_theme_mod( 'enrollment_archive_layout', 'classic' );
    if( is_archive() || is_home() || is_search() ) {
        $classes[] = $enrollment_archive_layout.'-archive-layout';
    }

    /**
     * Sidebar option for post/page/archive
     */
    if( 'post' === get_post_type() ) {
        $sidebar_meta_option = get_post_meta( $post->ID, 'single_post_sidebar', true );
    }

    if( 'page' === get_post_type() ) {
        $sidebar_meta_option = get_post_meta( $post->ID, 'single_page_sidebar', true );
    }
     
    if( is_home() ) {
        $home_id = get_option( 'page_for_posts' );
        $sidebar_meta_option = get_post_meta( $home_id, 'single_page_sidebar', true );
    }
    
    if( empty( $sidebar_meta_option ) || is_archive() || is_search() ) {
        $sidebar_meta_option = 'default_sidebar';
    }
    $archive_sidebar = get_theme_mod( 'enrollment_archive_sidebar', 'right_sidebar' );
    $post_default_sidebar = get_theme_mod( 'enrollment_default_post_sidebar', 'right_sidebar' );
    $page_default_sidebar = get_theme_mod( 'enrollment_default_page_sidebar', 'right_sidebar' );
    
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
        } elseif( is_page() && !is_page_template( 'templates/template-home.php' ) ) {
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

    return $classes;
}
add_filter( 'body_class', 'enrollment_body_classes' );

/*-----------------------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'enrollment_fonts_url' ) ) :

    /**
     * Register Google fonts for Enrollment.
     *
     * @return string Google fonts URL for the theme.
     * @since 1.0.0
     */

    function enrollment_fonts_url() {
        $fonts_url = '';
        $font_families = array();

        /*
         * Translators: If there are characters in your language that are not supported
         * by Roboto Condensed, translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'enrollment' ) ) {
            $font_families[] = 'Roboto:300italic,400italic,700italic,400,300,700,900';
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

/*------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Enqueue Scripts and styles for admin
 *
 * @since 1.0.0
 */
function enrollment_admin_scripts_style( $hook ) {

    if( 'widgets.php' != $hook && 'edit.php' != $hook && 'post.php' != $hook && 'post-new.php' != $hook ) {
        return;
    }

    global $enrollment_version;

    if ( function_exists( 'wp_enqueue_media' ) ) {
        wp_enqueue_media();
    }

    wp_enqueue_script( 'jquery-ui-button' );

    wp_enqueue_script( 'enrollment-admin-script', get_template_directory_uri() .'/assets/js/admin-scripts.js', array('jquery'), esc_attr( $enrollment_version ), true );

    wp_enqueue_style( 'enrollment-admin-style', get_template_directory_uri() .'/assets/css/admin-styles.css', esc_attr( $enrollment_version ) );
}
add_action( 'admin_enqueue_scripts', 'enrollment_admin_scripts_style' );

/*------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Enqueue scripts and styles.
 */
function enrollment_scripts() {

    global $enrollment_version;
	
	wp_enqueue_script( 'jquery-lightslider', get_template_directory_uri() . '/assets/library/lightslider/js/lightslider.min.js', array('jquery'), '20180605', true );

    $enrollment_header_sticky_option = get_theme_mod( 'enrollment_header_sticky_option', true );

    if( $enrollment_header_sticky_option === true ) {

        wp_enqueue_script( 'jquery-sticky', get_template_directory_uri() .'/assets/library/sticky/jquery.sticky.js', array( 'jquery' ), '1.0.2', true );

        wp_enqueue_script( 'enrollment-sticky-setting', get_template_directory_uri() .'/assets/library/sticky/sticky-setting.js', array( 'jquery-sticky' ), esc_attr( $enrollment_version ), true );

    }

	wp_enqueue_script( 'enrollment-custom-script', get_template_directory_uri(). '/assets/js/custom-script.js', array( 'jquery' ), esc_attr( $enrollment_version ), true );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/library/font-awesome/css/font-awesome.min.css', array(), '4.5.0' );

    wp_enqueue_style( 'enrollment-fonts', enrollment_fonts_url(), array(), null );

    wp_enqueue_style( 'lightslider-style', get_template_directory_uri() .'/assets/library/lightslider/css/lightslider.min.css', array(), '1.1.5' );

	wp_enqueue_style( 'enrollment-style', get_stylesheet_uri(), array(), esc_attr( $enrollment_version ) );

    wp_enqueue_style( 'enrollment-responsive-style', get_template_directory_uri() .'/assets/css/enrollment-responsive.css', array(), esc_attr( $enrollment_version ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'enrollment_scripts' );

/*------------------------------------------------------------------------------------------------------------------------------------*/

if( !function_exists( 'enrollment_categories_lists' ) ):

    /**
     * category list
     *
     * @return array();
     */

    function enrollment_categories_lists() {
        $enrollment_cat_args = array(
            'type'       => 'post',
            'child_of'   => 0,
            'orderby'    => 'name',
            'order'      => 'ASC',
            'hide_empty' => 1,
            'taxonomy'   => 'category',
        );
        $enrollment_categories = get_categories( $enrollment_cat_args );
        $enrollment_categories_lists = array();
        foreach( $enrollment_categories as $category ) {
            $enrollment_categories_lists[$category->slug] = $category->name;
        }
        return $enrollment_categories_lists;
    }

endif;

/*------------------------------------------------------------------------------------------------------------------------------------*/

if( ! function_exists( 'enrollment_get_sidebar' ) ):
    /**
     * Function define about page/post/archive sidebar
     *
     * @since 1.0.0
     */

    function enrollment_get_sidebar() {
        global $post;

        if( 'post' === get_post_type() ) {
            $sidebar_meta_option = get_post_meta( $post->ID, 'single_post_sidebar', true );
        }

        if( 'page' === get_post_type() ) {
            $sidebar_meta_option = get_post_meta( $post->ID, 'single_page_sidebar', true );
        }
         
        if( is_home() ) {
            $set_id = get_option( 'page_for_posts' );
            $sidebar_meta_option = get_post_meta( $set_id, 'single_page_sidebar', true );
        }
        
        if( empty( $sidebar_meta_option ) || is_archive() || is_search() ) {
            $sidebar_meta_option = 'default_sidebar';
        }
        
        $archive_sidebar = get_theme_mod( 'enrollment_archive_sidebar', 'right_sidebar' );
        $post_default_sidebar = get_theme_mod( 'enrollment_default_post_sidebar', 'right_sidebar' );
        $page_default_sidebar = get_theme_mod( 'enrollment_default_page_sidebar', 'right_sidebar' );
        
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

/*------------------------------------------------------------------------------------------------------------------------------------*/

if( ! function_exists( 'enrollment_get_excerpt' ) ):

    /**
     * homepage excerpt
     */

    function enrollment_get_excerpt( $content, $limit ) {
        $striped_content = strip_tags( $content );
        $striped_content = strip_shortcodes( $striped_content );
        $limit_content = mb_substr( $striped_content, 0 , $limit );
        if( $limit_content < $content ){
            $limit_content .= "..."; 
        }
        return $limit_content;
    }

endif;


if( ! function_exists( 'enrollment_archive_excerpt' ) ):

    /**
     * Function to get excerpt content according to define length
     */

    function enrollment_archive_excerpt( $content, $limit ) {
        $content = strip_tags( $content );
        $content = strip_shortcodes( $content );
        $words = explode( ' ', $content );    
        return implode( ' ', array_slice( $words, 0, $limit ) );
    }

endif;

/*------------------------------------------------------------------------------------------------------------------------------------*/

if( ! function_exists( 'enrollment_font_awesome_social_icon_array' ) ) :

    /**
     * Define font awesome social media icons
     *
     * @return array();
     * @since 1.0.0
     */

    function enrollment_font_awesome_social_icon_array(){
        return array(
            "fa fa-facebook-square","fa fa-facebook-f","fa fa-facebook","fa fa-facebook-official","fa fa-twitter-square","fa fa-twitter","fa fa-yahoo","fa fa-google","fa fa-google-wallet","fa fa-google-plus-circle","fa fa-google-plus-official","fa fa-instagram","fa fa-linkedin-square","fa fa-linkedin","fa fa-pinterest-p","fa fa-pinterest","fa fa-pinterest-square","fa fa-google-plus-square","fa fa-google-plus","fa fa-youtube-square","fa fa-youtube","fa fa-youtube-play","fa fa-vimeo","fa fa-vimeo-square",
        );
    }

endif;

/*---------------------------------------------------------------------------------------------------------------*/

if( !function_exists( 'enrollment_social_icons' ) ):

    /**
     * Social media function
     *
     * @since 1.0.0
     */

    function enrollment_social_icons() {
        $get_social_media_icons = get_theme_mod( 'social_media_icons', '' );
        $get_decode_social_media = json_decode( $get_social_media_icons );
        if( ! empty( $get_decode_social_media ) ) {
            echo '<div class="cv-social-icons-wrapper">';
            foreach ( $get_decode_social_media as $single_icon ) {
                $icon_class = $single_icon->cv_icon_list;
                $icon_url = $single_icon->cv_url_field;
                if( !empty( $icon_url ) ) {
                    echo '<span class="social-link"><a href="'. esc_url( $icon_url ) .'" target="_blank"><i class="'. esc_attr( $icon_class ) .'"></i></a></span>';
                }
            }
            echo '</div><!-- .cv-social-icons-wrapper -->';
        }
    }

endif;

/*---------------------------------------------------------------------------------------------------------------*/

if( ! function_exists( 'enrollment_get_hex2rgba' ) ) :

    /**
     * Get rgba color from hex
     *
     * @since 1.0.0
     */

    function enrollment_get_hex2rgba( $color, $opacity ) {
        if ( $color[0] == '#' ) {
            $color = substr( $color, 1 );
        }
        $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        $rgb =  array_map( 'hexdec', $hex );
        $output = 'rgba( '.implode( ",", $rgb ).','.$opacity.' )';
        return $output;
    }

endif;

/*-----------------------------------------------------------------------------------------------------------------------*/

if( ! function_exists( 'enrollment_css_strip_whitespace' ) ) :

    /**
     * Get minified css and removed space
     *
     * @since 1.0.0
     */

    function enrollment_css_strip_whitespace( $css ){
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

endif;

/*-----------------------------------------------------------------------------------------------------------------------*/

add_action( 'wp_enqueue_scripts', 'enrollment_dynamic_styles' );

if( ! function_exists( 'enrollment_dynamic_styles' ) ):

    /**
     * Dynamic theme color option
     *
     * @since 1.0.0
     */

    function enrollment_dynamic_styles() {

        $enrollment_title_option = get_theme_mod( 'enrollment_title_option', true );
        $enrollment_primary_theme_color = get_theme_mod( 'enrollment_primary_theme_color', '#ecb101' );
        $enrollment_title_color = get_theme_mod( 'enrollment_title_color', '#333333' );

        $output_css = '';
        $output_css .=" a,a:hover,a:focus,a:active,.entry-footer a:hover,.header-elements-holder .top-info:after,.header-search-wrapper .search-main:hover,.widget a:hover,.widget a:hover:before,.widget li:hover:before,.enrollment_service .post-title a:hover,.team-title-wrapper .post-title a:hover,.testimonial-content:before,.enrollment_testimonials .client-name,.latest-posts-wrapper .byline a:hover,.latest-posts-wrapper .posted-on a:hover,.latest-posts-wrapper .news-title a:hover,.enrollment_latest_blog .news-more,.enrollment_latest_blog .news-more:hover,.search-results .entry-title a:hover,.archive .entry-title a:hover,.single .entry-title a:hover,.home.blog .archive-content-wrapper .entry-title a:hover,.archive-content-wrapper .entry-title a:hover,.entry-meta span a:hover,.post-readmore a:hover,#top-footer .widget_archive a:hover:before, #top-footer .widget_categories a:hover:before, #top-footer .widget_recent_entries a:hover:before, #top-footer .widget_meta a:hover:before, #top-footer .widget_recent_comments li:hover:before, #top-footer .widget_rss li:hover:before, #top-footer .widget_pages li a:hover:before, #top-footer .widget_nav_menu li a:hover:before,#top-footer .widget_archive a:hover, #top-footer .widget_categories a:hover, #top-footer .widget_recent_entries a:hover, #top-footer .widget_meta a:hover, #top-footer .widget_recent_comments li:hover, #top-footer .widget_rss li:hover, #top-footer .widget_pages li a:hover, #top-footer .widget_nav_menu li a:hover,.site-info a:hover,.grid-archive-layout .entry-title a:hover,.menu-toggle:hover,#cancel-comment-reply-link,#cancel-comment-reply-link:before,.logged-in-as a{
                color:". esc_attr( $enrollment_primary_theme_color ) .";
            }\n";
            
        $output_css .=".navigation .nav-links a:hover,.bttn:hover,button,input[type='button']:hover,input[type='reset']:hover,input[type='submit']:hover,.edit-link .post-edit-link,#site-navigation ul li.current-menu-item>a,#site-navigation ul li.current-menu-ancestor>a,#site-navigation ul li:hover>a,#site-navigation ul li.current_page_ancestor>a,#site-navigation ul li.current_page_item>a,.header-search-wrapper .search-form-main .search-submit:hover,.slider-btn:hover,.enrollment-slider-wrapper .lSAction>a:hover,.widget_search .search-submit,.widget .widget-title:after,.widget_search .search-submit,.widget .enrollment-widget-wrapper .widget-title:before,.widget .enrollment-widget-wrapper .widget-title:after,.enrollment_service .grid-items-wrapper .single-post-wrapper,.cta-btn-wrap a,.cta-btn-wrap a:hover,.courses-block-wrapper .courses-link:hover,.entry-btn:hover,.team-wrapper .team-desc-wrapper,.enrollment_testimonials .lSSlideOuter .lSPager.lSpg>li:hover a,.enrollment_testimonials .lSSlideOuter .lSPager.lSpg>li.active a,#cv-scrollup:hover,#cv-scrollup{
               background:". esc_attr( $enrollment_primary_theme_color ) .";
            }\n";
            
       $output_css .=".navigation .nav-links a,.bttn,button,input[type='button'],input[type='reset'],input[type='submit'],.header-elements-holder .top-info:after,.header-search-wrapper .search-form-main .search-submit:hover,.slider-btn,.widget_search .search-submit,.cta-btn-wrap a:hover,.courses-link,.entry-btn{
              border-color:". esc_attr( $enrollment_primary_theme_color ) .";
           }\n";
            
       $output_css .="#colophon{
              border-top-color:". esc_attr( $enrollment_primary_theme_color ) .";
            }\n";
        
        if ( $enrollment_title_option == true ) {
            $output_css .=".site-title a, .site-description {
                        color:". esc_attr( $enrollment_title_color ) .";
                    }\n";
        } else {
            $output_css .=".site-title, .site-description {
                        position: absolute;
                        clip: rect(1px, 1px, 1px, 1px);
                    }\n";
        }

        $refine_output_css = enrollment_css_strip_whitespace( $output_css );

        wp_add_inline_style( 'enrollment-style', $refine_output_css );
    }

endif;