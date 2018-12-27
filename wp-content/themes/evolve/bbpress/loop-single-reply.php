<?php
/**
 * Replies Loop - Single Reply
 *
 * @package bbPress
 * @subpackage Theme
 */
?>

<div <?php bbp_reply_class(); ?>>

	<?php if ( bbp_is_single_user_replies() ) : ?>

        <div class="mb-2">

			<?php esc_html_e( 'In reply to ', 'evolve' ); ?>

            <a class="bbp-permalink"
               href="<?php bbp_topic_permalink( bbp_get_reply_topic_id() ); ?>">

				<?php bbp_topic_title( bbp_get_reply_topic_id() ); ?>

            </a>

        </div>

	<?php endif; ?>

    <div class="row align-items-center">
        <div class="col-xl-auto comment-author vcard">

			<?php do_action( 'bbp_theme_before_reply_author_details' );

			echo '<b class="fn">';
			bbp_reply_author_link( array( 'type' => 'name', 'show_role' => false ) );

			if ( user_can( bbp_get_reply_author_id(), 'moderate' ) ) {
				echo '<span class="badge badge-pill badge-primary ml-2">';
			} else {
				echo '<span class="badge badge-pill badge-light ml-2">';
			}
			bbp_reply_author_link( array( 'type' => '', 'show_role' => true ) );
			echo '</span></b>';

			echo '<span class="badge badge-pill badge-light ml-2">' . sprintf( __( 'Posts: %s', 'evolve' ), bbp_get_user_reply_count_raw( bbp_get_reply_author_id() ) ) . '</span>';

			if ( bbp_is_user_keymaster() ) :

				do_action( 'bbp_theme_before_reply_author_admin_details' );

				echo '&nbsp;&nbsp;';
				bbp_author_ip( $args = array(
					'post_id' => bbp_get_reply_id(),
					'before'  => '<span class="comment-meta">(',
					'after'   => ')</span>'
				) );

				do_action( 'bbp_theme_after_reply_author_admin_details' );

			endif;

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
        <div class="post-meta m-0 mt-4 bbp-meta">

			<?php do_action( 'bbp_theme_before_reply_admin_links' );

			bbp_reply_admin_links( array( 'sep' => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ) );

			do_action( 'bbp_theme_after_reply_admin_links' ); ?>

        </div><!-- .bbp-meta -->
    </div><!-- #post-<?php bbp_reply_id(); ?> -->
</div>

