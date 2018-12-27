<?php

/**
 * Anonymous User
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<?php if ( bbp_current_user_can_access_anonymous_user_form() ) : ?>

	<?php do_action( 'bbp_theme_before_anonymous_form' ); ?>

	<?php do_action( 'bbp_theme_anonymous_form_extras_top' ); ?>

    <p>
		<?php _e( 'Your email address will not be published. Required fields are marked *', 'evolve' ) ?>
    </p>

    <p>
        <label for="bbp_anonymous_author"><?php _e( 'Name*', 'evolve' ); ?></label>
        <input class="form-control" type="text" id="bbp_anonymous_author" value="<?php bbp_author_display_name(); ?>"
               tabindex="<?php bbp_tab_index(); ?>" size="40" name="bbp_anonymous_name"/>
    </p>

    <p>
        <label for="bbp_anonymous_email"><?php _e( 'Email*', 'evolve' ); ?></label>
        <input class="form-control" type="text" id="bbp_anonymous_email" value="<?php bbp_author_email(); ?>"
               tabindex="<?php bbp_tab_index(); ?>" size="40" name="bbp_anonymous_email"/>
    </p>

    <p>
        <label for="bbp_anonymous_website"><?php _e( 'Website', 'evolve' ); ?></label>
        <input class="form-control" type="text" id="bbp_anonymous_website" value="<?php bbp_author_url(); ?>"
               tabindex="<?php bbp_tab_index(); ?>" size="40" name="bbp_anonymous_website"/>
    </p>

	<?php do_action( 'bbp_theme_anonymous_form_extras_bottom' ); ?>

	<?php do_action( 'bbp_theme_after_anonymous_form' ); ?>

<?php endif; ?>
