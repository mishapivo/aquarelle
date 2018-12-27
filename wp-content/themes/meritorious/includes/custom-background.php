<?php
/**
 * Meritorious (custom-background.php)
 *
 * @package     Meritorious
 * @copyright   Copyright (C) 2018. Benjamin Lu
 * @license     GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author      Benjamin Lu (https://getbenonit.com)
 */

/**
 *  Table of Content
 *
 *  1.0 - Includes (Custom Background)
 */

/**
 *  1.0 - Includes (Custom Background)
 */
function meritorious_load_custom_background() {
	$args = array(
		'default-color' => 'ffffff',
	);
	add_theme_support( 'custom-background', $args );
}
add_action( 'after_setup_theme', 'meritorious_load_custom_background' );
