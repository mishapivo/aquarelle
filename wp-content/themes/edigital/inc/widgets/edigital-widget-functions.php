<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @package Mystery Themes
 * @subpackage EDigital
 * @since 1.0.0
 */

function edigital_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'edigital' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'edigital' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'edigital' ),
		'id'            => 'edigital_left_sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'edigital' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Home Page Fullwidth Area', 'edigital' ),
		'id'            => 'edigital_home_fullwidth_area',
		'description'   => esc_html__( 'Add widgets here.', 'edigital' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'edigital_widgets_init' );


/**
 * Load required widgets files
 */
require get_template_directory() . '/inc/widgets/edigital-widget-fields.php';
require get_template_directory() . '/inc/widgets/edigital-service-section.php';
require get_template_directory() . '/inc/widgets/edigital-call-to-action.php';
require get_template_directory() . '/inc/widgets/edigital-testimonials.php';
require get_template_directory() . '/inc/widgets/edigital-latest-blog.php';
require get_template_directory() . '/inc/widgets/edigital-single-page.php';

if( class_exists( 'Easy_Digital_Downloads' ) ) {
	require get_template_directory() . '/inc/widgets/edigital-featured-products.php';
	require get_template_directory() . '/inc/widgets/edigital-latest-products.php';
}