<?php
/**
 * Load files
 *
 * @package Travel_Gem
 */

/**
 * Include default theme options.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/customizer/default.php';

/**
 * Load helpers.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/helper/common.php';
require_once trailingslashit( get_template_directory() ) . 'inc/helper/options.php';

/**
 * Load theme core functions.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/core.php';

/**
 * Load libraries.
 */
require_once trailingslashit( get_template_directory() ) . 'lib/tgm/class-tgm-plugin-activation.php';

/**
 * Load hooks.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/hook/basic.php';
require_once trailingslashit( get_template_directory() ) . 'inc/hook/custom.php';
require_once trailingslashit( get_template_directory() ) . 'inc/hook/tgm.php';

/**
 * Load metabox.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/metabox.php';

/**
 * Custom template tags for this theme.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/template-tags.php';

/**
 * Customizer additions.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/customizer.php';

/**
 * Load site origin.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/site-origin.php';

/**
 * Load OCDI Support.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/supports/ocdi.php';

/**
 * Load info.
 */
if ( is_admin() ) {
	require_once trailingslashit( get_template_directory() ) . 'lib/info/class.info.php';
	require_once trailingslashit( get_template_directory() ) . 'lib/info/info.php';
}
