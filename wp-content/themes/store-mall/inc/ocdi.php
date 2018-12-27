<?php
/**
 * Moral OCDI plugin compatible functions
 *
 * @package Moral
 */

add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

// Import demo data
function store_mall_import_files() {
	$file_path = get_theme_file_path( '/demo/' );
    return array(
        array(
            'import_file_name'             => esc_html__( 'Import all contents.', 'store-mall' ),
            'import_file_url'            => get_parent_theme_file_uri( '/demo/content.xml' ),
            'import_customizer_file_url' => get_parent_theme_file_uri( '/demo/customizer.dat' ),
            'import_widget_file_url'     => get_parent_theme_file_uri( '/demo/widgets.wie' ),
            'import_notice'                => __( 'You can import data manually too from the link above. You can find the demo files at:', 'store-mall' ) . '<br /><code>' .$file_path . '</code>',
        ),
   );
}
add_filter( 'pt-ocdi/import_files', 'store_mall_import_files' );

add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

function store_mall_ocdi_after_import_setup_assign_page() {
	// Assign menus to their locations.
	$main_menu = get_term_by( 'name', 'Header Menu', 'nav_menu' );
	$social_menu = get_term_by( 'name', 'Social Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
			'primary' => $main_menu->term_id,
			'social' => $social_menu->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home' );
	$blog_page_id  = get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'store_mall_ocdi_after_import_setup_assign_page' );