<?php
defined( 'ABSPATH' ) || exit;

require_once ABSPATH . 'wp-admin/includes/plugin.php';

$yahman_addons = false;
if ( is_plugin_active( 'yahman-add-ons/yahman-add-ons.php' ) ) $yahman_addons = true;

define( 'YAHMAN_ADDONS_PLUGIN', $yahman_addons );

if(!$yahman_addons){
	if (!defined('YA_AMP')) {
		define( 'YA_AMP', false );
	}
	if (!defined('YA_AMP_READY')) {
		define( 'YA_AMP_READY', false );
	}
	if (!defined('YA_AMP_LOGO')) {
		define( 'YA_AMP_LOGO', '' );
	}
	if (!defined('YA_GA_GTAG')) {
		define( 'YA_GA_GTAG', '' );
	}
	if (!defined('YA_GA_AMP')) {
		define( 'YA_GA_AMP', '' );
	}
	if (!defined('YA_USER_PROFILE')) {
		define( 'YA_USER_PROFILE', false );
	}
}

$sidebar = false;

if(get_theme_mod( 'simple_days_sidebar_layout','3') != '0'  && is_active_sidebar( 'sidebar-1' ) ){
	$sidebar = true;
}

if(is_singular()){
	$one_column_post = explode(',', get_theme_mod( 'simple_days_one_column_post',''));
	if(in_array($post->ID, $one_column_post))$sidebar = false;
}

define( 'SIMPLE_DAYS_SIDEBAR', $sidebar );
