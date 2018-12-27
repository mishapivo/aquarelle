<?php
 /**
 *
 *
 * Description: A page template that displays the Homepage or a Front page as in theme main page
 *
 * @package Cpmmagz
 */
get_header();
if ('posts' == get_option('show_on_front')) {
    get_template_part('page-templates/template', 'blog');
} else {
    include(get_page_template());
}
die;
?>