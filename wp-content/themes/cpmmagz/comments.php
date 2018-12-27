<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package CPMMagz
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
	return;
}
?>

<!-- <div id="comments" class="comments-area"> -->

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( // WPCS: XSS OK.
					esc_html( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s Comments', get_comments_number(), 'comments title', 'cpmmagz' ) ),
					number_format_i18n( get_comments_number() ),
					'<span>' . get_the_title() . '</span>'
				);
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'cpmmagz' ); ?></h2>
			<div class="nav-links">
				<div class="nav-previous"><?php previous_comments_link( esc_attr( __( 'Older Comments', 'cpmmagz' ) ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_attr( __( 'Newer Comments', 'cpmmagz' ) ) ); ?></div>
			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>
		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'     	 => 'ol',
					'short_ping' 	=> true,
					'callback'        => 'cpmmagz_format_comment',
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'cpmmagz' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_attr( __( 'Older Comments', 'cpmmagz' ) ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_attr( __( 'Newer Comments', 'cpmmagz' ) ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation. ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'cpmmagz' ); ?></p>
	<?php endif; ?>

	<?php
		$fields = array(

			'author' => '<div class="input-field">' .'<input placeholder=" " id="author" name="author" type="text" class="validate"  value="' . esc_attr( $commenter['comment_author'] ) . '" >'. '<label for="first_name">' .esc_attr( __( 'First Name', 'cpmmagz'  ) ) .'<span class="required">'.'*'.'</span>' . '</label> ' .
			'</div>',


			'email'  => '<div class="input-field">'.' <input placeholder=" " id="email" name="email" type="text" class="validate" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" >'.'<label for="first_name">' . esc_attr( __( 'Email', 'cpmmagz'  ) ) . '<span class="required">'.'*'.'</span>'. '</label> '  .
			'</div>',

			'website' => '<div class="input-field">'.'<input placeholder=" " id="url" name="url" type="text" class="validate">'.'<label for="first_na48me">'. esc_attr(  __('Website', 'cpmmagz' ) ).'</label>'.'</div>'

			);

		$comments_args = array(
			'fields' => apply_filters( 'comment_form_default_fields', $fields )

			);
	?>
	<?php comment_form($comments_args); ?>