<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Moral
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function store_mall_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

    $header_design = get_theme_mod( 'store_mall_header_design_option', 'header-one' ); 
	if ( 'header-two' === $header_design ) {
		$classes[] = 'modern-menu';
	} else {
		$classes[] = 'classic-menu';
	}

	// When menu is sticky.
	$menu_sticky = get_theme_mod( 'store_mall_make_menu_sticky', false );
	if ( $menu_sticky ) {
		$classes[] = 'menu-sticky';
	}

	// When global archive layout is checked.
	if ( is_archive() || store_mall_is_latest_posts() || is_404() || is_search() ) {
		if ( store_mall_is_woocommerce_activated() && ( is_woocommerce() || is_shop() ) ) {
			if ( ! is_active_sidebar( 'woocommerce' ) ) {
				$classes[] = 'no-sidebar';
			} else {
				$classes[] = 'right-sidebar';
			}
		} else {
			if ( ! is_active_sidebar( 'sidebar-1' ) ) {
				$classes[] = 'no-sidebar';
			} else {
				$classes[] = 'right-sidebar';
			}
		}
	} else if ( is_single() ) { // When global post sidebar is checked.
		if ( store_mall_is_woocommerce_activated() && ( is_woocommerce() || is_product() ) ) {
			if ( ! is_active_sidebar( 'woocommerce' ) ) {
				$classes[] = 'no-sidebar';
			} else {
				$classes[] = 'right-sidebar';
			}
	    } else {
	    	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
				$classes[] = 'no-sidebar';
			} else {
				$classes[] = 'right-sidebar';
		    }
	    }
	} elseif ( store_mall_is_frontpage_blog() || is_page() ) {
		if ( store_mall_is_woocommerce_activated() && ( is_woocommerce() || is_cart() || is_checkout() || is_account_page() ) ) {
			if ( ! is_active_sidebar( 'woocommerce' ) ) {
				$classes[] = 'no-sidebar';
			} else {
				$classes[] = 'right-sidebar';
		    }
	    } else {
	    	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
				$classes[] = 'no-sidebar';
			} else {
				$classes[] = 'right-sidebar';
			}
	    }
	} 

	return $classes;
}
add_filter( 'body_class', 'store_mall_body_classes' );

function store_mall_post_classes( $classes ) {
	if ( store_mall_is_page_displays_posts() ) {
		// Search 'has-post-thumbnail' returned by default and remove it.
		$key = array_search( 'has-post-thumbnail', $classes );
		unset( $classes[ $key ] );
		
		if( has_post_thumbnail() ) {
			$classes[] = 'has-post-thumbnail';
		} else {
			$classes[] = 'no-post-thumbnail';
		}
	}

  $classes[] = 'animated animatedFadeInUp';
  
	return $classes;
}
add_filter( 'post_class', 'store_mall_post_classes' );

/**
 * Excerpt length
 * 
 * @since Moral 1.0.0
 * @return Excerpt length
 */
function store_mall_excerpt_length( $length ){
	if ( is_admin() ) {
		return $length;
	}

	$length = get_theme_mod( 'store_mall_archive_excerpt_length', 60 );
	return $length;
}
add_filter( 'excerpt_length', 'store_mall_excerpt_length', 999 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function store_mall_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'store_mall_pingback_header' );

/**
 * Get an array of post id and title.
 * 
 */
function store_mall_get_post_choices() {
	$choices = array( '' => esc_html__( '--Select--', 'store-mall' ) );
	$args = array( 'numberposts' => -1, );
	$posts = get_posts( $args );

	foreach ( $posts as $post ) {
		$id = $post->ID;
		$title = $post->post_title;
		$choices[ $id ] = $title;
	}

	return $choices;
}

/**
 * Get an array of cat id and title.
 * 
 */
function store_mall_get_post_cat_choices() {
  $choices = array( '' => esc_html__( '--Select--', 'store-mall' ) );
	$cats = get_categories();

	foreach ( $cats as $cat ) {
		$id = $cat->term_id;
		$title = $cat->name;
		$choices[ $id ] = $title;
	}

	return $choices;
}

/**
 * Checks to see if we're on the homepage or not.
 */
function store_mall_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}

/**
 * Checks to see if Static Front Page is set to "Your latest posts".
 */
function store_mall_is_latest_posts() {
	return ( is_front_page() && is_home() );
}

/**
 * Checks to see if Static Front Page is set to "Posts page".
 */
function store_mall_is_frontpage_blog() {
	return ( is_home() && ! is_front_page() );
}

/**
 * Checks to see if the current page displays any kind of post listing.
 */
function store_mall_is_page_displays_posts() {
	return ( store_mall_is_frontpage_blog() || is_search() || is_archive() || store_mall_is_latest_posts() );
}

/**
 * Shows a breadcrumb for all types of pages.  This is a wrapper function for the Breadcrumb_Trail class,
 * which should be used in theme templates.
 *
 * @since  1.0.0
 * @access public
 * @param  array $args Arguments to pass to Breadcrumb_Trail.
 * @return void
 */
function store_mall_breadcrumb( $args = array() ) {
	$breadcrumb = apply_filters( 'breadcrumb_trail_object', null, $args );

	if ( ! is_object( $breadcrumb ) )
		$breadcrumb = new Breadcrumb_Trail( $args );

	return $breadcrumb->trail();
}

/**
 * Pagination in archive/blog/search pages.
 */
function store_mall_posts_pagination() { 
	$archive_pagination = get_theme_mod( 'store_mall_archive_pagination_type', 'numeric' );
	if ( 'disable' === $archive_pagination ) {
		return;
	}
	if ( 'numeric' === $archive_pagination ) {
		the_posts_pagination( array(
            'prev_text'          => store_mall_get_svg( array( 'icon' => 'left-arrow' ) ) . '<span class="meta-nav screen-reader-text">' . esc_html__( 'Previous', 'store-mall' ).'</span>',
            'next_text'          => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Next', 'store-mall' ) .'</span>' . store_mall_get_svg( array( 'icon' => 'left-arrow' ) ),
        ) );
	} elseif ( 'older_newer' === $archive_pagination ) {
        the_posts_navigation( array(
            'prev_text'          => '<span class="icon">' . store_mall_get_svg( array( 'icon' => 'left-arrow' ) ) . '</span><span>'. esc_html__( 'Older', 'store-mall' ) .'</span>',
            'next_text'          => '<span class="icon">' . store_mall_get_svg( array( 'icon' => 'left-arrow' ) ) . '</span><span>'. esc_html__( 'Newer', 'store-mall' ) .'</span>',
        )  );
	}
}

function store_mall_get_svg_by_url( $url = false ) {
	if ( ! $url ) {
		return false;
	}

	$social_icons = store_mall_social_links_icons();

	foreach ( $social_icons as $attr => $value ) {
		if ( false !== strpos( $url, $attr ) ) {
			return store_mall_get_svg( array( 'icon' => esc_attr( $value ) ) );
		}
	}
}

// Add auto p to the palces where get_the_excerpt is being called.
add_filter( 'get_the_excerpt', 'wpautop' );

/**
 * Get menu name by theme location
 */
function store_mall_get_menu_nam_by_location( $menu_location ) {
    $locations = get_nav_menu_locations();
    $menu_obj = wp_get_nav_menu_object( $locations[ $menu_location ] );
    return $menu_obj->name;
}

if ( ! function_exists( 'store_mall_is_woocommerce_activated' ) ) {
	/**
	 * Query WooCommerce activation
	 */
	function store_mall_is_woocommerce_activated() {
		return class_exists( 'WooCommerce' ) ? true : false;
	}
}

if ( ! function_exists( 'store_mall_is_yww_activate' ) ) {
	/**
	 * Check if YITH WooCommerce Wishlist is activated.
	 */
	function store_mall_is_yww_activate() {
		return class_exists( 'YITH_WCWL' ) ? true : false;
	}
}

/**
 * Count number of widgets in a sidebar
 * Used to add classes to widget areas so widgets can be displayed one, two, three or four per row
 */
/**
 * Count number of widgets in a sidebar
 * Used to add classes to widget areas so widgets can be displayed one, two, three or four per row
 * @param  string $sidebar_id Sidebar widget area id.
 * @return int             Number of widgets in the sidebar
 */
function store_mall_count_widgets( $sidebar_id = '' ) {
	if ( empty( $sidebar_id ) ) {
		return false;
	}
	// If loading from front page, consult $_wp_sidebars_widgets rather than options
	// to see if wp_convert_widget_settings() has made manipulations in memory.
	// global $_wp_sidebars_widgets;
	// if ( empty( $_wp_sidebars_widgets ) ) :
	// 	$_wp_sidebars_widgets = get_option( 'sidebars_widgets', array() );
	// endif;
	
	$sidebars_widgets_count = get_option( 'sidebars_widgets', array() );
	
	if ( isset( $sidebars_widgets_count[ $sidebar_id ] ) ) :
		$widget_count = count( $sidebars_widgets_count[ $sidebar_id ] );
		return $widget_count;
	else:
		return false;
	endif;
} 