<?php
/**
* Partial functions
*
* @package Theme Palace
* @subpackage Firm Graphy
* @since Firm Graphy 1.0.0
*/


if ( ! function_exists( 'firm_graphy_banner_btn_label_partial' ) ) :
    // banner btn_title
    function firm_graphy_banner_btn_label_partial() {
        $options = firm_graphy_get_theme_options();
        return esc_html( $options['banner_btn_label'] );
    }
endif;


if ( ! function_exists( 'firm_graphy_service_title_partial' ) ) :
    // service title
    function firm_graphy_service_title_partial() {
        $options = firm_graphy_get_theme_options();
        return esc_html( $options['service_title'] );
    }
endif;

if ( ! function_exists( 'firm_graphy_about_btn_title_partial' ) ) :
    // about btn title
    function firm_graphy_about_btn_title_partial() {
        $options = firm_graphy_get_theme_options();
        return esc_html( $options['about_btn_title'] );
    }
endif;

if ( ! function_exists( 'firm_graphy_latest_title_partial' ) ) :
    // latest title
    function firm_graphy_latest_title_partial() {
        $options = firm_graphy_get_theme_options();
        return esc_html( $options['latest_title'] );
    }
endif;

if ( ! function_exists( 'firm_graphy_introduction_btn_label_partial' ) ) :
    // introduction btn_label
    function firm_graphy_introduction_btn_label_partial() {
        $options = firm_graphy_get_theme_options();
        return esc_html( $options['introduction_btn_label'] );
    }
endif;

if ( ! function_exists( 'firm_graphy_event_title_partial' ) ) :
    // event title
    function firm_graphy_event_title_partial() {
        $options = firm_graphy_get_theme_options();
        return esc_html( $options['event_title'] );
    }
endif;

if ( ! function_exists( 'firm_graphy_client_title_partial' ) ) :
    // client title
    function firm_graphy_client_title_partial() {
        $options = firm_graphy_get_theme_options();
        return esc_html( $options['client_title'] );
    }
endif;

if ( ! function_exists( 'firm_graphy_blog_title_partial' ) ) :
    // blog title
    function firm_graphy_blog_title_partial() {
        $options = firm_graphy_get_theme_options();
        return esc_html( $options['blog_title'] );
    }
endif;

if ( ! function_exists( 'firm_graphy_copyright_text_partial' ) ) :
    // copyright text
    function firm_graphy_copyright_text_partial() {
        $options = firm_graphy_get_theme_options();
        return esc_html( $options['copyright_text'] );
    }
endif;
