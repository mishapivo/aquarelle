 <?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Travia
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php $hidetopbar = get_theme_mod('hide_topbar', '1'); ?>
<?php if($hidetopbar == ''){ ?>
<div class="header-top">
  <div class="head-top-inner">
  		<div class="top-left">
        	<?php if(get_theme_mod('email') != '') { ?>
        		<div class="mail">
                	<i class="fa fa-envelope" aria-hidden="true"></i> <a href="<?php echo esc_url('mailto:'.get_theme_mod('email')); ?>"><?php echo get_theme_mod('email'); ?></a>
                </div><!-- mail -->
           <?php } ?>
           <?php if(get_theme_mod('phone') != '') { ?>
                <div class="call">
                	<i class="fa fa-phone" aria-hidden="true"></i> <?php echo esc_html(get_theme_mod('phone',true)); ?>
                </div><!-- call -->
            <?php } ?><div class="clear"></div>
        </div><!-- top-left -->
        <div class="top-right">
        		<ul>
                	<?php if((get_theme_mod('scname1')) || (get_theme_mod('sclink1')) != '') {?>
                		<li><a href="<?php echo esc_url(get_theme_mod('sclink1',true)); ?>"><i class="fa fa-<?php echo esc_attr(get_theme_mod('scname1',true)); ?>" aria-hidden="true"></i></a></li>
                    <?php } ?>
                    <?php if((get_theme_mod('scname2')) || (get_theme_mod('sclink2')) != '') { ?>
                    	<li><a href="<?php echo esc_url(get_theme_mod('sclink2',true)); ?>"><i class="fa fa-<?php echo esc_attr(get_theme_mod('scname2',true)); ?>" aria-hidden="true"></i></a></li>
                    <?php } ?>
                    <?php if((get_theme_mod('scname3')) || (get_theme_mod('sclink3')) != '') { ?>
                    	<li><a href="<?php echo esc_url(get_theme_mod('sclink3',true)); ?>"><i class="fa fa-<?php echo esc_attr(get_theme_mod('scname3',true)); ?>" aria-hidden="true"></i></a></li>
                    <?php } ?>
                    <?php if((get_theme_mod('scname4')) || (get_theme_mod('sclink4')) != '') { ?>
                    	<li><a href="<?php echo esc_url(get_theme_mod('sclink4',true)); ?>"><i class="fa fa-<?php echo esc_attr(get_theme_mod('scname4',true)); ?>" aria-hidden="true"></i></a></li>
                    <?php } ?>
                </ul>
        </div><!-- top-right --><div class="clear"></div>
  </div><!-- head-top-inner -->
</div><!--end header-top--> 
<?php } ?>


<div id="header">
	<div class="header-inner">
      <div class="logo">
           <?php travia_the_custom_logo(); ?>
			    <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_attr(bloginfo( 'name' )); ?></a></h1>
					<?php $description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
						<p><?php echo esc_attr($description); ?></p>
					<?php endif; ?>
      </div><!-- logo -->      
      <div class="prime-menu">
	<div class="prime-inner">
        <div class="toggle">
                <a class="toggleMenu" href="#">
                    <?php esc_attr_e('Menu','travia'); ?>                
                </a>
         </div><!-- toggle -->    
        <div class="sitenav">                   
            <?php wp_nav_menu( array('theme_location' => 'primary') ); ?> 
        </div><!--.sitenav -->
        <div class="clear"></div>
      </div><!-- prime-inner -->
</div><!-- prime-menu --><div class="clear"></div>
</div><!-- .header-inner-->
</div><!-- .header -->