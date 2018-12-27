<?php 
add_action( 'wp_enqueue_scripts', 'seo_writers_blogily_enqueue_styles' );
function seo_writers_blogily_enqueue_styles() {
	wp_enqueue_style( 'seo-seo-writers-blogily', get_template_directory_uri() . '/style.css' ); 
} 

function seo_writers_blogily_customize_register( $wp_customize ) {
	$wp_customize->add_section( 'footer_settings', array(
		'title'      => __('Footer Settings','seo-writers-blogily'),
		'priority'   => 20,
		'capability' => 'edit_theme_options',
		) );
	$wp_customize->add_setting( 'footer_background', array(
		'default'           => '#eee',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_background', array(
		'label'       => __( 'Background Color', 'seo-writers-blogily' ),
		'section'     => 'footer_settings',
		'priority'   => 1,
		'settings'    => 'footer_background',
		) ) );

	$wp_customize->add_setting( 'footer_widget_headline', array(
		'default'           => '#333',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_widget_headline', array(
		'label'       => __( 'Widget Headline Color', 'seo-writers-blogily' ),
		'section'     => 'footer_settings',
		'priority'   => 1,
		'settings'    => 'footer_widget_headline',
		) ) );
	$wp_customize->add_setting( 'footer_widget_border', array(
		'default'           => '#565656',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_widget_border', array(
		'label'       => __( 'Widget Border Color', 'seo-writers-blogily' ),
		'section'     => 'footer_settings',
		'priority'   => 1,
		'settings'    => 'footer_widget_border',
		) ) );
	$wp_customize->add_setting( 'footer_widget_text', array(
		'default'           => '#565656',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_widget_text', array(
		'label'       => __( 'Widget Text Color', 'seo-writers-blogily' ),
		'section'     => 'footer_settings',
		'priority'   => 1,
		'settings'    => 'footer_widget_text',
		) ) );
	$wp_customize->add_setting( 'footer_widget_link', array(
		'default'           => '#565656',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_widget_link', array(
		'label'       => __( 'Widget Link Color', 'seo-writers-blogily' ),
		'section'     => 'footer_settings',
		'priority'   => 1,
		'settings'    => 'footer_widget_link',
		) ) );

	$wp_customize->add_setting( 'footer_copyright_link', array(
		'default'           => '#565656',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_copyright_link', array(
		'label'       => __( 'Copyright Link Color', 'seo-writers-blogily' ),
		'section'     => 'footer_settings',
		'priority'   => 1,
		'settings'    => 'footer_copyright_link',
		) ) );

	$wp_customize->add_setting( 'footer_copyright_text', array(
		'default'           => '#dedede',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_copyright_text', array(
		'label'       => __( 'Copyright Text Color', 'seo-writers-blogily' ),
		'section'     => 'footer_settings',
		'priority'   => 1,
		'settings'    => 'footer_copyright_text',
		) ) );


}
add_action( 'customize_register', 'seo_writers_blogily_customize_register' );

if(! function_exists('seo_writers_blogily_customize_register_output' ) ):
	function seo_writers_blogily_customize_register_output(){
		?>

			<style type="text/css">
		/* Navigation */
		.main-navigation a, #site-navigation span.dashicons.dashicons-menu:before, .iot-menu-left-ul a { color: <?php echo esc_attr(get_theme_mod( 'navigation_link_color')); ?>; }
		.navigation-wrapper, .main-navigation ul ul, #iot-menu-left{ background: <?php echo esc_attr(get_theme_mod( 'navigation_background_color')); ?>; }
		<?php if ( get_theme_mod( 'hide_navigation' ) == '1' ) : ?>
		.navigation-wrapper {display: none;}
		<?php endif; ?>
		<?php if ( get_theme_mod( 'display_navigation_tagline' ) == '1' ) : ?>
		.site-description {display:block;}
		.main-navigation a {line-height:63px;}
		<?php endif; ?>


		/* Global */
		.single .content-area a, .page .content-area a { color: <?php echo esc_attr(get_theme_mod( 'global_link')); ?>; }
		.page .content-area a.button, .single .page .content-area a.button {color:#fff;}
		a.button,a.button:hover,a.button:active,a.button:focus, button, input[type="button"], input[type="reset"], input[type="submit"] { background: <?php echo esc_attr(get_theme_mod( 'global_link')); ?>; }
		.tags-links a, .cat-links a{ border-color: <?php echo esc_attr(get_theme_mod( 'global_link')); ?>; }
		.single main article .entry-meta *, .single main article .entry-meta, .archive main article .entry-meta *, .comments-area .comment-metadata time{ color: <?php echo esc_attr(get_theme_mod( 'global_byline')); ?>; }
		.single .content-area h1, .single .content-area h2, .single .content-area h3, .single .content-area h4, .single .content-area h5, .single .content-area h6, .page .content-area h1, .page .content-area h2, .page .content-area h3, .page .content-area h4, .page .content-area h5, .page .content-area h6, .page .content-area th, .single .content-area th, .blog.related-posts main article h4 a, .single b.fn, .page b.fn, .error404 h1, .search-results h1.page-title, .search-no-results h1.page-title, .archive h1.page-title{ color: <?php echo esc_attr(get_theme_mod( 'global_headline')); ?>; }
		.comment-respond p.comment-notes, .comment-respond label, .page .site-content .entry-content cite, .comment-content *, .about-the-author, .page code, .page kbd, .page tt, .page var, .page .site-content .entry-content, .page .site-content .entry-content p, .page .site-content .entry-content li, .page .site-content .entry-content div, .comment-respond p.comment-notes, .comment-respond label, .single .site-content .entry-content cite, .comment-content *, .about-the-author, .single code, .single kbd, .single tt, .single var, .single .site-content .entry-content, .single .site-content .entry-content p, .single .site-content .entry-content li, .single .site-content .entry-content div, .error404 p, .search-no-results p { color: <?php echo esc_attr(get_theme_mod( 'global_content')); ?>; }
		.page .entry-content blockquote, .single .entry-content blockquote, .comment-content blockquote { border-color: <?php echo esc_attr(get_theme_mod( 'global_content')); ?>; }
		.error-404 input.search-field, .about-the-author, .comments-title, .related-posts h3, .comment-reply-title{ border-color: <?php echo esc_attr(get_theme_mod( 'global_borders')); ?>; }

		<?php if ( get_theme_mod( 'fullwidth_pages' ) == '1' ) : ?>
		.page #primary.content-area { width: 100%; max-width: 100%;}
		.page aside#secondary { display: none; }
		<?php endif; ?>

		<?php if ( get_theme_mod( 'fullwidth_posts' ) == '1' ) : ?>
		.single div#primary.content-area { width: 100%; max-width: 100%; }
		.single aside#secondary { display: none; }
		<?php endif; ?>


		/* Sidebar */
		#secondary h4, #secondary h1, #secondary h2, #secondary h3, #secondary h5, #secondary h6, #secondary h4 a{ color: <?php echo esc_attr(get_theme_mod( 'sidebar_headline')); ?>; }
		#secondary span.rpwwt-post-title{ color: <?php echo esc_attr(get_theme_mod( 'sidebar_headline')); ?> !important; }
		#secondary select, #secondary h4, .blog #secondary input.search-field, .blog #secondary input.search-field, .search-results #secondary input.search-field, .archive #secondary input.search-field { border-color: <?php echo esc_attr(get_theme_mod( 'sidebar_border')); ?>; }
		#secondary * { color: <?php echo esc_attr(get_theme_mod( 'sidebar_text')); ?>; }
		#secondary .rpwwt-post-date{ color: <?php echo esc_attr(get_theme_mod( 'sidebar_text')); ?> !important; }
		#secondary a { color: <?php echo esc_attr(get_theme_mod( 'sidebar_link')); ?>; }
		#secondary .search-form input.search-submit, .search-form input.search-submit, input.search-submit { background: <?php echo esc_attr(get_theme_mod( 'sidebar_link')); ?>; }

		/* Blog Feed */
		body.custom-background.blog, body.blog, body.custom-background.archive, body.archive, body.custom-background.search-results, body.search-results{ background-color: <?php echo esc_attr(get_theme_mod( 'blog_site_background')); ?>; }
		.blog main article, .search-results main article, .archive main article{ background-color: <?php echo esc_attr(get_theme_mod( 'blog_post_background')); ?>; }
		.blog main article h2 a, .search-results main article h2 a, .archive main article h2 a{ color: <?php echo esc_attr(get_theme_mod( 'blog_post_headline')); ?>; }
		.blog main article .entry-meta, .archive main article .entry-meta, .search-results main article .entry-meta{ color: <?php echo esc_attr(get_theme_mod( 'blog_post_byline')); ?>; }
		.blog main article p, .search-results main article p, .archive main article p { color: <?php echo esc_attr(get_theme_mod( 'blog_post_excerpt')); ?>; }
		.nav-links span, .nav-links a, .pagination .current, .nav-links span:hover, .nav-links a:hover, .pagination .current:hover { background: <?php echo esc_attr(get_theme_mod( 'blog_post_navigation_bg')); ?>; }
		.nav-links span, .nav-links a, .pagination .current, .nav-links span:hover, .nav-links a:hover, .pagination .current:hover{ color: <?php echo esc_attr(get_theme_mod( 'blog_post_navigation_link')); ?>; }

		<?php if ( get_theme_mod( 'blog_feed_fullwidth' ) == '1' ) : ?>
		.fp-blog-grid {
			width: 100% !important;
			max-width: 100% !important;
		}
		.blog #secondary,
		.archive #secondary,
		.search-results #secondary {
			display:none;
		}
		.blog main article, .search-results main article, .archive main article {
			flex: 0 0 32%;
			max-width: 32%;
		}
		.blog main, .search-results main, .archive main {
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
		}
		@media screen and (max-width: 900px) {
			.blog main article, .search-results main article, .archive main article {
				flex: 0 0 48%;
				max-width: 48%;
			}
		}
		@media screen and (max-width: 700px) {
			.blog main article, .search-results main article, .archive main article {
				flex: 0 0 100%;
				max-width: 100%;
			}
			.blog main article, .search-results main article, .archive main article {
				display: inline-block;
				flex-wrap: none;
				float: left;
				width: 100%;
				justify-content: none;
			}
		}
		<?php endif; ?>


		/* Slideshow */
		.slider-content { padding-top: <?php echo esc_attr(get_theme_mod( 'slideshow_top_padding')); ?>px; }
		.slider-content { padding-bottom: <?php echo esc_attr(get_theme_mod( 'slideshow_bottom_padding')); ?>px; }
		.owl-theme .owl-dots .owl-dot span { background: <?php echo esc_attr(get_theme_mod( 'slideshow_dots_color')); ?>; }
		.owl-theme .owl-dots .owl-dot span { border-color: <?php echo esc_attr(get_theme_mod( 'slideshow_dots_color')); ?>; }
		.owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span{ background: <?php echo esc_attr(get_theme_mod( 'slideshow_current_dots_color')); ?>; }
		.owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span{ border: <?php echo esc_attr(get_theme_mod( 'slideshow_current_dots_color')); ?>; }
		/**** Slide 1 */
		.slide_one { background: <?php echo esc_attr(get_theme_mod( 'slide_one_background_color')); ?>; }
		.slide_one.owl-item .slideshow-button { background: <?php echo esc_attr(get_theme_mod( 'slide_one_button_background_color')); ?>; }
		.slide_one.owl-item .slideshow-button { color: <?php echo esc_attr(get_theme_mod( 'slide_one_button_text_color')); ?>; }
		.slide_one.owl-item p { color: <?php echo esc_attr(get_theme_mod( 'slide_one_tagline_color')); ?>; }
		.slide_one.owl-item h3 { color: <?php echo esc_attr(get_theme_mod( 'slide_one_title_color')); ?>; }
		/**** Slide 3 */
		.slide_three { background: <?php echo esc_attr(get_theme_mod( 'slide_three_background_color')); ?>; }
		.slide_three.owl-item .slideshow-button { background: <?php echo esc_attr(get_theme_mod( 'slide_three_button_background_color')); ?>; }
		.slide_three.owl-item .slideshow-button { color: <?php echo esc_attr(get_theme_mod( 'slide_three_button_text_color')); ?>; }
		.slide_three.owl-item p { color: <?php echo esc_attr(get_theme_mod( 'slide_three_tagline_color')); ?>; }
		.slide_three.owl-item h3 { color: <?php echo esc_attr(get_theme_mod( 'slide_three_title_color')); ?>; }

		/**** Slide 5 */
		.slide_five { background: <?php echo esc_attr(get_theme_mod( 'slide_five_background_color')); ?>; }
		.slide_five.owl-item .slideshow-button { background: <?php echo esc_attr(get_theme_mod( 'slide_five_button_background_color')); ?>; }
		.slide_five.owl-item .slideshow-button { color: <?php echo esc_attr(get_theme_mod( 'slide_five_button_text_color')); ?>; }
		.slide_five.owl-item p { color: <?php echo esc_attr(get_theme_mod( 'slide_five_tagline_color')); ?>; }
		.slide_five.owl-item h3 { color: <?php echo esc_attr(get_theme_mod( 'slide_five_title_color')); ?>; }

		/**** Slide 7 */
		.slide_seven { background: <?php echo esc_attr(get_theme_mod( 'slide_seven_background_color')); ?>; }
		.slide_seven.owl-item .slideshow-button { background: <?php echo esc_attr(get_theme_mod( 'slide_seven_button_background_color')); ?>; }
		.slide_seven.owl-item .slideshow-button { color: <?php echo esc_attr(get_theme_mod( 'slide_seven_button_text_color')); ?>; }
		.slide_seven.owl-item p { color: <?php echo esc_attr(get_theme_mod( 'slide_seven_tagline_color')); ?>; }
		.slide_seven.owl-item h3 { color: <?php echo esc_attr(get_theme_mod( 'slide_seven_title_color')); ?>; }
		/**** Slide 9 */
		.slide_nine { background: <?php echo esc_attr(get_theme_mod( 'slide_nine_background_color')); ?>; }
		.slide_nine.owl-item .slideshow-button { background: <?php echo esc_attr(get_theme_mod( 'slide_nine_button_background_color')); ?>; }
		.slide_nine.owl-item .slideshow-button { color: <?php echo esc_attr(get_theme_mod( 'slide_nine_button_text_color')); ?>; }
		.slide_nine.owl-item p { color: <?php echo esc_attr(get_theme_mod( 'slide_nine_tagline_color')); ?>; }
		.slide_nine.owl-item h3 { color: <?php echo esc_attr(get_theme_mod( 'slide_nine_title_color')); ?>; }


		/* Landing Page */

		/**** Pagebuilder section */
		.sitebuilder-section h1, .sitebuilder-section h2, .sitebuilder-section h3, .sitebuilder-section h4, .sitebuilder-section h5, .sitebuilder-section h6, .sitebuilder-section td  { color: <?php echo esc_attr(get_theme_mod( 'pagebuilder_headline_color')); ?>; }
		.sitebuilder-section p, .sitebuilder-section div, .sitebuilder-section ol, .sitebuilder-section ul,.sitebuilder-section li, .sitebuilder-section, .sitebuilder-section cite { color: <?php echo esc_attr(get_theme_mod( 'pagebuilder_text_color')); ?>; }
		.sitebuilder-section a { color: <?php echo esc_attr(get_theme_mod( 'pagebuilder_link_color')); ?>; }
		.sitebuilder-section a.button, .sitebuilder-section a.button:hover, .sitebuilder-section a.button:active, .sitebuilder-section a.button:focus{ background: <?php echo esc_attr(get_theme_mod( 'pagebuilder_link_color')); ?>; }
		.sitebuilder-section { padding-top: <?php echo esc_attr(get_theme_mod( 'pagebuilder_top_padding')); ?>px; }
		.sitebuilder-section { padding-bottom: <?php echo esc_attr(get_theme_mod( 'pagebuilder_bottom_padding')); ?>px; }
		.sitebuilder-section { background: <?php echo esc_attr(get_theme_mod( 'pagebuilder_background_color')); ?>; }

		/**** Grid section */
		.grid-section { padding-top: <?php echo esc_attr(get_theme_mod( 'gridsection_top_padding')); ?>px; }
		.grid-section { padding-bottom: <?php echo esc_attr(get_theme_mod( 'gridsection_bottom_padding')); ?>px; }
		.grid-section h3 { color: <?php echo esc_attr(get_theme_mod( 'grid_section_headline')); ?>; }
		.grid-section p { color: <?php echo esc_attr(get_theme_mod( 'grid_section_text')); ?>; }
		.grid-section { background-color: <?php echo esc_attr(get_theme_mod( 'grid_section_bg')); ?>; }

		/**** About section */
		.about-section { padding-top: <?php echo esc_attr(get_theme_mod( 'aboutsection_top_padding')); ?>px; }
		.about-section { padding-bottom: <?php echo esc_attr(get_theme_mod( 'aboutsection_bottom_padding')); ?>px; }
		.about-section { background-color: <?php echo esc_attr(get_theme_mod( 'about_section_background_color')); ?>; }
		.about-section .about-tagline { color: <?php echo esc_attr(get_theme_mod( 'about_section_tagline_color')); ?>; }
		.about-section h2 { color: <?php echo esc_attr(get_theme_mod( 'about_section_title_color')); ?>; }
		.about-section h2:after { background: <?php echo esc_attr(get_theme_mod( 'about_section_title_color')); ?>; }
		.about-section p { color: <?php echo esc_attr(get_theme_mod( 'about_section_description_color')); ?>; }

		/**** Blog posts section */
		.page-template-landing-page-design .blog { padding-top: <?php echo esc_attr(get_theme_mod( 'blogsection_top_padding')); ?>px; }
		.page-template-landing-page-design .blog { padding-bottom: <?php echo esc_attr(get_theme_mod( 'blogsection_bottom_padding')); ?>px; }
		.landing-page-description h2 { color: <?php echo esc_attr(get_theme_mod( 'blog_section_headline_color')); ?>; }
		.landing-page-description p { color: <?php echo esc_attr(get_theme_mod( 'blog_section_text_color')); ?>; }
		.page-template-landing-page-design .blog { background: <?php echo esc_attr(get_theme_mod( 'blog_section_background_color')); ?>; }
		.page-template-landing-page-design .blog .entry-meta, .page-template-landing-page-design .blog .entry-meta *{ color: <?php echo esc_attr(get_theme_mod( 'blog_section_blogposts_byline')); ?>; }
		.page-template-landing-page-design .blog main article { background: <?php echo esc_attr(get_theme_mod( 'blog_section_blogposts_background')); ?>; }
		.page-template-landing-page-design .blog { background: <?php echo esc_attr(get_theme_mod( 'blog_section_background_color')); ?>; }
		.page-template-landing-page-design .blog main article h2 a { color: <?php echo esc_attr(get_theme_mod( 'blog_section_blogposts_headline')); ?>; }
		.page-template-landing-page-design .blog main article p { color: <?php echo esc_attr(get_theme_mod( 'blog_section_blogposts_excerpt')); ?>; }
		.blog-post-button-wrapper .blog-button { background: <?php echo esc_attr(get_theme_mod( 'lp_button_bg_color')); ?>; }
		.blog-post-button-wrapper .blog-button { color: <?php echo esc_attr(get_theme_mod( 'lp_button_text_color')); ?>; }


		/**** Blog posts section */
		.sitebuilder-section {
			-webkit-box-ordinal-group: <?php echo esc_attr(get_theme_mod( 'pagebuilder_section_order')); ?>;
			-moz-box-ordinal-group: <?php echo esc_attr(get_theme_mod( 'pagebuilder_section_order')); ?>;
			-ms-flex-order: <?php echo esc_attr(get_theme_mod( 'pagebuilder_section_order')); ?>; 
			-webkit-order: <?php echo esc_attr(get_theme_mod( 'pagebuilder_section_order')); ?>; 
			order: <?php echo esc_attr(get_theme_mod( 'pagebuilder_section_order')); ?>;
		}
		.grid-section {
			-webkit-box-ordinal-group: <?php echo esc_attr(get_theme_mod( 'grid_section_order')); ?>;
			-moz-box-ordinal-group: <?php echo esc_attr(get_theme_mod( 'grid_section_order')); ?>;
			-ms-flex-order: <?php echo esc_attr(get_theme_mod( 'grid_section_order')); ?>; 
			-webkit-order: <?php echo esc_attr(get_theme_mod( 'grid_section_order')); ?>; 
			order: <?php echo esc_attr(get_theme_mod( 'grid_section_order')); ?>;
		}
		.about-section {
			-webkit-box-ordinal-group: <?php echo esc_attr(get_theme_mod( 'about_section_order')); ?>;
			-moz-box-ordinal-group: <?php echo esc_attr(get_theme_mod( 'about_section_order')); ?>;
			-ms-flex-order: <?php echo esc_attr(get_theme_mod( 'about_section_order')); ?>; 
			-webkit-order: <?php echo esc_attr(get_theme_mod( 'about_section_order')); ?>; 
			order: <?php echo esc_attr(get_theme_mod( 'about_section_order')); ?>;
		}
		.blog-section-wrapper .blog {
			-webkit-box-ordinal-group: <?php echo esc_attr(get_theme_mod( 'blog_section_order')); ?>;
			-moz-box-ordinal-group: <?php echo esc_attr(get_theme_mod( 'blog_section_order')); ?>;
			-ms-flex-order: <?php echo esc_attr(get_theme_mod( 'blog_section_order')); ?>; 
			-webkit-order: <?php echo esc_attr(get_theme_mod( 'blog_section_order')); ?>; 
			order: <?php echo esc_attr(get_theme_mod( 'blog_section_order')); ?>;
		}

		/* Footer */
		.footer-container, .footer-widgets-container { background: <?php echo esc_attr(get_theme_mod( 'footer_background')); ?>; }
		.footer-widgets-container h4, .footer-widgets-container h1, .footer-widgets-container h2, .footer-widgets-container h3, .footer-widgets-container h5, .footer-widgets-container h4 a, .footer-widgets-container th, .footer-widgets-container caption { color: <?php echo esc_attr(get_theme_mod( 'footer_widget_headline')); ?>; }
		.footer-widgets-container h4, .footer-widgets-container { border-color: <?php echo esc_attr(get_theme_mod( 'footer_widget_border')); ?>; }
		.footer-column *, .footer-column p, .footer-column li { color: <?php echo esc_attr(get_theme_mod( 'footer_widget_text')); ?>; }
		.footer-column a, .footer-menu li a { color: <?php echo esc_attr(get_theme_mod( 'footer_widget_link')); ?>; }
		.site-info a { color: <?php echo esc_attr(get_theme_mod( 'footer_copyright_link')); ?>; }
		.site-info { color: <?php echo esc_attr(get_theme_mod( 'footer_copyright_text')); ?>; }


		</style>
		<?php }
		add_action( 'wp_head', 'seo_writers_blogily_customize_register_output' );
		endif;
