<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package IWeb_Pathology
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'iweb-pathology' ); ?></a>

	<header id="masthead" class="site-header">
		<?php if ( get_theme_mod( 'iwebpatho_display_topbar','0' ) === '1' ) : ?>
		<div class="topbarsocial">
			<div class="topbarsocial-a">
			<?php if ( null != esc_html( get_theme_mod( 'iwebpatho_topbar_add' ) ) ) : ?>
				<div class="topbarsocial-a1"><span class="fa fa-map-marker"></span><?php echo esc_html( get_theme_mod( 'iwebpatho_topbar_add' ) ); ?></div>
				<?php endif; ?>
				<?php if ( null != esc_html( get_theme_mod( 'iwebpatho_topbar_tel' ) ) ) : ?>
				<div class="topbarsocial-a2"><span class="fa fa-phone" style="margin-left:10px;"></span><?php echo esc_html( get_theme_mod( 'iwebpatho_topbar_tel' ) ); ?></div>
				<?php endif; ?>
				<?php if ( null != esc_html( get_theme_mod( 'iwebpatho_topbar_btntxt' ) ) ) : ?>
				<div class="topbarsocial-a2">
				<a class="topbarbut" href="<?php echo esc_url( get_theme_mod( 'iwebpatho_topbar_btnurl' ) );?>">
					<?php echo esc_html( get_theme_mod( 'iwebpatho_topbar_btntxt' ) );?></a></div>
				<?php endif; ?>
			</div>

		<div class="topbarsocial-b">
			<?php if ( esc_url( get_theme_mod( 'iwebpatho_top_social_fb_url' ) ) != null ) : ?>
			<a href='<?php echo esc_url( get_theme_mod( 'iwebpatho_top_social_fb_url' ) ); ?>'>
				<i class="fa fa-facebook"></i></a><?php endif; ?>
			<?php if ( esc_url( get_theme_mod( 'iwebpatho_top_social_tw_url' ) ) != null ) : ?>
			<a href='<?php echo esc_url( get_theme_mod( 'iwebpatho_top_social_tw_url' ) ); ?>'>
				<i class="fa fa-twitter"></i></a><?php endif; ?>
			<?php if ( esc_url( get_theme_mod( 'iwebpatho_top_social_inst_url' ) ) != null ) : ?>
			 <a href='<?php echo esc_url( get_theme_mod( 'iwebpatho_top_social_inst_url' ) ); ?>'>
				 <i class="fa fa-instagram"></i></a><?php endif; ?>
			<?php if ( esc_url( get_theme_mod( 'iwebpatho_top_social_in_url' ) ) != null ) : ?>
			 <a href='<?php echo esc_url( get_theme_mod( 'iwebpatho_top_social_in_url' ) ); ?>'>
				 <i class="fa fa-linkedin"></i></a><?php endif; ?>
		</div>
		</div>
		<?php endif; ?>
		<div class="fullwidth">
			<div id="header-90">
				<div class="site-branding">
					<div class="logo-l">
						<?php
						the_custom_logo(); ?>
					</div>
					<div class="title-r">
						<?php
						if ( is_front_page() && is_home() ) :
							?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
						else :
							?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
						endif;
						$iweb_pathology_description = get_bloginfo( 'description', 'display' );
						if ( $iweb_pathology_description || is_customize_preview() ) :
							?>
							<p class="site-description"><?php echo $iweb_pathology_description; /* WPCS: xss ok. */ ?></p>
						<?php endif; ?>
					</div>
				</div><!-- .site-branding -->
				<div class="inavbar">
					<nav id="site-navigation" class="main-navigation" role="navigation">
							<button class="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></button>
							<?php wp_nav_menu( array(
								'theme_location' => 'primary',
								'menu_class' => 'nav-menu',
							) ); ?>
					</nav>
				</div>
			</div>
		</div>
		</header><!-- #masthead -->

	<div id="content" class="site-content">
