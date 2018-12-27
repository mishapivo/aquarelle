<?php

function thesimplest_widgets_init() {
	register_sidebar( array(
		'name'              =>  esc_html__( 'Sidebar', 'thesimplest' ),
		'id'                =>  'sidebar-1',
		'description'       =>  esc_html__( 'Add widgets here to appear in your sidebar.', 'thesimplest' ),
		'before_widget'     =>  '<section id="%1$s" class="widget %2$s">',
		'after_widget'      =>  '</section>',
		'before_title'      =>  '<h4 class="widget-title">',
		'after_title'       =>  '</h4>'
	) );
}