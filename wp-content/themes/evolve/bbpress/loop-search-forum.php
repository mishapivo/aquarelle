<?php
/**
 * Search Loop - Single Forum
 *
 * @package bbPress
 * @subpackage Theme
 */
?>

<div class="bbp-search-result bbp-forum-result">
    <div class="bbp-reply-header">

		<?php do_action( 'bbp_theme_before_forum_title' ); ?>

        <strong><?php esc_html_e( 'Forum: ', 'evolve' ); ?></strong>

        <a class="bbp-permalink" href="<?php bbp_forum_permalink(); ?>">

			<?php bbp_forum_title(); ?>

        </a>

		<?php do_action( 'bbp_theme_after_forum_title' ); ?>

        <span class="post-meta">

                <?php printf( __( 'Last updated %s', 'evolve' ), bbp_get_forum_last_active_time() ); ?>

                </span>

    </div><!-- .bbp-forum-header -->
</div>
