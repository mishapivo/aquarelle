<?php

function thesimplest_theme_enqueue() {

	wp_register_style(
		'thesimplest-google-fonts',
		'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|PT+Serif:400,400i,700,700i'
	);
	wp_register_style(
		'bootstrap',
		get_template_directory_uri() . '/assets/css/bootstrap.min.css',
		false,
		'3.3.7'
	);
	wp_register_style(
		'font-awesome',
		get_template_directory_uri() . '/assets/css/font-awesome.min.css',
		false,
		'4.7.0'
	);
	wp_register_style(
		'thesimplest-style',
		get_stylesheet_uri()
	);

	wp_enqueue_style( 'thesimplest-google-fonts' );
	wp_enqueue_style( 'bootstrap' );
	wp_enqueue_style( 'font-awesome' );
	wp_enqueue_style( 'thesimplest-style' );

	wp_register_script(
		'skip-link-focus-fix',
		get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js',
		array(), '1.0', true
	);

	wp_register_script(
		'jquery-bootstrap',
		get_template_directory_uri() . '/assets/js/bootstrap.min.js',
		array( 'jquery' ),
		'3.3.7', true
	);

	wp_register_script(
		'thesimplest-main-js',
		get_template_directory_uri() . '/assets/js/main.js',
		array( 'jquery' ),
		'1.0', true
	);

	wp_localize_script( 'thesimplest-main-js', 'thesimplest_screenReaderText', array(
		'expand'   => __( 'expand child menu', 'thesimplest' ),
		'collapse' => __( 'collapse child menu', 'thesimplest' ),
	) );

	wp_enqueue_script( 'skip-link-focus-fix' );
	wp_enqueue_script( 'jquery-bootstrap' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'thesimplest-main-js' );
}