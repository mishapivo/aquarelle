<?php
if( ! function_exists( 'st_blog_excerpt_length' ) ) :

    /**
     * Excerpt length
     *
     * @since  st-blog 1.0.0
     *
     * @param null
     * @return int
     */
    function st_blog_excerpt_length( $length ){
        global $st_blog_customizer_all_values;
        if( is_admin() ) {
            return $length;
        }
        $excerpt_length = $st_blog_customizer_all_values['st-blog-excerpt-length'];
        if ( empty( $excerpt_length) ) {
            $excerpt_length = $length;
        }
        return absint( $excerpt_length );

    }

endif;
add_filter( 'excerpt_length', 'st_blog_excerpt_length', 999 );


if ( ! function_exists( 'st_blog_implement_read_more' ) ) :

    /**
     * Implement read more in excerpt.
     *
     * @since 1.0.0
     *
     * @param string $more The string shown within the more link.
     * @return string The excerpt.
     */
    function st_blog_implement_read_more( $more ) {
        global $st_blog_customizer_all_values;
        $flag_apply_excerpt_read_more = apply_filters( 'st_blog_filter_excerpt_read_more', true );
        if ( true !== $flag_apply_excerpt_read_more ) {
            return $more;
        }

        $read_more_text = $st_blog_customizer_all_values['st-blog-latest-post-button-text'];
        
            if ( !empty( $read_more_text ) ) {
                $output = ' <div class="read-more-text"><a href="' . esc_url( get_permalink() ) . '" class="readmore">' . esc_html( $read_more_text ) . '</a></div>';
                $output = apply_filters( 'st_blog_filter_read_more_link' , $output );
            }
            else
            {
                $output = ' <div class="read-more-text"><a href="' . esc_url( get_permalink() ) . '" class="readmore">' . 'read more' . '</a></div>';
            }
            return $output;
        

    }

endif;

add_action( 'excerpt_more', 'st_blog_implement_read_more' );