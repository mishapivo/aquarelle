<?php
/**
 * Multipurpose Magazine Theme Customizer
 * @package Multipurpose Magazine
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function multipurpose_magazine_customize_register( $wp_customize ) {	

	//add home page setting pannel
	$wp_customize->add_panel( 'multipurpose_magazine_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'multipurpose-magazine' ),
	    'description' => __( 'Description of what this panel does.', 'multipurpose-magazine' ),
	) );

	//layout setting
	$wp_customize->add_section( 'multipurpose_magazine_theme_layout', array(
    	'title'      => __( 'Layout Settings', 'multipurpose-magazine' ),
		'priority'   => null,
		'panel' => 'multipurpose_magazine_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('multipurpose_magazine_layout',array(
	        'default' => __( 'Right Sidebar', 'multipurpose-magazine' ),
	        'sanitize_callback' => 'multipurpose_magazine_sanitize_choices'	        
	)   );
	$wp_customize->add_control(new Multipurpose_Magazine_Image_Radio_Control($wp_customize, 'multipurpose_magazine_layout', array(
        'type' => 'radio',
        'label' => esc_html__('Select default layout', 'multipurpose-magazine'),
        'section' => 'multipurpose_magazine_theme_layout',
        'settings' => 'multipurpose_magazine_layout',
        'choices' => array(
            'Right Sidebar' => get_template_directory_uri() . '/images/layout3.png',
            'Left Sidebar' => get_template_directory_uri() . '/images/layout2.png',
            'One Column' => get_template_directory_uri() . '/images/layout1.png',
            'Three Columns' => get_template_directory_uri() . '/images/layout4.png',
            'Four Columns' => get_template_directory_uri() . '/images/layout5.png',
            'Grid Layout' => get_template_directory_uri() . '/images/layout6.png'
        )
    )));

	//Topbar section
	$wp_customize->add_section('multipurpose_magazine_topbar_icon',array(
		'title'	=> __('Topbar Section','multipurpose-magazine'),
		'description'	=> __('Add Header Content here','multipurpose-magazine'),
		'priority'	=> null,
		'panel' => 'multipurpose_magazine_panel_id',
	));

	$wp_customize->add_setting( 'multipurpose_magazine_popular_maazine', array(
		'default'           => '',
		'sanitize_callback' => 'multipurpose_magazine_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'multipurpose_magazine_popular_maazine', array(
		'label'    => __( 'Select Popular Magazine Page', 'multipurpose-magazine' ),
		'description' => __('Image Size ( 570 x 110 )','multipurpose-magazine'),
		'section'  => 'multipurpose_magazine_topbar_icon',
		'type'     => 'dropdown-pages'
	) );

	$wp_customize->add_setting('multipurpose_magazine_time',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('multipurpose_magazine_time',array(
		'label'	=> __('Add Time','multipurpose-magazine'),
		'section'	=> 'multipurpose_magazine_topbar_icon',
		'setting'	=> 'multipurpose_magazine_time',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('multipurpose_magazine_time_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('multipurpose_magazine_time_text',array(
		'label'	=> __('Add Time Text','multipurpose-magazine'),
		'section'	=> 'multipurpose_magazine_topbar_icon',
		'setting'	=> 'multipurpose_magazine_time_text',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('multipurpose_magazine_temperature',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('multipurpose_magazine_temperature',array(
		'label'	=> __('Add Temperature','multipurpose-magazine'),
		'section'	=> 'multipurpose_magazine_topbar_icon',
		'setting'	=> 'multipurpose_magazine_temperature',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('multipurpose_magazine_temperature_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('multipurpose_magazine_temperature_text',array(
		'label'	=> __('Add Temperature Text','multipurpose-magazine'),
		'section'	=> 'multipurpose_magazine_topbar_icon',
		'setting'	=> 'multipurpose_magazine_temperature_text',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('multipurpose_magazine_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('multipurpose_magazine_email',array(
		'label'	=> __('Add Email Address','multipurpose-magazine'),
		'section'	=> 'multipurpose_magazine_topbar_icon',
		'setting'	=> 'multipurpose_magazine_email',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('multipurpose_magazine_email_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('multipurpose_magazine_email_text',array(
		'label'	=> __('Add Email Text','multipurpose-magazine'),
		'section'	=> 'multipurpose_magazine_topbar_icon',
		'setting'	=> 'multipurpose_magazine_email_text',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('multipurpose_magazine_breaking_news',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('multipurpose_magazine_breaking_news',array(
		'label'	=> __('Add Breaking News','multipurpose-magazine'),
		'section'	=> 'multipurpose_magazine_topbar_icon',
		'setting'	=> 'multipurpose_magazine_breaking_news',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('multipurpose_magazine_login_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('multipurpose_magazine_login_text',array(
		'label'	=> __('Add Login Text','multipurpose-magazine'),
		'section'	=> 'multipurpose_magazine_topbar_icon',
		'setting'	=> 'multipurpose_magazine_login_text',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('multipurpose_magazine_login_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('multipurpose_magazine_login_link',array(
		'label'	=> __('Add Login Link','multipurpose-magazine'),
		'section'	=> 'multipurpose_magazine_topbar_icon',
		'setting'	=> 'multipurpose_magazine_login_link',
		'type'		=> 'url'
	));

	//Our Blog Category section
  	$wp_customize->add_section('multipurpose_magazine_category_section',array(
	    'title' => __('Slider Section','multipurpose-magazine'),
	    'description' => '',
	    'priority'  => null,
	    'panel' => 'multipurpose_magazine_panel_id',
	)); 

	// category left
	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
	if($i==0){
	$default = $category->slug;
	$i++;
	}
	$cat_post[$category->slug] = $category->name;
	}

    $wp_customize->add_setting('multipurpose_magazine_category3',array(
	    'default' => 'select',
	    'sanitize_callback' => 'multipurpose_magazine_sanitize_choices',
  	));
  	$wp_customize->add_control('multipurpose_magazine_category3',array(
	    'type'    => 'select',
	    'choices' => $cat_post,
	    'label' => __('Select Category to display Latest Post','multipurpose-magazine'),
	    'section' => 'multipurpose_magazine_category_section',
	));

	//Top Trending Section
	$wp_customize->add_section('multipurpose_magazine_about',array(
		'title'	=> __('Top Trending News','multipurpose-magazine'),
		'description'	=> __('Add Top Trending sections below.','multipurpose-magazine'),
		'panel' => 'multipurpose_magazine_panel_id',
	));

	$wp_customize->add_setting('multipurpose_magazine_page_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('multipurpose_magazine_page_title',array(
		'label'	=> __('Section Title','multipurpose-magazine'),
		'section'	=> 'multipurpose_magazine_about',
		'type'		=> 'text'
	));

	// category left
	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
	if($i==0){
	$default = $category->slug;
	$i++;
	}
	$cat_post[$category->slug] = $category->name;
	}

    $wp_customize->add_setting( 'multipurpose_magazine_category', array(
      'default'           => '',
      'sanitize_callback' => 'multipurpose_magazine_sanitize_choices'
    ));
    $wp_customize->add_control('multipurpose_magazine_category',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display Latest Post','multipurpose-magazine'),
		'section' => 'multipurpose_magazine_about',
	));

	//footer text
	$wp_customize->add_section('multipurpose_magazine_footer_section',array(
		'title'	=> __('Footer Text','multipurpose-magazine'),
		'description'	=> __('Add some text for footer like copyright etc.','multipurpose-magazine'),
		'panel' => 'multipurpose_magazine_panel_id'
	));
	
	$wp_customize->add_setting('multipurpose_magazine_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('multipurpose_magazine_text',array(
		'label'	=> __('Copyright Text','multipurpose-magazine'),
		'section'	=> 'multipurpose_magazine_footer_section',
		'type'		=> 'text'
	));	
}
add_action( 'customize_register', 'multipurpose_magazine_customize_register' );	

load_template( ABSPATH . 'wp-includes/class-wp-customize-control.php' );

class Multipurpose_Magazine_Image_Radio_Control extends WP_Customize_Control {

    public function render_content() {
 
        if (empty($this->choices))
            return;
 
        $name = '_customize-radio-' . $this->id;
        ?>
        <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
        <ul class="controls" id='multipurpose-magazine-img-container'>
            <?php
            foreach ($this->choices as $value => $label) :
                $class = ($this->value() == $value) ? 'multipurpose-magazine-radio-img-selected multipurpose-magazine-radio-img-img' : 'multipurpose-magazine-radio-img-img';
                ?>
                <li style="display: inline;">
                    <label>
                        <input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr($value); ?>" name="<?php echo esc_attr($name); ?>" <?php
                          	$this->link();
                          	checked($this->value(), $value);
                          	?> />
                        <img src='<?php echo esc_url($label); ?>' class='<?php echo esc_attr($class); ?>' />
                    </label>
                </li>
                <?php
            endforeach;
            ?>
        </ul>
        <?php
    }
 
}



/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Multipurpose_Magazine_Customize {

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
		$manager->register_section_type( 'Multipurpose_Magazine_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Multipurpose_Magazine_Customize_Section_Pro(
			$manager,
			'example_1',
				array(
				'priority'   => 9,
				'title'    => esc_html__( 'Multipurpose Magazine Pro', 'multipurpose-magazine' ),
				'pro_text' => esc_html__( 'Go Pro', 'multipurpose-magazine' ),
				'pro_url'  => esc_url('https://www.themesglance.com/themes/magazine-wordpress-theme/')					
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

		wp_enqueue_script( 'multipurpose-magazine-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'multipurpose-magazine-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!

Multipurpose_Magazine_Customize::get_instance();