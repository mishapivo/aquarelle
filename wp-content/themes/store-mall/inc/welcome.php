<?php
/**
 * Moral welcome page
 *
 * @package Moral
 */
add_action( 'admin_menu', 'store_mall_welcome_menu' );

/**
 * Add admin submenu
 */
function store_mall_welcome_menu() {
	add_theme_page( esc_html__( 'Store Mall Options', 'store-mall' ), esc_html__( 'About Store Mall', 'store-mall' ), 'manage_options', 'store-mall-welcome', 'store_mall_welcome_display' );
}

/**
 * Welcome column loop
 * @param  array  $args [description]
 * @return string  Columns HTML
 */
function store_mall_get_welcome_columns( $args = array() ) {
	foreach ( $args as $key => $value ) { 
		$target = '';
		if ( $value['new_tab'] ) {
			$target = "_blank";
		}
		?>
		<div class="column">
			<h2 class="store-mall-postbox-title <?php echo esc_attr( $key ); ?>"><span class="dashicons dashicons-<?php echo esc_attr( $value['icon'] );?>"></span><?php echo esc_html( $value['title'] ); ?></h2>
			<div class="store-mall-postbox-content">
				<p><?php echo esc_html( $value['desc'] ); ?></p>
				<a target="<?php echo esc_attr( $target ); ?>" class="button button-primary button-hero load-customize hide-if-no-customize" href="<?php echo esc_url( $value['url'] ); ?>"><?php echo esc_html( $value['btn_txt'] ); ?></a>
			</div><!-- .store-mall-box-content-->
		</div><!-- .column -->
	<?php
	}
}

/**
 * Display admin welcome page.
 */
function store_mall_welcome_display() {
	if ( ! current_user_can( 'manage_options' ) )  {
		wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'store-mall' ) );
	}

	$theme_data = wp_get_theme();
	?>
	<div id="store-mall-themes-wrapper">
		<div id="store-mall-header-content">
			<h1><?php echo esc_html( $theme_data->get( 'Name' ) ) . esc_html__( '-', 'store-mall' ) . esc_html( $theme_data->get( 'Version' ) ); ?></h1>
			<p><?php echo esc_html( $theme_data->get( 'Description' ) ); ?></p>
		</div><!-- #store-mall-header-content -->
		
		<div id="store-mall-postbox-container">
			<?php 
			$args = array(
				'live-demo' => array(
					'title' => esc_html__( 'View Demo', 'store-mall' ),
					'desc'	=> esc_html__( 'Woohoo!!! Store Mall has been installed. Now want to have a peek at how Store Mall theme would look as set up by the author. Mind that the setup is one of the many usage of the theme, you can create a different setup of the same theme. Just click the button below.', 'store-mall' ),
					'url' => 'https://demo.moralthemes.com/store-mall/',
					'new_tab' => true,
					'icon' => 'external',
					'btn_txt' => esc_html__( 'View Demo', 'store-mall' )
				),
				'demo-importer' => array(
					'title' => esc_html__( 'One Click Demo Import', 'store-mall' ),
					'desc'	=> esc_html__( 'Liked the demo and want to setup just like the demo? Just import the content and start editing  the content right away. One Click Demo Importer should be installed before the importer works. You are just a click away.', 'store-mall' ),
					'url' =>  menu_page_url( 'pt-one-click-demo-import', false ),
					'new_tab' => false,
					'icon' => 'upload',
					'btn_txt' => esc_html__( 'Import Demo Content', 'store-mall' )
				),
				'documentation' => array(
					'title' => esc_html__( 'Documentation', 'store-mall' ),
					'desc'	=> esc_html__( 'Still getting confused after import? Or wanna start without the demo content. Do not worry!!! Store Mall Themes provide a detailed documentation about the theme, its setup and other extra tips and tricks.', 'store-mall' ),
					'icon' => 'list-view',
					'url' => '',
					'new_tab' => true,
					'btn_txt' => esc_html__( 'View Documentation', 'store-mall' )
				),
				'support' => array(
					'title' => esc_html__( 'Support', 'store-mall' ),
					'desc'	=> esc_html__( 'Need any help regarding the theme? Got stuck somewhere? Store Mall theme support is just a click away. Search our incredible and 24/7 support forum. Query your questions and your solution will be resolved by our strong and dedicated support teams.', 'store-mall' ),
					'url' => '',
					'new_tab' => true,
					'icon' => 'admin-users',
					'btn_txt' => esc_html__( 'Support Forum', 'store-mall' )
				),
				'theme-features' => array(
					'title' => esc_html__( 'Theme Features', 'store-mall' ),
					'desc'	=> esc_html__( 'Store Mall theme comes with some incredible features. The elite feature of the theme is the user experience, code and security. Want to know more about the key features of the theme?', 'store-mall' ),
					'url' => '',
					'new_tab' => true,
					'icon' => 'tag',
					'btn_txt' => esc_html__( 'Theme Features', 'store-mall' )
				),
				'theme-comparison' => array(
					'title' => esc_html__( 'Free vs Pro', 'store-mall' ),
					'desc'	=> esc_html__( 'Want to enhance your site? The Pro version provides more of the elite features that will enhance your site. There is more to the Store Mall than meets the eye.', 'store-mall' ),
					'url' => '',
					'new_tab' => true,
					'icon' => 'star-half',
					'btn_txt' => esc_html__( 'Theme Comparison', 'store-mall' )
				),
			);

			if ( ! class_exists( 'OCDI_Plugin' ) ) {
				$args['demo-importer']['url'] = menu_page_url( 'tgmpa-install-plugins', false );
				$args['demo-importer']['btn_txt'] = esc_html__( 'Install One Click Demo Import', 'store-mall' );
			}

			store_mall_get_welcome_columns( $args ); ?>

		</div><!-- .postbox-container -->
	</div><!-- .wrap -->
<?php
}