<!DOCTYPE html>
<html <?php if ( YA_AMP){echo 'amp '; $amp['ontouch'] = '';$amp['scale']='minimum-scale=1,';}else{$amp['ontouch'] = ' ontouchstart=""';$amp['scale']='';} language_attributes(); ?>>
<head>
	<?php
	if ( YA_AMP ){
		get_template_part( 'inc/amp','head' );
	}else{
		if ( YA_GA_GTAG != '') yahman_addons_ga_gtag();
		if ( YA_AMP_READY ) get_template_part( 'inc/amp','url' );
	}	?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width,<?php echo $amp['scale']; ?>initial-scale=1">

	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif;



get_template_part( 'template-parts/header','meta_json' );

wp_head();

?>
</head>
<body <?php body_class(); echo $amp['ontouch']; ?>>
	<?php if( YA_AMP && ( YA_GA_GTAG != '' || YA_GA_AMP != '' ) ) yahman_addons_ga_amp(); ?>

	<input id="t_menu" class="dn" type="checkbox" />
	<?php
    //over header widget
	if( is_active_sidebar( 'over_header' ))  get_template_part( 'template-parts/header','over' );
	?>
	<header id="h_wrap" class="f_box f_col box_shadow h_sticky">
		<div id="h_flex" class="f_box f_col110 retaina_p0">
			<div id="site_h" role="banner">
				<div class="container sh_con f_box ai_c jc_c f_col110 retaina_p0">

					<?php simple_days_menu_box(); ?>

					<div class="title_tag f_box ai_c f_col">

						<?php simple_days_site_title_display(); ?>

					</div>

					<?php $mod = get_theme_mod( 'simple_days_menu_layout','1');

					if( is_active_sidebar( 'header_widget' )){
						?>
						<div class="hw_con f_box ai_c jc_c f_wrap">
							<?php dynamic_sidebar( 'header_widget' ); ?>
						</div>
						<?php
						if(($mod == "1" || $mod == "2") && is_active_nav_menu('primary'))echo '<div class="m_box"></div>';
					} ?>
				</div>

				<?php
			if(YA_AMP && !is_ssl()){}else{
				simple_days_mobile_search();
			} ?>
		</div>
		<div id="nav_h" class="<?php if($mod == "3" || $mod == "4")echo 'nav_h2 '; ?>f_box">
			<?php simple_days_primary_menu(); ?>
		</div>

	</div>
</header>
<?php
if ( is_active_nav_menu('sub')) {
	simple_days_sub_menu();
}
?>




<?php




//alert box
if( get_theme_mod( 'simple_days_alert_box',false) ) get_template_part( 'template-parts/header','alertbox' );
//Header image
if( is_home() && get_header_image() ) get_template_part( 'template-parts/header','image' );

