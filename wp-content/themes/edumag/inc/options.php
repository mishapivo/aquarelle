<?php
/**
 * Theme_Palace options
 *
 * @package Theme Palace
 * @subpackage EduMag
 * @since EduMag 0.1
 */

if( ! function_exists( 'edumag_enable_disable_options' ) ) :
    /**
     * Section enable/disable options
     * @return array enable/disable options
     */
    function edumag_enable_disable_options() {
        $edumag_enable_disable_options = array(
            'static-frontpage'  => esc_html__( 'Static Frontpage', 'edumag' ),
            'disabled'          => esc_html__( 'Disabled', 'edumag' ),
        );

        $output = apply_filters( 'edumag_enable_disable_options', $edumag_enable_disable_options );
      
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;

if( ! function_exists( 'edumag_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function edumag_site_layout() {
        $edumag_site_layout = array(
            'wide'  => esc_html__( 'Wide', 'edumag' ),
            'boxed' => esc_html__( 'Boxed', 'edumag' ),
        );

        $output = apply_filters( 'edumag_site_layout', $edumag_site_layout );

        return $output;
    }
endif;

if( !function_exists( 'edumag_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function edumag_sidebar_position() {
      $edumag_sidebar_position = array(
        'right-sidebar' => esc_html__( 'Right', 'edumag' ),
        'no-sidebar'    => esc_html__( 'No Sidebar', 'edumag' ),
      );

      $output = apply_filters( 'edumag_sidebar_position', $edumag_sidebar_position );

      return $output;
    }
endif;

if( ! function_exists( 'edumag_selected_sidebar' ) ) :
    /**
     * Selected sidebar
     * @return array available Sidbar
     */
    function edumag_selected_sidebar() {
        $edumag_selected_sidebar = array(
            'sidebar-1'          => esc_html__( 'Default ( Primary Sidebar )', 'edumag' ),
            'front_page_sidebar' => esc_html__( 'Front Page Sidebar', 'edumag' ),
            'optional_sidebar_1' => esc_html__( 'Optional Sidebar 1', 'edumag' ),
            'optional_sidebar_2' => esc_html__( 'Optional Sidebar 2', 'edumag' ),
        );

        $output = apply_filters( 'edumag_selected_sidebar', $edumag_selected_sidebar );

        return $output;
    }
endif;

if( ! function_exists( 'edumag_header_image' ) ) :
    /**
     * Header image options
     * @return array Header image options
     */
    function edumag_header_image() {
        $edumag_header_image = array(
            'enable'  => esc_html__( 'Enable( Featured Image )', 'edumag' ),
            ''        => esc_html__( 'Default ( Customizer Header Image )', 'edumag' ),
            'disable' => esc_html__( 'Disable', 'edumag' ),
        );

        $output = apply_filters( 'edumag_header_image', $edumag_header_image );

        return $output;
    }
endif;