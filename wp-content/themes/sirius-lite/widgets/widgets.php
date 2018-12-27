<?php

function sirius_widgets_init() {

    register_sidebar( array(
		'name'          => esc_html__( 'Sidebar - Default', 'sirius-lite' ),
		'id'            => 'sidebar-default',
		'before_widget' => '<div id="%1$s" class="default-widget widget widget-sidebar %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Sidebar - Post', 'sirius-lite' ),
		'id'            => 'sidebar-single',
		'before_widget' => '<div id="%1$s" class="single-widget widget widget-sidebar %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Sidebar - Page', 'sirius-lite' ),
		'id'            => 'sidebar-page',
		'before_widget' => '<div id="%1$s" class="page-widget widget widget-sidebar %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
    
    
}
add_action( 'widgets_init', 'sirius_widgets_init' );

?>