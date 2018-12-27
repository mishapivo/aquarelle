<?php
/**
 * Enrollment Theme Customizer panel for Additional Settings.
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

add_action( 'customize_register', 'enrollment_additional_panel_register' );

if( ! function_exists( 'enrollment_additional_panel_register' ) ):
function enrollment_additional_panel_register( $wp_customize ) {

	/**
	 * Additional Settings Panel on customizer
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_panel(
        'enrollment_additional_settings_panel', 
        	array(
        		'priority'       => 25,
            	'capability'     => 'edit_theme_options',
            	'theme_supports' => '',
            	'title'          => __( 'Additional Settings', 'enrollment' ),
            ) 
    );
/*------------------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * Social Icons Section
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_section(
        'social_icons_section',
        array(
            'priority'       => 5,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'panel'          => 'enrollment_additional_settings_panel',
            'title'		     => __( 'Social Icons', 'enrollment' )
        )
    );

    /**
     * Repeater field for social media icons
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'social_media_icons',
        array(
            'sanitize_callback' => 'enrollment_sanitize_repeater',
            'default' => json_encode(array(
                array(
                    'cv_icon_list'  => 'fa fa-facebook-f',
                    'cv_url_field'  => '',
                    )
            ))
        )
    );
    $wp_customize->add_control( new Enrollment_Repeater_Controler(
        $wp_customize, 
            'social_media_icons',
            array(
                'label'   => __( 'Social Media Icons', 'enrollment' ),
                'section' => 'social_icons_section',
                'settings' => 'social_media_icons',
                'priority' => 5,
                'enrollment_box_label' => __( 'Social Media Icon','enrollment' ),
                'enrollment_box_add_control' => __( 'Add Icon','enrollment' )
            ),
            array(
                'cv_icon_list' => array(
                    'type'        => 'social_icon',
                    'label'       => __( 'Social Media Logo', 'enrollment' ),
                    'description' => __( 'Choose social media icon.', 'enrollment' )
                ),
                'cv_url_field' => array(
                    'type'        => 'url',
                    'label'       => __( 'Social Icon Url', 'enrollment' ),
                    'description' => __( 'Enter social media url.', 'enrollment' )
                )
            )
        ) 
    );

}// close function
endif;