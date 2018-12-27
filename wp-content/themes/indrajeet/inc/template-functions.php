<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Indrajeet
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function indrajeet_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'indrajeet_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function indrajeet_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'indrajeet_pingback_header' );


/* Footer Templates Starts */
if ( ! function_exists( 'indrajeet_footer_widgets' ) ) :
	/**
	 * Footer widgets.
	 *
	 * @since 0.0.2
	 */
	function indrajeet_footer_widgets() {

		// Get no of active Sidebars.
		$count = indrajeet_active_footer_count();

		$class = '';

		switch ( $count ) {
			case '2':
				$class = '6';
				break;
			case '3':
				$class = '4';
				break;
			case '4':
				$class = '3';
				break;

			default:
				$class = '12';
				break;
		}

		$footer_areas = array( 'footer-sidebar', 'footer-sidebar-2', 'footer-sidebar-3', 'footer-sidebar-4' );
		foreach ( $footer_areas as $footer ) {

			if ( is_active_sidebar( $footer ) ) : ?>

					<div class="col-md-<?php echo esc_attr( $class ); ?>" >
						<div class="footer_area-wrapper" >
							<?php dynamic_sidebar( $footer ); ?>
						</div>
					</div>
				<?php

				endif;

		}
	}

endif;

add_action( 'indrajeet_footer_widget_wrapper', 'indrajeet_footer_widgets' );



if ( ! function_exists( 'indrajeet_excerpt_length' ) ) :

	/**
	 * Set the post excerpt length to 40 words.
	 *
	 * @param int $length The number of excerpt characters.
	 * @return int The filtered number of characters.
	 */
	function indrajeet_excerpt_length( $length ) {
		return 40;
	}

endif;

add_filter( 'excerpt_length', 'indrajeet_excerpt_length' );



if ( ! function_exists( 'indrajeet_show_header' ) ) :
	/**
	 * Site header section.
	 *
	 * @since 0.0.3
	 */
	function indrajeet_show_header() {
		$header_image = get_custom_header();
		$header_image_style = '';
		$header_image_class = '';
		if ( '' !== $header_image->url ) {
			$header_image_style = 'background-image: url(' . esc_url( $header_image->url ) . ');background-position: 50%;background-size: cover;';
			$header_image_class = 'site-header-image';
		}
		?>
		<header id="masthead" class="site-header <?php echo esc_attr( $header_image_class ); ?>" role="banner" style="<?php echo esc_attr( $header_image_style ); ?>">
	<div class="container">
		<?php
		do_action( 'indrajeet_after_header_container_open' );
		?>
		<div class="header-main-menu">
			<div class="site-branding">
				<?php
				/**
				 * Hook indrajeet_site_branding.
				 *
				 * @hooked indrajeet_site_identity - 10
				 */
				do_action( 'indrajeet_site_branding' );
				?>
				</div><!-- .site-branding -->

				<div id="main-nav" class="">
				<?php
				/**
				 * Hook indrajeet_main_nav.
				 *
				 * @hooked indrajeet_main_menu - 10
				 */
				do_action( 'indrajeet_main_nav' );
				?>
				</div>
				<div id="header-search">
			    <a href="#search-form">
				     <i class="fa fa-search"></i>
			    </a>
			    <div id="search-form">
				    <span class="close"><i class="fa fa-times"></i></span>
						<?php
						$header_itinerary_search = indrajeet_get_theme_option( 'indrajeet_enable_header_wp_travel_search' );

						if ( class_exists( 'WP_Travel' ) && true === $header_itinerary_search ) { ?>
							<section id="section-itinerary-search" class="section-itinerary-search">
								<div class="container">
									<div class="row">
										<div class="col-sm-12">
											<?php wp_travel_search_form(); ?>
										</div>
									</div>
								</div>
							</section>
						<?php } else {
							// Get Default Search Form.
							get_search_form();

						}
						?>
				</div>
				</div>
			
				</div>
				<?php
				/**
				 * Hook indrajeet_before_header_container_close.
				 */
				do_action( 'indrajeet_before_header_container_close' );

				?>
			</div>
		</header><!-- #masthead -->
		<?php
	}

endif;

add_action( 'indrajeet_header', 'indrajeet_show_header' );

if ( ! function_exists( 'indrajeet_top_header' ) ) :

	/**
	 * Top header tags before header.
	 *
	 * @since 0.0.3
	 */
	function indrajeet_top_header() {
		?>

		<div class="theme-top-header bg-black">
			<div class="container">
			   <div class="row">
			   		<div class="col-sm-12">
					   <div class="d-block d-md-none">
					    	<span class="top-header-mobile-title">
								<?php echo esc_html('Welcome To', 'indrajeet'); ?>	
								<?php bloginfo( 'name' ); ?>
							</span>		
					    	<span id="top-mobile-menu" class="travel-mobile-menu"><i class="fa fa-bars"></i></span>
					    </div>
					   <div class="navbar-collapse indrajeet-theme-topnavbar-collapse" aria-expanded="false">
							<div class="float-left">
								<?php
								/**
								 * Hook indrajeet_top_header_left.
								 *
								 * @hooked indrajeet_top_header_left_content - 10
								 */
								do_action( 'indrajeet_top_header_left' );
								?>
							</div>
							<div class="float-right">
								<?php
								/**
								 * Hook indrajeet_top_header_right.
								 *
								 * @hooked indrajeet_top_header_right_content - 10
								 */
								do_action( 'indrajeet_top_header_right' );
								?>
							</div>
					   </div>
					</div>
				</div>	   
			</div>
		</div> 
		<?php
	}

endif;

add_action( 'before_header', 'indrajeet_top_header' );


if ( ! function_exists( 'indrajeet_top_header_right_content' ) ) :

	/**
	 * Top header right content.
	 *
	 * @since 0.0.3
	 */
	function indrajeet_top_header_right_content() {
		wp_nav_menu( array( 
			'theme_location' => 'social_menu', 
			'container_class' => 'header-social menu-icons',
			'menu_class' => 'nav navbar-nav social-menu', 
			'fallback_cb' => false ) );
	}

endif;

add_action( 'indrajeet_top_header_right', 'indrajeet_top_header_right_content' );


if ( ! function_exists( 'indrajeet_top_header_left_content' ) ) :

	/**
	 * Top header left content.
	 *
	 * @since 0.0.3
	 */
	function indrajeet_top_header_left_content() {
		wp_nav_menu( array( 
			'theme_location' => 'topbar_menu', 
			'container_class' => 'header-info menu-icons', 
			'menu_class' => 'nav navbar-nav theme-top-left',
			'fallback_cb' => false ) );
	}

endif;

add_action( 'indrajeet_top_header_left', 'indrajeet_top_header_left_content' );


if ( ! function_exists( 'indrajeet_get_theme_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function indrajeet_get_theme_option( $key ) {

		$default_options = indrajeet_default_values();

		if ( empty( $key ) ) {
			return;
		}

		$theme_options = (array) get_theme_mod( 'indrajeet_options' );
		$theme_options = wp_parse_args( $theme_options, $default_options );

		$value = null;

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;

	}

endif;