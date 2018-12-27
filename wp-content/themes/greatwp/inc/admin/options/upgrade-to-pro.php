<?php
/**
* Upgrade to pro options
*
* @package GreatWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license licennse URI, for example : http://www.gnu.org/licenses/gpl-2.0.html
* @author ThemesDNA <themesdna@gmail.com>
*/

function greatwp_upgrade_to_pro($wp_customize) {

    $wp_customize->add_section( 'sc_greatwp_upgrade', array( 'title' => esc_html__( 'Upgrade to Pro Version', 'greatwp' ), 'priority' => 400 ) );
    
    $wp_customize->add_setting( 'greatwp_options[upgrade_text]', array( 'default' => '', 'sanitize_callback' => '__return_false', ) );
    
    $wp_customize->add_control( new GreatWP_Customize_Static_Text_Control( $wp_customize, 'greatwp_upgrade_text_control', array(
        'label'       => esc_html__( 'GreatWP Pro', 'greatwp' ),
        'section'     => 'sc_greatwp_upgrade',
        'settings' => 'greatwp_options[upgrade_text]',
        'description' => esc_html__( 'Do you enjoy GreatWP? Upgrade to GreatWP Pro now and get:', 'greatwp' ).
            '<ul class="greatwp-customizer-pro-features">' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Color Options', 'greatwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Font Options', 'greatwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Layout Options (separate options for singular and non-singular pages)', 'greatwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( '10+ Custom Page/Post Templates', 'greatwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( '10 Different Posts Styles', 'greatwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( '17 Different Featured Posts Widgets(each widget displays recent/popular/random posts or posts from a given category or tag.)', 'greatwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Featured Posts Slider(this widget displays recent/popular/random posts or posts from a given category or tag.)', 'greatwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'News Ticker', 'greatwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Tabbed Widget', 'greatwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Social Profiles Widget and About Me Widget', 'greatwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( '2 Header Layouts (full-width header or header+728x90 ad)', 'greatwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Post Share Buttons', 'greatwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Related Posts with Thumbnails', 'greatwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Author Bio Box with Social Buttons', 'greatwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Sticky Menu/Sticky Sidebars with enable/disable capability', 'greatwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Built-in Contact Form', 'greatwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'WooCommerce Support', 'greatwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Search Engine Optimized', 'greatwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'More Customizer options', 'greatwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'More Features...', 'greatwp' ) . '</li>' .
            '</ul>'.
            '<strong><a href="'.GREATWP_PROURL.'" class="button button-primary" target="_blank"><i class="fa fa-shopping-cart"></i> ' . esc_html__( 'Upgrade To GreatWP PRO', 'greatwp' ) . '</a></strong>'
    ) ) ); 

}