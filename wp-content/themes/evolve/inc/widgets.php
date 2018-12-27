<?php

function evolve_widgets_init() {

	/*
	   Register Sidebar Widgets
	   ======================================= */

	register_sidebar( array(
		'name'          => __( 'Sidebar 1', 'evolve' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="widget-before-title"><div class="widget-title-background"></div><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 2', 'evolve' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="widget-before-title"><div class="widget-title-background"></div><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	/*
		Register Header Widgets
	    ======================================= */

	$evolve_header_widgets_args = array(
		'name'          => __( 'Header %d', 'evolve' ),
		'id'            => 'header',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="widget-before-title"><div class="widget-title-background"></div><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	);
	register_sidebars( 4, $evolve_header_widgets_args );

	/*
	    Register Footer Widgets
	    ======================================= */

	$evolve_footer_widgets_args = array(
		'name'          => __( 'Footer %d', 'evolve' ),
		'id'            => 'footer',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="widget-before-title"><div class="widget-title-background"></div><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	);
	register_sidebars( 4, $evolve_footer_widgets_args );

	/*
	    Tabs Widget
	    ======================================= */

	get_template_part( 'inc/tabs-widget' );

}

add_action( 'widgets_init', 'evolve_widgets_init' );