<?php
/**
 * Builds our admin page.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'mohini_create_menu' ) ) {
	add_action( 'admin_menu', 'mohini_create_menu' );
	/**
	 * Adds our "Mohini" dashboard menu item
	 *
	 */
	function mohini_create_menu() {
		$mohini_page = add_theme_page( 'Mohini', 'Mohini', apply_filters( 'mohini_dashboard_page_capability', 'edit_theme_options' ), 'mohini-options', 'mohini_settings_page' );
		add_action( "admin_print_styles-$mohini_page", 'mohini_options_styles' );
	}
}

if ( ! function_exists( 'mohini_options_styles' ) ) {
	/**
	 * Adds any necessary scripts to the Mohini dashboard page
	 *
	 */
	function mohini_options_styles() {
		wp_enqueue_style( 'mohini-options', get_template_directory_uri() . '/css/admin/admin-style.css', array(), MOHINI_VERSION );
	}
}

if ( ! function_exists( 'mohini_settings_page' ) ) {
	/**
	 * Builds the content of our Mohini dashboard page
	 *
	 */
	function mohini_settings_page() {
		?>
		<div class="wrap">
			<div class="metabox-holder">
				<div class="mohini-masthead clearfix">
					<div class="mohini-container">
						<div class="mohini-title">
							<a href="<?php echo esc_url(MOHINI_THEME_URL); ?>" target="_blank"><?php esc_html_e( 'Mohini', 'mohini' ); ?></a> <span class="mohini-version"><?php echo MOHINI_VERSION; ?></span>
						</div>
						<div class="mohini-masthead-links">
							<?php if ( ! defined( 'MOHINI_PREMIUM_VERSION' ) ) : ?>
								<a class="mohini-masthead-links-bold" href="<?php echo esc_url(MOHINI_THEME_URL); ?>" target="_blank"><?php esc_html_e( 'Premium', 'mohini' );?></a>
							<?php endif; ?>
							<a href="<?php echo esc_url(MOHINI_WPKOI_AUTHOR_URL); ?>" target="_blank"><?php esc_html_e( 'WPKoi', 'mohini' ); ?></a>
                            <a href="<?php echo esc_url(MOHINI_DOCUMENTATION); ?>" target="_blank"><?php esc_html_e( 'Documentation', 'mohini' ); ?></a>
						</div>
					</div>
				</div>

				<?php
				/**
				 * mohini_dashboard_after_header hook.
				 *
				 */
				 do_action( 'mohini_dashboard_after_header' );
				 ?>

				<div class="mohini-container">
					<div class="postbox-container clearfix" style="float: none;">
						<div class="grid-container grid-parent">

							<?php
							/**
							 * mohini_dashboard_inside_container hook.
							 *
							 */
							 do_action( 'mohini_dashboard_inside_container' );
							 ?>

							<div class="form-metabox grid-70" style="padding-left: 0;">
								<h2 style="height:0;margin:0;"><!-- admin notices below this element --></h2>
								<form method="post" action="options.php">
									<?php settings_fields( 'mohini-settings-group' ); ?>
									<?php do_settings_sections( 'mohini-settings-group' ); ?>
									<div class="customize-button hide-on-desktop">
										<?php
										printf( '<a id="mohini_customize_button" class="button button-primary" href="%1$s">%2$s</a>',
											esc_url( admin_url( 'customize.php' ) ),
											esc_html__( 'Customize', 'mohini' )
										);
										?>
									</div>

									<?php
									/**
									 * mohini_inside_options_form hook.
									 *
									 */
									 do_action( 'mohini_inside_options_form' );
									 ?>
								</form>

								<?php
								$modules = array(
									'Backgrounds' => array(
											'url' => MOHINI_THEME_URL,
									),
									'Blog' => array(
											'url' => MOHINI_THEME_URL,
									),
									'Colors' => array(
											'url' => MOHINI_THEME_URL,
									),
									'Copyright' => array(
											'url' => MOHINI_THEME_URL,
									),
									'Disable Elements' => array(
											'url' => MOHINI_THEME_URL,
									),
									'Demo Import' => array(
											'url' => MOHINI_THEME_URL,
									),
									'Hooks' => array(
											'url' => MOHINI_THEME_URL,
									),
									'Import / Export' => array(
											'url' => MOHINI_THEME_URL,
									),
									'Menu Plus' => array(
											'url' => MOHINI_THEME_URL,
									),
									'Page Header' => array(
											'url' => MOHINI_THEME_URL,
									),
									'Secondary Nav' => array(
											'url' => MOHINI_THEME_URL,
									),
									'Spacing' => array(
											'url' => MOHINI_THEME_URL,
									),
									'Typography' => array(
											'url' => MOHINI_THEME_URL,
									),
									'Elementor Addon' => array(
											'url' => MOHINI_THEME_URL,
									)
								);

								if ( ! defined( 'MOHINI_PREMIUM_VERSION' ) ) : ?>
									<div class="postbox mohini-metabox">
										<h3 class="hndle"><?php esc_html_e( 'Premium Modules', 'mohini' ); ?></h3>
										<div class="inside" style="margin:0;padding:0;">
											<div class="premium-addons">
												<?php foreach( $modules as $module => $info ) { ?>
												<div class="add-on activated mohini-clear addon-container grid-parent">
													<div class="addon-name column-addon-name" style="">
														<a href="<?php echo esc_url( $info[ 'url' ] ); ?>" target="_blank"><?php echo esc_html( $module ); ?></a>
													</div>
													<div class="addon-action addon-addon-action" style="text-align:right;">
														<a href="<?php echo esc_url( $info[ 'url' ] ); ?>" target="_blank"><?php esc_html_e( 'More info', 'mohini' ); ?></a>
													</div>
												</div>
												<div class="mohini-clear"></div>
												<?php } ?>
											</div>
										</div>
									</div>
								<?php
								endif;

								/**
								 * mohini_options_items hook.
								 *
								 */
								do_action( 'mohini_options_items' );
								?>
							</div>

							<div class="mohini-right-sidebar grid-30" style="padding-right: 0;">
								<div class="customize-button hide-on-mobile">
									<?php
									printf( '<a id="mohini_customize_button" class="button button-primary" href="%1$s">%2$s</a>',
										esc_url( admin_url( 'customize.php' ) ),
										esc_html__( 'Customize', 'mohini' )
									);
									?>
								</div>

								<?php
								/**
								 * mohini_admin_right_panel hook.
								 *
								 */
								 do_action( 'mohini_admin_right_panel' );

								  ?>
                                
                                <div class="wpkoi-doc">
                                	<h3><?php esc_html_e( 'Mohini documentation', 'mohini' ); ?></h3>
                                	<p><?php esc_html_e( 'If You`ve stuck, the documentation may help on WPKoi.com', 'mohini' ); ?></p>
                                    <a href="<?php echo esc_url(MOHINI_DOCUMENTATION); ?>" class="wpkoi-admin-button" target="_blank"><?php esc_html_e( 'Mohini documentation', 'mohini' ); ?></a>
                                </div>
                                
                                <div class="wpkoi-social">
                                	<h3><?php esc_html_e( 'WPKoi on Facebook', 'mohini' ); ?></h3>
                                	<p><?php esc_html_e( 'If You want to get useful info about WordPress and the theme, follow WPKoi on Facebook.', 'mohini' ); ?></p>
                                    <a href="<?php echo esc_url(MOHINI_WPKOI_SOCIAL_URL); ?>" class="wpkoi-admin-button" target="_blank"><?php esc_html_e( 'Go to Facebook', 'mohini' ); ?></a>
                                </div>
                                
                                <div class="wpkoi-review">
                                	<h3><?php esc_html_e( 'Help with You review', 'mohini' ); ?></h3>
                                	<p><?php esc_html_e( 'If You like Mohini theme, show it to the world with Your review. Your feedback helps a lot.', 'mohini' ); ?></p>
                                    <a href="<?php echo esc_url(MOHINI_WORDPRESS_REVIEW); ?>" class="wpkoi-admin-button" target="_blank"><?php esc_html_e( 'Add my review', 'mohini' ); ?></a>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'mohini_admin_errors' ) ) {
	add_action( 'admin_notices', 'mohini_admin_errors' );
	/**
	 * Add our admin notices
	 *
	 */
	function mohini_admin_errors() {
		$screen = get_current_screen();

		if ( 'appearance_page_mohini-options' !== $screen->base ) {
			return;
		}

		if ( isset( $_GET['settings-updated'] ) && 'true' == $_GET['settings-updated'] ) {
			 add_settings_error( 'mohini-notices', 'true', esc_html__( 'Settings saved.', 'mohini' ), 'updated' );
		}

		if ( isset( $_GET['status'] ) && 'imported' == $_GET['status'] ) {
			 add_settings_error( 'mohini-notices', 'imported', esc_html__( 'Import successful.', 'mohini' ), 'updated' );
		}

		if ( isset( $_GET['status'] ) && 'reset' == $_GET['status'] ) {
			 add_settings_error( 'mohini-notices', 'reset', esc_html__( 'Settings removed.', 'mohini' ), 'updated' );
		}

		settings_errors( 'mohini-notices' );
	}
}
