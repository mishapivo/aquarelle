<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package elementare
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h2 class="comments-title"><i class="fa fa-comments-o spaceRight" aria-hidden="true"></i>
			<?php
			$comment_count = get_comments_number();
			if ( 1 === $comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html_e( 'One thought on &ldquo;%1$s&rdquo;', 'elementare' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $comment_count, 'comments title', 'elementare' ) ),
					number_format_i18n( $comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size' => '70',
					'reply_text'        =>  '<span>' .esc_html__( 'Reply'  , 'elementare' ) . '<i class="fa fa-reply spaceLeft"></i></span>',
				) );
			?>
		</ol><!-- .comment-list -->

		<?php the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'elementare' ); ?></p>
		<?php
		endif;

	endif; // Check for have_comments().

	$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );

		$fields =  array(
			'author' => '<p class="comment-form-author"><label for="author"><span class="screen-reader-text">' . esc_html__( 'Name *'  , 'elementare' ) . '</span><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' placeholder="' . esc_attr__( 'Name *'  , 'elementare' ) . '"/></label></p>',
			'email'  => '<p class="comment-form-email"><label for="email"><span class="screen-reader-text">' . esc_html__( 'Email *'  , 'elementare' ) . '</span><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . ' placeholder="' . esc_attr__( 'Email *'  , 'elementare' ) . '"/></label></p>',
			'url'    => '<p class="comment-form-url"><label for="url"><span class="screen-reader-text">' . esc_html__( 'Website'  , 'elementare' ) . '</span><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="' . esc_attr__( 'Website'  , 'elementare' ) . '"/></label></p>',
		);
		$required_text = esc_html__('Required fields are marked ', 'elementare').' <span class="required">*</span>';
		?>
		<?php comment_form( array(
			'fields' => apply_filters( 'comment_form_default_fields', $fields ),
			/* translators: %s: wordpress login url */
			'must_log_in' => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' , 'elementare' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
			/* translators: 1: profile user link, 2: username, 3: logout link */
			'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>'  , 'elementare' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
			'comment_notes_before' => '<p class="comment-notes">' . esc_html__( 'Your email address will not be published.'  , 'elementare' ) . ( $req ? $required_text : '' ) . '</p>',
			'title_reply' => esc_html__( 'Leave a Reply'  , 'elementare' ),
			/* translators: %s: name of person to reply */
			'title_reply_to' => esc_html__( 'Leave a Reply to %s'  , 'elementare' ),
			'cancel_reply_link' => esc_html__( 'Cancel reply'  , 'elementare' ) . '<i class="fa fa-times spaceLeft"></i>',
			'label_submit' => esc_html__( 'Post Comment'  , 'elementare' ),
			'comment_field' => '<p class="comment-form-comment"><label for="comment"><span class="screen-reader-text">' . esc_html__( 'Comment *'  , 'elementare' ) . '</span><textarea id="comment" name="comment" rows="8" aria-required="true" placeholder="' . esc_attr__( 'Comment *'  , 'elementare' ) . '"></textarea></label></p>',
		));
	?>

</div><!-- #comments -->
