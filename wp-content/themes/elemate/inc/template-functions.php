<?php
/**
 * EleMate Theme Custom Functions
 *
 * @package EleMate
 * @since 	1.0.0
 * @version	1.0.0
 */
if ( ! function_exists( 'elemate_blank' ) ) {
/*
 * Setup default page template Actions
 */
function elemate_blank() {
	elemate_blank_header();
    
	do_action( 'elemate_before_content_wrapper' );
	
        while ( have_posts() ) : the_post();
		    do_action( 'elemate_page_elements' ); // Give your elements priorities so that they hook in the right place.
		endwhile;
	
	do_action( 'elemate_after_content_wrapper' );

    elemate_blank_footer();
    }
}

function elemate_blank_header() {

/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package EleMate
 * @since 	1.0.0
 * @version	1.0.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php 
do_action( 'elemate_content_body_before' );
}

function elemate_blank_footer() {
	do_action( 'elemate_content_body_after' );
	wp_footer(); 
?>
</body>
</html>
<?php }

if ( ! function_exists( 'elemate_page_content' ) ) {
	
	function elemate_page_content() {
		the_content();
	}
}
add_action( 'elemate_page_elements', 		  'elemate_page_content',	10 );