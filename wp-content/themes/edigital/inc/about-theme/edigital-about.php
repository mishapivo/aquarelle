<?php
/**
 * About page of EDigital Theme
 *
 * @package Mystery Themes
 * @subpackage EDigital
 * @since 1.0.7
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Edigital_About' ) ) :

class Edigital_About {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'wp_loaded', array( __CLASS__, 'hide_notices' ) );
		add_action( 'load-themes.php', array( $this, 'admin_notice' ) );
	}

	/**
	 * Add admin menu.
	 */
	public function admin_menu() {
		$theme = wp_get_theme( get_template() );

		$page = add_theme_page( esc_html__( 'About', 'edigital' ) . ' ' . $theme->display( 'Name' ), esc_html__( 'Welcom', 'edigital' ) . ' ' . $theme->display( 'Name' ), 'activate_plugins', 'welcome-edigital', array( $this, 'welcome_screen' ) );
		add_action( 'admin_print_styles-' . $page, array( $this, 'enqueue_styles' ) );
	}

	/**
	 * Enqueue styles.
	 */
	public function enqueue_styles() {
		global $edigital_version;

		wp_enqueue_style( 'edigital-about-theme', get_template_directory_uri() . '/inc/about-theme/about.css', array(), $edigital_version );
	}

	/**
	 * Add admin notice.
	 */
	public function admin_notice() {
		global $edigital_version, $pagenow;

		// Let's bail on theme activation.
		if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'welcome_notice' ) );
			update_option( 'edigital_admin_notice_welcome', 1 );

		// No option? Let run the notice wizard again..
		} elseif( ! get_option( 'edigital_admin_notice_welcome' ) ) {
			add_action( 'admin_notices', array( $this, 'welcome_notice' ) );
		}
	}

	/**
	 * Hide a notice if the GET variable is set.
	 */
	public static function hide_notices() {
		if ( isset( $_GET['edigital-hide-notice'] ) && isset( $_GET['_edigital_notice_nonce'] ) ) {
			if ( ! wp_verify_nonce( $_GET['_edigital_notice_nonce'], 'edigital_hide_notices_nonce' ) ) {
				wp_die( __( 'Action failed. Please refresh the page and retry.', 'edigital' ) );
			}

			if ( ! current_user_can( 'manage_options' ) ) {
				wp_die( __( 'Cheatin&#8217; huh?', 'edigital' ) );
			}

			$hide_notice = sanitize_text_field( $_GET['edigital-hide-notice'] );
			update_option( 'edigital_admin_notice_' . $hide_notice, 1 );
		}
	}

	/**
	 * Show welcome notice.
	 */
	public function welcome_notice() {
		?>
		<div id="message" class="updated edigital-message">
			<a class="edigital-message-close notice-dismiss" href="<?php echo esc_url( wp_nonce_url( remove_query_arg( array( 'activated' ), add_query_arg( 'edigital-hide-notice', 'welcome' ) ), 'edigital_hide_notices_nonce', '_edigital_notice_nonce' ) ); ?>"><?php esc_html_e( 'Dismiss', 'edigital' ); ?></a>
			<p><?php printf( esc_html__( 'Welcome! Thank you for choosing EDigital! To fully take advantage of the best our theme can offer please make sure you visit our %1$s welcome page %2$s.', 'edigital' ), '<a href="' . esc_url( admin_url( 'themes.php?page=welcome-edigital' ) ) . '">', '</a>' ); ?></p>
			<p class="submit">
				<a class="button-secondary" href="<?php echo esc_url( admin_url( 'themes.php?page=welcome-edigital' ) ); ?>"><?php esc_html_e( 'Get started with edigital', 'edigital' ); ?></a>
			</p>
		</div>
		<?php
	}

	/**
	 * Intro text/links shown to all about pages.
	 *
	 * @access private
	 */
	private function intro() {
		global $edigital_version;
		$theme = wp_get_theme( get_template() );

		// Drop minor version if 0
		//$major_version = substr( $edigital_version, 0, 3 );
		?>
		<div class="edigital-theme-info">
				<h1>
					<?php esc_html_e( 'About', 'edigital' ); ?>
					<?php echo esc_html( $theme->display( 'Name' ) ); ?>
					<?php printf( '%s', esc_attr( $edigital_version ) ); ?>
				</h1>

			<div class="welcome-description-wrap">
				<div class="about-text"><?php echo wp_kses_post( $theme->display( 'Description' ) ); ?></div>

				<div class="edigital-screenshot">
					<img src="<?php echo esc_url( get_template_directory_uri() ) . '/screenshot.jpg'; ?>" />
				</div>
			</div>
		</div>

		<p class="edigital-actions">
			<a href="<?php echo esc_url( 'https://mysterythemes.com/wp-themes/edigital/' ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Info', 'edigital' ); ?></a>

			<a href="<?php echo esc_url( apply_filters( 'edigital_pro_theme_url', 'http://demo.mysterythemes.com/edigital/' ) ); ?>" class="button button-secondary docs" target="_blank"><?php esc_html_e( 'View Demo', 'edigital' ); ?></a>

			<a href="<?php echo esc_url( apply_filters( 'edigital_pro_theme_url', 'https://mysterythemes.com/wp-themes/edigital-pro/' ) ); ?>" class="button button-primary docs" target="_blank"><?php esc_html_e( 'View PRO version', 'edigital' ); ?></a>

			<a href="<?php echo esc_url( apply_filters( 'edigital_pro_theme_url', 'https://wordpress.org/support/theme/edigital/reviews/?filter=5' ) ); ?>" class="button button-secondary docs" target="_blank"><?php esc_html_e( 'Rate this theme', 'edigital' ); ?></a>
		</p>

		<h2 class="nav-tab-wrapper">
			<a class="nav-tab <?php if ( empty( $_GET['tab'] ) && $_GET['page'] == 'welcome-edigital' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'welcome-edigital' ), 'themes.php' ) ) ); ?>">
				<?php echo esc_html( $theme->display( 'Name' ) ); ?>
			</a>
			
			<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'free_vs_pro' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'welcome-edigital', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>">
				<?php esc_html_e( 'Free Vs Pro', 'edigital' ); ?>
			</a>

			<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'more_themes' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'welcome-edigital', 'tab' => 'more_themes' ), 'themes.php' ) ) ); ?>">
				<?php esc_html_e( 'More Themes', 'edigital' ); ?>
			</a>

			<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'changelog' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'welcome-edigital', 'tab' => 'changelog' ), 'themes.php' ) ) ); ?>">
				<?php esc_html_e( 'Changelog', 'edigital' ); ?>
			</a>
		</h2>
		<?php
	}

	/**
	 * Welcome screen page.
	 */
	public function welcome_screen() {
		$current_tab = empty( $_GET['tab'] ) ? 'about' : sanitize_title( $_GET['tab'] );

		// Look for a {$current_tab}_screen method.
		if ( is_callable( array( $this, $current_tab . '_screen' ) ) ) {
			return $this->{ $current_tab . '_screen' }();
		}

		// Fallback to about screen.
		return $this->about_screen();
	}

	/**
	 * Output the about screen.
	 */
	public function about_screen() {
		$theme = wp_get_theme( get_template() );
		?>
		<div class="wrap about-wrap">

			<?php $this->intro(); ?>

			<div class="changelog point-releases">
				<div class="under-the-hood two-col">
					<div class="col">
						<h3><?php esc_html_e( 'Theme Customizer', 'edigital' ); ?></h3>
						<p><?php esc_html_e( 'All Theme Options are available via Customize screen.', 'edigital' ) ?></p>
						<p><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-secondary"><?php esc_html_e( 'Customize', 'edigital' ); ?></a></p>
					</div>

					<div class="col">
						<h3><?php esc_html_e( 'Documentation', 'edigital' ); ?></h3>
						<p><?php esc_html_e( 'Please view our documentation page to setup the theme.', 'edigital' ) ?></p>
						<p><a href="<?php echo esc_url( 'http://docs.mysterythemes.com/edigital/' ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Documentation', 'edigital' ); ?></a></p>
					</div>

					<div class="col">
						<h3><?php esc_html_e( 'Got theme support question?', 'edigital' ); ?></h3>
						<p><?php esc_html_e( 'Please put it in our dedicated support forum.', 'edigital' ) ?></p>
						<p><a href="<?php echo esc_url( 'https://mysterythemes.com/support/' ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Support', 'edigital' ); ?></a></p>
					</div>

					<div class="col">
						<h3><?php esc_html_e( 'Need more features?', 'edigital' ); ?></h3>
						<p><?php esc_html_e( 'Upgrade to PRO version for more exciting features.', 'edigital' ) ?></p>
						<p><a href="<?php echo esc_url( 'https://mysterythemes.com/wp-themes/edigital-pro/' ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'View PRO version', 'edigital' ); ?></a></p>
					</div>

					<div class="col">
						<h3><?php esc_html_e( 'Have you need customization?', 'edigital' ); ?></h3>
						<p><?php esc_html_e( 'Please send message with your requirement.', 'edigital' ) ?></p>
						<p><a href="<?php echo esc_url( 'https://mysterythemes.com/customization/' ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Customization', 'edigital' ); ?></a></p>
					</div>

					<div class="col">
						<h3>
							<?php
								esc_html_e( 'Translate', 'edigital' );
								echo ' ' . esc_html( $theme->display( 'Name' ) );
							?>
						</h3>
						<p><?php esc_html_e( 'Click below to translate this theme into your own language.', 'edigital' ) ?></p>
						<p>
							<a href="<?php echo esc_url( 'https://translate.wordpress.org/projects/wp-themes/edigital' ); ?>" class="button button-secondary" target="_blank">
								<?php
									esc_html_e( 'Translate', 'edigital' );
									echo ' ' . esc_html( $theme->display( 'Name' ) );
								?>
							</a>
						</p>
					</div>
				</div>
			</div>

			<div class="return-to-dashboard edigital">
				<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
					<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
						<?php is_multisite() ? esc_html_e( 'Return to Updates', 'edigital' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'edigital' ); ?>
					</a> |
				<?php endif; ?>
				<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'edigital' ) : esc_html_e( 'Go to Dashboard', 'edigital' ); ?></a>
			</div>
		</div>
		<?php
	}

	/**
	 * Output the more themes screen
	 */
	public function more_themes_screen() {
?>
		<div class="wrap about-wrap">

			<?php $this->intro(); ?>
			<div class="theme-browser rendered">
				<div class="themes wp-clearfix">
					<?php
						// Set the argument array with author name.
						$args = array(
							'author' => 'mysterythemes',
						);
						// Set the $request array.
						$request = array(
							'body' => array(
								'action'  => 'query_themes',
								'request' => serialize( (object)$args )
							)
						);
						$themes = $this->edigital_get_themes( $request );
						$active_theme = wp_get_theme()->get( 'Name' );
						$counter = 1;

						// For currently active theme.
						foreach ( $themes->themes as $theme ) {
							if( $active_theme == $theme->name ) { ?>

								<div id="<?php echo esc_attr( $theme->slug ); ?>" class="theme active">
									<div class="theme-screenshot">
										<img src="<?php echo esc_url( $theme->screenshot_url ); ?>"/>
									</div>
									<h3 class="theme-name" id="edigital-name"><strong><?php esc_html_e( 'Active', 'edigital' ); ?></strong>: <?php echo esc_html( $theme->name ); ?></h3>
									<div class="theme-actions">
										<a class="button button-primary customize load-customize hide-if-no-customize" href="<?php echo esc_url( home_url('/'). 'wp-admin/customize.php' ); ?>"><?php esc_html_e( 'Customize', 'edigital' ); ?></a>
									</div>
								</div><!-- .theme active -->
							<?php
							$counter++;
							break;
							}
						}

						// For all other themes.
						foreach ( $themes->themes as $theme ) {
							if( $active_theme != $theme->name ) {
								// Set the argument array with author name.
								$args = array(
									'slug' => $theme->slug,
								);
								// Set the $request array.
								$request = array(
									'body' => array(
										'action'  => 'theme_information',
										'request' => serialize( (object)$args )
									)
								);
								$theme_details = $this->edigital_get_themes( $request );
							?>
								<div id="<?php echo esc_attr( $theme->slug ); ?>" class="theme">
									<div class="theme-screenshot">
										<img src="<?php echo esc_url( $theme->screenshot_url ); ?>"/>
									</div>

									<h3 class="theme-name"><?php echo esc_html( $theme->name ); ?></h3>

									<div class="theme-actions">
										<?php if( wp_get_theme( $theme->slug )->exists() ) { ?>
											<!-- Activate Button -->
											<a  class="button button-secondary activate"
												href="<?php echo esc_url( wp_nonce_url( admin_url( 'themes.php?action=activate&amp;stylesheet=' . urlencode( $theme->slug ) ), 'switch-theme_' . $theme->slug ) );?>" ><?php esc_html_e( 'Activate', 'edigital' ) ?></a>
										<?php } else {
											// Set the install url for the theme.
											$install_url = add_query_arg( array(
													'action' => 'install-theme',
													'theme'  => $theme->slug,
												), self_admin_url( 'update.php' ) );
										?>
											<!-- Install Button -->
											<a data-toggle="tooltip" data-placement="bottom" title="<?php echo 'Downloaded ' . number_format( $theme_details->downloaded ) . ' times'; ?>" class="button button-secondary activate" href="<?php echo esc_url( wp_nonce_url( $install_url, 'install-theme_' . $theme->slug ) ); ?>" ><?php esc_html_e( 'Install Now', 'edigital' ); ?></a>
										<?php } ?>

										<a class="button button-primary load-customize hide-if-no-customize" target="_blank" href="<?php echo esc_url( $theme->preview_url ); ?>"><?php esc_html_e( 'Live Preview', 'edigital' ); ?></a>
									</div>
								</div><!-- .theme -->
								<?php
							}
						}


					?>
				</div>
			</div><!-- .mt-theme-holder -->
		</div><!-- .wrap.about-wrap -->
<?php
	}

	/** 
	 * Get all our themes by using API.
	 */
	private function edigital_get_themes( $request ) {

		// Generate a cache key that would hold the response for this request:
		$key = 'edigital_' . md5( serialize( $request ) );

		// Check transient. If it's there - use that, if not re fetch the theme
		if ( false === ( $themes = get_transient( $key ) ) ) {

			// Transient expired/does not exist. Send request to the API.
			$response = wp_remote_post( 'http://api.wordpress.org/themes/info/1.0/', $request );

			// Check for the error.
			if ( !is_wp_error( $response ) ) {

				$themes = unserialize( wp_remote_retrieve_body( $response ) );

				if ( !is_object( $themes ) && !is_array( $themes ) ) {

					// Response body does not contain an object/array
					return new WP_Error( 'theme_api_error', 'An unexpected error has occurred' );
				}

				// Set transient for next time... keep it for 24 hours should be good
				set_transient( $key, $themes, 60 * 60 * 24 );
			}
			else {
				// Error object returned
				return $response;
			}
		}
		return $themes;
	}
	
	/**
	 * Output the changelog screen.
	 */
	public function changelog_screen() {
		global $wp_filesystem;

		?>
		<div class="wrap about-wrap">

			<?php $this->intro(); ?>

			<h4><?php esc_html_e( 'View changelog below:', 'edigital' ); ?></h4>

			<?php
				$changelog_file = apply_filters( 'edigital_changelog_file', get_template_directory() . '/readme.txt' );

				// Check if the changelog file exists and is readable.
				if ( $changelog_file && is_readable( $changelog_file ) ) {
					WP_Filesystem();
					$changelog = $wp_filesystem->get_contents( $changelog_file );
					$changelog_list = $this->parse_changelog( $changelog );

					echo wp_kses_post( $changelog_list );
				}
			?>
		</div>
		<?php
	}

	/**
	 * Parse changelog from readme file.
	 * @param  string $content
	 * @return string
	 */
	private function parse_changelog( $content ) {
		$matches   = null;
		$regexp    = '~==\s*Changelog\s*==(.*)($)~Uis';
		$changelog = '';

		if ( preg_match( $regexp, $content, $matches ) ) {
			$changes = explode( '\r\n', trim( $matches[1] ) );

			$changelog .= '<pre class="changelog">';

			foreach ( $changes as $index => $line ) {
				$changelog .= wp_kses_post( preg_replace( '~(=\s*Version\s*(\d+(?:\.\d+)+)\s*=|$)~Uis', '<span class="title">${1}</span>', $line ) );
			}

			$changelog .= '</pre>';
		}

		return wp_kses_post( $changelog );
	}

	/**
	 * Output the free vs pro screen.
	 */
	public function free_vs_pro_screen() {
		?>
		<div class="wrap about-wrap">

			<?php $this->intro(); ?>

			<h4><?php esc_html_e( 'Upgrade to PRO version for more exciting features.', 'edigital' ); ?></h4>

			<table>
				<thead>
					<tr>
						<th class="table-feature-title"><h3><?php esc_html_e( 'Features', 'edigital' ); ?></h3></th>
						<th><h3><?php esc_html_e( 'EDigital', 'edigital' ); ?></h3></th>
						<th><h3><?php esc_html_e( 'EDigital Pro', 'edigital' ); ?></h3></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><h3><?php esc_html_e( 'Price', 'edigital' ); ?></h3></td>
						<td><?php esc_html_e( 'Free', 'edigital' ); ?></td>
						<td><?php esc_html_e( '$55', 'edigital' ); ?></td>
					</tr>					
					<tr>
						<td><h3><?php esc_html_e( 'Import Demo Data', 'edigital' ); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'WooCommerce Plugin Compatible', 'edigital' ); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Easy Digital Download Plugin Compatible', 'edigital' ); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>					
					<tr>
						<td><h3><?php esc_html_e( 'Top Header Section', 'edigital' ); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Ticker Section', 'edigital' ); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Pre Loaders', 'edigital' ); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Header Layouts', 'edigital' ); ?></h3></td>
						<td><?php esc_html_e( '1', 'edigital' ); ?></td>
						<td><?php esc_html_e( '3', 'edigital' ); ?></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Header Sticky', 'edigital' ); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Google Fonts', 'edigital' ); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><?php esc_html_e( '600+', 'edigital' ); ?></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Typography Options', 'edigital' ); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>					
					<tr>
						<td><h3><?php esc_html_e( 'No. of Widgets', 'edigital' ); ?></h3></td>
						<td><?php esc_html_e( '7', 'edigital' ); ?></td>
						<td><?php esc_html_e( '11', 'edigital' ); ?></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'No. of Widgets', 'edigital' ); ?></h3></td>
						<td><?php esc_html_e( '7', 'edigital' ); ?></td>
						<td><?php esc_html_e( '14', 'edigital' ); ?></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Footer Widget Area', 'edigital' ); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					
					<tr>
						<td></td>
						<td></td>
						<td class="btn-wrapper">
							<a href="<?php echo esc_url( apply_filters( 'edigital_pro_theme_url', 'https://mysterythemes.com/wp-themes/edigital-pro/' ) ); ?>" class="button button-secondary docs" target="_blank"><?php esc_html_e( 'View Pro', 'edigital' ); ?></a>
						</td>
					</tr>
				</tbody>
			</table>

		</div>
		<?php
	}
}

endif;

return new edigital_About();