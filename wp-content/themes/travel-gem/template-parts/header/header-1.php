<?php
/**
 * Header template
 *
 * @package Travel_Gem
 */

?>

<div id="tophead">
	<div class="container">
		<?php travel_gem_render_contact_info(); ?>
		<div class="header-social-wrapper">
			<?php travel_gem_render_social_links( 'default' ); ?>
		</div><!-- .header-social-wrapper -->
	</div><!-- .container -->
</div><!-- #tophead -->

<header id="masthead" class="site-header">
	<div class="container">

		<?php travel_gem_render_site_branding(); ?>

		<div id="header-right">
			<div id="quick-link-buttons">
				<?php
				$quote_button_text = travel_gem_get_option( 'quote_button_text' );
				$quote_button_url  = travel_gem_get_option( 'quote_button_url' );
				?>
				<?php if ( ! empty( $quote_button_text ) && ! empty( $quote_button_url ) ) : ?>
					<a href="<?php echo esc_url( $quote_button_url ); ?>" class="custom-button quick-link-button"><?php echo esc_html( $quote_button_text ); ?></a>
				<?php endif; ?>
			</div><!-- #quick-link-buttons -->
		</div><!-- #header-right -->

		<div id="main-navigation">
			<nav id="site-navigation" class="main-navigation">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'fallback_cb'    => 'travel_gem_primary_navigation_fallback',
				) );
				?>
			</nav><!-- #site-navigation -->
		</div><!-- #main-navigation -->

	</div><!-- .container -->
</header><!-- #masthead -->
