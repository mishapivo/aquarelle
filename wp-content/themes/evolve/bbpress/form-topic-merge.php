<?php
/**
 * Merge Topic
 *
 * @package bbPress
 * @subpackage Theme
 */
?>

<div id="bbpress-forums">

	<?php if ( is_user_logged_in() && current_user_can( 'edit_topic', bbp_get_topic_id() ) ) : ?>

        <div id="merge-topic-<?php bbp_topic_id(); ?>" class="bbp-topic-merge">
            <form id="merge_topic" name="merge_topic" method="post" action="<?php the_permalink(); ?>">
                <h3 class="mb-3">
					<?php printf( __( 'Merge topic "%s"', 'evolve' ), bbp_get_topic_title() ); ?>
                </h3>

                <div class="bbp-template-notice">
                    <p><?php esc_html_e( 'Select the topic to merge this one into. The destination topic will remain the lead topic, and this one will change into a reply.', 'evolve' ); ?></p>
                    <p><?php esc_html_e( 'To keep this topic as the lead, go to the other topic and use the merge tool from there instead.', 'evolve' ); ?></p>
                </div>

                <p class="alert alert-warning" role="alert">
					<?php esc_html_e( 'All replies within both topics will be merged chronologically. The order of the merged replies is based on the time and date they were posted. If the destination topic was created after this one, it\'s post date will be updated to second earlier than this one.', 'evolve' ); ?>
                </p>

                <h3 class="mb-3"><?php esc_html_e( 'Destination', 'evolve' ); ?></h3>

				<?php if ( bbp_has_topics( array(
					'show_stickies' => false,
					'post_parent'   => bbp_get_topic_forum_id( bbp_get_topic_id() ),
					'post__not_in'  => array( bbp_get_topic_id() )
				) ) ) : ?>

                    <p>
                        <label for="bbp_destination_topic">

							<?php esc_html_e( 'Merge with this topic:', 'evolve' ); ?>

                        </label>

						<?php bbp_dropdown( array(
							'post_type'   => bbp_get_topic_post_type(),
							'post_parent' => bbp_get_topic_forum_id( bbp_get_topic_id() ),
							'selected'    => - 1,
							'exclude'     => bbp_get_topic_id(),
							'select_id'   => 'bbp_destination_topic',
							'none_found'  => __( 'No topics were found to which the topic could be merged to!', 'evolve' )
						) ); ?>

                    </p>

				<?php else : ?>

                    <label>
						<?php esc_html_e( 'There are no other topics in this forum to merge with', 'evolve' ); ?>
                    </label>

				<?php endif; ?>

                <h3 class="mb-3">
					<?php esc_html_e( 'Topic extras', 'evolve' ); ?>
                </h3>

				<?php if ( bbp_is_subscriptions_active() ) : ?>

                <p class="custom-control custom-checkbox">
                    <input class="custom-control-input" name="bbp_topic_subscribers" id="bbp_topic_subscribers"
                           type="checkbox"
                           value="1" checked="checked" tabindex="<?php bbp_tab_index(); ?>"/>
                    <label class="custom-control-label"
                           for="bbp_topic_subscribers"><?php esc_html_e( 'Merge topic subscribers', 'evolve' ); ?></label>
                <p>

					<?php endif; ?>

                <p class="custom-control custom-checkbox">
                    <input class="custom-control-input" name="bbp_topic_favoriters" id="bbp_topic_favoriters"
                           type="checkbox" value="1"
                           checked="checked" tabindex="<?php bbp_tab_index(); ?>"/>
                    <label class="custom-control-label"
                           for="bbp_topic_favoriters"><?php esc_html_e( 'Merge topic favoriters', 'evolve' ); ?></label>
                </p>

				<?php if ( bbp_allow_topic_tags() ) : ?>

                    <p class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="bbp_topic_tags" id="bbp_topic_tags" type="checkbox"
                               value="1"
                               checked="checked" tabindex="<?php bbp_tab_index(); ?>"/>
                        <label class="custom-control-label"
                               for="bbp_topic_tags"><?php esc_html_e( 'Merge topic tags', 'evolve' ); ?></label>
                    </p>

				<?php endif; ?>

                <p class="alert alert-danger" role="alert">
					<?php _e( '<strong>WARNING:</strong> This process cannot be undone', 'evolve' ); ?>
                </p>

                <p>
                    <button type="submit" tabindex="<?php bbp_tab_index(); ?>" id="bbp_merge_topic_submit"
                            name="bbp_merge_topic_submit"
                            class="btn"><?php esc_html_e( 'Submit', 'evolve' ); ?></button>
                </p>

				<?php bbp_merge_topic_form_fields(); ?>

            </form>
        </div>

	<?php else : ?>

        <p class="alert alert-danger" role="alert">
			<?php is_user_logged_in() ? esc_html_e( 'You do not have the permissions to edit this topic!', 'evolve' ) : esc_html_e( 'You cannot edit this topic', 'evolve' ); ?>
        </p>

	<?php endif; ?>

</div>
