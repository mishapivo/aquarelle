<?php
/**
* Loads all the components related to customizer 
*
* @since Business Gravity 1.0.0
*/
require get_parent_theme_file_path( '/modules/customizer/framework/customizer.php' );
require get_parent_theme_file_path( '/modules/customizer/panels/panels.php' );
require get_parent_theme_file_path( '/modules/customizer/sections/sections.php' );

require get_parent_theme_file_path( '/modules/customizer/settings/general.php' );
require get_parent_theme_file_path( '/modules/customizer/settings/frontpage.php' );
require get_parent_theme_file_path( '/modules/customizer/defaults/defaults.php' );


function business_gravity_modify_default_settings( $wp_customize ){

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
	$wp_customize->get_control( 'background_color' )->label = esc_html__( 'Background', 'business-gravity' );
}
add_action( 'business_gravity_customize_register', 'business_gravity_modify_default_settings' );

function business_gravity_default_styles(){
	
	$site_title_color         = business_gravity_get_option( 'site_title_color' );
	$site_tagline_color       = business_gravity_get_option( 'site_tagline_color' );
	$primary_color            = business_gravity_get_option( 'site_primary_color' );
	$slider_control           = business_gravity_get_option( 'slider_control' );
	$highlight_section_title  = business_gravity_get_option( 'highlight_section_title' );
	$callback_bg              = business_gravity_get_callback_banner_url();
	$footer_callback_bg       = business_gravity_get_footer_callback_banner_url();
	
	?>
	<style type="text/css">
		.offcanvas-menu-open .kt-offcanvas-overlay {
		    position: fixed;
		    width: 100%;
		    height: 100%;
		    background: rgba(0, 0, 0, 0.7);
		    opacity: 1;
		    z-index: 99991;
		    top: 0px;
		}
		.kt-offcanvas-overlay {
		    width: 0;
		    height: 0;
		    opacity: 0;
		    transition: opacity 0.5s;
		}
		.masonry-grid.wrap-post-list {
			width: 100% !important;
		}

		<?php if( business_gravity_get_option( 'disable_header_button' ) ):?>
			header:not(.site-header-two) #header-bottom-right-outer .callback-button {
				display: none;
			}
		<?php endif; ?>

		<?php if( $header_two ): ?>
			.top-header {
				display: none !important;
			}
		<?php endif; ?>

		<?php if( !$slider_control ): ?>
			.block-slider .controls, .block-slider .owl-pager {
				opacity: 0;
			}
		<?php endif; ?>
		.block-callback {
		   background-image: url(<?php echo esc_url( $callback_bg ); ?> );
		}
		.block-footer-callback {
		   background-image: url(<?php echo esc_url( $footer_callback_bg ); ?> );
		}

		/*======================================*/
		/* Site title */
		/*======================================*/
		.site-header .site-branding .site-title,
		.site-header .site-branding .site-title a,
		.wrap-fixed-header .site-branding .site-title a {
			color: <?php echo esc_attr( $site_title_color ); ?>;
		}

		/*======================================*/
		/* Tagline title */
		/*======================================*/
		.site-header:not(.site-header-four) .site-branding .site-description {
			color: <?php echo esc_attr( $site_tagline_color ); ?>;
		}

		/*======================================*/
		/* Primary color */
		/*======================================*/

		/*======================================*/
		/* Background Primary color */
		/*======================================*/

		::-webkit-selection {
			  background-color: <?php echo esc_attr( $primary_color ); ?>
			}

			::-moz-selection {
			  background-color: <?php echo esc_attr( $primary_color ); ?>
			}

			::-ms-selection {
			  background-color: <?php echo esc_attr( $primary_color ); ?>
			}

			::-o-selection {
			  background-color: <?php echo esc_attr( $primary_color ); ?>
			}

			::selection {
			  background-color: <?php echo esc_attr( $primary_color ); ?>
			}
			.wrap-detail-page form input[type=submit],
			.wrap-detail-page .wpcf7 input[type=submit],
			.wrap-detail-page .kt-contact-form-area .form-group input.form-control[type=submit],
			input[type=button], input[type=reset], input[type=submit], .default-button, .button-primary,
			.button-primary:hover, .button-primary:focus, .button-primary:active,
			.section-title:before, .page-numbers.current,
			.page-numbers:hover.current, .page-numbers:focus.current, .page-numbers:active.current,
			.widget.widget_mc4wp_form_widget input[type=submit],
			.woocommerce ul.products li.product .onsale,
			.woocommerce ul.products li.product .button,
			.woocommerce ul.products li.product a.added_to_cart,
			body.single article.hentry .post-text a.wp-block-button__link, .page article.hentry .post-text a.wp-block-button__link, #blog-post article.hentry .post-text a.wp-block-button__link, .search article.hentry .post-text a.wp-block-button__link, .archive article.hentry .post-text a.wp-block-button__link, .tag article.hentry .post-text a.wp-block-button__link, .category article.hentry .post-text a.wp-block-button__link,
			article.hentry #ak-blog-post .post-text a.wp-block-button__link,
			body.single article.hentry .post-text .page-links > .page-number, .page article.hentry .post-text .page-links > .page-number, #blog-post article.hentry .post-text .page-links > .page-number, .search article.hentry .post-text .page-links > .page-number, .archive article.hentry .post-text .page-links > .page-number, .tag article.hentry .post-text .page-links > .page-number, .category article.hentry .post-text .page-links > .page-number,
			article.hentry #ak-blog-post .post-text .page-links > .page-number,
			article.hentry.sticky .post-thumb:before,
			article.hentry.sticky .post-format-outer > span a,
			body.single .post-footer span.cat-links:before,
			.comments-area .comment-respond .comment-form .submit,
			.searchform .search-button,
			#go-top span:hover, #go-top span:focus, #go-top span:active,
			.widget.widget_calendar tbody a,
			.top-header-right .search-icon,
			.top-header-right .cart-icon a .count,
			.header-bottom-right .header-search-wrap .search-icon,
			.meta .meta-date,
			.contact-form-section input[type=submit],
			.kt-contact-form-area .form-group input.form-control[type=submit],
			.comments-area .comment-list .reply a,
			.block-footer-callback .mc4wp-form input[type=submit],
			.block-portfolio.block-grid .gallery-content .post-content-inner .icon-area,
			table thead tr {
				background-color: <?php echo esc_attr( $primary_color ); ?>
			}

		/*======================================*/
		/* Primary border color */
		/*======================================*/
		.wrap-detail-page .wpcf7 input[type=submit],
		.wrap-detail-page .kt-contact-form-area .form-group input.form-control[type=submit],
		.button-primary,
		.page-numbers.current,
		.page-numbers:hover.current, .page-numbers:focus.current, .page-numbers:active.current,
		.woocommerce ul.products li.product .button,
		.woocommerce ul.products li.product a.added_to_cart,
		body.single article.hentry .post-text .page-links > .page-number, .page article.hentry .post-text .page-links > .page-number, #blog-post article.hentry .post-text .page-links > .page-number, .search article.hentry .post-text .page-links > .page-number, .archive article.hentry .post-text .page-links > .page-number, .tag article.hentry .post-text .page-links > .page-number, .category article.hentry .post-text .page-links > .page-number,
		article.hentry #ak-blog-post .post-text .page-links > .page-number,
		.comments-area .comment-respond .comment-form .submit,
		.searchform .search-button,
		#go-top span:hover, #go-top span:focus, #go-top span:active,
		body.fixed-nav-active .main-navigation .nav > ul > li.current-menu-item,
		.main-navigation ul ul,
		.main-navigation ul.primary-menu > .current_page_item,
		.main-navigation ul.primary-menu > .current-menu-item,
		.contact-form-section input[type=submit],
		.kt-contact-form-area .form-group input.form-control[type=submit] {
			border-color: <?php echo esc_attr( $primary_color ); ?>
		}

		/*======================================*/
		/* Primary text color */
		/*======================================*/
		a,
		.woocommerce ul.products li.product .price .amount,
		.woocommerce ul.products li.product .price ins .amount,
		body.single article.hentry .post-text a, .page article.hentry .post-text a, #blog-post article.hentry .post-text a, .search article.hentry .post-text a, .archive article.hentry .post-text a, .tag article.hentry .post-text a, .category article.hentry .post-text a,
		article.hentry #ak-blog-post .post-text a,
		.comments-area .comment-respond .logged-in-as a,
		article.post-content .post-title .cat,
		.widget.widget_calendar tfoot a,
		.widget.widget_rss li a,
		.header-bottom-right .callback-button a:hover span, .header-bottom-right .callback-button a:focus span, .header-bottom-right .callback-button a:active span,
		.main-navigation li.current-menu-parent .current-menu-item > a,
		.main-navigation .page_item_has_children.current-menu-item,
		.main-navigation .menu-item-has-children.current-menu-item,
		.offcanvas-navigation li.current_page_item > a, .offcanvas-navigation li.current-menu-item > a, .offcanvas-navigation li.current_page_ancestor > a, .offcanvas-navigation li.current-menu-ancestor > a,
		.icon-block-outer .icon-outer span {
		  color: <?php echo esc_attr( $primary_color ); ?>
		}

	</style>
	<?php
}
add_action( 'wp_head', 'business_gravity_default_styles' );

/**
* Load customizer preview js file
*/
function business_gravity_customize_preview_js() {
	wp_enqueue_script( 'business-gravity-customize-preview', get_theme_file_uri( '/assets/js/customizer/customize-preview.js' ), array( 'jquery', 'customize-preview'), '1.0', true );
}
add_action( 'customize_preview_init', 'business_gravity_customize_preview_js' );