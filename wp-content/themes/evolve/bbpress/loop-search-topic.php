<?php
/**
 * Search Loop - Single Topic
 *
 * @package bbPress
 * @subpackage Theme
 */
?>

<div class="bbp-search-result bbp-topic-result">

	<?php if ( bbp_is_user_home() ) :

		if ( bbp_is_favorites() ) : ?>

		<?php elseif ( bbp_is_subscriptions() ) : ?>

		<?php endif;

	endif; ?>

    <strong><?php esc_html_e( 'Topic: ', 'evolve' ); ?></strong>

    <?php

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

</div>