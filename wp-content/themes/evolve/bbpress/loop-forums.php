<?php
/**
 * Forums Loop
 *
 * @package bbPress
 * @subpackage Theme
 */
do_action( 'bbp_template_before_forums_loop' ); ?>

    <ul id="forums-list-<?php bbp_forum_id(); ?>" class="bbp-forums">

        <li class="row bbp-header">

            <ul class="col forum-titles">
                <li class="bbp-forum-info"><?php esc_html_e( 'Forum', 'evolve' ); ?></li>
                <li class="bbp-forum-topic-count"><?php esc_html_e( 'Topics', 'evolve' ); ?></li>
                <li class="bbp-forum-reply-count"><?php bbp_show_lead_topic() ? esc_html_e( 'Replies', 'evolve' ) : esc_html_e( 'Posts', 'evolve' ); ?></li>
                <li class="bbp-forum-freshness"><?php esc_html_e( 'Freshness', 'evolve' ); ?></li>
            </ul>

        </li><!-- .bbp-header -->

        <li class="bbp-body">

			<?php while ( bbp_forums() ) : bbp_the_forum();

				bbp_get_template_part( 'loop', 'single-forum' );

			endwhile; ?>

        </li><!-- .bbp-body -->
    </ul><!-- .bbp-forums -->

<?php do_action( 'bbp_template_after_forums_loop' );
