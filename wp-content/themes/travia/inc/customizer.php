<?php
/**
 * Travia Theme Customizer
 *
 * @package Travia
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function travia_customize_register( $wp_customize ) {
	
function travia_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		
	$wp_customize->add_setting('color_scheme', array(
		'default' => '#157acf',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','travia'),
			'description'	=> __('Select color from here.','travia'),
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	$wp_customize->add_setting('topbar_color', array(
		'default' => '#000000',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'topbar_color',array(
			'description'	=> __('Select background color for topbar.','travia'),
			'section' => 'colors',
			'settings' => 'topbar_color'
		))
	);
	
	$wp_customize->add_setting('header_color', array(
		'default' => '#1a7878',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'header_color',array(
			'description'	=> __('Select background color for header.','travia'),
			'section' => 'colors',
			'settings' => 'header_color'
		))
	);
	
	$wp_customize->add_setting('menu_color', array(
		'default' => '#ffffff',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'menu_color',array(
			'description'	=> __('Select hover color for menu.','travia'),
			'section' => 'colors',
			'settings' => 'menu_color'
		))
	);
	
	$wp_customize->add_setting('footer_color', array(
		'default' => '#282a2b',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'footer_color',array(
			'description'	=> __('Select background color for footer.','travia'),
			'section' => 'colors',
			'settings' => 'footer_color'
		))
	);
	
	// Slider Section Start		
	$wp_customize->add_section(
        'slider_section',
        array(
            'title' => __('Slider Settings', 'travia'),
            'priority' => null,
			'description'	=> __('Recommended image size (1420x567). Slider will be visible only when you select static front page.','travia'),	
        )
    );
	
	$wp_customize->add_setting('page-setting7',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting7',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','travia'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting8',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting8',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','travia'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting9',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting9',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','travia'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('slide_text',array(
		'default'	=> __('Explore','travia'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('slide_text',array(
		'label'	=> __('Add slider link button text.','travia'),
		'section'	=> 'slider_section',
		'setting'	=> 'slide_text',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('hide_slider',array(
			'default' => true,
			'sanitize_callback' => 'travia_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_slider', array(
		   'settings' => 'hide_slider',
    	   'section'   => 'slider_section',
    	   'label'     => __('Check this to hide slider','travia'),
    	   'type'      => 'checkbox'
     ));	
	
	// Slider Section End
	
	
	 // Topbar Info		
	$wp_customize->add_section(
        'topbar_section',
        array(
            'title' => __('Topbar Info', 'travia'),
            'priority' => null,
			'description'	=> __('Add content for topbar','travia'),	
        )
    );

	$wp_customize->add_setting('email',array(
			'default' => null,
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'sanitize_email'
	));
	
	$wp_customize->add_control('email',array(
			'type'	=> 'text',
			'label'	=> __('Add email address.','travia'),
			'section'	=> 'topbar_section'
	));
	
	
	$wp_customize->add_setting('phone',array(
			'default' => null,
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('phone',array(
			'type'	=> 'text',
			'label'	=> __('Add phone number.','travia'),
			'section'	=> 'topbar_section'
	));
	
	// Social icons here
	
	// First section for social icon
	
	$wp_customize->add_setting('scname1',array(
			'default' => null,
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('scname1',array(
			'type'	=> 'text',
			'label'	=> __('Social Section 1.','travia'),
			'description' => __('Add social icon here. All the letters should be in lowercase.','travia'),
			'section'	=> 'topbar_section'
	));
	
	$wp_customize->add_setting('sclink1',array(
			'default' => null,
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('sclink1',array(
			'type'	=> 'text',
			'description' => __('Add social icon link here.','travia'),
			'section'	=> 'topbar_section'
	));	 
	
	// Second section for social icon
	
	$wp_customize->add_setting('scname2',array(
			'default' => null,
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('scname2',array(
			'type'	=> 'text',
			'label'	=> __('Social Section 2.','travia'),
			'description' => __('Add social icon name here. All the letters should be in lowercase.','travia'),
			'section'	=> 'topbar_section'
	));
	
	$wp_customize->add_setting('sclink2',array(
			'default' => null,
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('sclink2',array(
			'type'	=> 'text',
			'description' => __('Add social icon link here.','travia'),
			'section'	=> 'topbar_section'
	));
	
	
	// Third section for social icon
	
	$wp_customize->add_setting('scname3',array(
			'default' => null,
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('scname3',array(
			'type'	=> 'text',
			'label'	=> __('Social Section 3.','travia'),
			'description' => __('Add social icon name here. All the letters should be in lowercase.','travia'),
			'section'	=> 'topbar_section'
	));
	
	$wp_customize->add_setting('sclink3',array(
			'default' => null,
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('sclink3',array(
			'type'	=> 'text',
			'description' => __('Add social icon link here.','travia'),
			'section'	=> 'topbar_section'
	));
	
	// Fourth section for social icon
	
	$wp_customize->add_setting('scname4',array(
			'default' => null,
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('scname4',array(
			'type'	=> 'text',
			'label'	=> __('Social Section 4.','travia'),
			'description' => __('Add social icon name here. All the letters should be in lowercase.','travia'),
			'section'	=> 'topbar_section'
	));
	
	$wp_customize->add_setting('sclink4',array(
			'default' => null,
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('sclink4',array(
			'type'	=> 'text',
			'description' => __('Add social icon link here.','travia'),
			'section'	=> 'topbar_section'
	));	
	
	$wp_customize->add_setting('hide_topbar',array(
			'default' => true,
			'sanitize_callback' => 'travia_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'hide_topbar', array(
		   'settings' => 'hide_topbar',
    	   'section'   => 'topbar_section',
    	   'label'     => __('Check this to hide topbar','travia'),
    	   'type'      => 'checkbox'
     ));		
	
}
	
	
add_action( 'customize_register', 'travia_customize_register' );	

function travia_css(){
		?>
        <style>
				a, 
				.tm_client strong,
				.postmeta a:hover,
				#sidebar ul li a:hover,
				.blog-post h3.entry-title,
				.home-section .home-left h3{
					color:<?php echo esc_html(get_theme_mod('color_scheme','#157acf')); ?>;
				}
				.main-nav ul li a:hover,
				.sitenav ul li a:hover, 
				.sitenav ul li.current_page_item a, 
				.sitenav ul li:hover a.parent,
				.sitenav ul li ul.sub-menu li a:hover, 
				.sitenav ul li.current_page_item ul.sub-menu li a:hover, 
				.sitenav ul li ul.sub-menu li.current_page_item a{
					color:<?php echo esc_html(get_theme_mod('menu_color','#ffffff')); ?>;
				}
				a.blog-more:hover,
				#commentform input#submit,
				input.search-submit,
				.nivo-controlNav a.active,
				.blog-date .date,
				.home-section .home-left a.ReadMore,
				.nav-links .current, .nav-links a:hover{
					background-color:<?php echo esc_html(get_theme_mod('color_scheme','#157acf')); ?>;
				}
				.header-top{
					background-color:<?php echo esc_html(get_theme_mod('topbar_color','#000000')); ?>;
				}
				a.morebutton{
					border-color:<?php echo esc_html(get_theme_mod('color_scheme','#157acf')); ?>;
				}
				.copyright-wrapper{
					background-color:<?php echo esc_html(get_theme_mod('footer_color','#282a2b')); ?>;
				}
				#header{
					background-color:<?php echo esc_html(get_theme_mod('header_color','#1a7878')); ?>;
				}
				@media screen and (max-width: 980px){
					.header_right .sitenav ul li a:hover{
							color:<?php echo esc_html(get_theme_mod('menu_color','#fdc300')); ?> !important;
						}	
				}
		</style>
	<?php }
add_action('wp_head','travia_css');

function travia_customize_preview_js() {
	wp_enqueue_script( 'travia-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20141216', true );
}
add_action( 'customize_preview_init', 'travia_customize_preview_js' );