<?php
/**
 * oxane Theme Customizer
 *
 * @package oxane
 */
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function oxane_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	
	
	//Logo Settings
	$wp_customize->add_section( 'title_tagline' , array(
	    'title'      => __( 'Title, Tagline & Logo', 'oxane' ),
	    'priority'   => 30,
	) );
	
	
	$wp_customize->add_setting( 'oxane_logo_resize' , array(
	    'default'     => 100,
	    'sanitize_callback' => 'oxane_sanitize_positive_number',
	) );
	$wp_customize->add_control(
	        'oxane_logo_resize',
	        array(
	            'label' => __('Resize & Adjust Logo','oxane'),
	            'section' => 'title_tagline',
	            'settings' => 'oxane_logo_resize',
	            'priority' => 6,
	            'type' => 'range',
	            'active_callback' => 'oxane_logo_enabled',
	            'input_attrs' => array(
			        'min'   => 30,
			        'max'   => 200,
			        'step'  => 5,
			    ),
	        )
	);
	
	function oxane_logo_enabled($control) {
		$option = $control->manager->get_setting('custom_logo');
		return $option->value() == true;
	}
	
	
	
	//Replace Header Text Color with, separate colors for Title and Description
	//Override oxane_site_titlecolor
	$wp_customize->remove_control('display_header_text');
	$wp_customize->remove_setting('header_textcolor');
	$wp_customize->add_setting('oxane_site_titlecolor', array(
	    'default'     => '#000',
	    'sanitize_callback' => 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(new WP_Customize_Color_Control( 
		$wp_customize, 
		'oxane_site_titlecolor', array(
			'label' => __('Site Title Color','oxane'),
			'section' => 'colors',
			'settings' => 'oxane_site_titlecolor',
			'type' => 'color'
		) ) 
	);
	
	$wp_customize->add_setting('oxane_header_desccolor', array(
	    'default'     => '#000',
	    'sanitize_callback' => 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(new WP_Customize_Color_Control( 
		$wp_customize, 
		'oxane_header_desccolor', array(
			'label' => __('Site Tagline Color','oxane'),
			'section' => 'colors',
			'settings' => 'oxane_header_desccolor',
			'type' => 'color'
		) ) 
	);
	
	//Settings for Header Image
	$wp_customize->add_setting( 'oxane_himg_style' , array(
	    'default'     => 'cover',
	    'sanitize_callback' => 'oxane_sanitize_himg_style'
	) );
	
	/* Sanitization Function */
	function oxane_sanitize_himg_style( $input ) {
		if (in_array( $input, array('contain','cover') ) )
			return $input;
		else
			return '';	
	}
	
	$wp_customize->add_control(
	'oxane_himg_style', array(
		'label' => __('Header Image Arrangement','oxane'),
		'section' => 'header_image',
		'settings' => 'oxane_himg_style',
		'type' => 'select',
		'choices' => array(
				'contain' => __('Contain','oxane'),
				'cover' => __('Cover Completely (Recommended)','oxane'),
				)
	) );
	
	$wp_customize->add_setting( 'oxane_himg_align' , array(
	    'default'     => 'center',
	    'sanitize_callback' => 'oxane_sanitize_himg_align'
	) );
	
	/* Sanitization Function */
	function oxane_sanitize_himg_align( $input ) {
		if (in_array( $input, array('center','left','right') ) )
			return $input;
		else
			return '';	
	}
	
	$wp_customize->add_control(
	'oxane_himg_align', array(
		'label' => __('Header Image Alignment','oxane'),
		'section' => 'header_image',
		'settings' => 'oxane_himg_align',
		'type' => 'select',
		'choices' => array(
				'center' => __('Center','oxane'),
				'left' => __('Left','oxane'),
				'right' => __('Right','oxane'),
			)
	) );
	
	$wp_customize->add_setting( 'oxane_himg_repeat' , array(
	    'default'     => true,
	    'sanitize_callback' => 'oxane_sanitize_checkbox'
	) );
	
	$wp_customize->add_control(
	'oxane_himg_repeat', array(
		'label' => __('Repeat Header Image','oxane'),
		'section' => 'header_image',
		'settings' => 'oxane_himg_repeat',
		'type' => 'checkbox',
	) );
	
	
	//Settings For Logo Area
	
	$wp_customize->add_setting(
		'oxane_hide_title_tagline',
		array( 'sanitize_callback' => 'oxane_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'oxane_hide_title_tagline', array(
		    'settings' => 'oxane_hide_title_tagline',
		    'label'    => __( 'Hide Title and Tagline.', 'oxane' ),
		    'section'  => 'title_tagline',
		    'type'     => 'checkbox',
		)
	);
	
	$wp_customize->add_setting(
		'oxane_branding_below_logo',
		array( 'sanitize_callback' => 'oxane_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'oxane_branding_below_logo', array(
		    'settings' => 'oxane_branding_below_logo',
		    'label'    => __( 'Display Site Title and Tagline Below the Logo.', 'oxane' ),
		    'section'  => 'title_tagline',
		    'type'     => 'checkbox',
		    'active_callback' => 'oxane_title_visible'
		)
	);
	
	function oxane_title_visible( $control ) {
		$option = $control->manager->get_setting('oxane_hide_title_tagline');
	    return $option->value() == false ;
	}
	
	//FEATURED POSTS
	
	$wp_customize->add_section(
	    'oxane_postslider',
	    array(
	        'title'     => __('Featured Posts Slider','oxane'),
	        'priority'  => 35,
	    )
	);
	
	$wp_customize->add_setting(
		'oxane_postslider_enable',
		array( 'sanitize_callback' => 'oxane_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'oxane_postslider_enable', array(
		    'settings' => 'oxane_postslider_enable',
		    'label'    => __( 'Enable', 'oxane' ),
		    'section'  => 'oxane_postslider',
		    'type'     => 'checkbox',
		)
	);
	
	
	$wp_customize->add_setting(
		'oxane_postslider_title',
		array( 'sanitize_callback' => 'sanitize_text_field' )
	);
	
	$wp_customize->add_control(
			'oxane_postslider_title', array(
		    'settings' => 'oxane_postslider_title',
		    'label'    => __( 'Title', 'oxane' ),
		    'section'  => 'oxane_postslider',
		    'type'     => 'text',
		)
	);
	
	
	
	$wp_customize->add_setting(
		    'oxane_postslider_cat',
		    array( 'sanitize_callback' => 'oxane_sanitize_category' )
		);
	
		
	$wp_customize->add_control(
	    new Oxane_WP_Customize_Category_Control(
	        $wp_customize,
	        'oxane_postslider_cat',
	        array(
	            'label'    => __('Category For Featured Posts Slider','oxane'),
	            'settings' => 'oxane_postslider_cat',
	            'section'  => 'oxane_postslider'
	        )
	    )
	);
	
	
	//FEATURED POSTS
	
	$wp_customize->add_section(
	    'oxane_featposts',
	    array(
	        'title'     => __('Featured Posts','oxane'),
	        'priority'  => 35,
	    )
	);
	
	$wp_customize->add_setting(
		'oxane_featposts_enable',
		array( 'sanitize_callback' => 'oxane_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'oxane_featposts_enable', array(
		    'settings' => 'oxane_featposts_enable',
		    'label'    => __( 'Enable', 'oxane' ),
		    'section'  => 'oxane_featposts',
		    'type'     => 'checkbox',
		)
	);
	
	
	$wp_customize->add_setting(
		'oxane_featposts_title',
		array( 'sanitize_callback' => 'sanitize_text_field' )
	);
	
	$wp_customize->add_control(
			'oxane_featposts_title', array(
		    'settings' => 'oxane_featposts_title',
		    'label'    => __( 'Title', 'oxane' ),
		    'section'  => 'oxane_featposts',
		    'type'     => 'text',
		)
	);
	
	
	
	$wp_customize->add_setting(
		    'oxane_featposts_cat',
		    array( 'sanitize_callback' => 'oxane_sanitize_category' )
		);
	
		
	$wp_customize->add_control(
	    new Oxane_WP_Customize_Category_Control(
	        $wp_customize,
	        'oxane_featposts_cat',
	        array(
	            'label'    => __('Category For Featured Posts','oxane'),
	            'settings' => 'oxane_featposts_cat',
	            'section'  => 'oxane_featposts'
	        )
	    )
	);
	
	$wp_customize->add_setting(
		'oxane_featposts_rows',
		array( 'sanitize_callback' => 'oxane_sanitize_positive_number' )
	);
	
	$wp_customize->add_control(
			'oxane_featposts_rows', array(
		    'settings' => 'oxane_featposts_rows',
		    'label'    => __( 'Max No. of Rows.', 'oxane' ),
		    'section'  => 'oxane_featposts',
		    'type'     => 'number',
		    'default'  => '0'
		)
	);
		
	// Layout and Design
	$wp_customize->add_panel( 'oxane_design_panel', array(
	    'priority'       => 40,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '',
	    'title'          => __('Design & Layout','oxane'),
	) );
	
	$wp_customize->add_section(
	    'oxane_design_options',
	    array(
	        'title'     => __('Blog Layout','oxane'),
	        'priority'  => 0,
	        'panel'     => 'oxane_design_panel'
	    )
	);
	
	
	$wp_customize->add_setting(
		'oxane_blog_layout',
		array( 'sanitize_callback' => 'oxane_sanitize_blog_layout' )
	);
	
	function oxane_sanitize_blog_layout( $input ) {
		if ( in_array($input, array('grid','grid_2_column','grid_3_column','oxane') ) )
			return $input;
		else 
			return '';	
	}
	
	$wp_customize->add_control(
		'oxane_blog_layout',array(
				'label' => __('Select Layout','oxane'),
				'settings' => 'oxane_blog_layout',
				'section'  => 'oxane_design_options',
				'type' => 'select',
				'choices' => array(
						'oxane' => __('Oxane Theme Layout','oxane'),
						'grid' => __('Basic Blog Layout','oxane'),
						'grid_2_column' => __('Grid - 2 Column','oxane'),
						'grid_3_column' => __('Grid - 3 Column','oxane'),
						
					)
			)
	);
	
	$wp_customize->add_section(
	    'oxane_sidebar_options',
	    array(
	        'title'     => __('Sidebar Layout','oxane'),
	        'priority'  => 0,
	        'panel'     => 'oxane_design_panel'
	    )
	);
	
	$wp_customize->add_setting(
		'oxane_disable_sidebar',
		array( 'sanitize_callback' => 'oxane_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'oxane_disable_sidebar', array(
		    'settings' => 'oxane_disable_sidebar',
		    'label'    => __( 'Disable Sidebar Everywhere.','oxane' ),
		    'section'  => 'oxane_sidebar_options',
		    'type'     => 'checkbox',
		    'default'  => false
		)
	);
	
	$wp_customize->add_setting(
		'oxane_disable_sidebar_home',
		array( 'sanitize_callback' => 'oxane_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'oxane_disable_sidebar_home', array(
		    'settings' => 'oxane_disable_sidebar_home',
		    'label'    => __( 'Disable Sidebar on Home/Blog.','oxane' ),
		    'section'  => 'oxane_sidebar_options',
		    'type'     => 'checkbox',
		    'active_callback' => 'oxane_show_sidebar_options',
		    'default'  => false
		)
	);
	
	$wp_customize->add_setting(
		'oxane_disable_sidebar_front',
		array( 'sanitize_callback' => 'oxane_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'oxane_disable_sidebar_front', array(
		    'settings' => 'oxane_disable_sidebar_front',
		    'label'    => __( 'Disable Sidebar on Front Page.','oxane' ),
		    'section'  => 'oxane_sidebar_options',
		    'type'     => 'checkbox',
		    'active_callback' => 'oxane_show_sidebar_options',
		    'default'  => false
		)
	);
	
	
	$wp_customize->add_setting(
		'oxane_sidebar_width',
		array(
			'default' => 4,
		    'sanitize_callback' => 'oxane_sanitize_positive_number' )
	);
	
	$wp_customize->add_control(
			'oxane_sidebar_width', array(
		    'settings' => 'oxane_sidebar_width',
		    'label'    => __( 'Sidebar Width','oxane' ),
		    'description' => __('Min: 25%, Default: 33%, Max: 40%','oxane'),
		    'section'  => 'oxane_sidebar_options',
		    'type'     => 'range',
		    'active_callback' => 'oxane_show_sidebar_options',
		    'input_attrs' => array(
		        'min'   => 3,
		        'max'   => 5,
		        'step'  => 1,
		        'class' => 'sidebar-width-range',
		        'style' => 'color: #0a0',
		    ),
		)
	);
	
	/* Active Callback Function */
	function oxane_show_sidebar_options($control) {
	   
	    $option = $control->manager->get_setting('oxane_disable_sidebar');
	    return $option->value() == false ;
	    
	}
	
	class Oxane_Custom_CSS_Control extends WP_Customize_Control {
	    public $type = 'textarea';
	 
	    public function render_content() {
	        ?>
	            <label>
	                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	                <textarea rows="8" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
	            </label>
	        <?php
	    }
	}
	
	$wp_customize-> add_section(
    'oxane_custom_codes',
    array(
    	'title'			=> __('Custom CSS','oxane'),
    	'description'	=> __('Enter your Custom CSS to Modify design.','oxane'),
    	'priority'		=> 11,
    	'panel'			=> 'oxane_design_panel'
    	)
    );
    
	$wp_customize->add_setting(
	'oxane_custom_css',
	array(
		'default'		=> '',
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'wp_filter_nohtml_kses',
		'sanitize_js_callback' => 'wp_filter_nohtml_kses'
		)
	);
	
	$wp_customize->add_control(
	    new Oxane_Custom_CSS_Control(
	        $wp_customize,
	        'oxane_custom_css',
	        array(
	            'section' => 'oxane_custom_codes',
	            'settings' => 'oxane_custom_css'
	        )
	    )
	);
	
	function oxane_sanitize_text( $input ) {
	    return wp_kses_post( force_balance_tags( $input ) );
	}
	
	$wp_customize-> add_section(
    'oxane_custom_footer',
    array(
    	'title'			=> __('Custom Footer Text','oxane'),
    	'description'	=> __('Enter your Own Copyright Text.','oxane'),
    	'priority'		=> 11,
    	'panel'			=> 'oxane_design_panel'
    	)
    );
    
	$wp_customize->add_setting(
	'oxane_footer_text',
	array(
		'default'		=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control(	 
	       'oxane_footer_text',
	        array(
	            'section' => 'oxane_custom_footer',
	            'settings' => 'oxane_footer_text',
	            'type' => 'text'
	        )
	);	
	
	$wp_customize->add_section(
	    'oxane_typo_options',
	    array(
	        'title'     => __('Google Web Fonts','oxane'),
	        'priority'  => 41,
	    )
	);
	
	$font_array = array('HIND','Khula','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','Arimo','Bitter','Noto Sans');
	$fonts = array_combine($font_array, $font_array);
	
	$wp_customize->add_setting(
		'oxane_title_font',
		array(
			'default'=> 'HIND',
			'sanitize_callback' => 'oxane_sanitize_gfont' 
			)
	);
	
	function oxane_sanitize_gfont( $input ) {
		if ( in_array($input, array('HIND','Khula','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','Arimo','Bitter','Noto Sans') ) )
			return $input;
		else
			return '';	
	}
	
	$wp_customize->add_control(
		'oxane_title_font',array(
				'label' => __('Title','oxane'),
				'settings' => 'oxane_title_font',
				'section'  => 'oxane_typo_options',
				'type' => 'select',
				'choices' => $fonts,
			)
	);
	
	$wp_customize->add_setting(
		'oxane_body_font',
			array(	'default'=> 'Open Sans',
					'sanitize_callback' => 'oxane_sanitize_gfont' )
	);
	
	$wp_customize->add_control(
		'oxane_body_font',array(
				'label' => __('Body','oxane'),
				'settings' => 'oxane_body_font',
				'section'  => 'oxane_typo_options',
				'type' => 'select',
				'choices' => $fonts
			)
	);
	
	// Social Icons
	$wp_customize->add_section('oxane_social_section', array(
			'title' => __('Social Icons','oxane'),
			'priority' => 44 ,
	));
	
	$social_networks = array( //Redefinied in Sanitization Function.
					'none' => __('-','oxane'),
					'facebook' => __('Facebook','oxane'),
					'twitter' => __('Twitter','oxane'),
					'google-plus' => __('Google Plus','oxane'),
					'instagram' => __('Instagram','oxane'),
					'rss' => __('RSS Feeds','oxane'),
					'vine' => __('Vine','oxane'),
					'vimeo-square' => __('Vimeo','oxane'),
					'youtube' => __('Youtube','oxane'),
					'flickr' => __('Flickr','oxane'),
				);
				
	$social_count = count($social_networks);
				
	for ($x = 1 ; $x <= ($social_count - 3) ; $x++) :
			
		$wp_customize->add_setting(
			'oxane_social_'.$x, array(
				'sanitize_callback' => 'oxane_sanitize_social',
				'default' => 'none'
			));

		$wp_customize->add_control( 'oxane_social_'.$x, array(
					'settings' => 'oxane_social_'.$x,
					'label' => __('Icon ','oxane').$x,
					'section' => 'oxane_social_section',
					'type' => 'select',
					'choices' => $social_networks,			
		));
		
		$wp_customize->add_setting(
			'oxane_social_url'.$x, array(
				'sanitize_callback' => 'esc_url_raw'
			));

		$wp_customize->add_control( 'oxane_social_url'.$x, array(
					'settings' => 'oxane_social_url'.$x,
					'description' => __('Icon ','oxane').$x.__(' Url','oxane'),
					'section' => 'oxane_social_section',
					'type' => 'url',
					'choices' => $social_networks,			
		));
		
	endfor;
	
	function oxane_sanitize_social( $input ) {
		$social_networks = array(
					'none' ,
					'facebook',
					'twitter',
					'google-plus',
					'instagram',
					'rss',
					'vine',
					'vimeo-square',
					'youtube',
					'flickr'
				);
		if ( in_array($input, $social_networks) )
			return $input;
		else
			return '';	
	}	
	
		$wp_customize->add_section(
	    'oxane_sec_upgrade',
	    array(
	        'title'     => __('Oxane - Help & Support','oxane'),
	        'priority'  => 45,
	    )
	);
	
	$wp_customize->add_setting(
			'oxane_upgrade',
			array( 'sanitize_callback' => 'esc_textarea' )
		);
			
	$wp_customize->add_control(
	    new Oxane_WP_Customize_Upgrade_Control(
	        $wp_customize,
	        'oxane_upgrade',
	        array(
	            'label' => __('WordPress Support Forums','oxane'),
	            'description' => __('Visit the Official WordPress Support Forums for Help related to this theme. <a href="https://wordpress.org/support/theme/oxane">Upgrade to Pro</a>.','oxane'),
	            'section' => 'oxane_sec_upgrade',
	            'settings' => 'oxane_upgrade',			       
	        )
		)
	);
	
	
	/* Sanitization Functions Common to Multiple Settings go Here, Specific Sanitization Functions are defined along with add_setting() */
	function oxane_sanitize_checkbox( $input ) {
	    if ( $input == 1 ) {
	        return 1;
	    } else {
	        return '';
	    }
	}
	
	function oxane_sanitize_positive_number( $input ) {
		if ( ($input >= 0) && is_numeric($input) )
			return $input;
		else
			return '';	
	}
	
	function oxane_sanitize_category( $input ) {
		if ( term_exists(get_cat_name( $input ), 'category') )
			return $input;
		else 
			return '';	
	}
	
	
}
add_action( 'customize_register', 'oxane_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function oxane_customize_preview_js() {
	wp_enqueue_script( 'oxane_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'oxane_customize_preview_js' );
