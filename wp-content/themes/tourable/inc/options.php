<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage Tourable
 * @since Tourable 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function tourable_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'tourable' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}

if ( ! function_exists( 'tourable_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function tourable_selected_sidebar() {
        $tourable_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'tourable' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar', 'tourable' ),
        );

        $output = apply_filters( 'tourable_selected_sidebar', $tourable_selected_sidebar );

        return $output;
    }
endif;

if ( ! function_exists( 'tourable_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function tourable_site_layout() {
        $tourable_site_layout = array(
            'wide-layout'  => get_template_directory_uri() . '/assets/images/full.png',
            'boxed-layout' => get_template_directory_uri() . '/assets/images/boxed.png',
            'frame-layout' => get_template_directory_uri() . '/assets/images/framed.png',
        );

        $output = apply_filters( 'tourable_site_layout', $tourable_site_layout );
        return $output;
    }
endif;


if ( ! function_exists( 'tourable_global_sidebar_position' ) ) :
    /**
     * Global Sidebar position
     * @return array Global Sidebar positions
     */
    function tourable_global_sidebar_position() {
        $tourable_global_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'tourable_global_sidebar_position', $tourable_global_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'tourable_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function tourable_sidebar_position() {
        $tourable_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'tourable_sidebar_position', $tourable_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'tourable_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function tourable_pagination_options() {
        $tourable_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'tourable' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'tourable' ),
        );

        $output = apply_filters( 'tourable_pagination_options', $tourable_pagination_options );

        return $output;
    }
endif;

if ( ! function_exists( 'tourable_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function tourable_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'tourable' ),
            'off'       => esc_html__( 'Disable', 'tourable' )
        );
        return apply_filters( 'tourable_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'tourable_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function tourable_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'tourable' ),
            'off'       => esc_html__( 'No', 'tourable' )
        );
        return apply_filters( 'tourable_hide_options', $arr );
    }
endif;

if ( ! function_exists( 'tourable_sortable_sections' ) ) :
    /**
     * List of sections Control options
     * @return array List of Sections control options.
     */
    function tourable_sortable_sections() {
        $sections = array(
            'slider'    => esc_html__( 'Main Slider', 'tourable' ),
            'service'   => esc_html__( 'Services', 'tourable' ),
            'trip_search'  => esc_html__( 'Trip Search', 'tourable' ),
            'destinations' => esc_html__( 'Destinations', 'tourable' ),
            'cta'       => esc_html__( 'Call to Action', 'tourable' ),
            'traveler_choice'  => esc_html__( 'Traveler Choice', 'tourable' ),
            'popular_destination'  => esc_html__( 'Popular Destination', 'tourable' ),
            'blog'      => esc_html__( 'Blog', 'tourable' ),
        );
        return apply_filters( 'tourable_sortable_sections', $sections );
    }
endif;

if ( ! function_exists( 'tourable_destinations_content_type' ) ) :
    /**
     * Destination Options
     * @return array site gallery options
     */
    function tourable_destinations_content_type() {
        $tourable_destinations_content_type = array(
            'category'  => esc_html__( 'Category', 'tourable' ),
        );

        if ( class_exists( 'WP_Travel' ) ) {
            $tourable_destinations_content_type = array_merge( $tourable_destinations_content_type, array(
                'destination'   => esc_html__( 'Destination', 'tourable' ),
                ) );
        }

        $output = apply_filters( 'tourable_destinations_content_type', $tourable_destinations_content_type );

        return $output;
    }
endif;

if ( ! function_exists( 'tourable_traveler_choice_content_type' ) ) :
    /**
     * Destination Options
     * @return array site gallery options
     */
    function tourable_traveler_choice_content_type() {
        $tourable_traveler_choice_content_type = array(
            'category'  => esc_html__( 'Category', 'tourable' ),
        );

        if ( class_exists( 'WP_Travel' ) ) {
            $tourable_traveler_choice_content_type = array_merge( $tourable_traveler_choice_content_type, array(
                'trip-types'    => esc_html__( 'Trip Types', 'tourable' ),
                ) );
        }

        $output = apply_filters( 'tourable_traveler_choice_content_type', $tourable_traveler_choice_content_type );


        return $output;
    }
endif;

if ( ! function_exists( 'tourable_popular_destination_content_type' ) ) :
    /**
     * Destination Options
     * @return array site gallery options
     */
    function tourable_popular_destination_content_type() {
        $tourable_popular_destination_content_type = array(
            'category'  => esc_html__( 'Category', 'tourable' ),
        );

        if ( class_exists( 'WP_Travel' ) ) {
            $tourable_popular_destination_content_type = array_merge( $tourable_popular_destination_content_type, array(
                'destination'   => esc_html__( 'Destination', 'tourable' ),
                ) );
        }

        $output = apply_filters( 'tourable_popular_destination_content_type', $tourable_popular_destination_content_type );


        return $output;
    }
endif;
