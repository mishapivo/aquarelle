<?php
/**
 * Plugin Name: Advanced Gutenberg
 * Plugin URI: https://www.joomunited.com/wordpress-products/advanced-gutenberg
 * Description: Enhanced tools for Gutenberg editor
 * Version: 1.8.2
 * Tested up to: 5.0.0
 * Author: JoomUnited
 * Author URI: https://www.joomunited.com
 * License: GPL2
 * Text Domain: advanced-gutenberg
 * Domain Path: /languages
 */

/**
 * Copyright
 *
 * @copyright 2014  Joomunited  ( email : contact _at_ joomunited.com )
 *
 *  Original development of this plugin was kindly funded by Joomunited
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

defined('ABSPATH') || die;

//Check plugin requirements
if (version_compare(PHP_VERSION, '5.3', '<')) {
    if (! function_exists('advgb_disable_plugin')) {
        /**
         * Disable plugin
         *
         * @return void
         */
        function advgb_disable_plugin()
        {
            if (current_user_can('activate_plugins') && is_plugin_active(plugin_basename(__FILE__))) {
                deactivate_plugins(__FILE__);
                unset($_GET['activate']);
            }
        }
    }

    if (! function_exists('advgb_show_error')) {
        /**
         * Show error
         *
         * @return void
         */
        function advgb_show_error()
        {
            echo '<div class="error"><p><strong>Advanced Gutenberg</strong> needs at least PHP 5.3 version, please update php before installing the plugin.</p></div>';
        }
    }

    //Add actions
    add_action('admin_init', 'advgb_disable_plugin');
    add_action('admin_notices', 'advgb_show_error');

    //Do not load anything more
    return;
}

if (! defined('ADVANCED_GUTENBERG_VERSION')) {
    define('ADVANCED_GUTENBERG_VERSION', '1.8.2');
}

if (! defined('ADVANCED_GUTENBERG_PLUGIN')) {
    define('ADVANCED_GUTENBERG_PLUGIN', __FILE__);
}

if (!defined('GUTENBERG_VERSION_REQUIRED')) {
    define('GUTENBERG_VERSION_REQUIRED', '4.5.0');
}

require_once(plugin_dir_path(__FILE__) . '/install.php');
require_once(plugin_dir_path(__FILE__) . '/incl/advanced-gutenberg-main.php');
new AdvancedGutenbergMain();

// Load jutranslation helper
include_once('jutranslation' . DIRECTORY_SEPARATOR . 'jutranslation.php');
call_user_func(
    '\Joomunited\ADVGB\Jutranslation\Jutranslation::init',
    __FILE__,
    'advanced-gutenberg',
    'Advanced Gutenberg',
    'advanced-gutenberg',
    'languages' . DIRECTORY_SEPARATOR . 'advanced-gutenberg-en_US.mo'
);
