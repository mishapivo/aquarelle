<?php
/**
 * Add categoy meta field
 *
 * @package Buzzo
 */

function buzzo_cat_color_scripts() {
	$screen_id = get_current_screen()->id;
	if ( 'edit-category' != $screen_id ) {
		return;
	}

	// first check that $hook_suffix is appropriate for your admin page
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'buzzo-cat-color', get_template_directory_uri() . '/js/cat-color.js', array( 'wp-color-picker' ), '1.0.0', true );
}
add_action( 'admin_enqueue_scripts', 'buzzo_cat_color_scripts' );


function buzzo_add_cat_meta_field() {
	?>
	<div>
		<label for="buzzo-color"><?php esc_html_e( 'Color', 'buzzo' ); ?></label>
		<input type="text" name="buzzo_color" id="buzzo-color" value="" class="color-picker">
		<p><?php esc_html_e( 'Background color of category in post loop', 'buzzo' ); ?></p>
	</div>
	<?php
}
add_action( 'category_add_form_fields', 'buzzo_add_cat_meta_field' );


function buzzo_edit_cat_meta_field( $term ) {
	?>
	<tr>
		<th scope="row" valign="top">
			<label for="buzzo-color"><?php esc_html_e( 'Color', 'buzzo' ); ?></label>
		</th>

		<td>
			<input type="text" name="buzzo_color" id="buzzo-color" value="<?php echo esc_attr( get_term_meta( $term->term_id, 'buzzo_color', true ) ); ?>" class="color-picker">
			<p><?php esc_html_e( 'Background color of category in post loop', 'buzzo' ); ?></p>
		</td>
	</tr>
	<?php
}
add_action( 'category_edit_form_fields', 'buzzo_edit_cat_meta_field' );

function buzzo_save_cat_meta( $cat_id ) {
	if ( isset( $_POST['buzzo_color'] ) ) {
		$value = sanitize_text_field( wp_unslash( $_POST['buzzo_color'] ) );
		update_term_meta( $cat_id, 'buzzo_color', $value );
	}
}
add_action( 'create_category', 'buzzo_save_cat_meta' );
add_action( 'edited_category', 'buzzo_save_cat_meta' );


function buzzo_get_cat_color( $cat_id ) {
	return get_term_meta( $cat_id, 'buzzo_color', true );
}
