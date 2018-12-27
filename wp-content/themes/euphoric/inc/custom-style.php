<?php
/**
 * Display Inline
 *
 * @link https://codex.wordpress.org/Function_Reference/wp_add_inline_style
 *
 * wp_add_inline_style
 * @package euphoric
 */

function euphoric_styles_method() {
	$header_image_padding = get_theme_mod('header_image_padding','100');
	$disable_banner_text = get_theme_mod ('disable_banner_text',0);
	$custom_css='';

		if ( $header_image_padding !='100' ) { 
			$custom_css .= '
				.has-header-image .top-header-bg {
				padding: '.absint($header_image_padding).'px 0;
				}';
		}

		if ($disable_banner_text !=0) {
			$custom_css .= '
				.slide-content {
				display: none;
				}';
		}

	wp_add_inline_style( 'euphoric-style', wp_strip_all_tags($custom_css) );
}
add_action( 'wp_enqueue_scripts', 'euphoric_styles_method', 10 );

//Color Schemes
function euphoric_color_schemes(){
	$color_schemes = get_theme_mod ('color-schemes','#83c5c7');

	if($color_schemes =='#83c5c7'){
		return;
	}

	$custom_css ='
	/* link and Button ________________________ */
	a,
	.main-navigation ul li:hover > a, 
	.main-navigation ul li.current-menu-item > a, 
	.main-navigation ul li.current_page_item > a, 
	.main-navigation ul li.current-menu-ancestor > a,
	.entry-header .entry-meta,
	.post .entry-content .more-link:after,
	.page .entry-content .more-link:after,
	.posts-navigation .nav-links .nav-previous,
	.posts-navigation .nav-links .nav-previous a,
	.posts-navigation .nav-links .nav-next,
	.posts-navigation .nav-links .nav-next a,
	.post-navigation .nav-links .nav-previous,
	.post-navigation .nav-links .nav-previous a,
	.post-navigation .nav-links .nav-next,
	.post-navigation .nav-links .nav-next a,
	.pagination .nav-links .page-numbers.current,
	.pagination .nav-links .page-numbers:hover {
		color: %1$s;
	}

	button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"],
	a.more-link,
	.main-navigation ul.sub-menu,
	.main-navigation ul.children,
	.menu-social-links-container ul > li a:before,
	.top-header .social-links-menu li a:hover,
	.entry-footer .entry-meta span:before,
	#bbpress-forums #bbp-search-form #bbp_search_submit {
		background-color: %1$s;
	}

	@media only screen and (max-width: 767px) {
	    .main-navigation ul>li:hover > .dropdown-toggle,
	    .main-navigation ul>li.current-menu-item .dropdown-toggle,
	    .main-navigation ul>li.current-menu-ancestor .dropdown-toggle {
	        background-color: %1$s;
	    }

	    .main-navigation ul li:hover>a,
		.main-navigation ul li.current-menu-item>a,
		.main-navigation ul li.current_page_item>a,
		.main-navigation ul li.current-menu-ancestor>a {
		    color: %1$s;
		}
	}

	.has-header-image .top-panel-toggle,
	.widget_search .search-submit,
	.post-page-search .search-submit,
	.widget_tag_cloud .tagcloud a:hover {
		background-color: %1$s;
		border-color: %1$s;
	}

	#secondary .widget-title {
		border-top-color: %1$s;
	}

	/* Widget Text background ________________________ */
	#secondary.widget-design .widget_text,
	#secondary.sidebar-custom-design.widget-design .widget_text {
		background-color: %1$s;
	}

	/* Category Highlight ________________________ */
	.ch-small .ch-column-inner {
		background-color: %1$s;
	}

	/* Banner ________________________ */
	.slide-content {
		background-color: %1$s;
	}

	.slide-text-content .tag-links {
		color: %1$s;
	}

	/* Woocommerce ________________________ */
	.woocommerce #respond input#submit, 
	.woocommerce a.button, 
	.woocommerce button.button, 
	.woocommerce input.button,
	.woocommerce #respond input#submit.alt, 
	.woocommerce a.button.alt, 
	.woocommerce button.button.alt, 
	.woocommerce input.button.alt,
	.woocommerce span.onsale {
		background-color: %1$s;
	}

	.woocommerce div.product p.price, 
	.woocommerce div.product span.price,
	.woocommerce ul.products li.product .price {
		color: %1$s;
	}';

wp_add_inline_style( 'euphoric-style', sprintf( $custom_css, $color_schemes ) );

}
add_action( 'wp_enqueue_scripts', 'euphoric_color_schemes', 20 );