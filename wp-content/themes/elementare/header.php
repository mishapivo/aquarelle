<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package elementare
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if (elementare_options('_animate_cursor', '') == 1) : ?>
	<div class="cursor"></div>
<?php endif; ?>
<?php if(elementare_options('_show_loader', '0') == 1 ) : ?>
	<div class="elementareLoader">
		<?php elementare_loadingPage(); ?>
	</div>
<?php endif; ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'elementare' ); ?></a>

	<?php $menuFixedMobile = elementare_options('_menu_fixed_mobile', ''); ?>
	<header id="masthead" class="site-header <?php echo $menuFixedMobile ? 'yesMobileFixed' : 'noMobileFixed' ?>">
		

		<div class="mainHeader">
			<div class="mainLogo">
				<div class="elementareSubHeader title">
					<div class="site-branding">
						<?php
						if ( function_exists( 'the_custom_logo' ) ) : ?>
						<div class="elementareLogo" itemscope itemtype="http://schema.org/Organization">
							<?php the_custom_logo(); ?>
						<?php endif; ?>
						<div class="elementareTitleText">
							<?php if ( is_front_page() && is_home() || is_page_template('template-onepage.php') ) : ?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php else : ?>
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
							endif;

							$description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) : ?>
								<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
							<?php
							endif; ?>
						</div>
						</div>
					</div><!-- .site-branding -->
				</div>
			</div>
			<?php if ( is_active_sidebar( 'sidebar-push' ) ) : ?>
			<div class="hamburger-menu">
				<div class="hamburger-box">
					<div class="hamburger-inner"></div>
				</div>
			</div>
			<?php endif; ?>
			<?php $showSearchButton = elementare_options('_search_button', '1');
			if ($showSearchButton) : ?>
			<div class="search-button">
				<div class="search-circle"></div>
				<div class="search-line"></div>
			</div>
			<?php endif; ?>
			<div class="elementareHeader">
				<div class="elementareSubHeader">
					<nav id="site-navigation" class="main-navigation">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-lg fa-bars" aria-hidden="true"></i></button>
						<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							) );
						?>
					</nav><!-- #site-navigation -->
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
	<?php if (is_home() && !is_front_page() ) : ?>
		<?php
			$pageID = get_option('page_for_posts');
			if ('' != get_the_post_thumbnail($pageID)) : 
			$effectFeatImage = elementare_options('_effect_featimage', 'withZoom');
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $pageID ), 'elementare-the-post-big' );
		?>
			<div class="elementareBox">
				<div class="elementareBigImage <?php echo esc_attr($effectFeatImage); ?>" style="background-image: url(<?php echo esc_url($image[0]); ?>);">
					<div class="elementareImageOp">
					</div>
				</div>
			</div>
		<?php endif; ?>
	<?php endif; ?>
	<?php if (is_singular(array( 'post', 'page' )) && '' != get_the_post_thumbnail() && !is_page_template('template-onepage.php') ) : ?>
		<?php while ( have_posts() ) : 
		the_post(); ?>
		<?php 
			$src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'elementare-the-post-big');
			$showScrollDownButton = elementare_options('_scrolldown_button', '1');
			$effectFeatImage = elementare_options('_effect_featimage', 'withZoom');
		?>
		<div class="elementareBox">
			<div class="elementareBigImage <?php echo esc_attr($effectFeatImage); ?>" style="background-image: url(<?php echo esc_url($src[0]); ?>);">
				<div class="elementareImageOp">
				</div>
			</div>
			<div class="elementareBigText">
				<?php if ($showScrollDownButton) : ?>
					<div class="scrollDown"><div class="mouse"></div></div>
				<?php endif; ?>
			</div>
		</div>
		<?php endwhile; ?>
	<?php endif; ?>
	
	<div id="content" class="site-content">
