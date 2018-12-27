<?php
/**
 * Custom Metabox
 * Only added icon not special data
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return void
 *
 */
if( !function_exists( 'travel_way_meta_add_featured_icon' )):
    function travel_way_meta_add_featured_icon() {
        add_meta_box(
            'travel_way_meta_fields', // $id
            esc_html__( 'Featured Icon', 'travel-way' ), // $title
            'travel_way_meta_featured_icon_callback', // $callback
            'page', // $page
            'side', // $context
            'core'// $priority
        );
    }
endif;
add_action('add_meta_boxes', 'travel_way_meta_add_featured_icon');

/**
 * Callback function for metabox
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('travel_way_meta_featured_icon_callback') ) :
    function travel_way_meta_featured_icon_callback(){
        global $post;
        $travel_way_featured_icon = get_post_meta( $post->ID, 'travel-way-featured-icon', true );
        wp_nonce_field( basename( __FILE__ ), 'travel_way_meta_fields_nonce' );
       ?>
        <div class="at-icons-wrapper">
            <div class="icon-preview">
                <?php if( !empty( $travel_way_featured_icon ) ) { echo '<i class="fa '. esc_attr( $travel_way_featured_icon ) .'"></i>'; } ?>
            </div>
            <div class="icon-toggle">
                <?php echo ( empty( $travel_way_featured_icon )? esc_html__('Add Icon','travel-way'): esc_html__('Edit Icon','travel-way') ); ?>
                <span class="dashicons dashicons-arrow-down"></span>
            </div>
            <div class="icons-list-wrapper hidden">
                <input class="icon-search widefat" type="text" placeholder="<?php esc_attr_e('Search Icon','travel-way')?>">
                <?php
                $fa_icon_list_array = travel_way_icons_array();
                foreach ( $fa_icon_list_array as $single_icon ) {
                    if( $travel_way_featured_icon == $single_icon ) {
                        echo '<span class="single-icon selected"><i class="fa '. esc_attr( $single_icon ) .'"></i></span>';
                    } else {
                        echo '<span class="single-icon"><i class="fa '. esc_attr( $single_icon ) .'"></i></span>';
                    }
                }
                ?>
            </div>
            <input class="widefat at-icon-value" id="travel-way-featured-icon" type="hidden" name="travel-way-featured-icon" value="<?php echo esc_attr( $travel_way_featured_icon ); ?>" placeholder="fa-desktop"/>
        </div>
        <?php
}
endif;

/**
 * Save the custom metabox data
 * @hooked to save_post hook
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('travel_way_meta_save_featured_icon') ) :
    function travel_way_meta_save_featured_icon( $post_id ) {

        /*
         * A Guide to Writing Secure Themes – Part 4: Securing Post Meta
         *https://make.wordpress.org/themes/2015/06/09/a-guide-to-writing-secure-themes-part-4-securing-post-meta/
         * */
        if (
            !isset( $_POST[ 'travel_way_meta_fields_nonce' ] ) ||
            !wp_verify_nonce( $_POST[ 'travel_way_meta_fields_nonce' ], basename( __FILE__ ) ) || /*Protecting against unwanted requests*/
            ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || /*Dealing with autosaves*/
            ! current_user_can( 'edit_post', $post_id )/*Verifying access rights*/
        ){
            return;
        }
        //Execute this saving function
        if(isset($_POST['travel-way-featured-icon'])){
            $new = sanitize_text_field( $_POST['travel-way-featured-icon'] );
            update_post_meta( $post_id, 'travel-way-featured-icon', $new );
        }
    }
endif;
add_action('save_post', 'travel_way_meta_save_featured_icon' );