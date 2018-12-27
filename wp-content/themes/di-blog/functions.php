<?php

if( ! defined( 'ABSPATH' ) ) {
	die( "No Direct access" );
}

// Load the init file.
require wp_normalize_path( trailingslashit( get_template_directory() ) ) . 'inc/init.php';
