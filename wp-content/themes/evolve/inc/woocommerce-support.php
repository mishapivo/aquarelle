<?php
add_theme_support( 'woocommerce' );

if ( ! defined( 'ABSPATH' ) ) {
	die;
}

if ( session_id() == '' || ! isset( $_SESSION ) ) {
	session_start();
}

add_action( 'init', 'evolve_woocommerce_ordering' );

function evolve_woocommerce_ordering() {
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
	if ( ! evolve_theme_mod( 'evl_woocommerce_evolve_ordering', '0' ) ) {
		add_action( 'woocommerce_before_shop_loop', 'evolve_woocommerce_catalog_ordering', 30 );
		add_action( 'woocommerce_get_catalog_ordering_args', 'evolve_woocommerce_get_catalog_ordering_args', 20 );
	}
}

if ( ! class_exists( 'evolve_woocommerce' ) ) {

	class evolve_woocommerce {

		function __construct() {
		    add_filter( 'woocommerce_enqueue_styles', '__return_false' );
			add_filter( 'woocommerce_show_page_title', array( $this, 'shop_title' ), 10 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
			remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
			remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
			remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
			remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
			add_action( 'woocommerce_before_single_product', 'woocommerce_template_single_title', 20 );
			add_action( 'woocommerce_before_main_content', array( $this, 'before_container' ), 11 );
			add_action( 'woocommerce_before_main_content', array( $this, 'shop_breadcrumb' ), 20 );
			add_action( 'woocommerce_before_main_content', array( $this, 'add_sidebar_2' ), 10 );
			add_action( 'woocommerce_after_main_content', array( $this, 'after_container' ), 10 );
			add_action( 'woocommerce_sidebar', array( $this, 'add_sidebar' ), 10 );
			remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart',10);
			add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 12 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
			add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
			add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 11 );
			add_action( 'woocommerce_before_single_product_summary', array( $this, 'before_single_product' ), 15 );
			add_action( 'woocommerce_after_single_product_summary', array( $this, 'after_container' ), 5 );
			remove_action( 'woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 10 );
			add_filter( 'woocommerce_sale_flash', array( $this,'sale_flash'), 10, 3 );
			remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
			add_filter( 'woocommerce_shop_loop_item_title', array( $this,'shop_loop_item_title'), 10 );
			remove_action( 'woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10 );
			add_filter( 'woocommerce_shop_loop_subcategory_title', array( $this,'template_loop_category_title'), 10 );
		}

		private static function get_wc_version() {
			return defined( 'WC_VERSION' ) && WC_VERSION ? WC_VERSION : null;
		}

		public static function is_wc_version_gte_2_3() {
			return self::get_wc_version() && version_compare( self::get_wc_version(), '2.3', '>=' );
		}

		function shop_loop_item_title() {
		    echo '<h5 class="card-title">'. get_the_title().'</h5>';
		}

        function before_container() {
	        echo '<div id="primary" class="' . evolve_layout_class( $type = 1 ) . '">';
		}

		function before_single_product() {
			echo '<div class="row">';
		}

		function shop_title() {
			return false;
		}

		function after_container() {
		    echo '</div>';
		}

        function sale_flash() {
            return '<span class="onsale badge badge-pill badge-primary">' . esc_html__( 'Sale!', 'evolve' ) .'</span>';
        }

        function template_loop_category_title( $category ) { ?>

		<h5 class="woocommerce-loop-category__title card-title mb-0">
			<?php
			echo esc_html( $category->name );

			if ( $category->count > 0 ) {
				echo apply_filters( 'woocommerce_subcategory_count_html', ' <span class="count badge badge-pill badge-secondary">(' . esc_html( $category->count ) . ')</span>', $category ); // WPCS: XSS ok.
			} ?>
		</h5>
		<?php }

		function add_sidebar() {

			$get_sidebar = false;

			if ( evolve_theme_mod( 'evl_layout', '2cl' ) != "1c" ) {
				$get_sidebar = true;
			}

			if ( is_product() && get_post_meta( get_the_ID(), 'evolve_full_width', true ) == 'yes' ) {
			    $get_sidebar = false;
		    }

		  	if ( is_product() ) {
		    	$sidebar_position = get_post_meta( get_the_ID(), 'evolve_sidebar_position', true );
			        if ( $sidebar_position != 'default' && $sidebar_position != '' ) {
						$get_sidebar = true;
				}
		    }

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
					$sidebar_css = 'col-md-12 col-lg-3 order-3';
					break;
				case "3cl":
					$sidebar_css = 'col-md-12 col-lg-3 order-3';
					break;
				case "3cr":
					$sidebar_css = 'col-md-12 col-lg-3 order-3 order-lg-2';
					break;
			endswitch;
			$sidebar_position = get_post_meta( get_the_ID(), 'evolve_sidebar_position', true );
		    if ( is_product() ):
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
			if ( ( ( is_front_page() && is_page() ) || is_home() ) && is_shop() ) {
				if ( evolve_theme_mod( 'evl_frontpage_layout', '1c' ) == "1c" ) {
					$get_sidebar = false;
				} else {
					$get_sidebar = true;
				}

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
						$sidebar_css = 'col-md-12 col-lg-3 order-3';
						break;
					case "3cl":
						$sidebar_css = 'col-md-12 col-lg-3 order-3';
						break;
					case "3cr":
						$sidebar_css = 'col-md-12 col-lg-3 order-3 order-lg-2';
						break;
				endswitch;
			}

			if ( $get_sidebar == true ) {
				echo '<div id="secondary" class="aside ' . $sidebar_css . '">';
				dynamic_sidebar('sidebar-1' );
				echo '</div>';
			}
		}

		function add_sidebar_2() {

			$get_sidebar = false;

			if ( evolve_theme_mod( 'evl_layout', '2cl' ) == "3cm" || evolve_theme_mod( 'evl_layout', '2cl' ) == "3cl" || evolve_theme_mod( 'evl_layout', '2cl' ) == "3cr" ) {
				$get_sidebar = true;
			}

			if ( is_product() && get_post_meta( get_the_ID(), 'evolve_full_width', true ) == 'yes' ) {
			    $get_sidebar = false;
		    }

		    if ( is_product() ) {
			    $sidebar_position = get_post_meta( get_the_ID(), 'evolve_sidebar_position', true );
			        if ( $sidebar_position == '2cl' || $sidebar_position == '2cr' ) {
				        $get_sidebar = false;
			        }
			        if ( $sidebar_position == "3cm" || $sidebar_position == "3cl" || $sidebar_position == "3cr" ) {
				        $get_sidebar = true;
			        }
		    }

		    $sidebar_css = '';

			switch ( evolve_theme_mod( 'evl_layout', '2cl' ) ):
				case "3cm":
					$sidebar_css = 'col-md-12 col-lg-3 order-2 order-lg-1';
					break;
				case "3cl":
					$sidebar_css = 'col-md-12 col-lg-3 order-2';
					break;
				case "3cr":
					$sidebar_css = 'col-md-12 col-lg-3 order-2 order-lg-1';
					break;
			endswitch;
           	$sidebar_position = get_post_meta( get_the_ID(), 'evolve_sidebar_position', true );
		    if ( is_product() ):
			    switch ( $sidebar_position ):
				    case "3cm":
				    case "3cr":
					    $sidebar_css = 'col-md-12 col-lg-3 order-2 order-lg-1';
					    break;
				    case "3cl":
					    $sidebar_css = 'col-md-12 col-lg-3 order-2';
					    break;
			    endswitch;
		    endif;
			if ( ( ( is_front_page() && is_page() ) || is_home() ) && is_shop() ) {
				if ( evolve_theme_mod( 'evl_frontpage_layout', '1c' ) == "3cm" || evolve_theme_mod( 'evl_frontpage_layout', '1c' ) == "3cl" || evolve_theme_mod( 'evl_frontpage_layout', '1c' ) == "3cr" ) {
					$get_sidebar = true;
				}
				switch ( evolve_theme_mod( 'evl_frontpage_layout', '1c' ) ):
					case "3cm":
						$sidebar_css = 'col-md-12 col-lg-3 order-2 order-lg-1';
						break;
					case "3cl":
						$sidebar_css = 'col-md-12 col-lg-3 order-2';
						break;
					case "3cr":
						$sidebar_css = 'col-md-12 col-lg-3 order-2 order-lg-1';
						break;
				endswitch;
			}

			if ( $get_sidebar == true ) {
				echo '<div id="secondary-2" class="aside ' . $sidebar_css . '">';
				dynamic_sidebar( 'sidebar-2' );
				echo '</div>';
			}
		}

		function shop_breadcrumb() {
			$evolve_breadcrumbs = evolve_theme_mod( 'evl_breadcrumbs', '1' );
			if ( $evolve_breadcrumbs == "1" ):
			    if (is_product() && get_post_meta( get_the_ID(), 'evolve_page_breadcrumb', true ) == "no" ) {
                    return;
			    }
				woocommerce_breadcrumb();
			endif;
		}

	}

	new evolve_woocommerce();
}

add_filter( 'woocommerce_breadcrumb_defaults', 'evolve_woocommerce_breadcrumbs' );
function evolve_woocommerce_breadcrumbs() {
	return array(
		'wrap_before' => '<nav aria-label="' . __( "Breadcrumb", "evolve" ) . '"><ol class="breadcrumb">',
		'wrap_after'  => '</ol></nav>',
		'before'      => '<li class="breadcrumb-item">',
		'after'       => '</li>',
		'home'        => __( 'Home', 'evolve' ),
		'delimiter'   => ''
	);
}


add_filter( 'get_product_search_form', 'evolve_product_search_form' );

function evolve_product_search_form( $form ) {
	$form = '<form role="search" method="get" id="searchform" action="' . esc_url( home_url( '/' ) ) . '">
	<div>
	<input class="form-control" type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __( 'Search...', 'evolve' ) . '" />
	<input type="hidden" name="post_type" value="product" />
	</div>
	</form>';

	return $form;
}

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

/*
   Category Page Show Shorting Order
   ======================================= */

function evolve_woocommerce_catalog_ordering() {

	$woo_items = evolve_theme_mod( 'evl_woo_items', '12' );

	if ( isset( $_SERVER['QUERY_STRING'] ) ) {

		parse_str( $_SERVER['QUERY_STRING'], $params );

		$query_string = '?' . $_SERVER['QUERY_STRING'];
	} else {
		$query_string = '';
	}

	// replace it with theme option
	if ( $woo_items ) {
		$per_page = $woo_items;
	} else {
		$per_page = 12;
	}

	$pob = ! empty( $params['product_orderby'] ) ? $params['product_orderby'] : 'default';
	$po  = ! empty( $params['product_order'] ) ? $params['product_order'] : 'asc';
	$pc  = ! empty( $params['product_count'] ) ? $params['product_count'] : $per_page;

	$html = '';
	$html .= '<div class="catalog-ordering mb-4">';

	if ( $po == 'desc' ):
		$html .= '<a class="btn btn-sm desc mx-2" href="' . evolve_addURLParameter( $query_string, 'product_order', 'asc' ) . '" role="button"></a>';
	endif;
	if ( $po == 'asc' ):
		$html .= '<a class="btn btn-sm asc mx-2" href="' . evolve_addURLParameter( $query_string, 'product_order', 'desc' ) . '" role="button"></a>';
	endif;

	$html .= '<div class="orderby order-dropdown dropdown mx-2 mb-2">';
	$html .= '<a href="#" class="btn btn-sm dropdown-item current-item" role="button">' . __( 'Sort by', 'evolve' ) . ' <strong>' . __( 'Default order', 'evolve' ) . '</strong></a>';
	$html .= '<div class="dropdown-menu animated fadeInUp">';
	$html .= '<a class="dropdown-item' . ( ( $pob == 'default' ) ? ' current' : '' ) . '" href="' . evolve_addURLParameter( $query_string, 'product_orderby', 'default' ) . '">' . __( 'Sort by', 'evolve' ) . ' <strong>' . __( 'Default order', 'evolve' ) . '</strong></a>';
	$html .= '<a class="dropdown-item' . ( ( $pob == 'name' ) ? ' current' : '' ) . '" href="' . evolve_addURLParameter( $query_string, 'product_orderby', 'name' ) . '">' . __( 'Sort by', 'evolve' ) . ' <strong>' . __( 'Name', 'evolve' ) . '</strong></a>';
	$html .= '<a class="dropdown-item' . ( ( $pob == 'price' ) ? ' current' : '' ) . '" href="' . evolve_addURLParameter( $query_string, 'product_orderby', 'price' ) . '">' . __( 'Sort by', 'evolve' ) . ' <strong>' . __( 'Price', 'evolve' ) . '</strong></a>';
	$html .= '<a class="dropdown-item' . ( ( $pob == 'date' ) ? ' current' : '' ) . '" href="' . evolve_addURLParameter( $query_string, 'product_orderby', 'date' ) . '">' . __( 'Sort by', 'evolve' ) . ' <strong>' . __( 'Date', 'evolve' ) . '</strong></a>';
	$html .= '<a class="dropdown-item' . ( ( $pob == 'popularity' ) ? ' current' : '' ) . '" href="' . evolve_addURLParameter( $query_string, 'product_orderby', 'popularity' ) . '">' . __( 'Sort by', 'evolve' ) . ' <strong>' . __( 'Popularity', 'evolve' ) . '</strong></a>';
	$html .= '<a class="dropdown-item' . ( ( $pob == 'rating' ) ? ' current' : '' ) . '" href="' . evolve_addURLParameter( $query_string, 'product_orderby', 'rating' ) . '">' . __( 'Sort by', 'evolve' ) . ' <strong>' . __( 'Rating', 'evolve' ) . '</strong></a>';
	$html .= '</div>';
	$html .= '</div>';

	$html .= '<div class="sort-count order-dropdown dropdown mx-2 mb-2">';
	$html .= '<a href="#" class="btn btn-sm dropdown-item current-item" role="button">' . __( 'Show', 'evolve' ) . ' <strong>' . $per_page . ' ' . __( ' Products', 'evolve' ) . '</strong></a>';
	$html .= '<div class="dropdown-menu animated fadeInUp">';
	$html .= '<a class="dropdown-item' . ( ( $pc == $per_page ) ? ' current' : '' ) . '" href="' . evolve_addURLParameter( $query_string, 'product_count', $per_page ) . '">' . __( 'Show', 'evolve' ) . ' <strong>' . $per_page . ' ' . __( 'Products', 'evolve' ) . '</strong></a>';
	$html .= '<a class="dropdown-item' . ( ( $pc == $per_page * 2 ) ? ' current' : '' ) . '" href="' . evolve_addURLParameter( $query_string, 'product_count', $per_page * 2 ) . '">' . __( 'Show', 'evolve' ) . ' <strong>' . ( $per_page * 2 ) . ' ' . __( 'Products', 'evolve' ) . '</strong></a>';
	$html .= '<a class="dropdown-item' . ( ( $pc == $per_page * 3 ) ? ' current' : '' ) . '" href="' . evolve_addURLParameter( $query_string, 'product_count', $per_page * 3 ) . '">' . __( 'Show', 'evolve' ) . ' <strong>' . ( $per_page * 3 ) . ' ' . __( 'Products', 'evolve' ) . '</strong></a>';
	$html .= '</div>';
	$html .= '</div>';
	$html .= '</div>';

	echo $html;
}

function evolve_woocommerce_get_catalog_ordering_args( $args ) {
	global $woocommerce;

	if ( isset( $_SERVER['QUERY_STRING'] ) ) {

		parse_str( $_SERVER['QUERY_STRING'], $params );
	}

	$pob = ! empty( $params['product_orderby'] ) ? $params['product_orderby'] : 'default';
	$po  = ! empty( $params['product_order'] ) ? $params['product_order'] : 'asc';

	switch ( $pob ) {
		case 'date':
			$orderby  = 'date';
			$order    = 'asc';
			$meta_key = '';
			break;
		case 'price':
			$orderby  = 'meta_value_num';
			$order    = 'asc';
			$meta_key = '_price';
			break;
		case 'popularity':
			$orderby  = 'meta_value_num';
			$order    = 'asc';
			$meta_key = 'total_sales';
			break;
		case 'rating':
			$orderby  = 'meta_value_num';
			$order    = 'asc';
			$meta_key = 'average_rating';
			break;
		case 'name':
			$orderby  = 'title';
			$order    = 'asc';
			$meta_key = '';
			break;
		case 'default':
			return $args;
			break;
	}

	switch ( $po ) {
		case 'desc':
			$order = 'desc';
			break;
		case 'asc':
			$order = 'asc';
			break;
		default:
			$order = 'asc';
			break;
	}

	$args['orderby']  = $orderby;
	$args['order']    = $order;
	$args['meta_key'] = $meta_key;

	if ( $pob == 'rating' ) {
		$args['orderby']  = 'menu_order title';
		$args['order']    = $po == 'desc' ? 'desc' : 'asc';
		$args['order']    = strtoupper( $args['order'] );
		$args['meta_key'] = '';

		add_filter( 'posts_clauses', 'evolve_order_by_rating_post_clauses' );
	}

	return $args;
}

function evolve_order_by_rating_post_clauses( $args ) {
	global $wpdb;

	$args['fields'] .= ", AVG( $wpdb->commentmeta.meta_value ) as average_rating ";

	$args['where'] .= " AND ( $wpdb->commentmeta.meta_key = 'rating' OR $wpdb->commentmeta.meta_key IS null ) ";

	$args['join'] .= "
		LEFT OUTER JOIN $wpdb->comments ON($wpdb->posts.ID = $wpdb->comments.comment_post_ID)
		LEFT JOIN $wpdb->commentmeta ON($wpdb->comments.comment_ID = $wpdb->commentmeta.comment_id)
	";

	if ( isset( $_SERVER['QUERY_STRING'] ) ) {
		parse_str( $_SERVER['QUERY_STRING'], $params );
	}

	$order = ! empty( $params['product_order'] ) ? $params['product_order'] : 'desc';
	$order = strtoupper( $order );

	$args['orderby'] = "average_rating {$order}, $wpdb->posts.post_date DESC";

	$args['groupby'] = "$wpdb->posts.ID";

	return $args;
}

add_filter( 'loop_shop_per_page', 'evolve_loop_shop_per_page' );

function evolve_loop_shop_per_page() {

	$woo_items = evolve_theme_mod( 'evl_woo_items', '12' );

	if ( isset( $_SERVER['QUERY_STRING'] ) ) {
		parse_str( $_SERVER['QUERY_STRING'], $params );
	}

	if ( $woo_items ) {
		$per_page = $woo_items;
	} else {
		$per_page = 12;
	}

	$pc = ! empty( $params['product_count'] ) ? $params['product_count'] : $per_page;

	return $pc;
}

add_action( 'woocommerce_before_shop_loop_item_title', 'evolve_woocommerce_thumbnail', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

function evolve_woocommerce_thumbnail() {
	global $woocommerce, $product;

	$items_in_cart = array();

	if ( $woocommerce->cart->get_cart() && is_array( $woocommerce->cart->get_cart() ) ) {
		foreach ( $woocommerce->cart->get_cart() as $cart ) {
			$items_in_cart[] = $cart['product_id'];
		}
	}

	$id      = $product->get_ID();
	$in_cart = in_array( $id, $items_in_cart );
	$size    = 'shop_catalog';

	$gallery          = get_post_meta( $id, '_product_image_gallery', true );
	$attachment_image = '';
	if ( ! empty( $gallery ) ) {
		$gallery          = explode( ',', $gallery );
		$first_image_id   = $gallery[0];
		$image_title = esc_attr( get_the_title( $first_image_id ) );
		$attachment_image = wp_get_attachment_image( $first_image_id, $size, false, array( 'class' => 'hover-image card-img-top', "alt"   => $image_title ) );
	}

	$image_title      = esc_attr( get_the_title( get_post_thumbnail_id() ) );
	$thumb_image = get_the_post_thumbnail( $id, $size, array( "class" => "card-img-top", "alt" => $image_title, 'itemprop' => 'image' ) );
	if ( !has_post_thumbnail() ) {
	    $thumb_image = woocommerce_get_product_thumbnail( $size );
	}
	if ( empty( $thumb_image ) ) {
		$thumb_image     = '<img src="'.esc_url( wc_placeholder_img_src() ).'" alt="'.esc_html__( 'Awaiting product image', 'evolve' ) .'" class="wp-post-image card-img-top d-block w-100" />';
	}

	if ( $attachment_image ) {
		$class_1 = '<div class="crossfade-images">';
		$class_2 = '</div>';
	} else {
		$class_1 = '';
		$class_2 = '';
	}

	echo $class_1;
	echo $attachment_image;
	echo $thumb_image;
	if ( $in_cart ) {
		echo '<div class="cart-loading"><div class="ok"></div></div>';
	} else {
		echo '<div class="cart-loading"><div class="loader"></div></div>';
	}
	echo '<div class="show-details-button">' . evolve_get_svg( 'search' ) . __( 'Show details', 'evolve' ) . '</div>';
	echo $class_2;
}

add_filter( 'woocommerce_add_to_cart_fragments', 'evolve_woocommerce_header_add_to_cart_fragment' );

function evolve_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start(); ?>

    <li class="nav-item dropdown cart ml-md-auto">

		<?php if ( ! $woocommerce->cart->cart_contents_count ): ?>

            <a href="<?php echo get_permalink( get_option( 'woocommerce_cart_page_id' ) ); ?>"
               class="nav-link dropdown-toggle" id="cart_dropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

				<?php echo evolve_get_svg( 'shop' ); ?><?php esc_html_e( '0 items', 'evolve' ); ?>
                - <?php echo wc_price( $woocommerce->cart->cart_contents_total ); ?>

            </a>

            <div class="dropdown-menu p-md-3 dropdown-menu-right" aria-labelledby="cart_dropdown">
                <span class="dropdown-item">

				    <?php esc_html_e( 'Your cart is currently empty', 'evolve' ); ?>

                </span>
            </div>

		<?php else: ?>

            <a href="<?php echo get_permalink( get_option( 'woocommerce_cart_page_id' ) ); ?>"
               class="btn px-3 nav-link dropdown-toggle" id="cart_dropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

				<?php echo evolve_get_svg( 'shop' ); ?><?php echo sprintf( _n( '%s item', '%s items', $woocommerce->cart->cart_contents_count, 'evolve' ), $woocommerce->cart->cart_contents_count ); ?>
                - <?php echo wc_price( $woocommerce->cart->cart_contents_total ); ?>

            </a>

            <div class="dropdown-menu p-3 dropdown-menu-right" aria-labelledby="cart_dropdown">

				<?php foreach ( $woocommerce->cart->cart_contents as $cart_item ):
					$cart_item_key = $cart_item['key'];
					$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key ); ?>

                    <div class="media">

                        <a href="<?php echo get_permalink( $cart_item['product_id'] ); ?>"><?php $evolve_thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image( array(
								80,
								80
							) ), $cart_item, $cart_item_key );
							echo $evolve_thumbnail; ?></a>

                        <div class="media-body ml-3">
                            <h6><?php echo get_the_title($cart_item['product_id']); ?></h6>
                            <p>
                                <a class="dropdown-item"
                                   href="<?php echo get_permalink( $cart_item['product_id'] ); ?>"><?php echo $cart_item['quantity']; ?>
                                    x <?php echo $woocommerce->cart->get_product_subtotal( $cart_item['data'], $cart_item['quantity'] ); ?></a>

                            </p>
                        </div>
                    </div>

                    <div class="dropdown-divider"></div>

				<?php endforeach; ?>

                <div class="row">
                    <div class="col text-center">
                        <a href="<?php echo get_permalink( get_option( 'woocommerce_cart_page_id' ) ); ?>"><?php echo evolve_get_svg( 'shop' ); esc_html_e( 'View Cart', 'evolve' ); ?></a>
                    </div>
                    <div class="col text-center">
                        <a href="<?php echo get_permalink( get_option( 'woocommerce_checkout_page_id' ) ); ?>"><?php echo evolve_get_svg( 'ok' ); esc_html_e( 'Checkout', 'evolve' ); ?></a>
                    </div>
                </div>
            </div>

		<?php endif; ?>

    </li><!-- .nav-item .dropdown .cart -->

	<?php
	$fragments['.header-wrapper .cart'] = ob_get_clean();

	ob_start();

	return $fragments;
}

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_action( 'woocommerce_after_single_product_summary', 'evolve_woocommerce_output_related_products', 15 );

function evolve_woocommerce_output_related_products() {
	$args = array(
		'posts_per_page' => 4,
		'columns'        => 4,
		'orderby'        => 'rand'
	);

	woocommerce_related_products( apply_filters( 'woocommerce_output_related_products_args', $args ) );
}

add_action( 'woocommerce_before_cart_table', 'evolve_woocommerce_before_cart_table', 20 );

function evolve_woocommerce_before_cart_table( $args ) {
	global $woocommerce;

	$html = '<div class="border p-4 mb-4">';

	$html .= '<h4 class="mb-4">' . sprintf( _n( 'You have %s item in your cart', 'You have %s items in your cart', $woocommerce->cart->cart_contents_count, 'evolve' ), $woocommerce->cart->cart_contents_count ) . '</h4>';

	echo $html;
}

add_action( 'woocommerce_after_cart_table', 'evolve_woocommerce_after_cart_table', 20 );

function evolve_woocommerce_after_cart_table( $args ) {
	$html = '</div>';

	echo $html;
}

function evolve_woocommerce_cross_sell_display_2( $posts_per_page = 3, $columns = 3, $orderby = 'rand' ) {
	// Get visible cross sells then sort them at random.
	$cross_sells = array_filter( array_map( 'wc_get_product', WC()->cart->get_cross_sells() ), 'wc_products_array_filter_visible' );

	wc_set_loop_prop( 'name', 'cross-sells' );
	wc_set_loop_prop( 'columns', apply_filters( 'woocommerce_cross_sells_columns', $columns ) );

	$cross_sells = $posts_per_page > 0 ? array_slice( $cross_sells, 0, $posts_per_page ) : $cross_sells;

	wc_get_template( 'cart/cross-sells.php', array(
		'cross_sells'    => $cross_sells,
		'posts_per_page' => $posts_per_page,
		'orderby'        => $orderby,
		'columns'        => $columns
	) );
}

function evolve_cart_shipping_calc() {
	global $woocommerce;

	do_action( 'woocommerce_before_shipping_calculator' ); ?>

    <div class="shipping_calculator border p-4 mb-4">

        <h4 class="mb-4"><?php esc_html_e( 'Calculate shipping', 'evolve' ); ?></h4>

	<?php if ( apply_filters( 'woocommerce_shipping_calculator_enable_country', true ) ) : ?>
  <p class="form-row form-row-wide" id="calc_shipping_country_field">
			<select name="calc_shipping_country" id="calc_shipping_country" class="country_to_state country_select" rel="calc_shipping_state">
				<option value=""><?php esc_html_e( 'Select a country&hellip;', 'evolve' ); ?></option>
				<?php
				foreach ( WC()->countries->get_shipping_countries() as $key => $value ) {
					echo '<option value="' . esc_attr( $key ) . '"' . selected( WC()->customer->get_shipping_country(), esc_attr( $key ), false ) . '>' . esc_html( $value ) . '</option>';
				}
				?>
			</select>
		</p>
			<?php endif; ?>

		<?php if ( apply_filters( 'woocommerce_shipping_calculator_enable_state', true ) ) : ?>

			<p class="form-row form-row-wide" id="calc_shipping_state_field">

                <?php
				$current_cc = WC()->customer->get_shipping_country();
				$current_r  = WC()->customer->get_shipping_state();
				$states     = WC()->countries->get_states( $current_cc );

				if ( is_array( $states ) && empty( $states ) ) { ?>

					<input type="hidden" name="calc_shipping_state" id="calc_shipping_state" placeholder="<?php esc_attr_e( 'State / County', 'evolve' ); ?>" />

                    <?php } elseif ( is_array( $states ) ) { ?>

					<span>
						<select name="calc_shipping_state" class="state_select" id="calc_shipping_state" placeholder="<?php esc_attr_e( 'State / County', 'evolve' ); ?>">
							<option value=""><?php esc_html_e( 'Select a state&hellip;', 'evolve' ); ?></option>
							<?php
							foreach ( $states as $ckey => $cvalue ) {
								echo '<option value="' . esc_attr( $ckey ) . '" ' . selected( $current_r, $ckey, false ) . '>' . esc_html( $cvalue ) . '</option>';
							}
							?>
						</select>
					</span>

					<?php
				} else {
					?>
					<input type="text" class="input-text" value="<?php echo esc_attr( $current_r ); ?>" placeholder="<?php esc_attr_e( 'State / County', 'evolve' ); ?>" name="calc_shipping_state" id="calc_shipping_state" />
					<?php
				}
				?>
			</p>

		<?php endif; ?>

		<?php if ( apply_filters( 'woocommerce_shipping_calculator_enable_city', true ) ) : ?>

			<p class="form-row form-row-wide" id="calc_shipping_city_field">
				<input type="text" class="input-text" value="<?php echo esc_attr( WC()->customer->get_shipping_city() ); ?>" placeholder="<?php esc_attr_e( 'City', 'evolve' ); ?>" name="calc_shipping_city" id="calc_shipping_city" />
			</p>

		<?php endif; ?>

		<?php if ( apply_filters( 'woocommerce_shipping_calculator_enable_postcode', true ) ) : ?>

			<p class="form-row form-row-wide" id="calc_shipping_postcode_field">
				<input type="text" class="input-text" value="<?php echo esc_attr( WC()->customer->get_shipping_postcode() ); ?>" placeholder="<?php esc_attr_e( 'Postcode / ZIP', 'evolve' ); ?>" name="calc_shipping_postcode" id="calc_shipping_postcode" />
			</p>

		<?php endif; ?>

		<button type="submit" name="calc_shipping" value="1" class="button"><?php esc_html_e( 'Update Totals', 'evolve' ); ?></button>

		<?php wp_nonce_field( 'woocommerce-shipping-calculator', 'woocommerce-shipping-calculator-nonce' ); ?>

    </div>

	<?php
	do_action( 'woocommerce_after_shipping_calculator' );
}

add_action( 'woocommerce_cart_collaterals', 'evolve_woocommerce_cart_collaterals' );

function evolve_woocommerce_cart_collaterals( $args ) {
	global $woocommerce;
	?>

    <div class="col-md-6 mb-4">

		<?php
		echo evolve_cart_shipping_calc();

		if ( WC()->cart->coupons_enabled() ) {
			?>
            <div class="border p-4">

                <h4 class="mb-4"><?php esc_html_e( 'Have a promotional code?', 'evolve' ); ?></h4>
                <div class="form-inline">
                    <div class="form-group mb-4 mb-sm-0 mb-md-4 mb-lg-0 mr-3 mr-md-0 mr-lg-3">
                        <input name="coupon_code" type="text" class="form-control" id="coupon_code" value=""
                               placeholder="<?php esc_html_e( 'Coupon code', 'evolve' ); ?>"/>
                    </div>
                    <input type="submit" class="btn btn-sm mb-4 mb-sm-0" name="apply_coupon"
                           value="<?php esc_html_e( 'Apply Coupon', 'evolve' ); ?>"/>
                </div>

				<?php do_action( 'woocommerce_cart_coupon' ); ?>

            </div>
			<?php
		}
		?>
    </div>
	<?php
}

add_action( 'woocommerce_before_cart_totals', 'evolve_woocommerce_before_cart_totals', 20 );

function evolve_woocommerce_before_cart_totals( $args ) {
	global $woocommerce;
	?>

    <form action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">

	<?php
}

add_action( 'woocommerce_after_cart', 'evolve_woocommerce_after_cart' );

function evolve_woocommerce_after_cart( $args ) {
	?>

    </form>

	<?php
}

remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
add_action( 'woocommerce_cart_collaterals', 'evolve_woocommerce_cross_sell_display', 5 );

function evolve_woocommerce_cross_sell_display() {
	global $product, $woocommerce_loop, $post;

	$crosssells = WC()->cart->get_cross_sells();

	if ( sizeof( $crosssells ) == 0 ) {
		return;
	}

	$number_of_columns = 4;

	woocommerce_cross_sell_display( apply_filters( 'woocommerce_cross_sells_total', - 1 ), $number_of_columns );
}

remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );

/*
   Add Bootstrap Style To The WooCommerce Fields
   ======================================= */

add_filter( 'woocommerce_form_field_args', 'evolve_wc_form_field_args', 10, 3 );

function evolve_wc_form_field_args( $args, $key, $value = null ) {

// Start field type switch case

	switch ( $args['type'] ) {

		case 'select' :  /* Targets all select input type elements, except the country and state select input types */
			$args['class'][]     = 'form-group'; // Add a class to the field's html element wrapper - woocommerce input types (fields) are often wrapped within a <p></p> tag
			$args['input_class'] = array( 'form-control' ); // Add a class to the form input itself
			//$args['custom_attributes']['data-plugin'] = 'select2';
			$args['label_class']       = array( 'col-sm-4 col-form-label' );
			$args['custom_attributes'] = array(
				'data-plugin'      => 'select2',
				'data-allow-clear' => 'true',
				'aria-hidden'      => 'true',
			); // Add custom data attributes to the form input itself
			break;

		case 'country' : /* By default WooCommerce will populate a select with the country names - $args defined for this specific input type targets only the country select element */
			$args['class'][]     = 'form-group single-country';
			$args['label_class'] = array( 'col-sm-4 col-form-label' );
			break;

		case 'state' : /* By default WooCommerce will populate a select with state names - $args defined for this specific input type targets only the country select element */
			$args['class'][]     = 'form-group'; // Add class to the field's html element wrapper
			$args['input_class'] = array( 'form-control' ); // add class to the form input itself
			//$args['custom_attributes']['data-plugin'] = 'select2';
			$args['label_class']       = array( 'col-sm-4 col-form-label' );
			$args['custom_attributes'] = array(
				'data-plugin'      => 'select2',
				'data-allow-clear' => 'true',
				'aria-hidden'      => 'true',
			);
			break;

		case 'text':
		case 'password':
		case 'datetime':
		case 'datetime-local':
		case 'date':
		case 'month':
		case 'time':
		case 'week':
		case 'number':
		case 'email':
		case 'url':
		case 'tel':
			$args['class'][]     = 'form-group';
			$args['input_class'] = array( 'form-control' );
			$args['label_class'] = array( 'col-sm-4 col-form-label' );
			break;

		case 'textarea' :
			$args['input_class'] = array( 'form-control' );
			$args['label_class'] = array( 'col-sm-4 col-form-label' );
			break;

		case 'checkbox' :
			$args['class'][]     = 'custom-control custom-checkbox';
			$args['input_class'] = array( 'custom-control-input' );
			$args['label_class'] = array( 'custom-control-label' );
			break;

		case 'radio' :
			$args['class'][]     = 'custom-control custom-radio';
			$args['input_class'] = array( 'custom-control-input' );
			$args['label_class'] = array( 'custom-control-label' );
			break;

		default :
			$args['class'][]     = 'form-group';
			$args['input_class'] = array( 'form-control' );
			$args['label_class'] = array( 'col-sm-4 col-form-label' );
			break;
	}

	return $args;
}

$evolve_woocommerce_option            = get_option( 'evl_options' );
$evolve_woocommerce_one_page_checkout = isset( $evolve_woocommerce_option['evl_evolve_woocommerce_one_page_checkout'] ) ? $evolve_woocommerce_option['evl_evolve_woocommerce_one_page_checkout'] : '';

if ( $evolve_woocommerce_one_page_checkout != '1' ) {
	add_action( 'woocommerce_before_checkout_form', 'evolve_woocommerce_before_checkout_form' );
}

function evolve_woocommerce_before_checkout_form( $args ) {
	global $woocommerce;
	?>

    <div class="row mt-4">
    <div class="col mb-4">
        <div class="nav flex-column nav-pills" id="checkout-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link" id="checkout-billing-tab" data-toggle="pill" href="#checkout-billing" role="tab"
               aria-controls="checkout-billing">

				<?php esc_html_e( 'Billing Address', 'evolve' ); ?>

            </a>

			<?php if ( WC()->cart->needs_shipping() && ! wc_ship_to_billing_address_only() ) : ?>

                <a class="nav-link" id="checkout-shipping-tab" data-toggle="pill" href="#checkout-shipping" role="tab"
                   aria-controls="checkout-shipping">

					<?php esc_html_e( 'Shipping Address', 'evolve' ); ?>

                </a>

			<?php
            elseif ( apply_filters( 'woocommerce_enable_order_notes_field', get_option( 'woocommerce_enable_order_comments', 'yes' ) === 'yes' ) ) :
				if ( ! WC()->cart->needs_shipping() || wc_ship_to_billing_address_only() ) :
					?>

                    <a class="nav-link" id="checkout-shipping-tab" data-toggle="pill" href="#checkout-shipping"
                       role="tab"
                       aria-controls="checkout-shipping">

						<?php esc_html_e( 'Additional Information', 'evolve' ); ?>

                    </a>

				<?php endif;
			endif; ?>

            <a class="nav-link" id="review-order-tab" data-toggle="pill" href="#review-order" role="tab"
               aria-controls="review-order">

				<?php esc_html_e( 'Review &amp; Payment', 'evolve' ); ?>

            </a>
        </div>
    </div>

    <div class="col-lg-9 mb-4">
    <div class="tab-content">

	<?php
}

if ( ! $evolve_woocommerce_one_page_checkout ) {
	add_action( 'woocommerce_after_checkout_form', 'evolve_woocommerce_after_checkout_form' );
}

function evolve_woocommerce_after_checkout_form( $args ) {
	?>

    </div>
    </div>
    </div><!-- .row -->

	<?php
}

if ( $evolve_woocommerce_one_page_checkout ) {
	add_action( 'woocommerce_checkout_before_customer_details', 'evolve_woocommerce_checkout_before_customer_details' );
}

function evolve_woocommerce_checkout_before_customer_details( $args ) {
	global $woocommerce;

	if ( WC()->cart->needs_shipping() && ! wc_ship_to_billing_address_only() ||
	     apply_filters( 'woocommerce_enable_order_notes_field', get_option( 'woocommerce_enable_order_comments', 'yes' ) === 'yes' ) && ( ! WC()->cart->needs_shipping() || wc_ship_to_billing_address_only() )
	) {
		return;
	} else {
		?>

        <div class="evolve-checkout-no-shipping">

		<?php
	}
}

if ( $evolve_woocommerce_one_page_checkout ) {
	add_action( 'woocommerce_checkout_after_customer_details', 'evolve_woocommerce_checkout_after_customer_details' );
}

function evolve_woocommerce_checkout_after_customer_details( $args ) {
	global $woocommerce;

	if ( WC()->cart->needs_shipping() && ! wc_ship_to_billing_address_only() ||
	     apply_filters( 'woocommerce_enable_order_notes_field', get_option( 'woocommerce_enable_order_comments', 'yes' ) === 'yes' ) && ( ! WC()->cart->needs_shipping() || wc_ship_to_billing_address_only() )
	) {
		?>

        <div class="clearboth"></div>

	<?php } else { ?>

        <div class="clearboth"></div>
        </div>

	<?php } ?>

    <div class="woocommerce-content-box clearfix mb-4">

	<?php
}

add_action( 'woocommerce_checkout_billing', 'evolve_woocommerce_checkout_billing', 20 );

function evolve_woocommerce_checkout_billing( $args ) {
	// global $woocommerce;
	// $evolve_woocommerce_option            = get_option( 'evl_options' );
	// $evolve_woocommerce_one_page_checkout = $evolve_woocommerce_option['evl_evolve_woocommerce_one_page_checkout'];
	// if ( ! $evolve_woocommerce_one_page_checkout ) {
		?>

        <a href="#" class="btn float-md-right mt-4 continue"><?php esc_html_e( 'Continue', 'evolve' ); ?></a>

		<?php
	// }
}

add_action( 'woocommerce_checkout_shipping', 'evolve_woocommerce_checkout_shipping', 20 );

function evolve_woocommerce_checkout_shipping( $args ) {

	// $evolve_woocommerce_option            = get_option( 'evl_options' );
	// $evolve_woocommerce_one_page_checkout = $evolve_woocommerce_option['evl_evolve_woocommerce_one_page_checkout'];
	//
	// if ( ! $evolve_woocommerce_one_page_checkout ) {
		?>

        <a href="#" class="btn float-md-right mt-4 continue"><?php esc_html_e( 'Continue', 'evolve' ); ?></a>

		<?php
	// }
}

add_filter( 'woocommerce_enable_order_notes_field', 'evolve_enable_order_notes_field' );

function evolve_enable_order_notes_field() {
	if ( ! evolve_theme_mod( 'evl_woocommerce_enable_order_notes', '0' ) ) {
		return 0;
	}
	return 1;
}

remove_action( 'woocommerce_thankyou', 'woocommerce_order_details_table', 10 );
add_action( 'woocommerce_thankyou', 'evolve_woocommerce_view_order', 10 );

add_action( 'woocommerce_account_dashboard', 'evolve_woocommerce_account_dashboard' );

function evolve_woocommerce_account_dashboard() {

	global $woocommerce, $current_user;
	$evolve_woo_acc_msg_1 = evolve_theme_mod( 'evl_woo_acc_msg_1', '' );
	$evolve_woo_acc_msg_2 = evolve_theme_mod( 'evl_woo_acc_msg_2', '' );
	?>

    <div class="myaccount_user_container">
        <div class="row align-items-center justify-content-between">
            <div class="col-sm-12 col-md-6 col-lg-3 mb-3">

				<?php if ( is_user_logged_in() ) { ?>
                    <h3><?php
						printf(
							__( 'Hello, %s', 'evolve' ), $current_user->display_name
						);
						?></h3>
				<?php } ?>

            </div>

			<?php if ( $evolve_woo_acc_msg_1 ): ?>

                <div class="col-sm-12 col-md-6 col-lg-3 mb-3 message-1">

					<?php echo $evolve_woo_acc_msg_1; ?>

                </div>

			<?php endif;
			if ( $evolve_woo_acc_msg_2 ): ?>

                <div class="col-sm-12 col-md-6 col-lg-3 mb-3 message-2">

					<?php echo $evolve_woo_acc_msg_2; ?>

                </div>

			<?php endif; ?>

            <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
                <form action="<?php echo get_permalink( get_option( 'woocommerce_cart_page_id' ) ); ?>">
                    <button type="submit"
                            class="btn btn-sm float-md-right"><?php echo evolve_get_svg( 'shop' ); esc_html_e( 'View Cart', 'evolve' ); ?></button>
                </form>
            </div>
        </div>
    </div>

    <div class="row mt-4">
    <div class="col mb-4">
        <div class="nav flex-column nav-pills" id="account-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link account-tab" id="account-dashboard-tab" data-toggle="pill" href="#account-dashboard"
               role="tab"
               aria-controls="account-dashboard">

				<?php esc_html_e( 'Dashboard', 'evolve' ); ?>

            </a>
            <a class="nav-link account-tab" id="account-downloads-tab" data-toggle="pill" href="#account-downloads"
               role="tab"
               aria-controls="account-downloads">

				<?php esc_html_e( 'View Downloads', 'evolve' ); ?>

            </a>
            <a class="nav-link account-tab" id="account-orders-tab" data-toggle="pill" href="#account-orders" role="tab"
               aria-controls="account-orders">

				<?php esc_html_e( 'View Orders', 'evolve' ); ?>

            </a>
            <a class="nav-link account-tab" id="account-address-tab" data-toggle="pill" href="#account-address"
               role="tab"
               aria-controls="account-address">

				<?php esc_html_e( 'Change Address', 'evolve' ); ?>

            </a>
            <a class="nav-link account-tab" id="account-edit-tab" data-toggle="pill" href="#account-edit" role="tab"
               aria-controls="account-edit">

				<?php esc_html_e( 'Edit Account', 'evolve' ); ?>

            </a>
            <a class="nav-link"
               href="<?php echo esc_url( wc_get_endpoint_url( 'customer-logout', '', wc_get_page_permalink( 'myaccount' ) ) ); ?>">

				<?php esc_html_e( 'Logout', 'evolve' ); ?>

            </a>
        </div>
    </div>

    <div class="col-lg-9 mb-4">
    <div class="tab-content">

	<?php
}

add_action( 'woocommerce_view_dashboard', 'evolve_woocommerce_view_dashboard' );

function evolve_woocommerce_view_dashboard( $args ) {
	global $current_user; ?>

    <div class="tab-pane fade" id="account-dashboard" role="tabpanel" aria-labelledby="account-dashboard-tab">
        <div class="border p-4">
            <p>
				<?php
				echo sprintf( esc_attr__( 'Hello %1$s%2$s%3$s (not %2$s? %4$sSign out%5$s)', 'evolve' ), '<strong>', esc_html( $current_user->display_name ), '</strong>', '<a href="' . esc_url( wc_get_endpoint_url( 'customer-logout', '', wc_get_page_permalink( 'myaccount' ) ) ) . '">', '</a>' );
				?>
            </p>

            <p class="mb-0">
				<?php
				echo sprintf( esc_attr__( 'From your account dashboard you can view your %1$srecent orders%2$s, manage your %3$sshipping and billing addresses%2$s and %4$sedit your password and account details%2$s.', 'evolve' ), '<a class="view-orders-link" href="#">', '</a>', '<a class="edit-address-link" href="#">', '<a class="edit-account-link" href="#">' );
				?>
            </p>
        </div>
    </div>

	<?php
}

add_action( 'woocommerce_account_orders', 'evolve_woocommerce_before_account_orders' );

function evolve_woocommerce_before_account_orders( $args ) {
	$order_count       = "";
	$my_orders_columns = apply_filters( 'woocommerce_my_account_my_orders_columns', array(
		'order-number'  => __( 'Order', 'evolve' ),
		'order-date'    => __( 'Date ', 'evolve' ),
		'order-status'  => __( 'Status', 'evolve' ),
		'order-total'   => __( 'Total', 'evolve' ),
		'order-actions' => '&nbsp;',
	) );

	$customer_orders = get_posts( apply_filters( 'woocommerce_my_account_my_orders_query', array(
		'numberposts' => $order_count,
		'meta_key'    => '_customer_user',
		'meta_value'  => get_current_user_id(),
		'post_type'   => wc_get_order_types( 'view-orders' ),
		'post_status' => array_keys( wc_get_order_statuses() )
	) ) );

	echo '<div class="tab-pane fade" id="account-orders" role="tabpanel" aria-labelledby="account-orders-tab">
    <div class="border p-4">';

if ( $customer_orders ) { ?>

    <h4><?php echo apply_filters( 'woocommerce_my_account_my_orders_title', __( 'Recent orders', 'evolve' ) ); ?></h4>

    <div class="table-responsive-lg">
        <table class="shop_table shop_table_responsive table">
            <thead>
            <tr>

				<?php foreach ( $my_orders_columns as $column_id => $column_name ) : ?>

                    <th class="<?php echo esc_attr( $column_id ); ?>"><span
                                class="nobr"><?php echo esc_html( $column_name ); ?></span></th>

				<?php endforeach; ?>

            </tr>
            </thead>
            <tbody>

			<?php
			foreach ( $customer_orders as $customer_order ) :
				$order = wc_get_order( $customer_order );
				$item_count = $order->get_item_count();
				?>

                <tr class="order">
					<?php foreach ( $my_orders_columns as $column_id => $column_name ) : ?>
                        <td class="<?php echo esc_attr( $column_id ); ?>"
                            data-title="<?php echo esc_attr( $column_name ); ?>">
							<?php if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>
								<?php do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>

							<?php elseif ( 'order-number' === $column_id ) : ?>
                                <a href="<?php echo esc_url( $order->get_view_order_url() ); ?>">
									<?php echo _x( '#', 'hash before order number', 'evolve' ) . $order->get_order_number(); ?>
                                </a>

							<?php elseif ( 'order-date' === $column_id ) : ?>
								<?php echo wc_format_datetime( $order->get_date_created() ); ?>

							<?php elseif ( 'order-status' === $column_id ) : ?>
								<?php echo wc_get_order_status_name( $order->get_status() ); ?>

							<?php elseif ( 'order-total' === $column_id ) : ?>
								<?php echo sprintf( _n( '%1$s for %2$s item', '%1$s for %2$s items', $item_count, 'evolve' ), $order->get_formatted_order_total(), $item_count ); ?>

							<?php elseif ( 'order-actions' === $column_id ) : ?>
								<?php
								$actions = array(
									'pay'    => array(
										'url'  => $order->get_checkout_payment_url(),
										'name' => __( 'Pay', 'evolve' )
									),
									'view'   => array(
										'url'  => $order->get_view_order_url(),
										'name' => __( 'View', 'evolve' )
									),
									'cancel' => array(
										'url'  => $order->get_cancel_order_url( wc_get_page_permalink( 'myaccount' ) ),
										'name' => __( 'Cancel', 'evolve' )
									)
								);

								if ( ! $order->needs_payment() ) {
									unset( $actions['pay'] );
								}

								if ( ! in_array( $order->get_status(), apply_filters( 'woocommerce_valid_order_statuses_for_cancel', array(
									'pending',
									'failed'
								), $order ) ) ) {
									unset( $actions['cancel'] );
								}

								if ( $actions = apply_filters( 'woocommerce_my_account_my_orders_actions', $actions, $order ) ) {
									foreach ( $actions as $key => $action ) {
										echo '<a href="' . esc_url( $action['url'] ) . '" class="btn btn-sm ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>';
									}
								}
								?>
							<?php endif; ?>
                        </td>
					<?php endforeach; ?>
                </tr>
			<?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php } else { ?>
    <div class="woocommerce-Message woocommerce-Message--info woocommerce-info my_account_orders">
        <a class="btn btn-sm mr-4"
           href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
			<?php esc_html_e( 'Go Shop', 'evolve' ) ?>
        </a>
		<?php esc_html_e( 'No order has been made yet.', 'evolve' ); ?>
    </div>
<?php } ?>

	</div></div><!-- #account-orders -->

<?php }

add_action( 'woocommerce_account_downloads', 'evolve_woocommerce_before_account_downloads' );

function evolve_woocommerce_before_account_downloads( $args ) {

	echo '<div class="tab-pane fade" id="account-downloads" role="tabpanel" aria-labelledby="account-downloads-tab"><div class="border p-4">';

	if ( $downloads = WC()->customer->get_downloadable_products() ) :

		do_action( 'woocommerce_before_available_downloads' );
		?>

        <h4><?php echo apply_filters( 'woocommerce_my_account_my_downloads_title', __( 'Available downloads', 'evolve' ) ); ?></h4>

		<?php foreach ( $downloads as $download ) : ?>

		<?php
		do_action( 'woocommerce_available_download_start', $download );

		echo '<p class="mt-4 mb-0">';

		echo apply_filters( 'woocommerce_available_download_link', '<a class="btn" href="' . esc_url( $download['download_url'] ) . '">' . evolve_get_svg( 'download' ) . $download['download_name'] . '</a>', $download );

		if ( is_numeric( $download['downloads_remaining'] ) ) {
			$downloads_remaining = $download['downloads_remaining'];
			echo apply_filters( 'woocommerce_available_download_count', '<span class="ml-4"><strong>' . sprintf( _n( '%s download remaining', '%s downloads remaining', $downloads_remaining, 'evolve' ), $download['downloads_remaining'] ) . '</strong></span> ', $download );
		}

		echo '</p>';

		do_action( 'woocommerce_available_download_end', $download );
		?>

	<?php endforeach; ?>

		<?php
		do_action( 'woocommerce_after_available_downloads' );
	else :
		?>

        <a class="woocommerce-Button btn btn-sm mr-4"
           href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
			<?php esc_html_e( 'Go Shop', 'evolve' ) ?>
        </a>

		<?php esc_html_e( 'No downloads available yet.', 'evolve' );

	endif;

	echo '</div></div>';

}

add_action( 'woocommerce_account_address', 'evolve_woocommerce_before_my_account' );

function evolve_woocommerce_before_my_account( $args ) {
	$address_session = '';
	if ( isset( $_SESSION['formvalue'] ) ) {
		$address_session = 'style="display:block"';
	}
	?>

    <div class="tab-pane fade" id="account-address" role="tabpanel" aria-labelledby="account-address-tab">
        <div class="border p-4" <?php echo $address_session; ?>>
            <h4 <?php echo $address_session; ?>><?php _e( 'My address', 'evolve' ); ?></h4>

			<?php
			$customer_id = get_current_user_id();

			if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) {
				$get_addresses = apply_filters( 'woocommerce_my_account_get_addresses', array(
					'billing'  => __( 'Billing address', 'evolve' ),
					'shipping' => __( 'Shipping address', 'evolve' )
				), $customer_id );
				$col           = '2';
			} else {
				$get_addresses = apply_filters( 'woocommerce_my_account_get_addresses', array(
					'billing' => __( 'Billing address', 'evolve' )
				), $customer_id );
				$col           = '1';
			} ?>

            <p class="mb-0">
				<?php echo apply_filters( 'woocommerce_my_account_my_address_description', __( 'The following addresses will be used on the checkout page by default.', 'evolve' ) ); ?>
            </p>

            <div class="row">

				<?php foreach (
					$get_addresses

					as $name => $title
				) : ?>

                    <div class="col<?php echo ( $col == '1' ) ? '' : '-lg-6'; ?>">
                        <div class="bg-white p-4 mt-4">
                            <div class="mb-3">
                                <h5 class="d-inline"><?php echo $title; ?></h5>
                                <a href="#" data-name="<?php echo $name; ?>" id="editaddress_<?php echo $name; ?>"
                                   class="edit woo_editaddress btn btn-sm ml-4 d-inline"><?php esc_html_e( 'Edit', 'evolve' ); ?></a>
                            </div>
                            <address>
								<?php
								$address = apply_filters( 'woocommerce_my_account_my_address_formatted_address', array(
									'first_name' => get_user_meta( $customer_id, $name . '_first_name', true ),
									'last_name'  => get_user_meta( $customer_id, $name . '_last_name', true ),
									'company'    => get_user_meta( $customer_id, $name . '_company', true ),
									'address_1'  => get_user_meta( $customer_id, $name . '_address_1', true ),
									'address_2'  => get_user_meta( $customer_id, $name . '_address_2', true ),
									'city'       => get_user_meta( $customer_id, $name . '_city', true ),
									'state'      => get_user_meta( $customer_id, $name . '_state', true ),
									'postcode'   => get_user_meta( $customer_id, $name . '_postcode', true ),
									'country'    => get_user_meta( $customer_id, $name . '_country', true )
								), $customer_id, $name );

								$formatted_address = WC()->countries->get_formatted_address( $address );

								if ( ! $formatted_address ) {
									_e( 'You have not set up this type of address yet', 'evolve' );
								} else {
									echo $formatted_address;
								}
								?>
                            </address>
                        </div>
                    </div>

				<?php
				endforeach;

				$load_address = 'billing';
				$current_user = wp_get_current_user();
				$address      = WC()->countries->get_address_fields( get_user_meta( get_current_user_id(), $load_address . '_country', true ), $load_address . '_' );
				// Prepare values
				foreach ( $address as $key => $field ) {
					$value = get_user_meta( get_current_user_id(), $key, true );

					if ( ! $value ) {
						switch ( $key ) {
							case 'billing_email' :
							case 'shipping_email' :
								$value = $current_user->user_email;
								break;
							case 'billing_country' :
							case 'shipping_country' :
								$value = WC()->countries->get_base_country();
								break;
							case 'billing_state' :
							case 'shipping_state' :
								$value = WC()->countries->get_base_state();
								break;
						}
					}

					$address[ $key ]['value'] = apply_filters( 'woocommerce_my_account_edit_address_field_value', $value, $key, $load_address );

					$addressform_session = '';
					if ( isset( $_SESSION['formvalue'] ) && ! empty( $field['required'] ) && isset( $_POST[ $key ] ) ) {
						$addressform_session = 'style=display:block';
					} elseif ( isset( $_SESSION['formvalue'] ) ) {
						$addressform_session = 'style=display:none';
					}
				}
				?>

            </div>
            <h4 class="editaddress_billing mt-4" <?php echo $addressform_session; ?>><?php esc_html_e( 'Billing address', 'evolve' ); ?></h4>
            <div class="editaddress_billing" <?php echo $addressform_session; ?>>
                <form method="post">

					<?php
					foreach ( $address as $key => $field ) :

						woocommerce_form_field( $key, $field, ! empty( $_POST[ $key ] ) ? wc_clean( $_POST[ $key ] ) : $field['value'] );

					endforeach;
					?>

                    <p class="mb-0">
                        <input type="submit" class="btn btn-sm" id="saveaddress" name="save_address"
                               value="<?php esc_html_e( 'Save Address', 'evolve' ); ?>"/>
						<?php wp_nonce_field( 'woocommerce-edit_address' ); ?>
                        <input type="hidden" name="action" value="edit_address"/>
                        <input type="hidden" name="formvalue" value="billing"/>
                    </p>

                </form>
            </div>

			<?php
			$load_address = 'shipping';
			$current_user = wp_get_current_user();
			$address      = WC()->countries->get_address_fields( get_user_meta( get_current_user_id(), $load_address . '_country', true ), $load_address . '_' );
			// Prepare values
			foreach ( $address as $key => $field ) {

				$value = get_user_meta( get_current_user_id(), $key, true );

				if ( ! $value ) {
					switch ( $key ) {
						case 'billing_email' :
						case 'shipping_email' :
							$value = $current_user->user_email;
							break;
						case 'billing_country' :
						case 'shipping_country' :
							$value = WC()->countries->get_base_country();
							break;
						case 'billing_state' :
						case 'shipping_state' :
							$value = WC()->countries->get_base_state();
							break;
					}
				}

				$address[ $key ]['value'] = apply_filters( 'woocommerce_my_account_edit_address_field_value', $value, $key, $load_address );

				$addressform_session = '';
				if ( isset( $_SESSION['formvalue'] ) && ! empty( $field['required'] ) && isset( $_POST[ $key ] ) ) {
					$addressform_session = 'style=display:block';
				} elseif ( isset( $_SESSION['formvalue'] ) ) {
					$addressform_session = 'style=display:none';
				}
			}
			?>
            <h4 class="editaddress_shipping mt-4" <?php echo $addressform_session; ?>><?php esc_html_e( 'Shipping address', 'evolve' ); ?></h4>
            <div class="editaddress_shipping" <?php echo $addressform_session; ?>>
                <form method="post">

					<?php
					foreach ( $address as $key => $field ) :

						woocommerce_form_field( $key, $field, ! empty( $_POST[ $key ] ) ? wc_clean( $_POST[ $key ] ) : $field['value'] );

					endforeach;
					?>

                    <p class="mb-0">
                        <input type="submit" class="btn btn-sm" id="saveaddress" name="save_address"
                               value="<?php esc_html_e( 'Save Address', 'evolve' ); ?>"/>
						<?php wp_nonce_field( 'woocommerce-edit_address' ); ?>
                        <input type="hidden" name="action" value="edit_address"/>
                        <input type="hidden" name="formvalue" value="shipping"/>
                    </p>

                </form>
            </div>
        </div>
    </div>
	<?php
	unset( $_SESSION['formvalue'] );
}

class evolve_WC_Form_Handler extends WC_Form_Handler {

	public static function init() {
		remove_action( 'template_redirect', array( 'WC_Form_Handler', 'save_address' ) );
		add_action( 'template_redirect', array( __CLASS__, 'evolve_save_address' ) );
	}

	public static function evolve_save_address() {
		global $wp;

		$formvalue = '';
		if ( isset( $_POST['formvalue'] ) ) {
			$formvalue             = $_POST['formvalue'];
			$_SESSION['formvalue'] = $_POST['formvalue'];
		}

		if ( isset( $_POST['_wp_http_referer'] ) && strpos( $_POST['_wp_http_referer'], '/shipping' ) !== false ) {
			$formvalue             = 'shipping';
			$_SESSION['formvalue'] = 'shipping';
		} elseif ( isset( $_POST['_wp_http_referer'] ) && strpos( $_POST['_wp_http_referer'], '/billing' ) !== false ) {
			$formvalue             = 'billing';
			$_SESSION['formvalue'] = 'billing';
		}

		if ( 'POST' !== strtoupper( $_SERVER['REQUEST_METHOD'] ) ) {
			return;
		}

		if ( empty( $_POST['action'] ) || 'edit_address' !== $_POST['action'] || empty( $_POST['_wpnonce'] ) || ! wp_verify_nonce( $_POST['_wpnonce'], 'woocommerce-edit_address' ) ) {
			return;
		}

		$user_id = get_current_user_id();

		if ( $user_id <= 0 ) {
			return;
		}

		$load_address = ( $formvalue == 'shipping' ) ? 'shipping' : 'billing';

		$address = WC()->countries->get_address_fields( esc_attr( $_POST[ $load_address . '_country' ] ), $load_address . '_' );

		foreach ( $address as $key => $field ) {
			if ( ! isset( $field['type'] ) ) {
				$field['type'] = 'text';
			}

			// Get Value.
			switch ( $field['type'] ) {
				case 'checkbox' :
					$_POST[ $key ] = isset( $_POST[ $key ] ) ? 1 : 0;
					break;
				default :
					$_POST[ $key ] = isset( $_POST[ $key ] ) ? wc_clean( $_POST[ $key ] ) : '';
					break;
			}

			// Hook to allow modification of value.
			$_POST[ $key ] = apply_filters( 'woocommerce_process_myaccount_field_' . $key, $_POST[ $key ] );

			// Validation: Required fields.
			if ( ! empty( $field['required'] ) && empty( $_POST[ $key ] ) ) {
				wc_add_notice( $field['label'] . ' ' . __( 'is a required field.', 'evolve' ), 'error' );
			}

			if ( ! empty( $_POST[ $key ] ) ) {

				// Validation rules
				if ( ! empty( $field['validate'] ) && is_array( $field['validate'] ) ) {
					foreach ( $field['validate'] as $rule ) {
						switch ( $rule ) {
							case 'postcode' :
								$_POST[ $key ] = strtoupper( str_replace( ' ', '', $_POST[ $key ] ) );

								if ( ! WC_Validation::is_postcode( $_POST[ $key ], $_POST[ $load_address . '_country' ] ) ) {
									wc_add_notice( __( 'Please enter a valid postcode/ZIP.', 'evolve' ), 'error' );
								} else {
									$_POST[ $key ] = wc_format_postcode( $_POST[ $key ], $_POST[ $load_address . '_country' ] );
								}
								break;
							case 'phone' :
								$_POST[ $key ] = wc_format_phone_number( $_POST[ $key ] );

								if ( ! WC_Validation::is_phone( $_POST[ $key ] ) ) {
									wc_add_notice( '<strong>' . $field['label'] . '</strong> ' . __( 'is not a valid phone number.', 'evolve' ), 'error' );
								}
								break;
							case 'email' :
								$_POST[ $key ] = strtolower( $_POST[ $key ] );

								if ( ! is_email( $_POST[ $key ] ) ) {
									wc_add_notice( '<strong>' . $field['label'] . '</strong> ' . __( 'is not a valid email address.', 'evolve' ), 'error' );
								}
								break;
						}
					}
				}
			}
		}

		if ( wc_notice_count( 'error' ) == 0 ) {

			foreach ( $address as $key => $field ) {
				update_user_meta( $user_id, $key, $_POST[ $key ] );
			}

			wc_add_notice( __( 'Address changed successfully.', 'evolve' ) );

			do_action( 'woocommerce_customer_save_address', $user_id, $load_address );

			wp_safe_redirect( wc_get_page_permalink( 'myaccount' ) );
			exit;
		}
	}

}

evolve_WC_Form_Handler::init();

add_action( 'woocommerce_account_editaccount', 'evolve_woocommerce_after_my_account' );

function evolve_woocommerce_after_my_account( $args ) {
	global $woocommerce, $wp;

	$user = wp_get_current_user();
	?>

    <div class="tab-pane fade" id="account-edit" role="tabpanel" aria-labelledby="account-edit-tab">
        <div class="border p-4">
            <h4><?php esc_html_e( 'Edit account', 'evolve' ); ?></h4>

            <form action="" method="post">
                <p>
                    <label for="account_first_name"><?php esc_html_e( 'First name', 'evolve' ); ?> <span
                                class="required">*</span></label>
                    <input type="text" class="form-control" name="account_first_name" id="account_first_name"
                           value="<?php esc_attr( $user->first_name ); ?>"/>
                </p>
                <p>
                    <label for="account_last_name"><?php esc_html_e( 'Last name', 'evolve' ); ?> <span class="required">*</span></label>
                    <input type="text" class="form-control" name="account_last_name" id="account_last_name"
                           value="<?php esc_attr( $user->last_name ); ?>"/>
                </p>
                <p>
                    <label for="account_email"><?php esc_html_e( 'Email address', 'evolve' ); ?> <span class="required">*</span></label>
                    <input type="email" class="form-control" name="account_email" id="account_email"
                           value="<?php esc_attr( $user->user_email ); ?>"/>
                </p>
                <fieldset>
                    <legend><?php esc_html_e( 'Password Change', 'evolve' ); ?></legend>

                    <p>
                        <label for="password_current"><?php esc_html_e( 'Current Password (leave blank to leave unchanged)', 'evolve' ); ?></label>
                        <input type="password" class="form-control" name="password_current" id="password_current"/>
                    </p>
                    <p>
                        <label for="password_1"><?php esc_html_e( 'New Password (leave blank to leave unchanged)', 'evolve' ); ?></label>
                        <input type="password" class="form-control" name="password_1" id="password_1"/>
                    </p>
                    <p>
                        <label for="password_2"><?php esc_html_e( 'Confirm New Password', 'evolve' ); ?></label>
                        <input type="password" class="form-control" name="password_2" id="password_2"/>
                    </p>
                </fieldset>

                <input type="submit" class="btn btn-sm"
                       name="save_account_details"
                       value="<?php esc_html_e( 'Save changes', 'evolve' ); ?>"/>

				<?php wp_nonce_field( 'save_account_details' ); ?>
                <input type="hidden" name="action" value="save_account_details"/>
            </form>

        </div>
    </div>
    </div>

	<?php
}

remove_action( 'woocommerce_view_order', 'woocommerce_order_details_table', 10 );
add_action( 'woocommerce_view_order', 'evolve_woocommerce_view_order', 10 );

function evolve_woocommerce_view_order( $order_id ) {
	global $woocommerce;

	$order              = wc_get_order( $order_id );
	$order_item_product = new WC_Order_Item_Product();
	?>

    <h4 class="mb-4"><?php esc_html_e( 'Order details', 'evolve' ); ?></h4>
    <div class="table-responsive-lg">
        <table class="table shop_table order_details">
            <thead>
            <tr>
                <th colspan="2" class="product-name"><?php esc_html_e( 'Product', 'evolve' ); ?></th>
                <th class="product-quantity"><?php esc_html_e( 'Quantity', 'evolve' ); ?></th>
                <th class="product-total"><?php esc_html_e( 'Total', 'evolve' ); ?></th>
            </tr>
            </thead>
            <tfoot>
			<?php
			if ( $totals = $order->get_order_item_totals() ) {
				foreach ( $totals as $total ) :
					?>
                    <tr>
                        <td colspan="2" class="filler-td">&nbsp;</td>
                        <th scope="row"><?php echo $total['label']; ?></th>
                        <td class="product-total"><?php echo $total['value']; ?></td>
                    </tr>
				<?php
				endforeach;
			}
			?>
            </tfoot>
            <tbody>
			<?php
			if ( sizeof( $order->get_items() ) > 0 ) {

				foreach ( $order->get_items() as $item ) {
					$_product = apply_filters( 'woocommerce_order_item_product', $order->get_product_from_item( $item ), $item );
					$product  = apply_filters( 'woocommerce_order_item_product', $item->get_product(), $item );
					?>
                    <tr class="<?php echo esc_attr( apply_filters( 'woocommerce_order_item_class', 'order_item', $item, $order ) ); ?>">
                        <th scope="row" class="product-name">

							<?php
							$cart_item     = '';
							$cart_item_key = '';
							$thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

							if ( ! $_product->is_visible() ) {
								echo $thumbnail;
							} else {
								printf( '<a class="product-thumbnail" href="%s">%s</a>', $_product->get_permalink(), $thumbnail );
							}
							?>

                        </th>
                        <td class="product-name-link">

							<?php
							if ( $_product && ! $_product->is_visible() ) {
								echo apply_filters( 'woocommerce_order_item_name', $item['name'], $item );
							} else {
								echo apply_filters( 'woocommerce_order_item_name', sprintf( '<a href="%s">%s</a>', get_permalink( $item['product_id'] ), $item['name'] ), $item );
							}

							wc_display_item_meta( $item );

							if ( $_product && $_product->exists() && $_product->is_downloadable() && $order->is_download_permitted() ) {

								$download_files = $order_item_product->get_item_downloads();
								$i              = 0;
								$links          = array();

								foreach ( $download_files as $download_id => $file ) {
									$i ++;

									$links[] = '<small><a href="' . esc_url( $file['download_url'] ) . '">' . sprintf( __( 'Download file%s', 'evolve' ), ( count( $download_files ) > 1 ? ' ' . $i . ': ' : ': ' ) ) . esc_html( $file['name'] ) . '</a></small>';
								}

								echo '<br/>' . implode( '<br/>', $links );
							}
							?>

                        </td>
                        <td class="product-quantity">

							<?php echo apply_filters( 'woocommerce_order_item_quantity_html', $item['qty'], $item ); ?>

                        </td>
                        <td class="product-total">

							<?php echo $order->get_formatted_line_subtotal( $item ); ?>

                        </td>
                    </tr>

					<?php
					$show_purchase_note = $order->has_status( apply_filters( 'woocommerce_purchase_note_order_statuses', array(
						'completed',
						'processing'
					) ) );
					$purchase_note      = $product ? $product->get_purchase_note() : '';
					if ( $show_purchase_note && $purchase_note ) {
						?>

                        <tr class="product-purchase-note">
                            <td colspan="3"><?php echo wpautop( do_shortcode( wp_kses_post( $purchase_note ) ) ); ?></td>
                        </tr>

						<?php
					}
				}
			}

			do_action( 'woocommerce_order_items_table', $order );
			?>

            </tbody>
        </table>
    </div>

	<?php do_action( 'woocommerce_order_details_after_order_table', $order ); ?>

    <div class="row">

	<?php if ( get_option( 'woocommerce_calc_shipping' ) !== 'no' ) : ?>

    <div class="col-lg-4 mt-4">

	<?php else : ?>

    <div class="col-md-6 mt-4">

<?php endif; ?>

    <h4 class="mb-4"><?php esc_html_e( 'Customer details', 'evolve' ); ?></h4>

    <dl class="customer_details">

		<?php
		if ( $order->get_customer_note() ) {
			echo '<dt>' . __( 'Note:', 'evolve' ) . '</dt> <dd>' . $order->get_customer_note() . '</dd>';
		}
		if ( $order->get_billing_email() ) {
			echo '<dt>' . __( 'Email:', 'evolve' ) . '</dt> <dd>' . $order->get_billing_email() . '</dd>';
		}
		if ( $order->get_billing_phone() ) {
			echo '<dt>' . __( 'Telephone:', 'evolve' ) . '</dt> <dd>' . $order->get_billing_phone() . '</dd>';
		}

		do_action( 'woocommerce_order_details_after_customer_details', $order );
		?>

    </dl>

    </div>

	<?php if ( get_option( 'woocommerce_calc_shipping' ) !== 'no' ) : ?>

    <div class="col-lg-4 mt-4">

	<?php else : ?>

    <div class="col-md-6 mt-4">

<?php endif; ?>


    <h4 class="mb-4"><?php esc_html_e( 'Billing address', 'evolve' ); ?></h4>

    <address><p>
			<?php
			if ( ! $order->get_formatted_billing_address() ) {
				_e( 'N/A', 'evolve' );
			} else {
				echo $order->get_formatted_billing_address();
			}
			?>
        </p></address>

    </div>

	<?php if ( get_option( 'woocommerce_calc_shipping' ) !== 'no' ) : ?>

        <div class="col-lg-4 mt-4">
            <h4 class="mb-4"><?php esc_html_e( 'Shipping address', 'evolve' ); ?></h4>

            <address><p>
					<?php
					if ( ! $order->get_formatted_shipping_address() ) {
						_e( 'N/A', 'evolve' );
					} else {
						echo $order->get_formatted_shipping_address();
					}
					?>
                </p></address>
        </div>

	<?php endif; ?>

    </div>

	<?php
}

/*
   Remove Double Cart Totals
   ======================================= */

if ( class_exists( 'Woocommerce' ) ) {
	remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cart_totals', 10 ); // Remove Duplicated Cart Totals
	remove_action( 'woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20 ); // Remove Duplicated Checkout Button
}

/*
   Woo Products Shortcode Recode
   ======================================= */

function evolve_woo_product( $atts, $content = null ) {
	global $woocommerce_loop;

	if ( empty( $atts ) ) {
		return;
	}

	$args = array(
		'post_type'      => 'product',
		'posts_per_page' => 1,
		'no_found_rows'  => 1,
		'post_status'    => 'publish',
		'meta_query'     => array(
			array(
				'key'     => '_visibility',
				'value'   => array( 'catalog', 'visible' ),
				'compare' => 'IN'
			)
		),
		'columns'        => 1
	);

	if ( isset( $atts['sku'] ) ) {
		$args['meta_query'][] = array(
			'key'     => '_sku',
			'value'   => $atts['sku'],
			'compare' => '='
		);
	}

	if ( isset( $atts['id'] ) ) {
		$args['p'] = $atts['id'];
	}

	ob_start();

	if ( isset( $columns ) ) {
		$woocommerce_loop['columns'] = $columns;
	}

	$products = new WP_Query( $args );

	if ( $products->have_posts() ) :

		woocommerce_product_loop_start();

		while ( $products->have_posts() ) : $products->the_post();

			woocommerce_get_template_part( 'content', 'product' );

		endwhile; // end of the loop.

		woocommerce_product_loop_end();

	endif;

	wp_reset_postdata();

	return '<div class="woocommerce">' . ob_get_clean() . '</div>';
}

/*
   Function To Print Out CSS Class For Single Product According To Layout
   ======================================= */

function evolve_single_product_class() {
	$layout_css = '';
	switch ( evolve_theme_mod( 'evl_layout', '2cl' ) ):
			case "1c":
			case "2cl":
			case "2cr":
				$layout_css = 'col-md-6';
				break;
			case "3cm":
			case "3cl":
			case "3cr":
				$layout_css = 'col-md-12 mb-4';
				break;
	endswitch;

	echo $layout_css;
}

/*
   WooCommerce Add URL Parameter
   ======================================= */

if ( ! function_exists( 'evolve_addURLParameter' ) ) {
	function evolve_addURLParameter( $url, $paramName, $paramValue ) {
		$url_data = parse_url( $url );
		if ( ! isset( $url_data["query"] ) ) {
			$url_data["query"] = "";
		}
		$params = array();
		parse_str( $url_data['query'], $params );
		$params[ $paramName ] = $paramValue;
		if ( $paramName == 'product_count' ) {
			$params['paged'] = '1';
		}
		$url_data['query'] = http_build_query( $params );

		return evolve_build_url( $url_data );
	}
}

function evolve_build_url( $url_data ) {
	$url = "";
	if ( isset( $url_data['host'] ) ) {
		$url .= $url_data['scheme'] . '://';
		if ( isset( $url_data['user'] ) ) {
			$url .= $url_data['user'];
			if ( isset( $url_data['pass'] ) ) {
				$url .= ':' . $url_data['pass'];
			}
			$url .= '@';
		}
		$url .= $url_data['host'];
		if ( isset( $url_data['port'] ) ) {
			$url .= ':' . $url_data['port'];
		}
	}
	if ( isset( $url_data['path'] ) ) {
		$url .= $url_data['path'];
	}
	if ( isset( $url_data['query'] ) ) {
		$url .= '?' . $url_data['query'];
	}
	if ( isset( $url_data['fragment'] ) ) {
		$url .= '#' . $url_data['fragment'];
	}

	return $url;
}

/*
   WooCommerce My Account / Cart Menu
   ======================================= */

if ( !function_exists( 'evolve_woocommerce_menu' ) ) {
function evolve_woocommerce_menu() {
if ( evolve_theme_mod( 'evl_woocommerce_acc_link_main_nav', 0 ) == "0" && evolve_theme_mod( 'evl_woocommerce_cart_link_main_nav', 0 ) == "0" ) {
	return;
	}

    global $woocommerce; ?>

                <nav class="navbar navbar-expand-md woocommerce float-md-right">

                    <div class="navbar-toggler woocommerce-toggler" data-toggle="collapse"
                         data-target="#woocommerce-menu"
                         aria-controls="woocommerce-menu" aria-expanded="false" aria-label="<?php _e( "Cart", "evolve" ); ?>">

						<?php if ( evolve_theme_mod( 'evl_woocommerce_cart_link_main_nav', 0 ) ):
							echo evolve_get_svg( 'shop' );
						else :
							echo evolve_get_svg( 'user' );
						endif; ?>

                    </div>

                    <div id="woocommerce-menu" class="collapse navbar-collapse" data-hover="dropdown"
                         data-animations="fadeInUp fadeIn fadeIn fadeIn">

                        <ul class="navbar-nav woocommerce-menu">

							<?php if ( evolve_theme_mod( 'evl_woocommerce_acc_link_main_nav', 0 ) ): ?>

                                <li class="nav-item dropdown my-account ml-md-auto">
                                    <a href="<?php echo get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ); ?>"
                                       class="nav-link dropdown-toggle" id="myaccount_dropdown" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<?php echo evolve_get_svg( 'user' ); ?><?php esc_html_e( 'My Account', 'evolve' ); ?>
                                    </a>

									<?php if ( ! is_user_logged_in() && ! is_account_page() ): ?>

                                        <div class="dropdown-menu p-4 dropdown-menu-right" aria-labelledby="myaccount_dropdown">
                                            <form action="<?php echo wp_login_url(); ?>" name="loginform"
                                                  method="post">

                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="log"
                                                           id="username" value=""
                                                           placeholder="<?php echo esc_html__( 'Username', 'evolve' ); ?>"/>
                                                </div>

                                                <div class="form-group">
                                                    <input type="password" class="form-control" name="pwd"
                                                           id="pasword" value=""
                                                           placeholder="<?php echo esc_html__( 'Password', 'evolve' ); ?>"/>
                                                </div>

                                                <div class="form-group custom-control custom-checkbox">
                                                    <input class="custom-control-input" name="rememberme"
                                                           type="checkbox" id="rememberme" value="forever">
                                                    <label class="custom-control-label"
                                                           for="rememberme"><?php esc_html_e( 'Remember Me', 'evolve' ); ?></label>
                                                </div>

                                                <input type="submit" name="wp-submit" id="wp-submit"
                                                       class="btn btn-sm"
                                                       value="<?php esc_html_e( 'Log In', 'evolve' ); ?>">
                                                <input type="hidden" name="redirect_to"
                                                       value="<?php if ( isset( $_SERVER['HTTP_REFERER'] ) ) {
													       echo $_SERVER['HTTP_REFERER'];
												       } ?>">
                                                <input type="hidden" name="testcookie" value="1">

                                            </form>
                                        </div>

									<?php elseif ( is_user_logged_in() && ! is_account_page() ) : ?>

                                        <div class="dropdown-menu logout dropdown-menu-right" aria-labelledby="myaccount_dropdown">
                                            <a class="dropdown-item"
                                               href="<?php echo wp_logout_url( get_permalink() ); ?>"><?php esc_html_e( 'Logout', 'evolve' ); ?></a>
                                        </div>

									<?php endif; ?>

                                </li><!-- li.my-account -->

							<?php endif;

							if ( evolve_theme_mod( 'evl_woocommerce_cart_link_main_nav', 0 ) ): ?>

                                <li class="nav-item dropdown cart ml-md-auto">

									<?php if ( ! $woocommerce->cart->cart_contents_count ): ?>

                                        <a href="<?php echo get_permalink( get_option( 'woocommerce_cart_page_id' ) ); ?>"
                                           class="nav-link dropdown-toggle" id="cart_dropdown"
                                           role="button"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

											<?php echo evolve_get_svg( 'shop' ); ?><?php esc_html_e( '0 items', 'evolve' ); ?>
                                            - <?php echo wc_price( $woocommerce->cart->cart_contents_total ); ?>

                                        </a>

                                        <div class="dropdown-menu p-md-3 dropdown-menu-right" aria-labelledby="cart_dropdown">
                                            <span class="dropdown-item">

											    <?php esc_html_e( 'Your cart is currently empty', 'evolve' ); ?>

                                            </span>
                                        </div>

									<?php else: ?>

                                        <a href="<?php echo get_permalink( get_option( 'woocommerce_cart_page_id' ) ); ?>"
                                           class="btn px-3 nav-link dropdown-toggle" id="cart_dropdown" role="button"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

											<?php echo evolve_get_svg( 'shop' ); ?><?php echo sprintf( _n( '%s item', '%s items', $woocommerce->cart->cart_contents_count, 'evolve' ), $woocommerce->cart->cart_contents_count ); ?>
                                            - <?php echo wc_price( $woocommerce->cart->cart_contents_total ); ?>

                                        </a>

                                        <div class="dropdown-menu p-3 dropdown-menu-right" aria-labelledby="cart_dropdown">

											<?php foreach ( $woocommerce->cart->cart_contents as $cart_item ): //var_dump($cart_item);
												$cart_item_key = $cart_item['key'];
												$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key ); ?>

                                                <div class="media">

                                                    <a href="<?php echo get_permalink( $cart_item['product_id'] ); ?>"><?php $evolve_thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image( array(
															80,
															80
														) ), $cart_item, $cart_item_key );
														echo $evolve_thumbnail; ?></a>

                                                    <div class="media-body ml-3">
                                                        <h6><?php echo $cart_item['data']->get_name(); ?></h6>
                                                        <p>
                                                            <a class="dropdown-item"
                                                               href="<?php echo get_permalink( $cart_item['product_id'] ); ?>"><?php echo $cart_item['quantity']; ?>
                                                                x <?php echo $woocommerce->cart->get_product_subtotal( $cart_item['data'], $cart_item['quantity'] ); ?></a>
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="dropdown-divider"></div>

											<?php endforeach; ?>

                                            <div class="row">
                                                <div class="col text-center">
                                                    <a href="<?php echo get_permalink( get_option( 'woocommerce_cart_page_id' ) ); ?>"><?php echo evolve_get_svg( 'shop' ); esc_html_e( 'View Cart', 'evolve' ); ?></a>
                                                </div>
                                                <div class="col text-center">
                                                    <a href="<?php echo get_permalink( get_option( 'woocommerce_checkout_page_id' ) ); ?>"><?php echo evolve_get_svg( 'ok' ); esc_html_e( 'Checkout', 'evolve' ); ?></a>
                                                </div>
                                            </div>

                                        </div><!-- .cart-contents -->

									<?php endif; ?>

                                </li><!-- li.cart -->

							<?php endif; ?>

                        </ul><!-- ul.woocommerce-menu -->
                    </div>
                </nav><!-- .navbar -->

 <?php }
}