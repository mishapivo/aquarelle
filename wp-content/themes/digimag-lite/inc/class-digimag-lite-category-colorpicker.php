<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Digimag Lite
 */

/**
 * Class Add colorpicker.
 */
class Digimag_Lite_Category_Colorpicker {

	/**
	 * Constructor.
	 */
	public function __construct() {

		add_action( 'category_add_form_fields', array( $this, 'add_colorpicker_to_add_new_page' ) );
		add_action( 'category_edit_form_fields', array( $this, 'add_colorpicker_to_edit_page' ) );
		add_action( 'created_category', array( $this, 'save_term_meta' ) );
		add_action( 'edited_category', array( $this, 'save_term_meta' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
		add_action( 'admin_print_scripts', array( $this, 'print_colorpicker' ), 20 );
	}

	/**
	 * Add Colorpicker to Add new category page.
	 *
	 * @param string $taxonomy name of the taxonomy.
	 */
	public function add_colorpicker_to_add_new_page( $taxonomy ) {
		?>

			<tr class="form-field">
				<th scope="row"><label for="category_color"><?php esc_html_e( 'Category Color', 'digimag-lite' ); ?></label></th>
				<td>
					<input name="category_color" class="colorpicker" id="category_color" value="" />
				</td>
				<p><?php esc_attr_e( 'Select the color for this category', 'digimag-lite' ); ?></p>
			</tr>

		<?php
	}

	/**
	 * Add Colorpicker to Edit category page.
	 *
	 * @param string $term term object.
	 */
	public function add_colorpicker_to_edit_page( $term ) {
		$color = get_term_meta( $term->term_id, 'category_color', true );
		$color = ( ! empty( $color ) ) ? "{$color}" : '';
		?>

			<tr class="form-field">
				<th scope="row"><label for="category_color"><?php esc_html_e( 'Category Color', 'digimag-lite' ); ?></label></th>
				<td>
					<input name="category_color" id="category_color" class="colorpicker" value="<?php echo esc_attr( $color ); ?>" />
				</td>
				<p><?php esc_attr_e( 'Select the color for this category', 'digimag-lite' ); ?></p>
			</tr>

		<?php
	}

	/**
	 * Save term meta
	 *
	 * @param int $term_id term object id.
	 */
	public function save_term_meta( $term_id ) {
		if ( ! empty( $_POST['category_color'] ) ) {
			update_term_meta( $term_id, 'category_color', sanitize_hex_color( wp_unslash( $_POST['category_color'] ) ) );
		} else {
			delete_term_meta( $term_id, 'category_color' );
		}
	}

	/**
	 * Enqueue Colorpicker only in category page.
	 */
	public function enqueue() {
		$screen = get_current_screen();
		if ( empty( $screen ) || 'edit-category' !== $screen->id ) {
			return;
		}
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_style( 'wp-color-picker' );
	}

	/**
	 * Print colorpicker.
	 */
	public function print_colorpicker() {

		$screen = get_current_screen();
		if ( empty( $screen ) || 'edit-category' !== $screen->id ) {
			return;
		}

		?>
		<script>
			jQuery( function( $ ) {
				$( '.colorpicker' ).wpColorPicker();
			} );
		</script>
		<?php
	}
}

new Digimag_Lite_Category_Colorpicker();
