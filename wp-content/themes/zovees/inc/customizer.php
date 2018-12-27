<?php
/**
* Zovees Customizer
* @package Zovees
*/

function zovees_customize_register( $wp_customize ) {
	
	/*Select Options in setting*/
	if (!function_exists('zovees_section_option')) :
	    function zovees_section_option()
	    {
	        $zovees_section_option = array(
	            'show' => esc_html__('Show', 'zovees'),
	            'hide' => esc_html__('Hide', 'zovees')
	        );
	        return apply_filters('zovees_section_option', $zovees_section_option);
	    }
	endif;

	if (!function_exists('zovees_col_layout_option')) :
	    function zovees_col_layout_option()
	    {
	        $zovees_col_layout_option = array(
	            '6' => esc_html__('2 Column Layout', 'zovees'),
				'4' => esc_html__('3 Column Layout', 'zovees'),
	        );
	        return apply_filters('zovees_col_layout_option', $zovees_col_layout_option);
	    }
	endif;


	if (!function_exists('zovees_col_layout_2_option')) :
	    function zovees_col_layout_2_option()
	    {
	        $zovees_col_layout_2_option = array(
	            '6' => esc_html__('2 Column Layout', 'zovees'),
	            '4' => esc_html__('3 Column Layout', 'zovees'),
	            '3' => esc_html__('4 Column Layout', 'zovees'),
	        );
	        return apply_filters('zovees_col_layout_option', $zovees_col_layout_2_option);
	    }
	endif;

	/* Sanitization */
	if ( !function_exists('zovees_sanitize_select') ) :
	    function zovees_sanitize_select( $input, $setting ) {

	        // Ensure input is a slug.
	        $input = sanitize_text_field( $input );

	        // Get list of choices from the control associated with the setting.
	        $choices = $setting->manager->get_control( $setting->id )->choices;

	        // If the input is a valid key, return it; otherwise, return the default.
	        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	    }
	endif;

	/**
	 * Drop-down Pages sanitization callback example.
	 *
	 * - Sanitization: dropdown-pages
	 * - Control: dropdown-pages
	 * 
	 * Sanitization callback for 'dropdown-pages' type controls. This callback sanitizes `$page_id`
	 * as an absolute integer, and then validates that $input is the ID of a published page.
	 * 
	 * @see absint() https://developer.wordpress.org/reference/functions/absint/
	 * @see get_post_status() https://developer.wordpress.org/reference/functions/get_post_status/
	 *
	 * @param int                  $page    Page ID.
	 * @param WP_Customize_Setting $setting Setting instance.
	 * @return int|string Page ID if the page is published; otherwise, the setting default.
	 */
	function zovees_sanitize_dropdown_pages( $page_id, $setting ) {
		// Ensure $input is an absolute integer.
		$page_id = absint( $page_id );
		
		// If $page_id is an ID of a published page, return it; otherwise, return the default.
		return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}
	
	/** Front Page Section Settings starts **/

	$wp_customize->add_panel('frontpage', 
		array('title' => esc_html__('Zovees Section Setting', 'zovees'),
		'description' => '',
		'priority' => 5,));
	

	/** Start top header **/
	$wp_customize->add_section('zovees-header_info', array(
	    'title'   => esc_html__('Top Bar Section', 'zovees'),
	    'description' => '',
	    'panel' => 'frontpage',
	    'priority'    => 130
	));

	$wp_customize->add_setting(
	    'zovees_header_section_hideshow',
	    array(
	        'default' => 'hide',
	        'sanitize_callback' => 'zovees_sanitize_select',
	    )
	);

	$zovees_header_section_hide_show_option = zovees_section_option();

	$wp_customize->add_control(
	    'zovees_header_section_hideshow',
	    array(
	        'type' => 'radio',
	        'label' => esc_html__('Top Bar Option', 'zovees'),
	        'description' => esc_html__('Show/hide option for Top Bar Section.', 'zovees'),
	        'section' => 'zovees-header_info',
	        'choices' => $zovees_header_section_hide_show_option,
	        'priority' => 1
	    )
	);
		   
	$wp_customize->add_setting('zovees_header_email', array(
	    'default'   => '',
	    'type'      => 'theme_mod',
	   'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('zovees_header_email', array(
	    'label'   => esc_html__('Email', 'zovees'),
	    'section' => 'zovees-header_info',
	    'priority'  => 1
	));

	$wp_customize->add_setting('zovees_header_phone', array(
	    'default'   => '',
	    'type'      => 'theme_mod',
	   'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('zovees_header_phone', array(
	    'label'   => esc_html__('Contact', 'zovees'),
	    'section' => 'zovees-header_info',
	    'priority'  => 2
	));

	$wp_customize->add_setting('zovees_header_time', array(
	    'default'   => '',
	    'type'      => 'theme_mod',
	    'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('zovees_header_time', array(
	    'label'   => esc_html__('Time', 'zovees'),
	    'section' => 'zovees-header_info',
	    'priority'  => 3
	));

	$wp_customize->add_setting( 'zovees_header_text', array(
	        'default'           => '',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);

	$wp_customize->add_control('zovees_header_text', array(
	    'label'   => esc_html__('Text', 'zovees'),
	    'section' => 'zovees-header_info',
	    'priority'  => 4
	));

	$wp_customize->add_setting( 'zovees_header_button_text',
	    array(
	        'default'           => '',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);

	$wp_customize->add_control( 'zovees_header_button_text', array(
	        'label'     => esc_html__( 'Button Text ', 'zovees' ),
	        'section'   => 'zovees-header_info',
	        'type'      => 'text',
	        'priority'  => 5,
	    )
	);

	$wp_customize->add_setting( 'zovees_header_button_url',
	    array(
	        'default'           => '#',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);

	$wp_customize->add_control( 'zovees_header_button_url', array(
	        'label'             => esc_html__( 'Button URL', 'zovees' ),
	        'section'           => 'zovees-header_info',
	        'type'              => 'text',
	        'priority'          => 6,
	    )
	);
	/** End **/

	/** Start slider customizer **/
	$wp_customize->add_section('sliderinfo', array(
		'title'   => esc_html__('Slider Section', 'zovees'),
		'description' => '',
		'panel' => 'frontpage',
		'priority'    => 140
		)
	);

	// hide show
	$wp_customize->add_setting('zovees_slider_section_hideshow', array(
		'default' => 'hide',
		'sanitize_callback' => 'zovees_sanitize_select',
		)
	);

	$zovees_slider_section_hide_show_option = zovees_section_option();

	$wp_customize->add_control(
		'zovees_slider_section_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('Slider Option', 'zovees'),
			'description' => esc_html__('Show/hide option for Slider Section.', 'zovees'),
			'section' => 'sliderinfo',
			'choices' => $zovees_slider_section_hide_show_option,
			'priority' => 1
		)
	);

	$slider_no = 3;

	for( $i = 1; $i <= $slider_no; $i++ )
	{
		$zovees_slider_page = 'zovees_slider_page_' .$i;

		$zovees_slider_btntxt1 = 'zovees_slider_btntxt1_' . $i;
		$zovees_slider_btnurl1 = 'zovees_slider_btnurl1_' .$i;

		$zovees_slider_btntxt2 = 'zovees_slider_btntxt2_' . $i;
		$zovees_slider_btnurl2 = 'zovees_slider_btnurl2_' .$i;

		$wp_customize->add_setting( $zovees_slider_page,
			array(
				'default'           => 1,
				'sanitize_callback' => 'zovees_sanitize_dropdown_pages',
			)
		);

		$wp_customize->add_control( $zovees_slider_page,
			array(
				'label'    			=> esc_html__( 'Slider Page ', 'zovees' ) .$i,
				'section'  			=> 'sliderinfo',
				'type'     			=> 'dropdown-pages',
				'priority' 			=> 100,
			)
		);

		$wp_customize->add_setting( $zovees_slider_btntxt1,
			array(
				'default'           => 'enter text',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( $zovees_slider_btntxt1,
			array(
				'label'    			=> esc_html__( 'Slider Button Text ', 'zovees' ) .$i,
				'section'  			=> 'sliderinfo',
				'type'     			=> 'text',
				'priority' 			=> 100,
			)
		);

		$wp_customize->add_setting( $zovees_slider_btnurl1,
			array(
				'default'           => '#',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( $zovees_slider_btnurl1,
			array(
				'label'    			=> esc_html__( 'Button URL', 'zovees' ) .$i,
				'section'  			=> 'sliderinfo',
				'type'     			=> 'text',
				'priority' 			=> 100,
			)
		);

		$wp_customize->add_setting( $zovees_slider_btntxt2,
			array(
				'default'           => 'enter text',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( $zovees_slider_btntxt2,
			array(
				'label'    			=> esc_html__( 'Slider Button Text ', 'zovees' ) .($i+1),
				'section'  			=> 'sliderinfo',
				'type'     			=> 'text',
				'priority' 			=> 100,
			)
		);

		$wp_customize->add_setting( $zovees_slider_btnurl2,
			array(
				'default'           => '#',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( $zovees_slider_btnurl2,
			array(
				'label'    			=> esc_html__( 'Button URL', 'zovees' ) .($i+1),
				'section'  			=> 'sliderinfo',
				'type'     			=> 'text',
				'priority' 			=> 100,
			)
		);
	}
	/** End **/

	/** Start services customizer **/
	$wp_customize->add_section('services',              
		array(
			'title' => esc_html__('Service Section', 'zovees'),          
			'description' => '',             
			'panel' => 'frontpage',		 
			'priority' => 150
		)
	);

	$wp_customize->add_setting(
		'zovees_services_section_hideshow',
		array(
		    'default' => 'hide',
		    'sanitize_callback' => 'zovees_sanitize_select',
		)
	);

	$zovees_services_section_hide_show_option = zovees_section_option();

	$wp_customize->add_control(
		'zovees_services_section_hideshow',
		array(
		    'type' => 'radio',
		    'label' => esc_html__('Services Option', 'zovees'),
		    'description' => esc_html__('Show/hide option Section.', 'zovees'),
		    'section' => 'services',
		    'choices' => $zovees_services_section_hide_show_option,
		    'priority' => 1
		)
	);

	// column layout
	$wp_customize->add_setting(
		'zovees_service_col_layout',
		array(
			'default' => 4,
			'sanitize_callback' => 'zovees_sanitize_select',
		)
	);

	$zovees_section_col_layout = zovees_col_layout_option();

	$wp_customize->add_control(
		'zovees_service_col_layout',
		array(
			'type' => 'radio',
			'label' => esc_html__('Column Layout option ', 'zovees'),
			'description' => '',
			'section' => 'services',
			'choices' => $zovees_section_col_layout,
			'priority' => 2
		)
	);

	// Services title
	$wp_customize->add_setting('zovees-services_title', array(
		'default'   => '',
	  	'type'      => 'theme_mod',
	  	'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('zovees-services_title', array(
		'label'   => esc_html__('Services Section Title', 'zovees'),
		'section' => 'services',
		'priority'  => 3
	));

	$service_no = 6;
	for( $i = 1; $i <= $service_no; $i++ ) {
		$zovees_servicepage = 'zovees_service_page_' . $i;
		$zovees_serviceicon = 'zovees_page_service_icon_' . $i;
		
		// Setting - Page
		$wp_customize->add_setting( $zovees_servicepage,
			array(
				'default'           => 1,
				'sanitize_callback' => 'zovees_sanitize_dropdown_pages',
			)
		);

		$wp_customize->add_control( $zovees_servicepage,
			array(
				'label'    			=> esc_html__( 'Service Page ', 'zovees' ) .$i,
				'section'  			=> 'services',
				'type'     			=> 'dropdown-pages',
				'priority' 			=> 100,
			)
		);

		// Setting - Feature Icon
		$wp_customize->add_setting( $zovees_serviceicon,
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( $zovees_serviceicon,
			array(
				'label'    			=> esc_html__( 'Service Icon ', 'zovees' ).$i,
				'description' =>  __('Select a icon in this list <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">Font Awesome icons</a> and enter the class name','zovees'),
				'section'  			=> 'services',
				'type'     			=> 'text',
				'priority' 			=> 100,
			)
		);
	}
	/** End **/

	/** Start feature customizer **/
	$wp_customize->add_section('feature',              
	    array(
	        'title' => esc_html__('Feature Section', 'zovees'),          
	        'description' => '',             
	        'panel' => 'frontpage',		 
	        'priority' => 160
	    )
	);

	$wp_customize->add_setting(
	    'zovees_feature_section_hideshow',
	    array(
	        'default' => 'hide',
	        'sanitize_callback' => 'zovees_sanitize_select',
	    )
	);

	$zovees_feature_section_hide_show_option = zovees_section_option();

	$wp_customize->add_control(

	    'zovees_feature_section_hideshow',
	    array(
	        'type' => 'radio',
	        'label' => esc_html__('Feature Option', 'zovees'),
	        'description' => esc_html__('Show/hide option Section.', 'zovees'),
	        'section' => 'feature',
	        'choices' => $zovees_feature_section_hide_show_option,
	        'priority' => 1
	    )
	);

	// column layout
	$wp_customize->add_setting(
	    'zovees_feature_col_layout',
	    array(
	        'default' => 3,
	        'sanitize_callback' => 'zovees_sanitize_select',
	    )
	);

	$zovees_col_layout_option = zovees_col_layout_2_option();
	$wp_customize->add_control(
	'zovees_feature_col_layout',
	array(
	        'type' => 'radio',
	        'label' => esc_html__('Column Layout option ', 'zovees'),
	        'description' => '',
	        'section' => 'feature',
	        'choices' => $zovees_col_layout_option,
	        'priority' => 2
	    )
	);

	// show hide numbers from featuere section
	$wp_customize->add_setting(
	    'zovees_feature_no_hideshow',
	    array(
	        'default' => 'show',
	        'sanitize_callback' => 'zovees_sanitize_select',
	    )
	);

	$zovees_feature_no_show_hide = zovees_section_option();

	$wp_customize->add_control(
	    'zovees_feature_no_hideshow',
	    array(
	        'type' => 'radio',
	        'label' => esc_html__('Show/Hide Numbers', 'zovees'),
	        'description' =>'',
	        'section' => 'feature',
	        'choices' => $zovees_feature_no_show_hide ,
	        'priority' => 3
	    )
	);

	$feature_no = 4;

	for( $i = 1; $i <= $feature_no; $i++ )
	{
	    $zovees_featurepage = 'zovees_feature_page_' . $i;

	    // Setting - Page
	    $wp_customize->add_setting( $zovees_featurepage,
	        array(
	            'default'           => 1,
	            'sanitize_callback' => 'zovees_sanitize_dropdown_pages',
	        )
	    );

	    $wp_customize->add_control( $zovees_featurepage,
	        array(
	            'label'             => esc_html__( 'Feature Page ', 'zovees' ) .$i,
	            'section'           => 'feature',
	            'type'              => 'dropdown-pages',
	            'priority'          => 100,
	        )
	    );
	}
	/** End **/

	/** Start portfolio customizer **/
	$wp_customize->add_section('portfolio',              
	    array(
	        'title' => esc_html__('Portfolio Section', 'zovees'),          
	        'description' => '',             
	        'panel' => 'frontpage',		 
	        'priority' => 170
	    )
	);

	$wp_customize->add_setting(
	    'zovees_portfolio_section_hideshow',
	    array(
	        'default' => 'hide',
	        'sanitize_callback' => 'zovees_sanitize_select',
	    )
	);

	$zovees_portfolio_section_hide_show_option = zovees_section_option();

	$wp_customize->add_control(

	    'zovees_portfolio_section_hideshow',
	    array(
	        'type' => 'radio',
	        'label' => esc_html__('Portfolios Option', 'zovees'),
	        'description' => esc_html__('Show/hide option Section.', 'zovees'),
	        'section' => 'portfolio',
	        'choices' => $zovees_portfolio_section_hide_show_option,
	        'priority' => 1
	    )
	);

	// Portfolios title
	$wp_customize->add_setting('zovees-portfolio_title', array(
	    'default'   => '',
	    'type'      => 'theme_mod',
	   'sanitize_callback'  => 'sanitize_text_field'
	));

	$wp_customize->add_control('zovees-portfolio_title', array(
	    'label'   => esc_html__('Title', 'zovees'),
	    'section' => 'portfolio',
	    'priority'  => 2
	));

	// portfolio sub title
	$wp_customize->add_setting('zovees-portfolio_sub_title', array(
	    'default'   => '',
	    'type'      => 'theme_mod',
	    'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('zovees-portfolio_sub_title', array(
	    'label'   => esc_html__('Sub Title', 'zovees'),
	    'section' => 'portfolio', 
	    'priority'  => 3
	));

	$portfolio_no = 6;

	for( $i = 1; $i <= $portfolio_no; $i++ )
	{
	    $zovees_portfoliopage = 'zovees_portfolio_page_' . $i;

	    // Setting - Page
	    $wp_customize->add_setting( $zovees_portfoliopage,
	        array(
	            'default'           => 1,
	            'sanitize_callback' => 'zovees_sanitize_dropdown_pages',
	        )
	    );

	    $wp_customize->add_control( $zovees_portfoliopage,
	        array(
	            'label'             => esc_html__( 'Planing Page ', 'zovees' ) .$i,
	            'section'           => 'portfolio',
	            'type'              => 'dropdown-pages',
	            'priority'          => 100,
	        )
	    );
	}
	/** End **/

	/** Start news customizer **/
	$wp_customize->add_section('news',              
		array(
	        'title' => esc_html__('News Section', 'zovees'),          
	    	'description' => '',             
	    	'panel' => 'frontpage',		 
	    	'priority' => 180
	    )
	);

	$wp_customize->add_setting(
	    'zovees_news_section_hideshow',
	    array(
	        'default' => 'hide',
	        'sanitize_callback' => 'zovees_sanitize_select',
	    )
	);

	$zovees_news_section_hide_show_option = zovees_section_option();

	$wp_customize->add_control(

	    'zovees_news_section_hideshow',
	    array(
	        'type' => 'radio',
	        'label' => esc_html__('News Option', 'zovees'),
	        'description' => esc_html__('Show/hide option Section.', 'zovees'),
	        'section' => 'news',
	        'choices' => $zovees_news_section_hide_show_option,
	        'priority' => 1
	    )
	);

	// News title
	$wp_customize->add_setting('zovees-news_title', array(
	    'default'   => '',
	    'type'      => 'theme_mod',
	   'sanitize_callback'  => 'sanitize_text_field'
	));

	$wp_customize->add_control('zovees-news_title', array(
	    'label'   => esc_html__('Title', 'zovees'),
	    'section' => 'news',
	    'priority'  => 2
	));

	// news sub title
	$wp_customize->add_setting('zovees-news_sub_title', array(
	    'default'   => '',
	    'type'      => 'theme_mod',
	    'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('zovees-news_sub_title', array(
	    'label'   => esc_html__('Sub Title', 'zovees'),
	    'section' => 'news', 
	    'priority'  => 3
	));
	/** End **/

	/** Start call customizer **/
	$wp_customize->add_section('callaction',
		array(
	        'title' => esc_html__('Call Out Section', 'zovees'),          
	    	'description' => '',             
	    	'panel' => 'frontpage',		 
	    	'priority' => 190
	    )
	);
		
	$wp_customize->add_setting(
	    'zovees_call_section_hideshow',
	    array(
	        'default' => 'hide',
	        'sanitize_callback' => 'zovees_sanitize_select',
	    )
	);

	$zovees_call_section_hide_show_option = zovees_section_option();

	$wp_customize->add_control(

	    'zovees_call_section_hideshow',
	    array(
	        'type' => 'radio',
	        'label' => esc_html__('Call Option', 'zovees'),
	        'description' => esc_html__('Show/hide option Section.', 'zovees'),
	        'section' => 'callaction',
	        'choices' => $zovees_call_section_hide_show_option,
	        'priority' => 1
	    )
	);

	$zovees_calltext = 'zovees_calltext';
	$zovees_call_btntxt = 'zovees_call_btntxt';
	$zovees_call_btnurl = 'zovees_call_btnurl';

	// Setting - Page
	$wp_customize->add_setting( $zovees_calltext,
	    array(
	        'default'           => '',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);

	$wp_customize->add_control( $zovees_calltext,
	    array(
	        'label'             => esc_html__( 'Call Out Text ', 'zovees' ),
	        'section'           => 'callaction',
	        'type'              => 'text',
	        'priority'          => 100,
	    )
	);

	$wp_customize->add_setting( $zovees_call_btntxt,
	    array(
	        'default'           => '',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);

	$wp_customize->add_control( $zovees_call_btntxt,
	    array(
	        'label'             => esc_html__( 'Text ', 'zovees' ),
	        'section'           => 'callaction',
	        'type'              => 'text',
	        'priority'          => 100,
	    )
	);

	$wp_customize->add_setting( $zovees_call_btnurl,
	    array(
	        'default'           => '',
	        'sanitize_callback' => 'sanitize_text_field',
	    )
	);

	$wp_customize->add_control( $zovees_call_btnurl,
	    array(
	        'label'             => esc_html__( 'URL', 'zovees' ),
	        'section'           => 'callaction',
	        'type'              => 'text',
	        'priority'          => 100,
	    )
	);
	/** End **/

	/** Start copyright customizer **/
	$wp_customize->add_section('zovees-copyright_info', array(
	    'title'   => esc_html__('Copyright Section', 'zovees'),
	    'description' => '',
	    'panel' => 'frontpage',
	    'priority'    => 200
	));

	$wp_customize->add_setting(
	    'zovees_copyright_section_hideshow',
	    array(
	        'default' => 'hide',
	        'sanitize_callback' => 'zovees_sanitize_select',
	    )
	);

	$zovees_copyright_section_hide_show_option = zovees_section_option();

	$wp_customize->add_control(
	    'zovees_copyright_section_hideshow',
	    array(
	        'type' => 'radio',
	        'label' => esc_html__('Copyright Option', 'zovees'),
	        'description' => esc_html__('Show/hide option for Copyright Section.', 'zovees'),
	        'section' => 'zovees-copyright_info',
	        'choices' => $zovees_copyright_section_hide_show_option,
	        'priority' => 1
	    )
	);
		   
	$wp_customize->add_setting('zovees_copyright_text', array(
	    'default'   => '',
	    'type'      => 'theme_mod',
	    'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('zovees_copyright_text', array(
	    'label'   => esc_html__('Text', 'zovees'),
	    'section' => 'zovees-copyright_info',
	    'priority'  => 1
	));
	/** End **/
	
	/** Front Page Section Settings end **/	
}

add_action( 'customize_register', 'zovees_customize_register' );