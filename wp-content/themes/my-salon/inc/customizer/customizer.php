<?php
/**
 * My Salon Theme Customizer.
 *
 * @package my_salon
 */

    $my_salon_settings = array( 'info', 'default', 'home'  );

    /* Option list of all post */	
    $my_salon_options_posts = array();
    $my_salon_options_posts_obj = get_posts('posts_per_page=-1');
    $my_salon_options_posts[''] = __( 'Choose Post', 'my-salon' );
    foreach ( $my_salon_options_posts_obj as $my_salon_posts ) {
    	$my_salon_options_posts[$my_salon_posts->ID] = $my_salon_posts->post_title;
    }
    
 	/* Option list of all page */   
    $my_salon_options_pages = array();
    $my_salon_options_pages_obj = get_pages('posts_per_page=-1');
    $my_salon_options_pages[''] = __( 'Choose Page', 'my-salon' );
    foreach ( $my_salon_options_pages_obj as $my_salon_pages ) {
        $my_salon_options_pages[$my_salon_pages->ID] = $my_salon_pages->post_title;
    }

    /* Option list of all categories */
    $my_salon_args = array(
	   'type'                     => 'post',
	   'orderby'                  => 'name',
	   'order'                    => 'ASC',
	   'hide_empty'               => 1,
	   'hierarchical'             => 1,
	   'taxonomy'                 => 'category'
    ); 
    $my_salon_option_categories = array();
    $my_salon_category_lists = get_categories( $my_salon_args );
    $my_salon_option_categories[''] = __( 'Choose Category', 'my-salon' );
    foreach( $my_salon_category_lists as $my_salon_category ){
        $my_salon_option_categories[$my_salon_category->term_id] = $my_salon_category->name;
    }

	foreach( $my_salon_settings as $setting ){
		require get_template_directory() . '/inc/customizer/' . $setting . '.php';
	}

/**
 * Sanitization Functions
*/
require get_template_directory() . '/inc/customizer/sanitization-functions.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function my_salon_customize_preview_js() {
    wp_enqueue_script( 'my_salon_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'my_salon_customize_preview_js' );
