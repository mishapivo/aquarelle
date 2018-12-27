<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage Firm Graphy
	 * @since Firm Graphy 1.0.0
	 */

	/**
	 * firm_graphy_doctype hook
	 *
	 * @hooked firm_graphy_doctype -  10
	 *
	 */
	do_action( 'firm_graphy_doctype' );

?>
<head>
<?php
	/**
	 * firm_graphy_before_wp_head hook
	 *
	 * @hooked firm_graphy_head -  10
	 *
	 */
	do_action( 'firm_graphy_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>
<?php
	/**
	 * firm_graphy_page_start_action hook
	 *
	 * @hooked firm_graphy_page_start -  10
	 *
	 */
	do_action( 'firm_graphy_page_start_action' ); 

	/**
	 * firm_graphy_loader_action hook
	 *
	 * @hooked firm_graphy_loader -  10
	 *
	 */
	do_action( 'firm_graphy_before_header' );

	/**
	 * firm_graphy_header_action hook
	 *
	 * @hooked firm_graphy_header_start -  10
	 * @hooked firm_graphy_site_branding -  20
	 * @hooked firm_graphy_site_navigation -  30
	 * @hooked firm_graphy_header_end -  50
	 *
	 */
	do_action( 'firm_graphy_header_action' );

	/**
	 * firm_graphy_content_start_action hook
	 *
	 * @hooked firm_graphy_content_start -  10
	 *
	 */
	do_action( 'firm_graphy_content_start_action' );

	/**
	 * firm_graphy_header_image_action hook
	 *
	 * @hooked firm_graphy_header_image -  10
	 *
	 */
	do_action( 'firm_graphy_header_image_action' );

    if ( firm_graphy_is_frontpage() ) {
    	$i = 1;
    	$sections = firm_graphy_sortable_sections();
		foreach ( $sections as $section => $value ) {
			add_action( 'firm_graphy_primary_content', 'firm_graphy_add_'. $section .'_section', $i . 0 );
			$i++;
		}
		do_action( 'firm_graphy_primary_content' );
	}