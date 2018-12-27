<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Digimag Lite
 */

/**
 * Prints HTML with meta information for the current post-date/time.
 */
function digimag_lite_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf(
		$time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	echo '<span class="posted-on">' . $time_string . '</span>'; // WPCS: XSS OK.
}


if ( ! function_exists( 'digimag_lite_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 *
	 * @param bool $text whether to print string Posted by.
	 */
	function digimag_lite_posted_by( $text = 'default' ) {
		if ( 'default' === $text ) {
			$text = esc_html__( 'Posted by: ', 'digimag-lite' );
		} elseif ( false === $text ) {
			$text = '';
		}
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( '%1$s%2$s', 'post author', 'digimag-lite' ),
			esc_html( $text ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

/**
 * Prints HTML with meta information for the comment number.
 */
function digimag_lite_print_comment_link() {
	$comment_number = get_comments_number();
	if ( in_the_loop() && ! is_single() && ! $comment_number ) {
		return;
	}
	if ( ! post_password_required() && ( comments_open() || $comment_number ) ) {
		$comment_number_output = '<i class="icofont icofont-speech-comments"></i>' . $comment_number;
		echo '<span class="comments-link">';
		comments_popup_link( $comment_number_output, $comment_number_output, $comment_number_output );
		echo '</span>';
	}
}

/**
 * Get single category
 *
 * @param boolean $has_background background or not.
 */
function digimag_lite_print_single_category( $has_background = false ) {
	$categories = get_the_category();
	$link       = get_category_link( $categories[0]->term_id );
	$name       = $categories[0]->name;
	$color      = get_term_meta( $categories[0]->term_id, 'category_color', true );

	$html       = '';
	$background = '';
	if ( ! empty( $color ) && ! $has_background ) {
		$html = '<span class="cat-color" style="background-color:' . $color . '"></span>';
	} elseif ( ! empty( $color ) && $has_background ) {
		$background = 'style="background-color:' . esc_attr( $color ) . '"';
	}
	printf(
		'<span class="cat-links" %s>
			%s
			<a href="%s">%s</a>
		</span>',
		wp_kses_post( $background ),
		wp_kses_post( $html ),
		esc_url( $link ),
		esc_html( $name )
	);
}

/**
 * Prints HTML with meta information for the categories.
 */
function digimag_lite_print_categories_list() {
	$categories_list = get_the_category_list( esc_html__( ', ', 'digimag-lite' ) );
	if ( $categories_list ) {
		printf( '<span class="cat-links">%s</span>', wp_kses_post( $categories_list ) );
	}
}

if ( ! function_exists( 'digimag_lite_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the tags and comments.
	 */
	function digimag_lite_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list();
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tags: %1$s', 'digimag-lite' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		digimag_lite_edit_link();
	}
endif;

/**
 * Edit Link.
 */
function digimag_lite_edit_link() {
	edit_post_link(
		sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Edit <span class="screen-reader-text">%s</span>', 'digimag-lite' ),
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

/**
 * Footer Widgets Area
 */
function digimag_lite_footer_widget_area() {
	if ( ! is_active_sidebar( 'footer1' ) && ! is_active_sidebar( 'footer2' ) && ! is_active_sidebar( 'footer3' ) ) {
		return;
	}

	?>

		<div class="footer container">
			<div class="footer-1">
				<div class="grid grid--1"><?php dynamic_sidebar( 'footer1' ); ?></div>
			</div>
			<div class="footer-2">
				<div class="grid grid--3"><?php dynamic_sidebar( 'footer2' ); ?></div>
			</div>
			<div class="footer-3">
				<div class="grid grid--1"><?php dynamic_sidebar( 'footer3' ); ?></div>
			</div>
		</div>

	<?php

}

/**
 * Footer Permalink.
 */
function digimag_lite_footer_permalink() {
	$permalink = '<i class="icofont icofont-link-alt"></i>';
	$permalink .= '<input type="url" onclick="this.select()" name="" value="' . esc_url( get_permalink() ) . '">';

	/* translators: permalink. */
	printf( '<div class="entry-permalink">' . __( 'Permalink: %s', 'digimag-lite' ) . '</div>', $permalink ); // WP XSS: OK.
}

if ( ! function_exists( 'digimag_lite_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 *
	 * @param string|array $size thumbnail size.
	 */
	function digimag_lite_post_thumbnail( $size = 'post-thumbnail' ) {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() && ! is_front_page() ) : ?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail( $size ); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
				<?php the_post_thumbnail( $size ); ?>
			</a>

		<?php
		endif; // End is_singular().
	}
endif;

/**
 * Socials author bio.
 *
 * @param string $id user id.
 */
function digimag_lite_user_social_links( $id ) {
	$author_website = get_the_author_meta( 'user_url', $id );
	$output         = '';

	if ( ! empty( $author_website ) ) {
		$output = sprintf( '<li class="author-website"><a href="%s" class="tag-alike-style ">%s</a>',
			esc_url( $author_website ),
			esc_html__( "visit author's website", 'digimag-lite' )
		);
	}

	if ( empty( $output ) ) {
		return '';
	}

	echo '<ul class="author-social">' . wp_kses_post( $output ) . '</ul>';
}

/**
 * Author Box.
 */
function digimag_lite_author_box() {
	?>
	<div class="entry-author">
		<div class="author-avatar">
			<?php echo get_avatar( get_the_author_meta( 'user_email' ), 85 ); ?>
		</div><!-- .author-avatar -->
		<div class="author-info">
			<div class="author-heading">
				<h3 class="author-title">
					<?php
					echo wp_kses_post( '<span class="author-name">' . get_the_author() . '</span>' );
					?>
				</h3>
			</div>

			<div class="author-bio">
				<?php the_author_meta( 'description' ); ?>
			</div><!-- .author-bio -->
			<?php digimag_lite_user_social_links( get_the_author_meta( 'ID' ) ); ?>
		</div><!-- .author-info -->
	</div><!-- .entry-author -->
	<?php
}

/**
 * Post Published Date
 */
function digimag_lite_post_published_date() {
	$time = human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) );
	printf( esc_html( $time ) . ' ago' );
}

/**
 * Change the [...] to a 'continue reading' link automatically.
 *
 * @return string.
 */
function digimag_lite_excerpt_more() {
	return '&hellip;';
}
add_action( 'excerpt_more', 'digimag_lite_excerpt_more' );

/**
 * Change excerpt link
 *
 * @return string.
 */
function digimag_lite_excerpt_length() {
	return 100;
}
add_action( 'excerpt_length', 'digimag_lite_excerpt_length' );

/**
 * Previous/next post navigation.
 */
function digimag_lite_post_navigation() {
	$title_length     = get_theme_mod( 'bottom_navigation_title_length', 4 );
	$navigation_posts = array(
		'next_text' => get_next_post(),
		'prev_text' => get_previous_post(),
	);
	foreach ( $navigation_posts as $key => $navigation_post ) {
		if ( ! empty( $navigation_post ) ) {
			$text       = '';
			$meta_nav   = 'next_text' === $key ? __( 'Next Post', 'digimag-lite' ) : __( 'Previous Post', 'digimag-lite' );
			$title      = wp_trim_words( get_the_title( $navigation_post->ID ), $title_length );
			$categories = get_the_category( $navigation_post->ID );
			$cat_color  = get_term_meta( $categories[0]->term_id, 'category_color', true );
			$style      = $cat_color ? 'style="background-color:' . esc_attr( $cat_color ) . '"' : '';
			$thumbnail  = has_post_thumbnail( $navigation_post->ID ) ? get_the_post_thumbnail( $navigation_post->ID, 'post-thumbnail' ) : '';
			$text       = sprintf(
				'<span class="meta-nav" aria-hidden="true">%1$s</span>
				<div class="entry-meta-nav">
					<span class="cat-links"%2$s>%3$s</span>
					<h4 class="entry-title">%4$s</h4>
				</div>
				<span class="post-thumbnail">%5$s</span>',
				$meta_nav,
				$style,
				$categories[0]->name,
				$title,
				$thumbnail
			);
		}
		$navigation_posts[ $key ] = ! empty( $text ) ? $text : '';
	}
	the_post_navigation( $navigation_posts );
}
