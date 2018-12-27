<?php
/**
 * Admin functions.
 *
 * @package Indrajeet
 */

add_action( 'admin_menu', 'indrajeet_admin_menu_page' );

/**
 * Register admin page.
 *
 * @since 1.0.0
 */
function indrajeet_admin_menu_page() {

	$theme = wp_get_theme( get_template() );

	add_theme_page(
		$theme->display( 'Name' ) . __( ' Help', 'indrajeet' ),
		$theme->display( 'Name' ) . __( ' Help', 'indrajeet' ),
		'manage_options',
		'indrajeet',
		'indrajeet_do_admin_page'
	);

}

/**
 * Render admin page.
 *
 * @since 1.0.0
 */
function indrajeet_do_admin_page() {

		$theme = wp_get_theme( get_template() );
		?>
		<div class="wrap about-wrap">

			<h1><?php esc_html_e( 'Welcome to', 'indrajeet' ); ?> <?php echo $theme->display( 'Name' ); ?> - <?php esc_html_e( 'Version', 'indrajeet' ); ?>:&nbsp;<?php echo esc_html( $theme->display( 'Version' ) ); ?></h1>

		<div class="about-text">
			<?php
				$description_raw  = $theme->display( 'Description' );
				$main_description = explode( 'Official', $description_raw );
				echo wp_kses_post( make_clickable( $main_description[0] ) );
			?>
		</div>



		 <h2><?php _e('Indrajeet help', 'indrajeet'); ?></h2>

    <h3><?php _e('Menu', 'indrajeet'); ?></h3>
    <p><?php _e('To display menu correctly, please create at least 1 menu and set as primary and save.', 'indrajeet'); ?></p>

    <h3><?php _e('Bootstrap features', 'indrajeet'); ?></h3>
    <p><?php echo sprintf(__('This theme can use all Bootstrap 4 classes, elements and styles. Please read the %sBootstrap 4 document%s.', 'indrajeet'), '<a href="https://getbootstrap.com/docs/4.0" target="bootstrap4_doc">', '</a>'); ?></p>
    
    <h3><?php _e('Font Awesome features', 'indrajeet'); ?></h3>
    <p><?php echo sprintf(__('This theme comes with Font Awesome 4, please read the %sFont Awesome document%s for icon classes and features.', 'indrajeet'), '<a href="https://fontawesome.com/" target="fontawesome4_doc">', '</a>'); ?></p>

    <h3><?php _e('Indrajeet Change log', 'indrajeet'); ?></h3>
    <p><?php echo sprintf(__('You can see what was changed in each version or each commits on our %sGithub page%s.'), '<a href="https://github.com/sushilldhakal/indrajeet" target="bb4_commits">', '</a>'); ?></p>

    <p style="margin-top: 20px;">
        <span style="font-size: 1.2rem;"><?php _e('&#128147;', 'indrajeet'); ?></span> 
        <?php echo sprintf(__('If my theme can help you, your jobs, your projects please %sbuy me some foods%s.', 'indrajeet'), '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=LLV2UBSXHX328&lc=US&item_name=Indrajeet&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted">', '</a>'); ?>
    </p>
	

	</div>
	<?php

}
