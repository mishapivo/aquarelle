<?php
/**
 * Elementare Admin Class.
 * @author  CrestaProject
 * @package Elementare
 * @since   1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'Elementare_Admin' ) ) :
/**
 * Elementare_Admin Class.
 */
class Elementare_Admin {
	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'wp_loaded', array( __CLASS__, 'hide_notices' ) );
		add_action( 'load-themes.php', array( $this, 'admin_notice' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
	}
	/**
	 * Add admin menu.
	 */
	public function admin_menu() {
		$theme = wp_get_theme( get_template() );
		global $elementare_adminpage;
		$elementare_adminpage = add_theme_page( esc_html__( 'About', 'elementare' ) . ' ' . $theme->display( 'Name' ), esc_html__( 'About', 'elementare' ) . ' ' . $theme->display( 'Name' ), 'activate_plugins', 'elementare-welcome', array( $this, 'welcome_screen' ) );
	}
	/**
	 * Enqueue styles.
	 */
	public function enqueue_admin_scripts() {
		global $elementare_adminpage;
		$screen = get_current_screen();
		if ( $screen->id != $elementare_adminpage ) {
			return;
		}
		wp_enqueue_style( 'elementare-welcome', get_template_directory_uri() . '/inc/admin/welcome.css', array(), '1.0' );
		wp_enqueue_script( 'elementare-admin-panel', get_template_directory_uri() . '/inc/admin/admin-panel.js', array('jquery'), '1.0', true );
	}
	/**
	 * Add admin notice.
	 */
	public function admin_notice() {
		global $pagenow;
		wp_enqueue_style( 'elementare-message', get_template_directory_uri() . '/inc/admin/message.css', array(), '1.0' );
		// Let's bail on theme activation.
		if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'welcome_notice' ) );
			update_option( 'elementare_admin_notice_welcome', 1 );
		// No option? Let run the notice wizard again..
		} elseif( ! get_option( 'elementare_admin_notice_welcome' ) ) {
			add_action( 'admin_notices', array( $this, 'welcome_notice' ) );
		}
	}
	/**
	 * Hide a notice if the GET variable is set.
	 */
	public static function hide_notices() {
		if ( isset( $_GET['elementare-hide-notice'] ) && isset( $_GET['_elementare_notice_nonce'] ) ) {
			if ( ! wp_verify_nonce( sanitize_key($_GET['_elementare_notice_nonce'] ), 'elementare_hide_notices_nonce' ) ) {
				wp_die( esc_html__( 'Action failed. Please refresh the page and retry.', 'elementare' ) );
			}
			if ( ! current_user_can( 'manage_options' ) ) {
				wp_die( esc_html__( 'Cheatin&#8217; huh?', 'elementare' ) );
			}
			$hide_notice = sanitize_text_field( wp_unslash($_GET['elementare-hide-notice'] ));
			update_option( 'elementare_admin_notice_' . $hide_notice, 1 );
		}
	}
	/**
	 * Show welcome notice.
	 */
	public function welcome_notice() {
		?>
		<div id="message" class="updated cresta-message">
			<a class="cresta-message-close notice-dismiss" href="<?php echo esc_url( wp_nonce_url( remove_query_arg( array( 'activated' ), add_query_arg( 'elementare-hide-notice', 'welcome' ) ), 'elementare_hide_notices_nonce', '_elementare_notice_nonce' ) ); ?>"><?php esc_html_e( 'Dismiss', 'elementare' ); ?></a>
			<p>
			<?php
			/* translators: 1: start option panel link, 2: end option panel link */
			printf( esc_html__( 'Welcome! Thank you for choosing Elementare theme! To fully take advantage of the best our theme can offer and read the documentation please make sure you visit our %1$swelcome page%2$s.', 'elementare' ), '<a href="' . esc_url( admin_url( 'themes.php?page=elementare-welcome' ) ) . '">', '</a>' );
			?>
			</p>
			<p class="submit">
				<a class="button-secondary" href="<?php echo esc_url( admin_url( 'themes.php?page=elementare-welcome' ) ); ?>"><?php esc_html_e( 'Get started with Elementare', 'elementare' ); ?></a>
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
		$theme = wp_get_theme( get_template() );
		?>
		<div class="cresta-theme-info">
			<h1>
				<?php esc_html_e('About', 'elementare'); ?>
				<?php echo esc_html($theme->get( 'Name' )) ." ". esc_html($theme->get( 'Version' )); ?>
			</h1>
			<div class="welcome-description-wrap">
				<div class="about-text"><?php echo esc_html($theme->display( 'Description' )); ?>
				<p class="cresta-actions">
					<a href="<?php echo esc_url( apply_filters( 'elementare_pro_theme_url', 'https://crestaproject.com/downloads/elementare' ) ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Info', 'elementare' ); ?></a>

					<a href="<?php echo esc_url( apply_filters( 'elementare_pro_theme_url', 'https://crestaproject.com/demo/elementare/' ) ); ?>" class="button button-secondary docs" target="_blank"><?php esc_html_e( 'View Demo', 'elementare' ); ?></a>
					
					<a href="<?php echo esc_url( apply_filters( 'elementare_pro_theme_url', 'https://crestaproject.com/demo/elementare-pro/' ) ); ?>" class="button button-primary docs" target="_blank"><?php esc_html_e( 'View PRO version Demo', 'elementare' ); ?></a>
					
					<a href="<?php echo esc_url( apply_filters( 'elementare_pro_theme_url', admin_url( add_query_arg( array( 'page' => 'elementare-welcome', 'tab' => 'documentation/#demoContent' ), 'themes.php' ) ) ) ); ?>" class="button button-secondary docs"><?php esc_html_e( 'Import demo content (instructions)', 'elementare' ); ?></a>
					
					<a href="<?php echo esc_url( apply_filters( 'elementare_pro_theme_url', 'https://wordpress.org/support/theme/elementare/reviews/' ) ); ?>" class="button button-secondary docs" target="_blank"><?php esc_html_e( 'Rate this theme', 'elementare' ); ?></a>
				</p>
				</div>
				<div class="cresta-screenshot">
					<img src="<?php echo esc_url( get_template_directory_uri() ) . '/screenshot.png'; ?>" />
				</div>
			</div>
		</div>
		<h2 class="nav-tab-wrapper">
			<a class="nav-tab <?php if ( empty( $_GET['tab'] ) && isset( $_GET['page'] ) && $_GET['page'] == 'elementare-welcome' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'elementare-welcome' ), 'themes.php' ) ) ); ?>">
				<?php echo esc_html($theme->display( 'Name' )); ?>
			</a>
			<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'free_vs_pro' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'elementare-welcome', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>">
				<?php esc_html_e( 'Free Vs PRO', 'elementare' ); ?>
			</a>
			<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'documentation' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'elementare-welcome', 'tab' => 'documentation' ), 'themes.php' ) ) ); ?>">
				<?php esc_html_e( 'Documentation', 'elementare' ); ?>
			</a>
			<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'changelog' ) echo 'nav-tab-active'; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'elementare-welcome', 'tab' => 'changelog' ), 'themes.php' ) ) ); ?>">
				<?php esc_html_e( 'Changelog', 'elementare' ); ?>
			</a>
		</h2>
		<?php
	}
	/**
	 * Welcome screen page.
	 */
	public function welcome_screen() {
		$current_tab = empty( $_GET['tab'] ) ? 'about' : sanitize_title( wp_unslash($_GET['tab']) );
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
						<h3><?php esc_html_e( 'Theme Customizer', 'elementare' ); ?></h3>
						<p><?php esc_html_e( 'All Theme Options are available via Customize screen.', 'elementare' ) ?></p>
						<p><a href="<?php echo esc_url(admin_url( 'customize.php' )); ?>" class="button button-secondary"><?php esc_html_e( 'Customize', 'elementare' ); ?></a></p>
					</div>
					<div class="col">
						<h3><?php esc_html_e( 'Got theme support question?', 'elementare' ); ?></h3>
						<p><?php esc_html_e( 'Please put it in our support forum.', 'elementare' ) ?></p>
						<p><a target="_blank" href="<?php echo esc_url( 'https://wordpress.org/support/theme/elementare/' ); ?>" class="button button-secondary"><?php esc_html_e( 'Support', 'elementare' ); ?></a></p>
					</div>
					<div class="col">
						<h3><?php esc_html_e( 'Need more features?', 'elementare'); ?></h3>
						<p><?php esc_html_e( 'Upgrade to PRO version for more exciting features.', 'elementare' ) ?></p>
						<p><a target="_blank" href="<?php echo esc_url( 'https://crestaproject.com/downloads/elementare/' ); ?>" class="button button-secondary"><?php esc_html_e( 'Info about PRO version', 'elementare' ); ?></a></p>
					</div>
					<div class="col">
						<h3>
							<?php
							esc_html_e( 'Translate', 'elementare' );
							echo ' ' . esc_html($theme->display( 'Name' ));
							?>
						</h3>
						<p><?php esc_html_e( 'Click below to translate this theme into your own language.', 'elementare' ) ?></p>
						<p>
							<a target="_blank" href="<?php echo esc_url( 'http://translate.wordpress.org/projects/wp-themes/elementare' ); ?>" class="button button-secondary">
								<?php
								esc_html_e( 'Translate', 'elementare' );
								echo ' ' . esc_html($theme->display( 'Name' ));
								?>
							</a>
						</p>
					</div>
				</div>
			</div>
			<div class="return-to-dashboard cresta">
				<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
					<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
						<?php is_multisite() ? esc_html_e( 'Return to Updates', 'elementare' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'elementare' ); ?>
					</a> |
				<?php endif; ?>
				<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'elementare' ) : esc_html_e( 'Go to Dashboard', 'elementare' ); ?></a>
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
			<p class="about-description"><?php esc_html_e( 'View changelog below:', 'elementare' ); ?></p>
			<?php
				$changelog_file = apply_filters( 'elementare_changelog_file', get_template_directory() . '/readme.txt' );

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
	 * Output the documentation screen.
	 */
	public function documentation_screen() {
		?>
		<div class="wrap about-wrap">
			<?php $this->intro(); ?>
			<p class="about-description"><?php esc_html_e( 'Elementare WordPress Theme Documentation', 'elementare' ); ?></p>
			<div class="option-panel-toggle" id="demoContent">
				<div class="singleToggle">
					<span class="dashicons dashicons-arrow-right"></span><div class="toggleTitle"><?php esc_html_e( 'How to import demo content', 'elementare' ); ?></div>
					<div class="toggleText">
						<ul>
							<li>
								<div class="elementareDocText">
									<?php esc_html_e( 'First install the "One Click Demo Import" plugin on the website', 'elementare' ); ?><br/>
									<a href="<?php echo esc_url( apply_filters( 'click_to_import_plugin_url', 'https://wordpress.org/plugins/one-click-demo-import/' ) ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'One Click Demo Import plugin page', 'elementare' ); ?></a>
								</div>
								<div class="elementareDocImage">
									<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/images/elementare-documentation-17.png'; ?>" />
								</div>
							</li>
							<li>
								<div class="elementareDocText">
									<?php esc_html_e( 'Once you have installed and activated the plugin, go to your WordPress Dashboard under "Appearance-> Import Demo Data" and click on the "Import Demo Data" button. Please click on the Import button only once and wait, it can take a couple of minutes.', 'elementare' ); ?><br/>
									<strong><?php esc_html_e( 'We recommend importing the demo content to new websites without content. This is to avoid filling the website with new pages and posts that could create confusion with existing content. After you import the demo, the main menu, widgets, and some parts of the theme (like the site logo) must be set manually.', 'elementare' ); ?></strong>
								</div>
								<div class="elementareDocImage">
									<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/images/elementare-documentation-18.png'; ?>" />
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="option-panel-toggle">
				<div class="singleToggle">
					<span class="dashicons dashicons-arrow-right"></span><div class="toggleTitle"><?php esc_html_e( 'How to set the "one page" template in the home page', 'elementare' ); ?></div>
					<div class="toggleText">
						<ul>
							<li>
								<div class="elementareDocText">
									<?php esc_html_e( 'Watch the video to set the onepage template on the home page, or read the step-by-step instructions below.', 'elementare' ); ?>
								</div>
								<div class="elementareDocImage">
									<a href="<?php echo esc_url( apply_filters( 'elementare_youtube_video', 'https://www.youtube.com/watch?v=DTmU6BorWEc' ) ); ?>" target="_blank"><?php esc_html_e( 'Link to the YouTube video', 'elementare' ); ?></a>
								</div>
							</li>
							<li>
								<div class="elementareDocText">
									<?php esc_html_e( '1) Create a new page and name it as you like (eg. My Home Page). In the "Page Attributes" section choose the template called "One Page Website" and save the page.', 'elementare' ); ?>
								</div>
								<div class="elementareDocImage">
									<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/images/elementare-documentation-1.png'; ?>" />
								</div>
							</li>
							<li>
								<div class="elementareDocText">
									<?php esc_html_e( '2) Go in your WordPress Dashboard under "Settings-> Reading". Set the "Front page displays" on "Static Page" and choose the page you previously created as Front page (eg. My Home Page).', 'elementare' ); ?>
								</div>
								<div class="elementareDocImage">
									<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/images/elementare-documentation-2.png'; ?>" />
								</div>
							</li>
							<li>
								<div class="elementareDocText">
									<?php esc_html_e( '3) Perfect! Now you can go in your WordPress Dashboard under "Appearance-> Customize" and you\'ll see the section called "Elementare Onepage" in which you can customize the home page.', 'elementare' ); ?>
								</div>
								<div class="elementareDocImage">
									<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/images/elementare-documentation-3.png'; ?>" />
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="option-panel-toggle">
				<div class="singleToggle">
					<span class="dashicons dashicons-arrow-right"></span><div class="toggleTitle"><?php esc_html_e( 'One Page: how to scroll to section using the menu', 'elementare' ); ?></div>
					<div class="toggleText">
						<ul>
							<li>
								<div class="elementareDocText">
									<?php esc_html_e( '1) Go to your WordPress Dashboard under "Appearance-> Customize-> Elementare Onepage" and choose one section (eg. Features) and add a section ID (eg. features) for this section. Save the options.', 'elementare' ); ?>
								</div>
								<div class="elementareDocImage">
									<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/images/elementare-documentation-4.png'; ?>" />
								</div>
							</li>
							<li>
								<div class="elementareDocText">
									<?php esc_html_e( '2) Now go to your WordPress Dashboard under "Appearance-> Menus" and create a new custom link with the URL of your home page followed the ID created for the section (eg. yoursite.com/#features). Add this custom link to your menu and save the options.', 'elementare' ); ?>
								</div>
								<div class="elementareDocImage">
									<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/images/elementare-documentation-5.png'; ?>" />
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="option-panel-toggle">
				<div class="singleToggle">
					<span class="dashicons dashicons-arrow-right"></span><div class="toggleTitle"><?php esc_html_e( 'One Page: how to set "About Us" section, "Features" section, "Services" section and "Team" section', 'elementare' ); ?></div>
					<div class="toggleText">
						<ul>
							<li>
								<div class="elementareDocText">
									<?php esc_html_e( 'Watch the video to set the "About Us" section, or read the step-by-step instructions below.', 'elementare' ); ?>
								</div>
								<div class="elementareDocImage">
									<a href="<?php echo esc_url( apply_filters( 'elementare_youtube_video', 'https://www.youtube.com/watch?v=jN19xjWe15s' ) ); ?>" target="_blank"><?php esc_html_e( 'Link to the YouTube video', 'elementare' ); ?></a>
								</div>
							</li>
							<li>
								<div class="elementareDocText">
									<?php esc_html_e( '1) These sections (About Us, Features, Services and Team) work in the same way and with the same procedure. To insert the content create a new page, and insert the title, content and featured image. The featured image is only valid for the "About Us" and "Team" section but is not mandatory.', 'elementare' ); ?>
								</div>
								<div class="elementareDocImage">
									<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/images/elementare-documentation-10.png'; ?>" />
								</div>
							</li>
							<li>
								<div class="elementareDocText">
									<?php esc_html_e( '2) Now go to "Appearance-> Customize-> Elementare Onepage" and choose the section you want to edit (About Us, Features or Services). Find the option called "Choose the page to display" and search the page you just created.', 'elementare' ); ?>
								</div>
								<div class="elementareDocImage">
									<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/images/elementare-documentation-11.png'; ?>" />
								</div>
							</li>
							<li>
								<div class="elementareDocText">
									<?php esc_html_e( '3) Now the section will show the content of the page previously created and the layout will be like the example image. The "Features", "Services" and "Team" sections work in the same way but will have a different layout.', 'elementare' ); ?>
								</div>
								<div class="elementareDocImage">
									<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/images/elementare-documentation-12.png'; ?>" />
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="option-panel-toggle">
				<div class="singleToggle">
					<span class="dashicons dashicons-arrow-right"></span><div class="toggleTitle"><?php esc_html_e( 'One Page: how to re-order sections', 'elementare' ); ?></div>
					<div class="toggleText">
						<ul>
							<li>
								<div class="elementareDocText">
									<?php esc_html_e( 'Re-order sections is available in Elementare PRO version. With this feature you can choose the position of each section using drag and drop. Click on the button below for more information:', 'elementare' ); ?>
									<br/><a href="<?php echo esc_url( apply_filters( 'elementare_pro_theme_url', 'https://crestaproject.com/downloads/elementare/' ) ); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'More Info About PRO Version', 'elementare' ); ?></a>
								</div>
								<div class="elementareDocImage">
									<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/images/elementare-documentation-13.png'; ?>" />
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="option-panel-toggle">
				<div class="singleToggle">
					<span class="dashicons dashicons-arrow-right"></span><div class="toggleTitle"><?php esc_html_e( 'How to add social icons', 'elementare' ); ?></div>
					<div class="toggleText">
						<ul>
							<li>
								<div class="elementareDocText">
									<?php esc_html_e( 'Go to your WordPress Dashboard under "Appearance-> Customize-> Elementare Theme Options-> Social Network". Here you can choose which social network to show, social icons will be displayed in the footer.', 'elementare' ); ?>
								</div>
								<div class="elementareDocImage">
									<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/images/elementare-documentation-6.png'; ?>" />
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="option-panel-toggle">
				<div class="singleToggle">
					<span class="dashicons dashicons-arrow-right"></span><div class="toggleTitle"><?php esc_html_e( 'How to add custom logo', 'elementare' ); ?></div>
					<div class="toggleText">
						<ul>
							<li>
								<div class="elementareDocText">
									<?php esc_html_e( 'Go to your WordPress Dashboard under "Appearance-> Customize-> Site Identity". Here you can upload your custom logo (size 250x60px).', 'elementare' ); ?>
								</div>
								<div class="elementareDocImage">
									<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/images/elementare-documentation-7.png'; ?>" />
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="option-panel-toggle">
				<div class="singleToggle">
					<span class="dashicons dashicons-arrow-right"></span><div class="toggleTitle"><?php esc_html_e( 'How to change theme colors', 'elementare' ); ?></div>
					<div class="toggleText">
						<ul>
							<li>
								<div class="elementareDocText">
									<?php esc_html_e( 'Go to your WordPress Dashboard under "Appearance-> Customize-> Elementare Theme Options-> Theme Colors". Here you can change the theme colors according to sections of the site (header, content, push sidebar and footer).', 'elementare' ); ?>
								</div>
								<div class="elementareDocImage">
									<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/images/elementare-documentation-8.png'; ?>" />
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="option-panel-toggle">
				<div class="singleToggle">
					<span class="dashicons dashicons-arrow-right"></span><div class="toggleTitle"><?php esc_html_e( 'How to display page loader', 'elementare' ); ?></div>
					<div class="toggleText">
						<ul>
							<li>
								<div class="elementareDocText">
									<?php esc_html_e( 'Go to your WordPress Dashboard under "Appearance-> Customize-> Elementare Theme Options-> General Settings", find the option called "Display page loader" and check it. The background will be the same of "Content background color" and the loader icon the same color of "Link color".', 'elementare' ); ?>
								</div>
								<div class="elementareDocImage">
									<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/images/elementare-documentation-9.png'; ?>" />
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="option-panel-toggle">
				<div class="singleToggle">
					<span class="dashicons dashicons-arrow-right"></span><div class="toggleTitle"><?php esc_html_e( 'Can I use a page builder plugin?', 'elementare' ); ?></div>
					<div class="toggleText">
						<ul>
							<li>
								<div class="elementareDocText">
									<?php esc_html_e( 'Yes, the theme is compatible with Elementor Page Builder, SiteOrigin and Beaver Builder plugins. Just create or edit the page you want to use the page builder and choose the template called "Full Width for page builders". This template allows page builders to have maximum page customization (only the menu and the footer will be visible).', 'elementare' ); ?>
									<br/>
									<?php esc_html_e( 'Moreover, in the PRO version, it is possible to use the custom sections to "import" entire pages created with the Page Builders inside the Onepage.', 'elementare' ); ?>
								</div>
								<div class="elementareDocImage">
									<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/images/elementare-documentation-16.png'; ?>" />
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="option-panel-toggle">
				<div class="singleToggle">
					<span class="dashicons dashicons-arrow-right"></span><div class="toggleTitle"><?php esc_html_e( 'How to highlight a menu item', 'elementare' ); ?></div>
					<div class="toggleText">
						<ul>
							<li>
								<div class="elementareDocText">
									<?php esc_html_e( 'If you need to emphasize a menu item (call to action, donate button, etc..) just go to your WordPress Dashboard under "Appearance-> Menus". Create a new "Custom Links" and drag it into the menu. Expand the entry and in the "CSS Classes" section write: crestaMenuButton', 'elementare' ); ?>
								</div>
								<div class="elementareDocImage">
									<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/images/elementare-documentation-14.png'; ?>" />
								</div>
							</li>
							<li>
								<div class="elementareDocText">
									<?php esc_html_e( 'This will be the result (the colors change according to the ones chosen).', 'elementare' ); ?>
								</div>
								<div class="elementareDocImage">
									<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/images/elementare-documentation-15.png'; ?>" />
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
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
			<p class="about-description"><?php esc_html_e( 'Upgrade to PRO version for more exciting features.', 'elementare' ); ?></p>
			<table>
				<thead>
					<tr>
						<th class="table-feature-title"><h3><?php esc_html_e('Features', 'elementare'); ?></h3></th>
						<th><h3><?php esc_html_e('Elementare', 'elementare'); ?></h3></th>
						<th><h3><?php esc_html_e('Elementare PRO', 'elementare'); ?></h3></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><h3><?php esc_html_e('Theme Options made with the WP Customizer', 'elementare'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Responsive Design', 'elementare'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Logo Upload', 'elementare'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Unlimited Text and Background Color', 'elementare'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Choose Social Icons', 'elementare'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span> <?php esc_html_e('+ more social buttons', 'elementare'); ?></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('WooCommerce Compatibility', 'elementare'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('WPML Multilingual ready', 'elementare'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('RTL Support', 'elementare'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Sidebar and Footer Widgets', 'elementare'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Loading Page', 'elementare'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span> <?php esc_html_e('1 loader', 'elementare'); ?></td>
						<td><span class="dashicons dashicons-yes"></span> <?php esc_html_e('7 loaders', 'elementare'); ?></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('One Page Template', 'elementare'); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span> <?php esc_html_e('+ more sections', 'elementare'); ?></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('One Page additional sections', 'elementare'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span> <?php esc_html_e('Portfolio, Google Map, Numbers, Newsletter, Clients, Testimonials, Video and more...', 'elementare'); ?></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('One Page Section Reorder', 'elementare'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('One Page Template scroll animations', 'elementare'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('One Page choose Slider Height', 'elementare'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Portfolio Template', 'elementare'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Parallax Effect', 'elementare'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Google Fonts switcher', 'elementare'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Manage sidebar position', 'elementare'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Sticky Sidebar', 'elementare'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Post views counter', 'elementare'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('9 Exclusive Widgets', 'elementare'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('4 Shortcodes', 'elementare'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Related Posts Box', 'elementare'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('Information About Author Box', 'elementare'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e('PowerTip, LightBox, Custom Copyright Text and much more...', 'elementare'); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td class="btn-wrapper">
							<a href="<?php echo esc_url( apply_filters( 'elementare_pro_theme_url', 'https://crestaproject.com/demo/elementare-pro/' ) ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'View PRO version demo', 'elementare' ); ?></a>
							<a href="<?php echo esc_url( apply_filters( 'elementare_pro_theme_url', 'https://crestaproject.com/downloads/elementare/' ) ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Get Elementare PRO', 'elementare' ); ?></a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<?php
	}
}
endif;
return new Elementare_Admin();