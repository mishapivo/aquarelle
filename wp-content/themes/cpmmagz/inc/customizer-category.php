<?php
	//customizer for category section
if(!function_exists('cpmmagz_category_customizer')):
	function cpmmagz_category_customizer( $wp_customize ) {
		$wp_customize->add_section(
			'category_section',
			array(
				'title' =>esc_attr( __('Bottom Mid Section', 'cpmmagz' ) ),
				'priority' => 7,
                'panel'    => 'cpm_theme_options_panel',
				)
			);
			/*showcase single post*/

                    // Add color scheme setting and control.
                    $wp_customize->add_setting( 'showcase-single-category1'  , array(
                        'default'           => 'None',
                        'capability'     => 'edit_theme_options',
                       'sanitize_callback' => 'esc_attr'
                    ) );

                    $wp_customize->add_control( new WP_Customize_Category_Control(
                                                $wp_customize,
                                                'showcase-single-category1' ,
                                                array(
                                                    'label'    => esc_attr( __( 'Select Category', 'cpmmagz' ) ),
                                                    'section'  => 'category_section',
                                                    'type'     => 'select',
                                                    )
                     ));

                         /*showcase single post*/


                    // Add color scheme setting and control.
                    $wp_customize->add_setting( 'showcase-single-category2'  , array(
                        'default'           => 'None',
                        'capability'     => 'edit_theme_options',
                       'sanitize_callback' => 'esc_attr'
                    ) );

                    $wp_customize->add_control( new WP_Customize_Category_Control(
                                                $wp_customize,'showcase-single-category2' , array(
                        'label'    => esc_attr( __( 'Select Category', 'cpmmagz' ) ),
                        'section'  => 'category_section',
                        'type'     => 'select',
                    ) ));

                    /*showcase single post*/


                    // Add color scheme setting and control.
                    $wp_customize->add_setting( 'showcase-single-category3'  , array(
                        'default'           => 'None',
                        'capability'     => 'edit_theme_options',
                        'sanitize_callback' => 'esc_attr'
                    ) );

                    $wp_customize->add_control( new WP_Customize_Category_Control(
                                                $wp_customize,'showcase-single-category3' , array(
                        'label'    => esc_attr( __( 'Select Category', 'cpmmagz') ),
                        'section'  => 'category_section',
                        'type'     => 'select',
                    ) ));

                    /*showcase single post*/


                        // Add color scheme setting and control.
                        $wp_customize->add_setting( 'showcase-single-category4'  , array(
                            'default'           => 'None',
                            'capability'     => 'edit_theme_options',
                            'sanitize_callback' => 'esc_attr'
                        ) );

                    $wp_customize->add_control( new WP_Customize_Category_Control(
                                                $wp_customize,'showcase-single-category4' , array(
                        'label'    => esc_attr( __( 'Select Category', 'cpmmagz' ) ),
                        'section'  => 'category_section',
                        'type'     => 'select',
                    ) ));

            	}
	add_action( 'customize_register', 'cpmmagz_category_customizer');
endif;