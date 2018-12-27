<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage Tourable
	 * @since Tourable 1.0.0
	 */

	/**
	 * tourable_doctype hook
	 *
	 * @hooked tourable_doctype -  10
	 *
	 */
	do_action( 'tourable_doctype' );

?>
<head>
<?php
	/**
	 * tourable_before_wp_head hook
	 *
	 * @hooked tourable_head -  10
	 *
	 */
	do_action( 'tourable_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>
<?php
	/**
	 * tourable_page_start_action hook
	 *
	 * @hooked tourable_page_start -  10
	 *
	 */
	do_action( 'tourable_page_start_action' ); 

	/**
	 * tourable_header_action hook
	 *
	 * @hooked tourable_header_start -  10
	 * @hooked tourable_site_branding -  20
	 * @hooked tourable_site_navigation -  30
	 * @hooked tourable_header_end -  50
	 *
	 */
	do_action( 'tourable_header_action' );

	/**
	 * tourable_content_start_action hook
	 *
	 * @hooked tourable_content_start -  10
	 *
	 */
	do_action( 'tourable_content_start_action' );

	/**
	 * tourable_header_image_action hook
	 *
	 * @hooked tourable_header_image -  10
	 *
	 */
	do_action( 'tourable_header_image_action' );

    if ( tourable_is_frontpage() ) {

    	$sections = tourable_sortable_sections();
    	$i = 1;
		foreach ( $sections as $section => $value ) {
			add_action( 'tourable_primary_content', 'tourable_add_'. $section .'_section', $i . 0 );
			$i++;
		}
		do_action( 'tourable_primary_content' );
	}