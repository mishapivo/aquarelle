<?php 
add_action( 'wp_enqueue_scripts', 'simple_responsiveblogily_enqueue_styles' );
function simple_responsiveblogily_enqueue_styles() {
	wp_enqueue_style( 'simple_responsiveblogily-style', get_template_directory_uri() . '/style.css' ); 
} 


function simple_responsiveblogily_customize_register( $wp_customize ) {

	/* New Section */
	$wp_customize->add_section( 'navigation_settings', array(
		'title'      => __('Navigation Settings','responsiveblogily'),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
		) );

	$wp_customize->add_setting( 'navigation_background_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navigation_background_color', array(
		'label'       => __( 'Background Color', 'responsiveblogily' ),
		'section'     => 'navigation_settings',
		'priority'   => 1,
		'settings'    => 'navigation_background_color',
		) ) );

	$wp_customize->add_setting( 'navigation_text_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navigation_text_color', array(
		'label'       => __( 'Link Color', 'responsiveblogily' ),
		'section'     => 'navigation_settings',
		'priority'   => 1,
		'settings'    => 'navigation_text_color',
		) ) );

	$wp_customize->add_setting( 'navigation_border_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navigation_border_color', array(
		'label'       => __( 'Border Color', 'responsiveblogily' ),
		'section'     => 'navigation_settings',
		'priority'   => 1,
		'settings'    => 'navigation_border_color',
		) ) );

}
add_action( 'customize_register', 'simple_responsiveblogily_customize_register' );




if(! function_exists('simple_responsiveblogily_customizer_css_final_output' ) ):
	function simple_responsiveblogily_customizer_css_final_output(){
		?>

    <style type="text/css">

    .top-widget-single { background: <?php echo esc_attr(get_theme_mod( 'topwidgets_bg_color')); ?>; }
    .header-container{ padding-top: <?php echo esc_attr(get_theme_mod( 'header_top_padding')); ?>px; }
    .header-container{ padding-bottom: <?php echo esc_attr(get_theme_mod( 'header_bottom_padding')); ?>px; }
    .header-widgets h3 { color: <?php echo esc_attr(get_theme_mod( 'header_widget_titles')); ?>; }
    .header-widgets, .header-widgets p, .header-widgets li, .header-widgets table td, .header-widgets table th, .header-widgets   { color: <?php echo esc_attr(get_theme_mod( 'header_widget_text')); ?>; }
    .header-widgets a, .header-widgets a, .header-widgets .menu li a { color: <?php echo esc_attr(get_theme_mod( 'header_widget_link')); ?>; }
    header#masthead { background-color: <?php echo esc_attr(get_theme_mod( 'header_bg_color')); ?>; }
    .site-title{ color: <?php echo esc_attr(get_theme_mod( 'header_title_color')); ?>; }
    p.site-description{ color: <?php echo esc_attr(get_theme_mod( 'header_tagline_color')); ?>; }
    .button-divider{ background-color: <?php echo esc_attr(get_theme_mod( 'header_button_divider_color')); ?>; }
    .header-button{ border-color: <?php echo esc_attr(get_theme_mod( 'header_button_color')); ?>; }
    .header-button, .header-button-text{ color: <?php echo esc_attr(get_theme_mod( 'header_button_color')); ?>; }
    .header-button-text:after { background: <?php echo esc_attr(get_theme_mod( 'header_button_color')); ?>; }
    #site-navigation .menu li, #site-navigation .menu .sub-menu, #site-navigation .menu .children, nav#site-navigation{ background: <?php echo esc_attr(get_theme_mod( 'navigation_background_color')); ?>; }
    #site-navigation .menu li a, #site-navigation .menu li a:hover, #site-navigation .menu li a:active, #site-navigation .menu > li.menu-item-has-children > a:after, #site-navigation ul.menu ul a, #site-navigation .menu ul ul a, #site-navigation ul.menu ul a:hover, #site-navigation .menu ul ul a:hover, div#top-search a, div#top-search a:hover { color: <?php echo esc_attr(get_theme_mod( 'navigation_link_color')); ?>; }
    .m_menu_icon { background-color: <?php echo esc_attr(get_theme_mod( 'navigation_link_color')); ?>; }
    #top-social a, #top-social a:hover, #top-social a:active, #top-social a:focus, #top-social a:visited{ color: <?php echo esc_attr(get_theme_mod( 'navigation_social_link_color')); ?>; }  
    .top-widgets h1, .top-widgets h2, .top-widgets h3, .top-widgets h4, .top-widgets h5, .top-widgets h6 { color: <?php echo esc_attr(get_theme_mod( 'topwidgets_headline_color')); ?>; }
    .top-widgets p, .top-widgets, .top-widgets li, .top-widgets ol, .top-widgets cite{ color: <?php echo esc_attr(get_theme_mod( 'topwidgets_text_color')); ?>; }
    .top-widget-fullwidth h3:after{ background: <?php echo esc_attr(get_theme_mod( 'topwidgets_headline_color')); ?>; }
    .top-widgets ul li a, .top-widgets a, .top-widgets a:hover, .top-widgets a:visited, .top-widgets a:focus, .top-widgets a:active, .top-widgets ol li a, .top-widgets li a, .top-widgets .menu li a, .top-widgets .menu li a:hover, .top-widgets .menu li a:active, .top-widgets .menu li a:focus{ color: <?php echo esc_attr(get_theme_mod( 'topwidgets_link_color')); ?>; }
    .blog-feed-category a{ color: <?php echo esc_attr(get_theme_mod( 'blogpage_category_color')); ?>; }
    .blog h2.entry-title a, .nav-previous a, .nav-next a { color: <?php echo esc_attr(get_theme_mod( 'blogpage_headline_color')); ?>; }
    .blog-feed-post-wrapper .blog-feed-meta * { color: <?php echo esc_attr(get_theme_mod( 'blogpage_date_color')); ?>; }
    .blog-feed-post-wrapper p { color: <?php echo esc_attr(get_theme_mod( 'blogpage_text_color')); ?>; }
    .blog .entry-more a { color: <?php echo esc_attr(get_theme_mod( 'blogpage_button_color')); ?>; }
    .blog .entry-more a { border-color: <?php echo esc_attr(get_theme_mod( 'blogpage_button_color')); ?>; }
    .blog .entry-more a:hover { background: <?php echo esc_attr(get_theme_mod( 'blogpage_button_color')); ?>; }
    .blog .entry-more a:hover { border-color: <?php echo esc_attr(get_theme_mod( 'blogpage_button_color')); ?>; }
    .blog #primary article.post { border-color: <?php echo esc_attr(get_theme_mod( 'blogpage_border_color')); ?>; }
    .single-post .comment-metadata time, .page .comment-metadata time, .single-post time.entry-date.published, .page time.entry-date.published, .single-post .posted-on a, .page .posted-on a { color: <?php echo esc_attr(get_theme_mod( 'postpage_date')); ?>; }
    .single-post #main th, .page #main th, .single-post .entry-cate a h2.entry-title, .single-post h1.entry-title, .page h2.entry-title, .page h1.entry-title, .single-post #main h1, .single-post #main h2, .single-post #main h3, .single-post #main h4, .single-post #main h5, .single-post #main h6, .page #main h1, .page #main h2, .page #main h3, .page #main h4, .page #main h5, .page #main h6 { color: <?php echo esc_attr(get_theme_mod( 'postpage_headline')); ?>; }
    .comments-title:after{ background: <?php echo esc_attr(get_theme_mod( 'postpage_headline')); ?>; }
    .post #main .nav-next a:before, .single-post #main .nav-previous a:before, .page #main .nav-previous a:before, .single-post #main .nav-next a:before, .single-post #main a, .page #main a{ color: <?php echo esc_attr(get_theme_mod( 'postpage_link')); ?>; }
    .page #main, .page #main p, .page #main th,.page .comment-form label, .single-post #main, .single-post #main p, .single-post #main th,.single-post .comment-form label, .single-post .comment-author .fn, .page .comment-author .fn   { color: <?php echo esc_attr(get_theme_mod( 'postpage_text')); ?>; }
    .single-post .comment-form input.submit, .page .comment-form input.submit { background: <?php echo esc_attr(get_theme_mod( 'postpage_button')); ?>; }
    .single-post .comment-form input.submit:hover, .page .comment-form input.submit:hover { background-color: <?php echo esc_attr(get_theme_mod( 'postpage_button')); ?>; }
    .single-post #main .entry-cate a, .page #main .entry-cate a { color: <?php echo esc_attr(get_theme_mod( 'postpage_category')); ?>; }
    .single-post .comment-content, .page .comment-content, .single-post .navigation.post-navigation, .page .navigation.post-navigation, .single-post #main td, .page #main td,  .single-post #main th, .page #main th, .page #main input[type="url"], .single-post #main input[type="url"],.page #main input[type="text"], .single-post #main input[type="text"],.page #main input[type="email"], .single-post #main input[type="email"], .page #main textarea, .single-post textarea, .page .comments-area { border-color: <?php echo esc_attr(get_theme_mod( 'postpage_border')); ?>; }
    .top-widget-wrapper{ border-color: <?php echo esc_attr(get_theme_mod( 'topwidgets_border_color')); ?>; }
    .footer-widgets-wrapper{ background: <?php echo esc_attr(get_theme_mod( 'footer_background')); ?>; }
    .footer-widgets-wrapper h1, .footer-widgets-wrapper h2,  .footer-widgets-wrapper h3,  .footer-widgets-wrapper h4,  .footer-widgets-wrapper h5,  .footer-widgets-wrapper h6 { color: <?php echo esc_attr(get_theme_mod( 'footer_headline')); ?>; }
    .footer-widget-single, .footer-widget-single p, .footer-widgets-wrapper p, .footer-widgets-wrapper { color: <?php echo esc_attr(get_theme_mod( 'footer_text')); ?>; }
    .footer-widgets-wrapper  ul li a, .footer-widgets-wrapper li a,.footer-widgets-wrapper a,.footer-widgets-wrapper a:hover,.footer-widgets-wrapper a:active,.footer-widgets-wrapper a:focus, .footer-widget-single a, .footer-widget-single a:hover, .footer-widget-single a:active{ color: <?php echo esc_attr(get_theme_mod( 'footer_link')); ?>; }
    .footer-widget-single h3, .footer-widgets .search-form input.search-field { border-color: <?php echo esc_attr(get_theme_mod( 'footer_border')); ?>; }
    footer .site-info { background: <?php echo esc_attr(get_theme_mod( 'footer_copyright_background')); ?>; }
    footer .site-info { color: <?php echo esc_attr(get_theme_mod( 'footer_copyright_text')); ?>; }
    .readmore-btn { background: <?php echo esc_attr(get_theme_mod( 'blogpage_link_color')); ?>; }
    .blog-feed-post-wrapper, .blog .nav-previous a,.blog .nav-next a { background: <?php echo esc_attr(get_theme_mod( 'blogpage_background_color')); ?>; }
    .single-post main#main, .page main#main, .error404 main#main, .search-no-results main#main { background: <?php echo esc_attr(get_theme_mod( 'postpage_bg')); ?>; }
    p.site-before_title { color: <?php echo esc_attr(get_theme_mod( 'header_before_title_color')); ?>; }
    p.site-description { color: <?php echo esc_attr(get_theme_mod( 'header_before_description_color')); ?>; }
    .footer-widget-single h3:after { background: <?php echo esc_attr(get_theme_mod( 'footer_headline')); ?>; }
}   
</style>
		<?php }
		add_action( 'wp_head', 'simple_responsiveblogily_customizer_css_final_output' );
		endif;