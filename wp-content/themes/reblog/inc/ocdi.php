<?php
/**
 * Moral OCDI plugin compatible functions
 *
 * @package Moral
 */

add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

// Import demo data
function reblog_import_files() {
	$file_path = get_theme_file_path( '/demo/' );
    return array(
        array(
            'import_file_name'             => esc_html__( 'Import all contents.', 'reblog' ),
            'import_file_url'            => get_parent_theme_file_uri( '/demo/content.xml' ),
            'import_customizer_file_url' => get_parent_theme_file_uri( '/demo/customizer.dat' ),
            'import_widget_file_url'     => get_parent_theme_file_uri( '/demo/widgets.wie' ),
            'import_notice'                => __( 'You can import data manually too from the link above. You can find the demo files at:', 'reblog' ) . '<br /><code>' .$file_path . '</code>',
        ),
   );
}
add_filter( 'pt-ocdi/import_files', 'reblog_import_files' );

add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

function reblog_ocdi_after_import_setup_assign_page() {
	// Assign menus to their locations.
	$main_menu = get_term_by( 'name', 'Primary Menu', 'nav_menu' );
	$social_menu = get_term_by( 'name', 'Social Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
			'primary' => $main_menu->term_id,
			'social' => $social_menu->term_id,
		)
	);



}
add_action( 'pt-ocdi/after_import', 'reblog_ocdi_after_import_setup_assign_page' );