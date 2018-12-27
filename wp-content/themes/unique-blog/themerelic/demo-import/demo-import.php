<?php

function unique_blog_pro_demo_import() {
    return array(
      array(
        'import_file_name'           => 'Demo Import',
        'categories'                 => array( 'Default' ),
        'import_file_url'            => 'http://demo.themerelic.com/demo-import/unique-blog/default/unique-blog-content.xml',
        'import_widget_file_url'     => 'http://demo.themerelic.com/demo-import/unique-blog/default/unique-blog-widget.wie',
        'import_customizer_file_url' => 'http://demo.themerelic.com/demo-import/unique-blog/default/unique_blog-customizer.dat',
        
        'import_preview_image_url'   => 'http://demo.themerelic.com/demo-import/unique-blog/default/screenshot.png',
        'import_notice'              => __( 'After you import this demo, you will have to setup the slider and banner image separately.', 'unique-blog' ),
        'preview_url'                => 'http://demo.reliccommerce.com/unique-blog/',
      ),
      array(
        'import_file_name'           => 'Demo Import',
        'categories'                 => array( 'Default' ),
        'import_file_url'            => 'http://demo.themerelic.com/demo-import/unique-blog/default/unique-blog-content.xml',
        'import_widget_file_url'     => 'http://demo.themerelic.com/demo-import/unique-blog/default/unique-blog-widget.wie',
        'import_customizer_file_url' => 'http://demo.themerelic.com/demo-import/unique-blog/default/unique_blog-customizer.dat',
        
        'import_preview_image_url'   => 'http://demo.themerelic.com/demo-import/unique-blog/default/screenshot.png',
        'import_notice'              => __( 'After you import this demo, you will have to setup the slider and banner image separately.', 'unique-blog' ),
        'preview_url'                => 'http://demo.reliccommerce.com/unique-blog/',
      )
    );
  }
  add_filter( 'pt-ocdi/import_files', 'unique_blog_pro_demo_import' );

   
/*****************************************************************
*         After Demo Import Functions
*************************************************************/
function unique_blog_after_import_setup() {
  // Assign menus to their locations.
  $main_menu = get_term_by( 'name', 'unique-blog-main-menu', 'nav_menu' );

  set_theme_mod( 'nav_menu_locations', array(
    'menu-1' => $main_menu->term_id,
    )
  );

}
add_action( 'pt-ocdi/after_import', 'unique_blog_after_import_setup' );
