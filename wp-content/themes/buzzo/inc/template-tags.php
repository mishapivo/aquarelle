<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Buzzo
 */

if ( ! function_exists( 'buzzo_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function buzzo_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			esc_html_x( 'Posted on %s', 'post date', 'buzzo' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
			esc_html_x( 'by %s', 'post author', 'buzzo' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'buzzo_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function buzzo_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'buzzo' ) );
			if ( $categories_list && buzzo_categorized_blog() ) {
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'buzzo' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'buzzo' ) );
			if ( $tags_list ) {
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'buzzo' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			/* translators: %s: post title */
			comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'buzzo' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'buzzo' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function buzzo_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'buzzo_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'buzzo_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so buzzo_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so buzzo_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in buzzo_categorized_blog.
 */
function buzzo_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'buzzo_categories' );
}
add_action( 'edit_category', 'buzzo_category_transient_flusher' );
add_action( 'save_post',     'buzzo_category_transient_flusher' );


if ( ! function_exists( 'buzzo_page_title' ) ) :
	/**
	 * Display page title.
	 */
	function buzzo_page_title() {
		$tag = is_front_page() ? 'div' : 'h1';

		$tag = apply_filters( 'buzzo_page_title_tag', $tag );

		if ( is_archive() ) {
			$title = get_the_archive_title();
		} elseif ( is_single() || is_page() ) {
			$title = get_the_title();
		} elseif ( is_search() ) {
			/* translators: search keyword. */
			$title = sprintf( esc_html__( 'Search results for: %s', 'buzzo' ), get_search_query() );
		} else {
			$title = esc_html__( 'Blog', 'buzzo' );
		}

		$title = apply_filters( 'buzzo_page_title_text', $title );

		echo "<{$tag} class=\"page-title\">{$title}</{$tag}>"; // WPCS: xss ok.
	}
endif;


if ( ! function_exists( 'buzzo_post_media' ) ) :
	/**
	 * Display post image.
	 *
	 * @param  string $size Thumbnail size.
	 */
	function buzzo_post_media( $size = 'buzzo-large' ) {
		if ( has_post_thumbnail() ) :
			?>
			<div class="post-media">
				<div class="post-image">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( $size ); ?></a>
				</div>
			</div>
			<?php
		endif;
	}
endif;


if ( ! function_exists( 'buzzo_post_date' ) ) :
	/**
	 * Display post date.
	 */
	function buzzo_post_date() {
		?>
		<span class="post-date">
			<a href="<?php the_permalink(); ?>"><time datetime="<?php the_time( 'Y-m-d H:i' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time></a>
		</span>
		<?php
	}
endif;


if ( ! function_exists( 'buzzo_post_content' ) ) :
	/**
	 * Display post content.
	 */
	function buzzo_post_content() {
		?>
		<div class="post-content">
			<?php
			if ( 'excerpt' == get_theme_mod( 'buzzo_blog_display', 'full' ) ) {
				the_excerpt();
			} else {
				the_content( _x( ' ...', 'more text', 'buzzo' ) );
			}
			?>
		</div>
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'buzzo' ),
			'after'  => '</div>',
		) );
	}
endif;

if ( ! function_exists( 'buzzo_pagination' ) ) :
	/**
	 * Display pagination.
	 */
	function buzzo_pagination() {
		if ( 'numeric' == Buzzo_Blog::get_pagination_type() ) {
			printf( '<div class="posts-navigation"><h2 class="screen-reader-text">%s</h2><div class="paginate-links">%s</div></div>', esc_html__( 'Posts navigation', 'buzzo' ), wp_kses_post( paginate_links() ) );
		} else {
			the_posts_navigation();
		}
	}
endif;


if ( ! function_exists( 'buzzo_post_categories' ) ) :
	/**
	 * Display post categories.
	 */
	function buzzo_post_categories() {
		$cats = get_the_category();

		if ( ! $cats ) {
			return;
		}

		$excluded = buzzo_get_excluded_categories();

		echo '<span class="post-cats">';

		foreach ( $cats as $cat ) {
			if ( in_array( $cat->term_id, $excluded ) ) {
				continue;
			}

			printf(
				'<a href="%s" %s>%s</a>',
				esc_url( get_category_link( $cat->term_id ) ),
				buzzo_get_cat_color( $cat->term_id ) ? 'style="background-color:' . esc_attr( buzzo_get_cat_color( $cat->term_id ) ) . '"' : '',
				esc_html( $cat->name )
			);
		}

		echo '</span>';
	}
endif;


if ( ! function_exists( 'buzzo_comment_list' ) ) :
	/**
	 * Comment list callback.
	 *
	 * @param  object $comment Comment object.
	 * @param  array  $args    Arguments of wp_list_comments().
	 * @param  int    $depth   Depth.
	 */
	function buzzo_comment_list( $comment, $args, $depth ) {
		if ( 'div' === $args['style'] ) {
			$tag       = 'div';
			$add_below = 'comment';
		} else {
			$tag       = 'li';
			$add_below = 'div-comment';
		}
		?>
		<<?php echo esc_attr( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
			<?php if ( 'div' != $args['style'] ) : ?>
				<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
			<?php endif; ?>

				<?php if ( 0 != $args['avatar_size'] ) : ?>
					<div class="comment-author-avatar">
						<?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
					</div>
				<?php endif; ?>

				<div class="comment-author vcard">
					<?php /* translators: %s: comment author link */ ?>
					<?php printf( __( '<cite class="fn">%s</cite>', 'buzzo' ), get_comment_author_link() ); // WPCS: xss ok. ?>

					<span class="comment-meta">
						| &nbsp;
						<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
							<?php
							/* translators: 1: date, 2: time */
							printf( esc_html__( '%1$s at %2$s', 'buzzo' ), get_comment_date(),  get_comment_time() ); ?></a>

						<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>

						<?php edit_comment_link( esc_html__( '(Edit)', 'buzzo' ), '  ', '' ); ?>
					</span>
				</div>

				<?php if ( ! intval( $comment->comment_approved ) ) : ?>
					<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'buzzo' ); ?></em>
					<br />
				<?php endif; ?>

				<div class="comment-text">
					<?php comment_text(); ?>
				</div>
			<?php if ( 'div' != $args['style'] ) : ?>
				</div>
			<?php endif; ?>
		<?php
	}
endif;

if ( ! function_exists( 'buzzo_post_comments_link' ) ) {
	/**
	 * Display comments link.
	 */
	function buzzo_post_comments_link() {
		?>
		<span class="comment-count">
			<?php
			comments_popup_link(
				__( 'No comment', 'buzzo' ),
				__( '1 comment', 'buzzo' ),
				__( '% comments', 'buzzo' ),
				'comments-link',
				__( 'Comments are off', 'buzzo' )
			);
			?>
		</span>
		<?php
	}
}
