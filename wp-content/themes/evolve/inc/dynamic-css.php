<?php

/*
	Dynamic CSS Definitions
	======================================= */

if ( ! function_exists( 'evolve_dynamic_css' ) ) {
	function evolve_dynamic_css( $css_data ) {
		$css_data     = '';
		$template_url = get_template_directory_uri();

		/*
			Layout, Size, Feature
			======================================= */

		$width_layout           = evolve_theme_mod( 'evl_width_layout', 'fixed' );
		$frontpage_width_layout = evolve_theme_mod( 'evl_frontpage_width_layout', 'fixed' );
		$post_layout            = evolve_theme_mod( 'evl_post_layout', 'two' );
		$pos_button             = evolve_theme_mod( 'evl_pos_button', 'right' );
		$animatecss             = evolve_theme_mod( 'evl_animatecss', '1' );
		$width_px               = (int) evolve_theme_mod( 'evl_width_px', '1200' );
		$min_width_px           = $width_px + 60;
		$header_padding         = evolve_theme_mod( 'evl_header_padding' );
		$padding_top            = $header_padding['top'];
		$padding_bottom         = $header_padding['bottom'];
		$padding_left           = $header_padding['left'];
		$padding_right          = $header_padding['right'];
		$menu_padding           = evolve_theme_mod( 'evl_main_menu_padding', '8' );
		$menu_height            = evolve_theme_mod( 'evl_main_menu_height', '8' );
		$menu_font              = evolve_theme_mod( 'evl_menu_font' );
		$responsive_menu_layout = evolve_theme_mod( 'evl_responsive_menu_layout', 'dropdown' );

		/*
			Background, Color, Image
			======================================= */

		$content_back                       = evolve_theme_mod( 'evl_content_back', 'light' );
		$menu_back                          = evolve_theme_mod( 'evl_menu_back', 'dark' );
		$menu_back_color                    = evolve_theme_mod( 'evl_menu_back_color', '#273039' );
		$top_bar_back_color                 = evolve_theme_mod( 'evl_top_menu_back', '#273039' );
		$custom_main_color                  = evolve_theme_mod( 'evl_header_footer_back_color', '' );
		$custom_header_color                = evolve_theme_mod( 'evl_header_background_color', '#313a43' );
		$main_pattern                       = evolve_theme_mod( 'evl_pattern', 'none' );
		$scheme_widgets                     = evolve_theme_mod( 'evl_scheme_widgets', '#273039' );
		$widget_background                  = evolve_theme_mod( 'evl_widget_background', '0' );
		$widget_bgcolor                     = evolve_theme_mod( 'evl_widget_bgcolor', '#273039' );
		$widget_background_image            = evolve_theme_mod( 'evl_widget_background_image', '1' );
		$menu_background                    = evolve_theme_mod( 'evl_disable_menu_back', '1' );
		$social_color                       = evolve_theme_mod( 'evl_social_color_scheme', '#999999' );
		$scheme_background                  = evolve_theme_mod( 'evl_scheme_background', '' );
		$scheme_background_100              = evolve_theme_mod( 'evl_scheme_background_100', '0' );
		$scheme_background_repeat           = evolve_theme_mod( 'evl_scheme_background_repeat', 'no-repeat' );
		$primary_link                       = evolve_theme_mod( 'evl_general_link', '#0d9078' );
		$secondary_link                     = evolve_theme_mod( 'evl_secondary_link', '#999999' );
		$content_box1_icon_color            = evolve_theme_mod( 'evl_content_box1_icon_color', '#8bb9c1' );
		$content_box2_icon_color            = evolve_theme_mod( 'evl_content_box2_icon_color', '#8ba3c1' );
		$content_box3_icon_color            = evolve_theme_mod( 'evl_content_box3_icon_color', '#8dc4b8' );
		$content_box4_icon_color            = evolve_theme_mod( 'evl_content_box4_icon_color', '#92bf89' );
		$header_image                       = evolve_theme_mod( 'evl_header_image', 'cover' );
		$content_background_image           = evolve_theme_mod( 'evl_content_background_image', '' );
		$content_background_color           = evolve_theme_mod( 'evl_content_background_color', '' );
		$content_image_responsiveness       = evolve_theme_mod( 'evl_content_image_responsiveness', 'cover' );
		$shadow_effect                      = evolve_theme_mod( 'evl_shadow_effect', 'disable' );
		$content_box_background_color       = evolve_theme_mod( 'evl_content_box_background_color', '#f9f9f9' );
		$form_bg_color                      = evolve_theme_mod( 'evl_form_bg_color', '#fcfcfc' );
		$form_text_color                    = evolve_theme_mod( 'evl_form_text_color', '#888888' );
		$form_border_color                  = evolve_theme_mod( 'evl_form_border_color', '#E0E0E0' );
		$header_logo                        = evolve_theme_mod( 'evl_header_logo', '' );
		$top_menu_hover_font_color          = evolve_theme_mod( 'evl_top_menu_hover_font_color', '#ffffff' );
		$social_box_radius                  = evolve_theme_mod( 'evl_social_box_radius', 'disabled' );
		$background_repeat                  = evolve_theme_mod( 'evl_header_image_background_repeat', 'no-repeat' );
		$background_position                = evolve_theme_mod( 'evl_header_image_background_position', 'center top' );
		$footer_image_src                   = evolve_theme_mod( 'evl_footer_background_image', '' );
		$footer_image                       = evolve_theme_mod( 'evl_footer_image', 'cover' );
		$footer_background_repeat           = evolve_theme_mod( 'evl_footer_image_background_repeat', 'no-repeat' );
		$footer_background_position         = evolve_theme_mod( 'evl_footer_image_background_position', 'center top' );
		$component_color                    = evolve_theme_mod( 'evl_form_item_color', '#0d9078' );
		$bootstrap_slide_title_font_rgba    = evolve_theme_mod( 'evl_bootstrap_slide_title_font_rgba', '' );
		$bootstrap_slide_subtitle_font_rgba = evolve_theme_mod( 'evl_bootstrap_slide_subtitle_font_rgba', '' );
		$parallax_slide_title_font_rgba     = evolve_theme_mod( 'evl_parallax_slide_title_font_rgba', '' );
		$parallax_slide_subtitle_font_rgba  = evolve_theme_mod( 'evl_parallax_slide_subtitle_font_rgba', '' );
		$posts_slide_title_font_rgba        = evolve_theme_mod( 'evl_carousel_slide_title_font_rgba', '' );
		$posts_slide_subtitle_font_rgba     = evolve_theme_mod( 'evl_carousel_slide_subtitle_font_rgba', '' );

		/*
			Button
			======================================= */

		$button_shape                       = evolve_theme_mod( 'evl_shortcode_button_shape', 'Pill' );
		$button_type                        = evolve_theme_mod( 'evl_shortcode_button_type', 'Flat' );
		$button_gradient_top_color          = evolve_theme_mod( 'evl_shortcode_button_gradient_top_color', '#0d9078' );
		$button_gradient_bottom_color       = evolve_theme_mod( 'evl_shortcode_button_gradient_bottom_color', '#0d9078' );
		$button_gradient_top_hover_color    = evolve_theme_mod( 'evl_shortcode_button_gradient_top_hover_color', '#313a43' );
		$button_gradient_bottom_hover_color = evolve_theme_mod( 'evl_shortcode_button_gradient_bottom_hover_color', '#313a43' );
		$button_accent_color                = evolve_theme_mod( 'evl_shortcode_button_accent_color', '#f4f4f4' );
		$button_accent_hover_color          = evolve_theme_mod( 'evl_shortcode_button_accent_hover_color', '#ffffff' );
		$button_bevel_color                 = evolve_theme_mod( 'evl_shortcode_button_bevel_color', '#1d6e72' );
		$button_border_color                = evolve_theme_mod( 'evl_shortcode_button_border_color', '#0d9078' );
		$button_border_hover_color          = evolve_theme_mod( 'evl_shortcode_button_border_hover_color', '#313a43' );
		$button_border_width                = evolve_theme_mod( 'evl_shortcode_button_border_width', '3' );
		$button_shadow                      = evolve_theme_mod( 'evl_shortcode_button_shadow', '1' );
		$button_classes                     = " .btn, a.btn, button, .button, .widget .button, input#submit, input[type=submit], .post-content a.btn, .carousel-control-button, .woocommerce .button";
		$button_hover_classes               = " .btn:hover, a.btn:hover, button:hover, .button:hover, .widget .button:hover, input#submit:hover, input[type=submit]:hover, .carousel-control-button:hover, .header-wrapper .woocommerce-menu .btn:hover";

		/*
			Post Format
			======================================= */

		$sticky_post_format  = evolve_theme_mod( 'evl_sticky_post_format', '1' );
		$aside_post_format   = evolve_theme_mod( 'evl_aside_post_format', '1' );
		$audio_post_format   = evolve_theme_mod( 'evl_audio_post_format', '1' );
		$chat_post_format    = evolve_theme_mod( 'evl_chat_post_format', '1' );
		$gallery_post_format = evolve_theme_mod( 'evl_gallery_post_format', '1' );
		$image_post_format   = evolve_theme_mod( 'evl_image_post_format', '1' );
		$link_post_format    = evolve_theme_mod( 'evl_link_post_format', '1' );
		$quote_post_format   = evolve_theme_mod( 'evl_quote_post_format', '1' );
		$status_post_format  = evolve_theme_mod( 'evl_status_post_format', '1' );
		$video_post_format   = evolve_theme_mod( 'evl_video_post_format', '1' );
		$post_title_font     = evolve_theme_mod( 'evl_post_font', '' );
		$post_content_font   = evolve_theme_mod( 'evl_content_font', '' );
		$format              = "";
		$format_title        = "";
		$format_meta         = "";
		$format_meta_hover   = "";

		/*
			Homepage / Frontpage 100% Template Style
			======================================= */

		$frontpage_layout           = evolve_theme_mod( 'evl_frontpage_layout', '1c' );
		$content_top_bottom_padding = evolve_theme_mod( 'evl_content_top_bottom_padding' );
		$content_top_padding        = $content_top_bottom_padding['top'];
		$content_bottom_padding     = $content_top_bottom_padding['bottom'];

		/*
			Content Boxes Section
			======================================= */

		$content_boxes_section_padding             = evolve_theme_mod( 'evl_content_boxes_section_padding' );
		$content_boxes_section_padding_top         = $content_boxes_section_padding['top'];
		$content_boxes_section_padding_bottom      = $content_boxes_section_padding['bottom'];
		$content_boxes_section_padding_left        = $content_boxes_section_padding['left'];
		$content_boxes_section_padding_right       = $content_boxes_section_padding['right'];
		$content_boxes_section_back_color          = evolve_theme_mod( 'evl_content_boxes_section_back_color', '' );
		$content_boxes_section_image_src           = evolve_theme_mod( 'evl_content_boxes_section_background_image', '' );
		$content_boxes_section_image               = evolve_theme_mod( 'evl_content_boxes_section_image', 'cover' );
		$content_boxes_section_background_repeat   = evolve_theme_mod( 'evl_content_boxes_section_image_background_repeat', 'no-repeat' );
		$content_boxes_section_background_position = evolve_theme_mod( 'evl_content_boxes_section_image_background_position', 'center top' );

		/*
			Testimonials Section
			======================================= */

		$testimonials_section_padding             = evolve_theme_mod( 'evl_testimonials_section_padding' );
		$testimonials_section_padding_top         = $testimonials_section_padding['top'];
		$testimonials_section_padding_bottom      = $testimonials_section_padding['bottom'];
		$testimonials_section_padding_left        = $testimonials_section_padding['left'];
		$testimonials_section_padding_right       = $testimonials_section_padding['right'];
		$testimonials_section_back_color          = evolve_theme_mod( 'evl_testimonials_section_back_color', '#efefef' );
		$testimonials_section_image_src           = evolve_theme_mod( 'evl_testimonials_section_background_image', '' );
		$testimonials_section_image               = evolve_theme_mod( 'evl_testimonials_section_image', 'cover' );
		$testimonials_section_background_repeat   = evolve_theme_mod( 'evl_testimonials_section_image_background_repeat', 'no-repeat' );
		$testimonials_section_background_position = evolve_theme_mod( 'evl_testimonials_section_image_background_position', 'center top' );

		/*
			Counter Circle Section
			======================================= */

		$counter_circle_section_padding             = evolve_theme_mod( 'evl_counter_circle_section_padding' );
		$counter_circle_section_padding_top         = $counter_circle_section_padding['top'];
		$counter_circle_section_padding_bottom      = $counter_circle_section_padding['bottom'];
		$counter_circle_section_padding_left        = $counter_circle_section_padding['left'];
		$counter_circle_section_padding_right       = $counter_circle_section_padding['right'];
		$counter_circle_section_back_color          = evolve_theme_mod( 'evl_counter_circle_section_back_color', '#41d6c2' );
		$counter_circle_section_image_src           = evolve_theme_mod( 'evl_counter_circle_section_background_image', '' );
		$counter_circle_section_image               = evolve_theme_mod( 'evl_counter_circle_section_image', 'cover' );
		$counter_circle_section_background_repeat   = evolve_theme_mod( 'evl_counter_circle_section_image_background_repeat', 'no-repeat' );
		$counter_circle_section_background_position = evolve_theme_mod( 'evl_counter_circle_section_image_background_position', 'center top' );

		/*
		    WooCommerce Products
			======================================= */

		$woo_product_section_padding             = evolve_theme_mod( 'evl_woo_product_section_padding' );
		$woo_product_section_padding_top         = $woo_product_section_padding['top'];
		$woo_product_section_padding_bottom      = $woo_product_section_padding['bottom'];
		$woo_product_section_padding_left        = $woo_product_section_padding['left'];
		$woo_product_section_padding_right       = $woo_product_section_padding['right'];
		$woo_product_section_back_color          = evolve_theme_mod( 'evl_woo_product_section_back_color', '#fafafa' );
		$woo_product_section_image_src           = evolve_theme_mod( 'evl_woo_product_section_background_image', '' );
		$woo_product_section_image               = evolve_theme_mod( 'evl_woo_product_section_image', 'cover' );
		$woo_product_section_background_repeat   = evolve_theme_mod( 'evl_woo_product_section_image_background_repeat', 'no-repeat' );
		$woo_product_section_background_position = evolve_theme_mod( 'evl_woo_product_section_image_background_position', 'center top' );

		/*
			Custom Content
			======================================= */

		$custom_content_section_padding             = evolve_theme_mod( 'evl_custom_content_section_padding' );
		$custom_content_section_padding_top         = $custom_content_section_padding['top'];
		$custom_content_section_padding_bottom      = $custom_content_section_padding['bottom'];
		$custom_content_section_padding_left        = $custom_content_section_padding['left'];
		$custom_content_section_padding_right       = $custom_content_section_padding['right'];
		$custom_content_section_back_color          = evolve_theme_mod( 'evl_custom_content_section_back_color', '#93f2d7' );
		$custom_content_section_image_src           = evolve_theme_mod( 'evl_custom_content_section_background_image', '' );
		$custom_content_section_image               = evolve_theme_mod( 'evl_custom_content_section_image', 'cover' );
		$custom_content_section_background_repeat   = evolve_theme_mod( 'evl_custom_content_section_image_background_repeat', 'no-repeat' );
		$custom_content_section_background_position = evolve_theme_mod( 'evl_custom_content_section_image_background_position', 'center top' );

		/*
			Custom CSS Begin
			======================================= */

		/*
			Active Menu Font Color
			--------------------------------------- */

		$css_data .= ' .navbar-nav .nav-link:focus, .navbar-nav .nav-link:hover, .navbar-nav .active > .nav-link, .navbar-nav .nav-link.active, .navbar-nav .nav-link.show, .navbar-nav .show > .nav-link, .navbar-nav li.menu-item.current-menu-item > a, .navbar-nav li.menu-item.current-menu-parent > a, .navbar-nav li.menu-item.current-menu-ancestor > a, .navbar-nav li a:hover, .navbar-nav li:hover > a, .navbar-nav li:hover, .social-media-links a:hover { color: ' . $top_menu_hover_font_color . '; }';

		/*
			Hover Effect On Featured Images
			--------------------------------------- */

		if ( $animatecss == "1" ) {
			$css_data .= ' .thumbnail-post:hover img { -webkit-transform: scale(1.1,1.1); -ms-transform: scale(1.1,1.1); transform: scale(1.1,1.1); } .thumbnail-post:hover .mask { opacity: 1; } .thumbnail-post:hover .icon { opacity: 1; top: 50%; margin-top: -25px; }';
		}

		/*
			Layouts
			--------------------------------------- */

		if ( ( ( ( is_front_page() && is_page() ) || is_home() ) && $frontpage_width_layout == "fluid" ) || ( ( ! is_front_page() && ! is_page() && ! is_home() ) && $width_layout == "fluid" ) ) {
			$css_data .= ' #wrapper { margin: 0; width: 100%; }';
		}

		/*
			Content Dark Color Scheme
			--------------------------------------- */

		if ( $content_back == "dark" ) {
			$css_data .= ' input[type=text], input[type=password], input[type=email], textarea { border: 1px solid #111; } .post-content img, .post-content .wp-caption { background: #444; border: 1px solid #404040; } var, kbd, samp, code, pre { background-color: #505050; } pre { border-color: #444; } .post-more { border-color: #222; border-bottom-color: #111; text-shadow: 0 1px 0 #111; color: #aaa; background: #505050; background: -webkit-gradient(linear,left top,left bottom,color-stop(.2, #505050),color-stop(1, #404040)); background: -o-linear-gradient(top, #505050,#404040); -webkit-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset,0 0 10px rgba(0, 0, 0, 0.1) inset, 0 1px 2px rgba(0, 0, 0, 0.1); box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 0 10px rgba(0, 0, 0, 0.1) inset, 0 1px 2px rgba(0, 0, 0, 0.1); } a.post-more:hover { color: #fff; } .social-title, #reply-title { color: #fff; text-shadow: 0 1px 0 #222; } .header-block { border-top-color: #515151; } .page-title { text-shadow: 0 1px 0 #111; } .content-bottom { background: #353535; } .post-meta a { color: #eee; } .post-meta { text-shadow: 0 1px 0 #111; } .post-meta a:hover { color: #fff; } .widget-content { background: #484848; border-color: #404040; box-shadow: 1px 1px 0 rgba(255, 255, 255, 0.1) inset; -webkit-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.1) inset; color: #FFFFFF; } .widget .nav-tabs .nav-link { background: rgba(0, 0, 0, 0.05); } .widget .nav-tabs .nav-link, .widget .nav-tabs .nav-link:hover { border-color: #404040 transparent #404040 #404040; } .widget .nav-tabs .nav-item:last-child .nav-link { border-right-color: #404040; }.widget .nav-tabs .nav-link.active { background: #484848; border-color: #404040 rgba(0, 0, 0, 0) #484848 #404040; color: #eee; } .tab-content { background: #484848; border: 1px solid #404040; border-top: 0; } .tab-content li .post-holder a { color: #eee; } .tab-content .tab-pane li:nth-child(even) { background: rgba(0, 0, 0, 0.05); } .tab-content .tab-pane li { border-bottom: 1px solid #414141; } .tab-content img { background: #393939; border: 1px solid #333; } .author.vcard .avatar { border-color: #222; } #secondary a, #secondary-2 a, .widget-title { text-shadow: 1px 1px 0 #000; } #secondary a, #secondary-2 a, .footer-widgets a, .header-widgets a { color: #eee; } h1, h2, h3, h4, h5, h6 { color: #eee; } .breadcrumb-item.active, .breadcrumb-item+.breadcrumb-item::before { color: #aaa; } .content, #wrapper { background: #555; } .widgets-back h3 { color: #fff; text-shadow: 1px 1px 0 #000; } .widgets-back ul, .widgets-back ul ul, .widgets-back ul ul ul { list-style-image: url(' . $template_url . '/assets/images/dark/list-style-dark.gif); } .widgets-back a:hover { color: orange } .widgets-holder a { text-shadow: 0 1px 0 #000; } .form-control:focus, #respond input#author, #respond input#url, #respond input#email, #respond textarea { -webkit-box-shadow: 1px 1px 0 rgba(255, 255, 255, 0.2); box-shadow: 1px 1px 0 rgba(255, 255, 255, 0.2); } .widgets-back .widget-title a { color: #fff; text-shadow: 0 1px 3px #444; } .comment, .trackback, .pingback { text-shadow: 0 1px 0 #000; background: #505050; border-color: #484848; } .comment-header { background: #484848; border-bottom: 1px solid #484848; box-shadow: 1px 1px 0 rgba(255, 255, 255, 0.1) inset; } .avatar { background: #444444; border-color: #404040; } #leave-a-reply { text-shadow: 0 1px 1px #333333; } .page-navigation .current, .navigation .current { text-shadow: 0 1px 0 #111; color: #aaa; background: #505050; background: -webkit-gradient(linear,left top,left bottom,color-stop(.2, #505050),color-stop(1, #404040)); background: -o-linear-gradient(top, #505050,#404040); -webkit-box-shadow: 1px 1px 0 rgba(255, 255, 255, 0.1) inset,0 0 10px rgba(0, 0, 0, 0.1) inset, 0 1px 2px rgba(0, 0, 0, 0.1); box-shadow: 1px 1px 0 rgba(255, 255, 255, 0.1) inset, 0 0 10px rgba(0, 0, 0, 0.1) inset, 0 1px 2px rgba(0, 0, 0, 0.1); } .share-this a { text-shadow: 0 1px 0 #111; } .share-this a:hover { color: #fff; } .share-this strong { color: #999; border: 1px solid #222; text-shadow: 0 1px 0 #222; background: -webkit-gradient(linear,left top,left bottom,color-stop(.2, #505050),color-stop(1, #404040)); background: -o-linear-gradient(top, #505050,#404040); -webkit-box-shadow: 0 0 5px rgba(0, 0, 0, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.29); box-shadow: 0 0 5px rgba(0, 0, 0, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.29); } .share-this:hover strong { color: #fff; } .page-navigation .nav-next, .single-page-navigation .nav-next, .page-navigation .nav-previous, .single-page-navigation .nav-previous { color: #777; } .page-navigation .nav-previous a, .single-page-navigation .nav-previous a, .page-navigation .nav-next a, .single-page-navigation .nav-next a { color: #999999; text-shadow: 0 1px 0 #333; } .page-navigation .nav-previous a:hover, .single-page-navigation .nav-previous a:hover, .page-navigation .nav-next a:hover, .single-page-navigation .nav-next a:hover { color: #eee; } .icon-big::before { color: #666; } .page-navigation .nav-next:hover a, .single-page-navigation .nav-next:hover a, .page-navigation .nav-previous:hover a, .single-page-navigation .nav-previous:hover a, .icon-big:hover::before, .btn:hover, button:hover, .button:hover, .btn:focus { color: #fff; } #page-links a:hover { background: #333; color: #eee; } blockquote { color: #bbb; text-shadow: 0 1px 0 #000; border-color: #606060; } blockquote::before, blockquote::after { color: #606060; } table { background: #505050; border-color: #494949; } thead, thead th, thead td { background: rgba(0, 0, 0, 0.1); color: #FFFFFF; text-shadow: 0 1px 0 #000; } thead { box-shadow: 1px 1px 0 rgba(255, 255, 255, 0.1) inset; } th, td { border-bottom: 1px solid rgba(0, 0, 0, 0.1); border-top: 1px solid rgba(255, 255, 255, 0.02); } table#wp-calendar th, table#wp-calendar tbody tr td { color: #888; text-shadow: 0 1px 0 #111; } table#wp-calendar tbody tr td { border-right: 1px solid #484848; border-top: 1px solid #555; } table#wp-calendar th { color: #fff; text-shadow: 0 1px 0 #111; } table#wp-calendar tbody tr td a { text-shadow: 0 1px 0 #111; }';
		}

		/*
			Content Background Color/Image
			--------------------------------------- */

		if ( $content_background_color || $content_background_image ) {
			$css_data .= ' .content {';
			if ( $content_background_color ) {
				$css_data .= ' background-color: ' . $content_background_color . ';';
			}
			if ( $content_background_image ) {
				$css_data .= ' background: url(' . esc_url( $content_background_image ) . ') top center no-repeat; border-bottom: 0; background-size: ' . $content_image_responsiveness . '; width: 100%;';
			}
			$css_data .= ' }';
		}

		if ( ( ( is_front_page() && is_page() ) || is_home() ) && $frontpage_layout == "1c" && $frontpage_width_layout == "fluid" ) {
		} else {
			$css_data .= ' .content { padding-top: ' . $content_top_padding . '; padding-bottom: ' . $content_bottom_padding . '; }';
		}

		/*
			Main Menu Background Color Scheme
			--------------------------------------- */

		if ( ! ( '' == evolve_theme_mod( 'evl_menu_back_color', '#273039' ) ) ) {
			$css_data .= ' .navbar-nav .dropdown-menu { background-color: ' . $menu_back_color . '; } .navbar-nav .dropdown-item:focus, .navbar-nav .dropdown-item:hover { background: none; } .menu-header, .sticky-header { background-color: ' . $menu_back_color . ';';

			/*
				-- Enable Menu Gradient, Shadow Effects
				--------------------------------------- */

			if ( $menu_background != "1" ) {
				$css_data .= ' background: -webkit-gradient(linear, left top, left bottom, color-stop(50%, ' . $menu_back_color . ' ), to( ' . evolve_hex_change( $menu_back_color ) . ' )); background: -o-linear-gradient(top, #' . $menu_back_color . ' 50%, ' . evolve_hex_change( $menu_back_color ) . ' 100%); background: linear-gradient(to bottom, ' . $menu_back_color . ' 50%, ' . evolve_hex_change( $menu_back_color ) . ' 100%); border-color: ' . evolve_hex_change( $menu_back_color ) . '; -webkit-box-shadow: 0 1px 0 rgba(255, 255, 255, .2) inset, 0 0 2px rgba(255, 255, 255, .2) inset, 0 0 10px rgba(0, 0, 0, .1) inset, 0 1px 2px rgba(0, 0, 0, .1); box-shadow: 0 1px 0 rgba(255, 255, 255, .2) inset, 0 0 2px rgba(255, 255, 255, .2) inset, 0 0 10px rgba(0, 0, 0, .1) inset, 0 1px 2px rgba(0, 0, 0, .1);';

				/*
					-- Menu Text Shadow Effect
					--------------------------------------- */

				if ( $menu_back == "dark" ) {
					$css_data .= ' text-shadow: 0 1px 0 rgba(0, 0, 0, .8);';
				} else {
					$css_data .= ' text-shadow: 0 1px 0 rgba(255, 255, 255, .8);';
				}
			}

			$css_data .= ' }';

			$css_data .= ' .header-v1 .header-search .form-control:focus, .sticky-header .header-search .form-control:focus { background-color: ' . evolve_hex_change( $menu_back_color ) . '; }';

			if ( class_exists( 'Woocommerce' ) ) {
				$css_data .= ' .header-wrapper .woocommerce-menu .dropdown-divider { border-color: ' . evolve_hex_change( $menu_back_color ) . '; }';
			}
		}

		/*
			Header 2 Style
			--------------------------------------- */

		if ( evolve_theme_mod( 'evl_header_type', 'none' ) == 'h1' ) {
			if ( ! empty( $top_bar_back_color ) ) {
				$css_data .= ' .top-bar { background: ' . $top_bar_back_color . '; }';
			}
		}

		/*
			Footer Background Color
			--------------------------------------- */

		if ( ! empty( $custom_main_color ) ) {
			$css_data .= ' .footer { background: ' . $custom_main_color . '; }';
		}

		/*
			Header Background Color
			--------------------------------------- */

		if ( ! empty( $custom_header_color ) ) {
			$css_data .= ' .header-pattern { background-color: ' . $custom_header_color . '; }';
		}

		/*
			Header Search Form
			--------------------------------------- */

		$css_data .= ' .header-search .form-control, .header-search .form-control:focus, .header-search .form-control::placeholder { color: ' . $menu_font['color'] . '; }';

		/*
			Header and Footer Pattern
			--------------------------------------- */

		$image_patten_array = array(
			'none',
			'pattern_1',
			'pattern_2',
			'pattern_3',
			'pattern_4',
			'pattern_5',
			'pattern_6',
			'pattern_7',
			'pattern_8'
		);
		if ( ! empty( $main_pattern ) && $main_pattern != 'none' && in_array( $main_pattern, $image_patten_array ) ) {
			$main_pattern = $template_url . '/assets/images/pattern/' . $main_pattern;
			$css_data     .= ' .header-pattern, .footer { background-image: url( ' . $main_pattern . '.png ); }';
		}

		/*
			Website Body Font
			--------------------------------------- */

		$css_data .= evolve_print_fonts( 'evl_body_font', ' body' );

		/*
			Website Title Font
			--------------------------------------- */

		$css_data .= evolve_print_fonts( 'evl_title_font', ' #website-title, #website-title a' );

		/*
			Website Tagline Font
			--------------------------------------- */

		$css_data .= evolve_print_fonts( 'evl_tagline_font', ' #tagline' );

		/*
			Post/Page Title Font
			--------------------------------------- */

		$css_data .= evolve_print_fonts( 'evl_post_font', ' .post-title, .post-title a' );

		/*
			Post Title Font For Grid Layout / Archive Title
			--------------------------------------- */

		if ( evolve_theme_mod( 'evl_post_layout', 'two' ) != "one" && ( is_home() || is_archive() || is_search() ) ) {
			$css_data .= ' .posts.card-columns .post-title a, .posts.card-columns .post-title { font-size: 1.5rem; line-height: 2rem; }';
		}

		/*
			Content Font
			--------------------------------------- */

		$css_data .= evolve_print_fonts( 'evl_content_font', ' .post-content', '', $additional_color_css_class = ' body' );

		/*
			Sticky Header Title Font
			--------------------------------------- */

		$css_data .= evolve_print_fonts( 'evl_menu_blog_title_font', ' #sticky-title' );

		/*
			Main Menu Font
			--------------------------------------- */

		$css_data .= evolve_print_fonts( 'evl_menu_font', ' .navbar-nav .nav-link, .navbar-nav .dropdown-item, .navbar-nav .dropdown-menu, .menu-header, .header-wrapper .header-search, .sticky-header, .navbar-toggler' );

		if ( ( get_post_meta( evolve_get_post_id(), 'evolve_slider_type', true ) == 'bootstrap' && evolve_theme_mod( 'evl_bootstrap_slider_support', '0' ) == '1' ) || ( evolve_theme_mod( 'evl_bootstrap_slider', '0' ) == '1' && evolve_theme_mod( 'evl_bootstrap_slider_support', '0' ) == '1' ) || ( evolve_theme_mod( 'evl_bootstrap_slider_support', '0' ) == "1" && is_front_page() && ( evolve_theme_mod( 'evl_front_elements_header_area', array( 'bootstrap_slider' ) ) ) ) || ( evolve_theme_mod( 'evl_bootstrap_slider_support', '0' ) == "1" && is_home() && ( evolve_theme_mod( 'evl_front_elements_header_area', array( 'bootstrap_slider' ) ) ) ) ) {

			/*
				Bootstrap Slider --> Slider Title Font
				--------------------------------------- */

			$css_data .= evolve_print_fonts( 'evl_bootstrap_slide_title_font', ' #bootstrap-slider .carousel-caption h5' );

			/*
				Bootstrap Slider --> Slider Description Font
				--------------------------------------- */

			$css_data .= evolve_print_fonts( 'evl_bootstrap_slide_subtitle_font', ' #bootstrap-slider .carousel-caption p' );
		}

		if ( ( get_post_meta( evolve_get_post_id(), 'evolve_slider_type', true ) == 'parallax' && evolve_theme_mod( 'evl_parallax_slider_support', '0' ) == "1" ) || ( evolve_theme_mod( 'evl_parallax_slider', '1' ) == "1" && evolve_theme_mod( 'evl_parallax_slider_support', '1' ) == "1" ) || ( evolve_theme_mod( 'evl_parallax_slider_support', '1' ) == "1" && is_front_page() && ( evolve_theme_mod( 'evl_front_elements_header_area', array( 'parallax_slider' ) ) ) ) || ( evolve_theme_mod( 'evl_parallax_slider_support', '1' ) == "1" && is_home() && ( evolve_theme_mod( 'evl_front_elements_header_area', array( 'parallax_slider' ) ) ) ) ) {

			/*
				Parallax Slider --> Slider Title Font
				--------------------------------------- */

			$css_data .= evolve_print_fonts( 'evl_parallax_slide_title_font', ' #parallax-slider .carousel-caption h5' );

			/*
				Parallax Slider --> Slider Description Font
				--------------------------------------- */

			$css_data .= evolve_print_fonts( 'evl_parallax_slide_subtitle_font', ' #parallax-slider .carousel-caption p' );
		}

		if ( ( get_post_meta( evolve_get_post_id(), 'evolve_slider_type', true ) == 'posts' && evolve_theme_mod( 'evl_carousel_slider', '0' ) == "1" ) || ( evolve_theme_mod( 'evl_posts_slider', '0' ) == "1" && evolve_theme_mod( 'evl_carousel_slider', '0' ) == "1" ) || ( evolve_theme_mod( 'evl_carousel_slider', '0' ) == "1" && is_front_page() && ( evolve_theme_mod( 'evl_front_elements_header_area', array( 'posts_slider' ) ) ) ) || ( evolve_theme_mod( 'evl_carousel_slider', '0' ) == "1" && is_home() && ( evolve_theme_mod( 'evl_front_elements_header_area', array( 'posts_slider' ) ) ) ) ) {

			/*
				Post Slider --> Slider Title Font
				--------------------------------------- */

			$css_data .= evolve_print_fonts( 'evl_carousel_slide_title_font', ' #posts-slider h5 a' );

			/*
				Post Slider --> Slider Description Font
				--------------------------------------- */

			$css_data .= evolve_print_fonts( 'evl_carousel_slide_subtitle_font', ' #posts-slider p' );

		}

		/*
			Widget Title Font
			--------------------------------------- */

		$css_data .= evolve_print_fonts( 'evl_widget_title_font', ' .widget-title, .widget-title a.rsswidget' );

		/*
			Widget Content Font
			--------------------------------------- */

		$css_data .= evolve_print_fonts( 'evl_widget_content_font', ' .widget-content, .aside, .aside a', '', $additional_color_css_class = '.widget-content, .widget-content a, .widget-content .tab-holder .news-list li .post-holder a, .widget-content .tab-holder .news-list li .post-holder .meta' );

		if ( is_front_page() ) {

			/*
				Content Boxes Title Font
				--------------------------------------- */

			$css_data .= evolve_print_fonts( 'evl_content_boxes_title_font', ' .content-box h5.card-title' );

			/*
				Content Boxes Description Font
				--------------------------------------- */

			$css_data .= evolve_print_fonts( 'evl_content_boxes_description_font', ' .content-box p' );

			/*
				Content Boxes Title Section
				--------------------------------------- */

			$css_data .= evolve_print_fonts( 'evl_content_boxes_title_alignment', ' h3.content-box-section-title' );

			/*
				Testimonials Title Section
				--------------------------------------- */

			$css_data .= evolve_print_fonts( 'evl_testimonials_title_alignment', ' h3.testimonials-section-title' );

			/*
				Counter Circle Title Section
				--------------------------------------- */

			$css_data .= evolve_print_fonts( 'evl_counter_circle_title_alignment', ' h3.counter-circle-section-title' );

			/*
				Counter Circle Text Font
				--------------------------------------- */

			$css_data .= evolve_print_fonts( 'evl_counter_circle_title_text', ' .counter-circle-text, .counter-circle-text h5' );

			/*
				WooCommerce Product Title Section
				--------------------------------------- */

			if ( class_exists( 'Woocommerce' ) ) :
				$css_data .= evolve_print_fonts( 'evl_woo_product_title_alignment', ' h3.woo-product-section-title' );
			endif;

			/*
				Custom Content Title Section
				--------------------------------------- */

			$css_data .= evolve_print_fonts( 'evl_custom_content_title_alignment', ' h3.custom-content-section-title' );

		}

		/*
			H1 Font, H2 Font, H3 Font, H4 Font, H5 Font and H6 Font
			--------------------------------------- */

		for ( $i = 1; $i < 7; $i ++ ) {
			$css_data .= evolve_print_fonts( 'evl_content_h' . $i . '_font', " h{$i}" );
		}

		/*
			Footer Copyright Font
			--------------------------------------- */

		$css_data .= evolve_print_fonts( 'evl_footer_copyright', ' #copyright, #copyright a' );

		/*
			Front Page Elements
			--------------------------------------- */

		if ( is_front_page() ) {

			/*
				-- Content Boxes
				--------------------------------------- */

			$content_box_background_color = ( $content_box_background_color == '' ) ? 'transparent' : $content_box_background_color;
			if ( $content_box_background_color ) {
				$css_data .= ' .home-content-boxes .card { background: ' . $content_box_background_color . '; }';
			}
			$home_content_boxes_css_data = '';
			if ( $content_boxes_section_back_color ) {
				$home_content_boxes_css_data .= sprintf( ' background-color: %s;', $content_boxes_section_back_color );
			}
			if ( $content_boxes_section_image_src ) {
				$home_content_boxes_css_data .= sprintf( ' background: url(%s)', $content_boxes_section_image_src );

				if ( $content_boxes_section_background_repeat ) {
					$home_content_boxes_css_data .= sprintf( ' %s', $content_boxes_section_background_repeat );
				}
				if ( $content_boxes_section_background_position ) {
					$home_content_boxes_css_data .= sprintf( ' %s;', $content_boxes_section_background_position );
				}
				if ( $content_boxes_section_image != 'none' ) {
					$home_content_boxes_css_data .= sprintf( ' background-size: %s;', $content_boxes_section_image );
				}
			}
			if ( $content_boxes_section_padding_top ) {
				$home_content_boxes_css_data .= sprintf( ' padding-top: %s;', $content_boxes_section_padding_top );
			}
			if ( $content_boxes_section_padding_bottom ) {
				$home_content_boxes_css_data .= sprintf( ' padding-bottom: %s;', $content_boxes_section_padding_bottom );
			}
			if ( $content_boxes_section_padding_left ) {
				$home_content_boxes_css_data .= sprintf( ' padding-left: %s;', $content_boxes_section_padding_left );
			}
			if ( $content_boxes_section_padding_right ) {
				$home_content_boxes_css_data .= sprintf( ' padding-right: %s;', $content_boxes_section_padding_right );
			}

			$css_data .= ' .home-content-boxes {' . $home_content_boxes_css_data . ' }';

			if ( $content_box1_icon_color ) {
				$css_data .= ' .content-box-1 [class*=" fa-"] { color: ' . $content_box1_icon_color . '; }';
			}
			if ( $content_box2_icon_color ) {
				$css_data .= ' .content-box-2 [class*=" fa-"] { color: ' . $content_box2_icon_color . '; }';
			}
			if ( $content_box3_icon_color ) {
				$css_data .= ' .content-box-3 [class*=" fa-"] { color: ' . $content_box3_icon_color . '; }';
			}
			if ( $content_box4_icon_color ) {
				$css_data .= ' .content-box-4 [class*=" fa-"] { color: ' . $content_box4_icon_color . '; }';
			}

			/*
				-- Testimonials
				--------------------------------------- */

			$home_testimonials_css_data = '';

			if ( $testimonials_section_back_color ) {
				$home_testimonials_css_data .= sprintf( ' background-color: %s;', $testimonials_section_back_color );
			}
			if ( $testimonials_section_image_src ) {
				$home_testimonials_css_data .= sprintf( ' background: url(%s)', $testimonials_section_image_src );
				if ( $testimonials_section_background_repeat ) {
					$home_testimonials_css_data .= sprintf( ' %s', $testimonials_section_background_repeat );
				}
				if ( $testimonials_section_background_position ) {
					$home_testimonials_css_data .= sprintf( ' %s;', $testimonials_section_background_position );
				}
				if ( $testimonials_section_image != 'none' ) {
					$home_testimonials_css_data .= sprintf( ' background-size: %s;', $testimonials_section_image );
				}
			}
			if ( $testimonials_section_padding_top ) {
				$home_testimonials_css_data .= sprintf( ' padding-top: %s;', $testimonials_section_padding_top );
			}
			if ( $testimonials_section_padding_bottom ) {
				$home_testimonials_css_data .= sprintf( ' padding-bottom: %s;', $testimonials_section_padding_bottom );
			}
			if ( $testimonials_section_padding_left ) {
				$home_testimonials_css_data .= sprintf( ' padding-left: %s;', $testimonials_section_padding_left );
			}
			if ( $testimonials_section_padding_right ) {
				$home_testimonials_css_data .= sprintf( ' padding-right: %s;', $testimonials_section_padding_right );
			}

			$css_data .= ' .home-testimonials {' . $home_testimonials_css_data . ' }';

			$testimonials_back_color = evolve_theme_mod( "evl_fp_testimonials_bg_color", '' );
			$testimonials_textcolor  = evolve_theme_mod( "evl_fp_testimonials_text_color", '' );

			if ( $testimonials_back_color ) {
				$css_data .= ' .home-testimonials .carousel { background-color:' . $testimonials_back_color . '; padding: 2rem; }';
			}
			if ( $testimonials_textcolor ) {
				$css_data .= ' .home-testimonials blockquote, .home-testimonials blockquote footer { color:' . $testimonials_textcolor . ' }';
			}

			/*
				-- Counter Circle
				--------------------------------------- */

			$home_counter_circle_css_data = '';

			if ( $counter_circle_section_back_color ) {
				$home_counter_circle_css_data .= sprintf( ' background-color: %s;', $counter_circle_section_back_color );
			}
			if ( $counter_circle_section_image_src ) {
				$home_counter_circle_css_data .= sprintf( ' background: url(%s)', $counter_circle_section_image_src );
				if ( $counter_circle_section_background_repeat ) {
					$home_counter_circle_css_data .= sprintf( ' %s', $counter_circle_section_background_repeat );
				}
				if ( $counter_circle_section_background_position ) {
					$home_counter_circle_css_data .= sprintf( ' %s;', $counter_circle_section_background_position );
				}
				if ( $counter_circle_section_image != 'none' ) {
					$home_counter_circle_css_data .= sprintf( ' background-size: %s;', $counter_circle_section_image );
				}
			}
			if ( $counter_circle_section_padding_top ) {
				$home_counter_circle_css_data .= sprintf( ' padding-top: %s;', $counter_circle_section_padding_top );
			}
			if ( $counter_circle_section_padding_bottom ) {
				$home_counter_circle_css_data .= sprintf( ' padding-bottom: %s;', $counter_circle_section_padding_bottom );
			}
			if ( $counter_circle_section_padding_left ) {
				$home_counter_circle_css_data .= sprintf( ' padding-left: %s;', $counter_circle_section_padding_left );
			}
			if ( $counter_circle_section_padding_right ) {
				$home_counter_circle_css_data .= sprintf( ' padding-right: %s;', $counter_circle_section_padding_right );
			}

			$css_data .= ' .home-counter-circle {' . $home_counter_circle_css_data . ' }';

			/*
				-- WooCommerce Products
				--------------------------------------- */

			if ( class_exists( 'Woocommerce' ) ) {

				$woo_product_enabled = '';
				$woo_product         = evolve_theme_mod( 'evl_front_elements_content_area', array() );

				if ( ! empty( $woo_product ) && is_array( $woo_product ) ) {
					foreach ( $woo_product as $woo_product_id => $woo_product_id_label ) {
						if ( 'woocommerce_product' == $woo_product_id ) {
							$woo_product_enabled = true;
						}
					}

					$home_woo_product_css_data = '';

					if ( $woo_product_section_back_color ) {
						$home_woo_product_css_data .= sprintf( ' background-color: %s;', $woo_product_section_back_color );
					}
					if ( $woo_product_section_image_src ) {
						$home_woo_product_css_data .= sprintf( ' background: url(%s)', $woo_product_section_image_src );
						if ( $woo_product_section_background_repeat ) {
							$home_woo_product_css_data .= sprintf( ' %s', $woo_product_section_background_repeat );
						}
						if ( $woo_product_section_background_position ) {
							$home_woo_product_css_data .= sprintf( ' %s;', $woo_product_section_background_position );
						}
						if ( $woo_product_section_image != 'none' ) {
							$home_woo_product_css_data .= sprintf( ' background-size: %s;', $woo_product_section_image );
						}
					}
					if ( $woo_product_section_padding_top ) {
						$home_woo_product_css_data .= sprintf( ' padding-top: %s;', $woo_product_section_padding_top );
					}
					if ( $woo_product_section_padding_bottom ) {
						$home_woo_product_css_data .= sprintf( ' padding-bottom: %s;', $woo_product_section_padding_bottom );
					}
					if ( $woo_product_section_padding_left ) {
						$home_woo_product_css_data .= sprintf( ' padding-left: %s;', $woo_product_section_padding_left );
					}
					if ( $woo_product_section_padding_right ) {
						$home_woo_product_css_data .= sprintf( ' padding-right: %s;', $woo_product_section_padding_right );
					}

					$css_data .= ' .home-woo-product {' . $home_woo_product_css_data . ' }';
				}
			}


			/*
				-- Custom Content
				--------------------------------------- */

			$home_custom_content_css_data = '';

			if ( $custom_content_section_back_color ) {
				$home_custom_content_css_data .= sprintf( ' background-color: %s;', $custom_content_section_back_color );
			}
			if ( isset( $custom_content_section_image_src ) && $custom_content_section_image_src ) {
				$home_custom_content_css_data .= sprintf( ' background: url(%s)', $custom_content_section_image_src );
				if ( $custom_content_section_background_repeat ) {
					$home_custom_content_css_data .= sprintf( ' %s', $custom_content_section_background_repeat );
				}
				if ( $custom_content_section_background_position ) {
					$home_custom_content_css_data .= sprintf( ' %s;', $custom_content_section_background_position );
				}
				if ( $custom_content_section_image != 'none' ) {
					$home_custom_content_css_data .= sprintf( ' background-size: %s;', $custom_content_section_image );
				}
			}
			if ( $custom_content_section_padding_top ) {
				$home_custom_content_css_data .= sprintf( ' padding-top: %s;', $custom_content_section_padding_top );
			}
			if ( $custom_content_section_padding_bottom ) {
				$home_custom_content_css_data .= sprintf( ' padding-bottom: %s;', $custom_content_section_padding_bottom );
			}
			if ( $custom_content_section_padding_left ) {
				$home_custom_content_css_data .= sprintf( ' padding-left: %s;', $custom_content_section_padding_left );
			}
			if ( $custom_content_section_padding_right ) {
				$home_custom_content_css_data .= sprintf( ' padding-right: %s;', $custom_content_section_padding_right );
			}

			$css_data .= ' .home-custom-content {' . $home_custom_content_css_data . ' }';
		}

		/*
			Title, Tagline and Logo Position
			--------------------------------------- */

		if ( evolve_logo_position() == "center" && ! empty( $header_logo ) ) {
			$css_data .= ' #website-title, #tagline { float: none; margin: 5px auto; }  .header-logo-container img { float: none; } #website-title, #tagline, .header-logo-container { display:inline-block; text-align:center; width:100%; } #website-title, #tagline { position: relative; }';
		}

		/*
			Back To Top Button
			--------------------------------------- */

		if ( $pos_button == "left" ) {
			$css_data .= ' #backtotop { left: 2rem; }';
		}
		if ( $pos_button == "right" ) {
			$css_data .= ' #backtotop { right: 2rem; }';
		}
		if ( $pos_button == "middle" || $pos_button == "" ) {
			$css_data .= ' #backtotop { left: 50%; margin-left: -1.2rem; }';
		}

		/*
			Widgets Custom Color
			--------------------------------------- */

		if ( $widget_background == "1" ) {
			if ( $widget_bgcolor != "" ) {
				$css_data .= ' .widget-title-background { position: absolute; top: -1px; bottom: 0; left: -31px; right: -31px; border: 1px solid; border-color: ' . $widget_bgcolor . '; background: ' . $widget_bgcolor . '; }';
			}
		}
		$css_data .= ' .widget-content {';
		if ( $widget_background_image == "1" ) {
			if ( $widget_background == "1" ) {
				$css_data .= ' padding: 30px; background: none; border: none; -webkit-box-shadow: none; box-shadow: none;';
			} else {
				$css_data .= ' background: none; border: none; -webkit-box-shadow: none; box-shadow: none;';
			}
		} else {
			if ( $widget_background == "1" ) {
				$css_data .= ' padding: 30px;';
			} else {
				$css_data .= ' padding: 30px;';
			}
		}
		$css_data .= ' }';
		if ( $widget_background == "1" ) {
			$css_data .= ' .widget-before-title { top: -30px; }';
		}
		if ( $widget_background_image == "1" ) {
			$css_data .= ' .widget::before { -webkit-box-shadow: none; box-shadow: none; }';
		}

		/*
			Primary Links Custom Color
			--------------------------------------- */

		if ( ! empty( $primary_link ) ) {
			$css_data .= ' a, .page-link, .page-link:hover, code, .widget_calendar tbody a, .page-numbers.current { color: ' . $primary_link . '; }';
		}

		/*
			Secondary Links Custom Color
			--------------------------------------- */

		if ( ! empty( $secondary_link ) ) {
			$css_data .= ' .breadcrumb-item:last-child, .breadcrumb-item+.breadcrumb-item::before, .widget a, .post-meta, .post-meta a, .navigation a, .post-content .number-pagination a:link, #wp-calendar td, .no-comment, .comment-meta, .comment-meta a, blockquote, .price del { color: ' . $secondary_link . '; }';
		}

		/*
			Links Hover Color
			--------------------------------------- */

		if ( ! empty( $primary_link ) ) {
			$css_data .= ' a:hover { color: ' . evolve_hex_change( $primary_link, 20 ) . '; }';
		}

		/*
			Header Padding
			--------------------------------------- */

		$css_data .= ' .header { padding-top: ' . $padding_top . '; padding-bottom: ' . $padding_bottom . '; } .header.container { padding-left: ' . $padding_left . '; padding-right: ' . $padding_right . '; } .navbar-nav > li { padding: 0 ' . $menu_padding . 'px; }';

		/*
			Custom Header Image
			--------------------------------------- */

		if ( get_header_image() ) {
			$css_data .= ' .custom-header {	background-image: url(' . esc_url( get_header_image() ) . '); background-position: ' . $background_position . '; background-repeat: ' . $background_repeat . '; position: relative; background-size: ' . $header_image . '; width: 100%; height: 100%; }';
		}

		/*
			Custom Footer Image
			--------------------------------------- */

		if ( $footer_image_src ) {
			$css_data .= ' .footer { background: url(' . esc_url( $footer_image_src ) . ') ' . $footer_background_position . ' ' . $footer_background_repeat . '; border-bottom: 0; background-size: ' . $footer_image . '; width: 100%; }';
		}

		/*
			Header Social Media Links
			--------------------------------------- */

		if ( evolve_theme_mod( 'evl_social_links', 0 ) ) {
			if ( ! empty( $social_color ) ) {
				$css_data .= ' .social-media-links a {';
				if ( ! empty( $social_color ) ) {
					$css_data .= ' color: ' . $social_color . ';';
				}
				if ( $social_box_radius != 'disabled' ) {
					$css_data .= ' border: 1px solid; border-radius: ' . $social_box_radius . 'px; padding: 8px;';
				}
				$css_data .= ' }';
			}
			if ( evolve_theme_mod( 'evl_social_icons_size', '1rem' ) ) {
				$css_data .= ' .social-media-links .icon { height: ' . evolve_theme_mod( 'evl_social_icons_size', '1rem' ) . '; width: ' . evolve_theme_mod( 'evl_social_icons_size', '1rem' ) . '; }';
			}
		}

		/*
			Header Block Background
			--------------------------------------- */

		if ( $scheme_widgets != "" || $scheme_background || $scheme_background_100 == '1' || $scheme_background_repeat ) {
			$css_data .= ' .header-block {';
			if ( $scheme_widgets != "" ) {
				$css_data .= ' background-color: ' . $scheme_widgets . '; background: -o-radial-gradient(circle, ' . $scheme_widgets . ', ' . evolve_hex_change( $scheme_widgets, - 15 ) . '); background: radial-gradient(circle, ' . $scheme_widgets . ', ' . evolve_hex_change( $scheme_widgets, - 15 ) . ');';
			}
			if ( $scheme_background ) {
				$css_data .= ' background-image: url(' . $scheme_background . ');';
			}
			if ( $scheme_background_100 == '1' ) {
				$css_data .= ' background-attachment: fixed; background-position: center center; background-size: cover;';
			} else {
				if ( $scheme_background ) {
					$css_data .= ' background-position: top center;';
				}
			}
			if ( $scheme_background_repeat ) {
				$css_data .= ' background-repeat: ' . $scheme_background_repeat . ';';
			}
			$css_data .= ' }';
		}

		/*
			Button
			--------------------------------------- */

		if ( $button_border_width || ( $button_type == '3d' && $button_bevel_color ) || $button_accent_color || $button_gradient_top_color || $button_gradient_bottom_color || ( $button_shadow == '1' && $button_type == 'Flat' ) || ( $button_shadow == '1' && $button_type == '3d' ) || ( $button_border_width && $button_border_color ) || $button_shape == 'Pill' || $button_shape == 'Round' || $button_shape == 'Square' ) {
			$css_data .= $button_classes . ' {';
			if ( $button_gradient_top_color ) {
				$css_data .= ' background: ' . $button_gradient_top_color . ';';
			}
			if ( $button_gradient_bottom_color ) {
				$css_data .= ' background-image: -webkit-gradient( linear, left bottom, left top, from(' . $button_gradient_bottom_color . '), to(' . $button_gradient_top_color . ') ); background-image: -o-linear-gradient( bottom, ' . $button_gradient_bottom_color . ', ' . $button_gradient_top_color . ' ); background-image: linear-gradient( to top, ' . $button_gradient_bottom_color . ', ' . $button_gradient_top_color . ' );';
			}
			if ( $button_accent_color ) {
				$css_data .= ' color: ' . $button_accent_color . ';';
			}
			if ( $button_shadow == '1' && $button_type == 'Flat' ) {
				$css_data .= ' text-shadow: none; box-shadow: none;';
			}
			if ( $button_shadow == '1' && $button_type == '3d' ) {
				$css_data .= ' text-shadow: none;';
			}
			if ( $button_border_width && $button_border_color ) {
				$css_data .= ' border-color: ' . $button_border_color . ';';
			}
			if ( $button_shape == 'Pill' ) {
				$css_data .= ' border-radius: 2em;';
			}
			if ( $button_shape == 'Round' ) {
				$css_data .= ' border-radius: .3em;';
			}
			if ( $button_shape == 'Square' ) {
				$css_data .= ' border-radius: 0;';
			}
			if ( $button_border_width ) {
				$css_data .= ' border-width: ' . $button_border_width . 'px; border-style: solid;';
			} else {
				$css_data .= ' border: 0px;';
			}
			if ( $button_type == '3d' && $button_bevel_color ) {
				$css_data .= ' -webkit-box-shadow: 0 2px 0 ' . $button_bevel_color . '; box-shadow: 0 2px 0 ' . $button_bevel_color . ';';
			}
			$css_data .= ' }';
			if ( class_exists( 'Woocommerce' ) ) {
				$css_data .= ' .header-wrapper .woocommerce-menu .btn { color: ' . $button_accent_color . '; }';
			}
		}

		if ( $button_border_width || ( $button_type == '3d' && $button_bevel_color ) || ( $button_gradient_top_hover_color && $button_accent_hover_color ) || $button_gradient_bottom_hover_color || $button_accent_hover_color || ( $button_border_width && $button_border_hover_color ) ) {
			$css_data .= $button_hover_classes . ' {';
			if ( $button_accent_hover_color ) {
				$css_data .= ' color: ' . $button_accent_hover_color . ';';
			}
			if ( $button_border_width && $button_border_hover_color ) {
				$css_data .= ' border-color: ' . $button_border_hover_color . ';';
			}
			if ( $button_gradient_top_hover_color && $button_accent_hover_color ) {
				$css_data .= ' background: ' . $button_gradient_top_hover_color . ';';
			}
			if ( $button_gradient_bottom_hover_color ) {
				$css_data .= ' background-image: -webkit-gradient( linear, left bottom, left top, from( ' . $button_gradient_bottom_hover_color . ' ), to( ' . $button_gradient_top_hover_color . ' ) ); background-image: -o-linear-gradient( bottom, ' . $button_gradient_bottom_hover_color . ', ' . $button_gradient_top_hover_color . ' ); background-image: linear-gradient( to top, ' . $button_gradient_bottom_hover_color . ', ' . $button_gradient_top_hover_color . ' );';
			}
			if ( $button_type == '3d' && $button_bevel_color ) {
				$css_data .= ' -webkit-box-shadow: 0 2px 0 ' . $button_border_hover_color . '; box-shadow: 0 2px 0 ' . $button_border_hover_color . ';';
			}
			if ( $button_border_width ) {
				$css_data .= ' border-width: ' . $button_border_width . 'px; border-style: solid;';
			} else {
				$css_data .= ' border: 0px;';
			}
			$css_data .= ' }';
		}

		/*
			Shadow Effect
			--------------------------------------- */

		if ( $shadow_effect == 'disable' ) {
		} else {
			if ( evolve_theme_mod( 'evl_shadow_effect_color', '' ) ) {
				$css_data .= ' #wrapper { text-shadow: 0 1px 1px ' . evolve_theme_mod( 'evl_shadow_effect_color', '' ) . '; }';
			}

			$css_data .= ' #wrapper, .wrapper-customizer { -webkit-box-shadow: 0 0 3px rgba(0, 0, 0, .2); box-shadow: 0 0 3px rgba(0, 0, 0, .2); } .header-block { -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05); box-shadow: 0 1px 1px rgba(0, 0, 0, .05); } .formatted-post { -webkit-box-shadow: 0 0 20px rgba(0, 0, 0, .1) inset; box-shadow: 0 0 20px rgba(0, 0, 0, .1) inset; }';

			if ( $widget_background_image == "0" ) {
				$css_data .= ' .widget::before { -webkit-box-shadow: 0 0 9px rgba(0, 0, 0, 0.6); box-shadow: 0 0 9px rgba(0, 0, 0, 0.6); } .widget-content, thead { -webkit-box-shadow: 1px 1px 0 rgba(255, 255, 255, .9) inset; box-shadow: 1px 1px 0 rgba(255, 255, 255, .9) inset; }';
			}

			if ( evolve_theme_mod( 'evl_footer_reveal', '0' ) != '1' ) {
				$css_data .= ' .footer::before { -webkit-box-shadow: 0 0 9px rgba(0, 0, 0, 0.6); box-shadow: 0 0 9px rgba(0, 0, 0, 0.6); }';
			}
			if ( $widget_background == "1" ) {
				$css_data .= ' .widget-title-background { -webkit-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 0 5px rgba(0, 0, 0, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.29); box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 0 5px rgba(0, 0, 0, 0.3) inset, 0 1px 2px rgba(0, 0, 0, 0.29); }';
			}
		}

		/*
			Form Custom Colors
			--------------------------------------- */

		if ( ! empty( $form_bg_color ) || ! empty( $form_text_color ) || ! empty( $form_border_color ) ) :
			$css_data .= ' input[type=text], input[type=email], input[type=url], input[type=password], input[type=file], input[type=tel], textarea, select, .form-control, .form-control:focus, .select2-container--default .select2-selection--single, a.wpml-ls-item-toggle, .wpml-ls-sub-menu a {';
			if ( ! empty( $form_bg_color ) ) {
				$css_data .= ' background-color: ' . $form_bg_color . ';';
			}
			if ( ! empty( $form_border_color ) ):
				$css_data .= ' border-color: ' . $form_border_color . ';';
			endif;
			if ( ! empty( $form_text_color ) ):
				$css_data .= ' color: ' . $form_text_color . ';';
			endif;
			$css_data .= ' }';
		endif;

		if ( $component_color ) {
			$css_data .= ' .custom-checkbox .custom-control-input:checked~.custom-control-label::before, .custom-radio .custom-control-input:checked~.custom-control-label::before, .nav-pills .nav-link.active, .dropdown-item.active, .dropdown-item:active, .woocommerce-store-notice, .comment-author .fn .badge-primary, .widget.woocommerce .count, .woocommerce-review-link, .woocommerce .onsale, .stars a:hover, .stars a.active { background: ' . $component_color . '; } .form-control:focus, .input-text:focus, input[type=text]:focus, input[type=email]:focus, input[type=url]:focus, input[type=password]:focus, input[type=file]:focus, input[type=tel]:focus, textarea:focus, .page-link:focus, select:focus { border-color: ' . $component_color . '; box-shadow: 0 0 0 0.2rem ' . evolve_hex_rgba( $component_color, .25 ) . '; } .custom-control-input:focus~.custom-control-label::before { box-shadow: 0 0 0 1px #fff, 0 0 0 0.2rem  ' . evolve_hex_rgba( $component_color, .25 ) . '; } .btn.focus, .btn:focus { box-shadow: 0 0 0 0.2rem ' . evolve_hex_rgba( $component_color, .25 ) . '; } :focus { outline-color: ' . evolve_hex_rgba( $component_color, .25 ) . '; } code { border-left-color: ' . $component_color . '; }';
		}

		if ( class_exists( 'Woocommerce' ) && is_user_logged_in() && current_user_can( 'manage_options' ) ) :
			$css_data .= ' .woocommerce-store-notice { top: 32px; }';
		endif;

		/*
			Post Formats
			--------------------------------------- */

		if ( $sticky_post_format == '0' || $aside_post_format == '0' || $audio_post_format == '0' || $chat_post_format == '0' || $gallery_post_format == '0' || $image_post_format == '0' || $link_post_format == '0' || $quote_post_format == '0' || $status_post_format == '0' || $video_post_format == '0' ) {
			if ( $sticky_post_format == '0' ) {
				$format            .= "  .sticky, .sticky.formatted-post .post-content, .sticky.formatted-post .navigation a, .sticky.formatted-post .post-content .number-pagination a:link, .sticky .navigation .page-item.disabled .page-link";
				$format_title      .= "  .sticky .post-title a";
				$format_meta       .= "  .sticky .post-meta, .sticky .post-meta a";
				$format_meta_hover .= "  .sticky .post-meta a:hover";
			}
			if ( $aside_post_format == '0' ) {
				$format            .= ", .format-aside.formatted-post, .format-aside.formatted-post .post-content, .format-aside.formatted-post .navigation a, .format-aside.formatted-post .post-content .number-pagination a:link, .format-aside .navigation .page-item.disabled .page-link";
				$format_title      .= ", .format-aside.formatted-post .post-title a";
				$format_meta       .= ", .format-aside.formatted-post .post-meta, .format-aside.formatted-post .post-meta a";
				$format_meta_hover .= ", .format-aside.formatted-post .post-meta a:hover";
			}
			if ( $audio_post_format == '0' ) {
				$format            .= ", .format-audio.formatted-post, .format-audio.formatted-post .post-content, .format-audio.formatted-post .navigation a, .format-audio.formatted-post .post-content .number-pagination a:link, .format-audio .navigation .page-item.disabled .page-link";
				$format_title      .= ", .format-audio.formatted-post .post-title a";
				$format_meta       .= ", .format-audio.formatted-post .post-meta, .format-audio.formatted-post .post-meta a";
				$format_meta_hover .= ", .format-audio.formatted-post .post-meta a:hover";
			}
			if ( $chat_post_format == '0' ) {
				$format            .= ", .format-chat, .format-chat.formatted-post .post-content, .format-chat.formatted-post .navigation a, .format-chat.formatted-post .post-content .number-pagination a:link, .format-chat .navigation .page-item.disabled .page-link";
				$format_title      .= ", .format-chat.formatted-post .post-title a";
				$format_meta       .= ", .format-chat.formatted-post .post-meta, .format-chat.formatted-post .post-meta a";
				$format_meta_hover .= ", .format-chat.formatted-post .post-meta a:hover";
			}
			if ( $gallery_post_format == '0' ) {
				$format            .= ", .format-gallery.formatted-post, .format-gallery.formatted-post .post-content, .format-gallery.formatted-post .navigation a, .format-gallery.formatted-post .post-content .number-pagination a:link, .format-gallery .navigation .page-item.disabled .page-link";
				$format_title      .= ", .format-gallery.formatted-post .post-title a";
				$format_meta       .= ", .format-gallery.formatted-post .post-meta, .format-gallery.formatted-post .post-meta a";
				$format_meta_hover .= ", .format-gallery.formatted-post .post-meta a:hover";
			}
			if ( $image_post_format == '0' ) {
				$format            .= ", .format-image.formatted-post, .format-image.formatted-post .post-content, .format-image.formatted-post .navigation a, .format-image.formatted-post .post-content .number-pagination a:link, .format-image .navigation .page-item.disabled .page-link";
				$format_title      .= ", .format-image.formatted-post .post-title a";
				$format_meta       .= ", .format-image.formatted-post .post-meta, .format-image.formatted-post .post-meta a";
				$format_meta_hover .= ", .format-image.formatted-post .post-meta a:hover";
			}
			if ( $link_post_format == '0' ) {
				$format            .= ", .format-link.formatted-post, .format-link.formatted-post .post-content, .format-link.formatted-post .navigation a, .format-link.formatted-post .post-content .number-pagination a:link, .format-link .navigation .page-item.disabled .page-link";
				$format_title      .= ", .format-link.formatted-post .post-title a";
				$format_meta       .= ", .format-link.formatted-post .post-meta, .format-link.formatted-post .post-meta a";
				$format_meta_hover .= ", .format-link.formatted-post .post-meta a:hover";
			}
			if ( $quote_post_format == '0' ) {
				$format            .= ", .format-quote.formatted-post, .format-quote.formatted-post .post-content, .format-quote.formatted-post .navigation a, .format-quote.formatted-post .post-content .number-pagination a:link, .format-quote .navigation .page-item.disabled .page-link";
				$format_title      .= ", .format-quote.formatted-post .post-title a";
				$format_meta       .= ", .format-quote.formatted-post .post-meta, .format-quote.formatted-post .post-meta a";
				$format_meta_hover .= ", .format-quote.formatted-post .post-meta a:hover";
			}
			if ( $status_post_format == '0' ) {
				$format            .= ", .format-status.formatted-post, .format-status.formatted-post .post-content, .format-status.formatted-post .navigation a, .format-status.formatted-post .post-content .number-pagination a:link, .format-status .navigation .page-item.disabled .page-link";
				$format_title      .= ", .format-status.formatted-post .post-title a";
				$format_meta       .= ", .format-status.formatted-post .post-meta, .format-status.formatted-post .post-meta a";
				$format_meta_hover .= ", .format-status.formatted-post .post-meta a:hover";
			}
			if ( $video_post_format == '0' ) {
				$format            .= ", .format-video.formatted-post, .format-video.formatted-post .post-content, .format-video.formatted-post .navigation a, .format-video.formatted-post .post-content .number-pagination a:link, .format-video .navigation .page-item.disabled .page-link";
				$format_title      .= ", .format-video.formatted-post .post-title a";
				$format_meta       .= ", .format-video.formatted-post .post-meta, .format-video.formatted-post .post-meta a";
				$format_meta_hover .= ", .format-video.formatted-post .post-meta a:hover";
			}
			$css_data .= evolve_remove_comma( $format ) . ' { color: ' . $post_content_font['color'] . '; background: transparent; -webkit-box-shadow: none; box-shadow: none; }' . evolve_remove_comma( $format_title ) . ' { color: ' . $post_title_font['color'] . '; }' . evolve_remove_comma( $format_meta ) . ' { color: #999; }' . evolve_remove_comma( $format_meta_hover ) . ' { color: ' . $primary_link . '; }';
		}

		/*
			-- Bootstrap / Parallax / Posts Slider
			--------------------------------------- */

		if ( evolve_slider_active( true ) ) {

			// Bootstrap Slider
			if ( evolve_theme_mod( 'evl_bootstrap_slide_title_font_responsive', 'always' ) == 'always' ) {
				$css_data .= ' #bootstrap-slider .carousel-caption h5 { display: block; }';
			}
			if ( evolve_theme_mod( 'evl_bootstrap_slide_content_font_rgba_responsive', 'always' ) == 'always' ) {
				if ( ! empty( $bootstrap_slide_title_font_rgba ) ) {
					$css_data .= ' #bootstrap-slider .carousel-caption h5 { background: ' . $bootstrap_slide_title_font_rgba . '; padding: 1rem; }';
				}
				if ( ! empty( $bootstrap_slide_subtitle_font_rgba ) ) {
					$css_data .= ' #bootstrap-slider .carousel-caption p { background: ' . $bootstrap_slide_subtitle_font_rgba . '; padding: 1rem; }';
				}
			}

			// Parallax Slider
			if ( evolve_theme_mod( 'evl_parallax_slide_title_font_responsive', 'always' ) == 'always' ) {
				$css_data .= ' #parallax-slider .carousel-caption h5 { display: block; }';
			}
			if ( evolve_theme_mod( 'evl_parallax_slide_content_font_rgba_responsive', 'always' ) == 'always' ) {
				if ( ! empty( $parallax_slide_title_font_rgba ) ) {
					$css_data .= ' #parallax-slider .carousel-caption h5 { background: ' . $parallax_slide_title_font_rgba . '; padding: 1rem; }';
				}
				if ( ! empty( $parallax_slide_subtitle_font_rgba ) ) {
					$css_data .= ' #parallax-slider .carousel-caption p { background: ' . $parallax_slide_subtitle_font_rgba . '; padding: 1rem; }';
				}
			}

			// Posts Slider
			if ( evolve_theme_mod( 'evl_carousel_slide_title_font_responsive', 'always' ) == 'always' ) {
				$css_data .= ' #posts-slider .carousel-caption h5 { display: block; }';
			}
			if ( evolve_theme_mod( 'evl_carousel_slide_content_font_rgba_responsive', 'always' ) == 'always' ) {
				if ( ! empty( $posts_slide_title_font_rgba ) ) {
					$css_data .= ' #posts-slider .carousel-caption h5 { background: ' . $posts_slide_title_font_rgba . '; padding: 1rem; }';
				}
				if ( ! empty( $posts_slide_subtitle_font_rgba ) ) {
					$css_data .= ' #posts-slider .carousel-caption p { background: ' . $posts_slide_subtitle_font_rgba . '; padding: 1rem; }';
				}
			}
		}

		if ( is_user_logged_in() && is_customize_preview() ) {
			$css_data .= ' .header-block .carousel-caption { left: 17%; }';
		}

		/*
			bbPress
			--------------------------------------- */

		if ( class_exists( 'bbPress' ) && ( is_bbpress() ) ) {
			$css_data .= ' #bbpress-forums .bbp-body ul.sticky { border-left: 2px solid ' . $primary_link . '; }';
		}

		/*
			WooCommerce
			--------------------------------------- */

		if ( class_exists( 'Woocommerce' ) ) {
			if ( is_shop() || is_product_category() || is_product_tag() || is_woocommerce() || ( is_front_page() && $woo_product_enabled ) ) {
				$css_data .= ' .products.card-columns { -webkit-column-count: ' . esc_attr( wc_get_loop_prop( 'columns' ) ) . '; column-count: ' . esc_attr( wc_get_loop_prop( 'columns' ) ) . '; }';
			}
		}

		/*
			Responsive Dynamic Definitions
			======================================= */

		/*
			Min-Width 992px or Min-Width 1200px or Min-Width Defined and Max-Width 1198.98px - Desktop
			--------------------------------------- */

		$css_data .= ' @media (min-width: 992px), (min-width: 1200px), (min-width: ' . $min_width_px . 'px) and (max-width: 1198.98px) {';
		if ( ( is_front_page() && is_page() ) || is_home() ) {
			if ( $width_px && ( $frontpage_width_layout == "fixed" ) ) {
				$css_data .= ' .container, #wrapper { width: 100%; max-width: ' . $width_px . 'px; }';
			} else {
				$css_data .= ' .container { width: 100%; max-width: ' . $width_px . 'px; } .header-block .container:first-child { width: 100%; }';
			}
		} else {
			if ( $width_px && ( $width_layout == "fixed" ) ) {
				$css_data .= ' .container, #wrapper { width: 100%; max-width: ' . $width_px . 'px; }';
			} else {
				$css_data .= ' .container { width: 100%; max-width: ' . $width_px . 'px; } .header-block .container:first-child { width: 100%; }';
			}
		}

		/*
			-- Bootstrap / Parallax / Posts Slider
			--------------------------------------- */

		if ( evolve_slider_active( true ) ) {

			// Bootstrap Slider
			if ( evolve_theme_mod( 'evl_bootstrap_slide_title_font_responsive', 'always' ) == 'desktop' ) {
				$css_data .= ' #bootstrap-slider .carousel-caption h5 { display: block; }';
			}

			// Parallax Slider
			if ( evolve_theme_mod( 'evl_parallax_slide_title_font_responsive', 'always' ) == 'desktop' ) {
				$css_data .= ' #parallax-slider .carousel-caption h5 { display: block; }';
			}

			// Posts Slider
			if ( evolve_theme_mod( 'evl_carousel_slide_title_font_responsive', 'always' ) == 'desktop' ) {
				$css_data .= ' #posts-slider .carousel-caption h5 { display: block; }';
			}
		}

		$css_data .= '}';

		/*
			Max-Width 991.98px - Tablet
			--------------------------------------- */

		$css_data .= ' @media (max-width: 991.98px) {';

		/*
			-- Bootstrap / Parallax / Posts Slider
			--------------------------------------- */

		// Bootstrap Slider
		if ( evolve_theme_mod( 'evl_bootstrap_slide_content_font_rgba_responsive', 'always' ) == 'desktop' ) {
			if ( ! empty( $bootstrap_slide_title_font_rgba ) ) {
				$css_data .= ' #bootstrap-slider .carousel-caption h5 { background: ' . $bootstrap_slide_title_font_rgba . '; padding: 1rem; }';
			}
			if ( ! empty( $bootstrap_slide_subtitle_font_rgba ) ) {
				$css_data .= ' #bootstrap-slider .carousel-caption p { background: ' . $bootstrap_slide_subtitle_font_rgba . '; padding: 1rem; }';
			}
		}

		// Parallax Slider
		if ( evolve_theme_mod( 'evl_parallax_slide_content_font_rgba_responsive', 'always' ) == 'desktop' ) {
			if ( ! empty( $parallax_slide_title_font_rgba ) ) {
				$css_data .= ' #parallax-slider .carousel-caption h5 { background: ' . $parallax_slide_title_font_rgba . '; padding: 1rem; }';
			}
			if ( ! empty( $parallax_slide_subtitle_font_rgba ) ) {
				$css_data .= ' #parallax-slider .carousel-caption p { background: ' . $parallax_slide_subtitle_font_rgba . '; padding: 1rem; }';
			}
		}

		// Posts Slider
		if ( evolve_theme_mod( 'evl_carousel_slide_content_font_rgba_responsive', 'always' ) == 'desktop' ) {
			if ( ! empty( $posts_slide_title_font_rgba ) ) {
				$css_data .= ' #posts-slider .carousel-caption h5 { background: ' . $posts_slide_title_font_rgba . '; padding: 1rem; }';
			}
			if ( ! empty( $posts_slide_subtitle_font_rgba ) ) {
				$css_data .= ' #posts-slider .carousel-caption p { background: ' . $posts_slide_subtitle_font_rgba . '; padding: 1rem; }';
			}
		}

		/*
			-- WooCommerce
			--------------------------------------- */

		if ( class_exists( 'Woocommerce' ) ) {
			if ( is_shop() || is_product_category() || is_product_tag() || is_product() || is_woocommerce() || ( is_front_page() && $woo_product_enabled ) ) {
				$css_data .= ' .products.card-columns { -webkit-column-count: 3; column-count: 3; }';
			}
		}
		$css_data .= '}';

		/*
			Min-Width 768px - Tablet
			--------------------------------------- */

		$css_data .= ' @media (min-width: 768px) {';
		$css_data .= ' .sticky-header { width: 100%; left: 0; right: 0; margin: 0 auto; z-index: 99999; }';

		$css_data .= ' .header-wrapper .main-menu { padding-top: ' . $menu_height . 'px; padding-bottom: ' . $menu_height . 'px; }';

		if ( evolve_theme_mod( 'evl_tagline_pos', 'disable' ) == 'next' || evolve_theme_mod( 'evl_tagline_pos', 'disable' ) == 'above' ) {
			$css_data .= ' #website-title { margin: 0; }';
		}

		if ( evolve_theme_mod( 'evl_main_menu_hover_effect', 'rollover' ) != 'disabled' ) {
			$css_data .= ' a:hover span.link-effect, a:focus span.link-effect { -webkit-transform: translateY(-100%); -ms-transform: translateY(-100%); transform: translateY(-100%); }';
		}
		if ( $post_layout == "two" ) {
			$css_data .= ' .posts.card-columns { -webkit-column-count: 2; column-count: 2; }';
		}
		if ( $post_layout == "three" ) {
			$css_data .= ' .posts.card-columns { -webkit-column-count: 3; column-count: 3; }';
		}
		if ( evolve_logo_position() == "right" ) {
			$css_data .= ' .header-logo-container img { float: right; margin: 15px 0; }';
		}

		switch ( evolve_theme_mod( 'evl_header_type', 'none' ) ) {
			case "none":
				if ( $social_box_radius != 'disabled' ) {
					$css_data .= ' .header-v1 .social-media-links li:last-child a { margin-right: 0; }';
				} else {
					$css_data .= ' .header-v1 .social-media-links li:last-child a { padding-right: 0; }';
				}
				break;
			case "h1":
				if ( $social_box_radius != 'disabled' ) {
					$css_data .= ' .header-v2 .social-media-links li:first-child a { margin-left: 0; }';
				} else {
					$css_data .= ' .header-v2 .social-media-links li:first-child a { padding-left: 0; }';
				}
				break;
		}

		/*
			-- Header 2 Style
			--------------------------------------- */

		if ( evolve_theme_mod( 'evl_header_type', 'none' ) == 'h1' ) {
			$css_data .= ' .header-v2 .search-form .icon-search { right: 41px; } .header-v2 .header-search .form-control { margin-right: 16px; width: 240px; padding-left: 25px; padding-right: 45px; text-indent: 1px;';
			if ( ! empty( $custom_header_color ) ) {
				$css_data .= ' background: ' . evolve_hex_change( $custom_header_color ) . ';';
			}
			$css_data .= ' }';
		}

		/*
			-- Bootstrap / Parallax / Posts Slider
			--------------------------------------- */

		if ( evolve_slider_active( true ) ) {

			// Bootstrap Slider
			if ( evolve_theme_mod( 'evl_bootstrap_slide_title_font_responsive', 'always' ) == 'tablet' ) {
				$css_data .= ' #bootstrap-slider .carousel-caption h5 { display: block; }';
			}

			// Parallax Slider
			if ( evolve_theme_mod( 'evl_parallax_slide_title_font_responsive', 'always' ) == 'tablet' ) {
				$css_data .= ' #parallax-slider .carousel-caption h5 { display: block; }';
			}

			// Posts Slider
			if ( evolve_theme_mod( 'evl_carousel_slide_title_font_responsive', 'always' ) == 'tablet' ) {
				$css_data .= ' #posts-slider .carousel-caption h5 { display: block; }';
			}
		}

		/*
			-- WooCommerce
			--------------------------------------- */

		if ( class_exists( 'Woocommerce' ) && is_product() ) {
			$css_data .= ' .products.card-columns { -webkit-column-count: 3; column-count: 3; }';
			$css_data .= ' .stars a { -ms-flex-preferred-size: 0; flex-basis: 0; -ms-flex-positive: 1; flex-grow: 1; margin-right: 1rem; } .stars a:last-child { margin-right: 0; }';
		}

		$css_data .= '}';

		/*
			Max-Width 767.98px - Landscape Phone
			--------------------------------------- */

		$css_data .= ' @media (max-width: 767.98px) {';
		if ( $responsive_menu_layout == 'dropdown' ) {
			$css_data .= ' .navbar-nav .menu-item-has-children ul li .dropdown-toggle { padding-bottom: .7rem; } .navbar-nav .menu-item-has-children .dropdown-menu { margin-top: 0; }';
		}
		if ( ! ( '' == evolve_theme_mod( 'evl_menu_back_color', '#273039' ) ) ) {
			$css_data .= ' .navbar-nav li, .navbar-nav, .navbar-nav .dropdown-menu, .navbar-toggler { border-color: ' . evolve_hex_change( $menu_back_color ) . '; } .navbar-toggler, .navbar-nav li, .navbar-nav, .navbar-nav .dropdown-menu { background: ' . evolve_hex_change( $menu_back_color, - 8 ) . '; }';
		}
		if ( $post_layout == "two" ) {
			$css_data .= ' .posts.card-columns { -webkit-column-count: 1; column-count: 1; }';
		}

		/*
			-- Header Styles
			--------------------------------------- */

		if ( evolve_theme_mod( 'evl_header_type', 'none' ) == 'h1' ) {
			if ( ! ( '' == $custom_header_color ) ) {
				$css_data .= ' .header-v2 .search-form .form-control:focus { background: ' . evolve_hex_change( $custom_header_color, - 8 ) . '; }';
			}
		}

		/*
			-- Bootstrap / Parallax / Posts Slider
			--------------------------------------- */

		if ( evolve_slider_active( true ) ) {
			$css_data .= ' #bootstrap-slider .carousel-caption h5, #parallax-slider .carousel-caption h5, #posts-slider .carousel-caption h5 { font-size: 1.8rem; }';

			// Bootstrap Slider
			if ( evolve_theme_mod( 'evl_bootstrap_slide_content_font_rgba_responsive', 'always' ) == 'tablet' ) {
				if ( ! empty( $bootstrap_slide_title_font_rgba ) ) {
					$css_data .= ' #bootstrap-slider .carousel-caption h5 { background: ' . $bootstrap_slide_title_font_rgba . '; padding: 1rem; }';
				}
				if ( ! empty( $bootstrap_slide_subtitle_font_rgba ) ) {
					$css_data .= ' #bootstrap-slider .carousel-caption p { background: ' . $bootstrap_slide_subtitle_font_rgba . '; padding: 1rem; }';
				}
			}

			// Parallax Slider
			if ( evolve_theme_mod( 'evl_parallax_slide_content_font_rgba_responsive', 'always' ) == 'tablet' ) {
				if ( ! empty( $parallax_slide_title_font_rgba ) ) {
					$css_data .= ' #parallax-slider .carousel-caption h5 { background: ' . $parallax_slide_title_font_rgba . '; padding: 1rem; }';
				}
				if ( ! empty( $parallax_slide_subtitle_font_rgba ) ) {
					$css_data .= ' #parallax-slider .carousel-caption p { background: ' . $parallax_slide_subtitle_font_rgba . '; padding: 1rem; }';
				}
			}

			// Posts Slider
			if ( evolve_theme_mod( 'evl_carousel_slide_content_font_rgba_responsive', 'always' ) == 'tablet' ) {
				if ( ! empty( $posts_slide_title_font_rgba ) ) {
					$css_data .= ' #posts-slider .carousel-caption h5 { background: ' . $posts_slide_title_font_rgba . '; padding: 1rem; }';
				}
				if ( ! empty( $posts_slide_subtitle_font_rgba ) ) {
					$css_data .= ' #posts-slider .carousel-caption p { background: ' . $posts_slide_subtitle_font_rgba . '; padding: 1rem; }';
				}
			}
		}

		/*
			-- WooCommerce
			--------------------------------------- */

		if ( class_exists( 'Woocommerce' ) ) {
			if ( is_shop() || is_product_category() || is_product_tag() || is_product() || is_woocommerce() || ( is_front_page() && $woo_product_enabled ) ) {
				$css_data .= ' .products.card-columns { -webkit-column-count: 2; column-count: 2; }';
			}
		}

		$css_data .= '}';

		/*
			Min-Width 576px - Phone
			--------------------------------------- */

		$css_data .= ' @media (min-width: 576px) {';

		/*
			-- Bootstrap / Parallax / Posts Slider
			--------------------------------------- */

		if ( evolve_slider_active( true ) ) {

			// Bootstrap Slider
			if ( evolve_theme_mod( 'evl_bootstrap_slide_title_font_responsive', 'always' ) == 'phone' ) {
				$css_data .= ' #bootstrap-slider .carousel-caption h5 { display: block; }';
			}

			// Parallax Slider
			if ( evolve_theme_mod( 'evl_parallax_slide_title_font_responsive', 'always' ) == 'phone' ) {
				$css_data .= ' #parallax-slider .carousel-caption h5 { display: block; }';
			}

			// Posts Slider
			if ( evolve_theme_mod( 'evl_carousel_slide_title_font_responsive', 'always' ) == 'phone' ) {
				$css_data .= ' #posts-slider .carousel-caption h5 { display: block; }';
			}
		}

		$css_data .= '}';

		/*
			Max-Width 575.98px - Small Phone
			--------------------------------------- */

		$css_data .= ' @media (max-width: 575.98px) {';
		if ( $post_layout == "three" ) {
			$css_data .= ' .posts.card-columns { -webkit-column-count: 1; column-count: 1; }';
		}

		/*
			-- Header Styles
			--------------------------------------- */

		if ( evolve_theme_mod( 'evl_header_type', 'none' ) == 'none' ) {
			if ( ! ( '' == evolve_theme_mod( 'evl_menu_back_color', '#273039' ) ) ) {
				$menu_back_color = evolve_theme_mod( 'evl_menu_back_color', '#273039' );
				$css_data        .= ' .header-v1 .search-form .form-control { background: ' . evolve_hex_change( $menu_back_color, - 8 ) . '; }';
			}
		}
		if ( evolve_theme_mod( 'evl_header_type', 'none' ) == 'h1' ) {
			if ( ! ( '' == $custom_header_color ) ) {
				$css_data .= ' .header-v2 .search-form .form-control { background: ' . evolve_hex_change( $custom_header_color, - 8 ) . '; }';
			}
		}

		/*
			-- Bootstrap / Parallax / Posts Slider
			--------------------------------------- */

		if ( evolve_slider_active( true ) ) {
			$css_data .= ' #bootstrap-slider .carousel-caption h5, #parallax-slider .carousel-caption h5, #posts-slider .carousel-caption h5 a { font-size: 1.5rem; margin: 0; }';

			// Bootstrap Slider
			if ( evolve_theme_mod( 'evl_bootstrap_slide_content_font_rgba_responsive', 'always' ) == 'phone' ) {
				if ( ! empty( $bootstrap_slide_title_font_rgba ) ) {
					$css_data .= ' #bootstrap-slider .carousel-caption h5 { background: ' . $bootstrap_slide_title_font_rgba . '; padding: 1rem; }';
				}
				if ( ! empty( $bootstrap_slide_subtitle_font_rgba ) ) {
					$css_data .= ' #bootstrap-slider .carousel-caption p { background: ' . $bootstrap_slide_subtitle_font_rgba . '; padding: 1rem; }';
				}
			}

			// Parallax Slider
			if ( evolve_theme_mod( 'evl_parallax_slide_content_font_rgba_responsive', 'always' ) == 'phone' ) {
				if ( ! empty( $parallax_slide_title_font_rgba ) ) {
					$css_data .= ' #parallax-slider .carousel-caption h5 { background: ' . $parallax_slide_title_font_rgba . '; padding: 1rem; }';
				}
				if ( ! empty( $parallax_slide_subtitle_font_rgba ) ) {
					$css_data .= ' #parallax-slider .carousel-caption p { background: ' . $parallax_slide_subtitle_font_rgba . '; padding: 1rem; }';
				}
			}

			// Posts Slider
			if ( evolve_theme_mod( 'evl_carousel_slide_content_font_rgba_responsive', 'always' ) == 'phone' ) {
				if ( ! empty( $posts_slide_title_font_rgba ) ) {
					$css_data .= ' #posts-slider .carousel-caption h5 { background: ' . $posts_slide_title_font_rgba . '; padding: 1rem; }';
				}
				if ( ! empty( $posts_slide_subtitle_font_rgba ) ) {
					$css_data .= ' #posts-slider .carousel-caption p { background: ' . $posts_slide_subtitle_font_rgba . '; padding: 1rem; }';
				}
			}

		}

		/*
			-- WooCommerce
			--------------------------------------- */

		if ( class_exists( 'Woocommerce' ) ) {
			if ( is_shop() || is_product_category() || is_product_tag() || is_product() || is_woocommerce() || ( is_front_page() && $woo_product_enabled ) ) {
				$css_data .= ' .products.card-columns { -webkit-column-count: 1; column-count: 1; }';
			}
		}

		$css_data .= '}';

		return $css_data;
	}
}