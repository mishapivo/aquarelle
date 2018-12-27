<?php
/**
 * Seasonal Theme Customizer
 *
 * @package Seasonal
 */
 


function seasonal_customize_register( $wp_customize ) {
	
// Lets make some changes to the default Wordpress sections and controls

	$wp_customize->get_section( 'header_image' )->title = __( 'Header Logo', 'seasonal' );
  	$wp_customize->get_section( 'background_image' )->title = __( 'Sidebar Background Image', 'seasonal' );
  	$wp_customize->get_control( 'background_color' )->label = __( 'Sidebar Background Colour without Background Image)', 'seasonal' );
  	$wp_customize->remove_control('display_header_text');
  	$wp_customize->remove_control('header_textcolor');

// Setting group to show the site title  
  	$wp_customize->add_setting( 'show_site_title',
    array(
      'default' => 1,
      'sanitize_callback' => 'seasonal_sanitize_checkbox'
    )
  );  
  $wp_customize->add_control( 'show_site_title', array(
    'type'     => 'checkbox',
    'priority' => 1,
    'label'    => __( 'Show Site Title', 'seasonal' ),
    'section'  => 'title_tagline',
  ) );

// Setting group to show the tagline  
  $wp_customize->add_setting( 'show_tagline',
    array(
      'default' => 1,
      'sanitize_callback' => 'seasonal_sanitize_checkbox'
    )
  );  
  $wp_customize->add_control( 'show_tagline', array(
    'type'     => 'checkbox',
    'priority' => 2,
    'label'    => __( 'Show Tagline', 'seasonal' ),
    'section'  => 'title_tagline',
  ) );

/*
 * Blog Options
 */  
  $wp_customize->add_section( 'blog_options',
    array(
      'title' => __( 'Blog Options', 'seasonal' ),
	  'priority' => 81,
    )
  ); 

// Setting group for blog style  
  $wp_customize->add_setting( 'blog_style', array(
      'default' => 'blog-full',
      'sanitize_callback' => 'seasonal_sanitize_blog_style',
    ) );  
	$wp_customize->add_control( 'blog_style', array(
		  'type' => 'radio',
		  'label' => __( 'Blog Style', 'seasonal' ),
		  'section' => 'blog_options',
		  'priority' => 2,
		  'choices' => array(
			  'blog-full' => __( 'Blog Full Style', 'seasonal' ),
			  'blog-small' => __( 'Blog Small Style', 'seasonal' ),
	) ) );

// Setting group for text alignment on blog summaries  
  $wp_customize->add_setting( 'blog_alignment', array(
      'default' => 'left',
      'sanitize_callback' => 'seasonal_sanitize_blog_alignment',
    ) );  
	$wp_customize->add_control( 'blog_alignment', array(
		  'type' => 'radio',
		  'label' => __( 'Blog Home Alignment', 'seasonal' ),
		  'section' => 'blog_options',
		  'priority' => 3,
		  'choices' => array(
			  'left' => __( 'Left', 'seasonal' ),
			  'center' => __( 'Centered', 'seasonal' ),
	) ) );
	
// Setting group to show the edit links  
  $wp_customize->add_setting( 'show_edit',
    array(
      'default' => 1,
      'sanitize_callback' => 'seasonal_sanitize_checkbox',
    ) );  
  $wp_customize->add_control( 'show_edit', array(
    'type'     => 'checkbox',
    'priority' => 4,
    'label'    => __( 'Show Edit Link', 'seasonal' ),
    'section'  => 'blog_options',
  ) );
  
// Setting group to show the categories  
  $wp_customize->add_setting( 'show_categories',
    array(
      'default' => 1,
      'sanitize_callback' => 'seasonal_sanitize_checkbox',
    ) );  
  $wp_customize->add_control( 'show_categories', array(
    'type'     => 'checkbox',
    'priority' => 5,
    'label'    => __( 'Show Categories in Summary', 'seasonal' ),
    'section'  => 'blog_options',
  ) );
  
// Setting group to show the categories  
  $wp_customize->add_setting( 'show_single_categories',
    array(
      'default' => 1,
      'sanitize_callback' => 'seasonal_sanitize_checkbox',
    )
  );  
  $wp_customize->add_control( 'show_single_categories', array(
    'type'     => 'checkbox',
    'priority' => 6,
    'label'    => __( 'Show Categories on Full Post', 'seasonal' ),
    'section'  => 'blog_options',
  ) );  
  
// Setting group to show the date  
  $wp_customize->add_setting( 'show_posted_date',
    array(
      'default' => 1,
      'sanitize_callback' => 'seasonal_sanitize_checkbox',
    )
  );  
  $wp_customize->add_control( 'show_posted_date', array(
    'type'     => 'checkbox',
    'priority' => 7,
    'label'    => __( 'Show Posted Date', 'seasonal' ),
    'section'  => 'blog_options',
  ) );

// Setting group to show tags  
  $wp_customize->add_setting( 'show_tags_list',
    array(
      'default' => 1,
      'sanitize_callback' => 'seasonal_sanitize_checkbox',
    )
  );  
  $wp_customize->add_control( 'show_tags_list', array(
    'type'     => 'checkbox',
    'priority' => 8,
    'label'    => __( 'Show Tags', 'seasonal' ),
    'section'  => 'blog_options',
  ) );

// Setting group to show share buttons  
  $wp_customize->add_setting( 'show_single_thumbnail',
    array(
      'default' => 1,
      'sanitize_callback' => 'seasonal_sanitize_checkbox',
    )
  );  
  $wp_customize->add_control( 'show_single_thumbnail', array(
    'type'     => 'checkbox',
    'priority' => 9,
    'label'    => __( 'Show Featured Image on Full Post', 'seasonal' ),
    'section'  => 'blog_options',
  ) );

// Setting group to show published by  
  $wp_customize->add_setting( 'show_post_author',
    array(
      'default' => 1,
      'sanitize_callback' => 'seasonal_sanitize_checkbox',
    )
  ); 
  $wp_customize->add_control( 'show_post_author', array(
    'type'     => 'checkbox',
    'priority' => 10,
    'label'    => __( 'Show Post Author', 'seasonal' ),
    'section'  => 'blog_options',
  ) );


/*
 * Other Options Section
 */    
$wp_customize->add_section( 'other_options', array(
	'title' => __( 'Other Options', 'seasonal' ),
	'priority'       => 82,
	) ); 

// Setting group for sidebar width
$wp_customize->add_setting( 'sidebar_width', array(
    'default' => 33,
    'sanitize_callback' => 'seasonal_sanitize_number'
) );

$wp_customize->add_control( 'sidebar_width', array(
    'label' => __( 'Sidebar Width in Percent', 'seasonal' ),
    'section' => 'other_options',
	'type' => 'text',
	'description' => __( 'Default: 33', 'seasonal' ),
	'priority' => 1,
) );  
		  
// Content width	  
	$wp_customize->add_setting( 'content_width', array(
		'default' => 1,
		'sanitize_callback' => 'seasonal_sanitize_checkbox',
		)
	);  
	$wp_customize->add_control( 'content_width', array(
		'type'     => 'checkbox',
		'priority' => 2,
		'label'    => __( 'Fluid Content Width', 'seasonal' ),
		'section'  => 'other_options',
	) );	 
  
// Setting group for a Copyright
	$wp_customize->add_setting( 'copyright', array(
		'default'        => 'Your Name',
		'sanitize_callback' => 'seasonal_sanitize_text',
	) );
	$wp_customize->add_control( 'copyright', array(
		'settings' => 'copyright',
		'label'    => __( 'Your Copyright Name', 'seasonal' ),
		'section'  => 'other_options',		
		'type'     => 'text',
		'priority' => 3,
	) );
	
	
/*
 * Sidebar Background Image
 */
	$wp_customize->add_setting( 'background_image_size', array(
		'default' => 'cover',
		'sanitize_callback' => 'seasonal_sanitize_background_size'
		)
	);
	$wp_customize->add_control(
	  'background_image_size', array(
		  'type' => 'radio',
		  'label' => __( 'Background Size', 'seasonal' ),
		  'section' => 'background_image',
		  'choices' => array(
			  'auto' => __( 'Auto', 'seasonal' ),
			  'cover' => __( 'Cover', 'seasonal' ),
			  'contain' => __( 'Contain', 'seasonal' ),
	 ) ) );	
	
// Setting group for a background overlay opacity 	
  $wp_customize->add_setting( 'background_overlay_opacity',
    array(
      'default' => 0.3,
      'sanitize_callback' => 'seasonal_sanitize_rangeslider'
    ) );
  
  $wp_customize->add_control( 'background_overlay_opacity', array(
    'type'        => 'range',
    'section'     => 'background_image',
    'label'       => __( 'Background Overlay Opacity', 'seasonal' ),
    'input_attrs' => array(
        'min'   => 0,
        'max'   => 1,
        'step'  => 0.05,
    ) ) );	

/*
 * Colors
 */
	
// Setting group Site title.
	$wp_customize->add_setting( 'site_title', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'seasonal_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_title', array(
		'label'   => __( 'Site Title Colour', 'seasonal' ),
		'section' => 'colors',
		'settings'   => 'site_title',
		'priority' => 1,			
	) ) ); 	
	
// Setting group Site tagline.
	$wp_customize->add_setting( 'site_tagline', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'seasonal_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_tagline', array(
		'label'   => __( 'Site Tagline Colour', 'seasonal' ),
		'section' => 'colors',
		'settings'   => 'site_tagline',
		'priority' => 2,			
	) ) );	
 // Setting group link colour.
	$wp_customize->add_setting( 'link_colour', array(
		'default' => '#7599c5',
		'sanitize_callback' => 'seasonal_sanitize_hex_colour'
		) );
		
	$wp_customize->add_control(	new WP_Customize_Color_Control( $wp_customize, 'link_colour', array(
	  'label' => __( 'Link color', 'seasonal' ),
	  'section' => 'colors',
	  'settings' => 'link_colour',
	  'priority' => 3,
	) ) ); 
	
// Setting group for the link colour on hover
	$wp_customize->add_setting( 'link_colour_hover',	array(
		'default' => '#424242',
		'sanitize_callback' => 'seasonal_sanitize_text'
		));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_colour_hover', array(
	  'label' => __( 'Link colour on hover', 'seasonal' ),
	  'section' => 'colors',
	  'settings' => 'link_colour_hover',
	  'priority' => 4,
	) ) );	
	
// Setting group social background.
	$wp_customize->add_setting( 'social_bg', array(
		'default'        => '',
		'sanitize_callback' => 'seasonal_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'social_bg', array(
		'label'   => __( 'Sidebar Social Background', 'seasonal' ),
		'section' => 'colors',
		'settings'   => 'social_bg',
		'priority' => 5,			
	) ) );	
	
// Setting group social icon.
	$wp_customize->add_setting( 'social_icon', array(
		'default'        => '#fff',
		'sanitize_callback' => 'seasonal_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'social_icon', array(
		'label'   => __( 'Sidebar Social Icon', 'seasonal' ),
		'section' => 'colors',
		'settings'   => 'social_icon',
		'priority' => 6,			
	) ) );	
	
// Setting group social background on hover.
	$wp_customize->add_setting( 'social_bg_hover', array(
		'default'        => '',
		'sanitize_callback' => 'seasonal_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'social_bg_hover', array(
		'label'   => __( 'Sidebar Social Background Hover', 'seasonal' ),
		'section' => 'colors',
		'settings'   => 'social_bg_hover',
		'priority' => 7,			
	) ) );

// Setting group social icon on hover.
	$wp_customize->add_setting( 'social_icon_hover', array(
		'default'        => '#ccc',
		'sanitize_callback' => 'seasonal_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'social_icon_hover', array(
		'label'   => __( 'Sidebar Social Icon Hover', 'seasonal' ),
		'section' => 'colors',
		'settings'   => 'social_icon_hover',
		'priority' => 8,			
	) ) );

// Setting group menu toggle button border.
	$wp_customize->add_setting( 'toggle_border', array(
		'default'        => '#d7d7d7',
		'sanitize_callback' => 'seasonal_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'toggle_border', array(
		'label'   => __( 'Mobile Menu Button Border', 'seasonal' ),
		'section' => 'colors',
		'settings'   => 'toggle_border',
		'priority' => 9,			
	) ) );

// Setting group Menu toggle button label.
	$wp_customize->add_setting( 'toggle_label', array(
		'default'        => '#e7e7e7',
		'sanitize_callback' => 'seasonal_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'toggle_label', array(
		'label'   => __( 'Mobile Menu Button Text', 'seasonal' ),
		'section' => 'colors',
		'settings'   => 'toggle_label',
		'priority' => 10,			
	) ) );

// Setting group Menu toggle button border on hover.
	$wp_customize->add_setting( 'toggle_border_hover', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'seasonal_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'toggle_border_hover', array(
		'label'   => __( 'Mobile Menu Button Border on Hover', 'seasonal' ),
		'section' => 'colors',
		'settings'   => 'toggle_border_hover',
		'priority' => 11,			
	) ) );
// Setting group Menu toggle button lebel on hover.
	$wp_customize->add_setting( 'toggle_label_hover', array(
		'default'        => '#ffffff',
		'sanitize_callback' => 'seasonal_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'toggle_label_hover', array(
		'label'   => __( 'Mobile Menu Button Text on Hover', 'seasonal' ),
		'section' => 'colors',
		'settings'   => 'toggle_label_hover',
		'priority' => 12,			
	) ) );	
	
// Setting group for the button background colour  
	$wp_customize->add_setting( 'button_bg_colour', array( 
		'default' => '#838588', 
		'sanitize_callback' => 'seasonal_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_bg_colour', array(
		'label' => __( 'Button background', 'seasonal' ),
		'section' => 'colors',
		'settings' => 'button_bg_colour',
		'priority' => 13,
	) ) ); 
	
// Setting group for the button background colour on hover  
	$wp_customize->add_setting( 'button_bg_on_hover', array(
		'default' => '#6a6c6f',
		'sanitize_callback' => 'seasonal_sanitize_hex_colour',
	));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_bg_on_hover', array(
		'label' => __( 'Button background on hover', 'seasonal' ),
		'section' => 'colors',
		'settings' => 'button_bg_on_hover',
		'priority' => 14,
	) ) );	
	
	
// Setting group for the button text colour  
	$wp_customize->add_setting( 'button_text_colour', array(
	  'default' => '#ffffff',
	  'sanitize_callback' => 'seasonal_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_text_colour', array(
		'label' => __( 'Button Text color', 'seasonal' ),
		'section' => 'colors',
		'settings' => 'button_text_colour',
		'priority' => 15,
	) ) ); 
		  
// Setting group for the button text colour on hover 
	$wp_customize->add_setting( 'button_text_on_hover', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'seasonal_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_text_on_hover', array(
		'label' => __( 'Button Text on Hover', 'seasonal' ),
		'section' => 'colors',
		'settings' => 'button_text_on_hover',
		'priority' => 16,
	) ) );	
 
// Setting group for the headings and titles colour 
	$wp_customize->add_setting( 'heading_colour', array(
		'default' => '#424242',
		'sanitize_callback' => 'seasonal_sanitize_hex_colour',
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'heading_colour', array(
		'label' => __( 'Headings &amp; Titles Colour', 'seasonal' ),
		'section' => 'colors',
		'settings' => 'heading_colour',
		'priority' => 17,
	) ) ); 
// Setting group for the subtitle colour  
	$wp_customize->add_setting( 'subtitle_colour', array(
		'default' => '#222222',
		'sanitize_callback' => 'seasonal_sanitize_hex_colour',
	));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'subtitle_colour', array(
		'label' => __( 'SubTitle Colour', 'seasonal' ),
		'section' => 'colors',
		'settings' => 'subtitle_colour',
		'priority' => 18,
	) ) );	
	 
// Setting group for the pagination background  
	$wp_customize->add_setting( 'pagination_bg', array(
		'default' => '#f5f5f5',
		'sanitize_callback' => 'seasonal_sanitize_hex_colour',
	));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pagination_bg', array(
		'label' => __( 'Pagination Background', 'seasonal' ),
		'section' => 'colors',
		'settings' => 'pagination_bg',
		'priority' => 19,
	))); 
  
// Setting group for the pagination text 
	$wp_customize->add_setting( 'pagination_text', array(
		'default' => '#7599c5',
		'sanitize_callback' => 'seasonal_sanitize_hex_colour',
	));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pagination_text', array(
		'label' => __( 'Pagination Text Colour', 'seasonal' ),
		'section' => 'colors',
		'settings' => 'pagination_text',
		'priority' => 20,
	)));  
   
// Setting group for the pagination current page background  
	$wp_customize->add_setting( 'pagination_current_background', array(
		'default' => '#94a3b6',
		'sanitize_callback' => 'seasonal_sanitize_hex_colour',
	));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pagination_current_background', array(
		'label' => __( 'Pagination Current &amp; Hover Background', 'seasonal' ),
		'section' => 'colors',
		'settings' => 'pagination_current_background',
		'priority' => 21,
	)));
		  
// Setting group for the pagination current page text colour  
	$wp_customize->add_setting( 'pagination_current_text_color', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'seasonal_sanitize_hex_colour',
	));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pagination_current_text_color', array(
		'label' => __( 'Pagination Current &amp; Hover Text', 'seasonal' ),
		'section' => 'colors',
		'settings' => 'pagination_current_text_color',
		'priority' => 22,
	 ) ) );

// Setting group for the main menu link colour 
	$wp_customize->add_setting( 'menu_link_colour', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'seasonal_sanitize_hex_colour',
	));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_link_colour', array(
		'label' => __( 'Main Menu Link Colour', 'seasonal' ),
		'section' => 'colors',
		'settings' => 'menu_link_colour',
		'priority' => 23,
	 ) ) );

// Setting group for the main menu link on hover colour 
	$wp_customize->add_setting( 'menu_link_hover_colour', array(
		'default' => '#d1c4a5',
		'sanitize_callback' => 'seasonal_sanitize_hex_colour',
	));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_link_hover_colour', array(
		'label' => __( 'Main Menu Active/Hover Text Colour', 'seasonal' ),
		'section' => 'colors',
		'settings' => 'menu_link_hover_colour',
		'priority' => 24,
	 ) ) );


}
add_action( 'customize_register', 'seasonal_customize_register' );




/**
 * This is our theme sanitization settings.
 * Remember to sanitize any additional theme settings you add to the customizer.
 */

// adds sanitization callback function for the blog summary alignment : radio
	function seasonal_sanitize_blog_alignment( $input ) {
		$valid = array(
			  'left' => __( 'Left', 'seasonal' ),
			  'center' => __( 'Centered', 'seasonal' ),
		);
	 
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';
		}
	}
		
// adds sanitization callback function for the blog style : radio
	function seasonal_sanitize_blog_style( $input ) {
		$valid = array(
			  'blog-full' => __( 'Blog Full', 'seasonal' ),
			  'blog-small' => __( 'Blog Small', 'seasonal' ),
		);
	 
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';
		}
	}

// adds sanitization callback function : textarea
if ( ! function_exists( 'seasonal_sanitize_textarea' ) ) :
  function seasonal_sanitize_textarea( $value ) {
    if ( !current_user_can('unfiltered_html') )
			$value  = stripslashes( wp_filter_post_kses( addslashes( $value ) ) ); // wp_filter_post_kses() expects slashed

    return $value;
  }
endif;

// adds sanitization callback function for numeric data : number
if ( ! function_exists( 'seasonal_sanitize_number' ) ) :
	function seasonal_sanitize_number( $value ) {
		$value = (int) $value; // Force the value into integer type.
		return ( 0 < $value ) ? $value : null;
	}
endif;

// adds sanitization callback function : colors
if ( ! function_exists( 'seasonal_sanitize_hex_colour' ) ) :
	function seasonal_sanitize_hex_colour( $color ) {
		if ( $unhashed = sanitize_hex_color_no_hash( $color ) )
			return '#' . $unhashed;
	
		return $color;
	}
endif;

// adds sanitization callback function : text 
if ( ! function_exists( 'seasonal_sanitize_text' ) ) :
	function seasonal_sanitize_text( $input ) {
		return wp_kses_post( force_balance_tags( $input ) );
	}
endif;

// adds sanitization callback function : url
if ( ! function_exists( 'seasonal_sanitize_url' ) ) :
	function seasonal_sanitize_url( $value) {
		$value = esc_url( $value);
		return $value;
	}
endif;

// adds sanitization callback function : checkbox
if ( ! function_exists( 'seasonal_sanitize_checkbox' ) ) :
	function seasonal_sanitize_checkbox( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return '';
		}
	}	 
endif;

// adds sanitization callback function : absolute integer
if ( ! function_exists( 'seasonal_sanitize_integer' ) ) :
function seasonal_sanitize_integer( $input ) {
	return absint( $input );
}
endif;

// adds sanitization callback function : range slider
if ( ! function_exists( 'seasonal_sanitize_rangeslider' ) ) :
  function seasonal_sanitize_rangeslider( $value ) {
    if ( is_numeric( $value ) && $value >= 0 && $value <= 1 )
      return $value;

    return 0.5;
  }
endif;

if ( ! function_exists( 'seasonal_sanitize_opacity' ) ) :
// adds sanitization callback for opacity
  function seasonal_sanitize_opacity( $value ) {
    if ( is_numeric( $value ) && $value >= 0 && $value <= 1 )
      return $value;

    return 0.75;
  }
endif;

// adds sanitization callback function for background size
if ( ! function_exists( 'seasonal_sanitize_background_size' ) ) :
  function seasonal_sanitize_background_size( $value ) {
    $background_sizes = array( 'auto', 'cover', 'contain' );
    if ( ! in_array( $value, $background_sizes ) ) {
      $value = 'cover';
    }

    return $value;
  }
endif;

// adds sanitization callback function for uploading : uploader
if ( ! function_exists( 'seasonal_sanitize_upload' ) ) :
	add_filter( 'seasonal_sanitize_image', 'seasonal_sanitize_upload' );
	add_filter( 'seasonal_sanitize_file', 'seasonal_sanitize_upload' );
	
	function seasonal_sanitize_upload( $input ) {        
			$output = '';        
			$filetype = wp_check_filetype($input);       
			if ( $filetype["ext"] ) {        
					$output = $input;        
			}       
			return $output;
	}
endif;


?>