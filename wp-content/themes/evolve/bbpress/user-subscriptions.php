<?php

/**
 * User Subscriptions
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<?php do_action( 'bbp_template_before_user_subscriptions' ); ?>

<?php if ( bbp_is_subscriptions_active() ) : ?>

	<?php if ( bbp_is_user_home() || current_user_can( 'edit_users' ) ) : ?>

        <div id="bbp-user-subscriptions" class="bbp-user-subscriptions">
            <h3 class="mb-3">

				<?php _e( 'Subscribed forums', 'evolve' ); ?>

            </h3>
            <div class="bbp-user-section">

				<?php if ( bbp_get_user_forum_subscriptions() ) : ?>

					<?php bbp_get_template_part( 'loop', 'forums' ); ?>

				<?php else : ?>

                    <p class="alert alert-warning mb-4" role="alert">

						<?php bbp_is_user_home() ? _e( 'You are not currently subscribed to any forums', 'evolve' ) : _e( 'This user is not currently subscribed to any forums', 'evolve' ); ?>

                    </p>

				<?php endif; ?>

            </div>

            <h3 class="mb-3">

				<?php _e( 'Subscribed topics', 'evolve' ); ?>

            </h3>
            <div class="bbp-user-section">

				<?php if ( bbp_get_user_topic_subscriptions() ) : ?>

					<?php bbp_get_template_part( 'pagination', 'topics' ); ?>

					<?php bbp_get_template_part( 'loop', 'topics' ); ?>

					<?php bbp_get_template_part( 'pagination', 'topics' ); ?>

				<?php else : ?>

                    <p class="alert alert-warning" role="alert">

						<?php bbp_is_user_home() ? _e( 'You are not currently subscribed to any topics', 'evolve' ) : _e( 'This user is not currently subscribed to any topics', 'evolve' ); ?>

                    </p>

				<?php endif; ?>

            </div>
        </div><!-- #bbp-user-subscriptions -->

	<?php endif; ?>

<?php endif; ?>

<?php do_action( 'bbp_template_after_user_subscriptions' ); ?>
