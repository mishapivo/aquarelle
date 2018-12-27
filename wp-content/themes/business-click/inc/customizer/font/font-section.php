<?php

global $business_click_panels;
global $business_click_sections;
global $business_click_settings_controls;
global $business_click_repeated_settings_controls;
global $defaults;

//Call all defaults values
$defaults = business_click_defauts_value();

/*creating panel for fonts-setting*/
$business_click_panels['business-click-fonts'] = array(
        'title'          => esc_html__( 'Font Setting', 'business-click' ),
        'panel'          => 'business-click-theme-options',
        'priority'       => 120
    );

/*font array*/
global $business_click_google_fonts;
$business_click_google_fonts = array(
    'Open+Sans:400,400italic,600,700'               => 'Open Sans',
    'Roboto:400,500,300,700,400italic'              => 'Roboto',
    'Lato:400,300,400italic,900,700'                => 'Lato',
    'Slabo+27px'                                    => 'Slabo 27px',
    'Oswald:400,300,700'                            => 'Oswald',
    'Roboto+Condensed:400,300,400italic,700'        => 'Roboto Condensed',
    'Source+Sans+Pro:400,400italic,600,900,300'     => 'Source Sans Pro',
    'Lora:400,400italic,700,700italic'              => 'Lora',
    'Montserrat:400,700'                            => 'Montserrat',
    'PT+Sans:400,400italic,700'                     => 'PT Sans',
    'Open+Sans+Condensed:300,300italic,700'         => 'Open Sans Condensed',
    'Raleway:400,300,500,600,700,900'               => 'Raleway',
    'Droid+Sans:400,700'                            => 'Droid Sans',
    'Ubuntu:400,400italic,500,700'                  => 'Ubuntu',
    'Droid+Serif:400,400italic,700'                 => 'Droid Serif',
    'Roboto+Slab:400,300,700'                       => 'Roboto Slab',
    'Arimo:400,400italic,700'                       => 'Arimo',
    'Merriweather:400,400italic,300,900,700'        => 'Merriweather',
    'PT+Sans+Narrow:400,700'                        => 'PT Sans Narrow',
    'Poiret+One'                                    => 'Poiret One',
    'Noto +Sans:400,400italic,700'                  => 'Noto Sans',
    'Titillium+Web:400,300,400italic,700,900'       => 'Titillium Web',
    'PT+Serif:400,400italic,700'                    => 'PT Serif',
    'Bitter:400,400italic,700'                      => 'Bitter',
    'Indie+Flower'                                  => 'Indie Flower',
    'Yanone+Kaffeesatz:400,300,700'                 => 'Yanone Kaffeesatz',
    'Dosis:400,300,600,800'                         => 'Dosis',
    'Arvo:400,400italic,700'                        => 'Arvo',
    'Alex+Brush'                                    => 'Alex Brush',
    'Fredericka+the+Great'                          => 'Fredericka the Great',
    'Catamaran:400,600,700'                         => 'Catamaran'
);


/*section*/
$business_click_sections['business-click-family'] =array(
'priority'       => 120,
'title'          => esc_html__( 'Fonts', 'business-click' ),
'panel'          => 'business-click-theme-options',
);

/*setting - controls*/
$business_click_settings_controls['business-click-font-family-site-identity'] = array(
    'setting' =>     array(
        'default'              => $defaults['business-click-font-family-site-identity'],
    ),
    'control' => array(
        'label'                 => esc_html__( 'Site Identity Font Family', 'business-click' ),
        'description'           => esc_html__( 'Site title and tagline font family', 'business-click' ),
        'section'               => 'business-click-family',
        'type'                  => 'select',
        'choices'               => $business_click_google_fonts,
        'priority'              => 10,
        'active_callback'       => ''
    )
);

//fonts for menu text
$business_click_settings_controls['business-click-font-family-menu'] = array(
    'setting' =>     array(
        'default'              => $defaults['business-click-font-family-menu'],
    ),
    'control' => array(
        'label'                 => esc_html__( 'Menu Font Family', 'business-click' ),
        'description'           => esc_html__( 'Primary menu font family', 'business-click' ),
        'section'               => 'business-click-family',
        'type'                  => 'select',
        'choices'               => $business_click_google_fonts,
        'priority'              => 20,
        'active_callback'       => ''
    )
);

//fonts for h1-h6
$business_click_settings_controls['business-click-font-family-h1-h6'] = array(
    'setting' =>     array(
        'default'              => $defaults['business-click-font-family-h1-h6'],
    ),
    'control' => array(
        'label'                 => esc_html__( 'H1-H6 Font Family', 'business-click' ),
        'section'               => 'business-click-family',
        'type'                  => 'select',
        'choices'               => $business_click_google_fonts,
        'priority'              => 30,
        'active_callback'       => ''
    )
);

//fonts for body content
$business_click_settings_controls['business-click-font-family-body-p'] = array(
    'setting' =>     array(
        'default'              => $defaults['business-click-font-family-body-p'],
    ),
    'control' => array(
        'label'                 => esc_html__( 'Body Content Font Family', 'business-click' ),
        'section'               => 'business-click-family',
        'type'                  => 'select',
        'choices'               => $business_click_google_fonts,
        'priority'              => 40,
        'active_callback'       => ''
    )
);

//fonts for button text
$business_click_settings_controls['business-click-font-family-button-text'] = array(
    'setting' =>     array(
        'default'              => $defaults['business-click-font-family-button-text'],
    ),
    'control' => array(
        'label'                 => esc_html__( 'Button Text Font Family', 'business-click' ),
        'section'               => 'business-click-family',
        'type'                  => 'select',
        'choices'               => $business_click_google_fonts,
        'priority'              => 50,
        'active_callback'       => ''
    )
);

//fonts for copy right text
$business_click_settings_controls['business-click-footer-copy-right-text'] = array(
    'setting' =>     array(
        'default'              => $defaults['business-click-footer-copy-right-text'],
    ),
    'control' => array(
        'label'                 => esc_html__( 'Font Family for Copy Right Text', 'business-click' ),
        'section'               => 'business-click-family',
        'type'                  => 'select',
        'choices'               => $business_click_google_fonts,
        'priority'              => 60,
        'active_callback'       => ''
    )
);

//fonts Title size
$business_click_settings_controls['business-click-font-family-title-size'] = array(
    'setting' =>     array(
        'default'              => $defaults['business-click-font-family-title-size'],
    ),
    'control' => array(
        'label'                 => esc_html__( 'Title Font Size', 'business-click' ),
        'section'               => 'business-click-family',
        'type'                  => 'number',
        'priority'              => 70,
        'active_callback'       => ''
    )
);

//fonts content size
$business_click_settings_controls['business-click-font-family-content-size'] = array(
    'setting' =>     array(
        'default'              => $defaults['business-click-font-family-content-size'],
    ),
    'control' => array(
        'label'                 => esc_html__( 'Content Font Size', 'business-click' ),
        'section'               => 'business-click-family',
        'type'                  => 'number',
        'priority'              => 80,
        'active_callback'       => ''
    )
);

