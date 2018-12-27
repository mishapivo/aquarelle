<?php
/**
 * Functions hooked to custom hook.
 *
 * @package Business_Cast
 */

if ( ! function_exists( 'business_cast_skip_to_content' ) ) :

	/**
	 * Add skip to content.
	 *
	 * @since 1.0.0
	 */
	function business_cast_skip_to_content() {
		?><a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'business-cast' ); ?></a><?php
	}
endif;

add_action( 'business_cast_action_before', 'business_cast_skip_to_content', 15 );

if ( ! function_exists( 'business_cast_site_branding' ) ) :

	/**
	 * Site branding.
	 *
	 * @since 1.0.0
	 */
	function business_cast_site_branding() {
		?>
		<div class="site-branding">

			<?php business_cast_the_custom_logo(); ?>

			<?php $show_title = business_cast_get_option( 'show_title' ); ?>
			<?php $show_tagline = business_cast_get_option( 'show_tagline' ); ?>

			<?php if ( true === $show_title || true === $show_tagline ) : ?>
				<div id="site-identity">
					<?php if ( true === $show_title ) : ?>
						<?php if ( is_front_page() && is_home() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php endif; ?>
					<?php endif; ?>

					<?php if ( true === $show_tagline ) : ?>
						<p class="site-description"><?php bloginfo( 'description' ); ?></p>
					<?php endif; ?>
				</div><!-- #site-identity -->
			<?php endif; ?>
		</div><!-- .site-branding -->

		<div class="right-head">
			<?php
			$buy_button_link = business_cast_get_option( 'buy_button_link' );
			$buy_button_text = business_cast_get_option( 'buy_button_text' );
			?>
			<?php if ( ! empty( $buy_button_text ) && ! empty( $buy_button_link ) ) : ?>
				<a href="<?php echo esc_url( $buy_button_link ); ?>" class="custom-button header-button"><?php echo esc_html( $buy_button_text ); ?></a>
			<?php endif; ?>

			<?php business_cast_render_quick_contact(); ?>
		</div><!-- .right-head -->
	<?php
	}

endif;

add_action( 'business_cast_action_header', 'business_cast_site_branding' );

if ( ! function_exists( 'business_cast_mobile_navigation' ) ) :

	/**
	 * Mobile navigation.
	 *
	 * @since 1.0.0
	 */
	function business_cast_mobile_navigation() {
		?>
		<div class="mobile-nav-wrap">
			<a id="mobile-trigger" href="#mob-menu"><i class="fas fa-align-right"></i></a>
			<div id="mob-menu">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'container'      => '',
					'fallback_cb'    => 'business_cast_primary_navigation_fallback',
				) );
				?>
			</div><!-- #mob-menu -->
		</div><!-- .mobile-nav-wrap -->
		<?php
	}

endif;

add_action( 'business_cast_action_before', 'business_cast_mobile_navigation', 20 );

if ( ! function_exists( 'business_cast_add_top_head_content' ) ) :

	/**
	 * Add top head section.
	 *
	 * @since 1.0.0
	 */
	function business_cast_add_top_head_content() {
		// Check if top head content is disabled.
		$status = apply_filters( 'business_cast_filter_top_head_status', true, 1 );

		if ( true !== $status ) {
			return;
		}
		?>
		<div id="tophead" class="top-header">
			<div class="container">
				<div id="main-nav">
					<nav id="site-navigation" class="main-navigation" role="navigation">
						<div class="wrap-menu-content">
							<?php
							wp_nav_menu(
								array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
								'fallback_cb'    => 'business_cast_primary_navigation_fallback',
								)
							);
							?>
						</div><!-- .wrap-menu-content -->
					</nav><!-- #site-navigation -->
				</div><!-- #main-nav -->

				<?php $show_search_in_header = business_cast_get_option( 'show_search_in_header' ); ?>
				<?php if ( true === $show_search_in_header ) : ?>
					<div class="header-search-box">
						<a href="#" class="search-icon"><i class="fas fa-search"></i></a>
						<div class="search-box-wrap">
							<?php get_search_form(); ?>
						</div>
					</div><!-- .header-search-box -->
				<?php endif; ?>

				<?php if ( true === business_cast_get_option( 'show_social_in_header' ) && has_nav_menu( 'social' ) ) : ?>
					<div id="header-social">
						<?php the_widget( 'Business_Cast_Social_Widget' ); ?>
					</div><!-- .header-social -->
				<?php endif; ?>
			</div><!-- .container -->
		</div><!-- #tophead -->
		<?php
	}

endif;

add_action( 'business_cast_action_before_header', 'business_cast_add_top_head_content', 5 );

if ( ! function_exists( 'business_cast_footer_copyright' ) ) :

	/**
	 * Footer copyright.
	 *
	 * @since 1.0.0
	 */
	function business_cast_footer_copyright() {

		// Check if footer is disabled.
		$footer_status = apply_filters( 'business_cast_filter_footer_status', true );
		if ( true !== $footer_status ) {
			return;
		}

		// Copyright content.
		$copyright_text = business_cast_get_option( 'copyright_text' );
		$copyright_text = apply_filters( 'business_cast_filter_copyright_text', $copyright_text );
		?>

		<?php if ( has_nav_menu( 'footer' ) ) : ?>
			<?php
			$footer_menu_content = wp_nav_menu( array(
				'theme_location' => 'footer',
				'container'      => 'div',
				'container_id'   => 'footer-navigation',
				'depth'          => 1,
				'fallback_cb'    => false,
			) );
			?>
		<?php endif; ?>
		<?php if ( ! empty( $copyright_text ) ) : ?>
			<div class="copyright">
				<?php echo wp_kses_post( $copyright_text ); ?>
			</div>
		<?php endif; ?>
		<div class="site-info">
			<?php echo esc_html__( 'Business Cast by', 'business-cast' ) . ' <a target="_blank" rel="designer" href="https://axlethemes.com/">Axle Themes</a>'; ?>
		</div><!-- .site-info -->
		<?php
	}

endif;

add_action( 'business_cast_action_footer', 'business_cast_footer_copyright', 10 );

if ( ! function_exists( 'business_cast_add_sidebar' ) ) :

	/**
	 * Add sidebar.
	 *
	 * @since 1.0.0
	 */
	function business_cast_add_sidebar() {

		global $post;

		$global_layout = business_cast_get_option( 'global_layout' );
		$global_layout = apply_filters( 'business_cast_filter_theme_global_layout', $global_layout );

		// Check if single template.
		if ( $post && is_singular() ) {
			$post_options = get_post_meta( $post->ID, 'business_cast_settings', true );
			if ( isset( $post_options['post_layout'] ) && ! empty( $post_options['post_layout'] ) ) {
				$global_layout = $post_options['post_layout'];
			}
		}

		// Include primary sidebar.
		if ( 'no-sidebar' !== $global_layout ) {
			get_sidebar();
		}

		// Include secondary sidebar.
		switch ( $global_layout ) {
			case 'three-columns':
				get_sidebar( 'secondary' );
				break;

			default:
				break;
		}

	}

endif;

add_action( 'business_cast_action_sidebar', 'business_cast_add_sidebar' );

if ( ! function_exists( 'business_cast_custom_posts_navigation' ) ) :

	/**
	 * Posts navigation.
	 *
	 * @since 1.0.0
	 */
	function business_cast_custom_posts_navigation() {

		$pagination_type = business_cast_get_option( 'pagination_type' );

		switch ( $pagination_type ) {
			case 'default':
				the_posts_navigation();
			break;

			case 'numeric':
				the_posts_pagination();
			break;

			default:
			break;
		}

	}
endif;

add_action( 'business_cast_action_posts_navigation', 'business_cast_custom_posts_navigation' );

if ( ! function_exists( 'business_cast_add_image_in_single_display' ) ) :

	/**
	 * Add image in single template.
	 *
	 * @since 1.0.0
	 */
	function business_cast_add_image_in_single_display() {

		if ( has_post_thumbnail() ) {
			$args = array(
				'class' => 'business-cast-post-thumb aligncenter',
			);
			the_post_thumbnail( 'large', $args );
		}

	}

endif;

add_action( 'business_cast_single_image', 'business_cast_add_image_in_single_display' );

if ( ! function_exists( 'business_cast_footer_goto_top' ) ) :

	/**
	 * Go to top.
	 *
	 * @since 1.0.0
	 */
	function business_cast_footer_goto_top() {
		$go_to_top_status = business_cast_get_option( 'go_to_top_status' );
		if ( true === $go_to_top_status ) {
			echo '<a href="#page" class="scrollup" id="btn-scrollup"><i class="fas fa-angle-up"></i></a>';
		}
	}

endif;

add_action( 'business_cast_action_after', 'business_cast_footer_goto_top', 20 );

if ( ! function_exists( 'business_cast_add_front_page_widget_area' ) ) :

	/**
	 * Add front page widget area.
	 *
	 * @since 1.0.0
	 */
	function business_cast_add_front_page_widget_area() {

		if ( is_page_template( 'templates/front.php' ) ) {
			if ( is_active_sidebar( 'sidebar-front-page-widget-area' ) ) {
				echo '<div id="sidebar-front-page-widget-area" class="widget-area">';
				dynamic_sidebar( 'sidebar-front-page-widget-area' );
				echo '</div><!-- #sidebar-front-page-widget-area -->';
			} else {
				if ( current_user_can( 'edit_theme_options' ) ) {
					echo '<div id="sidebar-front-page-widget-area" class="widget-area">';
					business_cast_message_front_page_widget_area();
					echo '</div><!-- #sidebar-front-page-widget-area -->';
				}
			}
		}

	}
endif;

add_action( 'business_cast_action_before_content', 'business_cast_add_front_page_widget_area', 7 );

if ( ! function_exists( 'business_cast_add_footer_widgets' ) ) :

	/**
	 * Add footer widgets.
	 *
	 * @since 1.0.0
	 */
	function business_cast_add_footer_widgets() {

		get_template_part( 'template-parts/footer-widgets' );

	}
endif;

add_action( 'business_cast_action_before_footer', 'business_cast_add_footer_widgets', 5 );

if ( ! function_exists( 'business_cast_add_custom_header' ) ) :

	/**
	 * Add custom header.
	 *
	 * @since 1.0.0
	 */
	function business_cast_add_custom_header() {

		if ( is_front_page() || is_home() ) {
			return;
		}

		$image = get_header_image();
		$extra_style = '';
		if ( ! empty( $image ) ) {
			$extra_style .= 'style="background-image:url(\'' . esc_url( $image ) . '\');"';
		}
		?>
		<div id="custom-header" <?php echo $extra_style; ?>>
			<div class="custom-header-wrapper">
				<div class="container">
					<?php do_action( 'business_cast_action_custom_header_title' ); ?>
					<?php do_action( 'business_cast_add_breadcrumb' ); ?>
				</div><!-- .container -->
			</div><!-- .custom-header-content -->
		</div><!-- #custom-header -->
		<?php
	}

endif;

add_action( 'business_cast_action_before_content', 'business_cast_add_custom_header', 6 );

if ( ! function_exists( 'business_cast_add_title_in_custom_header' ) ) :

	/**
	 * Add title in custom header.
	 *
	 * @since 1.0.0
	 */
	function business_cast_add_title_in_custom_header() {

		echo '<h1 class="page-title">';

		if ( is_home() ) {
			echo esc_html( business_cast_get_option( 'blog_page_title' ) );
		} elseif ( is_singular() ) {
			echo single_post_title( '', false );
		} elseif ( is_archive() ) {
			the_archive_title();
		} elseif ( is_search() ) {
			printf( esc_html__( 'Search Results for: %s', 'business-cast' ),  get_search_query() );
		} elseif ( is_404() ) {
			esc_html_e( '404 Error', 'business-cast' );
		}

		echo '</h1>';

	}

endif;

add_action( 'business_cast_action_custom_header_title', 'business_cast_add_title_in_custom_header' );

if ( ! function_exists( 'business_cast_add_breadcrumb' ) ) :

	/**
	 * Add breadcrumb.
	 *
	 * @since 1.0.0
	 */
	function business_cast_add_breadcrumb() {

		// Bail if home page.
		if ( is_front_page() || is_home() ) {
			return;
		}

		echo'<div id="breadcrumb">';
		business_cast_breadcrumb();
		echo '</div>';

	}

endif;

add_action( 'business_cast_add_breadcrumb', 'business_cast_add_breadcrumb', 10 );
