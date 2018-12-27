<?php
/**
 * Topics Loop - Single
 *
 * @package bbPress
 * @subpackage Theme
 */
?>

<ul id="bbp-topic-<?php bbp_topic_id(); ?>" <?php bbp_topic_class(); ?>>

    <li class="bbp-topic-title">

		<?php if ( bbp_is_user_home() ) :

			if ( bbp_is_favorites() ) : ?>

                <span class="bbp-topic-action">

                    <?php do_action( 'bbp_theme_before_topic_favorites_action' );

                    bbp_user_favorites_link( array(
	                    'before'    => '<span class="mr-2">',
	                    'after'     => '</span>',
	                    'favorited' => evolve_get_svg( 'close' )
                    ) );

                    do_action( 'bbp_theme_after_topic_favorites_action' ); ?>

                </span>

			<?php elseif ( bbp_is_subscriptions() ) : ?>

                <span class="bbp-topic-action">

                    <?php do_action( 'bbp_theme_before_topic_subscription_action' );

                    bbp_user_subscribe_link( array(
	                    'before'      => '<span class="mr-2">',
	                    'after'       => '</span>',
	                    'unsubscribe' => evolve_get_svg( 'close' )
                    ) );

                    do_action( 'bbp_theme_after_topic_subscription_action' ); ?>

                </span>

			<?php endif;

		endif;

		do_action( 'bbp_theme_before_topic_title' ); ?>

        <a class="bbp-permalink" href="<?php bbp_topic_permalink(); ?>">

			<?php bbp_topic_title();

			if ( bbp_is_topic_sticky() ) {
				echo ' ' . evolve_get_svg( 'pin' );
			} ?>

        </a>

		<?php do_action( 'bbp_theme_after_topic_title' );

		bbp_topic_pagination();

		do_action( 'bbp_theme_before_topic_meta' ); ?>

        <p class="bbp-topic-meta">

			<?php do_action( 'bbp_theme_before_topic_started_by' ); ?>

            <span class="post-meta bbp-topic-started-by">

                <?php printf( __( 'Started by %1$s', 'evolve' ), bbp_get_topic_author_link( array(
	                'type' => 'name',
	                'size' => '30'
                ) ) ); ?>

            </span>

			<?php do_action( 'bbp_theme_after_topic_started_by' );

			if ( ! bbp_is_single_forum() || ( bbp_get_topic_forum_id() !== bbp_get_forum_id() ) ) :

				do_action( 'bbp_theme_before_topic_started_in' ); ?>

                <span class="post-meta bbp-topic-started-in">

                    <?php printf( __( 'in <a href="%1$s"><b>%2$s</b></a>', 'evolve' ), bbp_get_forum_permalink( bbp_get_topic_forum_id() ), bbp_get_forum_title( bbp_get_topic_forum_id() ) ); ?>

                </span>

				<?php do_action( 'bbp_theme_after_topic_started_in' );

			endif; ?>

        </p>

		<?php do_action( 'bbp_theme_after_topic_meta' );

		bbp_topic_row_actions(); ?>

    </li>

    <li class="bbp-topic-voice-count"><?php bbp_topic_voice_count(); ?></li>

    <li class="bbp-topic-reply-count"><?php bbp_show_lead_topic() ? bbp_topic_reply_count() : bbp_topic_post_count(); ?></li>

    <li class="post-meta bbp-topic-freshness">

		<?php do_action( 'bbp_theme_before_topic_freshness_author' ); ?>

        <span class="bbp-topic-freshness-author float-right">

            <?php bbp_author_link( array(
	            'post_id' => bbp_get_topic_last_active_id(),
	            'size'    => '30'
            ) ); ?>

        </span>

		<?php do_action( 'bbp_theme_after_topic_freshness_author' );

		do_action( 'bbp_theme_before_topic_freshness_link' );

		bbp_topic_freshness_link();

		do_action( 'bbp_theme_after_topic_freshness_link' ); ?>

    </li>
</ul><!-- #bbp-topic-<?php bbp_topic_id(); ?> -->
