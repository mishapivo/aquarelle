<?php
/**
 * Trip Search Section options
 *
 * @package Theme Palace
 * @subpackage Tourable
 * @since Tourable 1.0.0
 */

// Add Trip Search section
$wp_customize->add_section( 'tourable_trip_search_section', array(
	'title'             => esc_html__( 'Trip Search','tourable' ),
	'description'       => sprintf( '%1$s <a href="' . esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins&plugin_status=install' ) ) . '" target="_blank"> %2$s </a> %3$s', esc_html__( 'To enable Trip Search. Download and Activate WP Travel plugin. ', 'tourable' ), esc_html__( 'Click Here', 'tourable' ), esc_html__( 'to download.', 'tourable' ) ),
	'panel'             => 'tourable_front_page_panel',
) );

// Trip Search content enable control and setting
$wp_customize->add_setting( 'tourable_theme_options[trip_search_section_enable]', array(
	'default'			=> 	$options['trip_search_section_enable'],
	'sanitize_callback' => 'tourable_sanitize_switch_control',
) );

$wp_customize->add_control( new Tourable_Switch_Control( $wp_customize, 'tourable_theme_options[trip_search_section_enable]', array(
	'label'             => esc_html__( 'Trip Search Section Enable', 'tourable' ),
	'section'           => 'tourable_trip_search_section',
	'on_off_label' 		=> tourable_switch_options(),
) ) );

// trip_search title setting and control
$wp_customize->add_setting( 'tourable_theme_options[trip_search_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['trip_search_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'tourable_theme_options[trip_search_title]', array(
	'label'           	=> esc_html__( 'Title', 'tourable' ),
	'section'        	=> 'tourable_trip_search_section',
	'active_callback' 	=> 'tourable_is_trip_search_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'tourable_theme_options[trip_search_title]', array(
		'selector'            => '#travel-search-section .section-header h2.section-title',
		'settings'            => 'tourable_theme_options[trip_search_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'tourable_trip_search_title_partial',
    ) );
}
