<?php

/**
 * User Topics Created
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<?php do_action( 'bbp_template_before_user_topics_created' ); ?>

<div id="bbp-user-topics-started" class="bbp-user-topics-started">
    <h3 class="mb-3">

		<?php _e( 'Forum topics started', 'evolve' ); ?>

    </h3>
    <div class="bbp-user-section">

		<?php if ( bbp_get_user_topics_started() ) : ?>

			<?php bbp_get_template_part( 'pagination', 'topics' ); ?>

			<?php bbp_get_template_part( 'loop', 'topics' ); ?>

			<?php bbp_get_template_part( 'pagination', 'topics' ); ?>

		<?php else : ?>

            <p class="alert alert-warning" role="alert">

				<?php bbp_is_user_home() ? _e( 'You have not created any topics', 'evolve' ) : _e( 'This user has not created any topics', 'evolve' ); ?>

            </p>

		<?php endif; ?>

    </div>
</div><!-- #bbp-user-topics-started -->

<?php do_action( 'bbp_template_after_user_topics_created' ); ?>
