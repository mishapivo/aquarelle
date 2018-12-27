<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Blogger_Era
 */

if ( ! function_exists( 'blogger_era_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function blogger_era_posted_on() {
		$enable_date = blogger_era_get_option('enable_date');
		$enable_single_date = blogger_era_get_option('enable_single_date');

		if ( false == $enable_date ) {
			return;
		}

		if ( is_singular() ):
			if ( false == $enable_single_date ){
				return;
			}
		endif;

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( ' %s', 'post date', 'blogger-era' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);
		
		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'blogger_era_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function blogger_era_posted_by() {

		$enable_author = blogger_era_get_option('enable_author');
		$enable_single_author = blogger_era_get_option('enable_single_author');

		if ( false == $enable_author ){
			return;
		}

		if ( is_singular() ):
			if ( false == $enable_single_author ){
				return;
			}
		endif;

		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'By %s', 'post author', 'blogger-era' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'blogger_era_categories' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function blogger_era_categories() {

		$enable_category = blogger_era_get_option('enable_category');
		$enable_single_category = blogger_era_get_option('enable_single_category');

		if ( false == $enable_category ){
			return;
		}

		if ( is_singular() ):
			if ( false == $enable_single_category ){
				return;
			}
		endif;	

		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ' ', 'blogger-era' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<div class="entry-meta"><span class="cat-links">' . esc_html__( ' %1$s', 'blogger-era' ) . '</span></div>', $categories_list ); // WPCS: XSS OK.
			}
		}

	}
endif;



if ( ! function_exists( 'blogger_era_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function blogger_era_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'blogger-era' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'blogger-era' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'blogger-era' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'blogger-era' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'blogger-era' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'blogger-era' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'blogger_era_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function blogger_era_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		global $post;
		$sidebar_layout = 'sidebar-right';
		if ( is_page() || is_single() ){
			$sidebar_layout = get_post_meta( $post->ID, 'blogger_era_meta', true );	
		} else{
			$sidebar_layout = blogger_era_get_option( 'sidebar_layout' );
		}	
			
		$blog_layout = blogger_era_get_option( 'blog_layout' );
 		$image_size = 'full';
 		if ( is_page() || is_single() ){
 			$image_size = 'full';
 		} elseif ( 'full-width' !== $blog_layout && 'no-sidebar' !== $sidebar_layout){
 			$image_size = 'blogger-era-blog';
 		} ?>
			<figure class="post-thumbnail">
				<?php the_post_thumbnail( esc_attr( $image_size ) ); 
				blogger_era_post_format();?>
			</figure><!-- .post-thumbnail -->
		<?php
	}
endif;

if ( ! function_exists( 'blogger_era_post_format' ) ) :
	/**
	 * Displays an optional post format icon.
	 *
	 */
	function blogger_era_post_format() {
		$enable_posticon = blogger_era_get_option('enable_posticon');
		$enable_single_posticon = blogger_era_get_option('enable_single_posticon');

		if ( false == $enable_posticon ){
			return;
		}

		if ( is_singular() ):
			if ( false == $enable_single_posticon ){
				return;
			}
		endif;	

		$format = get_post_format(); 
		if ( !empty( $format ) ): ?>
			<div class="post-formate-wrap <?php echo esc_attr( $format);?>">

				<span class="post-format">
					<a href="<?php the_permalink();?>"></a>
				</span>
			</div>
		<?php endif; 
	}
endif;
