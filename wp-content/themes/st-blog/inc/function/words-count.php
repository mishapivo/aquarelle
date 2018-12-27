<?php
/**
* Returns word count of the sentences.
*
* @since st-blog 1.0.0
*/
if ( ! function_exists( 'st_blog_words_count' ) ) :
	function st_blog_words_count( $length = 25,$st_blog_content = null ) {
		$length = absint( $length );
		$source_content = preg_replace( '`\[[^\]]*\]`', '',$st_blog_content );
		$trimmed_content = wp_trim_words( $source_content, $length, '...' );
		return $trimmed_content;
	}
endif;