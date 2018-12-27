<?php
/**
 * New/Edit Topic
 *
 * @package bbPress
 * @subpackage Theme
 */
if ( ! bbp_is_single_forum() ) : ?>

    <div id="bbpress-forums">

<?php endif;

if ( bbp_current_user_can_access_create_topic_form() ) : ?>

    <div id="new-topic-<?php bbp_topic_id(); ?>" class="bbp-topic-form">

	<?php do_action( 'bbp_theme_before_topic_form' ); ?>

    <h3 id="reply-title" class="mb-3">

		<?php if ( bbp_is_topic_edit() ) {
			printf( __( 'Now editing %s', 'evolve' ), bbp_get_topic_title() );
		} else {
			bbp_is_single_forum() ? printf( __( 'Create new topic in %s', 'evolve' ), bbp_get_forum_title() ) : esc_html_e( 'Create new topic', 'evolve' );
		} ?>

    </h3>

    <form id="new-post" name="new-post" method="post" action="<?php the_permalink(); ?>">

		<?php do_action( 'bbp_theme_before_topic_form_notices' );

		if ( ! bbp_is_topic_edit() && bbp_is_forum_closed() ) : ?>

            <p class="alert alert-warning" role="alert">

				<?php _e( 'This forum is marked as closed to new topics, however your posting capabilities still allow you to do so', 'evolve' ); ?>

            </p>

		<?php endif;

		do_action( 'bbp_template_notices' );

		bbp_get_template_part( 'form', 'anonymous' );

		do_action( 'bbp_theme_before_topic_form_title' ); ?>

        <p>
            <label for="bbp_topic_title">

				<?php printf( __( 'Topic title (maximum length: %d)', 'evolve' ), bbp_get_title_max_length() ); ?>

            </label>
            <input class="form-control" type="text" id="bbp_topic_title" value="<?php bbp_form_topic_title(); ?>"
                   tabindex="<?php bbp_tab_index(); ?>" size="40" name="bbp_topic_title"
                   maxlength="<?php bbp_title_max_length(); ?>"/>
        </p>

		<?php do_action( 'bbp_theme_after_topic_form_title' );

		do_action( 'bbp_theme_before_topic_form_content' );

		bbp_the_content( array(
			'context'       => 'topic',
			'editor_class'  => 'form-control',
			'before'        => '<p>',
			'after'         => '</p>',
			'textarea_rows' => '8',
		) );

		do_action( 'bbp_theme_after_topic_form_content' );

		if ( ! ( bbp_use_wp_editor() || current_user_can( 'unfiltered_html' ) ) ) : ?>

            <p>
                <label>

					<?php _e( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:', 'evolve' ); ?>

                </label>
                <code class="my-0">

					<?php bbp_allowed_tags(); ?>

                </code>
            </p>

		<?php endif;

		if ( current_user_can( 'unfiltered_html' ) ) : ?>

            <p class="alert alert-warning" role="alert">
				<?php _e( 'Your account has the ability to post unrestricted HTML content', 'evolve' ); ?>
            </p>

		<?php endif;

		if ( bbp_allow_topic_tags() && current_user_can( 'assign_topic_tags' ) ) :

			do_action( 'bbp_theme_before_topic_form_tags' ); ?>

            <p>
                <label for="bbp_topic_tags">

					<?php esc_html_e( 'Tags', 'evolve' ); ?>

                </label>
                <input class="form-control" type="text" value="<?php bbp_form_topic_tags(); ?>"
                       tabindex="<?php bbp_tab_index(); ?>"
                       size="40" name="bbp_topic_tags"
                       id="bbp_topic_tags" <?php disabled( bbp_is_topic_spam() ); ?> />
            </p>

			<?php do_action( 'bbp_theme_after_topic_form_tags' );

		endif;

		echo '<div class="row">';

		if ( ! bbp_is_single_forum() ) :

			do_action( 'bbp_theme_before_topic_form_forum' ); ?>

            <div class="col-lg-4 mb-3">
                <label for="bbp_forum_id">

					<?php esc_html_e( 'Forum', 'evolve' ); ?>

                </label>

				<?php bbp_dropdown( array(
					'show_none' => __( 'No forum', 'evolve' ),
					'selected'  => bbp_get_form_topic_forum(),
				) ); ?>

            </div>

			<?php do_action( 'bbp_theme_after_topic_form_forum' );

		endif;

		if ( current_user_can( 'moderate' ) ) :

			do_action( 'bbp_theme_before_topic_form_type' ); ?>

            <div class="col-lg-4 mb-3">
                <label for="bbp_stick_topic">

					<?php esc_html_e( 'Topic type', 'evolve' ); ?>

                </label>

				<?php bbp_form_topic_type_dropdown(); ?>

            </div>

			<?php do_action( 'bbp_theme_after_topic_form_type' );

			do_action( 'bbp_theme_before_topic_form_status' ); ?>

            <div class="col-lg-4 mb-3">
                <label for="bbp_topic_status">

					<?php esc_html_e( 'Topic status', 'evolve' ); ?>

                </label>

				<?php bbp_form_topic_status_dropdown(); ?>

            </div>

			<?php do_action( 'bbp_theme_after_topic_form_status' );

		endif;

		echo '</div>';

		if ( bbp_allow_revisions() && bbp_is_topic_edit() ) :

			do_action( 'bbp_theme_before_topic_form_revisions' ); ?>

            <p class="notify custom-control custom-checkbox">
                <input class="custom-control-input" name="bbp_log_topic_edit" id="bbp_log_topic_edit"
                       type="checkbox"
                       value="1" <?php bbp_form_topic_log_edit(); ?> tabindex="<?php bbp_tab_index(); ?>"/>
                <label class="custom-control-label" for="bbp_log_topic_edit">

					<?php esc_html_e( 'Keep a log of this edit', 'evolve' ); ?>

                </label>
            </p>
            <p>
                <label for="bbp_topic_edit_reason">

					<?php printf( __( 'Optional reason for editing', 'evolve' ), bbp_get_current_user_name() ); ?>

                </label>
                <input type="text" value="<?php bbp_form_topic_edit_reason(); ?>"
                       tabindex="<?php bbp_tab_index(); ?>" size="40" name="bbp_topic_edit_reason"
                       id="bbp_topic_edit_reason"/>
            </p>

			<?php do_action( 'bbp_theme_after_topic_form_revisions' );

		endif; ?>

		<?php if ( bbp_is_subscriptions_active() && ! bbp_is_anonymous() && ( ! bbp_is_topic_edit() || ( bbp_is_topic_edit() && ! bbp_is_topic_anonymous() ) ) ) :

			do_action( 'bbp_theme_before_topic_form_subscriptions' ); ?>

            <p class="notify custom-control custom-checkbox">
                <input class="custom-control-input" name="bbp_topic_subscription" id="bbp_topic_subscription"
                       type="checkbox"
                       value="bbp_subscribe" <?php bbp_form_topic_subscribed(); ?>
                       tabindex="<?php bbp_tab_index(); ?>"/>

				<?php if ( bbp_is_topic_edit() && ( bbp_get_topic_author_id() !== bbp_get_current_user_id() ) ) : ?>

                    <label class="custom-control-label" for="bbp_topic_subscription">

						<?php esc_html_e( 'Notify the author of follow-up replies via email', 'evolve' ); ?>

                    </label>

				<?php else : ?>

                    <label class="custom-control-label" for="bbp_topic_subscription">

						<?php esc_html_e( 'Notify me of follow-up replies via email', 'evolve' ); ?>

                    </label>

				<?php endif; ?>

            </p>

			<?php do_action( 'bbp_theme_after_topic_form_subscriptions' );

		endif;

		do_action( 'bbp_theme_before_topic_form_submit_wrapper' );

		do_action( 'bbp_theme_before_topic_form_submit_button' ); ?>

        <p>
            <button type="submit" tabindex="<?php bbp_tab_index(); ?>" id="bbp_topic_submit" name="bbp_topic_submit"
                    class="btn">

				<?php esc_html_e( 'Submit', 'evolve' ); ?>

            </button>
        </p>

		<?php do_action( 'bbp_theme_after_topic_form_submit_button' );

		do_action( 'bbp_theme_after_topic_form_submit_wrapper' );

		bbp_topic_form_fields();

		do_action( 'bbp_theme_after_topic_form' ); ?>

    </form>

<?php elseif ( bbp_is_forum_closed() ) : ?>

    <div id="no-topic-<?php bbp_topic_id(); ?>" class="bbp-no-topic">
        <div class="bbp-template-notice">
				<?php printf( __( 'The forum %s is closed to new topics and replies', 'evolve' ), bbp_get_forum_title() ); ?>
        </div>
    </div>

<?php else : ?>

    <div id="no-topic-<?php bbp_topic_id(); ?>" class="bbp-no-topic">
        <div class="bbp-template-notice">
				<?php is_user_logged_in() ? esc_html_e( 'You cannot create new topics', 'evolve' ) : esc_html_e( 'You must be logged in to create new topics', 'evolve' ); ?>
        </div>
    </div>

<?php endif; ?>

    </div><!-- .bbp-topic-form -->

<?php if ( ! bbp_is_single_forum() ) : ?>

    </div><!-- #bbpress-forums -->

<?php endif;
