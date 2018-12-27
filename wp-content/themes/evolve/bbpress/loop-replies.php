<?php
/**
 * Replies Loop
 *
 * @package bbPress
 * @subpackage Theme
 */
do_action( 'bbp_template_before_replies_loop' ); ?>

    <ol id="topic-<?php bbp_topic_id(); ?>-replies" class="comment-list bbp-replies">

		<?php if ( bbp_thread_replies() ) :

			bbp_list_replies();

		else :

			while ( bbp_replies() ) : bbp_the_reply();

				bbp_get_template_part( 'loop', 'single-reply' );

			endwhile;

		endif; ?>

    </ol><!-- #topic-<?php bbp_topic_id(); ?>-replies -->

<?php do_action( 'bbp_template_after_replies_loop' );
