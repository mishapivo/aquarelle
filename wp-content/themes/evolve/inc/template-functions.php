<?php

/*
    Template Functions Definitions

    Table of Contents:

    - Wrapper Container
        -- Wrapper Container - Open
        -- Wrapper Container - Close
    - Content Container
        -- Content Container - Open
        -- Content Container - Close
    - Primary Container
        -- Primary Container - Open
        -- Primary Container - Close
    - Header Type
    - Footer Container
        -- Footer Container - Open
        -- Footer Container - Close
    - Sidebars
    - Pagination
        -- Pagination Before
        -- Pagination After
    - Posts Loop
        -- Posts Loop Container - Open
        -- Posts Loop Container - Close
    - Comments Template
    - Archive Page Title
    - SVG Markup For Icons
    - Truncate Function
    - Custom Excerpt Length
    - Get First Image
    - Function To Change The HEX Color Code
    - Convert HEX Color Code To RGB(a) With Alpha
    - Custom Menu Walker
    - Get BuddyPress Page ID
    - Function To Print Out CSS Class According To Layout Or Post Meta
    - Function To Print Out CSS Class According To Sidebar Layout
    - Function To Print Out CSS Class According To Sidebar-2 Layout
    - Function To Determine Whether To get_sidebar(), Depending On Theme Options Layout And Post Meta Layout
    - Function To Determine Whether To get_sidebar(2), Depending On Theme Options Layout And Post Meta Layout
    - Print Typography
    - Function To Separate Values
    - Custom Front Page Builder
    - Wrapper Class
    - Custom Function To Return Terms
    - Function To Check If Post Is Custom Type
    - Function To Check If Slider Is Enabled On The Current Post/Page
    - Get Current Post/Page ID
    - Get Slider Position
    - Function To Check Logo Position
    - Schema.org Function For HTML

    ======================================= */

/*
    Wrapper Container
    ======================================= */

/*
    Wrapper Container - Open
    --------------------------------------- */

if ( ! function_exists( 'evolve_wrapper_container_open' ) ) {
	function evolve_wrapper_container_open() {
		echo '<div id="wrapper"' . evolve_wrapper_class() . '>';
	}
}

add_action( 'evolve_header_area', 'evolve_wrapper_container_open', 10 );

/*
    Wrapper Container - Close
    --------------------------------------- */

if ( ! function_exists( 'evolve_wrapper_container_close' ) ) {
	function evolve_wrapper_container_close() {
		echo '</div><!-- #wrapper -->';
	}
}

add_action( 'evolve_footer_area', 'evolve_wrapper_container_close', 70 );

/*
    Content Container
    ======================================= */

/*
    Content Container - Open
    --------------------------------------- */

if ( ! function_exists( 'evolve_content_container_open' ) ) {
	function evolve_content_container_open() {
		if ( ( ( is_front_page() ) && evolve_theme_mod( 'evl_front_elements_content_display', 'above' ) != 'above' ) || ! is_front_page() ) {
			echo '<div class="content"><div class="container"><div class="row">';
		}
	}
}

add_action( 'evolve_header_area', 'evolve_content_container_open', 70 );

/*
    Content Container - Close
    --------------------------------------- */

if ( ! function_exists( 'evolve_content_container_close' ) ) {
	function evolve_content_container_close() {
		if ( ( ( is_front_page() ) && evolve_theme_mod( 'evl_front_elements_content_display', 'above' ) != 'above' ) || ! is_front_page() ) {
			echo '</div><!-- .row --></div><!-- .container --></div><!-- .content -->';
		}
	}
}

add_action( 'evolve_footer_area', 'evolve_content_container_close', 10 );


/*
    Primary Container
    ======================================= */

/*
    Primary Container - Open
    --------------------------------------- */

if ( ! function_exists( 'evolve_primary_container_open' ) ) {
	function evolve_primary_container_open() {
		if ( ( is_home() && ! is_front_page() ) || ( is_front_page() && evolve_theme_mod( 'evl_front_elements_content_display', 'above' ) != 'above' ) ) {
			echo '<div id="primary" class="' . evolve_layout_class( $type = 1 ) . '">';
		} elseif ( is_404() ) {
			echo '<div id="primary" class="col mb-5">';
		} elseif ( ( function_exists( 'is_buddypress' ) && is_buddypress() ) || ( class_exists( 'bbPress' ) && is_bbpress() ) ) {
			echo '<div id="primary" class="' . evolve_layout_class( $type = 2 ) . '">';
		} elseif ( ( is_home() && ! is_front_page() ) || is_front_page() && evolve_theme_mod( 'evl_front_elements_content_display', 'above' ) == 'above' ) {
		} else {
			echo '<div id="primary" class="' . evolve_layout_class( $type = 1 ) . '">';
		}
	}
}

add_action( 'evolve_before_content_area', 'evolve_primary_container_open', 10 );

/*
    Primary Container - Close
    --------------------------------------- */

if ( ! function_exists( 'evolve_primary_container_close' ) ) {
	function evolve_primary_container_close() {
		if ( ( is_home() && ! is_front_page() ) || ( is_front_page() && evolve_theme_mod( 'evl_front_elements_content_display', 'above' ) != 'above' ) || ( function_exists( 'is_buddypress' ) && is_buddypress() ) || ( class_exists( 'bbPress' ) && is_bbpress() ) ) {
			echo '</div><!-- #primary -->';
		} elseif ( ( is_home() && ! is_front_page() ) || is_front_page() && evolve_theme_mod( 'evl_front_elements_content_display', 'above' ) == 'above' ) {
		} else {
			echo '</div><!-- #primary -->';
		}
	}
}

add_action( 'evolve_after_content_area', 'evolve_primary_container_close', 10 );

/*
    Header Type
    ======================================= */

if ( ! function_exists( 'evolve_header_type' ) ) {
	function evolve_header_type() {
		switch ( evolve_theme_mod( 'evl_header_type', 'none' ) ) {
			case "none":
				get_template_part( 'template-parts/header/header', 'v1' );
				break;
			case "h1":
				get_template_part( 'template-parts/header/header', 'v2' );
				break;
		}
	}
}

add_action( 'evolve_header_area', 'evolve_header_type', 40 );

/*
    Footer Container
    ======================================= */

/*
    Footer Container - Open
    --------------------------------------- */

if ( ! function_exists( 'evolve_footer_container_open' ) ) {
	function evolve_footer_container_open() {
		echo '<footer class="footer" itemscope="itemscope" itemtype="http://schema.org/WPFooter" role="contentinfo"><div class="container">';
	}
}

add_action( 'evolve_footer_area', 'evolve_footer_container_open', 20 );

/*
    Footer Container - Close
    --------------------------------------- */

if ( ! function_exists( 'evolve_footer_container_close' ) ) {
	function evolve_footer_container_close() {
		echo '</div><!-- .container --></footer><!-- .footer -->';
	}
}

add_action( 'evolve_footer_area', 'evolve_footer_container_close', 50 );

/*
    Sidebars
    ======================================= */

if ( ! function_exists( 'evolve_sidebars' ) ) {
	function evolve_sidebars() {
		if ( class_exists( 'Woocommerce' ) && ( is_cart() || is_checkout() || is_account_page() || ( get_option( 'woocommerce_thanks_page_id' ) && is_page( get_option( 'woocommerce_thanks_page_id' ) ) ) ) ) {
			return;
		}
		if ( ( is_home() && ! is_front_page() ) || ( is_front_page() && evolve_theme_mod( 'evl_front_elements_content_display', 'above' ) != 'above' ) ) {
			if ( evolve_lets_get_sidebar_2() == true ):
				get_sidebar( '2' );
			endif;

			if ( evolve_lets_get_sidebar() == true ):
				get_sidebar();
			endif;
		} elseif ( ( is_home() && ! is_front_page() ) || is_front_page() && evolve_theme_mod( 'evl_front_elements_content_display', 'above' ) == 'above' ) {
		} else {
			if ( evolve_lets_get_sidebar_2() == true ):
				get_sidebar( '2' );
			endif;

			if ( evolve_lets_get_sidebar() == true ):
				get_sidebar();
			endif;
		}
	}
}

add_action( 'evolve_sidebars_area', 'evolve_sidebars', 10 );

/*
    Pagination
    ======================================= */

/*
    Pagination Before
    --------------------------------------- */

if ( ! function_exists( 'evolve_pagination_before' ) ) {
	function evolve_pagination_before() {
		if ( ( ( is_front_page() && ! is_page() ) || is_home() || is_archive() || is_search() ) && evolve_theme_mod( 'evl_nav_links', 'after' ) != "after" && evolve_theme_mod( 'evl_pagination_type', 'pagination' ) != "infinite" ) {
			get_template_part( 'template-parts/navigation/navigation' );
		} elseif ( is_single() && evolve_theme_mod( 'evl_post_links', 'after' ) != "after" ) {
			get_template_part( 'template-parts/navigation/navigation' );
		}
	}
}

add_action( 'evolve_before_posts_loop', 'evolve_pagination_before', 10 );
add_action( 'evolve_before_post_content', 'evolve_pagination_before', 10 );

/*
    Pagination After
    --------------------------------------- */

if ( ! function_exists( 'evolve_pagination_after' ) ) {
	function evolve_pagination_after() {
		if ( ( ( is_front_page() && ! is_page() ) || is_home() || is_archive() || is_search() ) && evolve_theme_mod( 'evl_nav_links', 'after' ) != "before" || ( evolve_theme_mod( 'evl_nav_links', 'after' ) != "after" && evolve_theme_mod( 'evl_pagination_type', 'pagination' ) == "infinite" ) ) {
			get_template_part( 'template-parts/navigation/navigation', 'index' );
		} elseif ( is_single() && evolve_theme_mod( 'evl_post_links', 'after' ) != "before" ) {
			get_template_part( 'template-parts/navigation/navigation', 'index' );
		}
	}
}

add_action( 'evolve_after_posts_loop', 'evolve_pagination_after', 20 );
add_action( 'evolve_after_post_content', 'evolve_pagination_after', 20 );

/*
    Posts Loop
    ======================================= */

/*
    Posts Loop Container - Open
    --------------------------------------- */

if ( ! function_exists( 'evolve_posts_loop_open' ) ) {
	function evolve_posts_loop_open() {
		if ( ( is_home() || is_archive() || is_search() ) && evolve_theme_mod( 'evl_post_layout', 'two' ) != "one" ) {
			echo '<div class="posts card-columns">';
		}
	}
}

add_action( 'evolve_before_posts_loop', 'evolve_posts_loop_open', 20 );

/*
    Posts Loop Container - Close
    --------------------------------------- */

if ( ! function_exists( 'evolve_posts_loop_close' ) ) {
	function evolve_posts_loop_close() {
		if ( ( is_home() || is_archive() || is_search() ) && evolve_theme_mod( 'evl_post_layout', 'two' ) != "one" ) {
			echo '</div><!-- .posts .card-columns -->';
		}
	}
}

add_action( 'evolve_after_posts_loop', 'evolve_posts_loop_close', 10 );

/*
    Comments Template
    ======================================= */

if ( ! function_exists( 'evolve_comments_template' ) ) {
	function evolve_comments_template() {
		if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) ) :
			comments_template( '', true );
		endif;
	}
}

add_action( 'evolve_after_post_content', 'evolve_comments_template', 30 );

/*
    Archive Page Title
    ======================================= */

if ( ! function_exists( 'evolve_archive_page_title' ) ) {
	function evolve_archive_page_title() {
		if ( ! is_archive() || ( class_exists( 'bbPress' ) && is_bbpress() ) ) {
			return;
		}
		if ( evolve_theme_mod( 'evl_category_page_title', '1' ) == '1' ) {
			echo '<div class="alert alert-success mb-5" role="alert"><p>' . __( 'You are browsing archives for', 'evolve' ) . '</p>';
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="lead">', '</div>' );
			echo '</div>';
		}
	}
}

add_action( 'evolve_before_post_title', 'evolve_archive_page_title', 20 );

/*
    SVG Markup For Icons
    ======================================= */

if ( ! function_exists( 'evolve_get_svg' ) ) {
	function evolve_get_svg( $icon = null ) {

		if ( empty( $icon ) ) {
			return;
		}

		$svg = '<svg class="icon icon-' . esc_attr( $icon ) . '" aria-hidden="true" role="img">';
		$svg .= ' <use xlink:href="' . get_parent_theme_file_uri( '/assets/images/icons.svg#icon-' ) . esc_html( $icon ) . '"></use> ';
		$svg .= '</svg>';

		return $svg;
	}
}

/*
    Truncate Function
    ======================================= */

if ( ! function_exists( 'evolve_truncate' ) ) {
	function evolve_truncate( $maxLength, $html, $isUtf8 = true, $trailing ) {
		$printedLength = 0;
		$position      = 0;
		$tags          = array();
		if ( $trailing ) {
			$trailing_style = $trailing;
		} else {
			$trailing_style = '...';
		}

		// For UTF-8, we need to count multibyte sequences as one character.
		$re = $isUtf8
			? '{</?([a-z]+)[^>]*>|&#?[a-zA-Z0-9]+;|[\x80-\xFF][\x80-\xBF]*}'
			: '{</?([a-z]+)[^>]*>|&#?[a-zA-Z0-9]+;}';

		while ( $printedLength < $maxLength && preg_match( $re, $html, $match, PREG_OFFSET_CAPTURE, $position ) ) {
			list( $tag, $tagPosition ) = $match[0];

			// Print text leading up to the tag.
			$str = substr( $html, $position, $tagPosition - $position );
			if ( $printedLength + strlen( $str ) > $maxLength ) {
				print( substr( $str, 0, $maxLength - $printedLength ) );
				$printedLength = $maxLength;
				break;
			}

			print( $str );
			$printedLength += strlen( $str );
			if ( $printedLength >= $maxLength ) {
				break;
			}

			if ( $tag[0] == '&' || ord( $tag ) >= 0x80 ) {
				// Pass the entity or UTF-8 multibyte sequence through unchanged.
				print( $tag );
				$printedLength ++;
			} else {
				// Handle the tag.
				$tagName = $match[1][0];
				if ( $tag[1] == '/' ) {
					// This is a closing tag.

					$openingTag = array_pop( $tags );
					assert( $openingTag == $tagName ); // check that tags are properly nested.

					print( $tag );
				} else if ( $tag[ strlen( $tag ) - 2 ] == '/' ) {
					// Self-closing tag.
					print( $tag );
				} else {
					// Opening tag.
					print( $tag );
					$tags[] = $tagName;
				}
			}

			// Continue after the tag.
			$position = $tagPosition + strlen( $tag );
		}

		// Print any remaining text.
		if ( $printedLength < $maxLength && $position < strlen( $html ) ) {
			print( substr( $html, $position, $maxLength - $printedLength ) );
		}

		// Print Trailing
		if ( ( ( ( $maxLength - $printedLength ) == $maxLength || ( $maxLength - $printedLength ) == 0 ) && $position == 0 && strlen( $html ) > $maxLength ) ) {
			print $trailing_style;
		}

		// Close any open tags.
		while ( ! empty( $tags ) ) {
			printf( '</%s>', array_pop( $tags ) );
		}
	}
}

/*
    Custom Excerpt Length
    ======================================= */

if ( ! function_exists( 'evolve_excerpt_max_charlength' ) ) {
	function evolve_excerpt_max_charlength( $limit ) {
		return wp_trim_words( get_the_excerpt(), $limit );
	}
}

/*
    Get First Image
    ======================================= */

if ( ! function_exists( 'evolve_get_first_image' ) ) {
	function evolve_get_first_image() {

		global $post;

		if ( evolve_theme_mod( 'evl_featured_images', '1' ) != "1" ) {
			return;
		}

		$first_img = '';
		preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches );
		if ( isset( $matches[1][0] ) ) {
			$first_img = $matches [1][0];
		}

		return $first_img;
	}
}

/*
    Function To Change The HEX Color Code
    ======================================= */

if ( ! function_exists( 'evolve_hex_change' ) ) {
	function evolve_hex_change( $hex, $steps = '-12' ) {
		// Steps should be between -255 and 255. Negative = darker, positive = lighter
		$steps = max( - 255, min( 255, $steps ) );

		// Normalize into a six character long hex string
		$hex = str_replace( '#', '', $hex );
		if ( strlen( $hex ) == 3 ) {
			$hex = str_repeat( substr( $hex, 0, 1 ), 2 ) . str_repeat( substr( $hex, 1, 1 ), 2 ) . str_repeat( substr( $hex, 2, 1 ), 2 );
		}

		// Split into three parts: R, G and B
		$color_parts = str_split( $hex, 2 );
		$return      = '#';

		foreach ( $color_parts as $color ) {
			$color  = hexdec( $color ); // Convert to decimal
			$color  = max( 0, min( 255, $color + $steps ) ); // Adjust color
			$return .= str_pad( dechex( $color ), 2, '0', STR_PAD_LEFT ); // Make two char hex code
		}

		return $return;
	}
}

/*
    Convert HEX Color Code To RGB(a) With Alpha
    ======================================= */

if ( ! function_exists( 'evolve_hex_rgba' ) ) {
	function evolve_hex_rgba( $hex, $alpha = false ) {
		$hex      = str_replace( '#', '', $hex );
		$length   = strlen( $hex );
		$rgb['r'] = hexdec( $length == 6 ? substr( $hex, 0, 2 ) : ( $length == 3 ? str_repeat( substr( $hex, 0, 1 ), 2 ) : 0 ) );
		$rgb['g'] = hexdec( $length == 6 ? substr( $hex, 2, 2 ) : ( $length == 3 ? str_repeat( substr( $hex, 1, 1 ), 2 ) : 0 ) );
		$rgb['b'] = hexdec( $length == 6 ? substr( $hex, 4, 2 ) : ( $length == 3 ? str_repeat( substr( $hex, 2, 1 ), 2 ) : 0 ) );
		if ( $alpha ) {
			$rgb['a'] = $alpha;
		}

		return implode( array_keys( $rgb ) ) . '(' . implode( ', ', $rgb ) . ')';
	}
}

/*
    Custom Menu Walker
    ======================================= */

if ( ! class_exists( 'evolve_custom_menu_walker' ) ) {
	/**
	 * evolve_custom_menu_walker class.
	 *
	 * @extends Walker_Nav_Menu
	 */
	class evolve_custom_menu_walker extends Walker_Nav_Menu {
		/**
		 * Starts the list before the elements are added.
		 *
		 * @since WP 3.0.0
		 *
		 * @see Walker_Nav_Menu::start_lvl()
		 *
		 * @param string $output Used to append additional content (passed by reference).
		 * @param int $depth Depth of menu item. Used for padding.
		 * @param stdClass $args An object of wp_nav_menu() arguments.
		 */
		public function start_lvl( &$output, $depth = 0, $args = array() ) {
			if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
				$t = '';
				$n = '';
			} else {
				$t = "\t";
				$n = "\n";
			}
			$indent = str_repeat( $t, $depth );

			// Default class to add to the file.
			$classes = array( 'dropdown-menu dropdown-hover' );

			/**
			 * Filters the CSS class(es) applied to a menu list element.
			 *
			 * @since WP 4.8.0
			 *
			 * @param array $classes The CSS classes that are applied to the menu `<ul>` element.
			 * @param stdClass $args An object of `wp_nav_menu()` arguments.
			 * @param int $depth Depth of menu item. Used for padding.
			 */
			$class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
			/**
			 * The `.dropdown-menu` container needs to have a labelledby
			 * attribute which points to it's trigger link.
			 *
			 * Form a string for the labelledby attribute from the the latest
			 * link with an id that was added to the $output.
			 */
			$labelledby = '';
			// find all links with an id in the output.
			preg_match_all( '/(<a.*?id=\"|\')(.*?)\"|\'.*?>/im', $output, $matches );
			// with pointer at end of array check if we got an ID match.
			if ( end( $matches[2] ) ) {
				// build a string to use as aria-labelledby.
				$labelledby = 'aria-labelledby="' . end( $matches[2] ) . '"';
			}
			$output .= "{$n}{$indent}<ul$class_names $labelledby role=\"menu\">{$n}";
		}

		/**
		 * Starts the element output.
		 *
		 * @since WP 3.0.0
		 * @since WP 4.4.0 The {@see 'nav_menu_item_args'} filter was added.
		 *
		 * @see Walker_Nav_Menu::start_el()
		 *
		 * @param string $output Used to append additional content (passed by reference).
		 * @param WP_Post $item Menu item data object.
		 * @param int $depth Depth of menu item. Used for padding.
		 * @param stdClass $args An object of wp_nav_menu() arguments.
		 * @param int $id Current item ID.
		 */
		public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
				$t = '';
				$n = '';
			} else {
				$t = "\t";
				$n = "\n";
			}
			$indent  = ( $depth ) ? str_repeat( $t, $depth ) : '';
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			// Initialize some holder variables to store specially handled item
			// wrappers and icons.
			$linkmod_classes = array();
			$icon_classes    = array();
			/**
			 * Get an updated $classes array without linkmod or icon classes.
			 *
			 * NOTE: linkmod and icon class arrays are passed by reference and
			 * are maybe modified before being used later in this function.
			 */
			$classes = self::seporate_linkmods_and_icons_from_classes( $classes, $linkmod_classes, $icon_classes, $depth );
			// Join any icon classes plucked from $classes into a string.
			$icon_class_string = join( ' ', $icon_classes );
			/**
			 * Filters the arguments for a single nav menu item.
			 *
			 *  WP 4.4.0
			 *
			 * @param stdClass $args An object of wp_nav_menu() arguments.
			 * @param WP_Post $item Menu item data object.
			 * @param int $depth Depth of menu item. Used for padding.
			 */
			$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );
			// Add .dropdown or .active classes where they are needed.
			if ( isset( $args->has_children ) && $args->has_children ) {
				$classes[] = 'dropdown';
			}
			if ( in_array( 'current-menu-item', $classes, true ) || in_array( 'current-menu-parent', $classes, true ) ) {
				$classes[] = 'active';
			}
			// Add some additional default classes to the item.
			$classes[] = 'menu-item-' . $item->ID;
			$classes[] = 'nav-item';
			// Allow filtering the classes.
			$classes = apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth );
			// Form a string of classes in format: class="class_names".
			$class_names = join( ' ', $classes );
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
			/**
			 * Filters the ID applied to a menu item's list item element.
			 *
			 * @since WP 3.0.1
			 * @since WP 4.1.0 The `$depth` parameter was added.
			 *
			 * @param string $menu_id The ID that is applied to the menu item's `<li>` element.
			 * @param WP_Post $item The current menu item.
			 * @param stdClass $args An object of wp_nav_menu() arguments.
			 * @param int $depth Depth of menu item. Used for padding.
			 */
			$id     = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
			$id     = $id ? ' id="' . esc_attr( $id ) . '"' : '';
			$output .= $indent . '<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement"' . $id . $class_names . '>';
			// initialize array for holding the $atts for the link item.
			$atts = array();
			// Set title from item to the $atts array - if title is empty then
			// default to item title.
			if ( empty( $item->attr_title ) ) {
				$atts['title'] = ! empty( $item->title ) ? strip_tags( $item->title ) : '';
			} else {
				$atts['title'] = $item->attr_title;
			}
			$atts['target'] = ! empty( $item->target ) ? $item->target : '';
			$atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
			// If item has_children add atts to <a>.
			if ( isset( $args->has_children ) && $args->has_children && $args->depth > 1 ) {
				$atts['href']          = ! empty( $item->url ) ? $item->url : '';
				$atts['data-hover']    = 'dropdown';
				$atts['data-toggle']   = 'dropdown';
				$atts['aria-haspopup'] = 'true';
				$atts['aria-expanded'] = 'false';
				$atts['class']         = 'dropdown-toggle nav-link';
				$atts['id']            = 'menu-item-dropdown-' . $item->ID;
			} else {
				$atts['href'] = ! empty( $item->url ) ? $item->url : '#';
				// Items in dropdowns use .dropdown-item instead of .nav-link.
				if ( $depth > 0 ) {
					$atts['class'] = 'dropdown-item';
				} else {
					$atts['class'] = 'nav-link';
				}
			}
			// update atts of this item based on any custom linkmod classes.
			$atts = self::update_atts_for_linkmod_type( $atts, $linkmod_classes );
			// Allow filtering of the $atts array before using it.
			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
			// Build a string of html containing all the atts for the item.
			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value      = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}
			/**
			 * Set a typeflag to easily test if this is a linkmod or not.
			 */
			$linkmod_type = self::get_linkmod_type( $linkmod_classes );
			/**
			 * START appending the internal item contents to the output.
			 */
			$item_output = isset( $args->before ) ? $args->before : '';
			/**
			 * This is the start of the internal nav item. Depending on what
			 * kind of linkmod we have we may need different wrapper elements.
			 */
			if ( '' !== $linkmod_type ) {
				// is linkmod, output the required element opener.
				$item_output .= self::linkmod_element_open( $linkmod_type, $attributes );
			} else {
				// With no link mod type set this must be a standard <a> tag.
				if ( evolve_theme_mod( 'evl_main_menu_hover_effect', 'rollover' ) == "disable" || strpos( $class_names, 'menu-item-language' ) == true ) {
					$item_output .= '<a' . $attributes . '>';
				} else {
					$item_output .= '<a' . $attributes . '><span class="link-effect" data-hover="' . $item->title . '">';
				}
			}
			/**
			 * Initiate empty icon var, then if we have a string containing any
			 * icon classes form the icon markup with an <i> element. This is
			 * output inside of the item before the $title (the link text).
			 */
			$icon_html = '';
			if ( ! empty( $icon_class_string ) ) {
				// append an <i> with the icon classes to what is output before links.
				$icon_html = '<i class="' . esc_attr( $icon_class_string ) . '" aria-hidden="true"></i> ';
			}
			/** This filter is documented in wp-includes/post-template.php */
			$title = apply_filters( 'the_title', $item->title, $item->ID );
			/**
			 * Filters a menu item's title.
			 *
			 * @since WP 4.4.0
			 *
			 * @param string $title The menu item's title.
			 * @param WP_Post $item The current menu item.
			 * @param stdClass $args An object of wp_nav_menu() arguments.
			 * @param int $depth Depth of menu item. Used for padding.
			 */
			$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
			/**
			 * If the .sr-only class was set apply to the nav items text only.
			 */
			if ( in_array( 'sr-only', $linkmod_classes, true ) ) {
				$title         = self::wrap_for_screen_reader( $title );
				$keys_to_unset = array_keys( $linkmod_classes, 'sr-only' );
				foreach ( $keys_to_unset as $k ) {
					unset( $linkmod_classes[ $k ] );
				}
			}
			// Put the item contents into $output.
			$item_output .= isset( $args->link_before ) ? $args->link_before . $icon_html . $title . $args->link_after : '';
			/**
			 * This is the end of the internal nav item. We need to close the
			 * correct element depending on the type of link or link mod.
			 */
			if ( '' !== $linkmod_type ) {
				// is linkmod, output the required element opener.
				$item_output .= self::linkmod_element_close( $linkmod_type, $attributes );
			} else {
				// With no link mod type set this must be a standard <a> tag.
				if ( evolve_theme_mod( 'evl_main_menu_hover_effect', 'rollover' ) == "disable" ) {
					$item_output .= '</a>';
				} else {
					$item_output .= '</span></a>';
				}
			}
			$item_output .= isset( $args->after ) ? $args->after : '';
			/**
			 * END appending the internal item contents to the output.
			 */
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}

		/**
		 * Traverse elements to create list from elements.
		 *
		 * Display one element if the element doesn't have any children otherwise,
		 * display the element and its children. Will only traverse up to the max
		 * depth and no ignore elements under that depth. It is possible to set the
		 * max depth to include all depths, see walk() method.
		 *
		 * This method should not be called directly, use the walk() method instead.
		 *
		 * @since WP 2.5.0
		 *
		 * @see Walker::start_lvl()
		 *
		 * @param object $element Data object.
		 * @param array $children_elements List of elements to continue traversing (passed by reference).
		 * @param int $max_depth Max depth to traverse.
		 * @param int $depth Depth of current element.
		 * @param array $args An array of arguments.
		 * @param string $output Used to append additional content (passed by reference).
		 */
		public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
			if ( ! $element ) {
				return;
			}
			$id_field = $this->db_fields['id'];
			// Display this element.
			if ( is_object( $args[0] ) ) {
				$args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
			}
			parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
		}

		/**
		 * Menu Fallback
		 * =============
		 * If this function is assigned to the wp_nav_menu's fallback_cb variable
		 * and a menu has not been assigned to the theme location in the WordPress
		 * menu manager the function with display nothing to a non-logged in user,
		 * and will add a link to the WordPress menu manager if logged in as an admin.
		 *
		 * @param array $args passed from the wp_nav_menu function.
		 */
		public static function fallback( $args ) {
			if ( current_user_can( 'edit_theme_options' ) ) {
				/* Get Arguments. */
				$container       = $args['container'];
				$container_id    = $args['container_id'];
				$container_class = $args['container_class'];
				$menu_class      = $args['menu_class'];
				$menu_id         = $args['menu_id'];
				// initialize var to store fallback html.
				$fallback_output = '';
				if ( $container ) {
					$fallback_output .= '<' . esc_attr( $container );
					if ( $container_id ) {
						$fallback_output .= ' id="' . esc_attr( $container_id ) . '"';
					}
					if ( $container_class ) {
						$fallback_output .= ' class="' . esc_attr( $container_class ) . '"';
					}
					$fallback_output .= '>';
				}
				$fallback_output .= '<ul';
				if ( $menu_id ) {
					$fallback_output .= ' id="' . esc_attr( $menu_id ) . '"';
				}
				if ( $menu_class ) {
					$fallback_output .= ' class="' . esc_attr( $menu_class ) . '"';
				}
				$fallback_output .= '>';
				$fallback_output .= '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '" title="' . esc_attr__( 'Add a menu', 'evolve' ) . '">' . esc_html__( 'Add a menu', 'evolve' ) . '</a></li>';
				$fallback_output .= '</ul>';
				if ( $container ) {
					$fallback_output .= '</' . esc_attr( $container ) . '>';
				}
				// if $args has 'echo' key and it's true echo, otherwise return.
				if ( array_key_exists( 'echo', $args ) && $args['echo'] ) {
					echo $fallback_output; // WPCS: XSS OK.
				} else {
					return $fallback_output;
				}
			}
		}

		/**
		 * Find any custom linkmod or icon classes and store in their holder
		 * arrays then remove them from the main classes array.
		 *
		 * Supported linkmods: .disabled, .dropdown-header, .dropdown-divider, .sr-only
		 * Supported iconsets: Font Awesome 4/5, Glypicons
		 *
		 * NOTE: This accepts the linkmod and icon arrays by reference.
		 *
		 * @since 4.0.0
		 *
		 * @param array $classes an array of classes currently assigned to the item.
		 * @param array $linkmod_classes an array to hold linkmod classes.
		 * @param array $icon_classes an array to hold icon classes.
		 * @param integer $depth an integer holding current depth level.
		 *
		 * @return array  $classes         a maybe modified array of classnames.
		 */
		private function seporate_linkmods_and_icons_from_classes( $classes, &$linkmod_classes, &$icon_classes, $depth ) {
			// Loop through $classes array to find linkmod or icon classes.
			foreach ( $classes as $key => $class ) {
				// If any special classes are found, store the class in it's
				// holder array and and unset the item from $classes.
				if ( preg_match( '/^disabled|^sr-only/i', $class ) ) {
					// Test for .disabled or .sr-only classes.
					$linkmod_classes[] = $class;
					unset( $classes[ $key ] );
				} elseif ( preg_match( '/^dropdown-header|^dropdown-divider|^dropdown-item-text/i', $class ) && $depth > 0 ) {
					// Test for .dropdown-header or .dropdown-divider and a
					// depth greater than 0 - IE inside a dropdown.
					$linkmod_classes[] = $class;
					unset( $classes[ $key ] );
				} elseif ( preg_match( '/^fa-(\S*)?|^fa(s|r|l|b)?(\s?)?$/i', $class ) ) {
					// Font Awesome.
					$icon_classes[] = $class;
					unset( $classes[ $key ] );
				} elseif ( preg_match( '/^glyphicon-(\S*)?|^glyphicon(\s?)$/i', $class ) ) {
					// Glyphicons.
					$icon_classes[] = $class;
					unset( $classes[ $key ] );
				}
			}

			return $classes;
		}

		/**
		 * Return a string containing a linkmod type and update $atts array
		 * accordingly depending on the decided.
		 *
		 * @since 4.0.0
		 *
		 * @param array $linkmod_classes array of any link modifier classes.
		 *
		 * @return string                empty for default, a linkmod type string otherwise.
		 */
		private function get_linkmod_type( $linkmod_classes = array() ) {
			$linkmod_type = '';
			// Loop through array of linkmod classes to handle their $atts.
			if ( ! empty( $linkmod_classes ) ) {
				foreach ( $linkmod_classes as $link_class ) {
					if ( ! empty( $link_class ) ) {
						// check for special class types and set a flag for them.
						if ( 'dropdown-header' === $link_class ) {
							$linkmod_type = 'dropdown-header';
						} elseif ( 'dropdown-divider' === $link_class ) {
							$linkmod_type = 'dropdown-divider';
						} elseif ( 'dropdown-item-text' === $link_class ) {
							$linkmod_type = 'dropdown-item-text';
						}
					}
				}
			}

			return $linkmod_type;
		}

		/**
		 * Update the attributes of a nav item depending on the limkmod classes.
		 *
		 * @since 4.0.0
		 *
		 * @param array $atts array of atts for the current link in nav item.
		 * @param array $linkmod_classes an array of classes that modify link or nav item behaviors or displays.
		 *
		 * @return array                 maybe updated array of attributes for item.
		 */
		private function update_atts_for_linkmod_type( $atts = array(), $linkmod_classes = array() ) {
			if ( ! empty( $linkmod_classes ) ) {
				foreach ( $linkmod_classes as $link_class ) {
					if ( ! empty( $link_class ) ) {
						// update $atts with a space and the extra classname...
						// so long as it's not a sr-only class.
						if ( 'sr-only' !== $link_class ) {
							$atts['class'] .= ' ' . esc_attr( $link_class );
						}
						// check for special class types we need additional handling for.
						if ( 'disabled' === $link_class ) {
							// Convert link to '#' and unset open targets.
							$atts['href'] = '#';
							unset( $atts['target'] );
						} elseif ( 'dropdown-header' === $link_class || 'dropdown-divider' === $link_class || 'dropdown-item-text' === $link_class ) {
							// Store a type flag and unset href and target.
							unset( $atts['href'] );
							unset( $atts['target'] );
						}
					}
				}
			}

			return $atts;
		}

		/**
		 * Wraps the passed text in a screen reader only class.
		 *
		 * @since 4.0.0
		 *
		 * @param string $text the string of text to be wrapped in a screen reader class.
		 *
		 * @return string      the string wrapped in a span with the class.
		 */
		private function wrap_for_screen_reader( $text = '' ) {
			if ( $text ) {
				$text = '<span class="screen-reader-text sr-only">' . $text . '</span>';
			}

			return $text;
		}

		/**
		 * Returns the correct opening element and attributes for a linkmod.
		 *
		 * @since 4.0.0
		 *
		 * @param string $linkmod_type a sting containing a linkmod type flag.
		 * @param string $attributes a string of attributes to add to the element.
		 *
		 * @return string              a string with the openign tag for the element with attribibutes added.
		 */
		private function linkmod_element_open( $linkmod_type, $attributes = '' ) {
			$output = '';
			if ( 'dropdown-item-text' === $linkmod_type ) {
				$output .= '<span class="dropdown-item-text"' . $attributes . '>';
			} elseif ( 'dropdown-header' === $linkmod_type ) {
				// For a header use a span with the .h6 class instead of a real
				// header tag so that it doesn't confuse screen readers.
				$output .= '<span class="dropdown-header h6"' . $attributes . '>';
			} elseif ( 'dropdown-divider' === $linkmod_type ) {
				// this is a divider.
				$output .= '<div class="dropdown-divider"' . $attributes . '>';
			}

			return $output;
		}

		/**
		 * Return the correct closing tag for the linkmod element.
		 *
		 * @since 4.0.0
		 *
		 * @param string $linkmod_type a string containing a special linkmod type.
		 *
		 * @return string              a string with the closing tag for this linkmod type.
		 */
		private function linkmod_element_close( $linkmod_type ) {
			$output = '';
			if ( 'dropdown-header' === $linkmod_type || 'dropdown-item-text' === $linkmod_type ) {
				// For a header use a span with the .h6 class instead of a real
				// header tag so that it doesn't confuse screen readers.
				$output .= '</span>';
			} elseif ( 'dropdown-divider' === $linkmod_type ) {
				// this is a divider.
				$output .= '</div>';
			}

			return $output;
		}
	}
}

/*
    Get BuddyPress Page ID
    ======================================= */

if ( ! function_exists( 'evolve_bp_get_id' ) ) {
	function evolve_bp_get_id() {
		$post_id    = '';
		$bp_page_id = get_option( 'bp-pages' );
		if ( ( function_exists( 'is_buddypress' ) && is_buddypress() ) ) {
			if ( bp_is_current_component( 'members' ) ) {
				$post_id = $bp_page_id['members'];
			} elseif ( bp_is_current_component( 'activity' ) ) {
				$post_id = $bp_page_id['activity'];
			} elseif ( bp_is_current_component( 'groups' ) ) {
				$post_id = $bp_page_id['groups'];
			} elseif ( bp_is_current_component( 'register' ) ) {
				$post_id = $bp_page_id['register'];
			} elseif ( bp_is_current_component( 'activate' ) ) {
				$post_id = $bp_page_id['activate'];
			} else {
				$post_id = '';
			}
		}

		return $post_id;
	}
}

/*
    Function To Print Out CSS Class According To Layout Or Post Meta
    ======================================= */

if ( ! function_exists( 'evolve_layout_class' ) ) {
	function evolve_layout_class( $type = 1 ) {
		global $wp_query;

		$layout_css = '';
		switch ( evolve_theme_mod( 'evl_layout', '2cl' ) ):
			case "1c":
				$layout_css = 'col-12';
				break;
			case "2cl":
				$layout_css = 'col-sm-12 col-md-8';
				break;
			case "2cr":
				$layout_css = 'col-sm-12 col-md-8 order-1 order-md-2';
				break;
			case "3cm":
				$layout_css = 'col-md-12 col-lg-6 order-1 order-lg-2';
				break;
			case "3cr":
				$layout_css = 'col-md-12 col-lg-6 order-1 order-lg-3';
				break;
			case "3cl":
				$layout_css = 'col-md-12 col-lg-6 order-1';
				break;
		endswitch;
		if ( is_single() || is_page() || $wp_query->is_posts_page || ( function_exists( 'is_buddypress' ) && is_buddypress() ) || ( class_exists( 'bbPress' ) && is_bbpress() ) ):
			$sidebar_position = get_post_meta( evolve_get_post_id(), 'evolve_sidebar_position', true );
			if ( ( $type == 1 && $sidebar_position == "default" ) || ( $type == 2 && $sidebar_position == "default" ) ) {
				if ( get_post_meta( evolve_get_post_id(), 'evolve_full_width', true ) == 'yes' ) {
					$layout_css = 'col';
				}
			}
			switch ( $sidebar_position ):
				case "default":
					//do nothing
					break;
				case "2cl":
					$layout_css = 'col-sm-12 col-md-8';
					break;
				case "2cr":
					$layout_css = 'col-sm-12 col-md-8 order-1 order-md-2';
					break;
				case "3cm":
					$layout_css = 'col-md-12 col-lg-6 order-1 order-lg-2';
					break;
				case "3cr":
					$layout_css = 'col-md-12 col-lg-6 order-1 order-lg-3';
					break;
				case "3cl":
					$layout_css = 'col-md-12 col-lg-6 order-1';
					break;
			endswitch;
		endif;
		if ( is_front_page() && is_page() || is_home() ) {
			switch ( evolve_theme_mod( 'evl_frontpage_layout', '1c' ) ):
				case "1c":
					$layout_css = 'col-12';
					break;
				case "2cl":
					$layout_css = 'col-sm-12 col-md-8';
					break;
				case "2cr":
					$layout_css = 'col-sm-12 col-md-8 order-1 order-md-2';
					break;
				case "3cm":
					$layout_css = 'col-md-12 col-lg-6 order-1 order-lg-2';
					break;
				case "3cr":
					$layout_css = 'col-md-12 col-lg-6 order-1 order-lg-3';
					break;
				case "3cl":
					$layout_css = 'col-md-12 col-lg-6 order-1';
					break;
			endswitch;
		}

		if ( $type == 1 ) {
			if ( class_exists( 'Woocommerce' ) ):
				if ( is_cart() || is_checkout() || is_account_page() || ( get_option( 'woocommerce_thanks_page_id' ) && is_page( get_option( 'woocommerce_thanks_page_id' ) ) ) ) {
					$layout_css = 'col';
				}
			endif;
		}

		return $layout_css;
	}
}

/*
    Function To Print Out CSS Class According To Sidebar Layout
    ======================================= */

if ( ! function_exists( 'evolve_sidebar_class' ) ) {
	function evolve_sidebar_class() {

		$sidebar_css = '';
		switch ( evolve_theme_mod( 'evl_layout', '2cl' ) ):
			case "1c":
				//do nothing
				break;
			case "2cl":
				$sidebar_css = 'col-sm-12 col-md-4';
				break;
			case "2cr":
				$sidebar_css = 'col-sm-12 col-md-4 order-2 order-md-1';
				break;
			case "3cm":
			case "3cl":
				$sidebar_css = 'col-md-12 col-lg-3 order-3';
				break;
			case "3cr":
				$sidebar_css = 'col-md-12 col-lg-3 order-3 order-lg-2';
				break;
		endswitch;
		$sidebar_position = get_post_meta( evolve_get_post_id(), 'evolve_sidebar_position', true );
		if ( is_page() || is_single() ):
			switch ( $sidebar_position ):
				case "default":
					//do nothing
					break;
				case "2cl":
					$sidebar_css = 'col-sm-12 col-md-4';
					break;
				case "2cr":
					$sidebar_css = 'col-sm-12 col-md-4 order-2 order-md-1';
					break;
				case "3cm":
				case "3cl":
					$sidebar_css = 'col-md-12 col-lg-3 order-3';
					break;
				case "3cr":
					$sidebar_css = 'col-md-12 col-lg-3 order-3 order-lg-2';
					break;
			endswitch;
		endif;
		if ( is_front_page() && is_page() || is_home() ) {
			switch ( evolve_theme_mod( 'evl_frontpage_layout', '1c' ) ):
				case "1c":
					$sidebar_css = '';
					break;
				case "2cl":
					$sidebar_css = 'col-sm-12 col-md-4';
					break;
				case "2cr":
					$sidebar_css = 'col-sm-12 col-md-4 order-2 order-md-1';
					break;
				case "3cm":
				case "3cl":
					$sidebar_css = 'col-md-12 col-lg-3 order-3';
					break;
				case "3cr":
					$sidebar_css = 'col-md-12 col-lg-3 order-3 order-lg-2';
					break;
			endswitch;
		}
		echo $sidebar_css;
	}
}

/*
    Function To Print Out CSS Class According To Sidebar-2 Layout
    ======================================= */

if ( ! function_exists( 'evolve_sidebar_class_2' ) ) {
	function evolve_sidebar_class_2() {

		$sidebar_css = '';
		switch ( evolve_theme_mod( 'evl_layout', '2cl' ) ):
			case "3cm":
			case "3cr":
				$sidebar_css = 'col-md-12 col-lg-3 order-2 order-lg-1';
				break;
			case "3cl":
				$sidebar_css = 'col-md-12 col-lg-3 order-2';
				break;
		endswitch;
		$sidebar_single = get_post_meta( evolve_get_post_id(), 'evolve_sidebar_position', true );
		if ( is_page() || is_single() ):
			switch ( $sidebar_single ):
				case "3cm":
				case "3cr":
					$sidebar_css = 'col-md-12 col-lg-3 order-2 order-lg-1';
					break;
				case "3cl":
					$sidebar_css = 'col-md-12 col-lg-3 order-2';
					break;
			endswitch;
		endif;
		if ( ( is_front_page() && is_page() ) || is_home() ) {
			switch ( evolve_theme_mod( 'evl_frontpage_layout', '1c' ) ):
				case "3cm":
				case "3cr":
					$sidebar_css = 'col-md-12 col-lg-3 order-2 order-lg-1';
					break;
				case "3cl":
					$sidebar_css = 'col-md-12 col-lg-3 order-2';
					break;
			endswitch;
		}
		echo $sidebar_css;
	}
}

/*
    Function To Determine Whether To get_sidebar(), Depending On Theme Options Layout And Post Meta Layout
    ======================================= */

if ( ! function_exists( 'evolve_lets_get_sidebar' ) ) {
	function evolve_lets_get_sidebar() {
		global $wp_query;

		$get_sidebar = false;
		if ( evolve_theme_mod( 'evl_layout', '2cl' ) != "1c" ) {
			$get_sidebar = true;
		}
		if ( ( is_page() || is_single() || $wp_query->is_posts_page || ( function_exists( 'is_buddypress' ) && is_buddypress() ) || ( class_exists( 'bbPress' ) && is_bbpress() ) ) && get_post_meta( evolve_get_post_id(), 'evolve_full_width', true ) == 'yes' ) {
			$get_sidebar = false;
		}
		if ( is_single() || is_page() || $wp_query->is_posts_page || ( function_exists( 'is_buddypress' ) && is_buddypress() ) || ( class_exists( 'bbPress' ) && is_bbpress() ) ) {
			$sidebar_single = get_post_meta( evolve_get_post_id(), 'evolve_sidebar_position', true );
			if ( $sidebar_single != 'default' && $sidebar_single != '' ) {
				$get_sidebar = true;
			}
		}

		if ( ( is_front_page() && is_page() ) || is_home() ) {
			if ( evolve_theme_mod( 'evl_frontpage_layout', '1c' ) == "1c" ) {
				$get_sidebar = false;
			} else {
				$get_sidebar = true;
			}
		}

		return $get_sidebar;
	}
}

/*
    Function To Determine Whether To get_sidebar(2), Depending On Theme Options Layout And Post Meta Layout
    ======================================= */

if ( ! function_exists( 'evolve_lets_get_sidebar_2' ) ) {
	function evolve_lets_get_sidebar_2() {
		global $wp_query;

		$get_sidebar = false;
		if ( evolve_theme_mod( 'evl_layout', '2cl' ) == "3cm" || evolve_theme_mod( 'evl_layout', '2cl' ) == "3cl" || evolve_theme_mod( 'evl_layout', '2cl' ) == "3cr" ) {
			$get_sidebar = true;
		}
		if ( ( is_page() || is_single() || $wp_query->is_posts_page || ( function_exists( 'is_buddypress' ) && is_buddypress() ) || ( class_exists( 'bbPress' ) && is_bbpress() ) ) && get_post_meta( evolve_get_post_id(), 'evolve_full_width', true ) == 'yes' ) {
			$get_sidebar = false;
		}
		if ( is_single() || is_page() || $wp_query->is_posts_page || ( function_exists( 'is_buddypress' ) && is_buddypress() ) || ( class_exists( 'bbPress' ) && is_bbpress() ) ) {
			$sidebar_single = get_post_meta( evolve_get_post_id(), 'evolve_sidebar_position', true );
			if ( $sidebar_single == '2cl' || $sidebar_single == '2cr' ) {
				$get_sidebar = false;
			}
			if ( $sidebar_single == "3cm" || $sidebar_single == "3cl" || $sidebar_single == "3cr" ) {
				$get_sidebar = true;
			}
		}
		if ( ( is_front_page() && is_page() ) || is_home() ) {
			if ( evolve_theme_mod( 'evl_frontpage_layout', '1c' ) == "1c" || evolve_theme_mod( 'evl_frontpage_layout', '1c' ) == "2cl" || evolve_theme_mod( 'evl_frontpage_layout', '1c' ) == "2cr" ) {
				$get_sidebar = false;
			} else {
				$get_sidebar = true;
			}
		}

		return $get_sidebar;
	}
}

/*
    Print Typography
    ======================================= */

if ( ! function_exists( 'evolve_print_fonts' ) ) {
	function evolve_print_fonts( $name, $css_class, $additional_css = '', $additional_color_css_class = '', $imp = '' ) {
		global $options;
		$options[ $name ] = evolve_theme_mod( $name );

		$css         = "$css_class {";
		$font_size   = '';
		$font_family = '';
		$font_style  = '';
		$font_weight = '';
		$font_align  = '';
		$color       = '';
		if ( isset( $options[ $name ]['font-size'] ) && $options[ $name ]['font-size'] != '' ) {
			$font_size = $options[ $name ]['font-size'];
			$css       .= " font-size: " . $font_size . "" . $imp . ";";
		}
		if ( isset( $options[ $name ]['font-family'] ) && $options[ $name ]['font-family'] != '' ) {
			$font_family = $options[ $name ]['font-family'];
			$css         .= " font-family: " . $font_family . ";";
		}
		if ( isset( $options[ $name ]['font-style'] ) && $options[ $name ]['font-style'] != '' ) {
			$font_style = $options[ $name ]['font-style'];
			$css        .= " font-style: " . $font_style . ";";
		}
		if ( isset( $options[ $name ]['font-weight'] ) && $options[ $name ]['font-weight'] != '' ) {
			$font_weight = $options[ $name ]['font-weight'];
			$css         .= " font-weight: " . $font_weight . ";";
		}
		if ( isset( $options[ $name ]['text-align'] ) && $options[ $name ]['text-align'] != '' ) {
			$font_align = $options[ $name ]['text-align'];
			$css        .= " text-align: " . $font_align . ";";
		}
		if ( isset( $options[ $name ]['color'] ) && $options[ $name ]['color'] != '' ) {
			$color = $options[ $name ]['color'];
			$css   .= " color: " . $color . ";";
		}
		if ( $additional_css != '' ) {
			$css .= "" . $additional_css . ";";
		}
		$css .= " }";
		if ( isset( $options[ $name ]['color'] ) && $additional_color_css_class != '' ) {
			$color = $options[ $name ]['color'];
			$css   .= "$additional_color_css_class{ color:" . $color . "; }";
		}

		return $css;
	}
}

/*
    Function To Separate Values
    ======================================= */

if ( ! function_exists( 'evolve_remove_comma' ) ) {
	function evolve_remove_comma( $str = '' ) {
		$str = substr( $str, 1 );

		return $str;
	}
}

/*
    Custom Front Page Builder
    ======================================= */

if ( ! function_exists( 'evolve_front_page_builder' ) ) {
	function evolve_front_page_builder() {
		if ( ( ! is_front_page() && ! is_page() ) || ( ! is_home() && ! is_front_page() ) ) {
			return;
		}
		foreach ( evolve_theme_mod( 'evl_front_elements_content_area' ) as $elementkey => $elementval ) {
			switch ( $elementval ) {

				case 'content_box':
					evolve_content_boxes();
					break;
				case 'testimonial':
					if ( $elementval ) {
						evolve_testimonials();
					}
					break;
				case 'blog_post':
					if ( $elementval ) {
						if ( evolve_theme_mod( 'evl_front_elements_content_display', 'above' ) == 'above' ) { ?>
                            <div class="content">
                            <div class="container">
                            <div class="row">
                            <div id="primary" class="<?php echo evolve_layout_class( $type = 1 ); ?>">
						<?php }

						evolve_blog_page_content();

						if ( evolve_theme_mod( 'evl_front_elements_content_display', 'above' ) == 'above' ) { ?>
                            </div><!-- #primary -->

							<?php if ( evolve_lets_get_sidebar_2() == true ):
								get_sidebar( '2' );
							endif;

							if ( evolve_lets_get_sidebar() == true ):
								get_sidebar();
							endif; ?>

                            </div><!-- .row -->
                            </div><!-- .container -->
                            </div><!-- .content -->

							<?php
						}
					}
					break;
				case 'woocommerce_product':
					if ( $elementval ) {
						if ( class_exists( 'Woocommerce' ) ) {
							evolve_woocommerce_products();
						}
					}
					break;
				case 'counter_circle':
					if ( $elementval ) {
						evolve_counter_circle();
					}
					break;
				case 'custom_content':
					if ( $elementval ) {
						evolve_custom_content();
					}
					break;
			}
		}
	}
}

add_action( 'evolve_before_content_area', 'evolve_front_page_builder', 20 );

/*
    Wrapper Class
    ======================================= */

if ( ! function_exists( 'evolve_wrapper_class' ) ) {
	function evolve_wrapper_class() {
		if ( ! is_customize_preview() ) {
			return;
		}
		if ( ( ( is_front_page() && is_page() || is_home() ) && evolve_theme_mod( 'evl_frontpage_width_layout', 'fixed' ) == "fluid" ) || ( ( ! is_home() && ! is_front_page() ) && evolve_theme_mod( 'evl_width_layout', 'fixed' ) == "fluid" ) ) {
		} else {
			return "class='wrapper-customizer'";
		}
	}
}

/*
    Custom Function To Return Terms
    ======================================= */

if ( ! function_exists( 'evolve_get_terms' ) ) {
	function evolve_get_terms( $term = null, $glue = ', ' ) {
		if ( ! $term ) {
			return;
		}

		$separator = "\n";
		switch ( $term ):
			case 'cats':
				$terms = get_the_category_list( $separator );
				break;
			case 'tags':
				$terms = get_the_tag_list( '', "$separator", '' );
				break;
		endswitch;
		if ( empty( $terms ) ) {
			return;
		}

		$thing = explode( $separator, $terms );

		if ( empty( $thing ) ) {
			return false;
		}

		return trim( join( $glue, $thing ) );
	}
}

/*
	Function To Check If Post Is Custom Type
    ======================================= */

if ( ! function_exists( 'evolve_is_post_type' ) ) {
	function evolve_is_post_type( $post = null ) {
		$all_custom_post_types = get_post_types( array( '_builtin' => false ) );

		if ( empty ( $all_custom_post_types ) ) {
			return false;
		}

		$custom_types      = array_keys( $all_custom_post_types );
		$current_post_type = get_post_type( $post );

		if ( ! $current_post_type ) {
			return false;
		}

		return in_array( $current_post_type, $custom_types );
	}
}

/*
	Function To Check If Slider Is Enabled On The Current Post/Page
    ======================================= */

if ( ! function_exists( 'evolve_slider_active' ) ) {
	function evolve_slider_active( $enabled ) {

		$enabled = false;

		if ( ( get_post_meta( evolve_get_post_id(), 'evolve_slider_type', true ) == 'bootstrap' && evolve_theme_mod( 'evl_bootstrap_slider_support', '0' ) == '1' ) ||
		     ( evolve_theme_mod( 'evl_bootstrap_slider', '0' ) == '1' && evolve_theme_mod( 'evl_bootstrap_slider_support', '0' ) == '1' ) ||
		     ( evolve_theme_mod( 'evl_bootstrap_slider_support', '0' ) == "1" && is_front_page() && ( evolve_theme_mod( 'evl_front_elements_header_area', array( 'bootstrap_slider' ) ) ) ) ||
		     ( evolve_theme_mod( 'evl_bootstrap_slider_support', '0' ) == "1" && is_home() && ( evolve_theme_mod( 'evl_front_elements_header_area', array( 'bootstrap_slider' ) ) ) ) ||
		     ( get_post_meta( evolve_get_post_id(), 'evolve_slider_type', true ) == 'posts' && evolve_theme_mod( 'evl_carousel_slider', '0' ) == '1' ) ||
		     ( evolve_theme_mod( 'evl_posts_slider', '0' ) == '1' && evolve_theme_mod( 'evl_carousel_slider', '0' ) == '1' ) ||
		     ( evolve_theme_mod( 'evl_carousel_slider', '0' ) == "1" && is_front_page() && ( evolve_theme_mod( 'evl_front_elements_header_area', array( 'posts_slider' ) ) ) ) ||
		     ( evolve_theme_mod( 'evl_carousel_slider', '0' ) == "1" && is_home() && ( evolve_theme_mod( 'evl_front_elements_header_area', array( 'posts_slider' ) ) ) ) ||
		     ( get_post_meta( evolve_get_post_id(), 'evolve_slider_type', true ) == 'parallax' && evolve_theme_mod( 'evl_parallax_slider_support', '0' ) == '1' ) ||
		     ( evolve_theme_mod( 'evl_parallax_slider', '0' ) == '1' && evolve_theme_mod( 'evl_parallax_slider_support', '0' ) == '1' ) ||
		     ( evolve_theme_mod( 'evl_parallax_slider_support', '0' ) == "1" && is_front_page() && ( evolve_theme_mod( 'evl_front_elements_header_area', array( 'parallax_slider' ) ) ) ) ||
		     ( evolve_theme_mod( 'evl_parallax_slider_support', '0' ) == "1" && is_home() && ( evolve_theme_mod( 'evl_front_elements_header_area', array( 'parallax_slider' ) ) ) ) ) {
			$enabled = true;
		}

		return $enabled;
	}
}

/*
    Get Current Post/Page ID
    ======================================= */

if ( ! function_exists( 'evolve_get_post_id' ) ) {
	function evolve_get_post_id() {
		global $post;

		if ( ! empty( $post->ID ) ) {
			if ( ! is_home() && ! is_front_page() && ! is_archive() ) {
				$post_id = $post->ID;
			}
			if ( ! is_home() && is_front_page() ) {
				$post_id = $post->ID;
			}
		}
		if ( is_home() ) {
			$post_id = get_option( 'page_for_posts' );
		} elseif ( is_front_page() && is_page() ) {
			$post_id = get_option( 'page_on_front' );
		} elseif ( ( function_exists( 'is_buddypress' ) && is_buddypress() ) ) {
			$post_id = evolve_bp_get_id();
		} else {
			$post_id = isset( $post->ID ) ? $post->ID : '';
		}

		return $post_id;
	}
}

/*
    Get Slider Position
    ======================================= */

if ( ! function_exists( 'evolve_get_slider_position' ) ) {
	function evolve_get_slider_position() {

		$page_ID = get_queried_object_id();

		$get_slider_position = get_post_meta( $page_ID, 'evolve_slider_position', true );
		$get_slider_position = empty( $get_slider_position ) ? 'default' : $get_slider_position;

		return $get_slider_position;
	}
}

/*
    Function To Check Logo Position
    ======================================= */

if ( ! function_exists( 'evolve_logo_position' ) ) {
	function evolve_logo_position() {
		$logo_position = evolve_theme_mod( 'evl_pos_logo', 'left' );

		return $logo_position;
	}
}

/*
    Schema.org Function For HTML
    ======================================= */

if ( ! function_exists( 'evolve_html_tag_schema' ) ) {
	function evolve_html_tag_schema() {
		$schema = 'http://schema.org/';

		if ( class_exists( 'Woocommerce' ) && is_woocommerce() ) {
			$type = 'Product';
		} elseif ( is_single() ) {
			$type = "Article";
		} elseif ( is_author() ) {
			$type = 'ProfilePage';
		} elseif ( is_search() ) {
			$type = 'SearchResultsPage';
		} elseif ( class_exists( 'Woocommerce' ) && is_woocommerce() ) {
			$type = 'Product';
		} else {
			$type = 'WebPage';
		}
		echo 'itemscope="itemscope" itemtype="' . $schema . $type . '"';
	}
}