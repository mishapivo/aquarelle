<?php
/* INCLUDE CLASSES DEBUG, CONFIG AND CORE */
require_once( get_template_directory() . '/lib/mythemes.cfg.class.php' );
require_once( get_template_directory() . '/lib/mythemes.core.class.php' );


/* INCLUDE INPUT / OUTPUT */
require_once( get_template_directory() . '/lib/mythemes.tools.class.php' );

/* INCLUDE CONFIGS */
require_once( get_template_directory() . '/cfg/main.php' );

if( is_admin() ){

	/* INCLUDE RESOURCES */
	require_once( get_template_directory() . '/lib/mythemes.admin.class.php' );
}

require_once( get_template_directory() . '/lib/mythemes.setup.class.php' );
require_once( get_template_directory() . '/lib/mythemes.post.class.php' );
require_once( get_template_directory() . '/lib/mythemes.scripts.class.php' );

require_once( get_template_directory() . '/lib/mythemes.gallery.class.php' );

require_once( get_template_directory() . '/lib/mythemes.layouts.class.php' );
require_once( get_template_directory() . '/lib/mythemes.header.class.php' );
require_once( get_template_directory() . '/lib/mythemes.breadcrumbs.class.php' );
require_once( get_template_directory() . '/lib/mythemes.comments.class.php' );

?>
