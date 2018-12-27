<?php
/**
 * architectwp Theme Customizer
 *
 * @package architectwp
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function architectwp_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'architectwp_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'architectwp_customize_partial_blogdescription',
		) );
	}



	$wp_customize->add_setting( 'link_color' , array(
	    'default' => '#e74c3c',
	    'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize,'link_color', 
		array(
		'label'      => esc_html__( 'Link Color', 'architectwp' ),
		'section'    => 'colors',
		'settings'   => 'link_color',
	) ) );

	//Header Section (text & link)
	$wp_customize->add_setting( 'header_main_text',
	   array(
	      'default' => '', // Optional.
	      'sanitize_callback' => 'wp_kses_post',
	   )
	);
	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize,'header_main_text', 
		array(
		'label'      => esc_html__( 'Header Main Text', 'architectwp' ),
		'section'    => 'header_image',
		'type'		 => 'textarea',
	) ) );

	//header sub text
	$wp_customize->add_setting( 'header_sub_text',
	   array(
	      'default' => '', // Optional.
	      'sanitize_callback' => 'wp_kses_post',
	   )
	);
	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize,'header_sub_text', 
		array(
		'label'      => esc_html__( 'Header Sub Text', 'architectwp' ),
		'section'    => 'header_image',
		'type'		 => 'text',
	) ) );

	//header button label
	$wp_customize->add_setting( 'header_button_label',
	   array(
	      'default' => esc_html__('View More','architectwp'),
	      'sanitize_callback' => 'wp_kses_post',
	   )
	);
	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize,'header_button_label', 
		array(
		'label'      => esc_html__( 'Button Label', 'architectwp' ),
		'section'    => 'header_image',
		'type'		 => 'text',
	) ) );

	//header button url
	$wp_customize->add_setting( 'header_button_url',
	   array(
	      'default' => '',
	      'sanitize_callback' => 'esc_url_raw',
	   )
	);
	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize,'header_button_url', 
		array(
		'label'      => esc_html__( 'Button URL(required for button to show)', 'architectwp' ),
		'section'    => 'header_image',
		'type'		 => 'url',
	) ) );

	//Add Home Intro Section

	/**
	 * Add home intro section
	 */
	$wp_customize->add_section( 'intro_section',
	   array(
	      'title' => esc_html__( 'Home Intro Section', 'architectwp' ),
	      'description' => esc_html__( 'Add an intro section to the homepage', 'architectwp' ),
	      'priority' => 50,
	   )
	);
	$wp_customize->add_setting( 'intro_toggle',
	   array(
	      'default' => 'disable',
	      'sanitize_callback' => 'architectwp_sanitize_radio',
	   )
	);
	$wp_customize->add_control( 'intro_toggle',
	   array(
	      'label' => esc_html__( 'Enable/Disable Section', 'architectwp' ),
	      'section' => 'intro_section',
	      'priority' => 1, // Optional. Order priority to load the control. Default: 10
	      'type' => 'radio',
	      'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
	      'choices' => array( // Optional.
	         'enable' => esc_html__( 'Enable','architectwp' ),
	         'disable' => esc_html__( 'Disable' ,'architectwp')
	      )
	   )
	);

	//About Section title
	$wp_customize->add_setting( 'intro_title',
	   array(
	      'default' => '',
	      'sanitize_callback' => 'wp_kses_post',
	   )
	);
	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize,'intro_title', 
		array(
		'label'      => esc_html__( 'Section Title', 'architectwp' ),
		'section'    => 'intro_section',
		'type'		 => 'text',
	) ) );
	//About Section Sub Title
	$wp_customize->add_setting( 'intro_sub_title',
	   array(
	      'default' => '',
	      'sanitize_callback' => 'wp_kses_post',
	   )
	);
	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize,'intro_sub_title', 
		array(
		'label'      => esc_html__( 'Section Title', 'architectwp' ),
		'section'    => 'intro_section',
		'type'		 => 'textarea',
	) ) );

	//About Section Sub Title
	$wp_customize->add_setting( 'intro_content',
	   array(
	      'default' => '',
	      'sanitize_callback' => 'wp_kses_post',
	   )
	);
	$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize,'intro_content', 
		array(
		'label'      => esc_html__( 'Section Content', 'architectwp' ),
		'section'    => 'intro_section',
		'type'		 => 'textarea',
	) ) );

    //radio box sanitization function
    function architectwp_sanitize_radio( $input, $setting ){
     
        //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
        $input = sanitize_key($input);

        //get the list of possible radio box options 
        $choices = $setting->manager->get_control( $setting->id )->choices;
                         
        //return input if valid or return default option
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
         
    }

	//Add pro upsell in customizer
	$wp_customize->add_section( 'architectwpstyle_view_pro', array(
		'title'       => esc_html__( 'Upgrage to Pro', 'architectwp' ),
		'priority'    => 1,
		'description' => sprintf(
			/* translators: upsell mesage */
			__( '<div class="upsell-container">
					<h2>Upgrade to PRO Today!</h2>
					<p>Get the pro add-on plugin today:</p>
					<ul class="upsell-features">
                            <li>
                            	<h4>List & Manage Projects</h4>
                            	<div class="description">Create & manage projects with image galleries.</div>
                            </li>

                            <li>
                            	<h4>Customizable Homepage</h4>
                            	<div class="description">Choose what to display on homepage</div>
                            </li>

                            <li>
                            	<h4>One On One Email Support</h4>
                            	<div class="description">Get one on one email support personally from me, I can also install & setup the theme for you</div>
                            </li>
                            
                    </ul> %s </div>', 'architectwp' ),
			sprintf( '<a href="%1$s" target="_blank" class="button button-primary">%2$s</a>', esc_url( architectwp_get_pro_link() ), esc_html__( 'Upgrade To PRO', 'architectwp' ) )
		),
	) );

	$wp_customize->add_setting( 'architectwppro_desc', array(
		'default'           => '',
		'sanitize_callback' => 'wp_kses_post',
	) );
	$wp_customize->add_control( 'architectwppro_desc', array(
		'section' => 'architectwpstyle_view_pro',
		'type'    => 'hidden',
	) );

}
add_action( 'customize_register', 'architectwp_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function architectwp_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function architectwp_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function architectwp_customize_preview_js() {
	wp_enqueue_script( 'architectwp--customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'architectwp_customize_preview_js' );


/**
 * Admin CSS
 */
function architectwp_customizer_assets() {
    wp_enqueue_style( 'architectwp_customizer_style', get_template_directory_uri() . '/css/upsell.css', null, '1.0.0', false );
}
add_action( 'customize_controls_enqueue_scripts', 'architectwp_customizer_assets' );
/**
 * Generate a link to the Noah Lite info page.
 */
function architectwp_get_pro_link() {
    return 'https://aperturewp.com/downloads/architectwp/';
}

