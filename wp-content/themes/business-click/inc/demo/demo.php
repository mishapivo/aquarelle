<?php
/**
 * Demo configuration
 *
 * @package business_click
 */

$config = array(
	'static_page'    => 'Home',
	'posts_page'     => 'Blog',
	'menu_locations' => array(
		'menu-1'  => 'menu',
		'menu-2'  => 'social',
	),
	'ocdi'           => array(
		array(
			'import_file_name'             => esc_html__( 'Theme Demo Content', 'business-click' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/demo-content/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/demo-content/widget.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/demo-content/customizer.dat',
		),
	),
);

business_click_Demo::init( apply_filters( 'business_click_Demo_filter', $config ) );
