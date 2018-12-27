<?php
/*adding sections for feature info options */
$wp_customize->add_section( 'travel-way-feature-info', array(
	'priority'       => 20,
	'capability'     => 'edit_theme_options',
	'title'          => esc_html__( 'Feature Info', 'travel-way' ),
	'panel'          => 'travel-way-header-panel'
) );

/* basic info number*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-feature-info-number]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['travel-way-feature-info-number'],
	'sanitize_callback' => 'travel_way_sanitize_select'
) );
$choices = travel_way_feature_info_number();
$wp_customize->add_control( 'travel_way_theme_options[travel-way-feature-info-number]', array(
	'choices'  	        => $choices,
	'label'		        => esc_html__( 'Basic Info Number Display', 'travel-way' ),
	'section'           => 'travel-way-feature-info',
	'settings'          => 'travel_way_theme_options[travel-way-feature-info-number]',
	'type'	  	        => 'select',
) );

/*first info*/
$wp_customize->add_setting('travel_way_theme_options[travel-way-first-info-message]', array(
	'capability'		=> 'edit_theme_options',
	'sanitize_callback' => 'wp_kses_post'
));

$wp_customize->add_control(
	new Travel_Way_Customize_Message_Control(
		$wp_customize,
		'travel_way_theme_options[travel-way-first-info-message]',
		array(
			'section'      => 'travel-way-feature-info',
			'description'  => "<hr /><h2>".esc_html__('First Info','travel-way')."</h2>",
			'settings'     => 'travel_way_theme_options[travel-way-first-info-message]',
			'type'	  	   => 'message',
		)
	)
);
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-first-info-icon]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['travel-way-first-info-icon'],
	'sanitize_callback'     => 'travel_way_sanitize_allowed_html'
) );

$wp_customize->add_control(
	new Travel_Way_Customize_Icons_Control(
		$wp_customize,
		'travel_way_theme_options[travel-way-first-info-icon]',
		array(
			'label'		    => esc_html__( 'Icon', 'travel-way' ),
			'section'       => 'travel-way-feature-info',
			'settings'      => 'travel_way_theme_options[travel-way-first-info-icon]',
			'type'	  	    => 'text'
		)
	)
);

$wp_customize->add_setting( 'travel_way_theme_options[travel-way-first-info-title]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['travel-way-first-info-title'],
	'sanitize_callback'     => 'travel_way_sanitize_allowed_html'
) );
$wp_customize->add_control( 'travel_way_theme_options[travel-way-first-info-title]', array(
	'label'		            => esc_html__( 'Title', 'travel-way' ),
	'section'               => 'travel-way-feature-info',
	'settings'              => 'travel_way_theme_options[travel-way-first-info-title]',
	'type'	  	            => 'text'
) );

$wp_customize->add_setting( 'travel_way_theme_options[travel-way-first-info-desc]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['travel-way-first-info-desc'],
	'sanitize_callback'     => 'travel_way_sanitize_allowed_html'
) );
$wp_customize->add_control( 'travel_way_theme_options[travel-way-first-info-desc]', array(
	'label'		            => esc_html__( 'Very Short Description', 'travel-way' ),
	'section'               => 'travel-way-feature-info',
	'settings'              => 'travel_way_theme_options[travel-way-first-info-desc]',
	'type'	  	            => 'text'
) );

/*Second Info*/
$wp_customize->add_setting('travel_way_theme_options[travel-way-second-info-message]', array(
	'capability'		    => 'edit_theme_options',
	'sanitize_callback'     => 'wp_kses_post'
));

$wp_customize->add_control(
	new Travel_Way_Customize_Message_Control(
		$wp_customize,
		'travel_way_theme_options[travel-way-second-info-message]',
		array(
			'section'       => 'travel-way-feature-info',
			'description'   => "<hr /><h2>".esc_html__('Second Info','travel-way')."</h2>",
			'settings'      => 'travel_way_theme_options[travel-way-second-info-message]',
			'type'	  	    => 'message',
		)
	)
);
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-second-info-icon]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['travel-way-second-info-icon'],
	'sanitize_callback'     => 'travel_way_sanitize_allowed_html'
) );
$wp_customize->add_control(
	new Travel_Way_Customize_Icons_Control(
		$wp_customize,
		'travel_way_theme_options[travel-way-second-info-icon]',
		array(
			'label'		    => esc_html__( 'Icon', 'travel-way' ),
			'section'       => 'travel-way-feature-info',
			'settings'      => 'travel_way_theme_options[travel-way-second-info-icon]',
			'type'	  	    => 'text'
		)
	)
);

$wp_customize->add_setting( 'travel_way_theme_options[travel-way-second-info-title]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['travel-way-second-info-title'],
	'sanitize_callback'     => 'travel_way_sanitize_allowed_html'
) );
$wp_customize->add_control( 'travel_way_theme_options[travel-way-second-info-title]', array(
	'label'		            => esc_html__( 'Title', 'travel-way' ),
	'section'               => 'travel-way-feature-info',
	'settings'              => 'travel_way_theme_options[travel-way-second-info-title]',
	'type'	  	            => 'text'
) );

$wp_customize->add_setting( 'travel_way_theme_options[travel-way-second-info-desc]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['travel-way-second-info-desc'],
	'sanitize_callback'     => 'travel_way_sanitize_allowed_html'
) );
$wp_customize->add_control( 'travel_way_theme_options[travel-way-second-info-desc]', array(
	'label'		            => esc_html__( 'Very Short Description', 'travel-way' ),
	'section'               => 'travel-way-feature-info',
	'settings'              => 'travel_way_theme_options[travel-way-second-info-desc]',
	'type'	  	            => 'text'
) );

/*third info*/
$wp_customize->add_setting('travel_way_theme_options[travel-way-third-info-message]', array(
	'capability'		    => 'edit_theme_options',
	'sanitize_callback'     => 'wp_kses_post'
));

$wp_customize->add_control(
	new Travel_Way_Customize_Message_Control(
		$wp_customize,
		'travel_way_theme_options[travel-way-third-info-message]',
		array(
			'section'       => 'travel-way-feature-info',
			'description'   => "<hr /><h2>".esc_html__('Third Info','travel-way')."</h2>",
			'settings'      => 'travel_way_theme_options[travel-way-third-info-message]',
			'type'	  	    => 'message',
		)
	)
);
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-third-info-icon]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['travel-way-third-info-icon'],
	'sanitize_callback'     => 'travel_way_sanitize_allowed_html'
) );
$wp_customize->add_control(
	new Travel_Way_Customize_Icons_Control(
		$wp_customize,
		'travel_way_theme_options[travel-way-third-info-icon]',
		array(
			'label'		    => esc_html__( 'Icon', 'travel-way' ),
			'section'       => 'travel-way-feature-info',
			'settings'      => 'travel_way_theme_options[travel-way-third-info-icon]',
			'type'	  	    => 'text'
		)
	)
);

$wp_customize->add_setting( 'travel_way_theme_options[travel-way-third-info-title]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['travel-way-third-info-title'],
	'sanitize_callback'     => 'travel_way_sanitize_allowed_html'
) );
$wp_customize->add_control( 'travel_way_theme_options[travel-way-third-info-title]', array(
	'label'		            => esc_html__( 'Title', 'travel-way' ),
	'section'               => 'travel-way-feature-info',
	'settings'              => 'travel_way_theme_options[travel-way-third-info-title]',
	'type'	  	            => 'text'
) );

$wp_customize->add_setting( 'travel_way_theme_options[travel-way-third-info-desc]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['travel-way-third-info-desc'],
	'sanitize_callback'     => 'travel_way_sanitize_allowed_html'
) );
$wp_customize->add_control( 'travel_way_theme_options[travel-way-third-info-desc]', array(
	'label'		            => esc_html__( 'Very Short Description', 'travel-way' ),
	'section'               => 'travel-way-feature-info',
	'settings'              => 'travel_way_theme_options[travel-way-third-info-desc]',
	'type'	  	            => 'text'
) );

/*forth info*/
$wp_customize->add_setting('travel_way_theme_options[travel-way-forth-info-message]', array(
	'capability'		    => 'edit_theme_options',
	'sanitize_callback'     => 'wp_kses_post'
));

$wp_customize->add_control(
	new Travel_Way_Customize_Message_Control(
		$wp_customize,
		'travel_way_theme_options[travel-way-forth-info-message]',
		array(
			'section'       => 'travel-way-feature-info',
			'description'   => "<hr /><h2>".esc_html__('Forth Info','travel-way')."</h2>",
			'settings'      => 'travel_way_theme_options[travel-way-forth-info-message]',
			'type'	  	    => 'message',
		)
	)
);
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-forth-info-icon]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['travel-way-forth-info-icon'],
	'sanitize_callback'     => 'travel_way_sanitize_allowed_html'
) );
$wp_customize->add_control(
	new Travel_Way_Customize_Icons_Control(
		$wp_customize,
		'travel_way_theme_options[travel-way-forth-info-icon]',
		array(
			'label'		    => esc_html__( 'Icon', 'travel-way' ),
			'section'       => 'travel-way-feature-info',
			'settings'      => 'travel_way_theme_options[travel-way-forth-info-icon]',
			'type'	  	    => 'text'
		)
	)
);

$wp_customize->add_setting( 'travel_way_theme_options[travel-way-forth-info-title]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['travel-way-forth-info-title'],
	'sanitize_callback'     => 'travel_way_sanitize_allowed_html'
) );
$wp_customize->add_control( 'travel_way_theme_options[travel-way-forth-info-title]', array(
	'label'		            => esc_html__( 'Title', 'travel-way' ),
	'section'               => 'travel-way-feature-info',
	'settings'              => 'travel_way_theme_options[travel-way-forth-info-title]',
	'type'	  	            => 'text'
) );

$wp_customize->add_setting( 'travel_way_theme_options[travel-way-forth-info-desc]', array(
	'capability'		    => 'edit_theme_options',
	'default'			    => $defaults['travel-way-forth-info-desc'],
	'sanitize_callback'     => 'travel_way_sanitize_allowed_html'
) );
$wp_customize->add_control( 'travel_way_theme_options[travel-way-forth-info-desc]', array(
	'label'		            => esc_html__( 'Very Short Description', 'travel-way' ),
	'section'               => 'travel-way-feature-info',
	'settings'              => 'travel_way_theme_options[travel-way-forth-info-desc]',
	'type'	  	            => 'text'
) );