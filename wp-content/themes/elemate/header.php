<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package EleMate
 * @since 1.0.0
 * @version 1.0.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="index-banner" class="parallax-container">
	<div class="nav-wrapper">	
		<nav class="transparent" role="navigation">
			<div class="nav-wrapper col s12 container">		
				<a id="logo-container" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="brand-logo">		
					<?php bloginfo( 'name' ); ?>
				</a>
    
			<div id="nav-mobile" class="side-nav">			
			
				<h2 class="header">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</h2>			
				<a href="#" data-activates="nav-mobile" class="button-close right"><i class="material-icons"><?php esc_attr_e( 'close', 'elemate' ); ?></i></a>
				<?php wp_nav_menu( array( 'theme_location' => 'primary'  ) );
			
				if ( is_active_sidebar( 'sidebar-3' ) ) {			
				?>
					<aside class="widget-area" role="complementary">
						<?php dynamic_sidebar( 'sidebar-3' ); ?>
					</aside><!-- #secondary -->
				<?php } ?>
			
			</div>
				<a href="#" data-activates="nav-mobile" class="button-collapse right"><i class="material-icons"><?php esc_attr_e( 'menu', 'elemate' ); ?></i></a>
			</div>
		</nav>
	</div>
<?php 

if ( is_front_page() || is_home() ) { ?>
			
		<div class="section no-pad-bot">		
			<div class="container">
				<div class="center"><?php elemate_the_custom_logo(); ?>	</div>
				<?php if ( get_theme_mod( 'elemate_intro_title' )) { ?>
				<h1 class="header center">				
					<?php echo wp_kses_post( get_theme_mod( 'elemate_intro_title' )) ;?>				
				</h1>
				<?php } else { ?>
				<h1 class="header center">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="brand-logo"><?php bloginfo( 'name' ); ?></a>
				</h1>		
				<?php } ?>  
				
				<div class="row center">
					<?php if ( get_theme_mod( 'elemate_header_text' )) { ?>
						<h5 class="header col s12">
							<?php echo wp_kses_post(get_theme_mod( 'elemate_header_text' )) ;?>
						</h5>
					<?php } else { ?>
						<h5 class="header col s12">
							<?php $description = get_bloginfo( 'description', 'display' );
								if ( $description || is_customize_preview() ) {
									echo esc_attr( $description );
								} 
							?>
						</h5>
					<?php } ?>
				</div>
				<?php $elemate_cta_url = get_theme_mod( 'elemate_intro_button_url' ); ?>
				<?php $elemate_cta_txt = get_theme_mod( 'elemate_intro_button_text' ); ?>
				<?php $elemate_cta_tgt = get_theme_mod( 'elemate_cta_url_target' ); ?>
				<?php if ( get_theme_mod( 'elemate_intro_button_url' ) || get_theme_mod( 'elemate_intro_button_text' ) ) { ?>
				<div class="row center">
				    <a id="download-button" href="<?php echo esc_url( $elemate_cta_url ) ?>" target="<?php echo esc_attr( $elemate_cta_tgt ) ?>" type="button" class="btn-large waves-effect waves-light lighten-1">
				        <?php echo esc_html( $elemate_cta_txt ) ?>
				    </a>
				</div>
				<?php } ?>

			</div>
		</div>
		<?php $header_image = get_header_image(); 
			if ( ! empty( $header_image ) ) { ?>
			<div class="parallax"><img src="<?php echo esc_url( $header_image ); ?>"></div>
		<?php }
} ?>
</div>