<?php
/**
 * Moral welcome page
 *
 * @package Moral
 */
add_action( 'admin_menu', 'reblog_welcome_menu' );

/**
 * Add admin submenu
 */
function reblog_welcome_menu() {
	add_theme_page( esc_html__( 'Reblog Options', 'reblog' ), esc_html__( 'About Reblog', 'reblog' ), 'manage_options', 'reblog-welcome', 'reblog_welcome_display' );
}

/**
 * Welcome column loop
 * @param  array  $args [description]
 * @return string  Columns HTML
 */
function reblog_get_welcome_columns( $args = array() ) {
	foreach ( $args as $key => $value ) { 
		$target = '';
		if ( $value['new_tab'] ) {
			$target = "_blank";
		}
		?>
		<div class="column">
			<h2 class="reblog-postbox-title <?php echo esc_attr( $key ); ?>"><span class="dashicons dashicons-<?php echo esc_attr( $value['icon'] );?>"></span><?php echo esc_html( $value['title'] ); ?></h2>
			<div class="reblog-postbox-content">
				<p><?php echo esc_html( $value['desc'] ); ?></p>
				<a target="<?php echo esc_attr( $target ); ?>" class="button button-primary button-hero load-customize hide-if-no-customize" href="<?php echo esc_url( $value['url'] ); ?>"><?php echo esc_html( $value['btn_txt'] ); ?></a>
			</div><!-- .reblog-box-content-->
		</div><!-- .column -->
	<?php
	}
}

/**
 * Display admin welcome page.
 */
function reblog_welcome_display() {
	if ( ! current_user_can( 'manage_options' ) )  {
		wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'reblog' ) );
	}

	$theme_data = wp_get_theme();
	?>
	<div id="reblog-themes-wrapper">
		<div id="reblog-header-content">
			<h1><?php echo esc_html( $theme_data->get( 'Name' ) ) . esc_html__( '-', 'reblog' ) . esc_html( $theme_data->get( 'Version' ) ); ?></h1>
			<p><?php echo esc_html( $theme_data->get( 'Description' ) ); ?></p>
		</div><!-- #reblog-header-content -->
		
		<div id="reblog-postbox-container">
			<?php 
			$args = array(
				'live-demo' => array(
					'title' => esc_html__( 'View Demo', 'reblog' ),
					'desc'	=> esc_html__( 'Woohoo!!! Reblog has been installed. Now want to have a peek at how Reblog theme would look as set up by the author. Mind that the setup is one of the many usage of the theme, you can create a different setup of the same theme. Just click the button below.', 'reblog' ),
					'url' => 'https://demo.moralthemes.com/reblog/',
					'new_tab' => true,
					'icon' => 'external',
					'btn_txt' => esc_html__( 'View Demo', 'reblog' )
				),
				'demo-importer' => array(
					'title' => esc_html__( 'One Click Demo Import', 'reblog' ),
					'desc'	=> esc_html__( 'Liked the demo and want to setup just like the demo? Just import the content and start editing  the content right away. One Click Demo Importer should be installed before the importer works. You are just a click away.', 'reblog' ),
					'url' =>  menu_page_url( 'pt-one-click-demo-import', false ),
					'new_tab' => false,
					'icon' => 'upload',
					'btn_txt' => esc_html__( 'Import Demo Content', 'reblog' )
				),
				'documentation' => array(
					'title' => esc_html__( 'Documentation', 'reblog' ),
					'desc'	=> esc_html__( 'Still getting confused after import? Or wanna start without the demo content. Do not worry!!! Reblog Themes provide a detailed documentation about the theme, its setup and other extra tips and tricks.', 'reblog' ),
					'icon' => 'list-view',
					'url' => 'https://themepalace.com/instructions/themes/reblog',
					'new_tab' => true,
					'btn_txt' => esc_html__( 'View Documentation', 'reblog' )
				),
				'support' => array(
					'title' => esc_html__( 'Support', 'reblog' ),
					'desc'	=> esc_html__( 'Need any help regarding the theme? Got stuck somewhere? Reblog theme support is just a click away. Search our incredible and 24/7 support forum. Query your questions and your solution will be resolved by our strong and dedicated support teams.', 'reblog' ),
					'url' => 'https://themepalace.com/forum/reblog-pro/reblog/',
					'new_tab' => true,
					'icon' => 'admin-users',
					'btn_txt' => esc_html__( 'Support Forum', 'reblog' )
				),
			);

			if ( ! class_exists( 'OCDI_Plugin' ) ) {
				$args['demo-importer']['url'] = menu_page_url( 'tgmpa-install-plugins', false );
				$args['demo-importer']['btn_txt'] = esc_html__( 'Install One Click Demo Import', 'reblog' );
			}

			reblog_get_welcome_columns( $args ); ?>

		</div><!-- .postbox-container -->
	</div><!-- .wrap -->
<?php
}