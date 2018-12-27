<?php
/**
 * WP.com theme stuff
 *
 * @package Kent
 */
global $themecolors;

function kent_set_themecolors() {
	global $themecolors;
	$themecolors = array(
		'bg' => 'ffffff',
		'border' => 'f2f2f2',
		'text' => '666666',
		'link' => '4998cc',
		'url' => 'e6e6e6',
	);
}

add_action( 'after_setup_theme', 'kent_set_themecolors' );

/*
 * De-queue Google fonts if custom fonts are being used instead
 */
function kent_dequeue_fonts() {
	if ( class_exists( 'TypekitData' ) && class_exists( 'CustomDesign' ) && CustomDesign::is_upgrade_active() ) {
		$customfonts = TypekitData::get( 'families' );
		if ( $customfonts && $customfonts['site-title']['id'] && $customfonts['headings']['id'] && $customfonts['body-text']['id'] ) {
			wp_dequeue_style( 'kent-font-serif' );
			wp_dequeue_style( 'kent-font-sans-serif' );
		}
	}
}

add_action( 'wp_enqueue_scripts', 'kent_dequeue_fonts' );