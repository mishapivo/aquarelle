<?php

/*
   Displays Comments
   ======================================= */

if ( post_password_required() ) {
	echo '<p class="alert alert-warning mb-4" role="alert">' . __( 'This post is password protected. Enter the password to view comments.', 'evolve' ) . '</p>';

	return;
} ?>

    <div id="comments">

		<?php if ( have_comments() ) : ?>

            <div class="row align-items-center">
                <div class="col-auto">

					<?php evolve_discussion_title( 'comment' ); ?>

                </div><!-- .col-auto -->

				<?php evolve_discussion_rss(); ?>

                <div class="col-auto ml-auto">

					<?php evolve_discussion_title( 'pings' ); ?>

                </div><!-- .col-auto .ml-auto -->
            </div><!-- .row .align-items-center -->

            <ol class="comment-list">

				<?php wp_list_comments( array(
					'callback'    => 'evolve_comments_callback',
					'avatar_size' => 45,
					'style'       => 'ol',
					'short_ping'  => true,
				) ); ?>

            </ol><!-- .comment-list -->

			<?php evolve_comment_navigation('#comments'); ?>

		<?php else: ?>

            <div class="row align-items-center mb-4">
                <div class="col-auto">

					<?php if ( comments_open() ) :
						// If comments are open, but there are no comments.
						echo '<h5 class="no-comment mb-0">';
						_e( 'No Comments Yet', 'evolve' );
						echo '</h5>';
					endif; ?>

                </div><!-- .col-auto -->

				<?php evolve_discussion_rss(); ?>

            </div><!-- .row .align-items-center .mb-4 -->

		<?php endif; ?>

    </div><!-- #comments -->

<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

    <p class="alert alert-warning comments-closed" role="alert"><?php _e( 'Comments are closed', 'evolve' ); ?></p>

<?php
endif;

if ( comments_open() ) :

	$evolve_comments_args = array(
		'class_submit'  => 'btn',
		'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" class="form-control" cols="45" rows="8" aria-required="true"></textarea></p>',

	);
	comment_form( $evolve_comments_args );

endif;
