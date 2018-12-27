<?php

/**
 * business-click Custom Metabox
 *
 * @package business-click
 */
$business_click_post_types = array(
    'post',
    'page'
);

add_action( 'add_meta_boxes', 'business_click_add_layout_metabox' );

function business_click_add_layout_metabox() {
    global $post;
    $frontpage_id = get_option( 'page_on_front' );
    if ( $post->ID == $frontpage_id ) {
        // return;
    }

    global $business_click_post_types;
    foreach ( $business_click_post_types as $post_type ) {
        add_meta_box(
            'business_click_layout_options', // $id
            esc_html__( 'Layout options', 'business-click' ), // $title
            'business_click_layout_options_callback', // $callback
            $post_type, // $page
            'normal', // $context
            'high'// $priority
        );
    }

}
/* business-click sidebar layout */
$business_click_default_layout_options = array(
    'left-sidebar' => array(
        'value'     => 'left-sidebar',
        'label' => esc_html__( 'Left Sidebar', 'business-click' ),
    ),
    'right-sidebar' => array(
        'value' => 'right-sidebar',
        'label' => esc_html__( 'Right Sidebar', 'business-click' ),
    ),
    'no-sidebar' => array(
        'value'     => 'no-sidebar',
        'label' => esc_html__( 'No Sidebar', 'business-click' ),
    ),
    'default' => array(
        'value' => 'default',
        'label' => esc_html__( 'Default', 'business-click' ),
    ),
);
/* business-click featured layout */
$business_click_single_post_image_align_options = array(
    'full' => array(
        'value' => 'full',
        'label' => esc_html__( 'Full', 'business-click' )
    ),
    'right' => array(
        'value' => 'right',
        'label' => esc_html__( 'Right ', 'business-click' ),
    ),
    'left' => array(
        'value'     => 'left',
        'label' => esc_html__( 'Left', 'business-click' ),
    ),
    'no-image' => array(
        'value'     => 'no-image',
        'label' => esc_html__( 'No Image', 'business-click' )
    )
);

function business_click_layout_options_callback() {

    global $post , $business_click_default_layout_options, $business_click_single_post_image_align_options;
    $business_click_customizer_saved_values = business_click_get_all_options( absint(1) );

    /*business-click-single-post-image-align*/
    $business_click_single_post_image_align = $business_click_customizer_saved_values['business-click-single-post-image-align'];

    /*business-click default layout*/
    $business_click_single_sidebar_layout = 'default';

    wp_nonce_field( basename( __FILE__ ), 'business_click_layout_options_nonce' );
    ?>
    <table class="form-table page-meta-box">
        <!--Image alignment-->
        <tr>
            <td colspan="4"><em class="f13"><?php esc_html_e( 'Choose Sidebar Template', 'business-click' ); ?></em></td>
        </tr>
        <tr>
            <td>
                <?php
                $business_click_single_sidebar_layout_meta = get_post_meta( $post->ID, 'business-click-default-layout', true );
                if ( false != $business_click_single_sidebar_layout_meta ) {
                   $business_click_single_sidebar_layout = $business_click_single_sidebar_layout_meta;
                }
                foreach ( $business_click_default_layout_options as $field ) {
                    ?>
                    <div class="hide-radio radio-image-wrapper" style="float:left; margin-right:30px;">
                        <input id="<?php echo esc_attr( $field['value'] );  ?>" type="radio" name="business-click-default-layout" value="<?php echo esc_attr( $field['value'] ); ?>" <?php checked( $field['value'], $business_click_single_sidebar_layout ); ?> /> 
                        <label class="description" for="<?php echo esc_attr( $field['value'] ); ?>">
                            <?php echo esc_html( $field['label'] ); ?>
                        </label>
                    </div>
                <?php } // end foreach
                ?>
                <div class="clear"></div>
            </td>
        </tr>
        <tr>
            <td><em class="f13"><?php esc_html_e( 'You can set up the sidebar content', 'business-click' ); ?> <a href="<?php echo esc_url( admin_url('/widgets.php') ); ?>"><?php esc_html_e( 'here', 'business-click' ); ?></a></em></td>
        </tr>
        <!--Image alignment-->
        <tr>
            <td colspan="4"><?php esc_html_e( 'Featured Image Alignment', 'business-click' ); ?></td>
        </tr>
        <tr>
            <td>
                <?php
                $business_click_single_post_image_align_meta = get_post_meta( $post->ID, 'business-click-single-post-image-align', true );
                if( false != $business_click_single_post_image_align_meta ){
                    $business_click_single_post_image_align = $business_click_single_post_image_align_meta;
                }
                foreach ($business_click_single_post_image_align_options as $field) {
                    ?>
                    <input id="<?php echo esc_attr( $field['value'] ); ?>" type="radio" name="business-click-single-post-image-align" value="<?php echo esc_attr( $field['value'] ); ?>" <?php checked( $field['value'], $business_click_single_post_image_align ); ?>/> 
                    <label class="description" for="<?php echo esc_attr( $field['value'] ); ?>">
                        <?php echo esc_html( $field['label'] ); ?>
                    </label>
                <?php } // end foreach
                ?>
                <div class="clear"></div>
            </td>
        </tr>
    </table>

<?php }

/**
 * save the custom metabox data
 * @hooked to save_post hook
 */
function business_click_save_sidebar_layout( $post_id ) {
    global $post;

    if ( isset( $_POST['business_click_layout_options_nonce'] ) ) {
        $_POST[ 'business_click_layout_options_nonce' ] = sanitize_text_field( wp_unslash( $_POST[ 'business_click_layout_options_nonce' ] ) );
    }

    // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'business_click_layout_options_nonce' ] ) || !wp_verify_nonce( sanitize_key($_POST[ 'business_click_layout_options_nonce' ] ), basename( __FILE__ ) ) ) {
        return;
    }

    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( !current_user_can( 'edit_page', $post_id ) ) {
        return $post_id;
    }
    
    if(isset($_POST['business-click-default-layout'])){
        $old = get_post_meta( $post_id, 'business-click-default-layout', true );
        $new = sanitize_text_field( wp_unslash( $_POST['business-click-default-layout'] ) );
        if ( $new && $new != $old ) {
            update_post_meta( $post_id, 'business-click-default-layout', $new );
        } elseif ( '' == $new && $old ) {
            delete_post_meta( $post_id,'business-click-default-layout', $old );
        }
    }

    /*image align*/
    if(isset($_POST['business-click-single-post-image-align'])){
        $old = get_post_meta( $post_id, 'business-click-single-post-image-align', true );
        $new = sanitize_text_field( wp_unslash( $_POST['business-click-single-post-image-align'] ) );
        if ( $new && $new != $old ) {
            update_post_meta( $post_id, 'business-click-single-post-image-align', $new );
        } elseif ( '' == $new && $old ) {
            delete_post_meta( $post_id, 'business-click-single-post-image-align', $old );
        }
    }
}
add_action('save_post', 'business_click_save_sidebar_layout');
