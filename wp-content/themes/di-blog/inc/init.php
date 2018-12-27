<?php

// Load the engine class file.
require wp_normalize_path( trailingslashit( get_template_directory() ) ) . 'inc/core/class-di-blog-engine.php';

// Load the actions and filters file.
require wp_normalize_path( trailingslashit( get_template_directory() ) ) . 'inc/core/actions-filters.php';

// Load the individual functions file.
require wp_normalize_path( trailingslashit( get_template_directory() ) ) . 'inc/core/individual-functions.php';

// Load inline css file.
require wp_normalize_path( trailingslashit( get_template_directory() ) ) . 'inc/core/inline-css.php';

// Load recent posts with thumb php file.
require wp_normalize_path( trailingslashit( get_template_directory() ) ) . 'inc/core/custom-widget-recent-posts-thumb.php';

// Load social icons widget php file.
require wp_normalize_path( trailingslashit( get_template_directory() ) ) . 'inc/core/custom-widget-social.php';

// Page Meta Box file.
require wp_normalize_path( trailingslashit( get_template_directory() ) ) . 'inc/core/page-metabox.php';

// Post Meta Box file.
require wp_normalize_path( trailingslashit( get_template_directory() ) ) . 'inc/core/post-metabox.php';

// Load Nav walker.
require wp_normalize_path( trailingslashit( get_template_directory() ) ) . 'inc/core/navwalker.php';

// Customizer partial refresh handle file.
require wp_normalize_path( trailingslashit( get_template_directory() ) ) . 'inc/core/customize.php';

// Load the kirki plugin if not loaded.
if( ! class_exists( 'Kirki ') ) {
	require wp_normalize_path( trailingslashit( get_template_directory() ) ) . 'inc/kirki/kirki/kirki.php';
}

// Load the kirki options file.
require wp_normalize_path( trailingslashit( get_template_directory() ) ) . 'inc/kirki/kirki-options.php';

// Load the tgm class file.
require wp_normalize_path( trailingslashit( get_template_directory() ) ) . 'inc/tgm/class-tgm-plugin-activation.php';

// Load the tgm options file.
require wp_normalize_path( trailingslashit( get_template_directory() ) ) . 'inc/tgm/tgm-options.php';

// Include custom woocommerce file.
require wp_normalize_path( trailingslashit( get_template_directory() ) ) . 'inc/core/custom-woocommerce.php';

// One click demo import.
require wp_normalize_path( trailingslashit( get_template_directory() ) ) . 'inc/ocdi/one-click-demo-import-settings.php';

// Theme page file.
require wp_normalize_path( trailingslashit( get_template_directory() ) ) . 'inc/core/theme-page.php';
