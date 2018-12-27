<?php

/**
 * User Registration Form
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<form method="post" action="<?php bbp_wp_login_action( array( 'context' => 'login_post' ) ); ?>" class="bbp-login-form">
    <h3 class="mb-3"><?php _e( 'Create an account', 'evolve' ); ?></h3>

    <div class="bbp-template-notice">
        <p><?php _e( 'Your username must be unique, and cannot be changed later.', 'evolve' ) ?></p>
        <p><?php _e( 'We use your email address to email you a secure password and verify your account.', 'evolve' ) ?></p>
    </div>

    <p>
        <label for="user_login"><?php _e( 'Username', 'evolve' ); ?>: </label>
        <input class="form-control" type="text" name="user_login" value="<?php bbp_sanitize_val( 'user_login' ); ?>"
               size="20"
               id="user_login" tabindex="<?php bbp_tab_index(); ?>"/>
    </p>

    <p>
        <label for="user_email"><?php _e( 'Email', 'evolve' ); ?>: </label>
        <input class="form-control" type="text" name="user_email" value="<?php bbp_sanitize_val( 'user_email' ); ?>"
               size="20"
               id="user_email" tabindex="<?php bbp_tab_index(); ?>"/>
    </p>

	<?php do_action( 'register_form' ); ?>

    <p>
        <button type="submit" tabindex="<?php bbp_tab_index(); ?>" name="user-submit"
                class="button submit user-submit"><?php _e( 'Register', 'evolve' ); ?></button>

		<?php bbp_user_register_fields(); ?>
    </p>
</form>
