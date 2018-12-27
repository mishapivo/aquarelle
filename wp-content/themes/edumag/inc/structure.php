<?php
/**
 * EduMag basic theme structure hooks
 *
 * This file contains structural hooks.
 *
 * @package Theme Palace
 * @subpackage EduMag
 * @since EduMag 0.1
 */

$options = edumag_get_theme_options();


if ( ! function_exists( 'edumag_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since EduMag 0.1
	 */
	function edumag_doctype() {
	?>
		<!DOCTYPE html>
			<html <?php language_attributes(); ?>>
	<?php
	}
endif;
add_action( 'edumag_doctype', 'edumag_doctype', 10 );

if ( ! function_exists( 'edumag_head' ) ) :
	/**
	 * Header Codes
	 *
	 * @since EduMag 0.1
	 *
	 */
	function edumag_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif;
	}
endif;
add_action( 'edumag_before_wp_head', 'edumag_head', 10 );

if ( ! function_exists( 'edumag_page_start' ) ) :
	/**
	 * Page starts html codes
	 *
	 * @since EduMag 0.1
	 *
	 */
	function edumag_page_start() {
		?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'edumag' ); ?></a>

		<?php
	}
endif;
add_action( 'edumag_page_start_action', 'edumag_page_start', 10 );

if ( ! function_exists( 'edumag_page_end' ) ) :
	/**
	 * Page end html codes
	 *
	 * @since EduMag 0.1
	 *
	 */
	function edumag_page_end() {
		?>
		</div><!-- #page -->
		<?php
	}
endif;
add_action( 'edumag_page_end_action', 'edumag_page_end', 10 );

if ( ! function_exists( 'edumag_header_start' ) ) :
	/**
	 * Header start html codes
	 *
	 * @since EduMag 0.1
	 *
	 */
	function edumag_header_start() {
		?>
		<header id="masthead" class="site-header make-sticky page-section" role="banner">
		<?php
	}
endif;
add_action( 'edumag_header_action', 'edumag_header_start', 10 );

if ( ! function_exists( 'edumag_site_branding' ) ) :
	/**
	 * Site branding codes
	 *
	 * @since EduMag 0.1
	 *
	 */
	function edumag_site_branding() {
		?>
		<div class="container">
			<?php 
				$site_title = get_bloginfo( 'name' );
				$description = get_bloginfo( 'description', 'display' );

				if ( has_custom_logo() || display_header_text() ) :
			?>
				<div class="site-branding">
					<?php if ( has_custom_logo() ) : ?>				
						<div class="site-logo">
		            		<?php the_custom_logo(); ?>
		          		</div>
					<?php
						endif;
						if ( display_header_text() ) { ?>

					<div id="site-header">
					<?php
						if ( is_front_page() && is_home() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
						endif;

						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
						<?php
						endif; ?>
					</div><!-- #site-header -->
					<?php } ?>
				</div><!-- .site-branding -->
			<?php 
				endif;

				if( is_active_sidebar( 'header_advertisement' ) ) :
			?>
				<div class="pull-right">
				<?php	dynamic_sidebar( 'header_advertisement' );	?>
				</div><!-- .pull-right -->
			<?php 
				endif;
			?>
		</div><!--.container-->
		<?php
	}
endif;
add_action( 'edumag_header_action', 'edumag_site_branding', 20 );

if ( ! function_exists( 'edumag_site_navigation' ) ) :
	/**
	 * Site navigation codes
	 *
	 * @since EduMag 0.1
	 *
	 */
	function edumag_site_navigation() { ?>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<div class="container">
				<?php 
					$args = array( 
						'theme_location' => 'primary',
						'menu_id' => 'primary-menu',
						'container' => 'div',
						'fallback_cb' => 'edumag_menu_fallback_cb',
					);
					wp_nav_menu( $args ); ?>
			</div><!-- .container -->
		</nav><!-- #site-navigation -->

	<?php
	}
endif;
add_action( 'edumag_header_action', 'edumag_site_navigation', 30 );


if ( ! function_exists( 'edumag_append_search' ) ) :
	/**
	 * Add search bar to menu
	 */
	function edumag_append_search( $items, $args ) {
		if ( 'primary' == $args->theme_location ) {
			$options        = edumag_get_theme_options();

		   // Search Box
		   	if ( $options['append_search'] == true ) {
		     	$search = '<div class="search" id="search">
                                '.get_search_form(false).'
                            </div>';
		   	} else {
		        $search = '';
		   	}

		   	$items = $items.$search;
		}

		return $items;
	}
endif;
add_filter( 'wp_nav_menu_items','edumag_append_search', 10, 2 );


if ( ! function_exists( 'edumag_header_end' ) ) :
	/**
	 * Header end html codes
	 *
	 * @since EduMag 0.1
	 *
	 */
	function edumag_header_end() {
		?>
		</header><!-- #masthead -->
		<?php
	}
endif;
add_action( 'edumag_header_action', 'edumag_header_end', 50 );

if ( ! function_exists( 'edumag_mobile_menu' ) ) :
	/**
	 * Mobile menu  html codes
	 *
	 * @since EduMag 0.1
	 *
	 */
	function edumag_mobile_menu() {
		if ( has_nav_menu( 'primary' ) ) :
			$args = array( 
					'theme_location' => 'primary',
					'menu_id' => 'primary-menu',
					'container' => 'false'
			);
		?>
		<!-- Mobile Menu -->
    	<nav id="sidr-left-top" class="mobile-menu sidr left">
    		<?php if( has_custom_logo() ): ?>
      		<div class="site-branding text-center">
          		<div class="site-logo">
            		<?php the_custom_logo(); ?>
          		</div><!-- end .site-logo -->
      		</div><!-- end .site-branding -->
      		<?php endif; 
				wp_nav_menu( $args );
      		?>
	    </nav><!-- end left-menu -->

	    <a id="sidr-left-top-button" class="menu-button right" href="#sidr-left-top"><i class="fa fa-bars"></i></a>
		<?php
	endif;
	}
endif;
add_action( 'edumag_after_header', 'edumag_mobile_menu', 10 );


if ( ! function_exists( 'edumag_content_start' ) ) :
	/**
	 * Site content codes
	 *
	 * @since EduMag 0.1
	 *
	 */
	function edumag_content_start() {
		?>
		<div id="content" class="site-content">
		<?php
	}
endif;
add_action( 'edumag_content_start_action', 'edumag_content_start', 10 );

if ( ! function_exists( 'edumag_content_end' ) ) :
	/**
	 * Site content codes
	 *
	 * @since EduMag 0.1
	 *
	 */
	function edumag_content_end() {
		?>
		</div><!-- #content -->
		<?php
	}
endif;
add_action( 'edumag_content_end_action', 'edumag_content_end', 10 );

if ( ! function_exists( 'edumag_add_breadcrumb' ) ) :

	/**
	 * Add breadcrumb.
	 *
	 * @since EduMag 0.1
	 */
	function edumag_add_breadcrumb() {
		$options = edumag_get_theme_options();
		// Bail if Breadcrumb disabled.
		$breadcrumb = $options['breadcrumb_enable'];
		if ( false === $breadcrumb ) {
			return;
		}
		// Bail if Home Page.
		if ( is_front_page() && !is_home() ) {
			return;
		}

		echo '<div id="breadcrumb-list" class="os-animation" data-os-animation="fadeInUp">';
				/**
				 * edumag_simple_breadcrumb hook
				 *
				 * @hooked edumag_simple_breadcrumb -  10
				 *
				 */
				do_action( 'edumag_simple_breadcrumb' );
		echo '</div><!-- #breadcrumb-list -->';
		return;
	}

endif;
add_action( 'edumag_add_breadcrumb', 'edumag_add_breadcrumb' , 30 );

if ( ! function_exists( 'edumag_get_footer_content' ) ) :

	/**
	 * Add breadcrumb.
	 *
	 * @since EduMag 0.1
	 */
	function edumag_get_footer_content() { 
		$options = edumag_get_theme_options(); // get theme options
		$footer_sidebar_data    = edumag_footer_sidebar_class();
		$footer_sidebar_class   = $footer_sidebar_data['class'];
		$footer_sidebar_widgets = $footer_sidebar_data['active_sidebar'];

		// site info
		$search = array( '[the-year]', '[site-link]' );

        $replace = array( date( 'Y' ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );

        $options['copyright_text'] = str_replace( $search, $replace, $options['copyright_text'] );
	?>
		<footer id="colophon" class="site-footer" role="contentinfo">
			<?php if ( !empty( $footer_sidebar_widgets ) ) : ?>			
			<div class="container page-section">
				<div class="row <?php echo esc_attr( $footer_sidebar_class ); ?>">

				<?php foreach( $footer_sidebar_widgets as $active_widget ) : ?>
					<div class="column-wrapper">
					<?php 
		      			if ( is_active_sidebar( esc_html( $active_widget ) ) ){
		      				dynamic_sidebar( esc_html( $active_widget ) );
		      			}
		      		?>
					</div><!-- .column-wrapper -->
				<?php endforeach; ?>

				</div><!-- .row -->
        	</div><!-- .container -->
        	<?php endif; ?>
        	
        	<div class="clear"></div>
			<div class="bottom-footer">
				<div class="container">
					<div class="site-info">
						<p><?php echo wp_kses_data( $options['copyright_text'] ); ?>
							<span class="sep"> | </span>
							<?php printf( '%1$s by %2$s', esc_html__( 'Edumag', 'edumag' ), '<a href="' . esc_url( 'http://www.themepalace.com/' ) . '" rel="designer" target="_blank">'. esc_html__( 'Theme Palace', 'edumag' ) .'</a>' ); 
								if ( function_exists( 'the_privacy_policy_link' ) ) {
									the_privacy_policy_link( '<span> | </span>' );
								}
							?>
						</p>
              			
					</div><!-- .site-info -->
				</div><!-- .container -->
			</div><!--.bottom-footer-->
		</footer><!-- #colophon -->
	<?php } 
endif;
add_action( 'edumag_footer_content', 'edumag_get_footer_content' );


if ( ! function_exists( 'edumag_back_to_top' ) ) :
	/**
	 * Back to top option
	 *
	 * @since EduMag 0.1
	 *
	 */
	function edumag_back_to_top() { 
		$options = edumag_get_theme_options();
		if ( $options['scroll_top_visible'] === true ) : ?>
			<div class="backtotop"><i class="fa fa-angle-up"></i></div><!-- .backtotop -->
		<?php
		endif;
	}
endif;
add_action( 'edumag_back_to_top', 'edumag_back_to_top', 10 );