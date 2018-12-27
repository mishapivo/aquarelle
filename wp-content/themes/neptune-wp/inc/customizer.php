<?php
/**
 * neptune Theme Customizer
 *
 * @package Neptune WP
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function neptune_wp_customize_register( $wp_customize ) {


	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'neptune_wp_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'neptune_wp_customize_partial_blogdescription',
		) );
	}

}

add_action( 'customize_register', 'neptune_wp_customize_register' );

function neptune_sections( $wp_customize ) {
	/**
	 * Add panels
	 */
	$wp_customize->add_panel( 'fonts', array(
		'priority'    => 10,
		'title'       => __( 'fonts', 'neptune-wp' ),
	) );
	$wp_customize->add_panel( 'frontpage', array(
		'priority'    => 1,
		'title'       => __( 'Front Page', 'neptune-wp' ),
	) );
	/**
	 * Add sections
	 */
     $wp_customize->add_section( 'fonts', array(
 		'title'       => __( 'Header Background', 'neptune-wp' ),
 		'priority'    => 10,
 		'panel'       => 'fonts',
 	) );

     $wp_customize->add_section( 'options', array(
 		'title'       => __( 'Theme Options', 'neptune-wp' ),
 		'priority'    => 10,
 	) );


	// View PRO Version
	$wp_customize->add_section( 'neptune_style_view_pro', array(
		'title'       => '' . esc_html__( 'Upgrage to Pro', 'neptune-wp' ),
		'priority'    => 1,
		'description' => sprintf(
			//unintrosive upsell message
			__( '<div class="upsell-container">
					<h2>Upgrade to Neptune Pro Today</h2>
					<p>Get the pro add-on plugin today:</p>
					<ul class="upsell-features">
                            <li>
                            	<h4>Dynamic Page Builder</h4>
                            	<div class="description">Get 14 custom modules to build your website with,header, basic module (text & image), service box, Call to Action, testimonials, teams, google maps/contact, featured content (text&image), Projects/ Portfolio , Blogs image gallery and logos carousel.</div>
                            </li>

                            <li>
                            	<h4>One click Install</h4>
                            	<div class="description">Install content demo with just one click</div>
                            </li>
                            

                            <li>
                            	<h4>One On One Email Support</h4>
                            	<div class="description">Get one on one email support from our experienced support stuff, we can also help you modify the theme to your liking</div>
                            </li>
                            
                    </ul> %s </div>', 'neptune-wp' ),
			sprintf( '<a href="%1$s" target="_blank" class="button button-primary">%2$s</a>', esc_url( neptune_get_pro_link() ), esc_html__( 'Upgrade To PRO', 'neptune-wp' ) )
		),
	) );

	$wp_customize->add_setting( 'neptune_pro_desc', array(
		'default'           => '',
		'sanitize_callback' => 'neptune_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'neptune_pro_desc', array(
		'section' => 'neptune_style_view_pro',
		'type'    => 'hidden',
	) );

}


add_action( 'customize_register', 'neptune_sections' );

function neptune_settings( $wp_customize ) {

if ( class_exists( 'Kirki' ) ) {
		//section one text color
	Kirki::add_field( 'neptune', array(
		'type'        => 'color-palette',
		'settings'    => 'accent_color',
		'label'       => esc_attr__( 'Site Accent Color', 'neptune-wp' ),
		'description' => esc_attr__( 'Accent Colors', 'neptune-wp' ),
		'section'     => 'colors',
		'default'     => '#F44336',
		'choices'     => array(
			'colors' => Kirki_Helper::get_material_design_colors( 'primary' ),
			'size'   => 25,
		),
		'output' => array(
			array(
				'element'  => 'button, a.button',
				'property' => 'background-color',
			),
			array(
				'element'  => 'a.button',
				'property' => 'border-color',
			),
		),
	) );

		//section one text color
	Kirki::add_field( 'neptune', array(
		'type'        => 'color',
		'settings'    => 'header_footer',
		'label'       => esc_attr__( 'Header & Footer background', 'neptune-wp' ),
		'description' => esc_attr__( 'Header and Footer background Colors', 'neptune-wp' ),
		'section'     => 'colors',
		'default'     => '#000',
		'choices'     => array(
			'alpha' => true,
		),
		'output' => array(
			array(
				'element'  => '#nomasthead, .footer-overlay',
				'property' => 'background-color',
			),
			
		),
	) );
	Kirki::add_field( 'neptune', array(
		'type'        => 'color',
		'settings'    => 'headertextcolor',
		'label'       => esc_attr__( 'Header Text Color', 'neptune-wp' ),
		'description' => esc_attr__( 'Header Text Colors', 'neptune-wp' ),
		'section'     => 'colors',
		'default'     => '#fff',
		'choices'     => array(
			'alpha' => true,
		),
		'output' => array(
			array(
				'element'  => '.site-branding a, #cssmenu>ul>li.active>a, #cssmenu>ul>li>a',
				'property' => 'color',
			),
			
		),
	) );
	kirki::add_field( 'neptune', array(
		'type'     => 'textarea',
		'settings' => 'welcome_a',
		'label'    => __( 'Welcome Text', 'neptune-wp' ),
		'section'  => 'header_image',
		'priority' => 1,
		'default'  => esc_attr__( 'Welcome To Neptune', 'neptune-wp' ),
		'description'    => __( 'Large welcome text', 'neptune-wp' ),

	) );

	kirki::add_field( 'neptune', array(
		'type'     => 'textarea',
		'settings' => 'welcome_b',
		'label'    => __( 'Welcome Sub Text', 'neptune-wp' ),
		'section'  => 'header_image',
		'priority' => 2,
		'default'  => esc_attr__( 'Simple websites for small businesses', 'neptune-wp' ),
		'description'    => __( 'welcome sub text', 'neptune-wp' ),
		'sanitize_callback' => 'esc_html',

	) );
	kirki::add_field( 'neptune', array(
		'type'     => 'text',
		'settings' => 'button_a',
		'label'    => __( 'Button A Label & URL', 'neptune-wp' ),
		'section'  => 'header_image',
		'priority' => 2,
		'default'  => esc_attr__( 'Button A', 'neptune-wp' ),
		'description'    => __( 'Button A label', 'neptune-wp' ),

	) );
	kirki::add_field( 'neptune', array(
		'type'     => 'text',
		'settings' => 'button_link_a',
		//'label'    => __( 'Button A Link', 'neptune-wp' ),
		'section'  => 'header_image',
		'priority' => 2,
		//'default'  => esc_attr__( 'Button A Link', 'neptune-wp' ),
		'description'    => __( 'Button A URL', 'neptune-wp' ),

	) );

	kirki::add_field( 'neptune', array(
		'type'     => 'text',
		'settings' => 'button_b',
		'label'    => __( 'Button B Label & URL', 'neptune-wp' ),
		'section'  => 'header_image',
		'priority' => 2,
		'default'  => esc_attr__( 'Button B', 'neptune-wp' ),
		'description'    => __( 'Button B label', 'neptune-wp' ),

	) );
	kirki::add_field( 'neptune', array(
		'type'     => 'text',
		'settings' => 'button_link_b',
		//'label'    => __( 'Button A Link', 'neptune-wp' ),
		'section'  => 'header_image',
		'priority' => 2,
		//'default'  => esc_attr__( 'Button B Link', 'neptune-wp' ),
		'description'    => __( 'Button B URL', 'neptune-wp' ),

	) );
	Kirki::add_field( 'neptune', array(
	'type'        => 'switch',
	'settings'    => 'headerbg',
	'label'       => __( 'header bar State', 'neptune-wp' ),
	'section'     => 'options',
	'default'     => 'on',
	'priority'    => 10,
	'choices'     => array(
		'on'  => esc_attr__( 'Enable', 'neptune-wp' ),
		'off' => esc_attr__( 'Disable', 'neptune-wp' ),
	),
	) );
	if (class_exists('Neptune_Pro')) {
	Kirki::add_field( 'neptune', array(
	'type'        => 'switch',
	'settings'    => 'project_toggle',
	'label'       => __( 'Project Sidebar', 'neptune-wp' ),
	'section'     => 'options',
	//'default'     => '1',
	'priority'    => 10,
	'description'    => __( 'Change header text color in Color Settings', 'neptune-wp' ),
	'choices'     => array(
		'on'  => esc_attr__( 'Enable', 'neptune-wp' ),
		'off' => esc_attr__( 'Disable', 'neptune-wp' ),
	),
	) );}
	}
}
add_action( 'init', 'neptune_settings', 20);
/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function neptune_wp_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function neptune_wp_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function neptune_wp_customize_preview_js() {
	wp_enqueue_script( 'neptune-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'neptune_wp_customize_preview_js' );

/**
 * Admin CSS
 */
function neptune_customizer_assets() {
    wp_enqueue_style( 'neptune_customizer_style', get_template_directory_uri() . '/css/admin.css', null, '1.0.0', false );
}
add_action( 'customize_controls_enqueue_scripts', 'neptune_customizer_assets' );
/**
 * Generate a link to the Noah Lite info page.
 */
function neptune_get_pro_link() {
    return 'https://neptunewp.com/downloads/neptune-wp/';
}