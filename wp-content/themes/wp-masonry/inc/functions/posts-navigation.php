<?php
/**
* Posts navigation functions
*
* @package WP Masonry WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

if ( ! function_exists( 'wp_masonry_wp_pagenavi' ) ) :
function wp_masonry_wp_pagenavi() {
    ?>
    <nav class="navigation posts-navigation clearfix" role="navigation">
        <?php wp_pagenavi(); ?>
    </nav><!-- .navigation -->
    <?php
}
endif;

if ( ! function_exists( 'wp_masonry_posts_navigation' ) ) :
function wp_masonry_posts_navigation() {
    if ( function_exists( 'wp_pagenavi' ) ) {
        wp_masonry_wp_pagenavi();
    } else {
        the_posts_navigation(array('prev_text' => esc_html__( '&larr; Older posts', 'wp-masonry' ), 'next_text' => esc_html__( 'Newer posts &rarr;', 'wp-masonry' )));
    }
}
endif;