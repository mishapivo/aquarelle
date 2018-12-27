<?php
/**
 * Info setup
 *
 * @package Travel_Gem
 */

if ( ! function_exists( 'travel_gem_info_setup' ) ) :

	/**
	 * Info setup.
	 *
	 * @since 1.0.0
	 */
	function travel_gem_info_setup() {

		$config = array(

			// Welcome content.
			'welcome_content' => sprintf( esc_html__( '%1$s is now installed and ready to use. We want to make sure you have the best experience using the theme and that is why we gathered here all the necessary information for you. Thanks for using our theme!', 'travel-gem' ), 'Travel Gem' ),

			// Tabs.
			'tabs' => array(
				'getting-started' => esc_html__( 'Getting Started', 'travel-gem' ),
				'support'         => esc_html__( 'Support', 'travel-gem' ),
				'useful-plugins'  => esc_html__( 'Useful Plugins', 'travel-gem' ),
				'demo-content'    => esc_html__( 'Demo Content', 'travel-gem' ),
				'upgrade-to-pro'  => esc_html__( 'Upgrade to Pro', 'travel-gem' ),
				),

			// Quick links.
			'quick_links' => array(
				'theme_url' => array(
					'text' => esc_html__( 'Theme Details', 'travel-gem' ),
					'url'  => 'https://wenthemes.com/item/wordpress-themes/travel-gem/',
					),
				'demo_url' => array(
					'text' => esc_html__( 'View Demo', 'travel-gem' ),
					'url'  => 'https://demo.wenthemes.com/travel-gem/',
					),
				'documentation_url' => array(
					'text' => esc_html__( 'View Documentation', 'travel-gem' ),
					'url'  => 'https://themepalace.com/instructions/themes/travel-gem/',
					),
				'rating_url' => array(
					'text' => esc_html__( 'Rate This Theme','travel-gem' ),
					'url'  => 'https://wordpress.org/support/theme/travel-gem/reviews/#new-post',
					),
				),

			// Getting started.
			'getting_started' => array(
				'one' => array(
					'title'       => esc_html__( 'Theme Documentation', 'travel-gem' ),
					'icon'        => 'dashicons dashicons-format-aside',
					'description' => esc_html__( 'Please check our full documentation for detailed information on how to setup and customize the theme.', 'travel-gem' ),
					'button_text' => esc_html__( 'View Documentation', 'travel-gem' ),
					'button_url'  => 'https://themepalace.com/instructions/themes/travel-gem/',
					'button_type' => 'link',
					'is_new_tab'  => true,
					),
				'two' => array(
					'title'       => esc_html__( 'Static Front Page', 'travel-gem' ),
					'icon'        => 'dashicons dashicons-admin-generic',
					'description' => esc_html__( 'To achieve custom home page other than blog listing, you need to create and set static front page.', 'travel-gem' ),
					'button_text' => esc_html__( 'Static Front Page', 'travel-gem' ),
					'button_url'  => admin_url( 'customize.php?autofocus[section]=static_front_page' ),
					'button_type' => 'primary',
					),
				'three' => array(
					'title'       => esc_html__( 'Theme Options', 'travel-gem' ),
					'icon'        => 'dashicons dashicons-admin-customizer',
					'description' => esc_html__( 'Theme uses Customizer API for theme options. Using the Customizer you can easily customize different aspects of the theme.', 'travel-gem' ),
					'button_text' => esc_html__( 'Customize', 'travel-gem' ),
					'button_url'  => wp_customize_url(),
					'button_type' => 'primary',
					),
				'four' => array(
					'title'       => esc_html__( 'Page Builder', 'travel-gem' ),
					'icon'        => 'dashicons dashicons-admin-settings',
					'description' => esc_html__( 'Page Builder by SiteOrigin is integrated in the theme to achieve different layouts. Please make sure both Page Builder by SiteOrigin and SiteOrigin Widgets Bundle plugins are installed and activated.', 'travel-gem' ),
					),
				'five' => array(
					'title'       => esc_html__( 'Demo Content', 'travel-gem' ),
					'icon'        => 'dashicons dashicons-layout',
					'description' => sprintf( esc_html__( 'To import sample demo content, %1$s plugin should be installed and activated. After plugin is activated, visit Import Demo Data menu under Appearance.', 'travel-gem' ), esc_html__( 'One Click Demo Import', 'travel-gem' ) ),
					'button_text' => esc_html__( 'Demo Content', 'travel-gem' ),
					'button_url'  => admin_url( 'themes.php?page=travel-gem-info&tab=demo-content' ),
					'button_type' => 'secondary',
					),
				'six' => array(
					'title'       => esc_html__( 'Theme Preview', 'travel-gem' ),
					'icon'        => 'dashicons dashicons-welcome-view-site',
					'description' => esc_html__( 'You can check out the theme demos for reference to find out what you can achieve using the theme and how it can be customized.', 'travel-gem' ),
					'button_text' => esc_html__( 'View Demo', 'travel-gem' ),
					'button_url'  => 'https://demo.wenthemes.com/travel-gem/',
					'button_type' => 'link',
					'is_new_tab'  => true,
					),
				),

			// Support.
			'support' => array(
				'one' => array(
					'title'       => esc_html__( 'Contact Support', 'travel-gem' ),
					'icon'        => 'dashicons dashicons-sos',
					'description' => esc_html__( 'Got theme support question or found bug or got some feedbacks? Best place to ask your query is the dedicated Support forum for the theme.', 'travel-gem' ),
					'button_text' => esc_html__( 'Contact Support', 'travel-gem' ),
					'button_url'  => 'https://themepalace.com/forum/free-themes/travel-gem/',
					'button_type' => 'link',
					'is_new_tab'  => true,
					),
				'two' => array(
					'title'       => esc_html__( 'Theme Documentation', 'travel-gem' ),
					'icon'        => 'dashicons dashicons-format-aside',
					'description' => esc_html__( 'Please check our full documentation for detailed information on how to setup and customize the theme.', 'travel-gem' ),
					'button_text' => esc_html__( 'View Documentation', 'travel-gem' ),
					'button_url'  => 'https://themepalace.com/instructions/themes/travel-gem/',
					'button_type' => 'link',
					'is_new_tab'  => true,
					),
				'three' => array(
					'title'       => esc_html__( 'Child Theme', 'travel-gem' ),
					'icon'        => 'dashicons dashicons-admin-tools',
					'description' => esc_html__( 'For advanced theme customization, it is recommended to use child theme rather than modifying the theme file itself. Using this approach, you wont lose the customization after theme update.', 'travel-gem' ),
					'button_text' => esc_html__( 'Learn More', 'travel-gem' ),
					'button_url'  => 'https://developer.wordpress.org/themes/advanced-topics/child-themes/',
					'button_type' => 'link',
					'is_new_tab'  => true,
					),
				),

			// Useful plugins.
			'useful_plugins' => array(
				'description' => esc_html__( 'Theme supports some helpful WordPress plugins to enhance your site.', 'travel-gem' ),
				),

			// Demo content.
			'demo_content' => array(
				'description' => sprintf( esc_html__( 'To import demo content for this theme, %1$s plugin is needed. Please make sure plugin is installed and activated. After plugin is activated, you will see Import Demo Data menu under Appearance.', 'travel-gem' ), '<a href="https://wordpress.org/plugins/one-click-demo-import/" target="_blank">' . esc_html__( 'One Click Demo Import', 'travel-gem' ) . '</a>' ),
				),

			// Upgrade content.
			'upgrade_to_pro' => array(
				'description' => esc_html__( 'If you want more advanced features then you can upgrade to the premium version of the theme.', 'travel-gem' ),
				'button_text' => esc_html__( 'Buy Travel Gem Pro', 'travel-gem' ),
				'button_url'  => 'https://themepalace.com/downloads/travel-gem-pro/',
				'button_type' => 'primary',
				'is_new_tab'  => true,
				),
			);

		Travel_Gem_Info::init( $config );
	}

endif;

add_action( 'after_setup_theme', 'travel_gem_info_setup' );
