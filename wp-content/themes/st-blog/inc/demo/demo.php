<?php
/**
 * Demo configuration
 *
 * @package eCommerce_Gem
 */

$config = array(
	'static_page'    => 'home',
	'posts_page'     => 'blog',
	'menu_locations' => array(
		'menu-1' => 'primary',
	),
	'ocdi'           => array(
		array(
			'import_file_name'             => esc_html__( 'Theme Demo Content', 'st-blog' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/demo-content/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/demo-content/widget.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/demo-content/customizer.dat',
		),
	),
);

st_blog_Demo::init( apply_filters( 'st_blog_Demo_filter', $config ) );
