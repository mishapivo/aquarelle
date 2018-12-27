<?php

if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) {
  wp_redirect( 'themes.php?page=wpsierra' );
}

function wpsierra_user_notice() {
  $wpsierra_installer = TGM_Plugin_Activation::get_instance();
  if ( $wpsierra_installer->is_tgmpa_complete() ) {
    ?>
    <div class="notice notice-success is-dismissible">
      <p>
        <?php esc_html_e( 'The theme has been updated, excellent!', 'wp-sierra' ); ?>
        <a href="<?php echo esc_url( admin_url( 'themes.php?page=pt-one-click-demo-import' ) ); ?>"><?php esc_html_e( 'Demos', 'wp-sierra' ); ?></a>
      </p>
    </div>
    <?php
  }
}
//add_action( 'admin_notices', 'wpsierra_user_notice' );


// Update CSS within in Admin
function wpsierra_admin_style() {
  wp_enqueue_style('wpsierra-admin-styles', get_template_directory_uri().'/admin/css/wpsierra-admin.css');
}
add_action('admin_enqueue_scripts', 'wpsierra_admin_style');


add_action('admin_menu', 'wpsierra_welcome_page');


// WP Sierra welcome page register
function wpsierra_welcome_page() {
    add_theme_page('WP Sierra', 'WP Sierra', 'manage_options', 'wpsierra', 'wpsierra_settings_page');
}

function wpsierra_settings_page(){
	global $wpsierra_active_tab;
	$wpsierra_active_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : 'welcome'; ?>
  <div class="wpsierra-admin wrap">
    <h1>
    <?php
    $wpsierra_theme = wp_get_theme();
    echo $wpsierra_theme->get( 'Name' ) . "  v." . $wpsierra_theme->get( 'Version' );
    ?>
    </h1>
  	<h2 class="nav-tab-wrapper">
      <a class="nav-tab <?php echo $wpsierra_active_tab == 'welcome' || '' ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url( admin_url( 'themes.php?page=wpsierra&tab=welcome' ) ); ?>"><?php esc_html_e( 'Welcome', 'wp-sierra' ); ?></a>
  	</h2>
  	<?php	do_action( 'wpsierra_settings_content' ); ?>
  </div><!-- /.wrap -->
  <?php
}


add_action( 'wpsierra_settings_content', 'wpsierra_welcome_render_options_page' );

function wpsierra_welcome_render_options_page() {
	global $wpsierra_active_tab;
	if ( '' || 'welcome' != $wpsierra_active_tab )
		return;
	?>
  <div class="wp-pointer-content">
	<h2 class="wpsierra-admin-h2"><?php esc_html_e( 'Thank You for installing WP Sierra Theme!', 'wp-sierra' ); ?></h2>
  <h3><?php esc_html_e( 'There are just few steps to unlock full potential of WP Sierra', 'wp-sierra' ); ?></h3>

    <p><?php esc_html_e( 'Simply complete the steps listed below (it only takes a minute or two 🙂) and you will be able to enjoy all functionalities of WP Sierra Theme.', 'wp-sierra' ); ?></p>
    <p><?php esc_html_e( 'So without a further ado let\'s begin! 🧐', 'wp-sierra' ); ?></p>

    <h4><?php esc_html_e( 'Install and Activate all recommended plugins to unlock WP Sierra custom features', 'wp-sierra' ); ?></h4>
    <?php
    $wpsierra_installer = TGM_Plugin_Activation::get_instance();
    if ( ! $wpsierra_installer->is_tgmpa_complete() ) {
    ?>
    <p><a href="<?php echo esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Install and Activate Plugins Now', 'wp-sierra' ); ?></a><p>
    <?php
    } else {
      ?>
      <p><span class="dashicons dashicons-yes"></span><?php esc_html_e( 'Success: All plugins are installed and activated', 'wp-sierra' ); ?></a><p>
      <?php
    }
    ?>

    <p><?php echo wp_kses_post( '<strong>IMPORTANT:</strong> you need to install all recommended plugins to be able to use all WP Sierra theme custom features.', 'wp-sierra' ); ?></p>
    <p><?php echo wp_kses_post( '<strong>Need help?</strong> Check detailed activation instructions in WP Sierra documentation <a href="' . esc_url( 'https://wpsierra.com/docs/' ) . '" target="_blank">click here.</a>', 'wp-sierra' ); ?></p>

    <h4><?php esc_html_e( 'Go to Wordpress Customizer to tweak many WP Sierra theme options and customize it just how you like!', 'wp-sierra' ); ?></h4>
    <p><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Go To Customizer' , 'wp-sierra' ); ?></a><p>


    <h4><?php esc_html_e( 'Import one of the predesigned Demo sites', 'wp-sierra' ); ?></h4>
    <?php
    if ( ! $wpsierra_installer->is_tgmpa_complete() ) {
    ?>
    <p><a href="#" class="button"><?php esc_html_e( 'Go to WP Sierra Demo Importer', 'wp-sierra' ); ?></a><p>
    <?php
    } else {
    ?>
    <p><a href="<?php echo esc_url( admin_url( 'themes.php?page=pt-one-click-demo-import' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Go to WP Sierra Demo Importer', 'wp-sierra' ); ?></a><p>
    <?php
    }
    ?>

    <h4><?php esc_html_e( 'Need help with WP Sierra Theme?', 'wp-sierra' ); ?></h4>
    <p><a href="<?php echo esc_url( 'https://themesty.freshdesk.com/support/tickets/new' ); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Send us a message' , 'wp-sierra' ); ?></a><p>

</div>

	<?php
}
