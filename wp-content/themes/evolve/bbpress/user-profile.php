<?php
/**
 * User Profile
 *
 * @package bbPress
 * @subpackage Theme
 */
do_action( 'bbp_template_before_user_profile' );
?>

    <div id="bbp-user-profile" class="bbp-user-profile">
        <h3 class="mb-3">

			<?php esc_html_e( 'Profile', 'evolve' ); ?>

        </h3>
        <div class="bbp-user-section">

			<?php if ( bbp_get_displayed_user_field( 'description' ) ) : ?>

                <p class="bbp-user-description"><?php bbp_displayed_user_field( 'description' ); ?></p>

			<?php endif; ?>

            <div class="row">
                <div class="col-md-4">
                    <strong><?php printf( __( 'Forum role:', 'evolve' ) ); ?></strong> <?php printf( bbp_get_user_display_role() ); ?>
                </div>
                <div class="col-md-4">
                    <strong><?php printf( __( 'Topics started:', 'evolve' ) ); ?></strong> <?php printf( bbp_get_user_topic_count_raw() ); ?>
                </div>
                <div class="col-md-4">
                    <strong><?php printf( __( 'Replies created:', 'evolve' ) ); ?></strong> <?php printf( bbp_get_user_reply_count_raw() ); ?>
                </div>
            </div>
        </div>
    </div><!-- #bbp-author-topics-started -->

<?php do_action( 'bbp_template_after_user_profile' );
