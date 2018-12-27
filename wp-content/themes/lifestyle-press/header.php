<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <header>
 *
 * @package lifestyle-press
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="<?php echo esc_url( 'http://gmpg.org/xfn/11' ); ?>">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
<?php $header_text_color = get_header_textcolor(); ?>
<header>

<?php $menu_sticky = get_theme_mod( 'lifestyle_magazine_header_sticky_menu_option', false ); ?>

<?php
	// Default values for 'lifestyle_magazine_social_media' theme mod.
	$defaults = "";
	$social_media = get_theme_mod( 'lifestyle_magazine_social_media', $defaults );
?>

	<section class="top-bar" <?php if( has_header_image() ) : ?> style="background-image:url(<?php echo esc_url( get_header_image() ); ?>)" <?php endif; ?>>
		<div class="container">
			<div class="row top-head-1">
				<!-- Brand and toggle get grouped for better mobile display -->	
				<div class="col-sm-3">
					<?php
					// To store only value which has links :
					if ( ! empty( $social_media ) && is_array( $social_media ) ) {
						$social_media_filtered = array();
						foreach ( $social_media as $value ) {
							if( empty( $value['social_media_link'] ) ) {
								continue;
							}
							$social_media_filtered[] = $value; 
						}
					}	
					?>

					<?php if ( ! empty( $social_media_filtered ) && is_array( $social_media_filtered ) ) : ?>
					<!-- top-bar -->
						<div class="social-icons">
							<ul class="list-inline">
								<?php foreach ( $social_media_filtered as $value ) { ?>
									<?php
										$no_space_class = str_replace( 'fa fa-', '', $value['social_media_class'] );
										$class = strtolower( $no_space_class );
									?>
							        <li class="<?php echo esc_attr( $class ); ?>"><a href="<?php echo esc_url( $value['social_media_link'] ); ?>" target="_blank"><i class="<?php echo esc_attr( $value['social_media_class'] ); ?>"></i></a></li>
							    <?php } ?>
							</ul>
						</div>
					<!-- top-bar -->
					<?php endif; ?>
				</div>	
				
				<div class="col-sm-6 logo text-center">			
					<?php
					if ( has_custom_logo() ) {
						the_custom_logo();
					}
					if( display_header_text() ) : ?>
		      			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
		      				<h1 class="site-title"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h1>
		      				<h2 class="site-description"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></h2>
		      			</a>
      				<?php endif; ?>
				</div>
				<?php if( get_theme_mod( 'header_search_display_option', false ) ) : ?>
					<div class="col-sm-3"><div class="search-top"><?php get_search_form( $echo = true ); ?></div></div>
				<?php endif; ?>
			</div>
		</div> <!-- /.end of container -->
	</section> <!-- /.end of section -->

	



	<section  class="main-nav nav-one <?php if( $menu_sticky ) echo ' sticky-header'; ?>">
		<div class="container">
			<nav class="navbar">
		      	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			        <span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'lifestyle-magazine' ); ?></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
		      	</button>	    
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">  							
					<?php
			            wp_nav_menu( array(
			                'theme_location'    => 'primary',
			                'menu-id'    => 'primary-menu',
			                'depth'             => 8,
			                'container'         => 'div',
			                'menu_class'        => 'nav navbar-nav',
			                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
			                'walker'            => new Lifestyle_Magazine_Wp_Bootstrap_Navwalker()
			            ) );
			        ?>			        
			    </div> <!-- /.end of collaspe navbar-collaspe -->
			</nav>
		</div>

	</section>


	<?php if( get_theme_mod( 'theme_headline_display_option', false ) ) : ?>

	<?php
		$category_id = get_theme_mod( 'theme_headline_category' );
		$title = get_theme_mod( 'headline_title' );
		$posts_per_page = get_theme_mod( 'number_of_headline_posts', 3 );

		$args = array(
			'cat' => absint( $category_id ),
			'posts_per_page' => $posts_per_page,
			'ignore_sticky_posts' => 1
		);
		$query = new WP_Query( $args );
	?>

	<?php if( $query->have_posts() && $posts_per_page ) : ?>
		<div class="headline-ticker-4">
			<div class="container">
				<div class="headline-ticker-wrapper">
					<?php if( $title ) : ?><div class="headline-title"><?php echo esc_html( $title ); ?></div><?php endif; ?>
					<div class="headline-wrapper">
					<div id="owl-heading" class="owl-carousel" >
					<?php while( $query->have_posts() ) : $query->the_post(); ?> 
						<div class="item">
							<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' ); ?>
							<?php if( ! empty( $image ) ) : ?>
								<a href="<?php the_permalink(); ?>" class="feature-image">
									<img src="<?php echo esc_url( $image[0] ); ?>" class="img-responsive">
								</a>
							<?php endif; ?>
							<small><?php echo get_the_date(); ?></small> 
							<a href="<?php the_permalink(); ?>" class="heading-title"><?php the_title(); ?></a>
						</div>
					<?php endwhile; wp_reset_postdata(); ?>
						
					</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>


<?php endif; ?>

	
</header>