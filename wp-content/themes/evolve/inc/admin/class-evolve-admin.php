<?php

/*
   evolve About Page
   ======================================= */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Evolve_Admin' ) ) {
	class Evolve_Admin {

		public function __construct() {
			add_action( 'admin_menu', array( $this, 'about_page' ) );
			add_action( 'wp_loaded', array( __CLASS__, 'hide_notice' ) );
			add_action( 'load-themes.php', array( $this, 'admin_notice' ) );
		}

		public function about_page() {
			global $evolve_theme_name;
			$page = add_theme_page( esc_html__( 'About', 'evolve' ) . ' ' . $evolve_theme_name, esc_html__( 'About', 'evolve' ) . ' ' . $evolve_theme_name, 'activate_plugins', 'about-evolve', array(
				$this,
				'about_page_screen',
			) );
			add_action( 'admin_print_styles-' . $page, array( $this, 'enqueue_styles' ) );
		}

		public function enqueue_styles() {
			global $evolve_theme_version;
			wp_enqueue_style( 'about-evolve', get_template_directory_uri() . '/inc/admin/css/about.min.css', array(), $evolve_theme_version );
		}

		public function admin_notice() {
			global $evolve_theme_version, $pagenow;
			wp_enqueue_style( 'evolve-notice', get_template_directory_uri() . '/inc/admin/css/notice.min.css', array(), $evolve_theme_version );

			if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
				add_action( 'admin_notices', array( $this, 'activation_notice' ) );
				update_option( 'evolve_admin_notice', 1 );

			} elseif ( ! get_option( 'evolve_admin_notice' ) ) {
				add_action( 'admin_notices', array( $this, 'activation_notice' ) );
			}
		}

		public static function hide_notice() {
			if ( isset( $_GET['evolve-hide-notice'] ) && isset( $_GET['_evolve_notice'] ) ) {
				if ( ! wp_verify_nonce( $_GET['_evolve_notice'], 'evolve_hide_notice' ) ) {
					wp_die( __( 'Action failed. Please refresh the page and retry.', 'evolve' ) );
				}

				if ( ! current_user_can( 'manage_options' ) ) {
					wp_die( __( 'Cheatin&#8217; huh?', 'evolve' ) );
				}

				$hide_notice = sanitize_text_field( $_GET['evolve-hide-notice'] );
				update_option( 'evolve_admin_notice_' . $hide_notice, 1 );
			}
		}

		public function activation_notice() {
			global $evolve_theme_name;
			?>
            <div class="notice evolve-notice is-dismissible">
                <p><?php echo evolve_get_svg( 'logo' ) .
				              sprintf( '%1$s %2$s%3$s%4$s %5$s', esc_html__( 'Thank you for installing', 'evolve' ), '<strong>', $evolve_theme_name, '</strong>', esc_html__( 'theme by Theme4Press. To learn more about this theme please visit the about page', 'evolve' ) ); ?>
                    <a class="button"
                       href="<?php echo esc_url( admin_url( 'themes.php?page=about-evolve' ) ); ?>"><?php esc_html_e( 'About', 'evolve' );
						echo ' ' . $evolve_theme_name; ?></a>
                    <a href="<?php echo esc_url( wp_nonce_url( remove_query_arg( array( 'activated' ), add_query_arg( 'evolve-hide-notice', 'about' ) ), 'evolve_hide_notice', '_evolve_notice' ) ); ?>"><?php esc_html_e( 'Dismiss', 'evolve' ); ?></a>
                </p>
            </div>
			<?php
		}

		private function about_theme() {
			global $evolve_theme_version, $evolve_theme_name, $evolve_theme_description;
			?>

            <h1 class="wp-heading-inline">
				<?php esc_html_e( 'About', 'evolve' ); ?>
				<?php echo $evolve_theme_name; ?>
				<?php printf( '%s', $evolve_theme_version ); ?>
            </h1>

            <div class="theme-info-container">
                <div class="theme-info-row">
                    <div class="theme-info-col about-text">
						<?php echo $evolve_theme_description; ?>

                        <p>
                            <a href="<?php echo esc_url( 'https://theme4press.com/evolve-multipurpose-wordpress-theme/?utm_source=evolve-about&utm_medium=theme-homepage-link&utm_campaign=theme-info' ); ?>"
                               class="button"
                               target="_blank"><span
                                        class="dashicons dashicons-admin-home"></span><?php esc_html_e( 'Theme Homepage', 'evolve' ); ?>
                            </a>

                            <a href="<?php echo esc_url( apply_filters( 'evolve_plus_url', 'https://theme4press.com/evolve-multipurpose-wordpress-theme/?utm_source=evolve-about&utm_medium=compare-themes-link&utm_campaign=theme-info#features' ) ); ?>"
                               class="button"
                               target="_blank"><span
                                        class="dashicons dashicons-update"></span><?php esc_html_e( 'Compare With Premium Version', 'evolve' ); ?>
                            </a>

                            <a href="<?php echo esc_url( apply_filters( 'evolve_plus_url', 'https://wordpress.org/support/theme/evolve/reviews/?filter=5' ) ); ?>"
                               class="button"
                               target="_blank"><span
                                        class="dashicons dashicons-star-filled"></span><?php echo sprintf( '%1$s %2$s %3$s', esc_html__( 'Rate', 'evolve' ), $evolve_theme_name, esc_html__( 'Theme', 'evolve' ) ); ?>
                            </a>
                        </p>

                    </div>
                    <div class="theme-info-col theme-screenshot-container">
                        <img src="<?php echo esc_url( get_template_directory_uri() ) . '/screenshot.png'; ?>"/>
                    </div>
                </div>
            </div>

            <h2 class="nav-tab-wrapper">
                <a class="nav-tab <?php if ( empty( $_GET['tab'] ) && $_GET['page'] == 'about-evolve' ) {
					echo 'nav-tab-active';
				} ?>"
                   href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'about-evolve' ), 'themes.php' ) ) ); ?>">
					<?php esc_html_e( 'Let\'s Get Started', 'evolve' ); ?>
                </a>
                <a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'plugins' ) {
					echo 'nav-tab-active';
				} ?>" href="<?php echo esc_url( admin_url( add_query_arg( array(
					'page' => 'about-evolve',
					'tab'  => 'plugins',
				), 'themes.php' ) ) ); ?>">
					<?php esc_html_e( 'Plugins', 'evolve' ); ?>
                </a>
                <a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'changelog' ) {
					echo 'nav-tab-active';
				} ?>" href="<?php echo esc_url( admin_url( add_query_arg( array(
					'page' => 'about-evolve',
					'tab'  => 'changelog',
				), 'themes.php' ) ) ); ?>">
					<?php esc_html_e( 'Changelog', 'evolve' ); ?>
                </a>
                <a class="nav-tab premium-version <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'premium_version' ) {
					echo 'nav-tab-active';
				} ?>" href="<?php echo esc_url( admin_url( add_query_arg( array(
					'page' => 'about-evolve',
					'tab'  => 'premium_version',
				), 'themes.php' ) ) ); ?>">
					<?php esc_html_e( 'Premium Version', 'evolve' ); ?>
                </a>
            </h2>
			<?php
		}

		public function about_page_screen() {
			$current_tab = empty( $_GET['tab'] ) ? 'about' : sanitize_title( $_GET['tab'] );

			if ( is_callable( array( $this, $current_tab . '_tab' ) ) ) {
				return $this->{$current_tab . '_tab'}();
			}

			return $this->about();
		}

		public function about() {
			global $evolve_theme_name;
			?>
            <div class="wrap about-wrap">

				<?php $this->about_theme(); ?>

                <div class="tabs-content">
                    <div class="theme-info-row">

                        <div class="theme-info-col theme-info-col-6">
                            <div class="content-box">
                                <h3><?php esc_html_e( 'Theme Options', 'evolve' ); ?></h3>
                                <p><?php printf( esc_html__( 'Visit the %1$sCustomize%2$s page to set the various theme options', 'evolve' ), '<strong>', '</strong>' ); ?></p>
                                <p>
                                    <a href="<?php echo admin_url( 'customize.php' ); ?>"
                                       class="button"><span
                                                class="dashicons dashicons-admin-appearance"></span><?php esc_html_e( 'Customize', 'evolve' ); ?>
                                    </a>
                                </p>
                            </div>
                        </div>

<!--                        <div class="theme-info-col theme-info-col-6">-->
<!--                            <div class="content-box">-->
<!--                                <h3>--><?php //esc_html_e( 'Pre-built Demos', 'evolve' ); ?><!--</h3>-->
<!---->
<!--								--><?php //if ( class_exists( 'Demo_Awesome' ) ) { ?>
<!--                                    <p>--><?php //printf( esc_html__( 'Import the pre-built demos with %1$sDemo Awesome%2$s - the data importer', 'evolve' ), '<strong>', '</strong>' ); ?><!--</p>-->
<!--                                    <p>-->
<!--                                        <a href="--><?php //echo esc_url( network_admin_url( 'themes.php?page=demo-awesome-importer' ) ); ?><!--"-->
<!--                                           class="button button-primary"><span-->
<!--                                                    class="dashicons dashicons-download"></span>--><?php //esc_html_e( 'Import a demo', 'evolve' ); ?>
<!--                                        </a>-->
<!--                                    </p>-->
<!--								--><?php //} else { ?>
<!--                                    <p>--><?php //printf( esc_html__( 'Install the %1$sDemo Awesome%2$s plugin in order to import the pre-built demos', 'evolve' ), '<strong>', '</strong>' ); ?><!--</p>-->
<!--                                    <p>-->
<!--                                        <a target="_blank"-->
<!--                                           href="--><?php //echo esc_url( network_admin_url( 'plugin-install.php?tab=search&type=term&s=demo+awesome' ) ); ?><!--"-->
<!--                                           class="button button-primary"><span-->
<!--                                                    class="dashicons dashicons-admin-plugins"></span>--><?php //esc_html_e( 'Install', 'evolve' ); ?>
<!--                                        </a>-->
<!--                                    </p>-->
<!--								--><?php //} ?>
<!--                            </div>-->
<!--                        </div>-->

                        <div class="theme-info-col theme-info-col-6">
                            <div class="content-box">
                                <h3><?php esc_html_e( 'Documentation &amp; Knowledge Base', 'evolve' ); ?></h3>
                                <p><?php esc_html_e( 'Learn how to set up the sections of theme in our detailed documentation', 'evolve' ) ?></p>
                                <p>
                                    <a href="<?php echo esc_url( 'https://theme4press.com/docs/?utm_source=evolve-about&utm_medium=documentation-link&utm_campaign=theme-content-box' ); ?>"
                                       class="button"
                                       target="_blank"><span
                                                class="dashicons dashicons-admin-page"></span><?php esc_html_e( 'Documentation', 'evolve' ); ?>
                                    </a>
                                    <a href="<?php echo esc_url( 'https://theme4press.com/knowledge-base/?utm_source=evolve-about&utm_medium=knowledge-base-link&utm_campaign=theme-content-box' ); ?>"
                                       class="button"
                                       target="_blank"><span
                                                class="dashicons dashicons-lightbulb"></span><?php esc_html_e( 'Knowledge Base', 'evolve' ); ?>
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="theme-info-col theme-info-col-6">
                            <div class="content-box">
                                <h3><?php esc_html_e( 'Support Forums', 'evolve' ); ?></h3>
                                <p><?php esc_html_e( 'Got an issue with the theme? Please visit forums and submit any question', 'evolve' ) ?></p>
                                <p>
                                    <a href="<?php echo esc_url( 'http://wordpress.org/support/theme/evolve' ); ?>"
                                       class="button"
                                       target="_blank"><span
                                                class="dashicons dashicons-admin-comments"></span><?php esc_html_e( 'Support', 'evolve' ); ?>
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="theme-info-col theme-info-col-6">
                            <div class="content-box">
                                <h3>
									<?php
									esc_html_e( 'Help Translate', 'evolve' );
									echo ' ' . $evolve_theme_name;
									?>
                                </h3>
                                <p><?php esc_html_e( 'Please help us to localize the theme to your language', 'evolve' ) ?></p>
                                <p>
                                    <a href="<?php echo esc_url( 'https://translate.wordpress.org/projects/wp-themes/evolve' ); ?>"
                                       class="button" target="_blank"><span
                                                class="dashicons dashicons-translation"></span>
										<?php
										esc_html_e( 'Translate', 'evolve' );
										echo ' ' . $evolve_theme_name;
										?>
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="theme-info-col theme-info-col-6">
                            <div class="content-box">
                                <h3><?php esc_html_e( 'General Question', 'evolve' ); ?></h3>
                                <p><?php esc_html_e( 'If you have some general enquiries, feel free to contact us', 'evolve' ) ?></p>
                                <p>
                                    <a href="<?php echo esc_url( 'https://theme4press.com/send-us-an-email/?utm_source=evolve-about&utm_medium=contact-link&utm_campaign=theme-content-box' ); ?>"
                                       class="button"
                                       target="_blank"><span
                                                class="dashicons dashicons-email"></span><?php esc_html_e( 'Contact', 'evolve' ); ?>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
			<?php
		}

		public function plugins_tab() {
			?>
            <div class="wrap about-wrap">

				<?php $this->about_theme(); ?>

                <div class="tabs-content">
                    <div class="theme-info-row">

                        <div class="theme-info-col theme-info-col-6">
                            <div class="content-box">
                                <h3><?php esc_html_e( 'Compatible Plugins', 'evolve' ); ?></h3>
                                <p>
                                <ol>
                                    <li>
                                        <a href="<?php echo esc_url( 'https://wordpress.org/plugins/bbpress/' ); ?>"
                                           target="_blank"><?php esc_html_e( 'bbPress', 'evolve' ); ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo esc_url( 'https://wordpress.org/plugins/buddypress/' ); ?>"
                                           target="_blank"><?php esc_html_e( 'BuddyPress', 'evolve' ); ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo esc_url( 'https://wordpress.org/plugins/contact-form-7/' ); ?>"
                                           target="_blank"><?php esc_html_e( 'Contact Form 7', 'evolve' ); ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo esc_url( 'https://www.gravityforms.com/' ); ?>"
                                           target="_blank"><?php esc_html_e( 'Gravity Forms', 'evolve' ); ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo esc_url( 'https://wordpress.org/plugins/woocommerce/' ); ?>"
                                           target="_blank"><?php esc_html_e( 'WooCommerce', 'evolve' ); ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo esc_url( 'https://wpml.org/' ); ?>"
                                           target="_blank"><?php esc_html_e( 'WPML', 'evolve' ); ?></a>
                                    </li>
                                </ol>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<?php
		}

		public function changelog_tab() {
			global $wp_filesystem;

			?>
            <div class="wrap about-wrap">

				<?php $this->about_theme();

				$changelog = apply_filters( 'evolve_changelog', get_template_directory() . '/changelog.txt' );

				if ( $changelog && is_readable( $changelog ) ) {
					WP_Filesystem();
					$changelog      = $wp_filesystem->get_contents( $changelog );
					$changelog_list = $this->get_changelog( $changelog );

					echo wp_kses_post( $changelog_list );
				}
				?>
            </div>
			<?php
		}

		private function get_changelog( $content ) {
			$matches   = null;
			$regexp    = '~===\s*Changelog\s*===(.*)($)~Uis';
			$changelog = '';

			if ( preg_match( $regexp, $content, $matches ) ) {
				$changes = explode( '\r\n', trim( $matches[1] ) );

				$changelog .= '<pre class="changelog">';

				foreach ( $changes as $index => $line ) {
					$changelog .= wp_kses_post( preg_replace( '~(\s*Version\s*(\d+(?:\.\d+\.\d+)+)\s*|$)~Uis', '<div class="version">${1}</div>', $line ) );
				}

				$changelog .= '</pre>';
			}

			return wp_kses_post( $changelog );
		}

		public function premium_version_tab() {
			?>
            <div class="wrap about-wrap">

				<?php $this->about_theme(); ?>

                <table class="features table-responsive">
                    <thead>
                    <tr>
                        <th colspan="1"></th>
                        <th>
                            <h3><strong><?php esc_html_e( 'evolve Plus', 'evolve' ); ?></strong></h3>
                        </th>
                        <th>
                            <h3><strong><?php esc_html_e( 'evolve', 'evolve' ); ?></strong></h3>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <h4><?php esc_html_e( 'Theme4Press Slider', 'evolve' ); ?></h4>
                        </td>
                        <td class="feature-item"><span class="dashicons dashicons-yes"></span></td>
                        <td class="feature-item"><span class="dashicons dashicons-no"></span></td>
                    </tr>
                    <tr>
                        <td>
                            <h4><?php esc_html_e( 'Built-in Mega Menu', 'evolve' ); ?></h4>
                        </td>
                        <td class="feature-item"><span class="dashicons dashicons-yes"></span></td>
                        <td class="feature-item"><span class="dashicons dashicons-no"></span></td>
                    </tr>
                    <tr>
                        <td>
                            <h4><?php esc_html_e( 'Custom Sidebars', 'evolve' ); ?></h4>
                        </td>
                        <td class="feature-item"><span class="dashicons dashicons-yes"></span></td>
                        <td class="feature-item"><span class="dashicons dashicons-no"></span></td>
                    </tr>
                    <tr>
                        <td>
                            <h4><?php esc_html_e( 'Portfolios', 'evolve' ); ?></h4>
                        </td>
                        <td class="feature-item"><span class="dashicons dashicons-yes"></span></td>
                        <td class="feature-item"><span class="dashicons dashicons-no"></span></td>
                    </tr>
                    <tr>
                        <td>
                            <h4><?php esc_html_e( 'Google Map Contact', 'evolve' ); ?></h4>
                        </td>
                        <td class="feature-item"><span class="dashicons dashicons-yes"></span></td>
                        <td class="feature-item"><span class="dashicons dashicons-no"></span></td>
                    </tr>
                    <tr>
                        <td>
                            <h4><?php esc_html_e( 'Sticky Navigation', 'evolve' ); ?></h4>
                        </td>
                        <td class="feature-item"><span class="dashicons dashicons-yes"></span></td>
                        <td class="feature-item"><span class="dashicons dashicons-no"></span></td>
                    </tr>
                    <tr>
                        <td>
                            <h4><?php esc_html_e( 'Lightbox', 'evolve' ); ?></h4>
                        </td>
                        <td class="feature-item"><span class="dashicons dashicons-yes"></span></td>
                        <td class="feature-item"><span class="dashicons dashicons-no"></span></td>
                    </tr>
                    <tr>
                        <td>
                            <h4><?php esc_html_e( 'Slider Revolution (Bundled)', 'evolve' ); ?></h4>
                        </td>
                        <td class="feature-item"><span class="dashicons dashicons-yes"></span></td>
                        <td class="feature-item"><span class="dashicons dashicons-no"></span></td>
                    </tr>
                    <tr>
                        <td>
                            <h4><?php esc_html_e( 'LayerSlider (Bundled)', 'evolve' ); ?></h4>
                        </td>
                        <td class="feature-item"><span class="dashicons dashicons-yes"></span></td>
                        <td class="feature-item"><span class="dashicons dashicons-no"></span></td>
                    </tr>
                    <tr>
                        <td>
                            <h4><?php esc_html_e( '100% Width Template', 'evolve' ); ?></h4>
                        </td>
                        <td class="feature-item"><span class="dashicons dashicons-yes"></span></td>
                        <td class="feature-item"><span class="dashicons dashicons-no"></span></td>
                    </tr>
                    <tr>
                        <td>
                            <h4><?php esc_html_e( 'Shortcodes', 'evolve' ); ?></h4>
                        </td>
                        <td class="feature-item"><span class="dashicons dashicons-yes"></span></td>
                        <td class="feature-item"><span class="dashicons dashicons-no"></span></td>
                    </tr>
                    <tr>
                        <td>
                            <h4><?php esc_html_e( 'Child Theme', 'evolve' ); ?></h4>
                        </td>
                        <td class="feature-item"><span class="dashicons dashicons-yes"></span></td>
                        <td class="feature-item"><span class="dashicons dashicons-no"></span></td>
                    </tr>
                    <tr>
                        <td>
                            <h4><?php esc_html_e( 'Custom Front Page Builder', 'evolve' ); ?></h4>
                        </td>
                        <td class="feature-item"><span class="dashicons dashicons-yes"></span>
                            <div class="w-100"></div>
                            <div class="extra"><?php esc_html_e( 'EXTRA IN PREMIUM', 'evolve' ); ?></div>
							<?php esc_html_e( 'Unlimited Number Of Content Boxes, Counter Circles And Testimonials. All Items Can
                                Easily Reorder', 'evolve' ); ?>
                        </td>
                        <td class="feature-item pr-4"><span class="dashicons dashicons-yes"></span>
                            <div class="w-100"></div><?php esc_html_e( 'Content Boxes Limited To 4, Counter Circles Limited To 3, Testimonials Limited To 2', 'evolve' ); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4><?php esc_html_e( 'Custom Headers', 'evolve' ); ?></h4>
                        </td>
                        <td class="feature-item"><span class="dashicons dashicons-yes"></span>
                            <div class="w-100"></div>
                            <div class="extra"><?php esc_html_e( 'EXTRA IN PREMIUM', 'evolve' ); ?></div>
							<?php esc_html_e( 'Custom Headers Can Be Set Per Post/Page', 'evolve' ); ?>
                        </td>
                        <td class="feature-item pr-4"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td>
                            <h4><?php esc_html_e( 'Header Layouts', 'evolve' ); ?></h4>
                        </td>
                        <td class="feature-item"><span class="dashicons dashicons-yes"></span>
                            <div class="w-100"></div>
                            <div class="extra"><?php esc_html_e( 'EXTRA IN PREMIUM', 'evolve' ); ?></div>
							<?php esc_html_e( '5 Header Layouts', 'evolve' ); ?>
                        </td>
                        <td class="feature-item pr-4"><span class="dashicons dashicons-yes"></span>
                            <div class="w-100"></div><?php esc_html_e( '2 Header Layouts', 'evolve' ); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4><?php esc_html_e( 'Live Customizer', 'evolve' ); ?></h4>
                        </td>
                        <td class="feature-item"><span class="dashicons dashicons-yes"></span>
                            <div class="w-100"></div>
                            <div class="extra"><?php esc_html_e( 'EXTRA IN PREMIUM', 'evolve' ); ?></div>
							<?php esc_html_e( '300+ Theme Options', 'evolve' ); ?>
                        </td>
                        <td class="feature-item pr-4"><span class="dashicons dashicons-yes"></span>
                            <div class="w-100"></div><?php esc_html_e( '240+ Theme Options', 'evolve' ); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4><?php esc_html_e( 'WooCommerce', 'evolve' ); ?></h4>
                        </td>
                        <td class="feature-item"><span class="dashicons dashicons-yes"></span>
                            <div class="w-100"></div>
                            <div class="extra"><?php esc_html_e( 'EXTRA IN PREMIUM', 'evolve' ); ?></div>
							<?php esc_html_e( 'Custom/Global Sidebar For WooCommerce Pages', 'evolve' ); ?>
                        </td>
                        <td class="feature-item"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td>
                            <h4><?php esc_html_e( 'Bootstrap Slider', 'evolve' ); ?></h4>
                        </td>
                        <td class="feature-item"><span class="dashicons dashicons-yes"></span>
                            <div class="w-100"></div>
                            <div class="extra"><?php esc_html_e( 'EXTRA IN PREMIUM', 'evolve' ); ?></div>
							<?php esc_html_e( 'Unlimited Number Of Slides, Slides Reorder', 'evolve' ); ?>
                        </td>
                        <td class="feature-item"><span class="dashicons dashicons-yes"></span>
                            <div class="w-100"></div><?php esc_html_e( 'Limited To 5 Slides', 'evolve' ); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4><?php esc_html_e( 'Parallax Slider', 'evolve' ); ?></h4>
                        </td>
                        <td class="feature-item"><span class="dashicons dashicons-yes"></span>
                            <div class="w-100"></div>
                            <div class="extra"><?php esc_html_e( 'EXTRA IN PREMIUM', 'evolve' ); ?></div>
							<?php esc_html_e( 'Unlimited Number Of Slides, Slides Reorder', 'evolve' ); ?>
                        </td>
                        <td class="feature-item"><span class="dashicons dashicons-yes"></span>
                            <div class="w-100"></div><?php esc_html_e( 'Limited To 5 Slides', 'evolve' ); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4><?php esc_html_e( 'Posts Slider', 'evolve' ); ?></h4>
                        </td>
                        <td class="feature-item"><span class="dashicons dashicons-yes"></span>
                            <div class="w-100"></div>
                            <div class="extra"><?php esc_html_e( 'EXTRA IN PREMIUM', 'evolve' ); ?></div>
							<?php esc_html_e( 'Up To 30 Slides', 'evolve' ); ?>
                        </td>
                        <td class="feature-item"><span class="dashicons dashicons-yes"></span>
                            <div class="w-100"></div><?php esc_html_e( 'Limited To 5 Slides', 'evolve' ); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4><?php esc_html_e( 'WordPress Coding Standards', 'evolve' ); ?></h4>
                        </td>
                        <td class="feature-item"><span class="dashicons dashicons-yes"></span></td>
                        <td class="feature-item"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td>
                            <h4><?php esc_html_e( 'Schema.org SEO Optimization', 'evolve' ); ?></h4>
                        </td>
                        <td class="feature-item"><span class="dashicons dashicons-yes"></span></td>
                        <td class="feature-item"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td>
                            <h4><?php esc_html_e( 'bbPress &amp; BuddyPress', 'evolve' ); ?></h4>
                        </td>
                        <td class="feature-item"><span class="dashicons dashicons-yes"></span></td>
                        <td class="feature-item"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td>
                            <h4><?php esc_html_e( 'Contact Forms Compatible', 'evolve' ); ?></h4>
                        </td>
                        <td class="feature-item"><span class="dashicons dashicons-yes"></span></td>
                        <td class="feature-item"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td>
                            <h4><?php esc_html_e( 'WPML &amp; Translation Ready', 'evolve' ); ?></h4>
                        </td>
                        <td class="feature-item"><span class="dashicons dashicons-yes"></span></td>
                        <td class="feature-item"><span class="dashicons dashicons-yes"></span></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="feature-item">
                            <a href="<?php echo esc_url( apply_filters( 'evolve_plus_url', 'https://theme4press.com/evolve-multipurpose-wordpress-theme/?utm_source=evolve-features-compare&utm_medium=learn-more-link&utm_campaign=features-tab' ) ); ?>"
                               class="button button-primary"
                               target="_blank"><?php esc_html_e( 'View Premium Version', 'evolve' ); ?></a></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>

            </div>
			<?php
		}
	}
}

return new Evolve_Admin();