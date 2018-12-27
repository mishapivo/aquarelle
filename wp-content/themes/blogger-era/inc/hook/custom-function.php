<?php
/**
 * Custom theme functions.
 *
 * This file contains hook functions attached to theme hooks.
 *
 * @package Blogger_Era
 */

if ( ! function_exists( 'blogger_era_top_header' ) ) :
	/**
	 * Top Header
	 * @since 1.0.0
	 */
	function blogger_era_top_header() { 
		$enable_top_header = blogger_era_get_option( 'enable_top_header' );
		$top_left_header = blogger_era_get_option( 'top_left_header' ); 
		$top_right_header = blogger_era_get_option( 'top_right_header' ); 

		if ( false == $enable_top_header || ( 'none' == $top_left_header && 'none' == $top_right_header ) ){
			return;
		}
	?>
		<div class="top-header">
			<div class="container">
				<div class="top-header-left">
					<?php if ( 'top-menu' == $top_left_header ) {
						do_action( 'blogger_era_action_top_menu' );
					}elseif ( 'social-icon' == $top_left_header ) {
						do_action( 'blogger_era_action_social_menu' );
					}elseif ( 'address' == $top_left_header ) {
						do_action( 'blogger_era_action_header_address' );
					}elseif ( 'current-date' == $top_left_header ) {
						do_action( 'blogger_era_action_current_date' );
					} ?>
				</div>
				<div class="top-header-right right-side">
					<?php if ( 'top-menu' == $top_right_header ) {
						do_action( 'blogger_era_action_top_menu' );
					}elseif ( 'social-icon' == $top_right_header ) {
						do_action( 'blogger_era_action_social_menu' );
					}elseif ( 'address' == $top_right_header ) {
						do_action( 'blogger_era_action_header_address' );
					}elseif ( 'current-date' == $top_right_header ) {
						do_action( 'blogger_era_action_current_date' );
					} ?>
				</div>
			</div>
		</div>	
	<?php }
endif;
add_action( 'blogger_era_action_header', 'blogger_era_top_header', 10 );

if ( ! function_exists( 'blogger_era_site_header' ) ) :
	/**
	 * Site Branding
	 * @since 1.0.0
	 */
	function blogger_era_site_header() { ?>
		<div class="mid-header">
			<div class="container">
				<div class="site-branding">
				<?php $site_identity = blogger_era_get_option( 'site_identity' ); 					
					$title = get_bloginfo( 'name', 'display' );
					$description    = get_bloginfo( 'description', 'display' );
					if ( 'logo-only' == $site_identity ){
						the_custom_logo();
					}elseif ( 'logo-title' == $site_identity ) {
						the_custom_logo();
						if ( is_front_page() && is_home() ) :
							?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
						else :
							?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
						endif;
					}elseif ( 'logo-text' == $site_identity ) {
						the_custom_logo();
						if ( $description ) {
							echo '<p class="site-description">'.esc_attr( $description ).'</p>';
						}
					}elseif ( 'title-only' == $site_identity ) {
						if ( is_front_page() && is_home() ) :
							?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
						else :
							?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
						endif;
					}elseif ( 'title-text' == $site_identity ) {
						if ( is_front_page() && is_home() ) :
							?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
						else :
							?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
						endif;
						
						if ( $description || is_customize_preview() ) :
							?>
							<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
						<?php endif; ?>
					<?php }
				?>	
				</div><!-- .site-branding -->
			</div>
		</div>
		<div class="bottom-header">
			<div class="container">
			<?php $enable_offcanvas_header = blogger_era_get_option( 'enable_offcanvas_header' );
				if ( true == $enable_offcanvas_header && is_active_sidebar( 'offcanvas' ) ): ?>
					<div class="offcanvas-toggle-wrapper">
						<a class="offcanvas-toggle"></a>
					</div>
				<?php endif; ?>
				<div class="menu-holder">
					<nav id="site-navigation" class="main-navigation">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						) );
						?>
					</nav><!-- #site-navigation -->
				</div>
				<?php $enable_search_header = blogger_era_get_option( 'enable_search_header' );
				if ( true == $enable_search_header ): ?>
					<div class="search-part">
						<div class="toggle-search-icon"></div>
						<div class="search-area">
							<?php get_search_form();?>
							<span class="search-arrow"></span>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>		
	<?php }
endif;
add_action( 'blogger_era_action_header', 'blogger_era_site_header', 15 );

if ( ! function_exists( 'blogger_era_featured_slider' ) ) :
	/**
	 * Site Slider
	 * @since 1.0.0
	 */
	function blogger_era_featured_slider() { 
		$enable_slider = blogger_era_get_option( 'enable_slider' );
		if ( !is_front_page() || false == $enable_slider ){
			return;
		}		
		get_template_part( 'template-parts/section', 'slider' );
	}
endif;
add_action( 'blogger_era_action_header', 'blogger_era_featured_slider', 20 );

if ( ! function_exists( 'blogger_era_header_image' ) ) :
	/**
	 *  Breadcrumb
	 * @since 1.0.0
	 */
	function blogger_era_header_image() { 
		$blogger_header_image = blogger_era_get_option( 'blogger_header_image' );
		if ( 'none' === $blogger_header_image ) {
			return;
		}
		
		if ( is_front_page() ){
			return;
		}	

		$header_image = get_header_image(); 
		if ( 'header-image' == $blogger_header_image ) {
			$header_image = ! empty( $header_image ) ? get_header_image() : get_template_directory_uri() . '/assets/img/default.jpg';
		} elseif ( 'post-thumbnail' == $blogger_header_image ) {
			if ( is_singular() ) :
				$header_image = ( has_post_thumbnail() ) ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : $header_image;
			endif;
		}
					
	?>
		<div class="page-title-wrap" style="background-image: url('<?php echo esc_url( $header_image ); ?>');">
			<div class="container">
				<header class="entry-header">
					<?php echo blogger_era_banner_title(); ?>
				</header>
			</div>
		</div>
	<?php }
endif;
add_action( 'blogger_era_action_header', 'blogger_era_header_image', 25);

if ( ! function_exists( 'blogger_era_breadcrumb_section' ) ) :
	/**
	 *  Breadcrumb
	 * @since 1.0.0
	 */
	function blogger_era_breadcrumb_section() { 
		$enable_breadcrumb = blogger_era_get_option( 'enable_breadcrumb' );
		if ( false === $enable_breadcrumb ) {
			return;
		}
		
		if ( is_front_page() ){
			return;
		}		
	?>
		<div class="breadcrumb-wrapper">
			<div class="container">
				<?php blogger_era_breadcrumb();  ?>
			</div>
		</div>
	<?php }
endif;
add_action( 'blogger_era_action_header', 'blogger_era_breadcrumb_section', 30 );

if ( ! function_exists( 'blogger_era_offcanvas' ) ) :
	/**
	 * Top Menu
	 * @since 1.0.0
	 */
	function blogger_era_offcanvas(){
		$enable_offcanvas_header = blogger_era_get_option( 'enable_offcanvas_header' );

		if( ! is_active_sidebar( 'offcanvas' ) || false == $enable_offcanvas_header ){
			return;
		}
	?>
		<div class="offcanvas">
			<a href="#" class="offcanvas-toggle close"><i class="fa fa-times"></i></a>
			<?php if ( is_active_sidebar( 'offcanvas' ) ):
				dynamic_sidebar( 'offcanvas' );
			endif; ?>
		</div><!-- /.offcanvas -->

	<?php }
endif;
add_action( 'blogger_era_action_offcanvas', 'blogger_era_offcanvas', 10 );

if ( ! function_exists( 'blogger_era_popular' ) ) :
	/**
	 * Top Menu
	 * @since 1.0.0
	 */
	function blogger_era_popular(){
		$enable_popular 		= blogger_era_get_option( 'enable_popular' );				 
		$popular_category   	= blogger_era_get_option( 'popular_category' ); 
		if ( !is_front_page() || false == $enable_popular ){
			return;
		}			
	?>	
		<section class="popular-section default-padding">
			<div class="container">
				<?php $popular_args = array(
					'posts_per_page' => 3,
					'post_status' => 'publish',
					'paged' => 1,
					);

				if ( absint( $popular_category ) > 0 ) {
					$popular_args['cat'] = absint( $popular_category );
				}
				$popular_query = new WP_Query( $popular_args );
				if ( $popular_query->have_posts() ) : ?>			
					<div class="row popular-section-wrapper">
						<?php while ( $popular_query->have_posts() ) : $popular_query->the_post(); ?>

							<?php $no_image = '';
								if ( !has_post_thumbnail() ): 
									$no_image = 'no-image';
							endif; ?>							
							<div class="custom-col-4">
								<div class="popular-wrapper <?php echo esc_attr( $no_image);?>">
									<figure>
										<?php the_post_thumbnail( 'blogger-era-popular' );?>
									</figure>
									<div class="popular-caption">
										<div class="entry-meta">
											<span class="cat-links"><a href="<?php the_permalink();?>" title=""><?php the_title();?></a></span>
										</div>	
									</div>
								</div>
							</div>
						<?php endwhile;
						wp_reset_postdata();?>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php }
endif;
add_action( 'blogger_era_action_offcanvas', 'blogger_era_popular', 15);

if ( ! function_exists( 'blogger_era_footer_instagram' ) ) :
	/**
	 * Footer Instagram Widget
	 * @since 1.0.0
	 */
function blogger_era_footer_instagram() {	
	$enable_instagram 		= blogger_era_get_option( 'enable_instagram' );		
	if ( ! is_active_sidebar( 'instagram-widget' )|| false == $enable_instagram ){
		return;
	}
	dynamic_sidebar( 'instagram-widget' );
	?>
	

	<?php
}
endif;
add_action( 'blogger_era_action_footer', 'blogger_era_footer_instagram', 10 );

if ( ! function_exists( 'blogger_era_footer_menu' ) ) :
	/**
	 * Footer Menu 
	 * @since 1.0.0
	 */
function blogger_era_footer_menu() {
	$enable_footer_menu 		= blogger_era_get_option( 'enable_footer_menu' );
	if ( ! has_nav_menu( 'footer-menu' ) || false == $enable_footer_menu ){
		return;
	}
	?>
		<aside class="widget quick-menu">
			<?php
			wp_nav_menu( array(
				'theme_location'  => 'footer-menu',
				'container'       => false,								
				'depth'           => 1,
				'fallback_cb'     => 'wp_page_menu',
				) );
			?>
		</aside>	

	<?php
}
endif;
add_action( 'blogger_era_action_footer', 'blogger_era_footer_menu', 15 );

if ( ! function_exists( 'blogger_era_footer_widget' ) ) :
	/**
	 * Footer Menu 
	 * @since 1.0.0
	 */
function blogger_era_footer_widget() {
	$enable_footer_social 		= blogger_era_get_option( 'enable_footer_social' );
	if ( ! has_nav_menu( 'social-menu' ) || false == $enable_footer_social ){
		return;
	}
	?>
		<aside class="widget follow-us">
			<div class="social-links inline-design">
				<?php
				wp_nav_menu( array(
					'theme_location'  => 'social-menu',
					'container'       => false,								
					'depth'           => 1,
					'fallback_cb'     => 'wp_page_menu',
					) );
				?>
			</div>
		</aside>	
	<?php
}
endif;
add_action( 'blogger_era_action_footer', 'blogger_era_footer_widget', 20);

if ( ! function_exists( 'blogger_era_footer_info' ) ) :
	/**
	 * Footer Credit 
	 * @since 1.0.0
	 */
	function blogger_era_footer_info() {
		$footer_logo = blogger_era_get_option('footer_logo');	
	?>
		<div class="botton-footer">
			<?php if (!empty( $footer_logo) ): ?>
				<aside class="textwidget footer-logo">
					<img src="<?php echo esc_url( $footer_logo );?>">
				</aside>
			<?php endif;?>	
			<?php 	// Powered by content.
			$powered_by_text = sprintf( __( 'Theme of %s', 'blogger-era' ), '<a target="_blank" rel="designer" href="https://96themes.com/">96 THEME.</a>' );		
			?>
			<span class="copy-right"><?php echo wp_kses_post($powered_by_text);?></span>
		</div>
		<?php
	}
endif;
add_action( 'blogger_era_action_footer', 'blogger_era_footer_info', 25);


if ( ! function_exists( 'blogger_era_footer_scroll_top' ) ) :
	/**
	 * Footer Scroll To Top
	 * @since 1.0.0
	 */
	function blogger_era_footer_scroll_top() {
	?>
		<div class="back-to-top" style="display: block;">
		   <a href="#masthead" title="Go to Top" class="fa-angle-up"></a>       
	 	</div>
	<?php
	}
endif;
add_action( 'blogger_era_action_footer', 'blogger_era_footer_scroll_top', 30);





if ( ! function_exists( 'blogger_era_top_menu' ) ) :
	/**
	 * Top Menu
	 * @since 1.0.0
	 */
	function blogger_era_top_menu(){
		if ( has_nav_menu( 'top-menu' ) ) : ?>

			<div class="top-menu">
				<?php
				wp_nav_menu( array(
					'theme_location'  => 'top-menu',
					'container'       => false,								
					'depth'           => 1,
					'fallback_cb'     => 'wp_page_menu',
					) );
				?>
			</div>

		<?php endif;
	}
endif;
add_action( 'blogger_era_action_top_menu', 'blogger_era_top_menu');

if ( ! function_exists( 'blogger_era_social_menu' ) ) :
	/**
	 * Social Menu
	 * @since 1.0.0
	 */
	function blogger_era_social_menu(){
		if ( has_nav_menu( 'social-menu' ) ) : ?>

			<div class="social-links inline-design">
				<?php
				wp_nav_menu( array(
					'theme_location'  => 'social-menu',
					'container'       => false,								
					'depth'           => 1,
					'fallback_cb'     => 'wp_page_menu',
					) );
				?>
			</div>

		<?php endif;
	}
endif;
add_action( 'blogger_era_action_social_menu', 'blogger_era_social_menu');

if ( ! function_exists( 'blogger_era_header_address' ) ) :
	/**
	 * Social Menu
	 * @since 1.0.0
	 */
	function blogger_era_header_address(){
		$header_address = blogger_era_get_option('header_address');
		$header_number = blogger_era_get_option('header_number');
		$header_email = blogger_era_get_option('header_email');	
		if ( empty( $header_email ) && empty( $header_number ) && empty( $header_address ) ){
			return;
		}	
	?>
		<div class="top-address-part">
				<ul>
					<?php if(!empty($header_number)):?>
						<li>
							<a href="tel:<?php echo preg_replace( '/\D+/', '', esc_attr( $header_number ) ); ?>"><i class="fa fa-phone"></i><?php echo esc_attr($header_number);?></a>
						</li>
					<?php endif;?>

					<?php if(!empty($header_address)):?>
						<li><i class="fa fa-map-marker"></i><?php echo wp_kses_post( $header_address );?></li>
					<?php endif;?>

					<?php if(!empty($header_email)):?>
						<li>
							<a href="mailto:<?php echo esc_attr($header_email);?>"><i class="fa fa-envelope"></i><?php echo esc_attr( antispambot( $header_email ) ); ?></a>
						</li>
					<?php endif;?>
					
				</ul>
		</div>	
	<?php }
endif;
add_action( 'blogger_era_action_header_address', 'blogger_era_header_address');

if ( ! function_exists( 'blogger_era_current_date' ) ) :
    /**
     * Top Header Current Date Start.
     *
     * @since 1.0.0
     */
    function blogger_era_current_date() { ?>

        <div class="top-header-date"><span><?php echo date( get_option( 'date_format' ) ); ?></span></div>
        
        <?php
    }
endif;

add_action( 'blogger_era_action_current_date', 'blogger_era_current_date' );
