<?php
/**
 * IWeb Pathology Theme Customizer
 *
 * @package IWeb_Pathology
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function iweb_pathology_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'iweb_pathology_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'iweb_pathology_customize_partial_blogdescription',
		) );
	}
	// ----------------------------------------------------------------------
	// Add Theme Options Panel
	$wp_customize->add_panel('iweb_pathology_options_panel',array(
			'priority' => '51',
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => esc_html__( 'Theme Options','iweb-pathology' ),
	));

	// Theme Color ----------------------------------

		   $wp_customize->add_section('iwebpatho_themecolor_sec',array(
				'title' => __( 'Theme Color','iweb-pathology' ),
				'priority' => '10',
				'capability' => 'edit_theme_options',
				'panel' => 'iweb_pathology_options_panel',
		   ));

					$wp_customize->add_setting('iweb_theme_color', array(
						'default' => '#00bd86',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'iwebpatho_color_sanitize_radio',
					));

					$wp_customize->add_control('iweb_theme_color',array(
						'type' => 'radio',
						'label' => __( 'Select Theme Color', 'iweb-pathology' ),
						'section' => 'iwebpatho_themecolor_sec',
						'choices' => array(
							'#00bd86' => __( 'Green','iweb-pathology' ),
							'#0db7c4' => __( 'Blue','iweb-pathology' ),
							'#ff9933' => __( 'Orange','iweb-pathology' ),
							),
					));

	// Top Bar ----------------------------------

		   $wp_customize->add_section('iwebpatho_topbar',array(
				'title' => __( 'Top Bar','iweb-pathology' ),
				'priority' => '10',
				'capability' => 'edit_theme_options',
				'panel' => 'iweb_pathology_options_panel',
		   ));

	// Display
					 $wp_customize->add_setting('iwebpatho_display_topbar', array(
						 'default' => '0',
						 'sanitize_callback' => 'iwebpatho_sanitize_radio',
					 ));

					$wp_customize->add_control('iwebpatho_display_topbar',array(
						'type' => 'radio',
						'label' => __( 'Display Top Bar Section', 'iweb-pathology' ),
						'section' => 'iwebpatho_topbar',
						'choices' => array(
							'1' => __( 'Enable','iweb-pathology' ),
							'0' => __( 'Disable','iweb-pathology' ),
							),
					));
		   // Address
					$wp_customize->add_setting('iwebpatho_topbar_add', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
					));

					$wp_customize->add_control('iwebpatho_topbar_add',array(
						'type' => 'text',
						'description' => __( 'Location','iweb-pathology' ),
						'section' => 'iwebpatho_topbar',
						'setting' => 'iwebpatho_topbar_add',
					));
		   // Tel
					$wp_customize->add_setting('iwebpatho_topbar_tel', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
					));

					$wp_customize->add_control('iwebpatho_topbar_tel',array(
						'type' => 'text',
						'description' => __( 'Phone','iweb-pathology' ),
						'section' => 'iwebpatho_topbar',
						'setting' => 'iwebpatho_topbar_tel',
					));
		  // Button Text
					$wp_customize->add_setting('iwebpatho_topbar_btntxt', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
					));

					$wp_customize->add_control('iwebpatho_topbar_btntxt',array(
						'type' => 'text',
						'description' => __( 'Button Text','iweb-pathology' ),
						'section' => 'iwebpatho_topbar',
						'setting' => 'iwebpatho_topbar_btntxt',
					));
		  // Button URL
					$wp_customize->add_setting('iwebpatho_topbar_btnurl', array(
						'default' => '#',
						'transport' => 'postMessage',
						'sanitize_callback' => 'esc_url_raw',
					));

					$wp_customize->add_control('iwebpatho_topbar_btnurl',array(
						'type' => 'url',
						'description' => __( 'Button URL','iweb-pathology' ),
						'section' => 'iwebpatho_topbar',
						'setting' => 'iwebpatho_topbar_btnurl',
					));
		// Social Links
				   $wp_customize->add_setting('iwebpatho_top_social_fb_url', array(
						'default' => '#',
						'transport' => 'postMessage',
						'sanitize_callback' => 'esc_url_raw',
				   ));

					$wp_customize->add_control('iwebpatho_top_social_fb_url',array(
						'type' => 'url',
						'label' => __( 'Social Links','iweb-pathology' ),
						'description' => __( 'Facebook','iweb-pathology' ),
						'section' => 'iwebpatho_topbar',
						'setting' => 'iwebpatho_top_social_fb_url',
					));
				  $wp_customize->add_setting('iwebpatho_top_social_tw_url', array(
						'default' => '#',
						'transport' => 'postMessage',
						'sanitize_callback' => 'esc_url_raw',
				  ));

					$wp_customize->add_control('iwebpatho_top_social_tw_url',array(
						'type' => 'url',
						'description' => __( 'Twitter','iweb-pathology' ),
						'section' => 'iwebpatho_topbar',
						'setting' => 'iwebpatho_top_social_tw_url',
					));
				  $wp_customize->add_setting('iwebpatho_top_social_inst_url', array(
						'default' => '#',
						'transport' => 'postMessage',
						'sanitize_callback' => 'esc_url_raw',
				  ));

					$wp_customize->add_control('iwebpatho_top_social_inst_url',array(
						'type' => 'url',
						'description' => __( 'Instagram','iweb-pathology' ),
						'section' => 'iwebpatho_topbar',
						'setting' => 'iwebpatho_top_social_inst_url',
					));
				  $wp_customize->add_setting('iwebpatho_top_social_in_url', array(
						'default' => '#',
						'transport' => 'postMessage',
						'sanitize_callback' => 'esc_url_raw',
				  ));

					$wp_customize->add_control('iwebpatho_top_social_in_url',array(
						'type' => 'url',
						'description' => __( 'Linkedin','iweb-pathology' ),
						'section' => 'iwebpatho_topbar',
						'setting' => 'iwebpatho_top_social_in_url',
					));

	// Slider ----------------------------------

			$wp_customize->add_section('iwebpatho_slider',array(
				'title' => __( 'Slider','iweb-pathology' ),
				'priority' => '20',
				'capability' => 'edit_theme_options',
				'panel' => 'iweb_pathology_options_panel',
			));

					  $wp_customize->add_setting('iwebpatho_display_mslider', array(
						  'default' => '1',
						  'sanitize_callback' => 'iwebpatho_sanitize_radio',
					  ));

					$wp_customize->add_control('iwebpatho_display_mslider',array(
						'type' => 'radio',
						'label' => __( 'Display Slider or A Static Image', 'iweb-pathology' ),
						'description' => __( 'Recommended Size for Featured Image in Post is 1300px x 500px','iweb-pathology' ),
						'section' => 'iwebpatho_slider',
						'choices' => array(
							'1' => __( 'A Static Image','iweb-pathology' ),
							'0' => __( 'Slider','iweb-pathology' ),
						),
					));

		   //select category
					$wp_customize->add_setting('iwebpatho_slider_category',array(
						'default' => '',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'absint',
					));

					$wp_customize->add_control( new Iwebpatho_WP_Customize_Category_Control( $wp_customize,'iwebpatho_slider_category', array(
						'label' => __( 'Select a category to show in slider','iweb-pathology' ),
						'section' => 'iwebpatho_slider',
						'setting' => 'iwebpatho_slider_category',
					)));


	// ------------------------------- About Us
		   $wp_customize->add_section('iwebpatho_aboutus',array(
				'title' => __( 'About Us','iweb-pathology' ),
				'priority' => '30',
				'capability' => 'edit_theme_options',
				'panel' => 'iweb_pathology_options_panel',
		   ));

	// Display
					 $wp_customize->add_setting('iwebpatho_display_abtus', array(
						 'default' => '1',
						 'sanitize_callback' => 'iwebpatho_sanitize_radio',
					 ));

					$wp_customize->add_control('iwebpatho_display_abtus',array(
						'type' => 'radio',
						'label' => __( 'Display About Us Section', 'iweb-pathology' ),
						'section' => 'iwebpatho_aboutus',
						'choices' => array(
							'1' => __( 'Enable','iweb-pathology' ),
							'0' => __( 'Disable','iweb-pathology' ),
							),
					));

	// Working Hours -Title
				   $wp_customize->add_setting('iwebpatho_whours_title', array(
						'default' => __( 'Working Hours','iweb-pathology' ),
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
				   ));
					$wp_customize->add_control( 'iwebpatho_whours_title',array(
						'type' => 'text',
						'label' => __( 'Working Hours','iweb-pathology' ),
						'description' => __( 'Title','iweb-pathology' ),
						'section' => 'iwebpatho_aboutus',
						'setting' => 'iwebpatho_whours_title',
					));
			// Description
				  $wp_customize->add_setting('iwebpatho_whours_desc', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
				  ));
					$wp_customize->add_control( 'iwebpatho_whours_desc',array(
						'type' => 'text',
						'description' => __( 'Description','iweb-pathology' ),
						'section' => 'iwebpatho_aboutus',
						'setting' => 'iwebpatho_whours_desc',
					));
			// Days 1
				 $wp_customize->add_setting('iwebpatho_whours_days1', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
				 ));
					$wp_customize->add_control( 'iwebpatho_whours_days1',array(
						'type' => 'text',
						'description' => __( 'Day 1','iweb-pathology' ),
						'section' => 'iwebpatho_aboutus',
						'setting' => 'iwebpatho_whours_days1',
					));
			// Time 1
				 $wp_customize->add_setting('iwebpatho_whours_time1', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
				 ));
					$wp_customize->add_control( 'iwebpatho_whours_time1',array(
						'type' => 'text',
						'description' => __( 'Time for Day 1','iweb-pathology' ),
						'section' => 'iwebpatho_aboutus',
						'setting' => 'iwebpatho_whours_time1',
					));
		   // Days 2
				 $wp_customize->add_setting('iwebpatho_whours_days2', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
				 ));
					$wp_customize->add_control( 'iwebpatho_whours_days2',array(
						'type' => 'text',
						'description' => __( 'Day 2','iweb-pathology' ),
						'section' => 'iwebpatho_aboutus',
						'setting' => 'iwebpatho_whours_days2',
					));
			// Time 2
				 $wp_customize->add_setting('iwebpatho_whours_time2', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
				 ));
					$wp_customize->add_control( 'iwebpatho_whours_time2',array(
						'type' => 'text',
						'description' => __( 'Time for Day 2','iweb-pathology' ),
						'section' => 'iwebpatho_aboutus',
						'setting' => 'iwebpatho_whours_time2',
					));
		   // Days 3
				 $wp_customize->add_setting('iwebpatho_whours_days3', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
				 ));
					$wp_customize->add_control( 'iwebpatho_whours_days3',array(
						'type' => 'text',
						'description' => __( 'Day 3','iweb-pathology' ),
						'section' => 'iwebpatho_aboutus',
						'setting' => 'iwebpatho_whours_days3',
					));
			// Time 1
				 $wp_customize->add_setting('iwebpatho_whours_time3', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
				 ));
					$wp_customize->add_control( 'iwebpatho_whours_time3',array(
						'type' => 'text',
						'description' => __( 'Time for Day 3','iweb-pathology' ),
						'section' => 'iwebpatho_aboutus',
						'setting' => 'iwebpatho_whours_time3',
					));
		   // Days 4
				 $wp_customize->add_setting('iwebpatho_whours_days4', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
				 ));
					$wp_customize->add_control( 'iwebpatho_whours_days4',array(
						'type' => 'text',
						'description' => __( 'Day 4','iweb-pathology' ),
						'section' => 'iwebpatho_aboutus',
						'setting' => 'iwebpatho_whours_days4',
					));
			// Time 1
				 $wp_customize->add_setting('iwebpatho_whours_time4', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
				 ));
					$wp_customize->add_control( 'iwebpatho_whours_time4',array(
						'type' => 'text',
						'description' => __( 'Time for Day 4','iweb-pathology' ),
						'section' => 'iwebpatho_aboutus',
						'setting' => 'iwebpatho_whours_time4',
					));
		//select category for About Us
				$wp_customize->add_setting('iwebpatho_aboutus_catg',array(
					'default' => '0',
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'absint',
				));

				$wp_customize->add_control( 'iwebpatho_aboutus_catg',array(
					'type' => 'dropdown-pages',
					'label' => __( 'Select a Page','iweb-pathology' ),
					'section' => 'iwebpatho_aboutus',
					'setting' => 'iwebpatho_aboutus_catg',
				));

	// Health Packages -------------------------------

			 $wp_customize->add_section('iwebpatho_package',array(
				 'title' => __( 'Health Packages','iweb-pathology' ),
				 'description' => __( 'Visit <a target="_blank" href="http://www.iwebdm.com/wordpress-themes/documentation-pathology/">Documentation</a> for creating this section.', 'iweb-pathology' ),
				 'priority' => '35',
				 'capability' => 'edit_theme_options',
				 'panel' => 'iweb_pathology_options_panel',
			 ));

					$wp_customize->add_setting('iwebpatho_display_package', array(
						'default' => '1',
						'sanitize_callback' => 'iwebpatho_sanitize_radio',
					));

					$wp_customize->add_control('iwebpatho_display_package',array(
						'type' => 'radio',
						'label' => __( 'Display Package Section', 'iweb-pathology' ),
						'section' => 'iwebpatho_package',
						'choices' => array(
							'1' => __( 'Enable','iweb-pathology' ),
							'0' => __( 'Disable','iweb-pathology' ),
							),
					));
			// Main Title
					$wp_customize->add_setting('iwebpatho_package_mtitle', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
					));

					$wp_customize->add_control( 'iwebpatho_package_mtitle',array(
						'type' => 'text',
						'label' => __( 'Main Title','iweb-pathology' ),
						'section' => 'iwebpatho_package',
						'setting' => 'iwebpatho_package_mtitle',
					));
		 //select category
					$wp_customize->add_setting('iwebpatho_hpckg_category',array(
						'default' => '0',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'absint',
					));

					$wp_customize->add_control( new Iwebpatho_WP_Customize_Category_Control( $wp_customize,'iwebpatho_hpckg_category', array(
						'label' => __( 'Select a Category for Packages','iweb-pathology' ),
						'section' => 'iwebpatho_package',
						'setting' => 'iwebpatho_hpckg_category',
					)));
		// Page url
					$wp_customize->add_setting('iwebpatho_package_btnlink', array(
						'default' => '#',
						'sanitize_callback' => 'esc_url_raw',
					));
					$wp_customize->add_control('iwebpatho_package_btnlink',array(
						'type' => 'url',
						'label' => __( 'URL for Button', 'iweb-pathology' ),
						'section' => 'iwebpatho_package',
						'setting' => 'iwebpatho_package_btnlink',
					));

	// -------------------------------- Featured Test Profiles

		  $wp_customize->add_section('iwebpatho_testprofile',array(
				'title' => __( 'Featured Test Profiles','iweb-pathology' ),
				'description' => __( 'Visit <a target="_blank" href="http://www.iwebdm.com/wordpress-themes/documentation-pathology/">Documentation</a> for creating this section.', 'iweb-pathology' ),
				'priority' => '40',
				'capability' => 'edit_theme_options',
				'panel' => 'iweb_pathology_options_panel',
		  ));

			// Display
					 $wp_customize->add_setting('iwebpatho_display_ftp', array(
						 'default' => '1',
						 'sanitize_callback' => 'iwebpatho_sanitize_radio',
					 ));

					$wp_customize->add_control('iwebpatho_display_ftp',array(
						'type' => 'radio',
						'label' => __( 'Display Featured Test Profiles Section', 'iweb-pathology' ),
						'section' => 'iwebpatho_testprofile',
						'choices' => array(
							'1' => __( 'Enable','iweb-pathology' ),
							'0' => __( 'Disable','iweb-pathology' ),
							),
					));
	   // Image
				  $wp_customize->add_setting( 'iwebpatho_testprofile_img', array(
						'default' => '',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'iwebpatho_sanitize_file',
				  ));

				   $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'iwebpatho_testprofile_img', array(
						'label' => __( 'Image', 'iweb-pathology' ),
						'description' => __( 'Recommended Size- 600x900px', 'iweb-pathology' ),
						'section' => 'iwebpatho_testprofile',
						'setting' => 'iwebpatho_testprofile_img',
				   )));
		// Title 1
					$wp_customize->add_setting('iwebpatho_testprofile_title', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
					));

					$wp_customize->add_control( 'iwebpatho_testprofile_title',array(
						'type' => 'text',
						'label' => __( 'Title','iweb-pathology' ),
						'section' => 'iwebpatho_testprofile',
						'setting' => 'iwebpatho_testprofile_title',
					));
	   // Description
					$wp_customize->add_setting('iwebpatho_testprofile_desc', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
					));

					$wp_customize->add_control( 'iwebpatho_testprofile_desc',array(
						'type' => 'text',
						'label' => __( 'Description','iweb-pathology' ),
						'section' => 'iwebpatho_testprofile',
						'setting' => 'iwebpatho_testprofile_desc',
					));
		 //select category
					$wp_customize->add_setting('iwebpatho_tpf_category',array(
						'default' => '0',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'absint',
					));

					$wp_customize->add_control( new Iwebpatho_WP_Customize_Category_Control( $wp_customize,'iwebpatho_tpf_category', array(
						'label' => __( 'Select a Category for Featured Test','iweb-pathology' ),
						'section' => 'iwebpatho_testprofile',
						'setting' => 'iwebpatho_tpf_category',
					)));
	   // Button Text
					$wp_customize->add_setting('iwebpatho_testprofile_btntxt', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
					));

					$wp_customize->add_control( 'iwebpatho_testprofile_btntxt',array(
						'type' => 'text',
						'label' => __( 'Button','iweb-pathology' ),
						'description' => __( 'Button Text','iweb-pathology' ),
						'section' => 'iwebpatho_testprofile',
						'setting' => 'iwebpatho_testprofile_btntxt',
					));
		// Button link
					$wp_customize->add_setting('iwebpatho_testprofile_btnlink', array(
						'default' => '#',
						'sanitize_callback' => 'esc_url_raw',
					));
					$wp_customize->add_control('iwebpatho_testprofile_btnlink',array(
						'type' => 'url',
						'description' => __( 'Button Link', 'iweb-pathology' ),
						'section' => 'iwebpatho_testprofile',
						'setting' => 'iwebpatho_testprofile_btnlink',
					));

	// Home Collection --------------------------------

			   $wp_customize->add_section('iwebpatho_homcoll',array(
				   'title' => __( 'Home Collection','iweb-pathology' ),
				   'priority' => '50',
				   'capability' => 'edit_theme_options',
				   'panel' => 'iweb_pathology_options_panel',
			   ));

			// Display
					 $wp_customize->add_setting('iwebpatho_display_homcoll', array(
						 'default' => '1',
						 'sanitize_callback' => 'iwebpatho_sanitize_radio',
					 ));

					$wp_customize->add_control('iwebpatho_display_homcoll',array(
						'type' => 'radio',
						'label' => __( 'Display Home Collection Section', 'iweb-pathology' ),
						'section' => 'iwebpatho_homcoll',
						'choices' => array(
							'1' => __( 'Enable','iweb-pathology' ),
							'0' => __( 'Disable','iweb-pathology' ),
							),
					));
	// Title Phone no
				   $wp_customize->add_setting('iwebpatho_homcoll_title', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
				   ));

					$wp_customize->add_control( 'iwebpatho_homcoll_title',array(
						'type' => 'text',
						'label' => __( 'Title','iweb-pathology' ),
						'section' => 'iwebpatho_homcoll',
						'setting' => 'iwebpatho_homcoll_title',
					));
	// Desc
				   $wp_customize->add_setting('iwebpatho_homcoll_desc', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
				   ));

					$wp_customize->add_control( 'iwebpatho_homcoll_desc',array(
						'type' => 'text',
						'label' => __( 'Description','iweb-pathology' ),
						'section' => 'iwebpatho_homcoll',
						'setting' => 'iwebpatho_homcoll_desc',
					));
	// Button Text
				   $wp_customize->add_setting('iwebpatho_homcoll_btntxt', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
				   ));

					$wp_customize->add_control( 'iwebpatho_homcoll_btntxt',array(
						'type' => 'text',
						'label' => __( 'Button Text','iweb-pathology' ),
						'section' => 'iwebpatho_homcoll',
						'setting' => 'iwebpatho_homcoll_btntxt',
					));
	 // Button link
					$wp_customize->add_setting('iwebpatho_homcoll_btnlink', array(
						'default' => '',
						'capability' => 'edit_theme_options',
						'transport' => 'postMessage',
						'sanitize_callback' => 'esc_url_raw',
					));
					$wp_customize->add_control('iwebpatho_homcoll_btnlink',array(
						'type' => 'url',
						'description' => __( 'Button Link', 'iweb-pathology' ),
						'section' => 'iwebpatho_homcoll',
						'setting' => 'iwebpatho_homcoll_btnlink',
					));

	// Our Doctors --------------------------------

			$wp_customize->add_section('iwebpatho_ourdoc',array(
				'title' => __( 'Our Doctors','iweb-pathology' ),
				'description' => __( 'Visit <a target="_blank" href="http://www.iwebdm.com/wordpress-themes/documentation-pathology/">Documentation</a> for creating this section.', 'iweb-pathology' ),
				'priority' => '60',
				'capability' => 'edit_theme_options',
				'panel' => 'iweb_pathology_options_panel',
			));

			// Display
					 $wp_customize->add_setting('iwebpatho_display_ourdoc', array(
						 'default' => '1',
						 'sanitize_callback' => 'iwebpatho_sanitize_radio',
					 ));

					$wp_customize->add_control('iwebpatho_display_ourdoc',array(
						'type' => 'radio',
						'label' => __( 'Display Our Doctors Section', 'iweb-pathology' ),
						'section' => 'iwebpatho_ourdoc',
						'choices' => array(
							'1' => __( 'Enable','iweb-pathology' ),
							'0' => __( 'Disable','iweb-pathology' ),
							),
					));

	// Title
				   $wp_customize->add_setting('iwebpatho_ourdoc_title', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
				   ));

					$wp_customize->add_control( 'iwebpatho_ourdoc_title',array(
						'type' => 'text',
						'label' => __( 'Title','iweb-pathology' ),
						'section' => 'iwebpatho_ourdoc',
						'setting' => 'iwebpatho_ourdoc_title',
					));
	// Description
				   $wp_customize->add_setting('iwebpatho_ourdoc_desc', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
				   ));

					$wp_customize->add_control( 'iwebpatho_ourdoc_desc',array(
						'type' => 'text',
						'label' => __( 'Description','iweb-pathology' ),
						'section' => 'iwebpatho_ourdoc',
						'setting' => 'iwebpatho_ourdoc_desc',
					));
	//select category
					$wp_customize->add_setting('iwebpatho_doctors_category',array(
						'default' => '0',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'absint',
					));

					$wp_customize->add_control( new Iwebpatho_WP_Customize_Category_Control( $wp_customize,'iwebpatho_doctors_category', array(
						'label' => __( 'Select a Category for Doctors','iweb-pathology' ),
						'section' => 'iwebpatho_ourdoc',
						'setting' => 'iwebpatho_doctors_category',
					)));

	// Testimonials ------------------------------------------

		   $wp_customize->add_section('iwebpatho_tmonials_section',array(
				'title' => __( 'Testimonials','iweb-pathology' ),
				'description' => __( 'Visit <a target="_blank" href="http://www.iwebdm.com/wordpress-themes/documentation-pathology/">Documentation</a> for creating this section.', 'iweb-pathology' ),
				'priority' => '65',
				'capability' => 'edit_theme_options',
				'panel' => 'iweb_pathology_options_panel',
		   ));

		   // Display
					 $wp_customize->add_setting('iwebpatho_display_tstmon', array(
						 'default' => '1',
						 'sanitize_callback' => 'iwebpatho_sanitize_radio',
					 ));

					$wp_customize->add_control('iwebpatho_display_tstmon',array(
						'type' => 'radio',
						'label' => __( 'Display Testimonials Section', 'iweb-pathology' ),
						'section' => 'iwebpatho_tmonials_section',
						'choices' => array(
							'1' => __( 'Enable','iweb-pathology' ),
							'0' => __( 'Disable','iweb-pathology' ),
							),
					));
		   // BG Image
					$wp_customize->add_setting( 'iwebpatho_tmonials_bgimg', array(
							'default' => '',
							'capability' => 'edit_theme_options',
							'sanitize_callback' => 'iwebpatho_sanitize_file',
					));

					   $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'iwebpatho_tmonials_bgimg', array(
							'label' => __( 'Background Image- Recommended Size- 1600x900px', 'iweb-pathology' ),
							'section' => 'iwebpatho_tmonials_section',
							'setting' => 'iwebpatho_tmonials_bgimg',
					   )));

	// Title
					$wp_customize->add_setting('iwebpatho_tmonials_title', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
					));

					$wp_customize->add_control('iwebpatho_tmonials_title',array(
						'type' => 'text',
						'label' => __( 'Title','iweb-pathology' ),
						'section' => 'iwebpatho_tmonials_section',
						'setting' => 'iwebpatho_tmonials_title',
					));
	// Description
					$wp_customize->add_setting('iwebpatho_tmonials_desc', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
					));

					$wp_customize->add_control('iwebpatho_tmonials_desc',array(
						'type' => 'text',
						'label' => __( 'Description','iweb-pathology' ),
						'section' => 'iwebpatho_tmonials_section',
						'setting' => 'iwebpatho_tmonials_desc',
					));
		   //select category
					$wp_customize->add_setting('iwebpatho_testimonials_category',array(
						'default' => '0',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'absint',
					));

					$wp_customize->add_control( new Iwebpatho_WP_Customize_Category_Control( $wp_customize,'iwebpatho_testimonials_category', array(
						'label' => __( 'Select a Category for testimonials','iweb-pathology' ),
						'section' => 'iwebpatho_tmonials_section',
						'setting' => 'iwebpatho_testimonials_category',
					)));

	// Latest News Section ------------------------------------------

		   $wp_customize->add_section('iwebpatho_letestnews_section',array(
				'title' => __( 'Latest News Section','iweb-pathology' ),
				'priority' => '70',
				'capability' => 'edit_theme_options',
				'panel' => 'iweb_pathology_options_panel',
		   ));
					$wp_customize->add_setting('iwebpatho_display_letestnews', array(
						'default' => '1',
						'sanitize_callback' => 'iwebpatho_sanitize_radio',
					));

					$wp_customize->add_control('iwebpatho_display_letestnews',array(
						'type' => 'radio',
						'label' => __( 'Display Latest News Section', 'iweb-pathology' ),
						'section' => 'iwebpatho_letestnews_section',
						'choices' => array(
							'1' => __( 'Enable','iweb-pathology' ),
							'0' => __( 'Disable','iweb-pathology' ),
							),
					));
			// Title
					$wp_customize->add_setting('iwebpatho_latestnews_title', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
					));

					$wp_customize->add_control('iwebpatho_latestnews_title',array(
						'type' => 'text',
						'label' => __( 'Title','iweb-pathology' ),
						'section' => 'iwebpatho_letestnews_section',
						'setting' => 'iwebpatho_latestnews_title',
					));
			// Description
					$wp_customize->add_setting('iwebpatho_latestnews_desc', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
					));

					$wp_customize->add_control('iwebpatho_latestnews_desc',array(
						'type' => 'text',
						'label' => __( 'Description','iweb-pathology' ),
						'section' => 'iwebpatho_letestnews_section',
						'setting' => 'iwebpatho_latestnews_desc',
					));
			//select category
					$wp_customize->add_setting('iwebpatho_letestnews_category',array(
						'default' => '0',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'absint',
					));

					$wp_customize->add_control( new Iwebpatho_WP_Customize_Category_Control( $wp_customize,'iwebpatho_letestnews_category', array(
						'label' => __( 'Select a Category with minimum 3 posts','iweb-pathology' ),
						'section' => 'iwebpatho_letestnews_section',
						'setting' => 'iwebpatho_letestnews_category',
					)));

	// Footer BG Image ------------------------------------------

			   $wp_customize->add_section('iwebpatho_footer_bg',array(
				   'title' => __( 'Footer Section','iweb-pathology' ),
				   'priority' => '85',
				   'capability' => 'edit_theme_options',
				   'panel' => 'iweb_pathology_options_panel',
			   ));

	   // Copyright Text
				$wp_customize->add_setting('iweb_copyright_text', array(
						'default' => '',
						'transport' => 'postMessage',
						'sanitize_callback' => 'sanitize_text_field',
				));

				$wp_customize->add_control('iweb_copyright_text',array(
						'type' => 'text',
						'label' => __( 'Footer Copyright Text','iweb-pathology' ),
						'section' => 'iwebpatho_footer_bg',
						'setting' => 'iweb_copyright_text',
				));

	// BG Image
				  $wp_customize->add_setting('iwebpatho_footer_bgimg', array(
						'default' => '',
						'capability' => 'edit_theme_options',
						'sanitize_callback' => 'iwebpatho_sanitize_file',
				  ));

				   $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'iwebpatho_footer_bgimg', array(
						'label' => __( 'Background Image for Footer Widgets', 'iweb-pathology' ),
						'description' => __( 'Recommended Size- 1600x600px', 'iweb-pathology' ),
						'section' => 'iwebpatho_footer_bg',
						'setting' => 'iwebpatho_footer_bgimg',
				   )));

	// ----------------------------------------------------------------------

}
add_action( 'customize_register', 'iweb_pathology_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function iweb_pathology_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function iweb_pathology_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function iweb_pathology_customize_preview_js() {
	wp_enqueue_script( 'iweb-pathology-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'iweb_pathology_customize_preview_js' );



function iwebpatho_sanitize_dropdown_pages( $page_id, $setting ) {
	// Ensure $input is an absolute integer.
	$page_id = absint( $page_id );

	// If $page_id is an ID of a published page, return it; otherwise, return the default.
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}


