<?php
// Register Custom Post Type
function video_post_type() {

	$labels = array(
		'name'                => _x( 'Videos', 'Post Type General Name', 'devion' ),
		'singular_name'       => _x( 'Video', 'Post Type Singular Name', 'devion' ),
		'menu_name'           => __( 'Videos', 'devion' ),
		'parent_item_colon'   => __( 'Parent Video:', 'devion' ),
		'all_items'           => __( 'All Videos', 'devion' ),
		'view_item'           => __( 'View Video', 'devion' ),
		'add_new_item'        => __( 'Add New Video', 'devion' ),
		'add_new'             => __( 'Add New', 'devion' ),
		'edit_item'           => __( 'Edit video', 'devion' ),
		'update_item'         => __( 'Update Video', 'devion' ),
		'search_items'        => __( 'Search Video', 'devion' ),
		'not_found'           => __( 'Not found', 'devion' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'devion' ),
	);
	$args = array(
		'label'               => __( 'video_type', 'devion' ),
		'description'         => __( 'Video items', 'devion' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'comments', 'trackbacks' ),
		'taxonomies'          => array( 'genre' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-video-alt3',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'video_type', $args );

}

// Hook into the 'init' action
add_action( 'init', 'video_post_type', 0 );


if ( ! function_exists( 'video_category' ) ) {

// Register Custom Taxonomy
function video_category() {

	$labels = array(
		'name'                       => _x( 'Genres', 'Taxonomy General Name', 'devion' ),
		'singular_name'              => _x( 'Genre', 'Taxonomy Singular Name', 'devion' ),
		'menu_name'                  => __( 'Genre', 'devion' ),
		'all_items'                  => __( 'All Genres', 'devion' ),
		'parent_item'                => __( 'Parent Genre', 'devion' ),
		'parent_item_colon'          => __( 'Parent Genre:', 'devion' ),
		'new_item_name'              => __( 'New Genre Name', 'devion' ),
		'add_new_item'               => __( 'Add New Genre', 'devion' ),
		'edit_item'                  => __( 'Edit Genre', 'devion' ),
		'update_item'                => __( 'Update Genre', 'devion' ),
		'separate_items_with_commas' => __( 'Separate Genres with commas', 'devion' ),
		'search_items'               => __( 'Search Genres', 'devion' ),
		'add_or_remove_items'        => __( 'Add or remove Genres', 'devion' ),
		'choose_from_most_used'      => __( 'Choose from the most used Genres', 'devion' ),
		'not_found'                  => __( 'Not Found', 'devion' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'genre', array( 'video_type' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'video_category', 0 );

}