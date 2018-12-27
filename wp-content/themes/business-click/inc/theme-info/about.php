<?php
/**
 * About configuration
 *
 * @package BusinessClick
 */

$config = array(
	'menu_name' => esc_html__( 'About Business Click', 'business-click' ),
	'page_name' => esc_html__( 'About Business Click', 'business-click' ),

	/* translators: theme version */
	'welcome_title' => sprintf( esc_html__( 'Welcome to %s - ', 'business-click' ), 'Business-Click' ),

	/* translators: 1: theme name */
	'welcome_content' => sprintf( esc_html__( 'We hope this page will help you to setup %1$s with few clicks. We believe you will find it easy to use and perfect for your website development.', 'business-click' ), 'business-click' ),

	// Quick links.
	'quick_links' => array(
		'theme_url' => array(
			'text' => esc_html__( 'Theme Details','business-click' ),
			'url'  => 'https://evisionthemes.com/product/business-click/',
			),
		'demo_url' => array(
			'text' => esc_html__( 'View Demo','business-click' ),
			'url'  => 'https://evisionthemes.com/product/business-click/',
			),
		'documentation_url' => array(
			'text'   => esc_html__( 'View Documentation','business-click' ),
			'url'    => 'https://evisionthemes.com/product/business-click/',
			),
		'rate_url' => array(
			'text' => esc_html__( 'Rate This Theme','business-click' ),
			'url'  => 'https://evisionthemes.com/product/business-click/',
			),
		'pro_url' => array(
			'text' => esc_html__( 'Upgrade To Pro Theme','business-click' ),
			'url'  => 'https://demo.evisionthemes.com/business-click/multipage/',
			'button' => 'primary',
			),
		),

	// Tabs.
	'tabs' => array(
		'getting_started'     => esc_html__( 'Getting Started', 'business-click' ),
		'recommended_actions' => esc_html__( 'Recommended Actions', 'business-click' ),
		'useful_plugins'      => esc_html__( 'Useful Plugins', 'business-click' ),
		'demo_content'        => esc_html__( 'Demo Content', 'business-click' ),
		'support'             => esc_html__( 'Support', 'business-click' ),
		'free_pro'            => esc_html__( 'FREE VS. PRO', 'business-click' ),
	),

	// Getting started.
	'getting_started' => array(
		array(
			'title'               => esc_html__( 'Theme Documentation', 'business-click' ),
			'text'                => esc_html__( 'Find step by step instructions with video documentation to setup theme easily.', 'business-click' ),
			'button_label'        => esc_html__( 'View documentation', 'business-click' ),
			'button_link'         => 'https://evisionthemes.com/product/business-click/',
			'is_button'           => false,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
		array(
			'title'               => esc_html__( 'Recommended Actions', 'business-click' ),
			'text'                => esc_html__( 'We recommend few steps to take so that you can get complete site like shown in demo.', 'business-click' ),
			'button_label'        => esc_html__( 'Check recommended actions', 'business-click' ),
			'button_link'         => esc_url( admin_url( 'themes.php?page=business-click-about&tab=recommended_actions' ) ),

			'is_button'           => false,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),
		array(
			'title'               => esc_html__( 'Customize Everything', 'business-click' ),
			'text'                => esc_html__( 'Start customizing every aspect of the website with customizer.', 'business-click' ),
			'button_label'        => esc_html__( 'Go to Customizer', 'business-click' ),
			'button_link'         => esc_url( wp_customize_url() ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),

		array(
			'title'        			=> esc_html__( 'Youtube Video Tutorials', 'business-click' ),
			'text'         			=> esc_html__( 'Please check our youtube channel for video instructions of Business Click setup and customization.', 'business-click' ),
			'button_label' 			=> esc_html__( 'Video Tutorials', 'business-click' ),
			 'button_link'  			=> 'https://evisionthemes.com/product/business-click/',

			'is_button'    			=> false,
			'recommended_actions' 	=> false,
			'is_new_tab'   			=> true,
		),

		array(
			'title'        			=> esc_html__( 'Pro Version', 'business-click' ),
			'text'         			=> esc_html__( 'Upgrade to pro version for additional features and options.', 'business-click' ),
			'button_label' 			=> esc_html__( 'View Pro Version', 'business-click' ),
			'button_link'  			=> 'https://demo.evisionthemes.com/business-click/multipage/',
			'is_button'    			=> true,
			'recommended_actions' 	=> false,
			'is_new_tab'   			=> true,
		),

		'first' => array(
			'title'        			=> esc_html__( 'Contact Support', 'business-click' ),
			'text'         			=> esc_html__( 'If you have any problem, feel free to create ticket on our dedicated Support forum.', 'business-click' ),
			'button_label' 			=> esc_html__( 'Contact Support', 'business-click' ),
			'button_link'  			=> esc_url( 'https://evisionthemes.com/product/business-click/' ),
			'is_button'    			=> false,
			'recommended_actions' 	=> false,
			'is_new_tab'   			=> true,
		),
	),

	// Recommended actions.
	'recommended_actions' => array(
		'content' => array(
			'front-page' => array(
				'title'       => esc_html__( 'Setting Static Front Page','business-click' ),
				'description' => esc_html__( 'Create a new page to display on front page ( Ex: Home ) and assign "Home" template. Select A static page then Front page and Posts page to display front page specific sections. Note: Static page will be set automatically when you import demo content.', 'business-click' ),
				'id'          => 'front-page',
				'check'       => ( 'page' === get_option( 'show_on_front' ) ) ? true : false,
				'help'        => '<a href="' . esc_url( wp_customize_url() ) . '?autofocus[section]=static_front_page" class="button button-secondary">' . esc_html__( 'Static Front Page', 'business-click' ) . '</a>',
			),

			'one-click-demo-import' => array(
				'title'       => esc_html__( 'One Click Demo Import', 'business-click' ),
				'description' => esc_html__( 'Please install the One Click Demo Import plugin to import the demo content. After activation go to Appearance >> Import Demo Data and import it.', 'business-click' ),
				'check'       => class_exists( 'OCDI_Plugin' ),
				'plugin_slug' => 'one-click-demo-import',
				'id'          => 'one-click-demo-import',
			),
		),
	),

	// Useful plugins.
	'useful_plugins' => array(
		'description'        => esc_html__( 'This theme supports some helpful WordPress plugins to enhance your website.', 'business-click' ),
		'plugins_list_title' => esc_html__( 'Useful Plugins List:', 'business-click' ),
	),

	// Demo content.
	
	'demo_content' => array(
		/* translators: %s: plugin import data*/
		'description' => sprintf( esc_html__( 'Install %1$s plugin to import demo content. Demo data are bundled within the theme, Please make sure plugin is installed and activated. After plugin activation, go to Import Demo Data menu under Appearance and import it.', 'business-click' ), '<a href="https://wordpress.org/plugins/one-click-demo-import/" target="_blank">' . esc_html__( 'One Click Demo Import', 'business-click' ) . '</a>' ),
		),

	// Support.
	'support_content' => array(
		'first' => array(
			'title'        => esc_html__( 'Contact Support', 'business-click' ),
			'icon'         => 'dashicons dashicons-sos',
			'text'         => esc_html__( 'If you have any problem, feel free to create ticket on our dedicated Support forum.', 'business-click' ),
			'button_label' => esc_html__( 'Contact Support', 'business-click' ),
			'button_link'  => esc_url( 'https://evisionthemes.com/product/business-click/' ),
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'second' => array(
			'title'        => esc_html__( 'Theme Documentation', 'business-click' ),
			'icon'         => 'dashicons dashicons-book-alt',
			'text'         => esc_html__( 'Kindly check our theme documentation for detailed information and video instructions.', 'business-click' ),
			'button_label' => esc_html__( 'View Documentation', 'business-click' ),
			'button_link'  => 'https://evisionthemes.com/product/business-click/',
			'is_button'    => false,
			'is_new_tab'   => true,
		),
		'third' => array(
			'title'        => esc_html__( 'Pro Version', 'business-click' ),
			'icon'         => 'dashicons dashicons-products',
			'icon'         => 'dashicons dashicons-star-filled',
			'text'         => esc_html__( 'Upgrade to pro version for additional features and options.', 'business-click' ),
			'button_label' => esc_html__( 'View Pro Version', 'business-click' ),
			'button_link'  => 'https://demo.evisionthemes.com/business-click/multipage/',
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'fourth' => array(
			'title'        => esc_html__( 'Youtube Video Tutorials', 'business-click' ),
			'icon'         => 'dashicons dashicons-video-alt3',
			'text'         => esc_html__( 'Please check our youtube channel for video instructions of Business Click setup and customization.', 'business-click' ),
			'button_label' => esc_html__( 'Video Tutorials', 'business-click' ),
			'button_link'  => 'https://evisionthemes.com/product/business-click/',
			'is_button'    => false,
			'is_new_tab'   => true,
		),
		'fifth' => array(
			'title'        => esc_html__( 'Customization Request', 'business-click' ),
			'icon'         => 'dashicons dashicons-admin-tools',
			'text'         => esc_html__( 'We have dedicated team members for theme customization. Feel free to contact us any time if you need any customization service.', 'business-click' ),
			'button_label' => esc_html__( 'Customization Request', 'business-click' ),
			'button_link'  => 'https://evisionthemes.com/product/business-click/',
			'is_button'    => false,
			'is_new_tab'   => true,
		),
		'sixth' => array(
			'title'        => esc_html__( 'Child Theme', 'business-click' ),
			'icon'         => 'dashicons dashicons-admin-customizer',
			'text'         => esc_html__( 'If you want to customize theme file, you should use child theme rather than modifying theme file itself.', 'business-click' ),
			'button_label' => esc_html__( 'About child theme', 'business-click' ),
			'button_link'  => 'https://evisionthemes.com/product/business-click/',
			'is_button'    => false,
			'is_new_tab'   => true,
		),
	),

    // Free vs pro array.
    'free_pro' => array(

	    array(
		    'title'     => esc_html__( 'Feature Slider', 'business-click' ),
		    'desc'      => esc_html__( 'Fully customizable', 'business-click' ),
		    'free'      => esc_html__('Limited','business-click'),
		    'pro'       => esc_html__('yes','business-click'),
	    ),
	    array(
		    'title'     => esc_html__( 'Google Fonts', 'business-click' ),
		    'desc' 		=> esc_html__( 'Google fonts options for changing the overall site fonts', 'business-click' ),
		    'free'  	=> esc_html__('20+','business-click'),
		    'pro'   	=> esc_html__('100+','business-click'),
	    ),
	    array(
		    'title'     => esc_html__( 'Primary Color Option', 'business-click' ),
		    'desc'      => esc_html__( 'Option to change primary color of the site', 'business-click' ),
		    'free'      => esc_html__('yes','business-click'),
		    'pro'       => esc_html__('yes','business-click'),
	    ),
        array(
    	    'title'     => esc_html__( 'Advance Color Options', 'business-click' ),
    	    'desc'      => esc_html__( 'Options to change color of individual sections like top header, site title, menu, footer, etc of the site', 'business-click' ),
    	    'free'      => esc_html__('Limited','business-click'),
    	    'pro'       => esc_html__('yes','business-click'),
        ),
        array(
    	    'title'     => esc_html__( 'Carousel Section', 'business-click' ),
    	    'desc'      => esc_html__( 'Display Features Section, Blog Section in carousel mode', 'business-click' ),
    	    'free'      => esc_html__('no','business-click'),
    	    'pro'       => esc_html__('yes','business-click'),
        ),

        array(
    	    'title'     => esc_html__( 'Testimonial Carousel', 'business-click' ),
    	    'desc'      => esc_html__( 'Display testimonial in carousel mode', 'business-click' ),
    	    'free'      => esc_html__('2','business-click'),
    	    'pro'       => esc_html__('5+','business-click'),
        ),

        array(
    	    'title'     => esc_html__( 'Other Sections', 'business-click' ),
    	    'desc'      => esc_html__( 'Team, Brands Section', 'business-click' ),
    	    'free'      => esc_html__('no','business-click'),
    	    'pro'       => esc_html__('yes','business-click'),
        ),
        array(
    	    'title'     => esc_html__( 'Hide Footer Credit', 'business-click' ),
    	    'desc'      => esc_html__( 'Option to enable/disable Powerby (Designer) credit in footer', 'business-click' ),
    	    'free'      => esc_html__('no','business-click'),
    	    'pro'       => esc_html__('yes','business-click'),
        ),
        array(
    	    'title'     => esc_html__( 'Override Footer Credit', 'business-click' ),
    	    'desc'      => esc_html__( 'Option to Override existing Powerby credit of footer', 'business-click' ),
    	    'free'      => esc_html__('no','business-click'),
    	    'pro'       => esc_html__('yes','business-click'),
        ),
	    array(
		    'title'     => esc_html__( 'SEO', 'business-click' ),
		    'desc' 		=> esc_html__( 'Developed with SEO Friendly.', 'business-click' ),
		    'free'  	=> 'yes',
		    'pro'   	=> 'yes',
	    ),
	    array(
		    'title'     => esc_html__( 'Support Forum', 'business-click' ),
		    'desc'      => esc_html__( 'Highly experienced and dedicated support team for your help plus online chat.', 'business-click' ),
		    'free'      => esc_html__('yes', 'business-click'),
		    'pro'       => esc_html__('High Priority', 'business-click'),
	    )

    ),

);
business_click_About::init( apply_filters( 'business_click_about_filter', $config ) );
