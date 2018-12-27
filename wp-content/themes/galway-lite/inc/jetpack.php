<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.com/
 *
 * @package Galway Lite
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/responsive-videos/
 */
function galway_lite_jetpack_setup()
{
    // Add theme support for Responsive Videos.
    add_theme_support('jetpack-responsive-videos');
}

add_action('after_setup_theme', 'galway_lite_jetpack_setup');
