<?php

// Global variables define
define('CHILLY_PARENT_TEMPLATE_DIR_URI',get_template_directory_uri());	
define('CHILLY_ST_TEMPLATE_DIR_URI',get_stylesheet_directory_uri());
define('CHILLY_ST_TEMPLATE_DIR',trailingslashit(get_stylesheet_directory()));


add_action('wp_enqueue_scripts', 'chilly_theme_css', 999);
function chilly_theme_css() {
    wp_enqueue_style( 'chilly-parent-style', CHILLY_PARENT_TEMPLATE_DIR_URI . '/style.css' );
	wp_enqueue_style('chilly-child-style',CHILLY_ST_TEMPLATE_DIR_URI . '/style.css',array('parent-style'));
	wp_enqueue_style('bootstrap', ST_TEMPLATE_DIR . '/css/bootstrap.css');
	wp_enqueue_style('chilly-default-style-css', CHILLY_ST_TEMPLATE_DIR_URI ."/css/default.css" );
	wp_enqueue_style('chilly-theme-menu-style', CHILLY_ST_TEMPLATE_DIR_URI .'/css/theme-menu.css');
	wp_enqueue_style('chilly-media-responsive-css', CHILLY_ST_TEMPLATE_DIR_URI ."/css/media-responsive.css" );
	wp_dequeue_style('chilly-default-css', CHILLY_PARENT_TEMPLATE_DIR_URI .'/css/default.css');   
}

if ( ! function_exists( 'chilly_theme_setup' ) ) :

function chilly_theme_setup() {

//Load text domain for translation-ready
load_theme_textdomain('chilly', CHILLY_ST_TEMPLATE_DIR . '/languages');

require( CHILLY_ST_TEMPLATE_DIR . '/functions/customizer/customizer_general_settings.php' );

if ( is_admin() ) {
				require CHILLY_ST_TEMPLATE_DIR . '/admin/admin-init.php';
			}
}
endif; 
add_action( 'after_setup_theme', 'chilly_theme_setup' );

add_action( 'admin_init', 'chilly_detect_button' );
	function chilly_detect_button() {
	wp_enqueue_style( 'chilly-info-button', CHILLY_ST_TEMPLATE_DIR_URI . '/css/import-button.css' );
}


/**
 * Import options from SpicePress
 *
 */
function chilly_get_lite_options() {
	$spicepress_mods = get_option( 'theme_mods_spicepress' );
	if ( ! empty( $spicepress_mods ) ) {
		foreach ( $spicepress_mods as $spicepress_mod_k => $spicepress_mod_v ) {
			set_theme_mod( $spicepress_mod_k, $spicepress_mod_v );
		}
	}
}
add_action( 'after_switch_theme', 'chilly_get_lite_options' );

//Ragiter Customize
if ( ! function_exists( 'chilly_slider_customize_register' ) ) :
function chilly_slider_customize_register($wp_customize){
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	

/* Slider Section */
	$wp_customize->add_section( 'slider_section' , array(
		'title'      => esc_html__('Slider settings', 'chilly'),
		'panel'  => 'section_settings',
		'priority'   => 1,
   	) );
		
		// Enable slider
		$wp_customize->add_setting( 'home_page_slider_enabled' , array( 'default' => 'on', 'sanitize_callback' => 'chilly_sanitize_select',) );
		$wp_customize->add_control(	'home_page_slider_enabled' , array(
				'label'    => esc_html__( 'Enable slider', 'chilly' ),
				'section'  => 'slider_section',
				'type'     => 'radio',
				'choices' => array(
					'on'=> esc_html__('ON', 'chilly'),
					'off'=> esc_html__('OFF', 'chilly')
				)
		));
		
		
		//Slider Image
		$wp_customize->add_setting( 'home_slider_image',array('default' => CHILLY_ST_TEMPLATE_DIR_URI .'/images/slider.jpg',
		'sanitize_callback' => 'esc_url_raw', 'transport' => $selective_refresh,));
 
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'home_slider_image',
				array(
					'type'        => 'upload',
					'label' => esc_html__('Image','chilly'),
					'settings' =>'home_slider_image',
					'section' => 'slider_section',
					
				)
			)
		);
		
		// Image overlay
		$wp_customize->add_setting( 'slider_image_overlay', array(
			'default' => true,
			'sanitize_callback' => 'chilly_sanitize_checkbox',
		) );
		
		$wp_customize->add_control('slider_image_overlay', array(
			'label'    => esc_html__('Enable slider image overlay', 'chilly' ),
			'section'  => 'slider_section',
			'type' => 'checkbox',
		) );
		
		
		//Slider Background Overlay Color
		$wp_customize->add_setting( 'slider_overlay_section_color', array(
			'sanitize_callback' => 'chilly_sanitize_rgba',
			'default' => 'rgba(0,0,0,0.30)',
            ) );	
            
            $wp_customize->add_control(new SpicePress_Customize_Alpha_Color_Control( $wp_customize,'slider_overlay_section_color', array(
               'label'      => esc_html__('Slider image overlay color','chilly' ),
                'palette' => true,
                'section' => 'slider_section')
            ) );
		
		
		// Slider title
		$wp_customize->add_setting( 'home_slider_title',array(
		'default' => esc_html__('Welcome to Chilly Theme','chilly'),
		'sanitize_callback' => 'chilly_home_page_sanitize_text',
		'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'home_slider_title',array(
		'label'   => esc_html__('Title','chilly'),
		'section' => 'slider_section',
		'type' => 'text',
		));	
		
		//Slider discription
		$wp_customize->add_setting( 'home_slider_discription',array(
		'default' => 'Sea summo mazim ex, ea errem eleifend definitionem vim. Ut nec hinc dolor possim mei ludus efficiendi ei sea summo mazim ex.',
		'sanitize_callback' => 'chilly_home_page_sanitize_text',
		'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'home_slider_discription',array(
		'label'   => esc_html__('Description','chilly'),
		'section' => 'slider_section',
		'type' => 'textarea',
		));
		
		
		// Slider button text
		$wp_customize->add_setting( 'home_slider_btn_txt',array(
		'default' => esc_html__('Read more','chilly'),
		'sanitize_callback' => 'chilly_home_page_sanitize_text',
		'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'home_slider_btn_txt',array(
		'label'   => esc_html__('Button Text','chilly'),
		'section' => 'slider_section',
		'type' => 'text',
		));
		
		// Slider button link
		$wp_customize->add_setting( 'home_slider_btn_link',array(
		'default' => esc_html__('#','chilly'),
		'sanitize_callback' => 'chilly_home_page_sanitize_text',
		'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'home_slider_btn_link',array(
		'label'   => esc_html__('Button Link','chilly'),
		'section' => 'slider_section',
		'type' => 'text',
		));
		
		// Slider button target
		$wp_customize->add_setting(
		'home_slider_btn_target', 
			array(
			'default'        => false,
			'sanitize_callback' => 'chilly_sanitize_checkbox',
		));
		$wp_customize->add_control('home_slider_btn_target', array(
			'label'   => esc_html__('Open link in new tab', 'chilly'),
			'section' => 'slider_section',
			'type' => 'checkbox',
		));
		
		
		
}

add_action( 'customize_register', 'chilly_slider_customize_register' );
endif;


/**
 * Add selective refresh for Front page section section controls.
 */
function chilly_register_home_slider_section_partials( $wp_customize ){

	
	
	$wp_customize->selective_refresh->add_partial( 'home_slider_image', array(
		'selector'            => '.slider .item',
		'settings'            => 'home_slider_image',
	
	) );
	
	//Slider section
	$wp_customize->selective_refresh->add_partial( 'home_slider_title', array(
		'selector'            => '.format-standard .slide-text-bg1 h1',
		'settings'            => 'home_slider_title',
		'render_callback'  => 'chilly_slider_section_title_render_callback',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'home_slider_discription', array(
		'selector'            => '.format-standard .slide-text-bg1 p',
		'settings'            => 'home_slider_discription',
		'render_callback'  => 'chilly_slider_section_discription_render_callback',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'home_slider_btn_txt', array(
		'selector'            => '.slide-btn-sm',
		'settings'            => 'home_slider_btn_txt',
		'render_callback'  => 'chilly_slider_btn_render_callback',
	
	) );
}

add_action( 'customize_register', 'chilly_register_home_slider_section_partials' );


function chilly_slider_section_title_render_callback() {
	return get_theme_mod( 'home_slider_title' );
}

function chilly_slider_section_discription_render_callback() {
	return get_theme_mod( 'home_slider_discription' );
}

function chilly_slider_btn_render_callback() {
	return get_theme_mod( 'home_slider_btn_txt' );
}

function chilly_home_page_sanitize_text( $input ) {

		return wp_kses_post( force_balance_tags( $input ) );

}

/* Read more on post*/
function chilly_excerpt_more( $more ) {
	return '<p><a href="' . esc_url(get_permalink()) . '" class="more-link">'.esc_html__('Read More','chilly').'</a></p>';
}
add_filter( 'excerpt_more', 'chilly_excerpt_more', 20 );


// "Read More" text link in a content
function chilly_read_more_link() {
    return '<p><a href="' . esc_url(get_permalink()) . '" class="more-link">'.esc_html__('Read More','chilly').'</a></p>';
}
add_filter( 'the_content_more_link', 'chilly_read_more_link' );


function chilly_general_settings_customizer( $wp_customize ){

/* Remove animation */
	$wp_customize->add_section( 'banner_image_setting', array(
		'title'      => esc_html__('Banner setting','chilly'),
		'panel'  => 'general_settings',
   	) );
	
	
		// Banner Image remove
		$wp_customize->add_setting( 'remove_banner_image',array(
		'capability'     => 'edit_theme_options',
		'default' => false,
		'sanitize_callback' => 'chilly_sanitize_checkbox',
		));	
		$wp_customize->add_control( 'remove_banner_image',array(
		'label'   => esc_html__('Banner image remove from all pages','chilly'),
		'section' => 'banner_image_setting',
		'type' => 'checkbox',
		));
}
add_action( 'customize_register', 'chilly_general_settings_customizer' );


//Remove Banner Image
function chilly_banner_image()
{
$remove_banner_image = get_theme_mod('remove_banner_image',false);
if($remove_banner_image !=true)
{
 get_template_part('index','slider');	
}
}


if ( ! function_exists( 'chilly_sanitize_checkbox' ) ) :

	/**
	 * Sanitize checkbox.
	 *
	 * @since 1.0.0
	 *
	 * @param bool $checked Whether the checkbox is checked.
	 * @return bool Whether the checkbox is checked.
	 */
	function chilly_sanitize_checkbox( $checked ) {

		return ( ( isset( $checked ) && true === $checked ) ? true : false );
	}

endif;


if ( ! function_exists( 'chilly_sanitize_select' ) ) :

	/**
	 * Sanitize select.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed                $input The value to sanitize.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return mixed Sanitized value.
	 */
	function chilly_sanitize_select( $input, $setting ) {

		$input = sanitize_text_field( $input );

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}

endif;

			/**
			 * Sanitize rgba color.
			 *
			 * @param string $value Color in rgba format.
			 *
			 * @return string
			 */
function chilly_sanitize_rgba( $value ) {
				
		$red   = 'rgba(0,0,0,0)';
		$green = 'rgba(0,0,0,0)';
		$blue  = 'rgba(0,0,0,0)';
		$alpha = 'rgba(0,0,0,0)';   // If empty or an array return transparent
		if ( empty( $value ) || is_array( $value ) ) {
			return '';
		}

		// By now we know the string is formatted as an rgba color so we need to further sanitize it.
		$value = str_replace( ' ', '', $value );
		sscanf( $value, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
		return 'rgba(' . $red . ',' . $green . ',' . $blue . ',' . $alpha . ')';
}