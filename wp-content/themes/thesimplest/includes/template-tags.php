<?php

/**
 * Displays an optional post thumbnail.
 *
 * @since TheSimplest 1.0
 */
function thesimplest_post_thumbnail() {
	if( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if( is_singular() ) : ?>

		<div class="entry-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div><!-- .post-thumbnail -->

	<?php else : ?>

		<a class="entry-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
			<?php the_post_thumbnail( 'post-thumbnail', array(
				'alt'       =>  the_title_attribute( 'echo=0' )
			) ); ?>
		</a>

	<?php endif; // End is_singular()
}

/**
 * Displays the optional excerpt.
 *
 * @since TheSimplest 1.0
 */
function thesimplest_excerpt( $class = 'entry-summary' ) {
    $class = esc_attr( $class );

    if( ! is_single() ) : ?>
        <div class="<?php echo $class; ?>">
            <?php the_excerpt(); ?>
        </div>
    <?php endif;
}

/**
 * Prints HTML with meta information
 *
 * @since TheSimplest 1.0
 */
function thesimplest_entry_meta() {

    thesimplest_entry_date();

    $author_id  =   get_the_author_meta( 'ID' );
    $author_url =   get_author_posts_url( $author_id );

	printf( 
		'<span class="author-info"> by <a href="%1$s">%2$s</a></span>', 
		esc_url( $author_url ), 
		esc_html( get_the_author_meta( 'display_name', $author_id ) ) 
	);

}

function thesimplest_entry_date() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		get_the_date(),
		esc_attr( get_the_modified_date( 'c' ) ),
		get_the_modified_date()
	);

	printf( '<span class="posted-on">%1$s %2$s</span>',
		esc_attr_x( 'Posted on', 'Used before publish date.', 'thesimplest' ),
		$time_string
	);
}

function thesimplest_page_navigation() {

    if( get_next_posts_link() || get_previous_posts_link() ) :
    ?>

        <div class="pagination">
            <span class="nav-next pull-left"><?php previous_posts_link( '&larr; ' . esc_attr__( 'Newer posts', 'thesimplest' ) ); ?></span>
            <span class="nav-previous pull-right"><?php next_posts_link( esc_attr__( 'Older posts', 'thesimplest' ) . ' &rarr;' ); ?></span>
        </div>

<?php
    endif;
}

function thesimplest_entry_footer() {

	/* translators: used between list items, there is a space after the comma */
	$separate_meta = __( ', ', 'thesimplest' );

	// Get Categories for posts.
    $categories_list = get_the_category_list( $separate_meta );

	// Get Tags for posts.
    $tags_list = get_the_tag_list( '', $separate_meta );

	// We don't want to output .entry-footer if it will be empty, so make sure its not.
    if( ( $categories_list || $tags_list ) || get_edit_post_link() ) :

        echo '<footer class="entry-footer clearfix">';

        //if( 'post' === get_post_type() && is_single() ) {

            if( $categories_list || $tags_list ) {

                    echo '<span class="cat-tags-links">';

	                // Make sure there's more than one category before displaying.
                    if( $categories_list ) {
                        echo '<span class="cat-links">' . '<span class="cat-icon"><i class="fa fa-folder-open"></i></span>' . '<span class="screen-reader-text">' . esc_attr__( 'Categories', 'thesimplest' ) . '</span>' . $categories_list . '</span>';
                    }

	            if( 'post' === get_post_type() && is_single() ) {
		            if ( $tags_list ) {
			            echo '<span class="tags-links">' . '<span class="tags-icon"><i class="fa fa-hashtag" aria-hidden="true"></i></span>' . '<span class="screen-reader-text">' . esc_attr__( 'Tags', 'thesimplest' ) . '</span>' . $tags_list . '</span>';
		            }
	            }

                    echo '</span>';

                }

        //}

	    edit_post_link(
		    sprintf(
		    /* translators: %s: Name of current post */
			    __( 'Edit<span class="screen-reader-text"> "%s"', 'thesimplest' ),
			    get_the_title()
		    ),
		    '<span class="edit-link">',
		    '</span>'
	    );

        echo '</footer>';

    endif;
}

function thesimplest_custom_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'thesimplest_custom_excerpt_more' );