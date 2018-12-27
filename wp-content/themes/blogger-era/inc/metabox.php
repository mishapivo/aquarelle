<?php
/**
 * Script to add Meta Boxes
 *
 * @package Blogger_Era

 */
/**
 * Adds a meta box to the post editing screen
 */
function blogger_era_register_meta() {
    add_meta_box( 'blogger_era_meta', esc_html__( 'Sidebar Layout', 'blogger-era' ), 'blogger_era_meta_callback', array( 'post', 'page' ) );
}
add_action( 'add_meta_boxes', 'blogger_era_register_meta' );

/**
 * Callback for layout option.
 * Shows radio button to choose layout
 *
 * @param array $post current post information.
 */
function blogger_era_meta_callback( $post ) {

    $blogger_era_meta = array(
        'sidebar-left' => array(
            'value'     => 'sidebar-left',
            'label'     => esc_html__( 'Left sidebar', 'blogger-era' ),
            'thumbnail' => get_template_directory_uri() . '/assets/img/sidebar-left.png'
        ), 
        'sidebar-right' => array(
            'value' => 'sidebar-right',
            'label' => esc_html__( 'Right sidebar (default)', 'blogger-era' ),
            'thumbnail' => get_template_directory_uri() . '/assets/img/sidebar-right.png'
        ),
        
        'no-sidebar' => array(
            'value'     => 'no-sidebar',
            'label'     => esc_html__( 'No sidebar', 'blogger-era' ),
            'thumbnail' => get_template_directory_uri() . '/assets/img/sidebar-no.png'
        )
    );	


	// Use nonce for form verification.
	wp_nonce_field( basename( __FILE__ ), 'blogger_era_meta_nonce' );

	$layout = get_post_meta( $post->ID, 'blogger_era_meta', true );

	// Set default value if metabox returns empty.
	if ( empty( $layout ) ) {
		$layout = 'sidebar-right';
	}
	?>
	<table class="form-table">
		<tr>
			<td>
			    <?php foreach($blogger_era_meta as $field){  ?>
			        
			        <div class="radio-image-wrapper" style="float:left; margin-right:30px;">
			            <label class="description">
			             <span><img src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="" /></span></br>
			             <input type="radio" name="blogger_era_meta" value="<?php echo esc_attr($field['value']); ?>" <?php checked( $field['value'], $layout ) ?>/>&nbsp;<?php echo esc_attr($field['label']); ?>
			            </label>
			        </div>
			    <?php } ?>
		    </td>
	    </tr>
    </table>
		
	<?php
}

/**
 * Saves metaboxes value to database
 *
 * @param int $post_id current post id.
 */
function blogger_era_save_metaboxes( $post_id ) {
	global $post;

    // Verify the nonce before proceeding.

    $blogger_era_meta_nonce = '';
    if ( isset( $_POST['blogger_era_meta_nonce'] ) && ! wp_verify_nonce( 'blogger_era_meta_nonce', basename( __FILE__ ) ) ) {
        $blogger_era_meta_nonce = sanitize_text_field( wp_unslash( $_POST['blogger_era_meta_nonce'] ) );
    }
    if ( ! $blogger_era_meta_nonce ) {
        return;
    }

    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  {
        return;
    }

    if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] )  {  
        if (!current_user_can( 'edit_page', $post_id ) )  
            return $post_id;  
    } elseif (!current_user_can( 'edit_post', $post_id ) ) {  
        return $post_id;  
    }  
    
    //Execute this saving function
    $old = get_post_meta( $post_id, 'blogger_era_meta', true); 
    $new = sanitize_text_field( wp_unslash( $_POST['blogger_era_meta'] ));
    if ($new && $new != $old) {  
        update_post_meta($post_id, 'blogger_era_meta', $new);  
    }

}

add_action( 'save_post', 'blogger_era_save_metaboxes' );