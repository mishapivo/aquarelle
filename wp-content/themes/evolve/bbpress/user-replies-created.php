<?php

/**
 * User Replies Created
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<?php do_action( 'bbp_template_before_user_replies' ); ?>

<div id="bbp-user-replies-created" class="bbp-user-replies-created">
    <h3 class="mb-3">

		<?php _e( 'Forum replies created', 'evolve' ); ?>

    </h3>
    <div class="bbp-user-section">

		<?php if ( bbp_get_user_replies_created() ) : ?>

			<?php bbp_get_template_part( 'pagination', 'replies' ); ?>

			<?php bbp_get_template_part( 'loop', 'replies' ); ?>

			<?php bbp_get_template_part( 'pagination', 'replies' ); ?>

		<?php else : ?>

            <p class="alert alert-warning" role="alert">

				<?php bbp_is_user_home() ? _e( 'You have not replied to any topics', 'evolve' ) : _e( 'This user has not replied to any topics', 'evolve' ); ?>

            </p>

		<?php endif; ?>

    </div>
</div><!-- #bbp-user-replies-created -->

<?php do_action( 'bbp_template_after_user_replies' ); ?>
