<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package architectwp
 */

if ( ! function_exists( 'architectwp_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function architectwp_posted_on() {
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
			esc_html_x( 'Posted on %s', 'post date', 'architectwp' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'architectwp_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function architectwp_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'architectwp' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'aperture_portfolioentry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function architectwp_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'architectwp' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'architectwp' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'architectwp' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'architectwp' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'architectwp' ),
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
					__( 'Edit <span class="screen-reader-text">%s</span>', 'architectwp' ),
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

if ( ! function_exists( 'architectwp_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function architectwp_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'architectwp_post_category' ) ) :
	/**
	 * Displays post categories 
	 */

	function architectwp_post_category() {
		global $post;
		$categories = get_the_category();
		if ( ! empty( $categories ) ) {
		    echo '<a class="post-cat" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
		} 
	}
endif;


if ( ! function_exists( 'architectwp_header' ) ) :

	/**
	 * Displays header image with text & button
	 */

	function architectwp_header() {

	if(is_front_page() || is_home()): ?>
		<div class="header-image">
			<?php the_header_image_tag(); ?>
			<div class="header-content">
				<?php 
				$main_text = get_theme_mod('header_main_text');
				$sub_text = get_theme_mod('header_sub_text');
				$button_label = get_theme_mod('header_button_label');
				$button_url = get_theme_mod('header_button_url');

				if($main_text) {
					echo '<h1>'. esc_html($main_text) .'</h1>';
				} if($sub_text) {
					echo '<h3>'. esc_html($sub_text) .'</h3>';
				}
				?>
				<?php if($button_url && $button_label) { ?>
					<a class="button" href="<?php echo esc_url($button_url);?>"> <?php echo esc_html($button_label); ?> </a>
				<?php } ?>
			</div>
		</div>
<?php else: ?>
		<div class="page-header-image">
			<?php the_header_image_tag(); ?>
			<div class="header-content">
				<h1><?php wp_title(''); ?></h1>
			</div>
		</div>
	<?php endif; //end header image check
	} // End Function
endif;

if ( ! function_exists( 'architectwp_intro' ) ) :

	/**
	 * Displays header image with text & button
	 */

	function architectwp_intro() {
	if(is_front_page() || is_home()): 
	//assign theme_mod vars
	$section_toggle = get_theme_mod('intro_toggle');
	$title = get_theme_mod('intro_title');
	$sub_title = get_theme_mod('intro_sub_title');
	$content = get_theme_mod('intro_content');

		if($section_toggle == 'enable'): 
		?>
		<div class="grid-wide">
			<div class="home-intro">
				<?php if($title) {
					echo '<h1 class="section-title">'. esc_html($title) .'</h1>';
				} if($sub_title){
					echo '<h1 class="section-sub-title">'. esc_html($sub_title) .'</h1>';
				} if($content){
					echo '<p>'. esc_html($content) .'</p>';
				}
				?>
			</div>
		</div>
		<?php endif;
	endif;
	} // End Function
endif;