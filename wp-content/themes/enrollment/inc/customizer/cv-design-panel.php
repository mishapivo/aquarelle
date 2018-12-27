<?php
/**
 * Enrollment Theme Customizer panel for Design Layout.
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

add_action( 'customize_register', 'enrollment_design_panel_register' );

if( ! function_exists( 'enrollment_design_panel_register' ) ):
function enrollment_design_panel_register( $wp_customize ) {

	// Register the radio image control class as a JS control type.
	$wp_customize->register_control_type( 'Enrollment_Customize_Control_Radio_Image' );

	/**
	 * Design Settings Panel on customizer
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_panel(
        'enrollment_design_settings_panel', 
        	array(
        		'priority'       => 20,
            	'capability'     => 'edit_theme_options',
            	'theme_supports' => '',
            	'title'          => __( 'Design Settings', 'enrollment' ),
            ) 
    );
/*------------------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * Archive Settings
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_section(
        'archive_settings_section',
        array(
            'priority'       => 5,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'panel'          => 'enrollment_design_settings_panel',
            'title'		     => __( 'Archive Settings', 'enrollment' )
        )
    );	    

    /**
     * Field for Archive Sidebar images
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'enrollment_archive_sidebar',
        array(
            'default'           => 'right_sidebar',
            'sanitize_callback' => 'sanitize_key',
        )
    );
    $wp_customize->add_control( new Enrollment_Customize_Control_Radio_Image(
        $wp_customize,
        'enrollment_archive_sidebar',
            array(
                'label'         => __( 'Archive Sidebars', 'enrollment' ),
                'description'   => __( 'Choose sidebar from available layouts', 'enrollment' ),
                'section'       => 'archive_settings_section',
                'settings'      => 'enrollment_archive_sidebar',
                'priority'      => 5,
                'choices'  => array(
	                    'left_sidebar' => array(
	                        'label' => __( 'Left Sidebar', 'enrollment' ),
	                        'url'   => '%s/assets/images/left-sidebar.png'
	                    ),
	                    'right_sidebar' => array(
	                        'label' => __( 'Right Sidebar', 'enrollment' ),
	                        'url'   => '%s/assets/images/right-sidebar.png'
	                    ),
	                    'no_sidebar' => array(
	                        'label' => __( 'No Sidebar', 'enrollment' ),
	                        'url'   => '%s/assets/images/no-sidebar.png'
	                    ),
	                    'no_sidebar_center' => array(
	                        'label' => __( 'No Sidebar Center', 'enrollment' ),
	                        'url'   => '%s/assets/images/no-sidebar-center.png'
	                    )
	            ),
	            
            )
        )
    );

    /**
     * Field for Archive Layout images
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'enrollment_archive_layout',
        array(
            'default'           => 'classic',
            'sanitize_callback' => 'sanitize_key',
        )
    );
    $wp_customize->add_control( new Enrollment_Customize_Control_Radio_Image(
        $wp_customize,
        'enrollment_archive_layout',
            array(
                'label'         => __( 'Archive Layouts', 'enrollment' ),
                'description'   => __( 'Choose layout from available layouts.', 'enrollment' ),
                'section'       => 'archive_settings_section',
                'settings'      => 'enrollment_archive_layout',
                'priority'      => 10,
                'choices'  => array(
                        'classic' => array(
                            'label' => __( 'Classic', 'enrollment' ),
                            'url'   => '%s/assets/images/archive-classic.png'
                        ),
                        'grid' => array(
                            'label' => __( 'Grid', 'enrollment' ),
                            'url'   => '%s/assets/images/archive-grid.png'
                        )
                ),
                
            )
        )
    );

/*------------------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * Page Settings
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_section(
        'page_settings_section',
        array(
            'priority'       => 10,
            'panel'          => 'enrollment_design_settings_panel',
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'		     => __( 'Page Settings', 'enrollment' )
        )
    );

    /**
     * Field for sidebar Image Radio
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'enrollment_default_page_sidebar',
        array(
            'default'           => 'right_sidebar',
            'sanitize_callback' => 'sanitize_key',
        )
    );	    
    $wp_customize->add_control( new Enrollment_Customize_Control_Radio_Image(
        $wp_customize,
        'enrollment_default_page_sidebar',
            array(
                'label'         => __( 'Page Sidebars', 'enrollment' ),
                'description'   => __( 'Choose sidebar from available layouts', 'enrollment' ),
                'section'       => 'page_settings_section',
                'settings'      => 'enrollment_default_page_sidebar',
                'priority'      => 5,
                'choices'  => array(
	                    'left_sidebar' => array(
	                        'label' => __( 'Left Sidebar', 'enrollment' ),
	                        'url'   => '%s/assets/images/left-sidebar.png'
	                    ),
	                    'right_sidebar' => array(
	                        'label' => __( 'Right Sidebar', 'enrollment' ),
	                        'url'   => '%s/assets/images/right-sidebar.png'
	                    ),
	                    'no_sidebar' => array(
	                        'label' => __( 'No Sidebar', 'enrollment' ),
	                        'url'   => '%s/assets/images/no-sidebar.png'
	                    ),
	                    'no_sidebar_center' => array(
	                        'label' => __( 'No Sidebar Center', 'enrollment' ),
	                        'url'   => '%s/assets/images/no-sidebar-center.png'
	                    )
	            ),
	            
            )
        )
    );
/*------------------------------------------------------------------------------------------------------------------------------------*/
	/**
	 * Post Settings
	 *
	 * @since 1.0.0
	 */
	$wp_customize->add_section(
        'post_settings_section',
        array(
            'priority'       => 15,
            'panel'          => 'enrollment_design_settings_panel',
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'		     => __( 'Post Settings', 'enrollment' )
        )
    );

    /**
     * Field for sidebar Image Radio
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'enrollment_default_post_sidebar',
        array(
            'default'           => 'right_sidebar',
            'sanitize_callback' => 'sanitize_key',
        )
    );	    
    $wp_customize->add_control( new Enrollment_Customize_Control_Radio_Image(
        $wp_customize,
        'enrollment_default_post_sidebar',
            array(
                'label'    => __( 'Post Sidebars', 'enrollment' ),
                'description' => __( 'Choose sidebar from available layouts', 'enrollment' ),
                'section'  => 'post_settings_section',
                'settings' => 'enrollment_default_post_sidebar',
                'priority' => 5,
                'choices'  => array(
	                    'left_sidebar' => array(
	                        'label' => __( 'Left Sidebar', 'enrollment' ),
	                        'url'   => '%s/assets/images/left-sidebar.png'
	                    ),
	                    'right_sidebar' => array(
	                        'label' => __( 'Right Sidebar', 'enrollment' ),
	                        'url'   => '%s/assets/images/right-sidebar.png'
	                    ),
	                    'no_sidebar' => array(
	                        'label' => __( 'No Sidebar', 'enrollment' ),
	                        'url'   => '%s/assets/images/no-sidebar.png'
	                    ),
	                    'no_sidebar_center' => array(
	                        'label' => __( 'No Sidebar Center', 'enrollment' ),
	                        'url'   => '%s/assets/images/no-sidebar-center.png'
	                    )
	            )
            )
        )
    );

}// close function
endif;