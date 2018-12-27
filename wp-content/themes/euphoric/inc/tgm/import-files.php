<?php
/**
 * Import dummy Content
 *
 *
 * @link https://github.com/thomasgriffin/TGM-Plugin-Activation
 * @package euphoric
 */
 function ocdi_import_files() {
    return array(
      array(
        'import_file_name'             => esc_html__('Euphoric Demo','euphoric'),
        'categories'                   => array( 'Euphoric' ),
        'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/tgm/import/euphoirc.wordpress.2018-09-28.xml',
        'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/tgm/import/demo.themespiral.com-euphoric-widgets.wie',
        'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/tgm/import/euphoric-export.dat',
      ),
    );
  }
  add_filter( 'pt-ocdi/import_files', 'ocdi_import_files' );

  function euphoric_after_import_setup($selected_import) {
    // Assign menus to their locations.
    $top_menu = get_term_by( 'name', esc_html__('Main Menu','euphoric'), 'nav_menu' );
    $main_menu = get_term_by( 'name', esc_html__('Social Links','euphoric'), 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
        'menu-1' => $top_menu->term_id,
        'menu-2' => $main_menu->term_id,
      )
    );

}
add_action( 'pt-ocdi/after_import', 'euphoric_after_import_setup' );