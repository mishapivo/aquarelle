<?php
if ( !function_exists('business_click_excerpt_length') ) :
     /**
     * Excerpt length
     *
     * @since business-click 1.0.0
     *
     * @param null
     * @return int
     */
     function business_click_excerpt_length( $length ) {
        global $business_click_customizer_all_values;
        if(is_admin() ){
            return $length;
        }
        $excerpt_length = $business_click_customizer_all_values['business-click-number-of-words'];        
        if ( !$excerpt_length ) {
            $excerpt_length = $length;
        }
        return absint( $excerpt_length );
     }
endif;
add_filter( 'excerpt_length', 'business_click_excerpt_length' );


if ( ! function_exists( 'business_click_implement_read_more' ) ) :

    /**
     * Implement read more in excerpt.
     *
     * @since 1.0.0
     *
     * @param string $more The string shown within the more link.
     * @return string The excerpt.
     */
    function business_click_implement_read_more( $more ) {

        $flag_apply_excerpt_read_more = apply_filters( 'business_click_filter_excerpt_read_more', true );
        if ( true !== $flag_apply_excerpt_read_more ) {
            return $more;
        }

        $output = $more;
        $read_more_text = esc_html__('continue reading','business-click');
        if ( ! empty( $read_more_text ) ) {
            $output = ' <div class="read-more-text"><a href="' . esc_url( get_permalink() ) . '" class="read-more">' . $read_more_text . '</a></div>';
            $output = apply_filters( 'business_click_filter_read_more_link' , $output );
        }
        return $output;

    }

endif;

add_action( 'excerpt_more', 'business_click_implement_read_more' );