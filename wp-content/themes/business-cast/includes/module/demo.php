<?php
/**
 * Demo configuration
 *
 * @package Business_Cast
 */

$config = array(
	'static_page'    => 'home',
	'posts_page'     => 'blog',
	'menu_locations' => array(
		'menu-1' => 'main-menu',
		'social' => 'social-menu',
	),
	'ocdi'           => array(
		array(
			'import_file_name'             => esc_html__( 'Theme Demo Content', 'business-cast' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'demo/widget.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo/customizer.dat',
		),
	),
	'intro_content'  => esc_html__( 'NOTE: In demo import, category selection could be omitted in old (non-fresh) WordPress setup. After import is complete, please go to Widgets admin page under Appearance menu and select the appropriate category in the widgets.', 'business-cast' ),
);

Business_Cast_Demo::init( apply_filters( 'business_cast_demo_filter', $config ) );
