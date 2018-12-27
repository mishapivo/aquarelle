<?php
/**
 * Enrollment Theme Customizer panel for Footer Settings.
 *
 * @package CodeVibrant
 * @subpackage Enrollment
 * @since 1.0.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

add_action( 'customize_register', 'enrollment_footer_panel_register' );

if( ! function_exists( 'enrollment_footer_panel_register' ) ):
function enrollment_footer_panel_register( $wp_customize ) {

	/**
	 * Footer Settings Panel on customizer
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_panel(
        'enrollment_footer_settings_panel', 
        	array(
        		'priority'       => 30,
            	'capability'     => 'edit_theme_options',
            	'theme_supports' => '',
            	'title'          => __( 'Footer Settings', 'enrollment' ),
            ) 
    );
/*------------------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * Footer Widget Settings
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_section(
        'enrollment_footer_widget_section',
        array(
            'priority'       => 5,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'panel'          => 'enrollment_footer_settings_panel',
            'title'		     => __( 'Footer Widget Settings', 'enrollment' )
        )
    );

    /**
     * Checkbox option for footer widget area
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'enrollment_footer_widget_option',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => true,
            'sanitize_callback' => 'enrollment_sanitize_checkbox',
        )
    );
    $wp_customize->add_control( new Enrollment_Toggle_Checkbox_Custom_Control(
        $wp_customize, 
        'enrollment_footer_widget_option',
            array(
                'label'         => __( 'Footer Widget Option', 'enrollment' ),
                'description'   => __( 'Option to control footer widget area section.', 'enrollment' ),
                'section'       => 'enrollment_footer_widget_section',
                'settings'      => 'enrollment_footer_widget_option',
                'priority'      => 5
            )
        )
    );

    /**
     * Field for Image Radio
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'enrollment_footer_widget_layout',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => 'column_three',
            'sanitize_callback' => 'sanitize_key',
        )
    );
    $wp_customize->add_control( new Enrollment_Customize_Control_Radio_Image(
        $wp_customize,
        'enrollment_footer_widget_layout',
            array(
                'label'         => __( 'Footer Widget Layout', 'enrollment' ),
                'description'   => __( 'Choose layout from available layouts', 'enrollment' ),
                'section'       => 'enrollment_footer_widget_section',
                'settings'      => 'enrollment_footer_widget_layout',
                'priority'      => 10,
                'choices'  => array(
	                    'column_four' => array(
	                        'label' => __( 'Columns Four', 'enrollment' ),
	                        'url'   => '%s/assets/images/footer-4.png'
	                    ),
	                    'column_three' => array(
	                        'label' => __( 'Columns Three', 'enrollment' ),
	                        'url'   => '%s/assets/images/footer-3.png'
	                    ),
	                    'column_two' => array(
	                        'label' => __( 'Columns Two', 'enrollment' ),
	                        'url'   => '%s/assets/images/footer-2.png'
	                    ),
	                    'column_one' => array(
	                        'label' => __( 'Column One', 'enrollment' ),
	                        'url'   => '%s/assets/images/footer-1.png'
	                    )
	            ),
	            
            )
        )
    );
/*------------------------------------------------------------------------------------------------------------------------------------*/
	
	/**
	 * Footer Settings
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_section(
        'bottom_footer_section',
        array(
            'priority'       => 10,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'panel'          => 'enrollment_footer_settings_panel',
            'title'		     => __( 'Bottom Footer Settings', 'enrollment' )
        )
    );

    /**
     * Textarea field for copyright text
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'enrollment_copyright_text', 
            array(
                'capability'        => 'edit_theme_options',
                'default'           => __( 'Enrollment', 'enrollment' ),
                'sanitize_callback' => 'wp_kses_post',
                'transport'         => 'postMessage'
	       	)
    );
    $wp_customize->add_control(
        'enrollment_copyright_text',
            array(
	            'label'     => __( 'Copyright Text', 'enrollment' ),
                'section'   => 'bottom_footer_section',
                'settings'  => 'enrollment_copyright_text',
                'type'      => 'textarea',
	            'priority'  => 5
            )
    );

    /**
     * Radio button for footer menu/ social icons
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'enrollment_sub_footer_type',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => 'social_icon',
            'sanitize_callback' => 'enrollment_sanitize_select',
        )
    );
    $wp_customize->add_control(
        'enrollment_sub_footer_type',
        array(
            'label'         => __( 'Sub Footer Content', 'enrollment' ),
            'description'   => __( 'Choose content to display at sub footer right side.', 'enrollment' ),
            'section'       => 'bottom_footer_section',
            'settings'      => 'enrollment_sub_footer_type',
            'type'          => 'radio',
            'priority'      => 10,
            'choices' => array(
                'social_icon' => __( 'Social Icon', 'enrollment' ),
                'footer_nav'  => __( 'Footer Menu', 'enrollment' )
            )
        )
    );

}// close function
endif;