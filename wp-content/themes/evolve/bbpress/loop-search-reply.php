<?php

/**
 * Search Loop - Single Reply
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<div class="bbp-search-result bbp-reply-result">
    <div class="mb-2">
        <strong><?php esc_html_e( 'In reply to: ', 'evolve' ); ?></strong>
        <a class="bbp-permalink"
           href="<?php bbp_topic_permalink( bbp_get_reply_topic_id() ); ?>">

			<?php bbp_topic_title( bbp_get_reply_topic_id() ); ?>

        </a>
    </div>
    <div class="row align-items-center">
        <div class="col-xl-auto comment-author vcard">

			<?php do_action( 'bbp_theme_before_reply_author_details' );

			echo '<b class="fn">';
			bbp_reply_author_link( array( 'type' => 'name', 'show_role' => false ) );
			echo '</b>';

			do_action( 'bbp_theme_after_reply_author_details' ); ?>

        </div>
        <div class="col-auto comment-meta">

			<?php bbp_reply_post_date(); ?>

            <a href="<?php bbp_reply_url(); ?>" class="bbp-permalink mx-2">#<?php bbp_reply_id(); ?></a>

        </div>
        <div class="col">

			<?php bbp_reply_author_link( array(
				'size'      => '45',
				'type'      => 'avatar',
				'show_role' => false
			) ); ?>

        </div>
    </div>
    <div id="post-<?php bbp_reply_id(); ?>" class="bbp-reply-header clearfix">

        <div class="bbp-content">

			<?php do_action( 'bbp_theme_before_reply_content' );

			bbp_reply_content();

			do_action( 'bbp_theme_after_reply_content' ); ?>

        </div>
    </div><!-- #post-<?php bbp_reply_id(); ?> -->
</div>

