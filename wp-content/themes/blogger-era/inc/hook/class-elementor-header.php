<?php
/**
 * Elementor Compatibility File.
 *
 * @package Blogger_Era
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Blogger Era Elementor Header and Footer Builder Compatibility
 */
if ( ! class_exists( 'Blogger_Era_Elementor_Header_Footer_Builder' ) ) :

	/**
	 * Blogger Era Elementor Header and Footer Builder Compatibility
	 *
	 * @since 1.0.0
	 */
	class Blogger_Era_Elementor_Header_Footer_Builder {

		/**
		 * Constructor
		 *
		 * @since 1.0.0
		 */
		public function __construct() {

			// Override theme templates.
			add_action( 'blogger_era_action_header', array( $this, 'blogger_era_header_builder' ), 0 );
			add_action( 'blogger_era_action_header', array( $this, 'blogger_era_render_hfe_header' ), 0 );
			add_action( 'blogger_era_action_footer', array( $this, 'blogger_era_footer_builder' ), 0 );
			add_action( 'blogger_era_action_footer', array( $this, 'blogger_era_render_hfe_footer' ), 0 );
			
		}

		/**
		 * Header Builder Support
		 *
		 */
		public function blogger_era_header_builder() {
				remove_action( 'blogger_era_action_header', 'blogger_era_top_header', 10 );
				remove_action( 'blogger_era_action_header', 'blogger_era_site_header', 15 );

		}

		public function blogger_era_render_hfe_header() {
	
			if ( function_exists( 'hfe_render_header' ) ) {
				hfe_render_header();
			}

		}

		/**
		 * Footer Builder Support
		 */
		public function blogger_era_footer_builder() {
			
			remove_action( 'blogger_era_action_footer', 'blogger_era_footer_instagram', 10 );
			remove_action( 'blogger_era_action_footer', 'blogger_era_footer_menu', 15 );
			remove_action( 'blogger_era_action_footer', 'blogger_era_footer_widget', 20 );
			remove_action( 'blogger_era_action_footer', 'blogger_era_footer_menu' );


		}

		public function blogger_era_render_hfe_footer() {
	
			if ( function_exists( 'hfe_render_header' ) ) {
				hfe_render_footer();
			}

		}		

	}

endif;

return new Blogger_Era_Elementor_Header_Footer_Builder();
