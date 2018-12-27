<?php    
/**
 *Legal Adviser Lite Theme Customizer
 *
 * @package Legal Adviser Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function legal_adviser_lite_customize_register( $wp_customize ) {	
	
	function legal_adviser_lite_sanitize_dropdown_pages( $page_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $page_id = absint( $page_id );
	
	  // If $page_id is an ID of a published page, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	function legal_adviser_lite_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}  
		
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	 //Panel for section & control
	$wp_customize->add_panel( 'legal_adviser_lite_panel_area', array(
		'priority' => null,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Options Panel', 'legal-adviser-lite' ),		
	) );
	
	//Site Layout Options
	$wp_customize->add_section('legal_adviser_lite_layout_type',array(
		'title' => __('Site Layout Option','legal-adviser-lite'),			
		'priority' => 1,
		'panel' => 	'legal_adviser_lite_panel_area',          
	));		
	
	$wp_customize->add_setting('legal_adviser_lite_boxlayout_option',array(
		'sanitize_callback' => 'legal_adviser_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'legal_adviser_lite_boxlayout_option', array(
    	'section'   => 'legal_adviser_lite_layout_type',    	 
		'label' => __('Check to Box Layout','legal-adviser-lite'),
		'description' => __('If you want to box layout please check the Box Layout Option.','legal-adviser-lite'),
    	'type'      => 'checkbox'
     )); // Site Layout Section 
	
	$wp_customize->add_setting('legal_adviser_lite_color_scheme',array(
		'default' => '#f75340',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'legal_adviser_lite_color_scheme',array(
			'label' => __('Color Scheme','legal-adviser-lite'),			
			'description' => __('More color options in available PRO Version','legal-adviser-lite'),
			'section' => 'colors',
			'settings' => 'legal_adviser_lite_color_scheme'
		))
	);	
	
	//Site Header Contact Info
	$wp_customize->add_section('legal_adviser_lite_contactinfo_section',array(
		'title' => __('Header Contact Option','legal-adviser-lite'),				
		'priority' => null,
		'panel' => 	'legal_adviser_lite_panel_area',
	));
	
	$wp_customize->add_setting('legal_adviser_lite_header_phoneno',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('legal_adviser_lite_header_phoneno',array(	
		'type' => 'text',
		'label' => __('Add phone number here','legal-adviser-lite'),
		'section' => 'legal_adviser_lite_contactinfo_section',
		'setting' => 'legal_adviser_lite_header_phoneno'
	));	
	
	$wp_customize->add_setting('legal_adviser_lite_header_emailid',array(
		'sanitize_callback' => 'sanitize_email'
	));
	
	$wp_customize->add_control('legal_adviser_lite_header_emailid',array(
		'type' => 'text',
		'label' => __('Add email address here.','legal-adviser-lite'),
		'section' => 'legal_adviser_lite_contactinfo_section'
	));	
	
	$wp_customize->add_setting('legal_adviser_lite_show_top_contactdetails',array(
		'default' => false,
		'sanitize_callback' => 'legal_adviser_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'legal_adviser_lite_show_top_contactdetails', array(
	   'settings' => 'legal_adviser_lite_show_top_contactdetails',
	   'section'   => 'legal_adviser_lite_contactinfo_section',
	   'label'     => __('Check To show This Section','legal-adviser-lite'),
	   'type'      => 'checkbox'
	 ));//Show header contact info
	
	
	 
	 //Header social icons
	$wp_customize->add_section('legal_adviser_lite_social_section',array(
		'title' => __('Header social Options','legal-adviser-lite'),
		'description' => __( 'Add social icons link here to display icons in header', 'legal-adviser-lite' ),			
		'priority' => null,
		'panel' => 	'legal_adviser_lite_panel_area', 
	));
	
	$wp_customize->add_setting('legal_adviser_lite_fb_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'	
	));
	
	$wp_customize->add_control('legal_adviser_lite_fb_link',array(
		'label' => __('Add facebook link here','legal-adviser-lite'),
		'section' => 'legal_adviser_lite_social_section',
		'setting' => 'legal_adviser_lite_fb_link'
	));	
	
	$wp_customize->add_setting('legal_adviser_lite_twitt_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('legal_adviser_lite_twitt_link',array(
		'label' => __('Add twitter link here','legal-adviser-lite'),
		'section' => 'legal_adviser_lite_social_section',
		'setting' => 'legal_adviser_lite_twitt_link'
	));
	
	$wp_customize->add_setting('legal_adviser_lite_gplus_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('legal_adviser_lite_gplus_link',array(
		'label' => __('Add google plus link here','legal-adviser-lite'),
		'section' => 'legal_adviser_lite_social_section',
		'setting' => 'legal_adviser_lite_gplus_link'
	));
	
	$wp_customize->add_setting('legal_adviser_lite_linked_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('legal_adviser_lite_linked_link',array(
		'label' => __('Add linkedin link here','legal-adviser-lite'),
		'section' => 'legal_adviser_lite_social_section',
		'setting' => 'legal_adviser_lite_linked_link'
	));
	
	$wp_customize->add_setting('legal_adviser_lite_anable_social',array(
		'default' => false,
		'sanitize_callback' => 'legal_adviser_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'legal_adviser_lite_anable_social', array(
	   'settings' => 'legal_adviser_lite_anable_social',
	   'section'   => 'legal_adviser_lite_social_section',
	   'label'     => __('Check To show This Section','legal-adviser-lite'),
	   'type'      => 'checkbox'
	 ));//Show Header Social icons Section 			
	
	// Slider Section		
	$wp_customize->add_section( 'legal_adviser_lite_sldroption', array(
		'title' => __('Slider Options', 'legal-adviser-lite'),
		'priority' => null,
		'description' => __('Default image size for slider is 1400 x 700 pixel.','legal-adviser-lite'), 
		'panel' => 	'legal_adviser_lite_panel_area',           			
    ));
	
	$wp_customize->add_setting('legal_adviser_lite_sldrpge1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'legal_adviser_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('legal_adviser_lite_sldrpge1',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide one:','legal-adviser-lite'),
		'section' => 'legal_adviser_lite_sldroption'
	));	
	
	$wp_customize->add_setting('legal_adviser_lite_sldrpge2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'legal_adviser_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('legal_adviser_lite_sldrpge2',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide two:','legal-adviser-lite'),
		'section' => 'legal_adviser_lite_sldroption'
	));	
	
	$wp_customize->add_setting('legal_adviser_lite_sldrpge3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'legal_adviser_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('legal_adviser_lite_sldrpge3',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide three:','legal-adviser-lite'),
		'section' => 'legal_adviser_lite_sldroption'
	));	// Slider Section	
	
	$wp_customize->add_setting('legal_adviser_lite_sldrmore',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('legal_adviser_lite_sldrmore',array(	
		'type' => 'text',
		'label' => __('Add slider Read more button name here','legal-adviser-lite'),
		'section' => 'legal_adviser_lite_sldroption',
		'setting' => 'legal_adviser_lite_sldrmore'
	)); // Slider Read More Button Text
	
	$wp_customize->add_setting('legal_adviser_lite_sldrshow',array(
		'default' => false,
		'sanitize_callback' => 'legal_adviser_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'legal_adviser_lite_sldrshow', array(
	    'settings' => 'legal_adviser_lite_sldrshow',
	    'section'   => 'legal_adviser_lite_sldroption',
	     'label'     => __('Check To Show This Section','legal-adviser-lite'),
	   'type'      => 'checkbox'
	 ));//Show Slider Section	
	 
	 
	// Services section
	$wp_customize->add_section('legal_adviser_lite_srvscolumn_section', array(
		'title' => __('Services Section','legal-adviser-lite'),
		'description' => __('Select pages from the dropdown for services section','legal-adviser-lite'),
		'priority' => null,
		'panel' => 	'legal_adviser_lite_panel_area',          
	));	
	
	$wp_customize->add_setting('legal_adviser_lite_srvpgebx1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'legal_adviser_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'legal_adviser_lite_srvpgebx1',array(
		'type' => 'dropdown-pages',			
		'section' => 'legal_adviser_lite_srvscolumn_section',
	));		
	
	$wp_customize->add_setting('legal_adviser_lite_srvpgebx2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'legal_adviser_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'legal_adviser_lite_srvpgebx2',array(
		'type' => 'dropdown-pages',			
		'section' => 'legal_adviser_lite_srvscolumn_section',
	));
	
	$wp_customize->add_setting('legal_adviser_lite_srvpgebx3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'legal_adviser_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'legal_adviser_lite_srvpgebx3',array(
		'type' => 'dropdown-pages',			
		'section' => 'legal_adviser_lite_srvscolumn_section',
	));
	
	
	$wp_customize->add_setting('legal_adviser_lite_anablesrv_section',array(
		'default' => false,
		'sanitize_callback' => 'legal_adviser_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'legal_adviser_lite_anablesrv_section', array(
	   'settings' => 'legal_adviser_lite_anablesrv_section',
	   'section'   => 'legal_adviser_lite_srvscolumn_section',
	   'label'     => __('Check To Show This Section','legal-adviser-lite'),
	   'type'      => 'checkbox'
	 ));//Show services section
	 
	  // About Me section 
	$wp_customize->add_section('legal_adviser_lite_aboutmepart', array(
		'title' => __('About Me Section','legal-adviser-lite'),
		'description' => __('Select Pages from the dropdown for about me section','legal-adviser-lite'),
		'priority' => null,
		'panel' => 	'legal_adviser_lite_panel_area',          
	));		
	
	$wp_customize->add_setting('legal_adviser_lite_aboutmepge',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'legal_adviser_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'legal_adviser_lite_aboutmepge',array(
		'type' => 'dropdown-pages',			
		'section' => 'legal_adviser_lite_aboutmepart',
	));		
	
	$wp_customize->add_setting('show_legal_adviser_lite_aboutmepge',array(
		'default' => false,
		'sanitize_callback' => 'legal_adviser_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_legal_adviser_lite_aboutmepge', array(
	    'settings' => 'show_legal_adviser_lite_aboutmepge',
	    'section'   => 'legal_adviser_lite_aboutmepart',
	    'label'     => __('Check To Show This Section','legal-adviser-lite'),
	    'type'      => 'checkbox'
	));//Show About Me Section
	 
	
		 
}
add_action( 'customize_register', 'legal_adviser_lite_customize_register' );

function legal_adviser_lite_custom_css(){ 
?>
	<style type="text/css"> 					
        a, .postlist_style h2 a:hover,
        #sidebar ul li a:hover,								
        .postlist_style h3 a:hover,	
		.logo h1 span,				
        .recent-post h6:hover,	
		.social-icons a:hover,				
        .services_3col_box:hover .button,									
        .postmeta a:hover,
        .button:hover,		
        .footercolumn ul li a:hover, 
        .footercolumn ul li.current_page_item a,      
        .services_3col_box:hover h3 a,		
        .header-contactpart a:hover,
		.sitefooter h2 span,
		.sitefooter ul li a:hover, 
		.sitefooter ul li.current_page_item a,
        .sitenav ul li a:hover, 
        .sitenav ul li.current-menu-item a,
        .sitenav ul li.current-menu-parent a.parent,
        .sitenav ul li.current-menu-item ul.sub-menu li a:hover				
            { color:<?php echo esc_html( get_theme_mod('legal_adviser_lite_color_scheme','#f75340')); ?>;}					 
            
        .pagination ul li .current, .pagination ul li a:hover, 
        #commentform input#submit:hover,					
        .nivo-controlNav a.active,
        .learnmore:hover,
		.services_3col_box:hover .learnmore,	
		.services_3col_box .services_imgcolumn,	
		.nivo-caption .slide_more,											
        #sidebar .search-form input.search-submit,				
        .wpcf7 input[type='submit'],				
        nav.pagination .page-numbers.current,       		
        .toggle a	
            { background-color:<?php echo esc_html( get_theme_mod('legal_adviser_lite_color_scheme','#f75340')); ?>;}	
			
		.services_3col_box:hover .services_imgcolumn	
            { border-color:<?php echo esc_html( get_theme_mod('legal_adviser_lite_color_scheme','#f75340')); ?>;}		
			
						
         	
    </style> 
<?php                                       
}
         
add_action('wp_head','legal_adviser_lite_custom_css');	 

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function legal_adviser_lite_customize_preview_js() {
	wp_enqueue_script( 'legal_adviser_lite_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20171016', true );
}
add_action( 'customize_preview_init', 'legal_adviser_lite_customize_preview_js' );