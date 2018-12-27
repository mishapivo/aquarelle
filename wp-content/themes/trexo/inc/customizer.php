<?php
/**
 * trexo Theme Customizer
 *
 * @package trexo
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function trexo_customize_register( $wp_customize ) {

	global $trexoPostsPagesArray, $trexoYesNo, $trexoSliderType, $trexoServiceLayouts, $trexoAvailableCats;

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'trexo_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'trexo_customize_partial_blogdescription',
		) );
	}
	
	$wp_customize->add_panel( 'trexo_general', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'title'      => __('General Settings', 'trexo'),
		'active_callback' => '',
	) );

	$wp_customize->get_section( 'title_tagline' )->panel = 'trexo_general';
	$wp_customize->get_section( 'background_image' )->panel = 'trexo_general';
	$wp_customize->get_section( 'background_image' )->title = __('Site background', 'trexo');
	$wp_customize->get_section( 'header_image' )->panel = 'trexo_general';
	$wp_customize->get_section( 'static_front_page' )->panel = 'business_page';
	$wp_customize->get_section( 'static_front_page' )->title = __('Select frontpage type', 'trexo');
	$wp_customize->get_section( 'static_front_page' )->priority = 9;
	$wp_customize->remove_section('colors');
	$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'background_color', 
			array(
				'label'      => __( 'Background Color', 'trexo' ),
				'section'    => 'background_image',
				'priority'   => 9
			) ) 
	);
	//$wp_customize->remove_section('static_front_page');	
	//$wp_customize->remove_section('header_image');	

	/* Upgrade */	
	$wp_customize->add_section( 'business_upgrade', array(
		'priority'       => 8,
		'capability'     => 'edit_theme_options',
		'title'      => __('Upgrade to PRO', 'trexo'),
		'active_callback' => '',
	) );		
	$wp_customize->add_setting( 'trexo_show_sliderr',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new trexo_Customize_Control_Upgrade(
		$wp_customize,
		'trexo_show_sliderr',
		array(
			'label'      => __( 'Show headerr?', 'trexo' ),
			'settings'   => 'trexo_show_sliderr',
			'priority'   => 10,
			'section'    => 'business_upgrade',
			'choices' => '',
			'input_attrs'  => 'yes',
			'active_callback' => ''			
		)
	) );
	
	/* Usage guide */	
	$wp_customize->add_section( 'business_usage', array(
		'priority'       => 9,
		'capability'     => 'edit_theme_options',
		'title'      => __('Theme Usage Guide', 'trexo'),
		'active_callback' => '',
	) );		
	$wp_customize->add_setting( 'trexo_show_sliderrr',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new trexo_Customize_Control_Guide(
		$wp_customize,
		'trexo_show_sliderrr',
		array(

			'label'      => __( 'Show headerr?', 'trexo' ),
			'settings'   => 'trexo_show_sliderrr',
			'priority'   => 10,
			'section'    => 'business_usage',
			'choices' => '',
			'input_attrs'  => 'yes',
			'active_callback' => ''				
		)
	) );	
	
	/* Business page panel */
	$wp_customize->add_panel( 'business_page', array(
		'priority'       => 20,
		'capability'     => 'edit_theme_options',
		'title'      => __('Home/Front Page Settings', 'trexo'),
		'active_callback' => '',
	) );

	/* Header options */	
	$wp_customize->add_section( 'business_page_header', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'title'      => __('Header Settings', 'trexo'),
		'active_callback' => 'trexo_front_page_sections',
		'panel'  => 'business_page',
	) );		
	$wp_customize->add_setting( 'trexo_show_slider',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'trexo_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'trexo_show_slider',
		array(
			'label'      => __( 'Show header?', 'trexo' ),
			'settings'   => 'trexo_show_slider',
			'priority'   => 10,
			'section'    => 'business_page_header',
			'type'    => 'select',
			'choices' => $trexoYesNo,
		)
	) );
	
	$wp_customize->add_section( 'business_page_services', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'title'      => __('Services/Products Settings', 'trexo'),
		'active_callback' => 'trexo_front_page_sections',
		'panel'  => 'business_page',
	) );
	$wp_customize->add_setting( 'trexo_welcome_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'trexo_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'trexo_welcome_post',
		array(
			'label'      => __( 'Select post', 'trexo' ),
			'description' => __( 'Select a post/page you want to show in welcome section', 'trexo' ),
			'settings'   => 'trexo_welcome_post',
			'priority'   => 11,
			'section'    => 'business_page_services',
			'type'    => 'select',
			'choices' => $trexoPostsPagesArray,
		)
	) );
	
	$wp_customize->add_setting( 'trexo_services_cat',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'trexo_sanitize_cat_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'trexo_services_cat',
		array(
			'label'      => __( 'Select category for services?', 'trexo' ),
			'settings'   => 'trexo_services_cat',
			'priority'   => 21,
			'section'    => 'business_page_services',
			'type'    => 'select',
			'choices' => $trexoAvailableCats,
		)
	) );
	
	
	$wp_customize->add_section( 'business_page_portfolio', array(
		'priority'       => 20,
		'capability'     => 'edit_theme_options',
		'title'      => __('Portfolio Settings', 'trexo'),
		'active_callback' => 'trexo_front_page_sections',
		'panel'  => 'business_page',
	) );
	$wp_customize->add_setting( 'trexo_portfolio_cat',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'trexo_sanitize_cat_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'trexo_portfolio_cat',
		array(
			'label'      => __( 'Select category for portfolio?', 'trexo' ),
			'settings'   => 'trexo_portfolio_cat',
			'priority'   => 21,
			'section'    => 'business_page_portfolio',
			'type'    => 'select',
			'choices' => $trexoAvailableCats,
		)
	) );
	
	$wp_customize->add_section( 'business_page_news', array(
		'priority'       => 30,
		'capability'     => 'edit_theme_options',
		'title'      => __('News Settings', 'trexo'),
		'active_callback' => 'trexo_front_page_sections',
		'panel'  => 'business_page',
	) );
	$wp_customize->add_setting( 'trexo_news_cat',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'trexo_sanitize_cat_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'trexo_news_cat',
		array(
			'label'      => __( 'Select category for portfolio?', 'trexo' ),
			'settings'   => 'trexo_news_cat',
			'priority'   => 31,
			'section'    => 'business_page_news',
			'type'    => 'select',
			'choices' => $trexoAvailableCats,
		)
	) );	

	$wp_customize->add_section( 'business_page_quote', array(
		'priority'       => 50,
		'capability'     => 'edit_theme_options',
		'title'      => __('Quote Settings', 'trexo'),
		'active_callback' => 'trexo_front_page_sections',
		'panel'  => 'business_page',
	) );
	$wp_customize->add_setting( 'trexo_show_quote',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'trexo_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'trexo_show_quote',
		array(
			'label'      => __( 'Show quote?', 'trexo' ),
			'settings'   => 'trexo_show_quote',
			'priority'   => 10,
			'section'    => 'business_page_quote',
			'type'    => 'select',
			'choices' => $trexoYesNo,
		)
	) );
	$wp_customize->add_setting( 'trexo_quote_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'trexo_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'trexo_quote_post',
		array(
			'label'      => __( 'Select post', 'trexo' ),
			'description' => __( 'Select a post/page you want to show in quote section', 'trexo' ),
			'settings'   => 'trexo_quote_post',
			'priority'   => 11,
			'section'    => 'business_page_quote',
			'type'    => 'select',
			'choices' => $trexoPostsPagesArray,
		)
	) );	
	
	$wp_customize->add_section( 'business_page_social', array(
		'priority'       => 70,
		'capability'     => 'edit_theme_options',
		'title'      => __('Social Settings', 'trexo'),
		'active_callback' => 'trexo_front_page_sections',
		'panel'  => 'business_page',
	) );	
	$wp_customize->add_setting( 'trexo_show_social',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'trexo_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'trexo_show_social',
		array(
			'label'      => __( 'Show social?', 'trexo' ),
			'settings'   => 'trexo_show_social',
			'priority'   => 10,
			'section'    => 'business_page_social',
			'type'    => 'select',
			'choices' => $trexoYesNo,
		)
	) );
	$wp_customize->add_setting( 'business_page_facebook',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_facebook', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Facebook', 'trexo' ),
	  'description' => __( 'Enter your facebook url.', 'trexo' ),
	) );
	$wp_customize->add_setting( 'business_page_flickr',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_flickr', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Flickr', 'trexo' ),
	  'description' => __( 'Enter your flickr url.', 'trexo' ),
	) );
	$wp_customize->add_setting( 'business_page_gplus',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_gplus', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Gplus', 'trexo' ),
	  'description' => __( 'Enter your gplus url.', 'trexo' ),
	) );
	$wp_customize->add_setting( 'business_page_linkedin',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_linkedin', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Linkedin', 'trexo' ),
	  'description' => __( 'Enter your linkedin url.', 'trexo' ),
	) );
	$wp_customize->add_setting( 'business_page_reddit',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_reddit', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Reddit', 'trexo' ),
	  'description' => __( 'Enter your reddit url.', 'trexo' ),
	) );
	$wp_customize->add_setting( 'business_page_stumble',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_stumble', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Stumble', 'trexo' ),
	  'description' => __( 'Enter your stumble url.', 'trexo' ),
	) );
	$wp_customize->add_setting( 'business_page_twitter',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_twitter', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Twitter', 'trexo' ),
	  'description' => __( 'Enter your twitter url.', 'trexo' ),
	) );	
	
}
add_action( 'customize_register', 'trexo_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function trexo_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function trexo_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function trexo_customize_preview_js() {
	wp_enqueue_script( 'trexo-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'trexo_customize_preview_js' );

require get_template_directory() . '/inc/variables.php';

function trexo_sanitize_yes_no_setting( $value ){
	global $trexoYesNo;
    if ( ! array_key_exists( $value, $trexoYesNo ) ){
        $value = 'select';
	}
    return $value;	
}

function trexo_sanitize_post_selection( $value ){
	global $trexoPostsPagesArray;
    if ( ! array_key_exists( $value, $trexoPostsPagesArray ) ){
        $value = 'select';
	}
    return $value;	
}

function trexo_front_page_sections(){
	
	$value = false;
	
	if( 'page' == get_option( 'show_on_front' ) ){
		$value = true;
	}
	
	return $value;
	
}

function trexo_sanitize_slider_type_setting( $value ){

	global $trexoSliderType;
    if ( ! array_key_exists( $value, $trexoSliderType ) ){
        $value = 'select';
	}
    return $value;	
	
}

function trexo_sanitize_cat_setting( $value ){
	
	global $trexoAvailableCats;
	
	if( ! array_key_exists( $value, $trexoAvailableCats ) ){
		
		$value = 'select';
		
	}
	return $value;
	
}

add_action( 'customize_register', 'trexo_load_customize_classes', 0 );
function trexo_load_customize_classes( $wp_customize ) {
	
	class trexo_Customize_Control_Upgrade extends WP_Customize_Control {

		public $type = 'trexo-upgrade';
		
		public function enqueue() {

		}

		public function to_json() {
			
			parent::to_json();

			$this->json['link']    = $this->get_link();
			$this->json['value']   = $this->value();
			$this->json['id']      = $this->id;
			$this->json['default'] = $this->default;
			
		}	
		
		public function render_content() {}
		
		public function content_template() { ?>

			<div id="trexo-upgrade-container" class="trexo-upgrade-container">

				<ul>
					<li>More sliders</li>
					<li>More layouts</li>
					<li>Color customization</li>
					<li>Font customization</li>
				</ul>

				<p>
					<a href="https://www.themealley.com/business/">Upgrade</a>
				</p>
									
			</div><!-- .trexo-upgrade-container -->
			
		<?php }	
		
	}
	
	class trexo_Customize_Control_Guide extends WP_Customize_Control {

		public $type = 'trexo-guide';
		
		public function enqueue() {

		}

		public function to_json() {
			
			parent::to_json();

			$this->json['link']    = $this->get_link();
			$this->json['value']   = $this->value();
			$this->json['id']      = $this->id;
			$this->json['default'] = $this->default;
			
		}	
		
		public function render_content() {}
		
		public function content_template() { ?>

			<div id="trexo-upgrade-container" class="trexo-upgrade-container">

				<ol>
					<li>Select 'A static page' for "your homepage displays" in 'select frontpage type' section of 'Home/Front Page settings' tab.</li>
					<li>Enter details for various section like header, welcome, services, quote, social sections.</li>
				</ol>
									
			</div><!-- .trexo-upgrade-container -->
			
		<?php }	
		
	}	

	$wp_customize->register_control_type( 'trexo_Customize_Control_Upgrade' );
	$wp_customize->register_control_type( 'trexo_Customize_Control_Guide' );
	
	
}