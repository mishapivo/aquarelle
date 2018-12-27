<?php
/**
 * Dynamic css
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( ! function_exists( 'travel_way_dynamic_css' ) ) :

    function travel_way_dynamic_css() {

        global $travel_way_customizer_all_values;

        /*Color options */
        $travel_way_header_height            = esc_attr( $travel_way_customizer_all_values['travel-way-header-height'] );

	    $travel_way_primary_color            = esc_attr( $travel_way_customizer_all_values['travel-way-primary-color'] );
	    $travel_way_link_color               = esc_attr( $travel_way_customizer_all_values['travel-way-link-color'] );
	    $travel_way_link_hover_color         = esc_attr( $travel_way_customizer_all_values['travel-way-link-hover-color'] );
	    
        $travel_way_header_top_bg_color      = esc_attr( $travel_way_customizer_all_values['travel-way-header-top-bg-color'] );
        $travel_way_footer_bg_color          = esc_attr( $travel_way_customizer_all_values['travel-way-footer-bg-color'] );
        $travel_way_footer_bottom_bg_color   = esc_attr( $travel_way_customizer_all_values['travel-way-footer-bottom-bg-color'] );

        /*animation*/
        $travel_way_enable_animation = $travel_way_customizer_all_values['travel-way-enable-animation'];

	    $custom_css = '';

        /*animation*/
        if( 1 == $travel_way_enable_animation ){
            $custom_css .= "
             .init-animate {
                visibility: visible !important;
             }
             ";
        }
        /*background*/
	    $travel_way_header_image_display = esc_attr( $travel_way_customizer_all_values['travel-way-header-image-display'] );
	    if( 'bg-image' == $travel_way_header_image_display || 'hide' == $travel_way_header_image_display ){
		    $bg_image_url ='';
		    if( get_header_image() && 'bg-image' == $travel_way_header_image_display ){
			    $bg_image_url = esc_url( get_header_image() );
		    }
		    $custom_css .= "
              .inner-main-title {
                background-image:url('{$bg_image_url}');
                background-repeat:no-repeat;
                background-size:cover;
                -webkit-background-size:cover;
                background-attachment:fixed;
                background-position: center; 
                height: {$travel_way_header_height}px;
            }";
	    }

        /*color*/
        $custom_css .= "
            .top-header{
                background-color: {$travel_way_header_top_bg_color};
            }";
        $custom_css .= "
            .site-footer{
                background-color: {$travel_way_footer_bg_color};
            }";
        $custom_css .= "
            .copy-right{
                background-color: {$travel_way_footer_bottom_bg_color};
            }";
        $custom_css .= "
	        .site-title:hover,
	        .site-title a:hover,
			 .at-social .socials li a,
			 .primary-color,
			 article.post .entry-header .cat-links a,
			 #travel-way-breadcrumbs a:hover,
			 .woocommerce .star-rating, 
            .woocommerce ul.products li.product .star-rating,
            .woocommerce p.stars a,
            .woocommerce ul.products li.product .price,
            .woocommerce ul.products li.product .price ins .amount,
            .woocommerce a.button.add_to_cart_button:hover,
            .woocommerce a.added_to_cart:hover,
            .woocommerce a.button.product_type_grouped:hover,
            .woocommerce a.button.product_type_external:hover,
            .woocommerce .cart .button:hover,
            .woocommerce .cart input.button:hover,
            .woocommerce #respond input#submit.alt:hover,
			.woocommerce a.button.alt:hover,
			.woocommerce button.button.alt:hover,
			.woocommerce input.button.alt:hover,
			.woocommerce .woocommerce-info .button:hover,
			.woocommerce .widget_shopping_cart_content .buttons a.button:hover,
			.woocommerce div.product .woocommerce-tabs ul.tabs li a,
			.woocommerce-message::before,
			i.slick-arrow:hover,
			.acme-contact .contact-page-content ul li strong,
            .main-navigation .acme-normal-page .current_page_item a,
            .main-navigation .acme-normal-page .current-menu-item a,
            .main-navigation .active a,
            .main-navigation .navbar-nav >li a:hover,
            .main-navigation li li a:hover,
            .acme-contact .contact-page-content ul li strong{
                color: {$travel_way_primary_color};
            }";

        /*background color*/
        $custom_css .= "
            .navbar .navbar-toggle:hover,
            .main-navigation .current_page_ancestor > a:before,
            .comment-form .form-submit input,
            .btn-primary,
            .wpcf7-form input.wpcf7-submit,
            .wpcf7-form input.wpcf7-submit:hover,
            .sm-up-container,
            .btn-primary.btn-reverse:before,
            #at-shortcode-bootstrap-modal .modal-header,
            article.post .entry-header .cat-links a,
            .primary-bg,
			.navigation.pagination .nav-links .page-numbers.current,
			.navigation.pagination .nav-links a.page-numbers:hover,
            .woocommerce .product .onsale,
			.woocommerce span.onsale,
			.woocommerce a.button.add_to_cart_button,
			.woocommerce a.added_to_cart,
            .woocommerce a.button.product_type_grouped,
			.woocommerce a.button.product_type_grouped,
			.woocommerce a.button.product_type_external,
			.woocommerce .single-product #respond input#submit.alt,
			.woocommerce .single-product a.button.alt,
			.woocommerce .single-product button.button.alt,
			.woocommerce .single-product input.button.alt,
			.woocommerce #respond input#submit.alt,
			.woocommerce a.button.alt,
			.woocommerce button.button.alt,
			.woocommerce input.button.alt,
			.woocommerce .widget_shopping_cart_content .buttons a.button,
			.woocommerce div.product .woocommerce-tabs ul.tabs li:hover,
			.woocommerce div.product .woocommerce-tabs ul.tabs li.active,
			.woocommerce .cart .button,
			.woocommerce .cart input.button,
			.woocommerce input.button:disabled, 
			.woocommerce input.button:disabled[disabled],
			.woocommerce input.button:disabled:hover, 
			.woocommerce input.button:disabled[disabled]:hover,
			 .woocommerce nav.woocommerce-pagination ul li a:focus, 
			 .woocommerce nav.woocommerce-pagination ul li a:hover, 
			 .woocommerce nav.woocommerce-pagination ul li span.current,
			 .woocommerce a.button.wc-forward,
			 .woocommerce .widget_price_filter .ui-slider .ui-slider-range,
			 .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
			 .navbar .cart-wrap .acme-cart-views a span,
             .woocommerce-MyAccount-navigation ul > li> a:hover,
             .woocommerce-MyAccount-navigation ul > li.is-active > a,
              .woocommerce a.button.alt.disabled, 
              .woocommerce a.button.alt.disabled:hover, 
              .woocommerce a.button.alt:disabled, 
              .woocommerce a.button.alt:disabled:hover, 
              .woocommerce a.button.alt:disabled[disabled], 
              .woocommerce a.button.alt:disabled[disabled]:hover, 
              .woocommerce button.button.alt.disabled{
                background-color: {$travel_way_primary_color};
                color:#fff;
                border:1px solid {$travel_way_primary_color};
            }";

        /*borders*/
	    $custom_css .= "
            .woocommerce .cart .button, 
            .woocommerce .cart input.button,
            .woocommerce a.button.add_to_cart_button,
            .woocommerce a.added_to_cart,
            .woocommerce a.button.product_type_grouped,
            .woocommerce a.button.product_type_external,
            .woocommerce .cart .button,
            .woocommerce .single-product #respond input#submit.alt,
			.woocommerce .single-product a.button.alt,
			.woocommerce .single-product button.button.alt,
			.woocommerce .single-product input.button.alt,
			.woocommerce #respond input#submit.alt,
			.woocommerce a.button.alt,
			.woocommerce button.button.alt,
			.woocommerce input.button.alt,
			.woocommerce .widget_shopping_cart_content .buttons a.button,
			.woocommerce div.product .woocommerce-tabs ul.tabs:before{
                border: 1px solid {$travel_way_primary_color};
            }";
        $custom_css .= "
            .blog article.sticky{
                border-bottom: 2px solid {$travel_way_primary_color};
            }";

	    /*Colors options*/
	    $custom_css .= "
        a,
        .posted-on a,
        .single-item .fa,
        .author.vcard a,
        .cat-links a,
        .comments-link a,
        .edit-link a,
        .tags-links a,
        .byline a,
        .nav-links a,
        .widget li a,
        .entry-meta i.fa, 
        .entry-footer i.fa{
            color: {$travel_way_link_color};
        }";
	    $custom_css .= "
        a:hover,
        a:active,
        a:focus,
        .posted-on a:hover,
        .single-item .fa:hover,
        .author.vcard a:hover,
        .cat-links a:hover,
        .comments-link a:hover,
        .edit-link a:hover,
        .tags-links a:hover,
        .byline a:hover,
        .nav-links a:hover,
        .widget li a:hover{
            color: {$travel_way_link_hover_color};
        }";

       /*custom added*/
        /*button reverse*/
        $custom_css .= "
       .btn-reverse{
            color: {$travel_way_primary_color};
        }";

        $custom_css .= "
       .btn-reverse:hover,
       .image-slider-wrapper .slider-content .btn-reverse:hover,
       .at-widgets.at-parallax .btn-reverse:hover{
            background: {$travel_way_primary_color};
            color:#fff;
            border-color:{$travel_way_primary_color};
        }";
        
        $custom_css .= "        
       .woocommerce #respond input#submit, 
       .woocommerce a.button, 
       .woocommerce button.button, 
       .woocommerce input.button{
            background: {$travel_way_primary_color};
            color:#fff;
        }";

        /*secondary color*/
	    $custom_css .= "
       .team-img-box:before{
            -webkit-box-shadow: 0 -106px 92px -35px {$travel_way_header_top_bg_color} inset;
			box-shadow: 0 -106px 92px -35px {$travel_way_header_top_bg_color} inset;
        }";

        $custom_css .= "
        article.post .entry-header .cat-links a:after{
            background: {$travel_way_primary_color};
        }";

        $custom_css .= "
        .contact-form div.wpforms-container-full .wpforms-form input[type='submit'], 
        .contact-form div.wpforms-container-full .wpforms-form button[type='submit'], 
        .contact-form div.wpforms-container-full .wpforms-form .wpforms-page-button{
			background-color: {$travel_way_primary_color};
            color:#fff;
            border:1px solid {$travel_way_primary_color};
        }";

        //widget title circle
        $custom_css .= "
        .at-widget-title-wrapper:after{
            background-color: {$travel_way_link_color};
            box-shadow: 15px 0 {$travel_way_link_color}, -15px 0 {$travel_way_link_color};

        }";
        $custom_css .= "
        .sidebar .widget-title::after {
            background-color: {$travel_way_link_color};
            box-shadow: 10px 0 {$travel_way_link_color}, -10px 0 {$travel_way_link_color};

        }";

        $custom_css .= "
        .summary.entry-summary .price ins .woocommerce-price-amount.amount{
            color: {$travel_way_link_color};

        }";
        //Slider controls
        $custom_css .= "
        .featured-entries-col + .at-action-wrapper .slick-arrow{
            background-color: {$travel_way_primary_color};
            border: 2px solid #f7faff;

        }";
        //Search form
        $custom_css .= "
        .search-block #searchsubmit, 
        .widget_search #searchsubmit{
            background-color: {$travel_way_primary_color};
            color:#fff;

        }";
        $custom_css .= "
        .woocommerce ul.products li.product .price,
        .woocommerce ul.products li.product .price ins .amount{
            color: {$travel_way_link_color};
        }";

        wp_add_inline_style( 'travel-way-style', $custom_css );
    }
endif;
add_action( 'wp_enqueue_scripts', 'travel_way_dynamic_css', 99 );