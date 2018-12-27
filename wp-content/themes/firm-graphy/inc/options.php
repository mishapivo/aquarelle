<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage Firm Graphy
 * @since Firm Graphy 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function firm_graphy_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'firm-graphy' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}


if ( ! function_exists( 'firm_graphy_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function firm_graphy_site_layout() {
        $firm_graphy_site_layout = array(
            'wide-layout'  => get_template_directory_uri() . '/assets/images/full.png',
            'boxed-layout' => get_template_directory_uri() . '/assets/images/boxed.png',
        );

        $output = apply_filters( 'firm_graphy_site_layout', $firm_graphy_site_layout );
        return $output;
    }
endif;

if ( ! function_exists( 'firm_graphy_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function firm_graphy_selected_sidebar() {
        $firm_graphy_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'firm-graphy' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar 1', 'firm-graphy' ),
        );

        $output = apply_filters( 'firm_graphy_selected_sidebar', $firm_graphy_selected_sidebar );

        return $output;
    }
endif;


if ( ! function_exists( 'firm_graphy_global_sidebar_position' ) ) :
    /**
     * Global Sidebar position
     * @return array Global Sidebar positions
     */
    function firm_graphy_global_sidebar_position() {
        $firm_graphy_global_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'firm_graphy_global_sidebar_position', $firm_graphy_global_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'firm_graphy_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function firm_graphy_sidebar_position() {
        $firm_graphy_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'firm_graphy_sidebar_position', $firm_graphy_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'firm_graphy_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function firm_graphy_pagination_options() {
        $firm_graphy_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'firm-graphy' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'firm-graphy' ),
        );

        $output = apply_filters( 'firm_graphy_pagination_options', $firm_graphy_pagination_options );

        return $output;
    }
endif;

if ( ! function_exists( 'firm_graphy_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function firm_graphy_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'firm-graphy' ),
            'off'       => esc_html__( 'Disable', 'firm-graphy' )
        );
        return apply_filters( 'firm_graphy_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'firm_graphy_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function firm_graphy_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'firm-graphy' ),
            'off'       => esc_html__( 'No', 'firm-graphy' )
        );
        return apply_filters( 'firm_graphy_hide_options', $arr );
    }
endif;

if ( ! function_exists( 'firm_graphy_sortable_sections' ) ) :
    /**
     * List of sections Control options
     * @return array List of Sections control options.
     */
    function firm_graphy_sortable_sections() {
        $sections = array(
            'banner'    => esc_html__( 'Banner', 'firm-graphy' ),
            'service'   => esc_html__( 'Services', 'firm-graphy' ),
            'about'     => esc_html__( 'About Us', 'firm-graphy' ),
            'latest'    => esc_html__( 'Latest', 'firm-graphy' ),
            'introduction' => esc_html__( 'Introduction', 'firm-graphy' ),
            'event'     => esc_html__( 'Event', 'firm-graphy' ),
            'client'    => esc_html__( 'Client', 'firm-graphy' ),
            'blog'      => esc_html__( 'Blog', 'firm-graphy' ),

        );
        return apply_filters( 'firm_graphy_sortable_sections', $sections );
    }
endif;