<?php
global $business_click_sections;
global $business_click_settings_controls;
global $business_click_repeated_settings_controls;
global $defauts;

//call all defaults values
$defaults = business_click_defauts_value();

// layout option section
$business_click_sections['business-click-layout-options'] = array(
        'priority'       => 200,
        'title'          => esc_html__( 'Layout Options', 'business-click' ),
        'panel'          => 'business-click-theme-options',
    );

/*home page static page display*/
$business_click_settings_controls['business-click-enable-static-page'] = array(
    'setting' =>     array(
        'default'              => $defaults['business-click-enable-static-page'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Enable Static Front Page', 'business-click' ),
        'description'           =>  esc_html__( 'If you disable this, the static page will be disappeared form the front page and other section will remain as it is', 'business-click' ),
        'section'               => 'business-click-layout-options',
        'type'                  => 'checkbox',
        'priority'              => 10,
    )
);


/*layout-options option responsive lodader start*/
$business_click_settings_controls['business-click-default-layout'] = array(
    'setting' =>     array(
        'default'              => $defaults['business-click-default-layout'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Default Layout', 'business-click' ),
        'description'           =>  esc_html__( 'Please note that this section can be overridden by individual page/posts settings', 'business-click' ),
        'section'               => 'business-click-layout-options',
        'type'                  => 'select',
        'choices' => array(
            'right-sidebar' => esc_html__( 'Content - Primary Sidebar', 'business-click' ),
            'left-sidebar'  => esc_html__( 'Primary Sidebar - Content', 'business-click' ),
            'no-sidebar'    => esc_html__( 'No Sidebar', 'business-click' ),
            'default'       => esc_html__('Default','business-click')
        ),
        'priority'              => 10,
        'active_callback'       => ''
    )
);


$business_click_settings_controls['business-click-single-post-image-align'] = array(
    'setting' =>     array(
        'default'              => $defaults['business-click-single-post-image-align'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Alignment of Image in Single Post/Page', 'business-click' ),
        'section'               => 'business-click-layout-options',
        'type'                  => 'select',
        'choices' => array(
            'full'      => esc_html__( 'Full', 'business-click' ),
            'right'     => esc_html__( 'Right', 'business-click' ),
            'left'      => esc_html__( 'Left', 'business-click' ),
            'no-image'  => esc_html__( 'No image', 'business-click' )
        ),
        'priority'              => 40,
        'description'           =>  esc_html__( 'Please note that this setting can be overridden by individual post/page settings', 'business-click' ),
    )
);


   
$business_click_settings_controls['business-click-archive-layout'] = array(
    'setting' => array(
        'default'              => $defaults['business-click-archive-layout'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Archive Layout', 'business-click' ),
        'section'               => 'business-click-layout-options',
        'type'                  => 'select',
        'choices'               => array(
            'excerpt-only' => esc_html__( 'Excerpt Only', 'business-click' ),
            'thumbnail-and-excerpt' => esc_html__( 'Thumbnail and Excerpt', 'business-click' ),
            'full-post' => esc_html__( 'Full Post', 'business-click' ),
            'thumbnail-and-full-post' => esc_html__( 'Thumbnail and Full Post', 'business-click' ),
        ),
        'priority'              => 55,
    )
);


/*container size*/
$business_click_settings_controls['business-click-conatiner-width-layout'] = array(
    'setting' => array(
        'default'              => $defaults['business-click-conatiner-width-layout'],
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Container Width', 'business-click' ),
        'description'           => esc_html__('Value in px. This width is for the larger screen size greater than 1200px.','business-click'),
        'section'               => 'business-click-layout-options',
        'type'                  => 'number',
        'priority'              => 60,
    )
);