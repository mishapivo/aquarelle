<?php
/**
 * The header for our theme
 *
 * @package WordPress
 * @subpackage lz-charity-welfare
 * @since 1.0
 * @version 0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'lz-charity-welfare' ) ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="top-header">
	<div class="container">	
		<?php get_template_part( 'template-parts/header/header', 'image' ); ?>	
		<div class="row">
			<div class="col-md-6 p-0">
				<div class="top">
					<?php if( get_theme_mod( 'lz_charity_welfare_call','' ) != '') { ?>	
				        <i class="fas fa-phone"></i><span class="col-org"><?php echo esc_html( get_theme_mod('lz_charity_welfare_call',__('0123456789','lz-charity-welfare')) ); ?></span>
				    <?php } ?>		
				    <?php if( get_theme_mod( 'lz_charity_welfare_mail','' ) != '') { ?>	
				        <i class="fas fa-envelope"></i><span class="col-org"><?php echo esc_html( get_theme_mod('lz_charity_welfare_mail',__('info@companyname.com','lz-charity-welfare')) ); ?></span>
				    <?php } ?>		   		
				</div>	
			</div>
			<div class="col-md-6 p-0">
				<div class="social-icons">
					<?php if( get_theme_mod( 'lz_charity_welfare_facebook_url') != '') { ?>
		              <a href="<?php echo esc_url( get_theme_mod( 'lz_charity_welfare_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
		            <?php } ?>
		            <?php if( get_theme_mod( 'lz_charity_welfare_twitter_url') != '') { ?>
		              <a href="<?php echo esc_url( get_theme_mod( 'lz_charity_welfare_twitter_url','' ) ); ?>"><i class="fab fa-twitter"></i></a>
		            <?php } ?>
		            <?php if( get_theme_mod( 'lz_charity_welfare_linkedin_url') != '') { ?>
		              <a href="<?php echo esc_url( get_theme_mod( 'lz_charity_welfare_linkedin_url','' ) ); ?>"><i class="fab fa-linkedin-in"></i></a>
		            <?php } ?>
		             <?php if( get_theme_mod( 'lz_charity_welfare_google_plus_url') != '') { ?>
		              <a href="<?php echo esc_url( get_theme_mod( 'lz_charity_welfare_google_plus_url','' ) ); ?>"><i class="fab fa-google-plus-g"></i></a>
		            <?php } ?>
		            <?php if( get_theme_mod( 'lz_charity_welfare_insta_url') != '') { ?>
		              <a href="<?php echo esc_url( get_theme_mod( 'lz_charity_welfare_insta_url','' ) ); ?>"><i class="fab fa-instagram"></i></a>
		            <?php } ?>
		            
				</div>	
			</div>
		</div>
	</div>
</div>
<div id="header">
	<div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','lz-charity-welfare'); ?></a></div>
    <div class="menu-section">
		<div class="container">
			<div class="main-top">
				<div class="row">
					<div class="col-md-3">
						<div class="logo">
					        <?php if( has_custom_logo() ){ lz_charity_welfare_the_custom_logo();
					           }else{ ?>
					          <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					          <?php $description = get_bloginfo( 'description', 'display' );
					          if ( $description || is_customize_preview() ) : ?> 
					            <p class="site-description"><?php echo esc_html($description); ?></p>
					        <?php endif; }?>
					    </div>
					</div>
					<div class="col-md-8">
						<div class="nav">
							<?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
						</div>
					</div>
					<div class="search-box col-md-1 col-sm-1">
          				<span><i class="fas fa-search"></i></span>
        			</div> 
				</div>
				<div class="serach_outer">
			        <div class="closepop"><i class="far fa-window-close"></i></div>
			        <div class="serach_inner">
			          <?php get_search_form(); ?>
			        </div>
		      	</div> 
			</div>
		</div>
	</div>
</div>