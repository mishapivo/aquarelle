<?php
// Set Kirki config.
Kirki::add_config( 'di_blog_config', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );

// The main panel.
Kirki::add_panel( 'di_blog_options', array(
    'title'       => esc_attr__( 'Di Blog Options', 'di-blog' ),
    'description' => esc_attr__( 'All options of Di Blog theme', 'di-blog' ),
) );


//typography
Kirki::add_section( 'typography_options', array(
	'title'          => esc_attr__( 'Typography Options', 'di-blog' ),
	'panel'          => 'di_blog_options',
	'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'typography',
	'settings'    => 'body_typog',
	'label'       => esc_attr__( 'Body Typography', 'di-blog' ),
	'description' => esc_attr__( 'Default pages typography.', 'di-blog' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Lora',
		'variant'        => 'regular'
	),
	'output'      => array(
		array(
			'element' => 'body',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'typography',
	'settings'    => 'stitle_typog',
	'label'       => esc_attr__( 'Site Title Typography', 'di-blog' ),
	'description' => esc_attr__( 'If not used logo.', 'di-blog' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Arvo',
		'variant'        => 'regular',
		'font-size'      => '22px',
		'line-height'    => '1.1',
		'letter-spacing' => '1px',
		'text-transform' => 'uppercase',
		'text-align'	=> 'center'
	),
	'output'      => array(
		array(
			'element' => '.mainlogoinr h3.site-name-pr',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'typography',
	'settings'    => 'stagline_typog',
	'label'       => esc_attr__( 'Site Tagline Typography', 'di-blog' ),
	'description' => esc_attr__( 'If not used logo.', 'di-blog' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Fauna One',
		'variant'        => 'regular',
		'font-size'      => '14px',
		'line-height'    => '1.7',
		'letter-spacing' => '0',
		'text-transform' => 'inherit',
		'text-align'	=> 'center'
	),
	'output'      => array(
		array(
			'element' => '.mainlogoinr p.site-description-pr',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'typography',
	'settings'    => 'posts_hdln_typog',
	'label'       => esc_attr__( 'Page / Post Headline Typography', 'di-blog' ),
	'description' => esc_attr__( 'Typography for pages and posts headline.', 'di-blog' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Open Sans',
		'variant'        => 'regular',
		'font-size'      => '22px',
		'line-height'    => '1.1',
		'letter-spacing' => '2px',
		'text-transform' => 'uppercase',
		'text-align'	=> 'center'
	),
	'output'      => array(
		array(
			'element' => '.maincontainer .post-contents .post-title h1, .maincontainer .post-contents .post-title h2',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'typography',
	'settings'    => 'h1_typog',
	'label'       => esc_attr__( 'H1 / Headline 1 Typography', 'di-blog' ),
	'description' => esc_attr__( 'Default headline 1 typography.', 'di-blog' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Open Sans',
		'variant'        => 'regular',
		'font-size'      => '22px',
		'line-height'    => '1.1',
		'letter-spacing' => '1px',
		'text-transform' => 'inherit'
	),
	'output'      => array(
		array(
			'element' => 'body h1, .h1',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'typography',
	'settings'    => 'h2_typog',
	'label'       => esc_attr__( 'H2 / Headline 2 Typography', 'di-blog' ),
	'description' => esc_attr__( 'Default headline 2 typography.', 'di-blog' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Open Sans',
		'variant'        => 'regular',
		'font-size'      => '22px',
		'line-height'    => '1.1',
		'letter-spacing' => '1px',
		'text-transform' => 'inherit'
	),
	'output'      => array(
		array(
			'element' => 'body h2, .h2',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'typography',
	'settings'    => 'h3_typog',
	'label'       => esc_attr__( 'H3 / Headline 3 Typography', 'di-blog' ),
	'description' => esc_attr__( 'Default headline 3 typography.', 'di-blog' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Arvo',
		'variant'        => 'regular',
		'font-size'      => '22px',
		'line-height'    => '1.1',
		'letter-spacing' => '0',
		'text-transform' => 'inherit'
	),
	'output'      => array(
		array(
			'element' => 'body h3, .h3',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'typography',
	'settings'    => 'h4_typog',
	'label'       => esc_attr__( 'H4 / Headline 4 Typography', 'di-blog' ),
	'description' => esc_attr__( 'Default headline 4 typography.', 'di-blog' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Arvo',
		'variant'        => 'regular',
		'font-size'      => '20px',
		'line-height'    => '1.1',
		'letter-spacing' => '0',
		'text-transform' => 'inherit'
	),
	'output'      => array(
		array(
			'element' => 'body h4, .h4',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'typography',
	'settings'    => 'h5_typog',
	'label'       => esc_attr__( 'H5 / Headline 5 Typography', 'di-blog' ),
	'description' => esc_attr__( 'Default headline 5 typography.', 'di-blog' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Arvo',
		'variant'        => 'regular',
		'font-size'      => '20px',
		'line-height'    => '1.1',
		'letter-spacing' => '0',
		'text-transform' => 'inherit'
	),
	'output'      => array(
		array(
			'element' => 'body h5, .h5',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'typography',
	'settings'    => 'h6_typog',
	'label'       => esc_attr__( 'H6 / Headline 6 Typography', 'di-blog' ),
	'description' => esc_attr__( 'Default headline 6 typography.', 'di-blog' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Arvo',
		'variant'        => 'regular',
		'font-size'      => '20px',
		'line-height'    => '1.1',
		'letter-spacing' => '0',
		'text-transform' => 'inherit'
	),
	'output'      => array(
		array(
			'element' => 'body h6, .h6',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'typography',
	'settings'    => 'p_typog',
	'label'       => esc_attr__( 'Paragraph Typography', 'di-blog' ),
	'description' => esc_attr__( 'Paragraphs inside main container and widgets.', 'di-blog' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Fauna One',
		'variant'        => 'regular',
		'font-size'      => '14px',
		'line-height'    => '1.7',
		'letter-spacing' => '0',
		'text-transform' => 'inherit',
	),
	'output'      => array(
		array(
			'element' => 'body .maincontainer p, .footer-widgets p',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'typography',
	'settings'    => 'top_menu_typog',
	'label'       => esc_attr__( 'Main Menu Typography', 'di-blog' ),
	'description' => esc_attr__( 'Top main menu typography.', 'di-blog' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Open Sans',
		'variant'        => '400',
		'font-size'      => '11px',
		'letter-spacing' => '2px',
		'text-transform' => 'uppercase'
	),
	'output'      => array(
		array(
			'element' => '.navbarprimary ul li a',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'typography',
	'settings'    => 'sb_menu_typo',
	'label'       => esc_attr__( 'Sidebar Menu Typography', 'di-blog' ),
	'description' => esc_attr__( 'Left side "click on icon menu" typography.', 'di-blog' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Rajdhani',
		'variant'        => '500',
		'font-size'      => '18px',
		'line-height'    => '25px',
		'letter-spacing' => '0.1px',
		'text-transform' => 'inherit',
	),
	'output'      => array(
		array(
			'element' => '.side-menu-menu-wrap ul li a',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			'setting'  => 'sb_menu_onoff',
			'operator' => '==',
			'value'    => 1,
		),
	)
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'typography',
	'settings'    => 'body_ul_ol_li_typog',
	'label'       => esc_attr__( 'Container UL/OL Typography', 'di-blog' ),
	'description' => esc_attr__( 'Typography for list in main contents.', 'di-blog' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Fjord One',
		'variant'        => 'regular',
		'font-size'      => '15px',
		'line-height'    => '1.7',
		'letter-spacing' => '0.3px',
		'subsets'        => array( 'latin-ext' ),
		'text-transform' => 'inherit',
	),
	'output'      => array(
		array(
			'element' => '.maincontainer .entry-content ul li, .maincontainer .entry-content ol li',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'typography',
	'settings'    => 'sidebar_ul_ol_li_typog',
	'label'       => esc_attr__( 'Widgets UL/OL Typography', 'di-blog' ),
	'description' => esc_attr__( 'Typography of list for widgets.', 'di-blog' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Fjord One',
		'variant'        => 'regular',
		'font-size'      => '14px',
		'line-height'    => '1.5',
		'letter-spacing' => '0.5px',
		'subsets'        => array( 'latin-ext' ),
		'text-transform' => 'inherit',
	),
	'output'      => array(
		array(
			'element' => '.sidebar-widgets .widget_sidebar_main.widget_recent_entries ul li, .sidebar-widgets .widget_sidebar_main.widget_archive ul li, .sidebar-widgets .widget_sidebar_main.widget_recent_comments ul li, .sidebar-widgets .widget_sidebar_main.widget_meta ul li, .sidebar-widgets .widget_sidebar_main.widget_nav_menu ul li, .sidebar-widgets .widget_sidebar_main.widget_categories ul li, .sidebar-widgets .widget_sidebar_main.di_blog_widget_recent_posts_thumb p',
		),
		array(
			'element' => '.footer-widgets .widgets_footer.widget_recent_entries ul li, .footer-widgets .widgets_footer.widget_archive ul li, .footer-widgets .widgets_footer.widget_recent_comments ul li, .footer-widgets .widgets_footer.widget_meta ul li, .footer-widgets .widgets_footer.widget_nav_menu ul li, .footer-widgets .widgets_footer.widget_categories ul li',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'typography',
	'settings'    => 'cprt_footer_typog',
	'label'       => esc_attr__( 'Footer Copyright Typography', 'di-blog' ),
	'description' => esc_attr__( 'Typography for footer copyright section below footer widgets.', 'di-blog' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Fauna One',
		'variant'        => 'regular',
		'font-size'      => '14px',
		'line-height'    => '1.7',
		'letter-spacing' => '0',
		'text-transform' => 'inherit',
	),
	'output'      => array(
		array(
			'element' => '.footer-copyright',
		),
	),
	'transport' => 'auto',
) );

//typography END


//color options
Kirki::add_section( 'color_options', array(
	'title'          => esc_attr__( 'Color Options', 'di-blog' ),
	'panel'          => 'di_blog_options',
	'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        	=> 'color',
	'settings'    	=> 'default_a_color',
	'label'       	=> esc_attr__( 'Default Links Color', 'di-blog' ),
	'description'	=> esc_attr__( 'This will be color of all default links (primary).', 'di-blog' ),
	'section'     	=> 'color_options',
	'default'     	=> apply_filters( 'di_blog_default_a_color', '#cea525' ),
	'choices'     	=> array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => 'body a',
			'property' => 'color',
		),
		array(
			'element'  => '.maincontainer .post-contents .entry-content blockquote',
			'property' => 'border-left',
			'prefix'	=> '5px solid ',
		),
		array(
			'element'  => '.woocommerce .widget_sidebar_main.widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widgets_footer.widget_price_filter .ui-slider .ui-slider-range',
			'property' => 'background-color',
		),
		array(
			'element'  => '.woocommerce .star-rating',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        	=> 'color',
	'settings'    	=> 'default_a_mover_color',
	'label'       	=> esc_attr__( 'Default Links Color Mouse Over', 'di-blog' ),
	'description'	=> esc_attr__( 'This will be color of all default links on mouse over.', 'di-blog' ),
	'section'     	=> 'color_options',
	'default'     	=> apply_filters( 'di_blog_default_a_mover_color', '#9a7918' ),
	'choices'     	=> array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => 'body a:hover, body a:focus',
			'property' => 'color',
		),
		array(
			'element'  => '.woocommerce .widget_sidebar_main.widget_price_filter .ui-slider .ui-slider-handle, .woocommerce .widgets_footer.widget_price_filter .ui-slider .ui-slider-handle',
			'property' => 'background-color',
		),
		array(
			'element'  => '.woocommerce a:hover .star-rating span',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );

do_action( 'di_blog_color_options' );

//color options END


//social profile
Kirki::add_section( 'social_options', array(
	'title'          => esc_attr__( 'Social Profile', 'di-blog' ),
	'panel'          => 'di_blog_options',
	'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_facebook',
	'label'			=> esc_attr__( 'Facebook Link', 'di-blog' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-blog' ),
	'section'		=> 'social_options',
	'default'		=> 'http://facebook.com',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_twitter',
	'label'			=> esc_attr__( 'Twitter Link', 'di-blog' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-blog' ),
	'section'		=> 'social_options',
	'default'		=> 'http://twitter.com',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_youtube',
	'label'			=> esc_attr__( 'YouTube Link', 'di-blog' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-blog' ),
	'section'		=> 'social_options',
	'default'		=> 'http://youtube.com',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_vk',
	'label'			=> esc_attr__( 'VK Link', 'di-blog' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-blog' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_googleplus',
	'label'			=> esc_attr__( 'Google Plus Link', 'di-blog' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-blog' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_linkedin',
	'label'			=> esc_attr__( 'Linkedin Link', 'di-blog' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-blog' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_pinterest',
	'label'			=> esc_attr__( 'Pinterest Link', 'di-blog' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-blog' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_instagram',
	'label'			=> esc_attr__( 'Instagram Link', 'di-blog' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-blog' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_telegram',
	'label'			=> esc_attr__( 'Telegram Link', 'di-blog' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-blog' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_snapchat',
	'label'			=> esc_attr__( 'Snapchat Link', 'di-blog' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-blog' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_flickr',
	'label'			=> esc_attr__( 'Flickr Link', 'di-blog' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-blog' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_reddit',
	'label'			=> esc_attr__( 'Reddit Link', 'di-blog' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-blog' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_tumblr',
	'label'			=> esc_attr__( 'Tumblr Link', 'di-blog' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-blog' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_yelp',
	'label'			=> esc_attr__( 'Yelp Link', 'di-blog' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-blog' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_whatsappno',
	'label'			=> esc_attr__( 'WhatsApp Number', 'di-blog' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-blog' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_skype',
	'label'			=> esc_attr__( 'Skype Id', 'di-blog' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-blog' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'toggle',
	'settings'    => 's_link_open',
	'label'       => esc_attr__( 'Social Links in New Tab?', 'di-blog' ),
	'description' => esc_attr__( 'Open social links in new tab or same.', 'di-blog' ),
	'section'     => 'social_options',
	'default'     => '1',
) );


//social profile END



// Blog
Kirki::add_section( 'blog_options', array(
	'title'          => esc_attr__( 'Blog Options', 'di-blog' ),
	'panel'          => 'di_blog_options',
	'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'sortable',
	'settings'    => 'archive_structure',
	'label'       => __( 'Archive Posts Structure', 'di-blog' ),
	'description' => __( 'Show / Hide / Reorder parts of posts page.', 'di-blog' ),
	'section'     => 'blog_options',
	'default'     => array(
		'categories',
		'loop_headline',
		'date',
		'featured_image',
		'loop_content',
	),
	'choices'     => array(
		'categories'		=> esc_attr__( 'Post Categories', 'di-blog' ),
		'loop_headline'		=> esc_attr__( 'Post Headline', 'di-blog' ),
		'date'				=> esc_attr__( 'Post Date', 'di-blog' ),
		'featured_image'	=> esc_attr__( 'Post Featured Image', 'di-blog' ),
		'loop_content'		=> esc_attr__( 'Post Content', 'di-blog' ),
	),
	'priority'    => 10,
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'sortable',
	'settings'    => 'single_structure',
	'label'       => __( 'Single Post Structure', 'di-blog' ),
	'description' => __( 'Show / Hide / Reorder parts of single post.', 'di-blog' ),
	'section'     => 'blog_options',
	'default'     => array(
		'categories',
		'single_headline',
		'date',
		'featured_image',
		'single_content',
		'tags',
	),
	'choices'     => array(
		'categories'		=> esc_attr__( 'Post Categories', 'di-blog' ),
		'single_headline'	=> esc_attr__( 'Post Headline', 'di-blog' ),
		'date'				=> esc_attr__( 'Post Date', 'di-blog' ),
		'featured_image'	=> esc_attr__( 'Post Featured Image', 'di-blog' ),
		'single_content'	=> esc_attr__( 'Post Content', 'di-blog' ),
		'tags'				=> esc_attr__( 'Post Tags', 'di-blog' ),
		'author'			=> esc_attr__( 'Post Author', 'di-blog' ),
	),
	'priority'    => 10,
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'select',
	'settings'    => 'excerpt_or_content',
	'label'       => esc_attr__( 'Display Excerpt or Content on Archive', 'di-blog' ),
	'section'     => 'blog_options',
	'default'     => 'excerpt',
	'choices'     => array(
		'excerpt' => esc_attr__( 'Display Excerpt', 'di-blog' ),
		'content' => esc_attr__( 'Display Content', 'di-blog' ),
	),
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'number',
	'settings'    => 'excerpt_length',
	'label'       => esc_attr__( 'Excerpt Length', 'di-blog' ),
	'description' => esc_attr__( 'How much words you want to display on Archive page?', 'di-blog' ),
	'section'     => 'blog_options',
	'default'     => 40,
	'choices'     => array(
		'min'  => 1,
		'step' => 1,
	),
	'active_callback'  => array(
		array(
			'setting'  => 'excerpt_or_content',
			'operator' => '==',
			'value'    => 'excerpt',
		),
	),
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'select',
	'settings'    => 'dispostdt',
	'label'       => __( 'Date to Display?', 'di-blog' ),
	'section'     => 'blog_options',
	'default'     => 'published',
	'priority'    => 10,
	'choices'     => array(
		'published'		=> esc_attr__( 'Post Publish Date', 'di-blog' ),
		'updated'		=> esc_attr__( 'Post Updated Date', 'di-blog' ),
	),
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'select',
	'settings'    => 'archnav',
	'label'       => __( 'Navigation Type on Archive', 'di-blog' ),
	'section'     => 'blog_options',
	'default'     => 'nextprenav',
	'priority'    => 10,
	'choices'     => array(
		'nextprenav'	=> esc_attr__( 'Next Previous Navigation', 'di-blog' ),
		'numbernav'		=> esc_attr__( 'Number Navigation', 'di-blog' ),
	),
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'select',
	'settings'    => 'blog_list_grid',
	'label'       => esc_attr__( 'Posts View on Archive', 'di-blog' ),
	'description' => esc_attr__( 'Display List or Grid?', 'di-blog' ),
	'section'     => 'blog_options',
	'default'     => 'list',
	'choices'     => array(
		'list'		=> esc_attr__( 'List', 'di-blog' ),
		'grid2c'	=> esc_attr__( 'Grid 2 Column', 'di-blog' ),
		'grid3c'	=> esc_attr__( 'Grid 3 Column', 'di-blog' ),
	),
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'radio-image',
	'settings'    => 'blog_archive_layout',
	'label'       => esc_attr__( 'Archive / Loop Layout', 'di-blog' ),
	'section'     => 'blog_options',
	'default'     => 'rights',
	'choices'     => array(
		'fullw'	  => get_template_directory_uri() . '/assets/images/fullw.png',
		'rights'  => get_template_directory_uri() . '/assets/images/rights.png',
		'lefts'   => get_template_directory_uri() . '/assets/images/lefts.png',
	),
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'radio-image',
	'settings'    => 'blog_single_layout',
	'label'       => esc_attr__( 'Single Post Layout', 'di-blog' ),
	'section'     => 'blog_options',
	'default'     => 'rights',
	'choices'     => array(
		'fullw'	  => get_template_directory_uri() . '/assets/images/fullw.png',
		'rights'  => get_template_directory_uri() . '/assets/images/rights.png',
		'lefts'   => get_template_directory_uri() . '/assets/images/lefts.png',
	),
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'toggle',
	'settings'    => 'archive_infobar_endis',
	'label'       => esc_attr__( 'Display Archive Info Bar?', 'di-blog' ),
	'description' => esc_attr__( 'Enable/Disable archive info bar.', 'di-blog' ),
	'section'     => 'blog_options',
	'default'     => '1',
) );

do_action( 'di_blog_blog_options' );

// Blog END


// Front page owl slider
Kirki::add_section( 'front_slider_options', array(
	'title'          => esc_attr__( 'Front Page Slider Options', 'di-blog' ),
	'panel'          => 'di_blog_options',
	'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'toggle',
	'settings'    => 'front_slider_endis',
	'label'       => esc_attr__( 'Display Slider?', 'di-blog' ),
	'description' => esc_attr__( 'Enable/Disable posts slider on front page.', 'di-blog' ),
	'section'     => 'front_slider_options',
	'default'     => '0',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'select',
	'settings'    => 'front_slider_tag',
	'label'       => __( 'Select Posts Tag', 'di-blog' ),
	'description' => __( 'Select a tag for front page posts slider.', 'di-blog' ),
	'section'     => 'front_slider_options',
	'default'     => '',
	'priority'    => 10,
	'choices'     => Kirki_Helper::get_terms( 'post_tag' ),
	'active_callback'  => array(
		array(
			'setting'  => 'front_slider_endis',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'number',
	'settings'    => 'front_slider_num',
	'label'       => esc_attr__( 'Number of Posts', 'di-blog' ),
	'description' => esc_attr__( 'How much posts, you want to include in slider?', 'di-blog' ),
	'section'     => 'front_slider_options',
	'default'     => 3,
	'choices'     => array(
		'min'  => 1,
		'step' => 1,
	),
	'active_callback'  => array(
		array(
			'setting'  => 'front_slider_endis',
			'operator' => '==',
			'value'    => '1',
		),
		array(
			'setting'  => 'front_slider_tag',
			'operator' => '!=',
			'value'    => '',
		),
	),
) );

do_action( 'di_blog_own_slider_settings' );

// Front page owl slider END

// Sidebar menu options
Kirki::add_section( 'sidebarmenu_options', array(
	'title'          => esc_attr__( 'Sidebar Menu Options', 'di-blog' ),
	'panel'          => 'di_blog_options',
	'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'toggle',
	'settings'    => 'sb_menu_onoff',
	'label'       => esc_attr__( 'SideBar Menu', 'di-blog' ),
	'description' => esc_attr__( 'Enable/Disable SideBar Menu', 'di-blog' ),
	'section'     => 'sidebarmenu_options',
	'default'     => '1',
) );

do_action( 'di_blog_sidebar_menu_options' );

// Sidebar menu options END

// WooCommerce section.
if( class_exists( 'WooCommerce' ) ) {
	Kirki::add_section( 'woocommerce_options', array(
		'title'          => esc_attr__( 'WooCommerce Options', 'di-blog' ),
		'panel'          => 'di_blog_options',
		'capability'     => 'edit_theme_options',
	) );

	Kirki::add_field( 'di_blog_config', array(
		'type'        => 'toggle',
		'settings'    => 'shop_icon_endis',
		'label'       => esc_attr__( 'Shop Icon in Menu', 'di-blog' ),
		'description' => esc_attr__( 'Enable/Disable shop icon in menu.', 'di-blog' ),
		'section'     => 'woocommerce_options',
		'default'     => '1',
	) );

	Kirki::add_field( 'di_blog_config', array(
		'type'        => 'toggle',
		'settings'    => 'cart_icon_endis',
		'label'       => esc_attr__( 'Cart Icon in Menu', 'di-blog' ),
		'description' => esc_attr__( 'Enable/Disable cart icon in menu.', 'di-blog' ),
		'section'     => 'woocommerce_options',
		'default'     => '1',
	) );

	Kirki::add_field( 'di_blog_config', array(
		'type'        => 'toggle',
		'settings'    => 'myaccount_icon_endis',
		'label'       => esc_attr__( 'My Account Icon in Menu', 'di-blog' ),
		'description' => esc_attr__( 'Enable/Disable my account icon in menu.', 'di-blog' ),
		'section'     => 'woocommerce_options',
		'default'     => '1',
	) );
	
	Kirki::add_field( 'di_blog_config', array(
		'type'        => 'toggle',
		'settings'    => 'support_gallery_zoom',
		'label'       => esc_attr__( 'Gallery Zoom', 'di-blog' ),
		'description' => esc_attr__( 'Enable/Disable gallery zoom support on single product.', 'di-blog' ),
		'section'     => 'woocommerce_options',
		'default'     => '1',
	) );

	Kirki::add_field( 'di_blog_config', array(
		'type'        => 'toggle',
		'settings'    => 'support_gallery_lightbox',
		'label'       => esc_attr__( 'Gallery Light Box', 'di-blog' ),
		'description' => esc_attr__( 'Enable/Disable gallery light box support on single product.', 'di-blog' ),
		'section'     => 'woocommerce_options',
		'default'     => '1',
	) );

	Kirki::add_field( 'di_blog_config', array(
		'type'			=> 'toggle',
		'settings'		=> 'support_gallery_slider',
		'label'			=> esc_attr__( 'Gallery Slider', 'di-blog' ),
		'description'	=> esc_attr__( 'Enable/Disable gallery slider support on single product.', 'di-blog' ),
		'section'		=> 'woocommerce_options',
		'default'		=> '1',
	) );

	Kirki::add_field( 'di_blog_config', array(
		'type'        => 'toggle',
		'settings'    => 'display_related_prdkt',
		'label'       => esc_attr__( 'Related Products', 'di-blog' ),
		'description' => esc_attr__( 'Enable/Disable WooCommerce Related Products,', 'di-blog' ),
		'section'     => 'woocommerce_options',
		'default'     => '1',
	) );

	Kirki::add_field( 'di_blog_config', array(
		'type'			=> 'toggle',
		'settings'		=> 'order_again_btn',
		'label'			=> esc_attr__( 'Display Order Again Button?', 'di-blog' ),
		'description'	=> esc_attr__( 'It will show / hide order again button on singe order page.', 'di-blog' ),
		'section'		=> 'woocommerce_options',
		'default'		=> '1',
	) );
	
	Kirki::add_field( 'di_blog_config', array(
		'type'        => 'number',
		'settings'    => 'product_per_page',
		'label'       => esc_attr__( 'Number of products display on loop page', 'di-blog' ),
		'description' => esc_attr__( 'How much products you want to display on loop page?', 'di-blog' ),
		'section'     => 'woocommerce_options',
		'default'     => 12,
		'choices'     => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		),
	) );
	
	Kirki::add_field( 'di_blog_config', array(
		'type'        => 'slider',
		'settings'    => 'product_per_column',
		'label'       => esc_attr__( 'Number of products display per column', 'di-blog' ),
		'description' => esc_attr__( 'How much products you want to display in single line?', 'di-blog' ),
		'section'     => 'woocommerce_options',
		'default'     => 4,
		'choices'     => array(
			'min'  => '2',
			'max'  => '5',
			'step' => '1',
			),
	) );

	Kirki::add_field( 'di_blog_config', array(
		'type'        => 'color',
		'settings'    => 'woo_onsale_lbl_clr',
		'label'       => esc_attr__( 'OnSale Sign Color', 'di-blog' ),
		'description' => esc_attr__( 'This will be color of OnSale Sign of products.', 'di-blog' ),
		'section'     => 'woocommerce_options',
		'default'     => apply_filters( 'di_blog_woo_onsale_lbl_clr', '#ffffff' ),
		'choices'     => array(
			'alpha' => true,
		),
		'output' => array(
			array(
				'element'	=> '.woocommerce span.onsale',
				'property'	=> 'color',
			),
		),
		'transport' => 'auto'
	) );

	Kirki::add_field( 'di_blog_config', array(
		'type'        => 'color',
		'settings'    => 'woo_onsale_lbl_bg_clr',
		'label'       => esc_attr__( 'OnSale Sign Background Color', 'di-blog' ),
		'description' => esc_attr__( 'This will be background color of OnSale Sign of products.', 'di-blog' ),
		'section'     => 'woocommerce_options',
		'default'     => apply_filters( 'di_blog_woo_onsale_lbl_bg_clr', '#cea525' ),
		'choices'     => array(
			'alpha' => true,
		),
		'output' => array(
			array(
				'element'	=> '.woocommerce span.onsale',
				'property'	=> 'background-color',
			),
		),
		'transport' => 'auto'
	) );

	Kirki::add_field( 'di_blog_config', array(
		'type'        => 'color',
		'settings'    => 'woo_price_clr',
		'label'       => esc_attr__( 'Product Price Color', 'di-blog' ),
		'description' => esc_attr__( 'This will be color of product price.', 'di-blog' ),
		'section'     => 'woocommerce_options',
		'default'     => apply_filters( 'di_blog_woo_price_clr', '#cea525' ),
		'choices'     => array(
			'alpha' => true,
		),
		'output' => array(
			array(
				'element'	=> '.woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce .widget_sidebar_main .woocommerce-Price-amount.amount, .woocommerce .widgets_footer .woocommerce-Price-amount.amount',
				'property'	=> 'color',
			),
		),
		'transport' => 'auto'
	) );

	Kirki::add_field( 'di_blog_config', array(
		'type'        => 'custom',
		'settings'    => 'info_woo_layout',
		'section'     => 'woocommerce_options',
		'default'     => '<hr /><div style="padding: 10px;background-color: #333; color: #fff; border-radius: 8px;">' . esc_attr__( 'Layouts: For Cart, Checkout and My Account pages layout, use: Template option under Page Attributes on page edit screen.', 'di-blog' ) . '</div>',
	) );

	Kirki::add_field( 'di_blog_config', array(
		'type'        => 'radio-image',
		'settings'    => 'woo_layout',
		'label'       => esc_attr__( 'Shop / Archive Page Layout', 'di-blog' ),
		'description' => esc_attr__( 'This layout will apply on shop, archive, search (products loop) pages.', 'di-blog' ),
		'section'     => 'woocommerce_options',
		'default'     => 'fullw',
		'choices'     => array(
			'fullw'	  => get_template_directory_uri() . '/assets/images/fullw.png',
			'rights'  => get_template_directory_uri() . '/assets/images/rights.png',
			'lefts'   => get_template_directory_uri() . '/assets/images/lefts.png',
		),
	) );

	Kirki::add_field( 'di_blog_config', array(
		'type'        => 'radio-image',
		'settings'    => 'woo_singleprod_layout',
		'label'       => esc_attr__( 'Single Product Page Layout', 'di-blog' ),
		'description' => esc_attr__( 'This layout will apply on single product page.', 'di-blog' ),
		'section'     => 'woocommerce_options',
		'default'     => 'fullw',
		'choices'     => array(
			'fullw'	  => get_template_directory_uri() . '/assets/images/fullw.png',
			'rights'  => get_template_directory_uri() . '/assets/images/rights.png',
			'lefts'   => get_template_directory_uri() . '/assets/images/lefts.png',
		),
	) );

	do_action( 'di_blog_woo_settings' );

}
//woocommerce section END

// Footer widgets.
Kirki::add_section( 'ftr_wdgt_options', array(
    'title'          => esc_attr__( 'Footer Widget Options', 'di-blog' ),
    'panel'          => 'di_blog_options',
    'capability'     => 'edit_theme_options',
) );


Kirki::add_field( 'di_blog_config', array(
	'type'        => 'toggle',
	'settings'    => 'endis_ftr_wdgt',
	'label'       => esc_attr__( 'Footer Widgets', 'di-blog' ),
	'description' => esc_attr__( 'Enable/Disable Footer Widgets.', 'di-blog' ),
	'section'     => 'ftr_wdgt_options',
	'default'     => '0',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'			=> 'radio-image',
	'settings'		=> 'ftr_wdget_lyot',
	'label'			=> esc_attr__( 'Footer Widget Layout', 'di-blog' ),
	'description'	=> esc_attr__( 'Save and go to Widgets page to add.', 'di-blog' ),
	'section'		=> 'ftr_wdgt_options',
	'default'		=> '3',
	'choices'		=> array(
		'1'		=> get_template_directory_uri() . '/assets/images/ftrwidlout1.png',
		'2'		=> get_template_directory_uri() . '/assets/images/ftrwidlout2.png',
		'3'		=> get_template_directory_uri() . '/assets/images/ftrwidlout3.png',
		'4'		=> get_template_directory_uri() . '/assets/images/ftrwidlout4.png',
		'48'	=> get_template_directory_uri() . '/assets/images/ftrwidlout48.png',
		'84'	=> get_template_directory_uri() . '/assets/images/ftrwidlout84.png',
	),
	'active_callback'  => array(
		array(
			'setting'  => 'endis_ftr_wdgt',
			'operator' => '==',
			'value'    => 1,
		),
	)
) );

do_action( 'di_blog_footer_widget_options' );

// Footer widgets END.

// Footer copyright section.
Kirki::add_section( 'footer_copy_options', array(
    'title'          => esc_attr__( 'Footer Copyright Options', 'di-blog' ),
    'panel'          => 'di_blog_options',
    'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'editor',
	'settings'    => 'left_footer_setting',
	'label'       => esc_attr__( 'Footer Left', 'di-blog' ),
	'description' => esc_attr__( 'Content of Footer Left Side', 'di-blog' ),
	'section'     => 'footer_copy_options',
	'default'     => '<p>' . __( 'Site Title, Some rights reserved.', 'di-blog' ) . '</p>',
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.cprtlft_ctmzr',
			'function' => 'html',
		),
	),
	'partial_refresh' => array(
		'left_footer_setting' => array(
			'selector'        => '.cprtlft_ctmzr',
			'render_callback' => function() {
				return wp_kses_post( get_theme_mod( 'left_footer_setting' ) );
			},
		),
	),
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'editor',
	'settings'    => 'center_footer_setting',
	'label'       => esc_attr__( 'Footer Center', 'di-blog' ),
	'description' => esc_attr__( 'Content of Footer Center Side', 'di-blog' ),
	'section'     => 'footer_copy_options',
	'default'     => '<p><a href="#">' . __( 'Terms of Use - Privacy Policy', 'di-blog' ) . '</a></p>',
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.cprtcntr_ctmzr',
			'function' => 'html',
		),
	),
	'partial_refresh' => array(
		'center_footer_setting' => array(
			'selector'        => '.cprtcntr_ctmzr',
			'render_callback' => function() {
				return wp_kses_post( get_theme_mod( 'center_footer_setting' ) );
			},
		),
	),
) );

do_action( 'di_blog_footer_copyright_right_setting' );

do_action( 'di_blog_footer_copyright' );

// Footer copyright section END.

// MISC section.
Kirki::add_section( 'misc_options', array(
    'title'          => esc_attr__( 'MISC Options', 'di-blog' ),
    'panel'          => 'di_blog_options',
    'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'toggle',
	'settings'    => 'stickymenu_setting',
	'label'       => esc_attr__( 'Sticky Menu', 'di-blog' ),
	'description' => esc_attr__( 'Enable/Disable Sticky Menu (for Large Devices)', 'di-blog' ),
	'section'     => 'misc_options',
	'default'     => '0',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'toggle',
	'settings'    => 'back_to_top',
	'label'       => esc_attr__( 'Back To Top Button', 'di-blog' ),
	'description' => esc_attr__( 'Enable/Disable Back To Top Button', 'di-blog' ),
	'section'     => 'misc_options',
	'default'     => '1',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'toggle',
	'settings'    => 'loading_icon',
	'label'       => esc_attr__( 'Page Loading Icon', 'di-blog' ),
	'description' => esc_attr__( 'Enable/Disable Page Loading Icon', 'di-blog' ),
	'section'     => 'misc_options',
	'default'     => '0',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'image',
	'settings'    => 'loading_icon_img',
	'label'       => esc_attr__( 'Upload Custom Loading Icon', 'di-blog' ),
	'description' => esc_attr__( 'It will replace default loading icon.', 'di-blog' ),
	'section'     => 'misc_options',
	'default'     => '',
	'active_callback'  => array(
		array(
			'setting'  => 'loading_icon',
			'operator' => '==',
			'value'    => 1,
		),
	)
) );

// MISC section END.


//Theme Info section
Kirki::add_section( 'theme_info', array(
    'title'          => esc_attr__( 'Theme Info', 'di-blog' ),
    'panel'          => 'di_blog_options',
    'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'custom',
	'settings'    => 'custom_dib_demo',
	'label'       => esc_attr__( 'Di Blog Demo', 'di-blog' ),
	'section'     => 'theme_info',
	'default'     => '<div style="background-color: #333;border-radius: 9px;color: #fff;padding: 13px 7px;">' . esc_attr__( 'You can check demo of ', 'di-blog' ) . ' <a target="_blank" href="http://demo.dithemes.com/di-blog/">' . esc_attr__( 'Di Blog Theme Here', 'di-blog' ) . '</a>.</div>',
) );

Kirki::add_field( 'di_blog_config', array(
	'type'        => 'custom',
	'settings'    => 'custom_dib_docs',
	'label'       => esc_attr__( 'Di Blog Docs', 'di-blog' ),
	'section'     => 'theme_info',
	'default'     => '<div style="background-color: #333;border-radius: 9px;color: #fff;padding: 13px 7px;">' . esc_attr__( 'You can check documentation of ', 'di-blog' ) . ' <a target="_blank" href="https://dithemes.com/di-blog-free-wordpress-theme-documentation/">' . esc_attr__( 'Di Blog Theme Here', 'di-blog' ) . '</a>.</div>',
) );

do_action( 'di_blog_cutmzr_theme_info' );

//Theme Info section END

