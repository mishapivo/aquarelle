<?php
/**
 * Display Header.
 * @package Relief Medical Hospital
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'relief-medical-hospital' ) ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','relief-medical-hospital'); ?></a></div>

<div class="header-box">
	<?php  get_template_part( 'template-parts/header/top', 'bar' ); ?>
	<div class="container">
	  	<div class="row">
		  	<div class="col-lg-3 col-md-3">
		  		<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
		  	</div>
		  	<div class="col-lg-6 col-md-6">
		  		<?php get_template_part( 'template-parts/navigation/site', 'nav' ); ?>
		  	</div>
		  	<div class="col-lg-3 col-md-3">
		  		<div class="Appointment-btn">
                  <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" title="<?php esc_attr_e( 'APPOINMENT', 'relief-medical-hospital' ); ?>"><?php esc_html_e('APPOINMENT','relief-medical-hospital'); ?><i class="fas fa-angle-right"></i>
                  </a>
                </div>
		  	</div>
	 	</div> 
	</div>
</div>