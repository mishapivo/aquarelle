<?php
/**
 * Split Topic
 *
 * @package bbPress
 * @subpackage Theme
 */
?>

<div id="bbpress-forums">

	<?php if ( is_user_logged_in() && current_user_can( 'edit_topic', bbp_get_topic_id() ) ) : ?>

        <div id="split-topic-<?php bbp_topic_id(); ?>" class="bbp-topic-split">

            <form id="split_topic" name="split_topic" method="post" action="<?php the_permalink(); ?>">

                <h3 class="mb-3"><?php printf( __( 'Split topic "%s"', 'evolve' ), bbp_get_topic_title() ); ?></h3>

                <p class="alert alert-warning"
                   role="alert"><?php esc_html_e( 'When you split a topic, you are slicing it in half starting with the reply you just selected. Choose to use that reply as a new topic with a new title, or merge those replies into an existing topic.', 'evolve' ); ?></p>

                <p class="alert alert-warning"
                   role="alert"><?php esc_html_e( 'If you use the existing topic option, replies within both topics will be merged chronologically. The order of the merged replies is based on the time and date they were posted.', 'evolve' ); ?></p>

                <h3 class="mb-3"><?php esc_html_e( 'Split method', 'evolve' ); ?></h3>

                <p class="custom-control custom-radio">
                    <input class="custom-control-input" name="bbp_topic_split_option" id="bbp_topic_split_option_reply"
                           type="radio"
                           checked="checked" value="reply" tabindex="<?php bbp_tab_index(); ?>"/>
                    <label class="custom-control-label"
                           for="bbp_topic_split_option_reply"><?php printf( __( 'New topic in <strong>%s</strong> titled:', 'evolve' ), bbp_get_forum_title( bbp_get_topic_forum_id( bbp_get_topic_id() ) ) ); ?></label>
                </p>
                <p>
                    <input class="form-control" type="text" id="bbp_topic_split_destination_title"
                           value="<?php printf( __( 'Split: %s', 'evolve' ), bbp_get_topic_title() ); ?>"
                           tabindex="<?php bbp_tab_index(); ?>" size="35"
                           name="bbp_topic_split_destination_title"/>
                </p>

				<?php if ( bbp_has_topics( array(
					'show_stickies' => false,
					'post_parent'   => bbp_get_topic_forum_id( bbp_get_topic_id() ),
					'post__not_in'  => array( bbp_get_topic_id() )
				) ) ) : ?>

                    <p class="custom-control custom-radio">
                        <input class="custom-control-input" name="bbp_topic_split_option"
                               id="bbp_topic_split_option_existing"
                               type="radio" value="existing" tabindex="<?php bbp_tab_index(); ?>"/>
                        <label class="custom-control-label"
                               for="bbp_topic_split_option_existing"><?php esc_html_e( 'Use an existing topic in this forum:', 'evolve' ); ?></label>
                    </p>

                    <p>
						<?php
						bbp_dropdown( array(
							'post_type'   => bbp_get_topic_post_type(),
							'post_parent' => bbp_get_topic_forum_id( bbp_get_topic_id() ),
							'selected'    => - 1,
							'exclude'     => bbp_get_topic_id(),
							'select_id'   => 'bbp_destination_topic',
							'none_found'  => __( 'No other topics found!', 'evolve' )
						) ); ?>
                    </p>

				<?php endif; ?>

                <h3 class="mb-3"><?php esc_html_e( 'Topic extras', 'evolve' ); ?></h3>

				<?php if ( bbp_is_subscriptions_active() ) : ?>

                    <p class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="bbp_topic_subscribers" id="bbp_topic_subscribers"
                               type="checkbox"
                               value="1" checked="checked" tabindex="<?php bbp_tab_index(); ?>"/>
                        <label class="custom-control-label"
                               for="bbp_topic_subscribers"><?php esc_html_e( 'Copy subscribers to the new topic', 'evolve' ); ?></label>
                    </p>

				<?php endif; ?>

                <p class="custom-control custom-checkbox">
                    <input class="custom-control-input" name="bbp_topic_favoriters" id="bbp_topic_favoriters"
                           type="checkbox" value="1"
                           checked="checked" tabindex="<?php bbp_tab_index(); ?>"/>
                    <label class="custom-control-label"
                           for="bbp_topic_favoriters"><?php esc_html_e( 'Copy favoriters to the new topic', 'evolve' ); ?></label>
                </p>

				<?php if ( bbp_allow_topic_tags() ) : ?>

                    <p class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="bbp_topic_tags" id="bbp_topic_tags" type="checkbox"
                               value="1"
                               checked="checked" tabindex="<?php bbp_tab_index(); ?>"/>
                        <label class="custom-control-label"
                               for="bbp_topic_tags"><?php esc_html_e( 'Copy topic tags to the new topic', 'evolve' ); ?></label>
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

				<?php bbp_split_topic_form_fields(); ?>

            </form>
        </div>

	<?php else : ?>

        <p class="alert alert-danger" role="alert">
			<?php is_user_logged_in() ? esc_html_e( 'You do not have the permissions to edit this topic!', 'evolve' ) : esc_html_e( 'You cannot edit this topic', 'evolve' ); ?>
        </p>

	<?php endif; ?>

</div>
