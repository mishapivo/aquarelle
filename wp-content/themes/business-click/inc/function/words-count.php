<?php
/**
* Returns word count of the sentences.
*
* @since business-click 1.0.0
*/
if ( ! function_exists( 'business_click_words_count' ) ) :
	function business_click_words_count( $length = 25, $business_click_content = null ) {
		$length = absint( $length );
		$more = esc_html__( '&hellip;','business-click' );
		$source_content = preg_replace( '`\[[^\]]*\]`', '', $business_click_content );
		$trimmed_content = wp_trim_words( $source_content, $length, $more );
		return $trimmed_content;
	}
endif;