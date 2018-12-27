<?php
/**
 * Backdrop Core (functions-sidebars.php)
 *
 * @package      Backdrop Core
 * @copyright    Copyright (C) 2018. Benjamin Lu
 * @license      GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author       Benjamin Lu (https://getbenonit.com)
 */

/**
 * Define namespace
 */
namespace Benlumia007\Backdrop\Config;

/**
 * Table of Content
 *
 *  1.0 - Config (Sidebars)
 */
/**
 *  1.0 - Config (Sidebars)
 */
function register_sidebars() {
	/**
	 * Primary Sidebar
	*/
	register_sidebar(
		array(
			'name'          => esc_html__( 'Primary Sidebar', 'meritorious' ),
			'description'   => esc_html__( 'Add widgets here to appear in your sidebar on Blog Posts and Archives only', 'meritorious' ),
			'id'            => 'primary-sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	/**
	 * Secondary Sidebar
	 */
	register_sidebar(
		array(
			'name'          => esc_html__( 'Secondary Sidebar', 'meritorious' ),
			'description'   => esc_html__( 'Add widgets here to appear in your sidebar on Pages only', 'meritorious' ),
			'id'            => 'secondary-sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	/**
	 * Custom Sidebar
	 */
	register_sidebar(
		array(
			'name'          => esc_html__( 'Custom Sidebar', 'meritorious' ),
			'description'   => esc_html__( 'Add widgets here to appear in your sidebar on custom pages only', 'meritorious' ),
			'id'            => 'custom-sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', __NAMESPACE__ . '\register_sidebars' );
