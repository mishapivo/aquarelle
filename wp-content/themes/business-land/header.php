<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package business-land
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
<?php $business_land_pageloader_status = business_land_get_option( 'business_land_pageloader_status' );
	  $business_land_pageloader_image  = business_land_get_option( 'business_land_pageloader_image' );
	
	if( $business_land_pageloader_status ): ?>
		<div class="page-loader">
			<div class="image-wrap">
				<?php if( $business_land_pageloader_image ): ?>
					<img src="<?php echo esc_url( $business_land_pageloader_image );?>" alt="<?php echo esc_attr_e('page-loader', 'business-land'); ?>"/>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>
	
<?php 
 
	$business_land_sticky_header_status = business_land_get_option( 'business_land_sticky_header_status' ); 
	$business_land_breadcrumb_status    = business_land_get_option( 'business_land_breadcrumb_status' );

?> 
	<header id="masthead" class="site-header header-transparent">
		<div class="header-menu <?php if( $business_land_sticky_header_status ): ?> sticky-activated <?php endif;?>">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
						<?php if ( has_nav_menu( 'primary' ) ) : ?>
							<ul class="navbar-items nav pull-right navigation-section">
								<div class="mobile-menu-wrapper">
									<span class="mobile-menu-icon"><i class="icon-menu"></i></span>
								</div>
								<li id="site-navigation" class="main-navigation nav-item" role="navigation">
									<?php wp_nav_menu( array(
										'theme_location' => 'primary',
										'menu_id'        => 'primary-menu',
										'menu_class' 	 => 'main-menu nav',
									) ); 
									?>
								</li>
							</ul><!-- .navigation-section -->
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
	<?php if( !is_front_page()):  ?>
		<section class="page-header jumbotron <?php if ( get_header_image() ) : ?>bg-image<?php endif; ?>"  <?php if ( get_header_image() ) : ?> style="background-image:url('<?php echo esc_url( get_header_image() ); ?>');" <?php endif; ?>>
		<?php if ( get_header_image() ) : ?><span class="bg-overlay"></span><?php endif; ?>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="title-wrap">
							<?php if( is_page() || is_single() ){ ?>
									<h2 class="page-title"><?php echo esc_html( get_the_title() ); ?></h2>
		
								<?php } elseif( is_search() ){ ?>
								<?php /* translators: %s: search term */
									$page_title = sprintf( esc_html__( 'Search Results for: %s', 'business-land' ),  get_search_query() ); 
								?>
								<h2 class="page-title"><?php echo esc_html( $page_title ); ?></h2>
			
								<?php }elseif( is_404() ){ ?>
			
								<h2 class="page-title"><?php echo esc_html( 'Page Not Found: 404', 'business-land' ); ?></h2>
			
								<?php }elseif( is_home() ){ ?>
			
								<h2 class="page-title"><?php single_post_title(); ?></h2>
			
								<?php } else{
			
									the_archive_title( '<h2 class="page-title">', '</h2>' );
								}
								
								if( $business_land_breadcrumb_status ):
									business_land_breadcrumbs();
								endif;
							?>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>
