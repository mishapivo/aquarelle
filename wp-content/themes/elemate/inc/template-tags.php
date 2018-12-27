<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package EleMate
 * @since 	1.0.0
 * @version	1.0.0
 */

if ( ! function_exists( 'elemate_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function elemate_posted_on() {

	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
	?>
	<span class="byline">
		<?php
		printf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		);
		?>
	</span>
	<span class="posted-on">
		<?php
		printf( '<a href="%1$s" rel="bookmark">%2$s</a>',
			esc_url( get_permalink() ),
			$time_string
		);
		?>
	</span>
	<?php 
	if ( 'post' === get_post_type() ) {
	    elemate_entry_taxonomies();
	}	
}
endif;

if ( ! function_exists( 'elemate_entry_taxonomies' ) ) {
/**
 * Prints HTML with category and tags for current post.
 *
 * Create your own actions_entry_taxonomies() function to override in a child theme.
 *
 * @since Elemate 1.0.0
 */
function elemate_entry_taxonomies() {
	$categories_list = get_the_category_list( esc_html_x( ', ', 'Used between list items, there is a space after the comma.', 'elemate' ) );
	if ( $categories_list && elemate_categorized_blog() ) {
		printf( '<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
			esc_html_x( 'Categories', 'Used before category names.', 'elemate' ),
			$categories_list
		);
	}

	$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'Used between list items, there is a space after the comma.', 'elemate' ) );
	if ( $tags_list ) {
		printf( '<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
			esc_html_x( 'Tags', 'Used before tag names.', 'elemate' ),
			$tags_list
		);
	}
}
}


if ( ! function_exists( 'elemate_edit_post_link' ) ) :
/**
 * Prints the post's edit link
 */
function elemate_edit_post_link() {
	// Display 'edit' link.
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			__( 'Edit %s', 'elemate' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;


if ( ! function_exists( 'elemate_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function elemate_entry_footer() {

	/* translators: used between list items, there is a space after the comma */
	$separate_meta = __( ', ', 'elemate' );

	// Display Tags for posts.
	if ( 'post' === get_post_type() ) {
		$tags_list = get_the_tag_list( '', $separate_meta );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . __( 'Tagged %1$s', 'elemate' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	// Display link to comments.
	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( 'Leave a comment', 'elemate' ), __( '1 Comment', 'elemate' ), __( '% Comments', 'elemate' ) );
		echo '</span>';
	}

	elemate_edit_post_link();
}
endif;


/**
 * Returns an accessibility-friendly link to edit a post or page.
 *
 * This also gives us a little context about what exactly we're editing
 * (post or page?) so that users understand a bit more where they are in terms
 * of the template hierarchy and their content. Helpful when/if the single-page
 * layout with multiple posts/pages shown gets confusing.
 *
 * @param int $id The post ID.
 */
function elemate_edit_link( $id ) {
	if ( is_page() ) {
		$type = __( 'Page', 'elemate' );
	} elseif ( get_post( $id ) ) {
		$type = __( 'Post', 'elemate' );
	}
	$link = edit_post_link(
		sprintf(
			// The translators: %s: Name of current post.
			__( 'Edit %1$s %2$s', 'elemate' ),
			$type,
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);

	return $link;
}


/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function elemate_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'elemate_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'elemate_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so elemate_categorized_blog should return true.
		return true;
	}

	// This blog has only 1 category so elemate_categorized_blog should return false.
	return false;
}


/**
 * Flush out the transients used in elemate_categorized_blog.
 */
function elemate_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'elemate_categories' );
}
add_action( 'edit_category', 'elemate_category_transient_flusher' );
add_action( 'save_post',     'elemate_category_transient_flusher' );

if ( ! function_exists( 'elemate_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 *
 * Create your own elemate_post_thumbnail() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 */
function elemate_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) {
	?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div><!-- .post-thumbnail -->

	<?php } else { ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
		<?php the_post_thumbnail( 'elemate-featured-image', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
	</a>

	<?php } // End is_singular()
}
endif;

/**
 * Template functions used for the site footer.
 *
 * @package Elemated
 */

if ( ! function_exists( 'elemate_footer_credit' ) ) {
	/**
	 * Display the theme credit
	 * @since  1.0.0
	 * @return void
	 */
	function elemate_footer_credit() {
		$elemate_theme = wp_get_theme();
        $name = $elemate_theme->get( 'Name' );
		$url = $elemate_theme->get( 'ThemeURI' );
		$author = $elemate_theme->get( 'Author' );
		$copyright = __( 'Copyright &copy; ', 'elemate' ) . get_bloginfo( 'name' ) . ' ' . esc_attr( date_i18n( __( 'Y', 'elemate' ) ) );
		
		do_action( 'elemate_before_footer' );
		    echo esc_html( apply_filters( 'elemate_copyright_text', $copyright ) );
		    if ( apply_filters( 'elemate_credit_link', true ) ) {
		        printf( esc_html__( ' / Theme: %1$s, designed by %2$s.', 'elemate' ), esc_attr( $name ), '<a class="brown-text text-lighten-3" href="' . esc_url( $url ) . '" alt="' . esc_attr( $name ) . '" title="' . esc_attr( $name ) . '" rel="designer nofollow">' . esc_attr( $author ) . '</a>' );
		    }
        do_action( 'elemate_after_footer' );
	} 
}
add_action( 'elemate_footer_elements',        'elemate_footer_credit',		  10 );


if ( ! function_exists( 'elemate_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * Create your own elemate_excerpt_more() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function elemate_excerpt_more() {
	$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( wp_kses_post( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'elemate' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'elemate_excerpt_more' );
endif;

// Lets do a separate excerpt length for our home blog feed
function elemate_cards_excerpt() {
	$theContent = trim(strip_tags(get_the_content()));
		$output = str_replace( '"', '', $theContent);
		$output = str_replace( '\r\n', ' ', $output);
		$output = str_replace( '\n', ' ', $output);
			$limit = apply_filters( 'elemate_cards_excerpt', '20' );
			$content = explode(' ', $output, $limit);
			array_pop($content);
		$content = implode(" ",$content)."  ";
	return strip_tags($content, ' ');
}

// Lets do a separate excerpt length for our home blog feed
function elemate_3cards_excerpt() {
	$theContent = trim(strip_tags(get_the_content()));
		$output = str_replace( '"', '', $theContent);
		$output = str_replace( '\r\n', ' ', $output);
		$output = str_replace( '\n', ' ', $output);
			$limit = apply_filters( 'elemate_3cards_excerpt', '18' );
			$content = explode(' ', $output, $limit);
			array_pop($content);
		$content = implode(" ",$content)."  ";
	return strip_tags($content, ' ');
}

if ( ! function_exists( 'elemate_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since EleMate 1.0.0
 */
function elemate_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;