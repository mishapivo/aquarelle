<?php
/**
 * General Settings Hear
 *
 * @package unique blog
 */

function unique_blog_post_layout_settings( $wp_customize ) {
	
    //Products Category
    $wp_customize->add_section( 'unique_blog_layout_section', array(
        'title'    => esc_html__( 'Layout Settings', 'unique-blog' ),
        'priority' => 3,
        'panel'    =>'general_setting'
	) );
    
    /******************************************************************************
	 * 					 Post Layout Options
	 ***************************************************************************/
    //Enable  Slider
    $wp_customize->add_setting( 
        'unique_blog_post_layout_settings_select', 
        array(
            'sanitize_callback' => 'unique_blog_sanitize_select',
            'default'           => 'uni_list-layout',
        )
    );
    $wp_customize->add_control( 
        'unique_blog_post_layout_settings_select', 
        array(
            'label' => esc_html__( 'Blog Layout', 'unique-blog' ),
            'section' => 'unique_blog_layout_section',
            'type' => 'select',
            'choices' => array(
                            'uni_list-layout'   => esc_html__( 'List Layout', 'unique-blog' ),
                            'uni_grid-layout'   => esc_html__( 'Grid Layout', 'unique-blog' ),
                            'uni_fancy-layout'  => esc_html__( 'Fancy Layout', 'unique-blog' ),
                            'uni_masonry-layout'=> esc_html__( 'Masonry Layout', 'unique-blog' ),
            ),
            'priority'          => 2,
            'transport'         =>'postMessage',
        )
    ); 

    /******************************************************************************
	 * 					 Sidebar Layout Options
	 ***************************************************************************/
    //Enable  Slider
    $wp_customize->add_setting( 
        'unique_blog_sidebar_layout_settings', 
        array(
            'sanitize_callback' => 'unique_blog_sanitize_select',
            'default'           => 'right-sidebar',
        )
    );
    $wp_customize->add_control( 
        'unique_blog_sidebar_layout_settings', 
        array(
            'label' => esc_html__( 'Sidebar Layout', 'unique-blog' ),
            'section' => 'unique_blog_layout_section',
            'type' => 'select',
            'choices' => array(
                            'left-sidebar'      => esc_html__( 'Left Sidebar', 'unique-blog' ),
                            'right-sidebar'     => esc_html__( 'Right Sidebar', 'unique-blog' ),
                            'full-width'        => esc_html__( 'Full Width', 'unique-blog' ),
            ),
            'priority'          => 3,
            'transport'         =>'postMessage',
        )
    ); 

	
}
add_action( 'customize_register', 'unique_blog_post_layout_settings' );