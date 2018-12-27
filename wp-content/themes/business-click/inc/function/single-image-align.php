<?php 
/*image alignment single post*/
if( ! function_exists( 'business_click_single_post_image_align' ) ) :
    /**
     * business-click default layout function
     *
     * @since  business-click 1.0.0
     *
     * @param int
     * @return string
     */
    function business_click_single_post_image_align( $post_id = null ){
        global $business_click_customizer_all_values,$post;
        if( null == $post_id && isset ( $post->ID ) ){
            $post_id = $post->ID;
        }
        $business_click_single_post_image_align = $business_click_customizer_all_values['business-click-single-post-image-align'];
       
        $business_click_single_post_image_align_meta = get_post_meta( $post_id, 'business-click-single-post-image-align', true );

        if( false != $business_click_single_post_image_align_meta ) {
            $business_click_single_post_image_align = $business_click_single_post_image_align_meta;
        }
        return $business_click_single_post_image_align;
    }
endif;