<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package euphoric
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'euphoric' ); ?></a>

	<?php
	$disable_top_panel = get_theme_mod('disable_top_panel',0);
	$disable_search_form = get_theme_mod('disable_search_form',0);
	$subscribe_text = get_theme_mod('subscribe_text','');
	$subscribe_url = get_theme_mod('subscribe_url','');
	$show_banner = get_theme_mod('show_banner','home-page');
	$select_top_category = get_theme_mod('select_top_category','');

	/**
	 * Front End Top Panel
	 */
	do_action('euphoric_frontend_top_panel'); ?>

	<header id="masthead" class="site-header">
		<div id="main-header" class="main-header">
			<?php if($disable_top_panel==0){
				if($select_top_category!='' || (is_active_sidebar( 'top-panel' ) ) ){ ?>
				<div class="top-panel-toggle"> </div>
			<?php }
			}
			/**
			 * Social navigation
			 */
			do_action('euphoric_frontend_navigation_top');  ?>
			<div class="top-header">
				<div class="top-header-bg" <?php if(has_header_image()){ ?> style="background-image:url(<?php echo esc_url(get_header_image() );?>);" <?php } ?>>
					<div class="wrap">
						<div class="top-header-content">
							<?php 
							/**
							 * Social navigation
							 */
							do_action ('euphoric_frontend_social_navigation');

							/**
							 * Site Branding
							 */
							do_action ('euphoric_frontend_site_branding'); ?>

							<div class="header-right">
								<?php if($subscribe_text !=''){ ?>
								<div class="header-btn">
									<a class="btn button" href="<?php echo esc_url($subscribe_url); ?>" target="_blank"><?php echo esc_html($subscribe_text); ?></a>
								</div><!-- .header-btn -->
								<?php }
								if($disable_search_form ==0) { ?>
									<div class="search-toggle"><span></span></div>
								<?php } ?>
							</div><!-- .header-right -->
						</div><!-- .top-header-content -->
					</div><!-- .wrap -->
				</div><!-- .top-header-bg -->
				<div id="nav-sticker">
					<?php
					/**
					 * Social navigation
					 */
					do_action('euphoric_frontend_navigation_top');  ?>
				</div><!-- #nav-sticker -->

				<?php 
					/**
					* Search Form
					*/
					do_action('euphoric_frontend_search_form');
				 ?>

			</div><!-- .top-header -->
			<?php
			/**
			* Main Banner
			*/

			if($show_banner=='home-page' ){ 
				if ( is_front_page() && is_home() ) {
				// Default homepage
					do_action('euphoric_frontend_main_banner');

				}elseif ( is_front_page()){
				//Static homepage
					do_action('euphoric_frontend_main_banner');

				}

			} elseif ($show_banner=='static-homepage') {
				
				if ( is_front_page()){
				//Static homepage
					do_action('euphoric_frontend_main_banner');

				}
			} elseif ($show_banner=='blog') {

				if ( is_home()){
				//Blog page
					do_action('euphoric_frontend_main_banner');

				}
			} else {
				//everything else
				do_action('euphoric_frontend_main_banner');

			} ?>		
		</div><!-- .main-header -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<?php if ( is_front_page() && is_home() ) {
		// Default homepage
			do_action('euphoric_frontend_hightlight_category');

		}elseif ( is_front_page()){
		//Static homepage
			do_action('euphoric_frontend_hightlight_category');

		} ?>
