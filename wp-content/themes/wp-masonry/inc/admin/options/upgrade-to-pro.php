<?php
/**
* Upgrade to pro options
*
* @package WP Masonry WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license licennse URI, for example : http://www.gnu.org/licenses/gpl-2.0.html
* @author ThemesDNA <themesdna@gmail.com>
*/

function wp_masonry_upgrade_to_pro($wp_customize) {

    $wp_customize->add_section( 'sc_wp_masonry_upgrade', array( 'title' => esc_html__( 'Upgrade to Pro Version', 'wp-masonry' ), 'priority' => 400 ) );
    
    $wp_customize->add_setting( 'wp_masonry_options[upgrade_text]', array( 'default' => '', 'sanitize_callback' => '__return_false', ) );
    
    $wp_customize->add_control( new WP_Masonry_Customize_Static_Text_Control( $wp_customize, 'wp_masonry_upgrade_text_control', array(
        'label'       => esc_html__( 'WP Masonry Pro', 'wp-masonry' ),
        'section'     => 'sc_wp_masonry_upgrade',
        'settings' => 'wp_masonry_options[upgrade_text]',
        'description' => esc_html__( 'Do you enjoy WP Masonry? Upgrade to WP Masonry Pro now and get:', 'wp-masonry' ).
            '<ul class="wp-masonry-customizer-pro-features">' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Color Options', 'wp-masonry' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Font Options', 'wp-masonry' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Layout Options (separate options for singular and non-singular pages)', 'wp-masonry' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'News Ticker', 'wp-masonry' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Custom Page Templates', 'wp-masonry' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Custom Post Templates', 'wp-masonry' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Posts Grid-Layout Styles (2/3/4/5 Columns)', 'wp-masonry' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Posts Grid-Thumbnails Styles (Horizontal/Square/Vertical/Auto Height)', 'wp-masonry' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Featured Posts Widgets with Layout Styles (2/3/4/5 Columns) and Thumbnail Styles (Horizontal/Square/Vertical/Auto Height) : These widgets displays recent/popular/random posts or posts from a given category or tag.', 'wp-masonry' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Tabbed Widget', 'wp-masonry' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Social Profiles Widget and About Me Widget', 'wp-masonry' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'More Widget Areas', 'wp-masonry' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( '5 Header Layouts (full-width / logo+728x90 ad /logo+menu /...)', 'wp-masonry' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Post Share Buttons', 'wp-masonry' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Related Posts with Thumbnails', 'wp-masonry' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Author Bio Box with Social Buttons', 'wp-masonry' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Sticky Menu/Sticky Sidebars with enable/disable capability', 'wp-masonry' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Built-in Contact Form', 'wp-masonry' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'WooCommerce Support', 'wp-masonry' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Search Engine Optimized', 'wp-masonry' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'More Customizer options', 'wp-masonry' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'More Features...', 'wp-masonry' ) . '</li>' .
            '</ul>'.
            '<strong><a href="'.WP_MASONRY_PROURL.'" class="button button-primary" target="_blank"><i class="fa fa-shopping-cart"></i> ' . esc_html__( 'Upgrade To WP Masonry PRO', 'wp-masonry' ) . '</a></strong>'
    ) ) ); 

}