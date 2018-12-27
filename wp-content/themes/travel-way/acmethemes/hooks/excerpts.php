<?php
if ( ! function_exists( 'travel_way_excerpt_length' ) ) :
	/**
	 * Excerpt length
	 * @since Travel Way 1.0.0
	 *
	 * @param int $length number of words
	 * @return int
	 */
	function travel_way_excerpt_length( $length ) {
		if( is_admin() ){
			return $length;
		}

		global $travel_way_customizer_all_values;
		$excerpt_length = absint( $travel_way_customizer_all_values['travel-way-blog-archive-excerpt-length'] );
		if ( empty( $excerpt_length ) ) {
			$excerpt_length = $length;
		}
		return apply_filters( 'travel_way_filter_excerpt_length', absint( $excerpt_length ) );
	}
endif;

if ( ! function_exists( 'travel_way_content_more_link' ) ) :
	/**
	 * Read more text on content
	 *
	 * @since Travel Way 1.0.0
	 *
	 * @param string $more_link link
	 * @param string $more_original_text text
	 * @return string
	 */
	function travel_way_content_more_link( $more_link, $more_original_text ) {

		global $travel_way_customizer_all_values;
		$more_text = esc_html( $travel_way_customizer_all_values['travel-way-blog-archive-more-text'] );
		if ( ! empty( $more_text ) ) {
			$more_link = str_replace( $more_original_text, esc_html( $more_text ), $more_link );
			$more_link = str_replace( 'more-link', 'more-link btn btn-primary', $more_link );
		}
		return $more_link;

	}
endif;

if ( ! function_exists( 'travel_way_excerpt_read_more' ) ) :
	/**
	 * Read more text on excerpt
	 *
	 * @since Travel Way 1.0.0
	 *
	 * @param string $more text
	 * @return string text
	 */
	function travel_way_excerpt_read_more( $more ) {

		$output = $more;
		global $travel_way_customizer_all_values;
		$more_text = esc_html( $travel_way_customizer_all_values['travel-way-blog-archive-more-text'] );
		if ( ! empty( $more_text ) ) {
			$output = ' <br /><a href="'. esc_url( get_permalink() ) . '" class="more-link btn btn-primary">' . esc_html( $more_text ) . '</a>';
			$output = apply_filters( 'travel_way_filter_read_more_link' , $output );
		}
		return $output;
	}
endif;

if ( ! function_exists( 'travel_way_hook_read_more_filters' ) ) :

	/**
	 * Hook excerpt and content filters
	 *
	 * @since Travel Way 1.0.0
	 */
	function travel_way_hook_read_more_filters() {
		if ( is_home() || is_category() || is_tag() || is_author() || is_date() ) {

			add_filter( 'excerpt_length', 'travel_way_excerpt_length', 999 );
			add_filter( 'the_content_more_link', 'travel_way_content_more_link', 10, 2 );
			add_filter( 'excerpt_more', 'travel_way_excerpt_read_more' );

		}
	}
endif;
add_action( 'wp', 'travel_way_hook_read_more_filters' );