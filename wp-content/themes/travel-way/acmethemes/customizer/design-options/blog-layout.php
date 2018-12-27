<?php
/*active callback function for excerpt*/
if ( !function_exists('travel_way_active_callback_content_from_excerpt') ) :
	function travel_way_active_callback_content_from_excerpt() {
		$travel_way_customizer_all_values = travel_way_get_theme_options();
		if( 'excerpt' == $travel_way_customizer_all_values['travel-way-blog-archive-content-from'] ){
			return true;
		}
		return false;
	}
endif;

/*adding sections for blog layout options*/
$wp_customize->add_section( 'travel-way-design-blog-layout-option', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'title'          => esc_html__( 'Default Blog/Archive Layout', 'travel-way' ),
    'panel'          => 'travel-way-design-panel'
) );

/*blog layout*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-blog-archive-img-size]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['travel-way-blog-archive-img-size'],
    'sanitize_callback' => 'travel_way_sanitize_select'
) );
$choices = travel_way_get_image_sizes_options(1);
$wp_customize->add_control( 'travel_way_theme_options[travel-way-blog-archive-img-size]', array(
    'choices'  	    => $choices,
    'label'		    => esc_html__( 'Blog/Archive Feature Image Size', 'travel-way' ),
    'section'       => 'travel-way-design-blog-layout-option',
    'settings'      => 'travel_way_theme_options[travel-way-blog-archive-img-size]',
    'type'	  	    => 'select'
) );

/*blog content from*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-blog-archive-content-from]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['travel-way-blog-archive-content-from'],
	'sanitize_callback' => 'travel_way_sanitize_select'
) );
$choices = travel_way_blog_archive_content_from();
$wp_customize->add_control( 'travel_way_theme_options[travel-way-blog-archive-content-from]', array(
	'choices'  	    => $choices,
	'label'		    => esc_html__( 'Blog/Archive Content From', 'travel-way' ),
	'section'       => 'travel-way-design-blog-layout-option',
	'settings'      => 'travel_way_theme_options[travel-way-blog-archive-content-from]',
	'type'	  	    => 'select'
) );

/*Excerpt Length*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-blog-archive-excerpt-length]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['travel-way-blog-archive-excerpt-length'],
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'travel_way_theme_options[travel-way-blog-archive-excerpt-length]', array(
	'label'		        => esc_html__( 'Except Length', 'travel-way' ),
	'section'           => 'travel-way-design-blog-layout-option',
	'settings'          => 'travel_way_theme_options[travel-way-blog-archive-excerpt-length]',
	'type'	  	        => 'number',
	'active_callback'   => 'travel_way_active_callback_content_from_excerpt'
) );

/*Read More Text*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-blog-archive-more-text]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['travel-way-blog-archive-more-text'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'travel_way_theme_options[travel-way-blog-archive-more-text]', array(
    'label'		=> esc_html__( 'Read More Text', 'travel-way' ),
    'section'   => 'travel-way-design-blog-layout-option',
    'settings'  => 'travel_way_theme_options[travel-way-blog-archive-more-text]',
    'type'	  	=> 'text'
) );

/*Pagination Options*/
$wp_customize->add_setting( 'travel_way_theme_options[travel-way-pagination-option]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['travel-way-pagination-option'],
	'sanitize_callback' => 'travel_way_sanitize_select'
) );
$choices = travel_way_pagination_options();
$wp_customize->add_control( 'travel_way_theme_options[travel-way-pagination-option]', array(
	'choices'  	    => $choices,
	'label'		    => esc_html__( 'Pagination Options', 'travel-way' ),
	'description'   => esc_html__( 'Blog and Archive Pages Pagination', 'travel-way' ),
	'section'       => 'travel-way-design-blog-layout-option',
	'settings'      => 'travel_way_theme_options[travel-way-pagination-option]',
	'type'	  	    => 'select'
) );