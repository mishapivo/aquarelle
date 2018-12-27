<?php
/**
 * General Settings Hear
 *
 * @package unique blog
 */

function unique_blog_customize_slider_settings( $wp_customize ) {
	
    //Products Category
    $wp_customize->add_section( 'unique_blog_slider_section', array(
        'title'    => esc_html__( 'Slider Settings', 'unique-blog' ),
        'priority' => 2,
        'panel'    =>'general_setting'
	) );
    
    /******************************************************************************
	 * 					 Slider Enable
	 ***************************************************************************/
    //Enable  Slider
    $wp_customize->add_setting(
        'unique_blog_slider_enable',
        array(
            'default'           => true,
			'sanitize_callback' => 'unique_blog_sanitize_checkbox',
			
        )
    );
    $wp_customize->add_control(
		new Unique_Blog_Toggle_Control( 
			$wp_customize,
			'unique_blog_slider_enable',
			array(
				'section'	  => 'unique_blog_slider_section',
				'label'		  => esc_html__( 'Enable Slider Settings', 'unique-blog' ),
				'description' => esc_html__( 'Enable/Disable Slider Settings.', 'unique-blog' ),
			)
		)
	);

	/******************************************************************************
	 * 					 Slider Enable
	 ***************************************************************************/
    //Enable  Slider
    $wp_customize->add_setting(
        'unique_blog_post_inclusive',
        array(
            'default'           => true,
			'sanitize_callback' => 'unique_blog_sanitize_checkbox',
			
        )
    );
    $wp_customize->add_control(
		new Unique_Blog_Toggle_Control( 
			$wp_customize,
			'unique_blog_post_inclusive',
			array(
				'section'	  => 'unique_blog_slider_section',
				'label'		  => esc_html__( 'Enable Slider Post Inclusive Settings', 'unique-blog' ),
				'description' => esc_html__( 'Enable/Disable Slider Post Inclusive Settings.', 'unique-blog' ),
			)
		)
	);

	/******************************************************************************
	 * 					Products Category Number of Products
	 ***************************************************************************/
	$wp_customize->add_setting(
        'unique_blog_slider_post_count',
        array(
            'default'           => 6,
            'sanitize_callback' => 'absint',
        )
    );
    
    $wp_customize->add_control(
		'unique_blog_slider_post_count',
		array(
			'section'	  => 'unique_blog_slider_section',
			'label'		  => esc_html__( 'Number of Post', 'unique-blog' ),
			'description' => esc_html__( 'Number of Post Display on slider.', 'unique-blog' ),
            'type'        => 'number'
		)		
    );
    

}
add_action( 'customize_register', 'unique_blog_customize_slider_settings' );