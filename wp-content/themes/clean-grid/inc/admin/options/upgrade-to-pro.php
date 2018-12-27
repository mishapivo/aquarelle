<?php
/**
* Upgrade to pro options
*
* @package Clean Grid WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function clean_grid_upgrade_to_pro($wp_customize) {

    $wp_customize->add_section( 'sc_clean_grid_upgrade', array( 'title' => esc_html__( 'Upgrade to Pro Version', 'clean-grid' ), 'priority' => 400 ) );
    
    $wp_customize->add_setting( 'clean_grid_options[upgrade_text]', array( 'default' => '', 'sanitize_callback' => '__return_false', ) );
    
    $wp_customize->add_control( new Clean_Grid_Customize_Static_Text_Control( $wp_customize, 'clean_grid_upgrade_text_control', array(
        'label'       => esc_html__( 'Clean Grid Pro', 'clean-grid' ),
        'section'     => 'sc_clean_grid_upgrade',
        'settings' => 'clean_grid_options[upgrade_text]',
        'description' => esc_html__( 'Do you enjoy Clean Grid? Upgrade to Clean Grid Pro now and get:', 'clean-grid' ).
            '<ul class="clean-grid-customizer-pro-features">' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Color Options', 'clean-grid' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Font Options', 'clean-grid' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Layout Options', 'clean-grid' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'News Ticker', 'clean-grid' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Custom Page Templates', 'clean-grid' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Custom Post Templates', 'clean-grid' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Posts Grid-Layout Styles (2/3/4 Columns)', 'clean-grid' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Posts Grid-Thumbnails Styles (Horizontal/Square/Vertical/Auto Height)', 'clean-grid' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Featured Posts Widgets with Layout Styles (2/3/4 Columns) and Thumbnail Styles (Horizontal/Square/Vertical/Auto Height) : These widgets displays recent/popular/random posts or posts from a given category or tag.', 'clean-grid' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Tabbed Widget', 'clean-grid' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Social Profiles Widget and About Me Widget', 'clean-grid' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( '2 Header Layouts (full-width header or header+728x90 ad)', 'clean-grid' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Post Summaries/Posts Share Buttons', 'clean-grid' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Related Posts with Thumbnails', 'clean-grid' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Author Bio Box with Social Buttons', 'clean-grid' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Sticky Menu/Sticky Sidebars with enable/disable capability', 'clean-grid' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'WooCommerce Support', 'clean-grid' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Built-in Contact Form', 'clean-grid' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Search Engine Optimized', 'clean-grid' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'More Customizer options', 'clean-grid' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'More Features...', 'clean-grid' ) . '</li>' .
            '</ul>'.
            '<strong><a href="'.CLEAN_GRID_PROURL.'" class="button button-primary" target="_blank"><i class="fa fa-shopping-cart"></i> ' . esc_html__( 'Upgrade To Clean Grid PRO', 'clean-grid' ) . '</a></strong>'
    ) ) ); 

}