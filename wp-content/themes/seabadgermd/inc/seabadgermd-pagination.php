<?php
//Custom pagination
function seabadgermd_pagination() {
	if ( is_singular() ) {
		return;
	}
	global $wp_query;
	/** Stop execution if there's only 1 page */
	if ( $wp_query->max_num_pages <= 1 ) {
		return;
	}
	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );
	/** Add current page to the array */
	if ( $paged >= 1 ) {
		$links[] = $paged;
	}
	/** Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}
	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}
	echo '<nav id="page-nav" class="text-center">' . "\n";
	echo '<ul class="pagination">' . "\n";
	/** Previous Post Link */
	if ( get_previous_posts_link() ) {
		printf( ' <li>%s</li>
			' . "\n", get_previous_posts_link('
			<span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
			<span class="sr-only">' . esc_html__( 'Previous', 'seabadgermd' ) . '</span>
			')
		);
	}
	/** Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links, true ) ) {
		$class = 1 === $paged ? ' active' : '';
		printf( '<li class="page-item%s"><a href="%s" class="page-link">%s</a></li>' . "\n",
		$class, esc_url( get_pagenum_link( 1 ) ), '1' );
		if ( ! in_array( 2, $links, true ) ) {
			echo '<li class="page-item">&hellip;</i></li>';
		}
	}
	/** Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged === $link ? ' active' : '';
		printf( '<li class="page-item%s"><a href="%s" class="page-link">%s</a></li>' . "\n",
		$class, esc_url( get_pagenum_link( $link ) ), $link );
	}
	/** Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links, true ) ) {
		if ( ! in_array( $max - 1, $links, true ) ) {
			echo '<li>&hellip;</li>' . "\n";
		}
		$class = $paged === $max ? ' active' : '';
		printf( '<li class="page-item%s"><a href="%s" class="page-link">%s</a></li>' . "\n",
		$class, esc_url( get_pagenum_link( $max ) ), $max );
	}
	/** Next Post Link */
	if ( get_next_posts_link() ) {
		printf( '<li class="page-item">%s</li>
				' . "\n", get_next_posts_link( '<span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
				<span class="sr-only">' . esc_html__( 'Next', 'seabadgermd' ) . '</span>' )
		);
	}
	echo '</ul>' . "\n";
	echo '</nav>' . "\n";
	echo '<!--/Pagination-->' . "\n";
}
