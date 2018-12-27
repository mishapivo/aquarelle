<?php
/**
 * The header for our theme
 *
 * @package WordPress
 * @subpackage chalak-driving-school
 * @since 1.0
 * @version 0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'chalak-driving-school' ) ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="header">
	<div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','chalak-driving-school'); ?></a></div>
	<div class="top-header">
		<div class="container">	
			<?php get_template_part( 'template-parts/header/header', 'image' ); ?>	
			<div class="top">
				<span class="phone">
				<?php if( get_theme_mod( 'chalak_driving_school_call','' ) != '') { ?>
			        <i class="fas fa-phone"></i><span class="col-org"><?php echo esc_html( get_theme_mod('chalak_driving_school_call',__('0123456789','chalak-driving-school')) ); ?></span>
			    <?php } ?>	
			    </span>
			    <span class="email">	
			    <?php if( get_theme_mod( 'chalak_driving_school_mail','' ) != '') { ?>
			        <i class="fas fa-envelope"></i><span class="col-org"><?php echo esc_html( get_theme_mod('chalak_driving_school_mail',__('support@sitename.com','chalak-driving-school')) ); ?></span>
			    <?php } ?>	
			    </span>	   							
				<span class="social-icons">
					<?php if( get_theme_mod( 'chalak_driving_school_facebook_url') != '') { ?>
				      <a href="<?php echo esc_url( get_theme_mod( 'chalak_driving_school_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
				    <?php } ?>
				    <?php if( get_theme_mod( 'chalak_driving_school_twitter_url') != '') { ?>
				      <a href="<?php echo esc_url( get_theme_mod( 'chalak_driving_school_twitter_url','' ) ); ?>"><i class="fab fa-twitter"></i></a>
				    <?php } ?>
				    <?php if( get_theme_mod( 'chalak_driving_school_youtube_url') != '') { ?>
				      <a href="<?php echo esc_url( get_theme_mod( 'chalak_driving_school_youtube_url','' ) ); ?>"><i class="fab fa-youtube"></i></a>
				    <?php } ?>
				    <?php if( get_theme_mod( 'chalak_driving_school_linkedin_url') != '') { ?>
				      <a href="<?php echo esc_url( get_theme_mod( 'chalak_driving_school_linkedin_url','' ) ); ?>"><i class="fab fa-linkedin-in"></i></a>
				    <?php } ?>    
				    <?php if( get_theme_mod( 'chalak_driving_school_insta_url') != '') { ?>
				      <a href="<?php echo esc_url( get_theme_mod( 'chalak_driving_school_insta_url','' ) ); ?>"><i class="fab fa-instagram"></i></a>
				    <?php } ?>
				</span>
			</div>
		</div>
	</div>	
    <div class="menu-section">
		<div class="container">
			<div class="main-top">
			    <div class="row">
			    	<div class="col-md-3">
						<div class="logo">
					        <?php if( has_custom_logo() ){ chalak_driving_school_the_custom_logo();
					           }else{ ?>
					          <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					          <?php $description = get_bloginfo( 'description', 'display' );
					          if ( $description || is_customize_preview() ) : ?> 
					            <p class="site-description"><?php echo esc_html($description); ?></p>
					        <?php endif; }?>
					    </div>
					</div>
			      	<div class="col-md-9">
						<div class="nav">
							<?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
						</div>
					</div>
			    </div>
			</div>
		</div>
	</div>	
</div><hr class="hr-hr">