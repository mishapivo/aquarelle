<?php
/**
 * Meta boxes
 *
 * @package Buzzo
 */

class Buzzo_Advanced_Display_Meta_Box {

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );

		add_action( 'save_post', array( $this, 'save' ) );
	}


	public function add_meta_box( $post_type ) {
		if ( ! in_array( $post_type, array( 'post', 'page' ) ) ) {
			return;
		}

		add_meta_box(
			'buzzo-advanced-display',
			__( 'Advanced display settings', 'buzzo' ),
			array( $this, 'render' ),
			$post_type,
			'normal',
			'high',
			array()
		);
	}


	public function save( $post_id ) {
		// Check if our nonce is set.
		if ( ! isset( $_POST['buzzo_advanced_display_nonce'] ) ) {
			return $post_id;
		}

		$nonce = $_POST['buzzo_advanced_display_nonce'];

		// Verify that the nonce is valid.
		if ( ! wp_verify_nonce( $nonce, 'buzzo_advanced_display' ) ) {
			return $post_id;
		}

		/*
		 * If this is an autosave, our form has not been submitted,
		 * so we don't want to do anything.
		 */
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}

		// Check the user's permissions.
		if ( 'page' == $_POST['post_type'] ) {
			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return $post_id;
			}
		} else {
			if ( ! current_user_can( 'edit_post', $post_id ) ) {
				return $post_id;
			}
		}

		/* OK, it's safe for us to save the data now. */
		if ( isset( $_POST['buzzo_layout'] ) ) {
			$value = sanitize_text_field( wp_unslash( $_POST['buzzo_layout'] ) );
			update_post_meta( $post_id, '_buzzo_layout', $value );
		}

		if ( isset( $_POST['buzzo_show_footer_columns'] ) ) {
			$value = sanitize_text_field( wp_unslash( $_POST['buzzo_show_footer_columns'] ) );
			update_post_meta( $post_id, '_buzzo_show_footer_columns', $value );
		}

		if ( isset( $_POST['buzzo_sidebar_layout'] ) ) {
			$value = sanitize_text_field( wp_unslash( $_POST['buzzo_sidebar_layout'] ) );
			update_post_meta( $post_id, '_buzzo_sidebar_layout', $value );
		}

		if ( 'page' === get_post_type( $post_id ) ) {
			update_post_meta( $post_id, '_buzzo_hide_page_title', isset( $_POST['buzzo_hide_page_title'] ) );
			update_post_meta( $post_id, '_buzzo_bg_gray', isset( $_POST['buzzo_bg_gray'] ) );
		}
	}

	/**
	 * Render meta box.
	 *
	 * @param  WP_Post $post Post object.
	 */
	public function render( $post ) {
		global $wp_registered_sidebars;

		wp_nonce_field( 'buzzo_advanced_display', 'buzzo_advanced_display_nonce' );

		$layout = get_post_meta( $post->ID, '_buzzo_layout', true );
		$hide_page_title = get_post_meta( $post->ID, '_buzzo_hide_page_title', true );
		$bg_gray = get_post_meta( $post->ID, '_buzzo_bg_gray', true );
		$show_footer_columns = get_post_meta( $post->ID, '_buzzo_show_footer_columns', true );
		$sidebar_layout = get_post_meta( $post->ID, '_buzzo_sidebar_layout', true );
		?>

		<table class="table-row">
			<?php
			switch ( $post->post_type ) {
				case 'post':
					?>
					<tr>
						<th scope="row">
							<label for="buzzo-advanced-display-layout"><?php esc_html_e( 'Advanced layout', 'buzzo' ); ?></label>
						</th>
						<td>
							<select id="buzzo-advanced-display-layout" name="buzzo_layout">
								<option value=""><?php esc_html_e( 'Default', 'buzzo' ); ?></option>
								<option value="standard" <?php selected( $layout, 'standard' ); ?>><?php esc_html_e( 'Standard', 'buzzo' ); ?></option>
								<option value="standard_no_content" <?php selected( $layout, 'standard_no_content' ); ?>><?php esc_html_e( 'Standard without content', 'buzzo' ); ?></option>
								<option value="list" <?php selected( $layout, 'list' ); ?>><?php esc_html_e( 'List', 'buzzo' ); ?></option>
								<option value="standard_overlay" <?php selected( $layout, 'standard_overlay' ); ?>><?php esc_html_e( 'Standard overlay', 'buzzo' ); ?></option>
							</select>

							<p class="description"><?php esc_html_e( 'Enable advanced layout in Customize > Blog to use these settings.', 'buzzo' ); ?></p>
						</td>
					</tr>
					<?php
					break;

				case 'page':
					?>
					<tr>
						<th scope="row">
							<label for="buzzo-hide-page-title"><?php esc_html_e( 'Hide page title', 'buzzo' ); ?></label>
						</th>
						<td>
							<input type="checkbox" id="buzzo-hide-page-title" name="buzzo_hide_page_title" value="1" <?php checked( true, $hide_page_title ); ?>>
						</td>
					</tr>

					<tr>
						<th scope="row">
							<label for="buzzo-bg-gray"><?php esc_html_e( 'Contene gray background', 'buzzo' ); ?></label>
						</th>
						<td>
							<input type="checkbox" id="buzzo-bg-gray" name="buzzo_bg_gray" value="1" <?php checked( true, $bg_gray ); ?>>
						</td>
					</tr>
					<?php
					break;
			}
			?>

			<!-- Show footer columns -->
			<tr>
				<th scope="row">
					<label for="buzzo-advanced-display-footer-columns"><?php esc_html_e( 'Show footer columns', 'buzzo' ); ?></label>
				</th>
				<td>
					<select id="buzzo-advanced-display-footer-columns" name="buzzo_show_footer_columns">
						<option value=""><?php esc_html_e( 'Default', 'buzzo' ); ?></option>
						<option value="yes" <?php selected( $show_footer_columns, 'yes' ); ?>><?php esc_html_e( 'Yes', 'buzzo' ); ?></option>
						<option value="no" <?php selected( $show_footer_columns, 'no' ); ?>><?php esc_html_e( 'No', 'buzzo' ); ?></option>
					</select>
				</td>
			</tr>

			<!-- Sidebar layout -->
			<tr>
				<th scope="row">
					<label for="buzzo-advanced-display-sidebar-layout"><?php esc_html_e( 'Sidebar layout', 'buzzo' ); ?></label>
				</th>
				<td>
					<select id="buzzo-advanced-display-sidebar-layout" name="buzzo_sidebar_layout">
						<option value=""><?php esc_html_e( 'Default', 'buzzo' ); ?></option>
						<option value="sidebar_right" <?php selected( $sidebar_layout, 'sidebar_right' ); ?>><?php esc_html_e( 'Sidebar right', 'buzzo' ); ?></option>
						<option value="sidebar_left" <?php selected( $sidebar_layout, 'sidebar_left' ); ?>><?php esc_html_e( 'Sidebar left', 'buzzo' ); ?></option>
						<option value="no_sidebar" <?php selected( $sidebar_layout, 'no_sidebar' ); ?>><?php esc_html_e( 'No sidebar', 'buzzo' ); ?></option>
					</select>
				</td>
			</tr>
		</table>
		<?php
	}
}
new Buzzo_Advanced_Display_Meta_Box();
