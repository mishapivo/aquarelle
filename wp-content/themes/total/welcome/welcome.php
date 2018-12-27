<?php
	if(!class_exists('Total_Welcome')) :

		class Total_Welcome {

			public $tab_sections = array();

			public $theme_name = ''; // For storing Theme Name
			public $theme_version = ''; // For Storing Theme Current Version Information
			public $free_plugins = array(); // For Storing the list of the Recommended Free Plugins
			public $pro_plugins = array(); // For Storing the list of the Recommended Pro Plugins

			/**
			 * Constructor for the Welcome Screen
			 */
			public function __construct() {
				
				/** Useful Variables **/
				$theme = wp_get_theme();
				$this->theme_name = $theme->Name;
				$this->theme_version = $theme->Version;

				/** Define Tabs Sections **/
				$this->tab_sections = array(
					'getting_started' => __('Getting Started', 'total'),
					'recommended_plugins' => __('Recommended Plugins', 'total'),
					'support' => __('Support', 'total'),
					'free_vs_pro' => __('Free Vs Pro', 'total'),
				);

				/** List of Recommended Free Plugins **/
				$this->free_plugins = array(
					'wpforms-lite' => array(
						'name' => 'Contact Form by WPForms',
						'slug' => 'wpforms-lite',
						'filename' => 'wpforms'
					),
					'elementor' => array(
						'name' => 'Elementor Page Builder',
						'slug' => 'elementor',
						'filename' => 'elementor'
					),
					'siteorigin-panels' => array(
						'name' => 'Page Builder by SiteOrigin',
						'slug' => 'siteorigin-panels',
						'filename' => 'siteorigin-panels'
					)
				);

				/** List of Recommended Pro Plugins **/
				$this->pro_plugins = array();

				/* Theme Activation Notice */
				add_action( 'admin_notices', array( $this, 'total_activation_admin_notice' ) );

				/* Create a Welcome Page */
				add_action( 'admin_menu', array( $this, 'total_welcome_register_menu' ) );

				/* Enqueue Styles & Scripts for Welcome Page */
				add_action( 'admin_enqueue_scripts', array( $this, 'total_welcome_styles_and_scripts' ) );

				add_action( 'wp_ajax_total_activate_plugin', array( $this, 'total_activate_plugin') );
			}

			/** Welcome Message Notification on Theme Activation **/
			public function total_activation_admin_notice() {
				global $pagenow;

				if( is_admin() && ('themes.php' == $pagenow) && (isset($_GET['activated'])) ) {
					?>
					<div class="notice notice-success is-dismissible"> 
						<p><?php echo esc_html__( 'Welcome! Thank you for choosing Total. Please make sure you visit Settings Page to get started with Total theme.', 'total' ); ?></p>
						<p><a class="button button-primary" href="<?php echo admin_url('/themes.php?page=total-welcome') ?>"><?php echo esc_html__( 'Let\'s Get Started', 'total' ); ?></a></p>
					</div>
					<?php
				}
			}

			/** Register Menu for Welcome Page **/
			public function total_welcome_register_menu() {
				add_theme_page( esc_html__( 'Welcome', 'total' ), esc_html__( 'Total Settings', 'total' ) , 'edit_theme_options', 'total-welcome', array( $this, 'total_welcome_screen' ));
			}

			/** Welcome Page **/
			public function total_welcome_screen() {
				$tabs = $this->tab_sections;
				?>
				<div class="wrap about-wrap access-wrap">
					<div class="abt-promo-wrap clearfix">
						<div class="abt-theme-wrap">
							<h1><?php printf( // WPCS: XSS OK.
								/* translators: 1-theme name, 2-theme version*/
								esc_html__( 'Welcome to %1$s - Version %2$s', 'total' ), $this->theme_name, $this->theme_version ); ?></h1>
							<div class="about-text"><?php echo esc_html__( 'Total as its name suggest is a complete package theme with all the feature that you need to make a complete website. The theme has clean and elegant design with vibrant color(Theme Color Changable Option) and parallax sections. The theme is fully responsive and is built on customizer that enable you to configure the website with live preview. The theme is SEO friendly, Cross browser compatible, fully translation ready and is compatible with WooCommerce and all other major plugins.', 'total' ); ?></div>
						</div>

						<div class="promo-banner-wrap">
							<p><?php esc_html_e('Upgrade for $55', 'total'); ?></p>
							<a href="<?php echo esc_url('https://hashthemes.com/wordpress-theme/total-plus/'); ?>" target="_blank" class="button button-primary upgrade-btn"><?php echo esc_html__('Upgrade Now', 'total'); ?></a>
							<a class="promo-offer-text" href="<?php echo esc_url('https://hashthemes.com/wordpress-theme/total-plus/'); ?>" target="_blank"><?php echo esc_html__('Unlock all the possibitlies with Total Plus.', 'total'); ?></a>
						</div>
					</div>

					<div class="nav-tab-wrapper clearfix">
						<?php foreach($tabs as $id => $label) : ?>
							<?php
								$section = isset($_GET['section']) ? $_GET['section'] : 'getting_started'; // Input var okay.
								$nav_class = 'nav-tab';
								if($id == $section) {
									$nav_class .= ' nav-tab-active';
								}
							?>
							<a href="<?php echo esc_url(admin_url('themes.php?page=total-welcome&section='.$id)); ?>" class="<?php echo esc_attr($nav_class); ?>" >
								<?php echo esc_html( $label ); ?>
						   	</a>
						<?php endforeach; ?>
				   	</div>

			   		<div class="welcome-section-wrapper">
		   				<?php $section = isset($_GET['section']) ? $_GET['section'] : 'getting_started'; // Input var okay. ?>
	   					
	   					<div class="welcome-section <?php echo esc_attr($section); ?> clearfix">
	   						<?php require_once get_template_directory() . '/welcome/sections/'.$section.'.php'; ?>
						</div>
				   	</div>
			   	</div>
				<?php
			}

			/** Enqueue Necessary Styles and Scripts for the Welcome Page **/
			public function total_welcome_styles_and_scripts($hook) {
				if( 'appearance_page_total-welcome' == $hook ){
					$importer_params = array(
						'installing_text' => esc_html__('Installing Importer Plugin', 'total'),
						'activating_text' => esc_html__('Activating Importer Plugin', 'total'),
						'importer_page' => esc_html__('Go to Importer Page >>', 'total'),
						'importer_url' => admin_url('themes.php?page=pt-one-click-demo-import'),
						'error' => esc_html__('Error! Reload the page and try again.', 'total'),
					);
					wp_enqueue_style( 'total-welcome', get_template_directory_uri() . '/welcome/css/welcome.css' );
					wp_enqueue_style( 'plugin-install' );
					wp_enqueue_script( 'plugin-install' );
					wp_enqueue_script( 'updates' );
					wp_enqueue_script( 'total-welcome', get_template_directory_uri() . '/welcome/js/welcome.js', array(), '1.0' );
					wp_localize_script( 'total-welcome', 'importer_params', $importer_params);
				}
			}

			// Check if plugin is installed
			public function total_check_installed_plugin( $slug, $filename ) {
				return file_exists( ABSPATH . 'wp-content/plugins/' . $slug . '/' . $filename . '.php' ) ? true : false;
			}

			// Check if plugin is activated
			public function total_check_plugin_active_state( $slug, $filename ) {
				return is_plugin_active( $slug . '/' . $filename . '.php' ) ? true : false;
			}

			/** Generate Url for the Plugin Button **/
			public function total_plugin_generate_url($status, $slug, $file_name) {
				switch ( $status ) {
					case 'install':
						return wp_nonce_url(
							add_query_arg(
								array(
									'action' => 'install-plugin',
									'plugin' => esc_attr($slug)
								),
								network_admin_url( 'update.php' )
							),
							'install-plugin_' . esc_attr($slug)
						);
						break;

					case 'inactive':
						return add_query_arg( array(
		                      'action'        => 'deactivate',
		                      'plugin'        => rawurlencode( esc_attr($slug) . '/' . esc_attr($file_name) . '.php' ),
		                      'plugin_status' => 'all',
		                      'paged'         => '1',
		                      '_wpnonce'      => wp_create_nonce( 'deactivate-plugin_' . esc_attr($slug) . '/' . esc_attr($file_name) . '.php' ),
	                      ), network_admin_url( 'plugins.php' ) );
						break;

					case 'active':
						return add_query_arg( array(
		                      'action'        => 'activate',
		                      'plugin'        => rawurlencode( esc_attr($slug) . '/' . esc_attr($file_name) . '.php' ),
		                      'plugin_status' => 'all',
		                      'paged'         => '1',
		                      '_wpnonce'      => wp_create_nonce( 'activate-plugin_' . esc_attr($slug) . '/' . esc_attr($file_name) . '.php' ),
	                      ), network_admin_url( 'plugins.php' ) );
						break;
				}
			}

			public function total_activate_plugin(){
				$slug = isset($_POST['slug']) ? $_POST['slug'] : '';
				$file = isset($_POST['file']) ? $_POST['file'] : '';
				$success = false;

				if( !empty($slug) && !empty($file)){
					$result = activate_plugin( $slug.'/'.$file.'.php' );

					if ( !is_wp_error( $result ) ) {
						$success = true;
					}
				}
				echo wp_json_encode(array('success'=>$success));
				die();
			}

		}

		new Total_Welcome();

	endif;
