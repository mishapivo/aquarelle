<?php

/**
 * User Login Form
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<form method="post" action="<?php bbp_wp_login_action( array( 'context' => 'login_post' ) ); ?>" class="bbp-login-form">
    <h3 class="mb-3"><?php _e( 'Log In', 'evolve' ); ?></h3>

    <p>
        <label for="user_login"><?php _e( 'Username', 'evolve' ); ?>:</label>
        <input class="form-control" type="text" name="log" value="<?php bbp_sanitize_val( 'user_login', 'text' ); ?>"
               size="20"
               id="user_login" tabindex="<?php bbp_tab_index(); ?>"/>
    </p>

    <p>
        <label for="user_pass"><?php _e( 'Password', 'evolve' ); ?>:</label>
        <input class="form-control" type="password" name="pwd"
               value="<?php bbp_sanitize_val( 'user_pass', 'password' ); ?>" size="20"
               id="user_pass" tabindex="<?php bbp_tab_index(); ?>"/>
    </p>

    <p class="custom-control custom-checkbox">
        <input class="custom-control-input" type="checkbox" name="rememberme"
               value="forever" <?php checked( bbp_get_sanitize_val( 'rememberme', 'checkbox' ) ); ?> id="rememberme"
               tabindex="<?php bbp_tab_index(); ?>"/>
        <label class="custom-control-label" for="rememberme"><?php _e( 'Keep me signed in', 'evolve' ); ?></label>
    </p>

	<?php do_action( 'login_form' ); ?>

    <p>
        <button type="submit" tabindex="<?php bbp_tab_index(); ?>" name="user-submit"
                class="button submit user-submit"><?php _e( 'Log In', 'evolve' ); ?></button>

		<?php bbp_user_login_fields(); ?>
    </p>
</form>
