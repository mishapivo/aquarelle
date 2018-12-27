<?php
/**
 * Theme Functions.
 */

add_action( 'wp_enqueue_scripts', 'modern_construction_enqueue_styles' );
	function modern_construction_enqueue_styles() {
    	$parent_style = 'mega-construction-basic-style'; // Style handle of parent theme.
		wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'modern-construction-style', get_stylesheet_uri(), array( $parent_style ) );
}

// Customizer Section
function modern_construction_customizer ( $wp_customize ) {

	$wp_customize->add_section( 'modern_construction_service_section' , array(
    	'title'      => __( 'Our Services', 'modern-construction' ),
		'priority'   => null,
		'panel' => 'mega_construction_panel_id'
	) );

	$wp_customize->add_setting('modern_construction_service_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('modern_construction_service_title',array(
		'label'	=> __('Section Title','modern-construction'),
		'section'=> 'modern_construction_service_section',
		'setting'=> 'modern_construction_service_title',
		'type'=> 'text'
	));	

	$wp_customize->add_setting('modern_construction_service_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('modern_construction_service_text',array(
		'label'	=> __('Add Text','modern-construction'),
		'section'=> 'modern_construction_service_section',
		'setting'=> 'modern_construction_service_text',
		'type'=> 'text'
	));	

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_pst[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_pst[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('modern_construction_category',array(
		'default' => 'select',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('modern_construction_category',array(
		'type'    => 'select',
		'choices' => $cat_pst,
		'label' => __('Select Category to display Latest Post','modern-construction'),
		'section' => 'modern_construction_service_section',
	));

	$post_list = get_posts();
	$i = 0;
	$pst[]='Select';	
	foreach($post_list as $post){
		$pst[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('modern_construction_post',array(
		'sanitize_callback' => 'modern_construction_sanitize_choices',
	));
	$wp_customize->add_control('modern_construction_post',array(
		'type'    => 'select',
		'choices' => $pst,
		'label' => __('Select post','modern-construction'),
		'section' => 'modern_construction_service_section',
	));
}
add_action( 'customize_register', 'modern_construction_customizer' );

/*radio button sanitization*/
function modern_construction_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

?>