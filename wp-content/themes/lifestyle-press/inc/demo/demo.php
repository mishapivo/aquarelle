<?php
/**
 * Demo configuration
 *
 * @package Lifestyle Magazine
 */

$config = array(
	'ocdi'           => array(
		array(
			'import_file_name'             => esc_html__( 'Import - Layout One', 'lifestyle-magazine' ),
			'local_import_file'            => trailingslashit( get_stylesheet_directory() ) . 'inc/demo/contents.xml',
      		'local_import_widget_file'     => trailingslashit( get_stylesheet_directory() ) . 'inc/demo/widget.wie',
      		'local_import_customizer_file' => trailingslashit( get_stylesheet_directory() ) . 'inc/demo/customizer.dat',
      		'import_notice'					=> esc_html__( 'It will overwrite your settings', 'lifestyle-magazine' ),
      		'preview_url'					=> esc_url( 'https://thebootstrapthemes.com/demo/lifestyle-magazine/' ),
      		'import_preview_image_url'		=> esc_url( 'https://thebootstrapthemes.com/wp-content/uploads/edd/lifestyle-magazine.jpg' )
		),		
		
	),
);

Lifestyle_Press_Demo::init( apply_filters( 'lifestyle_magazine_demo_filter', $config ) );