<?php
/**
 * Demo configuration
 *
 * @package Blog_Kit
 */

$config = array(
	'static_page'    => 'home',
	'posts_page'     => 'blog',
	'menu_locations' => array(
		'primary' => 'main-menu',
		'social'  => 'social-menu',
	),
	'ocdi'           => array(
		array(
			'import_file_name'             => esc_html__( 'Default', 'blog-kit' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/demo-content/default/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/demo-content/default/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/demo-content/default/customizer.dat',
			'import_preview_image_url'   => trailingslashit( get_template_directory_uri() ) . 'inc/demo/demo-content/default/default.png',
			'preview_url'                => 'https://wpcapsules.com/demo/blog-kit/',
		),
		array(
			'import_file_name'             => esc_html__( 'Elementor Version', 'blog-kit' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/demo-content/elementor-blog/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/demo-content/elementor-blog/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/demo-content/elementor-blog/customizer.dat',
			'import_preview_image_url'   => trailingslashit( get_template_directory_uri() ) . 'inc/demo/demo-content/elementor-blog/elementor-blog.png',
			'preview_url'                => 'https://wpcapsules.com/demo/blog-kit-elementor/',

			
		),
	),
);

Blog_Kit_Demo::init( apply_filters( 'blog_kit_demo_filter', $config ) );
