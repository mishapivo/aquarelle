<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
 	 * @subpackage EduMag
 	 * @since EduMag 0.1
	 */

	/**
	 * edumag_doctype hook
	 *
	 * @hooked edumag_doctype -  10
	 *
	 */
	do_action( 'edumag_doctype' );
?>
<head>
<?php
	/**
	 * edumag_before_wp_head hook
	 *
	 * @hooked edumag_head -  10
	 *
	 */
	do_action( 'edumag_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>
<?php
	/**
	 * edumag_page_start_action hook
	 *
	 * @hooked edumag_page_start -  10
	 *
	 */
	do_action( 'edumag_page_start_action' ); 

	/**
	 * edumag_before_header hook
	 *
	 * @hooked edumag_add_breadcrumb -  30
	 *
	 */
	do_action( 'edumag_before_header' );

	/**
	 * edumag_header_action hook
	 *
	 * @hooked edumag_header_start -  10
	 * @hooked edumag_site_branding -  20
	 * @hooked edumag_site_navigation -  30
	 * @hooked edumag_header_end -  50
	 *
	 */
	do_action( 'edumag_header_action' );

	/**
	 * edumag_after_header hook
	 *
	 * @hooked edumag_mobile_menu -  10
	 *
	 */
	do_action( 'edumag_after_header' );

	/**
	 * edumag_content_start_action hook
	 *
	 * @hooked edumag_content_start -  10
	 * @hooked edumag_render_banner_section -  20
	 *
	 */
	do_action( 'edumag_content_start_action' );

	/**
	 * edumag_primary_content hook
	 *
	 * @hooked edumag_add_featured_category_section -  10
	 * @hooked edumag_add_latest_news_section -  60
	 *
	 */
	do_action( 'edumag_primary_content' );
