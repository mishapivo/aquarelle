<?php
/**
 * Unique Blog Admin Class.
 *
 * @author  Themerelic
 * @package Unique Blog
 * @since   
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Unique_Blog_Admin' ) ) :

/**
 * Unique_Blog_Admin Class.
 */
class Unique_Blog_Admin {

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

		$page = add_theme_page( esc_html__( 'About', 'unique-blog' ) . ' ' . $theme->display( 'Name' ), esc_html__( 'About', 'unique-blog' ) . ' ' . $theme->display( 'Name' ), 'activate_plugins', 'unique-blog-welcome', array( $this, 'welcome_screen' ) );
		add_action( 'admin_print_styles-' . $page, array( $this, 'enqueue_styles' ) );
	}

	/**
	 * Enqueue styles.
	 */
	public function enqueue_styles() {
		$UniqueBlog = wp_get_theme();
		$unique_blog_version = $UniqueBlog->get( 'Version' );

		wp_enqueue_style( 'unique-blog-welcome', get_template_directory_uri() . '/themerelic/admin/css/admin-welcome.css', array(), $unique_blog_version );
	}

	/**
	 * Add admin notice.
	 */
	public function admin_notice() {
		global $unique_blog_version, $pagenow;

		wp_enqueue_style( 'unique-blog-message', get_template_directory_uri() . '/themerelic/admin/css/admin-welcome.css', array(), $unique_blog_version );

		// Let's bail on theme activation.
		if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'welcome_notice' ) );
			update_option( 'Unique_Blog_Admin_notice_welcome', 1 );

		// No option? Let run the notice wizard again..
		} elseif( ! get_option( 'Unique_Blog_Admin_notice_welcome' ) ) {
			add_action( 'admin_notices', array( $this, 'welcome_notice' ) );
		}
	}

	/**
	 * Hide a notice if the GET variable is set.
	 */
	public static function hide_notices() {
		if ( isset( $_GET['unique-blog-hide-notice'] ) && isset( $_GET['unique_blog_notice_nonce'] ) ) {
			if ( ! wp_verify_nonce( $_GET['unique_blog_notice_nonce'], 'unique_blog_hide_notices_nonce' ) ) {
				wp_die( __( 'Action failed. Please refresh the page and retry.', 'unique-blog' ) );
			}

			if ( ! current_user_can( 'manage_options' ) ) {
				wp_die( __( 'Cheatin&#8217; huh?', 'unique-blog' ) );
			}

			$hide_notice = sanitize_text_field( $_GET['unique-blog-hide-notice'] );
			update_option( 'Unique_Blog_Admin_notice_welcome' . $hide_notice, 1 );
		}
	}

	/**
	 * Show welcome notice.
	 */
	public function welcome_notice() {
		?>
		<div id="message" class="updated unique-blog-message">
			<a class="unique-blog-message-close notice-dismiss" href="<?php echo esc_url( wp_nonce_url( remove_query_arg( array( 'activated' ), add_query_arg( 'unique-blog-hide-notice', 'welcome' ) ), 'unique_blog_hide_notices_nonce', 'unique_blog_notice_nonce' ) ); ?>"><?php echo  esc_html__( 'Dismiss', 'unique-blog' ); ?></a>
			<p><?php printf( esc_html__( 'Welcome! Thank you for choosing Unique Blog! To fully take advantage of the best our theme can offer please make sure you visit our %swelcome page%s.', 'unique-blog' ), '<a href="' . esc_url( admin_url( 'themes.php?page=unique-blog-welcome' ) ) . '">', '</a>' ); ?></p>
			<p class="submit">
				<a class="button-secondary" href="<?php echo esc_url( admin_url( 'themes.php?page=unique-blog-welcome' ) ); ?>"><?php echo  esc_html__(  'Get started with unique blog', 'unique-blog' ); ?></a>
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
		global $unique_blog_version;
		$theme = wp_get_theme( get_template() );

		// Drop minor version if 0
		$major_version = substr( $unique_blog_version, 0, 3 );
		?>
		<div class="unique-blog-theme-info">
				<h1>
					<?php echo  esc_html__( 'About', 'unique-blog'); ?>
					<?php echo $theme->display( 'Name' ); ?>
					<?php printf( '%s', $major_version ); ?>
				</h1>

			<div class="welcome-description-wrap">
				<div class="about-text"><?php echo $theme->display( 'Description' ); ?></div>

				<div class="unique-blog-screenshot">
					<img src="<?php echo esc_url( get_template_directory_uri() ) . '/screenshot.png'; ?>" />
				</div>
			</div>
		</div>

		<p class="unique-blog-actions">
			<!-- Theme Demo -->
			<a href="<?php echo esc_url( 'http://demo.reliccommerce.com/unique-blog' ); ?>" class="button button-secondary" target="_blank"><?php echo  esc_html__(  'Theme Demo', 'unique-blog' ); ?></a>

			<!-- Theme Details -->
			<a href="<?php echo esc_url('https://themerelic.com/wordpress-themes/unique-blog/'); ?>" class="button button-primary docs" target="_blank"><?php echo  esc_html__(  'Theme Details', 'unique-blog' ); ?></a>

			<!-- Theme Documentaion  -->
			<a href="<?php echo esc_url( 'https://themerelic.github.io/unique-blog/' ); ?>" class="button button-secondary docs" target="_blank"><?php echo  esc_html__(  'Documentation', 'unique-blog' ); ?></a>

			<!-- Go To Pro -->
			<a href="<?php echo esc_url( 'http://demo.reliccommerce.com/unique-blog/pro-home-2/' ); ?>" class="button button-primary docs" target="_blank"><?php echo  esc_html__(  'Unique Blog Pro', 'unique-blog' ); ?></a>
		</p>

		<h2 class="nav-tab-wrapper">
			<a class="nav-tab <?php if ( empty( $_GET['tab'] ) && $_GET['page'] == 'unique-blog-welcome' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'unique-blog-welcome' ), 'themes.php' ) ) ); ?>">
				<?php echo $theme->display( 'Name' ); ?>
			</a>
			<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'supported_plugins' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'unique-blog-welcome', 'tab' => 'supported_plugins' ), 'themes.php' ) ) ); ?>">
				<?php echo  esc_html__(  'Supported Plugins', 'unique-blog' ); ?>
			</a>
			<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'free_vs_pro' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'unique-blog-welcome', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>">
				<?php echo  esc_html__(  'Free Vs Pro', 'unique-blog' ); ?>
			</a>

			<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'more_themes' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'unique-blog-welcome', 'tab' => 'more_themes' ), 'themes.php' ) ) ); ?>">
				<?php echo  esc_html__(  'More Themes', 'unique-blog' ); ?>
			</a>

			<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'changelog' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'unique-blog-welcome', 'tab' => 'changelog' ), 'themes.php' ) ) ); ?>">
				<?php echo  esc_html__(  'Changelog', 'unique-blog' ); ?>
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
						<h3><?php echo  esc_html__(  'Theme Customizer', 'unique-blog' ); ?></h3>
						<p><?php echo  esc_html__(  'All Theme Options are available via Customize screen.', 'unique-blog' ) ?></p>
						<p><a href="<?php echo admin_url( 'customize.php' ); ?>" class="button button-secondary"><?php echo  esc_html__(  'Customize', 'unique-blog' ); ?></a></p>
					</div>

					<div class="col">
						<h3><?php echo  esc_html__(  'Documentation', 'unique-blog' ); ?></h3>
						<p><?php echo  esc_html__(  'Please view our documentation page to setup the theme.', 'unique-blog' ) ?></p>
						<p><a href="<?php echo esc_url( 'https://themerelic.github.io/unique-blog/' ); ?>" class="button button-secondary"><?php echo  esc_html__(  'Documentation', 'unique-blog' ); ?></a></p>
					</div>

					<div class="col">
						<h3><?php echo  esc_html__(  'Got theme support question?', 'unique-blog' ); ?></h3>
						<p><?php echo  esc_html__(  'Please put it in our dedicated support forum.', 'unique-blog' ) ?></p>
						<p><a href="<?php echo esc_url( 'https://themerelic.com/' ); ?>" class="button button-secondary"><?php echo  esc_html__(  'Support', 'unique-blog' ); ?></a></p>
					</div>

					<div class="col">
						<h3><?php echo  esc_html__(  'Need more features?', 'unique-blog' ); ?></h3>
						<p><?php echo  esc_html__(  'Upgrade to PRO version for more exciting features.', 'unique-blog' ) ?></p>
						<p><a href="<?php echo esc_url( 'https://themerelic.com/wordpress-themes/unique-blog-pro/' ); ?>" class="button button-secondary"><?php echo  esc_html__(  'View PRO version', 'unique-blog' ); ?></a></p>
					</div>

					<div class="col">
						<h3>
							<?php
							echo  esc_html__(  'Translate', 'unique-blog' );
							echo ' ' . $theme->display( 'Name' );
							?>
						</h3>
						<p><?php echo  esc_html__(  'Click below to translate this theme into your own language.', 'unique-blog' ) ?></p>
						<p>
							<a href="<?php echo esc_url( 'https://translate.wordpress.org/projects/wp-themes/unique-blog' ); ?>" class="button button-secondary">
								<?php
								echo  esc_html__(  'Translate', 'unique-blog' );
								echo ' ' . $theme->display( 'Name' );
								?>
							</a>
						</p>
					</div>

				</div>
			</div>

			<div class="return-to-dashboard">
				<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
					<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
						<?php is_multisite() ? esc_html__(  'Return to Updates', 'unique-blog' ) :  esc_html__(  'Return to Dashboard &rarr; Updates', 'unique-blog' ); ?>
					</a> |
				<?php endif; ?>
				<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ?   esc_html__(  'Go to Dashboard &rarr; Home', 'unique-blog' ) :  esc_html__(  'Go to Dashboard', 'unique-blog' ); ?></a>
			</div>

		</div>
		<?php
	}

		/**
	 * Output the changelog screen.
	 */
	public function changelog_screen() {
		global $wp_filesystem;

		?>
		<div class="wrap about-wrap">

			<?php $this->intro(); ?>

			<p class="about-description"><?php echo  esc_html__(  'View changelog below:', 'unique-blog' ); ?></p>

			<?php
				$changelog_file = apply_filters( 'unique_blog_changelog_file', get_template_directory() . '/readme.txt' );

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
	 * Output the supported plugins screen.
	 */
	public function supported_plugins_screen() {
		?>
		<div class="wrap about-wrap">

			<?php $this->intro(); ?>

			<p class="about-description"><?php echo  esc_html__(  'This theme recommends following plugins:', 'unique-blog' ); ?></p>
			<ol>
				

				<!-- Easy Google Fonts -->
				<li><a href="<?php echo esc_url('https://wordpress.org/plugins/easy-google-fonts/'); ?>" target="_blank"><?php echo  esc_html__( 'Easy Google Fonts', 'unique-blog'); ?></a>
					<?php echo  esc_html__( ' by Easy Google Fonts', 'unique-blog'); ?>
				</li>

				<!-- Contact Form 7 -->
				<li><a href="<?php echo esc_url('https://wordpress.org/plugins/contact-form-7/'); ?>" target="_blank"><?php echo  esc_html__( 'Contact Form 7', 'unique-blog'); ?></a>
					<?php echo  esc_html__( 'by  Takayuki Miyoshi', 'unique-blog'); ?>
				</li>

				<!-- One Click Demo Import -->
				<li><a href="<?php echo esc_url('https://wordpress.org/plugins/one-click-demo-import/'); ?>" target="_blank"><?php echo  esc_html__( 'One Click Demo Import', 'unique-blog'); ?></a>
					<?php echo  esc_html__( 'by  ProteusThemes', 'unique-blog'); ?>
				</li>
				
				
			</ol>

		</div>
		<?php
	}

	/**
	 * Output the free vs pro screen.
	 */
	public function free_vs_pro_screen() {
		?>
		<div class="wrap about-wrap">

			<?php $this->intro(); ?>

			<p class="about-description"><?php echo  esc_html__(  'Upgrade to PRO version for more exciting features.', 'unique-blog' ); ?></p>

			<table>
				<thead>
					<tr>
						<th class="table-feature-title"><h3><?php echo  esc_html__( 'Features', 'unique-blog'); ?></h3></th>
						<th><h3><?php echo  esc_html__( 'Unique Blog', 'unique-blog'); ?></h3></th>
						<th><h3 class="unique-blog-pro-header"><a href="<?php echo esc_url('https://themerelic.com/wordpress-themes/unique-blog-pro/'); ?>"><?php echo  esc_html__( 'Unique Blog Pro', 'unique-blog'); ?></a></h3></th>
					</tr>

					
					<!-- Header Section -->					
					<tr>
						<td><h3><?php echo  esc_html__( 'Header Layout', 'unique-blog'); ?></h3></td>
						<td><?php  echo  esc_html__( '1','unique-blog') ?></td>
						<td><?php  echo  esc_html__( '4','unique-blog') ?></span></td>
					</tr>


					<!-- Unlimited Color -->					
					<tr>
						<td><h3><?php echo  esc_html__( 'Unlimited Color', 'unique-blog'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>

					<!-- Typography Option -->					
					<tr>
						<td><h3><?php echo  esc_html__( 'Typography Option', 'unique-blog'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>

					
					<!-- Archive Page Layout -->					
					<tr>
						<td><h3><?php echo  esc_html__( 'Archive Page Layout', 'unique-blog'); ?></h3></td>
						<td><?php  echo  esc_html__( '1','unique-blog') ?></td>
						<td><?php  echo  esc_html__( '2','unique-blog') ?></span></td>
					</tr>

					<!-- Custom Widget Section -->					
					<tr>
						<td><h3><?php echo  esc_html__( 'Custom Widget Section', 'unique-blog'); ?></h3></td>
						<td><?php  echo  esc_html__( '0','unique-blog') ?></td>
						<td><?php  echo  esc_html__( '6','unique-blog') ?></span></td>
					</tr>

					
					<!-- Home Page Section -->					
					<tr>
						<td><h3><?php echo  esc_html__( 'Home Page Section', 'unique-blog'); ?></h3></td>
						<td><?php  echo  esc_html__( '2','unique-blog') ?></td>
						<td><?php  echo  esc_html__( '10','unique-blog') ?></span></td>
					</tr>

					<!-- Section Re- Order -->					
					<tr>
						<td><h3><?php echo  esc_html__( 'Section Re- Order', 'unique-blog'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					
					<!-- Views Count -->					
					<tr>
						<td><h3><?php echo  esc_html__( 'Views Count', 'unique-blog'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>

					<!-- Blog Section Slider -->					
					<tr>
						<td><h3><?php echo  esc_html__( 'Blog Section Slider', 'unique-blog'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>

					
					<!-- Product Tab Slider -->					
					<tr>
						<td><h3><?php echo  esc_html__( 'Product Tab Slider', 'unique-blog'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					
					
					<!-- Google Fonts -->					
					<tr>
						<td><h3><?php echo  esc_html__( 'Google Fonts', 'unique-blog'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>

					
					<!-- Social Icons -->					
					<tr>
						<td><h3><?php echo  esc_html__( 'Social Icons', 'unique-blog'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>

					<!-- Boxed & Wide Layout Option -->					
					<tr>
						<td><h3><?php echo  esc_html__( 'Boxed & Wide Layout Option', 'unique-blog'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>

					<!-- Footer Copyright Editor -->					
					<tr>
						<td><h3><?php echo  esc_html__( 'Footer Copyright Editor', 'unique-blog'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					
					<!-- Demo Content  -->					
					<tr>
						<td><h3><?php echo  esc_html__( 'Demo Content ', 'unique-blog'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					

					
				</tbody>
			</table>

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
							'author' => 'themerelic',
						);
						// Set the $request array.
						$request = array(
							'body' => array(
								'action'  => 'query_themes',
								'request' => serialize( (object)$args )
							)
						);
						$themes = $this->themerelic_get_themes( $request );
						$active_theme = wp_get_theme()->get( 'Name' );
						$counter = 1;

						// For currently active theme.
						foreach ( $themes->themes as $theme ) {
							if( $active_theme == $theme->name ) { ?>

								<div id="<?php echo $theme->slug; ?>" class="theme active">
									<div class="theme-screenshot">
										<img src="<?php echo $theme->screenshot_url ?>"/>
									</div>
									<h3 class="theme-name" ><strong><?php _e( 'Active', 'unique-blog' ); ?></strong>: <?php echo $theme->name; ?></h3>
									<div class="theme-actions">
										<a class="button button-primary customize load-customize hide-if-no-customize" href="<?php echo get_site_url(). '/wp-admin/customize.php' ?>"><?php _e( 'Customize', 'unique-blog' ); ?></a>
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
								$theme_details = $this->themerelic_get_themes( $request );
							?>
								<div id="<?php echo $theme->slug; ?>" class="theme">
									<div class="theme-screenshot">
										<img src="<?php echo $theme->screenshot_url ?>"/>
									</div>

									<h3 class="theme-name"><?php echo $theme->name; ?></h3>

									<div class="theme-actions">
										<?php if( wp_get_theme( $theme->slug )->exists() ) { ?>											
											<!-- Activate Button -->
											<a  class="button button-secondary activate"
												href="<?php echo wp_nonce_url( admin_url( 'themes.php?action=activate&amp;stylesheet=' . urlencode( $theme->slug ) ), 'switch-theme_' . $theme->slug );?>" ><?php _e( 'Activate', 'unique-blog' ) ?></a>
										<?php } else {
											// Set the install url for the theme.
											$install_url = add_query_arg( array(
													'action' => 'install-theme',
													'theme'  => $theme->slug,
												), self_admin_url( 'update.php' ) );
										?>
											<!-- Install Button -->
											<a data-toggle="tooltip" data-placement="bottom" title="<?php echo 'Downloaded ' . number_format( $theme_details->downloaded ) . ' times'; ?>" class="button button-secondary activate" href="<?php echo esc_url( wp_nonce_url( $install_url, 'install-theme_' . $theme->slug ) ); ?>" ><?php _e( 'Install Now', 'unique-blog' ); ?></a>
										<?php } ?>

										<a class="button button-primary load-customize hide-if-no-customize" target="_blank" href="<?php echo $theme->preview_url; ?>"><?php _e( 'Live Preview', 'unique-blog' ); ?></a>
									</div>
								</div><!-- .theme -->
								<?php
							}
						}


					?>
				</div>
			</div><!-- .end div -->
		</div><!-- .ena wrapper -->
		<?php
	}

	/** 
	 * Get all our themes by using API.
	 */
	private function themerelic_get_themes( $request ) {

		// Generate a cache key that would hold the response for this request:
		$key = 'unique_blog_' . md5( serialize( $request ) );

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


}

endif;

return new Unique_Blog_Admin();
