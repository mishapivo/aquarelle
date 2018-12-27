<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Buzzo
 */

/**
 * Check if SCRIPT_DEBUG is on.
 */
function buzzo_is_script_debug() {
	return defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG;
}

/**
 * Sanitize value, return value itself.
 *
 * @param  mixed $value Value.
 * @return mixed
 */
function buzzo_sanitize_value( $value ) {
	return $value;
}

/**
 * Get logo.
 */
function buzzo_get_logo() {
	return apply_filters( 'buzzo_get_logo', get_theme_mod( 'buzzo_logo' ) );
}

/**
 * Get container class.
 */
function buzzo_content_container_class() {
	$css_class = 'container';

	if ( is_page_template( 'page-templates/sections.php' ) ) {
		$css_class = 'no-padding';
	}

	return apply_filters( 'buzzo_content_container_class', $css_class );
}

/**
 * Check related posts on.
 */
function buzzo_is_related_posts_on() {
	return get_theme_mod( 'buzzo_related_posts_on', true );
}

/**
 * Get related posts query.
 *
 * @return WP_Query
 */
function buzzo_get_related_posts_query() {
	$post_id = get_the_ID();

	$query_args = array(
		'post__not_in'        => array( $post_id ),
		'ignore_sticky_posts' => true,
		'posts_per_page'      => 4,
	);

	$query_by = get_theme_mod( 'buzzo_query_related_posts_by', 'post_tag' );
	if ( 'category' == $query_by ) {
		$cats = get_the_category( $post_id );
		if ( $cats ) {
			$cats_id = wp_list_pluck( $cats, 'term_id' );

			$query_args['category__in'] = $cats_id;
		}
	} else {
		$tags = get_the_tags( $post_id );
		if ( $tags ) {
			$tags_id = wp_list_pluck( $tags, 'term_id' );

			$query_args['tag__in'] = $tags_id;
		}
	}

	$query_args = apply_filters( 'buzzo_related_posts_query_args', $query_args );

	return new WP_Query( $query_args );
}

/**
 * Get excluded categories.
 *
 * @return array
 */
function buzzo_get_excluded_categories() {
	$value = get_theme_mod( 'buzzo_excluded_categories' );

	if ( ! $value ) {
		$excluded = array();
	} else {
		$excluded = explode( ',', $value );
		$excluded = array_map( 'trim', $excluded );
	}

	return apply_filters( 'buzzo_excluded_categories', $excluded );
}


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function buzzo_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'buzzo_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function buzzo_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';
	}
}
add_action( 'wp_head', 'buzzo_pingback_header' );

/**
 * Display content bottom sidebar.
 */
function buzzo_content_bottom_sidebar() {
	if ( is_active_sidebar( 'buzzo-content-bottom' ) ) : ?>
		<aside class="content-bottom">
			<?php dynamic_sidebar( 'buzzo-content-bottom' ); ?>
		</aside>
	<?php endif;
}
add_action( 'buzzo_after_main_content', 'buzzo_content_bottom_sidebar' );

if ( ! function_exists( 'buzzo_single_header_image' ) ) {
	/**
	 * Display header image for post.
	 */
	function buzzo_single_header_image() {
		if ( ! is_single() ) {
			return;
		}

		get_template_part( 'template-parts/header/single-header-image' );
	}
}
add_action( 'buzzo_after_header', 'buzzo_single_header_image' );

if ( ! function_exists( 'buzzo_page_header_image' ) ) {
	/**
	 * Display header image for page.
	 */
	function buzzo_page_header_image() {
		if ( ! is_page() ) {
			return;
		}

		if ( get_post_meta( get_the_ID(), '_buzzo_hide_page_title', true ) ) {
			get_template_part( 'template-parts/header/page-header-image', 'no-title' );
		} else {
			get_template_part( 'template-parts/header/page-header-image' );
		}
	}
}
add_action( 'buzzo_after_header', 'buzzo_page_header_image' );

/**
 * Display author bio box.
 */
function buzzo_author_bio() {
	if ( ! get_the_author_meta( 'description' ) ) {
		return;
	}

	$author_id = get_the_author_meta( 'ID' );

	if ( 'no_sidebar' == Buzzo_Sidebar::get_sidebar_layout() ) {
		$css_class = 'col-md-8 col-md-push-2';
	} else {
		$css_class = 'col-md-12';
	}
	?>
	<div class="row">
		<div class="<?php echo esc_attr( $css_class ); ?>">
			<div class="author-box">
				<div class="author-avatar">
					<?php echo get_avatar( $author_id, 180 ); ?>

					<div class="overlay">
						<?php buzzo_author_socials(); ?>

						<div class="author-posts-link">
							<a href="<?php echo esc_url( get_author_posts_url( $author_id ) ); ?>"><?php esc_html_e( 'View all posts', 'buzzo' ); ?></a>
						</div>
					</div>
				</div>

				<div class="author-name">
					<?php the_author(); ?>
				</div>

				<?php if ( get_the_author_meta( 'job' ) ) : ?>
					<div class="author-position">
						<?php echo esc_html( get_the_author_meta( 'job' ) ); ?>
					</div>
				<?php endif; ?>

				<div class="author-bio">
					<?php echo wp_kses_post( wpautop( get_the_author_meta( 'description' ) ) ); ?>
				</div>
			</div>
		</div>
	</div>
	<?php
}
add_action( 'buzzo_after_single_post', 'buzzo_author_bio', 15 );

if ( ! function_exists( 'buzzo_author_socials' ) ) {
	/**
	 * Display author socials.
	 */
	function buzzo_author_socials() {
		?>
		<div class="author-social">
			<?php if ( get_the_author_meta( 'facebook' ) ) : ?>
				<a href="<?php echo esc_url( get_the_author_meta( 'facebook' ) ); ?>"><i class="fa fa-facebook"></i></a>
			<?php endif; ?>

			<?php if ( get_the_author_meta( 'google' ) ) : ?>
				<a href="<?php echo esc_url( get_the_author_meta( 'google' ) ); ?>"><i class="fa fa-google-plus"></i></a>
			<?php endif; ?>

			<?php if ( get_the_author_meta( 'twitter' ) ) : ?>
				<a href="<?php echo esc_url( get_the_author_meta( 'twitter' ) ); ?>"><i class="fa fa-twitter"></i></a>
			<?php endif; ?>

			<?php if ( get_the_author_meta( 'github' ) ) : ?>
				<a href="<?php echo esc_url( get_the_author_meta( 'github' ) ); ?>"><i class="fa fa-github"></i></a>
			<?php endif; ?>

			<?php if ( get_the_author_meta( 'instagram' ) ) : ?>
				<a href="<?php echo esc_url( get_the_author_meta( 'instagram' ) ); ?>"><i class="fa fa-instagram"></i></a>
			<?php endif; ?>

			<?php if ( get_the_author_meta( 'pinterest' ) ) : ?>
				<a href="<?php echo esc_url( get_the_author_meta( 'pinterest' ) ); ?>"><i class="fa fa-pinterest"></i></a>
			<?php endif; ?>

			<?php if ( get_the_author_meta( 'linkedin' ) ) : ?>
				<a href="<?php echo esc_url( get_the_author_meta( 'linkedin' ) ); ?>"><i class="fa fa-linkedin"></i></a>
			<?php endif; ?>

			<?php if ( get_the_author_meta( 'skype' ) ) : ?>
				<a href="<?php echo esc_url( get_the_author_meta( 'skype' ) ); ?>"><i class="fa fa-skype"></i></a>
			<?php endif; ?>

			<?php if ( get_the_author_meta( 'tumblr' ) ) : ?>
				<a href="<?php echo esc_url( get_the_author_meta( 'tumblr' ) ); ?>"><i class="fa fa-tumblr"></i></a>
			<?php endif; ?>

			<?php if ( get_the_author_meta( 'youtube' ) ) : ?>
				<a href="<?php echo esc_url( get_the_author_meta( 'youtube' ) ); ?>"><i class="fa fa-youtube-play"></i></a>
			<?php endif; ?>

			<?php if ( get_the_author_meta( 'vimeo' ) ) : ?>
				<a href="<?php echo esc_url( get_the_author_meta( 'vimeo' ) ); ?>"><i class="fa fa-vimeo"></i></a>
			<?php endif; ?>

			<?php if ( get_the_author_meta( 'flickr' ) ) : ?>
				<a href="<?php echo esc_url( get_the_author_meta( 'flickr' ) ); ?>"><i class="fa fa-flickr"></i></a>
			<?php endif; ?>

			<?php if ( get_the_author_meta( 'dribbble' ) ) : ?>
				<a href="<?php echo esc_url( get_the_author_meta( 'dribbble' ) ); ?>"><i class="fa fa-dribbble"></i></a>
			<?php endif; ?>
		</div>
		<?php
	}
}

/**
 * Display next post or previous post.
 */
function buzzo_adjacent_post() {
	if ( ! get_next_post() ) {
		return;
	}

	$netx_post = get_next_post();

	setup_postdata( $netx_post );

	get_template_part( 'template-parts/single/next-post' );

	wp_reset_postdata();
}
add_action( 'buzzo_after_single_post', 'buzzo_adjacent_post', 20 );

/**
 * Display related posts.
 */
function buzzo_related_posts() {
	if ( ! buzzo_is_related_posts_on() ) {
		return;
	}

	$query = buzzo_get_related_posts_query();

	if ( ! $query->have_posts() ) {
		return;
	}
	?>
	<div class="related-posts">
		<div class="page-heading"><?php esc_html_e( 'You also may like this', 'buzzo' ); ?></div>

		<div class="row">
			<?php while ( $query->have_posts() ) : $query->the_post(); ?>

				<div class="col-xs-6 col-md-3">
					<?php get_template_part( 'template-parts/loop-grid' ); ?>
				</div>

			<?php endwhile;
			wp_reset_postdata(); ?>
		</div>
	</div>
	<?php
}
add_action( 'buzzo_after_single_post', 'buzzo_related_posts', 25 );

/**
 * Display comments list and comment form.
 */
function buzzo_comment() {
	if ( ! comments_open() && ! get_comments_number() ) {
		return;
	}

	if ( 'no_sidebar' == Buzzo_Sidebar::get_sidebar_layout() ) : ?>
		<div class="comment-section stretch-section">
			<div class="stretch-section-content bg-gray pt-90">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-push-2">
							<?php comments_template(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php else : ?>
		<div class="comment-section pt-30 pb-30">
			<?php comments_template(); ?>
		</div>
	<?php endif;
}
add_action( 'buzzo_after_single_post', 'buzzo_comment', 30 );

/**
 * Get comment form field.
 *
 * @param  array $comment_field comment_field.
 * @return string html
 */
function buzzo_comment_form_field_comment( $comment_field ) {
	$user_avatar = '';
	$has_avatar = '';
	$commenter = wp_get_current_commenter();
	if ( $commenter['comment_author_email'] ) {
		$user_avatar = get_avatar( $commenter['comment_author_email'], 70 );
		$has_avatar = 'has-avatar';
	}

	return '<p class="comment-form-comment ' . $has_avatar . '">' . $user_avatar . '<label for="comment">' . _x( 'Comment', 'noun', 'buzzo' ) . '</label> <textarea id="comment" name="comment" placeholder="' . _x( 'Comment', 'noun', 'buzzo' ) . '" cols="45" rows="8" maxlength="65525" aria-required="true" required="required"></textarea></p>';
}
add_filter( 'comment_form_field_comment', 'buzzo_comment_form_field_comment' );

/**
 * Filter comment fields.
 *
 * @param  array $fields Comment fields.
 * @return array
 */
function buzzo_comment_form_default_fields( $fields ) {
	$commenter = wp_get_current_commenter();

	$req      = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$html_req = ( $req ? " required='required'" : '' );

	$fields   = array(
		'author' => '<div class="col-sm-4"><p class="comment-form-author"><label for="author">' . esc_html__( 'Name', 'buzzo' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
		            '<input id="author" name="author" type="text" placeholder="' . esc_attr__( 'Name', 'buzzo' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245"' . $aria_req . $html_req . ' /></p></div>',
		'email'  => '<div class="col-sm-4"><p class="comment-form-email"><label for="email">' . esc_html__( 'Email', 'buzzo' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
		            '<input id="email" name="email" placeholder="' . esc_attr__( 'Email', 'buzzo' ) . '" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" maxlength="100" aria-describedby="email-notes"' . $aria_req . $html_req . ' /></p></div>',
		'url'    => '<div class="col-sm-4"><p class="comment-form-url"><label for="url">' . esc_html__( 'Website', 'buzzo' ) . '</label> ' .
		            '<input id="url" name="url" placeholder="' . esc_attr__( 'Website', 'buzzo' ) . '" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" maxlength="200" /></p></div>',
	);

	return $fields;
}
add_filter( 'comment_form_default_fields', 'buzzo_comment_form_default_fields' );

/**
 * Print comemnt fields open row.
 */
function buzzo_comment_form_before_fields() {
	echo '<div class="row">';
}
add_action( 'comment_form_before_fields', 'buzzo_comment_form_before_fields' );

/**
 * Print comemnt fields close row.
 */
function buzzo_comment_form_after_fields() {
	echo '</div>';
}
add_action( 'comment_form_after_fields', 'buzzo_comment_form_after_fields' );

/**
 * Filter comment form args.
 *
 * @param  array $args Comment form args.
 * @return array
 */
function buzzo_comment_form_defaults( $args ) {
	$args['class_submit'] = 'submit buzzo-button';
	$args['submit_button'] = '<button name="%1$s" type="submit" id="%2$s" class="%3$s"><span>%4$s</span></button>';

	return $args;
}
add_filter( 'comment_form_defaults', 'buzzo_comment_form_defaults' );

/**
 * Add bg gray class to content.
 *
 * @param  string $classes Content classes.
 * @return string
 */
function buzzo_content_bg_gray_class( $classes ) {
	if ( is_page() && get_post_meta( get_the_ID(), '_buzzo_bg_gray', true ) ) {
		$classes .= ' bg-gray';
	}

	return $classes;
}
add_filter( 'buzzo_layout_class', 'buzzo_content_bg_gray_class' );

/**
 * Filter archive title.
 *
 * @param  string $title Archive title.
 * @return string
 */
function buzzo_archive_title( $title ) {
	if ( is_home() || is_single() ) {
		return esc_html__( 'Blog', 'buzzo' );
	}

	if ( is_search() ) {
		/* translators: search query. */
		return sprintf( esc_html__( 'Search results for: %s', 'buzzo' ), get_search_query() );
	}

	if ( is_404() ) {
		return esc_html__( 'Not found', 'buzzo' );
	}

	return $title;
}
add_filter( 'get_the_archive_title', 'buzzo_archive_title' );
