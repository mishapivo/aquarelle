<?php

/*
    Definitions Of Options For Customizer
    ======================================= */

if ( ! function_exists( 'evolve_customizer_options' ) ) {
	function evolve_customizer_options() {

		$global_value = evolve_global_customizer_value();

		/*
			Theme Links
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'      => 'evl-theme-links-main-tab',
				'title'   => esc_attr__( 'Theme Links & Premium Version', 'evolve' ),
				'iconfix' => 'evolve-icon evolve-icon-logo',
				'class'   => 'theme_links',
				'fields'  => array(
					array(
						'id'   => 'evl_theme_links',
						'desc' => '<a class="evolve-upgrade-button" target="_blank" href="' . $global_value['home_url'] . 'evolve-multipurpose-wordpress-theme/?utm_source=evolve-customizer&utm_medium=homepage-link&utm_campaign=theme-customizer"><span class="dashicons dashicons-admin-home"></span> ' . esc_html__( 'Theme Homepage', 'evolve' ) . '</a><br /><a class="evolve-upgrade-button" target="_blank" href="' . $global_value['home_url'] . 'docs/?utm_source=evolve-customizer&utm_medium=documentation-link&utm_campaign=theme-customizer"><span class="dashicons dashicons-admin-page"></span> ' . esc_html__( 'Documentation', 'evolve' ) . '</a><br /><a class="evolve-upgrade-button" target="_blank" href="' . $global_value['support_url'] . 'support/theme/evolve"><span class="dashicons dashicons-admin-comments"></span> ' . esc_html__( 'Support', 'evolve' ) . '</a><div class="evolve-features"><h2>' . esc_html__( 'evolve Plus key features', 'evolve' ) . '</h2><ul><li><h3>' . esc_html__( 'Theme4Press Slider', 'evolve' ) . '</h3>' . esc_html__( 'Image or Video Responsive Unlimited Slides With Nice Animations', 'evolve' ) . '</li><li><h3>' . esc_html__( 'Built-in Mega Menu', 'evolve' ) . '</h3>' . esc_html__( 'Excellent Mega Menu When You Need To Add Widgets Or Specially Style Your Menu', 'evolve' ) . '</li><li><h3>' . esc_html__( 'Shortcodes', 'evolve' ) . '</h3>' . esc_html__( 'Create Alerts, Tabs, Pricing Tables etc.', 'evolve' ) . '</li><li><h3>' . esc_html__( 'Custom Sidebars', 'evolve' ) . '</h3>' . esc_html__( 'Create Unique Sidebars With Widgets For Any Page', 'evolve' ) . '</li><li><h3>' . esc_html__( 'Portfolios', 'evolve' ) . '</h3>' . esc_html__( 'Up To 9 Layouts &ndash; Select The Right Type For Your Showcase', 'evolve' ) . '</li><li><h3>' . esc_html__( 'Google Map Contact', 'evolve' ) . '</h3>' . esc_html__( 'Contact Page Template With The Google Map And reCaptcha Protection', 'evolve' ) . '</li><li><h3>' . esc_html__( 'Sticky Navigation', 'evolve' ) . '</h3>' . esc_html__( 'Sticky Navigation Is Perfect If You Need Organized Pages - For Example For Documentation', 'evolve' ) . '</li><li><h3>' . esc_html__( 'Lightbox', 'evolve' ) . '</h3>' . esc_html__( 'Responsive Lightbox Ready To Display Your Amazing Shots, YouTube Or Vimeo Videos, Or Instagram Photos', 'evolve' ) . '</li><li><h3>' . esc_html__( 'Slider Revolution (Bundled)', 'evolve' ) . '</h3>' . esc_html__( 'Responsive Premium WordPress Slider With Breathtaking Effects', 'evolve' ) . '</li><li><h3>' . esc_html__( 'LayerSlider (Bundled)', 'evolve' ) . '</h3>' . esc_html__( 'Create Fantastic Slides With The Bundled Premium Slider Plugin', 'evolve' ) . '</li><li><h3>' . esc_html__( '100% Width Template', 'evolve' ) . '</h3>' . esc_html__( '100% Width Template Let You To Set Any Page To Be Full Width Of The Browser\'s Window', 'evolve' ) . '</li><li><h3>' . esc_html__( 'Custom Headers', 'evolve' ) . '</h3>' . esc_html__( 'Custom Headers Can Be Set Per Post/Page', 'evolve' ) . '</li><li><h3>' . esc_html__( 'Header Layouts', 'evolve' ) . '</h3>' . esc_html__( '5 Header Layouts', 'evolve' ) . '</li><li><h3>' . esc_html__( 'Live Customizer', 'evolve' ) . '</h3>' . esc_html__( '300+ Theme Options', 'evolve' ) . '</li><li><h3>' . esc_html__( 'WooCommerce', 'evolve' ) . '</h3>' . esc_html__( 'Custom/Global Sidebar For WooCommerce Pages', 'evolve' ) . '</li><li><h3>' . esc_html__( 'Bootstrap Slider', 'evolve' ) . '</h3>' . esc_html__( 'EXTRA IN PREMIUM: Unlimited Number Of Slides, Slides Reorder', 'evolve' ) . '</li><li><h3>' . esc_html__( 'Parallax Slider', 'evolve' ) . '</h3>' . esc_html__( 'EXTRA IN PREMIUM: Unlimited Number Of Slides, Slides Reorder', 'evolve' ) . '</li><li><h3>' . esc_html__( 'Posts Slider', 'evolve' ) . '</h3>' . esc_html__( 'EXTRA IN PREMIUM: Up To 30 Slides', 'evolve' ) . '</li></ul></div><a class="evolve-upgrade-button" target="_blank" href="' . $global_value['home_url'] . 'evolve-multipurpose-wordpress-theme/evolve-multipurpose-wordpress-theme/?utm_source=evolve-customizer&utm_medium=compare-themes-link&utm_campaign=theme-customizer#features"><span class="dashicons dashicons-update"></span> ' . esc_html__( 'Compare With Premium Version', 'evolve' ) . '</a>',
						'type' => 'info'
					)
				)
			)
		);

		/*
			General
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'      => 'evl-general-main-tab',
				'title'   => esc_attr__( 'General', 'evolve' ),
				'iconfix' => 'evolve-icon evolve-icon-general',
				'fields'  => array(
					array(
						'id'       => 'evl_frontpage_layout',
						'title'    => esc_attr__( 'Select Front Page Layout', 'evolve' ),
						'subtitle' => esc_attr__( 'Select Content and Sidebar alignment for Front Page', 'evolve' ),
						'type'     => 'image_select',
						'options'  => array(
							'1c'  => $global_value['customizer_images'] . '1c.png',
							'2cl' => $global_value['customizer_images'] . '2cl.png',
							'2cr' => $global_value['customizer_images'] . '2cr.png',
							'3cm' => $global_value['customizer_images'] . '3cm.png',
							'3cr' => $global_value['customizer_images'] . '3cr.png',
							'3cl' => $global_value['customizer_images'] . '3cl.png',
						),
						'default'  => '1c'
					),
					array(
						'id'      => 'evl_frontpage_width_layout',
						'title'   => esc_attr__( 'Front Page Layout Width Style', 'evolve' ),
						'type'    => 'select',
						'options' => array(
							'fixed' => esc_attr__( 'Boxed', 'evolve' ),
							'fluid' => esc_attr__( 'Wide', 'evolve' ),
						),
						'default' => 'fixed'
					),
					array(
						'id'       => 'evl_layout',
						'title'    => esc_attr__( 'Select General Layout', 'evolve' ),
						'subtitle' => esc_attr__( 'Select general Content and Sidebar alignment. This option can be overridden per post/page setting', 'evolve' ),
						'type'     => 'image_select',
						'options'  => array(
							'1c'  => $global_value['customizer_images'] . '1c.png',
							'2cl' => $global_value['customizer_images'] . '2cl.png',
							'2cr' => $global_value['customizer_images'] . '2cr.png',
							'3cm' => $global_value['customizer_images'] . '3cm.png',
							'3cr' => $global_value['customizer_images'] . '3cr.png',
							'3cl' => $global_value['customizer_images'] . '3cl.png',
						),
						'default'  => '2cl'
					),
					array(
						'id'      => 'evl_width_layout',
						'title'   => esc_attr__( 'General Layout Width Style', 'evolve' ),
						'type'    => 'select',
						'options' => array(
							'fixed' => esc_attr__( 'Boxed', 'evolve' ),
							'fluid' => esc_attr__( 'Wide', 'evolve' ),
						),
						'default' => 'fixed',
					),
					array(
						'id'        => 'evl_width_px',
						'title'     => esc_attr__( 'Max Content Layout Width', 'evolve' ),
						'subtitle'  => esc_attr__( 'Select the maximum content width for your website (px)', 'evolve' ),
						'type'      => 'slider',
						'options'   => array(
							'min'  => '720',
							'max'  => '2000',
							'step' => '10',
						),
						'default'   => 1200,
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'       => '.container, .wrapper-customizer',
								'property'      => 'max-width',
								'value_pattern' => '$' . 'px!important'
							)
						)
					),
					array(
						'id'        => 'evl_content_top_bottom_padding',
						'title'     => esc_attr__( 'Content Top & Bottom Padding', 'evolve' ),
						'subtitle'  => esc_attr__( 'Enter the page Content Top & Bottom Padding', 'evolve' ),
						'type'      => 'spacing',
						'units'     => array( 'px', 'em' ),
						'default'   => array(
							'padding-top'    => '2rem',
							'padding-bottom' => '0rem',
							'units'          => 'rem'
						),
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.content',
								'property' => 'padding',
								'choice'   => 'top'
							),
							array(
								'element'  => '.content',
								'property' => 'padding',
								'choice'   => 'bottom'
							)
						)
					)
				)
			)
		);

		/*
			Custom Front Page Builder
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'      => 'evl-frontpage-main-tab',
				'title'   => esc_attr__( 'Custom Front Page Builder', 'evolve' ),
				'iconfix' => 'evolve-icon evolve-icon-builder'
			)
		);

		/*
			-- Elements Display & Order
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-frontpage-general-tab',
				'title'      => esc_attr__( 'Elements Display & Order', 'evolve' ),
				'subsection' => true,
				'fields'     => array(
					array(
						'id'     => 'evl-front-page-elements',
						'title'  => esc_attr__( 'Front Page Elements Display and Order', 'evolve' ),
						'type'   => 'section',
						'indent' => true
					),
					array(
						'id'      => 'evl_front_elements_header_area',
						'title'   => esc_attr__( 'Header Area', 'evolve' ),
						'type'    => 'sorter',
						'options' => array(
							'enabled'  => array(
								'header' => esc_attr__( 'Header (REORDER ONLY)', 'evolve' ),
							),
							'disabled' => array(
								'bootstrap_slider' => esc_attr__( 'Bootstrap Slider', 'evolve' ) . ( evolve_theme_mod( 'evl_bootstrap_slider_support', '0' ) == '1' ? esc_attr__( ' (ACTIVE)', 'evolve' ) : esc_attr__( ' (INACTIVE)', 'evolve' ) ),
								'parallax_slider'  => esc_attr__( 'Parallax Slider', 'evolve' ) . ( evolve_theme_mod( 'evl_parallax_slider_support', '0' ) == '1' ? esc_attr__( ' (ACTIVE)', 'evolve' ) : esc_attr__( ' (INACTIVE)', 'evolve' ) ),
								'posts_slider'     => esc_attr__( 'Posts Slider', 'evolve' ) . ( evolve_theme_mod( 'evl_carousel_slider', '0' ) == '1' ? esc_attr__( ' (ACTIVE)', 'evolve' ) : esc_attr__( ' (INACTIVE)', 'evolve' ) )
							)
						)
					),
					array(
						'id'       => 'evl_front_elements_content_display',
						'title'    => esc_attr__( 'Content Elements Position', 'evolve' ),
						'subtitle' => esc_attr__( 'Select the position of front page elements', 'evolve' ),
						'type'     => 'select',
						'options'  => array(
							'above' => esc_attr__( 'Above/Below Content and Sidebar', 'evolve' ),
							'next'  => esc_attr__( 'In Content And Next To Sidebar', 'evolve' ),
						),
						'default'  => 'above'
					),
					array(
						'id'      => 'evl_front_elements_content_area',
						'title'   => esc_attr__( 'Content Area', 'evolve' ),
						'type'    => 'sorter',
						'options' => $global_value['content_area']
					)
				)
			)
		);

		/*
			-- Content Boxes
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-frontpage-content-boxes-tab',
				'title'      => esc_attr__( 'Content Boxes', 'evolve' ),
				'subsection' => true,
				'fields'     => array(
					array(
						'id'       => 'evl_content_boxes_front_page',
						'title'    => esc_attr__( 'Enable Content Boxes On Front Page', 'evolve' ),
						'subtitle' => esc_attr__( 'Check this box if you want to enable Content Boxes On Front Page', 'evolve' ),
						'type'     => 'checkbox',
						'default'  => '0'
					),
					array(
						'id'       => 'evl-front-page-subsec-content-boxes-element',
						'title'    => esc_attr__( 'Items', 'evolve' ),
						'type'     => 'info',
						'selector' => '.home-content-boxes .badge',
						'indent'   => true
					),
					// Content Box 1
					array(
						'id'     => 'evl-front-page-subsec-box1-start',
						'title'  => esc_attr__( 'Content Box 1', 'evolve' ),
						'type'   => 'section',
						'indent' => true
					),
					array(
						'id'      => 'evl_content_box1_enable',
						'title'   => esc_attr__( 'Enable Content Box 1', 'evolve' ),
						'type'    => 'switch',
						'on'      => esc_attr__( 'Enabled', 'evolve' ),
						'off'     => esc_attr__( 'Disabled', 'evolve' ),
						'default' => 0
					),
					array(
						'id'              => 'evl_content_box1_title',
						'title'           => esc_attr__( 'Content Box 1 Title', 'evolve' ),
						'type'            => 'text',
						'selector'        => '.content-box.content-box-1 h5',
						'render_callback' => 'evl_content_box1_title',
						'required'        => array(
							array( 'evl_content_box1_enable', '=', '1' )
						)
					),
					array(
						'id'              => 'evl_content_box1_icon',
						'title'           => esc_attr__( 'Content Box 1 Icon (Font Awesome)', 'evolve' ),
						'type'            => 'text',
						'selector'        => '.content-box.content-box-1 .card-img-top',
						'render_callback' => 'evl_content_box1_icon',
						'class'           => 'iconpicker-icon',
						'required'        => array(
							array( 'evl_content_box1_enable', '=', '1' )
						)
					),
					array(
						'id'        => 'evl_content_box1_icon_color',
						'title'     => esc_attr__( 'Content Box 1 Icon Color', 'evolve' ),
						'type'      => 'color',
						'default'   => '#8bb9c1',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.content-box.content-box-1 [class*=" fa-"]',
								'function' => 'css',
								'property' => 'color'
							)
						),
						'required'  => array(
							array( 'evl_content_box1_enable', '=', '1' )
						)
					),
					array(
						'id'              => 'evl_content_box1_desc',
						'title'           => esc_attr__( 'Content Box 1 description', 'evolve' ),
						'type'            => 'textarea',
						'selector'        => '.content-box.content-box-1 p',
						'render_callback' => 'evl_content_box1_desc',
						'required'        => array(
							array( 'evl_content_box1_enable', '=', '1' )
						)
					),
					array(
						'id'              => 'evl_content_box1_button',
						'title'           => esc_attr__( 'Content Box 1 Button', 'evolve' ),
						'subtitle'        => sprintf( esc_attr__( 'Default: %1$s<a class="btn btn-sm" href="#">Learn more</a>%2$s', 'evolve' ), '<code>', '</code>' ),
						'type'            => 'textarea',
						'selector'        => '.content-box.content-box-1 .card-footer',
						'render_callback' => 'evl_content_box1_button',
						'required'        => array(
							array( 'evl_content_box1_enable', '=', '1' )
						)
					),
					array(
						'id'     => 'evl-front-page-subsec-box1-end',
						'type'   => 'section',
						'indent' => false
					),
					// Content Box 2
					array(
						'id'     => 'evl-front-page-subsec-box2-start',
						'title'  => esc_attr__( 'Content Box 2', 'evolve' ),
						'type'   => 'section',
						'indent' => true
					),
					array(
						'id'      => 'evl_content_box2_enable',
						'title'   => esc_attr__( 'Enable Content Box 2', 'evolve' ),
						'type'    => 'switch',
						'on'      => esc_attr__( 'Enabled', 'evolve' ),
						'off'     => esc_attr__( 'Disabled', 'evolve' ),
						'default' => 0
					),
					array(
						'id'              => 'evl_content_box2_title',
						'title'           => esc_attr__( 'Content Box 2 Title', 'evolve' ),
						'type'            => 'text',
						'selector'        => '.content-box.content-box-2 h5',
						'render_callback' => 'evl_content_box2_title',
						'required'        => array(
							array( 'evl_content_box2_enable', '=', '1' )
						)
					),
					array(
						'id'              => 'evl_content_box2_icon',
						'title'           => esc_attr__( 'Content Box 2 Icon (Font Awesome)', 'evolve' ),
						'type'            => 'text',
						'selector'        => '.content-box.content-box-2 .card-img-top',
						'render_callback' => 'evl_content_box2_icon',
						'class'           => 'iconpicker-icon',
						'required'        => array(
							array( 'evl_content_box2_enable', '=', '1' )
						)
					),
					array(
						'id'        => 'evl_content_box2_icon_color',
						'title'     => esc_attr__( 'Content Box 2 Icon Color', 'evolve' ),
						'type'      => 'color',
						'default'   => '#8ba3c1',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.content-box.content-box-2 [class*=" fa-"]',
								'function' => 'css',
								'property' => 'color'
							)
						),
						'required'  => array(
							array( 'evl_content_box2_enable', '=', '1' )
						)
					),
					array(
						'id'              => 'evl_content_box2_desc',
						'title'           => esc_attr__( 'Content Box 2 description', 'evolve' ),
						'type'            => 'textarea',
						'selector'        => '.content-box.content-box-2 p',
						'render_callback' => 'evl_content_box2_desc',
						'required'        => array(
							array( 'evl_content_box2_enable', '=', '1' )
						)
					),
					array(
						'id'              => 'evl_content_box2_button',
						'title'           => esc_attr__( 'Content Box 2 Button', 'evolve' ),
						'subtitle'        => sprintf( esc_attr__( 'Default: %1$s<a class="btn btn-sm" href="#">Learn more</a>%2$s', 'evolve' ), '<code>', '</code>' ),
						'type'            => 'textarea',
						'selector'        => '.content-box.content-box-2 .card-footer',
						'render_callback' => 'evl_content_box2_button',
						'required'        => array(
							array( 'evl_content_box2_enable', '=', '1' )
						)
					),
					array(
						'id'     => 'evl-front-page-subsec-box2-end',
						'type'   => 'section',
						'indent' => false
					),
					// Content Box 3
					array(
						'id'     => 'evl-front-page-subsec-box3-start',
						'title'  => esc_attr__( 'Content Box 3', 'evolve' ),
						'type'   => 'section',
						'indent' => true
					),
					array(
						'id'      => 'evl_content_box3_enable',
						'title'   => esc_attr__( 'Enable Content Box 3', 'evolve' ),
						'type'    => 'switch',
						'on'      => esc_attr__( 'Enabled', 'evolve' ),
						'off'     => esc_attr__( 'Disabled', 'evolve' ),
						'default' => 0
					),
					array(
						'id'              => 'evl_content_box3_title',
						'title'           => esc_attr__( 'Content Box 3 Title', 'evolve' ),
						'type'            => 'text',
						'selector'        => '.content-box.content-box-3 h5',
						'render_callback' => 'evl_content_box3_title',
						'required'        => array(
							array( 'evl_content_box3_enable', '=', '1' )
						)
					),
					array(
						'id'              => 'evl_content_box3_icon',
						'title'           => esc_attr__( 'Content Box 3 Icon (Font Awesome)', 'evolve' ),
						'type'            => 'text',
						'selector'        => '.content-box.content-box-3 .card-img-top',
						'render_callback' => 'evl_content_box3_icon',
						'class'           => 'iconpicker-icon',
						'required'        => array(
							array( 'evl_content_box3_enable', '=', '1' )
						)
					),
					array(
						'id'        => 'evl_content_box3_icon_color',
						'title'     => esc_attr__( 'Content Box 3 Icon Color', 'evolve' ),
						'type'      => 'color',
						'default'   => '#8dc4b8',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.content-box.content-box-3 [class*=" fa-"]',
								'function' => 'css',
								'property' => 'color'
							)
						),
						'required'  => array(
							array( 'evl_content_box3_enable', '=', '1' )
						)
					),
					array(
						'id'              => 'evl_content_box3_desc',
						'title'           => esc_attr__( 'Content Box 3 description', 'evolve' ),
						'type'            => 'textarea',
						'selector'        => '.content-box.content-box-3 p',
						'render_callback' => 'evl_content_box3_desc',
						'required'        => array(
							array( 'evl_content_box3_enable', '=', '1' )
						)
					),
					array(
						'id'              => 'evl_content_box3_button',
						'title'           => esc_attr__( 'Content Box 3 Button', 'evolve' ),
						'subtitle'        => sprintf( esc_attr__( 'Default: %1$s<a class="btn btn-sm" href="#">Learn more</a>%2$s', 'evolve' ), '<code>', '</code>' ),
						'type'            => 'textarea',
						'selector'        => '.content-box.content-box-3 .card-footer',
						'render_callback' => 'evl_content_box3_button',
						'required'        => array(
							array( 'evl_content_box3_enable', '=', '1' )
						)
					),
					array(
						'id'     => 'evl-front-page-subsec-box3-end',
						'type'   => 'section',
						'indent' => false
					),
					// Content Box 4
					array(
						'id'     => 'evl-front-page-subsec-box4-start',
						'title'  => esc_attr__( 'Content Box 4', 'evolve' ),
						'type'   => 'section',
						'indent' => true
					),
					array(
						'id'      => 'evl_content_box4_enable',
						'title'   => esc_attr__( 'Enable Content Box 4', 'evolve' ),
						'type'    => 'switch',
						'on'      => esc_attr__( 'Enabled', 'evolve' ),
						'off'     => esc_attr__( 'Disabled', 'evolve' ),
						'default' => 0
					),
					array(
						'id'              => 'evl_content_box4_title',
						'title'           => esc_attr__( 'Content Box 4 Title', 'evolve' ),
						'type'            => 'text',
						'selector'        => '.content-box.content-box-4 h5',
						'render_callback' => 'evl_content_box4_title',
						'required'        => array(
							array( 'evl_content_box4_enable', '=', '1' )
						)
					),
					array(
						'id'              => 'evl_content_box4_icon',
						'title'           => esc_attr__( 'Content Box 4 Icon (Font Awesome)', 'evolve' ),
						'type'            => 'text',
						'selector'        => '.content-box.content-box-4 .card-img-top',
						'render_callback' => 'evl_content_box4_icon',
						'class'           => 'iconpicker-icon',
						'required'        => array(
							array( 'evl_content_box4_enable', '=', '1' )
						)
					),
					array(
						'id'        => 'evl_content_box4_icon_color',
						'title'     => esc_attr__( 'Content Box 4 Icon Color', 'evolve' ),
						'type'      => 'color',
						'default'   => '#92bf89',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.content-box.content-box-4 [class*=" fa-"]',
								'function' => 'css',
								'property' => 'color'
							)
						),
						'required'  => array(
							array( 'evl_content_box4_enable', '=', '1' )
						)
					),
					array(
						'id'              => 'evl_content_box4_desc',
						'title'           => esc_attr__( 'Content Box 4 description', 'evolve' ),
						'type'            => 'textarea',
						'selector'        => '.content-box.content-box-4 p',
						'render_callback' => 'evl_content_box4_desc',
						'required'        => array(
							array( 'evl_content_box4_enable', '=', '1' )
						)
					),
					array(
						'id'              => 'evl_content_box4_button',
						'title'           => esc_attr__( 'Content Box 4 Button', 'evolve' ),
						'subtitle'        => sprintf( esc_attr__( 'Default: %1$s<a class="btn btn-sm" href="#">Learn more</a>%2$s', 'evolve' ), '<code>', '</code>' ),
						'type'            => 'textarea',
						'selector'        => '.content-box.content-box-4 .card-footer',
						'render_callback' => 'evl_content_box4_button',
						'required'        => array(
							array( 'evl_content_box4_enable', '=', '1' )
						)
					),
					array(
						'id'        => 'evl_content_box_background_color',
						'title'     => esc_attr__( 'Content Boxes Background Color', 'evolve' ),
						'type'      => 'color',
						'default'   => '#f9f9f9',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.home-content-boxes .card',
								'function' => 'css',
								'property' => 'background'
							)
						)
					),
					array(
						'id'     => 'evl-front-page-subsec-content-boxes-section-start',
						'title'  => esc_attr__( 'Section Settings', 'evolve' ),
						'type'   => 'info',
						'indent' => true
					),
					array(
						'id'              => 'evl_content_boxes_title',
						'title'           => esc_attr__( 'Title of Content Boxes Section', 'evolve' ),
						'type'            => 'text',
						'selector'        => 'h3.content-box-section-title',
						'render_callback' => 'evl_content_boxes_title'
					),
					array(
						'id'          => 'evl_content_boxes_title_alignment',
						'title'       => esc_attr__( 'Title Font, Alignment and Color', 'evolve' ),
						'subtitle'    => esc_attr__( 'Select the font, alignment and color of the section title', 'evolve' ),
						'type'        => 'typography',
						'text-align'  => true,
						'line-height' => false,
						'default'     => array(
							'font-size'   => '1.9rem',
							'color'       => '#333333',
							'font-family' => 'Roboto',
							'font-weight' => '300',
							'text-align'  => 'center'
						),
						'transport'   => 'postMessage',
						'js_vars'     => array(
							array(
								'element' => 'h3.content-box-section-title'
							)
						)
					),
					array(
						'id'        => 'evl_content_boxes_section_padding',
						'title'     => esc_attr__( 'Section Padding', 'evolve' ),
						'subtitle'  => esc_attr__( 'Enter the section padding', 'evolve' ),
						'type'      => 'spacing',
						'units'     => array( 'px', 'em' ),
						'default'   => array(
							'padding-top'    => '25px',
							'padding-right'  => '0',
							'padding-bottom' => '25px',
							'padding-left'   => '0',
							'units'          => 'px'
						),
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.home-content-boxes',
								'function' => 'css',
								'property' => 'padding'
							)
						)
					),
					array(
						'id'        => 'evl_content_boxes_section_background_image',
						'title'     => esc_attr__( 'Section Background Image', 'evolve' ),
						'subtitle'  => esc_attr__( 'Upload a background image for this section, or specify an image URL directly', 'evolve' ),
						'type'      => 'media',
						'url'       => true,
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.home-content-boxes',
								'function' => 'css',
								'property' => 'background-image'
							)
						)
					),
					array(
						'id'        => 'evl_content_boxes_section_image',
						'title'     => esc_attr__( 'Background Image Responsiveness Style', 'evolve' ),
						'subtitle'  => esc_attr__( 'Select if the section background image should be displayed in cover or contain size', 'evolve' ),
						'type'      => 'select',
						'options'   => array(
							'cover'   => esc_attr__( 'Cover', 'evolve' ),
							'contain' => esc_attr__( 'Contain', 'evolve' ),
							'none'    => esc_attr__( 'None', 'evolve' )
						),
						'default'   => 'cover',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.home-content-boxes',
								'function' => 'css',
								'property' => 'background-size'
							)
						)
					),
					array(
						'id'        => 'evl_content_boxes_section_image_background_repeat',
						'title'     => esc_attr__( 'Background Repeat', 'evolve' ),
						'type'      => 'select',
						'options'   => array(
							'no-repeat' => esc_attr__( 'no-repeat', 'evolve' ),
							'repeat'    => esc_attr__( 'repeat', 'evolve' ),
							'repeat-x'  => esc_attr__( 'repeat-x', 'evolve' ),
							'repeat-y'  => esc_attr__( 'repeat-y', 'evolve' )
						),
						'default'   => 'no-repeat',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.home-content-boxes',
								'function' => 'css',
								'property' => 'background-repeat'
							)
						)
					),
					array(
						'id'        => 'evl_content_boxes_section_image_background_position',
						'title'     => esc_attr__( 'Background Position', 'evolve' ),
						'type'      => 'select',
						'options'   => array(
							'center top'    => esc_attr__( 'center top', 'evolve' ),
							'center center' => esc_attr__( 'center center', 'evolve' ),
							'center bottom' => esc_attr__( 'center bottom', 'evolve' ),
							'left top'      => esc_attr__( 'left top', 'evolve' ),
							'left center'   => esc_attr__( 'left center', 'evolve' ),
							'left bottom'   => esc_attr__( 'left bottom', 'evolve' ),
							'right top'     => esc_attr__( 'right top', 'evolve' ),
							'right center'  => esc_attr__( 'right center', 'evolve' ),
							'right bottom'  => esc_attr__( 'right bottom', 'evolve' )
						),
						'default'   => 'center top',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.home-content-boxes',
								'function' => 'css',
								'property' => 'background-position'
							)
						)
					),
					array(
						'id'        => 'evl_content_boxes_section_back_color',
						'title'     => esc_attr__( 'Section Background Color', 'evolve' ),
						'subtitle'  => esc_attr__( 'Custom background color of section', 'evolve' ),
						'type'      => 'color',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.home-content-boxes',
								'function' => 'css',
								'property' => 'background-color'
							)
						)
					),
					array(
						'id'     => 'evl-front-page-subsec-content-boxes-section-end',
						'type'   => 'section',
						'indent' => false
					)
				)
			)
		);

		/*
			-- Testimonials
			======================================= */

		$testimonial_fields = array();

		for ( $i = 1; $i <= 2; $i ++ ) {

			$testimonial_fields[] = array(
				'id'      => "{$global_value['prefix']}_fp_testimonial{$i}",
				'title'   => sprintf( esc_attr__( 'Enable Testimonial %d', 'evolve' ), $i ),
				'type'    => 'switch',
				'on'      => esc_attr__( 'Enabled', 'evolve' ),
				'off'     => esc_attr__( 'Disabled', 'evolve' ),
				'default' => 0
			);

			$testimonial_fields[] = array(
				'id'       => "{$global_value['prefix']}_fp_testimonial{$i}_avatar",
				'title'    => sprintf( esc_attr__( 'Testimonial %d Avatar', 'evolve' ), $i ),
				'subtitle' => sprintf( esc_attr__( 'Upload an image for the Testimonial %d, or specify an image URL directly', 'evolve' ), $i ),
				'type'     => "media",
				'url'      => true,
				'readonly' => false,
				'required' => array(
					array(
						"{$global_value['prefix']}_fp_testimonial{$i}",
						'=',
						'1'
					)
				)
			);

			$testimonial_fields[] = array(
				'id'              => "{$global_value['prefix']}_fp_testimonial{$i}_name",
				'title'           => sprintf( esc_attr__( 'Testimonial %d Name', 'evolve' ), $i ),
				'type'            => "text",
				'selector'        => ".home-testimonials .item-{$i} .blockquote-footer strong",
				'render_callback' => "{$global_value['prefix']}_fp_testimonial{$i}_name",
				'required'        => array(
					array(
						"{$global_value['prefix']}_fp_testimonial{$i}",
						'=',
						'1'
					)
				)
			);

			$testimonial_fields[] = array(
				'id'              => "{$global_value['prefix']}_fp_testimonial{$i}_content",
				'title'           => sprintf( esc_attr__( 'Testimonial %d Content', 'evolve' ), $i ),
				'type'            => "textarea",
				"rows"            => 5,
				'selector'        => ".home-testimonials .item-{$i} p",
				'render_callback' => "{$global_value['prefix']}_fp_testimonial{$i}_content",
				'required'        => array(
					array(
						"{$global_value['prefix']}_fp_testimonial{$i}",
						'=',
						'1'
					)
				)
			);
		}

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-front-page-testimonials-tab',
				'title'      => esc_attr__( 'Testimonials', 'evolve' ),
				'subsection' => true,
				'fields'     => array(
					array(
						'id'     => 'evl-fp-testimonials-general-start',
						'title'  => esc_attr__( 'General', 'evolve' ),
						'type'   => 'section',
						'indent' => true
					),
					array(
						'id'       => 'evl_testimonials_front_page',
						'title'    => esc_attr__( 'Enable Testimonials On Front Page', 'evolve' ),
						'subtitle' => esc_attr__( 'Check this box if you want to enable Testimonials On Front Page', 'evolve' ),
						'type'     => 'checkbox',
						'default'  => '0'
					),
					array(
						'id'       => 'evl-front-page-subsec-testimonials-element-item',
						'title'    => esc_attr__( 'Items', 'evolve' ),
						'type'     => 'info',
						'selector' => '.home-testimonials .badge',
						'indent'   => true
					),
					$testimonial_fields[0],
					$testimonial_fields[1],
					$testimonial_fields[2],
					$testimonial_fields[3],
					$testimonial_fields[4],
					$testimonial_fields[5],
					$testimonial_fields[6],
					$testimonial_fields[7],
					array(
						'id'        => 'evl_fp_testimonials_bg_color',
						'title'     => esc_attr__( 'Background Color', 'evolve' ),
						'type'      => 'color',
						'default'   => '',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.home-testimonials .carousel',
								'function' => 'css',
								'property' => 'background-color'
							)
						)
					),
					array(
						'id'        => 'evl_fp_testimonials_text_color',
						'title'     => esc_attr__( 'Text Color', 'evolve' ),
						'type'      => 'color',
						'default'   => '#333333',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.home-testimonials blockquote, .home-testimonials blockquote footer',
								'function' => 'css',
								'property' => 'color'
							)
						)
					),
					// Section settings
					array(
						'id'     => 'evl-front-page-subsec-testimonials-section-start',
						'title'  => esc_attr__( 'Section Settings', 'evolve' ),
						'type'   => 'info',
						'indent' => true
					),
					array(
						'id'              => 'evl_testimonials_title',
						'title'           => esc_attr__( 'Title of Testimonials Section', 'evolve' ),
						'type'            => 'text',
						'selector'        => 'h3.testimonials-section-title',
						'render_callback' => 'evl_testimonials_title'
					),
					array(
						'id'          => 'evl_testimonials_title_alignment',
						'title'       => esc_attr__( 'Title Font, Alignment and Color', 'evolve' ),
						'subtitle'    => esc_attr__( 'Select the font, alignment and color of the section title', 'evolve' ),
						'type'        => 'typography',
						'text-align'  => true,
						'line-height' => false,
						'default'     => array(
							'font-size'   => '2.5rem',
							'color'       => '#333333',
							'font-family' => 'Roboto',
							'font-weight' => '300',
							'text-align'  => 'center'
						),
						'transport'   => 'postMessage',
						'js_vars'     => array(
							array(
								'element' => 'h3.testimonials-section-title'
							)
						)
					),
					array(
						'id'        => 'evl_testimonials_section_padding',
						'title'     => esc_attr__( 'Section Padding', 'evolve' ),
						'subtitle'  => esc_attr__( 'Enter the section padding', 'evolve' ),
						'type'      => 'spacing',
						'units'     => array( 'px', 'em' ),
						'default'   => array(
							'padding-top'    => '40px',
							'padding-right'  => '0',
							'padding-bottom' => '40px',
							'padding-left'   => '0',
							'units'          => 'px'
						),
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.home-testimonials',
								'function' => 'css',
								'property' => 'padding'
							)
						)
					),
					array(
						'id'        => 'evl_testimonials_section_background_image',
						'title'     => esc_attr__( 'Section Background Image', 'evolve' ),
						'subtitle'  => esc_attr__( 'Upload a background image for this section, or specify an image URL directly', 'evolve' ),
						'type'      => 'media',
						'url'       => true,
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.home-testimonials',
								'function' => 'css',
								'property' => 'background-image'
							)
						)
					),
					array(
						'id'        => 'evl_testimonials_section_image',
						'title'     => esc_attr__( 'Background Image Responsiveness Style', 'evolve' ),
						'subtitle'  => esc_attr__( 'Select if the section background image should be displayed in cover or contain size', 'evolve' ),
						'type'      => 'select',
						'options'   => array(
							'cover'   => esc_attr__( 'Cover', 'evolve' ),
							'contain' => esc_attr__( 'Contain', 'evolve' ),
							'none'    => esc_attr__( 'None', 'evolve' )
						),
						'default'   => 'cover',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.home-testimonials',
								'function' => 'css',
								'property' => 'background-size'
							)
						)
					),
					array(
						'id'        => 'evl_testimonials_section_image_background_repeat',
						'title'     => esc_attr__( 'Background Repeat', 'evolve' ),
						'type'      => 'select',
						'options'   => array(
							'no-repeat' => esc_attr__( 'no-repeat', 'evolve' ),
							'repeat'    => esc_attr__( 'repeat', 'evolve' ),
							'repeat-x'  => esc_attr__( 'repeat-x', 'evolve' ),
							'repeat-y'  => esc_attr__( 'repeat-y', 'evolve' )
						),
						'default'   => 'no-repeat',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.home-testimonials',
								'function' => 'css',
								'property' => 'background-repeat'
							)
						)
					),
					array(
						'id'        => 'evl_testimonials_section_image_background_position',
						'title'     => esc_attr__( 'Background Position', 'evolve' ),
						'type'      => 'select',
						'options'   => array(
							'center top'    => esc_attr__( 'center top', 'evolve' ),
							'center center' => esc_attr__( 'center center', 'evolve' ),
							'center bottom' => esc_attr__( 'center bottom', 'evolve' ),
							'left top'      => esc_attr__( 'left top', 'evolve' ),
							'left center'   => esc_attr__( 'left center', 'evolve' ),
							'left bottom'   => esc_attr__( 'left bottom', 'evolve' ),
							'right top'     => esc_attr__( 'right top', 'evolve' ),
							'right center'  => esc_attr__( 'right center', 'evolve' ),
							'right bottom'  => esc_attr__( 'right bottom', 'evolve' )
						),
						'default'   => 'center top',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.home-testimonials',
								'function' => 'css',
								'property' => 'background-position'
							)
						)
					),
					array(
						'id'        => 'evl_testimonials_section_back_color',
						'title'     => esc_attr__( 'Section Background Color', 'evolve' ),
						'subtitle'  => esc_attr__( 'Custom background color of section', 'evolve' ),
						'type'      => 'color',
						'default'   => '#efefef',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.home-testimonials',
								'function' => 'css',
								'property' => 'background-color'
							)
						)
					),
					array(
						'id'     => 'evl-front-page-subsec-testimonials-section-end',
						'type'   => 'section',
						'indent' => false
					)
				)
			)
		);

		/*
			-- Counter Circle
			======================================= */

		$counter_circle_fields = array();
		for ( $i = 1; $i <= 3; $i ++ ) {

			$counter_circle_fields[] = array(
				'id'      => "{$global_value['prefix']}_fp_counter_circle{$i}",
				'title'   => sprintf( esc_attr__( 'Enable Counter Circle %d', 'evolve' ), $i ),
				'type'    => 'switch',
				'on'      => esc_attr__( 'Enabled', 'evolve' ),
				'off'     => esc_attr__( 'Disabled', 'evolve' ),
				'default' => 0
			);

			$counter_circle_fields[] = array(
				'id'              => "{$global_value['prefix']}_fp_counter_circle{$i}_icon",
				'title'           => sprintf( esc_attr__( 'Counter Circle %d Icon', 'evolve' ), $i ),
				'subtitle'        => esc_attr__( 'Click an icon to select', 'evolve' ),
				'type'            => 'text',
				'class'           => 'iconpicker-icon',
				'selector'        => ".home-counter-circle .item-{$i} .counter-icon",
				'render_callback' => "{$global_value['prefix']}_fp_counter_circle{$i}_icon",
				'required'        => array(
					array(
						"{$global_value['prefix']}_fp_counter_circle{$i}",
						'=',
						'1'
					)
				)
			);

			$counter_circle_fields[] = array(
				'id'       => "{$global_value['prefix']}_fp_counter_circle{$i}_percentage",
				'title'    => sprintf( esc_attr__( 'Counter Circle %d Percentage', 'evolve' ), $i ),
				'subtitle' => esc_attr__( 'From 1% to 100%', 'evolve' ),
				'type'     => 'slider',
				'min'      => '0',
				'max'      => '100',
				'default'  => '33',
				'required' => array(
					array(
						"{$global_value['prefix']}_fp_counter_circle{$i}",
						'=',
						'1'
					)
				)
			);

			$counter_circle_fields[] = array(
				'id'              => "{$global_value['prefix']}_fp_counter_circle{$i}_text",
				'title'           => sprintf( esc_attr__( 'Counter Circle %d Text', 'evolve' ), $i ),
				'subtitle'        => esc_attr__( 'Insert text for counter circle box, keep it short', 'evolve' ),
				'type'            => 'text',
				'selector'        => ".home-counter-circle .item-{$i} .counter-text-title",
				'render_callback' => "{$global_value['prefix']}_fp_counter_circle{$i}_text",
				'required'        => array(
					array(
						"{$global_value['prefix']}_fp_counter_circle{$i}",
						'=',
						'1'
					)
				)
			);

			$counter_circle_fields[] = array(
				'id'       => "{$global_value['prefix']}_fp_counter_circle{$i}_filledcolor",
				'title'    => sprintf( esc_attr__( 'Counter Circle %d Filled Color', 'evolve' ), $i ),
				'subtitle' => esc_attr__( 'Controls the color of the filled in area', 'evolve' ),
				'type'     => 'color',
				'default'  => '#3e9c91',
				'required' => array(
					array(
						"{$global_value['prefix']}_fp_counter_circle{$i}",
						'=',
						'1'
					)
				)
			);

			$counter_circle_fields[] = array(
				'id'       => "{$global_value['prefix']}_fp_counter_circle{$i}_unfilledcolor",
				'title'    => sprintf( esc_attr__( 'Counter Circle %d Unfilled Color', 'evolve' ), $i ),
				'subtitle' => esc_attr__( 'Controls the color of the unfilled in area', 'evolve' ),
				'type'     => 'color',
				'default'  => '#53cabc',
				'required' => array(
					array(
						"{$global_value['prefix']}_fp_counter_circle{$i}",
						'=',
						'1'
					)
				)
			);
		}

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-front-page-counter-circle-tab',
				'title'      => esc_attr__( 'Counter Circle', 'evolve' ),
				'subsection' => true,
				'fields'     => array(
					array(
						'id'       => 'evl_counter_circle_front_page',
						'title'    => esc_attr__( 'Enable Counter Circles On Front Page', 'evolve' ),
						'subtitle' => esc_attr__( 'Check this box if you want to enable Counter Circles On Front Page', 'evolve' ),
						'type'     => 'checkbox',
						'default'  => '0'
					),
					array(
						'id'       => 'evl-front-page-subsec-counter-circle-element-item',
						'title'    => esc_attr__( 'Items', 'evolve' ),
						'type'     => 'info',
						'selector' => '.home-counter-circle .badge',
						'indent'   => true
					),
					$counter_circle_fields[0],
					$counter_circle_fields[1],
					$counter_circle_fields[2],
					$counter_circle_fields[3],
					$counter_circle_fields[4],
					$counter_circle_fields[5],
					$counter_circle_fields[6],
					$counter_circle_fields[7],
					$counter_circle_fields[8],
					$counter_circle_fields[9],
					$counter_circle_fields[10],
					$counter_circle_fields[11],
					$counter_circle_fields[12],
					$counter_circle_fields[13],
					$counter_circle_fields[14],
					$counter_circle_fields[15],
					$counter_circle_fields[16],
					$counter_circle_fields[17],
					array(
						'id'          => 'evl_counter_circle_title_text',
						'title'       => esc_attr__( 'Counter Circle Text Font', 'evolve' ),
						'subtitle'    => esc_attr__( 'Select the font and color of the counter circle text and icon', 'evolve' ),
						'type'        => 'typography',
						'text-align'  => true,
						'line-height' => false,
						'default'     => array(
							'font-size'   => '1.5rem',
							'color'       => '#ffffff',
							'font-family' => 'Roboto',
							'font-weight' => '300',
						),
						'transport'   => 'postMessage',
						'js_vars'     => array(
							array(
								'element' => '.counter-circle-text, .counter-circle-text h5'
							)
						)
					),
					array(
						'id'     => 'evl-fp-counter-circle-slides-end',
						'type'   => 'section',
						'indent' => false
					),
					// Section settings
					array(
						'id'     => 'evl-front-page-subsec-counter-circle-section-start',
						'title'  => esc_attr__( 'Section Settings', 'evolve' ),
						'type'   => 'info',
						'indent' => true
					),
					array(
						'id'              => 'evl_counter_circle_title',
						'title'           => esc_attr__( 'Title of Counter Circle Section', 'evolve' ),
						'type'            => 'text',
						'selector'        => 'h3.counter-circle-section-title',
						'render_callback' => 'evl_counter_circle_title'
					),
					array(
						'id'          => 'evl_counter_circle_title_alignment',
						'title'       => esc_attr__( 'Title Font, Alignment and Color', 'evolve' ),
						'subtitle'    => esc_attr__( 'Select the font, alignment and color of the section title', 'evolve' ),
						'type'        => 'typography',
						'text-align'  => true,
						'line-height' => false,
						'default'     => array(
							'font-size'   => '2rem',
							'color'       => '#ffffff',
							'font-family' => 'Roboto',
							'font-weight' => '500',
							'text-align'  => 'center'
						),
						'transport'   => 'postMessage',
						'js_vars'     => array(
							array(
								'element' => 'h3.counter-circle-section-title'
							)
						)
					),
					array(
						'id'        => 'evl_counter_circle_section_padding',
						'title'     => esc_attr__( 'Section Padding', 'evolve' ),
						'subtitle'  => esc_attr__( 'Enter the section padding', 'evolve' ),
						'type'      => 'spacing',
						'units'     => array( 'px', 'em' ),
						'default'   => array(
							'padding-top'    => '40px',
							'padding-right'  => '0',
							'padding-bottom' => '40px',
							'padding-left'   => '0',
							'units'          => 'px'
						),
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.home-counter-circle',
								'function' => 'css',
								'property' => 'padding'
							)
						)
					),
					array(
						'id'        => 'evl_counter_circle_section_background_image',
						'title'     => esc_attr__( 'Section Background Image', 'evolve' ),
						'subtitle'  => esc_attr__( 'Upload a background image for this section, or specify an image URL directly', 'evolve' ),
						'type'      => 'media',
						'url'       => true,
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.home-counter-circle',
								'function' => 'css',
								'property' => 'background-image'
							)
						)
					),
					array(
						'id'        => 'evl_counter_circle_section_image',
						'title'     => esc_attr__( 'Background Image Responsiveness Style', 'evolve' ),
						'subtitle'  => esc_attr__( 'Select if the section background image should be displayed in cover or contain size', 'evolve' ),
						'type'      => 'select',
						'options'   => array(
							'cover'   => esc_attr__( 'Cover', 'evolve' ),
							'contain' => esc_attr__( 'Contain', 'evolve' ),
							'none'    => esc_attr__( 'None', 'evolve' )
						),
						'default'   => 'cover',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.home-counter-circle',
								'function' => 'css',
								'property' => 'background-size'
							)
						)
					),
					array(
						'id'        => 'evl_counter_circle_section_image_background_repeat',
						'title'     => esc_attr__( 'Background Repeat', 'evolve' ),
						'type'      => 'select',
						'options'   => array(
							'no-repeat' => esc_attr__( 'no-repeat', 'evolve' ),
							'repeat'    => esc_attr__( 'repeat', 'evolve' ),
							'repeat-x'  => esc_attr__( 'repeat-x', 'evolve' ),
							'repeat-y'  => esc_attr__( 'repeat-y', 'evolve' )
						),
						'default'   => 'no-repeat',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.home-counter-circle',
								'function' => 'css',
								'property' => 'background-repeat'
							)
						)
					),
					array(
						'id'        => 'evl_counter_circle_section_image_background_position',
						'title'     => esc_attr__( 'Background Position', 'evolve' ),
						'type'      => 'select',
						'options'   => array(
							'center top'    => esc_attr__( 'center top', 'evolve' ),
							'center center' => esc_attr__( 'center center', 'evolve' ),
							'center bottom' => esc_attr__( 'center bottom', 'evolve' ),
							'left top'      => esc_attr__( 'left top', 'evolve' ),
							'left center'   => esc_attr__( 'left center', 'evolve' ),
							'left bottom'   => esc_attr__( 'left bottom', 'evolve' ),
							'right top'     => esc_attr__( 'right top', 'evolve' ),
							'right center'  => esc_attr__( 'right center', 'evolve' ),
							'right bottom'  => esc_attr__( 'right bottom', 'evolve' )
						),
						'default'   => 'center top',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.home-counter-circle',
								'function' => 'css',
								'property' => 'background-position'
							)
						)
					),
					array(
						'id'        => 'evl_counter_circle_section_back_color',
						'title'     => esc_attr__( 'Section Background Color', 'evolve' ),
						'subtitle'  => esc_attr__( 'Custom background color of section', 'evolve' ),
						'type'      => 'color',
						'default'   => '#41d6c2',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.home-counter-circle',
								'function' => 'css',
								'property' => 'background-color'
							)
						)
					),
					array(
						'id'     => 'evl-front-page-subsec-counter-circle-section-end',
						'type'   => 'section',
						'indent' => false
					)
				)
			)
		);

		/*
			-- WooCommerce Products
			======================================= */

		if ( class_exists( 'Woocommerce' ) ) :
			evolve_Kirki::setSection( $global_value['opt_name'], array(
					'id'         => 'evl-fp-woo-product-general-tab',
					'title'      => esc_attr__( 'WooCommerce Products', 'evolve' ),
					'subsection' => true,
					'fields'     => array(
						array(
							'id'       => 'evl_fp_woo_product',
							'title'    => esc_attr__( 'Product Categories', 'evolve' ),
							'subtitle' => esc_attr__( 'Please select a category which contains some products', 'evolve' ),
							'type'     => 'select',
							'multi'    => 1,
							'options'  => $global_value['product_taxonomy'],
						),
						array(
							'id'       => 'evl_fp_woo_product_number',
							'title'    => esc_attr__( 'Number Of Products To Display', 'evolve' ),
							'subtitle' => esc_attr__( 'Select the number of Products To Display', 'evolve' ),
							'type'     => 'select',
							'options'  => evolve_woocommerce_product_number( 36, true, true ),
							'default'  => '4'
						),
						// Section settings
						array(
							'id'     => 'evl-front-page-subsec-woo-product-section-start',
							'title'  => esc_attr__( 'Section Settings', 'evolve' ),
							'type'   => 'info',
							'indent' => true
						),
						array(
							'id'              => 'evl_woo_product_title',
							'title'           => esc_attr__( 'Title of WooCommerce Product Section', 'evolve' ),
							'type'            => 'text',
							'selector'        => 'h3.woo-product-section-title',
							'render_callback' => 'evl_woo_product_title'
						),
						array(
							'id'          => 'evl_woo_product_title_alignment',
							'title'       => esc_attr__( 'Title Font, Alignment and Color', 'evolve' ),
							'subtitle'    => esc_attr__( 'Select the font, alignment and color of the section title', 'evolve' ),
							'type'        => 'typography',
							'text-align'  => true,
							'line-height' => false,
							'default'     => array(
								'font-size'   => '1.9rem',
								'color'       => '#333333',
								'font-family' => 'Roboto',
								'font-weight' => '700',
								'text-align'  => 'center'
							),
							'transport'   => 'postMessage',
							'js_vars'     => array(
								array(
									'element' => 'h3.woo-product-section-title'
								)
							)
						),
						array(
							'id'        => 'evl_woo_product_section_padding',
							'title'     => esc_attr__( 'Section Padding', 'evolve' ),
							'subtitle'  => esc_attr__( 'Enter the section padding', 'evolve' ),
							'type'      => 'spacing',
							'units'     => array( 'px', 'em' ),
							'default'   => array(
								'padding-top'    => '40px',
								'padding-right'  => '0',
								'padding-bottom' => '40px',
								'padding-left'   => '0',
								'units'          => 'px'
							),
							'transport' => 'postMessage',
							'js_vars'   => array(
								array(
									'element'  => '.home-woo-product',
									'function' => 'css',
									'property' => 'padding'
								)
							)
						),
						array(
							'id'        => 'evl_woo_product_section_background_image',
							'title'     => esc_attr__( 'Section Background Image', 'evolve' ),
							'subtitle'  => esc_attr__( 'Upload a background image for this section, or specify an image URL directly', 'evolve' ),
							'type'      => 'media',
							'url'       => true,
							'transport' => 'postMessage',
							'js_vars'   => array(
								array(
									'element'  => '.home-woo-product',
									'function' => 'css',
									'property' => 'background-image'
								)
							)
						),
						array(
							'id'        => 'evl_woo_product_section_image',
							'title'     => esc_attr__( 'Background Image Responsiveness Style', 'evolve' ),
							'subtitle'  => esc_attr__( 'Select if the section background image should be displayed in cover or contain size', 'evolve' ),
							'type'      => 'select',
							'options'   => array(
								'cover'   => esc_attr__( 'Cover', 'evolve' ),
								'contain' => esc_attr__( 'Contain', 'evolve' ),
								'none'    => esc_attr__( 'None', 'evolve' )
							),
							'default'   => 'cover',
							'transport' => 'postMessage',
							'js_vars'   => array(
								array(
									'element'  => '.home-woo-product',
									'function' => 'css',
									'property' => 'background-size'
								)
							)
						),
						array(
							'id'        => 'evl_woo_product_section_image_background_repeat',
							'title'     => esc_attr__( 'Background Repeat', 'evolve' ),
							'type'      => 'select',
							'options'   => array(
								'no-repeat' => esc_attr__( 'no-repeat', 'evolve' ),
								'repeat'    => esc_attr__( 'repeat', 'evolve' ),
								'repeat-x'  => esc_attr__( 'repeat-x', 'evolve' ),
								'repeat-y'  => esc_attr__( 'repeat-y', 'evolve' )
							),
							'default'   => 'no-repeat',
							'transport' => 'postMessage',
							'js_vars'   => array(
								array(
									'element'  => '.home-woo-product',
									'function' => 'css',
									'property' => 'background-repeat'
								)
							)
						),
						array(
							'id'        => 'evl_woo_product_section_image_background_position',
							'title'     => esc_attr__( 'Background Position', 'evolve' ),
							'type'      => 'select',
							'options'   => array(
								'center top'    => esc_attr__( 'center top', 'evolve' ),
								'center center' => esc_attr__( 'center center', 'evolve' ),
								'center bottom' => esc_attr__( 'center bottom', 'evolve' ),
								'left top'      => esc_attr__( 'left top', 'evolve' ),
								'left center'   => esc_attr__( 'left center', 'evolve' ),
								'left bottom'   => esc_attr__( 'left bottom', 'evolve' ),
								'right top'     => esc_attr__( 'right top', 'evolve' ),
								'right center'  => esc_attr__( 'right center', 'evolve' ),
								'right bottom'  => esc_attr__( 'right bottom', 'evolve' )
							),
							'default'   => 'center top',
							'transport' => 'postMessage',
							'js_vars'   => array(
								array(
									'element'  => '.home-woo-product',
									'function' => 'css',
									'property' => 'background-position'
								)
							)
						),
						array(
							'id'        => 'evl_woo_product_section_back_color',
							'title'     => esc_attr__( 'Section Background Color', 'evolve' ),
							'subtitle'  => esc_attr__( 'Custom background color of section', 'evolve' ),
							'type'      => 'color',
							'default'   => '#fafafa',
							'transport' => 'postMessage',
							'js_vars'   => array(
								array(
									'element'  => '.home-woo-product',
									'function' => 'css',
									'property' => 'background-color'
								)
							)
						),
						array(
							'id'     => 'evl-front-page-subsec-woo-product-section-end',
							'type'   => 'section',
							'indent' => false
						)
					)
				)
			);

		endif;

		/*
			-- Custom Content
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-fp-custom-content-general-tab',
				'title'      => esc_attr__( 'Custom Content', 'evolve' ),
				'subsection' => true,
				'fields'     => array(
					array(
						'id'       => 'evl_custom_content_front_page',
						'title'    => esc_attr__( 'Enable Custom Content On Front Page', 'evolve' ),
						'subtitle' => esc_attr__( 'Check this box if you want to enable Custom Content On Front Page', 'evolve' ),
						'type'     => 'checkbox',
						'default'  => '0'
					),
					array(
						'id'       => 'evl-front-page-subsec-custom-content-element',
						'title'    => esc_attr__( 'Custom Content Element', 'evolve' ),
						'type'     => 'info',
						'selector' => '.home-custom-content .badge',
						'indent'   => true
					),
					array(
						'id'              => 'evl_fp_custom_content_editor',
						'title'           => esc_attr__( 'Custom Content', 'evolve' ),
						'subtitle'        => esc_attr__( 'Add Custom Content to Front Page', 'evolve' ),
						'type'            => 'editor',
						'selector'        => '.home-custom-content .custom-content-wrapper',
						'render_callback' => 'evl_fp_custom_content_editor'
					),
					// Section settings
					array(
						'id'     => 'evl-front-page-subsec-custom-content-section-start',
						'title'  => esc_attr__( 'Section Settings', 'evolve' ),
						'type'   => 'info',
						'indent' => true
					),
					array(
						'id'              => 'evl_custom_content_title',
						'title'           => esc_attr__( 'Title of Custom Content Section', 'evolve' ),
						'type'            => 'text',
						'selector'        => 'h3.custom-content-section-title',
						'render_callback' => 'evl_custom_content_title'
					),
					array(
						'id'          => 'evl_custom_content_title_alignment',
						'title'       => esc_attr__( 'Title Font, Alignment and Color', 'evolve' ),
						'subtitle'    => esc_attr__( 'Select the font, alignment and color of the section title', 'evolve' ),
						'type'        => 'typography',
						'text-align'  => true,
						'line-height' => false,
						'default'     => array(
							'font-size'   => '1.9rem',
							'color'       => '#333333',
							'font-family' => 'Roboto',
							'font-weight' => '500',
							'text-align'  => 'center'
						),
						'transport'   => 'postMessage',
						'js_vars'     => array(
							array(
								'element' => 'h3.custom-content-section-title'
							)
						)
					),
					array(
						'id'        => 'evl_custom_content_section_padding',
						'title'     => esc_attr__( 'Section Padding', 'evolve' ),
						'subtitle'  => esc_attr__( 'Enter the section padding', 'evolve' ),
						'type'      => 'spacing',
						'units'     => array( 'px', 'em' ),
						'default'   => array(
							'padding-top'    => '40px',
							'padding-right'  => '0',
							'padding-bottom' => '40px',
							'padding-left'   => '0',
							'units'          => 'px'
						),
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.home-custom-content',
								'function' => 'css',
								'property' => 'padding'
							)
						)
					),
					array(
						'id'        => 'evl_custom_content_section_background_image',
						'title'     => esc_attr__( 'Section Background Image', 'evolve' ),
						'subtitle'  => esc_attr__( 'Upload a background image for this section, or specify an image URL directly', 'evolve' ),
						'type'      => 'media',
						'url'       => true,
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.home-custom-content',
								'function' => 'css',
								'property' => 'background-image'
							)
						)
					),
					array(
						'id'        => 'evl_custom_content_section_image',
						'title'     => esc_attr__( 'Background Image Responsiveness Style', 'evolve' ),
						'subtitle'  => esc_attr__( 'Select if the section background image should be displayed in cover or contain size', 'evolve' ),
						'type'      => 'select',
						'options'   => array(
							'cover'   => esc_attr__( 'Cover', 'evolve' ),
							'contain' => esc_attr__( 'Contain', 'evolve' ),
							'none'    => esc_attr__( 'None', 'evolve' )
						),
						'default'   => 'cover',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.home-custom-content',
								'function' => 'css',
								'property' => 'background-size'
							)
						)
					),
					array(
						'id'        => 'evl_custom_content_section_image_background_repeat',
						'title'     => esc_attr__( 'Background Repeat', 'evolve' ),
						'type'      => 'select',
						'options'   => array(
							'no-repeat' => esc_attr__( 'no-repeat', 'evolve' ),
							'repeat'    => esc_attr__( 'repeat', 'evolve' ),
							'repeat-x'  => esc_attr__( 'repeat-x', 'evolve' ),
							'repeat-y'  => esc_attr__( 'repeat-y', 'evolve' )
						),
						'default'   => 'no-repeat',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.home-custom-content',
								'function' => 'css',
								'property' => 'background-repeat'
							)
						)
					),
					array(
						'id'        => 'evl_custom_content_section_image_background_position',
						'title'     => esc_attr__( 'Background Position', 'evolve' ),
						'type'      => 'select',
						'options'   => array(
							'center top'    => esc_attr__( 'center top', 'evolve' ),
							'center center' => esc_attr__( 'center center', 'evolve' ),
							'center bottom' => esc_attr__( 'center bottom', 'evolve' ),
							'left top'      => esc_attr__( 'left top', 'evolve' ),
							'left center'   => esc_attr__( 'left center', 'evolve' ),
							'left bottom'   => esc_attr__( 'left bottom', 'evolve' ),
							'right top'     => esc_attr__( 'right top', 'evolve' ),
							'right center'  => esc_attr__( 'right center', 'evolve' ),
							'right bottom'  => esc_attr__( 'right bottom', 'evolve' )
						),
						'default'   => 'center top',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.home-custom-content',
								'function' => 'css',
								'property' => 'background-position'
							)
						)
					),
					array(
						'id'        => 'evl_custom_content_section_back_color',
						'title'     => esc_attr__( 'Section Background Color', 'evolve' ),
						'subtitle'  => esc_attr__( 'Custom background color of section', 'evolve' ),
						'type'      => 'color',
						'default'   => '#93f2d7',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.home-custom-content',
								'function' => 'css',
								'property' => 'background-color'
							)
						)
					),
					array(
						'id'     => 'evl-front-page-subsec-custom-content-section-end',
						'type'   => 'section',
						'indent' => false
					)
				)
			)
		);

		/*
			Header
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'      => 'evl-header-main-tab',
				'title'   => esc_attr__( 'Header', 'evolve' ),
				'iconfix' => 'evolve-icon evolve-icon-header'
			)
		);

		/*
			-- Header
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-header-subsec-header-tab',
				'title'      => esc_attr__( 'Header', 'evolve' ),
				'subsection' => true,
				'fields'     => array(
					array(
						'id'        => 'evl_header_padding',
						'title'     => esc_attr__( 'Header Padding', 'evolve' ),
						'subtitle'  => esc_attr__( 'Enter the header padding', 'evolve' ),
						'type'      => 'spacing',
						'units'     => array( 'px', 'em' ),
						'default'   => array(
							'padding-top'    => '25px',
							'padding-right'  => '30px',
							'padding-bottom' => '25px',
							'padding-left'   => '30px',
							'units'          => 'px'
						),
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.header',
								'property' => 'padding',
								'choice'   => 'top'
							),
							array(
								'element'  => '.header',
								'property' => 'padding',
								'choice'   => 'bottom'
							),
							array(
								'element'  => '.header.container',
								'property' => 'padding',
								'choice'   => 'left'
							),
							array(
								'element'  => '.header.container',
								'property' => 'padding',
								'choice'   => 'right'
							)
						)
					),
					array(
						'id'              => 'evl_searchbox',
						'title'           => esc_attr__( 'Enable Searchbox', 'evolve' ),
						'subtitle'        => esc_attr__( 'Check this box if you want to display searchbox in the Header', 'evolve' ),
						'type'            => 'switch',
						'on'              => esc_attr__( 'Enabled', 'evolve' ),
						'off'             => esc_attr__( 'Disabled', 'evolve' ),
						'default'         => 1,
						'selector'        => '.header-wrapper .header-search',
						'render_callback' => 'evl_searchbox'
					),
					array(
						'id'       => 'evl_slider_position',
						'title'    => esc_attr__( 'General Slider Position', 'evolve' ),
						'subtitle' => esc_attr__( 'Select if the slider shows below or above the header. This only works for the slider assigned in Post/Page Options, not in Front Page. This option can be overridden per post/page setting', 'evolve' ),
						'type'     => 'select',
						'options'  => array(
							'below' => esc_attr__( 'Below Header', 'evolve' ),
							'above' => esc_attr__( 'Above Header', 'evolve' )
						),
						'default'  => 'below'
					),
					array(
						'id'       => 'evl_header_type',
						'title'    => esc_attr__( 'Choose Header Type', 'evolve' ),
						'subtitle' => esc_attr__( 'Choose your Header Type', 'evolve' ),
						'type'     => 'image_select',
						'options'  => array(
							'none' => $global_value['customizer_images'] . 'h0.jpg',
							'h1'   => $global_value['customizer_images'] . 'h1.jpg'
						),
						'default'  => 'none'
					)
				)
			)
		);

		/*
			-- Sticky Header
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-header-subsec-sticky-header-tab',
				'title'      => esc_attr__( 'Sticky Header', 'evolve' ),
				'subsection' => true,
				'fields'     => array(
					array(
						'id'              => 'evl_sticky_header',
						'title'           => esc_attr__( 'Enable Sticky Header', 'evolve' ),
						'subtitle'        => esc_attr__( 'Check this box if you want to display Sticky Header', 'evolve' ),
						'type'            => 'switch',
						'on'              => esc_attr__( 'Enabled', 'evolve' ),
						'off'             => esc_attr__( 'Disabled', 'evolve' ),
						'default'         => 1,
						'selector'        => '.sticky-header .container',
						'render_callback' => 'evl_sticky_header'
					),
					array(
						'id'              => 'evl_searchbox_sticky_header',
						'title'           => esc_attr__( 'Enable Searchbox', 'evolve' ),
						'subtitle'        => esc_attr__( 'Check this box if you want to display searchbox in the Sticky Header', 'evolve' ),
						'type'            => 'switch',
						'on'              => esc_attr__( 'Enabled', 'evolve' ),
						'off'             => esc_attr__( 'Disabled', 'evolve' ),
						'default'         => 1,
						'selector'        => '.sticky-header .header-search',
						'render_callback' => 'evl_searchbox_sticky_header',
						'required'        => array(
							array( 'evl_sticky_header', '=', '1' )
						)
					)
				)
			)
		);

		/*
			-- Logo
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-header-subsec-logo-tab',
				'title'      => esc_attr__( 'Logo', 'evolve' ),
				'subsection' => true,
				'fields'     => array(
					array(
						'id'              => 'evl_header_logo',
						'title'           => esc_attr__( 'Custom Logo', 'evolve' ),
						'subtitle'        => esc_attr__( 'Upload a logo for your website, or specify an image URL directly', 'evolve' ),
						'type'            => 'media',
						'url'             => true,
						'selector'        => '.header-logo-container',
						'render_callback' => 'evl_header_logo',
					),
					array(
						'id'       => 'evl_pos_logo',
						'title'    => esc_attr__( 'Logo Position', 'evolve' ),
						'subtitle' => esc_attr__( 'Choose the position of your Custom Logo for Header #1', 'evolve' ),
						'type'     => 'select',
						'options'  => array(
							'left'    => esc_attr__( 'Left', 'evolve' ),
							'center'  => esc_attr__( 'Center', 'evolve' ),
							'right'   => esc_attr__( 'Right', 'evolve' ),
							'disable' => esc_attr__( 'Disabled', 'evolve' )
						),
						'default'  => 'left'
					)
				)
			)
		);

		/*
			-- Website Title & Tagline
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-header-subsec-title-tagline-tab',
				'title'      => esc_attr__( 'Website Title & Tagline', 'evolve' ),
				'subsection' => true,
				'fields'     => array(
					array(
						'id'       => 'evl_blog_title',
						'title'    => esc_attr__( 'Disable Website Title', 'evolve' ),
						'subtitle' => esc_attr__( 'Check this box if you don\'t want to display title of your website', 'evolve' ),
						'type'     => 'checkbox',
						'default'  => '0'
					),
					array(
						'id'       => 'evl_tagline_pos',
						'title'    => esc_attr__( 'Website Tagline Position', 'evolve' ),
						'subtitle' => esc_attr__( 'Choose the position of website tagline', 'evolve' ),
						'type'     => 'select',
						'options'  => array(
							'next'    => esc_attr__( 'Next to Website Title', 'evolve' ),
							'above'   => esc_attr__( 'Above Website Title', 'evolve' ),
							'under'   => esc_attr__( 'Under Website Title', 'evolve' ),
							'disable' => esc_attr__( 'Disabled', 'evolve' )
						),
						'default'  => 'disable'
					)
				)
			)
		);

		/*
			-- Menu
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-header-subsec-menu-tab',
				'title'      => esc_attr__( 'Menu', 'evolve' ),
				'subsection' => true,
				'fields'     => array(
					array(
						'id'       => 'evl_main_menu',
						'title'    => esc_attr__( 'Disable Main Menu', 'evolve' ),
						'subtitle' => esc_attr__( 'Check this box if you don\'t want to display main menu', 'evolve' ),
						'type'     => 'checkbox'
					),
					array(
						'id'       => 'evl_main_menu_hover_effect',
						'title'    => esc_attr__( 'Menu Item Hover Effect', 'evolve' ),
						'subtitle' => esc_attr__( 'Select the main menu hover effect', 'evolve' ),
						'type'     => 'select',
						'options'  => array(
							'rollover' => esc_attr__( 'Rollover', 'evolve' ),
							'disable'  => esc_attr__( 'Disabled', 'evolve' )
						),
						'default'  => 'rollover',
						'required' => array(
							array( 'evl_main_menu', '=', '0' )
						)
					),
					array(
						'id'        => 'evl_main_menu_padding',
						'title'     => esc_attr__( 'Padding Between Menu Items', 'evolve' ),
						'subtitle'  => esc_attr__( 'Padding between menu items in px', 'evolve' ),
						'type'      => 'slider',
						'min'       => '0',
						'max'       => '20',
						'default'   => '8',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'       => '.navbar-nav > li',
								'property'      => 'padding-left',
								'value_pattern' => '$' . 'px',
							),
							array(
								'element'       => '.navbar-nav > li',
								'property'      => 'padding',
								'value_pattern' => '0 ' . '$' . 'px',
							)
						),
						'required'  => array(
							array( 'evl_main_menu', '=', '0' )
						)
					),
					array(
						'id'        => 'evl_main_menu_height',
						'title'     => esc_attr__( 'Main Menu Height', 'evolve' ),
						'subtitle'  => esc_attr__( 'Select the main menu height', 'evolve' ),
						'type'      => 'slider',
						'min'       => '0',
						'max'       => '30',
						'steps'     => '1',
						'default'   => '8',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'       => '.header-wrapper .main-menu',
								'property'      => 'padding',
								'value_pattern' => '$' . 'px' . ' 0',
							)
						),
						'required'  => array(
							array( 'evl_main_menu', '=', '0' )
						)
					),
					array(
						'id'       => 'evl_responsive_menu_layout',
						'title'    => esc_attr__( 'Responsive Menu Layout', 'evolve' ),
						'subtitle' => esc_attr__( 'Choose the layout of responsive menu on smaller screen sizes', 'evolve' ),
						'type'     => 'select',
						'options'  => array(
							'basic'    => esc_attr__( 'Closed Submenu Items', 'evolve' ),
							'dropdown' => esc_attr__( 'Open Submenu Items', 'evolve' )
						),
						'default'  => 'dropdown',
						'required' => array(
							array( 'evl_main_menu', '=', '0' )
						)
					)
				)
			)
		);

		/*
			-- Header Widgets
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-header-subsec-header-widgets-tab',
				'title'      => esc_attr__( 'Header Widgets', 'evolve' ),
				'subsection' => true,
				'fields'     => array(
					array(
						'id'       => 'evl_widgets_header',
						'title'    => esc_attr__( 'Number of Widget Cols in The Header Block', 'evolve' ),
						'subtitle' => esc_attr__( 'Select how many header widget areas you want to display in Header Block', 'evolve' ),
						'type'     => 'image_select',
						'options'  => array(
							'disable' => $global_value['customizer_images'] . '1c.png',
							'one'     => $global_value['customizer_images'] . 'header-widgets-1.png',
							'two'     => $global_value['customizer_images'] . 'header-widgets-2.png',
							'three'   => $global_value['customizer_images'] . 'header-widgets-3.png',
							'four'    => $global_value['customizer_images'] . 'header-widgets-4.png'
						),
						'default'  => 'disable'
					),
					array(
						'id'       => 'evl_header_widgets_placement',
						'title'    => esc_attr__( 'Header Widgets Placement', 'evolve' ),
						'subtitle' => esc_attr__( 'Choose where to display header widgets', 'evolve' ),
						'type'     => 'select',
						'options'  => array(
							'home'   => esc_attr__( 'Front Page', 'evolve' ),
							'single' => esc_attr__( 'Single Post', 'evolve' ),
							'page'   => esc_attr__( 'Only Pages', 'evolve' ),
							'all'    => esc_attr__( 'All Website', 'evolve' ),
							'custom' => esc_attr__( 'Select Per Post/Page Options', 'evolve' )
						),
						'default'  => 'home'
					)
				)
			)
		);

		/*
			Footer
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'      => 'evl-footer-main-tab',
				'title'   => esc_attr__( 'Footer', 'evolve' ),
				'iconfix' => 'evolve-icon evolve-icon-footer'
			)
		);

		/*
			-- Footer Widgets
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-footer-subsec-footer-widgets-tab',
				'title'      => esc_attr__( 'Footer Widgets', 'evolve' ),
				'subsection' => true,
				'fields'     => array(
					array(
						'id'       => 'evl_widgets_num',
						'title'    => esc_attr__( 'Number of Widget Cols in Footer', 'evolve' ),
						'subtitle' => esc_attr__( 'Select how many footer widget areas you want to display', 'evolve' ),
						'type'     => 'image_select',
						'options'  => array(
							'disable' => $global_value['customizer_images'] . '1c.png',
							'one'     => $global_value['customizer_images'] . 'footer-widgets-1.png',
							'two'     => $global_value['customizer_images'] . 'footer-widgets-2.png',
							'three'   => $global_value['customizer_images'] . 'footer-widgets-3.png',
							'four'    => $global_value['customizer_images'] . 'footer-widgets-4.png'
						),
						'default'  => 'disable'
					)
				)
			)
		);

		/*
			-- Custom Footer
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-footer-subsec-custom-footer-tab',
				'title'      => esc_attr__( 'Custom Footer', 'evolve' ),
				'subsection' => true,
				'fields'     => array(
					array(
						'id'              => 'evl_footer_content',
						'title'           => esc_attr__( 'Custom Footer', 'evolve' ),
						'subtitle'        => sprintf( esc_attr__( 'Available %1$sHTML%2$s tags and attributes: %3$s Default: %4$s<div id="copyright"><a href="%5$s">evolve</a> theme by Theme4Press - Powered by <a href="http://wordpress.org">WordPress</a></div>%6$s', 'evolve' ), '<strong>', '</strong>', '<br /><br /> <code> &lt;b&gt; &lt;i&gt; &lt;a href="" title=""&gt; &lt;blockquote&gt; &lt;del datetime=""&gt; <br /> &lt;ins datetime=""&gt; &lt;img src="" alt="" /&gt; &lt;ul&gt; &lt;ol&gt; &lt;li&gt; <br /> &lt;code&gt; &lt;em&gt; &lt;strong&gt; &lt;div&gt; &lt;span&gt; &lt;h1&gt; &lt;h2&gt; &lt;h3&gt; &lt;h4&gt; &lt;h5&gt; &lt;h6&gt; <br /> &lt;table&gt; &lt;tbody&gt; &lt;tr&gt; &lt;td&gt; &lt;br /&gt; &lt;hr /&gt;</code><br /><br />', '<code>', $global_value['home_url'] . 'evolve-multipurpose-wordpress-theme/', '</code>' ),
						'type'            => 'textarea',
						'default'         => sprintf( '<div id="copyright"><a href="%s">evolve</a> theme by Theme4Press - Powered by <a href="http://wordpress.org">WordPress</a></div>', $global_value['home_url'] . 'evolve-multipurpose-wordpress-theme/' ),
						'selector'        => '.custom-footer',
						'render_callback' => 'evl_footer_content'
					)
				)
			)
		);

		/*
			Typography
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'      => 'evl-typography-main-tab',
				'title'   => esc_attr__( 'Typography', 'evolve' ),
				'iconfix' => 'evolve-icon evolve-icon-typography'
			)
		);

		/*
			-- Website Body
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-typography-subsec-body-tab',
				'title'      => esc_attr__( 'Website Body', 'evolve' ),
				'subsection' => true,
				'fields'     => array(
					array(
						'id'          => 'evl_body_font',
						'title'       => esc_attr__( 'Website Body Font', 'evolve' ),
						'subtitle'    => esc_attr__( 'Select the typography you want for your Website Body', 'evolve' ),
						'type'        => 'typography',
						'text-align'  => false,
						'line-height' => false,
						'default'     => array(
							'font-size'   => '1rem',
							'color'       => '#212529',
							'font-family' => 'Roboto',
							'font-weight' => '300'
						),
						'transport'   => 'postMessage',
						'js_vars'     => array(
							array(
								'element' => 'body'
							)
						)
					)
				)
			)
		);

		/*
			-- Website Title & Tagline
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-typography-subsec-title-tagline-tab',
				'title'      => esc_attr__( 'Website Title & Tagline', 'evolve' ),
				'subsection' => true,
				'fields'     => array(
					array(
						'id'          => 'evl_title_font',
						'title'       => esc_attr__( 'Website Title Font', 'evolve' ),
						'subtitle'    => esc_attr__( 'Select the typography you want for your Website Title', 'evolve' ),
						'type'        => 'typography',
						'text-align'  => false,
						'line-height' => false,
						'default'     => array(
							'font-size'   => '2.4rem',
							'color'       => '#ffffff',
							'font-family' => 'Roboto',
							'font-weight' => '500'
						),
						'transport'   => 'postMessage',
						'js_vars'     => array(
							array(
								'element' => '#website-title a'
							)
						)
					),
					array(
						'id'          => 'evl_tagline_font',
						'title'       => esc_attr__( 'Website Tagline Font', 'evolve' ),
						'subtitle'    => esc_attr__( 'Select the typography you want for your Website Tagline', 'evolve' ),
						'type'        => 'typography',
						'text-align'  => false,
						'line-height' => false,
						'default'     => array(
							'font-size'   => '.8rem',
							'color'       => '#aaaaaa',
							'font-family' => 'Roboto',
							'font-weight' => '300'
						),
						'transport'   => 'postMessage',
						'js_vars'     => array(
							array(
								'element' => '#tagline'
							)
						)
					),
					array(
						'id'          => 'evl_menu_blog_title_font',
						'title'       => esc_attr__( 'Sticky Header Website Title Font', 'evolve' ),
						'subtitle'    => esc_attr__( 'Select the typography you want for your Sticky Header Website Title', 'evolve' ),
						'type'        => 'typography',
						'text-align'  => false,
						'line-height' => false,
						'default'     => array(
							'font-size'   => '1.6rem',
							'color'       => '#ffffff',
							'font-family' => 'Roboto',
							'font-weight' => '500'
						),
						'transport'   => 'postMessage',
						'js_vars'     => array(
							array(
								'element' => '#sticky-title'
							)
						)
					)
				)
			)
		);

		/*
			-- Menu
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-typography-subsec-menu-tab',
				'title'      => esc_attr__( 'Menu', 'evolve' ),
				'subsection' => true,
				'fields'     => array(
					array(
						'id'          => 'evl_menu_font',
						'title'       => esc_attr__( 'Main Menu Font', 'evolve' ),
						'subtitle'    => esc_attr__( 'Select the typography you want for your Main Menu', 'evolve' ),
						'type'        => 'typography',
						'text-align'  => false,
						'line-height' => false,
						'default'     => array(
							'font-size'   => '.9rem',
							'color'       => '#999999',
							'font-family' => 'Roboto',
							'font-weight' => '300'
						),
						'transport'   => 'postMessage',
						'js_vars'     => array(
							array(
								'element' => '.navbar-nav .nav-link, .navbar-nav .dropdown-item, .menu-header, .sticky-header, .navbar-toggler'
							)
						)
					)
				)
			)
		);

		/*
			-- Widget
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-typography-subsec-widget-tab',
				'title'      => esc_attr__( 'Widget', 'evolve' ),
				'subsection' => true,
				'fields'     => array(
					array(
						'id'          => 'evl_widget_title_font',
						'title'       => esc_attr__( 'Widget Title Font', 'evolve' ),
						'subtitle'    => esc_attr__( 'Select the typography you want for your Widget Title', 'evolve' ),
						'type'        => 'typography',
						'text-align'  => false,
						'line-height' => false,
						'default'     => array(
							'font-size'   => '1.2rem',
							'color'       => '#51545c',
							'font-family' => 'Roboto',
							'font-weight' => '700'
						),
						'transport'   => 'postMessage',
						'js_vars'     => array(
							array(
								'element' => '.widget-title, .widget-title a.rsswidget'
							)
						)
					),
					array(
						'id'          => 'evl_widget_content_font',
						'title'       => esc_attr__( 'Widget Content Font', 'evolve' ),
						'subtitle'    => esc_attr__( 'Select the typography you want for your Widget Content', 'evolve' ),
						'type'        => 'typography',
						'text-align'  => false,
						'line-height' => false,
						'default'     => array(
							'font-size'   => '.9rem',
							'font-family' => 'Roboto',
							'color'       => '#51545c',
							'font-weight' => '300'
						),
						'transport'   => 'postMessage',
						'js_vars'     => array(
							array(
								'element' => '.widget-content, .aside, .aside a, .widget-content, .widget-content a, .widget-content .tab-holder .news-list li .post-holder a, .widget-content .tab-holder .news-list li .post-holder .meta'
							)
						)
					)
				)
			)
		);

		/*
			-- Post/Page Title & Content
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-typography-subsec-post-tab',
				'title'      => esc_attr__( 'Post/Page Title & Content', 'evolve' ),
				'subsection' => true,
				'fields'     => array(
					array(
						'id'          => 'evl_post_font',
						'title'       => esc_attr__( 'Post/Page Title Font', 'evolve' ),
						'subtitle'    => esc_attr__( 'Select the typography you want for your Post/Page Title', 'evolve' ),
						'type'        => 'typography',
						'text-align'  => false,
						'line-height' => false,
						'default'     => array(
							'font-size'   => '2rem',
							'color'       => '#51545C',
							'font-family' => 'Roboto',
							'font-weight' => '700'
						),
						'transport'   => 'postMessage',
						'js_vars'     => array(
							array(
								'element' => '.post-title, .post-title a'
							)
						)
					),
					array(
						'id'          => 'evl_content_font',
						'title'       => esc_attr__( 'Post/Page Content Font', 'evolve' ),
						'subtitle'    => esc_attr__( 'Select the typography you want for your Website Post/Page Content', 'evolve' ),
						'type'        => 'typography',
						'text-align'  => false,
						'line-height' => false,
						'default'     => array(
							'font-size'   => '1rem',
							'color'       => '#51545c',
							'font-family' => 'Roboto',
							'font-weight' => '300'
						),
						'transport'   => 'postMessage',
						'js_vars'     => array(
							array(
								'element' => '.post-content'
							)
						)
					)
				)
			)
		);

		/*
			-- Content Boxes Title Font
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-front-page-content-boxes',
				'title'      => esc_attr__( 'Content Boxes', 'evolve' ),
				'subsection' => true,
				'fields'     => array(
					array(
						'id'          => 'evl_content_boxes_title_font',
						'title'       => esc_attr__( 'Content Boxes Title Font', 'evolve' ),
						'subtitle'    => esc_attr__( 'Select the typography you want for your Content Boxes Title', 'evolve' ),
						'type'        => 'typography',
						'text-align'  => false,
						'line-height' => false,
						'default'     => array(
							'font-size'   => '1.4rem',
							'color'       => '#6b6b6b',
							'font-family' => 'Roboto',
							'font-weight' => '700'
						),
						'transport'   => 'postMessage',
						'js_vars'     => array(
							array(
								'element' => '.content-box h5.card-title'
							)
						)
					),
					array(
						'id'          => 'evl_content_boxes_description_font',
						'title'       => esc_attr__( 'Content Boxes Description Font', 'evolve' ),
						'subtitle'    => esc_attr__( 'Select the typography you want for your Content Boxes Description', 'evolve' ),
						'type'        => 'typography',
						'text-align'  => false,
						'line-height' => false,
						'default'     => array(
							'font-size'   => '1.2rem',
							'color'       => '#888888',
							'font-family' => 'Roboto',
							'font-weight' => '300'
						),
						'transport'   => 'postMessage',
						'js_vars'     => array(
							array(
								'element' => '.content-box p'
							)
						)
					)
				)
			)
		);

		/*
			-- Footer Copyright
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-footer-copyright',
				'title'      => esc_attr__( 'Footer Copyright', 'evolve' ),
				'subsection' => true,
				'fields'     => array(
					array(
						'id'          => 'evl_footer_copyright',
						'title'       => esc_attr__( 'Footer Copyright Font', 'evolve' ),
						'subtitle'    => esc_attr__( 'Select the typography you want for your Footer Copyright', 'evolve' ),
						'type'        => 'typography',
						'text-align'  => false,
						'line-height' => false,
						'default'     => array(
							'font-size'   => '.7rem',
							'color'       => '#999999',
							'font-family' => 'Roboto',
							'font-weight' => '300'
						),
						'transport'   => 'postMessage',
						'js_vars'     => array(
							array(
								'element' => '#copyright, #copyright a'
							)
						)
					)
				)
			)
		);

		/*
			-- Headings
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-typography-subsec-headings-tab',
				'title'      => esc_attr__( 'Headings', 'evolve' ),
				'subsection' => true,
				'fields'     => array(
					array(
						'id'          => 'evl_content_h1_font',
						'title'       => esc_attr__( 'H1 Font', 'evolve' ),
						'subtitle'    => esc_attr__( 'Select the typography you want for your H1 tag in Website Post/Page Content', 'evolve' ),
						'type'        => 'typography',
						'text-align'  => false,
						'line-height' => false,
						'default'     => array(
							'font-size'   => '2.9rem',
							'color'       => '#51545c',
							'font-family' => 'Roboto',
							'font-weight' => '500'
						),
						'transport'   => 'postMessage',
						'js_vars'     => array(
							array(
								'element' => 'h1'
							)
						)
					),
					array(
						'id'          => 'evl_content_h2_font',
						'title'       => esc_attr__( 'H2 Font', 'evolve' ),
						'subtitle'    => esc_attr__( 'Select the typography you want for your H2 tag in Website Post/Page Content', 'evolve' ),
						'type'        => 'typography',
						'text-align'  => false,
						'line-height' => false,
						'default'     => array(
							'font-size'   => '2.5rem',
							'font-family' => 'Roboto',
							'color'       => '#51545c',
							'font-weight' => '500'
						),
						'transport'   => 'postMessage',
						'js_vars'     => array(
							array(
								'element' => 'h2'
							)
						)
					),
					array(
						'id'          => 'evl_content_h3_font',
						'title'       => esc_attr__( 'H3 Font', 'evolve' ),
						'subtitle'    => esc_attr__( 'Select the typography you want for your H3 tag in Website Post/Page Content', 'evolve' ),
						'type'        => 'typography',
						'text-align'  => false,
						'line-height' => false,
						'default'     => array(
							'font-size'   => '1.75rem',
							'font-family' => 'Roboto',
							'color'       => '#51545c',
							'font-weight' => '500'
						),
						'transport'   => 'postMessage',
						'js_vars'     => array(
							array(
								'element' => 'h3'
							)
						)
					),
					array(
						'id'          => 'evl_content_h4_font',
						'title'       => esc_attr__( 'H4 Font', 'evolve' ),
						'subtitle'    => esc_attr__( 'Select the typography you want for your H4 tag in Website Post/Page Content', 'evolve' ),
						'type'        => 'typography',
						'text-align'  => false,
						'line-height' => false,
						'default'     => array(
							'font-size'   => '1.7rem',
							'font-family' => 'Roboto',
							'color'       => '#51545c',
							'font-weight' => '500'
						),
						'transport'   => 'postMessage',
						'js_vars'     => array(
							array(
								'element' => 'h4'
							)
						)
					),
					array(
						'id'          => 'evl_content_h5_font',
						'title'       => esc_attr__( 'H5 Font', 'evolve' ),
						'subtitle'    => esc_attr__( 'Select the typography you want for your H5 tag in Website Post/Page Content', 'evolve' ),
						'type'        => 'typography',
						'text-align'  => false,
						'line-height' => false,
						'default'     => array(
							'font-size'   => '1.25rem',
							'font-family' => 'Roboto',
							'color'       => '#51545c',
							'font-weight' => '500'
						),
						'transport'   => 'postMessage',
						'js_vars'     => array(
							array(
								'element' => 'h5'
							)
						)
					),
					array(
						'id'          => 'evl_content_h6_font',
						'title'       => esc_attr__( 'H6 Font', 'evolve' ),
						'subtitle'    => esc_attr__( 'Select the typography you want for your H6 tag in Website Post/Page Content', 'evolve' ),
						'type'        => 'typography',
						'text-align'  => false,
						'line-height' => false,
						'default'     => array(
							'font-size'   => '.9rem',
							'font-family' => 'Roboto',
							'color'       => '#51545c',
							'font-weight' => '500'
						),
						'transport'   => 'postMessage',
						'js_vars'     => array(
							array(
								'element' => 'h6'
							)
						)
					)
				)
			)
		);

		/*
			Breadcrumbs
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'      => 'evl-pagetitlebar-tab',
				'title'   => esc_attr__( 'Breadcrumbs', 'evolve' ),
				'iconfix' => 'evolve-icon evolve-icon-breadcrumbs',
				'fields'  => array(
					array(
						'id'              => 'evl_breadcrumbs',
						'title'           => esc_attr__( 'Enable Breadcrumbs Navigation', 'evolve' ),
						'subtitle'        => esc_attr__( 'Check this box if you want to enable Breadcrumbs Navigation', 'evolve' ),
						'type'            => 'checkbox',
						'default'         => '1',
						'selector'        => '.breadcrumb',
						'render_callback' => 'evl_breadcrumbs'
					)
				)
			)
		);

		/*
			Styling
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'      => 'evl-styling-main-tab',
				'title'   => esc_attr__( 'Styling', 'evolve' ),
				'iconfix' => 'evolve-icon evolve-icon-styling',
			)
		);

		/*
			-- Main Color Scheme
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-styling-subsec-main-scheme-tab',
				'title'      => esc_attr__( 'Main Color Scheme', 'evolve' ),
				'subsection' => true,
				'fields'     => array(
					array(
						'id'       => 'evl_color_palettes',
						'title'    => esc_attr__( 'Main Color Scheme', 'evolve' ),
						'subtitle' => esc_attr__( 'Please select the predefined color scheme for your website', 'evolve' ),
						'type'     => 'palette',
						'palettes' => array(
							'color_palette_1'  => array(
								'#999999',
								'#313a43',
								'#273039',
								'#0d9078'
							),
							'color_palette_2'  => array(
								'#ffffff',
								'#f9f9f9',
								'#727272',
								'#000000'
							),
							'color_palette_3'  => array(
								'#ffffff',
								'#d6d6d6',
								'#3d3d3d',
								'#a2c43c'

							),
							'color_palette_4'  => array(
								'#ffffff',
								'#fab0ad',
								'#f7505a',
								'#282c59'
							),
							'color_palette_5'  => array(
								'#ffffff',
								'#E0E0E0',
								'#000000',
								'#d4c081'
							),
							'color_palette_6'  => array(
								'#ffffff',
								'#bcbcbc',
								'#666666',
								'#000000'
							),
							'color_palette_7'  => array(
								'#ffffff',
								'#f0f0f0',
								'#3c4d56',
								'#ff8d52'
							),
							'color_palette_8'  => array(
								'#ffffff',
								'#E0E0E0',
								'#c1c1c1',
								'#09589e'
							),
							'color_palette_9'  => array(
								'#ffffff',
								'#f0f0f0',
								'#444444',
								'#22b5ce'
							),
							'color_palette_10' => array(
								'#ffe484',
								'#313a43',
								'#273039',
								'#563d7c'
							),
						),
						'default'  => 'color_palette_1'
					)
				)
			)
		);

		/*
			-- Header & Footer
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-styling-subsec-header-footer-tab',
				'title'      => esc_attr__( 'Header & Footer', 'evolve' ),
				'subsection' => true,
				'fields'     => array(
					array(
						'id'    => 'evl_header_styling',
						'title' => esc_attr__( 'Header Styling', 'evolve' ),
						'type'  => 'info'
					),
					array(
						'id'        => 'evl_header_image',
						'title'     => esc_attr__( 'Header Background Image Responsiveness Style', 'evolve' ),
						'subtitle'  => sprintf( '%s<a href="%s">Header Background</a>', esc_attr__( 'Select if the header background image should be displayed in cover or contain size. Change ', 'evolve' ), '' . esc_url( admin_url( 'customize.php?return=&autofocus%5Bcontrol%5D=header_image' ) ) . '' ),
						'type'      => 'select',
						'options'   => array(
							'cover'   => esc_attr__( 'Cover', 'evolve' ),
							'contain' => esc_attr__( 'Contain', 'evolve' ),
							'none'    => esc_attr__( 'None', 'evolve' )
						),
						'default'   => 'cover',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.custom-header',
								'function' => 'css',
								'property' => 'background-size'
							)
						)
					),
					array(
						'id'        => 'evl_header_image_background_repeat',
						'title'     => esc_attr__( 'Background Repeat', 'evolve' ),
						'type'      => 'select',
						'options'   => array(
							'no-repeat' => esc_attr__( 'no-repeat', 'evolve' ),
							'repeat'    => esc_attr__( 'repeat', 'evolve' ),
							'repeat-x'  => esc_attr__( 'repeat-x', 'evolve' ),
							'repeat-y'  => esc_attr__( 'repeat-y', 'evolve' )
						),
						'default'   => 'no-repeat',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.custom-header',
								'function' => 'css',
								'property' => 'background-repeat'
							)
						)
					),
					array(
						'id'        => 'evl_header_image_background_position',
						'title'     => esc_attr__( 'Background Position', 'evolve' ),
						'type'      => 'select',
						'options'   => array(
							'center top'    => esc_attr__( 'center top', 'evolve' ),
							'center center' => esc_attr__( 'center center', 'evolve' ),
							'center bottom' => esc_attr__( 'center bottom', 'evolve' ),
							'left top'      => esc_attr__( 'left top', 'evolve' ),
							'left center'   => esc_attr__( 'left center', 'evolve' ),
							'left bottom'   => esc_attr__( 'left bottom', 'evolve' ),
							'right top'     => esc_attr__( 'right top', 'evolve' ),
							'right center'  => esc_attr__( 'right center', 'evolve' ),
							'right bottom'  => esc_attr__( 'right bottom', 'evolve' )
						),
						'default'   => 'center top',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.custom-header',
								'function' => 'css',
								'property' => 'background-position'
							)
						)
					),
					array(
						'id'        => 'evl_header_background_color',
						'title'     => esc_attr__( 'Header Color', 'evolve' ),
						'subtitle'  => esc_attr__( 'Custom background color of Header', 'evolve' ),
						'type'      => 'color',
						'default'   => '#313a43',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.header-pattern',
								'function' => 'css',
								'property' => 'background-color'
							)
						)
					),
					array(
						'id'    => 'evl_footer_styling',
						'title' => esc_attr__( 'Footer Styling', 'evolve' ),
						'type'  => 'info'
					),
					array(
						'id'       => 'evl_footer_reveal',
						'title'    => esc_attr__( 'Footer Reveal Effect', 'evolve' ),
						'subtitle' => esc_attr__( 'Check this box if you want to enable Footer Reveal Effect', 'evolve' ),
						'type'     => 'checkbox',
						'default'  => '0'
					),
					array(
						'id'        => 'evl_footer_background_image',
						'title'     => esc_attr__( 'Footer Image', 'evolve' ),
						'subtitle'  => esc_attr__( 'Upload a footer background image for your website, or specify an image URL directly', 'evolve' ),
						'type'      => 'media',
						'url'       => true,
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.footer',
								'function' => 'css',
								'property' => 'background-image'
							)
						)
					),
					array(
						'id'        => 'evl_footer_image',
						'title'     => esc_attr__( 'Footer Background Image Responsiveness Style', 'evolve' ),
						'subtitle'  => esc_attr__( 'Select if the footer background image should be displayed in cover or contain size', 'evolve' ),
						'type'      => 'select',
						'options'   => array(
							'cover'   => esc_attr__( 'Cover', 'evolve' ),
							'contain' => esc_attr__( 'Contain', 'evolve' ),
							'none'    => esc_attr__( 'None', 'evolve' )
						),
						'default'   => 'cover',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.footer',
								'function' => 'css',
								'property' => 'background-size'
							)
						)
					),
					array(
						'id'        => 'evl_footer_image_background_repeat',
						'title'     => esc_attr__( 'Background Repeat', 'evolve' ),
						'type'      => 'select',
						'options'   => array(
							'no-repeat' => esc_attr__( 'no-repeat', 'evolve' ),
							'repeat'    => esc_attr__( 'repeat', 'evolve' ),
							'repeat-x'  => esc_attr__( 'repeat-x', 'evolve' ),
							'repeat-y'  => esc_attr__( 'repeat-y', 'evolve' )
						),
						'default'   => 'no-repeat',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.footer',
								'function' => 'css',
								'property' => 'background-repeat'
							)
						)
					),
					array(
						'id'        => 'evl_footer_image_background_position',
						'title'     => esc_attr__( 'Background Position', 'evolve' ),
						'type'      => 'select',
						'options'   => array(
							'center top'    => esc_attr__( 'center top', 'evolve' ),
							'center center' => esc_attr__( 'center center', 'evolve' ),
							'center bottom' => esc_attr__( 'center bottom', 'evolve' ),
							'left top'      => esc_attr__( 'left top', 'evolve' ),
							'left center'   => esc_attr__( 'left center', 'evolve' ),
							'left bottom'   => esc_attr__( 'left bottom', 'evolve' ),
							'right top'     => esc_attr__( 'right top', 'evolve' ),
							'right center'  => esc_attr__( 'right center', 'evolve' ),
							'right bottom'  => esc_attr__( 'right bottom', 'evolve' )
						),
						'default'   => 'center top',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.footer',
								'function' => 'css',
								'property' => 'background-position'
							)
						)
					),
					array(
						'id'        => 'evl_header_footer_back_color',
						'title'     => esc_attr__( 'Footer Color', 'evolve' ),
						'subtitle'  => esc_attr__( 'Custom background color of Footer', 'evolve' ),
						'type'      => 'color',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.footer',
								'function' => 'css',
								'property' => 'background-color'
							)
						)
					),
					array(
						'id'    => 'evl_header_footer',
						'title' => esc_attr__( 'Header & Footer Default Pattern', 'evolve' ),
						'type'  => 'info'
					),
					array(
						'id'        => 'evl_pattern',
						'title'     => esc_attr__( 'Header and Footer Pattern', 'evolve' ),
						'subtitle'  => esc_attr__( 'Choose the pattern for header and footer background', 'evolve' ),
						'type'      => 'image_select',
						'options'   => array(
							'none'      => $global_value['frontend_images'] . 'pattern/none.jpg',
							'pattern_1' => $global_value['frontend_images'] . 'pattern/pattern_1.png',
							'pattern_2' => $global_value['frontend_images'] . 'pattern/pattern_2.png',
							'pattern_3' => $global_value['frontend_images'] . 'pattern/pattern_3.png',
							'pattern_4' => $global_value['frontend_images'] . 'pattern/pattern_4.png',
							'pattern_5' => $global_value['frontend_images'] . 'pattern/pattern_5.png',
							'pattern_6' => $global_value['frontend_images'] . 'pattern/pattern_6.png',
							'pattern_7' => $global_value['frontend_images'] . 'pattern/pattern_7.png',
							'pattern_8' => $global_value['frontend_images'] . 'pattern/pattern_8.png'
						),
						'default'   => 'none',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'       => '.header-pattern, .footer',
								'property'      => 'background-image',
								'value_pattern' => $global_value['frontend_images'] . 'pattern/' . '$' . '.png'
							)
						)
					)
				)
			)
		);

		/*
			-- Menu
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-styling-subsec-menu-tab',
				'title'      => esc_attr__( 'Menu', 'evolve' ),
				'subsection' => true,
				'fields'     => array(
					array(
						'id'        => 'evl_menu_back_color',
						'title'     => esc_attr__( 'Main Menu Color', 'evolve' ),
						'subtitle'  => esc_attr__( 'Custom background color of Main Menu', 'evolve' ),
						'type'      => 'color',
						'default'   => '#273039',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.menu-header, .sticky-header',
								'function' => 'css',
								'property' => 'background-color'
							)
						)
					),
					array(
						'id'       => 'evl_disable_menu_back',
						'title'    => esc_attr__( 'Disable Main Menu Background Gradient, Shadow and Borders For Header #1', 'evolve' ),
						'subtitle' => esc_attr__( 'Check this box if you want to disable main menu background gradient, shadow effect and borders', 'evolve' ),
						'type'     => 'checkbox',
						'default'  => '1'
					),
					array(
						'id'       => 'evl_menu_back',
						'title'    => esc_attr__( 'Text Shadow Effect Color', 'evolve' ),
						'subtitle' => esc_attr__( 'Enables the text shadow effect on the menu items', 'evolve' ),
						'type'     => 'select',
						'options'  => array(
							'light' => esc_attr__( 'Light', 'evolve' ),
							'dark'  => esc_attr__( 'Dark', 'evolve' )
						),
						'default'  => 'dark',
						'required' => array(
							array( 'evl_disable_menu_back', '=', '0' )
						)
					),
					array(
						'id'        => 'evl_top_menu_back',
						'title'     => esc_attr__( 'Top Bar Color', 'evolve' ),
						'subtitle'  => esc_attr__( 'Background color of Top Bar for Header #2', 'evolve' ),
						'type'      => 'color',
						'default'   => '#273039',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.top-bar',
								'function' => 'css',
								'property' => 'background-color'
							)
						)
					),
					array(
						'id'        => 'evl_top_menu_hover_font_color',
						'title'     => esc_attr__( 'Menu Hover Font Color', 'evolve' ),
						'subtitle'  => esc_attr__( 'Menu hover font color', 'evolve' ),
						'type'      => 'color',
						'default'   => '#ffffff',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.navbar-nav .nav-link:focus, .navbar-nav .nav-link:hover, .navbar-nav .active > .nav-link, .navbar-nav .nav-link.active, .navbar-nav .nav-link.show, .navbar-nav .show > .nav-link, .navbar-nav li.menu-item.current-menu-item > a, .navbar-nav li.menu-item.current-menu-parent > a, .navbar-nav li.menu-item.current-menu-ancestor > a, .navbar-nav li a:hover, .navbar-nav li:hover > a, .navbar-nav li:hover',
								'function' => 'css',
								'property' => 'color'
							)
						)
					)
				)
			)
		);

		/*
			-- Header Block
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-styling-subsec-slideshow-widgets-tab',
				'title'      => esc_attr__( 'Header Block', 'evolve' ),
				'subsection' => true,
				'fields'     => array(
					array(
						'id'        => 'evl_scheme_widgets',
						'title'     => esc_attr__( 'Color Scheme of The Header Block Area', 'evolve' ),
						'subtitle'  => esc_attr__( 'Choose the color scheme for the Header Block area', 'evolve' ),
						'type'      => 'color',
						'default'   => '#273039',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.header-block',
								'function' => 'css',
								'property' => 'background'
							)
						)
					),
					array(
						'id'        => 'evl_scheme_background',
						'title'     => esc_attr__( 'Background Image of The Header Block Area', 'evolve' ),
						'subtitle'  => esc_attr__( 'Upload an image for the Header Block area', 'evolve' ),
						'type'      => 'media',
						'url'       => true,
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.header-block',
								'function' => 'css',
								'property' => 'background-image'
							)
						)
					),
					array(
						'id'       => 'evl_scheme_background_100',
						'title'    => esc_attr__( '100% Background Image', 'evolve' ),
						'subtitle' => esc_attr__( 'Have background image always at 100% in width and height and scale according to the browser size', 'evolve' ),
						'type'     => 'switch',
						'on'       => esc_attr__( 'Enabled', 'evolve' ),
						'off'      => esc_attr__( 'Disabled', 'evolve' ),
						'default'  => 0
					),
					array(
						'id'        => 'evl_scheme_background_repeat',
						'title'     => esc_attr__( 'Background Repeat', 'evolve' ),
						'type'      => 'select',
						'options'   => array(
							'repeat'    => esc_attr__( 'repeat', 'evolve' ),
							'repeat-x'  => esc_attr__( 'repeat-x', 'evolve' ),
							'repeat-y'  => esc_attr__( 'repeat-y', 'evolve' ),
							'no-repeat' => esc_attr__( 'no-repeat', 'evolve' )
						),
						'default'   => 'no-repeat',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.header-block',
								'function' => 'css',
								'property' => 'background-repeat'
							)
						)
					)
				)
			)
		);

		/*
			-- Content
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-styling-subsec-content-tab',
				'title'      => esc_attr__( 'Content', 'evolve' ),
				'subsection' => true,
				'fields'     => array(
					array(
						'id'        => 'evl_content_background_image',
						'title'     => esc_attr__( 'Content Image', 'evolve' ),
						'subtitle'  => esc_attr__( 'Upload a content background image for your website, or specify an image URL directly', 'evolve' ),
						'type'      => 'media',
						'url'       => true,
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.content',
								'function' => 'css',
								'property' => 'background-image'
							)
						)
					),
					array(
						'id'        => 'evl_content_image_responsiveness',
						'title'     => esc_attr__( 'Content Background Image Responsiveness Style', 'evolve' ),
						'subtitle'  => esc_attr__( 'Select if the content background image should be displayed in cover or contain size', 'evolve' ),
						'type'      => 'select',
						'options'   => array(
							'cover'   => esc_attr__( 'Cover', 'evolve' ),
							'contain' => esc_attr__( 'Contain', 'evolve' )
						),
						'default'   => 'cover',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.content',
								'function' => 'css',
								'property' => 'background-size'
							)
						)
					),
					array(
						'id'       => 'evl_content_back',
						'title'    => esc_attr__( 'Content Color', 'evolve' ),
						'subtitle' => esc_attr__( 'Background color of content', 'evolve' ),
						'type'     => 'select',
						'options'  => array(
							'light' => esc_attr__( 'Light', 'evolve' ),
							'dark'  => esc_attr__( 'Dark', 'evolve' )
						),
						'default'  => 'light'
					),
					array(
						'id'        => 'evl_content_background_color',
						'title'     => esc_attr__( 'Or Custom Content Color', 'evolve' ),
						'subtitle'  => esc_attr__( 'Custom background color of content area', 'evolve' ),
						'type'      => 'color',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.content',
								'function' => 'css',
								'property' => 'background-color'
							)
						)
					)
				)
			)
		);

		/*
			-- Widgets
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-styling-subsec-widgets-tab',
				'title'      => esc_attr__( 'Widgets', 'evolve' ),
				'subsection' => true,
				'fields'     => array(
					array(
						'id'       => 'evl_widget_background',
						'title'    => esc_attr__( 'Enable Widget Title Custom Background', 'evolve' ),
						'subtitle' => esc_attr__( 'Check this box if you want to enable custom background for widget titles', 'evolve' ),
						'type'     => 'switch',
						'on'       => esc_attr__( 'Enabled', 'evolve' ),
						'off'      => esc_attr__( 'Disabled', 'evolve' ),
						'default'  => 0
					),
					array(
						'id'        => 'evl_widget_bgcolor',
						'title'     => esc_attr__( 'Widget Title Custom Background', 'evolve' ),
						'subtitle'  => esc_attr__( 'Choose the color scheme for widgets background', 'evolve' ),
						'type'      => 'color',
						'default'   => '#273039',
						'required'  => array(
							array( 'evl_widget_background', '=', '1' )
						),
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.widget-title-background',
								'function' => 'css',
								'property' => 'background-color'
							),
							array(
								'element'  => '.widget-title-background',
								'function' => 'css',
								'property' => 'border-color'
							)
						)
					),
					array(
						'id'       => 'evl_widget_background_image',
						'title'    => esc_attr__( 'Disable Widget Content Boxed Background', 'evolve' ),
						'subtitle' => esc_attr__( 'Check this box if you want to disable widget content boxed background', 'evolve' ),
						'type'     => 'checkbox',
						'default'  => 1
					)
				)
			)
		);

		/*
			-- Links
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-styling-subsec-links-buttons-tab',
				'title'      => esc_attr__( 'Links', 'evolve' ),
				'subsection' => true,
				'fields'     => array(
					array(
						'id'        => 'evl_general_link',
						'title'     => esc_attr__( 'Primary Link Color', 'evolve' ),
						'subtitle'  => esc_attr__( 'Custom color for content links', 'evolve' ),
						'type'      => 'color',
						'default'   => '#0d9078',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => 'a, a:hover, .page-link, .page-link:hover, code, .widget_calendar tbody a',
								'function' => 'css',
								'property' => 'color'
							)
						)
					),
					array(
						'id'        => 'evl_secondary_link',
						'title'     => esc_attr__( 'Secondary Link Color', 'evolve' ),
						'subtitle'  => esc_attr__( 'Custom color for links in post metas, widgets, navigation etc.', 'evolve' ),
						'type'      => 'color',
						'default'   => '#999999',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.breadcrumb-item:last-child, .breadcrumb-item+.breadcrumb-item::before, .widget a, .post-meta, .post-meta a, .navigation a, .post-content .number-pagination a:link, #wp-calendar td, .no-comment, .comment-meta, .comment-meta a, blockquote, .price del',
								'function' => 'css',
								'property' => 'color'
							)
						)
					)
				)
			)
		);

		/*
			-- Shadows
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-styling-subsec-shadows-tab',
				'title'      => esc_attr__( 'Shadows', 'evolve' ),
				'subsection' => true,
				'fields'     => array(
					array(
						'id'       => 'evl_shadow_effect',
						'title'    => esc_attr__( 'Shadow Effect', 'evolve' ),
						'subtitle' => esc_attr__( 'Enables the shadow effect on the elements', 'evolve' ),
						'type'     => 'select',
						'options'  => array(
							'enable'  => esc_attr__( 'Enabled', 'evolve' ),
							'disable' => esc_attr__( 'Disabled', 'evolve' )
						),
						'default'  => 'disable'
					),
					array(
						'id'        => 'evl_shadow_effect_color',
						'title'     => esc_attr__( 'Text Shadow Effect Color', 'evolve' ),
						'subtitle'  => esc_attr__( 'Select the text shadow effect custom color', 'evolve' ),
						'type'      => 'color_rgba',
						'default'   => '',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'       => '#wrapper',
								'property'      => 'text-shadow',
								'value_pattern' => '0 1px 1px $'
							)
						)
					)
				)
			)
		);

		/*
			Components
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'      => 'evl-component-main-tab',
				'title'   => esc_attr__( 'Components', 'evolve' ),
				'iconfix' => 'evolve-icon evolve-icon-components'
			)
		);

		/*
			-- Buttons
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-component-button-tab',
				'title'      => esc_attr__( 'Buttons', 'evolve' ),
				'subsection' => true,
				'fields'     => array(
					array(
						'id'       => 'evl_shortcode_button_shape',
						'title'    => esc_attr__( 'Button Shape', 'evolve' ),
						'subtitle' => esc_attr__( 'Select the default shape for buttons', 'evolve' ),
						'type'     => 'select',
						'options'  => array(
							'Square' => esc_attr__( 'Square', 'evolve' ),
							'Round'  => esc_attr__( 'Round', 'evolve' ),
							'Pill'   => esc_attr__( 'Pill', 'evolve' )
						),
						'default'  => 'Pill'
					),
					array(
						'id'       => 'evl_shortcode_button_type',
						'title'    => esc_attr__( 'Button Type', 'evolve' ),
						'subtitle' => esc_attr__( 'Select the default button type', 'evolve' ),
						'type'     => 'select',
						'options'  => array(
							'Flat' => esc_attr__( 'Flat', 'evolve' ),
							'3d'   => esc_attr__( '3d', 'evolve' )
						),
						'default'  => 'Flat'
					),
					array(
						'id'        => 'evl_shortcode_button_gradient_top_color',
						'title'     => esc_attr__( 'Button Gradient Top Color', 'evolve' ),
						'subtitle'  => esc_attr__( 'Controls the top color of the button gradients', 'evolve' ),
						'type'      => 'color',
						'default'   => '#0d9078',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'         => $global_value['button_classes'],
								'property'        => 'background',
								'value_pattern'   => 'linear-gradient(to top, bottomCol, $)',
								'pattern_replace' => array(
									'bottomCol' => 'evl_shortcode_button_gradient_bottom_color'
								)
							)
						)
					),
					array(
						'id'        => 'evl_shortcode_button_gradient_bottom_color',
						'title'     => esc_attr__( 'Button Gradient Bottom Color', 'evolve' ),
						'subtitle'  => esc_attr__( 'Controls the bottom color of the button gradients', 'evolve' ),
						'type'      => 'color',
						'default'   => '#0d9078',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'         => $global_value['button_classes'],
								'property'        => 'background',
								'value_pattern'   => 'linear-gradient(to top, $, topCol)',
								'pattern_replace' => array(
									'topCol' => 'evl_shortcode_button_gradient_top_color'
								)
							)
						)
					),
					array(
						'id'        => 'evl_shortcode_button_gradient_top_hover_color',
						'title'     => esc_attr__( 'Button Gradient Top Hover Color', 'evolve' ),
						'subtitle'  => esc_attr__( 'Controls the top hover color of the button gradients', 'evolve' ),
						'type'      => 'color',
						'default'   => '#313a43',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'         => $global_value['button_hover_classes'],
								'property'        => 'background',
								'value_pattern'   => 'linear-gradient(to top, bottomCol, $)',
								'pattern_replace' => array(
									'bottomCol' => 'evl_shortcode_button_gradient_bottom_hover_color'
								)
							)
						)
					),
					array(
						'id'        => 'evl_shortcode_button_gradient_bottom_hover_color',
						'title'     => esc_attr__( 'Button Gradient Bottom Hover Color', 'evolve' ),
						'subtitle'  => esc_attr__( 'Controls the bottom hover color of the button gradients', 'evolve' ),
						'type'      => 'color',
						'default'   => '#313a43',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'         => $global_value['button_hover_classes'],
								'property'        => 'background',
								'value_pattern'   => 'linear-gradient(to top, $, topCol)',
								'pattern_replace' => array(
									'topCol' => 'evl_shortcode_button_gradient_top_hover_color'
								)
							)
						)
					),
					array(
						'id'        => 'evl_shortcode_button_accent_color',
						'title'     => esc_attr__( 'Button Accent Color', 'evolve' ),
						'subtitle'  => esc_attr__( 'This option controls the color of the button text and icon', 'evolve' ),
						'type'      => 'color',
						'default'   => '#f4f4f4',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => $global_value['button_classes'],
								'function' => 'css',
								'property' => 'color'
							)
						)
					),
					array(
						'id'        => 'evl_shortcode_button_accent_hover_color',
						'title'     => esc_attr__( 'Button Accent Hover Color', 'evolve' ),
						'subtitle'  => esc_attr__( 'This option controls the hover color of the button text and icon', 'evolve' ),
						'type'      => 'color',
						'default'   => '#ffffff',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => $global_value['button_hover_classes'],
								'function' => 'css',
								'property' => 'color'
							)
						)
					),
					array(
						'id'        => 'evl_shortcode_button_bevel_color',
						'title'     => esc_attr__( 'Button Bevel Color (3D Mode Only)', 'evolve' ),
						'subtitle'  => esc_attr__( 'Controls the default bevel color of the buttons', 'evolve' ),
						'type'      => 'color',
						'default'   => '#1d6e72',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'       => $global_value['button_classes'],
								'property'      => 'box-shadow',
								'value_pattern' => '0 2px 0 $'
							)
						)
					),
					array(
						'id'        => 'evl_shortcode_button_border_color',
						'title'     => esc_attr__( 'Button Border Color', 'evolve' ),
						'subtitle'  => esc_attr__( 'Controls the border color of the buttons', 'evolve' ),
						'type'      => 'color',
						'default'   => '#0d9078',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => $global_value['button_classes'],
								'function' => 'css',
								'property' => 'border-color'
							)
						)
					),
					array(
						'id'        => 'evl_shortcode_button_border_hover_color',
						'title'     => esc_attr__( 'Button Border Hover Color', 'evolve' ),
						'subtitle'  => esc_attr__( 'Controls the border hover color of the buttons', 'evolve' ),
						'type'      => 'color',
						'default'   => '#313a43',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => $global_value['button_hover_classes'],
								'function' => 'css',
								'property' => 'border-color'
							)
						)
					),
					array(
						'id'        => 'evl_shortcode_button_border_width',
						'title'     => esc_attr__( 'Button Border Width', 'evolve' ),
						'subtitle'  => esc_attr__( 'Select the border width for buttons in px', 'evolve' ),
						'type'      => 'slider',
						'min'       => '0',
						'max'       => '10',
						'default'   => '3',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'       => $global_value['button_classes'] . ',' . $global_value['button_hover_classes'],
								'property'      => 'border-width',
								'value_pattern' => '$px'
							)
						)
					),
					array(
						'id'       => 'evl_shortcode_button_shadow',
						'title'    => esc_attr__( 'Disable Flat Button Shadow', 'evolve' ),
						'subtitle' => esc_attr__( 'Select the box to disable the inset shadow and text shadow on the flat button type', 'evolve' ),
						'type'     => 'checkbox',
						'default'  => '1'
					),
					array(
						'id'       => 'evl_shortcode_button_effect',
						'title'    => esc_attr__( 'Button Hover Effect', 'evolve' ),
						'subtitle' => esc_attr__( 'Select the hover effect for buttons or disable it', 'evolve' ),
						'type'     => 'select',
						'options'  => array(
							'pulse'      => esc_attr__( 'Pulse', 'evolve' ),
							'rubberBand' => esc_attr__( 'RubberBand', 'evolve' ),
							'shake'      => esc_attr__( 'Shake', 'evolve' ),
							'swing'      => esc_attr__( 'Swing', 'evolve' ),
							'tada'       => esc_attr__( 'Tada', 'evolve' ),
							'wobble'     => esc_attr__( 'Wobble', 'evolve' ),
							'jello'      => esc_attr__( 'Jello', 'evolve' ),
							'disable'    => esc_attr__( 'Disabled', 'evolve' )
						),
						'default'  => 'pulse'
					),
				)
			)
		);

		/*
			-- Forms
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-component-forms',
				'title'      => esc_attr__( 'Forms', 'evolve' ),
				'subsection' => true,
				'fields'     => array(
					array(
						'id'     => 'evl_text_textarea',
						'title'  => esc_attr__( 'Text, TextArea', 'evolve' ),
						'type'   => 'info',
						'indent' => true
					),
					array(
						'id'        => 'evl_form_bg_color',
						'title'     => esc_attr__( 'Form Background Color', 'evolve' ),
						'subtitle'  => esc_attr__( 'Controls the background color of form text, textarea field', 'evolve' ),
						'type'      => 'color',
						'default'   => '#fcfcfc',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => 'input[type=text], input[type=email], input[type=password], input[type=file], input[type=tel], textarea, select, .form-control, .form-control:focus',
								'function' => 'css',
								'property' => 'background-color'
							)
						)
					),
					array(
						'id'        => 'evl_form_text_color',
						'title'     => esc_attr__( 'Form Text Color', 'evolve' ),
						'subtitle'  => esc_attr__( 'Controls the text, textarea color for forms', 'evolve' ),
						'type'      => 'color',
						'default'   => '#888888',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => 'input[type=text], input[type=email], input[type=password], input[type=file], input[type=tel], textarea, select, .form-control, .form-control:focus',
								'function' => 'css',
								'property' => 'color'
							)
						)
					),
					array(
						'id'        => 'evl_form_border_color',
						'title'     => esc_attr__( 'Form Border Color', 'evolve' ),
						'subtitle'  => esc_attr__( 'Controls the border color of form text, textarea fields', 'evolve' ),
						'type'      => 'color',
						'default'   => '#E0E0E0',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => 'input[type=text], input[type=email], input[type=password], input[type=file], input[type=tel], textarea, select, .form-control, .form-control:focus',
								'function' => 'css',
								'property' => 'border-color'
							)
						)
					),
					array(
						'id'     => 'evl_radio_checkbox',
						'title'  => esc_attr__( 'Radio, CheckBox, Active/Focus Items', 'evolve' ),
						'type'   => 'info',
						'indent' => true
					),
					array(
						'id'        => 'evl_form_item_color',
						'title'     => esc_attr__( 'Form Radio, CheckBox, Active/Focus Items Color', 'evolve' ),
						'subtitle'  => esc_attr__( 'Controls the color of form components - radio, checkbox, active/focus items etc.', 'evolve' ),
						'type'      => 'color',
						'default'   => '#0d9078',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.custom-checkbox .custom-control-input:checked~.custom-control-label::before, .custom-radio .custom-control-input:checked~.custom-control-label::before, .nav-pills .nav-link.active, .dropdown-item.active, .dropdown-item:active, .woocommerce-store-notice, .comment-author .fn .badge-primary, .widget.woocommerce .count, .woocommerce-review-link, .woocommerce .onsale, .stars a:hover, .stars a.active',
								'function' => 'css',
								'property' => 'border-color'
							)
						)
					)
				)
			)
		);

		/*
			Blog
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'      => 'evl-blog-main-tab',
				'title'   => esc_attr__( 'Blog', 'evolve' ),
				'iconfix' => 'evolve-icon evolve-icon-blog'
			)
		);

		/*
			-- General
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-blog-subsec-general-tab',
				'title'      => esc_attr__( 'General', 'evolve' ),
				'subsection' => true,
				'fields'     => array(
					array(
						'id'       => 'evl_post_layout',
						'title'    => esc_attr__( 'Blog Layout', 'evolve' ),
						'subtitle' => esc_attr__( 'Grid layout with 3 posts per row is recommended to use with disabled Sidebar(s)', 'evolve' ),
						'type'     => 'image_select',
						'options'  => array(
							'one'   => $global_value['customizer_images'] . 'one-post.png',
							'two'   => $global_value['customizer_images'] . 'two-posts.png',
							'three' => $global_value['customizer_images'] . 'three-posts.png'
						),
						'default'  => 'two'
					),
					array(
						'id'       => 'evl_category_page_title',
						'title'    => esc_attr__( 'Archive Page Title', 'evolve' ),
						'subtitle' => esc_attr__( 'Enable page title in archive pages', 'evolve' ),
						'type'     => 'select',
						'options'  => array(
							1 => esc_attr__( 'Enabled', 'evolve' ),
							0 => esc_attr__( 'Disabled', 'evolve' )
						),
						'default'  => '1'
					),
					array(
						'id'       => 'evl_share_this',
						'title'    => esc_attr__( '\'Share This\' Buttons Placement', 'evolve' ),
						'subtitle' => esc_attr__( 'Choose placement of the \'Share This\' buttons', 'evolve' ),
						'type'     => 'select',
						'options'  => array(
							'single'         => esc_attr__( 'Single posts', 'evolve' ),
							'single_archive' => esc_attr__( 'Single posts + Archive pages', 'evolve' ),
							'all'            => esc_attr__( 'All pages', 'evolve' ),
							'disable'        => esc_attr__( 'Disabled', 'evolve' )
						),
						'default'  => 'single'
					),
					array(
						'id'       => 'evl_pagination_type',
						'title'    => esc_attr__( 'Pagination Type', 'evolve' ),
						'subtitle' => esc_attr__( 'Select the pagination type for the assigned blog page in Settings > Reading.', 'evolve' ),
						'type'     => 'select',
						'options'  => array(
							'pagination'        => esc_attr__( 'Navigation Links', 'evolve' ),
							'number_pagination' => esc_attr__( 'Number Pagination', 'evolve' ),
							'infinite'          => esc_attr__( 'Infinite Scroll', 'evolve' )
						),
						'default'  => 'pagination'
					),
					array(
						'id'       => 'evl_nav_links',
						'title'    => esc_attr__( 'Position of Navigation Links', 'evolve' ),
						'subtitle' => sprintf( esc_attr__( 'Choose the position of the %1$sOlder/Newer Posts%2$s links', 'evolve' ), '<strong>', '</strong>' ),
						'type'     => 'select',
						'options'  => array(
							'after'  => esc_attr__( 'After Posts', 'evolve' ),
							'before' => esc_attr__( 'Before Posts', 'evolve' ),
							'both'   => esc_attr__( 'Both', 'evolve' )
						),
						'default'  => 'after'
					)
				)
			)
		);

		/*
			-- Posts
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-blog-subsec-post-tab',
				'title'      => esc_attr__( 'Posts', 'evolve' ),
				'subsection' => true,
				'fields'     => array(
					array(
						'id'       => 'evl_posts_excerpt_title_length',
						'title'    => esc_attr__( 'Post Title Excerpt Length', 'evolve' ),
						'subtitle' => esc_attr__( 'Enter number of characters for Post Title Excerpt. This works only if a grid layout is enabled', 'evolve' ),
						'type'     => 'slider',
						'min'      => '0',
						'max'      => '100',
						'default'  => '40'
					),
					array(
						'id'       => 'evl_excerpt_thumbnail',
						'title'    => esc_attr__( 'Enable Post Excerpts', 'evolve' ),
						'subtitle' => esc_attr__( 'Check this box if you want to display post excerpts on 1 column blog layout', 'evolve' ),
						'type'     => 'switch',
						'on'       => esc_attr__( 'Enabled', 'evolve' ),
						'off'      => esc_attr__( 'Disabled', 'evolve' ),
						'default'  => 0
					),
					array(
						'id'       => 'evl_author_avatar',
						'title'    => esc_attr__( 'Enable Post Author Avatar', 'evolve' ),
						'subtitle' => esc_attr__( 'Check this box if you want to display post author avatar', 'evolve' ),
						'type'     => 'switch',
						'on'       => esc_attr__( 'Enabled', 'evolve' ),
						'off'      => esc_attr__( 'Disabled', 'evolve' ),
						'default'  => 0
					),
					array(
						'id'       => 'evl_header_meta',
						'title'    => esc_attr__( 'Post Meta Header Placement', 'evolve' ),
						'subtitle' => esc_attr__( 'Choose placement of the post meta header - Date, Author, Comments', 'evolve' ),
						'type'     => 'select',
						'options'  => array(
							'single_archive' => esc_attr__( 'Single Posts + Archive Pages', 'evolve' ),
							'single'         => esc_attr__( 'Single Posts', 'evolve' ),
							'disable'        => esc_attr__( 'Disabled', 'evolve' )
						),
						'default'  => 'single_archive'
					),
					array(
						'id'       => 'evl_post_links',
						'title'    => esc_attr__( 'Position of Previous/Next Posts Links', 'evolve' ),
						'subtitle' => sprintf( esc_attr__( 'Choose the position of the %1$sPrevious/Next Post%2$s links', 'evolve' ), '<strong>', '</strong>' ),
						'type'     => 'select',
						'options'  => array(
							'after'  => esc_attr__( 'After Posts', 'evolve' ),
							'before' => esc_attr__( 'Before Posts', 'evolve' ),
							'both'   => esc_attr__( 'Both', 'evolve' )
						),
						'default'  => 'after'
					),
					array(
						'id'       => 'evl_similar_posts',
						'title'    => esc_attr__( 'Display Similar Posts', 'evolve' ),
						'subtitle' => sprintf( esc_attr__( 'Choose if you want to display %1$sSimilar posts%2$s in articles', 'evolve' ), '<strong>', '</strong>' ),
						'type'     => 'select',
						'options'  => array(
							'disable'  => esc_attr__( 'Disabled', 'evolve' ),
							'category' => esc_attr__( 'Match by Categories', 'evolve' ),
							'tag'      => esc_attr__( 'Match by Tags', 'evolve' )
						),
						'default'  => 'disable'
					)
				)
			)
		);

		/*
			-- Featured Image
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-blog-subsec-featured-tab',
				'title'      => esc_attr__( 'Featured Image', 'evolve' ),
				'subsection' => true,
				'fields'     => array(
					array(
						'id'       => 'evl_featured_images',
						'title'    => esc_attr__( 'Enable Featured Images', 'evolve' ),
						'subtitle' => esc_attr__( 'Check this box if you want to display featured images', 'evolve' ),
						'type'     => 'checkbox',
						'default'  => '1'
					),
					array(
						'id'       => 'evl_blog_featured_image',
						'title'    => esc_attr__( 'Enable Featured Image on Single Blog Posts', 'evolve' ),
						'subtitle' => esc_attr__( 'Check this box if you want to display featured image on Single Blog Posts', 'evolve' ),
						'type'     => 'switch',
						'on'       => esc_attr__( 'Enabled', 'evolve' ),
						'off'      => esc_attr__( 'Disabled', 'evolve' ),
						'default'  => 0,
						'required' => array(
							array( 'evl_featured_images', '=', '1' )
						)
					),
					array(
						'id'       => 'evl_thumbnail_default_images',
						'title'    => esc_attr__( 'Hide Placeholder Thumbnail Images', 'evolve' ),
						'subtitle' => esc_attr__( 'Turn on if you don\'t want to display placeholder thumbnail images', 'evolve' ),
						'type'     => 'switch',
						'required' => array(
							array( 'evl_featured_images', '=', '1' )
						)
					),
					array(
						'id'       => 'evl_animatecss',
						'title'    => esc_attr__( 'Enable Hover Effect on Featured Images', 'evolve' ),
						'subtitle' => esc_attr__( 'Check this box if you want to enable hover effect on featured images', 'evolve' ),
						'type'     => 'checkbox',
						'default'  => '1',
						'required' => array(
							array( 'evl_featured_images', '=', '1' )
						)
					)
				)
			)
		);

		/*
			-- Post Format
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-post-format',
				'title'      => esc_attr__( 'Post Format', 'evolve' ),
				'subsection' => true,
				'fields'     => array(
					array(
						'id'       => 'evl_sticky_post_format',
						'title'    => esc_attr__( 'Sticky Post Format Background', 'evolve' ),
						'subtitle' => esc_attr__( 'Check this box if you want to enable background color for sticky post format', 'evolve' ),
						'type'     => 'switch',
						'on'       => esc_attr__( 'Enabled', 'evolve' ),
						'off'      => esc_attr__( 'Disabled', 'evolve' ),
						'default'  => 1
					),
					array(
						'id'       => 'evl_aside_post_format',
						'title'    => esc_attr__( 'Aside Post Format Background', 'evolve' ),
						'subtitle' => esc_attr__( 'Check this box if you want to enable background color for aside post format', 'evolve' ),
						'type'     => 'switch',
						'on'       => esc_attr__( 'Enabled', 'evolve' ),
						'off'      => esc_attr__( 'Disabled', 'evolve' ),
						'default'  => 1
					),
					array(
						'id'       => 'evl_audio_post_format',
						'title'    => esc_attr__( 'Audio Post Format Background', 'evolve' ),
						'subtitle' => esc_attr__( 'Check this box if you want to enable background color for audio post format', 'evolve' ),
						'type'     => 'switch',
						'on'       => esc_attr__( 'Enabled', 'evolve' ),
						'off'      => esc_attr__( 'Disabled', 'evolve' ),
						'default'  => 1
					),
					array(
						'id'       => 'evl_chat_post_format',
						'title'    => esc_attr__( 'Chat Post Format Background', 'evolve' ),
						'subtitle' => esc_attr__( 'Check this box if you want to enable background color for chat post format', 'evolve' ),
						'type'     => 'switch',
						'on'       => esc_attr__( 'Enabled', 'evolve' ),
						'off'      => esc_attr__( 'Disabled', 'evolve' ),
						'default'  => 1
					),
					array(
						'id'       => 'evl_gallery_post_format',
						'title'    => esc_attr__( 'Gallery Post Format Background', 'evolve' ),
						'subtitle' => esc_attr__( 'Check this box if you want to enable background color for gallery post format', 'evolve' ),
						'type'     => 'switch',
						'on'       => esc_attr__( 'Enabled', 'evolve' ),
						'off'      => esc_attr__( 'Disabled', 'evolve' ),
						'default'  => 1
					),
					array(
						'id'       => 'evl_image_post_format',
						'title'    => esc_attr__( 'Image Post Format Background', 'evolve' ),
						'subtitle' => esc_attr__( 'Check this box if you want to enable background color for image post format', 'evolve' ),
						'type'     => 'switch',
						'on'       => esc_attr__( 'Enabled', 'evolve' ),
						'off'      => esc_attr__( 'Disabled', 'evolve' ),
						'default'  => 1
					),
					array(
						'id'       => 'evl_link_post_format',
						'title'    => esc_attr__( 'Link Post Format Background', 'evolve' ),
						'subtitle' => esc_attr__( 'Check this box if you want to enable background color for link post format', 'evolve' ),
						'type'     => 'switch',
						'on'       => esc_attr__( 'Enabled', 'evolve' ),
						'off'      => esc_attr__( 'Disabled', 'evolve' ),
						'default'  => 1
					),
					array(
						'id'       => 'evl_quote_post_format',
						'title'    => esc_attr__( 'Quote Post Format Background', 'evolve' ),
						'subtitle' => esc_attr__( 'Check this box if you want to enable background color for quote post format', 'evolve' ),
						'type'     => 'switch',
						'on'       => esc_attr__( 'Enabled', 'evolve' ),
						'off'      => esc_attr__( 'Disabled', 'evolve' ),
						'default'  => 1
					),
					array(
						'id'       => 'evl_status_post_format',
						'title'    => esc_attr__( 'Status Post Format Background', 'evolve' ),
						'subtitle' => esc_attr__( 'Check this box if you want to enable background color for status post format', 'evolve' ),
						'type'     => 'switch',
						'on'       => esc_attr__( 'Enabled', 'evolve' ),
						'off'      => esc_attr__( 'Disabled', 'evolve' ),
						'default'  => 1
					),
					array(
						'id'       => 'evl_video_post_format',
						'title'    => esc_attr__( 'Video Post Format Background', 'evolve' ),
						'subtitle' => esc_attr__( 'Check this box if you want to enable background color for video post format', 'evolve' ),
						'type'     => 'switch',
						'on'       => esc_attr__( 'Enabled', 'evolve' ),
						'off'      => esc_attr__( 'Disabled', 'evolve' ),
						'default'  => 1
					)
				)
			)
		);

		/*
			Social Media Links
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'      => 'evl-social-links-main-tab',
				'title'   => esc_attr__( 'Social Media Links', 'evolve' ),
				'iconfix' => 'evolve-icon evolve-icon-social-media',
				'fields'  => array(
					array(
						'id'              => 'evl_social_links',
						'title'           => esc_attr__( 'Enable Subscribe/Social Links in Header', 'evolve' ),
						'subtitle'        => esc_attr__( 'Check this box if you want to display Subscribe/Social Links in header', 'evolve' ),
						'type'            => 'switch',
						'on'              => esc_attr__( 'Enabled', 'evolve' ),
						'off'             => esc_attr__( 'Disabled', 'evolve' ),
						'default'         => 0,
						'selector'        => ".social-media-links",
						'render_callback' => 'evl_social_links'
					),
					array(
						'id'        => 'evl_social_color_scheme',
						'title'     => esc_attr__( 'Subscribe/Social Icons Color', 'evolve' ),
						'subtitle'  => esc_attr__( 'Choose the color scheme of Subscribe/Social Icons', 'evolve' ),
						'type'      => 'color',
						'default'   => '#999999',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.social-media-links a',
								'property' => 'color',
								'function' => 'css'
							)
						),
						'required'  => array(
							array( 'evl_social_links', '=', '1' )
						)
					),
					array(
						'id'        => 'evl_social_icons_size',
						'title'     => esc_attr__( 'Subscribe/Social Icons Size', 'evolve' ),
						'subtitle'  => esc_attr__( 'Choose the size of Subscribe/Social Icons', 'evolve' ),
						'type'      => 'select',
						'options'   => array(
							'1rem'   => esc_attr__( 'Normal', 'evolve' ),
							'.8rem'  => esc_attr__( 'Small', 'evolve' ),
							'1.2rem' => esc_attr__( 'Large', 'evolve' ),
							'1.4rem' => esc_attr__( 'X-Large', 'evolve' )
						),
						'default'   => '1rem',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '.social-media-links .icon',
								'property' => 'width',
								'function' => 'css'
							),
							array(
								'element'  => '.social-media-links .icon',
								'property' => 'height',
								'function' => 'css'
							)
						),
						'required'  => array(
							array( 'evl_social_links', '=', '1' )
						)
					),
					array(
						'id'       => "evl_social_box_radius",
						'title'    => esc_attr__( 'Enable Social Media Links Border/Radius', 'evolve' ),
						'subtitle' => esc_attr__( 'Select if you want to display social links with a border, border radius or disable it', 'evolve' ),
						'type'     => "select",
						'options'  => array(
							'disabled' => esc_attr__( 'Disabled', 'evolve' ),
							'0'        => '0',
							'1'        => '1',
							'2'        => '2',
							'3'        => '3',
							'4'        => '4',
							'5'        => '5',
							'6'        => '6',
							'7'        => '7',
							'8'        => '8',
							'9'        => '9',
							'10'       => '10',
							'11'       => '11',
							'12'       => '12',
							'13'       => '13',
							'14'       => '14',
							'15'       => '15',
							'16'       => '16',
							'17'       => '17',
							'18'       => '18',
							'19'       => '19',
							'20'       => '20',
							'21'       => '21',
							'22'       => '22',
							'23'       => '23',
							'24'       => '24',
							'25'       => '25'
						),
						'default'  => 'disabled',
						'required' => array(
							array( 'evl_social_links', '=', '1' )
						)
					),
					array(
						'id'       => 'evl_rss_feed',
						'title'    => esc_attr__( 'RSS Feed', 'evolve' ),
						'subtitle' => sprintf( esc_attr__( 'Insert custom RSS Feed URL, e.g. %1$s%2$s%3$s', 'evolve' ), '<strong>', $global_value['rss_url'], '</strong>' ),
						'type'     => 'text',
						'required' => array(
							array( 'evl_social_links', '=', '1' )
						)
					),
					array(
						'id'       => 'evl_newsletter',
						'title'    => esc_attr__( 'Newsletter', 'evolve' ),
						'subtitle' => sprintf( esc_attr__( 'Insert custom newsletter URL, e.g. %1$shttp://feedburner.google.com/fb/a/mailverify?uri=Example&amp;loc=en_US%2$s', 'evolve' ), '<strong>', '</strong>' ),
						'type'     => 'text',
						'required' => array(
							array( 'evl_social_links', '=', '1' )
						)
					),
					array(
						'id'       => 'evl_facebook',
						'title'    => esc_attr__( 'Facebook', 'evolve' ),
						'subtitle' => esc_attr__( 'Insert your Facebook URL', 'evolve' ),
						'type'     => 'text',
						'required' => array(
							array( 'evl_social_links', '=', '1' )
						)
					),
					array(
						'id'       => 'evl_twitter_id',
						'title'    => esc_attr__( 'Twitter', 'evolve' ),
						'subtitle' => esc_attr__( 'Insert your Twitter URL', 'evolve' ),
						'type'     => 'text',
						'required' => array(
							array( 'evl_social_links', '=', '1' )
						)
					),
					array(
						'id'       => 'evl_instagram',
						'title'    => esc_attr__( 'Instagram', 'evolve' ),
						'subtitle' => esc_attr__( 'Insert your Instagram URL', 'evolve' ),
						'type'     => 'text',
						'required' => array(
							array( 'evl_social_links', '=', '1' )
						)
					),
					array(
						'id'       => 'evl_skype',
						'title'    => esc_attr__( 'Skype', 'evolve' ),
						'subtitle' => esc_attr__( 'Insert your Skype URL', 'evolve' ),
						'type'     => 'text',
						'required' => array(
							array( 'evl_social_links', '=', '1' )
						)
					),
					array(
						'id'       => 'evl_youtube',
						'title'    => esc_attr__( 'YouTube', 'evolve' ),
						'subtitle' => esc_attr__( 'Insert your YouTube URL', 'evolve' ),
						'type'     => 'text',
						'required' => array(
							array( 'evl_social_links', '=', '1' )
						)
					),
					array(
						'id'       => 'evl_flickr',
						'title'    => esc_attr__( 'Flickr', 'evolve' ),
						'subtitle' => esc_attr__( 'Insert your Flickr URL', 'evolve' ),
						'type'     => 'text',
						'required' => array(
							array( 'evl_social_links', '=', '1' )
						)
					),
					array(
						'id'       => 'evl_linkedin',
						'title'    => esc_attr__( 'Linkedin', 'evolve' ),
						'subtitle' => esc_attr__( 'Insert your Linkedin profile URL', 'evolve' ),
						'type'     => 'text',
						'required' => array(
							array( 'evl_social_links', '=', '1' )
						)
					),
					array(
						'id'       => 'evl_googleplus',
						'title'    => esc_attr__( 'Google Plus', 'evolve' ),
						'subtitle' => esc_attr__( 'Insert your Google Plus profile URL', 'evolve' ),
						'type'     => 'text',
						'required' => array(
							array( 'evl_social_links', '=', '1' )
						)
					),
					array(
						'id'       => 'evl_pinterest',
						'title'    => esc_attr__( 'Pinterest', 'evolve' ),
						'subtitle' => esc_attr__( 'Insert your Pinterest profile URL', 'evolve' ),
						'type'     => 'text',
						'required' => array(
							array( 'evl_social_links', '=', '1' )
						)
					),
					array(
						'id'       => 'evl_tumblr',
						'title'    => esc_attr__( 'Tumblr', 'evolve' ),
						'subtitle' => esc_attr__( 'Insert your Tumblr profile URL', 'evolve' ),
						'type'     => 'text',
						'required' => array(
							array( 'evl_social_links', '=', '1' )
						)
					)
				)
			)
		);

		/*
			Bootstrap Slider
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'      => 'evl-bootstrap-slider-main-tab',
				'title'   => esc_attr__( 'Bootstrap Slider', 'evolve' ),
				'iconfix' => 'evolve-icon evolve-icon-bootstrap'
			)
		);

		/*
			-- General
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-bootstrap-slider-subsec-general-tab',
				'title'      => esc_attr__( 'General', 'evolve' ),
				'subsection' => true,
				'fields'     => array(
					array(
						'id'       => 'evl_bootstrap_slider_support',
						'title'    => esc_attr__( 'Enable Bootstrap Slider', 'evolve' ),
						'subtitle' => esc_attr__( 'Check this box if you want to enable Bootstrap Slider', 'evolve' ),
						'type'     => 'checkbox',
						'default'  => '0'
					),
					array(
						'id'       => 'evl_bootstrap_slider_front_page',
						'title'    => esc_attr__( 'Enable Bootstrap Slider On Front Page', 'evolve' ),
						'subtitle' => esc_attr__( 'Check this box if you want to enable Bootstrap Slider On Front Page', 'evolve' ),
						'type'     => 'checkbox',
						'default'  => '0',
						'required' => array(
							array( 'evl_bootstrap_slider_support', '=', '1' )
						)
					),
					array(
						'id'       => 'evl_bootstrap_slider',
						'title'    => esc_attr__( 'Bootstrap Slider On All Website', 'evolve' ),
						'subtitle' => esc_attr__( 'Display Bootstrap Slider on all website?', 'evolve' ),
						'type'     => 'checkbox',
						'default'  => '0',
						'required' => array(
							array( 'evl_bootstrap_slider_support', '=', '1' )
						)
					),
					array(
						'id'       => 'evl_bootstrap_100',
						'title'    => esc_attr__( 'Disable Bootstrap Slides 100% Width Background', 'evolve' ),
						'subtitle' => esc_attr__( 'Check this box to disable Bootstrap Slides 100% Width Background', 'evolve' ),
						'type'     => 'checkbox',
						'required' => array(
							array( 'evl_bootstrap_slider_support', '=', '1' )
						)
					),
					array(
						'id'       => 'evl_bootstrap_speed',
						'title'    => esc_attr__( 'Speed', 'evolve' ),
						'subtitle' => esc_attr__( 'Input the time between transitions (Default: 7000)', 'evolve' ),
						'type'     => 'slider',
						'min'      => '0',
						'max'      => '20000',
						'step'     => 100,
						'default'  => '7000',
						'required' => array(
							array( 'evl_bootstrap_slider_support', '=', '1' )
						)
					),
					array(
						'id'       => 'evl-bootstrap-slider-content',
						'title'    => esc_attr__( 'Bootstrap Slider Title and Description Font', 'evolve' ),
						'type'     => 'info',
						'indent'   => true,
						'required' => array(
							array( 'evl_bootstrap_slider_support', '=', '1' )
						)
					),
					array(
						'id'          => 'evl_bootstrap_slide_title_font',
						'title'       => esc_attr__( 'Slide Title Font', 'evolve' ),
						'subtitle'    => esc_attr__( 'Select the typography you want for the slide title', 'evolve' ),
						'type'        => 'typography',
						'line-height' => false,
						'text-align'  => false,
						'default'     => array(
							'font-size'   => '2.25rem',
							'font-family' => 'Roboto',
							'font-weight' => '700',
							'color'       => '#ffffff',
							'font-style'  => ''
						),
						'transport'   => 'postMessage',
						'js_vars'     => array(
							array(
								'element' => '#bootstrap-slider .carousel-caption h5'
							)
						),
						'required'    => array(
							array( 'evl_bootstrap_slider_support', '=', '1' )
						)
					),
					array(
						'id'        => 'evl_bootstrap_slide_title_font_rgba',
						'title'     => esc_attr__( 'Slide Title Font Background Color', 'evolve' ),
						'subtitle'  => esc_attr__( 'Select the background color for the slide title', 'evolve' ),
						'type'      => 'color_rgba',
						'default'   => '',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '#bootstrap-slider .carousel-caption h5',
								'function' => 'css',
								'property' => 'background'
							)
						),
						'required'  => array(
							array( 'evl_bootstrap_slider_support', '=', '1' )
						)
					),
					array(
						'id'          => 'evl_bootstrap_slide_subtitle_font',
						'title'       => esc_attr__( 'Slide Description Font', 'evolve' ),
						'subtitle'    => esc_attr__( 'Select the typography you want for the slide description', 'evolve' ),
						'type'        => 'typography',
						'line-height' => false,
						'text-align'  => false,
						'default'     => array(
							'font-size'   => '1.25rem',
							'font-family' => 'Roboto',
							'font-weight' => '100',
							'color'       => '#ffffff',
							'font-style'  => ''
						),
						'transport'   => 'postMessage',
						'js_vars'     => array(
							array(
								'element' => '#bootstrap-slider .carousel-caption p'
							)
						),
						'required'    => array(
							array( 'evl_bootstrap_slider_support', '=', '1' )
						)
					),
					array(
						'id'        => 'evl_bootstrap_slide_subtitle_font_rgba',
						'title'     => esc_attr__( 'Slide Description Font Background Color', 'evolve' ),
						'subtitle'  => esc_attr__( 'Select the background color for the slide description', 'evolve' ),
						'type'      => 'color_rgba',
						'default'   => '',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '#bootstrap-slider .carousel-caption p',
								'function' => 'css',
								'property' => 'background'
							)
						),
						'required'  => array(
							array( 'evl_bootstrap_slider_support', '=', '1' )
						)
					),
					array(
						'id'       => 'evl-bootstrap-slider-responsiveness',
						'title'    => esc_attr__( 'Bootstrap Slider Content Responsiveness', 'evolve' ),
						'type'     => 'info',
						'indent'   => true,
						'required' => array(
							array( 'evl_bootstrap_slider_support', '=', '1' )
						)
					),
					array(
						'id'       => 'evl_bootstrap_slide_title_font_responsive',
						'title'    => esc_attr__( 'Slide Title Visibility', 'evolve' ),
						'subtitle' => esc_attr__( 'Choose the MINIMUM screen resolution where the slide title will be visible', 'evolve' ),
						'type'     => 'select',
						'options'  => array(
							'always'  => esc_attr__( 'Always', 'evolve' ),
							'desktop' => esc_attr__( 'Desktop ( >= 992px ) ', 'evolve' ),
							'tablet'  => esc_attr__( 'Tablet ( >= 768px )', 'evolve' ),
							'phone'   => esc_attr__( 'Phone ( >= 576px )', 'evolve' )
						),
						'default'  => 'always',
						'required' => array(
							array( 'evl_bootstrap_slider_support', '=', '1' )
						)
					),
					array(
						'id'       => 'evl_bootstrap_slide_content_font_rgba_responsive',
						'title'    => esc_attr__( 'Slide Title and Description Font Background Color Visibility (If Set)', 'evolve' ),
						'subtitle' => esc_attr__( 'Choose the MAXIMUM screen resolution where the slide title and description background color will be visible', 'evolve' ),
						'type'     => 'select',
						'options'  => array(
							'always'  => esc_attr__( 'Always', 'evolve' ),
							'desktop' => esc_attr__( 'Smaller Than Desktop ( <= 992px ) ', 'evolve' ),
							'tablet'  => esc_attr__( 'Tablet And Smaller ( <= 768px )', 'evolve' ),
							'phone'   => esc_attr__( 'Phone And Smaller ( <= 576px )', 'evolve' )
						),
						'default'  => 'always',
						'required' => array(
							array( 'evl_bootstrap_slider_support', '=', '1' )
						)
					),
					array(
						'id'       => 'evl-bootstrap-slider-layout',
						'title'    => esc_attr__( 'Bootstrap Slider Layout', 'evolve' ),
						'type'     => 'info',
						'indent'   => true,
						'required' => array(
							array( 'evl_bootstrap_slider_support', '=', '1' )
						)
					),
					array(
						'id'       => 'evl_bootstrap_layout',
						'title'    => esc_attr__( 'Choose Bootstrap Slider Layout Type', 'evolve' ),
						'subtitle' => esc_attr__( 'Choose your Bootstrap Slider layout style', 'evolve' ),
						'type'     => 'image_select',
						'options'  => array(
							'bootstrap_left'   => $global_value['customizer_images'] . 'b1.jpg',
							'bootstrap_center' => $global_value['customizer_images'] . 'b2.jpg'
						),
						'default'  => 'bootstrap_left',
						'required' => array(
							array( 'evl_bootstrap_slider_support', '=', '1' )
						)
					)
				)
			)
		);

		/*
			-- Slides
			======================================= */

		$bootstrap_fields[] = array(
			'id'       => 'evl-bootstrap-slider-subsec-slides-tab-title',
			'title'    => esc_attr__( 'Add Slides', 'evolve' ),
			'type'     => 'info',
			'selector' => '.no-bootstrap-slider .badge',
			'indent'   => true
		);

		for ( $i = 1; $i <= 5; $i ++ ) {
			$bootstrap_fields[] = array(
				'id'       => "{$global_value['prefix']}_bootstrap_slide{$i}",
				'title'    => sprintf( esc_attr__( 'Enable Slide %d', 'evolve' ), $i ),
				'subtitle' => sprintf( esc_attr__( 'Enable or Disable Slide %d', 'evolve' ), $i ),
				'type'     => "switch",
				'default'  => "0"
			);

			$bootstrap_fields[] = array(
				'id'       => "{$global_value['prefix']}_bootstrap_slide{$i}_img",
				'title'    => sprintf( esc_attr__( 'Slide %d Image', 'evolve' ), $i ),
				'subtitle' => sprintf( esc_attr__( 'Upload an image for the Slide %d, or specify an image URL directly', 'evolve' ), $i ),
				'type'     => "media",
				'url'      => true,
				'readonly' => false,
				'required' => array(
					array(
						"{$global_value['prefix']}_bootstrap_slide{$i}",
						'=',
						'1'
					)
				),
			);

			$bootstrap_fields[] = array(
				'id'              => "{$global_value['prefix']}_bootstrap_slide{$i}_title",
				'title'           => sprintf( esc_attr__( 'Slide %d Title', 'evolve' ), $i ),
				'type'            => "text",
				'required'        => array(
					array(
						"{$global_value['prefix']}_bootstrap_slide{$i}",
						'=',
						'1'
					)
				),
				'selector'        => "#bootstrap-slider .item-{$i} h5",
				'render_callback' => "{$global_value['prefix']}_bootstrap_slide{$i}_title"
			);

			$bootstrap_fields[] = array(
				'id'              => "{$global_value['prefix']}_bootstrap_slide{$i}_desc",
				'title'           => sprintf( esc_attr__( 'Slide %d Description', 'evolve' ), $i ),
				'type'            => "textarea",
				"rows"            => 5,
				'required'        => array(
					array(
						"{$global_value['prefix']}_bootstrap_slide{$i}",
						'=',
						'1'
					)
				),
				'selector'        => "#bootstrap-slider .item-{$i} .carousel-caption p",
				'render_callback' => "{$global_value['prefix']}_bootstrap_slide{$i}_desc"
			);

			$bootstrap_fields[] = array(
				'id'              => "{$global_value['prefix']}_bootstrap_slide{$i}_button",
				'title'           => sprintf( esc_attr__( 'Slide %d Button', 'evolve' ), $i ),
				'subtitle'        => sprintf( esc_attr__( 'Default: %1$s<a class="btn d-none d-sm-inline-block" href="#">Learn more</a>%2$s', 'evolve' ), '<code>', '</code>' ),
				'type'            => "textarea",
				"rows"            => 3,
				'required'        => array(
					array(
						"{$global_value['prefix']}_bootstrap_slide{$i}",
						'=',
						'1'
					)
				),
				'selector'        => "#bootstrap-slider .item-{$i} .carousel-caption .bootstrap-button",
				'render_callback' => "{$global_value['prefix']}_bootstrap_slide{$i}_button"
			);
		}

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-bootstrap-slider-subsec-slides-tab',
				'title'      => esc_attr__( 'Slides', 'evolve' ),
				'subsection' => true,
				'fields'     => $bootstrap_fields
			)
		);

		/*
			Parallax Slider
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'      => 'evl-parallax-slider-main-tab',
				'title'   => esc_attr__( 'Parallax Slider', 'evolve' ),
				'iconfix' => 'evolve-icon evolve-icon-parallax'
			)
		);

		/*
			-- General
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-parallax-slider-subsec-general-tab',
				'title'      => esc_attr__( 'General', 'evolve' ),
				'subsection' => true,
				'fields'     => array(
					array(
						'id'       => 'evl_parallax_slider_support',
						'title'    => esc_attr__( 'Enable Parallax Slider', 'evolve' ),
						'subtitle' => esc_attr__( 'Check this box if you want to enable Parallax Slider', 'evolve' ),
						'type'     => 'checkbox',
						'default'  => '0'
					),
					array(
						'id'       => 'evl_parallax_slider_front_page',
						'title'    => esc_attr__( 'Enable Parallax Slider On Front Page', 'evolve' ),
						'subtitle' => esc_attr__( 'Check this box if you want to enable Parallax Slider On Front Page', 'evolve' ),
						'type'     => 'checkbox',
						'default'  => '0',
						'required' => array(
							array( 'evl_parallax_slider_support', '=', '1' )
						)
					),
					array(
						'id'       => 'evl_parallax_slider',
						'title'    => esc_attr__( 'Parallax Slider on All Website', 'evolve' ),
						'subtitle' => esc_attr__( 'Display Parallax Slider on all website?', 'evolve' ),
						'type'     => 'checkbox',
						'default'  => '0',
						'required' => array(
							array( 'evl_parallax_slider_support', '=', '1' )
						)
					),
					array(
						'id'       => 'evl_parallax_speed',
						'title'    => esc_attr__( 'Parallax Speed', 'evolve' ),
						'subtitle' => esc_attr__( 'Input the time between transitions (Default: 4000)', 'evolve' ),
						'type'     => 'slider',
						'min'      => '0',
						'max'      => '20000',
						'step'     => 100,
						'default'  => '7000',
						'required' => array(
							array( 'evl_parallax_slider_support', '=', '1' )
						)
					),
					array(
						'id'       => 'evl-parallax-slider-content',
						'title'    => esc_attr__( 'Parallax Slider Title and Description Font', 'evolve' ),
						'type'     => 'info',
						'indent'   => true,
						'required' => array(
							array( 'evl_parallax_slider_support', '=', '1' )
						)
					),
					array(
						'id'          => 'evl_parallax_slide_title_font',
						'title'       => esc_attr__( 'Slide Title Font', 'evolve' ),
						'subtitle'    => esc_attr__( 'Select the typography you want for the slide title', 'evolve' ),
						'type'        => 'typography',
						'line-height' => false,
						'text-align'  => false,
						'default'     => array(
							'font-size'   => '2.25rem',
							'font-family' => 'Roboto',
							'font-weight' => '700',
							'color'       => '#ffffff',
							'font-style'  => ''
						),
						'transport'   => 'postMessage',
						'js_vars'     => array(
							array(
								'element' => '#parallax-slider .carousel-caption h5'
							)
						),
						'required'    => array(
							array( 'evl_parallax_slider_support', '=', '1' )
						)
					),
					array(
						'id'        => 'evl_parallax_slide_title_font_rgba',
						'title'     => esc_attr__( 'Slide Title Font Background Color', 'evolve' ),
						'subtitle'  => esc_attr__( 'Select the background color for the slide title', 'evolve' ),
						'type'      => 'color_rgba',
						'default'   => '',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '#parallax-slider .carousel-caption h5',
								'function' => 'css',
								'property' => 'background'
							)
						),
						'required'  => array(
							array( 'evl_parallax_slider_support', '=', '1' )
						)
					),
					array(
						'id'          => 'evl_parallax_slide_subtitle_font',
						'title'       => esc_attr__( 'Slide Description Font', 'evolve' ),
						'subtitle'    => esc_attr__( 'Select the typography you want for the slide description', 'evolve' ),
						'type'        => 'typography',
						'line-height' => false,
						'text-align'  => false,
						'default'     => array(
							'font-size'   => '1.25rem',
							'font-family' => 'Roboto',
							'font-weight' => '100',
							'color'       => '#ffffff',
							'font-style'  => ''
						),
						'transport'   => 'postMessage',
						'js_vars'     => array(
							array(
								'element' => '#parallax-slider .carousel-caption p'
							)
						),
						'required'    => array(
							array( 'evl_parallax_slider_support', '=', '1' )
						)
					),
					array(
						'id'        => 'evl_parallax_slide_subtitle_font_rgba',
						'title'     => esc_attr__( 'Slide Description Font Background Color', 'evolve' ),
						'subtitle'  => esc_attr__( 'Select the background color for the slide description', 'evolve' ),
						'type'      => 'color_rgba',
						'default'   => '',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '#parallax-slider .carousel-caption p',
								'function' => 'css',
								'property' => 'background'
							)
						),
						'required'  => array(
							array( 'evl_parallax_slider_support', '=', '1' )
						)
					),
					array(
						'id'       => 'evl-parallax-slider-responsiveness',
						'title'    => esc_attr__( 'Parallax Slider Content Responsiveness', 'evolve' ),
						'type'     => 'info',
						'indent'   => true,
						'required' => array(
							array( 'evl_parallax_slider_support', '=', '1' )
						)
					),
					array(
						'id'       => 'evl_parallax_slide_title_font_responsive',
						'title'    => esc_attr__( 'Slide Title Visibility', 'evolve' ),
						'subtitle' => esc_attr__( 'Choose the MINIMUM screen resolution where the slide title will be visible', 'evolve' ),
						'type'     => 'select',
						'options'  => array(
							'always'  => esc_attr__( 'Always', 'evolve' ),
							'desktop' => esc_attr__( 'Desktop ( >= 992px ) ', 'evolve' ),
							'tablet'  => esc_attr__( 'Tablet ( >= 768px )', 'evolve' ),
							'phone'   => esc_attr__( 'Phone ( >= 576px )', 'evolve' )
						),
						'default'  => 'always',
						'required' => array(
							array( 'evl_parallax_slider_support', '=', '1' )
						)
					),
					array(
						'id'       => 'evl_parallax_slide_content_font_rgba_responsive',
						'title'    => esc_attr__( 'Slide Title and Description Font Background Color Visibility (If Set)', 'evolve' ),
						'subtitle' => esc_attr__( 'Choose the MAXIMUM screen resolution where the slide title and description background color will be visible', 'evolve' ),
						'type'     => 'select',
						'options'  => array(
							'always'  => esc_attr__( 'Always', 'evolve' ),
							'desktop' => esc_attr__( 'Smaller Than Desktop ( <= 992px ) ', 'evolve' ),
							'tablet'  => esc_attr__( 'Tablet And Smaller ( <= 768px )', 'evolve' ),
							'phone'   => esc_attr__( 'Phone And Smaller ( <= 576px )', 'evolve' )
						),
						'default'  => 'always',
						'required' => array(
							array( 'evl_parallax_slider_support', '=', '1' )
						)
					),
				)
			)
		);

		/*
			-- Slides
			======================================= */

		$parallax_fields[] = array(
			'id'       => 'evl-parallax-slider-subsec-slides-tab-title',
			'title'    => esc_attr__( 'Add Slides', 'evolve' ),
			'type'     => 'info',
			'selector' => '.no-parallax-slider .badge',
			'indent'   => true
		);

		for ( $i = 1; $i <= 5; $i ++ ) {
			$parallax_fields[] = array(
				'id'       => "{$global_value['prefix']}_show_slide{$i}",
				'title'    => sprintf( esc_attr__( 'Enable Slide %d', 'evolve' ), $i ),
				'subtitle' => sprintf( esc_attr__( 'Enable or Disable Slide %d', 'evolve' ), $i ),
				'type'     => "switch",
				'default'  => "0"
			);

			$parallax_fields[] = array(
				'id'       => "{$global_value['prefix']}_slide{$i}_img",
				'title'    => sprintf( esc_attr__( 'Slide %s Image', 'evolve' ), $i ),
				'subtitle' => sprintf( esc_attr__( 'Upload an image for the Slide %d, or specify an image URL directly', 'evolve' ), $i ),
				'type'     => "media",
				'url'      => true,
				'readonly' => false,
				'required' => array(
					array(
						"{$global_value['prefix']}_show_slide{$i}",
						'=',
						'1'
					)
				)
			);

			$parallax_fields[] = array(
				'id'              => "{$global_value['prefix']}_slide{$i}_title",
				'title'           => sprintf( esc_attr__( 'Slide %s Title', 'evolve' ), $i ),
				'subtitle'        => "",
				'type'            => "text",
				'selector'        => "#parallax-slider .item-{$i} h5",
				'render_callback' => "{$global_value['prefix']}_slide{$i}_title",
				'required'        => array(
					array(
						"{$global_value['prefix']}_show_slide{$i}",
						'=',
						'1'
					)
				)
			);

			$parallax_fields[] = array(
				'id'              => "{$global_value['prefix']}_slide{$i}_desc",
				'title'           => sprintf( esc_attr__( 'Slide %s Description', 'evolve' ), $i ),
				'subtitle'        => "",
				'type'            => "textarea",
				'selector'        => "#parallax-slider .item-{$i} .carousel-caption p",
				'render_callback' => "{$global_value['prefix']}_slide{$i}_desc",
				'required'        => array(
					array(
						"{$global_value['prefix']}_show_slide{$i}",
						'=',
						'1'
					)
				)
			);

			$parallax_fields[] = array(
				'id'              => "{$global_value['prefix']}_slide{$i}_button",
				'title'           => sprintf( esc_attr__( 'Slide %s Button', 'evolve' ), $i ),
				'subtitle'        => sprintf( esc_attr__( 'Default: %1$s<a class="btn d-none d-sm-inline-block" href="#">Learn more</a>%2$s', 'evolve' ), '<code>', '</code>' ),
				'type'            => "textarea",
				'selector'        => "#parallax-slider .item-{$i} .carousel-caption .parallax-button",
				'render_callback' => "{$global_value['prefix']}_slide{$i}_button",
				'required'        => array(
					array(
						"{$global_value['prefix']}_show_slide{$i}",
						'=',
						'1'
					)
				)
			);
		}

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'         => 'evl-parallax-slider-subsec-slides-tab',
				'title'      => esc_attr__( 'Slides', 'evolve' ),
				'subsection' => true,
				'fields'     => $parallax_fields
			)
		);

		/*
			Posts Slider
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'      => 'evl-posts-slider-main-tab',
				'title'   => esc_attr__( 'Posts Slider', 'evolve' ),
				'iconfix' => 'evolve-icon evolve-icon-posts-slider',
				'fields'  => array(
					array(
						'id'       => 'evl_carousel_slider',
						'title'    => esc_attr__( 'Enable Posts Slider', 'evolve' ),
						'subtitle' => esc_attr__( 'Check this box if you want to enable Posts Slider', 'evolve' ),
						'type'     => 'checkbox',
						'default'  => '0'
					),
					array(
						'id'       => 'evl_carousel_slider_front_page',
						'title'    => esc_attr__( 'Enable Posts Slider On Front Page', 'evolve' ),
						'subtitle' => esc_attr__( 'Check this box if you want to enable Posts Slider On Front Page', 'evolve' ),
						'type'     => 'checkbox',
						'default'  => '0',
						'required' => array(
							array( 'evl_carousel_slider', '=', '1' )
						)
					),
					array(
						'id'       => 'evl_posts_slider',
						'title'    => esc_attr__( 'Posts Slider on All Website', 'evolve' ),
						'subtitle' => esc_attr__( 'Display Posts Slider on all website?', 'evolve' ),
						'type'     => 'checkbox',
						'default'  => '0',
						'required' => array(
							array( 'evl_carousel_slider', '=', '1' )
						)
					),
					array(
						'id'       => 'evl_posts_number',
						'title'    => esc_attr__( 'Number of Posts to Display', 'evolve' ),
						'type'     => 'slider',
						'min'      => 1,
						'max'      => 5,
						'default'  => '5',
						'required' => array(
							array( 'evl_carousel_slider', '=', '1' )
						)
					),
					array(
						'id'       => 'evl_posts_slider_content',
						'title'    => esc_attr__( 'Slideshow Content', 'evolve' ),
						'subtitle' => esc_attr__( 'Choose to display latest posts or posts of a category', 'evolve' ),
						'type'     => 'select',
						'options'  => array(
							'recent'   => esc_attr__( 'Recent Posts', 'evolve' ),
							'category' => esc_attr__( 'Posts in Category', 'evolve' )
						),
						'default'  => 'recent',
						'required' => array(
							array( 'evl_carousel_slider', '=', '1' )
						)
					),
					array(
						'id'       => 'evl_posts_slider_id',
						'title'    => esc_attr__( 'Category Name(s)', 'evolve' ),
						'subtitle' => esc_attr__( 'Select post categories as content for the posts slideshow', 'evolve' ),
						'type'     => 'select',
						'multi'    => 1,
						'options'  => evolve_list_categories( 'category' ),
						'required' => array(
							array( 'evl_posts_slider_content', '=', 'category' )
						)
					),
					array(
						'id'       => 'evl_carousel_speed',
						'title'    => esc_attr__( 'Slider Speed', 'evolve' ),
						'subtitle' => esc_attr__( 'Input the time between transitions (Default: 3500)', 'evolve' ),
						'type'     => 'slider',
						'min'      => '0',
						'max'      => '20000',
						'step'     => 100,
						'default'  => '7000',
						'required' => array(
							array( 'evl_carousel_slider', '=', '1' )
						)
					),
					array(
						'id'       => 'evl_posts_slider_title_length',
						'title'    => esc_attr__( 'Slide Title Max Length', 'evolve' ),
						'subtitle' => esc_attr__( 'Sets the length of Slide Title. Default is 40', 'evolve' ),
						'type'     => 'slider',
						'min'      => '0',
						'max'      => '100',
						'default'  => '40',
						'required' => array(
							array( 'evl_carousel_slider', '=', '1' )
						)
					),
					array(
						'id'       => 'evl_posts_slider_excerpt_length',
						'title'    => esc_attr__( 'Slide Excerpt Max Length', 'evolve' ),
						'subtitle' => esc_attr__( 'Sets the length of Slide Excerpt. Default is 40', 'evolve' ),
						'type'     => 'slider',
						'min'      => '0',
						'max'      => '100',
						'default'  => '40',
						'required' => array(
							array( 'evl_carousel_slider', '=', '1' )
						)
					),
					array(
						'id'       => 'evl-carousel-slider-content',
						'title'    => esc_attr__( 'Posts Slider Title and Description Font', 'evolve' ),
						'type'     => 'info',
						'indent'   => true,
						'required' => array(
							array( 'evl_carousel_slider', '=', '1' )
						)
					),
					array(
						'id'          => 'evl_carousel_slide_title_font',
						'title'       => esc_attr__( 'Slide Title Font', 'evolve' ),
						'subtitle'    => esc_attr__( 'Select the typography you want for the slide title', 'evolve' ),
						'type'        => 'typography',
						'line-height' => false,
						'text-align'  => false,
						'default'     => array(
							'font-size'   => '2.25rem',
							'font-family' => 'Roboto',
							'font-weight' => '700',
							'color'       => '#ffffff',
							'font-style'  => ''
						),
						'transport'   => 'postMessage',
						'js_vars'     => array(
							array(
								'element' => '#posts-slider h5 a'
							)
						),
						'required'    => array(
							array( 'evl_carousel_slider', '=', '1' )
						)
					),
					array(
						'id'        => 'evl_carousel_slide_title_font_rgba',
						'title'     => esc_attr__( 'Slide Title Font Background Color', 'evolve' ),
						'subtitle'  => esc_attr__( 'Select the background color for the slide title', 'evolve' ),
						'type'      => 'color_rgba',
						'default'   => '',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '#posts-slider .carousel-caption h5',
								'function' => 'css',
								'property' => 'background'
							)
						),
						'required'  => array(
							array( 'evl_carousel_slider', '=', '1' )
						)
					),
					array(
						'id'          => 'evl_carousel_slide_subtitle_font',
						'title'       => esc_attr__( 'Slide Description Font', 'evolve' ),
						'subtitle'    => esc_attr__( 'Select the typography you want for the slide description', 'evolve' ),
						'type'        => 'typography',
						'line-height' => false,
						'text-align'  => false,
						'default'     => array(
							'font-size'   => '1.25rem',
							'font-family' => 'Roboto',
							'font-weight' => '100',
							'color'       => '#ffffff',
							'font-style'  => ''
						),
						'transport'   => 'postMessage',
						'js_vars'     => array(
							array(
								'element' => '#posts-slider p'
							)
						),
						'required'    => array(
							array( 'evl_carousel_slider', '=', '1' )
						)
					),
					array(
						'id'        => 'evl_carousel_slide_subtitle_font_rgba',
						'title'     => esc_attr__( 'Slide Description Font Background Color', 'evolve' ),
						'subtitle'  => esc_attr__( 'Select the background color for the slide description', 'evolve' ),
						'type'      => 'color_rgba',
						'default'   => '',
						'transport' => 'postMessage',
						'js_vars'   => array(
							array(
								'element'  => '#posts-slider .carousel-caption p',
								'function' => 'css',
								'property' => 'background'
							)
						),
						'required'  => array(
							array( 'evl_carousel_slider', '=', '1' )
						)
					),
					array(
						'id'       => 'evl-carousel-slider-responsiveness',
						'title'    => esc_attr__( 'Posts Slider Content Responsiveness', 'evolve' ),
						'type'     => 'info',
						'indent'   => true,
						'required' => array(
							array( 'evl_carousel_slider', '=', '1' )
						)
					),
					array(
						'id'       => 'evl_carousel_slide_title_font_responsive',
						'title'    => esc_attr__( 'Slide Title Visibility', 'evolve' ),
						'subtitle' => esc_attr__( 'Choose the MINIMUM screen resolution where the slide title will be visible', 'evolve' ),
						'type'     => 'select',
						'options'  => array(
							'always'  => esc_attr__( 'Always', 'evolve' ),
							'desktop' => esc_attr__( 'Desktop ( >= 992px )', 'evolve' ),
							'tablet'  => esc_attr__( 'Tablet ( >= 768px )', 'evolve' ),
							'phone'   => esc_attr__( 'Phone ( >= 576px )', 'evolve' )
						),
						'default'  => 'always',
						'required' => array(
							array( 'evl_carousel_slider', '=', '1' )
						)
					),
					array(
						'id'       => 'evl_carousel_slide_content_font_rgba_responsive',
						'title'    => esc_attr__( 'Slide Title and Description Font Background Color Visibility (If Set)', 'evolve' ),
						'subtitle' => esc_attr__( 'Choose the MAXIMUM screen resolution where the slide title and description background color will be visible', 'evolve' ),
						'type'     => 'select',
						'options'  => array(
							'always'  => esc_attr__( 'Always', 'evolve' ),
							'desktop' => esc_attr__( 'Smaller Than Desktop ( <= 992px )', 'evolve' ),
							'tablet'  => esc_attr__( 'Tablet And Smaller ( <= 768px )', 'evolve' ),
							'phone'   => esc_attr__( 'Phone And Smaller ( <= 576px )', 'evolve' )
						),
						'default'  => 'always',
						'required' => array(
							array( 'evl_carousel_slider', '=', '1' )
						)
					)
				)
			)
		);

		/*
			Extra
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'      => 'evl-extra-main-tab',
				'title'   => esc_attr__( 'Extra', 'evolve' ),
				'iconfix' => 'evolve-icon evolve-icon-extra',
				'fields'  => array(
					array(
						'id'      => 'evl_pos_button',
						'title'   => esc_attr__( 'Position of \'Back to Top\' Button', 'evolve' ),
						'type'    => 'select',
						'options' => array(
							'disable' => esc_attr__( 'Disabled', 'evolve' ),
							'left'    => esc_attr__( 'Left', 'evolve' ),
							'right'   => esc_attr__( 'Right', 'evolve' ),
							'middle'  => esc_attr__( 'Middle', 'evolve' )
						),
						'default' => 'right'
					),
					array(
						'id'       => 'evl_edit_post',
						'title'    => esc_attr__( 'Enable Edit Post/Page Link on The Front End', 'evolve' ),
						'subtitle' => esc_attr__( 'Check this box if you want to display edit post/page link', 'evolve' ),
						'type'     => 'checkbox',
						'default'  => '0'
					),
					array(
						'id'       => 'evl_fontawesome',
						'title'    => esc_attr__( 'Disable Font Awesome', 'evolve' ),
						'subtitle' => esc_attr__( 'Check the box to disable Font Awesome', 'evolve' ),
						'type'     => 'checkbox',
						'default'  => '0'
					),
					array(
						'id'       => 'evl_fontawesome_shims',
						'title'    => esc_attr__( 'Disable Font Awesome Conversion From Version 4 to 5', 'evolve' ),
						'subtitle' => esc_attr__( 'Check the box to disable Font Awesome conversion from version 4 to 5 if you update the icons manually', 'evolve' ),
						'type'     => 'checkbox',
						'default'  => '0',
						'required' => array(
							array( 'evl_fontawesome', '=', '0' )
						)
					)
				)
			)
		);

		/*
			WooCommerce
			======================================= */

		evolve_Kirki::setSection( $global_value['opt_name'], array(
				'id'      => 'evl-woocommerce-main-tab',
				'title'   => esc_attr__( 'WooCommerce', 'evolve' ),
				'iconfix' => 'evolve-icon evolve-icon-woocommerce',
				'fields'  => array(
					array(
						'id'              => 'evl_woocommerce_evolve_ordering',
						'title'           => esc_attr__( 'Disable WooCommerce Shop Page Ordering Boxes', 'evolve' ),
						'subtitle'        => esc_attr__( 'Check the box to disable the ordering boxes displayed on the shop page', 'evolve' ),
						'type'            => 'checkbox',
						'default'         => '0',
						'selector'        => '.catalog-ordering',
						'render_callback' => 'evl_woocommerce_evolve_ordering'
					),
					array(
						'id'              => 'evl_woocommerce_enable_order_notes',
						'title'           => esc_attr__( 'Show WooCommerce Order Notes on Checkout', 'evolve' ),
						'subtitle'        => esc_attr__( 'Check the box to show the order notes on the checkout page', 'evolve' ),
						'type'            => 'checkbox',
						'default'         => '0',
						'selector'        => '.woocommerce-additional-fields__field-wrapper',
						'render_callback' => 'evl_woocommerce_enable_order_notes'
					),
					array(
						'id'              => 'evl_woocommerce_acc_link_main_nav',
						'title'           => esc_attr__( 'Show WooCommerce My Account Link in Header', 'evolve' ),
						'subtitle'        => esc_attr__( 'Check the box to show My Account link, uncheck to disable', 'evolve' ),
						'type'            => 'checkbox',
						'default'         => '0',
						'selector'        => '.woocommerce-menu .my-account',
						'render_callback' => 'evl_woocommerce_acc_link_main_nav'
					),
					array(
						'id'              => 'evl_woocommerce_cart_link_main_nav',
						'title'           => esc_attr__( 'Show WooCommerce Cart Link in Header', 'evolve' ),
						'subtitle'        => esc_attr__( 'Check the box to show the Cart icon, uncheck to disable', 'evolve' ),
						'type'            => 'checkbox',
						'default'         => '0',
						'selector'        => '.woocommerce-menu .cart',
						'render_callback' => 'evl_woocommerce_cart_link_main_nav'
					),
					array(
						'id'              => 'evl_woo_acc_msg_1',
						'title'           => esc_attr__( 'Account Area Message 1', 'evolve' ),
						'subtitle'        => sprintf( '%s<br /><br />%s', esc_attr__( 'Insert your text and it will appear in the first message box on the account page', 'evolve' ), esc_attr__( 'Insert e.g.: Call us - <i class="fa fa-phone"></i> 7438 882 764', 'evolve' ) ),
						'type'            => 'textarea',
						'selector'        => '.myaccount_user_container .message-1',
						'render_callback' => 'evl_woo_acc_msg_1'
					),
					array(
						'id'              => 'evl_woo_acc_msg_2',
						'title'           => esc_attr__( 'Account Area Message 2', 'evolve' ),
						'subtitle'        => sprintf( '%s<br /><br />%s', esc_attr__( 'Insert your text and it will appear in the second message box on the account page', 'evolve' ), esc_attr__( 'Insert e.g.: Email us - <i class="fa fa-envelope"></i> contact@example.com', 'evolve' ) ),
						'type'            => 'textarea',
						'selector'        => '.myaccount_user_container .message-2',
						'render_callback' => 'evl_woo_acc_msg_2'
					)
				)
			)
		);

	}
}