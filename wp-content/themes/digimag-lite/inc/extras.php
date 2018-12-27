<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Digimag Lite
 */

/**
 * Digimag Pagination
 */
function digimag_lite_pagination() {
	$style       = get_theme_mod( 'pagination_style', 'load_more_button' );
	$button_text = get_theme_mod( 'load_more_articles_text', esc_html__( 'Load More Articles', 'digimag-lite' ) );
	if ( 'default' === $style ) {
		the_posts_pagination();
		return;
	}
	global $wp_query;
	if ( $wp_query->max_num_pages <= 1 ) {
		return;
	}
	?>
	<div id="infinite-handle" class="digimag-load-more">
		<?php
		$data_archive_type  = '';
		$data_archive_value = '';
		if ( is_category() ) {
			$category           = get_category( get_query_var( 'cat' ) );
			$cat_id             = isset( $category->cat_ID ) ? $category->cat_ID : '';
			$data_archive_type  = 'cat';
			$data_archive_value = $cat_id;
		} elseif ( is_tag() ) {
			$tag                = get_queried_object();
			$tag_id             = isset( $tag->term_id ) ? $tag->term_id : '';
			$data_archive_type  = 'tag';
			$data_archive_value = $tag_id;
		} elseif ( is_day() ) {
			$data_archive_type  = 'day';
			$data_archive_value = get_the_date( 'm|d|Y' );
		} elseif ( is_month() ) {
			$data_archive_type  = 'month';
			$data_archive_value = get_the_date( 'm|d|Y' );
		} elseif ( is_year() ) {
			$data_archive_type  = 'year';
			$data_archive_value = get_the_date( 'm|d|Y' );
		}
		$current_page   = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
		$posts_per_page = get_option( 'posts_per_page' );

		printf('<button class="digimag-ajax-more-button" data-page="%s" data-number="%s" data-archive-type="%s" data-archive-value="%s">
					<i class="icofont icofont-refresh"></i><span class="ajax-more-text">%s</span>
				</button>',
			esc_attr( $current_page ),
			esc_attr( intval( $posts_per_page ) ),
			esc_attr( $data_archive_type ),
			esc_attr( $data_archive_value ),
			esc_html( $button_text )
		);
		?>
	</div>
	<?php
}

/**
 * Load More Post
 */
function digimag_lite_load_more_post() {
	$page               = ( ! empty( $_POST['page'] ) ) ? absint( $_POST['page'] ) + 1 : 1;
	$posts_per_page     = ( ! empty( $_POST['postNumber'] ) ) ? absint( $_POST['postNumber'] ) : '';
	$data_archive_type  = ( ! empty( $_POST['data_archive_type'] ) ) ? strval( $_POST['data_archive_type'] ) : '';
	$data_archive_value = ( ! empty( $_POST['data_archive_value'] ) ) ? $_POST['data_archive_value'] : '';
	$nonce              = ( ! empty( $_POST['nonce'] ) ) ? $_POST['nonce'] : '';

	if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) ) {
		die( 'Security Check' );
	}

	$args = array(
		'paged'          => $page,
		'posts_per_page' => $posts_per_page,
	);

	if ( 'cat' === $data_archive_type ) {
		$args['cat'] = $data_archive_value;
	} elseif ( 'tag' === $data_archive_type ) {
		$args['tag_id'] = $data_archive_value;
	} elseif ( 'day' === $data_archive_type ) {
		$date_arr           = explode( '|', $data_archive_value );
		$args['date_query'] = array(
			array(
				'year'  => isset( $date_arr[2] ) ? $date_arr[2] : '',
				'month' => isset( $date_arr[0] ) ? $date_arr[0] : '',
				'day'   => isset( $date_arr[1] ) ? $date_arr[1] : '',
			),
		);
	} elseif ( 'month' === $data_archive_type ) {
		$date_arr           = explode( '|', $data_archive_value );
		$args['date_query'] = array(
			array(
				'year'  => isset( $date_arr[2] ) ? $date_arr[2] : '',
				'month' => isset( $date_arr[0] ) ? $date_arr[0] : '',
			),
		);
	} elseif ( 'year' === $data_archive_type ) {
		$date_arr           = explode( '|', $data_archive_value );
		$args['date_query'] = array(
			array(
				'year' => isset( $date_arr[2] ) ? $date_arr[2] : '',
			),
		);
	}

	$query = new WP_Query( $args );

	ob_start();

	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {

			$query->the_post();

			get_template_part( 'template-parts/content', get_post_format() );

		}
		wp_reset_postdata();
	} else {
		die();
	}

	$result = ob_get_clean();
	echo wp_kses_post( $result );
	die();
}
add_action( 'wp_ajax_digimag_lite_load_more', 'digimag_lite_load_more_post' );
add_action( 'wp_ajax_nopriv_digimag_lite_load_more', 'digimag_lite_load_more_post' );

/**
 * Wrap Post count in categories list in a span
 *
 * @param string $html categories list html.
 * @param string $args categories.
 */
function digimag_lite_wrap_post_count( $html, $args ) {
	if ( ! empty( $args['show_count'] ) ) {
		$html = str_replace( '<a', '<a class="show-count"', $html );
	}
	$html = preg_replace( '/<\/a> \(([0-9]+)\)/', '<span class="count">\\1</span></a>', $html );
	return $html;
}
add_filter( 'wp_list_categories', 'digimag_lite_wrap_post_count', 10, 2 );


/**
 * Change the tag could args
 *
 * @param array $args Widget parameters.
 *
 * @return mixed
 */
function digimag_lite_tag_cloud_args( $args ) {
	$args['largest']  = 0.75; // Largest tag.
	$args['smallest'] = 0.75; // Smallest tag.
	$args['unit']     = 'rem'; // Tag font unit.

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'digimag_lite_tag_cloud_args' );
