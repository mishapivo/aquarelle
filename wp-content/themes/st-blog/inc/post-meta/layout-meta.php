<?php
/**
 * st-blog Custom Metabox
 *
 * @package st-blog
 */
$st_blog_post_types = array(
    'post',
    'page'
);

add_action('add_meta_boxes', 'st_blog_add_layout_metabox');
function st_blog_add_layout_metabox() {
    global $post;
    $frontpage_id = get_option('page_on_front');
    if( $post->ID == $frontpage_id ){
        return;
    }

    global $st_blog_post_types;
    foreach ( $st_blog_post_types as $post_type ) {
        add_meta_box(
            'st_blog_layout_options', // $id
            esc_html__( 'Layout options', 'st-blog' ), // $title
            'st_blog_layout_options_callback', // $callback
            $post_type, // $page
            'normal', // $context
            'high'// $priority
        );
    }

}

/* st-blog sidebar layout */
$st_blog_default_layout_options = array(
    'left-sidebar' => array(
        'value'     => 'left-sidebar',
        'thumbnail' => get_template_directory_uri() . '/inc/images/left-sidebar.png'
    ),
    'right-sidebar' => array(
        'value' => 'right-sidebar',
        'thumbnail' => get_template_directory_uri() . '/inc/images/right-sidebar.png'
    ),
     'Both-sidebar' => array(
        'value'     => 'both-sidebar',//this should be both-sidebar ?
        'thumbnail' => get_stylesheet_directory_uri() . '/inc/images/both-sidebar.png'
    ),
    'no-sidebar' => array(
        'value'     => 'no-sidebar',
        'thumbnail' => get_template_directory_uri() . '/inc/images/no-sidebar.png'
    )
);

/* st-blog featured layout */
$st_blog_single_post_image_align_options = array(
    'full' => array(
        'value' => 'full',
        'label' => esc_html__( 'Full', 'st-blog' )
    ),
    'right' => array(
        'value' => 'right',
        'label' => esc_html__( 'Right ', 'st-blog' ),
    ),
    'left' => array(
        'value'     => 'left',
        'label' => esc_html__( 'Left', 'st-blog' ),
    ),
    'no-image' => array(
        'value'     => 'no-image',
        'label' => esc_html__( 'No Image', 'st-blog' )
    )
);

// 

function st_blog_layout_options_callback() {

    global $post , $st_blog_default_layout_options, $st_blog_single_post_image_align_options;
    $st_blog_customizer_saved_values = st_blog_get_all_options(1);

    /*st-blog-single-post-image-align*/
    $st_blog_single_post_image_align = $st_blog_customizer_saved_values['st-blog-single-post-image-align'];

    /*st-blog default layout*/
    $st_blog_single_sidebar_layout = $st_blog_customizer_saved_values['st-blog-default-layout'];

    wp_nonce_field( basename( __FILE__ ), 'st_blog_layout_options_nonce' );
    ?>
    <table class="form-table page-meta-box">
        <!--Image alignment-->
        <tr>
            <td colspan="4"><em class="f13"><?php esc_html_e( 'Choose Sidebar Template', 'st-blog' ); ?></em></td>
        </tr>
        <tr>
            <td>
                <?php
                $st_blog_single_sidebar_layout_meta = get_post_meta( $post->ID, 'st-blog-default-layout', true );
                if( false != $st_blog_single_sidebar_layout_meta ){
                   $st_blog_single_sidebar_layout = $st_blog_single_sidebar_layout_meta;

                }
                foreach ($st_blog_default_layout_options as $field) {
                    ?>
                    <div class="hide-radio radio-image-wrapper" style="float:left; margin-right:30px;">
                        <input id="<?php echo esc_attr( $field['value'] ); ?>" type="radio" name="st-blog-default-layout"
                               value="<?php echo esc_attr( $field['value'] ); ?>"
                            <?php checked( $field['value'], $st_blog_single_sidebar_layout ); ?>/>
                        <label class="description" for="<?php echo esc_attr( $field['value'] ); ?>">
                            <img src="<?php echo esc_url( $field['thumbnail'] ); ?>" />
                        </label>
                    </div>
                <?php } // end foreach
                ?>
                <div class="clear"></div>
            </td>
        </tr>
        <tr>
            <td><em class="f13"><?php esc_html_e( 'You can set up the sidebar content', 'st-blog' ); ?> <a href="<?php echo esc_url( admin_url('/widgets.php') ); ?>"><?php esc_html_e( 'here', 'st-blog' ); ?></a></em></td>
        </tr>
        <!--Image alignment-->
        <tr>
            <td colspan="4"><?php esc_html_e( 'Featured Image Alignment', 'st-blog' ); ?></td>
        </tr>
        <tr>
            <td>
                <?php
                $st_blog_single_post_image_align_meta = get_post_meta( $post->ID, 'st-blog-single-post-image-align', true );
                
                if( false != $st_blog_single_post_image_align_meta ){
                    $st_blog_single_post_image_align = $st_blog_single_post_image_align_meta;
                }
                foreach ($st_blog_single_post_image_align_options as $field) {
                    ?>
                    <input id="<?php echo esc_attr( $field['value'] ); ?>" type="radio" name="st-blog-single-post-image-align" value="<?php echo esc_attr( $field['value'] ); ?>" <?php checked( $field['value'], $st_blog_single_post_image_align ); ?>/>
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
function st_blog_save_sidebar_layout( $post_id ) {
    global $post;

    if ( isset( $_POST['st_blog_layout_options_nonce'] ) ) {
        $_POST[ 'st_blog_layout_options_nonce' ] = sanitize_text_field( wp_unslash( $_POST[ 'st_blog_layout_options_nonce' ] ) );
    }

    // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'st_blog_layout_options_nonce' ] ) || !wp_verify_nonce( sanitize_key($_POST[ 'st_blog_layout_options_nonce' ] ), basename( __FILE__ ) ) ) {
        return;
    }

    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( !current_user_can( 'edit_page', $post_id ) ) {
        return $post_id;
    }
    
    if(isset($_POST['st-blog-default-layout'])){
        $old = get_post_meta( $post_id, 'st-blog-default-layout', true );
        $new = sanitize_text_field( wp_unslash( $_POST['st-blog-default-layout'] ) );
        if ( $new && $new != $old ) {
            update_post_meta( $post_id, 'st-blog-default-layout', $new );
        } elseif ( '' == $new && $old ) {
            delete_post_meta( $post_id,'st-blog-default-layout', $old );
        }
    }

    /*image align*/
    if(isset($_POST['st-blog-single-post-image-align'])){
        $old = get_post_meta( $post_id, 'st-blog-single-post-image-align', true );
        $new = sanitize_text_field( wp_unslash( $_POST['st-blog-single-post-image-align'] ) );
        if ( $new && $new != $old ) {
            update_post_meta( $post_id, 'st-blog-single-post-image-align', $new );
        } elseif ( '' == $new && $old ) {
            delete_post_meta( $post_id, 'st-blog-single-post-image-align', $old );
        }
    }
}
add_action('save_post', 'st_blog_save_sidebar_layout');