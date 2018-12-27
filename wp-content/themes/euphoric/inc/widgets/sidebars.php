<?php
 /**
 * Register Sidebar area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 * @package euphoric
 */
function euphoric_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'euphoric' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'euphoric' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Top Panel', 'euphoric' ),
		'id'            => 'top-panel',
		'description'   => esc_html__( 'Add Text or Custom Html widgets.', 'euphoric' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_widget( 'Euphoric_posts' );
}
add_action( 'widgets_init', 'euphoric_widgets_init' );