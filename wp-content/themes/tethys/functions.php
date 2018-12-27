<?php

function tethys_comments_reply() {
	if( get_option( 'thread_comments' ) )  {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'comment_form_before', 'tethys_comments_reply' );

function tethys_remove_caption_extra_width($width) {
   return $width - 10;
}
add_filter('img_caption_shortcode_width', 'tethys_remove_caption_extra_width');

/*  Content Width Start  */

function tethys_content_width() {

	$content_width = 900;
	$GLOBALS['content_width'] = apply_filters( 'tethys_content_width', $content_width );
}
add_action( 'after_setup_theme', 'tethys_content_width', 0 );

/*  Content Width End  */

/*  Pingback Start  */

function tethys_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'tethys_pingback_header' );

/*  Pingback End  */

/*  Navigation Markup Template Start  */

add_filter('navigation_markup_template', 'tethys_navigation_template', 10, 2 );
			function tethys_navigation_template( $template, $class ){
			return '
			<div class="space-archive-navigation box-100 relative">
				<nav class="navigation %1$s">
					<div class="nav-links">%3$s</div>
				</nav>
			</div>
			';
}

/*  Navigation Markup Template End  */

/*  Menus, Languages and Thumbnails Start  */

function tethys_setup() {
	
	load_theme_textdomain( 'tethys', get_template_directory() . '/languages' );
	
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'tethys-custom-logo', 9999, 35);
	add_image_size( 'tethys-loop-img', 450, 253, true );
	add_image_size( 'tethys-single-img-1', 900, 506, true );
	add_image_size( 'tethys-single-img-1-full-width', 1200, 675, true );
	add_image_size( 'tethys-single-img-vertical', 450, 800, true );
	add_image_size( 'tethys-small-img-vertical', 450, 600, true );
	add_image_size( 'tethys-small-img', 113, 100, true );
	add_image_size( 'tethys-small-img-2', 128, 113, true );
	add_image_size( 'tethys-mega-menu-img', 210, 118, true );
	add_image_size( 'tethys-medium-img', 738, 414, true );

	add_theme_support( 'gutenberg', array( 'wide-images' => true ));
	
	register_nav_menus( array(
		'main-menu'   => esc_html__( 'Main Menu', 'tethys' ),
		'footer-menu'   => esc_html__( 'Footer Menu', 'tethys' ),
	) );

	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-formats',
		array(
			'image',
			'video',
			'gallery',
		)
	);
	
}
add_action( 'after_setup_theme', 'tethys_setup' );

/*  Menus, Languages and Thumbnails End  */

/*  Widgets Setup Start  */

function tethys_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'tethys' ),
		'id'            => 'right-sidebar',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'tethys' ),
		'before_widget' => '<div id="%1$s" class="space-widget space-default-widget relative widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="space-widget-title relative">
					<div class="space-widget-title-line relative"></div>
					<span>',
		'after_title'   => '</span>
				</div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Homepage Central Column', 'tethys' ),
		'id'            => 'homepage-central-column',
		'description'   => esc_html__( 'For widgets in the center column.', 'tethys' ),
		'before_widget' => '<div id="%1$s" class="space-widget space-default-widget relative widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="space-widget-title relative">
					<div class="space-widget-title-line relative"></div>
					<span>',
		'after_title'   => '</span>
				</div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Homepage Left Column', 'tethys' ),
		'id'            => 'homepage-left-column',
		'description'   => esc_html__( 'For widgets in the left column.', 'tethys' ),
		'before_widget' => '<div id="%1$s" class="space-widget space-default-widget relative widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="space-widget-title relative">
					<div class="space-widget-title-line relative"></div>
					<span>',
		'after_title'   => '</span>
				</div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Homepage Right Column', 'tethys' ),
		'id'            => 'homepage-right-column',
		'description'   => esc_html__( 'For widgets in the right column.', 'tethys' ),
		'before_widget' => '<div id="%1$s" class="space-widget space-default-widget relative widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="space-widget-title relative">
					<div class="space-widget-title-line relative"></div>
					<span>',
		'after_title'   => '</span>
				</div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Shop Sidebar', 'tethys' ),
		'id'            => 'shop-sidebar',
		'description'   => esc_html__( 'For widgets on the pages of the shop.', 'tethys' ),
		'before_widget' => '<div id="%1$s" class="space-widget space-default-widget relative widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="space-widget-title relative">
					<div class="space-widget-title-line relative"></div>
					<span>',
		'after_title'   => '</span>
				</div>',
	) );

}
add_action( 'widgets_init', 'tethys_widgets_init' );

function tethys_widgets_mega_menu_init() {
    $location = 'main-menu';
    $css_class = 'has-mega-menu';
    $locations = get_nav_menu_locations();
    if ( isset( $locations[ $location ] ) ) {
        $menu = get_term( $locations[ $location ], 'nav_menu' );
        if ( $items = wp_get_nav_menu_items( $menu->name ) ) {
            foreach ( $items as $item ) {
                if ( in_array( $css_class, $item->classes ) ) {
                    register_sidebar( array(
                        'id'   => 'mega-menu-widget-area-' . $item->ID,
                        'name' => $item->title . ' - Mega Menu',
						'description'   => esc_html__( 'Only for Mega Menu item.', 'tethys' ),
						'before_widget' => '<div id="%1$s" class="%2$s">',
						'after_widget'  => '</div>',
                    ) );
                }
            }
        }
    }
}
add_action( 'widgets_init', 'tethys_widgets_mega_menu_init' );

require_once( get_template_directory() . '/space-themes/mega-menu.php' );

/*  Widgets Setup End  */

/*  Header Style for Single Posts Start */

function tethys_register_header_style() {
    add_meta_box( 'meta-box-id', esc_html__( 'Post template style', 'tethys' ), 'tethys_header_style_callback', 'post', 'side', 'high' );
}
add_action( 'add_meta_boxes', 'tethys_register_header_style' );

function tethys_header_style_callback( $post ) {
	wp_nonce_field( 'header_style_box', 'header_style_nonce' );
    $header_style = get_post_meta( $post->ID, 'header_style', true );
?>
    <?php $selected = ' selected'; ?>
    <select id="header_style" name="header_style" style="width:100%;">
     <option value="1"<?php if ( $header_style == '1') echo esc_html( $selected ); ?>><?php esc_html_e( 'Style 1', 'tethys' ); ?></option>
     <option value="2"<?php if ( $header_style == '2') echo esc_html( $selected ); ?>><?php esc_html_e( 'Style 2 (No Sidebar)', 'tethys' ); ?></option>
     <option value="3"<?php if ( $header_style == '3') echo esc_html( $selected ); ?>><?php esc_html_e( 'Style 3', 'tethys' ); ?></option>
     <option value="4"<?php if ( $header_style == '4') echo esc_html( $selected ); ?>><?php esc_html_e( 'Style 4 (No Sidebar)', 'tethys' ); ?></option>
    </select>
<?php
}

function tethys_header_style_save( $post_id ) {

        if ( ! isset( $_POST['header_style_nonce'] ) ) {
            return $post_id;
        }
 
        $nonce = $_POST['header_style_nonce'];

        if ( ! wp_verify_nonce( $nonce, 'header_style_box' ) ) {
            return $post_id;
        }

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return $post_id;
        }

        if ( 'page' == $_POST['post_type'] ) {
            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return $post_id;
            }
        } else {
            if ( ! current_user_can( 'edit_post', $post_id ) ) {
                return $post_id;
            }
        }

        $header_style_data = sanitize_text_field( $_POST['header_style'] );

        update_post_meta( $post_id, 'header_style', $header_style_data );
}
add_action( 'save_post', 'tethys_header_style_save' );

/*  Header Style for Single Posts End */

/*  Mobile Browser Bar Color Start  */

function tethys_header_bar_color() {
?>
<meta name="theme-color" content="#2c3e50" />
<meta name="msapplication-navbutton-color" content="#2c3e50" /> 
<meta name="apple-mobile-web-app-status-bar-style" content="#2c3e50" />
<?php }

add_action('wp_head', 'tethys_header_bar_color');

/*  Mobile Browser Bar Color End  */

/*  Register Fonts Start  */

function tethys_google_fonts() {
    $font_url = '';

    if ( 'off' !== _x( 'on', 'Google font: on or off', 'tethys' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Barlow Condensed:300,400,500,700|Open Sans:300,400,600,700' ), "//fonts.googleapis.com/css" );
    }

    return $font_url;
}

function tethys_fonts() {
    wp_enqueue_style( 'tethys-fonts', tethys_google_fonts(), array(), '1.0.5' );
}
add_action( 'wp_enqueue_scripts', 'tethys_fonts' );

/*  Register Fonts End  */

/*  Register Scripts & Colors Start  */

function tethys_scripts() {
	
	wp_enqueue_script( 'tethys-global-js', get_theme_file_uri( '/js/scripts.js' ), array( 'jquery' ), '1.0.5', true );

	wp_enqueue_style( 'font-awesome', get_theme_file_uri( '/css/font-awesome.min.css' ), array(), '4.7.0');
	wp_enqueue_style( 'tethys-style', get_stylesheet_uri(), array(), '1.0.5');
	wp_enqueue_style( 'tethys-media', get_theme_file_uri( '/css/media.css' ), array(), '1.0.5');
	
	global $tethys_data; 
			
	// Custom Color
			
	if( !$main_custom_color = get_theme_mod( 'main_color' ) ) {
		$main_custom_color = '#f39c12';
	} else {
		$main_custom_color = get_theme_mod( 'main_color' );
	}
			
	$custom_css = '

	.space-header-menu ul.main-menu li a:hover,
	.space-header-menu ul.main-menu li:hover a,
	.space-header-menu ul.main-menu li ul.sub-menu li a:hover,
	ul li.has-mega-menu .space-mega-menu .space-mega-menu-post .mega-menu-post-title a:hover,
	.space-scoreboard-widget-item-ins:hover .space-scoreboard-widget-item-info-score,
	.space-default-widget a:hover,
	.space-news-widget-1-big-title a:hover,
	.space-news-widget-1-small-item-title a:hover,
	.space-news-widget-2-item-title-ins a:hover,
	.space-news-widget-3-item-meta-title a:hover,
	.space-news-widget-4-item-title a:hover,
	.space-news-widget-4-item-title span.date a,
	.space-news-widget-5-item-img:hover .space-news-widget-5-item-title-ins,
	.space-news-widget-6-item-title-link a:hover,
	.space-news-widget-7-small-item-title span.category a,
	.space-news-widget-8-item-meta span.category,
	.space-news-widget-9-item-title a:hover,
	.space-news-widget-10-item-title a:hover,
	.space-news-widget-10-item-title span.date a,
	.space-archive-loop-item-title-meta-category a,
	.space-archive-loop-item-title-link a:hover,
	.space-archive-loop-items-not-found p a,
	.space-page-content a,
	.space-comments-list-item-date a.comment-reply-link,
	.space-comments-form-box p.comment-notes span.required,
	form.comment-form p.comment-notes span.required,
	.woocommerce ul.products li.product .price,
	.woocommerce div.product p.price,
	.woocommerce div.product span.price,
	.woocommerce form .form-row .required,
	.large-section .woocommerce ul.product_list_widget li span.woocommerce-Price-amount,
	.small-section .woocommerce ul.product_list_widget li span.woocommerce-Price-amount {
		color: ' . esc_attr ($main_custom_color) . ';
	}

	input[type="submit"],
	blockquote:before,
	.space-archive-loop-item-category,
	.space-news-widget-1-category,
	.space-news-widget-3-category,
	.space-news-widget-6-category,
	.space-news-widget-7-big-category,
	.widget_tag_cloud a:hover,
	.space-page-box-featured-category,
	.space-single-page-tags a:hover,
	.space-single-score-category,
	.woocommerce #respond input#submit,
	.woocommerce a.button,
	.woocommerce button.button,
	.woocommerce input.button,
	.woocommerce #respond input#submit.alt,
	.woocommerce a.button.alt,
	.woocommerce button.button.alt,
	.woocommerce input.button.alt,
	form.woocommerce-product-search button[type="submit"],
	nav.pagination a:hover,
	nav.comments-pagination a:hover,
	nav.pagination-post a:hover span.page-number,
	nav.pagination span.current,
	nav.pagination-post span.page-number,
	nav.comments-pagination span.current {
		background-color: ' . esc_attr ($main_custom_color) . ';
	}';

	$custom_css .= esc_attr($tethys_data['custom_css']);

	wp_add_inline_style( 'tethys-style', $custom_css );
	
}
add_action( 'wp_enqueue_scripts', 'tethys_scripts' );

/*  Register Scripts & Colors End  */

/*  Tethys Excerpt Length Start  */

function tethys_excerpt_length( $length ) {
    if ( is_admin() ) {
        return $length;
    }
    return 30;
}
add_filter( 'excerpt_length', 'tethys_excerpt_length');

/*  Tethys Excerpt Length End  */

/*  Space-Themes Functions Start  */

require_once( get_template_directory() . '/space-themes/custom-comments.php' );
require_once( get_template_directory() . '/space-themes/customize.php' );
require_once( get_template_directory() . '/space-themes/woocommerce.php' );

/*  Space-Themes Functions End  */

/*  Tethys Widgets Start */

require_once( get_template_directory() . '/widgets/widget-1.php' );
require_once( get_template_directory() . '/widgets/widget-2.php' );
require_once( get_template_directory() . '/widgets/widget-3.php' );
require_once( get_template_directory() . '/widgets/widget-4.php' );
require_once( get_template_directory() . '/widgets/widget-5.php' );
require_once( get_template_directory() . '/widgets/widget-6.php' );
require_once( get_template_directory() . '/widgets/widget-7.php' );
require_once( get_template_directory() . '/widgets/widget-8.php' );
require_once( get_template_directory() . '/widgets/widget-9.php' );
require_once( get_template_directory() . '/widgets/widget-10.php' );
require_once( get_template_directory() . '/widgets/mega-menu.php' );

/*  Tethys Widgets End */

/*  Tethys Documentation Start */

require_once( get_template_directory() . '/space-themes/documentation.php' );

/*  Tethys Documentation End */