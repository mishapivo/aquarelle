<?php
/**
 * Mega Construction Theme Customizer
 * @package Mega Construction
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function mega_construction_customize_register( $wp_customize ) {	

	//add home page setting pannel
	$wp_customize->add_panel( 'mega_construction_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'TG Settings', 'mega-construction' ),
	    'description' => __( 'Description of what this panel does.', 'mega-construction' ),
	) );

	//layout setting
	$wp_customize->add_section( 'mega_construction_theme_layout', array(
    	'title'      => __( 'Layout Settings', 'mega-construction' ),
		'priority'   => 30,
		'panel' => 'mega_construction_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('mega_construction_layout',array(
	        'default' => __( 'Right Sidebar', 'mega-construction' ),
	        'sanitize_callback' => 'mega_construction_sanitize_choices'	        
	    )
    );

	$wp_customize->add_control('mega_construction_layout',
	    array(
	        'type' => 'radio',
	        'label' => __( 'Do you want this section', 'mega-construction' ),
	        'section' => 'mega_construction_theme_layout',
	        'choices' => array(
	            'Left Sidebar' => __('Left Sidebar','mega-construction'),
	            'Right Sidebar' => __('Right Sidebar','mega-construction'),
	            'One Column' => __('One Column','mega-construction'),
	            'Three Columns' => __('Three Columns','mega-construction'),
	            'Four Columns' => __('Four Columns','mega-construction'),
	            'Grid Layout' => __('Grid Layout','mega-construction')
	        ),
	    )
    );

    $font_array = array(
        '' =>'No Fonts',
        'Abril Fatface' => 'Abril Fatface',
        'Acme' =>'Acme', 
        'Anton' => 'Anton', 
        'Architects Daughter' =>'Architects Daughter',
        'Arimo' => 'Arimo', 
        'Arsenal' =>'Arsenal',
        'Arvo' =>'Arvo',
        'Alegreya' =>'Alegreya',
        'Alfa Slab One' =>'Alfa Slab One',
        'Averia Serif Libre' =>'Averia Serif Libre', 
        'Bangers' =>'Bangers', 
        'Boogaloo' =>'Boogaloo', 
        'Bad Script' =>'Bad Script',
        'Bitter' =>'Bitter', 
        'Bree Serif' =>'Bree Serif', 
        'BenchNine' =>'BenchNine',
        'Cabin' =>'Cabin',
        'Cardo' =>'Cardo', 
        'Courgette' =>'Courgette', 
        'Cherry Swash' =>'Cherry Swash',
        'Cormorant Garamond' =>'Cormorant Garamond', 
        'Crimson Text' =>'Crimson Text',
        'Cuprum' =>'Cuprum', 
        'Cookie' =>'Cookie',
        'Chewy' =>'Chewy',
        'Days One' =>'Days One',
        'Dosis' =>'Dosis',
        'Droid Sans' =>'Droid Sans', 
        'Economica' =>'Economica', 
        'Fredoka One' =>'Fredoka One',
        'Fjalla One' =>'Fjalla One',
        'Francois One' =>'Francois One', 
        'Frank Ruhl Libre' => 'Frank Ruhl Libre', 
        'Gloria Hallelujah' =>'Gloria Hallelujah',
        'Great Vibes' =>'Great Vibes', 
        'Handlee' =>'Handlee', 
        'Hammersmith One' =>'Hammersmith One',
        'Inconsolata' =>'Inconsolata',
        'Indie Flower' =>'Indie Flower', 
        'IM Fell English SC' =>'IM Fell English SC',
        'Julius Sans One' =>'Julius Sans One',
        'Josefin Slab' =>'Josefin Slab',
        'Josefin Sans' =>'Josefin Sans',
        'Kanit' =>'Kanit',
        'Lobster' =>'Lobster',
        'Lato' => 'Lato',
        'Lora' =>'Lora', 
        'Libre Baskerville' =>'Libre Baskerville',
        'Lobster Two' => 'Lobster Two',
        'Merriweather' =>'Merriweather',
        'Monda' =>'Monda',
        'Montserrat' =>'Montserrat',
        'Muli' =>'Muli',
        'Marck Script' =>'Marck Script',
        'Noto Serif' =>'Noto Serif',
        'Open Sans' =>'Open Sans',
        'Overpass' => 'Overpass', 
        'Overpass Mono' =>'Overpass Mono',
        'Oxygen' =>'Oxygen',
        'Orbitron' =>'Orbitron',
        'Patua One' =>'Patua One',
        'Pacifico' =>'Pacifico',
        'Padauk' =>'Padauk',
        'Playball' =>'Playball',
        'Playfair Display' =>'Playfair Display',
        'PT Sans' =>'PT Sans',
        'Philosopher' =>'Philosopher',
        'Permanent Marker' =>'Permanent Marker',
        'Poiret One' =>'Poiret One',
        'Quicksand' =>'Quicksand',
        'Quattrocento Sans' =>'Quattrocento Sans',
        'Raleway' =>'Raleway',
        'Rubik' =>'Rubik',
        'Rokkitt' =>'Rokkitt',
        'Russo One' => 'Russo One', 
        'Righteous' =>'Righteous', 
        'Slabo' =>'Slabo', 
        'Source Sans Pro' =>'Source Sans Pro',
        'Shadows Into Light Two' =>'Shadows Into Light Two',
        'Shadows Into Light' =>  'Shadows Into Light',
        'Sacramento' =>'Sacramento',
        'Shrikhand' =>'Shrikhand',
        'Tangerine' => 'Tangerine',
        'Ubuntu' =>'Ubuntu',
        'VT323' =>'VT323',
        'Varela Round' =>'Varela Round',
        'Vampiro One' =>'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' =>'Volkhov',
        'Yanone Kaffeesatz' =>'Yanone Kaffeesatz'
    );


	//Typography
	$wp_customize->add_section( 'mega_construction_typography', array(
    	'title'      => __( 'Typography', 'mega-construction' ),
		'priority'   => 30,
		'panel' => 'mega_construction_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'mega_construction_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mega_construction_paragraph_color', array(
		'label' => __('Paragraph Color', 'mega-construction'),
		'section' => 'mega_construction_typography',
		'settings' => 'mega_construction_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('mega_construction_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'mega_construction_sanitize_choices'
	));
	$wp_customize->add_control(
	    'mega_construction_paragraph_font_family', array(
	    'section'  => 'mega_construction_typography',
	    'label'    => __( 'Paragraph Fonts','mega-construction'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('mega_construction_paragraph_font_size',array(
		'default'	=> '12px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('mega_construction_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','mega-construction'),
		'section'	=> 'mega_construction_typography',
		'setting'	=> 'mega_construction_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'mega_construction_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mega_construction_atag_color', array(
		'label' => __('"a" Tag Color', 'mega-construction'),
		'section' => 'mega_construction_typography',
		'settings' => 'mega_construction_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('mega_construction_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'mega_construction_sanitize_choices'
	));
	$wp_customize->add_control(
	    'mega_construction_atag_font_family', array(
	    'section'  => 'mega_construction_typography',
	    'label'    => __( '"a" Tag Fonts','mega-construction'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'mega_construction_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mega_construction_li_color', array(
		'label' => __('"li" Tag Color', 'mega-construction'),
		'section' => 'mega_construction_typography',
		'settings' => 'mega_construction_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('mega_construction_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'mega_construction_sanitize_choices'
	));
	$wp_customize->add_control(
	    'mega_construction_li_font_family', array(
	    'section'  => 'mega_construction_typography',
	    'label'    => __( '"li" Tag Fonts','mega-construction'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'mega_construction_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mega_construction_h1_color', array(
		'label' => __('H1 Color', 'mega-construction'),
		'section' => 'mega_construction_typography',
		'settings' => 'mega_construction_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('mega_construction_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'mega_construction_sanitize_choices'
	));
	$wp_customize->add_control(
	    'mega_construction_h1_font_family', array(
	    'section'  => 'mega_construction_typography',
	    'label'    => __( 'H1 Fonts','mega-construction'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('mega_construction_h1_font_size',array(
		'default'	=> '50px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('mega_construction_h1_font_size',array(
		'label'	=> __('H1 Font Size','mega-construction'),
		'section'	=> 'mega_construction_typography',
		'setting'	=> 'mega_construction_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'mega_construction_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mega_construction_h2_color', array(
		'label' => __('H2 Color', 'mega-construction'),
		'section' => 'mega_construction_typography',
		'settings' => 'mega_construction_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('mega_construction_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'mega_construction_sanitize_choices'
	));
	$wp_customize->add_control(
	    'mega_construction_h2_font_family', array(
	    'section'  => 'mega_construction_typography',
	    'label'    => __( 'H2 Fonts','mega-construction'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('mega_construction_h2_font_size',array(
		'default'	=> '45px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('mega_construction_h2_font_size',array(
		'label'	=> __('H2 Font Size','mega-construction'),
		'section'	=> 'mega_construction_typography',
		'setting'	=> 'mega_construction_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'mega_construction_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mega_construction_h3_color', array(
		'label' => __('H3 Color', 'mega-construction'),
		'section' => 'mega_construction_typography',
		'settings' => 'mega_construction_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('mega_construction_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'mega_construction_sanitize_choices'
	));
	$wp_customize->add_control(
	    'mega_construction_h3_font_family', array(
	    'section'  => 'mega_construction_typography',
	    'label'    => __( 'H3 Fonts','mega-construction'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('mega_construction_h3_font_size',array(
		'default'	=> '36px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('mega_construction_h3_font_size',array(
		'label'	=> __('H3 Font Size','mega-construction'),
		'section'	=> 'mega_construction_typography',
		'setting'	=> 'mega_construction_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'mega_construction_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mega_construction_h4_color', array(
		'label' => __('H4 Color', 'mega-construction'),
		'section' => 'mega_construction_typography',
		'settings' => 'mega_construction_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('mega_construction_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'mega_construction_sanitize_choices'
	));
	$wp_customize->add_control(
	    'mega_construction_h4_font_family', array(
	    'section'  => 'mega_construction_typography',
	    'label'    => __( 'H4 Fonts','mega-construction'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('mega_construction_h4_font_size',array(
		'default'	=> '30px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('mega_construction_h4_font_size',array(
		'label'	=> __('H4 Font Size','mega-construction'),
		'section'	=> 'mega_construction_typography',
		'setting'	=> 'mega_construction_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'mega_construction_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mega_construction_h5_color', array(
		'label' => __('H5 Color', 'mega-construction'),
		'section' => 'mega_construction_typography',
		'settings' => 'mega_construction_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('mega_construction_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'mega_construction_sanitize_choices'
	));
	$wp_customize->add_control(
	    'mega_construction_h5_font_family', array(
	    'section'  => 'mega_construction_typography',
	    'label'    => __( 'H5 Fonts','mega-construction'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('mega_construction_h5_font_size',array(
		'default'	=> '25px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('mega_construction_h5_font_size',array(
		'label'	=> __('H5 Font Size','mega-construction'),
		'section'	=> 'mega_construction_typography',
		'setting'	=> 'mega_construction_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'mega_construction_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mega_construction_h6_color', array(
		'label' => __('H6 Color', 'mega-construction'),
		'section' => 'mega_construction_typography',
		'settings' => 'mega_construction_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('mega_construction_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'mega_construction_sanitize_choices'
	));
	$wp_customize->add_control(
	    'mega_construction_h6_font_family', array(
	    'section'  => 'mega_construction_typography',
	    'label'    => __( 'H6 Fonts','mega-construction'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('mega_construction_h6_font_size',array(
		'default'	=> '18px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('mega_construction_h6_font_size',array(
		'label'	=> __('H6 Font Size','mega-construction'),
		'section'	=> 'mega_construction_typography',
		'setting'	=> 'mega_construction_h6_font_size',
		'type'	=> 'text'
	));

	//Topbar section
	$wp_customize->add_section('mega_construction_topbar_icon',array(
		'title'	=> __('Topbar Section','mega-construction'),
		'description'	=> __('Add Header Content here','mega-construction'),
		'priority'	=> null,
		'panel' => 'mega_construction_panel_id',
	));

	$wp_customize->add_setting('mega_construction_address',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('mega_construction_address',array(
		'label'	=> __('Add Address','mega-construction'),
		'section'	=> 'mega_construction_topbar_icon',
		'setting'	=> 'mega_construction_address',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('mega_construction_address1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('mega_construction_address1',array(
		'label'	=> __('Add Address','mega-construction'),
		'section'	=> 'mega_construction_topbar_icon',
		'setting'	=> 'mega_construction_address',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('mega_construction_phone',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('mega_construction_phone',array(
		'label'	=> __('Add Contact','mega-construction'),
		'section'	=> 'mega_construction_topbar_icon',
		'setting'	=> 'mega_construction_phone',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('mega_construction_phone1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('mega_construction_phone1',array(
		'label'	=> __('Add Contact','mega-construction'),
		'section'	=> 'mega_construction_topbar_icon',
		'setting'	=> 'mega_construction_phone1',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('mega_construction_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('mega_construction_email',array(
		'label'	=> __('Add Email','mega-construction'),
		'section'	=> 'mega_construction_topbar_icon',
		'setting'	=> 'mega_construction_email',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('mega_construction_email1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('mega_construction_email1',array(
		'label'	=> __('Add Email','mega-construction'),
		'section'	=> 'mega_construction_topbar_icon',
		'setting'	=> 'mega_construction_email1',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('mega_construction_button_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('mega_construction_button_link',array(
		'label'	=> __('Special Offers','mega-construction'),
		'section'	=> 'mega_construction_topbar_icon',
		'setting'	=> 'mega_construction_button_link',
		'type'		=> 'url'
	));
	

	//home page slider
	$wp_customize->add_section( 'mega_construction_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'mega-construction' ),
		'priority'   => 30,
		'panel' => 'mega_construction_panel_id'
	) );

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'mega_construction_slidersettings_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'mega_construction_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'mega_construction_slidersettings_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'mega-construction' ),
			'section'  => 'mega_construction_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}
	
	//About
	$wp_customize->add_section('mega_construction_about1',array(
		'title'	=> __('About Section','mega-construction'),
		'description'	=> __('Add About sections below.','mega-construction'),
		'panel' => 'mega_construction_panel_id',
	));

	$post_list = get_posts();
 	$i = 0;
	$pst[]='Select';  
	foreach($post_list as $post){
	$pst[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('mega_construction_about_setting',array(
		'sanitize_callback' => 'mega_construction_sanitize_choices',
	));

	$wp_customize->add_control('mega_construction_about_setting',array(
		'type'    => 'select',
		'choices' => $pst,
		'label' => __('Select post','mega-construction'),
		'section' => 'mega_construction_about1',
	));

	//footer text
	$wp_customize->add_section('mega_construction_footer_section',array(
		'title'	=> __('Footer Text','mega-construction'),
		'description'	=> __('Add some text for footer like copyright etc.','mega-construction'),
		'panel' => 'mega_construction_panel_id'
	));
	
	$wp_customize->add_setting('mega_construction_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('mega_construction_text',array(
		'label'	=> __('Copyright Text','mega-construction'),
		'section'	=> 'mega_construction_footer_section',
		'type'		=> 'text'
	));	
}
add_action( 'customize_register', 'mega_construction_customize_register' );	

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Mega_Construction_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Mega_Construction_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Mega_Construction_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'Mega Construction Pro', 'mega-construction' ),
					'pro_text' => esc_html__( 'Go Pro', 'mega-construction' ),
					'pro_url'  => esc_url('https://www.themesglance.com/themes/premium-construction-wordpress-theme/'	),				
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'mega-construction-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'mega-construction-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Mega_Construction_Customize::get_instance();