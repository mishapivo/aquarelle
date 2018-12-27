<?php 

/**
 * Theme Widget positions
 * @package Seasonal 
 */

 
/**
 * Registers our main widget area and the front page widget areas.
 */
 
function seasonal_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Bottom 1', 'seasonal' ),
		'id' => 'bottom1',
		'description' => __( 'This is the first bottom sidebar position located above the footer.', 'seasonal' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );	
	register_sidebar( array(
		'name' => __( 'Bottom 2', 'seasonal' ),
		'id' => 'bottom2',
		'description' => __( 'This is the second featured bottom sidebar position located above the footer.', 'seasonal' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );	
	register_sidebar( array(
		'name' => __( 'Bottom 3', 'seasonal' ),
		'id' => 'bottom3',
		'description' => __( 'This is the third featured bottom sidebar position located above the footer.', 'seasonal' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );	
	register_sidebar( array(
		'name' => __( 'Bottom 4', 'seasonal' ),
		'id' => 'bottom4',
		'description' => __( 'This is the fourth featured bottom sidebar position located above the footer.', 'seasonal' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	register_sidebar( array(
		'name' => __( 'Banner', 'seasonal' ),
		'id' => 'banner',
		'description' => __( 'Page banner position.', 'seasonal' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h1>',
		'after_title' => '</h1>',
	) );
		
}
add_action( 'widgets_init', 'seasonal_widgets_init' );

/**
 * Count the number of widgets to enable resizable widgets
 */

function seasonal_bottom() {
	$count = 0;
	if ( is_active_sidebar( 'bottom1' ) )
		$count++;
	if ( is_active_sidebar( 'bottom2' ) )
		$count++;
	if ( is_active_sidebar( 'bottom3' ) )
		$count++;		
	if ( is_active_sidebar( 'bottom4' ) )
		$count++;
	$class = '';
	switch ( $count ) {
		case '1':
			$class = 'col-md-12';
			break;
		case '2':
			$class = 'col-sm-6 col-md-6';
			break;
		case '3':
			$class = 'col-sm-6 col-md-4';
			break;
		case '4':
			$class = 'col-sm-6 col-md-3';
			break;
	}
	if ( $class )
		echo 'class="' . $class . '"';
}
