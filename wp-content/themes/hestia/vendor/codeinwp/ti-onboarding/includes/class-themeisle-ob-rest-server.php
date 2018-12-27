<?php
/**
 * Onboarding Rest Endpoints Handler.
 *
 * Author:          Andrei Baicus <andrei@themeisle.com>
 * Created on:      12/07/2018
 *
 * @package         themeisle-onboarding
 * @soundtrack      Caterpillar (feat. Eminem, King Green) - Royce da 5'9"
 */

/**
 * Class Themeisle_OB_Rest_Server
 *
 * @package themeisle-onboarding
 */
class Themeisle_OB_Rest_Server {
	/**
	 * Initialize the rest functionality.
	 */
	public function init() {
		add_action( 'rest_api_init', array( $this, 'register_endpoints' ) );
	}

	/**
	 * Register endpoints.
	 */
	public function register_endpoints() {
		register_rest_route(
			Themeisle_Onboarding::API_ROOT,
			'/initialize_sites_library',
			array(
				'methods'             => WP_REST_Server::READABLE,
				'callback'            => array( $this, 'init_library' ),
				'permission_callback' => function () {
					return current_user_can( 'manage_options' );
				},
			)
		);
		register_rest_route(
			Themeisle_Onboarding::API_ROOT,
			'/install_plugins',
			array(
				'methods'             => WP_REST_Server::EDITABLE,
				'callback'            => array( $this, 'run_plugin_importer' ),
				'permission_callback' => function () {
					return current_user_can( 'manage_options' );
				},
			)
		);
		register_rest_route(
			Themeisle_Onboarding::API_ROOT,
			'/import_content',
			array(
				'methods'             => WP_REST_Server::EDITABLE,
				'callback'            => array( $this, 'run_xml_importer' ),
				'permission_callback' => function () {
					return current_user_can( 'manage_options' );
				},
			)
		);
		register_rest_route(
			Themeisle_Onboarding::API_ROOT,
			'/import_theme_mods',
			array(
				'methods'             => WP_REST_Server::EDITABLE,
				'callback'            => array( $this, 'run_theme_mods_importer' ),
				'permission_callback' => function () {
					return current_user_can( 'manage_options' );
				},
			)
		);
		register_rest_route(
			Themeisle_Onboarding::API_ROOT,
			'/import_widgets',
			array(
				'methods'             => WP_REST_Server::EDITABLE,
				'callback'            => array( $this, 'run_widgets_importer' ),
				'permission_callback' => function () {
					return current_user_can( 'manage_options' );
				},
			)
		);
		register_rest_route(
			Themeisle_Onboarding::API_ROOT,
			'/migrate_frontpage',
			array(
				'methods'             => WP_REST_Server::EDITABLE,
				'callback'            => array( $this, 'run_front_page_migration' ),
				'permission_callback' => function () {
					return current_user_can( 'manage_options' );
				},
			)
		);

		register_rest_route(
			Themeisle_Onboarding::API_ROOT,
			'/dismiss_migration',
			array(
				'methods'             => WP_REST_Server::EDITABLE,
				'callback'            => array( $this, 'dismiss_migration' ),
				'permission_callback' => function () {
					return current_user_can( 'manage_options' );
				},
			)
		);
	}

	/**
	 * Initialize Library
	 *
	 * @return array
	 */
	public function init_library() {

		$cached = get_transient( Themeisle_Onboarding::STORAGE_TRANSIENT );

		if ( ! empty( $cached ) ) {
			// return $cached;
		}

		$theme_support = get_theme_support( 'themeisle-demo-import' );
		if ( empty( $theme_support[0] ) || ! is_array( $theme_support[0] ) ) {
			return array();
		}
		$i18n                 = isset( $theme_support[0]['i18n'] ) ? $theme_support[0]['i18n'] : array();
		$migrate_data         = isset( $theme_support[0]['can_migrate'] ) ? $theme_support[0]['can_migrate'] : array();
		$local_data           = isset( $theme_support[0]['local'] ) ? $theme_support[0]['local'] : array();
		$remote_data          = isset( $theme_support[0]['remote'] ) ? $theme_support[0]['remote'] : array();
		$upsell_data          = isset( $theme_support[0]['upsell'] ) ? $theme_support[0]['upsell'] : array();
		$default_template     = isset( $theme_support[0]['default_template'] ) ? $theme_support[0]['default_template'] : array();
		$pro_link             = isset( $theme_support[0]['pro_link'] ) ? $theme_support[0]['pro_link'] : '';
		$data                 = array();
		$data['i18n']         = $i18n;
		$data['migrate_data'] = $this->get_migrateable( $migrate_data );

		foreach ( $local_data as $slug => $args ) {
			$json_path = get_template_directory() . '/onboarding/' . $slug . '/data.json';

			if ( ! file_exists( $json_path ) || ! is_readable( $json_path ) ) {
				continue;
			}

			require_once( ABSPATH . '/wp-admin/includes/file.php' );
			global $wp_filesystem;
			WP_Filesystem();
			$json = $wp_filesystem->get_contents( $json_path );

			$data['local'][ $slug ]                 = json_decode( $json, true );
			$data['local'][ $slug ]['title']        = esc_html( $args['title'] );
			$data['local'][ $slug ]['demo_url']     = esc_url( $args['url'] );
			$data['local'][ $slug ]['content_file'] = get_template_directory() . '/onboarding/' . $slug . '/export.xml';
			$data['local'][ $slug ]['screenshot']   = esc_url( get_template_directory_uri() . '/onboarding/' . $slug . '/screenshot.png' );
			$data['local'][ $slug ]['source']       = 'local';
		}

		foreach ( $remote_data as $slug => $args ) {
			$request       = wp_remote_get( $args['url'] . '/wp-json/ti-demo-data/data' );
			$response_code = wp_remote_retrieve_response_code( $request );

			if ( $response_code !== 200 ) {
				continue;
			}

			if ( empty( $request['body'] ) || ! isset( $request['body'] ) ) {
				continue;
			}

			$data['remote'][ $slug ]               = json_decode( $request['body'], true );
			$data['remote'][ $slug ]['title']      = esc_html( $args['title'] );
			$data['remote'][ $slug ]['demo_url']   = esc_url( $args['url'] );
			$data['remote'][ $slug ]['screenshot'] = esc_url( $args['screenshot'] );
			$data['remote'][ $slug ]['source']     = 'remote';
		}

		foreach ( $upsell_data as $slug => $args ) {
			$request       = wp_remote_get( $args['url'] . '/wp-json/ti-demo-data/data' );
			$response_code = wp_remote_retrieve_response_code( $request );
			if ( $response_code !== 200 ) {
				continue;
			}
			if ( empty( $request['body'] ) || ! isset( $request['body'] ) ) {
				continue;
			}
			$data['upsell'][ $slug ]               = json_decode( $request['body'], true );
			$data['upsell'][ $slug ]['title']      = esc_html( $args['title'] );
			$data['upsell'][ $slug ]['demo_url']   = esc_url( $args['url'] );
			$data['upsell'][ $slug ]['screenshot'] = esc_url( $args['screenshot'] );
			$data['upsell'][ $slug ]['source']     = 'remote';
			$data['upsell'][ $slug ]['in_pro']     = true;
		}

		if ( !empty( $default_template ) ) {
			$data['default_template']['screenshot'] = $default_template['screenshot'];
			$data['default_template']['name']       = $default_template['name'];
		}

		if ( isset( $pro_link ) ) {
			$data['pro_link'] = $pro_link;
		}

		// set_transient( Themeisle_Onboarding::STORAGE_TRANSIENT, $data, 6 * HOUR_IN_SECONDS );
		return $data;
	}

	/**
	 * @param $data
	 *
	 * @return array
	 */
	private function get_migrateable( $data ) {
		$old_theme = get_theme_mod( 'ti_prev_theme', 'ti_onboarding_undefined' );
		if ( ! array_key_exists( $old_theme, $data ) ) {
			return array();
		}

		$content_imported = get_theme_mod( $data[ $old_theme ]['theme_mod_check'], 'not-imported' );
		if ( $content_imported === 'yes' ) {
			return array();
		}

		$folder_name = $old_theme;
		if ( $old_theme === 'zerif-lite' || $old_theme === 'zerif-pro' ) {
			$folder_name = 'zelle';
		}

		return array(
			'theme_name'    => ! empty( $data[ $old_theme ]['theme_name'] ) ? esc_html( $data[ $old_theme ]['theme_name'] ) : '',
			'screenshot'    => get_template_directory_uri() . '/vendor/codeinwp/ti-onboarding/migration/' . $folder_name . '/' . $data[ $old_theme ]['template'] . '.png',
			'template'      => get_template_directory() . Themeisle_Onboarding::OBOARDING_PATH . '/migration/' . $folder_name . '/' . $data[ $old_theme ]['template'] . '.json',
			'template_name' => $data[ $old_theme ]['template'],
			'heading'       => $data[ $old_theme ]['heading'],
			'description'   => $data[ $old_theme ]['description'],
			'theme_mod'     => $data[ $old_theme ]['theme_mod_check'],
		);
	}

	/**
	 * Run the plugin importer.
	 *
	 * @param WP_REST_Request $request the async request.
	 */
	public function run_plugin_importer( WP_REST_Request $request ) {
		require_once 'importers/class-themeisle-ob-plugin-importer.php';
		if ( ! class_exists( 'Themeisle_OB_Plugin_Importer' ) ) {
			wp_send_json_error( 'error', 500 );
		}
		$plugin_importer = new Themeisle_OB_Plugin_Importer();
		$plugin_importer->install_plugins( $request );
	}

	/**
	 * Run the XML importer.
	 *
	 * @param WP_REST_Request $request the async request.
	 */
	public function run_xml_importer( WP_REST_Request $request ) {
		require_once 'importers/class-themeisle-ob-content-importer.php';
		if ( ! class_exists( 'Themeisle_OB_Content_Importer' ) ) {
			wp_send_json_error( 'error', 500 );
		}
		$content_importer = new Themeisle_OB_Content_Importer();
		$content_importer->import_remote_xml( $request );
	}

	/**
	 * Run the theme mods importer.
	 *
	 * @param WP_REST_Request $request the async request.
	 */
	public function run_theme_mods_importer( WP_REST_Request $request ) {
		require_once 'importers/class-themeisle-ob-theme-mods-importer.php';
		if ( ! class_exists( 'Themeisle_OB_Theme_Mods_Importer' ) ) {
			wp_send_json_error( 'error', 500 );
		}
		$theme_mods_importer = new Themeisle_OB_Theme_Mods_Importer();
		$theme_mods_importer->import_theme_mods( $request );
	}

	/**
	 * Run the widgets importer.
	 *
	 * @param WP_REST_Request $request the async request.
	 */
	public function run_widgets_importer( WP_REST_Request $request ) {
		require_once 'importers/class-themeisle-ob-widgets-importer.php';
		if ( ! class_exists( 'Themeisle_OB_Widgets_Importer' ) ) {
			wp_send_json_error( 'error', 500 );
		}
		$theme_mods_importer = new Themeisle_OB_Widgets_Importer();
		$theme_mods_importer->import_widgets( $request );

        set_theme_mod( 'ti_content_imported', 'yes' );
    }

	public function run_front_page_migration( WP_REST_Request $request ) {

		$params = $request->get_json_params();
		if ( ! isset( $params['template'] ) ) {
			wp_send_json_error( 'error', 500 );
		}
		if ( ! isset( $params['template_name'] ) ) {
			wp_send_json_error( 'error', 500 );
		}
		require_once 'importers/class-themeisle-ob-' . $params['template_name'] . '-importer.php';
		$class_name = 'Themeisle_OB_' . ucfirst( $params['template_name'] ) . '_Importer';
		if ( ! class_exists( $class_name ) ) {
			wp_send_json_error( 'error', 500 );
		}
		$migrator = new $class_name;
		$migrator->import_zelle_frontpage( $params['template'] );
		wp_send_json_success( 'success', 200 );
	}

	public function dismiss_migration( WP_REST_Request $request ) {
		$params = $request->get_json_params();
		if ( ! isset( $params['theme_mod'] ) ) {
			wp_send_json_error( 'error', 500 );
		}
		set_theme_mod( $params['theme_mod'], 'yes' );
		wp_send_json_success( 'success', 200 );
	}
}
