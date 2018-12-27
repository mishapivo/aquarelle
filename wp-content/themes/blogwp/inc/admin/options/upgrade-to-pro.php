<?php
/**
* Upgrade to pro options
*
* @package BlogWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license licennse URI, for example : http://www.gnu.org/licenses/gpl-2.0.html
* @author ThemesDNA <themesdna@gmail.com>
*/

function blogwp_upgrade_to_pro($wp_customize) {

    $wp_customize->add_section( 'sc_blogwp_upgrade', array( 'title' => esc_html__( 'Upgrade to Pro Version', 'blogwp' ), 'priority' => 400 ) );
    
    $wp_customize->add_setting( 'blogwp_options[upgrade_text]', array( 'default' => '', 'sanitize_callback' => '__return_false', ) );
    
    $wp_customize->add_control( new BlogWP_Customize_Static_Text_Control( $wp_customize, 'blogwp_upgrade_text_control', array(
        'label'       => esc_html__( 'BlogWP Pro', 'blogwp' ),
        'section'     => 'sc_blogwp_upgrade',
        'settings' => 'blogwp_options[upgrade_text]',
        'description' => esc_html__( 'Do you enjoy BlogWP? Upgrade to BlogWP Pro now and get:', 'blogwp' ).
            '<ul class="blogwp-customizer-pro-features">' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Color Options', 'blogwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Font Options', 'blogwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Top Featured Content Area with More Options', 'blogwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Layout Options (separate options for singular and non-singular pages)', 'blogwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( '10+ Custom Page/Post Templates', 'blogwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( '10 Different Posts Styles', 'blogwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( '17 Different Featured Posts Widgets(each widget displays recent/popular/random posts or posts from a given category or tag.)', 'blogwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'News Ticker', 'blogwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Tabbed Widget', 'blogwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Social Profiles Widget and About Me Widget', 'blogwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( '2 Header Layouts (full-width header or header+728x90 ad)', 'blogwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Footer Layouts (2 Columns/3 Columns/4 Columns)', 'blogwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Post Share Buttons', 'blogwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Related Posts with Thumbnails', 'blogwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Author Bio Box with Social Buttons', 'blogwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Sticky Menu/Sticky Sidebars with enable/disable capability', 'blogwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Built-in Contact Form', 'blogwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'WooCommerce Support', 'blogwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Search Engine Optimized', 'blogwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'More Customizer options', 'blogwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'More Features...', 'blogwp' ) . '</li>' .
            '</ul>'.
            '<strong><a href="'.BLOGWP_PROURL.'" class="button button-primary" target="_blank"><i class="fa fa-shopping-cart"></i> ' . esc_html__( 'Upgrade To BlogWP PRO', 'blogwp' ) . '</a></strong>'
    ) ) ); 

}