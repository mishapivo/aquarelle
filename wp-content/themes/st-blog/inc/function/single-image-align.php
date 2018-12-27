<?php 

/*image alignment single post*/

if( ! function_exists( 'st_blog_single_post_image_align' ) ) :
    /**
     * st-blog default layout function
     *
     * @since  st-blog 1.0.0
     *
     * @param int
     * @return string
     */
    function st_blog_single_post_image_align( $post_id = null ){
        global$st_blog_customizer_all_values,$post;
        if( null == $post_id && isset ( $post->ID ) ){
            $post_id = $post->ID;
        }
       $st_blog_single_post_image_align = $st_blog_customizer_all_values['st-blog-single-post-image-align'];
       $st_blog_single_post_image_align_meta = get_post_meta( $post_id, 'st-blog-single-post-image-align', true );

        if( false !=$st_blog_single_post_image_align_meta ) {
           $st_blog_single_post_image_align =$st_blog_single_post_image_align_meta;
        }
        return$st_blog_single_post_image_align;
    }
endif;