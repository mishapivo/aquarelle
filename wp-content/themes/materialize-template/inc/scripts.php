<?php
/**
 *
 *
 *  Materialize Template <http://wordpress.org>
 *
 *  By KRATZ Geoffrey AKA Jul6art AKA VanIllaSkype
 *  for VsWeb <https://vsweb.be>
 *
 *  https://vsweb.be
 *  admin@vsweb.be
 *
 *  Special thanks to Brynnlow
 *  for his contribution
 *
 *  It is free software; you can redistribute it and/or modify it under
 *  the terms of the GNU General Public License, either version 2
 *  of the License, or any later version.
 *
 *  For the full copyright and license information, please read the
 *  LICENSE.txt file that was distributed with this source code.
 *
 *  The flex one, in a flex world
 *
 *     __    __    ___            __    __    __   ____
 *     \ \  / /   / __|           \ \  /  \  / /  |  __\   __
 *      \ \/ / _  \__ \  _         \ \/ /\ \/ /   |  __|  |  _\
 *       \__/ (_) |___/ (_)         \__/  \__/    |  __/  |___/
 *
 *                    https://vsweb.be
 *
 */

function materialize_template_scripts()
{
    wp_enqueue_script('comment-reply');

    // Internet Explorer HTML5 support
    wp_enqueue_script( 'materialize-template-html5',get_template_directory_uri() . '/js/html5.min.js', array(), null, false);
    wp_script_add_data( 'materialize-template-html5', 'conditional', 'lt IE 9' );

    // Add materialize fonts
    wp_enqueue_style('materialize-template-fonts', 'https://fonts.googleapis.com/icon?family=Material+Icons', array(), null);

    // Load materialize css
    wp_enqueue_style('materialize-template-style', get_template_directory_uri() . '/css/materialize.min.css');

    // Load custom css
    wp_enqueue_style('materialize-template-custom-style', get_template_directory_uri() . '/css/style.css');

    // Load materialize js
    wp_enqueue_script(
        'materialize-template-script',
        get_template_directory_uri() . '/js/materialize.min.js',
        array('jquery'),
        null
    );

    // Load custom script
    wp_enqueue_script(
        'materialize-template-custom-script',
        get_template_directory_uri() . '/js/custom.js',
        array('jquery'),
        null
    );
}

add_action( 'wp_enqueue_scripts', 'materialize_template_scripts' );