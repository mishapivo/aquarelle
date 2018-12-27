<?php
/**
 * Implement theme meta box
 *
 * @package Travel_Gem
 */

if ( ! function_exists( 'travel_gem_add_theme_meta_box' ) ) :

	/**
	 * Add the meta box.
	 *
	 * @since 1.0.0
	 */
	function travel_gem_add_theme_meta_box() {

		$apply_metabox_post_types = array( 'post', 'page' );

		foreach ( $apply_metabox_post_types as $key => $type ) {
			add_meta_box(
				'travel-gem-theme-settings',
				esc_html__( 'Theme Settings', 'travel-gem' ),
				'travel_gem_render_theme_settings_metabox',
				$type,
				'normal',
				'high'
			);
		}

	}

endif;

add_action( 'add_meta_boxes', 'travel_gem_add_theme_meta_box' );

if ( ! function_exists( 'travel_gem_render_theme_settings_metabox' ) ) :

	/**
	 * Enqueue metabox scripts and styles.
	 *
	 * @since 1.0.0
	 *
	 * @param string $hook Hook name.
	 */
	function travel_gem_admin_scripts( $hook ) {

		$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		if ( in_array( $hook, array( 'post.php', 'post-new.php' ) ) ) {
			wp_enqueue_style( 'travel-gem-metabox', get_template_directory_uri() . '/css/metabox' . $min . '.css', array(), '1.0.0' );
		}
	}

endif;

add_action( 'admin_enqueue_scripts', 'travel_gem_admin_scripts' );

if ( ! function_exists( 'travel_gem_render_theme_settings_metabox' ) ) :

	/**
	 * Render theme settings meta box.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Post $post    The current post.
	 * @param array   $metabox Metabox arguments.
	 */
	function travel_gem_render_theme_settings_metabox( $post, $metabox ) {

		// Meta box nonce for verification.
		wp_nonce_field( basename( __FILE__ ), 'travel_gem_theme_settings_meta_box_nonce' );

		// Fetch values of current post meta.
		$values = get_post_meta( $post->ID, 'travel_gem_theme_settings', true );
		$theme_settings_header_layout = isset( $values['header_layout'] ) ? absint( $values['header_layout'] ) : 0;
		?>
		<div id="travel-gem-theme-settings-metabox-container" class="travel-gem-theme-settings-metabox-container">

			<h4><?php esc_html_e( 'Header Layout', 'travel-gem' ); ?></h4>

			<?php $header_layout_details = travel_gem_get_header_layout_options( true ); ?>
			<?php if ( ! empty( $header_layout_details ) ) : ?>
				<?php foreach ( $header_layout_details as $value => $choice ) : ?>
					<label>
						<input type="radio" value="<?php echo esc_attr( $value ); ?>" <?php checked( $theme_settings_header_layout, $value ); ?> class="stylish-radio-image" name="travel_gem_theme_settings[header_layout]" />
						<span><img src="<?php echo esc_url( $choice['url'] ); ?>" alt="<?php echo esc_attr( $choice['label'] ); ?>" /></span>
					</label>
				<?php endforeach; ?>
			<?php endif; ?>

		</div><!-- #travel-gem-theme-settings-metabox-container -->

		<?php
	}

endif;

if ( ! function_exists( 'travel_gem_save_theme_settings_meta' ) ) :

	/**
	 * Save theme settings meta box value.
	 *
	 * @since 1.0.0
	 *
	 * @param int     $post_id Post ID.
	 * @param WP_Post $post Post object.
	 */
	function travel_gem_save_theme_settings_meta( $post_id, $post ) {

		// Verify nonce.
		if (
			! ( isset( $_POST['travel_gem_theme_settings_meta_box_nonce'] )
			&& wp_verify_nonce( sanitize_key( $_POST['travel_gem_theme_settings_meta_box_nonce'] ), basename( __FILE__ ) ) )
		) {
			return;
		}

		// Bail if auto save or revision.
		if ( defined( 'DOING_AUTOSAVE' ) || is_int( wp_is_post_revision( $post ) ) || is_int( wp_is_post_autosave( $post ) ) ) {
			return;
		}

		// Check the post being saved == the $post_id to prevent triggering this call for other save_post events.
		if ( empty( $_POST['post_ID'] ) || absint( $_POST['post_ID'] ) !== $post_id ) {
			return;
		}

		// Check permission.
		if ( isset( $_POST['post_type'] ) && 'page' === $_POST['post_type'] ) {
			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return;
			}
		} elseif ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		if ( isset( $_POST['travel_gem_theme_settings'] ) && is_array( $_POST['travel_gem_theme_settings'] ) ) {
			$raw_value = wp_slash( $_POST['travel_gem_theme_settings'] );

			if ( ! array_filter( $raw_value ) ) {

				// No value.
				delete_post_meta( $post_id, 'travel_gem_theme_settings' );

			} else {

				$meta_fields = array(
					'header_layout' => array(
						'type' => 'select',
						),
					);

				$sanitized_values = array();

				foreach ( $raw_value as $mk => $mv ) {

					if ( isset( $meta_fields[ $mk ]['type'] ) ) {
						switch ( $meta_fields[ $mk ]['type'] ) {
							case 'select':
								$sanitized_values[ $mk ] = sanitize_key( $mv );
								break;
							case 'checkbox':
								$sanitized_values[ $mk ] = absint( $mv ) > 0 ? 1 : 0;
								break;
							default:
								$sanitized_values[ $mk ] = sanitize_text_field( $mv );
								break;
						}
					}
				}

				update_post_meta( $post_id, 'travel_gem_theme_settings', $sanitized_values );
			}
		} // End if theme settings.

	}

endif;

add_action( 'save_post', 'travel_gem_save_theme_settings_meta', 10, 2 );
