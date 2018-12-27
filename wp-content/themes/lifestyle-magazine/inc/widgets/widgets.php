<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */


function lifestyle_magazine_widgets_init() {
		
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'lifestyle-magazine' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'lifestyle-magazine' ),
		'id'            => 'sidebar-left',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget', 'lifestyle-magazine' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );


	if ( class_exists( 'WooCommerce' ) ) {
		register_sidebar( array(
			'name'          => esc_html__( 'WooCommerce Sidebar', 'lifestyle-magazine' ),
			'id'            => 'woocommerce_sidebar',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		) );
	}
	
}
add_action( 'widgets_init', 'lifestyle_magazine_widgets_init' );